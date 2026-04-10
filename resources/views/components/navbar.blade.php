<nav id="main-nav" class="bg-white/80 backdrop-blur-md shadow-sm fixed top-0 w-full z-50 border-b border-stone-100 transition-all duration-500">
    <div class="max-w-7xl mx-auto px-6 lg:px-8">
        <div class="flex h-20 items-center justify-between transition-all duration-500" id="nav-container">
            
            <div class="flex items-center shrink-0 py-2 gap-3 mt-4">
                <a href="{{ url('/') }}" class="block group">
                    <img id="nav-logo" src="{{ asset('images/logo.png') }}" 
                         alt="Sariayu Logo" 
                         class="h-20 md:h-24 w-auto object-contain transition-all duration-500 group-hover:scale-105" />
                </a>

                <button id="mobile-menu-button" type="button" onclick="toggleMobileMenu()"
                        class="md:hidden inline-flex items-center justify-center p-2 rounded-full text-stone-600 hover:bg-stone-100 focus:outline-none focus:ring-2 focus:ring-green-700"
                        aria-expanded="false" aria-controls="mobile-menu">
                    <span class="sr-only">Buka menu</span>
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>
            </div>

            <ul id="nav-menu" class="hidden md:flex items-center space-x-10 transition-all duration-500 opacity-100">
                <li>
                    <a href="{{ url('/') }}" class="text-[13px] font-bold uppercase tracking-[0.2em] text-stone-600 hover:text-green-800 transition-colors relative group">
                        Home
                        <span class="absolute -bottom-1 left-0 w-0 h-0.5 bg-green-800 transition-all group-hover:w-full"></span>
                    </a>
                </li>
                <li>
                    <a href="{{ url('/about')}}" class="text-[13px] font-bold uppercase tracking-[0.2em] text-stone-600 hover:text-green-800 transition-colors relative group">
                        About Us
                        <span class="absolute -bottom-1 left-0 w-0 h-0.5 bg-green-800 transition-all group-hover:w-full"></span>
                    </a>
                </li>
                <li>
                    <a href="{{ url('/produk') }}" class="text-[13px] font-bold uppercase tracking-[0.2em] text-stone-600 hover:text-green-800 transition-colors relative group">
                        Product
                        <span class="absolute -bottom-1 left-0 w-0 h-0.5 bg-green-800 transition-all group-hover:w-full"></span>
                    </a>
                </li>
                <li>
                    <a href="{{ url('/artikel') }}" class="text-[13px] font-bold uppercase tracking-[0.2em] text-stone-600 hover:text-green-800 transition-colors relative group">
                        Artikel
                        <span class="absolute -bottom-1 left-0 w-0 h-0.5 bg-green-800 transition-all group-hover:w-full"></span>
                    </a>
                </li>
                <li>
                    <a href="{{ url('/testimoni') }}" class="text-[13px] font-bold uppercase tracking-[0.2em] text-stone-600 hover:text-green-800 transition-colors relative group">
                        Testimoni
                        <span class="absolute -bottom-1 left-0 w-0 h-0.5 bg-green-800 transition-all group-hover:w-full"></span>
                    </a>
                </li>
                <li>
                    <a href="{{ url('/contact') }}" class="text-[13px] font-bold uppercase tracking-[0.2em] text-stone-600 hover:text-green-800 transition-colors relative group">
                        Contact us
                        <span class="absolute -bottom-1 left-0 w-0 h-0.5 bg-green-800 transition-all group-hover:w-full"></span>
                    </a>
                </li>
            </ul>

            <div class="flex items-center space-x-5">
                <a href="{{ url('/keranjang') }}" class="relative text-stone-600 hover:text-green-800 transition-all hover:-translate-y-0.5">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 10.5V6a3.75 3.75 0 1 0-7.5 0v4.5m11.356-1.993 1.263 12c.07.665-.45 1.243-1.119 1.243H4.25 a1.125 1.125 0 0 1-1.12-1.243l1.264-12 A1.125 1.125 0 0 1 5.513 7.5h12.974 c.576 0 1.059.435 1.119 1.007Z"/>
                    </svg>
                    <span class="absolute -top-1 -right-1 bg-green-700 text-white text-[9px] font-bold w-4 h-4 flex items-center justify-center rounded-full">0</span>
                </a>

                <button onclick="openProfile()" class="text-stone-600 hover:text-green-800 transition-all hover:-translate-y-0.5 focus:outline-none">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118 a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75 c-2.676 0-5.216-.584-7.499-1.632Z"/>
                    </svg>
                </button>

                <div class="h-6 w-px bg-stone-200 hidden sm:block"></div>

                @if (auth()->check())
                    <div class="flex items-center gap-3">
                        {{-- <div class="hidden lg:block text-right">
                            <p class="text-[10px] text-stone-400 font-bold uppercase tracking-tighter">Selamat Datang,</p>
                            <p class="text-xs font-black text-stone-800">{{ auth()->user()->name }}</p>
                        </div> --}}
                        <form action="{{ route('auth.logout') }}" method="POST" class="inline">
                            @csrf
                            <button type="submit" class="p-2 rounded-full border border-stone-100 text-stone-400 hover:text-red-500 hover:bg-red-50 transition-all group">
                                <i class="fas fa-power-off text-sm"></i>
                            </button>
                        </form>
                    </div>
                @else
                    <a href="{{ url('/login') }}" class="px-7 py-2.5 rounded-full bg-green-800 text-white text-[11px] font-bold uppercase tracking-[0.2em] hover:bg-green-900 transition-all shadow-lg shadow-green-900/20 active:scale-95">
                        Masuk
                    </a>
                @endif
            </div> 
        </div>

        <div id="mobile-menu" class="hidden md:hidden absolute inset-x-0 top-full z-40 bg-white border-t border-stone-200 shadow-lg">
            <ul class="flex flex-col gap-4 px-6 py-5">
                <li>
                    <a href="{{ url('/') }}" class="block text-sm font-bold uppercase tracking-[0.2em] text-stone-600 hover:text-green-800 transition-colors">
                        Home
                    </a>
                </li>
                <li>
                    <a href="{{ url('/about') }}" class="block text-sm font-bold uppercase tracking-[0.2em] text-stone-600 hover:text-green-800 transition-colors">
                        About Us
                    </a>
                </li>
                <li>
                    <a href="{{ url('/produk') }}" class="block text-sm font-bold uppercase tracking-[0.2em] text-stone-600 hover:text-green-800 transition-colors">
                        Product
                    </a>
                </li>
                <li>
                    <a href="{{ url('/artikel') }}" class="block text-sm font-bold uppercase tracking-[0.2em] text-stone-600 hover:text-green-800 transition-colors">
                        Artikel
                    </a>
                </li>
                <li>
                    <a href="{{ url('/testimoni') }}" class="block text-sm font-bold uppercase tracking-[0.2em] text-stone-600 hover:text-green-800 transition-colors">
                        Testimoni
                    </a>
                </li>
                <li>
                    <a href="{{ url('/contact') }}" class="block text-sm font-bold uppercase tracking-[0.2em] text-stone-600 hover:text-green-800 transition-colors">
                        Contact us
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<script>
    function toggleMobileMenu() {
        const menu = document.getElementById('mobile-menu');
        const button = document.getElementById('mobile-menu-button');
        if (!menu || !button) return;

        const isHidden = menu.classList.contains('hidden');
        menu.classList.toggle('hidden', !isHidden);
        menu.classList.toggle('block', isHidden);
        button.setAttribute('aria-expanded', String(isHidden));
    }
</script>