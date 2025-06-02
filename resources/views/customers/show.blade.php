<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Customer Details
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="mb-4">
                        <h3 class="text-lg font-medium text-gray-900">Name</h3>
                        <p class="mt-1 text-gray-600">{{ $customer->name }}</p>
                    </div>
                    <div class="mb-4">
                        <h3 class="text-lg font-medium text-gray-900">Email</h3>
                        <p class="mt-1 text-gray-600">{{ $customer->email }}</p>
                    </div>
                    <div class="mb-4">
                        <h3 class="text-lg font-medium text-gray-900">Phone</h3>
                        <p class="mt-1 text-gray-600">{{ $customer->phone ?? 'N/A' }}</p>
                    </div>
                    <div class="mb-4">
                        <h3 class="text-lg font-medium text-gray-900">Address</h3>
                        <p class="mt-1 text-gray-600">{{ $customer->address ?? 'N/A' }}</p>
                    </div>
                    <a href="{{ route('customers.index') }}" class="inline-flex items-center px-4 py-2 bg-gray-600 text-white rounded-md">Back to Customers</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
