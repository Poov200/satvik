<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\AdminOrderController;
use App\Http\Controllers\ProductController;


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

// ===============================
// ADMIN LOGIN
// ===============================

Route::get('/admin/login', [AdminAuthController::class, 'login'])
    ->name('admin.login');

Route::post('/admin/login', [AdminAuthController::class, 'authenticate'])
    ->name('admin.authenticate');

Route::post('/admin/logout', [AdminAuthController::class, 'logout'])
    ->name('admin.logout');


// ===============================
// ADMIN PANEL
// ===============================

Route::middleware('admin')->prefix('admin')->group(function () {

    Route::get('/orders', [AdminOrderController::class, 'index'])
        ->name('admin.orders');

    Route::post('/orders/{id}/status', [AdminOrderController::class, 'updateStatus'])
        ->name('admin.orders.status');

    Route::post('/orders/{id}/paid', [AdminOrderController::class, 'markPaid'])
        ->name('admin.orders.paid');

});



Route::get('/api/products', [ProductController::class, 'index'])
    ->name('products.index');

Route::middleware('admin')->group(function () {

    Route::post('/admin/products', [ProductController::class, 'store'])
        ->name('admin.products.store');

});






/*
|--------------------------------------------------------------------------
| Customer API
|--------------------------------------------------------------------------
*/

Route::get(
    '/api/products',
    [ProductController::class, 'index']
)->name('products.index');


/*
|--------------------------------------------------------------------------
| Admin Products
|--------------------------------------------------------------------------
*/

Route::middleware('admin')
    ->prefix('admin')
    ->group(function () {

        // Products
        Route::get(
            '/products',
            [ProductController::class, 'adminIndex']
        )->name('admin.products');


        // Add product page
        Route::get(
            '/products/create',
            [ProductController::class, 'create']
        )->name('admin.products.create');


        // Store product
        Route::post(
            '/products',
            [ProductController::class, 'store']
        )->name('admin.products.store');


        // Edit page
        Route::get(
            '/products/{id}/edit',
            [ProductController::class, 'edit']
        )->name('admin.products.edit');


        // Update product
        Route::put(
            '/products/{id}',
            [ProductController::class, 'update']
        )->name('admin.products.update');


        // Active / inactive
        Route::post(
            '/products/{id}/toggle-status',
            [ProductController::class, 'toggleStatus']
        )->name('admin.products.toggle');


        // Delete
        Route::delete(
            '/products/{id}',
            [ProductController::class, 'destroy']
        )->name('admin.products.delete');

    });