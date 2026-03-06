<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Admin\PaymentController;
use App\Http\Controllers\Admin\CommissionController;
use App\Http\Controllers\Afiliator\DashboardController as AfiliatorDashboardController;

// Admin Routes
Route::prefix('admin')->name('admin.')->group(function () {
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

    Route::post('/logout', function () {
        return redirect('/');
    })->name('logout');
});

// Afiliator Routes
Route::prefix('afiliator')->name('afiliator.')->group(function () {
    Route::get('/', [AfiliatorDashboardController::class, 'index'])->name('dashboard');
    
    Route::get('/riwayat-penjualan', [AfiliatorDashboardController::class, 'salesHistory'])->name('sales-history');
    
    Route::get('/commissions', [AfiliatorDashboardController::class, 'commissions'])->name('commissions');
    
    Route::post('/commissions/withdraw', function () {
        // placeholder: implement withdrawal logic in controller
        return redirect()->route('afiliator.commissions')->with('status', 'Permintaan penarikan dikirim.');
    })->name('commissions.withdraw');

    Route::post('/logout', function () {
        return redirect('/');
    })->name('logout');
});

