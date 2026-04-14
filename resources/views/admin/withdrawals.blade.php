@extends('layouts.admin.header')

@section('content')
<div class="min-h-screen transition-colors duration-300 dark:bg-slate-950 bg-[#F8FAFC]">

    <header class="bg-white dark:bg-slate-900 border-b border-gray-200 dark:border-slate-800 sticky top-0 z-30 p-4 px-8 flex justify-between items-center">
        <div>
            <h1 class="text-xl font-bold text-slate-800 dark:text-white uppercase tracking-tight">Penarikan Komisi</h1>
            <p class="text-xs text-slate-400 font-medium italic">Manajemen <span class="text-indigo-600">Permintaan Penarikan</span> Afiliator</p>
        </div>
    </header>

    <div class="p-8 max-w-[1600px] mx-auto">

        <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
            <div class="bg-white dark:bg-slate-900 border border-gray-200 dark:border-slate-800 p-6 rounded shadow-sm relative overflow-hidden group">
                <div class="absolute right-[-10px] top-[-10px] opacity-[0.03] group-hover:opacity-[0.08] transition-opacity">
                    <i class="fas fa-clock text-8xl text-indigo-600"></i>
                </div>
                <p class="text-[10px] font-black text-slate-400 uppercase tracking-[0.2em] mb-1">Menunggu Approval</p>
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
                <p class="text-[10px] font-black text-slate-400 uppercase tracking-[0.2em] mb-1">Sudah Dibayar</p>
                <h2 class="text-3xl font-black text-slate-800 dark:text-white leading-none mb-2">{{ $stats['paid'] }}</h2>
                <div class="inline-flex items-center px-2 py-1 bg-emerald-50 dark:bg-emerald-900/30 rounded text-emerald-600 dark:text-emerald-400 text-[11px] font-bold">
                    Rp {{ number_format($totalPaid, 0, ',', '.') }}
                </div>
            </div>

            <div class="bg-white dark:bg-slate-900 border border-gray-200 dark:border-slate-800 p-6 rounded shadow-sm relative overflow-hidden group">
                <div class="absolute right-[-10px] top-[-10px] opacity-[0.03] group-hover:opacity-[0.08] transition-opacity">
                    <i class="fas fa-times text-8xl text-rose-500"></i>
                </div>
                <p class="text-[10px] font-black text-slate-400 uppercase tracking-[0.2em] mb-1">Ditolak</p>
                <h2 class="text-3xl font-black text-slate-800 dark:text-white leading-none mb-2">{{ $stats['rejected'] }}</h2>
                <div class="inline-flex items-center px-2 py-1 bg-rose-50 dark:bg-rose-900/30 rounded text-rose-600 dark:text-rose-400 text-[11px] font-bold">
                    -
                </div>
            </div>
        </div>

        <div class="bg-white dark:bg-slate-900 border border-gray-200 dark:border-slate-800 rounded shadow-sm overflow-hidden">
            <div class="p-5 border-b border-gray-100 dark:border-slate-800 flex justify-between items-center bg-gray-50/30 dark:bg-slate-900/50">
                <h3 class="font-bold text-slate-800 dark:text-white text-xs uppercase tracking-widest">Daftar Permintaan Penarikan ({{ $withdrawals->total() }})</h3>
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
                            <th class="px-6 py-4">Bank</th>
                            <th class="px-6 py-4">Diajukan Pada</th>
                            <th class="px-6 py-4">Status</th>
                            <th class="px-6 py-4 text-right">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-50 dark:divide-slate-800">
                        @forelse($withdrawals as $withdrawal)
                        <tr class="hover:bg-slate-50/50 dark:hover:bg-slate-800/50 transition-colors">
                            <td class="px-6 py-4">
                                <span class="text-sm font-bold text-slate-700 dark:text-slate-200 italic">{{ $withdrawal->affiliator->user->name ?? 'N/A' }}</span>
                            </td>
                            <td class="px-6 py-4 font-mono">
                                <span class="text-sm font-black text-indigo-600 dark:text-indigo-400">Rp {{ number_format($withdrawal->amount, 0, ',', '.') }}</span>
                            </td>
                            <td class="px-6 py-4">
                                <div class="text-[11px] text-slate-600 dark:text-slate-400">
                                    <div class="font-medium">{{ $withdrawal->bank_name }}</div>
                                    <div class="text-slate-400">{{ $withdrawal->bank_account_number }}</div>
                                    <div class="text-slate-400">{{ $withdrawal->bank_account_name }}</div>
                                </div>
                            </td>
                            <td class="px-6 py-4 text-[11px] text-slate-500">
                                {{ $withdrawal->created_at->format('d/m/Y') }}
                            </td>
                            <td class="px-6 py-4">
                                @php
                                    $statusStyle = [
                                        'pending' => 'border-indigo-200 text-indigo-600 bg-indigo-50',
                                        'approved' => 'border-amber-200 text-amber-600 bg-amber-50',
                                        'paid' => 'border-emerald-200 text-emerald-600 bg-emerald-50',
                                        'rejected' => 'border-rose-200 text-rose-600 bg-rose-50',
                                    ];
                                    $currentStyle = $statusStyle[$withdrawal->status] ?? 'border-slate-200 text-slate-600 bg-slate-50';
                                @endphp
                                <span class="px-2 py-1 rounded border text-[9px] font-black uppercase tracking-tighter {{ $currentStyle }} dark:bg-opacity-10">
                                    {{ $withdrawal->status }}
                                </span>
                            </td>
                            <td class="px-6 py-4 text-right">
                                <div class="flex justify-end items-center space-x-4">
                                    <a href="{{ route('admin.withdrawals.show', $withdrawal) }}" class="text-[10px] font-black uppercase text-indigo-600 hover:underline">Detail</a>
                                    @if($withdrawal->status === 'pending')
                                        <form action="{{ route('admin.withdrawals.update', $withdrawal) }}" method="POST" class="inline">
                                            @csrf @method('PATCH')
                                            <input type="hidden" name="status" value="approved">
                                            <button type="submit" class="text-[10px] font-black uppercase text-emerald-600 hover:text-emerald-700">Setujui</button>
                                        </form>
                                        <button onclick="rejectWithdrawal({{ $withdrawal->id }})" class="text-[10px] font-black uppercase text-rose-500 hover:text-rose-700">Tolak</button>
                                    @elseif($withdrawal->status === 'approved')
                                        <form action="{{ route('admin.withdrawals.update', $withdrawal) }}" method="POST" class="inline">
                                            @csrf @method('PATCH')
                                            <input type="hidden" name="status" value="paid">
                                            <button type="submit" class="text-[10px] font-black uppercase text-emerald-600 hover:text-emerald-700">Tandai Dibayar</button>
                                        </form>
                                    @endif
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" class="px-6 py-12 text-center text-slate-400 text-xs italic">Belum ada permintaan penarikan komisi.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            @if($withdrawals->hasPages())
            <div class="px-6 py-4 border-t border-gray-100 dark:border-slate-800 flex justify-between items-center bg-white dark:bg-slate-900">
                <p class="text-[10px] font-bold text-slate-400 uppercase tracking-tighter">Data {{ $withdrawals->firstItem() }}-{{ $withdrawals->lastItem() }}</p>
                <div class="pagination-minimal">
                    {{ $withdrawals->links() }}
                </div>
            </div>
            @endif
        </div>
    </div>

    <!-- Rejection Modal -->
    <div id="rejectModal" class="fixed inset-0 bg-black bg-opacity-50 hidden z-50">
        <div class="flex items-center justify-center min-h-screen p-4">
            <div class="bg-white rounded-2xl shadow-xl max-w-md w-full">
                <div class="p-6">
                    <h3 class="text-xl font-semibold text-slate-800 mb-4">Tolak Permintaan Penarikan</h3>
                    <form id="rejectForm" action="" method="POST">
                        @csrf @method('PATCH')
                        <input type="hidden" name="status" value="rejected">
                        <div class="mb-4">
                            <label for="rejection_reason" class="block text-sm font-medium text-gray-700 mb-2">Alasan Penolakan</label>
                            <textarea id="rejection_reason" name="rejection_reason" rows="4"
                                      class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-rose-500 focus:border-transparent"
                                      placeholder="Jelaskan alasan penolakan..." required></textarea>
                        </div>
                        <div class="flex gap-3">
                            <button type="button" onclick="closeRejectModal()" 
                                    class="flex-1 px-4 py-2 text-gray-700 bg-gray-100 rounded-lg hover:bg-gray-200 transition-colors">
                                Batal
                            </button>
                            <button type="submit" 
                                    class="flex-1 px-4 py-2 bg-rose-600 text-white rounded-lg hover:bg-rose-700 transition-colors">
                                Tolak Permintaan
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
function rejectWithdrawal(withdrawalId) {
    document.getElementById('rejectForm').action = `/admin/withdrawals/${withdrawalId}`;
    document.getElementById('rejectModal').classList.remove('hidden');
}

function closeRejectModal() {
    document.getElementById('rejectModal').classList.add('hidden');
    document.getElementById('rejection_reason').value = '';
}

// Close modal when clicking outside
document.getElementById('rejectModal').addEventListener('click', function(e) {
    if (e.target === this) {
        closeRejectModal();
    }
});
</script>

<style>
    .pagination-minimal nav svg { width: 1.2rem; height: 1.2rem; }
    .pagination-minimal nav p { display: none; }
    .pagination-minimal nav div:first-child { display: none; }
</style>
@endsection