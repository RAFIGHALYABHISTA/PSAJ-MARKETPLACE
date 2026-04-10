@extends('layouts.admin.header')

@section('content')
<div class="min-h-screen transition-colors duration-300 dark:bg-[#020617] bg-slate-50">
    
    <header class="bg-white/80 dark:bg-slate-900/80 backdrop-blur-md border-b border-slate-200 dark:border-slate-800 sticky top-0 z-30 px-8 py-4 flex justify-between items-center">
        <div>
            <h1 class="text-lg font-semibold text-slate-900 dark:text-slate-100 tracking-tight">Management Overview</h1>
            <div class="flex items-center space-x-2 mt-0.5">
                <span class="text-[10px] font-bold text-indigo-600 dark:text-indigo-400 uppercase tracking-[0.15em]">Sariayu</span>
                <span class="text-slate-300 dark:text-slate-700">•</span>
                <span class="text-[10px] font-bold text-slate-400 uppercase tracking-[0.15em]">Smega Corner</span>
            </div>
        </div>
        
        <div class="flex items-center space-x-5">
            <button class="relative p-2 text-slate-500 hover:text-indigo-600 transition-colors">
                <span class="absolute top-2 right-2 w-1.5 h-1.5 bg-rose-500 rounded-full ring-2 ring-white dark:ring-slate-900"></span>
                <i class="far fa-bell text-lg"></i>
            </button>

            <button class="bg-indigo-600 hover:bg-indigo-700 text-white px-5 py-2.5 rounded-xl text-[11px] font-semibold tracking-wider transition-all active:scale-95 shadow-lg shadow-indigo-500/20">
                <i class="fas fa-plus mr-2 opacity-70"></i> PRODUK BARU
            </button>
        </div>
    </header>

    <div class="p-8 max-w-[1600px] mx-auto space-y-8">
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            <div class="bg-white dark:bg-slate-900 p-6 rounded-2xl border border-slate-200 dark:border-slate-800 shadow-sm group">
                <p class="text-[10px] font-bold text-slate-400 uppercase tracking-[0.1em] mb-3 group-hover:text-indigo-500 transition-colors">Omzet Hari Ini</p>
                <div class="flex justify-between items-end">
                    <h2 class="text-2xl font-semibold text-slate-900 dark:text-white tracking-tight">
                        <span class="text-sm font-medium text-slate-400">Rp</span>{{ number_format($todayRevenue, 0, ',', '.') }}
                    </h2>
                    <div class="flex items-center text-emerald-500 bg-emerald-500/10 px-2 py-1 rounded-lg">
                        <i class="fas fa-caret-up mr-1 text-xs"></i>
                        <span class="text-[11px] font-bold">12.4%</span>
                    </div>
                </div>
            </div>

            <div class="bg-white dark:bg-slate-900 p-6 rounded-2xl border border-slate-200 dark:border-slate-800 shadow-sm">
                <p class="text-[10px] font-bold text-slate-400 uppercase tracking-[0.1em] mb-3">Total Afiliator</p>
                <div class="flex justify-between items-end">
                    <h2 class="text-2xl font-semibold text-slate-900 dark:text-white tracking-tight">{{ $totalAffiliators }}</h2>
                    <span class="text-[11px] text-slate-500 font-medium bg-slate-100 dark:bg-slate-800 px-2 py-1 rounded-lg">
                        {{ $totalOrders }} <span class="text-[10px] opacity-70 uppercase ml-1">Orders</span>
                    </span>
                </div>
            </div>

            <div class="bg-white dark:bg-slate-900 p-6 rounded-2xl border border-slate-200 dark:border-slate-800 shadow-sm">
                <p class="text-[10px] font-bold text-slate-400 uppercase tracking-[0.1em] mb-3">Komisi Menunggu</p>
                <div class="flex items-center">
                    <h2 class="text-2xl font-semibold text-slate-900 dark:text-white tracking-tight">
                        <span class="text-sm font-medium text-slate-400">Rp</span>{{ number_format($pendingCommissions, 0, ',', '.') }}
                    </h2>
                </div>
            </div>

            <div class="bg-slate-900 dark:bg-indigo-600 p-6 rounded-2xl shadow-xl shadow-slate-200 dark:shadow-indigo-500/10 relative overflow-hidden group">
                <div class="relative z-10">
                    <p class="text-[10px] font-bold text-slate-400 dark:text-indigo-100 uppercase tracking-[0.1em] mb-3">Persediaan Produk</p>
                    <div class="flex justify-between items-end text-white">
                        <h2 class="text-3xl font-semibold tracking-tight">{{ $totalProducts }} <span class="text-xs font-normal opacity-60 ml-1 uppercase">Items</span></h2>
                        <i class="fas fa-boxes text-white/20 text-2xl group-hover:scale-110 transition-transform"></i>
                    </div>
                </div>
                <div class="absolute -right-4 -bottom-4 w-24 h-24 bg-white/5 rounded-full"></div>
            </div>
        </div>

        <div class="bg-white dark:bg-slate-900 border border-slate-200 dark:border-slate-800 rounded-2xl shadow-sm overflow-hidden transition-all">
            <div class="p-6 border-b border-slate-100 dark:border-slate-800 flex justify-between items-center">
                <div class="flex items-center space-x-3">
                    <div class="w-1 h-6 bg-indigo-500 rounded-full"></div>
                    <h3 class="font-semibold text-slate-800 dark:text-slate-100 text-sm tracking-tight">TRANSAKSI TERKINI</h3>
                </div>
                
                <div class="flex items-center space-x-3">
                    <div class="relative group">
                        <input type="text" placeholder="Search by invoice..." 
                               class="pl-9 pr-4 py-2 bg-slate-50 dark:bg-slate-800 border-none rounded-xl text-[11px] font-medium focus:ring-2 ring-indigo-500/20 outline-none w-64 transition-all">
                        <i class="fas fa-search absolute left-3.5 top-2.5 text-slate-400 text-[11px] group-focus-within:text-indigo-500 transition-colors"></i>
                    </div>
                    <button class="bg-white dark:bg-slate-800 border border-slate-200 dark:border-slate-700 text-slate-600 dark:text-slate-300 px-4 py-2 rounded-xl text-[11px] font-bold hover:bg-slate-50 transition flex items-center">
                        <i class="far fa-file-excel mr-2 text-emerald-500"></i> EXPORT
                    </button>
                </div>
            </div>
            
            <div class="overflow-x-auto">
                <table class="w-full text-left">
                    <thead class="bg-slate-50/50 dark:bg-slate-900/50 border-b border-slate-100 dark:border-slate-800 text-slate-400 text-[10px] uppercase tracking-[0.15em] font-bold">
                        <tr>
                            <th class="px-8 py-4">Informasi Invoice</th>
                            <th class="px-8 py-4">Afiliator / Customer</th>
                            <th class="px-8 py-4 text-center">Tipe</th>
                            <th class="px-8 py-4">Metode Pembayaran</th>
                            <th class="px-8 py-4 text-right">Pickup Status</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-50 dark:divide-slate-800/50">
                        @forelse($recentOrders as $order)
                        <tr class="group hover:bg-slate-50/50 dark:hover:bg-indigo-500/5 transition-colors">
                            <td class="px-8 py-5">
                                <span class="font-mono text-xs font-semibold text-indigo-600 dark:text-indigo-400">#{{ $order->invoice_number }}</span>
                                <p class="text-[10px] text-slate-400 mt-1 font-medium">{{ $order->created_at->format('d M Y, H:i') }}</p>
                            </td>
                            <td class="px-8 py-5">
                                <div class="flex items-center space-x-3">
                                    <div class="w-8 h-8 rounded-lg bg-slate-100 dark:bg-slate-800 flex items-center justify-center text-[10px] font-bold text-slate-500 uppercase">
                                        {{ substr($order->customer?->name ?? '?', 0, 2) }}
                                    </div>
                                    <div>
                                        <div class="text-[13px] font-semibold text-slate-700 dark:text-slate-200">{{ $order->customer?->name ?? 'Internal Store' }}</div>
                                        <div class="text-[10px] text-slate-400 uppercase tracking-tighter">ID: {{ $order->customer?->id ?? '---' }}</div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-8 py-5 text-center">
                                <span class="text-[9px] font-bold {{ $order->affiliator ? 'text-indigo-600 bg-indigo-50 dark:bg-indigo-500/10 border-indigo-100 dark:border-indigo-500/20' : 'text-slate-500 bg-slate-50 dark:bg-slate-800 border-slate-200 dark:border-slate-700' }} px-2.5 py-1 border rounded-md uppercase">
                                    {{ $order->affiliator ? 'Partner' : 'General' }}
                                </span>
                            </td>
                            <td class="px-8 py-5">
                                <div class="flex items-center text-[12px] text-slate-600 dark:text-slate-400 font-medium">
                                    <span class="w-2 h-2 rounded-full {{ $order->payment_method === 'online' ? 'bg-indigo-500' : 'bg-slate-400' }} mr-3"></span>
                                    {{ strtoupper($order->payment_method) }}
                                </div>
                            </td>
                            <td class="px-8 py-5 text-right">
                                @php
                                    $statusMaps = [
                                        'waiting' => ['label' => 'Awaiting', 'color' => 'amber'],
                                        'ready' => ['label' => 'Ready', 'color' => 'emerald'],
                                        'taken' => ['label' => 'Completed', 'color' => 'blue'],
                                    ];
                                    $map = $statusMaps[$order->pickup_status] ?? ['label' => $order->pickup_status, 'color' => 'slate'];
                                @endphp
                                <span class="inline-flex items-center px-3 py-1.5 rounded-xl text-[10px] font-bold border uppercase tracking-wider bg-{{ $map['color'] }}-500/5 text-{{ $map['color'] }}-600 border-{{ $map['color'] }}-500/20">
                                    {{ $map['label'] }}
                                </span>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="px-8 py-16 text-center">
                                <div class="flex flex-col items-center">
                                    <i class="fas fa-inbox text-slate-200 text-4xl mb-4"></i>
                                    <p class="text-xs text-slate-400 font-medium tracking-wide italic">No recent transactions recorded today.</p>
                                </div>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            
            <div class="px-8 py-4 border-t border-slate-100 dark:border-slate-800 flex justify-between items-center bg-slate-50/30 dark:bg-slate-900/30">
                <span class="text-[11px] font-medium text-slate-500">Showing <span class="text-slate-900 dark:text-white font-bold">1 - 10</span> of 120 transactions</span>
                <div class="flex space-x-2">
                    <button class="flex items-center px-4 py-2 bg-white dark:bg-slate-800 border border-slate-200 dark:border-slate-700 rounded-xl text-[11px] font-bold text-slate-600 dark:text-slate-400 hover:bg-slate-50 transition shadow-sm">
                        <i class="fas fa-chevron-left mr-2 text-[9px]"></i> PREVIOUS
                    </button>
                    <button class="flex items-center px-4 py-2 bg-white dark:bg-slate-800 border border-slate-200 dark:border-slate-700 rounded-xl text-[11px] font-bold text-slate-600 dark:text-slate-400 hover:bg-slate-50 transition shadow-sm">
                        NEXT <i class="fas fa-chevron-right ml-2 text-[9px]"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection