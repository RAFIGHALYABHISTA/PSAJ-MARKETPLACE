@extends('layouts.customer')

@section('title', 'Tentang Kami - Sariayu')

@section('content')
<div class="bg-[#F9F1E7] min-h-screen">
    
    <section class="relative py-24 px-6 overflow-hidden">
        <div class="max-w-7xl mx-auto grid md:grid-cols-2 gap-12 items-center">
            <div class="relative z-10 space-y-6">
                <span class="text-[#738029] font-bold uppercase tracking-[0.3em] text-xs">Warisan Kecantikan Nusantara</span>
                <h1 class="text-5xl md:text-7xl font-serif text-[#5B2C04] leading-[1.1]">
                    Merawat Pesona <br>
                    <span class="italic text-[#738029]">Wanita Indonesia</span>
                </h1>
                <p class="text-stone-600 leading-relaxed max-w-lg text-lg">
                    Berawal dari sebuah impian untuk melestarikan kearifan lokal, kami hadir membawa keajaiban rempah dan alam Indonesia dalam setiap sentuhan perawatan kecantikan Anda.
                </p>
            </div>
            <div class="relative">
                <div class="relative z-10 rounded-t-full overflow-hidden border-[12px] border-white shadow-2xl">
                    <img src="https://images.unsplash.com/photo-1590439471364-192aa70c0b53?auto=format&fit=crop&q=80&w=800" 
                         alt="Natural Ingredients" class="w-full h-[500px] object-cover">
                </div>
                <div class="absolute -bottom-10 -left-10 w-40 h-40 bg-[#738029]/10 rounded-full blur-2xl"></div>
            </div>
        </div>
    </section>

    <section class="py-20 bg-white px-6">
        <div class="max-w-7xl mx-auto">
            <div class="text-center mb-16">
                <h2 class="text-3xl font-serif text-[#5B2C04]">Tiga Pilar Kami</h2>
                <div class="h-1 w-20 bg-[#738029] mx-auto mt-4"></div>
            </div>

            <div class="grid md:grid-cols-3 gap-12 text-center">
                <div class="space-y-4 group">
                    <div class="w-16 h-16 bg-[#F9F1E7] rounded-full flex items-center justify-center mx-auto group-hover:bg-[#738029] transition-colors duration-500">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-[#738029] group-hover:text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-serif text-[#5B2C04]">Kearifan Lokal</h3>
                    <p class="text-sm text-stone-500 leading-relaxed">Mengeksplorasi resep tradisional dari leluhur yang telah terbukti selama berabad-abad.</p>
                </div>

                <div class="space-y-4 group">
                    <div class="w-16 h-16 bg-[#F9F1E7] rounded-full flex items-center justify-center mx-auto group-hover:bg-[#738029] transition-colors duration-500">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-[#738029] group-hover:text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-serif text-[#5B2C04]">Ramah Lingkungan</h3>
                    <p class="text-sm text-stone-500 leading-relaxed">Berkomitmen pada proses produksi yang berkelanjutan dan bahan-bahan organik alami.</p>
                </div>

                <div class="space-y-4 group">
                    <div class="w-16 h-16 bg-[#F9F1E7] rounded-full flex items-center justify-center mx-auto group-hover:bg-[#738029] transition-colors duration-500">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-[#738029] group-hover:text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-serif text-[#5B2C04]">Kualitas Teruji</h3>
                    <p class="text-sm text-stone-500 leading-relaxed">Menggabungkan tradisi dengan inovasi modern melalui riset dermatologi yang ketat.</p>
                </div>
            </div>
        </div>
    </section>

    <section class="py-24 px-6 bg-[#2D1B0E] text-white">
        <div class="max-w-5xl mx-auto flex flex-col md:flex-row items-center gap-16">
            <div class="w-full md:w-1/2">
                <img src="https://images.unsplash.com/photo-1544005313-94ddf0286df2?auto=format&fit=crop&q=80&w=600" 
                     alt="Founder" class="rounded-2xl grayscale hover:grayscale-0 transition duration-700 shadow-2xl shadow-black/50">
            </div>
            <div class="w-full md:w-1/2 space-y-6">
                <h2 class="text-4xl font-serif leading-tight italic text-[#738029]">"Cantik itu bukan hanya apa yang terlihat, tapi apa yang kita rasakan dari dalam."</h2>
                <div class="h-1 w-12 bg-[#738029]"></div>
                <p class="text-stone-400 text-lg leading-relaxed">
                    Kami percaya bahwa setiap wanita memiliki cahaya uniknya masing-masing. Melalui Sariayu, kami berkomitmen untuk mendampingi perjalanan kecantikan Anda dengan produk yang jujur, aman, dan berakar pada tradisi.
                </p>
                <div class="pt-4">
                    <p class="font-bold tracking-[0.2em] text-sm">MARTHA TILAAR</p>
                    <p class="text-xs text-stone-500">Founder of Sariayu</p>
                </div>
            </div>
        </div>
    </section>

    <section class="py-20 px-6 text-center">
        <div class="max-w-3xl mx-auto space-y-8">
            <h2 class="text-3xl md:text-4xl font-serif text-[#5B2C04]">Mulai Perjalanan Cantikmu Hari Ini</h2>
            <p class="text-stone-500">Jelajahi koleksi terbaik kami yang dirancang khusus untuk kulit tropis Indonesia.</p>
            <div class="flex justify-center gap-4">
                <a href="{{ url('/produk') }}" class="bg-[#738029] text-white px-8 py-4 rounded-full font-bold uppercase tracking-widest text-xs hover:bg-[#5B2C04] transition shadow-lg">Lihat Koleksi</a>
                <a href="{{ url('/') }}" class="bg-white border border-stone-200 text-stone-600 px-8 py-4 rounded-full font-bold uppercase tracking-widest text-xs hover:bg-stone-50 transition">Kembali ke Beranda</a>
            </div>
        </div>
    </section>

</div>
@endsection