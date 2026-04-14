<aside id="profilePanel" class="fixed right-0 top-0 h-screen w-[380px] bg-white shadow-[-20px_0_50px_rgba(91,44,4,0.1)] translate-x-full transition-transform duration-500 ease-[cubic-bezier(0.4,0,0.2,1)] z-50 overflow-y-auto border-l border-stone-200">
  
  <div class="h-40 bg-[#FFEADB] relative overflow-hidden flex items-end justify-center pb-6">
    <div class="absolute top-[-20%] left-[-10%] w-40 h-40 bg-green-700/10 rounded-full blur-3xl"></div>
    <div class="absolute bottom-0 right-0 w-32 h-32 bg-[#5B2C04]/5 rounded-full blur-2xl"></div>
    
    <button onclick="closeProfile()" class="absolute top-8 right-8 p-2 rounded-full bg-white/50 text-[#5B2C04] hover:bg-[#5B2C04] hover:text-white transition-all z-10">
      <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
      </svg>
    </button>

    @if(auth()->check())
    <span class="absolute bottom-4 right-8 px-3 py-1 bg-green-700 text-white text-[10px] font-bold rounded-full uppercase tracking-widest shadow-lg">
        {{ ucfirst(auth()->user()->role) }}
    </span>
    @endif
  </div>

  <div class="px-10 pb-10">
    <div class="relative -mt-12 text-center mb-12">
      <div class="relative inline-block group">
        <div class="absolute -inset-2 bg-white rounded-[35px] shadow-sm"></div>
        <img src="https://ui-avatars.com/api/?name={{ auth()->check() ? auth()->user()->name : 'Guest' }}&background=5B2C04&color=FFEADB" 
             alt="Profile" 
             class="relative w-24 h-24 rounded-[30px] mx-auto border-4 border-white object-cover shadow-2xl" />
      </div>

      <div class="mt-6">
        <h3 class="text-2xl font-serif text-[#5B2C04] leading-tight">
          @if(auth()->check())
            {{ auth()->user()->name }}
          @else
            Guest User
          @endif
        </h3>
        <p class="text-sm text-gray-500 mt-1 font-light italic">
          @if(auth()->check())
            {{ auth()->user()->email }}
          @else
            Please login to see your profile
          @endif
        </p>
      </div>
    </div>

    <div class="space-y-4">
      @if(auth()->check())
        <a href="{{ url('/edit-profil') }}" class="group flex items-center justify-between p-4 rounded-[25px] bg-stone-50 hover:bg-[#5B2C04] transition-all duration-300 border border-stone-100">
          <div class="flex items-center gap-4">
            <div class="w-10 h-10 rounded-2xl bg-white flex items-center justify-center text-[#5B2C04] group-hover:bg-white/20 group-hover:text-white transition-colors">
              <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" fill="currentColor"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 3c1.66 0 3 1.34 3 3s-1.34 3-3 3-3-1.34-3-3 1.34-3 3-3zm0 14.2c-2.5 0-4.71-1.28-6-3.22.03-1.99 4-3.08 6-3.08 1.99 0 5.97 1.09 6 3.08-1.29 1.94-3.5 3.22-6 3.22z" /></svg>
            </div>
            <span class="text-sm font-bold text-stone-700 group-hover:text-white transition-colors tracking-wide">Profil Saya</span>
          </div>
          <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-stone-300 group-hover:text-white/50 transition-colors" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" /></svg>
        </a>
        <a href="{{ url('/edit-profil') }}" class="group flex items-center justify-between p-4 rounded-[25px] bg-stone-50 hover:bg-[#5B2C04] transition-all duration-300 border border-stone-100">
          <div class="flex items-center gap-4">
            <div class="w-10 h-10 rounded-2xl bg-white flex items-center justify-center text-[#5B2C04] group-hover:bg-white/20 group-hover:text-white transition-colors">
             <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5"  viewBox="0 0 24 24" fill="currentColor">
                <path d="M19.14 12.94c.04-.31.06-.63.06-.94s-.02-.63-.06-.94l2.03-1.58a.5.5 0 00.12-.64l-1.92-3.32a.5.5 0 00-.6-.22l-2.39.96a7.028 7.028 0 00-1.63-.94l-.36-2.54a.5.5 0 00-.5-.42h-3.84a.5.5 0 00-.5.42l-.36 2.54c-.58.22-1.12.52-1.63.94l-2.39-.96a.5.5 0 00-.6.22L2.71 8.84a.5.5 0 00.12.64l2.03 1.58c-.04.31-.06.63-.06.94s.02.63.06.94L2.83 14.52a.5.5 0 00-.12.64l1.92 3.32c.14.24.43.34.68.22l2.39-.96c.5.38 1.05.7 1.63.94l.36 2.54c.05.24.26.42.5.42h3.84c.24 0 .45-.18.5-.42l.36-2.54c.58-.22 1.12-.52 1.63-.94l2.39.96c.25.12.54.02.68-.22l1.92-3.32a.5.5 0 00-.12-.64l-2.03-1.58zM12 15.5A3.5 3.5 0 1112 8a3.5 3.5 0 010 7.5z"/>
            </svg>
            </div>
            <span class="text-sm font-bold text-stone-700 group-hover:text-white transition-colors tracking-wide">Pengaturan</span>
          </div>
          <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-stone-300 group-hover:text-white/50 transition-colors" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" /></svg>
        </a>

        @if(!in_array(auth()->user()->role, ['admin', 'superadmin',]))
          <a href="#" class="group flex items-center justify-between p-4 rounded-[25px] bg-stone-50 hover:bg-[#5B2C04] transition-all duration-300 border border-stone-100">
            <div class="flex items-center gap-4">
              <div class="w-10 h-10 rounded-2xl bg-white flex items-center justify-center text-[#5B2C04] group-hover:bg-white/20 group-hover:text-white transition-colors">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" fill="currentColor"><path d="M17 3H7c-1.1 0-1.99.9-1.99 2L5 21l7-3 7 3V5c0-1.1-.9-2-2-2z" /></svg>
              </div>
              <span class="text-sm font-bold text-stone-700 group-hover:text-white transition-colors tracking-wide">Wishlist</span>
            </div>
            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-stone-300 group-hover:text-white/50 transition-colors" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" /></svg>
          </a>

          <a href="{{ route('customer.riwayat') }}" class="group flex items-center justify-between p-4 rounded-[25px] bg-stone-50 hover:bg-[#5B2C04] transition-all duration-300 border border-stone-100">
            <div class="flex items-center gap-4">
              <div class="w-10 h-10 rounded-2xl bg-white flex items-center justify-center text-[#5B2C04] group-hover:bg-white/20 group-hover:text-white transition-colors">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" fill="currentColor"><path d="M19 3H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm0 16H5V5h14v14zm-5.04-6.71l-2.75 3.54-2.12-2.59c-.18-.23-.48-.29-.74-.12-.26.16-.34.5-.18.77l2.91 3.59c.15.19.42.31.67.31.25 0 .52-.12.67-.31l3.59-4.58c.16-.27.08-.61-.18-.77-.27-.17-.56-.11-.74.12z" /></svg>
              </div>
              <span class="text-sm font-bold text-stone-700 group-hover:text-white transition-colors tracking-wide">Riwayat Pesanan Saya</span>
            </div>
            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-stone-300 group-hover:text-white/50 transition-colors" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" /></svg>
          </a>

        @if(auth()->user()->role === 'affiliator')
          <a href="{{ route('afiliator.dashboard') }}" class="flex items-center gap-4 p-5 rounded-[25px] bg-[#5B2C04] text-white shadow-xl shadow-orange-900/20 hover:bg-green-800 transition-all">
            <div class="w-10 h-10 rounded-xl bg-white/10 flex items-center justify-center text-white">
              <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" fill="currentColor"><path d="M3 13h8V3H3v10zm0 8h8v-6H3v6zm10 0h8V11h-8v10zm0-18v6h8V3h-8z" /></svg>
            </div>
            <span class="text-sm font-bold uppercase tracking-widest">Affiliator Dashboard</span>
          </a>
        @endif

        @else
        <div class="mt-8 p-6 rounded-[30px] bg-[#FFEADB] border border-[#5B2C04]/10 relative overflow-hidden group">
            <div class="absolute top-[-20px] right-[-20px] w-20 h-20 bg-green-700/10 rounded-full group-hover:scale-150 transition-transform duration-700"></div>
            <h4 class="text-[#5B2C04] font-serif text-lg mb-1">Daftar Afiliator</h4>
            <p class="text-[11px] text-[#5B2C04]/70 mb-4 uppercase tracking-wider font-bold">Gabung & Dapatkan Komisi</p>
            <a href="{{route('afiliator.register')}}" class="inline-flex items-center gap-2 text-xs font-bold text-green-800 hover:gap-3 transition-all">
                Mulai Sekarang 
                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" /></svg>
            </a>
          </div>
        @endif

        <div class="pt-8">
          <form action="{{ route('auth.logout') }}" method="POST" class="w-full">
            @csrf
            <button type="submit" class="w-full flex items-center justify-center gap-3 py-4 rounded-full text-red-500 font-bold text-xs uppercase tracking-widest border border-red-50 hover:bg-red-50 transition-all">
              <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" fill="currentColor"><path d="M17 7l-1.41 1.41L18.17 11H8v2h10.17l-2.58 2.58L17 17l5-5zM4 5h8V3H4c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h8v-2H4V5z" /></svg>
              Keluar Akun
            </button>
          </form>
        </div>

      @else
        <div class="text-center py-10 space-y-8">
          <div class="relative inline-block">
            <div class="absolute -inset-4 bg-[#FFEADB] rounded-full blur-xl"></div>
            <div class="relative w-20 h-20 bg-white rounded-[25px] flex items-center justify-center mx-auto text-[#5B2C04] shadow-sm">
              <svg xmlns="http://www.w3.org/2000/svg" class="w-10 h-10" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" /></svg>
            </div>
          </div>
          <p class="text-sm text-stone-500 px-6 leading-relaxed font-serif italic">"Login untuk pengalaman kecantikan yang lebih personal."</p>
          
          <div class="space-y-4 px-2">
            <a href="{{ route('auth.login') }}" class="block w-full py-4 rounded-full bg-green-700 text-white font-bold text-xs uppercase tracking-widest shadow-lg shadow-green-900/20 hover:bg-green-800 transition-all active:scale-95">
              Login Sekarang
            </a>
            <a href="{{ route('auth.register') }}" class="block w-full py-4 rounded-full border border-stone-200 text-[#5B2C04] font-bold text-xs uppercase tracking-widest hover:bg-stone-50 transition-all">
              Daftar Akun
            </a>
          </div>
        </div>
      @endif
    </div>

    <div class="mt-16 text-center border-t border-stone-100 pt-8">
      <p class="text-[10px] font-bold text-stone-300 uppercase tracking-[0.3em]">Sariayu Smega &bull; 2026</p>
    </div>
  </div>
</aside>