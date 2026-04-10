<aside class="w-64 bg-[#f8fafc] dark:bg-[#0f172a] text-slate-800 flex-shrink-0 hidden md:flex flex-col h-screen sticky top-0 border-r border-slate-200 dark:border-slate-800/60 transition-colors duration-300">
    
    <div class="p-6 h-24 flex items-center">
        <div class="flex items-center space-x-3 bg-white dark:bg-slate-800/50 p-2 rounded-xl shadow-sm border border-slate-100 dark:border-slate-700/50 w-full">
            <div class="w-10 h-10 bg-gradient-to-br from-indigo-500 to-indigo-700 rounded-lg flex items-center justify-center text-white shadow-lg shadow-indigo-500/20">
                <span class="font-bold text-lg">B</span>
            </div>
            <div>
                <h2 class="text-sm font-bold tracking-tight dark:text-white leading-tight">Beauty X</h2>
                <span class="text-[10px] text-indigo-600 dark:text-indigo-400 font-semibold uppercase tracking-wider">Administrator</span>
            </div>
        </div>
    </div>

    <nav class="flex-1 px-4 pb-4 space-y-1.5 overflow-y-auto custom-scrollbar">
        <p class="text-[11px] font-bold text-slate-400 dark:text-slate-500 uppercase tracking-[0.15em] px-3 pt-6 pb-2">Menu Utama</p>
        
        <a href="{{ route('admin.dashboard') }}" 
           class="flex items-center px-4 py-3 rounded-xl transition-all duration-200 group {{ request()->routeIs('admin.dashboard') ? 'bg-white dark:bg-indigo-600/10 text-indigo-600 dark:text-indigo-400 shadow-sm border border-slate-200/50 dark:border-indigo-500/20' : 'text-slate-500 hover:bg-slate-200/50 dark:text-slate-400 dark:hover:bg-slate-800/50 hover:text-slate-900 dark:hover:text-slate-200' }}">
            <i class="fas fa-th-large w-5 mr-3 text-base {{ request()->routeIs('admin.dashboard') ? 'text-indigo-600' : 'text-slate-400 group-hover:text-indigo-500' }}"></i>
            <span class="text-sm font-semibold">Dashboard</span>
        </a>
        
        <a href="{{ route('admin.afiliator') }}" 
           class="flex items-center px-4 py-3 rounded-xl transition-all duration-200 group {{ request()->routeIs('admin.afiliator') ? 'bg-white dark:bg-indigo-600/10 text-indigo-600 dark:text-indigo-400 shadow-sm border border-slate-200/50 dark:border-indigo-500/20' : 'text-slate-500 hover:bg-slate-200/50 dark:text-slate-400 dark:hover:bg-slate-800/50 hover:text-slate-900 dark:hover:text-slate-200' }}">
            <i class="fas fa-users w-5 mr-3 text-base {{ request()->routeIs('admin.afiliator') ? 'text-indigo-600' : 'text-slate-400 group-hover:text-indigo-500' }}"></i>
            <span class="text-sm font-semibold">Data Afiliator</span>
        </a>

        <a href="{{ route('admin.katalog-produk') }}" 
           class="flex items-center px-4 py-3 rounded-xl transition-all duration-200 group {{ request()->routeIs('admin.katalog-produk') ? 'bg-white dark:bg-indigo-600/10 text-indigo-600 dark:text-indigo-400 shadow-sm border border-slate-200/50 dark:border-indigo-500/20' : 'text-slate-500 hover:bg-slate-200/50 dark:text-slate-400 dark:hover:bg-slate-800/50 hover:text-slate-900 dark:hover:text-slate-200' }}">
            <i class="fas fa-image w-5 mr-3 text-base {{ request()->routeIs('admin.katalog-produk') ? 'text-indigo-600' : 'text-slate-400 group-hover:text-indigo-500' }}"></i>
            <span class="text-sm font-semibold">Katalog Produk</span>
        </a>

        <a href="{{ route('admin.manajemen-produk') }}" 
           class="flex items-center px-4 py-3 rounded-xl transition-all duration-200 group {{ request()->routeIs('admin.manajemen-produk') ? 'bg-white dark:bg-indigo-600/10 text-indigo-700 dark:text-indigo-400 shadow-sm border border-slate-200/50 dark:border-indigo-500/20' : 'text-slate-500 hover:bg-slate-200/50 dark:text-slate-400 dark:hover:bg-slate-800/50 hover:text-slate-900 dark:hover:text-slate-200' }}">
            <i class="fas fa-sliders-h w-5 mr-3 text-base {{ request()->routeIs('admin.manajemen-produk') ? 'text-indigo-600' : 'text-slate-400 group-hover:text-indigo-500' }}"></i>
            <span class="text-sm font-semibold">Manajemen Produk</span>
        </a>

        <a href="{{ route('admin.transaksi-qris') }}" 
           class="flex items-center px-4 py-3 rounded-xl transition-all duration-200 group {{ request()->routeIs('admin.transaksi-qris') ? 'bg-white dark:bg-indigo-600/10 text-indigo-700 dark:text-indigo-400 shadow-sm border border-slate-200/50 dark:border-indigo-500/20' : 'text-slate-500 hover:bg-slate-200/50 dark:text-slate-400 dark:hover:bg-slate-800/50 hover:text-slate-900 dark:hover:text-slate-200' }}">
            <i class="fas fa-credit-card w-5 mr-3 text-base {{ request()->routeIs('admin.transaksi-qris') ? 'text-indigo-600' : 'text-slate-400 group-hover:text-indigo-500' }}"></i>
            <span class="text-sm font-semibold">Transaksi Penjualan</span>
        </a>

        <div class="pt-4 mt-4 border-t border-slate-200 dark:border-slate-800">
            <p class="text-[11px] font-bold text-slate-400 dark:text-slate-500 uppercase tracking-[0.15em] px-3 pb-2">Keuangan</p>
        </div>

        <a href="{{ route('admin.rekap-penjualan') }}" 
           class="flex items-center px-4 py-3 rounded-xl transition-all duration-200 group {{ request()->routeIs('admin.rekap-penjualan') ? 'bg-white dark:bg-indigo-600/10 text-indigo-600 shadow-sm' : 'text-slate-500 hover:bg-slate-200/50 dark:text-slate-400 dark:hover:bg-slate-800/50' }}">
            <i class="fas fa-file-invoice-dollar w-5 mr-3 text-slate-400 group-hover:text-indigo-500 transition-colors"></i>
            <span class="text-sm font-semibold">Laporan Keuangan</span>
        </a>

        <a href="{{ route('admin.pencairan') }}" 
           class="flex items-center px-4 py-3 rounded-xl transition-all duration-200 group {{ request()->routeIs('admin.pencairan') ? 'bg-white dark:bg-indigo-600/10 text-indigo-600 shadow-sm' : 'text-slate-500 hover:bg-slate-200/50 dark:text-slate-400 dark:hover:bg-slate-800/50' }}">
            <i class="fas fa-wallet w-5 mr-3 text-slate-400 group-hover:text-indigo-500 transition-colors"></i>
            <span class="text-sm font-semibold">Pencairan</span>
        </a>

        <a href="{{ route('admin.pengaturan-komisi') }}" 
           class="flex items-center px-4 py-3 rounded-xl transition-all duration-200 group {{ request()->routeIs('admin.pengaturan-komisi') ? 'bg-white dark:bg-indigo-600/10 text-indigo-600 shadow-sm' : 'text-slate-500 hover:bg-slate-200/50 dark:text-slate-400 dark:hover:bg-slate-800/50' }}">
            <i class="fas fa-cog w-5 mr-3 text-slate-400 group-hover:text-indigo-500 transition-colors"></i>
            <span class="text-sm font-semibold">Pengaturan</span>
        </a>
    </nav>

    <div class="p-4 bg-white/50 dark:bg-slate-900/50 backdrop-blur-md border-t border-slate-200 dark:border-slate-800">
        
        <button @click="darkMode = !darkMode; localStorage.setItem('dark', darkMode)" 
                class="w-full flex items-center justify-between p-1.5 mb-4 rounded-xl bg-slate-200/50 dark:bg-slate-800 border border-slate-200 dark:border-slate-700 transition-all group">
            <div class="flex items-center grow px-2">
                <i class="fas fa-moon text-indigo-600 dark:hidden text-xs mr-2"></i>
                <i class="fas fa-sun text-amber-500 hidden dark:block text-xs mr-2"></i>
                <span class="text-[11px] font-bold text-slate-600 dark:text-slate-300 uppercase tracking-tighter" x-text="darkMode ? 'Light' : 'Dark'"></span>
            </div>
            <div class="w-12 h-6 rounded-full bg-white dark:bg-indigo-600 relative transition-all shadow-inner">
                <div class="w-4 h-4 rounded-full bg-indigo-600 dark:bg-white absolute top-1 left-1 dark:left-7 transition-all flex items-center justify-center">
                </div>
            </div>
        </button>

        <div class="flex items-center p-2 mb-3 rounded-xl bg-white dark:bg-slate-800 border border-slate-200 dark:border-slate-700 shadow-sm">
            <div class="relative">
                <img src="https://ui-avatars.com/api/?name={{ urlencode(auth()->user()->name) }}&background=6366f1&color=fff" class="w-10 h-10 rounded-lg object-cover">
                <div class="absolute -bottom-1 -right-1 w-3 h-3 bg-green-500 border-2 border-white dark:border-slate-800 rounded-full"></div>
            </div>
            <div class="ml-3 overflow-hidden">
                <p class="text-xs font-bold text-slate-700 dark:text-slate-200 truncate">{{ auth()->user()->name }}</p>
                <p class="text-[10px] text-slate-400 truncate tracking-tight">{{ auth()->user()->email }}</p>
            </div>
        </div>

        <form action="{{ route('admin.logout') }}" method="POST" x-ref="logoutForm" @submit.prevent="$dispatch('confirm-logout', $refs.logoutForm)">
            @csrf
            <button type="submit" class="w-full flex items-center justify-center py-2.5 rounded-lg bg-red-50 dark:bg-red-950/20 text-red-600 dark:text-red-400 hover:bg-red-600 hover:text-white dark:hover:bg-red-500 dark:hover:text-white transition-all duration-300 text-[11px] font-black uppercase tracking-widest border border-red-100 dark:border-red-900/30">
                <i class="fas fa-power-off mr-2"></i> Keluar Aplikasi
            </button>
        </form>
    </div>
</aside>