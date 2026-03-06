<?php

namespace App\Http\Controllers\Afiliator;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Commission;
use Illuminate\Http\Request;
use Carbon\Carbon;

class DashboardController extends Controller
{
    /**
     * Show afiliator dashboard with summary data.
     */
    public function index(Request $request)
    {
        $user = auth()->user();
        $affiliatorId = $user->id ?? null;

        // Total produk terjual menggunakan kode referal milik afiliator
        $totalProductsSold = $affiliatorId ? \App\Models\OrderItem::whereHas('order', function($query) use ($affiliatorId) {
            $query->where('affiliator_id', $affiliatorId);
        })->sum('quantity') : 0;

        // Total komisi yang didapat / saldo affiliator
        $totalCommissions = $affiliatorId ? (float) Commission::where('affiliator_id', $affiliatorId)->sum('amount') : 0;

        // Komisi bulan ini
        $currentMonthCommissions = $affiliatorId ? (float) Commission::where('affiliator_id', $affiliatorId)
            ->whereYear('created_at', Carbon::now()->year)
            ->whereMonth('created_at', Carbon::now()->month)
            ->sum('amount') : 0;

        $recentOrders = $affiliatorId ? Order::with('customer')->where('affiliator_id', $affiliatorId)->latest()->take(8)->get() : collect();
        $recentCommissions = $affiliatorId ? Commission::where('affiliator_id', $affiliatorId)->latest()->take(6)->get() : collect();

        $today = Carbon::today();
        $chartLabels = [];
        $chartData = [];

        for ($i = 6; $i >= 0; $i--) {
            $date = $today->copy()->subDays($i);
            $label = $date->format('d M');
            $chartLabels[] = $label;

            if ($affiliatorId) {
                $sum = (int) \App\Models\OrderItem::whereHas('order', function($query) use ($affiliatorId, $date) {
                    $query->where('affiliator_id', $affiliatorId)
                          ->whereDate('created_at', $date->toDateString());
                })->sum('quantity');
            } else {
                $sum = 0;
            }

            $chartData[] = $sum;
        }

        $conversionRate = null; // placeholder; calculation can be added later

        return view('afiliator.dashboard', compact(
            'totalProductsSold',
            'totalCommissions',
            'currentMonthCommissions',
            'recentOrders',
            'recentCommissions',
            'chartLabels',
            'chartData',
            'conversionRate'
        ));
    }

    /**
     * Show sales history for afiliator.
     */
    public function salesHistory(Request $request)
    {
        $user = auth()->user();
        $affiliatorId = $user->id ?? null;

        $salesHistory = $affiliatorId ? Order::with(['customer', 'orderItems.product'])
            ->where('affiliator_id', $affiliatorId)
            ->latest()
            ->paginate(15) : collect();

        return view('afiliator.sales-history', compact('salesHistory'));
    }

    /**
     * Show commission history generated from referral sales.
     */
    public function commissions(Request $request)
    {
        $user = auth()->user();
        $affiliatorId = $user->id ?? null;

        $commissionHistory = $affiliatorId ? Commission::with('order')
            ->where('affiliator_id', $affiliatorId)
            ->latest()
            ->paginate(15) : collect();

        // also compute available balance maybe? but view currently fixed
        $available = $affiliatorId ? (float) Commission::where('affiliator_id', $affiliatorId)->sum('amount') : 0;

        return view('afiliator.commissions', compact('commissionHistory', 'available'));
    }
}
