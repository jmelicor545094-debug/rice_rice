<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Create Payment
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form method="POST" action="{{ route('payments.store') }}">
                        @csrf

                        @if($errors->any())
                            <div class="mb-4 rounded-lg bg-red-100 p-4 text-sm text-red-700 dark:bg-red-900 dark:text-red-200">
                                <ul class="list-disc list-inside">
                                    @foreach($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-200">Order</label>
                            <select name="order_id" class="mt-1 block w-full border border-gray-300 rounded-md px-3 py-2 text-gray-900 dark:bg-gray-700 dark:text-white dark:border-gray-600 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" required>
                                <option value="">Select order</option>
                                @foreach($orders as $order)
                                    <option value="{{ $order->id }}">Order #{{ $order->id }} — {{ optional($order->rice)->name ?? 'Unknown' }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-200">Amount</label>
                            <input type="number" step="0.01" name="amount" value="{{ old('amount') }}" class="mt-1 block w-full border border-gray-300 rounded-md px-3 py-2 text-gray-900 dark:bg-gray-700 dark:text-white dark:border-gray-600 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" required>
                        </div>

                        <input type="hidden" name="status" value="Pending">

                        <div class="flex items-center gap-4">
                            <button type="submit" class="inline-flex items-center px-4 py-2 bg-indigo-600 text-white rounded-md hover:bg-indigo-700">Create Payment</button>
                            <a href="{{ route('payments.index') }}" class="inline-flex items-center px-4 py-2 bg-gray-600 text-white rounded-md hover:bg-gray-700">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
