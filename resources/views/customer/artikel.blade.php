@extends('layouts.customer')

@section('title', 'Tentang Kami - Sariayu')

@section('content')
<section class="w-full">
  <img src="{{ asset('images/beuty.png') }}"
       class="w-full  h-[300px] md:h-[500px] object-cover">
</section>
<section class="bg-[#E6D3B5] py-20 px-6 lg:px-12">
  <div class="max-w-6xl mx-auto space-y-28">

    <!-- ITEM 1 -->
    <div class="grid md:grid-cols-2 gap-12 items-center">
      
      <!-- TEXT -->
      <div class="space-y-4">
        <div class="flex items-center gap-4">
          <h2 class="text-4xl font-serif text-[#3B2A1A]">Make Up</h2>
          <div class="flex-1 h-[1px] bg-[#3B2A1A]/40"></div>
        </div>

        <p class="text-base text-gray-700 leading-relaxed max-w-lg">
          Kilau alami yang juga melindungi kulitmu. Tampil cantik bukan cuma soal warna,
          tapi juga tentang kesehatan kulit. Make up ringan dengan hasil glow natural,
          nyaman dipakai seharian.
        </p>
      </div>

      <!-- IMAGE -->
      <div class="flex justify-center md:justify-end">
        <div class="rounded-[30px] overflow-hidden shadow-xl hover:scale-105 transition duration-500">
          <img src="{{ asset('images/model3.jpg') }}"
               class="w-[300px] h-[400px] object-cover">
        </div>
      </div>

    </div>

    <!-- ITEM 2 -->
    <div class="grid md:grid-cols-2 gap-12 items-center">
      
      <!-- IMAGE -->
      <div class="flex justify-center md:justify-start">
        <div class="rounded-[30px] overflow-hidden shadow-xl hover:scale-105 transition duration-500">
          <img src="{{ asset('images/model2.jpg') }}"
               class="w-[300px] h-[400px] object-cover">
        </div>
      </div>

      <!-- TEXT -->
      <div class="space-y-4">
        <div class="flex items-center gap-4">
          <h2 class="text-4xl font-serif text-[#3B2A1A]">Skin Care</h2>
          <div class="flex-1 h-[1px] bg-[#3B2A1A]/40"></div>
        </div>

        <p class="text-base text-gray-700 leading-relaxed max-w-lg">
          Kandungan alami kaya vitamin C dan antioksidan membantu mencerahkan kulit,
          mengontrol minyak, dan menyamarkan noda hitam untuk wajah yang lebih sehat.
        </p>
      </div>

    </div>

    <!-- ITEM 3 -->
    <div class="grid md:grid-cols-2 gap-12 items-center">
      
      <!-- TEXT -->
      <div class="space-y-4">
        <div class="flex items-center gap-4">
          <h2 class="text-4xl font-serif text-[#3B2A1A]">Treatment</h2>
          <div class="flex-1 h-[1px] bg-[#3B2A1A]/40"></div>
        </div>

        <p class="text-base text-gray-700 leading-relaxed max-w-lg">
          Perawatan intensif dengan bahan alami untuk membersihkan pori-pori,
          mengontrol minyak berlebih, serta meredakan peradangan akibat jerawat.
        </p>
      </div>

      <!-- IMAGE -->
      <div class="flex justify-center md:justify-end">
        <div class="rounded-[30px] overflow-hidden shadow-xl hover:scale-105 transition duration-500">
          <img src="{{ asset('images/model1.jpg') }}"
               class="w-[300px] h-[400px] object-cover">
        </div>
      </div>

    </div>

  </div>
</section>
<section class="bg-[#F5F5F5] py-16 px-4 sm:px-6 lg:px-8">
  <div class="max-w-6xl mx-auto grid md:grid-cols-2 gap-12 items-center">

    <!-- LEFT (TEXT + CERTIFICATE) -->
    <div>
      <h2 class="text-2xl font-semibold text-gray-800 mb-6">
        CERTIFICATE
      </h2>

      <ol class="list-decimal ml-5 md:ml-20 text-gray-700 space-y-2 text-sm leading-relaxed">
        <li>ISO 9001 : Uji Mutu Produk, th 1996</li>
        <li>ISO 14001 : Uji Ramah Lingkungan</li>
        <li>GMP (Good Manufacturing Practice)</li>
        <li>Sertifikat Proses Produksi & Pabrik standar Internasional</li>
      </ol>

      <!-- BOX LOGO -->
      <div class="mt-8 inline-block p-6 md:ml-20 mx-auto md:mx-0">
        <img src="{{ asset('images/sertif.png') }}"
             class="w-full max-w-xs object-contain">
      </div>
    </div>


    <!-- RIGHT (CARD IMAGE) -->
    <div class="flex justify-center">
      <div class=" p-4 max-w-md">
        <img src="{{ asset('images/sar.png') }}"
             class="rounded-xl w-full object-cover">
      </div>
    </div>

  </div>
</section>
@endsection