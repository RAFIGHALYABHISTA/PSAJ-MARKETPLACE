@extends('layouts.afiliator.header')

@section('content')
    <div class="mb-8 flex flex-col md:flex-row md:items-center justify-between gap-4">
        <div>
            <h1 class="text-3xl font-extrabold text-gray-900 tracking-tight">Komisi Saya</h1>
            <p class="text-gray-500 text-sm mt-1">Pantau penghasilan dan performa afiliasi Anda secara real-time.</p>
        </div>
        <div class="bg-green-50 border border-green-100 rounded-2xl p-4 flex items-center gap-4">
            <div class="p-3 bg-green-500 rounded-xl text-white">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
            </div>
            <div>
                <div class="text-xs font-semibold text-green-700 uppercase tracking-wider">Total Komisi</div>
                <div class="text-2xl font-black text-green-600">Rp {{ number_format($totalCommissions ?? 0, 0, ',', '.') }}</div>
            </div>
        </div>
    </div>

    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 mb-8 flex flex-col sm:flex-row items-center justify-between gap-6">
        <div class="flex items-center gap-4">
            <div class="hidden sm:flex h-12 w-12 items-center justify-center rounded-full bg-blue-50 text-blue-600">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z" />
                </svg>
            </div>
            <div>
                <h3 class="text-sm font-medium text-gray-500">Saldo Tersedia</h3>
                <p class="text-3xl font-bold text-gray-900">Rp {{ number_format($availableBalance ?? ($totalCommissions ?? 0), 0, ',', '.') }}</p>
                <p class="text-xs text-gray-400 mt-1 flex items-center gap-1">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd" />
                    </svg>
                    Saldo termasuk komisi yang belum dicairkan
                </p>
            </div>
        </div>

        <div class="flex items-center gap-3 w-full sm:w-auto">
            <form action="{{ route('afiliator.commissions.withdraw') }}" method="POST" class="w-full sm:w-auto">
                @csrf
                <button type="submit" class="w-full px-6 py-2.5 bg-blue-600 text-white font-semibold rounded-xl hover:bg-blue-700 transition duration-200 shadow-md shadow-blue-100">
                    Tarik Komisi
                </button>
            </form>
            <a href="{{ route('afiliator.commissions') }}" class="w-full sm:w-auto px-6 py-2.5 border border-gray-200 rounded-xl hover:bg-gray-50 text-sm font-medium text-gray-600 text-center transition duration-200">
                Riwayat
            </a>
        </div>
    </div>

    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
        <div class="px-6 py-4 border-b border-gray-50 bg-gray-50/50">
            <h2 class="font-bold text-gray-800">Transaksi Terbaru</h2>
        </div>
        <div class="overflow-x-auto">
            <table class="w-full text-left text-sm">
                <thead>
                    <tr class="bg-white">
                        <th class="px-6 py-4 font-bold text-gray-400 uppercase text-[10px] tracking-widest">#</th>
                        <th class="px-6 py-4 font-bold text-gray-400 uppercase text-[10px] tracking-widest">Sumber Pendapatan</th>
                        <th class="px-6 py-4 font-bold text-gray-400 uppercase text-[10px] tracking-widest">Jumlah</th>
                        <th class="px-6 py-4 font-bold text-gray-400 uppercase text-[10px] tracking-widest">Status</th>
                        <th class="px-6 py-4 font-bold text-gray-400 uppercase text-[10px] tracking-widest text-right">Tanggal</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-50">
                    @forelse($recentCommissions ?? [] as $idx => $c)
                        <tr class="hover:bg-gray-50/50 transition-colors">
                            <td class="px-6 py-4 text-gray-400 font-medium">{{ $idx + 1 }}</td>
                            <td class="px-6 py-4">
                                <div class="font-semibold text-gray-700">{{ $c->source ?? ('Order #' . ($c->order_id ?? '—')) }}</div>
                            </td>
                            <td class="px-6 py-4">
                                <span class="text-green-600 font-bold">Rp {{ number_format($c->amount ?? 0, 0, ',', '.') }}</span>
                            </td>
                            <td class="px-6 py-4">
                                @if(($c->status ?? '') === 'approved')
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-bold bg-green-100 text-green-700">
                                        <span class="w-1 h-1 mr-1.5 rounded-full bg-green-500"></span> Disetujui
                                    </span>
                                @elseif(($c->status ?? '') === 'pending')
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-bold bg-amber-100 text-amber-700">
                                        <span class="w-1 h-1 mr-1.5 rounded-full bg-amber-500"></span> Pending
                                    </span>
                                @else
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-bold bg-gray-100 text-gray-600">
                                        {{ ucfirst($c->status ?? '—') }}
                                    </span>
                                @endif
                            </td>
                            <td class="px-6 py-4 text-right text-gray-500 tabular-nums">
                                {{ optional($c->created_at)->format('d M Y') ?? '—' }}
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td class="px-6 py-12 text-center" colspan="5">
                                <div class="flex flex-col items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-gray-200 mb-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                    </svg>
                                    <p class="text-gray-400 font-medium">Belum ada riwayat komisi.</p>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <div class="mt-8 flex justify-center">
        {{-- {{ $recentCommissions->links() }} --}}
    </div>
@endsection