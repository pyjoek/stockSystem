<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use App\Models\Product;
use App\Models\StockLevel;
use App\Models\StockMovement;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $user = $request->user();
        $levels = StockLevel::with(['product', 'branch']);

        if (!$user->isAdmin()) {
            $levels->where('branch_id', $user->branch_id);
        }

        $lowStock = (clone $levels)->get()->filter(function ($row) {
            return $row->product && $row->quantity <= $row->product->reorder_level;
        })->values();

        $movements = StockMovement::with(['product', 'branch', 'toBranch'])
            ->when(!$user->isAdmin(), function ($q) use ($user) {
                $q->where('branch_id', $user->branch_id);
            })
            ->latest()
            ->limit(10)
            ->get();

        return view('stock.dashboard', [
            'productCount' => Product::count(),
            'branchCount' => Branch::count(),
            'onHand' => (clone $levels)->sum('quantity'),
            'lowStock' => $lowStock,
            'movements' => $movements,
        ]);
    }
}
