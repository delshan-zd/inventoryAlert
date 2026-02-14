<?php

namespace App\Listeners;

use App\TransactionType;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Events\ProductStockUpdated;
use App\Models\Notification;
use Illuminate\Support\Facades\Log;

class StoreStockUpdateNotification
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(ProductStockUpdated $event): void
    {
        Log::info('Listener triggered!', [
            'product_id' => $event->productId,
            'product_name' => $event->productName,
        ]);

        $type=TransactionType::from($event->transactionType);

        Notification::create([
            'type' => 'stock_update',
            'product_id'=>$event->productId,
            'message' => "product {$event->productName} has updated  {$type->label() }
             - stock qunatity is {$event->newStock } ",
            'data'=> [
                'transactionType' => $event->transactionType,
                'newStock' => $event->newStock,
            ]
        ]);
            Log::info('Notification created!');
    }
}
