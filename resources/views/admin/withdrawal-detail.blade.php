@extends('layouts.admin.header')

@section('content')
<div class="min-h-screen transition-colors duration-300 dark:bg-slate-950 bg-[#F8FAFC]">

    <header class="bg-white dark:bg-slate-900 border-b border-gray-200 dark:border-slate-800 sticky top-0 z-30 p-4 px-8 flex justify-between items-center">
        <div>
            <a href="{{ route('admin.withdrawals') }}" class="text-indigo-600 hover:text-indigo-700 text-sm font-medium mb-1 flex items-center">
                <i class="fas fa-arrow-left mr-2"></i> Kembali ke Daftar Penarikan
            </a>
            <h1 class="text-xl font-bold text-slate-800 dark:text-white uppercase tracking-tight">Detail Penarikan Komisi</h1>
            <p class="text-xs text-slate-400 font-medium italic">Permintaan penarikan dari <span class="text-indigo-600">{{ $withdrawal->affiliator->name }}</span></p>
        </div>
    </header>

    <div class="p-8 max-w-4xl mx-auto">

        <!-- Status Card -->
        <div class="bg-white dark:bg-slate-900 border border-gray-200 dark:border-slate-800 p-6 rounded-2xl shadow-sm mb-8">
            <div class="flex items-center justify-between mb-4">
                <h3 class="text-lg font-semibold text-slate-800 dark:text-white">Status Permintaan</h3>
                @php
                    $statusStyle = [
                        'pending' => 'border-indigo-200 text-indigo-600 bg-indigo-50',
                        'approved' => 'border-amber-200 text-amber-600 bg-amber-50',
                        'paid' => 'border-emerald-200 text-emerald-600 bg-emerald-50',
                        'rejected' => 'border-rose-200 text-rose-600 bg-rose-50',
                    ];
                    $currentStyle = $statusStyle[$withdrawal->status] ?? 'border-slate-200 text-slate-600 bg-slate-50';
                @endphp
                <span class="px-3 py-1 rounded border text-sm font-bold uppercase tracking-tighter {{ $currentStyle }} dark:bg-opacity-10">
                    {{ $withdrawal->status }}
                </span>
            </div>

            @if($withdrawal->status === 'rejected' && $withdrawal->rejection_reason)
            <div class="bg-rose-50 dark:bg-rose-900/20 border border-rose-200 dark:border-rose-800 rounded-lg p-4">
                <h4 class="text-sm font-semibold text-rose-800 dark:text-rose-200 mb-2">Alasan Penolakan:</h4>
                <p class="text-sm text-rose-700 dark:text-rose-300">{{ $withdrawal->rejection_reason }}</p>
            </div>
            @endif
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">

            <!-- Withdrawal Details -->
            <div class="bg-white dark:bg-slate-900 border border-gray-200 dark:border-slate-800 rounded-2xl shadow-sm overflow-hidden">
                <div class="p-6 border-b border-gray-100 dark:border-slate-800">
                    <h3 class="text-lg font-semibold text-slate-800 dark:text-white">Detail Penarikan</h3>
                </div>
                <div class="p-6 space-y-4">
                    <div>
                        <label class="block text-sm font-medium text-slate-600 dark:text-slate-400 mb-1">Nominal Penarikan</label>
                        <p class="text-2xl font-bold text-indigo-600 dark:text-indigo-400">Rp {{ number_format($withdrawal->amount, 0, ',', '.') }}</p>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-slate-600 dark:text-slate-400 mb-1">Tanggal Pengajuan</label>
                        <p class="text-sm text-slate-800 dark:text-slate-200">{{ $withdrawal->created_at->format('d F Y, H:i') }}</p>
                    </div>
                    @if($withdrawal->approved_at)
                    <div>
                        <label class="block text-sm font-medium text-slate-600 dark:text-slate-400 mb-1">Tanggal Disetujui</label>
                        <p class="text-sm text-slate-800 dark:text-slate-200">{{ $withdrawal->approved_at->format('d F Y, H:i') }}</p>
                    </div>
                    @endif
                </div>
            </div>

            <!-- Bank Details -->
            <div class="bg-white dark:bg-slate-900 border border-gray-200 dark:border-slate-800 rounded-2xl shadow-sm overflow-hidden">
                <div class="p-6 border-b border-gray-100 dark:border-slate-800">
                    <h3 class="text-lg font-semibold text-slate-800 dark:text-white">Informasi Rekening</h3>
                </div>
                <div class="p-6 space-y-4">
                    <div>
                        <label class="block text-sm font-medium text-slate-600 dark:text-slate-400 mb-1">Nama Bank</label>
                        <p class="text-sm text-slate-800 dark:text-slate-200">{{ $withdrawal->bank_name }}</p>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-slate-600 dark:text-slate-400 mb-1">Nomor Rekening</label>
                        <p class="text-sm text-slate-800 dark:text-slate-200 font-mono">{{ $withdrawal->bank_account_number }}</p>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-slate-600 dark:text-slate-400 mb-1">Atas Nama</label>
                        <p class="text-sm text-slate-800 dark:text-slate-200">{{ $withdrawal->bank_account_name }}</p>
                    </div>
                </div>
            </div>

            <!-- Affiliator Details -->
            <div class="bg-white dark:bg-slate-900 border border-gray-200 dark:border-slate-800 rounded-2xl shadow-sm overflow-hidden lg:col-span-2">
                <div class="p-6 border-b border-gray-100 dark:border-slate-800">
                    <h3 class="text-lg font-semibold text-slate-800 dark:text-white">Informasi Afiliator</h3>
                </div>
                <div class="p-6">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-sm font-medium text-slate-600 dark:text-slate-400 mb-1">Nama Lengkap</label>
                            <p class="text-sm text-slate-800 dark:text-slate-200">{{ $withdrawal->affiliator->user->name }}</p>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-slate-600 dark:text-slate-400 mb-1">Email</label>
                            <p class="text-sm text-slate-800 dark:text-slate-200">{{ $withdrawal->affiliator->user->email }}</p>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-slate-600 dark:text-slate-400 mb-1">Nomor Telepon</label>
                            <p class="text-sm text-slate-800 dark:text-slate-200">{{ $withdrawal->affiliator->phone }}</p>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-slate-600 dark:text-slate-400 mb-1">Alamat</label>
                            <p class="text-sm text-slate-800 dark:text-slate-200">{{ $withdrawal->affiliator->address }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Action Buttons -->
        @if($withdrawal->status === 'pending')
        <div class="mt-8 flex gap-4 justify-center">
            <form action="{{ route('admin.withdrawals.update', $withdrawal) }}" method="POST" class="inline">
                @csrf @method('PATCH')
                <input type="hidden" name="status" value="approved">
                <button type="submit" class="px-6 py-3 bg-emerald-600 text-white rounded-lg hover:bg-emerald-700 transition-colors font-semibold">
                    <i class="fas fa-check mr-2"></i>Setujui Penarikan
                </button>
            </form>

            <button onclick="rejectWithdrawal()" class="px-6 py-3 bg-rose-600 text-white rounded-lg hover:bg-rose-700 transition-colors font-semibold">
                <i class="fas fa-times mr-2"></i>Tolak Penarikan
            </button>
        </div>
        @elseif($withdrawal->status === 'approved')
        <div class="mt-8 flex gap-4 justify-center">
            <form action="{{ route('admin.withdrawals.update', $withdrawal) }}" method="POST" class="inline">
                @csrf @method('PATCH')
                <input type="hidden" name="status" value="paid">
                <button type="submit" class="px-6 py-3 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors font-semibold">
                    <i class="fas fa-check-double mr-2"></i>Tandai Sudah Dibayar
                </button>
            </form>
        </div>
        @endif
    </div>

    <!-- Rejection Modal -->
    <div id="rejectModal" class="fixed inset-0 bg-black bg-opacity-50 hidden z-50">
        <div class="flex items-center justify-center min-h-screen p-4">
            <div class="bg-white rounded-2xl shadow-xl max-w-md w-full">
                <div class="p-6">
                    <h3 class="text-xl font-semibold text-slate-800 mb-4">Tolak Permintaan Penarikan</h3>
                    <form action="{{ route('admin.withdrawals.update', $withdrawal) }}" method="POST">
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
function rejectWithdrawal() {
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

@endsection