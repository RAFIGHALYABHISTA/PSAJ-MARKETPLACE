@extends('layouts.customer')
@section('title', 'Riwayat Pesanan')
@section('content')
<div class="min-h-screen bg-stone-50 py-12 px-6">
    <div class="max-w-4xl mx-auto">

        <div class="mb-8 flex items-center gap-4">
            <a href="{{ route('home') }}" class="group flex items-center justify-center w-10 h-10 rounded-full bg-white border border-stone-200 text-stone-500 hover:border-[#738029] hover:text-[#738029] transition-all shadow-sm">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                </svg>
            </a>
            <div>
                <h1 class="text-3xl font-serif text-[#5B2C04]">Riwayat Pesanan</h1>
                <p class="text-sm text-stone-500 mt-1">Pantau status pesanan kamu</p>
            </div>
        </div>

        @if(session('success'))
        <div class="bg-green-50 border border-green-200 text-green-700 text-sm px-4 py-3 rounded-xl mb-6 flex items-center gap-3">
            <i class="fas fa-check-circle"></i>
            {{ session('success') }}
        </div>
        @endif

        <div class="space-y-6">
            @forelse($orders as $order)
            <div class="bg-white rounded-2xl border border-stone-100 shadow-sm overflow-hidden transition-all hover:shadow-md">

                {{-- Header Order --}}
                <div class="px-6 py-5 bg-stone-50/50 border-b border-stone-100 flex flex-col md:flex-row md:items-center justify-between gap-4">
                    <div>
                        <div class="flex items-center gap-2">
                            <span class="text-[10px] font-bold uppercase tracking-widest text-stone-400">No. Invoice</span>
                            <p class="font-mono text-sm font-bold text-indigo-600">{{ $order->invoice_number }}</p>
                        </div>
                        <p class="text-[11px] text-stone-400 mt-1 uppercase"><i class="far fa-calendar-alt mr-1"></i> {{ $order->created_at->format('d M Y, H:i') }} WIB</p>
                    </div>

                    {{-- Visual Status Tracker --}}
                    <div class="flex items-center gap-1 sm:gap-3">
                        @php
                            $isPending = $order->payment_status === 'pending';
                            $isPaid = $order->payment_status === 'paid';
                            $isFailed = $order->payment_status === 'failed';
                            $pickup = $order->pickup_status;
                        @endphp

                        {{-- Step 1: Pembayaran --}}
                        <div class="flex flex-col items-center">
                            <div class="w-7 h-7 rounded-full flex items-center justify-center text-[10px] border {{ $isPaid ? 'bg-[#738029] border-[#738029] text-white' : ($isFailed ? 'bg-rose-500 border-rose-500 text-white' : 'bg-amber-100 border-amber-300 text-amber-600') }}">
                                <i class="fas {{ $isPaid ? 'fa-check' : ($isFailed ? 'fa-times' : 'fa-wallet') }}"></i>
                            </div>
                            <span class="text-[9px] mt-1 font-bold uppercase text-stone-400 tracking-tighter">Bayar</span>
                        </div>

                        <div class="w-4 sm:w-8 h-[2px] bg-stone-200 mb-4"></div>

                        {{-- Step 2: Proses --}}
                        <div class="flex flex-col items-center opacity-{{ $isPaid ? '100' : '40' }}">
                            <div class="w-7 h-7 rounded-full flex items-center justify-center text-[10px] border {{ $isPaid && ($pickup === 'ready' || $pickup === 'taken') ? 'bg-[#738029] border-[#738029] text-white' : 'bg-stone-100 border-stone-300 text-stone-500' }}">
                                <i class="fas fa-sync-alt {{ $isPaid && $pickup === 'waiting' ? 'fa-spin' : '' }}"></i>
                            </div>
                            <span class="text-[9px] mt-1 font-bold uppercase text-stone-400 tracking-tighter">Proses</span>
                        </div>

                        <div class="w-4 sm:w-8 h-[2px] bg-stone-200 mb-4"></div>

                        {{-- Step 3: Siap / Selesai --}}
                        <div class="flex flex-col items-center opacity-{{ $pickup === 'ready' || $pickup === 'taken' ? '100' : '40' }}">
                            <div class="w-7 h-7 rounded-full flex items-center justify-center text-[10px] border {{ $pickup === 'taken' ? 'bg-[#738029] border-[#738029] text-white' : ($pickup === 'ready' ? 'bg-blue-500 border-blue-500 text-white' : 'bg-stone-100 border-stone-300 text-stone-500') }}">
                                <i class="fas {{ $pickup === 'taken' ? 'fa-check-double' : 'fa-box-open' }}"></i>
                            </div>
                            <span class="text-[9px] mt-1 font-bold uppercase text-stone-400 tracking-tighter">{{ $pickup === 'taken' ? 'Selesai' : 'Siap' }}</span>
                        </div>
                    </div>
                </div>

                {{-- Item Produk --}}
                <div class="divide-y divide-stone-50">
                    @foreach($order->orderItems as $item)
                    <div class="px-6 py-4 flex items-center gap-4 hover:bg-stone-50/30 transition-colors">
                        <div class="shrink-0 bg-[#F9F1E7] w-16 h-16 rounded-2xl flex items-center justify-center border border-stone-100 shadow-inner">
                            <img src="{{ $item->product->image ? asset($item->product->image) : ($item->product->image_url ?? asset('images/produk.png')) }}"
                                 alt="{{ $item->product->name }}"
                                 class="w-12 h-12 object-contain mix-blend-multiply">
                        </div>
                        <div class="flex-1">
                            <p class="text-sm font-bold text-[#5B2C04] leading-tight">{{ $item->product->name }}</p>
                            <p class="text-xs text-stone-400 mt-1">{{ $item->quantity }} x <span class="font-medium text-stone-600 font-mono italic">Rp {{ number_format($item->price, 0, ',', '.') }}</span></p>
                        </div>
                        <p class="font-bold text-[#738029] text-sm">Rp {{ number_format($item->subtotal, 0, ',', '.') }}</p>
                    </div>
                    @endforeach
                </div>

                {{-- Footer Order --}}
                <div class="px-6 py-4 bg-stone-50 border-t border-stone-100 flex flex-col sm:flex-row items-center justify-between gap-4">
                    <div class="flex flex-wrap items-center gap-y-2 gap-x-4 text-[11px] text-stone-500 uppercase tracking-wide">
                        <div class="flex items-center gap-1.5">
                            <i class="fas fa-credit-card text-stone-300"></i>
                            <span>Metode: <span class="font-bold text-stone-700">{{ $order->payment_method === 'online' ? 'QRIS' : 'Tunai' }}</span></span>
                        </div>
                        @if($order->referral_code)
                        <div class="flex items-center gap-1.5 border-l border-stone-200 pl-4">
                            <i class="fas fa-tag text-[#738029]/50"></i>
                            <span>Referral: <span class="font-bold text-[#738029]">{{ $order->referral_code }}</span></span>
                        </div>
                        @endif
                    </div>
                    <div class="flex items-center gap-4">
                        <span class="text-xs font-bold uppercase tracking-widest text-stone-400">Total Tagihan</span>
                        <span class="font-serif text-xl font-bold text-[#738029]">Rp {{ number_format($order->total_price, 0, ',', '.') }}</span>
                    </div>
                </div>

                {{-- Bukti Bayar Section --}}
                @if($order->payment && $order->payment->proof_image)
                <div class="px-6 py-4 bg-emerald-50/30 border-t border-emerald-100">
                    <div class="flex items-center gap-3 mb-3">
                        <div class="w-8 h-8 bg-emerald-500 rounded-lg flex items-center justify-center">
                            <i class="fas fa-receipt text-white text-xs"></i>
                        </div>
                        <div>
                            <p class="text-xs font-bold text-emerald-800 uppercase tracking-wider">Bukti Pembayaran</p>
                            <p class="text-[10px] text-emerald-600">Dikirim: {{ $order->payment->paid_at ? $order->payment->paid_at->format('d M Y, H:i') : $order->created_at->format('d M Y, H:i') }}</p>
                        </div>
                    </div>
                    <div class="group relative overflow-hidden rounded-xl border border-emerald-200 bg-white shadow-sm">
                        <img src="{{ asset('storage/' . $order->payment->proof_image) }}"
                             alt="Bukti Pembayaran"
                             class="w-full h-48 object-cover">
                        <a href="{{ asset('storage/' . $order->payment->proof_image) }}" target="_blank"
                           class="absolute inset-0 bg-emerald-900/40 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center">
                            <span class="bg-white text-emerald-800 px-4 py-2 rounded-full text-xs font-bold shadow-lg">
                                <i class="fas fa-expand mr-2"></i> Lihat Full Size
                            </span>
                        </a>
                    </div>
                </div>
                @endif

            </div>
            @empty
            <div class="bg-white rounded-3xl p-16 border border-stone-100 shadow-sm text-center">
                <div class="w-20 h-20 bg-stone-50 rounded-full flex items-center justify-center mx-auto mb-6">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-10 h-10 text-stone-200" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                    </svg>
                </div>
                <h3 class="text-lg font-serif text-[#5B2C04] mb-1">Belum ada pesanan</h3>
                <p class="text-stone-400 text-sm mb-8">Sepertinya kamu belum pernah belanja di sini.</p>
                <a href="{{ url('/produk') }}" class="inline-flex items-center justify-center px-8 py-3 bg-[#738029] hover:bg-[#5B2C04] text-white text-xs font-bold uppercase tracking-widest rounded-full transition-all shadow-lg shadow-[#738029]/20">
                    Mulai Belanja Sekarang
                </a>
            </div>
            @endforelse
        </div>

        @if($orders->hasPages())
        <div class="mt-10">
            {{ $orders->links() }}
        </div>
        @endif

    </div>
</div>
@endsection