@extends('layouts.customer')

@section('title', 'Tentang Kami - Sariayu')

@section('content')
<section class="w-full">
  <img src="{{ asset('images/beuty.png') }}"
       class="w-full h-[400px] md:h-[500px] object-cover">
</section>
<section class="bg-[#E6D3B5] py-16 px-4 sm:px-6 lg:px-8">
  <div class="max-w-6xl mx-auto space-y-20">

    <!-- ITEM 1 -->
    <div class="grid md:grid-cols-2 gap-10 items-center">
      
      <!-- TEXT -->
      <div>
        <div class="flex flex-col sm:flex-row sm:items-center gap-4 mb-4">
          <h2 class="text-3xl font-serif text-[#3B2A1A]">Make Up</h2>
          <div class="flex-1 h-[1px] bg-[#3B2A1A]/50"></div>
        </div>

        <p class="text-sm text-gray-700 leading-relaxed max-w-xl">
          Kilau Alami yang Juga Melindungi Kulitmu tampil cantik bukan cuma soal warna,
          tapi juga tentang kesehatan kulitmu. Temukan rahasia make up dasar yang mampu memberikan
          glow natural, ringan dipakai seharian.
        </p>
      </div>

      <!-- IMAGE -->
      <div class="flex justify-center md:justify-end">
        <div class="bg-gray-300 rounded-[30px] p-3 max-w-full w-full sm:w-auto">
          <img src="{{ asset('images/gambar1.png') }}"
               class="rounded-[25px] w-full max-w-sm object-cover">
        </div>
      </div>

    </div>

    <!-- ITEM 2 -->
    <div class="grid md:grid-cols-2 gap-10 items-center">
      
      <!-- IMAGE -->
      <div class="flex justify-center md:justify-start">
        <div class="bg-orange-700 rounded-[30px] p-3 max-w-full w-full sm:w-auto">
          <img src="{{ asset('images/gambar2.png') }}"
               class="rounded-[25px] w-full max-w-sm object-cover">
        </div>
      </div>

      <!-- TEXT -->
      <div>
        <div class="flex flex-col sm:flex-row sm:items-center gap-4 mb-4">
          <h2 class="text-3xl font-serif text-[#3B2A1A]">Skin Care</h2>
          <div class="flex-1 h-[1px] bg-[#3B2A1A]/50"></div>
        </div>

        <p class="text-sm text-gray-700 leading-relaxed max-w-xl">
          Si kecil yang penuh keajaiban! Jeruk nipis dikenal kaya akan vitamin C dan antioksidan
          yang membantu mencerahkan kulit, mengurangi minyak berlebih, serta menyamarkan noda hitam.
        </p>
      </div>

    </div>


    <!-- ITEM 3 -->
    <div class="grid md:grid-cols-2 gap-10 items-center">
      
      <!-- TEXT -->
      <div>
        <div class="flex flex-col sm:flex-row sm:items-center gap-4 mb-4">
          <h2 class="text-3xl font-serif text-[#3B2A1A]">Skin Care</h2>
          <div class="flex-1 h-[1px] bg-[#3B2A1A]/50"></div>
        </div>

        <p class="text-sm text-gray-700 leading-relaxed max-w-xl">
          Perawatan wajah intensif dengan bahan alami. Membantu mengontrol minyak,
          membersihkan pori-pori secara mendalam, serta meredakan peradangan akibat jerawat.
        </p>
      </div>

      <!-- IMAGE -->
      <div class="flex justify-center md:justify-end">
        <div class="bg-blue-400 rounded-[30px] p-3 max-w-full w-full sm:w-auto">
          <img src="{{ asset('images/gambar3.png') }}"
               class="rounded-[25px] w-full max-w-sm object-cover">
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