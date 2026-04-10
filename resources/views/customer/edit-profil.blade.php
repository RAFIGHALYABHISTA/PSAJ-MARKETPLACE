@extends('layouts.customer')

@section('title', 'Home')

@section('content')
<section class="min-h-screen bg-stone-50 flex items-center justify-center py-16 px-4">

  <div class="w-full max-w-4xl bg-white rounded-[40px] shadow-[0_20px_60px_rgba(91,44,4,0.1)] overflow-hidden border border-stone-200">

    <!-- HEADER -->
    <div class="h-48 bg-[#FFEADB] relative flex items-end justify-center pb-8">
      
      <div class="absolute top-[-20%] left-[-10%] w-40 h-40 bg-green-700/10 rounded-full blur-3xl"></div>
      <div class="absolute bottom-0 right-0 w-32 h-32 bg-[#5B2C04]/5 rounded-full blur-2xl"></div>

      <!-- ROLE -->
      <span class="absolute bottom-6 right-8 px-3 py-1 bg-green-700 text-white text-[10px] font-bold rounded-full uppercase tracking-widest shadow-lg">
        Member
      </span>
    </div>

    <!-- CONTENT -->
    <div class="px-10 pb-12">

      <!-- PROFILE -->
      <div class="relative -mt-14 text-center mb-12">
        <div class="relative inline-block">
          <div class="absolute -inset-2 bg-white rounded-[35px] shadow-sm"></div>

          <img src="https://ui-avatars.com/api/?name=User&background=5B2C04&color=FFEADB"
               class="relative w-28 h-28 rounded-[30px] mx-auto border-4 border-white object-cover shadow-2xl">
        </div>

        <div class="mt-6">
          <h3 class="text-2xl font-serif text-[#5B2C04]">User Name</h3>
          <p class="text-sm text-gray-500 italic">user@email.com</p>
        </div>
      </div>

      <!-- MENU -->
      <div class="space-y-4">

        <!-- PROFIL -->
        <a href="{{ url('/edit-profil1') }}" class="group flex items-center justify-between p-4 rounded-[25px] bg-stone-50 hover:bg-[#5B2C04] transition-all border">
          <div class="flex items-center gap-4">
            <div class="w-10 h-10 rounded-2xl bg-white flex items-center justify-center text-[#5B2C04] group-hover:bg-white/20 group-hover:text-white">
              👤
            </div>
            <span class="text-sm font-bold text-stone-700 group-hover:text-white">Profil Saya</span>
          </div>
          ➤
        </a>

        <!-- WISHLIST -->
        <a href="#" class="group flex items-center justify-between p-4 rounded-[25px] bg-stone-50 hover:bg-[#5B2C04] transition-all border">
          <div class="flex items-center gap-4">
            <div class="w-10 h-10 rounded-2xl bg-white flex items-center justify-center text-[#5B2C04] group-hover:bg-white/20 group-hover:text-white">
              ❤
            </div>
            <span class="text-sm font-bold text-stone-700 group-hover:text-white">Wishlist</span>
          </div>
          ➤
        </a>

        <!-- PESANAN -->
        <a href="#" class="group flex items-center justify-between p-4 rounded-[25px] bg-stone-50 hover:bg-[#5B2C04] transition-all border">
          <div class="flex items-center gap-4">
            <div class="w-10 h-10 rounded-2xl bg-white flex items-center justify-center text-[#5B2C04] group-hover:bg-white/20 group-hover:text-white">
              📦
            </div>
            <span class="text-sm font-bold text-stone-700 group-hover:text-white">Pesanan Saya</span>
          </div>
          ➤
        </a>

        <!-- AFILIASI -->
        <div class="mt-8 p-6 rounded-[30px] bg-[#FFEADB] border relative overflow-hidden">
          <div class="absolute top-[-20px] right-[-20px] w-20 h-20 bg-green-700/10 rounded-full"></div>

          <h4 class="text-[#5B2C04] font-serif text-lg mb-1">
            Daftar Afiliator
          </h4>

          <p class="text-xs text-[#5B2C04]/70 mb-4 uppercase font-bold">
            Gabung & Dapatkan Komisi
          </p>

          <a href="#" class="text-sm font-bold text-green-800 hover:underline">
            Mulai Sekarang →
          </a>
        </div>

        <!-- LOGOUT -->
        <div class="pt-8">
          <button class="w-full py-4 rounded-full text-red-500 font-bold text-xs uppercase border hover:bg-red-50 transition">
            Keluar Akun
          </button>
        </div>

      </div>

      <!-- FOOTER -->
      <div class="mt-16 text-center border-t pt-6">
        <p class="text-[10px] font-bold text-stone-300 uppercase tracking-[0.3em]">
          Sariayu Smega • 2026
        </p>
      </div>

    </div>
  </div>

</section>
@endsection