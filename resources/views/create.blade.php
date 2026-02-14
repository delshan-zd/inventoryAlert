{{--<script>
    alert("Safari is reading the file!");
    console.log("If you see this, the browser is working.");

        console.log("--- BRIDGING TEST ---");
        console.log("Vite Host: " + "{{ env('VITE_REVERB_HOST') }}");

</script>--}}
<html lang="en" class="h-full bg-gray-50 dark:bg-gray-900"><head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="cgLZRtuOr9nAZxBiREgILQnGOYnrD4BWFbVvlfAG">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title> create product </title>

    <!-- Scripts -->

    <style data-fullcalendar=""></style>


    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>
<body>
@include('layouts.navigation')
<div class="space-y-6">
    <div class="rounded-2xl border border-gray-200 bg-white dark:border-gray-800 dark:bg-white/[0.03]">
        <div class="border-b border-gray-200 px-6 py-4 dark:border-gray-800">
            <h2 class="text-lg font-medium text-gray-800 dark:text-white">
                Products Description
            </h2>
        </div>
        <div class="p-4 sm:p-6 dark:border-gray-800">
            <form method="POST" action="{{ route('products.store') }} ">
                @csrf
                <!-- Products Description Section -->
                <div class="rounded-2xl border border-gray-200 bg-white dark:border-gray-800 dark:bg-white/[0.03]">
                    <div class="border-b border-gray-200 px-6 py-4 dark:border-gray-800">

                    </div>
                    <div class="p-4 sm:p-6 dark:border-gray-800">
                        <div class="grid grid-cols-1 gap-5 md:grid-cols-2">
                            <div>
                                <label for="name" class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">
                                    Product Name
                                </label>
                                <input type="text" name="name" id="name" value="" class="h-11 w-full rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 text-sm text-gray-800 placeholder:text-gray-400 focus:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-500/10 dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30" placeholder="Enter product name">
                            </div>

                            {{--   SKu     --}}
                            <div>
                                <label for="sku" class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">
                                    SKU
                                </label>
                                <input type="text" name="sku" id="sku" value="" class="h-11 w-full rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 text-sm text-gray-800 placeholder:text-gray-400 focus:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-500/10 dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30" placeholder="Enter product name">
                            </div>
                            {{--  stock    --}}
                            <div>
                                <label for="stock" class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">
                                    stock
                                </label>
                                <input type="number"  min="0" name="stock" id="stock" value="" class="h-11 w-full rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 text-sm text-gray-800 placeholder:text-gray-400 focus:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-500/10 dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30" placeholder="Enter product name">
                            </div>

                            {{--  price    --}}
                            <div>
                                <label for="price" class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">
                                    price
                                </label>
                                <input type="number"  min="0" name="price" id="price" step="0.01" value="" class="h-11 w-full rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 text-sm text-gray-800 placeholder:text-gray-400 focus:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-500/10 dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30" placeholder="Enter product name">
                            </div>

                            {{--  alert threshold     --}}
                            <div>
                                <label for="alert_threshold" class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">
                                    alert threshold
                                </label>
                                <input type="number" min="0" name="alert_threshold" id="alert_threshold" value="{{ old('alert_threshold') }}" class="h-11 w-full rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 text-sm text-gray-800 placeholder:text-gray-400 focus:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-500/10 dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30" placeholder="Enter product name">
                            </div>



                            {{--  <div>
                                  <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">
                                      Category
                                  </label>
                                  <div class="relative z-20 bg-transparent">
                                      <select name="category" class="h-11 w-full appearance-none rounded-lg border border-gray-300 bg-transparent bg-none px-4 py-2.5 pr-11 text-sm text-gray-800 placeholder:text-gray-400 focus:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-500/10 dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30">
                                          <option value="">Select Category</option>
                                          <option value="Laptop">Laptop</option>
                                          <option value="Phone">Phone</option>
                                          <option value="Watch">Watch</option>
                                          <option value="Electronics">Electronics</option>
                                          <option value="Accessories">Accessories</option>
                                      </select>
                                      <span class="pointer-events-none absolute top-1/2 right-4 z-30 -translate-y-1/2 text-gray-700 dark:text-gray-400">
                              <svg class="stroke-current" width="20" height="20" viewBox="0 0 20 20" fill="none">
                                  <path d="M4.79175 7.396L10.0001 12.6043L15.2084 7.396" stroke="" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                              </svg>
                          </span>
                                  </div>
                              </div>--}} <!-- category section  -->



                        </div>
                    </div>
                </div>

                <!-- Pricing & Availability Section -->


                <!-- Products Images Section -->
                {{--                    <div class="rounded-2xl border border-gray-200 bg-white dark:border-gray-800 dark:bg-white/[0.03]">--}}
                {{--                        <div class="border-b border-gray-200 px-6 py-4 dark:border-gray-800">--}}
                {{--                            <h2 class="text-lg font-medium text-gray-800 dark:text-white">Products Image</h2>--}}
                {{--                        </div>--}}
                {{--                        <div class="p-4 sm:p-6">--}}
                {{--                            <label for="product-image" class="block cursor-pointer rounded-lg border-2 border-dashed border-gray-300 transition hover:border-blue-500 dark:border-gray-800">--}}
                {{--                                <div class="flex justify-center p-10">--}}
                {{--                                    <div class="flex max-w-[260px] flex-col items-center gap-4">--}}
                {{--                                        <div class="inline-flex h-13 w-13 items-center justify-center rounded-full border border-gray-200 text-gray-700 transition dark:border-gray-800 dark:text-gray-400">--}}
                {{--                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">--}}
                {{--                                                <path d="M20.0004 16V18.5C20.0004 19.3284 19.3288 20 18.5004 20H5.49951C4.67108 20 3.99951 19.3284 3.99951 18.5V16M12.0015 4L12.0015 16M7.37454 8.6246L11.9994 4.00269L16.6245 8.6246" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>--}}
                {{--                                            </svg>--}}
                {{--                                        </div>--}}
                {{--                                        <p class="text-center text-sm text-gray-500 dark:text-gray-400">--}}
                {{--                                            <span class="font-medium text-gray-800 dark:text-white/90">Click to upload</span> or drag and drop SVG, PNG, JPG or GIF (MAX. 800x400px)--}}
                {{--                                        </p>--}}
                {{--                                    </div>--}}
                {{--                                </div>--}}
                {{--                                            --}}{{--   back to add image later          --}}
                {{--                                <input type="file" name="" id="product-image" class="hidden" accept="image/*">--}}
                {{--                            </label>--}}
                {{--                        </div>--}}
                {{--                    </div>--}}

                <!-- Buttons -->
                <div class="flex flex-col gap-3 sm:flex-row sm:justify-end">
                    {{--  <button type="submit" name="action" value="draft" class="inline-flex items-center justify-center gap-2 rounded-lg bg-white px-4 py-3 text-sm font-medium text-gray-700 ring-1 ring-gray-300 transition hover:bg-gray-50 dark:bg-gray-800 dark:text-gray-400 dark:ring-gray-700 dark:hover:bg-white/[0.03]">
                          Draft
                      </button>--}}
                    <button type="submit" name="action" value="publish" class="inline-flex items-center justify-center gap-2 rounded-lg bg-blue-500 px-4 py-3 text-sm font-medium text-white transition hover:bg-blue-600">
                        Add Product
                    </button>
                </div>

            </form>

        </div>
    </div>

    <!-- Button -->

    </div>
</div>
</body>
</html>
