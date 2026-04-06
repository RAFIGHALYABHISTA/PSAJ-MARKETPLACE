<!DOCTYPE html>
<html lang="id" x-data="{ darkMode: localStorage.getItem('dark') === 'true' }" :class="darkMode && 'dark'">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Admin Dashboard | Sariayu x Smega</title>
        @vite('resources/css/app.css')
        @vite('resources/js/app.js')
        <script src="https://unpkg.com/alpinejs" defer></script>
        <script>
            document.addEventListener('alpine:init', () => {
                Alpine.store('sidebar', {
                    sidebarOpen: true,
                    toggle() {
                        this.sidebarOpen = !this.sidebarOpen
                    }
                })
            })
        </script>
        <script>tailwind.config = { darkMode: 'class' }</script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />
    </head>
    <body class="bg-slate-50 dark:bg-slate-950">
        <div class="flex h-screen bg-slate-50 dark:bg-slate-950">
            {{-- Mobile Sidebar Overlay --}}
            <div x-show="$store.sidebar.sidebarOpen" x-transition:enter="transition-opacity ease-linear duration-300" 
                 x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
                 x-transition:leave="transition-opacity ease-linear duration-300" 
                 x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
                 class="fixed inset-0 bg-gray-600 bg-opacity-75 lg:hidden z-30"
                 @click="$store.sidebar.sidebarOpen = false"></div>
            
            {{-- Sidebar --}}
            <div class="shrink-0">
                @include('layouts.admin.sidebar')
            </div>
            
            {{-- Main Content --}}
            <main class="flex-1 overflow-auto relative" :class="$store.sidebar.sidebarOpen ? 'lg:ml-0' : 'lg:ml-0'">
                {{-- Mobile Menu Toggle --}}
                <button @click="$store.sidebar.toggle()" 
                        class="lg:hidden fixed top-4 left-4 z-50 flex items-center justify-center w-8 h-8 rounded-lg bg-white dark:bg-slate-900 border border-gray-200 dark:border-slate-800 text-slate-600 dark:text-slate-400 hover:text-indigo-600 dark:hover:text-indigo-400 hover:bg-indigo-50 dark:hover:bg-slate-800 transition-all duration-200 group">
                    <i class="fas text-sm transition-transform duration-200 group-hover:scale-110 fa-bars"></i>
                </button>
                
                @yield('content')
            </main>
        </div>
    </body>
</html>
