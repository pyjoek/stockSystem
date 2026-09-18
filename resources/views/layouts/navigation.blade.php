<nav x-data="{ open: false }" class="bg-white border-b border-gray-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('dashboard') }}">
                        <x-application-logo class="block h-10 w-auto fill-current text-gray-600" />
                    </a>
                </div>
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">Dashboard</x-nav-link>
                    <x-nav-link :href="route('stock.levels')" :active="request()->routeIs('stock.levels')">Stock</x-nav-link>
                    <x-nav-link :href="route('stock.move')" :active="request()->routeIs('stock.move')">Move</x-nav-link>
                    <x-nav-link :href="route('stock.movements')" :active="request()->routeIs('stock.movements')">History</x-nav-link>
                    <x-nav-link :href="route('products.index')" :active="request()->routeIs('products.*')">Products</x-nav-link>
                    @if (auth()->user()->isAdmin())
                        <x-nav-link :href="route('branches.index')" :active="request()->routeIs('branches.*')">Branches</x-nav-link>
                    @endif
                </div>
            </div>
            <div class="hidden sm:flex sm:items-center sm:ml-6">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="flex items-center text-sm font-medium text-gray-500 hover:text-gray-700 focus:outline-none">
                            <div>{{ Auth::user()->name }}</div>
                        </button>
                    </x-slot>
                    <x-slot name="content">
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-dropdown-link :href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();">Log Out</x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>
        </div>
    </div>
</nav>
