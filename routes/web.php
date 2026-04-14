<?php

use App\Http\Controllers\Admin\CommissionController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\PaymentController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Afiliator\AfiliatorController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Customer\CheckoutController;
use App\Http\Controllers\Customer\HomeController;
use App\Http\Controllers\Customer\KeranjangController;
use App\Http\Controllers\Customer\ProductsController;
use App\Http\Controllers\Customer\RiwayatController;
use App\Http\Controllers\Customer\TransaksiController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


// ==================================
// PUBLIC ROUTES (Customer)
// ==================================

Route::middleware('auth')->group(function () {
    Route::get('/keranjang', [KeranjangController::class, 'index'])->name('customer.keranjang');
    Route::post('/keranjang', [KeranjangController::class, 'store'])->name('customer.keranjang.store');
    Route::post('/keranjang/checkout', [KeranjangController::class, 'checkout'])->name('customer.keranjang.checkout');
    Route::patch('/keranjang/{keranjang}', [KeranjangController::class, 'update'])->name('customer.keranjang.update');
    Route::delete('/keranjang/{keranjang}', [KeranjangController::class, 'destroy'])->name('customer.keranjang.destroy');

    Route::get('/transaksi/{product}', [TransaksiController::class, 'show'])->name('customer.transaksi.show');
    Route::post('/transaksi/{product}/bayar', [TransaksiController::class, 'buyNow'])->name('customer.transaksi.bayar');

    // Tambah ini
    Route::get('/checkout/riwayat/{order}', [CheckoutController::class, 'success'])->name('customer.riwayat');

    Route::get('/check-referral', [CheckoutController::class, 'checkReferral'])->name('customer.check-referral');

    Route::get('/riwayat', [RiwayatController::class, 'index'])->name('customer.pesanan');
});

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/produk', [ProductsController::class, 'index'])->name('customer.produk');

Route::get('/about', function () {
    return view('customer.about');
})->name('customer.about');

Route::get('/testimoni', function () {
    return view('customer.testimoni');
})->name('customer.testimoni');



Route::get('/contact', function () {
    return view('customer.contact');
})->name('customer.contact');

Route::get('/artikel', function () {
    return view('customer.artikel');
})->name('customer.artikel');

Route::get('/edit-profil', function () {
    return view('customer.edit-profil');
})->name('customer.edit-profil');
Route::get('/edit-profil1', function () {
    return view('customer.edit-profil1');
})->name('customer.edit-profil1');

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

    Route::patch('/orders/{order}/confirm-payment', [OrderController::class, 'confirmPayment'])
        ->name('orders.confirm-payment');

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

    Route::get('/rekap-penjualan', function () {
        return view('admin.rekap-penjualan');
    })->name('rekap-penjualan');

    Route::get('/manajemen-produk', [ProductController::class, 'manajemen'])->name('manajemen-produk');

    Route::get('/katalog-produk', [ProductController::class, 'katalog'])->name('katalog-produk');

    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});

// Afiliator Routes
Route::prefix('afiliator')->name('afiliator.')->group(function () {
    Route::get('/affiliator', [AfiliatorController::class, 'dashboard'])->name('dashboard');

    Route::get('/riwayat-penjualan', [AfiliatorController::class, 'salesHistory'])->name('sales-history');

    Route::get('/commissions', [AfiliatorController::class, 'commissions'])->name('commissions');

    Route::post('/commissions/withdraw', function () {
        // placeholder: implement withdrawal logic in controller
        return redirect()->route('afiliator.commissions')->with('status', 'Permintaan penarikan dikirim.');
    })->name('commissions.withdraw');

    Route::get('/register', [AfiliatorController::class, 'showRegisterForm'])->name('register');
    Route::post('/register', [AfiliatorController::class, 'store'])->name('store');


    Route::post('/logout', function () {
        return redirect('/');
    })->name('logout');
});
