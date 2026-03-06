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
            <button class="bg-brand-olive hover:bg-brand-olive-dark text-white px-6 py-3 rounded-2xl font-semibold text-sm transition-all shadow-md active:scale-95">
                Tarik Komisi
            </button>
        </div>
    </div>

    <!-- Riwayat Komisi -->
    <div class="bg-white rounded-2xl shadow-sm border border-brand-cream overflow-x-auto">
        @if($commissionHistory->count() > 0)
            <table class="w-full">
                <thead>
                    <tr class="border-b border-brand-cream bg-brand-cream/30">
                        <th class="px-6 py-4 text-left text-sm font-semibold text-brand-olive">Invoice</th>
                        <th class="px-6 py-4 text-left text-sm font-semibold text-brand-olive">Jumlah Komisi</th>
                        <th class="px-6 py-4 text-right text-sm font-semibold text-brand-olive">Status</th>
                        <th class="px-6 py-4 text-center text-sm font-semibold text-brand-olive">Tanggal</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($commissionHistory as $commission)
                        <tr class="border-b border-gray-100 hover:bg-brand-cream/20 transition-colors">
                            <td class="px-6 py-4 text-sm font-medium text-gray-900">{{ $commission->order->invoice_number ?? '-' }}</td>
                            <td class="px-6 py-4 text-sm font-medium text-brand-terracotta">Rp {{ number_format($commission->amount,0,',','.') }}</td>
                            <td class="px-6 py-4 text-right text-sm">
                                @if($commission->status === 'paid')
                                    <span class="inline-block px-3 py-1 text-xs font-semibold text-green-700 bg-green-100 rounded-full">Sudah Diterima</span>
                                @else
                                    <span class="inline-block px-3 py-1 text-xs font-semibold text-gray-700 bg-gray-100 rounded-full">Menunggu</span>
                                @endif
                            </td>
                            <td class="px-6 py-4 text-center text-sm text-gray-600">{{ $commission->created_at->format('d M Y') }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="mt-6 px-6 py-4">
                {{ $commissionHistory->links() }}
            </div>
        @else
            <div class="p-12 text-center text-gray-500">
                Belum ada komisi yang tercatat.
            </div>
        @endif
    </div>

</div>
@endsection