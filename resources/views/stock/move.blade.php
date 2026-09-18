<x-app-layout>
    <x-slot name="header"><h2 class="font-semibold text-xl">Record stock movement</h2></x-slot>
    <div class="py-12"><div class="max-w-xl mx-auto sm:px-6 lg:px-8 bg-white p-6 shadow-sm sm:rounded-lg">
        @if ($errors->any())<div class="mb-4 text-red-600 text-sm">{{ $errors->first() }}</div>@endif
        <form method="POST" action="{{ route('stock.store') }}" class="space-y-4">@csrf
            <div><label class="block text-sm">Type</label><select name="type" class="w-full border rounded p-2">@foreach (['receive','sell','transfer','adjust'] as $t)<option value="{{ $t }}" @if(old('type', $type)===$t) selected @endif>{{ ucfirst($t) }}</option>@endforeach</select></div>
            <div><label class="block text-sm">Product</label><select name="product_id" class="w-full border rounded p-2" required>@foreach ($products as $p)<option value="{{ $p->id }}">{{ $p->sku }} — {{ $p->name }}</option>@endforeach</select></div>
            <div><label class="block text-sm">Branch</label><select name="branch_id" class="w-full border rounded p-2" required>@foreach ($branches as $b)<option value="{{ $b->id }}">{{ $b->code }} — {{ $b->name }}</option>@endforeach</select></div>
            <div><label class="block text-sm">To branch (transfers only)</label><select name="to_branch_id" class="w-full border rounded p-2"><option value="">—</option>@foreach ($branches as $b)<option value="{{ $b->id }}">{{ $b->code }}</option>@endforeach</select></div>
            <div><label class="block text-sm">Quantity</label><input type="number" name="quantity" value="{{ old('quantity', 1) }}" class="w-full border rounded p-2" required></div>
            <div><label class="block text-sm">Reference</label><input name="reference" value="{{ old('reference') }}" class="w-full border rounded p-2"></div>
            <div><label class="block text-sm">Date</label><input type="date" name="moved_on" value="{{ old('moved_on', date('Y-m-d')) }}" class="w-full border rounded p-2"></div>
            <div><label class="block text-sm">Notes</label><textarea name="notes" class="w-full border rounded p-2">{{ old('notes') }}</textarea></div>
            <button class="px-4 py-2 bg-gray-800 text-white rounded">Save movement</button>
        </form>
    </div></div>
</x-app-layout>
