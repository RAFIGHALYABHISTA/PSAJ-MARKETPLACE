<?php

namespace App\Http\Controllers\Afiliator;

use App\Http\Controllers\Controller;
use App\Models\Affiliator;
use App\Models\Commission;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CommissionController extends Controller
{
    /**
     * Display a listing of commissions for the authenticated affiliator.
     */
    public function index()
    {
        $affiliator = auth()->user()->affiliator;

        if (!$affiliator) {
            return redirect()->back()->with('error', 'Anda belum terdaftar sebagai affiliator.');
        }

        $commissions = Commission::where('affiliator_id', $affiliator->id)
            ->with('order')
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('afiliator.commissions.index', compact('commissions', 'affiliator'));
    }

    /**
     * Calculate commission for an order.
     * This method should be called when an order is placed with a referral code.
     */
    public function calculateCommission(Order $order)
    {
        DB::transaction(function () use ($order) {
            // Find affiliator by referral code
            $affiliator = Affiliator::where('referral_code', $order->referral_code)->first();

            if (!$affiliator || $affiliator->status !== 'aktif') {
                return;
            }

            // Calculate commission amount (e.g., 10% of total product price)
            $commissionAmount = $order->total_product_price * 0.10;

            // Create commission record
            Commission::create([
                'order_id' => $order->id,
                'affiliator_id' => $affiliator->id,
                'amount' => $commissionAmount,
                'status' => 'pending',
            ]);

            // Update affiliator's pending balance
            $affiliator->increment('pending_balance', $commissionAmount);
        });
    }

    /**
     * Approve a commission (admin only).
     */
    public function approve(Request $request, Commission $commission)
    {
        $this->authorize('approve', Commission::class);

        DB::transaction(function () use ($commission) {
            $commission->update(['status' => 'approved']);

            // Update affiliator's total commissions and pending balance
            $affiliator = $commission->affiliator;
            $affiliator->increment('total_commissions', $commission->amount);
            $affiliator->decrement('pending_balance', $commission->amount);
        });

        return redirect()->back()->with('success', 'Komisi berhasil disetujui.');
    }

    /**
     * Reject a commission (admin only).
     */
    public function reject(Request $request, Commission $commission)
    {
        $this->authorize('reject', Commission::class);

        $commission->update(['status' => 'rejected']);

        // Update affiliator's pending balance
        $affiliator = $commission->affiliator;
        $affiliator->decrement('pending_balance', $commission->amount);

        return redirect()->back()->with('success', 'Komisi berhasil ditolak.');
    }

    /**
     * Process withdrawal request.
     */
    public function withdraw(Request $request)
    {
        $request->validate([
            'amount' => 'required|integer|min:10000',
        ]);

        $affiliator = auth()->user()->affiliator;

        if (!$affiliator || $affiliator->status !== 'aktif') {
            return redirect()->back()->with('error', 'Anda belum terdaftar sebagai affiliator aktif.');
        }

        $availableBalance = $affiliator->total_commissions - $affiliator->total_withdrawals;

        if ($request->amount > $availableBalance) {
            return redirect()->back()->with('error', 'Saldo tidak mencukupi.');
        }

        // Create withdrawal record
        $affiliator->withdrawals()->create([
            'amount' => $request->amount,
            'status' => 'pending',
        ]);

        return redirect()->back()->with('success', 'Permintaan penarikan berhasil diajukan.');
    }

    /**
     * Update affiliator's commission totals.
     * This can be called periodically or after certain events.
     */
    public function updateTotals(Affiliator $affiliator)
    {
        $totalCommissions = $affiliator->commissions()->where('status', 'approved')->sum('amount');
        $totalWithdrawals = $affiliator->withdrawals()->where('status', 'approved')->sum('amount');
        $pendingBalance = $affiliator->commissions()->where('status', 'pending')->sum('amount');

        $affiliator->update([
            'total_commissions' => $totalCommissions,
            'total_withdrawals' => $totalWithdrawals,
            'pending_balance' => $pendingBalance,
        ]);
    }
}
