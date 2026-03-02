<aside class="w-64 bg-indigo-900 text-white flex-shrink-0 hidden md:flex flex-col h-screen sticky top-0">
    <div class="p-6 text-2xl font-bold border-b border-indigo-800 flex items-center">
        <span class="bg-yellow-400 text-indigo-900 p-1.5 rounded-lg mr-2 text-sm italic">S-S</span>
        Sariayu <span class="text-yellow-400 ml-1">Smega</span>
    </div>

    <nav class="flex-1 p-4 space-y-1 mt-4">
        <p class="text-xs font-semibold text-indigo-300 uppercase px-3 mb-2">Main Menu</p>
        
        <a href="{{ route('admin.dashboard') }}" class="flex items-center p-3 {{ request()->routeIs('admin.dashboard') ? 'bg-indigo-800' : 'hover:bg-indigo-800' }} rounded-lg text-white group transition">
            <i class="fas fa-th-large mr-3 text-yellow-400"></i> Dashboard
        </a>
        
        <a href="{{ route('admin.afiliator') }}" class="flex items-center p-3 {{ request()->routeIs('admin.afiliator') ? 'bg-indigo-800' : 'hover:bg-indigo-800' }} rounded-lg text-indigo-100 group transition">
            <i class="fas fa-users mr-3 text-indigo-400 group-hover:text-white"></i> Afiliator
        </a>

        <a href="{{ route('admin.produk') }}" class="flex items-center p-3 {{ request()->routeIs('admin.produk') ? 'bg-indigo-800' : 'hover:bg-indigo-800' }} rounded-lg text-indigo-100 group transition">
            <i class="fas fa-shopping-bag mr-3 text-indigo-400"></i> Produk
        </a>

        <a href="{{ route('admin.transaksi-qris') }}" class="flex items-center p-3 {{ request()->routeIs('admin.transaksi-qris') ? 'bg-indigo-800' : 'hover:bg-indigo-800' }} rounded-lg text-indigo-100 group transition">
            <i class="fas fa-file-invoice-dollar mr-3 text-indigo-400"></i> Transaksi QRIS
        </a>

        <div class="pt-4 mt-4 border-t border-indigo-800">
            <p class="text-xs font-semibold text-indigo-300 uppercase px-3 mb-2">Finance</p>
            <a href="{{ route('admin.pencairan') }}" class="flex items-center p-3 {{ request()->routeIs('admin.pencairan') ? 'bg-indigo-800' : 'hover:bg-indigo-800' }} rounded-lg text-indigo-100 group transition">
                <i class="fas fa-wallet mr-3 text-indigo-400"></i> Pencairan
            </a>
            <a href="{{ route('admin.pengaturan-komisi') }}" class="flex items-center p-3 {{ request()->routeIs('admin.pengaturan-komisi') ? 'bg-indigo-800' : 'hover:bg-indigo-800' }} rounded-lg text-indigo-100 group transition">
                <i class="fas fa-cog mr-3 text-indigo-400"></i> Pengaturan Komisi
            </a>
        </div>
    </nav>

    <div class="p-4 border-t border-indigo-800">
        <div class="flex items-center p-2">
            <img src="https://ui-avatars.com/api/?name=Admin+Smega&background=random" class="w-8 h-8 rounded-full">
            <div class="ml-3">
                <p class="text-sm font-medium">Super Admin</p>
                <p class="text-[10px] text-indigo-300">admin@smega.sch.id</p>
            </div>
        </div>
        <form action="{{ route('admin.logout') }}" method="POST">
            @csrf
            <button type="submit" class="w-full mt-3 flex items-center justify-center p-2 bg-red-500/10 text-red-400 rounded-lg hover:bg-red-500 hover:text-white transition text-sm">
                <i class="fas fa-sign-out-alt mr-2"></i> Keluar
            </button>
        </form>
    </div>
</aside>