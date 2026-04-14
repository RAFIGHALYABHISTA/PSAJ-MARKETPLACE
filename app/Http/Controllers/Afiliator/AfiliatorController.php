<?php

namespace App\Http\Controllers\Afiliator;

use App\Http\Controllers\Controller;
use App\Models\Affiliator;
use App\Models\User;
use App\Models\Withdrawal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class AfiliatorController extends Controller
{
    /**
     * Menampilkan form pendaftaran afiliator
     */
    public function showRegisterForm()
    {
        $bank = ['BCA', 'MANDIRI', 'BRI', 'GOPAY', 'DANA', 'OVO'];

        // Cek jika user sudah terdaftar
        if (auth()->user()->affiliatorProfile()->exists()) {
            return redirect()->route('afiliator.dashboard')->with('info', 'Anda sudah terdaftar sebagai afiliator');
        }

        return view('afiliator.register', compact('bank'));
    }

    /**
     * Menyimpan data pendaftaran afiliator
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'phone' => 'required|string|min:10',
            'address' => 'required|string|min:10',
            'bank_name' => 'required|string',
            'bank_account_number' => 'required|string|min:5',
            'bank_account_name' => 'required|string|min:3',
            'agree_terms' => 'accepted',
        ]);

        try {
            DB::beginTransaction();

            $affiliator = Affiliator::create([
                'user_id' => auth()->id(),
                'phone' => $validated['phone'],
                'address' => $validated['address'],
                'bank_name' => $validated['bank_name'],
                'bank_account_number' => $validated['bank_account_number'],
                'bank_account_name' => $validated['bank_account_name'],
                'status' => 'aktif', // atau 'pending' jika butuh approval admin
                'referral_code' => strtoupper(substr(auth()->user()->name, 0, 3)) . rand(100, 999),
            ]);

            auth()->user()->update(['role' => 'affiliator']);

            DB::commit();

            return redirect()->route('afiliator.dashboard')->with('success', 'Pendaftaran berhasil!');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->withInput()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    /**
     * Dashboard Utama Afiliator
     */
    public function dashboard()
    {
        $user = auth()->user();
        $affiliator = $user->affiliatorProfile;

        if (!$affiliator) {
            return redirect()->route('afiliator.register');
        }

        // Ambil data awal untuk render pertama (SSR)
        $data = $this->calculateMetrics($user, $affiliator);
        $chart = $this->getChartData($user);

        return view('afiliator.dashboard', array_merge($data, $chart, [
            'affiliator' => $affiliator,
            'referralCode' => $affiliator->referral_code,
        ]));
    }

    /**
     * API untuk Update Dashboard Realtime (AJAX)
     */
    public function getDashboardData()
    {
        $user = auth()->user();
        $affiliator = $user->affiliatorProfile;

        if (!$affiliator) {
            return response()->json(['error' => 'Unauthorized'], 403);
        }

        $metrics = $this->calculateMetrics($user, $affiliator);
        $chart = $this->getChartData($user);

        return response()->json(array_merge($metrics, $chart));
    }

    /**
     * Helper: Hitung Metrik Komisi & Penjualan
     */
    private function calculateMetrics($user, $affiliator)
    {
        $allCommissions = $user->commissions();
        
        // Komisi yang sudah disetujui
        $totalApproved = (float) $allCommissions->where('status', 'approved')->sum('amount');

        // Total yang ditarik (pending/approved/paid) untuk menghitung sisa saldo
        $totalWithdrawn = (float) Withdrawal::where('affiliator_id', $affiliator->id)
            ->whereIn('status', ['pending', 'approved', 'paid'])
            ->sum('amount');

        // Sisa Saldo Realtime
        $availableBalance = $totalApproved - $totalWithdrawn;

        // Produk terjual (Relasi orderItems)
        $totalProductsSold = $user->affiliatedOrders()
            ->with('orderItems')
            ->get()
            ->flatMap->orderItems
            ->sum('quantity');

        // Komisi bulan ini
        $currentMonthCommissions = (float) $user->commissions()
            ->where('status', 'approved')
            ->whereMonth('created_at', now()->month)
            ->whereYear('created_at', now()->year)
            ->sum('amount');

        return [
            'totalCommissions' => $availableBalance, // Tampil sebagai saldo tersedia
            'totalProductsSold' => $totalProductsSold,
            'currentMonthCommissions' => $currentMonthCommissions,
        ];
    }

    /**
     * Helper: Ambil data chart 7 hari terakhir
     */
    private function getChartData($user)
    {
        $chartLabels = [];
        $chartData = [];

        for ($i = 6; $i >= 0; $i--) {
            $date = now()->subDays($i);
            $chartLabels[] = $date->format('d M');

            $salesCount = $user->affiliatedOrders()
                ->whereDate('created_at', $date)
                ->with('orderItems')
                ->get()
                ->flatMap->orderItems
                ->sum('quantity');

            $chartData[] = $salesCount;
        }

        return [
            'chartLabels' => $chartLabels,
            'chartData' => $chartData,
        ];
    }

    /**
     * Riwayat Penjualan
     */
    public function salesHistory()
    {
        $salesHistory = auth()->user()->affiliatedOrders()
            ->with(['customer', 'orderItems.product'])
            ->latest()
            ->paginate(20);

        return view('afiliator.sales-history', compact('salesHistory'));
    }

    /**
     * Halaman Komisi & Penarikan
     */
    public function commissions()
    {
        $user = auth()->user();
        $affiliator = $user->affiliatorProfile;

        // Hitung Saldo Tersedia
        $metrics = $this->calculateMetrics($user, $affiliator);

        // Riwayat Penarikan (Menggunakan hasManyThrough yang sudah diperbaiki di Model User)
        $commissionHistory = $user->withdrawals()
            ->latest()
            ->paginate(15);

        return view('afiliator.commissions', [
            'available' => $metrics['totalCommissions'],
            'commissionHistory' => $commissionHistory,
            'affiliator' => $affiliator,
        ]);
    }

    /**
     * Proses Request Penarikan (Withdraw)
     */
    public function withdraw(Request $request)
    {
        $request->validate([
            'amount' => 'required|numeric|min:10000',
        ]);

        $user = auth()->user();
        $affiliator = $user->affiliatorProfile;

        // Validasi Saldo Lagi (Server Side)
        $metrics = $this->calculateMetrics($user, $affiliator);

        if ($request->amount > $metrics['totalCommissions']) {
            return back()->with('error', 'Saldo komisi tidak mencukupi.');
        }

        Withdrawal::create([
            'affiliator_id' => $affiliator->id,
            'amount' => $request->amount,
            'status' => 'pending',
            'bank_name' => $affiliator->bank_name,
            'bank_account_number' => $affiliator->bank_account_number,
            'bank_account_name' => $affiliator->bank_account_name,
        ]);

        return back()->with('success', 'Permintaan penarikan telah dikirim.');
    }
}