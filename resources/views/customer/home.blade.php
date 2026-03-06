@extends('layouts.customer')

@section('title', 'Home')

@section('content')
    <section class="bg-[#FFEADB] w-full px-6 lg:px-16 py-16 grid md:grid-cols-2 gap-10 items-center overflow-hidden">
        <div class="space-y-6 animate-fade-in-left">
            <h1 class="text-5xl lg:text-6xl font-serif text-[#5B2C04] leading-tight">
                Temukan <br>
                <span class="text-green-800 italic">Kecantikan</span> Sejati
            </h1>
            <p class="text-base text-gray-700 max-w-md leading-relaxed">
                Perawatan kulit yang terinspirasi dari kearifan lokal, diformulasikan dengan bahan-bahan organik pilihan untuk pancaran alami Anda.
            </p>
            <div class="flex flex-wrap gap-4">
                <a href="#" class="bg-green-700 text-white px-7 py-3 rounded-full text-sm font-semibold hover:bg-green-800 transition-all shadow-lg hover:shadow-green-900/20 active:scale-95">Jelajahi Produk Kami →</a>
                <a href="#" class="bg-white/50 backdrop-blur-sm px-7 py-3 rounded-full text-sm font-semibold border border-green-700/20 text-green-800 hover:bg-white transition-all active:scale-95">Story Kolaborasi</a>
            </div>
        </div>
        <div class="relative flex justify-end group">
            <div class="absolute -inset-4 bg-green-700/10 rounded-[50px] blur-2xl group-hover:bg-green-700/20 transition duration-500"></div>
            <div class="rounded-[40px] overflow-hidden shadow-2xl relative">
                <img src="/images/zahira.jpg" class="w-full h-[400px] lg:h-[500px] object-cover hover:scale-105 transition duration-700">
            </div>
        </div>
    </section>

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

 <section class="relative bg-[#E9DADA] py-24 px-6 overflow-hidden">

  <!-- ORNAMEN DAUN -->
  <img src="{{ asset('images/daun.png') }}"
       class="absolute top-0 right-0 w-40 opacity-80 pointer-events-none">

  <img src="{{ asset('images/daun1.png') }}"
       class="absolute bottom-0 left-0 w-48 opacity-80 pointer-events-none">

  <div class="max-w-6xl mx-auto">

    <!-- HEADER -->
    <div class="text-center mb-20">
      <p class="text-[#C47A00] font-medium">Keunggulan Kami</p>

      <h2 class="text-4xl font-serif text-[#1E5B32] mt-2">
        Bahan-Bahan Pilihan Alam
      </h2>

      <p class="text-gray-600 max-w-2xl mx-auto mt-4 text-sm leading-relaxed">
        Setiap tetes produk kami memiliki bahan pilihan yang berkualitas premium,
        dipetik dari kekayaan alam Nusantara hingga berbagai penjuru dunia,
        menghadirkan sentuhan kemewahan alami.
      </p>
    </div>


    <!-- ITEM 1 -->
    <div class="grid md:grid-cols-2 gap-16 items-center mb-24">

      <div class="bg-white rounded-2xl shadow-lg p-8 max-w-md">
        <h3 class="font-semibold text-lg">
          Buah Langsat (Lansium domesticum)
        </h3>

        <p class="text-gray-600 text-sm mt-3 leading-relaxed">
          Digunakan dalam seri Bright Skin Putih Langsat
          untuk mencerahkan kulit, kaya antioksidan
          dan Vitamin C.
        </p>
      </div>

      <div class="flex justify-center">
        <img src="{{ asset('images/langsat.png') }}"
             class="w-60">
      </div>

    </div>


    <!-- ITEM 2 -->
    <div class="grid md:grid-cols-2 gap-16 items-center mb-24">

      <div class="flex justify-center md:order-1">
        <img src="{{ asset('images/pegagan.png') }}"
             class="w-52">
      </div>

      <div class="bg-white rounded-2xl shadow-lg p-8 max-w-md md:ml-auto md:order-2">
        <h3 class="font-semibold text-lg">
          Pegagan / Gotu Kola (Centella asiatica)
        </h3>

        <p class="text-gray-600 text-sm mt-3 leading-relaxed">
          Digunakan pada rangkaian Acne Care karena
          kemampuannya menstimulasi kolagen,
          regenerasi sel, dan antibakteri.
        </p>
      </div>

    </div>


    <!-- ITEM 3 -->
    <div class="grid md:grid-cols-2 gap-16 items-center mb-24">

      <div class="bg-white rounded-2xl shadow-lg p-8 max-w-md">
        <h3 class="font-semibold text-lg">
          Bunga Kenanga (Cananga odorata)
        </h3>

        <p class="text-gray-600 text-sm mt-3 leading-relaxed">
          Digunakan dalam Cleansing Milk dan
          Refreshing Toner untuk mencerahkan kulit
          serta antiseptik alami.
        </p>
      </div>

      <div class="flex justify-center">
        <img src="{{ asset('images/kenanga.png') }}"
             class="w-44">
      </div>

    </div>


    <!-- ITEM 4 -->
    <div class="grid md:grid-cols-2 gap-16 items-center">

      <div class="flex justify-center md:order-1">
        <img src="{{ asset('images/lidah.png') }}"
             class="w-64">
      </div>

      <div class="bg-white rounded-2xl shadow-lg p-8 max-w-md md:ml-auto md:order-2">
        <h3 class="font-semibold text-lg">
          Lidah Buaya (Aloe vera)
        </h3>

        <p class="text-gray-600 text-sm mt-3 leading-relaxed">
          Bahan utama dalam banyak produk
          untuk hidrasi kulit dan rambut,
          mengandung vitamin A, C, dan E.
        </p>
      </div>

    </div>

  </div>
</section>

    <section class="bg-stone-50 py-24">
        <div class="max-w-7xl mx-auto px-6">
            <div class="flex flex-col md:flex-row justify-between items-end mb-12 gap-6">
                <div>
                    <h2 class="text-4xl font-serif text-[#5B2C04] mb-2">Koleksi Kami</h2>
                    <p class="text-stone-500 text-lg italic">Pilih perawatan terbaik untuk pancaran kulit sehatmu.</p>
                </div>
                <div class="flex gap-4 p-1 bg-stone-200 rounded-full">
                    <button class="bg-[#B96710] text-white px-8 py-3 rounded-full text-xs font-bold shadow-lg shadow-orange-900/20 hover:scale-105 transition">NEW PRODUCT</button>
                    <button class="text-stone-600 px-8 py-3 rounded-full text-xs font-bold hover:bg-stone-300 transition">BEST SELLER</button>
                </div>
            </div>

            <div class="grid grid-cols-2 md:grid-cols-4 gap-8">
                @php
                    $products = [
                        ['name' => 'Facial Foam Acne', 'price' => '25.500', 'img' => 'produk.png'],
                        ['name' => 'Bright Skin Serum', 'price' => '36.200', 'img' => 'produk.png'],
                        ['name' => 'Rose Water Mist', 'price' => '25.500', 'img' => 'produk.png'],
                        ['name' => 'Hydrating Toner', 'price' => '36.200', 'img' => 'produk.png'],
                    ];
                @endphp

                @foreach($products as $p)
                <div class="bg-white rounded-[30px] p-5 shadow-[0_10px_30px_rgba(0,0,0,0.05)] hover:shadow-[0_20px_40px_rgba(0,0,0,0.1)] hover:-translate-y-2 transition-all duration-500 border border-stone-100 group">
                    <div class="bg-stone-50 rounded-[20px] mb-4 overflow-hidden">
                        <img src="/images/{{ $p['img'] }}" class="w-full h-48 object-contain mix-blend-multiply group-hover:scale-110 transition duration-500">
                    </div>
                    <h3 class="text-sm font-bold text-stone-800 mb-1 h-10 overflow-hidden line-clamp-2 uppercase tracking-tighter">{{ $p['name'] }}</h3>
                    <div class="flex items-center gap-1 mb-3">
                        <span class="text-yellow-500 text-xs">★★★★☆</span>
                        <span class="text-[10px] text-stone-400 font-medium">(4.8)</span>
                    </div>
                    <div class="flex justify-between items-center">
                        <p class="font-bold text-[#5B2C04] text-lg">Rp {{ $p['price'] }}</p>
                        <button class="p-2 bg-stone-100 rounded-lg hover:bg-green-700 hover:text-white transition-colors">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" /></svg>
                        </button>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection