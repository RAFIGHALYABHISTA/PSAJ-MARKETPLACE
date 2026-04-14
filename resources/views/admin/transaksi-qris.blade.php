@extends('layouts.admin.header')

@section('content')
    <div class="min-h-screen transition-colors duration-300 dark:bg-slate-950 bg-[#F1F5F9]">

        <header class="bg-white/80 dark:bg-slate-900/80 backdrop-blur-md border-b border-gray-200 dark:border-slate-800 sticky top-0 z-30 p-5 px-8 flex justify-between items-center">
            <div>
                <h1 class="text-xl font-black text-slate-900 dark:text-white uppercase tracking-tighter">Log Transaksi</h1>
                <div class="flex items-center gap-2">
                    <span class="flex h-2 w-2 rounded-full bg-indigo-500 animate-pulse"></span>
                    <p class="text-[10px] text-slate-500 font-bold uppercase tracking-widest">Monitoring Penjualan Real-time</p>
                </div>
            </div>
            <div class="flex items-center gap-3">
                <button class="bg-white dark:bg-slate-800 text-slate-700 dark:text-slate-200 border border-slate-200 dark:border-slate-700 px-4 py-2 rounded-lg text-xs font-bold hover:bg-slate-50 transition shadow-sm flex items-center gap-2">
                    <i class="fas fa-filter text-[10px]"></i> FILTER
                </button>
                <button class="bg-slate-900 dark:bg-indigo-600 text-white px-5 py-2.5 rounded-lg text-xs font-black hover:scale-[1.02] active:scale-95 transition-all shadow-lg shadow-slate-200 dark:shadow-none flex items-center gap-2 uppercase tracking-tighter">
                    <i class="fas fa-file-export text-[10px]"></i> Ekspor Laporan
                </button>
            </div>
        </header>

        <div class="p-8 max-w-[1600px] mx-auto">
            
            <div class="bg-white dark:bg-slate-900 border border-gray-200 dark:border-slate-800 rounded-2xl shadow-xl shadow-slate-200/50 dark:shadow-none overflow-hidden">
                
                <div class="p-6 border-b border-gray-100 dark:border-slate-800 flex flex-col md:flex-row justify-between items-center gap-4 bg-white dark:bg-slate-900">
                    <div>
                        <h3 class="font-black text-slate-800 dark:text-white text-sm uppercase tracking-tight">Riwayat Pembayaran</h3>
                        <p class="text-[10px] text-slate-400 font-medium italic">Menampilkan total {{ $payments->total() }} transaksi terbaru</p>
                    </div>

                    <div class="relative group">
                        <input type="text" placeholder="Cari nomor invoice..."
                            class="pl-10 pr-4 py-2 bg-slate-50 dark:bg-slate-800 border-none rounded-xl text-xs focus:ring-2 ring-indigo-500/20 outline-none w-64 transition-all dark:text-white group-hover:bg-slate-100 dark:group-hover:bg-slate-700">
                        <i class="fas fa-search absolute left-4 top-3 text-slate-400 text-xs transition-colors group-focus-within:text-indigo-500"></i>
                    </div>
                </div>

                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead class="bg-slate-50/50 dark:bg-slate-800/50 border-b border-gray-100 dark:border-slate-800 text-slate-500 text-[10px] uppercase tracking-widest font-black">
                            <tr>
                                <th class="px-6 py-5">Invoice</th>
                                <th class="px-6 py-5">Pelanggan</th>
                                <th class="px-6 py-5">Total Bayar</th>
                                <th class="px-6 py-5">Metode</th>
                                <th class="px-6 py-5">Waktu Transaksi</th>
                                <th class="px-6 py-5 text-center">Status</th>
                                <th class="px-6 py-5 text-right">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-50 dark:divide-slate-800">
                            @forelse($payments as $payment)
                                <tr class="group hover:bg-indigo-50/30 dark:hover:bg-indigo-900/10 transition-all duration-200">
                                    <td class="px-6 py-4">
                                        <div class="flex items-center gap-3">
                                            <div class="p-2 bg-indigo-50 dark:bg-indigo-500/10 rounded-lg">
                                                <i class="fas fa-file-invoice text-indigo-500 text-xs"></i>
                                            </div>
                                            <span class="font-mono text-xs font-black text-slate-700 dark:text-slate-200">
                                                #{{ $payment->order->invoice_number ?? 'N/A' }}
                                            </span>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="flex flex-col">
                                            <span class="text-xs font-bold text-slate-700 dark:text-slate-200">
                                                {{ $payment->order->customer->name ?? '-' }}
                                            </span>
                                            <span class="text-[9px] text-slate-400 font-medium">Customer ID: {{ $payment->order->customer->id ?? 'N/A' }}</span>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4">
                                        <span class="text-sm font-black text-slate-800 dark:text-slate-100">
                                            Rp {{ number_format($payment->order->total_price ?? 0, 0, ',', '.') }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="flex items-center gap-2">
                                            @if($payment->order->payment_method === 'online')
                                                <span class="flex h-1.5 w-1.5 rounded-full bg-blue-500"></span>
                                                <span class="text-[10px] font-black text-blue-600 dark:text-blue-400 uppercase italic tracking-tighter">QRIS System</span>
                                            @else
                                                <span class="flex h-1.5 w-1.5 rounded-full bg-stone-400"></span>
                                                <span class="text-[10px] font-black text-stone-500 uppercase italic tracking-tighter">Cash Out</span>
                                            @endif
                                        </div>
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="flex items-center gap-3">
                                            <div class="text-right">
                                                <p class="text-xs text-slate-700 dark:text-slate-300 font-bold leading-none mb-1">
                                                    {{ $payment->paid_at ? $payment->paid_at->format('d M Y') : 'Pending' }}
                                                </p>
                                                <p class="text-[10px] text-slate-400 font-medium italic">
                                                    {{ $payment->paid_at ? $payment->paid_at->format('H:i') . ' WIB' : '-' }}
                                                </p>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4">
                                        @php
                                            $statusConfig = [
                                                'pending' => ['bg' => 'bg-amber-100 text-amber-700 border-amber-200', 'icon' => 'fa-clock'],
                                                'verified' => ['bg' => 'bg-emerald-100 text-emerald-700 border-emerald-200', 'icon' => 'fa-check-circle'],
                                                'failed' => ['bg' => 'bg-rose-100 text-rose-700 border-rose-200', 'icon' => 'fa-times-circle'],
                                            ];
                                            $conf = $statusConfig[$payment->status] ?? ['bg' => 'bg-slate-100 text-slate-700 border-slate-200', 'icon' => 'fa-info-circle'];
                                        @endphp
                                        <div class="flex justify-center">
                                            <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-[9px] font-black border uppercase tracking-widest {{ $conf['bg'] }} dark:bg-opacity-10 dark:border-opacity-20 shadow-sm">
                                                <i class="fas {{ $conf['icon'] }} text-[8px]"></i>
                                                {{ $payment->status }}
                                            </span>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 text-right">
                                        <div class="flex justify-end items-center gap-2">
                                            @if ($payment->proof_image)
                                                <a href="{{ asset('storage/' . $payment->proof_image) }}" target="_blank"
                                                    class="p-2 text-amber-500 hover:bg-amber-50 dark:hover:bg-amber-500/10 rounded-lg transition-all" title="Lihat Bukti">
                                                    <i class="fas fa-image text-sm"></i>
                                                </a>
                                            @endif

                                            @if ($payment->status === 'pending')
                                                <form action="{{ route('admin.orders.confirm-payment', $payment->order) }}" method="POST" class="inline">
                                                    @csrf @method('PATCH')
                                                    <button type="submit" onclick="return confirm('Konfirmasi pembayaran ini?')"
                                                        class="p-2 text-emerald-500 hover:bg-emerald-50 dark:hover:bg-emerald-500/10 rounded-lg transition-all" title="Konfirmasi">
                                                        <i class="fas fa-check-double text-sm"></i>
                                                    </button>
                                                </form>
                                            @endif

                                            <a href="{{ route('admin.transaksi-qris.edit', $payment) }}"
                                                class="p-2 text-indigo-500 hover:bg-indigo-50 dark:hover:bg-indigo-500/10 rounded-lg transition-all" title="Detail">
                                                <i class="fas fa-eye text-sm"></i>
                                            </a>

                                            <form action="{{ route('admin.transaksi-qris.destroy', $payment) }}" method="POST" class="inline">
                                                @csrf @method('DELETE')
                                                <button type="submit" onclick="return confirm('Hapus record transaksi ini?')"
                                                    class="p-2 text-rose-500 hover:bg-rose-50 dark:hover:bg-rose-500/10 rounded-lg transition-all" title="Hapus">
                                                    <i class="fas fa-trash-alt text-sm"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="px-6 py-20 text-center">
                                        <div class="flex flex-col items-center">
                                            <div class="w-16 h-16 bg-slate-50 dark:bg-slate-800 rounded-full flex items-center justify-center mb-4 text-slate-300">
                                                <i class="fas fa-folder-open text-2xl"></i>
                                            </div>
                                            <p class="text-sm text-slate-400 font-bold uppercase tracking-widest">Data Tidak Ditemukan</p>
                                            <p class="text-xs text-slate-400 italic">Belum ada riwayat transaksi yang tercatat hari ini.</p>
                                        </div>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                @if ($payments->hasPages())
                    <div class="px-8 py-5 border-t border-gray-100 dark:border-slate-800 flex justify-between items-center bg-slate-50/30 dark:bg-slate-900">
                        <p class="text-[10px] font-black text-slate-400 uppercase tracking-widest">
                            Menampilkan {{ $payments->firstItem() }} - {{ $payments->lastItem() }} dari {{ $payments->total() }} Data
                        </p>
                        <div class="pagination-custom">
                            {{ $payments->links() }}
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>

    <style>
        /* Custom Pagination Styling */
        .pagination-custom nav { display: inline-flex; border-radius: 0.75rem; overflow: hidden; }
        .pagination-custom nav span, .pagination-custom nav a { 
            padding: 0.5rem 1rem !important; 
            font-size: 10px !important; 
            font-weight: 900 !important; 
            text-transform: uppercase !important;
            border: none !important;
        }
        .pagination-custom nav svg { width: 1rem; height: 1rem; }
    </style>
@endsection