<html lang="en" class="h-full bg-gray-50 dark:bg-gray-900"><head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="cgLZRtuOr9nAZxBiREgILQnGOYnrD4BWFbVvlfAG">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title> inventory Transactions Report </title>

    <!-- Scripts -->

    <style data-fullcalendar=""></style>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <!-- Theme Store -->



    <!-- Theme Store -->


    <!-- Apply dark mode immediately to prevent flash -->

</head>
<body>

@include('layouts.navigation')
<div class="max-w-7xl mx-auto px-4 py-8">

    {{-- Page Header --}}
    <div class="mb-6">
        <h1 class="text-2xl font-bold text-gray-900">Transactions Report</h1>
        <p class="text-sm text-gray-500 mt-1">View and export your transaction history</p>
    </div>

    {{-- Filter Form --}}
    <form method="GET" action="{{ route('reports.index') }}" class="bg-white rounded-lg shadow p-4 mb-6">
        <div class="flex items-end gap-4">

            <div class="flex flex-col gap-1">
                <label class="text-sm font-medium text-gray-700">From</label>
                <input type="date" name="from" value="{{ request('from') }}"
                       class="border border-gray-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <div class="flex flex-col gap-1">
                <label class="text-sm font-medium text-gray-700">To</label>
                <input type="date" name="to" value="{{ request('to') }}"
                       class="border border-gray-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
            @if(! isset($isPdf))
            <button type="submit"
                    class="bg-blue-600 text-white px-4 py-2 rounded-lg text-sm font-medium hover:bg-blue-700">
                Filter
            </button>
            @endif
            {{-- Clear filter --}}
            @if(!isset($isPdf))
            @if(request('from') || request('to') )
                <a href="{{ route('reports.index') }}"
                   class="text-sm text-gray-500 hover:text-gray-700 py-2">
                    Clear
                </a>
            @endif
            @endif
        </div>
    </form>

    {{-- Transactions Table --}}
    <div class="bg-white rounded-lg shadow overflow-hidden">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
            <tr>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Product</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Type</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Quantity</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Reason</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Date</th>
            </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
            @forelse($transactions as $transaction)
                <tr class="hover:bg-gray-50">
                    <td class="px-6 py-4 text-sm text-gray-900">{{ $transaction->product->name ?? 'product deleted' }}</td>
                    <td class="px-6 py-4 text-sm">
                            <span class="px-2 py-1 rounded-full text-xs font-medium
                                {{ $transaction->type->value === 'in' ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                {{ $transaction->type->value === 'in' ? 'Stock In': 'Stock Out'  }}
                            </span>
                    </td>
                    <td class="px-6 py-4 text-sm text-gray-900">{{ $transaction->quantity }}</td>
                    <td class="px-6 py-4 text-sm text-gray-500">{{ $transaction->reason ?? '-' }}</td>
                    <td class="px-6 py-4 text-sm text-gray-500">{{ $transaction->created_at->format('Y-m-d') }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="px-6 py-8 text-center text-gray-400">No transactions found</td>
                </tr>
            @endforelse
            </tbody>
        </table>

        {{-- Pagination --}}
        <div class="px-6 py-4 border-t border-gray-200">
            {{ $transactions->withQueryString()->links() }}
        </div>
    </div>

    {{-- Export Button --}}
    @if(! isset($isPdf))
    <div class="mt-4 flex justify-end">
        <a href="{{ route('reports.export', request()->query()) }}"
           class="bg-green-600 text-white px-4 py-2 rounded-lg text-sm font-medium hover:bg-green-700">
            Download PDF
        </a>
        <a href="{{ route('products.index') }}"
           class="bg-pink-300 text-white px-4 py-2 rounded-lg text-sm font-medium hover:bg-pink-200 ml-10">
           back to product List
        </a>
    </div>
    @endif
</div>

@if(isset($isPdf))
    <style>
        /* 1. Basic Reset */
        body { font-family: sans-serif; line-height: 1.5; color: #333; }

        /* 2. Fix the Table (The most important part) */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        /* 3. Force Borders (dompdf is picky about these) */
        th, td {
            border: 1px solid #000;
            padding: 8px;
            text-align: left;
        }

        th { background-color: #f2f2f2; font-weight: bold; }

        /* 4. Hide UI Garbage */
        .btn, .no-print, nav, .sidebar, button {
            display: none !important;
        }

        /* 5. Header Styling */
        .header { margin-bottom: 30px; text-align: center; }
    </style>


@endif

</body>
