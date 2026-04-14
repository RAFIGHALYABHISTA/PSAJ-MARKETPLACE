@extends('layouts.customer')
@section('title', 'Pesanan Berhasil')
@section('content')
<div class="min-h-screen bg-stone-50 flex items-center justify-center px-6 py-12">
    <div class="bg-white rounded-2xl shadow-sm border border-stone-100 p-10 max-w-md w-full text-center">
        
        <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-6">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
            </svg>
        </div>

        <h1 class="font-serif text-2xl text-[#5B2C04] mb-2">Pesanan Berhasil!</h1>
        <p class="text-stone-500 text-sm mb-6">
            Pesanan kamu sedang menunggu konfirmasi admin.
        </p>

        <div class="bg-stone-50 rounded-xl p-4 text-left space-y-2 mb-6 text-sm">
            <div class="flex justify-between">
                <span class="text-stone-400">No. Invoice</span>
                <span class="font-bold text-[#5B2C04]">{{ $order->invoice_number }}</span>
            </div>
            <div class="flex justify-between">
                <span class="text-stone-400">Total</span>
                <span class="font-bold text-[#738029]">Rp {{ number_format($order->total_price, 0, ',', '.') }}</span>
            </div>
            <div class="flex justify-between">
                <span class="text-stone-400">Metode</span>
                <span class="font-medium text-stone-600">{{ $order->payment_method === 'online' ? 'QRIS' : 'Tunai' }}</span>
            </div>
            <div class="flex justify-between">
                <span class="text-stone-400">Status</span>
                <span class="inline-block px-2 py-0.5 rounded-full text-xs font-bold bg-yellow-100 text-yellow-700">
                    Menunggu Konfirmasi
                </span>
            </div>
        </div>

        @if($order->payment_method === 'online' && $order->payment_proof)
        <div class="mb-6">
            <p class="text-xs text-stone-400 uppercase tracking-wider font-bold mb-2">Bukti Bayar Terkirim</p>
            <img src="{{ asset('storage/' . $order->payment_proof) }}" class="mx-auto w-32 rounded-xl border border-stone-100 shadow-sm">
        </div>
        @endif

        <a href="{{ url('/produk') }}" class="inline-block w-full bg-[#738029] hover:bg-[#5B2C04] text-white py-3 rounded-full font-bold uppercase tracking-widest text-xs transition">
            Lanjut Belanja
        </a>
    </div>
</div>
@endsection