<nav x-data="{ open: false }" class="bg-white border-b border-gray-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <div class="flex-shrink-0 flex items-center">
                    <a href="{{ route('dashboard') }}">Ecommerce App</a>
                </div>
                <div class="hidden sm:ml-6 sm:flex sm:space-x-8">
                    <a href="{{ route('dashboard') }}" class="border-indigo-500 text-gray-900 inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium">Dashboard</a>
                    <a href="{{ route('customers.index') }}" class="text-gray-900 inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium">Customers</a>
                    <a href="{{ route('products.index') }}" class="text-gray-900 inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium">Products</a>
                    <a href="{{ route('cart.index') }}" class="text-gray-900 inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium">Cart</a>
                    <a href="{{ route('orders.index') }}" class="text-gray-900 inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium">Orders</a>
                </div>
            </div>
            <div class="hidden sm:ml-6 sm:flex sm:items-center">
                @auth
                    <a href="{{ route('profile.edit') }}" class="text-gray-900 inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium">Profile</a>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="text-gray-900">Logout</button>
                    </form>
                @else
                    <a href="{{ route('login') }}" class="text-gray-900">Login</a>
                @endauth
            </div>
        </div>
    </div>
</nav>