<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RiceController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PaymentController;
use App\Models\Rice;
use App\Models\Order;
use App\Models\Payment;

Route::get('/', function () {
    return view('welcome');
});
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', function () {
        $riceCount = Rice::count();
        $orderCount = Order::count();
        $paymentCount = Payment::count();

        return view('dashboard', compact('riceCount', 'orderCount', 'paymentCount'));
    })->name('dashboard');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



Route::resource('rice', RiceController::class)
    ->except(['show'])
    ->middleware('auth');
Route::resource('orders', OrderController::class)
    ->only(['index', 'create', 'store'])
    ->middleware('auth');
Route::resource('payments', PaymentController::class)
    ->only(['index', 'create', 'store'])
    ->middleware('auth');
Route::put('/payments/{id}/paid', [PaymentController::class, 'updateStatus'])
    ->name('payments.paid');

require __DIR__.'/auth.php';
