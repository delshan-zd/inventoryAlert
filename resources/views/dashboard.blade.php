
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("You're logged in!") }}
                </div>
    <button style="padding: 10px; margin: 15px;" id="products-btn">
        <a href="{{route('products.index')  }}"> products List</a>
    </button>
       <button style="padding:10px; margin:15px;" id="report-btn">
           <a href="{{route('reports.index')  }}"> Transactions Report </a>

       </button>
            </div>
        </div>
    </div>
</x-app-layout>

<style>
    #products-btn{
        background-color: hotpink;
    }
    #products-btn:hover{
        background-color: pink;
    }
    #report-btn{
        background-color: cornflowerblue ;
    }
    #report-btn:hover{
        background-color: lightblue;
    }
</style>
