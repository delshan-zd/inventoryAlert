<?php

use App\Events\ConnectionTest;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\TransactionsController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

// my routes



Route::get('/test', function () {
    ConnectionTest::dispatch('cdcf');
    return "Tower is sending signal!";
});

Route::middleware(['auth'])->group(function(){
    Route::get('/products/search',[ProductController::class,'search'])
        ->name('products.search');

    Route::resource('products', ProductController::class);
    Route::post('/transactions/create', [TransactionsController::class, 'create']);

    Route::get('/notifications', [NotificationController::class, 'index']);


//reports
    Route::get('/reports', [ReportController::class, 'index'])->name('reports.index');
    Route::get('/reports/export', [ReportController::class, 'export'])->name('reports.export');
});


