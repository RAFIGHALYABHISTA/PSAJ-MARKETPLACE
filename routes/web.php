<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\CommissionController;
use App\Http\Controllers\AuthController;

// ==================================
// PUBLIC ROUTES (Customer)
// ==================================

// Home route - show if not authenticated
Route::get('/', function () {
    return view('customer.home');
})->name('home');
Route::get('/transaksi', function () {
    return view('customer.transaksi');
})->name('customer.transaksi');

// Customer facing routes
Route::get('/produk', function () {
    return view('customer.produk');
})->name('customer.produk');

Route::get('/about', function () {
    return view('customer.about');
})->name('customer.about');

Route::get('/keranjang', function () {
    return view('customer.keranjang');
})->name('customer.keranjang');
Route::get('/testimoni', function () {
    return view('customer.testimoni');
})->name('customer.testimoni');
Route::get('/contact', function () {
    return view('customer.contact');
})->name('customer.contact');
Route::get('/artikel', function () {
    return view('customer.artikel');
})->name('customer.artikel');

// ==================================
// AUTH ROUTES (Guest only)
// ==================================
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('auth.login');
    Route::post('/login', [AuthController::class, 'authenticate'])->name('auth.authenticate');
    
    Route::get('/register', [AuthController::class, 'showRegister'])->name('auth.register');
    Route::post('/register', [AuthController::class, 'register'])->name('auth.register.store');
    
    // Alias untuk /regis
    Route::get('/regis', function () {
        return redirect()->route('auth.register');
    });
});

// ==================================
// LOGOUT (Protected)
// ==================================
Route::middleware('auth')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('auth.logout');
});

// Admin Routes (protected by auth + admin middleware)
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    Route::resource('produk', ProductController::class, [
        'names' => [
            'index' => 'produk',
            'create' => 'produk.create',
            'store' => 'produk.store',
            'show' => 'produk.show',
            'edit' => 'produk.edit',
            'update' => 'produk.update',
            'destroy' => 'produk.destroy',
        ],
        'parameters' => [
            'produk' => 'product'
        ]
    ]);

    Route::resource('afiliator', UserController::class, [
        'names' => [
            'index' => 'afiliator',
            'create' => 'afiliator.create',
            'store' => 'afiliator.store',
            'show' => 'afiliator.show',
            'edit' => 'afiliator.edit',
            'update' => 'afiliator.update',
            'destroy' => 'afiliator.destroy',
        ],
        'parameters' => [
            'afiliator' => 'user'
        ]
    ]);

    Route::resource('orders', OrderController::class, [
        'names' => [
            'index' => 'orders',
            'create' => 'orders.create',
            'store' => 'orders.store',
            'show' => 'orders.show',
            'edit' => 'orders.edit',
            'update' => 'orders.update',
            'destroy' => 'orders.destroy',
        ]
    ]);

    Route::resource('transaksi-qris', PaymentController::class, [
        'names' => [
            'index' => 'transaksi-qris',
            'create' => 'transaksi-qris.create',
            'store' => 'transaksi-qris.store',
            'show' => 'transaksi-qris.show',
            'edit' => 'transaksi-qris.edit',
            'update' => 'transaksi-qris.update',
            'destroy' => 'transaksi-qris.destroy',
        ],
        'parameters' => [
            'transaksi-qris' => 'payment'
        ]
    ]);

    Route::resource('pencairan', CommissionController::class, [
        'names' => [
            'index' => 'pencairan',
            'create' => 'pencairan.create',
            'store' => 'pencairan.store',
            'show' => 'pencairan.show',
            'edit' => 'pencairan.edit',
            'update' => 'pencairan.update',
            'destroy' => 'pencairan.destroy',
        ],
        'parameters' => [
            'pencairan' => 'commission'
        ]
    ]);

    Route::get('/pengaturan-komisi', function () {
        return view('admin.pengaturan-komisi');
    })->name('pengaturan-komisi');

    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});
