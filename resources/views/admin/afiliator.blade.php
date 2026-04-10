@extends('layouts.admin.header')

@section('content')
<div class="min-h-screen transition-colors duration-300 dark:bg-[#020617] bg-slate-50/50">
    
    <header class="bg-white/80 dark:bg-slate-900/80 backdrop-blur-md border-b border-slate-200 dark:border-slate-800 sticky top-0 z-30 px-8 py-5 flex justify-between items-center">
        <div>
            <h1 class="text-xl font-semibold text-slate-900 dark:text-slate-100 tracking-tight">Direktori Afiliator</h1>
            <div class="flex items-center space-x-2 mt-1">
                <span class="text-[10px] font-bold text-indigo-600 dark:text-indigo-400 uppercase tracking-widest">Sariayu</span>
                <span class="text-slate-300 dark:text-slate-700 text-xs">•</span>
                <span class="text-[10px] font-medium text-slate-400 uppercase tracking-widest">Manajemen Kemitraan</span>
            </div>
        </div>
        
        <a href="{{ route('admin.afiliator.create') }}" 
           class="bg-indigo-600 hover:bg-indigo-700 text-white px-5 py-2.5 rounded-xl text-[11px] font-bold transition-all active:scale-95 shadow-lg shadow-indigo-500/20 flex items-center">
            <i class="fas fa-user-plus mr-2 opacity-80 text-[10px]"></i> TAMBAH MITRA
        </a>
    </header>

    <div class="p-8 max-w-[1600px] mx-auto space-y-6">
        
        <div class="flex flex-col md:flex-row gap-4 justify-between items-center bg-white dark:bg-slate-900 p-4 rounded-2xl border border-slate-200 dark:border-slate-800 shadow-sm">
            <div class="relative w-full md:w-96 group">
                <input type="text" placeholder="Cari nama, email, atau ID..." 
                       class="w-full pl-10 pr-4 py-2.5 bg-slate-50 dark:bg-slate-800/50 border-none rounded-xl text-xs font-medium focus:ring-2 ring-indigo-500/20 outline-none transition-all dark:text-white">
                <i class="fas fa-search absolute left-3.5 top-3.5 text-slate-400 text-xs group-focus-within:text-indigo-500 transition-colors"></i>
            </div>
            
            <div class="flex items-center space-x-3 w-full md:w-auto">
                <button class="flex-1 md:flex-none flex items-center justify-center bg-white dark:bg-slate-800 border border-slate-200 dark:border-slate-700 text-slate-600 dark:text-slate-300 px-4 py-2.5 rounded-xl text-[11px] font-bold hover:bg-slate-50 transition shadow-sm">
                    <i class="fas fa-filter mr-2 text-indigo-500 opacity-70"></i> FILTER LANJUTAN
                </button>
                <div class="h-8 w-[1px] bg-slate-200 dark:bg-slate-700 hidden md:block"></div>
                <p class="text-[11px] font-bold text-slate-400 uppercase hidden md:block tracking-tighter">Total: <span class="text-slate-900 dark:text-white">{{ $users->total() }}</span></p>
            </div>
        </div>

        <div class="bg-white dark:bg-slate-900 border border-slate-200 dark:border-slate-800 rounded-2xl shadow-sm overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full text-left">
                    <thead class="bg-slate-50/50 dark:bg-slate-900/50 border-b border-slate-100 dark:border-slate-800 text-slate-400 text-[10px] uppercase tracking-[0.15em] font-bold">
                        <tr>
                            <th class="px-8 py-5">Informasi Profil</th>
                            <th class="px-8 py-5">Level Akses</th>
                            <th class="px-8 py-5 text-center">Aktivitas</th>
                            <th class="px-8 py-5">Ringkasan Komisi</th>
                            <th class="px-8 py-5 text-right">Opsi Pengelola</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-50 dark:divide-slate-800/50">
                        @forelse($users as $user)
                        <tr class="group hover:bg-indigo-500/5 transition-colors">
                            <td class="px-8 py-5">
                                <div class="flex items-center">
                                    <div class="w-10 h-10 rounded-xl bg-gradient-to-br from-indigo-50 to-slate-100 dark:from-slate-800 dark:to-slate-700 flex items-center justify-center border border-slate-200 dark:border-slate-700 shadow-sm transition-transform group-hover:scale-105">
                                        <span class="text-indigo-600 dark:text-indigo-400 font-bold text-sm tracking-tighter">{{ substr($user->name, 0, 1) }}</span>
                                    </div>
                                    <div class="ml-4">
                                        <p class="text-[13px] font-semibold text-slate-900 dark:text-slate-100 group-hover:text-indigo-600 transition-colors">{{ $user->name }}</p>
                                        <p class="text-[11px] text-slate-500 font-medium mt-0.5">{{ $user->email }}</p>
                                    </div>
                                </div>
                            </td>
                            <td class="px-8 py-5 text-[10px]">
                                @php
                                    $roleData = [
                                        'superadmin' => ['color' => 'rose', 'label' => 'Super Admin'],
                                        'affiliator' => ['color' => 'indigo', 'label' => 'Mitra Afiliasi'],
                                        'customer' => ['color' => 'slate', 'label' => 'Pelanggan']
                                    ];
                                    $currentRole = $roleData[$user->role] ?? $roleData['customer'];
                                @endphp
                                <span class="inline-flex items-center px-2.5 py-1 rounded-lg font-bold border uppercase tracking-wider bg-{{ $currentRole['color'] }}-500/5 text-{{ $currentRole['color'] }}-600 border-{{ $currentRole['color'] }}-500/20">
                                    <span class="w-1.5 h-1.5 rounded-full bg-{{ $currentRole['color'] }}-500 mr-2 opacity-70"></span>
                                    {{ $currentRole['label'] }}
                                </span>
                            </td>
                            <td class="px-8 py-5 text-center">
                                <div class="inline-flex flex-col items-center">
                                    <span class="text-[13px] font-bold text-slate-700 dark:text-slate-300">{{ $user->affiliatedOrders->count() }}</span>
                                    <span class="text-[9px] font-bold text-slate-400 uppercase tracking-widest mt-0.5">Pesanan</span>
                                </div>
                            </td>
                            <td class="px-8 py-5">
                                <div class="flex flex-col">
                                    <span class="text-[13px] font-bold text-emerald-600 dark:text-emerald-400">
                                        <span class="text-[10px] font-medium opacity-70">Rp</span> {{ number_format($user->commissions->sum('amount'), 0, ',', '.') }}
                                    </span>
                                    <span class="text-[9px] font-semibold text-slate-400 uppercase tracking-tighter mt-1">Akumulasi Saldo</span>
                                </div>
                            </td>
                            <td class="px-8 py-5 text-right">
                                <div class="flex justify-end items-center space-x-2 opacity-0 group-hover:opacity-100 transition-opacity duration-200">
                                    <a href="{{ route('admin.afiliator.edit', $user) }}" title="Ubah Data"
                                       class="p-2 bg-white dark:bg-slate-800 border border-slate-200 dark:border-slate-700 rounded-lg text-slate-500 hover:text-indigo-600 hover:border-indigo-200 transition-all shadow-sm">
                                        <i class="far fa-edit text-xs"></i>
                                    </a>
                                    
                                    <form action="{{ route('admin.afiliator.destroy', $user) }}" method="POST" x-ref="deleteForm{{ $user->id }}">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button" title="Hapus Akun"
                                                @click="$dispatch('confirm-delete', $refs.deleteForm{{ $user->id }})"
                                                class="p-2 bg-white dark:bg-slate-800 border border-slate-200 dark:border-slate-700 rounded-lg text-slate-400 hover:text-rose-500 hover:border-rose-200 transition-all shadow-sm">
                                            <i class="far fa-trash-alt text-xs"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="px-8 py-20 text-center">
                                <div class="max-w-xs mx-auto">
                                    <div class="w-16 h-16 bg-slate-50 dark:bg-slate-800 rounded-full flex items-center justify-center mx-auto mb-4">
                                        <i class="fas fa-users-slash text-slate-200 text-2xl"></i>
                                    </div>
                                    <h4 class="text-sm font-semibold text-slate-900 dark:text-white">Tidak ada afiliator</h4>
                                    <p class="text-xs text-slate-400 mt-1 font-medium italic">Mulai kembangkan jaringan Anda dengan menambahkan mitra baru ke platform.</p>
                                </div>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            @if($users->hasPages())
            <div class="px-8 py-5 border-t border-slate-100 dark:border-slate-800 flex justify-between items-center bg-slate-50/30 dark:bg-slate-900/30">
                <p class="text-[11px] font-medium text-slate-500">
                    Menampilkan <span class="text-slate-900 dark:text-white font-bold">{{ $users->firstItem() }} sampai {{ $users->lastItem() }}</span> dari {{ $users->total() }} data
                </p>
                <div class="pagination-custom">
                    {{ $users->links() }}
                </div>
            </div>
            @endif
        </div>
    </div>
</div>

<style>
    /* Styling for Tailwind Pagination */
    .pagination-custom nav div:first-child { display: none; }
    .pagination-custom nav span[aria-current="page"] > span {
        @apply bg-indigo-600 text-white border-indigo-600 rounded-lg px-3 py-1 text-xs font-bold;
    }
    .pagination-custom nav a {
        @apply bg-white dark:bg-slate-800 text-slate-600 dark:text-slate-400 border border-slate-200 dark:border-slate-700 rounded-lg px-3 py-1 text-xs font-bold hover:bg-slate-50 transition-colors mx-0.5;
    }
    .pagination-custom svg { width: 1.25rem; height: 1.25rem; display: inline; }
</style>
@endsection