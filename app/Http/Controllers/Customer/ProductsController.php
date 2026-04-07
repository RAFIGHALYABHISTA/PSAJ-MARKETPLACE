<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Product; // Ini kuncinya, ambil data dari model yang sama dengan admin
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function index()
    {
        $products = Product::latest()->take(6)->get(); 

        // Kirim ke view customer
        return view('customer.produk', compact('products'));
    }
}