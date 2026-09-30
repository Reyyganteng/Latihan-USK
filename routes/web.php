<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])
    ->name('home');
        
// KATALOG
Route::get('/katalog', [ProductController::class, 'index'])
    ->name('products.index');

Route::get('/produk/{product}', [ProductController::class, 'show'])
    ->name('products.show');

// ADMIN PRODUK
Route::prefix('admin')
    ->name('admin.')
    ->group(function () {

        Route::get('/produk', [ProductController::class, 'adminIndex'])
            ->name('products.index');

        Route::get('/produk/create', [ProductController::class, 'create'])
            ->name('products.create');

        Route::post('/produk', [ProductController::class, 'store'])
            ->name('products.store');

        Route::get('/produk/{product}/edit', [ProductController::class, 'edit'])
            ->name('products.edit');

        Route::put('/produk/{product}', [ProductController::class, 'update'])
            ->name('products.update');

        Route::delete('/produk/{product}', [ProductController::class, 'destroy'])
            ->name('products.destroy');
    });