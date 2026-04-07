<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Product; // Ini kuncinya, ambil data dari model yang sama dengan admin
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // Ambil data produk (sama seperti yang dilakukan admin)
        // Kamu bisa tambah filter, misal cuma ambil 4 produk terbaru
        $products = Product::latest()->take(4)->get(); 

        // Kirim ke view customer
        return view('customer.home', compact('products'));
    }
}