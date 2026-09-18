<x-app-layout>
    <x-slot name="header"><h2 class="font-semibold text-xl text-gray-800 leading-tight">Stock dashboard</h2></x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                <div class="bg-white p-6 shadow-sm sm:rounded-lg"><div class="text-sm text-gray-500">Products</div><div class="text-2xl font-semibold">{{ $productCount }}</div></div>
                <div class="bg-white p-6 shadow-sm sm:rounded-lg"><div class="text-sm text-gray-500">Branches</div><div class="text-2xl font-semibold">{{ $branchCount }}</div></div>
                <div class="bg-white p-6 shadow-sm sm:rounded-lg"><div class="text-sm text-gray-500">Units on hand</div><div class="text-2xl font-semibold">{{ $onHand }}</div></div>
            </div>
            <div class="bg-white p-6 shadow-sm sm:rounded-lg">
                <h3 class="font-semibold mb-3">Low stock</h3>
                @forelse ($lowStock as $row)
                    <div class="text-sm">{{ $row->product->name }} @ {{ $row->branch->name }} — {{ $row->quantity }}</div>
                @empty
                    <p class="text-gray-500 text-sm">Nothing below reorder level.</p>
                @endforelse
            </div>
        </div>
    </div>
</x-app-layout>
