<aside class="w-64 bg-white dark:bg-slate-900 text-slate-800 flex-shrink-0 hidden md:flex flex-col h-screen sticky top-0 border-r border-gray-200 dark:border-slate-800 transition-colors duration-300">
    
    <div class="p-6 h-20 flex items-center border-b border-gray-100 dark:border-slate-800">
        <div class="flex items-center space-x-3">
            <div class="w-8 h-8 bg-indigo-600 rounded flex items-center justify-center text-white font-bold text-sm">D</div>
            <h2 class="text-lg font-bold tracking-tight dark:text-white">Beauty X <span class="text-indigo-600"></span></h2>
        </div>
    </div>

    <nav class="flex-1 p-4 space-y-1 overflow-y-auto">
        <p class="text-[10px] font-bold text-gray-400 uppercase tracking-widest px-3 py-4">Menu Utama</p>
        
        <a href="{{ route('admin.dashboard') }}" 
           class="flex items-center px-3 py-2.5 rounded transition-colors group {{ request()->routeIs('admin.dashboard') ? 'bg-indigo-50 text-indigo-700 dark:bg-indigo-900/30 dark:text-indigo-400' : 'text-slate-600 hover:bg-gray-50 dark:text-slate-400 dark:hover:bg-slate-800' }}">
            <i class="fas fa-th-large w-5 mr-3 {{ request()->routeIs('admin.dashboard') ? 'text-indigo-600' : 'text-gray-400 group-hover:text-slate-600' }}"></i>
            <span class="text-sm font-medium">Dashboard</span>
        </a>
        
        <a href="{{ route('admin.afiliator') }}" 
           class="flex items-center px-3 py-2.5 rounded transition-colors group {{ request()->routeIs('admin.afiliator') ? 'bg-indigo-50 text-indigo-700 dark:bg-indigo-900/30 dark:text-indigo-400' : 'text-slate-600 hover:bg-gray-50 dark:text-slate-400 dark:hover:bg-slate-800' }}">
            <i class="fas fa-users w-5 mr-3 {{ request()->routeIs('admin.afiliator') ? 'text-indigo-600' : 'text-gray-400 group-hover:text-slate-600' }}"></i>
            <span class="text-sm font-medium">Data Afiliator</span>
        </a>

        <a href="{{ route('admin.katalog-produk') }}" 
           class="flex items-center px-3 py-2.5 rounded transition-colors group {{ request()->routeIs('admin.katalog-produk') ? 'bg-indigo-50 text-indigo-700 dark:bg-indigo-900/30 dark:text-indigo-400' : 'text-slate-600 hover:bg-gray-50 dark:text-slate-400 dark:hover:bg-slate-800' }}">
            <i class="fas fa-image w-5 mr-3 {{ request()->routeIs('admin.katalog-produk') ? 'text-indigo-600' : 'text-gray-400 group-hover:text-slate-600' }}"></i>
            <span class="text-sm font-medium">Katalog Produk</span>
        </a>

        <a href="{{ route('admin.manajemen-produk') }}" 
           class="flex items-center px-3 py-2.5 rounded transition-colors group {{ request()->routeIs('admin.manajemen-produk') ? 'bg-indigo-50 text-indigo-700 dark:bg-indigo-900/30 dark:text-indigo-400' : 'text-slate-600 hover:bg-gray-50 dark:text-slate-400 dark:hover:bg-slate-800' }}">
            <i class="fas fa-sliders-h w-5 mr-3 {{ request()->routeIs('admin.manajemen-produk') ? 'text-indigo-600' : 'text-gray-400 group-hover:text-slate-600' }}"></i>
            <span class="text-sm font-medium">Manajemen Produk</span>
        </a>

        <a href="{{ route('admin.transaksi-qris') }}" 
           class="flex items-center px-3 py-2.5 rounded transition-colors group {{ request()->routeIs('admin.transaksi-qris') ? 'bg-indigo-50 text-indigo-700 dark:bg-indigo-900/30 dark:text-indigo-400' : 'text-slate-600 hover:bg-gray-50 dark:text-slate-400 dark:hover:bg-slate-800' }}">
            <i class="fas fa-credit-card w-5 mr-3 {{ request()->routeIs('admin.transaksi-qris') ? 'text-indigo-600' : 'text-gray-400 group-hover:text-slate-600' }}"></i>
            <span class="text-sm font-medium">Transaksi Penjualan</span>
        </a>

        <div class="my-4 border-t border-gray-100 dark:border-slate-800"></div>
        <p class="text-[10px] font-bold text-gray-400 uppercase tracking-widest px-3 py-4">Keuangan</p>

        <a href="{{ route('admin.rekap-penjualan') }}" 
           class="flex items-center px-3 py-2.5 rounded transition-colors group {{ request()->routeIs('admin.pencairan') ? 'bg-indigo-50 text-indigo-700 dark:bg-indigo-900/30 dark:text-indigo-400' : 'text-slate-600 hover:bg-gray-50 dark:text-slate-400 dark:hover:bg-slate-800' }}">
            <i class="fas fa-wallet w-5 mr-3 text-gray-400 group-hover:text-slate-600"></i>
            <span class="text-sm font-medium">Laporan Keuangan</span>
        </a>
        <a href="{{ route('admin.pencairan') }}" 
           class="flex items-center px-3 py-2.5 rounded transition-colors group {{ request()->routeIs('admin.pencairan') ? 'bg-indigo-50 text-indigo-700 dark:bg-indigo-900/30 dark:text-indigo-400' : 'text-slate-600 hover:bg-gray-50 dark:text-slate-400 dark:hover:bg-slate-800' }}">
            <i class="fas fa-wallet w-5 mr-3 text-gray-400 group-hover:text-slate-600"></i>
            <span class="text-sm font-medium">Pencairan</span>
        </a>

        <a href="{{ route('admin.pengaturan-komisi') }}" 
           class="flex items-center px-3 py-2.5 rounded transition-colors group {{ request()->routeIs('admin.pengaturan-komisi') ? 'bg-indigo-50 text-indigo-700 dark:bg-indigo-900/30 dark:text-indigo-400' : 'text-slate-600 hover:bg-gray-50 dark:text-slate-400 dark:hover:bg-slate-800' }}">
            <i class="fas fa-cog w-5 mr-3 text-gray-400 group-hover:text-slate-600"></i>
            <span class="text-sm font-medium">Pengaturan</span>
        </a>
    </nav>

    <div class="p-4 border-t border-gray-100 dark:border-slate-800 bg-gray-50/50 dark:bg-slate-900/50">
        {{-- Theme Toggle --}}
        <div class="mb-3">
            <button @click="darkMode = !darkMode; localStorage.setItem('dark', darkMode)" 
                    class="w-full flex items-center justify-between px-3 py-2 rounded-lg bg-white dark:bg-slate-800 border border-gray-200 dark:border-slate-700 hover:border-indigo-300 dark:hover:border-indigo-600 transition-all group">
                <div class="flex items-center">
                    <div class="w-8 h-8 rounded-md bg-indigo-100 dark:bg-indigo-900/30 flex items-center justify-center mr-3 group-hover:bg-indigo-200 dark:group-hover:bg-indigo-800/50 transition-colors">
                        <i class="fas fa-moon text-indigo-600 dark:hidden text-sm"></i>
                        <i class="fas fa-sun text-amber-500 hidden dark:block text-sm"></i>
                    </div>
                    <span class="text-sm font-medium text-slate-600 dark:text-slate-300" x-text="darkMode ? 'Mode Terang' : 'Mode Gelap'"></span>
                </div>
                <div class="w-10 h-5 rounded-full bg-gray-300 dark:bg-indigo-600 relative transition-colors">
                    <div class="w-4 h-4 rounded-full bg-white absolute top-0.5 left-0.5 dark:left-5 transition-all shadow-sm"></div>
                </div>
            </button>
        </div>

        <div class="flex items-center mb-3 p-2 rounded-lg bg-white dark:bg-slate-800 border border-gray-200 dark:border-slate-700">
            <img src="https://ui-avatars.com/api/?name={{ urlencode(auth()->user()->name) }}&background=6366f1&color=fff" class="w-9 h-9 rounded-md">
            <div class="ml-3 overflow-hidden flex-1">
                <p class="text-sm font-bold text-slate-700 dark:text-white truncate">{{ auth()->user()->name }}</p>
                <p class="text-xs text-slate-400 truncate">{{ auth()->user()->email }}</p>
            </div>
        </div>
        <form action="{{ route('admin.logout') }}" method="POST" x-ref="logoutForm" @submit.prevent="$dispatch('confirm-logout', $refs.logoutForm)">
            @csrf
            <button type="submit" class="w-full flex items-center justify-center py-2 border border-red-200 dark:border-red-800/50 text-red-600 dark:text-red-400 rounded-lg hover:bg-red-600 hover:text-white dark:hover:bg-red-600 dark:hover:text-white transition-all text-xs font-bold">
                <i class="fas fa-sign-out-alt mr-2"></i> Logout
            </button>
        </form>
    </div>
</aside>