@extends('layouts.admin.header')

@section('content')
    <div class="min-h-screen transition-colors duration-300 dark:bg-slate-950 bg-[#F8FAFC]">

        <header
            class="bg-white dark:bg-slate-900 border-b border-gray-200 dark:border-slate-800 sticky top-0 z-30 p-4 px-8 flex justify-between items-center">
            <div>
                <h1 class="text-xl font-bold text-slate-800 dark:text-white uppercase tracking-tight">Log Transaksi</h1>
                <p class="text-xs text-slate-400 font-medium italic">Transaksi Penjualan <span class="text-indigo-600"></span>
                </p>
            </div>
            <button
                class="bg-slate-900 dark:bg-indigo-600 text-white px-4 py-2 rounded text-xs font-bold hover:opacity-90 transition shadow-sm flex items-center">
                <i class="fas fa-download mr-2 text-[10px]"></i> UNDUH LAPORAN
            </button>
        </header>

        <div class="p-8 max-w-[1600px] mx-auto">

            <div
                class="bg-white dark:bg-slate-900 border border-gray-200 dark:border-slate-800 rounded shadow-sm overflow-hidden">
                <div
                    class="p-5 border-b border-gray-100 dark:border-slate-800 flex justify-between items-center bg-gray-50/50 dark:bg-slate-900/50">
                    <h3 class="font-bold text-slate-800 dark:text-white text-sm uppercase tracking-wider">Riwayat Pembayaran
                        ({{ $payments->total() }})</h3>

                    <div class="relative">
                        <input type="text" placeholder="Cari invoice..."
                            class="pl-8 pr-3 py-1.5 bg-white dark:bg-slate-800 border border-gray-200 dark:border-slate-700 rounded text-xs focus:ring-1 ring-indigo-500 outline-none w-56 transition-all dark:text-white">
                        <i class="fas fa-search absolute left-3 top-2.5 text-slate-400 text-[10px]"></i>
                    </div>
                </div>

                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead
                            class="bg-white dark:bg-slate-900 border-b border-gray-100 dark:border-slate-800 text-slate-400 text-[10px] uppercase tracking-widest font-bold">
                            <tr>
                                <th class="px-6 py-4">No. Invoice</th>
                                <th class="px-6 py-4">Customer</th>
                                <th class="px-6 py-4">Nominal</th>
                                <th class="px-6 py-4">Metode</th>
                                <th class="px-6 py-4">Waktu</th>
                                <th class="px-6 py-4">Status</th>
                                <th class="px-6 py-4 text-right">Tindakan</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-50 dark:divide-slate-800">
                            @forelse($payments as $payment)
                                <tr class="hover:bg-slate-50 dark:hover:bg-slate-800/50 transition-colors">
                                    <td class="px-6 py-4">
                                        <span class="font-mono text-xs font-bold text-indigo-600 dark:text-indigo-400">
                                            #{{ $payment->order->invoice_number ?? 'N/A' }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4">
                                        <span class="text-xs font-medium text-slate-600 dark:text-slate-300">
                                            {{ $payment->order->customer->name ?? '-' }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4">
                                        <span class="text-sm font-bold text-slate-700 dark:text-slate-200">
                                            Rp {{ number_format($payment->order->total_price ?? 0, 0, ',', '.') }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4">
                                        <span
                                            class="px-2 py-1 rounded text-[10px] font-black border uppercase tracking-tighter
                                                {{ $payment->order->payment_method === 'online' ? 'text-blue-600 bg-blue-50 border-blue-100' : 'text-stone-600 bg-stone-50 border-stone-100' }}">
                                            {{ $payment->order->payment_method === 'online' ? 'QRIS' : 'Tunai' }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="flex flex-col">
                                            <span class="text-xs text-slate-600 dark:text-slate-400 font-medium">
                                                {{ $payment->paid_at ? $payment->paid_at->format('d/m/Y') : 'Belum Bayar' }}
                                            </span>
                                            <span class="text-[10px] text-slate-400">
                                                {{ $payment->paid_at ? $payment->paid_at->format('H:i') . ' WIB' : '-' }}
                                            </span>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4">
                                        @php
                                            $statusStyle = [
                                                'pending' => 'text-amber-600 bg-amber-50 border-amber-100',
                                                'verified' => 'text-emerald-600 bg-emerald-50 border-emerald-100',
                                                'failed' => 'text-rose-600 bg-rose-50 border-rose-100',
                                            ];
                                            $currentStyle =
                                                $statusStyle[$payment->status] ??
                                                'text-slate-600 bg-slate-50 border-slate-100';
                                        @endphp
                                        <span
                                            class="px-2 py-1 rounded text-[10px] font-black border uppercase tracking-tighter {{ $currentStyle }} dark:bg-opacity-10 dark:border-opacity-20">
                                            {{ $payment->status }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 text-right">
                                        <div class="flex justify-end items-center space-x-3">

                                            {{-- Lihat Bukti Bayar --}}
                                            @if ($payment->proof_image)
                                                <a href="{{ asset('storage/' . $payment->proof_image) }}" target="_blank"
                                                    class="text-[10px] font-black uppercase tracking-widest text-amber-500 hover:text-amber-700 transition-colors">
                                                    Bukti
                                                </a>
                                                <span class="text-gray-200 dark:text-slate-800">|</span>
                                            @endif

                                            {{-- Konfirmasi Bayar --}}
                                            @if ($payment->status === 'pending')
                                                <form action="{{ route('admin.orders.confirm-payment', $payment->order) }}"
                                                    method="POST" class="inline">
                                                    @csrf @method('PATCH')
                                                    <button type="submit"
                                                        onclick="return confirm('Konfirmasi pembayaran ini?')"
                                                        class="text-[10px] font-black uppercase tracking-widest text-emerald-600 hover:text-emerald-800 transition-colors">
                                                        Konfirmasi
                                                    </button>
                                                </form>
                                                <span class="text-gray-200 dark:text-slate-800">|</span>
                                            @endif

                                            <a href="{{ route('admin.transaksi-qris.edit', $payment) }}"
                                                class="text-[10px] font-black uppercase tracking-widest text-indigo-600 dark:text-indigo-400 hover:text-indigo-800 transition-colors">
                                                Detail
                                            </a>
                                            <span class="text-gray-200 dark:text-slate-800">|</span>
                                            <form action="{{ route('admin.transaksi-qris.destroy', $payment) }}"
                                                method="POST" class="inline">
                                                @csrf @method('DELETE')
                                                <button type="submit"
                                                    onclick="return confirm('Hapus record transaksi ini?')"
                                                    class="text-[10px] font-black uppercase tracking-widest text-rose-500 hover:text-rose-700 transition-colors">
                                                    Hapus
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="px-6 py-12 text-center">
                                        <p class="text-xs text-slate-400 italic">Tidak ada riwayat transaksi ditemukan.</p>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                @if ($payments->hasPages())
                    <div
                        class="px-6 py-4 border-t border-gray-100 dark:border-slate-800 flex justify-between items-center bg-white dark:bg-slate-900">
                        <p class="text-[10px] font-bold text-slate-400 uppercase tracking-tighter">
                            Data {{ $payments->firstItem() }} s/d {{ $payments->lastItem() }}
                        </p>
                        <div class="pagination-minimal">
                            {{ $payments->links() }}
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>

    <style>
        .pagination-minimal nav svg {
            width: 1.2rem;
            height: 1.2rem;
        }

        .pagination-minimal nav p {
            display: none;
        }

        .pagination-minimal nav div:first-child {
            display: none;
        }
    </style>
@endsection
