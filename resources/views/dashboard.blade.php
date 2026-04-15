<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        <div class="text-sm font-medium text-gray-500 dark:text-gray-400">Rice Products</div>
                        <div class="mt-4 text-3xl font-semibold">{{ $riceCount }}</div>
                    </div>
                </div>
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        <div class="text-sm font-medium text-gray-500 dark:text-gray-400">Orders</div>
                        <div class="mt-4 text-3xl font-semibold">{{ $orderCount }}</div>
                    </div>
                </div>
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        <div class="text-sm font-medium text-gray-500 dark:text-gray-400">Payments</div>
                        <div class="mt-4 text-3xl font-semibold">{{ $paymentCount }}</div>
                    </div>
                </div>
            </div>


        </div>
    </div>
</x-app-layout>
