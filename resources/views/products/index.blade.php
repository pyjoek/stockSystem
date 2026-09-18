<x-app-layout>
    <x-slot name="header"><div class="flex justify-between items-center"><h2 class="font-semibold text-xl">Products</h2>@if(auth()->user()->isAdmin())<a href="{{ route('products.create') }}" class="text-sm text-indigo-600">Add product</a>@endif</div></x-slot>
    <div class="py-12"><div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        @if (session('status'))<div class="mb-4 p-4 bg-green-50 text-green-800 rounded">{{ session('status') }}</div>@endif
        <div class="bg-white shadow-sm sm:rounded-lg"><table class="min-w-full text-sm"><thead class="bg-gray-50 text-left"><tr><th class="p-3">SKU</th><th class="p-3">Name</th><th class="p-3">Unit</th><th class="p-3">Cost</th><th class="p-3">Sale</th><th class="p-3"></th></tr></thead>
        <tbody>@foreach ($products as $p)<tr class="border-t"><td class="p-3">{{ $p->sku }}</td><td class="p-3">{{ $p->name }}</td><td class="p-3">{{ $p->unit }}</td><td class="p-3">{{ $p->cost_price }}</td><td class="p-3">{{ $p->sale_price }}</td><td class="p-3">@if(auth()->user()->isAdmin())<a class="text-indigo-600" href="{{ route('products.edit', $p) }}">Edit</a>@endif</td></tr>@endforeach</tbody></table><div class="p-3">{{ $products->links() }}</div></div>
    </div></div>
</x-app-layout>
