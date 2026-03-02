@extends('layouts.admin.header')

@section('content')
<div class="flex-1 bg-gray-50 min-h-screen">
    <header class="bg-white border-b border-gray-200 sticky top-0 z-10 p-4 px-8 flex justify-between items-center">
        <div>
            <h1 class="text-xl font-bold text-gray-800">Transaksi Pembayaran</h1>
            <p class="text-xs text-gray-500">Pantau semua transaksi pembayaran.</p>
        </div>
        <button class="bg-indigo-600 text-white px-4 py-2 rounded-lg text-sm font-semibold hover:bg-indigo-700 shadow-sm transition">
            <i class="fas fa-download mr-2"></i> Unduh Laporan
        </button>
    </header>

    <div class="p-8">
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100">
            <div class="p-6 border-b border-gray-100">
                <h3 class="font-bold text-gray-800">Riwayat Transaksi (Total: {{ $payments->total() }})</h3>
            </div>
            <div class="overflow-x-auto">
                <table class="w-full text-left">
                    <thead class="bg-gray-50/50 text-gray-500 text-[11px] uppercase tracking-wider">
                        <tr>
                            <th class="px-6 py-4 font-bold">Invoice</th>
                            <th class="px-6 py-4 font-bold">Jumlah</th>
                            <th class="px-6 py-4 font-bold">Tanggal Pembayaran</th>
                            <th class="px-6 py-4 font-bold">Status</th>
                            <th class="px-6 py-4 font-bold text-right">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">
                        @forelse($payments as $payment)
                        <tr class="hover:bg-gray-50 transition">
                            <td class="px-6 py-4 font-medium text-indigo-600">{{ $payment->order->invoice_number ?? 'N/A' }}</td>
                            <td class="px-6 py-4">Rp {{ number_format($payment->order->total_price ?? 0, 0, ',', '.') }}</td>
                            <td class="px-6 py-4 text-sm">{{ $payment->paid_at ? $payment->paid_at->format('d M Y') : '-' }}</td>
                            <td class="px-6 py-4">
                                <span class="px-3 py-1 text-[10px] font-bold rounded-full
                                    {{ $payment->status === 'pending' ? 'bg-yellow-100 text-yellow-700' : '' }}
                                    {{ $payment->status === 'verified' ? 'bg-green-100 text-green-700' : '' }}
                                    {{ $payment->status === 'failed' ? 'bg-red-100 text-red-700' : '' }}">
                                    {{ ucfirst($payment->status) }}
                                </span>
                            </td>
                            <td class="px-6 py-4 text-right">
                                <div class="flex gap-2 justify-end">
                                    <a href="{{ route('admin.transaksi-qris.edit', $payment) }}" class="text-indigo-600 hover:text-indigo-900 text-sm font-semibold">Edit</a>
                                    <form action="{{ route('admin.transaksi-qris.destroy', $payment) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" onclick="return confirm('Yakin?')" class="text-red-600 hover:text-red-900 text-sm font-semibold">Hapus</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="px-6 py-8 text-center text-gray-500">Belum ada transaksi pembayaran</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            @if($payments->hasPages())
            <div class="p-6 bg-gray-50/30 flex justify-between items-center border-t border-gray-100">
                <p class="text-xs text-gray-500">Menampilkan <b>{{ $payments->firstItem() ?? 0 }} - {{ $payments->lastItem() ?? 0 }}</b> dari <b>{{ $payments->total() }}</b> Data</p>
                <div>
                    {{ $payments->links() }}
                </div>
            </div>
            @endif
        </div>
    </div>
</div>
@endsection
