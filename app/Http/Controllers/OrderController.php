<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orders = Order::with(['customer', 'affiliator', 'orderItems'])
            ->latest()
            ->paginate(15);

        return view('admin.orders', ['orders' => $orders]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.order-form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'customer_id' => 'required|exists:users,id',
            'affiliator_id' => 'nullable|exists:users,id',
            'referral_code' => 'nullable|string',
            'total_product_price' => 'required|numeric|min:0',
            'commission_amount' => 'required|numeric|min:0',
            'total_price' => 'required|numeric|min:0',
            'payment_method' => 'required|in:online,offline',
            'payment_status' => 'required|in:pending,paid,failed',
            'pickup_status' => 'required|in:waiting,ready,taken',
            'invoice_number' => 'required|unique:orders,invoice_number',
        ]);

        Order::create($validated);

        return redirect()->route('admin.orders')
            ->with('success', 'Pesanan berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {
        $order->load(['customer', 'affiliator', 'orderItems.product', 'commissions', 'payment']);
        return view('admin.order-detail', ['order' => $order]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $order)
    {
        return view('admin.order-form', ['order' => $order]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Order $order)
    {
        $validated = $request->validate([
            'payment_status' => 'in:pending,paid,failed',
            'pickup_status' => 'in:waiting,ready,taken',
        ]);

        $order->update($validated);

        return redirect()->route('admin.orders')
            ->with('success', 'Pesanan berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        $order->delete();

        return redirect()->route('admin.orders')
            ->with('success', 'Pesanan berhasil dihapus');
    }
}
