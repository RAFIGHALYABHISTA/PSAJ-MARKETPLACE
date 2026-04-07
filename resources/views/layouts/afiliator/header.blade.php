<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Affiliate Dashboard - Sariayu Style</title>
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
                <a href="{{ route('afiliator.dashboard') }}" class="flex items-center px-4 py-3 text-sm font-medium rounded-lg text-brand-olive hover:bg-brand-cream transition-colors">
                    Dashboard
                </a>
                <a href="{{ route('afiliator.sales-history') }}" class="flex items-center px-4 py-3 text-sm font-medium rounded-lg text-brand-olive hover:bg-brand-cream transition-colors">
                    Riwayat Penjualan
                </a>
                <a href="{{ route('afiliator.commissions') }}" class="flex items-center px-4 py-3 text-sm font-medium rounded-lg text-brand-olive hover:bg-brand-cream transition-colors">
                    Komisi
                </a>
            </nav>
        </aside>

        <main class="flex-1">
            <header class="bg-white/80 backdrop-blur-md sticky top-0 z-10 p-4 border-b border-gray-100 flex justify-between items-center">
                <h2 class="text-lg font-semibold text-brand-olive">Selamat Datang, Partner</h2>
                <div class="w-10 h-10 rounded-full bg-brand-terracotta/20 flex items-center justify-center text-brand-terracotta">
                    <span class="font-bold">JD</span>
                </div>
            </header>

            <div class="p-8">
                @yield('content')
            </div>
        </main>
    </div>
</body>
</html>