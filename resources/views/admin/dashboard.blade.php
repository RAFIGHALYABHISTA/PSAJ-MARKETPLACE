@extends('layouts.header')

@section('content')
<div class="flex-1 min-h-screen transition-colors duration-300 dark:bg-slate-900">
    
    <header class="bg-white/80 dark:bg-slate-800/80 backdrop-blur-md border-b border-gray-200 dark:border-slate-700 sticky top-0 z-30 p-4 px-8 flex justify-between items-center">
        <div>
            <h1 class="text-2xl font-extrabold text-slate-800 dark:text-white tracking-tight">Dashboard Pro</h1>
            <p class="text-sm text-slate-500 dark:text-slate-400 font-medium">Sariayu x <span class="text-indigo-600 dark:text-indigo-400">Smega Corner</span></p>
        </div>
        
        <div class="flex items-center space-x-5">
            <button @click="darkMode = !darkMode; localStorage.setItem('dark', darkMode)" 
                    class="p-2.5 bg-slate-100 dark:bg-slate-700 rounded-xl text-slate-600 dark:text-yellow-400 hover:ring-2 ring-indigo-500 transition-all">
                <i class="fas" :class="darkMode ? 'fa-sun' : 'fa-moon'"></i>
            </button>

            <div class="relative group">
                <span class="absolute -top-1 -right-1 bg-rose-500 ring-2 ring-white dark:ring-slate-800 text-white text-[10px] px-1.5 rounded-full">3</span>
                <button class="p-2.5 bg-slate-100 dark:bg-slate-700 rounded-xl text-slate-600 dark:text-slate-300 hover:bg-slate-200 dark:hover:bg-slate-600 transition">
                    <i class="fas fa-bell"></i>
                </button>
            </div>

            <button class="hidden md:flex bg-indigo-600 hover:bg-indigo-700 text-white px-5 py-2.5 rounded-xl text-sm font-bold shadow-lg shadow-indigo-200 dark:shadow-none transition-all active:scale-95">
                <i class="fas fa-plus mr-2"></i> Tambah Produk
            </button>
        </div>
    </header>

    <div class="p-8">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-10">
            <div class="bg-white dark:bg-slate-800 p-6 rounded-3xl border border-gray-100 dark:border-slate-700 shadow-xl shadow-slate-200/50 dark:shadow-none">
                <div class="flex justify-between items-start mb-4">
                    <div class="p-3 bg-emerald-50 dark:bg-emerald-500/10 text-emerald-600 dark:text-emerald-400 rounded-2xl">
                        <i class="fas fa-wallet text-xl"></i>
                    </div>
                    <span class="flex items-center text-emerald-500 text-xs font-bold bg-emerald-50 dark:bg-emerald-500/10 px-2 py-1 rounded-lg">
                        <i class="fas fa-caret-up mr-1"></i> 12.5%
                    </span>
                </div>
                <p class="text-slate-500 dark:text-slate-400 text-sm font-semibold">Omzet Hari Ini</p>
                <h2 class="text-2xl font-black text-slate-800 dark:text-white mt-1">Rp {{ number_format($todayRevenue, 0, ',', '.') }}</h2>
            </div>

            <div class="bg-white dark:bg-slate-800 p-6 rounded-3xl border border-gray-100 dark:border-slate-700 shadow-xl shadow-slate-200/50 dark:shadow-none">
                <div class="flex justify-between items-start mb-4">
                    <div class="p-3 bg-indigo-50 dark:bg-indigo-500/10 text-indigo-600 dark:text-indigo-400 rounded-2xl">
                        <i class="fas fa-users text-xl"></i>
                    </div>
                </div>
                <p class="text-slate-500 dark:text-slate-400 text-sm font-semibold">Total Afiliator</p>
                <div class="flex items-end space-x-2">
                    <h2 class="text-2xl font-black text-slate-800 dark:text-white mt-1">{{ $totalAffiliators }}</h2>
                    <p class="text-[10px] text-slate-400 mb-1 leading-tight"><b>{{ $totalOrders }}</b> Pesanan</p>
                </div>
            </div>

            <div class="bg-white dark:bg-slate-800 p-6 rounded-3xl border border-gray-100 dark:border-slate-700 shadow-xl shadow-slate-200/50 dark:shadow-none">
                <div class="flex justify-between items-start mb-4">
                    <div class="p-3 bg-amber-50 dark:bg-amber-500/10 text-amber-600 dark:text-amber-400 rounded-2xl">
                        <i class="fas fa-percentage text-xl"></i>
                    </div>
                </div>
                <p class="text-slate-500 dark:text-slate-400 text-sm font-semibold">Komisi Menunggu</p>
                <h2 class="text-2xl font-black text-slate-800 dark:text-white mt-1">Rp {{ number_format($pendingCommissions, 0, ',', '.') }}</h2>
            </div>

            <div class="bg-gradient-to-br from-indigo-600 to-violet-700 p-6 rounded-3xl shadow-xl shadow-indigo-200 dark:shadow-none text-white">
                <div class="flex justify-between items-start mb-4">
                    <div class="p-3 bg-white/20 rounded-2xl">
                        <i class="fas fa-box text-xl text-white"></i>
                    </div>
                </div>
                <p class="text-indigo-100 text-sm font-medium">Total Produk</p>
                <h2 class="text-3xl font-black mt-1">{{ $totalProducts }} <span class="text-sm font-normal text-indigo-200 italic">Produk</span></h2>
            </div>
        </div>

        <div class="bg-white dark:bg-slate-800 rounded-3xl border border-gray-100 dark:border-slate-700 shadow-xl shadow-slate-200/50 dark:shadow-none overflow-hidden">
            <div class="p-6 border-b border-gray-50 dark:border-slate-700 flex flex-wrap justify-between items-center gap-4">
                <h3 class="font-black text-slate-800 dark:text-white text-lg tracking-tight">Data Penjualan Terkini</h3>
                <div class="flex space-x-3">
                    <div class="relative">
                        <input type="text" placeholder="Cari invoice..." class="pl-10 pr-4 py-2 bg-slate-50 dark:bg-slate-900 border-none rounded-xl text-sm focus:ring-2 ring-indigo-500 dark:text-white w-48 lg:w-64">
                        <i class="fas fa-search absolute left-4 top-3 text-slate-400 text-xs"></i>
                    </div>
                    <button class="bg-slate-900 dark:bg-indigo-600 text-white px-4 py-2 rounded-xl text-xs font-bold hover:opacity-90 transition">
                        <i class="fas fa-download mr-2"></i> Rekap Excel
                    </button>
                </div>
            </div>
            
            <div class="overflow-x-auto">
                <table class="w-full text-left">
                    <thead class="bg-slate-50/50 dark:bg-slate-900/50 text-slate-400 dark:text-slate-500 text-[10px] uppercase tracking-[0.15em]">
                        <tr>
                            <th class="px-8 py-5 font-bold">No. Invoice</th>
                            <th class="px-8 py-5 font-bold">Afiliator</th>
                            <th class="px-8 py-5 font-bold">Kategori</th>
                            <th class="px-8 py-5 font-bold">Payment</th>
                            <th class="px-8 py-5 font-bold text-right">Status</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-50 dark:divide-slate-700">
                        @forelse($recentOrders as $order)
                        <tr class="group hover:bg-slate-50/80 dark:hover:bg-slate-700/30 transition-all">
                            <td class="px-8 py-5">
                                <span class="font-bold text-indigo-600 dark:text-indigo-400 hover:underline cursor-pointer">#{{ $order->invoice_number }}</span>
                            </td>
                            <td class="px-8 py-5">
                                <div class="flex items-center">
                                    <div class="w-9 h-9 rounded-full bg-gradient-to-tr from-indigo-500 to-purple-500 flex items-center justify-center text-white font-bold text-xs mr-3">{{ substr($order->customer?->name ?? 'N/A', 0, 2) }}</div>
                                    <div class="flex flex-col">
                                        <span class="font-bold text-slate-700 dark:text-slate-200">{{ $order->customer?->name ?? 'N/A' }}</span>
                                        <span class="text-[10px] text-slate-400 font-mono">ID: {{ $order->customer?->id ?? '-' }}</span>
                                    </div>
                                </div>
                            </td>
                            <td class="px-8 py-5">
                                <span class="px-3 py-1 bg-blue-50 dark:bg-blue-500/10 text-blue-600 dark:text-blue-400 text-[10px] font-black rounded-lg uppercase tracking-wider border border-blue-100 dark:border-blue-500/20">{{ $order->affiliator ? 'Afiliator' : 'Umum' }}</span>
                            </td>
                            <td class="px-8 py-5">
                                <div class="flex items-center text-slate-600 dark:text-slate-400 text-sm font-medium">
                                    <i class="fas {{ $order->payment_method === 'online' ? 'fa-qrcode' : 'fa-money-bill' }} mr-2 text-indigo-500"></i> {{ ucfirst($order->payment_method) }}
                                </div>
                            </td>
                            <td class="px-8 py-5 text-right">
                                <span class="px-4 py-1.5 rounded-xl text-xs font-bold border shadow-sm shadow-amber-100 dark:shadow-none
                                    {{ $order->pickup_status === 'waiting' ? 'bg-amber-50 dark:bg-amber-500/10 text-amber-600 dark:text-amber-400 border-amber-100 dark:border-amber-500/20' : '' }}
                                    {{ $order->pickup_status === 'ready' ? 'bg-green-50 dark:bg-green-500/10 text-green-600 dark:text-green-400 border-green-100 dark:border-green-500/20' : '' }}
                                    {{ $order->pickup_status === 'taken' ? 'bg-blue-50 dark:bg-blue-500/10 text-blue-600 dark:text-blue-400 border-blue-100 dark:border-blue-500/20' : '' }}">
                                    {{ ucfirst($order->pickup_status) }}
                                </span>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="px-8 py-8 text-center text-slate-500 dark:text-slate-400">Belum ada pesanan</td>
                        </tr>
                        @endforelse
                        </tbody>
                </table>
            </div>
            
            <div class="p-6 bg-slate-50/30 dark:bg-slate-900/20 flex justify-between items-center border-t border-gray-50 dark:border-slate-700">
                <p class="text-xs text-slate-500 dark:text-slate-400">Menampilkan <b>1 - 10</b> dari <b>142</b> Data</p>
                <div class="flex space-x-1">
                    <button class="p-2 px-3 rounded-lg bg-white dark:bg-slate-800 border border-gray-200 dark:border-slate-700 text-slate-400 hover:text-indigo-600 transition"><i class="fas fa-chevron-left text-xs"></i></button>
                    <button class="p-2 px-4 rounded-lg bg-indigo-600 text-white text-xs font-bold shadow-md">1</button>
                    <button class="p-2 px-4 rounded-lg bg-white dark:bg-slate-800 border border-gray-200 dark:border-slate-700 text-slate-600 dark:text-slate-400 text-xs font-bold hover:bg-slate-100 transition">2</button>
                    <button class="p-2 px-3 rounded-lg bg-white dark:bg-slate-800 border border-gray-200 dark:border-slate-700 text-slate-400 hover:text-indigo-600 transition"><i class="fas fa-chevron-right text-xs"></i></button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection