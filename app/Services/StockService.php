<?php

namespace App\Services;

use App\Models\StockLevel;
use App\Models\StockMovement;
use Illuminate\Support\Facades\DB;
use InvalidArgumentException;

class StockService
{
    public function receive($productId, $branchId, $qty, $userId, $reference = null, $notes = null, $movedOn = null)
    {
        return $this->apply($productId, $branchId, null, 'receive', abs((int) $qty), $userId, $reference, $notes, $movedOn);
    }

    public function sell($productId, $branchId, $qty, $userId, $reference = null, $notes = null, $movedOn = null)
    {
        return $this->apply($productId, $branchId, null, 'sell', -abs((int) $qty), $userId, $reference, $notes, $movedOn);
    }

    public function adjust($productId, $branchId, $qty, $userId, $notes = null, $movedOn = null)
    {
        $qty = (int) $qty;
        if ($qty === 0) {
            throw new InvalidArgumentException('Adjustment quantity cannot be zero.');
        }
        return $this->apply($productId, $branchId, null, 'adjust', $qty, $userId, null, $notes, $movedOn);
    }

    public function transfer($productId, $fromBranchId, $toBranchId, $qty, $userId, $reference = null, $notes = null, $movedOn = null)
    {
        $qty = abs((int) $qty);
        if ((int) $fromBranchId === (int) $toBranchId) {
            throw new InvalidArgumentException('Cannot transfer to the same branch.');
        }

        return DB::transaction(function () use ($productId, $fromBranchId, $toBranchId, $qty, $userId, $reference, $notes, $movedOn) {
            $this->apply($productId, $fromBranchId, $toBranchId, 'transfer_out', -$qty, $userId, $reference, $notes, $movedOn);
            return $this->apply($productId, $toBranchId, $fromBranchId, 'transfer_in', $qty, $userId, $reference, $notes, $movedOn);
        });
    }

    protected function apply($productId, $branchId, $otherBranchId, $type, $signedQty, $userId, $reference, $notes, $movedOn)
    {
        return DB::transaction(function () use ($productId, $branchId, $otherBranchId, $type, $signedQty, $userId, $reference, $notes, $movedOn) {
            $level = StockLevel::firstOrCreate(
                ['branch_id' => $branchId, 'product_id' => $productId],
                ['quantity' => 0]
            );

            $newQty = $level->quantity + $signedQty;
            if ($newQty < 0) {
                throw new InvalidArgumentException('Not enough stock at this branch.');
            }

            $level->quantity = $newQty;
            $level->save();

            return StockMovement::create([
                'product_id' => $productId,
                'branch_id' => $branchId,
                'to_branch_id' => $otherBranchId,
                'user_id' => $userId,
                'type' => $type,
                'quantity' => $signedQty,
                'reference' => $reference,
                'notes' => $notes,
                'moved_on' => $movedOn ?: now()->toDateString(),
            ]);
        });
    }
}
