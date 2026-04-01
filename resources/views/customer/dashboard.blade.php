@extends('layouts.customer')

@section('title', 'Dashboard Customer')

@section('content')
<div class="min-h-screen bg-[#F8FAFC] dark:bg-slate-950 py-12 px-6">
    <div class="max-w-6xl mx-auto">
        <!-- Header -->
        <div class="mb-12">
            <h1 class="text-4xl font-bold text-slate-800 dark:text-white mb-2">
                Halo, {{ auth()->user()->name }}! 👋
            </h1>
            <p class="text-slate-600 dark:text-slate-400">Kelola akun dan kembangkan bisnis Anda bersama Sariayu</p>
        </div>

        <!-- Main Content Grid -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- Sidebar Profile -->
            <div class="lg:col-span-1">
                <div class="bg-white dark:bg-slate-900 rounded-2xl shadow-sm border border-gray-100 dark:border-slate-800 p-6 sticky top-24">
                    <div class="text-center mb-6">
                        <img src="https://ui-avatars.com/api/?name={{ urlencode(auth()->user()->name) }}&background=6366f1&color=fff&size=80" 
                             class="w-20 h-20 rounded-full mx-auto mb-4 border-4 border-indigo-100 dark:border-indigo-500/20">
                        <h2 class="text-xl font-bold text-slate-800 dark:text-white">{{ auth()->user()->name }}</h2>
                        <p class="text-sm text-slate-500 dark:text-slate-400">{{ auth()->user()->email }}</p>
                    </div>

                    <div class="border-t border-gray-100 dark:border-slate-800 pt-6 space-y-3">
                        <a href="{{ route('customer.profile') }}" class="block px-4 py-2.5 bg-indigo-50 dark:bg-indigo-500/10 text-indigo-700 dark:text-indigo-400 rounded-lg text-sm font-bold hover:bg-indigo-100 transition">
                            <i class="fas fa-user mr-2"></i> Edit Profile
                        </a>
                        <a href="{{ route('customer.orders') }}" class="block px-4 py-2.5 hover:bg-gray-100 dark:hover:bg-slate-800 text-slate-700 dark:text-slate-300 rounded-lg text-sm font-bold transition">
                            <i class="fas fa-shopping-bag mr-2"></i> Riwayat Pembelian
                        </a>
                        @if(auth()->user()->role === 'afiliator')
                        <div class="border-t border-gray-100 dark:border-slate-800 pt-3 mt-3">
                            <p class="text-xs font-bold text-slate-500 dark:text-slate-400 uppercase mb-3">Sebagai Affiliator</p>
                            <a href="{{ route('customer.dashboard') }}" class="block px-4 py-2.5 bg-emerald-50 dark:bg-emerald-500/10 text-emerald-700 dark:text-emerald-400 rounded-lg text-sm font-bold hover:bg-emerald-100 transition">
                                <i class="fas fa-chart-line mr-2"></i> Dashboard Affiliator
                            </a>
                        </div>
                        @else
                        <div class="border-t border-gray-100 dark:border-slate-800 pt-3 mt-3">
                            <p class="text-xs font-bold text-slate-500 dark:text-slate-400 uppercase mb-3">Jadilah Affiliator</p>
                            <a href="{{ route('afiliator.register') }}" class="block px-4 py-2.5 bg-emerald-50 dark:bg-emerald-500/10 text-emerald-700 dark:text-emerald-400 rounded-lg text-sm font-bold hover:bg-emerald-100 transition">
                                <i class="fas fa-star mr-2"></i> Daftar Sekarang
                            </a>
                        </div>
                        @endif
                    </div>

                    <form action="{{ route('auth.logout') }}" method="POST" class="mt-6">
                        @csrf
                        <button type="submit" class="w-full px-4 py-2.5 bg-rose-500/10 hover:bg-rose-100 dark:hover:bg-rose-500/20 text-rose-600 dark:text-rose-400 rounded-lg text-sm font-bold transition">
                            <i class="fas fa-sign-out-alt mr-2"></i> Logout
                        </button>
                    </form>
                </div>
            </div>

            <!-- Main Content -->
            <div class="lg:col-span-2 space-y-8">
                <!-- Quick Stats -->
                @if(auth()->user()->role === 'customer')
                <div class="grid grid-cols-2 gap-4">
                    <div class="bg-white dark:bg-slate-900 rounded-xl shadow-sm border border-gray-100 dark:border-slate-800 p-5">
                        <p class="text-xs text-slate-500 dark:text-slate-400 uppercase font-bold mb-2">Total Pembelian</p>
                        <h3 class="text-2xl font-bold text-slate-800 dark:text-white">{{ auth()->user()->orders()->count() }}</h3>
                    </div>
                    <div class="bg-white dark:bg-slate-900 rounded-xl shadow-sm border border-gray-100 dark:border-slate-800 p-5">
                        <p class="text-xs text-slate-500 dark:text-slate-400 uppercase font-bold mb-2">Total Pengeluaran</p>
                        <h3 class="text-2xl font-bold text-emerald-600 dark:text-emerald-400">Rp {{ number_format(auth()->user()->orders()->sum('total_price'), 0, ',', '.') }}</h3>
                    </div>
                </div>
                @endif

                <!-- Affiliator Info Card -->
                @if(auth()->user()->role === 'customer')
                <div class="bg-gradient-to-br from-emerald-50 to-green-50 dark:from-emerald-500/10 dark:to-green-500/10 rounded-2xl p-8 border border-emerald-200 dark:border-emerald-500/30">
                    <div class="flex items-start justify-between mb-4">
                        <div>
                            <h3 class="text-2xl font-bold text-emerald-900 dark:text-emerald-300 mb-2">
                                🚀 Penghasilan Tambahan Menanti Anda!
                            </h3>
                            <p class="text-emerald-800 dark:text-emerald-400 mb-4">
                                Bergabunglah sebagai affiliator Sariayu dan dapatkan komisi dari setiap penjualan yang Anda referensikan.
                            </p>
                        </div>
                    </div>

                    <div class="grid grid-cols-3 gap-4 mb-6 py-4 border-y border-emerald-200 dark:border-emerald-500/20">
                        <div>
                            <p class="text-xs font-bold text-emerald-700 dark:text-emerald-300 uppercase">Komisi Per Sale</p>
                            <p class="text-xl font-bold text-emerald-900 dark:text-emerald-200">20%</p>
                        </div>
                        <div>
                            <p class="text-xs font-bold text-emerald-700 dark:text-emerald-300 uppercase">Affiliator Aktif</p>
                            <p class="text-xl font-bold text-emerald-900 dark:text-emerald-200">250+</p>
                        </div>
                        <div>
                            <p class="text-xs font-bold text-emerald-700 dark:text-emerald-300 uppercase">Payout Min</p>
                            <p class="text-xl font-bold text-emerald-900 dark:text-emerald-200">Rp 100K</p>
                        </div>
                    </div>

                    <a href="{{ route('afiliator.register') }}" class="inline-block px-6 py-3 bg-emerald-600 hover:bg-emerald-700 text-white rounded-lg font-bold transition-all active:scale-95 shadow-lg">
                        <i class="fas fa-arrow-right mr-2"></i> Mulai Sekarang
                    </a>
                </div>
                @endif

                <!-- Recent Orders -->
                <div class="bg-white dark:bg-slate-900 rounded-2xl shadow-sm border border-gray-100 dark:border-slate-800 overflow-hidden">
                    <div class="p-6 border-b border-gray-100 dark:border-slate-800">
                        <h3 class="text-lg font-bold text-slate-800 dark:text-white">Pembelian Terakhir</h3>
                    </div>

                    <div class="overflow-x-auto">
                        <table class="w-full">
                            <thead class="bg-gray-50 dark:bg-slate-800/50 border-b border-gray-100 dark:border-slate-800">
                                <tr>
                                    <th class="px-6 py-3 text-left text-xs font-bold text-slate-600 dark:text-slate-400">Invoice</th>
                                    <th class="px-6 py-3 text-left text-xs font-bold text-slate-600 dark:text-slate-400">Status</th>
                                    <th class="px-6 py-3 text-right text-xs font-bold text-slate-600 dark:text-slate-400">Total</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-100 dark:divide-slate-800">
                                @forelse(auth()->user()->orders()->latest()->take(5)->get() as $order)
                                <tr class="hover:bg-slate-50 dark:hover:bg-slate-800/50 transition">
                                    <td class="px-6 py-4 text-sm font-mono font-bold text-indigo-600 dark:text-indigo-400">
                                        #{{ $order->invoice_number }}
                                    </td>
                                    <td class="px-6 py-4">
                                        <span class="px-3 py-1 text-xs font-bold rounded-full {{ $order->payment_status === 'paid' ? 'bg-emerald-100 dark:bg-emerald-500/20 text-emerald-700 dark:text-emerald-300' : 'bg-amber-100 dark:bg-amber-500/20 text-amber-700 dark:text-amber-300' }} uppercase">
                                            {{ ucfirst($order->payment_status) }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 text-right text-sm font-bold text-slate-800 dark:text-white">
                                        Rp {{ number_format($order->total_price, 0, ',', '.') }}
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="3" class="px-6 py-8 text-center text-sm text-slate-500 dark:text-slate-400">
                                        Belum ada pembelian. <a href="{{ route('customer.produk') }}" class="text-indigo-600 dark:text-indigo-400 font-bold hover:underline">Mulai belanja →</a>
                                    </td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Help Card -->
                <div class="bg-blue-50 dark:bg-blue-500/10 rounded-2xl p-6 border border-blue-200 dark:border-blue-500/30">
                    <h4 class="font-bold text-blue-900 dark:text-blue-300 mb-2">❓ Butuh Bantuan?</h4>
                    <p class="text-blue-800 dark:text-blue-400 text-sm mb-4">
                        Hubungi tim support kami jika ada pertanyaan atau masalah.
                    </p>
                    <a href="mailto:support@sariayu.com" class="text-blue-600 dark:text-blue-400 text-sm font-bold hover:underline">
                        📧 support@sariayu.com
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
