<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Affiliate Dashboard - Sariayu Style</title>
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-brand-cream text-brand-text font-sans antialiased">
    <div class="min-h-screen flex">
        <aside class="w-64 bg-white border-r border-gray-200 hidden md:block sticky top-0 h-screen self-start overflow-y-auto">
            <div class="p-6">
                <h1 class="text-2xl font-serif text-brand-olive font-bold tracking-tight">SARIAYU</h1>
                <p class="text-[10px] uppercase tracking-widest text-gray-400">Affiliate Partner</p>
            </div>
            
            <nav class="mt-6 px-4 space-y-2">
                <a href="{{ route('afiliator.dashboard') }}" class="flex items-center px-4 py-3 text-sm font-medium rounded-lg {{ request()->routeIs('afiliator.dashboard') ? 'bg-brand-olive text-white shadow-md' : 'text-brand-olive hover:bg-brand-cream transition-colors' }}">
                    Dashboard
                </a>
                <a href="{{ route('afiliator.sales-history') }}" class="flex items-center px-4 py-3 text-sm font-medium rounded-lg {{ request()->routeIs('afiliator.sales-history') ? 'bg-brand-olive text-white shadow-md' : 'text-brand-olive hover:bg-brand-cream transition-colors' }}">
                    Riwayat Penjualan
                </a>
                <a href="{{ route('afiliator.commissions') }}" class="flex items-center px-4 py-3 text-sm font-medium rounded-lg {{ request()->routeIs('afiliator.commissions') ? 'bg-brand-olive text-white shadow-md' : 'text-brand-olive hover:bg-brand-cream transition-colors' }}">
                    Komisi
                </a>
            </nav>
        </aside>

        <main class="flex-1">
            <header class="bg-white/80 backdrop-blur-md sticky top-0 z-50 p-4 border-b border-gray-100 flex justify-between items-center">
                <h2 class="text-lg font-semibold text-brand-olive">Selamat Datang, Partner {{ auth()->user()->name }}</h2>
                
                <div x-data="{ open: false }" class="relative">
                    <button @click="open = !open" @click.outside="open = false" class="flex items-center focus:outline-none">
                        <img src="https://ui-avatars.com/api/?name={{ urlencode(auth()->user()->name) }}&background=738029&color=fff&size=80" 
                             class="w-10 h-10 rounded-full border-2 border-brand-cream hover:border-brand-olive transition-all shadow-sm">
                    </button>

                    <div x-show="open" 
                         x-transition:enter="transition ease-out duration-200"
                         x-transition:enter-start="opacity-0 scale-95"
                         x-transition:enter-end="opacity-100 scale-100"
                         x-transition:leave="transition ease-in duration-75"
                         x-transition:leave-start="opacity-100 scale-100"
                         x-transition:leave-end="opacity-0 scale-95"
                         class="absolute right-0 mt-2 w-64 bg-white dark:bg-slate-900 rounded-2xl shadow-xl border border-gray-100 dark:border-slate-800 p-6 z-50"
                         style="display: none;">
                        
                        <div class="text-center mb-6">
                            <img src="https://ui-avatars.com/api/?name={{ urlencode(auth()->user()->name) }}&background=738029&color=fff&size=80" 
                                 class="w-16 h-16 rounded-full mx-auto mb-4 border-4 border-brand-cream">
                            <h2 class="text-md font-bold text-slate-800 dark:text-white">{{ auth()->user()->name }}</h2>
                            <p class="text-xs text-slate-500 dark:text-slate-400">{{ auth()->user()->email }}</p>
                        </div>

                        <div class="border-t border-gray-100 dark:border-slate-800 pt-6 space-y-3">
                            @if(auth()->user()->role === 'affiliator')
                            <div class="pt-3">
                                <p class="text-[10px] font-bold text-slate-500 dark:text-slate-400 uppercase mb-3">Akses Cepat</p>
                                <a href="{{ route('home') }}" class="block px-4 py-2.5 bg-emerald-50 dark:bg-emerald-500/10 text-emerald-700 dark:text-emerald-400 rounded-lg text-xs font-bold hover:bg-emerald-100 transition text-center">
                                    <i class="fas fa-home mr-2"></i> Dashboard Customer
                                </a>
                            </div>
                            @endif 
                        </div>

                        <form action="{{ route('auth.logout') }}" method="POST" class="mt-6">
                            @csrf
                            <button type="submit" class="w-full px-4 py-2.5 bg-rose-500/10 hover:bg-rose-100 dark:hover:bg-rose-500/20 text-rose-600 dark:text-rose-400 rounded-lg text-xs font-bold transition text-center">
                                <i class="fas fa-sign-out-alt mr-2"></i> Logout
                            </button>
                        </form>
                    </div>
                </div>
            </header>

            <div class="p-8">
                @yield('content')
            </div>
        </main>
    </div>
</body>
</html>