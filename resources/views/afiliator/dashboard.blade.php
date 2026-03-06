@extends('layouts.afiliator.header')

@section('content')
<div class="max-w-6xl mx-auto">
    <h3 class="text-3xl font-serif text-brand-olive mb-8">Ringkasan Performa</h3>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-10">
        <div class="bg-white p-6 rounded-2xl shadow-sm border border-brand-cream">
            <p class="text-sm text-gray-500 mb-1">Total Produk Terjual</p>
            <h4 class="text-3xl font-bold">{{ number_format($totalProductsSold) }}</h4>
            <div class="mt-2 text-xs text-green-600 font-medium">Melalui Referral Anda</div>
        </div>

        <div class="bg-white p-6 rounded-2xl shadow-sm border border-brand-cream">
            <p class="text-sm text-gray-500 mb-1">Total Komisi</p>
            <h4 class="text-3xl font-bold text-brand-terracotta">Rp {{ number_format($totalCommissions, 0, ',', '.') }}</h4>
            <div class="mt-2 text-xs text-gray-400 uppercase tracking-tighter">Saldo Tersedia</div>
        </div>

        <div class="bg-white p-6 rounded-2xl shadow-sm border border-brand-cream">
            <p class="text-sm text-gray-500 mb-1">Komisi Bulan Ini</p>
            <h4 class="text-3xl font-bold text-brand-olive">Rp {{ number_format($currentMonthCommissions, 0, ',', '.') }}</h4>
            <div class="mt-2 text-xs text-gray-400 font-medium">{{ \Carbon\Carbon::now()->format('F Y') }}</div>
        </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const ctx = document.getElementById('salesChart').getContext('2d');
    const salesChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: @json($chartLabels),
            datasets: [{
                label: 'Produk Terjual',
                data: @json($chartData),
                borderColor: 'rgb(75, 192, 192)',
                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                tension: 0.1
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    position: 'top',
                },
                title: {
                    display: true,
                    text: 'Penjualan Melalui Referral Kode'
                }
            }
        }
    });
</script>
@endsection