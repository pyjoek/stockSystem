<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use Illuminate\Http\Request;

class BranchController extends Controller
{
    public function index()
    {
        abort_unless(auth()->user()->isAdmin(), 403);
        return view('branches.index', [
            'branches' => Branch::orderBy('code')->get(),
        ]);
    }

    public function store(Request $request)
    {
        abort_unless(auth()->user()->isAdmin(), 403);
        $data = $request->validate([
            'code' => 'required|string|max:20|unique:branches,code',
            'name' => 'required|string|max:255',
            'location' => 'nullable|string|max:255',
        ]);
        Branch::create($data);
        return back()->with('status', 'Branch created.');
    }
}
