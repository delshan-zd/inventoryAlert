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

    <title>Laravel Product List </title>

    <!-- Scripts -->

    <style data-fullcalendar=""></style>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <!-- Theme Store -->



    <!-- Theme Store -->


    <!-- Apply dark mode immediately to prevent flash -->

</head>

<body>

@include('layouts.navigation')

<div class="flex flex-col items-center justify-between grow xl:flex-row xl:px-6">
    <div class="flex items-center justify-between w-full gap-2 px-3 py-3 border-b border-gray-200 dark:border-gray-800 sm:gap-4 xl:justify-normal xl:border-b-0 xl:px-0 lg:py-4">


        <!-- Search Bar (desktop only) -->
        <div class="hidden xl:block">
            <form>
                <div class="relative">
                        <span class="absolute -translate-y-1/2 pointer-events-none left-4 top-1/2">
                            <!-- Search Icon -->
                            <svg class="fill-gray-500 dark:fill-gray-400" width="20" height="20" viewBox="0 0 20 20" fill="none">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M3.04175 9.37363C3.04175 5.87693 5.87711 3.04199 9.37508 3.04199C12.8731 3.04199 15.7084 5.87693 15.7084 9.37363C15.7084 12.8703 12.8731 15.7053 9.37508 15.7053C5.87711 15.7053 3.04175 12.8703 3.04175 9.37363ZM9.37508 1.54199C5.04902 1.54199 1.54175 5.04817 1.54175 9.37363C1.54175 13.6991 5.04902 17.2053 9.37508 17.2053C11.2674 17.2053 13.003 16.5344 14.357 15.4176L17.177 18.238C17.4699 18.5309 17.9448 18.5309 18.2377 18.238C18.5306 17.9451 18.5306 17.4703 18.2377 17.1774L15.418 14.3573C16.5365 13.0033 17.2084 11.2669 17.2084 9.37363C17.2084 5.04817 13.7011 1.54199 9.37508 1.54199Z" fill=""></path>
                            </svg>
                        </span>
                </div>
            </form>
        </div>
    </div>

    <!-- Application Menu (mobile) and Right Side Actions (desktop) -->
    <div :class="isApplicationMenuOpen ? 'flex' : 'hidden'" class="items-center justify-between w-full gap-4 px-5 py-4 xl:flex shadow-theme-md xl:justify-end xl:px-0 xl:shadow-none hidden">
        <div class="flex items-center gap-2 2xsm:gap-3">
            <!-- Theme Toggle Button -->

    </div>

    <!-- User Dropdown -->

    <!-- User Button -->
    <button class="flex items-center text-gray-700 dark:text-gray-400" @click.prevent="toggleDropdown()" type="button">



        <!-- Chevron Icon -->

    </button>

    <!-- Dropdown Start -->
    <!-- Dropdown End -->
</div>
</div>
</div>
</header>
<!-- app header end -->
{{--
<div class="p-4 mx-auto max-w-(--breakpoint-2xl) md:p-6">
    <div class="flex flex-wrap items-center justify-between gap-3 mb-6">
        <h2 class="text-xl font-semibold text-gray-800 dark:text-white/90">
            Product List
        </h2>
        <nav>
            <ol class="flex items-center gap-1.5">
                <li>
                    <a class="inline-flex items-center gap-1.5 text-sm text-gray-500 dark:text-gray-400" href="https://laravel-demo.tailadmin.com">
                        Home
                        <svg class="stroke-current" width="17" height="16" viewBox="0 0 17 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M6.0765 12.667L10.2432 8.50033L6.0765 4.33366" stroke="" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round"></path>
                        </svg>
                    </a>
                </li>
                <li class="text-sm text-gray-800 dark:text-white/90">
                    Product List
                </li>
            </ol>
        </nav>
    </div>

--}}  <!-- old nav before add notiification bell -->

    <!-- Header -->
    <div class="flex flex-col justify-between gap-5 border-b border-gray-200 px-5 py-4 sm:flex-row sm:items-center dark:border-gray-800">
        <div>
            <h3 class="text-lg font-semibold text-gray-800 dark:text-white/90">Products List
                <span class="inline-flex items-center px-2 py-1 ring-1 ring-inset ring-danger-subtle text-fg-danger-strong text-sm font-medium rounded bg-danger-soft"
                      style="color: darkred; background-color: lightpink">Low stock</span>
            </h3>
            <p class="text-sm text-gray-500 dark:text-gray-400">
                Track your store's progress to boost your sales.
            </p>
        </div>
        <div class="flex gap-3">
            <!-- export div section-->
            <div class="relative inline-block" id="exportContainer">
            <button onclick="document.getElementById('exportDropdown').classList.toggle('hidden')"
                class="shadow-theme-xs inline-flex items-center justify-center gap-2 rounded-lg bg-white px-4 py-3 text-sm font-medium text-gray-700 ring-1 ring-gray-300 transition hover:bg-gray-50 dark:bg-gray-800 dark:text-gray-400 dark:ring-gray-700 dark:hover:bg-white/[0.03]">
                Export
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                    <path d="M16.667 13.3333V15.4166C16.667 16.1069 16.1074 16.6666 15.417 16.6666H4.58295C3.89259 16.6666 3.33295 16.1069 3.33295 15.4166V13.3333M10.0013 13.3333L10.0013 3.33325M6.14547 9.47942L9.99951 13.331L13.8538 9.47942" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                </svg>
            </button>
                <!--  export dropdown section-->
                <div id="exportDropdown" class="hidden absolute right-0 mt-2 w-48 bg-white rounded-lg shadow-lg border border-gray-200 z-50">
                    <a href="{{ route('reports.index') }}"
                       class="flex items-center gap-2 px-4 py-3 text-sm text-gray-700 hover:bg-gray-50 rounded-lg">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-red-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z" />
                        </svg>
                        Export as PDF
                    </a>
                </div>

            </div>    <!-- end export section-->

            <button >
                <a href=" {{ route('products.create') }}" class="bg-brand-500 shadow-theme-xs hover:bg-brand-600 inline-flex items-center justify-center gap-2 rounded-lg px-4 py-3 text-sm font-medium text-white"
                style="background-color: cornflowerblue">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                        <path d="M5 10.0002H15.0006M10.0002 5V15.0006" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                    </svg>
                    Add Product
                </a>
            </button>

        </div>
    </div>

    <!-- Search and Filter -->
    <div class="border-b border-gray-200 px-5 py-4 dark:border-gray-800">
        <div class="flex gap-3 sm:justify-between">
            <div class="relative flex-1 sm:flex-auto">
                <span class="absolute top-1/2 left-4 -translate-y-1/2 text-gray-500 dark:text-gray-400">
                    <svg class="fill-current" width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M3.04199 9.37363C3.04199 5.87693 5.87735 3.04199 9.37533 3.04199C12.8733 3.04199 15.7087 5.87693 15.7087 9.37363C15.7087 12.8703 12.8733 15.7053 9.37533 15.7053C5.87735 15.7053 3.04199 12.8703 3.04199 9.37363ZM9.37533 1.54199C5.04926 1.54199 1.54199 5.04817 1.54199 9.37363C1.54199 13.6991 5.04926 17.2053 9.37533 17.2053C11.2676 17.2053 13.0032 16.5344 14.3572 15.4176L17.1773 18.238C17.4702 18.5309 17.945 18.5309 18.2379 18.238C18.5308 17.9451 18.5309 17.4703 18.238 17.1773L15.4182 14.3573C16.5367 13.0033 17.2087 11.2669 17.2087 9.37363C17.2087 5.04817 13.7014 1.54199 9.37533 1.54199Z" fill=""></path>
                    </svg>
                </span>
                <input type="text"  id="searchInput" placeholder="Search..." class="dark:bg-dark-900 shadow-theme-xs focus:border-brand-300 focus:ring-brand-500/10 dark:focus:border-brand-800 h-11 w-full rounded-lg border border-gray-300 bg-transparent py-2.5 pr-4 pl-11 text-sm text-gray-800 placeholder:text-gray-400 focus:ring-3 focus:outline-hidden sm:w-[300px] sm:min-w-[300px] dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30">
            </div>
            <div class="relative">
                <!--
              <button @click="showFilter = !showFilter" type="button" class="shadow-theme-xs flex h-11 w-full items-center justify-center gap-2 rounded-lg border border-gray-300 bg-white px-4 py-2.5 text-sm font-medium text-gray-700 sm:w-auto sm:min-w-[100px] dark:border-gray-700 dark:bg-gray-800 dark:text-gray-400">
                  <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                      <path d="M14.6537 5.90414C14.6537 4.48433 13.5027 3.33331 12.0829 3.33331C10.6631 3.33331 9.51206 4.48433 9.51204 5.90415M14.6537 5.90414C14.6537 7.32398 13.5027 8.47498 12.0829 8.47498C10.663 8.47498 9.51204 7.32398 9.51204 5.90415M14.6537 5.90414L17.7087 5.90411M9.51204 5.90415L2.29199 5.90411M5.34694 14.0958C5.34694 12.676 6.49794 11.525 7.91777 11.525C9.33761 11.525 10.4886 12.676 10.4886 14.0958M5.34694 14.0958C5.34694 15.5156 6.49794 16.6666 7.91778 16.6666C9.33761 16.6666 10.4886 15.5156 10.4886 14.0958M5.34694 14.0958L2.29199 14.0958M10.4886 14.0958L17.7087 14.0958" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                  </svg>
               Filter
              </button>
              -->
              <div class="absolute right-0 z-10 mt-2 w-56 rounded-lg border border-gray-200 bg-white p-4 shadow-lg dark:border-gray-700 dark:bg-gray-800" style="display: none;">
                  <div class="mb-5">
                      <label class="mb-2 block text-xs font-medium text-gray-700 dark:text-gray-300">Category</label>
                      <input type="text" class="dark:bg-dark-900 shadow-theme-xs focus:border-brand-300 focus:ring-brand-500/10 dark:focus:border-brand-800 h-10 w-full rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 text-sm text-gray-800 placeholder:text-gray-400 focus:ring-3 focus:outline-hidden dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30" placeholder="Search category...">
                  </div>
                  <div class="mb-5">
                      <label class="mb-2 block text-xs font-medium text-gray-700 dark:text-gray-300">Company</label>
                      <input type="text" class="dark:bg-dark-900 shadow-theme-xs focus:border-brand-300 focus:ring-brand-500/10 dark:focus:border-brand-800 h-10 w-full rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 text-sm text-gray-800 placeholder:text-gray-400 focus:ring-3 focus:outline-hidden dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30" placeholder="Search company...">
                  </div>
                  <button class="bg-brand-500 hover:bg-brand-600 h-10 w-full rounded-lg px-3 py-2 text-sm font-medium text-white">Apply</button>
              </div>
          </div>
          <!-- here i will insert notification section -->
            <div class="flex justify-between items-center mb-4">
                <!-- Left side -  -->
                <h1 class="text-2xl font-bold"></h1>

                <!-- Right side - Notification bell -->
                <div class="relative">
                    <button id="notificationBell" class="relative p-2 text-gray-600 hover:text-gray-900">
                        <!-- Bell Icon (SVG) -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                        </svg>

                        <!-- Badge (notification count) -->
                        <span id="notificationBadge" class=" hidden absolute top-0 right-0 inline-flex items-center justify-center px-2 py-1 text-xs font-bold leading-none text-white bg-red-600 rounded-full">
                         0
                        </span>
                    </button>

                    <!-- Dropdown (hidden by default) -->
                    <div id="notificationDropdown" class="hidden absolute right-0 mt-2 w-80 bg-white rounded-lg shadow-lg z-50">
                        <!-- Dropdown content will go here -->
                        <!-- Header -->
                        <div class="px-4 py-3 border-b border-gray-200">
                            <h3 class="text-sm font-semibold text-gray-900">Notifications</h3>
                        </div>

                        <!-- Notification list -->
                        <div id="notificationList" class="max-h-96 overflow-y-auto">
                            <!-- Notifications will be inserted here via JavaScript -->
                            <div class="px-4 py-3 text-sm text-gray-500 text-center">
                                Loading...
                            </div>
                        </div>

                        <!-- Footer -->
                {{--        <div class="px-4 py-3 border-t border-gray-200 text-center">
                            <a href="#" class="text-sm text-blue-600 hover:text-blue-800">View All</a>
                        </div>--}}
                    </div>
                </div>
            </div>


            <!--end notification section-->
        </div>
    </div>

    <!-- Table -->
    <div class="custom-scrollbar overflow-x-auto" id="products-wrapper">
 @include('partials.product_table',['products' => $products])
    </div>
</div>
</div>
</div>

{{--modal section --}}

<div id="stock-modal" style="display: none; position: fixed; inset: 0; background-color: rgba(0,0,0,0.5); align-items: center; justify-content: center; z-index: 1000;">

    <div style="background-color: white; padding: 20px; border-radius: 8px; width: 100%; max-width: 400px; box-shadow: 0 4px 6px rgba(0,0,0,0.1);">

        <div style="margin-bottom: 15px; border-bottom: 1px solid #eee; padding-bottom: 10px;">
            <h2 id="modal-title"> </h2>
            <h3 id="modal-product-name" style="margin: 0;">Product Name</h3>
            <p style="color: #666;">Current Stock: <span id="modal-current-stock">0</span></p>
        </div>

        <form id="transaction-form" action="/transactions/create" method="POST">
            @csrf
            <input type="hidden" id="form-product-id" name="product_id">
            <input type="hidden" id="form-type" name="type">
            <input type="hidden" id="form-current-stock" name="current_stock">

            <label for="modal-quantity" style="display:block; margin-bottom: 5px;">Quantity:</label>
            <input type="number" id="modal-quantity" name="quantity" min="1" required style="width: 100%; padding: 8px;
             margin-bottom: 15px;box-shadow: 0 0 3px #CC0000;">
            <small id="stock-error-message" style="color: red;"> </small>

            <label for="form-reason"> Transaction reason</label>
            <select id="form-reason" name="reason"
                    class=" mb-4 w-full border-2 border-gray-200 rounded-xl px-4 py-2.5 text-sm text-gray-700 bg-white focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 shadow-sm transition duration-200 cursor-pointer hover:border-gray-300" >

            </select>

            <div style="display: flex; gap: 10px;">
                <button type="submit" style="flex: 1; padding: 10px; background-color: #007bff; color: white; border: none; border-radius: 4px;" id="save-button">Save</button>
                <button type="button" style="flex: 1; padding: 10px; background-color: #6c757d; color: white; border: none; border-radius: 4px;"
                        id="cancel-btn">Cancel</button>
            </div>
        </form>
    </div>
</div>



</div>

{{--
<button type="button"  class="transaction"
        style=" padding: 10px; background-color: cornflowerblue; margin: 10px auto; display: block;">
    create new Transaction </button>
--}}
{{--.transaction:hover{
background-color: lightblue;
color: white;
}--}}

<style>

    .flash-success {
        background-color: #d4edda !important;  🟢
        transition: background-color 0.8s ease;
    }
</style>




<script type="module">


    window.onload = function() {


        console.log("The Ear is listening..."); // Add this line to test
        window.Echo.channel('test-channel')
            .listen('.ConnectionTest', (data) => {
                console.log('Real-time connection successful!', data);
                alert('Connection Test Received: ' + data.message);
       });

        // search
        let searchTimer;
        document.getElementById('searchInput').addEventListener('input', (e) => {
            clearTimeout(searchTimer);

            searchTimer= setTimeout( () => {
                let searchValue= e.target.value;
                let url =`/products/search?query=${searchValue}` ;

                fetch(url)
                    .then(response => response.text() )
                    .then(html => {
                        document.getElementById('products-wrapper').innerHTML=html
                    })
                    .catch(error => {
                        console.error('serach error' + error)
                    });
                }, 150);

        });


        // listen to dashboard - evnets:stock updated and low alert stock
       let channel = window.Echo.channel('dashboard');
       //stock updated
        channel.listen('.dashboardUpdated', (e) => {
            console.log('stock updated  successfully!', e);
            let row= document.querySelector(`[data-product-id="${e.productId}"]`);
            console.log('Row found?', row); // Should show the element or null
            alert('Connection Test Received: ' + e.productName);
            let productId = e.productId;
            if(row){
                row.querySelector('.product-stock').innerText=e.newStock;
                flashRow(row);
            }
            Swal.fire('Updated!', e.productName + ' stock is now ' + e.newStock, 'success');
        });

 // test for the stock alert
            channel.listen('.dashboard.lowStock.alert', (dat) => {
                console.log('Real-time connection successful!', dat);
                alert('Connection Test Received ,current stock is: ' + dat.currentStock);
                Swal.fire('Low Stock!', dat.productName + ' is running low.', 'warning');

            });

        //cancel
        document.getElementById('cancel-btn').addEventListener('click',function (){
            document.getElementById('stock-modal').style.display='none';
        });


        // restock and reduce


        const TransactionData ={
            titles:{
                '{{ \App\TransactionType::IN->value  }}' : 'Restock (stock in)',
                '{{ \App\TransactionType::OUT->value }}' : 'Reduce (stock out)',
            },
            reasons:{
                        '{{ \App\TransactionType::IN->value}}':[
                              @foreach(\App\TransactionReason::forType('in') as $reason )
                              { value: '{{ $reason->value  }}', label: '{{$reason->label()  }}' },
                              @endforeach
                        ],
                         '{{ \App\TransactionType::OUT->value}}': [
                             @foreach(\App\TransactionReason::forType('out') as $reason )
                             { value:'{{ $reason->value  }}' , label : '{{ $reason->label()  }}'  },
                             @endforeach
                         ]

            }
        };


        // click restock - Reduce - transaction creation
        document.querySelectorAll(".btn-stock-action").forEach( button => {
            button.addEventListener('click',function (){


                const id =this.getAttribute('data-id');
                const name=this.getAttribute('data-name');
                const stock=this.getAttribute('data-stock');
                const type =this.getAttribute('data-type');



                document.getElementById('form-product-id').value= id ;
                document.getElementById('form-type').value= type;
                document.getElementById('form-current-stock').value= stock;

                document.getElementById('modal-product-name').innerText= name;
                document.getElementById('modal-current-stock').innerText=stock;

                // display title and reasons after fetch them
                document.getElementById('modal-title').innerText = TransactionData.titles[type];

                const reasonSelect= document.getElementById('form-reason');
                reasonSelect.innerHTML='';

                const possibleReasons= TransactionData.reasons[type];

                console.log(possibleReasons);

                possibleReasons.forEach(reason => {
                   let option = document.createElement('option');
                   option.innerText= reason.label;
                   option.value=reason.value;
                   reasonSelect.appendChild(option);
               });



                document.getElementById('stock-modal').style.display = 'flex';

            });
        });

        // quantity validation
        const quantityInput = document.getElementById('modal-quantity');
        const saveButton = document.getElementById('save-button');
        const errorMessage=document.getElementById('stock-error-message');

        function isQuantityInValid(){
            const type=document.getElementById('form-type').value;
            const currentStock = parseInt(document.getElementById('form-current-stock').value);
            const enteredQuantity= parseInt(document.getElementById('modal-quantity').value);

            return type == 'out' && enteredQuantity > currentStock ;

        }

        quantityInput.addEventListener('input', function (){

            if( isQuantityInValid() ){
                this.style.borderColor= 'red';
                errorMessage.innerText= "cannot reduce more than" + parseInt(document.getElementById('form-current-stock').value);
                saveButton.disable=true ;
                saveButton.style.opacity= '0.5';
            }
            else {
                this.style.borderColor= '';
                errorMessage.innerText= "";
                saveButton.disable=false ;
                saveButton.style.opacity= '1';
            }

        });
       document.getElementById('transaction-form').addEventListener('submit',function (e){
          if(isQuantityInValid()) {
              e.preventDefault();
              alert("Action blocked: Insufficient stock.");
          }
       });
        //end the section

        // listen to the update stock event , Low stock Alert
        function flashRow(element){
            element.classList.add('flash-success');
            setTimeout(() => {
                element.classList.remove('flash-success');
            } ,5000);
        }

// notifications section
        let dropdownNotification=document.getElementById('notificationDropdown');
        let bellNotification=document.getElementById('notificationBell');
        let allNotifications =[];

function fetchNotifications(){
    fetch('/notifications')
        .then(response => response.json())
        .then(notifications => {
             allNotifications=notifications;
           updateBadgeCount(notifications.length);

        })
        .catch(error =>{
            console.error('faild to fetch notifications');
        });

}
function renderNotifications(notifications){
    let html= '';
    notifications.forEach(notification =>{
        html+= `<div class="px-4 py-3 border-b" style="background-color: lightgray">
                <p> ${notification.message }</p>
                 <span class="text-xs text-gray-500">${notification.created_at}</span>
                 </div>` ;
    });

    document.getElementById('notificationList').innerHTML=html;
}
    function updateBadgeCount(count){
        const badge = document.getElementById('notificationBadge');
        badge.innerText = count;
        badge.classList.remove('hidden');
    }

fetchNotifications(); // call on load to have the badge updated

        bellNotification.addEventListener('click', function (){
            dropdownNotification.classList.toggle('hidden');

            if(!dropdownNotification.classList.contains('hidden')){
                renderNotifications(allNotifications);
            }

        });

// for export -download pdf
        {{-- Close dropdown when clicking outside --}}
        document.addEventListener('click', function(e) {
            const dropdown = document.getElementById('notificationDropdown');
            const bell = document.getElementById('notificationBell');

            if (!bell.contains(e.target) && !dropdown.contains(e.target)) {
                dropdown.classList.add('hidden');
            }
        });

///
    };


</script>
</body>


</html>
