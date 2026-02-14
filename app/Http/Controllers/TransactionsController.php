<?php

namespace App\Http\Controllers;

use App\Events\ConnectionTest;
use App\Events\LowStockAlert;
use App\Events\ProductStockUpdated;
use App\Http\Requests\StoreTransactionRequest;
use App\Models\Product;
use App\Models\StockTransaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class TransactionsController extends Controller
{
   public function index() {


   }


   public function create(StoreTransactionRequest $request) {
       $message= 'something went wrong ,try again later ';
       $validated= $request->validated();

    try {
           $product=DB::transaction(function() use ($request,$validated) {
               $currentProduct = Product::findOrFail($request->product_id);

               if ($validated['type'] == 'in'){
                   DB::update('update products set stock = stock + ? where id = ?', [$request->quantity, $request->product_id]);
               }
               elseif ($validated['type'] == 'out'){
                   if ($currentProduct->stock < $validated['quantity']) {
                       throw new \Exception("Insufficient stock! You only have {$currentProduct->stock} left.");
                   }
                   DB::update('update products set stock = stock - ? where id = ?', [$request->quantity, $request->product_id]);

               }
               //create new transatcion , i will edit user_id  after authentication
               StockTransaction::create([
                   'product_id' => $request->product_id,
                   'user_id' => auth()->id(),
                   'type' => $validated['type'],
                   'quantity' => $validated['quantity'],
                   'reason' => $validated['reason'],

               ]);
               // to provide the product for the outside scope
              return  Product::find($request->product_id);
           });

        // Pass the raw values instead of the object
        ProductStockUpdated::dispatch($product,$validated['type']);


           if($product->hasLowStock()){
              LowStockAlert::dispatch($product);
           }
       return redirect()->back()->with('success','product stock updated successfully' );

       }catch (\Exception $exception){
           Log::error($exception->getMessage());
           Log::alert($message);
        return redirect()->back()->with('error', $message);
       }

   }

   //




}
