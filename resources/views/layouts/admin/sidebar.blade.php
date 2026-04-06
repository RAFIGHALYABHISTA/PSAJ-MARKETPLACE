<aside class="fixed lg:static inset-y-0 left-0 z-40 bg-white dark:bg-slate-900 text-slate-800 shrink-0 flex flex-col h-screen border-r border-gray-200 dark:border-slate-800 transition-all duration-300 ease-in-out transform shadow-lg overflow-hidden" 
      :class="$store.sidebar.sidebarOpen ? 'w-64 translate-x-0' : 'w-16 -translate-x-full lg:translate-x-0'">
    
    <div class="p-4 h-20 flex items-center border-b border-gray-100 dark:border-slate-800">
        <div class="flex items-center" :class="$store.sidebar.sidebarOpen ? 'space-x-3' : ''">
            <div class="w-8 h-8 bg-indigo-600 rounded flex items-center justify-center text-white font-bold text-sm shrink-0">D</div>
            <h2 x-show="$store.sidebar.sidebarOpen" x-transition:enter="transition-opacity ease-linear duration-300" 
                x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
                class="text-lg font-bold tracking-tight dark:text-white whitespace-nowrap">Beauty X <span class="text-indigo-600"></span></h2>
        </div>
    </div>
    
    <!-- Toggle Button - Tengah sisi kanan sidebar -->
    <button @click="$store.sidebar.sidebarOpen = !$store.sidebar.sidebarOpen" 
            class="hidden lg:flex items-center justify-center w-6 h-6 rounded-full text-slate-400 hover:text-indigo-600 hover:bg-indigo-50 dark:hover:bg-slate-800 transition-all duration-200 group absolute right-2 top-1/2 -translate-y-1/2 shrink-0 border border-gray-200 dark:border-slate-700 z-10">
        <i class="fas text-xs transition-transform duration-200 group-hover:scale-110" 
           :class="$store.sidebar.sidebarOpen ? 'fa-chevron-right' : 'fa-chevron-left'"></i>
    </button>

    <nav class="flex-1 p-2 space-y-1 overflow-y-auto scrollbar-thin scrollbar-thumb-slate-300 dark:scrollbar-thumb-slate-600 scrollbar-track-slate-100 dark:scrollbar-track-slate-800 relative">
        <p x-show="$store.sidebar.sidebarOpen" class="text-[10px] font-bold text-gray-400 uppercase tracking-widest px-3 py-4">Menu Utama</p>
        
        <a href="{{ route('admin.dashboard') }}" 
           class="flex items-center px-3 py-2.5 rounded-lg transition-all duration-200 group {{ request()->routeIs('admin.dashboard') ? 'bg-indigo-50 text-indigo-700 dark:bg-indigo-900/30 dark:text-indigo-400 shadow-sm' : 'text-slate-600 hover:bg-gray-50 dark:text-slate-400 dark:hover:bg-slate-800 hover:shadow-sm' }}"
           :title="$store.sidebar.sidebarOpen ? '' : 'Dashboard'">
            <i class="fas fa-th-large w-5 {{ request()->routeIs('admin.dashboard') ? 'text-indigo-600' : 'text-gray-400 group-hover:text-slate-600' }} transition-all duration-200" :class="$store.sidebar.sidebarOpen ? 'mr-3' : ''"></i>
            <span x-show="$store.sidebar.sidebarOpen" x-transition:enter="transition-opacity ease-linear duration-200" 
                  x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
                  class="text-sm font-medium whitespace-nowrap">Dashboard</span>
        </a>
        
        <a href="{{ route('admin.afiliator') }}" 
           class="flex items-center px-3 py-2.5 rounded transition-colors group {{ request()->routeIs('admin.afiliator') ? 'bg-indigo-50 text-indigo-700 dark:bg-indigo-900/30 dark:text-indigo-400' : 'text-slate-600 hover:bg-gray-50 dark:text-slate-400 dark:hover:bg-slate-800' }}"
           :title="$store.sidebar.sidebarOpen ? '' : 'Data Afiliator'">
            <i class="fas fa-users w-5 {{ request()->routeIs('admin.afiliator') ? 'text-indigo-600' : 'text-gray-400 group-hover:text-slate-600' }}" :class="$store.sidebar.sidebarOpen ? 'mr-3' : ''"></i>
            <span x-show="$store.sidebar.sidebarOpen" class="text-sm font-medium whitespace-nowrap">Data Afiliator</span>
        </a>

        <a href="{{ route('admin.katalog-produk') }}" 
           class="flex items-center px-3 py-2.5 rounded transition-colors group {{ request()->routeIs('admin.katalog-produk') ? 'bg-indigo-50 text-indigo-700 dark:bg-indigo-900/30 dark:text-indigo-400' : 'text-slate-600 hover:bg-gray-50 dark:text-slate-400 dark:hover:bg-slate-800' }}"
           :title="$store.sidebar.sidebarOpen ? '' : 'Katalog Produk'">
            <i class="fas fa-image w-5 {{ request()->routeIs('admin.katalog-produk') ? 'text-indigo-600' : 'text-gray-400 group-hover:text-slate-600' }}" :class="$store.sidebar.sidebarOpen ? 'mr-3' : ''"></i>
            <span x-show="$store.sidebar.sidebarOpen" class="text-sm font-medium whitespace-nowrap">Katalog Produk</span>
        </a>

        <a href="{{ route('admin.manajemen-produk') }}" 
           class="flex items-center px-3 py-2.5 rounded transition-colors group {{ request()->routeIs('admin.manajemen-produk') ? 'bg-indigo-50 text-indigo-700 dark:bg-indigo-900/30 dark:text-indigo-400' : 'text-slate-600 hover:bg-gray-50 dark:text-slate-400 dark:hover:bg-slate-800' }}"
           :title="$store.sidebar.sidebarOpen ? '' : 'Manajemen Produk'">
            <i class="fas fa-sliders-h w-5 {{ request()->routeIs('admin.manajemen-produk') ? 'text-indigo-600' : 'text-gray-400 group-hover:text-slate-600' }}" :class="$store.sidebar.sidebarOpen ? 'mr-3' : ''"></i>
            <span x-show="$store.sidebar.sidebarOpen" class="text-sm font-medium whitespace-nowrap">Manajemen Produk</span>
        </a>
    
        <a href="{{ route('admin.transaksi-qris') }}" 
           class="flex items-center px-3 py-2.5 rounded transition-colors group {{ request()->routeIs('admin.transaksi-qris') ? 'bg-indigo-50 text-indigo-700 dark:bg-indigo-900/30 dark:text-indigo-400' : 'text-slate-600 hover:bg-gray-50 dark:text-slate-400 dark:hover:bg-slate-800' }}"
           :title="$store.sidebar.sidebarOpen ? '' : 'Transaksi Penjualan'">
            <i class="fas fa-credit-card w-5 {{ request()->routeIs('admin.transaksi-qris') ? 'text-indigo-600' : 'text-gray-400 group-hover:text-slate-600' }}" :class="$store.sidebar.sidebarOpen ? 'mr-3' : ''"></i>
            <span x-show="$store.sidebar.sidebarOpen" class="text-sm font-medium whitespace-nowrap">Transaksi Penjualan</span>
        </a>

        <div x-show="$store.sidebar.sidebarOpen" class="my-4 border-t border-gray-100 dark:border-slate-800"></div>
        <p x-show="$store.sidebar.sidebarOpen" class="text-[10px] font-bold text-gray-400 uppercase tracking-widest px-3 py-4">Keuangan</p>

        <a href="{{ route('admin.rekap-penjualan') }}" 
           class="flex items-center px-3 py-2.5 rounded transition-colors group {{ request()->routeIs('admin.pencairan') ? 'bg-indigo-50 text-indigo-700 dark:bg-indigo-900/30 dark:text-indigo-400' : 'text-slate-600 hover:bg-gray-50 dark:text-slate-400 dark:hover:bg-slate-800' }}"
           :title="$store.sidebar.sidebarOpen ? '' : 'Laporan Keuangan'">
            <i class="fas fa-wallet w-5 text-gray-400 group-hover:text-slate-600" :class="$store.sidebar.sidebarOpen ? 'mr-3' : ''"></i>
            <span x-show="$store.sidebar.sidebarOpen" class="text-sm font-medium whitespace-nowrap">Laporan Keuangan</span>
        </a>
        <a href="{{ route('admin.pencairan') }}" 
           class="flex items-center px-3 py-2.5 rounded transition-colors group {{ request()->routeIs('admin.pencairan') ? 'bg-indigo-50 text-indigo-700 dark:bg-indigo-900/30 dark:text-indigo-400' : 'text-slate-600 hover:bg-gray-50 dark:text-slate-400 dark:hover:bg-slate-800' }}"
           :title="$store.sidebar.sidebarOpen ? '' : 'Pencairan'">
            <i class="fas fa-wallet w-5 text-gray-400 group-hover:text-slate-600" :class="$store.sidebar.sidebarOpen ? 'mr-3' : ''"></i>
            <span x-show="$store.sidebar.sidebarOpen" class="text-sm font-medium whitespace-nowrap">Pencairan</span>
        </a>

        <a href="{{ route('admin.pengaturan-komisi') }}" 
           class="flex items-center px-3 py-2.5 rounded transition-colors group {{ request()->routeIs('admin.pengaturan-komisi') ? 'bg-indigo-50 text-indigo-700 dark:bg-indigo-900/30 dark:text-indigo-400' : 'text-slate-600 hover:bg-gray-50 dark:text-slate-400 dark:hover:bg-slate-800' }}"
           :title="$store.sidebar.sidebarOpen ? '' : 'Pengaturan'">
            <i class="fas fa-cog w-5 text-gray-400 group-hover:text-slate-600" :class="$store.sidebar.sidebarOpen ? 'mr-3' : ''"></i>
            <span x-show="$store.sidebar.sidebarOpen" class="text-sm font-medium whitespace-nowrap">Pengaturan</span>
        </a>
    </nav>

    <div class="p-4 border-t border-gray-100 dark:border-slate-800 bg-gray-50/50 dark:bg-slate-900/50">
        <div class="flex items-center mb-4">
            <img src="https://ui-avatars.com/api/?name={{ urlencode(auth()->user()->name) }}&background=6366f1&color=fff" class="w-9 h-9 rounded">
            <div x-show="$store.sidebar.sidebarOpen" class="ml-3 overflow-hidden">
                <p class="text-sm font-bold text-slate-700 dark:text-white truncate">{{ auth()->user()->name }}</p>
                <p class="text-xs text-slate-400 truncate">{{ auth()->user()->email }}</p>
            </div>
        </div>
        <form action="{{ route('admin.logout') }}" method="POST">
            @csrf
            <button type="submit" class="w-full flex items-center justify-center py-2 border border-red-200 text-red-600 rounded hover:bg-red-600 hover:text-white transition-all text-xs font-bold uppercase tracking-tighter"
                    :class="$store.sidebar.sidebarOpen ? '' : 'px-2'">
                <i class="fas fa-sign-out-alt" :class="$store.sidebar.sidebarOpen ? 'mr-2' : ''"></i>
                <span x-show="$store.sidebar.sidebarOpen">Logout</span>
            </button>
        </form>
    </div>
</aside>