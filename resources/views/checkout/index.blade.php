<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Checkout
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form method="GET" action="{{ route('checkout') }}" class="mb-4">
                        <div class="flex gap-4">
                            <div>
                                <label for="coupon" class="block text-sm font-medium text-gray-700">Coupon Code</label>
                                <input type="text" name="coupon" id="coupon" value="{{ $couponCode ?? '' }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                            </div>
                            <button type="submit" class="mt-6 inline-flex items-center px-4 py-2 bg-indigo-600 text-white rounded-md">Apply Coupon</button>
                        </div>
                    </form>
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead>
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Product</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Price</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Quantity</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Total</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach ($cart as $item)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $item['name'] }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">${{ number_format($item['price'], 2) }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $item['quantity'] }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">${{ number_format($item['price'] * $item['quantity'], 2) }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="mt-4">
                        <p class="text-lg font-medium">Subtotal: ${{ number_format($subtotal, 2) }}</p>
                        @if ($discount > 0)
                            <p class="text-lg font-medium">Discount: ${{ number_format($discount, 2) }}</p>
                        @endif
                        <p class="text-lg font-medium">Total: ${{ number_format($total, 2) }}</p>
                    </div>
                    <form action="{{ route('checkout.store') }}" method="POST" class="mt-4">
                        @csrf
                        <input type="hidden" name="coupon" value="{{ $couponCode ?? '' }}">
                        <button type="submit" class="inline-flex items-center px-4 py-2 bg-indigo-600 text-white rounded-md">Place Order</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
```