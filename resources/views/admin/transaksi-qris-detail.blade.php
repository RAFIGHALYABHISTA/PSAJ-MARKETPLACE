@extends('layouts.admin.header')

@section('content')
<div class="min-h-screen transition-colors duration-300 dark:bg-slate-950 bg-[#F8FAFC]">

    <header class="bg-white dark:bg-slate-900 border-b border-gray-200 dark:border-slate-800 sticky top-0 z-30 p-4 px-8 flex justify-between items-center">
        <div>
            <h1 class="text-xl font-bold text-slate-800 dark:text-white uppercase tracking-tight">Detail Transaksi</h1>
            <p class="text-xs text-slate-400 font-medium italic">
                Invoice <span class="text-indigo-600">#{{ $payment->order->invoice_number }}</span>
            </p>
        </div>
        <a href="{{ route('admin.transaksi-qris') }}" 
            class="bg-slate-900 dark:bg-indigo-600 text-white px-4 py-2 rounded text-xs font-bold hover:opacity-90 transition shadow-sm flex items-center gap-2">
            <i class="fas fa-arrow-left text-[10px]"></i> KEMBALI
        </a>
    </header>

    <div class="p-8 max-w-5xl mx-auto space-y-6">

        {{-- Alert sukses --}}
        @if(session('success'))
        <div class="bg-emerald-50 border border-emerald-200 text-emerald-700 text-xs font-bold px-4 py-3 rounded">
            {{ session('success') }}
        </div>
        @endif

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

            {{-- Info Order --}}
            <div class="lg:col-span-2 space-y-6">

                {{-- Detail Transaksi --}}
                <div class="bg-white dark:bg-slate-900 border border-gray-200 dark:border-slate-800 rounded shadow-sm overflow-hidden">
                    <div class="p-5 border-b border-gray-100 dark:border-slate-800 bg-gray-50/50">
                        <h3 class="font-bold text-slate-800 dark:text-white text-sm uppercase tracking-wider">Informasi Transaksi</h3>
                    </div>
                    <div class="p-6 space-y-4">
                        <div class="grid grid-cols-2 gap-4 text-sm">
                            <div>
                                <p class="text-[10px] font-bold uppercase tracking-widest text-slate-400 mb-1">No. Invoice</p>
                                <p class="font-mono font-bold text-indigo-600">{{ $payment->order->invoice_number }}</p>
                            </div>
                            <div>
                                <p class="text-[10px] font-bold uppercase tracking-widest text-slate-400 mb-1">Tanggal Order</p>
                                <p class="font-medium text-slate-700 dark:text-slate-200">{{ $payment->order->created_at->format('d M Y, H:i') }} WIB</p>
                            </div>
                            <div>
                                <p class="text-[10px] font-bold uppercase tracking-widest text-slate-400 mb-1">Customer</p>
                                <p class="font-medium text-slate-700 dark:text-slate-200">{{ $payment->order->customer->name ?? '-' }}</p>
                                <p class="text-xs text-slate-400">{{ $payment->order->customer->email ?? '-' }}</p>
                            </div>
                            <div>
                                <p class="text-[10px] font-bold uppercase tracking-widest text-slate-400 mb-1">Metode Pembayaran</p>
                                <span class="px-2 py-1 rounded text-[10px] font-black border uppercase
                                    {{ $payment->order->payment_method === 'online' ? 'text-blue-600 bg-blue-50 border-blue-100' : 'text-stone-600 bg-stone-50 border-stone-100' }}">
                                    {{ $payment->order->payment_method === 'online' ? 'QRIS' : 'Tunai' }}
                                </span>
                            </div>
                            <div>
                                <p class="text-[10px] font-bold uppercase tracking-widest text-slate-400 mb-1">Status Pembayaran</p>
                                @php
                                    $statusStyle = [
                                        'pending'  => 'text-amber-600 bg-amber-50 border-amber-100',
                                        'verified' => 'text-emerald-600 bg-emerald-50 border-emerald-100',
                                        'failed'   => 'text-rose-600 bg-rose-50 border-rose-100',
                                    ];
                                @endphp
                                <span class="px-2 py-1 rounded text-[10px] font-black border uppercase {{ $statusStyle[$payment->status] ?? '' }}">
                                    {{ $payment->status }}
                                </span>
                            </div>
                            <div>
                                <p class="text-[10px] font-bold uppercase tracking-widest text-slate-400 mb-1">Status Pengambilan</p>
                                @php
                                    $pickupStyle = [
                                        'waiting' => 'text-amber-600 bg-amber-50 border-amber-100',
                                        'ready'   => 'text-blue-600 bg-blue-50 border-blue-100',
                                        'taken'   => 'text-emerald-600 bg-emerald-50 border-emerald-100',
                                    ];
                                @endphp
                                <span class="px-2 py-1 rounded text-[10px] font-black border uppercase {{ $pickupStyle[$payment->order->pickup_status] ?? '' }}">
                                    {{ $payment->order->pickup_status }}
                                </span>
                            </div>
                            @if($payment->order->referral_code)
                            <div>
                                <p class="text-[10px] font-bold uppercase tracking-widest text-slate-400 mb-1">Kode Referral</p>
                                <p class="font-mono font-bold text-slate-700 dark:text-slate-200">{{ $payment->order->referral_code }}</p>
                                <p class="text-xs text-slate-400">{{ $payment->order->affiliator->name ?? '-' }}</p>
                            </div>
                            <div>
                                <p class="text-[10px] font-bold uppercase tracking-widest text-slate-400 mb-1">Komisi Afiliator</p>
                                <p class="font-bold text-slate-700 dark:text-slate-200">Rp {{ number_format($payment->order->commission_amount, 0, ',', '.') }}</p>
                            </div>
                            @endif
                            @if($payment->paid_at)
                            <div>
                                <p class="text-[10px] font-bold uppercase tracking-widest text-slate-400 mb-1">Waktu Verifikasi</p>
                                <p class="font-medium text-slate-700 dark:text-slate-200">{{ $payment->paid_at->format('d M Y, H:i') }} WIB</p>
                                <p class="text-xs text-slate-400">oleh {{ $payment->verifiedBy->name ?? '-' }}</p>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>

                {{-- List Produk --}}
                <div class="bg-white dark:bg-slate-900 border border-gray-200 dark:border-slate-800 rounded shadow-sm overflow-hidden">
                    <div class="p-5 border-b border-gray-100 dark:border-slate-800 bg-gray-50/50">
                        <h3 class="font-bold text-slate-800 dark:text-white text-sm uppercase tracking-wider">Item Pesanan</h3>
                    </div>
                    <table class="w-full text-left">
                        <thead class="text-[10px] uppercase tracking-widest text-slate-400 font-bold border-b border-gray-100 dark:border-slate-800">
                            <tr>
                                <th class="px-6 py-3">Produk</th>
                                <th class="px-6 py-3 text-center">Qty</th>
                                <th class="px-6 py-3 text-right">Harga</th>
                                <th class="px-6 py-3 text-right">Subtotal</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-50 dark:divide-slate-800">
                            @foreach($payment->order->orderItems as $item)
                            <tr>
                                <td class="px-6 py-3">
                                    <p class="text-sm font-medium text-slate-700 dark:text-slate-200">{{ $item->product->name ?? '-' }}</p>
                                    <p class="text-xs text-slate-400">{{ $item->product->category?->name ?? '-' }}</p>
                                </td>
                                <td class="px-6 py-3 text-center text-sm font-bold text-slate-600 dark:text-slate-300">{{ $item->quantity }}</td>
                                <td class="px-6 py-3 text-right text-sm text-slate-600 dark:text-slate-300">Rp {{ number_format($item->price, 0, ',', '.') }}</td>
                                <td class="px-6 py-3 text-right text-sm font-bold text-slate-700 dark:text-slate-200">Rp {{ number_format($item->subtotal, 0, ',', '.') }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot class="border-t border-gray-100 dark:border-slate-800 bg-gray-50/50">
                            <tr>
                                <td colspan="3" class="px-6 py-3 text-right text-xs font-bold uppercase tracking-widest text-slate-400">Total</td>
                                <td class="px-6 py-3 text-right font-bold text-indigo-600">Rp {{ number_format($payment->order->total_price, 0, ',', '.') }}</td>
                            </tr>
                        </tfoot>
                    </table>
                </div>

            </div>

            {{-- Sidebar: Bukti & Aksi --}}
            <div class="space-y-6">

                {{-- Bukti Bayar --}}
                <div class="bg-white dark:bg-slate-900 border border-gray-200 dark:border-slate-800 rounded shadow-sm overflow-hidden">
                    <div class="p-5 border-b border-gray-100 dark:border-slate-800 bg-gray-50/50">
                        <h3 class="font-bold text-slate-800 dark:text-white text-sm uppercase tracking-wider">Bukti Bayar</h3>
                    </div>
                    <div class="p-5 text-center">
                        @if($payment->proof_image)
                            <a href="{{ asset('storage/' . $payment->proof_image) }}" target="_blank">
                                <img src="{{ asset('storage/' . $payment->proof_image) }}" 
                                    class="mx-auto rounded-lg border border-gray-100 max-h-64 object-contain hover:opacity-90 transition">
                            </a>
                            <p class="text-[10px] text-slate-400 mt-2">Klik untuk perbesar</p>
                        @else
                            <div class="py-8">
                                <i class="fas fa-image text-3xl text-slate-200 mb-2"></i>
                                <p class="text-xs text-slate-400 italic">Tidak ada bukti bayar</p>
                            </div>
                        @endif
                    </div>
                </div>

                {{-- Aksi --}}
                <div class="bg-white dark:bg-slate-900 border border-gray-200 dark:border-slate-800 rounded shadow-sm overflow-hidden">
                    <div class="p-5 border-b border-gray-100 dark:border-slate-800 bg-gray-50/50">
                        <h3 class="font-bold text-slate-800 dark:text-white text-sm uppercase tracking-wider">Tindakan</h3>
                    </div>
                    <div class="p-5 space-y-3">

                        {{-- Konfirmasi Bayar --}}
                        @if($payment->status === 'pending')
                        <form action="{{ route('admin.orders.confirm-payment', $payment->order) }}" method="POST">
                            @csrf @method('PATCH')
                            <button type="submit" onclick="return confirm('Konfirmasi pembayaran ini?')"
                                class="w-full bg-emerald-600 hover:bg-emerald-700 text-white py-2.5 rounded text-xs font-black uppercase tracking-widest transition">
                                <i class="fas fa-check mr-1"></i> Konfirmasi Pembayaran
                            </button>
                        </form>

                        <form action="{{ route('admin.transaksi-qris.update', $payment) }}" method="POST">
                            @csrf @method('PATCH')
                            <input type="hidden" name="status" value="failed">
                            <button type="submit" onclick="return confirm('Tolak pembayaran ini?')"
                                class="w-full bg-rose-50 hover:bg-rose-100 text-rose-600 border border-rose-200 py-2.5 rounded text-xs font-black uppercase tracking-widest transition">
                                <i class="fas fa-times mr-1"></i> Tolak Pembayaran
                            </button>
                        </form>
                        @endif

                        @if($payment->status === 'verified')
                        <div class="text-center py-4">
                            <i class="fas fa-check-circle text-2xl text-emerald-500 mb-2"></i>
                            <p class="text-xs font-bold text-emerald-600">Pembayaran Terverifikasi</p>
                            <p class="text-[10px] text-slate-400 mt-1">{{ $payment->paid_at?->format('d M Y, H:i') }} WIB</p>
                        </div>
                        @endif

                        @if($payment->status === 'failed')
                        <div class="text-center py-4">
                            <i class="fas fa-times-circle text-2xl text-rose-500 mb-2"></i>
                            <p class="text-xs font-bold text-rose-600">Pembayaran Ditolak</p>
                        </div>
                        @endif

                        {{-- Update Pickup Status --}}
                        @if($payment->status === 'verified')
                        <form action="{{ route('admin.orders.update', $payment->order) }}" method="POST" class="pt-2 border-t border-gray-100 dark:border-slate-800">
                            @csrf @method('PATCH')
                            <label class="text-[10px] font-bold uppercase tracking-widest text-slate-400 mb-2 block">Status Pengambilan</label>
                            <select name="pickup_status" class="w-full border border-gray-200 dark:border-slate-700 rounded px-3 py-2 text-xs dark:bg-slate-800 dark:text-white outline-none focus:ring-1 ring-indigo-500 mb-2">
                                <option value="waiting" {{ $payment->order->pickup_status === 'waiting' ? 'selected' : '' }}>Waiting</option>
                                <option value="ready"   {{ $payment->order->pickup_status === 'ready'   ? 'selected' : '' }}>Ready</option>
                                <option value="taken"   {{ $payment->order->pickup_status === 'taken'   ? 'selected' : '' }}>Taken</option>
                            </select>
                            <button type="submit" class="w-full bg-indigo-600 hover:bg-indigo-700 text-white py-2 rounded text-xs font-black uppercase tracking-widest transition">
                                Update Status
                            </button>
                        </form>
                        @endif

                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection