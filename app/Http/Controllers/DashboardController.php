<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Order;
use App\Models\User;
use App\Models\Commission;
use App\Models\Payment;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display the dashboard.
     */
    public function index()
    {
        // Statistik dasar
        $totalProducts = Product::count();
        $totalOrders = Order::count();
        $totalUsers = User::count();
        $totalAffiliators = User::count();

        // Omzet hari ini
        $todayRevenue = Order::whereDate('created_at', today())
            ->where('payment_status', 'paid')
            ->sum('total_price');

        // Total omzet
        $totalRevenue = Order::where('payment_status', 'paid')
            ->sum('total_price');

        // Komisi menunggu
        $pendingCommissions = Commission::where('status', 'pending')
            ->sum('amount');

        // Order terbaru
        $recentOrders = Order::with(['customer', 'affiliator'])
            ->latest()
            ->take(5)
            ->get();

        // Statistics untuk chart
        $ordersByStatus = [
            'waiting' => Order::where('pickup_status', 'waiting')->count(),
            'ready' => Order::where('pickup_status', 'ready')->count(),
            'taken' => Order::where('pickup_status', 'taken')->count(),
        ];

        return view('admin.dashboard', [
            'totalProducts' => $totalProducts,
            'totalOrders' => $totalOrders,
            'totalUsers' => $totalUsers,
            'totalAffiliators' => $totalAffiliators,
            'todayRevenue' => $todayRevenue,
            'totalRevenue' => $totalRevenue,
            'pendingCommissions' => $pendingCommissions,
            'recentOrders' => $recentOrders,
            'ordersByStatus' => $ordersByStatus,
        ]);
    }
}
