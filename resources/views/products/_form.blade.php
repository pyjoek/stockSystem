@if ($errors->any())<div class="mb-4 text-red-600 text-sm">{{ $errors->first() }}</div>@endif
<form method="POST" action="{{ $product ? route('products.update', $product) : route('products.store') }}" class="space-y-4">
    @csrf
    @if ($product) @method('PUT') @endif
    <div><label class="block text-sm">SKU</label><input name="sku" value="{{ old('sku', $product->sku ?? '') }}" class="w-full border rounded p-2" required></div>
    <div><label class="block text-sm">Name</label><input name="name" value="{{ old('name', $product->name ?? '') }}" class="w-full border rounded p-2" required></div>
    <div><label class="block text-sm">Unit</label><input name="unit" value="{{ old('unit', $product->unit ?? 'pcs') }}" class="w-full border rounded p-2" required></div>
    <div><label class="block text-sm">Cost price</label><input type="number" step="0.01" name="cost_price" value="{{ old('cost_price', $product->cost_price ?? 0) }}" class="w-full border rounded p-2" required></div>
    <div><label class="block text-sm">Sale price</label><input type="number" step="0.01" name="sale_price" value="{{ old('sale_price', $product->sale_price ?? 0) }}" class="w-full border rounded p-2" required></div>
    <div><label class="block text-sm">Reorder level</label><input type="number" name="reorder_level" value="{{ old('reorder_level', $product->reorder_level ?? 0) }}" class="w-full border rounded p-2" required></div>
    <button class="px-4 py-2 bg-gray-800 text-white rounded">Save</button>
</form>
