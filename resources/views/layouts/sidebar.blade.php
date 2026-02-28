<aside class="w-64 bg-white dark:bg-slate-900 text-slate-800 flex-shrink-0 hidden md:flex flex-col h-screen sticky top-0 border-r border-gray-200 dark:border-slate-800 transition-colors duration-300">
    
    <div class="p-6 h-20 flex items-center border-b border-gray-100 dark:border-slate-800">
        <div class="flex items-center space-x-3">
            <div class="w-8 h-8 bg-indigo-600 rounded flex items-center justify-center text-white font-bold text-sm">D</div>
            <h2 class="text-lg font-bold tracking-tight dark:text-white">Dashboard <span class="text-indigo-600">Smega</span></h2>
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

        <a href="{{ route('admin.produk') }}" 
           class="flex items-center px-3 py-2.5 rounded transition-colors group {{ request()->routeIs('admin.produk') ? 'bg-indigo-50 text-indigo-700 dark:bg-indigo-900/30 dark:text-indigo-400' : 'text-slate-600 hover:bg-gray-50 dark:text-slate-400 dark:hover:bg-slate-800' }}">
            <i class="fas fa-box w-5 mr-3 {{ request()->routeIs('admin.produk') ? 'text-indigo-600' : 'text-gray-400 group-hover:text-slate-600' }}"></i>
            <span class="text-sm font-medium">Produk</span>
        </a>

        <a href="{{ route('admin.transaksi-qris') }}" 
           class="flex items-center px-3 py-2.5 rounded transition-colors group {{ request()->routeIs('admin.transaksi-qris') ? 'bg-indigo-50 text-indigo-700 dark:bg-indigo-900/30 dark:text-indigo-400' : 'text-slate-600 hover:bg-gray-50 dark:text-slate-400 dark:hover:bg-slate-800' }}">
            <i class="fas fa-credit-card w-5 mr-3 {{ request()->routeIs('admin.transaksi-qris') ? 'text-indigo-600' : 'text-gray-400 group-hover:text-slate-600' }}"></i>
            <span class="text-sm font-medium">Transaksi QRIS</span>
        </a>

        <div class="my-4 border-t border-gray-100 dark:border-slate-800"></div>
        <p class="text-[10px] font-bold text-gray-400 uppercase tracking-widest px-3 py-4">Keuangan</p>

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
        <div class="flex items-center mb-4">
            <img src="https://ui-avatars.com/api/?name={{ urlencode(auth()->user()->name) }}&background=6366f1&color=fff" class="w-9 h-9 rounded">
            <div class="ml-3 overflow-hidden">
                <p class="text-sm font-bold text-slate-700 dark:text-white truncate">{{ auth()->user()->name }}</p>
                <p class="text-xs text-slate-400 truncate">{{ auth()->user()->email }}</p>
            </div>
        </div>
        <form action="{{ route('admin.logout') }}" method="POST">
            @csrf
            <button type="submit" class="w-full flex items-center justify-center py-2 border border-red-200 text-red-600 rounded hover:bg-red-600 hover:text-white transition-all text-xs font-bold uppercase tracking-tighter">
                Logout
            </button>
        </form>
    </div>
</aside>