<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\AdminOrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OfferController;
use App\Http\Controllers\OfferApiController;


Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/contact', function () {
    return view('contact');
})->name('contact');

Route::view('/shop-all', 'shop-all')->name('shop.all');

Route::view('/combo-offers', 'combo-offers')
    ->name('combo.offers');

Route::get('/special-offers', [OfferApiController::class, 'specialPage'])
    ->name('special.offers');

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


    /*
|--------------------------------------------------------------------------
| Customer-facing Offer Pages and API
|--------------------------------------------------------------------------
*/

Route::get('/combo-offers', [OfferApiController::class, 'comboPage'])
    ->name('combo.offers');

Route::get('/special-offers', [OfferApiController::class, 'specialPage'])
    ->name('special.offers');

Route::get('/api/offers/{type}', [OfferApiController::class, 'index'])
    ->whereIn('type', ['combo', 'special'])
    ->name('offers.api');


/*
|--------------------------------------------------------------------------
| Admin Offer Management
|--------------------------------------------------------------------------
*/

Route::middleware('admin')
    ->name('admin.')
    ->name('admin.')
    ->group(function () {

        Route::get('/offers/{type}', [OfferController::class, 'index'])
            ->whereIn('type', ['combo', 'special'])
            ->name('offers.index');

        Route::get('/offers/{type}/create', [OfferController::class, 'create'])
            ->whereIn('type', ['combo', 'special'])
            ->name('offers.create');

        Route::post('/offers/{type}', [OfferController::class, 'store'])
            ->whereIn('type', ['combo', 'special'])
            ->name('offers.store');

        Route::get('/offers/{type}/{offer}/edit', [OfferController::class, 'edit'])
            ->whereIn('type', ['combo', 'special'])
            ->name('offers.edit');

        Route::put('/offers/{type}/{offer}', [OfferController::class, 'update'])
            ->whereIn('type', ['combo', 'special'])
            ->name('offers.update');

        Route::delete('/offers/{type}/{offer}', [OfferController::class, 'destroy'])
            ->whereIn('type', ['combo', 'special'])
            ->name('offers.destroy');
    });


