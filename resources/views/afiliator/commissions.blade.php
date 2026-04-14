@extends('layouts.afiliator.header')

@section('content')
<div class="max-w-6xl mx-auto space-y-8">
    <div class="flex flex-col md:flex-row md:items-end justify-between gap-6 border-b border-gray-200 pb-8">
        <div>
            <h3 class="text-3xl font-serif text-brand-olive mb-2">Manajemen Komisi</h3>
            <p class="text-gray-500 text-sm italic">Kelola pendapatan dan penarikan saldo affiliate Anda.</p>
        </div>
        
        <div class="bg-white p-6 rounded-3xl shadow-sm border border-brand-cream flex items-center gap-8 min-w-[350px]">
            <div>
                <p class="text-[10px] uppercase tracking-widest text-gray-400 font-bold mb-1">Total Komisi Tersedia</p>
                <h4 class="text-3xl font-bold text-brand-terracotta tracking-tight italic">Rp {{ number_format($available,0,',','.') }}</h4>
            </div>
            <button onclick="openWithdrawModal()" class="bg-brand-olive hover:bg-brand-olive-dark text-white px-6 py-3 rounded-2xl font-semibold text-sm transition-all shadow-md active:scale-95">
                Tarik Komisi
            </button>
        </div>
    </div>

    <!-- Riwayat Penarikan Komisi -->
    <div class="px-6 pt-6">
        <h3 class="text-xl font-semibold text-brand-olive mb-3">Riwayat Penarikan Komisi</h3>
    </div>
    <div class="bg-white rounded-2xl shadow-sm border border-brand-cream overflow-x-auto">
        @if($commissionHistory->count() > 0)
            <table class="w-full">
                <thead>
                    <tr class="border-b border-brand-cream bg-brand-cream/30">
                        <th class="px-6 py-4 text-left text-sm font-semibold text-brand-olive">ID Penarikan</th>
                        <th class="px-6 py-4 text-left text-sm font-semibold text-brand-olive">Jumlah Penarikan</th>
                        <th class="px-6 py-4 text-right text-sm font-semibold text-brand-olive">Status</th>
                        <th class="px-6 py-4 text-center text-sm font-semibold text-brand-olive">Tanggal</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($commissionHistory as $withdrawal)
                        <tr class="border-b border-gray-100 hover:bg-brand-cream/20 transition-colors">
                            <td class="px-6 py-4 text-sm font-medium text-gray-900">#{{ $withdrawal->id }}</td>
                            <td class="px-6 py-4 text-sm font-medium text-brand-terracotta">Rp {{ number_format($withdrawal->amount,0,',','.') }}</td>
                            <td class="px-6 py-4 text-right text-sm">
                                @if($withdrawal->status === 'paid')
                                    <span class="inline-block px-3 py-1 text-xs font-semibold text-green-700 bg-green-100 rounded-full">Sudah Diterima</span>
                                @elseif($withdrawal->status === 'approved')
                                    <span class="inline-block px-3 py-1 text-xs font-semibold text-blue-700 bg-blue-100 rounded-full">Disetujui</span>
                                @elseif($withdrawal->status === 'rejected')
                                    <span class="inline-block px-3 py-1 text-xs font-semibold text-red-700 bg-red-100 rounded-full">Ditolak</span>
                                @else
                                    <span class="inline-block px-3 py-1 text-xs font-semibold text-gray-700 bg-gray-100 rounded-full">Menunggu</span>
                                @endif
                            </td>
                            <td class="px-6 py-4 text-center text-sm text-gray-600">{{ $withdrawal->created_at->format('d M Y') }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="mt-6 px-6 py-4">
                {{ $commissionHistory->links() }}
            </div>
        @else
            <div class="p-12 text-center text-gray-500">
                Belum ada penarikan komisi yang tercatat.
            </div>
        @endif
    </div>

</div>

<!-- Withdrawal Modal -->
<div id="withdrawModal" class="fixed inset-0 bg-black bg-opacity-50 hidden z-50">
    <div class="flex items-center justify-center min-h-screen p-4">
        <div class="bg-white rounded-2xl shadow-xl max-w-md w-full">
            <div class="p-6">
                <h3 class="text-xl font-semibold text-brand-olive mb-4">Tarik Komisi</h3>
                <form action="{{ route('afiliator.commissions.withdraw') }}" method="POST">
                    @csrf
                    <div class="mb-4">
                        <label for="amount" class="block text-sm font-medium text-gray-700 mb-2">Jumlah Penarikan (Rp)</label>
                        <input type="number" id="amount" name="amount" min="10000" max="{{ $available }}" 
                               class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-brand-olive focus:border-transparent"
                               placeholder="Minimal Rp 10.000" required>
                        <p class="text-xs text-gray-500 mt-1">Saldo tersedia: Rp {{ number_format($available, 0, ',', '.') }}</p>
                    </div>
                    <div class="mb-4">
                        <p class="text-sm text-gray-600">
                            <strong>Informasi Rekening:</strong><br>
                            Bank: {{ $affiliator->bank_name }}<br>
                            No. Rekening: {{ $affiliator->bank_account_number }}<br>
                            Atas Nama: {{ $affiliator->bank_account_name }}
                        </p>
                    </div>
                    <div class="flex gap-3">
                        <button type="button" onclick="closeWithdrawModal()" 
                                class="flex-1 px-4 py-2 text-gray-700 bg-gray-100 rounded-lg hover:bg-gray-200 transition-colors">
                            Batal
                        </button>
                        <button type="submit" 
                                class="flex-1 px-4 py-2 bg-brand-olive text-white rounded-lg hover:bg-brand-olive-dark transition-colors">
                            Ajukan Penarikan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
function openWithdrawModal() {
    document.getElementById('withdrawModal').classList.remove('hidden');
}

function closeWithdrawModal() {
    document.getElementById('withdrawModal').classList.add('hidden');
}

// Close modal when clicking outside
document.getElementById('withdrawModal').addEventListener('click', function(e) {
    if (e.target === this) {
        closeWithdrawModal();
    }
});
</script>

@endsection