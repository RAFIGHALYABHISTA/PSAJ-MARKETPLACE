<?php

namespace App\Http\Controllers\Customer;

use App\Models\Order;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RiwayatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Mengambil data order milik user yang login
        $orders = Order::with(['orderItems.product'])
            ->where('customer_id', auth()->id())
            // Sesuai permintaan: status yang sedang diproses (selain pending)
            ->where('payment_status', '!=', 'pending')
            ->latest()
            ->paginate(10);

        return view('customer.riwayat', compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        //
    }
}
