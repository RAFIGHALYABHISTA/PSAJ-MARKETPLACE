@extends('layouts.admin.header')

@section('content')
<div class="flex-1 bg-gray-50 min-h-screen">
    <header class="bg-white border-b border-gray-200 sticky top-0 z-10 p-4 px-8 flex justify-between items-center">
        <div>
            <h1 class="text-xl font-bold text-gray-800">Pencairan Komisi</h1>
            <p class="text-xs text-gray-500">Kelola permintaan pencairan komisi afiliator.</p>
        </div>
        <button class="bg-indigo-600 text-white px-4 py-2 rounded-lg text-sm font-semibold hover:bg-indigo-700 shadow-sm transition">
            <i class="fas fa-plus mr-2"></i> Proses Pencairan
        </button>
    </header>

    <div class="p-8">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
            <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100">
                <div class="flex justify-between items-start mb-4">
                    <div class="p-3 bg-blue-100 text-blue-600 rounded-xl"><i class="fas fa-clock"></i></div>
                </div>
                <p class="text-gray-500 text-sm">Menunggu Proses</p>
                <h2 class="text-2xl font-bold">{{ $stats['pending'] }}</h2>
                <p class="text-xs text-gray-400 mt-2">Rp {{ number_format($totalPending, 0, ',', '.') }}</p>
            </div>
            <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100">
                <div class="flex justify-between items-start mb-4">
                    <div class="p-3 bg-yellow-100 text-yellow-600 rounded-xl"><i class="fas fa-hourglass-half"></i></div>
                </div>
                <p class="text-gray-500 text-sm">Disetujui</p>
                <h2 class="text-2xl font-bold">{{ $stats['approved'] }}</h2>
                <p class="text-xs text-gray-400 mt-2">Rp {{ number_format($totalApproved, 0, ',', '.') }}</p>
            </div>
            <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100">
                <div class="flex justify-between items-start mb-4">
                    <div class="p-3 bg-green-100 text-green-600 rounded-xl"><i class="fas fa-check-circle"></i></div>
                </div>
                <p class="text-gray-500 text-sm">Selesai</p>
                <h2 class="text-2xl font-bold">{{ $stats['paid'] }}</h2>
                <p class="text-xs text-gray-400 mt-2">Rp {{ number_format($totalPaid, 0, ',', '.') }}</p>
            </div>
        </div>

        <div class="bg-white rounded-2xl shadow-sm border border-gray-100">
            <div class="p-6 border-b border-gray-100">
                <h3 class="font-bold text-gray-800">Daftar Pencairan (Total: {{ $commissions->total() }})</h3>
            </div>
            <div class="overflow-x-auto">
                <table class="w-full text-left">
                    <thead class="bg-gray-50/50 text-gray-500 text-[11px] uppercase tracking-wider">
                        <tr>
                            <th class="px-6 py-4 font-bold">Afiliator</th>
                            <th class="px-6 py-4 font-bold">Jumlah</th>
                            <th class="px-6 py-4 font-bold">Invoice</th>
                            <th class="px-6 py-4 font-bold">Tanggal</th>
                            <th class="px-6 py-4 font-bold">Status</th>
                            <th class="px-6 py-4 font-bold text-right">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">
                        @forelse($commissions as $commission)
                        <tr class="hover:bg-gray-50 transition">
                            <td class="px-6 py-4 font-medium">{{ $commission->affiliator->name ?? 'N/A' }}</td>
                            <td class="px-6 py-4 font-bold text-indigo-600">Rp {{ number_format($commission->amount, 0, ',', '.') }}</td>
                            <td class="px-6 py-4 text-sm">{{ $commission->order->invoice_number ?? '-' }}</td>
                            <td class="px-6 py-4 text-sm">{{ $commission->created_at->format('d M Y') }}</td>
                            <td class="px-6 py-4">
                                <span class="px-3 py-1 text-[10px] font-bold rounded-full
                                    {{ $commission->status === 'pending' ? 'bg-blue-100 text-blue-700' : '' }}
                                    {{ $commission->status === 'approved' ? 'bg-yellow-100 text-yellow-700' : '' }}
                                    {{ $commission->status === 'paid' ? 'bg-green-100 text-green-700' : '' }}">
                                    {{ ucfirst($commission->status) }}
                                </span>
                            </td>
                            <td class="px-6 py-4 text-right">
                                <div class="flex gap-2 justify-end">
                                    <a href="{{ route('admin.pencairan.edit', $commission) }}" class="text-indigo-600 hover:text-indigo-900 text-sm font-semibold">Edit</a>
                                    <form action="{{ route('admin.pencairan.destroy', $commission) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" onclick="return confirm('Yakin?')" class="text-red-600 hover:text-red-900 text-sm font-semibold">Hapus</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" class="px-6 py-8 text-center text-gray-500">Belum ada pencairan komisi</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            @if($commissions->hasPages())
            <div class="p-6 bg-gray-50/30 flex justify-between items-center border-t border-gray-100">
                <p class="text-xs text-gray-500">Menampilkan <b>{{ $commissions->firstItem() ?? 0 }} - {{ $commissions->lastItem() ?? 0 }}</b> dari <b>{{ $commissions->total() }}</b> Data</p>
                <div>
                    {{ $commissions->links() }}
                </div>
            </div>
            @endif
        </div>
    </div>
</div>
@endsection
