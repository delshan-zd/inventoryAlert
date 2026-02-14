<?php

namespace App\Events;

use App\Models\Product;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Contracts\Broadcasting\ShouldBroadcastNow;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class ProductStockUpdated implements ShouldBroadcastNow
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * Create a new event instance.
     */
    public $productId;
    public $newStock;
    // for pop up  anotification ,
    public $productName;
    public $transactionType;
   public function __construct(Product $product, $type)
    {
        $this->productId = $product->id;
        $this->newStock=$product->stock;
        $this->productName=$product->name;
        $this->transactionType=$type;
    }


    /**
     * Get the channels the event should broadcast on.
     *
     * @return array<int, \Illuminate\Broadcasting\Channel>
     */
    public function broadcastOn(): array
    {
        return [
            new Channel('dashboard'),
        ];
    }

    public function broadcastWith(): array
    {
        return [
            'productId' => $this->productId,
            'newStock' => $this->newStock,
            'productName' => $this->productName,
            'transactionType' => $this->transactionType,
        ];
    }
    public function broadcastAs(){
        return 'dashboardUpdated';
    }
}
