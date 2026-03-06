@extends('layouts.customer')

@section('title', 'Produk')

@section('content')
    <section class="relative bg-[#F9F1E7] overflow-hidden py-20 px-6">
        <div class="absolute top-0 right-0 w-64 h-64 bg-green-800/5 rounded-full blur-3xl -translate-y-1/2 translate-x-1/2 pointer-events-none"></div>
        <div class="absolute bottom-0 left-0 w-96 h-96 bg-[#B96710]/5 rounded-full blur-3xl translate-y-1/2 -translate-x-1/2 pointer-events-none"></div>

        <div class="max-w-7xl mx-auto text-center md:text-left relative z-10">
            <h1 class="text-5xl md:text-6xl font-serif text-[#5B2C04] leading-tight mb-4">
                Discover Your <br>
                <span class="text-[#738029] italic">Natural Glow</span> Collection
            </h1>
            <p class="text-stone-600 text-lg max-w-xl md:mx-0 mx-auto">
                Rangkaian perawatan kulit dan kecantikan yang diformulasikan dari kekayaan alam Indonesia untuk memancarkan pesona sejatimu.
            </p>
        </div>
    </section>

    <section class="sticky top-[80px] z-20 bg-white/80 backdrop-blur-md border-b border-stone-100 px-6 shadow-sm">
        <div class="max-w-7xl mx-auto py-4 overflow-x-auto no-scrollbar">
            <div class="flex md:justify-center gap-4 min-w-max md:min-w-0">
                @php
                    $categories = [
                        ['id' => 'skincare', 'name' => 'Skin Care', 'icon' => 'M12 3c2.755 0 5 2.245 5 5 0 3.866-5 8-5 8s-5-4.134-5-8c0-2.755 2.245-5 5-5z'],
                        ['id' => 'body-care', 'name' => 'Body Care', 'icon' => 'M9 2h6v4H9zM7 6h10v14H7z'],
                        ['id' => 'decorative', 'name' => 'Decorative', 'icon' => 'M7 21h10l-1-7H8l-1 7zM12 3v11'],
                        ['id' => 'hair-care', 'name' => 'Hair Care', 'icon' => 'M12 2a6 6 0 016 6c0 4-6 12-6 12S6 12 6 8a6 6 0 016-6z'],
                        ['id' => 'makeup-base', 'name' => 'Make Up Base', 'icon' => 'M8 3h8l-1 10H9L8 3zM7 21h10'],
                    ];
                @endphp

                @foreach($categories as $cat)
                <button data-filter="{{ $cat['id'] }}" class="group flex items-center gap-2 px-5 py-2.5 rounded-full border border-transparent hover:border-[#738029]/30 hover:bg-[#F9F1E7] transition-all duration-300">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-stone-400 group-hover:text-[#738029] transition-colors" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="{{ $cat['icon'] }}"/>
                    </svg>
                    <span class="text-sm font-medium text-stone-600 group-hover:text-[#5B2C04]">{{ $cat['name'] }}</span>
                </button>
                @endforeach
            </div>
        </div>
    </section>

    <section class="px-6 py-12 min-h-screen bg-stone-50">
        <div class="max-w-7xl mx-auto flex flex-col lg:flex-row gap-10">
            
            <div class="w-full lg:w-72 shrink-0">
                <details class="group bg-white rounded-2xl shadow-sm border border-stone-100 overflow-hidden sticky top-32">
                    <summary class="list-none cursor-pointer flex items-center justify-between gap-2 p-5 bg-white hover:bg-stone-50 transition select-none">
                        <span class="flex items-center gap-2 font-serif text-lg text-[#5B2C04]">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4h18l-7 8v6l-4 2v-8L3 4z"/>
                            </svg>
                            Filter Produk
                        </span>
                        <span class="text-stone-400 transition-transform group-open:rotate-180">▼</span>
                    </summary>
                    
                    <div class="p-6 space-y-8 border-t border-stone-100">
                        <div>
                            <h3 class="text-sm font-bold uppercase tracking-widest text-stone-400 mb-4">Kategori Cepat</h3>
                            <div class="space-y-2">
                                <a href="#" class="block w-full text-center rounded-lg border border-stone-200 py-2.5 text-sm text-stone-600 hover:border-[#738029] hover:text-[#738029] hover:bg-[#F9F1E7] transition-all">New Arrival</a>
                                <a href="#" class="block w-full text-center rounded-lg border border-stone-200 py-2.5 text-sm text-stone-600 hover:border-[#738029] hover:text-[#738029] hover:bg-[#F9F1E7] transition-all">Best Seller</a>
                            </div>
                        </div>

                        <div>
                            <h3 class="text-sm font-bold uppercase tracking-widest text-stone-400 mb-4">Urutkan</h3>
                            <div class="space-y-3">
                                <label class="flex items-center gap-3 cursor-pointer group">
                                    <input type="radio" name="sort" class="accent-[#738029] w-4 h-4"> 
                                    <span class="text-sm text-stone-600 group-hover:text-[#738029] transition">Harga Terendah</span>
                                </label>
                                <label class="flex items-center gap-3 cursor-pointer group">
                                    <input type="radio" name="sort" class="accent-[#738029] w-4 h-4"> 
                                    <span class="text-sm text-stone-600 group-hover:text-[#738029] transition">Harga Tertinggi</span>
                                </label>
                                <label class="flex items-center gap-3 cursor-pointer group">
                                    <input type="radio" name="sort" class="accent-[#738029] w-4 h-4"> 
                                    <span class="text-sm text-stone-600 group-hover:text-[#738029] transition">Rating Terbaik</span>
                                </label>
                            </div>
                        </div>

                        <div>
                            <h3 class="text-sm font-bold uppercase tracking-widest text-stone-400 mb-4">Rentang Harga</h3>
                            <div class="flex justify-between text-[#738029] font-bold text-xs mb-4">
                                <span>Rp 20rb</span>
                                <span>Rp 800rb</span>
                            </div>
                            <input type="range" min="20000" max="800000" step="10000" class="w-full h-1.5 bg-stone-200 rounded-lg appearance-none cursor-pointer accent-[#738029]">
                        </div>

                        <button class="w-full py-3 text-xs font-bold uppercase tracking-widest text-stone-500 border-t border-stone-100 hover:text-red-500 transition mt-4">
                            Reset Filter
                        </button>
                    </div>
                </details>
            </div>

            <div class="flex-1">
                <div class="flex flex-col md:flex-row md:items-center justify-between mb-8 gap-4">
                    <h2 class="text-2xl font-serif text-[#5B2C04]">Katalog Produk</h2>
                    
                    <div class="relative group w-full md:w-80">
                        <input type="text" placeholder="Cari produk kecantikan..." class="w-full pl-4 pr-10 py-3 rounded-full bg-white border border-stone-200 focus:outline-none focus:border-[#738029] focus:ring-1 focus:ring-[#738029] transition-all text-sm text-stone-600 shadow-sm">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-stone-400 absolute right-4 top-1/2 -translate-y-1/2 group-focus-within:text-[#738029] transition-colors" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m21 21-4.35-4.35M10.5 18a7.5 7.5 0 1 1 0-15 7.5 7.5 0 0 1 0 15z"/>
                        </svg>
                    </div>
                </div>

                <div class="grid grid-cols-2 md:grid-cols-3 xl:grid-cols-3 gap-6">
                    
                    @php
                        $products = [
                            ['name' => 'Sariayu Facial Foam', 'cat' => 'skincare', 'price' => '25.500'],
                            ['name' => 'Body Scrub Olive', 'cat' => 'body-care', 'price' => '42.000'],
                            ['name' => 'Shampoo Lidah Buaya', 'cat' => 'hair-care', 'price' => '32.500'],
                            ['name' => 'Lip Cream Matte', 'cat' => 'decorative', 'price' => '65.000'],
                            ['name' => 'Tinted Moisturizer', 'cat' => 'makeup-base', 'price' => '48.000'],
                            ['name' => 'Kenanga Body Lotion', 'cat' => 'body-care', 'price' => '28.500'],
                        ];
                    @endphp

                    @foreach($products as $prod)
                    <div class="product-card group" data-category="{{ $prod['cat'] }}">
                        <div class="bg-white rounded-[20px] p-4 border border-stone-100 shadow-[0_2px_15px_rgba(0,0,0,0.03)] hover:shadow-[0_10px_30px_rgba(0,0,0,0.08)] hover:-translate-y-1 transition-all duration-300 h-full flex flex-col">
                            
                            <div class="bg-[#F9F1E7] rounded-[15px] h-48 flex items-center justify-center mb-4 relative overflow-hidden">
                                <img src="{{ asset('images/produk.png') }}" class="h-32 object-contain mix-blend-multiply group-hover:scale-110 transition duration-500">
                                
                                <button onclick="openDetail()" class="absolute bottom-3 right-3 bg-white w-8 h-8 rounded-full shadow flex items-center justify-center text-[#738029] opacity-0 group-hover:opacity-100 translate-y-2 group-hover:translate-y-0 transition-all duration-300 hover:bg-[#738029] hover:text-white">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" /><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" /></svg>
                                </button>
                            </div>

                            <div class="flex-1 flex flex-col">
                                <p class="text-[10px] text-[#9C4A1A] font-bold uppercase tracking-wider mb-1">{{ str_replace('-', ' ', $prod['cat']) }}</p>
                                <h3 class="text-sm font-bold text-[#5B2C04] leading-snug mb-2 line-clamp-2">{{ $prod['name'] }}</h3>
                                
                                <div class="mt-auto pt-3 border-t border-stone-50 flex items-center justify-between">
                                    <p class="font-serif text-lg text-[#5B2C04]">Rp {{ $prod['price'] }}</p>
                                    <button class="w-8 h-8 rounded-full border border-stone-200 text-stone-400 hover:bg-[#738029] hover:border-[#738029] hover:text-white transition-colors flex items-center justify-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                                        </svg>
                                    </button>
                                </div>
                            </div>

                        </div>
                    </div>
                    @endforeach

                </div>
            </div>
        </div>
    </section>
@endsection