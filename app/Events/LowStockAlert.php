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

class LowStockAlert implements ShouldBroadcastNow
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * Create a new event instance.
     */
    public $productId;
    public $currentStock;

    public $alertThreshold;
    public $productName;

    public function __construct(Product $product)
    {
        $this->productId=$product->id;
        $this->currentStock=$product->stock;
        $this->alertThreshold=$product->alert_threshold;
        $this->productName=$product->name;


    }

    public function broadcastWith(): array
    {
        return [
            'productId' => $this->productId,
            'currentStock' => $this->currentStock,
            'alertThreshold' => $this->alertThreshold,
            'productName' => $this->productName,
        ];
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

    public function broadcastAs()
    {
        return 'dashboard.lowStock.alert';
    }
}
