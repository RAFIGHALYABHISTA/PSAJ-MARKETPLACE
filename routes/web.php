<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('customer.home');
});
Route::get('/produk', function () {
    return view('customer.produk');
});
Route::get('/keranjang', function () {
    return view('customer.keranjang');
});
Route::get('/login', function () {
    return view('customer.login');
});
Route::get('/regis', function () {
    return view('customer.regis');
});
