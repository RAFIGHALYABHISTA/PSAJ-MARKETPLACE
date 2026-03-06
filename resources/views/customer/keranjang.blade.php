@extends('layouts.customer')

@section('title', 'Keranjang Belanja')

@section('content')
<div class="min-h-screen bg-stone-50 py-12 px-6">
    <div class="max-w-6xl mx-auto">

        <div class="mb-8 flex flex-col md:flex-row md:items-center justify-between gap-4">
            <div class="flex items-center gap-4">
                <a href="{{ url('/produk') }}" class="group flex items-center justify-center w-10 h-10 rounded-full bg-white border border-stone-200 text-stone-500 hover:border-[#738029] hover:text-[#738029] transition-all">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 group-hover:-translate-x-0.5 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                    </svg>
                </a>
                <div>
                    <h1 class="text-3xl font-serif text-[#5B2C04]">Keranjang Belanja</h1>
                    <p class="text-sm text-stone-500 mt-1">Anda memiliki <span class="font-bold text-[#738029]">2 item</span> dalam keranjang</p>
                </div>
            </div>
        </div>

        <div class="flex flex-col lg:flex-row gap-8">

            <div class="flex-1 space-y-4">
                
                <div class="hidden md:flex items-center justify-between px-6 pb-2 text-xs font-bold text-stone-400 uppercase tracking-widest">
                    <span>Produk</span>
                    <span class="pr-12">Total</span>
                </div>

                <div class="bg-white rounded-2xl p-4 border border-stone-100 shadow-sm flex flex-col sm:flex-row items-center gap-6 transition hover:shadow-md">
                    <div class="shrink-0 bg-[#F9F1E7] w-full sm:w-28 h-28 rounded-xl flex items-center justify-center">
                        <img src="{{ asset('images/produk.png') }}" class="w-20 h-20 object-contain mix-blend-multiply">
                    </div>

                    <div class="flex-1 w-full text-center sm:text-left">
                        <div class="flex flex-col sm:flex-row sm:justify-between items-center mb-4 sm:mb-0">
                            <div>
                                <h2 class="font-serif text-lg text-[#5B2C04]">Sariayu Facial Wash</h2>
                                <p class="text-xs font-bold text-stone-400 uppercase tracking-wider mt-1">Skin Care • 100ml</p>
                            </div>
                            <p class="sm:hidden font-bold text-[#738029] mt-2">Rp 45.000</p>
                        </div>
                        
                        <div class="flex items-center justify-center sm:justify-between mt-4">
                            <div class="flex items-center border border-stone-200 rounded-full h-9 w-fit">
                                <button onclick="decreaseQty(this)" class="w-8 h-full text-stone-500 hover:text-[#738029] flex items-center justify-center transition">-</button>
                                <input type="number" value="1" min="1" class="w-10 h-full text-center text-sm font-bold text-[#5B2C04] bg-transparent outline-none appearance-none m-0 border-x border-stone-100 p-0">
                                <button onclick="increaseQty(this)" class="w-8 h-full text-stone-500 hover:text-[#738029] flex items-center justify-center transition">+</button>
                            </div>

                            <p class="hidden sm:block font-bold text-[#738029] text-lg">Rp 45.000</p>

                            <button class="ml-4 text-stone-300 hover:text-red-500 transition p-2 rounded-full hover:bg-red-50">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-2xl p-4 border border-stone-100 shadow-sm flex flex-col sm:flex-row items-center gap-6 transition hover:shadow-md">
                    <div class="shrink-0 bg-[#F9F1E7] w-full sm:w-28 h-28 rounded-xl flex items-center justify-center">
                        <img src="{{ asset('images/produk.png') }}" class="w-20 h-20 object-contain mix-blend-multiply">
                    </div>
                    <div class="flex-1 w-full text-center sm:text-left">
                        <div class="flex flex-col sm:flex-row sm:justify-between items-center mb-4 sm:mb-0">
                            <div>
                                <h2 class="font-serif text-lg text-[#5B2C04]">Kenanga Body Lotion</h2>
                                <p class="text-xs font-bold text-stone-400 uppercase tracking-wider mt-1">Body Care • 250ml</p>
                            </div>
                            <p class="sm:hidden font-bold text-[#738029] mt-2">Rp 28.500</p>
                        </div>
                        <div class="flex items-center justify-center sm:justify-between mt-4">
                            <div class="flex items-center border border-stone-200 rounded-full h-9 w-fit">
                                <button onclick="decreaseQty(this)" class="w-8 h-full text-stone-500 hover:text-[#738029] flex items-center justify-center transition">-</button>
                                <input type="number" value="2" min="1" class="w-10 h-full text-center text-sm font-bold text-[#5B2C04] bg-transparent outline-none appearance-none m-0 border-x border-stone-100 p-0">
                                <button onclick="increaseQty(this)" class="w-8 h-full text-stone-500 hover:text-[#738029] flex items-center justify-center transition">+</button>
                            </div>
                            <p class="hidden sm:block font-bold text-[#738029] text-lg">Rp 57.000</p>
                            <button class="ml-4 text-stone-300 hover:text-red-500 transition p-2 rounded-full hover:bg-red-50">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>

            </div>

            <div class="lg:w-96 shrink-0">
                <div class="bg-white rounded-2xl shadow-[0_5px_30px_rgba(0,0,0,0.05)] border border-stone-100 p-6 sticky top-28">
                    <h3 class="font-serif text-xl text-[#5B2C04] mb-6">Ringkasan Belanja</h3>

                    <div class="mb-6">
                        <label class="text-xs font-bold text-stone-400 uppercase tracking-wider mb-2 block">Kode Voucher</label>
                        <div class="flex gap-2">
                            <input type="text" placeholder="Diskon" class="w-full bg-stone-50 border border-stone-200 rounded-lg px-3 py-2 text-sm outline-none focus:border-[#738029] transition">
                            <button class="bg-stone-800 text-white px-4 rounded-lg text-xs font-bold uppercase tracking-wider hover:bg-[#5B2C04] transition">Apply</button>
                        </div>
                    </div>

                    <div class="space-y-3 text-sm text-stone-600 border-b border-stone-100 pb-6">
                        <div class="flex justify-between">
                            <span>Subtotal (3 items)</span>
                            <span class="font-medium text-[#5B2C04]">Rp 102.000</span>
                        </div>
                        <div class="flex justify-between">
                            <span>Ongkos Kirim</span>
                            <span class="font-medium text-[#5B2C04]">Rp 10.000</span>
                        </div>
                        <div class="flex justify-between text-green-600">
                            <span>Diskon</span>
                            <span>-Rp 0</span>
                        </div>
                    </div>

                    <div class="flex justify-between items-end pt-6 mb-6">
                        <span class="text-stone-500 font-medium">Total Tagihan</span>
                        <span class="font-serif text-2xl font-bold text-[#738029]">Rp 112.000</span>
                    </div>

                    <button class="w-full bg-[#738029] hover:bg-[#5B2C04] text-white py-3.5 rounded-full font-bold uppercase tracking-[0.15em] text-xs transition-all shadow-lg shadow-green-900/10 active:scale-95 flex items-center justify-center gap-2 group">
                        Checkout
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 group-hover:translate-x-1 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                        </svg>
                    </button>
                    
                    <p class="text-[10px] text-stone-400 text-center mt-4">
                        Dengan checkout, anda menyetujui Syarat & Ketentuan kami.
                    </p>
                </div>
            </div>

        </div>
    </div>
</div>

<script>
    // Script sederhana untuk tombol quantity
    function decreaseQty(btn) {
        let input = btn.nextElementSibling;
        let value = parseInt(input.value);
        if (value > 1) input.value = value - 1;
    }

    function increaseQty(btn) {
        let input = btn.previousElementSibling;
        let value = parseInt(input.value);
        input.value = value + 1;
    }
</script>
@endsection 