<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Customers
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <a href="{{ route('customers.create') }}" class="inline-flex items-center px-4 py-2 bg-indigo-600 text-white rounded-md">Add Customer</a>
                    <table class="min-w-full divide-y divide-gray-200 mt-4">
                        <thead>
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Name</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Email</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Phone</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach ($customers as $customer)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $customer->name }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $customer->email }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $customer->phone }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <a href="{{ route('customers.show', $customer) }}" class="text-indigo-600 hover:text-indigo-900">View</a>
                                        <a href="{{ route('customers.edit', $customer) }}" class="ml-4 text-indigo-600 hover:text-indigo-900">Edit</a>
                                        <form action="{{ route('customers.destroy', $customer) }}" method="POST" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="ml-4 text-red-600 hover:text-red-900" onclick="return confirm('Are you sure?')">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>