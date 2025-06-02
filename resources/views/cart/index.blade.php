<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Shopping Cart
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    @if (session('success'))
                        <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-4" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif
                    @if (empty($cart))
                        <p>Your cart is empty.</p>
                    @else
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead>
                                <tr>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Product</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Price</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Quantity</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Total</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @foreach ($cart as $id => $item)
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap">{{ $item['name'] }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap">${{ number_format($item['price'], 2) }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap">{{ $item['quantity'] }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap">${{ number_format($item['price'] * $item['quantity'], 2) }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <form action="{{ route('cart.remove', $id) }}" method="POST" class="inline">
                                                @csrf
                                                <button type="submit" class="text-red-600 hover:text-red-900" onclick="return confirm('Are you sure?')">Remove</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="mt-4">
                            <a href="{{ route('checkout') }}" class="inline-flex items-center px-4 py-2 bg-indigo-600 text-white rounded-md">Proceed to Checkout</a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>