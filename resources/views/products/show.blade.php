<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $product->name }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="mb-4">
                        <img src="{{ asset($product->image) }}" alt="{{ $product->name }}" class="h-48 w-auto object-cover">
                    </div>
                    <div class="mb-4">
                        <h3 class="text-lg font-medium text-gray-900">Description</h3>
                        <p class="mt-1 text-gray-600">{{ $product->description }}</p>
                    </div>
                    <div class="mb-4">
                        <h3 class="text-lg font-medium text-gray-900">Price</h3>
                        <p class="mt-1 text-gray-600">${{ number_format($product->price, 2) }}</p>
                    </div>
                    <div class="mb-4">
                        <h3 class="text-lg font-medium text-gray-900">Stock</h3>
                        <p class="mt-1 text-gray-600">{{ $product->stock }}</p>
                    </div>
                    <form action="{{ route('cart.add', $product) }}" method="POST" class="mb-4">
                        @csrf
                        <button type="submit" class="inline-flex items-center px-4 py-2 bg-indigo-600 text-white rounded-md">Add to Cart</button>
                    </form>
                    <a href="{{ route('products.index') }}" class="text-indigo-600 hover:text-indigo-900">Back to Products</a>
                    @auth
                        <div class="mt-6">
                            <h3 class="text-lg font-medium text-gray-900">Leave a Review</h3>
                            <form action="{{ route('reviews.store', $product) }}" method="POST" class="mt-4">
                                @csrf
                                <div class="mb-4">
                                    <label for="rating" class="block text-sm font-medium text-gray-700">Rating (1-5)</label>
                                    <input type="number" name="rating" id="rating" min="1" max="5" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" required>
                                    @error('rating') <span class="text-red-600">{{ $message }}</span> @enderror
                                </div>
                                <div class="mb-4">
                                    <label for="comment" class="block text-sm font-medium text-gray-700">Comment</label>
                                    <textarea name="comment" id="comment" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" rows="4"></textarea>
                                    @error('comment') <span class="text-red-600">{{ $message }}</span> @enderror
                                </div>
                                <button type="submit" class="inline-flex items-center px-4 py-2 bg-indigo-600 text-white rounded-md">Submit Review</button>
                            </form>
                        </div>
                    @endauth
                    <div class="mt-6">
                        <h3 class="text-lg font-medium text-gray-900">Reviews</h3>
                        @if ($product->reviews->isEmpty())
                            <p>No reviews yet.</p>
                        @else
                            @foreach ($product->reviews as $review)
                                <div class="border-b border-gray-200 py-4">
                                    <p class="text-sm text-gray-600">Rating: {{ $review->rating }}/5</p>
                                    <p class="text-sm text-gray-600">By: {{ $review->user->name }}</p>
                                    @if ($review->comment)
                                        <p class="mt-1 text-gray-600">{{ $review->comment }}</p>
                                    @endif
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>