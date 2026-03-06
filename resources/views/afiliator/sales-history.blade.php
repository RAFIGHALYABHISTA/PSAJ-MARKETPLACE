@extends('layouts.afiliator.header')

@section('content')
<div class="max-w-6xl mx-auto">
    <div class="mb-8">
        <h3 class="text-3xl font-serif text-brand-olive mb-2">Riwayat Penjualan</h3>
        <p class="text-gray-500">Daftar semua penjualan yang terjadi melalui referral kode Anda</p>
    </div>

    @if($salesHistory->count() > 0)
        <div class="bg-white rounded-2xl shadow-sm border border-brand-cream overflow-x-auto">
            <table class="w-full">
                <thead>
                    <tr class="border-b border-brand-cream bg-brand-cream/30">
                        <th class="px-6 py-4 text-left text-sm font-semibold text-brand-olive">No. Invoice</th>
                        <th class="px-6 py-4 text-left text-sm font-semibold text-brand-olive">Pelanggan</th>
                        <th class="px-6 py-4 text-left text-sm font-semibold text-brand-olive">Produk</th>
                        <th class="px-6 py-4 text-center text-sm font-semibold text-brand-olive">Jumlah</th>
                        <th class="px-6 py-4 text-right text-sm font-semibold text-brand-olive">Total Harga</th>
                        <th class="px-6 py-4 text-right text-sm font-semibold text-brand-olive">Komisi</th>
                        <th class="px-6 py-4 text-center text-sm font-semibold text-brand-olive">Status</th>
                        <th class="px-6 py-4 text-center text-sm font-semibold text-brand-olive">Tanggal</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($salesHistory as $order)
                        <tr class="border-b border-gray-100 hover:bg-brand-cream/20 transition-colors">
                            <td class="px-6 py-4 text-sm font-medium text-gray-900">{{ $order->invoice_number }}</td>
                            <td class="px-6 py-4 text-sm text-gray-700">{{ $order->customer->name ?? '-' }}</td>
                            <td class="px-6 py-4 text-sm text-gray-700">
                                @if($order->orderItems->count() > 0)
                                    @foreach($order->orderItems as $item)
                                        <div>{{ $item->product->name ?? 'Produk dihapus' }}</div>
                                    @endforeach
                                @else
                                    -
                                @endif
                            </td>
                            <td class="px-6 py-4 text-center text-sm text-gray-700">
                                @if($order->orderItems->count() > 0)
                                    @foreach($order->orderItems as $item)
                                        <div>{{ $item->quantity }}</div>
                                    @endforeach
                                @else
                                    -
                                @endif
                            </td>
                            <td class="px-6 py-4 text-right text-sm font-medium text-gray-900">
                                Rp {{ number_format($order->total_price, 0, ',', '.') }}
                            </td>
                            <td class="px-6 py-4 text-right text-sm font-medium text-brand-terracotta">
                                Rp {{ number_format($order->commission_amount, 0, ',', '.') }}
                            </td>
                            <td class="px-6 py-4 text-center text-sm">
                                @if($order->payment_status === 'paid')
                                    <span class="inline-block px-3 py-1 text-xs font-semibold text-green-700 bg-green-100 rounded-full">
                                        Lunas
                                    </span>
                                @elseif($order->payment_status === 'pending')
                                    <span class="inline-block px-3 py-1 text-xs font-semibold text-yellow-700 bg-yellow-100 rounded-full">
                                        Pending
                                    </span>
                                @else
                                    <span class="inline-block px-3 py-1 text-xs font-semibold text-red-700 bg-red-100 rounded-full">
                                        Gagal
                                    </span>
                                @endif
                            </td>
                            <td class="px-6 py-4 text-center text-sm text-gray-600">
                                {{ $order->created_at->format('d M Y') }}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <div class="mt-6">
            {{ $salesHistory->links() }}
        </div>
    @else
        <div class="bg-white rounded-2xl shadow-sm border border-brand-cream p-12 text-center">
            <p class="text-gray-500 text-lg mb-2">Belum ada penjualan melalui referral kode Anda</p>
            <p class="text-gray-400 text-sm">Mulai bagikan referral link Anda untuk mendapatkan komisi dari penjualan</p>
            <a href="{{ route('afiliator.dashboard') }}" class="inline-block mt-6 px-6 py-2.5 bg-brand-olive text-white rounded-full text-sm font-semibold hover:bg-brand-olive/90 transition-colors">
                Kembali ke Dashboard
            </a>
        </div>
    @endif
</div>
@endsection
