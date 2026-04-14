<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Withdrawal;
use Illuminate\Http\Request;

class WithdrawalController extends Controller
{
    /**
     * Display withdrawal requests.
     */
    public function index()
    {
        $withdrawals = Withdrawal::with('affiliator')
            ->latest()
            ->paginate(15);

        $stats = [
            'pending' => Withdrawal::where('status', 'pending')->count(),
            'approved' => Withdrawal::where('status', 'approved')->count(),
            'paid' => Withdrawal::where('status', 'paid')->count(),
            'rejected' => Withdrawal::where('status', 'rejected')->count(),
        ];

        $totalPending = Withdrawal::where('status', 'pending')->sum('amount');
        $totalApproved = Withdrawal::where('status', 'approved')->sum('amount');
        $totalPaid = Withdrawal::where('status', 'paid')->sum('amount');

        return view('admin.withdrawals', [
            'withdrawals' => $withdrawals,
            'stats' => $stats,
            'totalPending' => $totalPending,
            'totalApproved' => $totalApproved,
            'totalPaid' => $totalPaid,
        ]);
    }

    /**
     * Update withdrawal status.
     */
    public function update(Request $request, Withdrawal $withdrawal)
    {
        $validated = $request->validate([
            'status' => 'required|in:pending,approved,paid,rejected',
            'rejection_reason' => 'nullable|string|max:500',
        ]);

        if ($validated['status'] === 'rejected' && empty($validated['rejection_reason'])) {
            return back()->with('error', 'Alasan penolakan wajib diisi untuk status rejected.');
        }

        $withdrawal->load('affiliator.user');

        if ($validated['status'] === 'approved' && ! in_array($withdrawal->status, ['approved', 'paid'], true)) {
            $approvedCommissions = $withdrawal->affiliator->user->commissions()
                ->where('status', 'approved')
                ->sum('amount');

            $reservedWithdrawals = Withdrawal::where('affiliator_id', $withdrawal->affiliator_id)
                ->whereIn('status', ['approved', 'paid'])
                ->sum('amount');

            $availableBalance = $approvedCommissions - $reservedWithdrawals;

            if ($withdrawal->amount > $availableBalance) {
                return back()->with('error', 'Saldo komisi tidak mencukupi untuk menyetujui penarikan ini.');
            }
        }

        $withdrawal->update($validated);

        if ($validated['status'] === 'approved') {
            $withdrawal->update(['approved_at' => now()]);
        }

        $message = match($validated['status']) {
            'approved' => 'Permintaan penarikan telah disetujui. Saldo sudah otomatis terpotong.',
            'paid' => 'Status penarikan telah diperbarui menjadi sudah dibayar.',
            'rejected' => 'Permintaan penarikan telah ditolak.',
            default => 'Status penarikan berhasil diperbarui.',
        };

        return back()->with('success', $message);
    }

    /**
     * Show withdrawal detail.
     */
    public function show(Withdrawal $withdrawal)
    {
        $withdrawal->load('affiliator');
        return view('admin.withdrawal-detail', ['withdrawal' => $withdrawal]);
    }
}