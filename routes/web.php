<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('customer.home');
});
Route::get('/produk', function () {
    return view('customer.produk');
});
// Route::get('/', function () {
//     return view('customer.produk');
// });
