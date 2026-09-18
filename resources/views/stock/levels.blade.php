<x-app-layout>
    <x-slot name="header"><div class="flex justify-between"><h2 class="font-semibold text-xl">Stock on hand</h2><a class="text-sm text-indigo-600" href="{{ route('stock.move') }}">Record movement</a></div></x-slot>
    <div class="py-12"><div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        @if (session('status'))<div class="mb-4 p-4 bg-green-50 text-green-800 rounded">{{ session('status') }}</div>@endif
        @if (auth()->user()->isAdmin())
            <form class="mb-4" method="GET"><select name="branch_id" onchange="this.form.submit()" class="border rounded p-2"><option value="">All branches</option>@foreach ($branches as $b)<option value="{{ $b->id }}" @if(request('branch_id')==$b->id) selected @endif>{{ $b->code }} — {{ $b->name }}</option>@endforeach</select></form>
        @endif
        <div class="bg-white shadow-sm sm:rounded-lg"><table class="min-w-full text-sm"><thead class="bg-gray-50 text-left"><tr><th class="p-3">Branch</th><th class="p-3">Product</th><th class="p-3">SKU</th><th class="p-3">Qty</th></tr></thead><tbody>@forelse ($levels as $row)<tr class="border-t"><td class="p-3">{{ optional($row->branch)->name }}</td><td class="p-3">{{ optional($row->product)->name }}</td><td class="p-3">{{ optional($row->product)->sku }}</td><td class="p-3">{{ $row->quantity }}</td></tr>@empty<tr><td class="p-3 text-gray-500" colspan="4">No stock yet. Record a receive movement.</td></tr>@endforelse</tbody></table><div class="p-3">{{ $levels->links() }}</div></div>
    </div></div>
</x-app-layout>
