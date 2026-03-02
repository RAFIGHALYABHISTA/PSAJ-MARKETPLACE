<?php

namespace App\Http\Controllers\Afiliator;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Order;
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

        $totalProducts = Product::count();
        $totalOrders = $affiliatorId ? Order::where('affiliator_id', $affiliatorId)->count() : 0;
        $totalCommissions = $affiliatorId ? (float) Commission::where('affiliator_id', $affiliatorId)->sum('amount') : 0;

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
                $sum = (float) Commission::where('affiliator_id', $affiliatorId)
                    ->whereDate('created_at', $date->toDateString())
                    ->sum('amount');
            } else {
                $sum = 0;
            }

            $chartData[] = $sum;
        }

        $conversionRate = null; // placeholder; calculation can be added later

        return view('afiliator.dashboard', compact(
            'totalProducts',
            'totalOrders',
            'totalCommissions',
            'recentOrders',
            'recentCommissions',
            'chartLabels',
            'chartData',
            'conversionRate'
        ));
    }
}
