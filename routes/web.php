<?php
// routes/web.php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\TopupController;
use App\Http\Controllers\TransactionController;
use Illuminate\Support\Facades\Route;

// Home route dengan controller
Route::get('/', [HomeController::class, 'index'])->name('home');

// Authentication routes (from Breeze) - UNCOMMENT ini
require __DIR__.'/auth.php';

// Public product routes
Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::get('/products/{product}', [ProductController::class, 'show'])->name('products.show');

// Authenticated user routes
Route::middleware(['auth'])->group(function () {
    // Cart routes
    Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
    Route::post('/cart/add/{product}', [CartController::class, 'add'])->name('cart.add');
    Route::put('/cart/update/{itemId}', [CartController::class, 'update'])->name('cart.update');
    Route::delete('/cart/remove/{itemId}', [CartController::class, 'remove'])->name('cart.remove');
    Route::post('/cart/clear', [CartController::class, 'clear'])->name('cart.clear');

    // Checkout
    Route::post('/checkout', [CheckoutController::class, 'process'])->name('checkout.process');

    // Topup routes
    Route::get('/topup', [TopupController::class, 'index'])->name('topup.index');
    Route::get('/topup/create', [TopupController::class, 'create'])->name('topup.create');
    Route::post('/topup', [TopupController::class, 'store'])->name('topup.store');

    // Service routes
    Route::get('/service', [ServiceController::class, 'index'])->name('service.index');
    Route::get('/service/create', [ServiceController::class, 'create'])->name('service.create');
    Route::post('/service', [ServiceController::class, 'store'])->name('service.store');

    // Transaction history
    Route::get('/transactions', [TransactionController::class, 'index'])->name('transactions.index');
});

// Admin routes dengan middleware manual
Route::prefix('admin')->name('admin.')->group(function () {
    // Dashboard
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');

    // Products management
    Route::get('/products', [AdminController::class, 'products'])->name('products.index');
    Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
    Route::post('/products', [ProductController::class, 'store'])->name('products.store');
    Route::get('/products/{product}/edit', [ProductController::class, 'edit'])->name('products.edit');
    Route::put('/products/{product}', [ProductController::class, 'update'])->name('products.update');
    Route::delete('/products/{product}', [ProductController::class, 'destroy'])->name('products.destroy');

    // Topup management
    Route::get('/topups', [TopupController::class, 'adminIndex'])->name('topup.index');
    Route::post('/topups/{topup}/approve', [TopupController::class, 'approve'])->name('topup.approve');
    Route::post('/topups/{topup}/reject', [TopupController::class, 'reject'])->name('topup.reject');

    // Service management
    Route::get('/services', [ServiceController::class, 'adminIndex'])->name('service.index');
    Route::put('/services/{service}/status', [ServiceController::class, 'updateStatus'])->name('service.update-status');
});