<?php

namespace App\Providers;

use App\Events\LowStockAlert;
use App\Events\ProductStockUpdated;
use App\Listeners\StoreLowStockNotification;
use App\Listeners\StoreStockUpdateNotification;
use Illuminate\Support\ServiceProvider;

use Illuminate\Support\Facades\Event;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {

        \Illuminate\Support\Facades\Broadcast::routes();
        Event::listen(
            ProductStockUpdated::class,
            StoreStockUpdateNotification::class
        );

        Event::listen(
            LowStockAlert::class,
            StoreLowStockNotification::class
        );

    }
}
