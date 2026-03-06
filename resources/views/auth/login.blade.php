@extends('layouts.auth')

@section('title', 'Login')

@section('content')
<div class="min-h-screen flex items-center justify-center p-6 bg-slate-50 dark:bg-slate-950 transition-colors duration-300">
    
    <div class="fixed top-8 right-8 z-50">
        <button @click="darkMode = !darkMode; localStorage.setItem('dark', darkMode)" 
                class="w-10 h-10 flex items-center justify-center bg-white dark:bg-slate-900 border border-slate-200 dark:border-slate-800 rounded-full shadow-sm text-slate-500 dark:text-yellow-500 hover:border-slate-300 transition-all">
            <i class="fas" :class="darkMode ? 'fa-sun text-sm' : 'fa-moon text-sm'"></i>
        </button>
    </div>

    <div class="w-full max-w-[1000px] flex bg-white dark:bg-slate-900 rounded-3xl shadow-xl shadow-slate-200/50 dark:shadow-none overflow-hidden border border-slate-200 dark:border-slate-800">
        
      <div class="hidden lg:flex flex-col w-1/2 bg-slate-100 dark:bg-slate-800/50 p-10 justify-between border-r border-slate-100 dark:border-slate-800 relative overflow-hidden group transition-all duration-500">
            
            <div class="absolute -left-16 -top-16 w-48 h-48 border border-slate-200 dark:border-slate-700 rounded-full opacity-50"></div>
            <div class="absolute -right-10 -bottom-10 w-32 h-32 border border-slate-200 dark:border-slate-700 rounded-full opacity-50"></div>

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

        <div class="w-full lg:w-1/2 p-10 lg:p-16 flex flex-col justify-center">
            <div class="mb-10 text-center lg:text-left">
                <h2 class="text-2xl font-bold text-slate-800 dark:text-white uppercase tracking-tight">Sign In</h2>
                <p class="text-sm text-slate-500 dark:text-slate-400 mt-1">Gunakan kredensial akun afiliator Anda.</p>
            </div>

            @if ($errors->any())
                <div class="mb-6 p-3 bg-rose-50 dark:bg-rose-500/5 border-l-4 border-rose-500 rounded-r-lg">
                    <p class="text-xs text-rose-700 dark:text-rose-400 font-bold uppercase mb-1">Terjadi Kesalahan</p>
                    <ul class="text-[11px] text-rose-600/80 dark:text-rose-400/80 space-y-0.5">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('auth.authenticate') }}" method="POST" class="space-y-5">
                @csrf
                
                <div class="space-y-1.5">
                    <label class="text-[11px] font-black text-slate-400 dark:text-slate-500 uppercase tracking-widest ml-1">Alamat Email</label>
                    <input type="email" name="email" placeholder="nama@email.com" value="{{ old('email') }}"
                           class="w-full px-4 py-3.5 bg-white dark:bg-slate-800 border border-slate-200 dark:border-slate-700 focus:border-slate-800 dark:focus:border-white rounded-xl outline-none transition-all dark:text-white placeholder:text-slate-300 text-sm font-medium shadow-sm @error('email') border-rose-500 @enderror">
                </div>

                <div class="space-y-1.5">
                    <div class="flex justify-between items-center px-1">
                        <label class="text-[11px] font-black text-slate-400 dark:text-slate-500 uppercase tracking-widest">Kata Sandi</label>
                        <a href="#" class="text-[10px] font-bold text-slate-400 hover:text-slate-800 dark:hover:text-white transition-colors">LUPA?</a>
                    </div>
                    <div class="relative group" x-data="{ show: false }">
                        <input :type="show ? 'text' : 'password'" name="password" placeholder="••••••••" 
                               class="w-full pl-4 pr-12 py-3.5 bg-white dark:bg-slate-800 border border-slate-200 dark:border-slate-700 focus:border-slate-800 dark:focus:border-white rounded-xl outline-none transition-all dark:text-white placeholder:text-slate-300 text-sm font-medium shadow-sm @error('password') border-rose-500 @enderror">
                        <button type="button" @click="show = !show" class="absolute right-4 top-1/2 -translate-y-1/2 text-slate-300 hover:text-slate-600 transition-colors">
                            <i class="fas" :class="show ? 'fa-eye-slash text-sm' : 'fa-eye text-sm'"></i>
                        </button>
                    </div>
                </div>

                <div class="flex items-center space-x-2 px-1 pt-1">
                    <input type="checkbox" id="remember" name="remember" class="w-4 h-4 rounded border-slate-300 dark:border-slate-700 text-slate-800 dark:text-indigo-500 focus:ring-slate-800 transition-all bg-white dark:bg-slate-800">
                    <label for="remember" class="text-xs font-medium text-slate-500 dark:text-slate-400">Tetap masuk di perangkat ini</label>
                </div>

                <button type="submit" 
                        class="w-full mt-2 py-4 bg-slate-800 dark:bg-white text-white dark:text-slate-900 text-xs font-black uppercase tracking-[0.2em] rounded-xl hover:bg-slate-900 dark:hover:bg-slate-100 transition-all active:scale-[0.98] shadow-lg shadow-slate-200/50 dark:shadow-none">
                    Masuk ke Sistem
                </button>
            </form>

            <div class="mt-8 pt-8 border-t border-slate-100 dark:border-slate-800 text-center">
                <p class="text-xs text-slate-500 dark:text-slate-400 font-medium">
                    Belum memiliki akun? 
                    <a href="{{ route('auth.register') }}" class="text-slate-800 dark:text-white font-black hover:underline ml-1">Daftar Sekarang</a>
                </p>
            </div>
        </div>
    </div>
</div>
@endsection