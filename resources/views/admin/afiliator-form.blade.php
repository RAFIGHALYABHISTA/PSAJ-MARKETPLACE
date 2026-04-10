@extends('layouts.admin.header')

@section('content')
<div class="min-h-screen transition-colors duration-300 dark:bg-slate-950 bg-[#F8FAFC]">
    
    <header class="bg-white dark:bg-slate-900 border-b border-gray-200 dark:border-slate-800 sticky top-0 z-10 p-4 px-8 flex justify-between items-center">
        <div>
            <h1 class="text-xl font-bold text-slate-800 dark:text-white">
                {{ isset($user) ? 'Edit Afiliator' : 'Tambah Afiliator Baru' }}
            </h1>
            <p class="text-xs text-slate-400 font-medium">Manajemen kemitraan <span class="text-indigo-600">Sariayu x Smega</span></p>
        </div>
        <a href="{{ route('admin.afiliator') }}" class="text-slate-600 dark:text-slate-400 hover:text-slate-800 dark:hover:text-white transition">
            <i class="fas fa-arrow-left mr-2"></i> Kembali
        </a>
    </header>

    <div class="p-8 max-w-2xl mx-auto">
        @if ($errors->any())
            <div class="mb-6 bg-red-50 dark:bg-red-900/20 border border-red-200 dark:border-red-800 text-red-700 dark:text-red-300 px-6 py-4 rounded-xl">
                <p class="font-bold text-sm mb-2"><i class="fas fa-exclamation-circle mr-2"></i> Terdapat kesalahan:</p>
                <ul class="list-disc list-inside text-xs space-y-1">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ isset($user) ? route('admin.afiliator.update', $user) : route('admin.afiliator.store') }}" 
              method="POST" 
              class="bg-white dark:bg-slate-900 border border-gray-200 dark:border-slate-800 rounded-2xl p-8 shadow-sm">
            @csrf
            @if(isset($user))
                @method('PUT')
            @endif

            <div class="space-y-6">
                <!-- Name Field -->
                <div>
                    <label class="block text-sm font-bold text-slate-700 dark:text-slate-300 mb-2">
                        Nama Lengkap <span class="text-red-500">*</span>
                    </label>
                    <input type="text" 
                           name="name" 
                           placeholder="Masukkan nama lengkap afiliator" 
                           class="w-full px-4 py-3 bg-slate-50 dark:bg-slate-800 border border-gray-200 dark:border-slate-700 text-slate-800 dark:text-white placeholder-slate-400 rounded-xl focus:ring-2 ring-indigo-500 outline-none transition"
                           value="{{ old('name', $user->name ?? '') }}"
                           required>
                </div>

                <!-- Email Field -->
                <div>
                    <label class="block text-sm font-bold text-slate-700 dark:text-slate-300 mb-2">
                        Email <span class="text-red-500">*</span>
                    </label>
                    <input type="email"
                           name="email"
                           placeholder="afiliator@example.com"
                           class="w-full px-4 py-3 bg-slate-50 dark:bg-slate-800 border border-gray-200 dark:border-slate-700 text-slate-800 dark:text-white placeholder-slate-400 rounded-xl focus:ring-2 ring-indigo-500 outline-none transition"
                           value="{{ old('email', $user->email ?? '') }}"
                           required>
                </div>

                <!-- Role Field -->
                <div>
                    <label class="block text-sm font-bold text-slate-700 dark:text-slate-300 mb-2">
                        Role <span class="text-red-500">*</span>
                    </label>
                    <select name="role"
                            class="w-full px-4 py-3 bg-slate-50 dark:bg-slate-800 border border-gray-200 dark:border-slate-700 text-slate-800 dark:text-white rounded-xl focus:ring-2 ring-indigo-500 outline-none transition"
                            required>
                        <option value="affiliator" {{ old('role', $user->role ?? '') == 'affiliator' ? 'selected' : '' }}>Afiliator</option>
                        <option value="customer" {{ old('role', $user->role ?? '') == 'customer' ? 'selected' : '' }}>Customer</option>
                        <option value="superadmin" {{ old('role', $user->role ?? '') == 'superadmin' ? 'selected' : '' }}>Super Admin</option>
                    </select>
                    <p class="text-xs text-slate-400 mt-2">
                        <i class="fas fa-shield-alt mr-1"></i>
                        <strong>Super Admin:</strong> Akses penuh dashboard | <strong>Afiliator:</strong> Bisa jual produk | <strong>Customer:</strong> Pembeli biasa
                    </p>
                </div>

                @if(!isset($user))
                <!-- Password Field (Create Only) -->
                <div>
                    <label class="block text-sm font-bold text-slate-700 dark:text-slate-300 mb-2">
                        Password <span class="text-red-500">*</span>
                    </label>
                    <input type="password" 
                           name="password" 
                           placeholder="Masukkan password minimal 8 karakter" 
                           class="w-full px-4 py-3 bg-slate-50 dark:bg-slate-800 border border-gray-200 dark:border-slate-700 text-slate-800 dark:text-white placeholder-slate-400 rounded-xl focus:ring-2 ring-indigo-500 outline-none transition"
                           required>
                    <p class="text-xs text-slate-400 mt-2">
                        <i class="fas fa-lock mr-1"></i> Minimal 8 karakter
                    </p>
                </div>

                <!-- Password Confirmation Field (Create Only) -->
                <div>
                    <label class="block text-sm font-bold text-slate-700 dark:text-slate-300 mb-2">
                        Konfirmasi Password <span class="text-red-500">*</span>
                    </label>
                    <input type="password" 
                           name="password_confirmation" 
                           placeholder="Ulangi password" 
                           class="w-full px-4 py-3 bg-slate-50 dark:bg-slate-800 border border-gray-200 dark:border-slate-700 text-slate-800 dark:text-white placeholder-slate-400 rounded-xl focus:ring-2 ring-indigo-500 outline-none transition"
                           required>
                </div>
                @endif
            </div>

            <!-- Action Buttons -->
            <div class="flex gap-4 mt-8 pt-6 border-t border-gray-200 dark:border-slate-700">
                <a href="{{ route('admin.afiliator') }}" 
                   class="flex-1 bg-slate-100 dark:bg-slate-800 hover:bg-slate-200 dark:hover:bg-slate-700 text-slate-700 dark:text-slate-300 py-3 rounded-xl font-bold text-sm transition-colors text-center">
                    Batal
                </a>
                <button type="submit" 
                        class="flex-1 bg-indigo-600 hover:bg-indigo-700 text-white py-3 rounded-xl font-bold text-sm transition-colors shadow-lg shadow-indigo-200 dark:shadow-none">
                    <i class="fas fa-save mr-2"></i>
                    {{ isset($user) ? 'Simpan Perubahan' : 'Tambah Afiliator' }}
                </button>
            </div>
        </form>

        <!-- Info Section -->
        <div class="mt-8 bg-blue-50 dark:bg-blue-900/20 border border-blue-200 dark:border-blue-800 rounded-2xl p-6">
            <p class="text-sm text-blue-900 dark:text-blue-300">
                <i class="fas fa-info-circle mr-2"></i>
                <strong>Informasi:</strong>
                @if(isset($user))
                    Afiliator dapat login dengan email dan password yang terdaftar. Password tidak ditampilkan di sini.
                @else
                    Afiliator akan menerima email login dengan credentials yang Anda buat di sini.
                @endif
            </p>
        </div>

        <!-- affiliator details (if exists) -->
        @if(isset($user) && $user->id)
        <div class="mt-8 bg-white dark:bg-slate-900 border border-gray-200 dark:border-slate-800 rounded-2xl p-8 shadow-sm">
            <h3 class="text-lg font-bold text-slate-800 dark:text-white mb-6">
                <i class="fas fa-chart-line mr-2 text-indigo-600"></i> Statistik Afiliator
            </h3>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <div class="bg-slate-50 dark:bg-slate-800 rounded-xl p-4">
                    <p class="text-xs text-slate-400 uppercase font-bold tracking-tighter mb-1">Pesanan Afiliasi</p>
                    <p class="text-2xl font-black text-indigo-600 dark:text-indigo-400">
                        {{ $user->affiliatedOrders->count() }}
                    </p>
                </div>
                
                <div class="bg-slate-50 dark:bg-slate-800 rounded-xl p-4">
                    <p class="text-xs text-slate-400 uppercase font-bold tracking-tighter mb-1">Total Komisi</p>
                    <p class="text-2xl font-black text-emerald-600 dark:text-emerald-400">
                        Rp {{ number_format($user->commissions->sum('amount'), 0, ',', '.') }}
                    </p>
                </div>
                
                <div class="bg-slate-50 dark:bg-slate-800 rounded-xl p-4">
                    <p class="text-xs text-slate-400 uppercase font-bold tracking-tighter mb-1">Bergabung Sejak</p>
                    <p class="text-sm font-bold text-slate-700 dark:text-slate-300">
                        {{ $user->created_at->format('d M Y') }}
                    </p>
                </div>
            </div>
        </div>
        @endif
    </div>
</div>
@endsection
