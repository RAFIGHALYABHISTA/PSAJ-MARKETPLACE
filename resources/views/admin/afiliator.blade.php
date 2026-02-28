@extends('layouts.header')

@section('content')
<div class="min-h-screen transition-colors duration-300 dark:bg-slate-950 bg-[#F8FAFC]">
    
    <header class="bg-white dark:bg-slate-900 border-b border-gray-200 dark:border-slate-800 sticky top-0 z-30 p-4 px-8 flex justify-between items-center">
        <div>
            <h1 class="text-xl font-bold text-slate-800 dark:text-white">Data Afiliator</h1>
            <p class="text-xs text-slate-400 font-medium">Manajemen kemitraan <span class="text-indigo-600">Sariayu x Smega</span></p>
        </div>
        
        <a href="{{ route('admin.afiliator.create') }}" 
           class="bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded text-xs font-bold transition-all active:scale-95 shadow-sm flex items-center">
            <i class="fas fa-plus mr-2 text-[10px]"></i> TAMBAH AFILIATOR
        </a>
    </header>

    <div class="p-8 max-w-[1600px] mx-auto">
        
        <div class="mb-6 flex flex-wrap gap-4 justify-between items-center">
            <div class="relative">
                <input type="text" placeholder="Cari nama atau email..." 
                       class="pl-8 pr-4 py-2 bg-white dark:bg-slate-900 border border-gray-200 dark:border-slate-800 rounded text-xs focus:ring-1 ring-indigo-500 outline-none w-64 transition-all dark:text-white">
                <i class="fas fa-search absolute left-3 top-2.5 text-slate-400 text-[10px]"></i>
            </div>
            <div class="flex items-center space-x-2">
                <button class="bg-white dark:bg-slate-900 border border-gray-200 dark:border-slate-800 text-slate-600 dark:text-slate-300 px-3 py-2 rounded text-xs font-bold hover:bg-gray-50 transition">
                    <i class="fas fa-filter mr-2"></i> FILTER
                </button>
            </div>
        </div>

        <div class="bg-white dark:bg-slate-900 border border-gray-200 dark:border-slate-800 rounded shadow-sm overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead class="bg-gray-50/50 dark:bg-slate-900/50 border-b border-gray-100 dark:border-slate-800 text-slate-400 text-[10px] uppercase tracking-widest font-bold">
                        <tr>
                            <th class="px-6 py-4">Informasi Afiliator</th>
                            <th class="px-6 py-4">Total Pesanan</th>
                            <th class="px-6 py-4">Akumulasi Komisi</th>
                            <th class="px-6 py-4 text-right">Tindakan</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-50 dark:divide-slate-800">
                        @forelse($users as $user)
                        <tr class="hover:bg-slate-50 dark:hover:bg-slate-800/50 transition-colors">
                            <td class="px-6 py-4">
                                <div class="flex items-center">
                                    <div class="w-8 h-8 rounded bg-indigo-100 dark:bg-indigo-900/30 flex items-center justify-center text-indigo-600 dark:text-indigo-400 font-bold text-xs">
                                        {{ substr($user->name, 0, 1) }}
                                    </div>
                                    <div class="ml-3">
                                        <p class="text-sm font-bold text-slate-700 dark:text-slate-200 leading-none">{{ $user->name }}</p>
                                        <p class="text-[11px] text-slate-400 mt-1">{{ $user->email }}</p>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <span class="text-xs font-bold text-slate-600 dark:text-slate-400">
                                    <i class="fas fa-shopping-cart mr-1.5 opacity-40"></i> {{ $user->affiliatedOrders->count() }}
                                </span>
                            </td>
                            <td class="px-6 py-4">
                                <span class="text-xs font-black text-emerald-600 dark:text-emerald-400">
                                    Rp {{ number_format($user->commissions->sum('amount'), 0, ',', '.') }}
                                </span>
                            </td>
                            <td class="px-6 py-4 text-right">
                                <div class="flex justify-end items-center space-x-3">
                                    <a href="{{ route('admin.afiliator.edit', $user) }}" 
                                       class="text-[10px] font-black uppercase tracking-tighter text-indigo-600 dark:text-indigo-400 hover:underline">
                                        Edit
                                    </a>
                                    <span class="text-gray-200 dark:text-slate-800">|</span>
                                    <form action="{{ route('admin.afiliator.destroy', $user) }}" method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" 
                                                onclick="return confirm('Yakin ingin menghapus?')" 
                                                class="text-[10px] font-black uppercase tracking-tighter text-red-500 hover:text-red-700 transition-colors">
                                            Hapus
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="4" class="px-6 py-12 text-center">
                                <i class="fas fa-user-slash text-slate-200 text-3xl mb-3 block"></i>
                                <span class="text-xs text-slate-400 italic">Belum ada data afiliator yang terdaftar.</span>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            @if($users->hasPages())
            <div class="px-6 py-4 border-t border-gray-100 dark:border-slate-800 flex justify-between items-center bg-white dark:bg-slate-900">
                <p class="text-[10px] font-bold text-slate-400 uppercase tracking-tight">
                    Menampilkan {{ $users->firstItem() }}-{{ $users->lastItem() }} dari {{ $users->total() }}
                </p>
                <div class="pagination-minimalist">
                    {{ $users->links() }}
                </div>
            </div>
            @endif
        </div>
    </div>
</div>

<style>
    /* Styling manual untuk pagination Laravel agar minimalis */
    .pagination-minimalist nav svg { width: 1.5rem; }
    .pagination-minimalist nav p { display: none; }
    .pagination-minimalist nav div:first-child { display: none; }
</style>
@endsection