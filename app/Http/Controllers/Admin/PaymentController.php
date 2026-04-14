<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Payment;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    /**
     * Display a listing of payments (transaksi QRIS).
     */
    public function index()
    {
        $payments = Payment::with(['order', 'verifiedBy'])
            ->latest()
            ->paginate(15);

        $stats = [
            'pending' => Payment::where('status', 'pending')->count(),
            'verified' => Payment::where('status', 'verified')->count(),
            'failed' => Payment::where('status', 'failed')->count(),
        ];

        return view('admin.transaksi-qris', [
            'payments' => $payments,
            'stats' => $stats,
        ]);
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
    public function show(Payment $payment)
    {
        $payment->load(['order', 'verifiedBy']);
        return view('admin.payment-detail', ['payment' => $payment]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Payment $payment)
    { {
            $payment->load(['order.customer', 'order.orderItems.product', 'order.affiliator', 'verifiedBy']);
            return view('admin.transaksi-qris-detail', compact('payment'));
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Payment $payment)
    {
        $validated = $request->validate([
            'status' => 'required|in:pending,verified,failed',
            'verified_by' => 'nullable|exists:users,id',
        ]);

        if ($validated['status'] === 'verified') {
            $validated['verified_by'] = auth()->id();
        }

        $payment->update(['status' => $request->status]);
        return redirect()->back()->with('success', 'Status pembayaran diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Payment $payment)
    {
        $payment->delete();
        return back()->with('success', 'Pembayaran berhasil dihapus');
    }
}
