
    <table class="w-full table-auto">
        <thead class="border-b border-gray-200 bg-gray-50 dark:border-gray-800 dark:bg-gray-800">
        <tr>
            <th class="px-5 py-3 text-left text-xs font-medium uppercase text-gray-500"></th>

            <th class="px-5 py-3 text-left text-xs font-medium uppercase text-gray-500">Product</th>
            <th class="px-5 py-4 text-left text-xs font-medium text-gray-500 dark:text-gray-400"> stock </th>
            <th class="px-5 py-3 text-left text-xs font-medium uppercase text-gray-500">price</th>
            <th class="px-5 py-3 text-left text-xs font-medium uppercase text-gray-500">stock_threshold</th>
            <th class="px-5 py-3 text-left text-xs font-medium uppercase text-gray-500">created_at</th>
            <th class="px-5 py-3 text-left text-xs font-medium uppercase text-gray-500">actions</th>
            <th class="px-5 py-3 text-left text-xs font-medium uppercase text-gray-500"></th>

        </tr>
        </thead>
        <tbody class="divide-y divide-gray-200 dark:divide-gray-800">
        @foreach($products as $product)
            <tr class="transition hover:bg-gray-50 dark:hover:bg-gray-900" data-product-id={{ $product->id }}>
                <td class="w-14 px-5 py-4 whitespace-nowrap">
                    <label class="cursor-pointer text-sm font-medium text-gray-700 select-none dark:text-gray-400">
                        <input type="checkbox" class="sr-only" :checked="selected.includes('')" @change="toggleSelect(product.id)">
                        <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M10 3L4.5 8.5L2 6" stroke="white" stroke-width="1.6666" stroke-linecap="round" stroke-linejoin="round"></path>
                        </svg>
                        </span>
                        </span>
                    </label>
                </td>
                <td class="px-5 py-4 whitespace-nowrap">
                    <div class="flex items-center gap-3">

                        <span class="text-sm font-medium text-gray-700 dark:text-gray-400"  class="product-name"> {{ $product->name }}

                            @if( $product->hasLowStock())
                                <span class="inline-flex items-center px-2 py-1 ring-1 ring-inset ring-danger-subtle text-fg-danger-strong text-sm font-medium rounded bg-danger-soft"
                                      style="color: darkred; background-color: lightpink">Low stock</span>
                                    </span>
                        @endif
                    </div>
                </td>
                <td class="px-5 py-4 whitespace-nowrap product-stock" id="product-stock-{{ $product->id }}">
                    <p class="text-sm text-gray-700 dark:text-gray-400"
                    >{{ $product->stock }}</p>
                </td>
                <td class="px-5 py-4 whitespace-nowrap">
                    <p class="text-sm text-gray-700 dark:text-gray-400" class="product-price">{{ $product->price }}</p>
                </td>
                <td class="px-5 py-4 whitespace-nowrap">
                    <p class="text-sm text-gray-700 dark:text-gray-400" class="product-threshold"> {{ $product->alert_threshold }}</p>

                </td>
                <td class="px-5 py-4 whitespace-nowrap">
                    <p class="text-sm text-gray-700 dark:text-gray-400" > {{ $product->created_at }}</p>
                </td>

                <td class="px-5 py-4 whitespace-nowrap">
                    <button
                        class="bg-brand-500 shadow-theme-xs hover:bg-brand-600 inline-flex
                             items-center justify-center gap-2 rounded-lg px-4 py-3 text-sm font-medium text-green transition
                             btn-stock-action"
                        style="background-color: lightgreen" type="button"
                        data-id=" {{ $product->id }}"
                        data-name=" {{ $product->name }}" data-stock="{{$product->stock }}" data-type="in" >

                        Restock </button>
                </td>
                <td class="px-5 py-4 whitespace-nowrap">
                    <button
                        class="bg-brand-500 shadow-theme-xs hover:bg-brand-600
                             inline-flex items-center justify-center gap-2 rounded-lg px-4 py-3 text-sm font-medium text-red transition
                             btn-stock-action"
                        style="background-color: darkred;color: pink"  type="button"
                        data-id=" {{ $product->id }}"
                        data-name=" {{ $product->name }}" data-stock="{{$product->stock }}" data-type="out" >
                        Reduce </button>

                </td>
            </tr>
        @endforeach

        </tbody>
    </table>







{{-- debugging version for the update stock event listener--}}
{{--channel.listen('.dashboardUpdated', (e) => {
console.log('1. Event received:', e);

let row = document.querySelector(`[data-product-id="${e.productId}"]`);
console.log('2. Row found:', row);

if(row) {
console.log('3. About to update stock...');

let stockElement = row.querySelector('.product-stock');
console.log('4. Stock element found:', stockElement);

stockElement.innerText = e.newStock;
console.log('5. Stock updated to:', e.newStock);

console.log('6. About to flash row...');
flashRow(row);
console.log('7. Row flashed');
}

console.log('8. About to show SweetAlert...');
Swal.fire('Updated!', e.productName + ' stock is now ' + e.newStock, 'success');
console.log('9. Done!');
});--}}
