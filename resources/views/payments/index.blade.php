<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Payments
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
                        <div class="text-lg font-semibold">Payment Records</div>
                        <a href="{{ route('payments.create') }}" class="inline-flex items-center px-4 py-2 bg-indigo-600 text-white rounded-md hover:bg-indigo-700">New Payment</a>
                    </div>

                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                            <thead class="bg-gray-50 dark:bg-gray-900">
                                <tr>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Payment</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Order</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Rice</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Amount</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Action</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700">
                                @foreach($payments as $payment)
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap">#{{ $payment->id }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap">{{ optional($payment->order)->id ?? 'N/A' }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap">{{ optional(optional($payment->order)->rice)->name ?? 'Unknown' }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap">{{ $payment->amount }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap">{{ $payment->status }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            @if(strtolower($payment->status) !== 'paid')
                                                <form action="{{ route('payments.paid', $payment->id) }}" method="POST">
                                                    @csrf
                                                    @method('PUT')
                                                    <button type="submit" class="px-3 py-1 bg-green-600 text-white rounded-md hover:bg-green-700">Mark Paid</button>
                                                </form>
                                            @else
                                                <span class="px-3 py-1 bg-gray-200 rounded-md">Paid</span>
                                            @endif
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
