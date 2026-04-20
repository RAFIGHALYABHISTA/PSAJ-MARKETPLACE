@extends('layouts.customer')

@section('title', 'Edit Profil')

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

    <!-- ALERT MESSAGES -->
    @if(session('success'))
    <div class="mx-10 mt-6 p-4 bg-green-50 border border-green-200 text-green-700 rounded-xl flex items-center gap-3">
      <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
      </svg>
      {{ session('success') }}
    </div>
    @endif

    @if($errors->any())
    <div class="mx-10 mt-6 p-4 bg-red-50 border border-red-200 text-red-700 rounded-xl">
      <ul class="list-disc list-inside space-y-1">
        @foreach($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
    @endif

    <!-- FORM -->
    <form action="{{ route('customer.profile.update') }}" method="POST" class="px-10 py-12 space-y-10">
      @csrf

      <!-- FOTO PROFIL -->
      <div class="text-center">
        <div class="relative inline-block">
          <img src="https://ui-avatars.com/api/?name={{ urlencode(auth()->user()->name) }}&background=5B2C04&color=FFEADB&size=128"
             alt="Profile"
               class="w-28 h-28 rounded-[30px] object-cover border-4 border-white shadow-xl">

          <div class="absolute -bottom-2 -right-2 bg-[#738029] text-white text-xs px-3 py-1.5 rounded-full font-semibold shadow-lg">
            {{ auth()->user()->role }}
          </div>
        </div>
        <p class="text-sm text-stone-500 mt-3">Foto profil akan otomatis diupdate berdasarkan nama</p>
      </div>

      <!-- INPUT -->
      <div class="grid md:grid-cols-2 gap-6">

        <!-- NAMA -->
        <div>
          <label class="text-sm font-semibold text-[#5B2C04] block mb-2">Nama Lengkap</label>
          <input type="text"
                 name="name"
                 value="{{ old('name', auth()->user()->name) }}"
                 class="w-full px-4 py-3 rounded-xl border border-stone-300 focus:ring-2 focus:ring-[#738029] focus:border-[#738029] outline-none transition"
                 placeholder="Masukkan nama lengkap"
                 required>
        </div>

        <!-- EMAIL -->
        <div>
          <label class="text-sm font-semibold text-[#5B2C04] block mb-2">Email</label>
          <input type="email"
                 name="email"
                 value="{{ old('email', auth()->user()->email) }}"
                 class="w-full px-4 py-3 rounded-xl border border-stone-300 focus:ring-2 focus:ring-[#738029] focus:border-[#738029] outline-none transition"
                 placeholder="Masukkan email"
                 required>
        </div>

      </div>

      <!-- INFO TAMBAHAN -->
      <div class="bg-stone-50 rounded-xl p-6 space-y-3">
        <div class="flex items-center gap-3 text-sm">
          <div class="w-8 h-8 rounded-full bg-[#738029]/10 flex items-center justify-center">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-[#738029]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
            </svg>
          </div>
          <div>
            <p class="font-semibold text-[#5B2C04]">Role: <span class="text-stone-600">{{ auth()->user()->role }}</span></p>
          </div>
        </div>
        <div class="flex items-center gap-3 text-sm">
          <div class="w-8 h-8 rounded-full bg-[#738029]/10 flex items-center justify-center">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-[#738029]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
            </svg>
          </div>
          <div>
            <p class="font-semibold text-[#5B2C04]">Bergabung Sejak: <span class="text-stone-600">{{ auth()->user()->created_at->format('d F Y') }}</span></p>
          </div>
        </div>
      </div>

      <!-- BUTTON -->
      <div class="flex gap-4 justify-center mt-8 w-full max-w-md mx-auto">

        <a href="{{ route('customer.edit-profil') }}"
           class="px-6 py-3 rounded-full border-2 border-stone-300 text-stone-600 font-bold hover:bg-stone-100 transition">
          Batal
        </a>

        <button type="submit"
                class="px-8 py-3 rounded-full bg-[#738029] text-white font-bold hover:bg-[#5B2C04] transition shadow-lg hover:shadow-xl">
          Simpan Perubahan
        </button>

      </div>

    </form>

  </div>

</section>
@endsection