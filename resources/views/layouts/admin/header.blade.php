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
                {{-- Toast Notifications --}}
                <div x-data="toastNotifications()" 
                     x-init="init()"
                     class="fixed top-4 right-4 z-50 space-y-3 w-96">
                    
                    {{-- Success Toast --}}
                    @if(session('success'))
                    <div x-data="{ show: true }"
                         x-show="show"
                         x-transition:enter="transition ease-out duration-300"
                         x-transition:enter-start="opacity-0 transform translate-x-8"
                         x-transition:enter-end="opacity-100 transform translate-x-0"
                         x-transition:leave="transition ease-in duration-300"
                         x-transition:leave-start="opacity-100 transform translate-x-0"
                         x-transition:leave-end="opacity-0 transform translate-x-8"
                         x-init="setTimeout(() => show = false, 5000)"
                         class="bg-emerald-50 dark:bg-emerald-900/20 border border-emerald-200 dark:border-emerald-800 rounded-xl shadow-lg p-4 flex items-start space-x-3">
                        <div class="flex-shrink-0 w-10 h-10 bg-emerald-100 dark:bg-emerald-800/50 rounded-full flex items-center justify-center">
                            <i class="fas fa-check text-emerald-600 dark:text-emerald-400 text-lg"></i>
                        </div>
                        <div class="flex-1 min-w-0">
                            <p class="text-sm font-bold text-emerald-800 dark:text-emerald-300">Berhasil!</p>
                            <p class="text-xs text-emerald-600 dark:text-emerald-400 mt-1">{{ session('success') }}</p>
                        </div>
                        <button @click="show = false" class="text-emerald-400 hover:text-emerald-600 transition">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                    @endif

                    {{-- Error Toast --}}
                    @if(session('error'))
                    <div x-data="{ show: true }"
                         x-show="show"
                         x-transition:enter="transition ease-out duration-300"
                         x-transition:enter-start="opacity-0 transform translate-x-8"
                         x-transition:enter-end="opacity-100 transform translate-x-0"
                         x-transition:leave="transition ease-in duration-300"
                         x-transition:leave-start="opacity-100 transform translate-x-0"
                         x-transition:leave-end="opacity-0 transform translate-x-8"
                         x-init="setTimeout(() => show = false, 5000)"
                         class="bg-rose-50 dark:bg-rose-900/20 border border-rose-200 dark:border-rose-800 rounded-xl shadow-lg p-4 flex items-start space-x-3">
                        <div class="flex-shrink-0 w-10 h-10 bg-rose-100 dark:bg-rose-800/50 rounded-full flex items-center justify-center">
                            <i class="fas fa-exclamation-circle text-rose-600 dark:text-rose-400 text-lg"></i>
                        </div>
                        <div class="flex-1 min-w-0">
                            <p class="text-sm font-bold text-rose-800 dark:text-rose-300">Terjadi Kesalahan!</p>
                            <p class="text-xs text-rose-600 dark:text-rose-400 mt-1">{{ session('error') }}</p>
                        </div>
                        <button @click="show = false" class="text-rose-400 hover:text-rose-600 transition">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                    @endif

                    {{-- Warning Toast --}}
                    @if(session('warning'))
                    <div x-data="{ show: true }"
                         x-show="show"
                         x-transition:enter="transition ease-out duration-300"
                         x-transition:enter-start="opacity-0 transform translate-x-8"
                         x-transition:enter-end="opacity-100 transform translate-x-0"
                         x-transition:leave="transition ease-in duration-300"
                         x-transition:leave-start="opacity-100 transform translate-x-0"
                         x-transition:leave-end="opacity-0 transform translate-x-8"
                         x-init="setTimeout(() => show = false, 5000)"
                         class="bg-amber-50 dark:bg-amber-900/20 border border-amber-200 dark:border-amber-800 rounded-xl shadow-lg p-4 flex items-start space-x-3">
                        <div class="flex-shrink-0 w-10 h-10 bg-amber-100 dark:bg-amber-800/50 rounded-full flex items-center justify-center">
                            <i class="fas fa-exclamation-triangle text-amber-600 dark:text-amber-400 text-lg"></i>
                        </div>
                        <div class="flex-1 min-w-0">
                            <p class="text-sm font-bold text-amber-800 dark:text-amber-300">Perhatian!</p>
                            <p class="text-xs text-amber-600 dark:text-amber-400 mt-1">{{ session('warning') }}</p>
                        </div>
                        <button @click="show = false" class="text-amber-400 hover:text-amber-600 transition">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                    @endif

                    {{-- Info Toast --}}
                    @if(session('info'))
                    <div x-data="{ show: true }"
                         x-show="show"
                         x-transition:enter="transition ease-out duration-300"
                         x-transition:enter-start="opacity-0 transform translate-x-8"
                         x-transition:enter-end="opacity-100 transform translate-x-0"
                         x-transition:leave="transition ease-in duration-300"
                         x-transition:leave-start="opacity-100 transform translate-x-0"
                         x-transition:leave-end="opacity-0 transform translate-x-8"
                         x-init="setTimeout(() => show = false, 5000)"
                         class="bg-indigo-50 dark:bg-indigo-900/20 border border-indigo-200 dark:border-indigo-800 rounded-xl shadow-lg p-4 flex items-start space-x-3">
                        <div class="flex-shrink-0 w-10 h-10 bg-indigo-100 dark:bg-indigo-800/50 rounded-full flex items-center justify-center">
                            <i class="fas fa-info-circle text-indigo-600 dark:text-indigo-400 text-lg"></i>
                        </div>
                        <div class="flex-1 min-w-0">
                            <p class="text-sm font-bold text-indigo-800 dark:text-indigo-300">Informasi</p>
                            <p class="text-xs text-indigo-600 dark:text-indigo-400 mt-1">{{ session('info') }}</p>
                        </div>
                        <button @click="show = false" class="text-indigo-400 hover:text-indigo-600 transition">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                    @endif
                </div>

                @yield('content')
            </main>
        </div>

        {{-- Delete Confirmation Modal --}}
        <div x-data="{ show: false, form: null }"
             @confirm-delete.window="show = true; form = $event.detail;"
             x-show="show"
             x-cloak
             class="fixed inset-0 z-50 flex items-center justify-center"
             style="display: none;">
            <div x-show="show"
                 x-transition:enter="transition ease-out duration-300"
                 x-transition:enter-start="opacity-0"
                 x-transition:enter-end="opacity-100"
                 x-transition:leave="transition ease-in duration-200"
                 x-transition:leave-start="opacity-100"
                 x-transition:leave-end="opacity-0"
                 class="absolute inset-0 bg-black/50 backdrop-blur-sm"
                 @click="show = false">
            </div>
            
            <div x-show="show"
                 x-transition:enter="transition ease-out duration-300"
                 x-transition:enter-start="opacity-0 transform scale-95"
                 x-transition:enter-end="opacity-100 transform scale-100"
                 x-transition:leave="transition ease-in duration-200"
                 x-transition:leave-start="opacity-100 transform scale-100"
                 x-transition:leave-end="opacity-0 transform scale-95"
                 class="bg-white dark:bg-slate-900 rounded-2xl shadow-2xl p-6 w-full max-w-md mx-4 relative z-10">
                <div class="text-center">
                    <div class="w-16 h-16 bg-rose-100 dark:bg-rose-900/30 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-trash-alt text-rose-500 text-2xl"></i>
                    </div>
                    <h3 class="text-lg font-bold text-slate-800 dark:text-white mb-2">Hapus Data?</h3>
                    <p class="text-sm text-slate-500 dark:text-slate-400 mb-6">Apakah Anda yakin ingin menghapus data ini? Tindakan ini tidak dapat dibatalkan.</p>
                    
                    <div class="flex space-x-3">
                        <button @click="show = false" 
                                class="flex-1 px-4 py-2.5 bg-slate-100 dark:bg-slate-800 text-slate-600 dark:text-slate-300 rounded-xl text-sm font-medium hover:bg-slate-200 dark:hover:bg-slate-700 transition">
                            Batal
                        </button>
                        <button @click="form && form.submit(); show = false;" 
                                class="flex-1 px-4 py-2.5 bg-rose-500 text-white rounded-xl text-sm font-medium hover:bg-rose-600 transition">
                            Ya, Hapus
                        </button>
                    </div>
                </div>
            </div>
        </div>

        {{-- Logout Confirmation Modal --}}
        <div x-data="{ show: false, form: null }"
             @confirm-logout.window="show = true; form = $event.detail;"
             x-show="show"
             x-cloak
             class="fixed inset-0 z-50 flex items-center justify-center"
             style="display: none;">
            <div x-show="show"
                 x-transition:enter="transition ease-out duration-300"
                 x-transition:enter-start="opacity-0"
                 x-transition:enter-end="opacity-100"
                 x-transition:leave="transition ease-in duration-200"
                 x-transition:leave-start="opacity-100"
                 x-transition:leave-end="opacity-0"
                 class="absolute inset-0 bg-black/50 backdrop-blur-sm"
                 @click="show = false">
            </div>
            
            <div x-show="show"
                 x-transition:enter="transition ease-out duration-300"
                 x-transition:enter-start="opacity-0 transform scale-95"
                 x-transition:enter-end="opacity-100 transform scale-100"
                 x-transition:leave="transition ease-in duration-200"
                 x-transition:leave-start="opacity-100 transform scale-100"
                 x-transition:leave-end="opacity-0 transform scale-95"
                 class="bg-white dark:bg-slate-900 rounded-2xl shadow-2xl p-6 w-full max-w-md mx-4 relative z-10">
                <div class="text-center">
                    <div class="w-16 h-16 bg-amber-100 dark:bg-amber-900/30 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-sign-out-alt text-amber-500 text-2xl"></i>
                    </div>
                    <h3 class="text-lg font-bold text-slate-800 dark:text-white mb-2">Keluar dari Sistem?</h3>
                    <p class="text-sm text-slate-500 dark:text-slate-400 mb-6">Apakah Anda yakin ingin logout dari dashboard admin?</p>
                    
                    <div class="flex space-x-3">
                        <button @click="show = false" 
                                class="flex-1 px-4 py-2.5 bg-slate-100 dark:bg-slate-800 text-slate-600 dark:text-slate-300 rounded-xl text-sm font-medium hover:bg-slate-200 dark:hover:bg-slate-700 transition">
                            Batal
                        </button>
                        <button @click="form && form.submit(); show = false;" 
                                class="flex-1 px-4 py-2.5 bg-amber-500 text-white rounded-xl text-sm font-medium hover:bg-amber-600 transition">
                            Ya, Logout
                        </button>
                    </div>
                </div>
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
