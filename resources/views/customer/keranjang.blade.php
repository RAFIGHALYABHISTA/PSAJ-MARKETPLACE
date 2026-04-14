@extends('layouts.customer')

@section('title', 'Keranjang Belanja')

@section('content')
    <div class="min-h-screen bg-stone-50 py-12 px-6">
        <div class="max-w-6xl mx-auto">

            @if (session('success'))
                <div x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 4000)"
                    x-transition:leave="transition ease-in duration-300" x-transition:leave-start="opacity-100 translate-y-0"
                    x-transition:leave-end="opacity-0 -translate-y-2"
                    class="mb-6 bg-green-50 border border-green-200 rounded-xl px-5 py-3 flex items-center justify-between">
                    <div class="flex items-center gap-3">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-green-500" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                        <p class="text-sm font-medium text-green-700">{{ session('success') }}</p>
                    </div>
                    <button @click="show = false" class="text-green-400 hover:text-green-600 transition">✕</button>
                </div>
            @endif

            <div class="mb-8 flex flex-col md:flex-row md:items-center justify-between gap-4">
                <div class="flex items-center gap-4">
                    <a href="{{ url('/produk') }}"
                        class="group flex items-center justify-center w-10 h-10 rounded-full bg-white border border-stone-200 text-stone-500 hover:border-[#738029] hover:text-[#738029] transition-all">
                        <svg xmlns="http://www.w3.org/2000/svg"
                            class="w-5 h-5 group-hover:-translate-x-0.5 transition-transform" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                        </svg>
                    </a>
                    <div>
                        <h1 class="text-3xl font-serif text-[#5B2C04]">Keranjang Belanja</h1>
                        <p class="text-sm text-stone-500 mt-1">Anda memiliki
                            <span class="font-bold text-[#738029]">{{ $keranjang->count() }} item</span>
                            dalam keranjang
                        </p>
                    </div>
                </div>
            </div>

            <div class="flex flex-col lg:flex-row gap-8">

                {{-- List Produk --}}
                <div class="flex-1 space-y-4">

                    <div
                        class="hidden md:flex items-center justify-between px-6 pb-2 text-xs font-bold text-stone-400 uppercase tracking-widest">
                        <span>Produk</span>
                        <span class="pr-12">Total</span>
                    </div>

                    @forelse($keranjang as $item)
                        <div
                            class="bg-white rounded-2xl p-4 border border-stone-100 shadow-sm flex flex-col sm:flex-row items-center gap-6 transition hover:shadow-md">

                            <div
                                class="shrink-0 bg-[#F9F1E7] w-full sm:w-28 h-28 rounded-xl flex items-center justify-center">
                                <img src="{{ Str::startsWith($item->product->image, 'http') ? $item->product->image : asset('storage/' . $item->product->image) }}"
                                    alt="{{ $item->product->name }}" class="w-20 h-20 object-contain mix-blend-multiply">
                            </div>

                            <div class="flex-1 w-full text-center sm:text-left">
                                <div class="flex flex-col sm:flex-row sm:justify-between items-center mb-4 sm:mb-0">
                                    <div>
                                        <h2 class="font-serif text-lg text-[#5B2C04]">{{ $item->product->name }}</h2>
                                        <p class="text-xs font-bold text-stone-400 uppercase tracking-wider mt-1">
                                            {{ $item->product->category?->name ?? '-' }}
                                        </p>
                                    </div>
                                    {{-- Harga mobile --}}
                                    <p class="sm:hidden font-bold text-[#738029] mt-2">
                                        Rp {{ number_format($item->subtotal, 0, ',', '.') }}
                                    </p>
                                </div>

                                <div class="flex items-center justify-center sm:justify-between mt-4">

                                    {{-- Quantity Controls --}}
                                    <div class="flex items-center border border-stone-200 rounded-full h-9 w-fit">
                                        {{-- Kurangi --}}
                                        <form action="{{ route('customer.keranjang.update', $item) }}" method="POST">
                                            @csrf @method('PATCH')
                                            <input type="hidden" name="quantity" value="{{ $item->quantity - 1 }}">
                                            <button type="submit"
                                                class="w-8 h-9 text-stone-500 hover:text-[#738029] flex items-center justify-center transition {{ $item->quantity <= 1 ? 'opacity-30 pointer-events-none' : '' }}">
                                                -
                                            </button>
                                        </form>

                                        <span
                                            class="w-10 text-center text-sm font-bold text-[#5B2C04] border-x border-stone-100 py-1">
                                            {{ $item->quantity }}
                                        </span>

                                        {{-- Tambah --}}
                                        <form action="{{ route('customer.keranjang.update', $item) }}" method="POST">
                                            @csrf @method('PATCH')
                                            <input type="hidden" name="quantity" value="{{ $item->quantity + 1 }}">
                                            <button type="submit"
                                                class="w-8 h-9 text-stone-500 hover:text-[#738029] flex items-center justify-center transition">
                                                +
                                            </button>
                                        </form>
                                    </div>

                                    {{-- Harga desktop --}}
                                    <p class="hidden sm:block font-bold text-[#738029] text-lg">
                                        Rp {{ number_format($item->subtotal, 0, ',', '.') }}
                                    </p>

                                    {{-- Hapus --}}
                                    <form action="{{ route('customer.keranjang.destroy', $item) }}" method="POST">
                                        @csrf @method('DELETE')
                                        <button type="submit"
                                            class="ml-4 text-stone-300 hover:text-red-500 transition p-2 rounded-full hover:bg-red-50">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none"
                                                viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                                    d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                            </svg>
                                        </button>
                                    </form>

                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="bg-white rounded-2xl p-12 border border-stone-100 shadow-sm text-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-16 h-16 mx-auto text-stone-200 mb-4"
                                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1"
                                    d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                            </svg>
                            <p class="text-stone-400 italic text-sm">Keranjang kamu masih kosong.</p>
                            <a href="{{ url('/produk') }}"
                                class="inline-block mt-4 text-xs font-bold uppercase tracking-widest text-[#738029] hover:text-[#5B2C04] transition">
                                Mulai Belanja →
                            </a>
                        </div>
                    @endforelse

                </div>

                {{-- Ringkasan Belanja --}}
                @php $total = $subtotal; @endphp
                <div class="lg:w-96 shrink-0">
                    <form action="{{ route('customer.keranjang.checkout') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div
                            class="bg-white rounded-2xl shadow-[0_5px_30px_rgba(0,0,0,0.05)] border border-stone-100 p-6 sticky top-28">
                            <h3 class="font-serif text-xl text-[#5B2C04] mb-6">Ringkasan Belanja</h3>

                            {{-- Kode Referral --}}
                            <div class="mb-6">
                                <label class="text-xs font-bold text-stone-400 uppercase tracking-wider mb-2 block">Kode
                                    Referral</label>
                                <div class="flex gap-2">
                                    <input type="text" name="referral_code" id="referralCode"
                                        placeholder="Masukan kode referral"
                                        class="w-full bg-stone-50 border border-stone-200 rounded-lg px-3 py-2 text-sm outline-none focus:border-[#738029] transition">
                                    <button type="button" onclick="applyReferral()"
                                        class="bg-stone-800 text-white px-4 rounded-lg text-xs font-bold uppercase tracking-wider hover:bg-[#5B2C04] transition">
                                        Apply
                                    </button>
                                </div>
                                <p id="referralMsg" class="text-xs mt-1 hidden"></p>
                            </div>

                            {{-- Rincian Harga --}}
                            <div class="space-y-3 text-sm text-stone-600 border-b border-stone-100 pb-6">
                                <div class="flex justify-between">
                                    <span>Subtotal ({{ $keranjang->count() }} item)</span>
                                    <span class="font-medium text-[#5B2C04]">Rp
                                        {{ number_format($subtotal, 0, ',', '.') }}</span>
                                </div>
                                <div class="flex justify-between text-green-600">
                                    <span>Diskon</span>
                                    <span>Rp 0</span>
                                </div>

                                {{-- Metode Pembayaran --}}
                                <div class="pt-2">
                                    <label
                                        class="text-xs font-bold text-stone-400 uppercase tracking-wider mb-2 block">Metode
                                        Pembayaran</label>
                                    <select name="payment_method" id="metodePembayaran"
                                        class="w-full border border-stone-200 rounded-lg px-3 py-2 text-sm outline-none focus:border-[#738029] transition bg-stone-50">
                                        <option value="">Pilih metode pembayaran</option>
                                        <option value="online">QRIS</option>
                                        <option value="offline">Tunai</option>
                                    </select>
                                    @error('payment_method')
                                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                    @enderror
                                </div>

                                {{-- QRIS Box --}}
                                <div id="qrisBox" class="hidden text-center pt-2 space-y-3">
                                    <p class="text-xs text-stone-400 uppercase tracking-wider font-bold">Scan QRIS berikut:
                                    </p>
                                    <img src="{{ asset('images/zahira.jpg') }}"
                                        class="mx-auto w-40 rounded-xl border border-stone-100 shadow-sm">
                                    <p class="text-xs text-stone-500">Total: <span class="font-bold text-[#738029]">Rp
                                            {{ number_format($subtotal, 0, ',', '.') }}</span></p>

                                    {{-- Upload Bukti --}}
                                    <div class="text-left">
                                        <label
                                            class="text-xs font-bold text-stone-400 uppercase tracking-wider mb-2 block">Upload
                                            Bukti Bayar</label>
                                        <input type="file" name="payment_proof" accept="image/*"
                                            class="w-full text-xs text-stone-500 file:mr-3 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-xs file:font-bold file:bg-[#F9F1E7] file:text-[#5B2C04] hover:file:bg-[#738029] hover:file:text-white transition">
                                        @error('payment_proof')
                                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            {{-- Total --}}
                            <div class="flex justify-between items-end pt-6 mb-6">
                                <span class="text-stone-500 font-medium">Total Tagihan</span>
                                <span class="font-serif text-2xl font-bold text-[#738029]">
                                    Rp {{ number_format($total, 0, ',', '.') }}
                                </span>
                            </div>

                            {{-- Tombol Checkout --}}
                            @if ($keranjang->count() > 0)
                                <button type="submit"
                                    class="w-full bg-[#738029] hover:bg-[#5B2C04] text-white py-3.5 rounded-full font-bold uppercase tracking-[0.15em] text-xs transition-all shadow-lg shadow-green-900/10 active:scale-95 flex items-center justify-center gap-2 group">
                                    Checkout
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                        class="h-4 w-4 group-hover:translate-x-1 transition-transform" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M14 5l7 7m0 0l-7 7m7-7H3" />
                                    </svg>
                                </button>
                            @else
                                <button disabled
                                    class="w-full bg-stone-200 text-stone-400 py-3.5 rounded-full font-bold uppercase tracking-[0.15em] text-xs cursor-not-allowed flex items-center justify-center gap-2">
                                    Keranjang Kosong
                                </button>
                            @endif

                            <p class="text-[10px] text-stone-400 text-center mt-4">
                                Dengan checkout, anda menyetujui Syarat & Ketentuan kami.
                            </p>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>

    <script>
        const metode = document.getElementById("metodePembayaran");
        const qris = document.getElementById("qrisBox");

        metode.addEventListener("change", function() {
            qris.classList.add("hidden");
            if (this.value === "online") {
                qris.classList.remove("hidden");
            }
        });

        function applyReferral() {
            const code = document.getElementById('referralCode').value;
            const msg = document.getElementById('referralMsg');

            if (!code) {
                msg.textContent = 'Masukan kode referral terlebih dahulu.';
                msg.className = 'text-xs mt-1 text-red-500';
                msg.classList.remove('hidden');
                return;
            }

            fetch(`/check-referral?code=${code}`)
                .then(res => res.json())
                .then(data => {
                    msg.classList.remove('hidden');
                    if (data.valid) {
                        msg.textContent = `Kode valid! Afiliator: ${data.name}`;
                        msg.className = 'text-xs mt-1 text-green-600';
                    } else {
                        msg.textContent = 'Kode referral tidak ditemukan.';
                        msg.className = 'text-xs mt-1 text-red-500';
                    }
                });
        }
    </script>
@endsection
