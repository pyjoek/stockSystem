<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        return view('products.index', [
            'products' => Product::orderBy('name')->paginate(20),
        ]);
    }

    public function create()
    {
        $this->authorizeAdmin();
        return view('products.create');
    }

    public function store(Request $request)
    {
        $this->authorizeAdmin();
        $data = $this->validated($request);
        Product::create($data);
        return redirect()->route('products.index')->with('status', 'Product created.');
    }

    public function edit(Product $product)
    {
        $this->authorizeAdmin();
        return view('products.edit', compact('product'));
    }

    public function update(Request $request, Product $product)
    {
        $this->authorizeAdmin();
        $product->update($this->validated($request, $product->id));
        return redirect()->route('products.index')->with('status', 'Product updated.');
    }

    protected function validated(Request $request, $ignoreId = null)
    {
        return $request->validate([
            'sku' => 'required|string|max:50|unique:products,sku,'.($ignoreId ?: 'NULL'),
            'name' => 'required|string|max:255',
            'unit' => 'required|string|max:20',
            'cost_price' => 'required|numeric|min:0',
            'sale_price' => 'required|numeric|min:0',
            'reorder_level' => 'required|integer|min:0',
        ]);
    }

    protected function authorizeAdmin()
    {
        abort_unless(auth()->user() && auth()->user()->isAdmin(), 403);
    }
}
