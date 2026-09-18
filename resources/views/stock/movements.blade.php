<x-app-layout>
    <x-slot name="header"><h2 class="font-semibold text-xl">Movement history</h2></x-slot>
    <div class="py-12"><div class="max-w-7xl mx-auto sm:px-6 lg:px-8 bg-white shadow-sm sm:rounded-lg">
        <table class="min-w-full text-sm"><thead class="bg-gray-50 text-left"><tr><th class="p-3">Date</th><th class="p-3">Type</th><th class="p-3">Product</th><th class="p-3">Qty</th><th class="p-3">Branch</th><th class="p-3">Ref</th></tr></thead>
        <tbody>@foreach ($movements as $m)<tr class="border-t"><td class="p-3">{{ optional($m->moved_on)->format('Y-m-d') }}</td><td class="p-3">{{ $m->type }}</td><td class="p-3">{{ optional($m->product)->name }}</td><td class="p-3">{{ $m->quantity }}</td><td class="p-3">{{ optional($m->branch)->code }}</td><td class="p-3">{{ $m->reference }}</td></tr>@endforeach</tbody></table>
        <div class="p-3">{{ $movements->links() }}</div>
    </div></div>
</x-app-layout>
