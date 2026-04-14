@extends('layouts.customer')

@section('title', 'Home')

@section('content')

{{-- HERO SECTION --}}
<section class="bg-[#F9F1E7] w-full px-4 sm:px-6 lg:px-16 py-14 sm:py-16 grid gap-10 md:grid-cols-2 items-center overflow-hidden">
    <div class="space-y-6 animate-fade-in-left">
        <h1 class="text-4xl sm:text-5xl lg:text-6xl font-serif text-[#5B2C04] leading-tight">
            Temukan <br>
            <span class="text-green-800 italic">Kecantikan</span> Sejati
        </h1>

        <p class="text-base text-gray-700 max-w-md leading-relaxed">
            Perawatan kulit yang terinspirasi dari kearifan lokal, diformulasikan dengan bahan-bahan organik pilihan untuk pancaran alami Anda.
        </p>

        <div class="flex flex-wrap gap-4">
            <a href="{{ route('customer.produk') }}" class="bg-green-700 text-white px-7 py-3 rounded-full text-sm font-semibold hover:bg-green-800 transition-all shadow-lg hover:shadow-green-900/20 active:scale-95">
                Jelajahi Produk Kami →
            </a>

            <a href="#" class="bg-white/50 backdrop-blur-sm px-7 py-3 rounded-full text-sm font-semibold border border-green-700/20 text-green-800 hover:bg-white transition-all active:scale-95">
                Story Kolaborasi
            </a>
        </div>
    </div>

<div class="relative flex justify-center md:justify-end group">
            <div class="absolute -inset-4 bg-stone-100-700/10 rounded-[50px] blur-2xl  transition duration-500"></div>

        <div class="rounded-[40px] border-[12px] border-white overflow-hidden shadow-2xl relative">
            <img src="/images/model4.jpg" class="w-full h-[400px] lg:h-[500px] object-cover hover:scale-105 transition duration-700">
        </div>
    </div>
</section>

{{-- PHILOSOPHY --}}
<section class="bg-stone-50 py-20 text-center border-y border-stone-200">
    <div class="px-6">
        <h2 class="text-3xl lg:text-4xl text-[#5B2C04] font-serif mb-4">Filosofi Kami</h2>

        <div class="flex justify-center mb-6">
            <div class="h-1 w-20 bg-green-700 rounded-full"></div>
        </div>

        <p class="text-gray-600 text-lg max-w-3xl mx-auto leading-relaxed italic font-light">
            "Kami percaya bahwa kulit yang sehat adalah hasil dari harmoni yang sempurna antara kearifan alam dan inovasi ilmu pengetahuan."
        </p>
    </div>
</section>

{{-- INGREDIENTS SLIDER --}}
<section class="relative bg-[#E9DADA] py-20 px-4 sm:px-6 lg:px-8 overflow-hidden">
    <img src="{{ asset('images/daun.png') }}" class="absolute top-0 right-0 w-28 sm:w-60 opacity-80 pointer-events-none">
    <img src="{{ asset('images/daun1.png') }}" class="absolute bottom-0 left-0 w-32 sm:w-48 opacity-80 pointer-events-none">

    <div class="max-w-6xl mx-auto relative">
        <div class="text-center mb-20">
            <h2 class="text-[#036415] text-2xl font-bold mb-4">Kenapa harus memilih Kami ?</h2>
            <p class="text-[#000000] text-lg max-w-4xl mx-auto">
                Setiap tetes produk kami memiliki bahan pilihan yang berkualitas premium, dipetik dengan cermat dari kekayaan alam Nusantara hingga berbagai penjuru dunia.
            </p>
        </div>

        <div id="slider" class="flex transition-transform duration-500">
            <div class="min-w-full grid grid-cols-1 md:grid-cols-2 gap-10 items-center">
                <div class="bg-white rounded-2xl shadow-lg p-8 max-w-full md:max-w-md mx-auto md:ml-auto">
                    <h3 class="font-semibold text-lg text-green-800">Buah Langsat (Lansium domesticum)</h3>
                    <p class="text-gray-600 text-sm mt-3">Digunakan untuk mencerahkan kulit, kaya antioksidan dan Vitamin C.</p>
                </div>
                <div class="flex justify-center md:justify-start">
                    <img src="{{ asset('images/langsat.png') }}" class="w-full max-w-xs sm:max-w-sm object-contain">
                </div>
            </div>

            <div class="min-w-full grid grid-cols-1 md:grid-cols-2 gap-10 items-center">
                <div class="flex justify-center md:justify-end">
                    <img src="{{ asset('images/pegagan.png') }}" class="w-full max-w-xs sm:max-w-sm object-contain">
                </div>
                <div class="bg-white rounded-2xl shadow-lg p-8 max-w-full md:max-w-md mx-auto">
                    <h3 class="font-semibold text-lg text-green-800">Pegagan (Centella asiatica)</h3>
                    <p class="text-gray-600 text-sm mt-3">Membantu regenerasi sel dan antibakteri alami untuk kulit sensitif.</p>
                </div>
            </div>
            
            <div class="min-w-full grid grid-cols-1 md:grid-cols-2 gap-10 items-center">
                <div class="bg-white rounded-2xl shadow-lg p-8 max-w-full md:max-w-md mx-auto md:ml-auto">
                    <h3 class="font-semibold text-lg text-green-800">Bunga Kenanga</h3>
                    <p class="text-gray-600 text-sm mt-3">Aroma relaksasi yang membantu menenangkan kulit dan mencerahkan.</p>
                </div>
                <div class="flex justify-center md:justify-start">
                    <img src="{{ asset('images/kenanga.png') }}" class="w-full max-w-xs sm:max-w-sm object-contain">
                </div>
            </div>
        </div>

        <div class="flex justify-center mt-10 gap-3">
            @for($i=0; $i<3; $i++)
            <button onclick="goSlide({{ $i }})" class="dot w-3 h-3 rounded-full bg-gray-400 transition-colors"></button>
            @endfor
        </div>
    </div>
</section>

{{-- PROMO & PRODUCTS SECTION --}}
<section class="bg-stone-50 py-24">
    <div class="max-w-7xl mx-auto px-6 space-y-20">

        {{-- PROMO SLIDER --}}
        <div class="max-w-6xl mx-auto text-center">
            <div class="mb-16">
                <h2 class="text-3xl font-semibold text-green-700">Menarik untuk Anda</h2>
                <p class="text-gray-600 mt-3 max-w-xl mx-auto">Promo menarik dan penawaran terbaik minggu ini.</p>
            </div>

            <div class="relative overflow-hidden">
                <div id="promoSlider" class="flex transition-all duration-700">
                    @foreach(['promo1.png', 'promo2.png', 'promo3.png'] as $index => $img)
                    <div class="min-w-full flex flex-col items-center gap-6 px-4 sm:px-0">
                        <img src="{{ asset('images/'.$img) }}"  onclick="openPreview(this.src)" class="w-full max-w-2xl h-[260px] sm:h-72 object-cover rounded-2xl shadow-md cursor-pointer hover:scale-105 transition duration-500">
                    </div>
                    @endforeach
                </div>

                <div class="flex justify-center gap-3 mt-8 mb-4">
                    @for($i=0; $i<3; $i++)
                    <button onclick="slidePromo({{ $i }})" class="dotPromo w-3 h-3 rounded-full bg-gray-400"></button>
                    @endfor
                </div>
            </div>

        {{-- REALTIME PRODUCT SECTION --}}
        <div class="max-w-7xl mx-auto px-6">
            <div class="flex flex-col lg:flex-row justify-center items-start lg:items-end mb-12 gap-6">
                <div>
                    <h2 class="text-3xl sm:text-4xl font-serif text-[#5B2C04] mb-2">Koleksi Kami</h2>
                    <p class="text-stone-500 text-base sm:text-lg italic">Pilih perawatan terbaik untuk pancaran kulit sehatmu.</p>
                </div>
{{-- 
                <div class="flex flex-wrap justify-start gap-3 p-1 bg-stone-200 rounded-full">
                    <button class="bg-[#B96710] text-white px-5 sm:px-8 py-3 rounded-full text-xs sm:text-sm font-bold shadow-lg shadow-orange-900/20 hover:scale-105 transition">NEW PRODUCT</button>
                    <button class="text-stone-600 px-5 sm:px-8 py-3 rounded-full text-xs sm:text-sm font-bold hover:bg-stone-300 transition">BEST SELLER</button>
                </div> --}}
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-8">
                @forelse($products as $p)
                <div class="bg-white rounded-[30px] p-5 shadow-[0_10px_30px_rgba(0,0,0,0.05)] hover:shadow-[0_20px_40px_rgba(0,0,0,0.1)] hover:-translate-y-2 transition-all duration-500 border border-stone-100 group">
                    <div class="bg-stone-50 rounded-[20px] mb-4 overflow-hidden h-48 flex items-center justify-center">
                        <img src="{{ $p->image ? asset($p->image) : ($p->image_url ?? asset('images/produk.png')) }}"
                             class="max-h-full max-w-full object-contain mix-blend-multiply group-hover:scale-110 transition duration-500">
                    </div>

                    <h3 class="text-sm font-bold text-stone-800 mb-1 h-10 overflow-hidden line-clamp-2 uppercase tracking-tighter">
                        {{ $p->name }}
                    </h3>

                    <div class="flex items-center gap-1 mb-3">
                        <span class="text-yellow-500 text-xs">★★★★☆</span>
                        <span class="text-[10px] text-stone-400 font-medium">(4.8)</span>
                    </div>

                    <div class="flex justify-between items-center">
                        <p class="font-bold text-[#5B2C04] text-lg">
                            Rp {{ number_format($p->price, 0, ',', '.') }}
                        </p>

                        <button class="p-2 bg-stone-100 rounded-lg hover:bg-green-700 hover:text-white transition-colors">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                            </svg>
                        </button>
                    </div>
                </div>
                @empty
                <div class="col-span-full py-20 text-center">
                    <p class="text-stone-400 italic font-serif">Koleksi sedang dipersiapkan...</p>
                </div>
                @endforelse
            </div>
            
            <div class="mt-16 text-center">
                <a href="{{ route('customer.produk') }}" class="bg-green-700 text-white px-7 py-3 rounded-full text-sm font-semibold hover:bg-green-800 transition-all shadow-lg hover:shadow-green-900/20 active:scale-95">
                    Lihat semua Produk Kami →
                 </a>
                {{-- <a href="{{ route('customer.produk') }}" class="inline-block border-b-2 border-green-700 text-green-800 font-bold pb-1 hover:text-green-600 hover:border-green-500 transition-all">
                    LIHAT SEMUA KOLEKSI
                </a> --}}
            </div>
        </div>
    </div>
</section>

{{-- POPUP IKLAN --}}
<div id="popupIklan"
     onclick="closePopup(event)"
     class="fixed inset-0 bg-black/50 flex items-center justify-center z-50 px-4 sm:px-6">

    <!-- POPUP BOX -->
    <div class="rounded-2xl overflow-hidden shadow-xl w-full max-w-md ml-5">

        <!-- GAMBAR IKLAN -->
        <a href="#">
            <img src="{{ asset('images/sariayu.png') }}"
                 class="w-auto h-120 object-cover">
        </a>

    </div>
</div>
<div id="imagePreview" 
     class="fixed inset-0 bg-black/80 hidden items-center justify-center z-50"
     onclick="closePreview()">

    <img id="previewImg" 
         class="max-w-[90%] max-h-[90%] rounded-xl shadow-2xl">

</div>
<script>
    // --- Ingredient Slider ---
    let index = 0;
    const slider = document.getElementById("slider");
    const dots = document.querySelectorAll(".dot");

    function goSlide(i){
        index = i;
        updateSlide();
    }

    function updateSlide(){
        if(!slider) return;
        slider.style.transform = `translateX(-${index * 100}%)`;
        dots.forEach((dot, idx) => {
            dot.classList.toggle("bg-green-600", idx === index);
            dot.classList.toggle("bg-gray-400", idx !== index);
        });
    }

    setInterval(() => {
        index = (index + 1) % 3;
        updateSlide();
    }, 5000);

    // --- Promo Slider ---
    let indexPromo = 0;
    const pSlider = document.getElementById("promoSlider");
    const pDots = document.querySelectorAll(".dotPromo");

    window.slidePromo = function(i){
        indexPromo = i;
        updatePromoSlider();
    }

    function updatePromoSlider(){
        if(!pSlider) return;
        pSlider.style.transform = `translateX(-${indexPromo * 100}%)`;
        pDots.forEach((dot, idx) => {
            dot.classList.toggle("bg-green-600", idx === indexPromo);
            dot.classList.toggle("bg-gray-400", idx !== indexPromo);
        });
    }

    setInterval(() => {
        indexPromo = (indexPromo + 1) % 3;
        updatePromoSlider();
    }, 4000);

    // --- Popup Logic ---
    function closePopup(e) {
        if (e.target.id === "popupIklan") {
            document.getElementById("popupIklan").style.display = "none";
        }
    }

    window.onload = function () {
        updateSlide();
        updatePromoSlider();
        setTimeout(() => {
            const popup = document.getElementById("popupIklan");
            if(popup) popup.style.display = "flex";
        }, 1000);
    };
    function openPreview(src){
    document.getElementById('previewImg').src = src;
    document.getElementById('imagePreview').classList.remove('hidden');
    document.getElementById('imagePreview').classList.add('flex');
}

function closePreview(){
    document.getElementById('imagePreview').classList.add('hidden');
}
</script>

@endsection