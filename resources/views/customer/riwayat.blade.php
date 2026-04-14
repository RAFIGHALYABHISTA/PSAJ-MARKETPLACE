@extends('layouts.customer')
@section('title', 'Riwayat Pesanan')
@section('content')
<div class="min-h-screen bg-stone-50 py-12 px-6">
    <div class="max-w-4xl mx-auto">

        <div class="mb-8 flex items-center gap-4">
            <a href="{{ route('home') }}" class="group flex items-center justify-center w-10 h-10 rounded-full bg-white border border-stone-200 text-stone-500 hover:border-[#738029] hover:text-[#738029] transition-all">
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
        <div class="bg-green-50 border border-green-200 text-green-700 text-sm px-4 py-3 rounded-xl mb-6">
            {{ session('success') }}
        </div>
        @endif

        <div class="space-y-4">
            @forelse($orders as $order)
            <div class="bg-white rounded-2xl border border-stone-100 shadow-sm overflow-hidden">

                {{-- Header Order --}}
                <div class="px-6 py-4 bg-stone-50 border-b border-stone-100 flex flex-col sm:flex-row sm:items-center justify-between gap-2">
                    <div>
                        <p class="font-mono text-xs font-bold text-indigo-600">{{ $order->invoice_number }}</p>
                        <p class="text-xs text-stone-400 mt-0.5">{{ $order->created_at->format('d M Y, H:i') }} WIB</p>
                    </div>
                    <div class="flex items-center gap-2">
                        {{-- Status Pembayaran --}}
                        @php
                            $paymentStyle = [
                                'pending' => 'text-amber-600 bg-amber-50 border-amber-200',
                                'paid'    => 'text-emerald-600 bg-emerald-50 border-emerald-200',
                                'failed'  => 'text-rose-600 bg-rose-50 border-rose-200',
                            ];
                        @endphp
                        <span class="px-3 py-1 rounded-full text-[10px] font-black border uppercase tracking-wider {{ $paymentStyle[$order->payment_status] ?? '' }}">
                            {{ $order->payment_status === 'pending' ? 'Menunggu Konfirmasi' : ($order->payment_status === 'paid' ? 'Lunas' : 'Gagal') }}
                        </span>

                        {{-- Status Pengambilan --}}
                        @if($order->payment_status === 'paid')
                        @php
                            $pickupStyle = [
                                'waiting' => 'text-amber-600 bg-amber-50 border-amber-200',
                                'ready'   => 'text-blue-600 bg-blue-50 border-blue-200',
                                'taken'   => 'text-emerald-600 bg-emerald-50 border-emerald-200',
                            ];
                            $pickupLabel = [
                                'waiting' => 'Diproses',
                                'ready'   => 'Siap Diambil',
                                'taken'   => 'Sudah Diambil',
                            ];
                        @endphp
                        <span class="px-3 py-1 rounded-full text-[10px] font-black border uppercase tracking-wider {{ $pickupStyle[$order->pickup_status] ?? '' }}">
                            {{ $pickupLabel[$order->pickup_status] ?? $order->pickup_status }}
                        </span>
                        @endif
                    </div>
                </div>

                {{-- Item Produk --}}
                <div class="divide-y divide-stone-50">
                    @foreach($order->orderItems as $item)
                    <div class="px-6 py-4 flex items-center gap-4">
                        <div class="shrink-0 bg-[#F9F1E7] w-14 h-14 rounded-xl flex items-center justify-center">
                            <img src="{{ Str::startsWith($item->product->image, 'http') ? $item->product->image : asset('storage/' . $item->product->image) }}"
                                 alt="{{ $item->product->name }}"
                                 class="w-10 h-10 object-contain mix-blend-multiply">
                        </div>
                        <div class="flex-1">
                            <p class="text-sm font-bold text-[#5B2C04]">{{ $item->product->name }}</p>
                            <p class="text-xs text-stone-400">{{ $item->quantity }} x Rp {{ number_format($item->price, 0, ',', '.') }}</p>
                        </div>
                        <p class="font-bold text-[#738029] text-sm">Rp {{ number_format($item->subtotal, 0, ',', '.') }}</p>
                    </div>
                    @endforeach
                </div>

                {{-- Footer Order --}}
                <div class="px-6 py-4 bg-stone-50 border-t border-stone-100 flex flex-col sm:flex-row items-center justify-between gap-3">
                    <div class="text-xs text-stone-500">
                        Metode: <span class="font-bold">{{ $order->payment_method === 'online' ? 'QRIS' : 'Tunai' }}</span>
                        @if($order->referral_code)
                        • Referral: <span class="font-bold text-[#738029]">{{ $order->referral_code }}</span>
                        @endif
                    </div>
                    <div class="flex items-center gap-3">
                        <span class="text-sm text-stone-500">Total:</span>
                        <span class="font-serif text-lg font-bold text-[#738029]">Rp {{ number_format($order->total_price, 0, ',', '.') }}</span>
                    </div>
                </div>

            </div>
            @empty
            <div class="bg-white rounded-2xl p-12 border border-stone-100 shadow-sm text-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-16 h-16 mx-auto text-stone-200 mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                </svg>
                <p class="text-stone-400 italic text-sm">Belum ada pesanan.</p>
                <a href="{{ url('/produk') }}" class="inline-block mt-4 text-xs font-bold uppercase tracking-widest text-[#738029] hover:text-[#5B2C04] transition">
                    Mulai Belanja →
                </a>
            </div>
            @endforelse
        </div>

        @if($orders->hasPages())
        <div class="mt-6">{{ $orders->links() }}</div>
        @endif

    </div>
</div>
@endsection