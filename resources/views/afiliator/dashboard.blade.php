@extends('layouts.afiliator.header')

@section('content')
    <div class="flex items-center justify-between mb-6">
        <h1 class="text-2xl font-bold">Dashboard Afiliator</h1>
        <div class="text-sm text-gray-600">Halo, {{ auth()->user()->name ?? 'Afiliator' }}</div>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 mb-6">
        <div class="bg-white p-4 rounded shadow">
            <h2 class="text-sm font-semibold text-gray-600 mb-2">Total Produk</h2>
            <p class="text-2xl font-bold">{{ $totalProducts ?? 0 }}</p>
        </div>
        <div class="bg-white p-4 rounded shadow">
            <h2 class="text-sm font-semibold text-gray-600 mb-2">Total Pesanan</h2>
            <p class="text-2xl font-bold">{{ $totalOrders ?? 0 }}</p>
        </div>
        <div class="bg-white p-4 rounded shadow">
            <h2 class="text-sm font-semibold text-gray-600 mb-2">Total Komisi</h2>
            <p class="text-2xl font-bold text-green-600">Rp {{ number_format($totalCommissions ?? 0, 0, ',', '.') }}</p>
        </div>
        <div class="bg-white p-4 rounded shadow">
            <h2 class="text-sm font-semibold text-gray-600 mb-2">Konversi</h2>
            <p class="text-2xl font-bold">{{ isset($conversionRate) ? $conversionRate . '%' : '—' }}</p>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <div class="lg:col-span-2 bg-white rounded shadow p-4">
            <div class="flex items-center justify-between mb-4">
                <h2 class="text-lg font-semibold">Pesanan Terbaru</h2>
                {{-- <a href="{{ route('afiliator.orders') }}" class="text-sm text-blue-600">Lihat semua</a> --}}
            </div>

            <div class="overflow-x-auto">
                <table class="w-full text-left text-sm">
                    <thead class="text-gray-600">
                        <tr>
                            <th class="py-2">#</th>
                            <th class="py-2">Pelanggan</th>
                            <th class="py-2">Total</th>
                            <th class="py-2">Status</th>
                            <th class="py-2">Tanggal</th>
                            <th class="py-2">Komisi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($recentOrders ?? [] as $order)
                            <tr class="border-t">
                                <td class="py-2">{{ $order->id }}</td>
                                <td class="py-2">{{ $order->customer_name ?? $order->user->name ?? '—' }}</td>
                                <td class="py-2">Rp {{ number_format($order->total ?? 0, 0, ',', '.') }}</td>
                                <td class="py-2">{{ ucfirst($order->status ?? '—') }}</td>
                                <td class="py-2">{{ $order->created_at->format('d M Y') ?? '—' }}</td>
                                <td class="py-2">Rp {{ number_format($order->commission ?? 0, 0, ',', '.') }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td class="py-4 text-center text-gray-500" colspan="6">Belum ada pesanan.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <div class="bg-white rounded shadow p-4">
            <h2 class="text-lg font-semibold mb-3">Ringkasan Komisi</h2>
            @if(!empty($recentCommissions ?? []))
                <ul class="space-y-3">
                    @foreach($recentCommissions as $c)
                        <li class="flex justify-between items-start">
                            <div>
                                <div class="text-sm font-medium">{{ $c->source ?? 'Transaksi' }}</div>
                                <div class="text-xs text-gray-500">{{ $c->created_at->format('d M Y') }}</div>
                            </div>
                            <div class="text-right text-green-600 font-semibold">Rp {{ number_format($c->amount ?? 0, 0, ',', '.') }}</div>
                        </li>
                    @endforeach
                </ul>
            @else
                <div class="text-sm text-gray-500">Belum ada komisi.</div>
            @endif

            <div class="mt-4">
                {{-- <a href="{{ route('afiliator.commissions') }}" class="text-sm text-blue-600">Lihat riwayat komisi</a> --}}
            </div>
        </div>
    </div>

    <div class="mt-6 bg-white rounded shadow p-4">
        <h2 class="text-lg font-semibold mb-4">Performa (7 hari terakhir)</h2>
        <canvas id="affiliateChart" height="80"></canvas>
    </div>

@endsection

{{-- @push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        (function() {
            const ctx = document.getElementById('affiliateChart');
            if (!ctx) return;

            const labels = {!! json_encode($chartLabels ?? []) !!};
            const data = {!! json_encode($chartData ?? []) !!};

            new Chart(ctx, {
                type: 'line',
                data: {
                    labels: labels,
                    datasets: [{
                        label: 'Komisi (Rp)',
                        data: data,
                        borderColor: '#34D399',
                        backgroundColor: 'rgba(52,211,153,0.08)',
                        tension: 0.3,
                        fill: true
                    }]
                },
                options: {
                    responsive: true,
                    plugins: { legend: { display: false } },
                    scales: { y: { ticks: { callback: function(v){ return 'Rp ' + v.toLocaleString(); } } } }
                }
            });
        })();
    </script>
@endpush --}}