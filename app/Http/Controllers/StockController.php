<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use App\Models\Product;
use App\Models\StockLevel;
use App\Models\StockMovement;
use App\Services\StockService;
use Illuminate\Http\Request;
use InvalidArgumentException;

class StockController extends Controller
{
    public function levels(Request $request)
    {
        $user = $request->user();
        $query = StockLevel::with(['product', 'branch'])->orderBy('id', 'desc');
        if (!$user->isAdmin()) {
            $query->where('branch_id', $user->branch_id);
        } elseif ($request->filled('branch_id')) {
            $query->where('branch_id', $request->branch_id);
        }

        return view('stock.levels', [
            'levels' => $query->paginate(30)->appends($request->query()),
            'branches' => Branch::orderBy('code')->get(),
        ]);
    }

    public function movements(Request $request)
    {
        $user = $request->user();
        $query = StockMovement::with(['product', 'branch', 'toBranch', 'user'])->latest();
        if (!$user->isAdmin()) {
            $query->where('branch_id', $user->branch_id);
        }

        return view('stock.movements', [
            'movements' => $query->paginate(30),
        ]);
    }

    public function create(Request $request)
    {
        return view('stock.move', [
            'products' => Product::where('is_active', true)->orderBy('name')->get(),
            'branches' => $this->visibleBranches($request),
            'type' => $request->get('type', 'receive'),
        ]);
    }

    public function store(Request $request, StockService $stock)
    {
        $user = $request->user();
        $data = $request->validate([
            'type' => 'required|in:receive,sell,transfer,adjust',
            'product_id' => 'required|exists:products,id',
            'branch_id' => 'required|exists:branches,id',
            'to_branch_id' => 'nullable|exists:branches,id',
            'quantity' => 'required|integer',
            'reference' => 'nullable|string|max:100',
            'notes' => 'nullable|string|max:500',
            'moved_on' => 'nullable|date',
        ]);

        if (!$user->isAdmin() && (int) $data['branch_id'] !== (int) $user->branch_id) {
            abort(403, 'You can only move stock for your branch.');
        }

        try {
            if ($data['type'] === 'receive') {
                $stock->receive($data['product_id'], $data['branch_id'], $data['quantity'], $user->id, $data['reference'] ?? null, $data['notes'] ?? null, $data['moved_on'] ?? null);
            } elseif ($data['type'] === 'sell') {
                $stock->sell($data['product_id'], $data['branch_id'], $data['quantity'], $user->id, $data['reference'] ?? null, $data['notes'] ?? null, $data['moved_on'] ?? null);
            } elseif ($data['type'] === 'adjust') {
                $stock->adjust($data['product_id'], $data['branch_id'], $data['quantity'], $user->id, $data['notes'] ?? null, $data['moved_on'] ?? null);
            } else {
                $request->validate(['to_branch_id' => 'required|exists:branches,id']);
                $stock->transfer($data['product_id'], $data['branch_id'], $data['to_branch_id'], $data['quantity'], $user->id, $data['reference'] ?? null, $data['notes'] ?? null, $data['moved_on'] ?? null);
            }
        } catch (InvalidArgumentException $e) {
            return back()->withInput()->withErrors(['quantity' => $e->getMessage()]);
        }

        return redirect()->route('stock.levels')->with('status', 'Stock updated.');
    }

    protected function visibleBranches(Request $request)
    {
        $user = $request->user();
        if ($user->isAdmin()) {
            return Branch::where('is_active', true)->orderBy('code')->get();
        }
        return Branch::where('id', $user->branch_id)->get();
    }
}
