@extends('layouts.customer')

@section('title', 'Home')

@section('content')
<section class="min-h-screen bg-stone-50 py-16 px-4 flex items-center justify-center">

  <div class="w-full max-w-4xl bg-white rounded-[40px] shadow-[0_20px_60px_rgba(91,44,4,0.1)] border border-stone-200 overflow-hidden">

    <!-- HEADER -->
    <div class="h-40 bg-[#FFEADB] relative flex items-end justify-center pb-8">

      <!-- BACK BUTTON -->
      <a href="{{ url('/edit-profil') }}" 
         class="absolute z-50 left-6 top-6 p-2 rounded-full bg-white/70 hover:bg-[#5B2C04] hover:text-white transition-all shadow">
        
        <svg xmlns="http://www.w3.org/2000/svg" 
             class="w-5 h-5" 
             fill="none" 
             viewBox="0 0 24 24" 
             stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                d="M15 19l-7-7 7-7" />
        </svg>
      </a>

      <!-- ORNAMEN -->
      <div class="absolute top-[-20%] left-[-10%] w-40 h-40 bg-green-700/10 rounded-full blur-3xl"></div>
      <div class="absolute bottom-0 right-0 w-32 h-32 bg-[#5B2C04]/5 rounded-full blur-2xl"></div>

      <!-- TITLE -->
      <h2 class="text-2xl font-serif text-[#5B2C04]">
        Edit Profil
      </h2>

    </div>

    <!-- FORM -->
    <form class="px-10 py-12 space-y-10">

      <!-- FOTO PROFIL -->
      <div class="text-center">
        <div class="relative inline-block">
          <img src="https://ui-avatars.com/api/?name={{ auth()->check() ? auth()->user()->name : 'Guest' }}&background=5B2C04&color=FFEADB" 
             alt="Profile"
               class="w-28 h-28 rounded-[30px] object-cover border-4 border-white shadow-xl">

          {{-- 
          <label class="absolute bottom-0 right-0 bg-green-700 text-white text-xs px-3 py-1 rounded-full cursor-pointer hover:bg-green-800">
            Ubah
            <input type="file" id="uploadImage" class="hidden">
          </label> 
          --}}
        </div>
      </div>

      <!-- INPUT -->
      <div class="grid md:grid-cols-2 gap-6">

        <!-- NAMA -->
        <div>
          <label class="text-sm font-semibold text-[#5B2C04]">Nama Lengkap</label>
          <input type="text"
                 class="w-full mt-2 px-4 py-3 rounded-xl border border-stone-300 focus:ring-2 focus:ring-green-700 outline-none"
                 placeholder="Masukkan nama">
        </div>

        <!-- EMAIL -->
        <div>
          <label class="text-sm font-semibold text-[#5B2C04]">Email</label>
          <input type="email"
                 class="w-full mt-2 px-4 py-3 rounded-xl border border-stone-300 focus:ring-2 focus:ring-green-700 outline-none"
                 placeholder="Masukkan email">
        </div>

      </div>

      <!-- BUTTON -->
      <div class="flex gap-4 justify-center mt-8 w-full max-w-md mx-auto">

        <button type="button"
                class="px-6 py-3 rounded-full bg-red-600 text-white font-bold hover:bg-red-800 transition">
          Batal
        </button>

        <button type="submit"
                class="px-8 py-3 rounded-full bg-green-600 text-white font-bold hover:bg-green-800 transition shadow-lg">
          Simpan Perubahan
        </button>

      </div>

    </form>

  </div>

</section>
@endsection