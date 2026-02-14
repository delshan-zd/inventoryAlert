<?php

namespace App\Listeners;

use App\Events\LowStockAlert;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Models\Notification;

class StoreLowStockNotification
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
    public function handle(LowStockAlert $event): void
    {
        Notification::create([
            'type' => 'low_stock',
            'product_id'=>$event->productId,
            'message' => "product {$event->productName} has Low alert -stock threshold is {$event->alertThreshold} and the stock is
             {$event->currentStock}",
            'data'=> [
               'alert_threshold'=>$event->alertThreshold,
                'current_stock' => $event->currentStock,
            ]
        ]);
    }
}
