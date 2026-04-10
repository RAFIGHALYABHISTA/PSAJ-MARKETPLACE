<!DOCTYPE html>
<html lang="id" x-data="{ darkMode: localStorage.getItem('dark') === 'true' }" :class="darkMode && 'dark'">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Admin Dashboard | Sariayu x Smega</title>
        @vite('resources/css/app.css')
        @vite('resources/js/app.js')
        <script src="https://unpkg.com/alpinejs" defer></script>
        <script>tailwind.config = { darkMode: 'class' }</script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />
    </head>
    <body class="bg-slate-50 dark:bg-slate-950">
        <div class="flex h-screen bg-slate-50 dark:bg-slate-950">
            {{-- Sidebar --}}
            @include('layouts.admin.sidebar')
            
            {{-- Main Content --}}
            <main class="flex-1 overflow-auto relative">
                {{-- Modern Toast Notifications --}}
                <div x-data="toastNotifications()" 
                     x-init="init()"
                     class="fixed top-6 right-6 z-50 space-y-4 w-[420px]">
                    
                    {{-- Success Toast --}}
                    @if(session('success'))
                    <div x-data="{ show: true, progress: 100 }"
                         x-show="show"
                         x-transition:enter="transition ease-out duration-500"
                         x-transition:enter-start="opacity-0 transform translate-x-full scale-95"
                         x-transition:enter-end="opacity-100 transform translate-x-0 scale-100"
                         x-transition:leave="transition ease-in duration-400"
                         x-transition:leave-start="opacity-100 transform translate-x-0 scale-100"
                         x-transition:leave-end="opacity-0 transform translate-x-full scale-95"
                         x-init="setTimeout(() => show = false, 5000); setInterval(() => progress -= 2, 100)"
                         class="relative bg-white dark:bg-slate-900 border-l-4 border-emerald-500 rounded-2xl shadow-2xl shadow-emerald-500/10 overflow-hidden">
                        <div class="p-4 flex items-start space-x-4">
                            <div class="flex-shrink-0 w-12 h-12 bg-gradient-to-br from-emerald-400 to-emerald-600 rounded-2xl flex items-center justify-center shadow-lg shadow-emerald-500/30">
                                <i class="fas fa-check text-white text-lg"></i>
                            </div>
                            <div class="flex-1 min-w-0 pt-1">
                                <p class="text-sm font-bold text-slate-800 dark:text-slate-100">Berhasil!</p>
                                <p class="text-xs text-slate-500 dark:text-slate-400 mt-1 leading-relaxed">{{ session('success') }}</p>
                            </div>
                            <button @click="show = false" class="text-slate-300 hover:text-slate-500 dark:hover:text-slate-400 transition p-1">
                                <i class="fas fa-times text-sm"></i>
                            </button>
                        </div>
                        <div class="h-1 bg-emerald-500/20">
                            <div class="h-full bg-gradient-to-r from-emerald-400 to-emerald-600 transition-all duration-100 ease-linear"
                                 :style="`width: ${progress}%`"></div>
                        </div>
                    </div>
                    @endif

                    {{-- Error Toast --}}
                    @if(session('error'))
                    <div x-data="{ show: true, progress: 100 }"
                         x-show="show"
                         x-transition:enter="transition ease-out duration-500"
                         x-transition:enter-start="opacity-0 transform translate-x-full scale-95"
                         x-transition:enter-end="opacity-100 transform translate-x-0 scale-100"
                         x-transition:leave="transition ease-in duration-400"
                         x-transition:leave-start="opacity-100 transform translate-x-0 scale-100"
                         x-transition:leave-end="opacity-0 transform translate-x-full scale-95"
                         x-init="setTimeout(() => show = false, 6000); setInterval(() => progress -= 1.67, 100)"
                         class="relative bg-white dark:bg-slate-900 border-l-4 border-rose-500 rounded-2xl shadow-2xl shadow-rose-500/10 overflow-hidden">
                        <div class="p-4 flex items-start space-x-4">
                            <div class="flex-shrink-0 w-12 h-12 bg-gradient-to-br from-rose-400 to-rose-600 rounded-2xl flex items-center justify-center shadow-lg shadow-rose-500/30">
                                <i class="fas fa-exclamation-circle text-white text-lg"></i>
                            </div>
                            <div class="flex-1 min-w-0 pt-1">
                                <p class="text-sm font-bold text-slate-800 dark:text-slate-100">Terjadi Kesalahan!</p>
                                <p class="text-xs text-slate-500 dark:text-slate-400 mt-1 leading-relaxed">{{ session('error') }}</p>
                            </div>
                            <button @click="show = false" class="text-slate-300 hover:text-slate-500 dark:hover:text-slate-400 transition p-1">
                                <i class="fas fa-times text-sm"></i>
                            </button>
                        </div>
                        <div class="h-1 bg-rose-500/20">
                            <div class="h-full bg-gradient-to-r from-rose-400 to-rose-600 transition-all duration-100 ease-linear"
                                 :style="`width: ${progress}%`"></div>
                        </div>
                    </div>
                    @endif

                    {{-- Warning Toast --}}
                    @if(session('warning'))
                    <div x-data="{ show: true, progress: 100 }"
                         x-show="show"
                         x-transition:enter="transition ease-out duration-500"
                         x-transition:enter-start="opacity-0 transform translate-x-full scale-95"
                         x-transition:enter-end="opacity-100 transform translate-x-0 scale-100"
                         x-transition:leave="transition ease-in duration-400"
                         x-transition:leave-start="opacity-100 transform translate-x-0 scale-100"
                         x-transition:leave-end="opacity-0 transform translate-x-full scale-95"
                         x-init="setTimeout(() => show = false, 5500); setInterval(() => progress -= 1.82, 100)"
                         class="relative bg-white dark:bg-slate-900 border-l-4 border-amber-500 rounded-2xl shadow-2xl shadow-amber-500/10 overflow-hidden">
                        <div class="p-4 flex items-start space-x-4">
                            <div class="flex-shrink-0 w-12 h-12 bg-gradient-to-br from-amber-400 to-amber-600 rounded-2xl flex items-center justify-center shadow-lg shadow-amber-500/30">
                                <i class="fas fa-exclamation-triangle text-white text-lg"></i>
                            </div>
                            <div class="flex-1 min-w-0 pt-1">
                                <p class="text-sm font-bold text-slate-800 dark:text-slate-100">Perhatian!</p>
                                <p class="text-xs text-slate-500 dark:text-slate-400 mt-1 leading-relaxed">{{ session('warning') }}</p>
                            </div>
                            <button @click="show = false" class="text-slate-300 hover:text-slate-500 dark:hover:text-slate-400 transition p-1">
                                <i class="fas fa-times text-sm"></i>
                            </button>
                        </div>
                        <div class="h-1 bg-amber-500/20">
                            <div class="h-full bg-gradient-to-r from-amber-400 to-amber-600 transition-all duration-100 ease-linear"
                                 :style="`width: ${progress}%`"></div>
                        </div>
                    </div>
                    @endif

                    {{-- Info Toast --}}
                    @if(session('info'))
                    <div x-data="{ show: true, progress: 100 }"
                         x-show="show"
                         x-transition:enter="transition ease-out duration-500"
                         x-transition:enter-start="opacity-0 transform translate-x-full scale-95"
                         x-transition:enter-end="opacity-100 transform translate-x-0 scale-100"
                         x-transition:leave="transition ease-in duration-400"
                         x-transition:leave-start="opacity-100 transform translate-x-0 scale-100"
                         x-transition:leave-end="opacity-0 transform translate-x-full scale-95"
                         x-init="setTimeout(() => show = false, 5000); setInterval(() => progress -= 2, 100)"
                         class="relative bg-white dark:bg-slate-900 border-l-4 border-indigo-500 rounded-2xl shadow-2xl shadow-indigo-500/10 overflow-hidden">
                        <div class="p-4 flex items-start space-x-4">
                            <div class="flex-shrink-0 w-12 h-12 bg-gradient-to-br from-indigo-400 to-indigo-600 rounded-2xl flex items-center justify-center shadow-lg shadow-indigo-500/30">
                                <i class="fas fa-info-circle text-white text-lg"></i>
                            </div>
                            <div class="flex-1 min-w-0 pt-1">
                                <p class="text-sm font-bold text-slate-800 dark:text-slate-100">Informasi</p>
                                <p class="text-xs text-slate-500 dark:text-slate-400 mt-1 leading-relaxed">{{ session('info') }}</p>
                            </div>
                            <button @click="show = false" class="text-slate-300 hover:text-slate-500 dark:hover:text-slate-400 transition p-1">
                                <i class="fas fa-times text-sm"></i>
                            </button>
                        </div>
                        <div class="h-1 bg-indigo-500/20">
                            <div class="h-full bg-gradient-to-r from-indigo-400 to-indigo-600 transition-all duration-100 ease-linear"
                                 :style="`width: ${progress}%`"></div>
                        </div>
                    </div>
                    @endif
                </div>

                @yield('content')
            </main>
        </div>

        {{-- Modern Delete Confirmation Modal --}}
        <div x-data="{ show: false, form: null }"
             @confirm-delete.window="show = true; form = $event.detail;"
             x-show="show"
             x-cloak
             class="fixed inset-0 z-50 flex items-center justify-center p-4"
             style="display: none;">
            <div x-show="show"
                 x-transition:enter="transition ease-out duration-300"
                 x-transition:enter-start="opacity-0"
                 x-transition:enter-end="opacity-100"
                 x-transition:leave="transition ease-in duration-200"
                 x-transition:leave-start="opacity-100"
                 x-transition:leave-end="opacity-0"
                 class="absolute inset-0 bg-slate-950/60 backdrop-blur-sm"
                 @click="show = false">
            </div>
            
            <div x-show="show"
                 x-transition:enter="transition ease-out duration-400"
                 x-transition:enter-start="opacity-0 transform scale-95 translate-y-4"
                 x-transition:enter-end="opacity-100 transform scale-100 translate-y-0"
                 x-transition:leave="transition ease-in duration-300"
                 x-transition:leave-start="opacity-100 transform scale-100 translate-y-0"
                 x-transition:leave-end="opacity-0 transform scale-95 translate-y-4"
                 class="bg-white dark:bg-slate-900 rounded-3xl shadow-2xl w-full max-w-sm relative z-10 overflow-hidden">
                <div class="p-8 text-center">
                    <div class="w-20 h-20 bg-gradient-to-br from-rose-100 to-rose-200 dark:from-rose-900/40 dark:to-rose-800/30 rounded-3xl flex items-center justify-center mx-auto mb-5 shadow-lg shadow-rose-500/20">
                        <i class="fas fa-trash-alt text-rose-500 text-3xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-slate-800 dark:text-white mb-2">Hapus Data?</h3>
                    <p class="text-sm text-slate-500 dark:text-slate-400 mb-8 leading-relaxed">Data yang dihapus tidak dapat dikembalikan. Apakah Anda yakin melanjutkan?</p>
                    
                    <div class="flex space-x-3">
                        <button @click="show = false" 
                                class="flex-1 px-5 py-3 bg-slate-100 dark:bg-slate-800 text-slate-600 dark:text-slate-300 rounded-2xl text-sm font-semibold hover:bg-slate-200 dark:hover:bg-slate-700 transition-all active:scale-95">
                            Batal
                        </button>
                        <button @click="form && form.submit(); show = false;" 
                                class="flex-1 px-5 py-3 bg-gradient-to-r from-rose-500 to-rose-600 text-white rounded-2xl text-sm font-semibold shadow-lg shadow-rose-500/25 hover:shadow-rose-500/40 hover:from-rose-600 hover:to-rose-700 transition-all active:scale-95">
                            Hapus
                        </button>
                    </div>
                </div>
                <div class="h-1.5 bg-rose-500"></div>
            </div>
        </div>

        {{-- Modern Logout Confirmation Modal --}}
        <div x-data="{ show: false, form: null }"
             @confirm-logout.window="show = true; form = $event.detail;"
             x-show="show"
             x-cloak
             class="fixed inset-0 z-50 flex items-center justify-center p-4"
             style="display: none;">
            <div x-show="show"
                 x-transition:enter="transition ease-out duration-300"
                 x-transition:enter-start="opacity-0"
                 x-transition:enter-end="opacity-100"
                 x-transition:leave="transition ease-in duration-200"
                 x-transition:leave-start="opacity-100"
                 x-transition:leave-end="opacity-0"
                 class="absolute inset-0 bg-slate-950/60 backdrop-blur-sm"
                 @click="show = false">
            </div>
            
            <div x-show="show"
                 x-transition:enter="transition ease-out duration-400"
                 x-transition:enter-start="opacity-0 transform scale-95 translate-y-4"
                 x-transition:enter-end="opacity-100 transform scale-100 translate-y-0"
                 x-transition:leave="transition ease-in duration-300"
                 x-transition:leave-start="opacity-100 transform scale-100 translate-y-0"
                 x-transition:leave-end="opacity-0 transform scale-95 translate-y-4"
                 class="bg-white dark:bg-slate-900 rounded-3xl shadow-2xl w-full max-w-sm relative z-10 overflow-hidden">
                <div class="p-8 text-center">
                    <div class="w-20 h-20 bg-gradient-to-br from-amber-100 to-amber-200 dark:from-amber-900/40 dark:to-amber-800/30 rounded-3xl flex items-center justify-center mx-auto mb-5 shadow-lg shadow-amber-500/20">
                        <i class="fas fa-sign-out-alt text-amber-500 text-3xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-slate-800 dark:text-white mb-2">Keluar?</h3>
                    <p class="text-sm text-slate-500 dark:text-slate-400 mb-8 leading-relaxed">Anda akan logout dari dashboard admin. Sesi aktif akan berakhir.</p>
                    
                    <div class="flex space-x-3">
                        <button @click="show = false" 
                                class="flex-1 px-5 py-3 bg-slate-100 dark:bg-slate-800 text-slate-600 dark:text-slate-300 rounded-2xl text-sm font-semibold hover:bg-slate-200 dark:hover:bg-slate-700 transition-all active:scale-95">
                            Tetap Di Sini
                        </button>
                        <button @click="form && form.submit(); show = false;" 
                                class="flex-1 px-5 py-3 bg-gradient-to-r from-amber-500 to-amber-600 text-white rounded-2xl text-sm font-semibold shadow-lg shadow-amber-500/25 hover:shadow-amber-500/40 hover:from-amber-600 hover:to-amber-700 transition-all active:scale-95">
                            Ya, Keluar
                        </button>
                    </div>
                </div>
                <div class="h-1.5 bg-amber-500"></div>
            </div>
        </div>

        <script>
            function toastNotifications() {
                return {
                    init() {
                        // Auto-hide toasts after 5 seconds
                    }
                }
            }
        </script>
    </body>
</html>
