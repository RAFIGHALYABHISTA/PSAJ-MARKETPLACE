@extends('layouts.auth')

@section('title', 'Register')

@section('content')
<div class="min-h-screen flex items-center justify-center p-6 transition-colors duration-300 bg-slate-50 dark:bg-slate-950">
        <a href="{{ url('/') }}"  class="absolute top-6 left-6 w-12 h-12 flex items-center justify-center rounded-full bg-white border border-stone-200 shadow-lg ">
    <!-- ICON BACK -->
        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 group-hover:-translate-x-0.5 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
        </svg>
    </a>

<!-- DEKORASI ATAS KANAN -->
<img src="{{ asset('images/kanan-atas.png') }}" class="absolute top-0 right-0 w-60 opacity-90 pointer-events-none select-none">
<!-- DEKORASI BAWAH KIRI -->
{{-- <img src="{{ asset('images/kiri-bawah.png') }}" class="absolute bottom-0 left-0 w-60 opacity-90 pointer-events-none select-none z-10"> --}}
    <div class="fixed top-6 right-6">
        <button @click="darkMode = !darkMode; localStorage.setItem('dark', darkMode)" 
                class="p-3 bg-white dark:bg-slate-800 rounded-2xl shadow-xl text-slate-600 dark:text-yellow-400 transition-all active:scale-90">
            <i class="fas" :class="darkMode ? 'fa-sun' : 'fa-moon'"></i>
        </button>
    </div>

    <div class="w-full max-w-[1100px] grid grid-cols-1 lg:grid-cols-2 bg-white dark:bg-slate-900 rounded-[2.5rem] shadow-2xl shadow-indigo-200/50 dark:shadow-none overflow-hidden border border-gray-100 dark:border-slate-800">
        
        <div class="hidden lg:flex flex-col justify-between p-12 bg-slate-100 dark:bg-slate-800/50 relative overflow-hidden text-white">
            <div class="absolute top-[-10%] right-[-10%] w-64 h-64  border-slate-200 dark:border-slate-700 rounded-full blur-3xl"></div>
            <div class="absolute bottom-[-5%] left-[-5%] w-48 h-48 border-slate-200 dark:border-slate-700 rounded-full opacity-50"></div>

                 <div class="relative z-10 flex justify-between items-center text-[10px] text-slate-400 dark:text-slate-500 uppercase tracking-[0.2em] font-mono">
                <span>Platform Kalibrasi</span>
                <span>v1.0 / 2026</span>
            </div>

            <div class="relative z-10 flex-1 flex flex-col items-center justify-center py-6">
                
                <img src="{{ asset('img/smk.png') }}" 
                     alt="Sariayu x Smega Logo" 
                     class="w-[90%] max-h-[320px] object-contain drop-shadow-xl group-hover:scale-[1.03] transition-transform duration-700 ease-out">
                
                <p class="text-[11px] text-slate-400 dark:text-slate-500 mt-10 uppercase tracking-[0.4em] font-bold border-t border-slate-200 dark:border-slate-700 pt-6">
                    Official Partnership
                </p>
            </div>

            <div class="relative z-10 text-center">
                <p class="text-[10px] text-slate-400 dark:text-slate-500 leading-relaxed uppercase tracking-widest font-medium">
                    © SMKN 10 Surabaya <span class="mx-1">|</span> Powered by Sariayu
                </p>
            </div>
        </div>

        <div class="p-8 lg:p-16 flex flex-col justify-center">
            <div class="mb-10 text-center lg:text-left">
                <h2 class="text-3xl font-black text-slate-800 dark:text-white tracking-tight mb-2">Register</h2>
                <p class="text-slate-500 dark:text-slate-400 font-medium">Buat akun baru untuk menjadi customer sariayu.</p>
            </div>

            @if ($errors->any())
                <div class="mb-6 p-4 bg-red-50 dark:bg-red-500/10 border border-red-200 dark:border-red-500/20 rounded-2xl">
                    <ul class="text-sm text-red-700 dark:text-red-400 space-y-1">
                        @foreach ($errors->all() as $error)
                            <li><i class="fas fa-exclamation-circle mr-2"></i>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('auth.register') }}" method="POST" class="space-y-6">
                @csrf
                
                <div class="space-y-2">
                    <label class="text-sm font-bold text-slate-700 dark:text-slate-300 ml-1">Nama Lengkap</label>
                    <div class="relative group">
                        <span class="absolute left-4 top-1/2 -translate-y-1/2 text-slate-400 group-focus-within:text-indigo-600 transition-colors">
                            <i class="fas fa-user text-sm"></i>
                        </span>
                        <input type="text" name="name" placeholder="Nama Lengkap" value="{{ old('name') }}"
                               class="w-full pl-12 pr-4 py-4 bg-slate-50 dark:bg-slate-800/50 border-2 border-transparent focus:border-indigo-500 focus:bg-white dark:focus:bg-slate-800 rounded-2xl outline-none transition-all dark:text-white placeholder:text-slate-400 font-medium shadow-sm @error('name') border-red-500 @enderror">
                    </div>
                    @error('name')
                        <p class="text-xs text-red-600 dark:text-red-400 ml-1"><i class="fas fa-exclamation-circle mr-1"></i>{{ $message }}</p>
                    @enderror
                </div>

                <div class="space-y-2">
                    <label class="text-sm font-bold text-slate-700 dark:text-slate-300 ml-1">Email</label>
                    <div class="relative group">
                        <span class="absolute left-4 top-1/2 -translate-y-1/2 text-slate-400 group-focus-within:text-indigo-600 transition-colors">
                            <i class="fas fa-envelope text-sm"></i>
                        </span>
                        <input type="email" name="email" placeholder="user@smega.com" value="{{ old('email') }}"
                               class="w-full pl-12 pr-4 py-4 bg-slate-50 dark:bg-slate-800/50 border-2 border-transparent focus:border-indigo-500 focus:bg-white dark:focus:bg-slate-800 rounded-2xl outline-none transition-all dark:text-white placeholder:text-slate-400 font-medium shadow-sm @error('email') border-red-500 @enderror">
                    </div>
                    @error('email')
                        <p class="text-xs text-red-600 dark:text-red-400 ml-1"><i class="fas fa-exclamation-circle mr-1"></i>{{ $message }}</p>
                    @enderror
                </div>

                <div class="space-y-2">
                    <label class="text-sm font-bold text-slate-700 dark:text-slate-300 ml-1">Password</label>
                    <div class="relative group" x-data="{ show: false }">
                        <span class="absolute left-4 top-1/2 -translate-y-1/2 text-slate-400 group-focus-within:text-indigo-600 transition-colors">
                            <i class="fas fa-lock text-sm"></i>
                        </span>
                        <input :type="show ? 'text' : 'password'" name="password" placeholder="••••••••" 
                               class="w-full pl-12 pr-12 py-4 bg-slate-50 dark:bg-slate-800/50 border-2 border-transparent focus:border-indigo-500 focus:bg-white dark:focus:bg-slate-800 rounded-2xl outline-none transition-all dark:text-white placeholder:text-slate-400 font-medium shadow-sm @error('password') border-red-500 @enderror">
                        <button type="button" @click="show = !show" class="absolute right-4 top-1/2 -translate-y-1/2 text-slate-400 hover:text-indigo-600">
                            <i class="fas" :class="show ? 'fa-eye-slash' : 'fa-eye'"></i>
                        </button>
                    </div>
                    @error('password')
                        <p class="text-xs text-red-600 dark:text-red-400 ml-1"><i class="fas fa-exclamation-circle mr-1"></i>{{ $message }}</p>
                    @enderror
                </div>

                <div class="space-y-2">
                    <label class="text-sm font-bold text-slate-700 dark:text-slate-300 ml-1">Konfirmasi Password</label>
                    <div class="relative group" x-data="{ show: false }">
                        <span class="absolute left-4 top-1/2 -translate-y-1/2 text-slate-400 group-focus-within:text-indigo-600 transition-colors">
                            <i class="fas fa-check-circle text-sm"></i>
                        </span>
                        <input :type="show ? 'text' : 'password'" name="password_confirmation" placeholder="••••••••" 
                               class="w-full pl-12 pr-12 py-4 bg-slate-50 dark:bg-slate-800/50 border-2 border-transparent focus:border-indigo-500 focus:bg-white dark:focus:bg-slate-800 rounded-2xl outline-none transition-all dark:text-white placeholder:text-slate-400 font-medium shadow-sm">
                        <button type="button" @click="show = !show" class="absolute right-4 top-1/2 -translate-y-1/2 text-slate-400 hover:text-indigo-600">
                            <i class="fas" :class="show ? 'fa-eye-slash' : 'fa-eye'"></i>
                        </button>
                    </div>
                </div>

                <div class="flex items-start space-x-2 ml-1">
                    <input type="checkbox" id="agree" name="agree" class="w-4 h-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500 dark:bg-slate-800 dark:border-slate-700 transition-all mt-1">
                    <label for="agree" class="text-sm font-medium text-slate-500 dark:text-slate-400">
                        Saya setuju dengan <a href="#" class=" dark:text-slate-400 font-bold hover:underline">Syarat & Ketentuan</a>
                    </label>
                </div>

                <button type="submit" 
                        class="w-full py-4 bg-slate-800  dark:text-slate-400 text-xs font-black uppercase tracking-[0.2em] rounded-xl hover:bg-slate-900 dark:hover:bg-slate-100 transition-all active:scale-[0.98] shadow-lg shadow-slate-200/50 dark:shadow-none">
                    <span>Masuk Sekarang</span>
                    <i class="fas fa-arrow-right text-xs"></i>
                </button>
            </form>

            <div class="mt-10 text-center">
                <p class="text-sm text-slate-500 dark:text-slate-400 font-medium">
                    Sudah punya akun? 
                    <a href="{{ route('auth.login') }}" class="text-indigo-600 dark:text-indigo-400 font-black hover:underline ml-1">Masuk Sekarang</a>
                </p>
            </div>
        </div>
    </div>
</div>
@endsection
