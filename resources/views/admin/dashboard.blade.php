@extends('layouts.admin.header')

@section('content')
<div class="min-h-screen transition-colors duration-300 dark:bg-slate-950 bg-[#F8FAFC]">
    
    <header class="bg-white dark:bg-slate-900 border-b border-gray-200 dark:border-slate-800 sticky top-0 z-30 p-4 px-8 flex justify-between items-center">
        <div class="flex items-center space-x-4">
            <div>
                <h1 class="text-xl font-bold text-slate-800 dark:text-white">Dashboard Overview</h1>
                <p class="text-xs text-slate-400 font-medium">Sariayu x <span class="text-indigo-600">Smega Corner</span></p>
            </div>
        </div>
        
        <div class="flex items-center space-x-4">
            <button @click="darkMode = !darkMode; localStorage.setItem('dark', darkMode)" 
                    class="p-2 text-slate-400 hover:text-indigo-600 transition-colors">
                <i class="fas" :class="darkMode ? 'fa-sun' : 'fa-moon'"></i>
            </button>

            <button class="p-2 text-slate-400 hover:text-indigo-600 relative">
                <span class="absolute top-1 right-1 w-2 h-2 bg-red-500 rounded-full border-2 border-white dark:border-slate-900"></span>
                <i class="fas fa-bell"></i>
            </button>

            <button class="bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded text-xs font-bold transition-all active:scale-95 shadow-sm">
                <i class="fas fa-plus mr-2 text-[10px]"></i> TAMBAH PRODUK
            </button>
        </div>
    </header>

    <div class="p-8 max-w-[1600px] mx-auto">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 mb-8">
            <div class="bg-white dark:bg-slate-900 p-5 rounded border border-gray-200 dark:border-slate-800 shadow-sm">
                <p class="text-[10px] font-bold text-slate-400 uppercase tracking-wider mb-1">Omzet Hari Ini</p>
                <div class="flex justify-between items-end">
                    <h2 class="text-xl font-bold text-slate-800 dark:text-white">Rp {{ number_format($todayRevenue, 0, ',', '.') }}</h2>
                    <span class="text-[10px] font-bold text-emerald-500 flex items-center bg-emerald-50 dark:bg-emerald-500/10 px-1.5 py-0.5 rounded">
                        <i class="fas fa-arrow-up mr-1"></i> 12%
                    </span>
                </div>
            </div>

            <div class="bg-white dark:bg-slate-900 p-5 rounded border border-gray-200 dark:border-slate-800 shadow-sm">
                <p class="text-[10px] font-bold text-slate-400 uppercase tracking-wider mb-1">Total Afiliator</p>
                <div class="flex justify-between items-end">
                    <h2 class="text-xl font-bold text-slate-800 dark:text-white">{{ $totalAffiliators }}</h2>
                    <span class="text-[10px] text-slate-400 font-medium italic">{{ $totalOrders }} Pesanan</span>
                </div>
            </div>

            <div class="bg-white dark:bg-slate-900 p-5 rounded border border-gray-200 dark:border-slate-800 shadow-sm">
                <p class="text-[10px] font-bold text-slate-400 uppercase tracking-wider mb-1">Komisi Menunggu</p>
                <h2 class="text-xl font-bold text-slate-800 dark:text-white">Rp {{ number_format($pendingCommissions, 0, ',', '.') }}</h2>
            </div>

            <div class="bg-indigo-600 p-5 rounded shadow-sm">
                <p class="text-[10px] font-bold text-indigo-100 uppercase tracking-wider mb-1">Total Produk</p>
                <div class="flex justify-between items-end text-white">
                    <h2 class="text-2xl font-bold">{{ $totalProducts }}</h2>
                    <i class="fas fa-box text-indigo-400/50 text-xl"></i>
                </div>
            </div>
        </div>

        <div class="bg-white dark:bg-slate-900 border border-gray-200 dark:border-slate-800 rounded shadow-sm overflow-hidden">
            <div class="p-5 border-b border-gray-100 dark:border-slate-800 flex justify-between items-center bg-gray-50/50 dark:bg-slate-900/50">
                <h3 class="font-bold text-slate-800 dark:text-white text-sm uppercase tracking-tight">Data Penjualan Terkini</h3>
                <div class="flex space-x-2">
                    <div class="relative">
                        <input type="text" placeholder="Cari..." class="pl-8 pr-3 py-1.5 bg-white dark:bg-slate-800 border border-gray-200 dark:border-slate-700 rounded text-xs focus:ring-1 ring-indigo-500 outline-none w-48 transition-all">
                        <i class="fas fa-search absolute left-3 top-2.5 text-slate-400 text-[10px]"></i>
                    </div>
                    <button class="bg-white dark:bg-slate-800 border border-gray-200 dark:border-slate-700 text-slate-600 dark:text-slate-300 px-3 py-1.5 rounded text-xs font-bold hover:bg-gray-50 transition">
                        REKAP EXCEL
                    </button>
                </div>
            </div>
            
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead class="bg-white dark:bg-slate-900 border-b border-gray-100 dark:border-slate-800 text-slate-400 text-[10px] uppercase tracking-widest font-bold">
                        <tr>
                            <th class="px-6 py-4">Invoice</th>
                            <th class="px-6 py-4">Afiliator</th>
                            <th class="px-6 py-4">Tipe</th>
                            <th class="px-6 py-4">Metode</th>
                            <th class="px-6 py-4 text-right">Status</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-50 dark:divide-slate-800">
                        @forelse($recentOrders as $order)
                        <tr class="hover:bg-slate-50 dark:hover:bg-slate-800/50 transition-colors">
                            <td class="px-6 py-4">
                                <span class="font-mono text-xs font-bold text-indigo-600 dark:text-indigo-400">#{{ $order->invoice_number }}</span>
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex flex-col">
                                    <span class="text-sm font-bold text-slate-700 dark:text-slate-200">{{ $order->customer?->name ?? 'N/A' }}</span>
                                    <span class="text-[10px] text-slate-400 italic">ID: {{ $order->customer?->id ?? '-' }}</span>
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <span class="text-[10px] font-bold text-slate-500 px-2 py-0.5 border border-gray-200 dark:border-slate-700 rounded bg-gray-50 dark:bg-slate-800">
                                    {{ $order->affiliator ? 'PARTNER' : 'UMUM' }}
                                </span>
                            </td>
                            <td class="px-6 py-4 text-xs text-slate-600 dark:text-slate-400 font-medium">
                                <i class="fas {{ $order->payment_method === 'online' ? 'fa-qrcode' : 'fa-wallet' }} mr-2 opacity-50"></i>
                                {{ strtoupper($order->payment_method) }}
                            </td>
                            <td class="px-6 py-4 text-right">
                                @php
                                    $statusClasses = [
                                        'waiting' => 'text-amber-600 bg-amber-50 border-amber-100',
                                        'ready' => 'text-emerald-600 bg-emerald-50 border-emerald-100',
                                        'taken' => 'text-blue-600 bg-blue-50 border-blue-100',
                                    ];
                                    $currentClass = $statusClasses[$order->pickup_status] ?? 'text-gray-600 bg-gray-50 border-gray-100';
                                @endphp
                                <span class="px-2 py-1 rounded text-[10px] font-black border uppercase {{ $currentClass }} dark:bg-opacity-10 dark:border-opacity-20">
                                    {{ $order->pickup_status }}
                                </span>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="px-6 py-10 text-center text-xs text-slate-400 italic">Data tidak ditemukan</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            
            <div class="px-6 py-4 border-t border-gray-100 dark:border-slate-800 flex justify-between items-center bg-white dark:bg-slate-900">
                <span class="text-[10px] font-bold text-slate-400 uppercase tracking-tighter">Page 1 of 12</span>
                <div class="flex space-x-1">
                    <button class="px-3 py-1 border border-gray-200 dark:border-slate-700 rounded text-[10px] font-bold hover:bg-gray-50 dark:hover:bg-slate-800 transition text-slate-600 dark:text-slate-400">PREV</button>
                    <button class="px-3 py-1 border border-gray-200 dark:border-slate-700 rounded text-[10px] font-bold hover:bg-gray-50 dark:hover:bg-slate-800 transition text-slate-600 dark:text-slate-400">NEXT</button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection