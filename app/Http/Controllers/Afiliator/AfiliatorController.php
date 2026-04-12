<?php

namespace App\Http\Controllers\Afiliator;

use App\Http\Controllers\Controller;
use App\Models\Affiliator;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Withdrawal;

class AfiliatorController extends Controller
{
    /**
     * Show affiliator registration form
     */

    public function showRegisterForm()
    {
        $bank = ['BCA', 'Mandiri', 'BRI', 'GoPay'];
        // Check if user already registered as affiliator
        if (auth()->user()->affiliatorProfile()->exists()) {
            return redirect()->route('home')->with('info', 'Anda sudah terdaftar sebagai affiliator');
        }

        return view('afiliator.register', compact('bank'));
    }

    /**
     * Store affiliator registration
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'phone' => 'required|string|min:10',
            'address' => 'required|string|min:10',
            'bank_name' => 'required|string|min:3|max:50',
            'bank_account_number' => 'required|string|min:5|max:20',
            'bank_account_name' => 'required|string|min:3|max:100',
            'agree_terms' => 'accepted',
        ], [
            'phone.required' => 'Nomor telepon wajib diisi',
            'phone.min' => 'Nomor telepon minimal 10 digit',
            'address.required' => 'Alamat wajib diisi',
            'address.min' => 'Alamat minimal 10 karakter',
            'bank_name.required' => 'Nama bank wajib diisi',
            'bank_account_number.required' => 'Nomor rekening wajib diisi',
            'bank_account_name.required' => 'Nama pemilik rekening wajib diisi',
            'agree_terms.accepted' => 'Anda harus menyetujui syarat dan ketentuan',
        ]);

        try {
            DB::beginTransaction();

            // Create affiliator profile
            $affiliator = Affiliator::create([
                'user_id' => auth()->id(),
                'phone' => $validated['phone'],
                'address' => $validated['address'],
                'bank_name' => $validated['bank_name'],
                'bank_account_number' => $validated['bank_account_number'],
                'bank_account_name' => $validated['bank_account_name'],
                'status' => 'aktif',
            ]);

            // Update user role to affiliator
            auth()->user()->update(['role' => 'affiliator']);

            DB::commit();

            return redirect()->route('afiliator.dashboard')
                ->with('success', 'Pendaftaran berhasil! Akun Anda sedang menunggu persetujuan dari admin. Anda akan mendapatkan notifikasi ketika akun diaktifkan.');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->withInput()->with('error', 'Terjadi kesalahan saat mendaftar sebagai affiliator. Silakan coba lagi.');
        }
    }

    /**
     * Show affiliator dashboard (protected route for affiliators only)
     */
    public function dashboard()
    {

        $user = auth()->user();
        $affiliator = $user->affiliatorProfile;

        if (!$affiliator) {
            return redirect()->route('afiliator.register');
        }

        // if ($affiliator->status === 'pending') {
        //     return view('afiliator.waiting_approval'); // Buat view khusus "Mohon Tunggu"
        // }

        // Get commissions and sales data
        $allCommissions = $user->commissions()->get();
        $totalCommissions = $allCommissions->where('status', 'approved')->sum('amount');
        $pendingCommissions = $allCommissions->where('status', 'pending')->sum('amount');

        // Total products sold (sum of order items quantity from affiliated orders)
        $totalProductsSold = $user->affiliatedOrders()
            ->with('items')
            ->get()
            ->flatMap->items
            ->sum('quantity');

        // Commission this month
        $currentMonthCommissions = $user->commissions()
            ->where('status', 'approved')
            ->whereMonth('created_at', now()->month)
            ->whereYear('created_at', now()->year)
            ->sum('amount');

        // Chart data - last 30 days
        $chartLabels = [];
        $chartData = [];
        for ($i = 29; $i >= 0; $i--) {
            $date = now()->subDays($i);
            $chartLabels[] = $date->format('d M');

            $salesCount = $user->affiliatedOrders()
                ->with('items')
                ->whereDate('created_at', $date)
                ->get()
                ->flatMap->items
                ->sum('quantity');

            $chartData[] = $salesCount;
        }

        return view('afiliator.dashboard', [
            'affiliator' => $affiliator,
            'totalCommissions' => $totalCommissions,
            'pendingCommissions' => $pendingCommissions,
            'totalProductsSold' => $totalProductsSold,
            'currentMonthCommissions' => $currentMonthCommissions,
            'chartLabels' => $chartLabels,
            'chartData' => $chartData,
            'referralCode' => $affiliator->referral_code,
        ]);
    }

    /**
     * Show sales history for affiliator
     */
    public function salesHistory()
    {
        $user = auth()->user();

        $salesHistory = $user->affiliatedOrders()
            ->with(['customer', 'items.product'])
            ->latest()
            ->paginate(20);

        return view('afiliator.sales-history', [
            'salesHistory' => $salesHistory,
        ]);
    }

    /**
     * Show commissions for affiliator
     */
    public function commissions()
    {
        $user = auth()->user();

        // Get affiliator profile
        $affiliator = $user->affiliatorProfile;

        // Available balance = approved commissions - withdrawals
        $approvedCommissions = $user->commissions()
            ->where('status', 'approved')
            ->sum('amount');

        $withdrawals = Withdrawal::where('affiliator_id', $affiliator->id)
            ->whereIn('status', ['approved', 'paid'])
            ->sum('amount');

        $available = $approvedCommissions - $withdrawals;

        // Commission history
        $commissionHistory = $user->commissions()
            ->with('order')
            ->latest()
            ->paginate(15);

        return view('afiliator.commissions', [
            'available' => $available,
            'commissionHistory' => $commissionHistory,
            'affiliator' => $affiliator,
        ]);
    }
}
