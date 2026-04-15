<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Rice List
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    @if(session('success'))
                        <div class="mb-4 rounded-lg bg-green-100 p-4 text-sm text-green-800 dark:bg-green-900 dark:text-green-200">
                            {{ session('success') }}
                        </div>
                    @endif
                    <div class="flex items-center justify-between mb-6">
                        <div class="text-lg font-semibold">Available Rice</div>
                        <a href="{{ route('rice.create') }}" class="inline-flex items-center px-4 py-2 bg-indigo-600 text-white rounded-md hover:bg-indigo-700">Add Rice</a>
                    </div>

                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                            <thead class="bg-gray-50 dark:bg-gray-900">
                                <tr>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Price</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Stock</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700">
                                @foreach($rices as $rice)
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap">{{ $rice->name }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap">{{ $rice->price }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap">{{ $rice->stock }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="flex gap-2">
                                                <a href="{{ route('rice.edit', $rice->id) }}" class="px-3 py-1 bg-blue-600 text-white rounded-md hover:bg-blue-700">Edit</a>
                                                <form action="{{ route('rice.destroy', $rice->id) }}" method="POST" class="inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="px-3 py-1 bg-red-600 text-white rounded-md hover:bg-red-700">Delete</button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
