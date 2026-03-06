@extends('layouts.admin.header')

@section('content')
<div class="min-h-screen transition-colors duration-300 dark:bg-slate-950 bg-[#F8FAFC]">
    
    <header class="bg-white dark:bg-slate-900 border-b border-gray-200 dark:border-slate-800 sticky top-0 z-30 p-4 px-8 flex justify-between items-center">
        <div>
            <h1 class="text-xl font-bold text-slate-800 dark:text-white uppercase tracking-tight">Pencairan Komisi</h1>
            <p class="text-xs text-slate-400 font-medium italic">Manajemen pembayaran <span class="text-indigo-600">Pendapatan Afiliator</span></p>
        </div>
        <button class="bg-indigo-600 hover:bg-indigo-700 text-white px-5 py-2.5 rounded text-xs font-black tracking-widest transition-all active:scale-95 shadow-sm flex items-center uppercase">
            <i class="fas fa-plus mr-2 text-[10px]"></i> Proses Pencairan
        </button>
    </header>

    <div class="p-8 max-w-[1600px] mx-auto">
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
            <div class="bg-white dark:bg-slate-900 border border-gray-200 dark:border-slate-800 p-6 rounded shadow-sm relative overflow-hidden group">
                <div class="absolute right-[-10px] top-[-10px] opacity-[0.03] group-hover:opacity-[0.08] transition-opacity">
                    <i class="fas fa-clock text-8xl text-indigo-600"></i>
                </div>
                <p class="text-[10px] font-black text-slate-400 uppercase tracking-[0.2em] mb-1">Menunggu Proses</p>
                <h2 class="text-3xl font-black text-slate-800 dark:text-white leading-none mb-2">{{ $stats['pending'] }}</h2>
                <div class="inline-flex items-center px-2 py-1 bg-indigo-50 dark:bg-indigo-900/30 rounded text-indigo-600 dark:text-indigo-400 text-[11px] font-bold">
                    Rp {{ number_format($totalPending, 0, ',', '.') }}
                </div>
            </div>

            <div class="bg-white dark:bg-slate-900 border border-gray-200 dark:border-slate-800 p-6 rounded shadow-sm relative overflow-hidden group">
                <div class="absolute right-[-10px] top-[-10px] opacity-[0.03] group-hover:opacity-[0.08] transition-opacity">
                    <i class="fas fa-hourglass-half text-8xl text-amber-500"></i>
                </div>
                <p class="text-[10px] font-black text-slate-400 uppercase tracking-[0.2em] mb-1">Disetujui</p>
                <h2 class="text-3xl font-black text-slate-800 dark:text-white leading-none mb-2">{{ $stats['approved'] }}</h2>
                <div class="inline-flex items-center px-2 py-1 bg-amber-50 dark:bg-amber-900/30 rounded text-amber-600 dark:text-amber-400 text-[11px] font-bold">
                    Rp {{ number_format($totalApproved, 0, ',', '.') }}
                </div>
            </div>

            <div class="bg-white dark:bg-slate-900 border border-gray-200 dark:border-slate-800 p-6 rounded shadow-sm relative overflow-hidden group">
                <div class="absolute right-[-10px] top-[-10px] opacity-[0.03] group-hover:opacity-[0.08] transition-opacity">
                    <i class="fas fa-check-double text-8xl text-emerald-500"></i>
                </div>
                <p class="text-[10px] font-black text-slate-400 uppercase tracking-[0.2em] mb-1">Berhasil Cair</p>
                <h2 class="text-3xl font-black text-slate-800 dark:text-white leading-none mb-2">{{ $stats['paid'] }}</h2>
                <div class="inline-flex items-center px-2 py-1 bg-emerald-50 dark:bg-emerald-900/30 rounded text-emerald-600 dark:text-emerald-400 text-[11px] font-bold">
                    Rp {{ number_format($totalPaid, 0, ',', '.') }}
                </div>
            </div>
        </div>

        <div class="bg-white dark:bg-slate-900 border border-gray-200 dark:border-slate-800 rounded shadow-sm overflow-hidden">
            <div class="p-5 border-b border-gray-100 dark:border-slate-800 flex justify-between items-center bg-gray-50/30 dark:bg-slate-900/50">
                <h3 class="font-bold text-slate-800 dark:text-white text-xs uppercase tracking-widest">Daftar Pengajuan ({{ $commissions->total() }})</h3>
                <div class="flex space-x-2">
                    <button class="text-[10px] font-bold px-3 py-1.5 bg-white dark:bg-slate-800 border border-gray-200 dark:border-slate-700 rounded text-slate-500 uppercase">Filter</button>
                    <button class="text-[10px] font-bold px-3 py-1.5 bg-white dark:bg-slate-800 border border-gray-200 dark:border-slate-700 rounded text-slate-500 uppercase">Export</button>
                </div>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead class="bg-white dark:bg-slate-900 border-b border-gray-100 dark:border-slate-800 text-slate-400 text-[10px] uppercase tracking-widest font-bold">
                        <tr>
                            <th class="px-6 py-4">Afiliator</th>
                            <th class="px-6 py-4">Nominal</th>
                            <th class="px-6 py-4">Referensi Invoice</th>
                            <th class="px-6 py-4">Diajukan Pada</th>
                            <th class="px-6 py-4">Status</th>
                            <th class="px-6 py-4 text-right">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-50 dark:divide-slate-800">
                        @forelse($commissions as $commission)
                        <tr class="hover:bg-slate-50/50 dark:hover:bg-slate-800/50 transition-colors">
                            <td class="px-6 py-4">
                                <span class="text-sm font-bold text-slate-700 dark:text-slate-200 italic">{{ $commission->affiliator->name ?? 'N/A' }}</span>
                            </td>
                            <td class="px-6 py-4 font-mono">
                                <span class="text-sm font-black text-indigo-600 dark:text-indigo-400">Rp {{ number_format($commission->amount, 0, ',', '.') }}</span>
                            </td>
                            <td class="px-6 py-4">
                                <span class="text-[11px] font-medium text-slate-500 bg-slate-100 dark:bg-slate-800 px-2 py-1 rounded">{{ $commission->order->invoice_number ?? '-' }}</span>
                            </td>
                            <td class="px-6 py-4 text-[11px] text-slate-500">
                                {{ $commission->created_at->format('d/m/Y') }}
                            </td>
                            <td class="px-6 py-4">
                                @php
                                    $statusStyle = [
                                        'pending' => 'border-indigo-200 text-indigo-600 bg-indigo-50',
                                        'approved' => 'border-amber-200 text-amber-600 bg-amber-50',
                                        'paid' => 'border-emerald-200 text-emerald-600 bg-emerald-50',
                                    ];
                                    $currentStyle = $statusStyle[$commission->status] ?? 'border-slate-200 text-slate-600 bg-slate-50';
                                @endphp
                                <span class="px-2 py-1 rounded border text-[9px] font-black uppercase tracking-tighter {{ $currentStyle }} dark:bg-opacity-10">
                                    {{ $commission->status }}
                                </span>
                            </td>
                            <td class="px-6 py-4 text-right">
                                <div class="flex justify-end items-center space-x-4">
                                    <a href="{{ route('admin.pencairan.edit', $commission) }}" class="text-[10px] font-black uppercase text-indigo-600 hover:underline">Kelola</a>
                                    <form action="{{ route('admin.pencairan.destroy', $commission) }}" method="POST" class="inline">
                                        @csrf @method('DELETE')
                                        <button type="submit" onclick="return confirm('Hapus data pengajuan?')" class="text-[10px] font-black uppercase text-rose-500 hover:text-rose-700">Hapus</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" class="px-6 py-12 text-center text-slate-400 text-xs italic">Belum ada pengajuan pencairan komisi.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            @if($commissions->hasPages())
            <div class="px-6 py-4 border-t border-gray-100 dark:border-slate-800 flex justify-between items-center bg-white dark:bg-slate-900">
                <p class="text-[10px] font-bold text-slate-400 uppercase tracking-tighter">Data {{ $commissions->firstItem() }}-{{ $commissions->lastItem() }}</p>
                <div class="pagination-minimal">
                    {{ $commissions->links() }}
                </div>
            </div>
            @endif
        </div>
    </div>
</div>

<style>
    .pagination-minimal nav svg { width: 1.2rem; height: 1.2rem; }
    .pagination-minimal nav p { display: none; }
    .pagination-minimal nav div:first-child { display: none; }
</style>
@endsection