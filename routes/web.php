<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrderController;


Route::get('/', function () {
    return view('welcome');
});

Route::post(
    '/orders',
    [OrderController::class, 'store']
)->name('orders.store');


Route::post(
    '/orders/{id}/payment',
    [OrderController::class, 'submitPayment']
)->name('orders.payment');