<?php

namespace App\Http\Controllers;

use App\Models\Affiliator;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AfiliatorController extends Controller
{
    /**
     * Show affiliator registration form
     */
    public function showRegisterForm()
    {
        // Check if user already registered as affiliator
        if (auth()->user()->affiliatorProfile()->exists()) {
            return redirect()->route('home')->with('info', 'Anda sudah terdaftar sebagai affiliator');
        }

        return view('afiliator.register');
    }

    /**
     * Store affiliator registration
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'phone' => 'required|string|min:10',
            'address' => 'required|string|min:10',
            'store_name' => 'required|string|min:3|max:100',
            'store_description' => 'required|string|min:20|max:500',
            'platforms' => 'array|min:1',
            'platforms.*' => 'in:instagram,blog,community,other',
            'bank_name' => 'required|string|min:3|max:50',
            'bank_account_number' => 'required|string|min:5|max:20',
            'bank_account_name' => 'required|string|min:3|max:100',
            'agree_terms' => 'accepted',
        ], [
            'phone.required' => 'Nomor telepon wajib diisi',
            'phone.min' => 'Nomor telepon minimal 10 digit',
            'address.required' => 'Alamat wajib diisi',
            'address.min' => 'Alamat minimal 10 karakter',
            'store_name.required' => 'Nama toko wajib diisi',
            'store_name.min' => 'Nama toko minimal 3 karakter',
            'store_description.required' => 'Deskripsi toko wajib diisi',
            'store_description.min' => 'Deskripsi minimal 20 karakter',
            'platforms.required' => 'Pilih minimal satu platform marketing',
            'platforms.min' => 'Pilih minimal satu platform marketing',
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
                'store_name' => $validated['store_name'],
                'store_description' => $validated['store_description'],
                'phone' => $validated['phone'],
                'address' => $validated['address'],
                'platforms' => $validated['platforms'],
                'bank_name' => $validated['bank_name'],
                'bank_account_number' => $validated['bank_account_number'],
                'bank_account_name' => $validated['bank_account_name'],
                'status' => 'pending', // Will be approved by admin
            ]);

            // Update user role to affiliator
            auth()->user()->update(['role' => 'afiliator']);

            DB::commit();

            return redirect()->route('home')
                ->with('success', 'Pendaftaran berhasil! Akun Anda sedang menunggu persetujuan dari admin. Anda akan mendapatkan notifikasi ketika akun diaktifkan.');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()
                ->withInput()
                ->with('error', 'Terjadi kesalahan saat mendaftar. Silakan coba lagi.');
        }
    }

    /**
     * Show affiliator dashboard (protected route for affiliators only)
     */
    public function dashboard()
    {
        $user = auth()->user();
        
        // Get/Create affiliator profile
        $affiliator = $user->affiliatorProfile()->firstOrCreate([
            'user_id' => $user->id,
        ], [
            'store_name' => $user->name . '\'s Store',
            'store_description' => 'Store',
            'status' => 'active',
        ]);

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
        
        $withdrawals = \App\Models\Withdrawal::where('affiliator_id', $affiliator->id)
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
