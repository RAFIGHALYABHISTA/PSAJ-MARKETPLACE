@extends('layouts.admin.header')

@section('content')
<div class="min-h-screen transition-colors duration-300 dark:bg-slate-950 bg-[#F8FAFC] pb-12">

    {{-- Header --}}
    <header class="bg-white/80 dark:bg-slate-900/80 backdrop-blur-md border-b border-gray-200 dark:border-slate-800 sticky top-0 z-30 p-4 px-8 flex justify-between items-center">
        <div>
            <h1 class="text-xl font-extrabold text-slate-800 dark:text-white uppercase tracking-tight">Detail Transaksi</h1>
            <div class="flex items-center gap-2 mt-1">
                <span class="px-2 py-0.5 bg-indigo-50 dark:bg-indigo-900/30 text-indigo-600 dark:text-indigo-400 text-[10px] font-bold rounded uppercase tracking-wider border border-indigo-100 dark:border-indigo-800">
                    Invoice
                </span>
                <p class="text-sm font-mono font-bold text-slate-600 dark:text-slate-400">#{{ $payment->order->invoice_number }}</p>
            </div>
        </div>
        <a href="{{ route('admin.transaksi-qris') }}" 
            class="bg-white dark:bg-slate-800 text-slate-700 dark:text-slate-200 border border-gray-200 dark:border-slate-700 px-4 py-2 rounded-lg text-xs font-bold hover:bg-gray-50 dark:hover:bg-slate-700 transition-all shadow-sm flex items-center gap-2">
            <i class="fas fa-arrow-left text-[10px]"></i> KEMBALI
        </a>
    </header>

    <div class="p-8 max-w-6xl mx-auto space-y-6">

        {{-- Alert --}}
        @if(session('success'))
        <div class="bg-emerald-50 dark:bg-emerald-900/20 border border-emerald-200 dark:border-emerald-800 text-emerald-700 dark:text-emerald-400 text-xs font-bold px-4 py-3 rounded-lg flex items-center gap-3">
            <i class="fas fa-check-circle text-lg"></i>
            {{ session('success') }}
        </div>
        @endif

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

            {{-- Kolom Kiri: Informasi Utama --}}
            <div class="lg:col-span-2 space-y-6">

                {{-- Detail Transaksi --}}
                <div class="bg-white dark:bg-slate-900 border border-gray-200 dark:border-slate-800 rounded-xl shadow-sm overflow-hidden transition-all">
                    <div class="p-5 border-b border-gray-100 dark:border-slate-800 bg-gray-50/50 dark:bg-slate-800/50 flex items-center gap-3">
                        <div class="p-2 bg-indigo-500 rounded-lg shadow-indigo-200 dark:shadow-none shadow-lg">
                            <i class="fas fa-file-invoice text-white text-xs"></i>
                        </div>
                        <h3 class="font-bold text-slate-800 dark:text-white text-sm uppercase tracking-wider">Informasi Transaksi</h3>
                    </div>
                    
                    <div class="p-6">
                        <div class="grid grid-cols-2 md:grid-cols-3 gap-6 text-sm">
                            <div class="space-y-1">
                                <p class="text-[10px] font-bold uppercase tracking-widest text-slate-400">Customer</p>
                                <p class="font-bold text-slate-700 dark:text-slate-200 text-base">{{ $payment->order->customer->name ?? '-' }}</p>
                                <p class="text-xs text-slate-500 font-medium">{{ $payment->order->customer->email ?? '-' }}</p>
                            </div>
                            <div class="space-y-1">
                                <p class="text-[10px] font-bold uppercase tracking-widest text-slate-400">Tanggal Order</p>
                                <p class="font-bold text-slate-700 dark:text-slate-200">{{ $payment->order->created_at->format('d M Y') }}</p>
                                <p class="text-xs text-slate-500 font-medium leading-none">{{ $payment->order->created_at->format('H:i') }} WIB</p>
                            </div>
                            <div class="space-y-1">
                                <p class="text-[10px] font-bold uppercase tracking-widest text-slate-400">Metode</p>
                                <div>
                                    <span class="px-2.5 py-1 rounded-full text-[10px] font-black border uppercase shadow-sm
                                        {{ $payment->order->payment_method === 'online' ? 'text-blue-600 bg-blue-50 border-blue-100' : 'text-stone-600 bg-stone-50 border-stone-100' }}">
                                        {{ $payment->order->payment_method === 'online' ? 'QRIS' : 'Tunai' }}
                                    </span>
                                </div>
                            </div>
                            <div class="space-y-1">
                                <p class="text-[10px] font-bold uppercase tracking-widest text-slate-400">Status Bayar</p>
                                <span class="px-2.5 py-1 rounded-full text-[10px] font-black border uppercase shadow-sm {{ $statusStyle[$payment->status] ?? '' }}">
                                    {{ $payment->status }}
                                </span>
                            </div>
                            <div class="space-y-1">
                                <p class="text-[10px] font-bold uppercase tracking-widest text-slate-400">Status Ambil</p>
                                <span class="px-2.5 py-1 rounded-full text-[10px] font-black border uppercase shadow-sm {{ $pickupStyle[$payment->order->pickup_status] ?? '' }}">
                                    {{ $payment->order->pickup_status }}
                                </span>
                            </div>
                            @if($payment->paid_at)
                            <div class="space-y-1">
                                <p class="text-[10px] font-bold uppercase tracking-widest text-slate-400 text-emerald-500">Terverifikasi</p>
                                <p class="font-bold text-slate-700 dark:text-slate-200">{{ $payment->paid_at->format('d/m/y H:i') }}</p>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>

                {{-- List Produk --}}
                <div class="bg-white dark:bg-slate-900 border border-gray-200 dark:border-slate-800 rounded-xl shadow-sm overflow-hidden">
                    <div class="p-5 border-b border-gray-100 dark:border-slate-800 bg-gray-50/50 dark:bg-slate-800/50 flex items-center gap-3">
                        <div class="p-2 bg-amber-500 rounded-lg shadow-amber-200 dark:shadow-none shadow-lg">
                            <i class="fas fa-shopping-basket text-white text-xs"></i>
                        </div>
                        <h3 class="font-bold text-slate-800 dark:text-white text-sm uppercase tracking-wider">Item Pesanan</h3>
                    </div>
                    <div class="overflow-x-auto">
                        <table class="w-full text-left">
                            <thead class="text-[10px] uppercase tracking-widest text-slate-400 font-bold border-b border-gray-100 dark:border-slate-800">
                                <tr>
                                    <th class="px-6 py-4">Produk</th>
                                    <th class="px-6 py-4 text-center">Qty</th>
                                    <th class="px-6 py-4 text-right">Harga</th>
                                    <th class="px-6 py-4 text-right">Subtotal</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-50 dark:divide-slate-800">
                                @foreach($payment->order->orderItems as $item)
                                <tr class="hover:bg-gray-50/50 dark:hover:bg-slate-800/50 transition-colors">
                                    <td class="px-6 py-4">
                                        <p class="text-sm font-bold text-slate-700 dark:text-slate-200">{{ $item->product->name ?? '-' }}</p>
                                        <p class="text-[11px] text-slate-400 font-medium">{{ $item->product->category?->name ?? '-' }}</p>
                                    </td>
                                    <td class="px-6 py-4 text-center text-sm font-bold text-slate-600 dark:text-slate-300">
                                        <span class="bg-gray-100 dark:bg-slate-800 px-2 py-1 rounded text-xs leading-none">{{ $item->quantity }}</span>
                                    </td>
                                    <td class="px-6 py-4 text-right text-sm text-slate-600 dark:text-slate-300 font-medium">Rp {{ number_format($item->price, 0, ',', '.') }}</td>
                                    <td class="px-6 py-4 text-right text-sm font-extrabold text-slate-800 dark:text-slate-100">Rp {{ number_format($item->subtotal, 0, ',', '.') }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot class="bg-slate-900 dark:bg-indigo-950 text-white">
                                <tr>
                                    <td colspan="3" class="px-6 py-4 text-right text-xs font-bold uppercase tracking-widest text-slate-400">Total Pembayaran</td>
                                    <td class="px-6 py-4 text-right font-black text-lg">Rp {{ number_format($payment->order->total_price, 0, ',', '.') }}</td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>

            {{-- Kolom Kanan: Bukti & Aksi --}}
            <div class="space-y-6">

                {{-- Bukti Bayar --}}
                <div class="bg-white dark:bg-slate-900 border border-gray-200 dark:border-slate-800 rounded-xl shadow-sm overflow-hidden">
                    <div class="p-5 border-b border-gray-100 dark:border-slate-800 bg-gray-50/50 dark:bg-slate-800/50 flex items-center justify-between">
                        <h3 class="font-bold text-slate-800 dark:text-white text-sm uppercase tracking-wider">Bukti Bayar</h3>
                        <i class="fas fa-camera text-slate-300"></i>
                    </div>
                    <div class="p-6">
                        @if($payment->proof_image)
                            <div class="group relative overflow-hidden rounded-xl border border-gray-100 dark:border-slate-800 shadow-inner bg-gray-50 dark:bg-slate-800">
                                <img src="{{ asset('storage/' . $payment->proof_image) }}" 
                                    class="mx-auto max-h-72 object-contain transition-transform duration-500 group-hover:scale-110">
                                <a href="{{ asset('storage/' . $payment->proof_image) }}" target="_blank" 
                                    class="absolute inset-0 bg-slate-900/40 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center backdrop-blur-[2px]">
                                    <span class="bg-white text-slate-900 px-4 py-2 rounded-full text-xs font-bold shadow-xl">Lihat Detail</span>
                                </a>
                            </div>
                        @else
                            <div class="py-12 flex flex-col items-center justify-center border-2 border-dashed border-gray-100 dark:border-slate-800 rounded-xl">
                                <div class="w-12 h-12 bg-gray-50 dark:bg-slate-800 rounded-full flex items-center justify-center mb-3">
                                    <i class="fas fa-image text-slate-300"></i>
                                </div>
                                <p class="text-xs text-slate-400 italic">Belum ada lampiran</p>
                            </div>
                        @endif
                    </div>
                </div>

                {{-- Panel Aksi --}}
                <div class="bg-white dark:bg-slate-900 border border-gray-200 dark:border-slate-800 rounded-xl shadow-sm overflow-hidden">
                    <div class="p-5 border-b border-gray-100 dark:border-slate-800 bg-gray-50/50 dark:bg-slate-800/50">
                        <h3 class="font-bold text-slate-800 dark:text-white text-sm uppercase tracking-wider">Tindakan Admin</h3>
                    </div>
                    <div class="p-6 space-y-4">

                        @if($payment->status === 'pending')
                        <div class="space-y-3">
                            <button type="button" @click="$dispatch('confirm-payment', { form: $el.nextElementSibling })"
                                class="w-full bg-emerald-600 hover:bg-emerald-700 text-white py-3 rounded-lg text-xs font-black uppercase tracking-widest transition-all shadow-lg shadow-emerald-200 dark:shadow-none">
                                <i class="fas fa-check-circle mr-2"></i> Terima Bayar
                            </button>
                            <form action="{{ route('admin.orders.confirm-payment', $payment->order) }}" method="POST" class="hidden">
                                @csrf @method('PATCH')
                            </form>

                            <button type="button" @click="$dispatch('reject-payment', { form: $el.nextElementSibling })"
                                class="w-full bg-white dark:bg-slate-900 hover:bg-rose-50 text-rose-600 border border-rose-200 dark:border-rose-900/50 py-3 rounded-lg text-xs font-black uppercase tracking-widest transition-all">
                                <i class="fas fa-times-circle mr-2"></i> Tolak Bayar
                            </button>
                            <form action="{{ route('admin.transaksi-qris.update', $payment) }}" method="POST" class="hidden">
                                @csrf @method('PATCH')
                                <input type="hidden" name="status" value="failed">
                            </form>
                        </div>
                        @endif

                        {{-- Info Status Final --}}
                        @if($payment->status === 'verified')
                        <div class="bg-emerald-50 dark:bg-emerald-900/20 rounded-xl p-4 text-center border border-emerald-100 dark:border-emerald-800">
                            <div class="w-10 h-10 bg-emerald-500 rounded-full flex items-center justify-center mx-auto mb-3 shadow-lg shadow-emerald-200 dark:shadow-none">
                                <i class="fas fa-check text-white"></i>
                            </div>
                            <p class="text-xs font-black text-emerald-700 dark:text-emerald-400 uppercase tracking-wider">Transaksi Sukses</p>
                        </div>
                        @elseif($payment->status === 'failed')
                        <div class="bg-rose-50 dark:bg-rose-900/20 rounded-xl p-4 text-center border border-rose-100 dark:border-rose-800">
                            <i class="fas fa-exclamation-triangle text-rose-500 text-2xl mb-2"></i>
                            <p class="text-xs font-black text-rose-700 dark:text-rose-400 uppercase tracking-wider">Transaksi Gagal/Ditolak</p>
                        </div>
                        @endif

                        {{-- Update Pickup --}}
                        @if($payment->status === 'verified')
                        <form action="{{ route('admin.orders.update', $payment->order) }}" method="POST" class="pt-4 border-t border-gray-100 dark:border-slate-800">
                            @csrf @method('PATCH')
                            <label class="text-[10px] font-extrabold uppercase tracking-widest text-slate-400 mb-3 block text-center">Update Status Pengambilan</label>
                            
                            <div class="relative mb-4">
                                <select name="pickup_status" class="w-full appearance-none border border-gray-200 dark:border-slate-700 rounded-lg px-4 py-2.5 text-xs font-bold dark:bg-slate-800 dark:text-white outline-none focus:ring-2 ring-indigo-500 transition-all cursor-pointer">
                                    <option value="waiting" {{ $payment->order->pickup_status === 'waiting' ? 'selected' : '' }}>🕒 Menunggu (Waiting)</option>
                                    <option value="ready"   {{ $payment->order->pickup_status === 'ready'   ? 'selected' : '' }}>✅ Siap Diambil (Ready)</option>
                                    <option value="taken"   {{ $payment->order->pickup_status === 'taken'   ? 'selected' : '' }}>📦 Sudah Diambil (Taken)</option>
                                </select>
                            </div>
                            
                            <button type="submit" class="w-full bg-slate-900 dark:bg-indigo-600 hover:bg-slate-800 dark:hover:bg-indigo-700 text-white py-3 rounded-lg text-xs font-black uppercase tracking-widest transition-all">
                                Simpan Perubahan
                            </button>
                        </form>
                        @endif

                    </div>
                </div>

            </div>
        </div>
    </div>

    {{-- Payment Confirmation Modal --}}
    <div x-data="{ show: false, form: null }" @confirm-payment.window="show = true; form = $event.detail.form;" x-show="show"
        x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100"
        x-transition:leave="transition ease-in duration-200"
        x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0"
        class="fixed inset-0 z-50 flex items-center justify-center p-4" style="display: none;">
        <div class="absolute inset-0 bg-slate-900/60 backdrop-blur-sm" @click="show = false"></div>
        <div class="relative bg-white dark:bg-slate-900 rounded-2xl shadow-2xl shadow-emerald-500/10 w-full max-w-md overflow-hidden"
            x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0 scale-95 translate-y-4"
            x-transition:enter-end="opacity-100 scale-100 translate-y-0"
            x-transition:leave="transition ease-in duration-200"
            x-transition:leave-start="opacity-100 scale-100 translate-y-0"
            x-transition:leave-end="opacity-0 scale-95 translate-y-4">
            <div class="h-1.5 bg-gradient-to-r from-emerald-400 to-emerald-600"></div>
            <div class="p-6">
                <div class="w-16 h-16 bg-emerald-100 dark:bg-emerald-500/20 rounded-2xl flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-check-circle text-3xl text-emerald-600 dark:text-emerald-400"></i>
                </div>
                <h3 class="text-lg font-bold text-center text-slate-800 dark:text-white mb-2">Konfirmasi Pembayaran</h3>
                <p class="text-sm text-center text-slate-500 dark:text-slate-400 mb-6">Apakah Anda yakin ingin mengkonfirmasi pembayaran ini sebagai sah?</p>
                <div class="flex gap-3">
                    <button type="button" @click="show = false"
                        class="flex-1 px-4 py-3 bg-slate-100 dark:bg-slate-800 text-slate-600 dark:text-slate-300 rounded-xl text-xs font-bold hover:bg-slate-200 dark:hover:bg-slate-700 transition-all">
                        Batal
                    </button>
                    <button type="button" @click="form.submit(); show = false;"
                        class="flex-1 px-4 py-3 bg-emerald-600 hover:bg-emerald-700 text-white rounded-xl text-xs font-bold transition-all shadow-lg shadow-emerald-200 dark:shadow-none">
                        Ya, Konfirmasi
                    </button>
                </div>
            </div>
        </div>
    </div>

    {{-- Payment Rejection Modal --}}
    <div x-data="{ show: false, form: null }" @reject-payment.window="show = true; form = $event.detail.form;" x-show="show"
        x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100"
        x-transition:leave="transition ease-in duration-200"
        x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0"
        class="fixed inset-0 z-50 flex items-center justify-center p-4" style="display: none;">
        <div class="absolute inset-0 bg-slate-900/60 backdrop-blur-sm" @click="show = false"></div>
        <div class="relative bg-white dark:bg-slate-900 rounded-2xl shadow-2xl shadow-rose-500/10 w-full max-w-md overflow-hidden"
            x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0 scale-95 translate-y-4"
            x-transition:enter-end="opacity-100 scale-100 translate-y-0"
            x-transition:leave="transition ease-in duration-200"
            x-transition:leave-start="opacity-100 scale-100 translate-y-0"
            x-transition:leave-end="opacity-0 scale-95 translate-y-4">
            <div class="h-1.5 bg-gradient-to-r from-rose-400 to-rose-600"></div>
            <div class="p-6">
                <div class="w-16 h-16 bg-rose-100 dark:bg-rose-500/20 rounded-2xl flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-times-circle text-3xl text-rose-600 dark:text-rose-400"></i>
                </div>
                <h3 class="text-lg font-bold text-center text-slate-800 dark:text-white mb-2">Tolak Pembayaran</h3>
                <p class="text-sm text-center text-slate-500 dark:text-slate-400 mb-6">Apakah Anda yakin ingin menolak pembayaran ini?</p>
                <div class="flex gap-3">
                    <button type="button" @click="show = false"
                        class="flex-1 px-4 py-3 bg-slate-100 dark:bg-slate-800 text-slate-600 dark:text-slate-300 rounded-xl text-xs font-bold hover:bg-slate-200 dark:hover:bg-slate-700 transition-all">
                        Batal
                    </button>
                    <button type="button" @click="form.submit(); show = false;"
                        class="flex-1 px-4 py-3 bg-rose-600 hover:bg-rose-700 text-white rounded-xl text-xs font-bold transition-all shadow-lg shadow-rose-200 dark:shadow-none">
                        Ya, Tolak
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection