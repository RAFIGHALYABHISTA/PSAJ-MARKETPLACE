@extends('layouts.afiliator.header')

@section('content')
<div class="max-w-6xl mx-auto px-4 py-8 font-sariayu-sans text-brand-text ">
    
    <div class="mb-10">
        <h3 class="text-4xl font-sariayu-serif text-brand-olive mb-2">Ringkasan Performa</h3>
        <p class="text-gray-500 italic">Pantau perkembangan langkah bisnismu di Dashboard</p>
        <div class="w-20 h-1 bg-brand-olive mt-4"></div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-12">
        <div class="bg-white p-8 rounded-[2rem] shadow-sm border border-brand-cream hover:shadow-md transition-shadow">
            <p class="text-xs uppercase tracking-widest text-gray-400 mb-3 font-semibold">Produk Terjual</p>
            <h4 id="totalProductsSold" class="text-4xl font-sariayu-serif text-brand-text">{{ number_format($totalProductsSold) }}</h4>
            <div class="mt-4 inline-flex items-center px-3 py-1 rounded-full bg-brand-cream text-brand-olive text-xs font-medium">
                <span class="w-2 h-2 bg-brand-olive rounded-full mr-2"></span>
                Kode Referral: {{ $affiliator->referral_code ?? 'N/A' }}
            </div>
        </div>

        <div class="bg-white p-8 rounded-[2rem] shadow-sm border border-brand-cream hover:shadow-md transition-shadow">
             <div class="absolute -right-4 -top-4 w-16 h-16 bg-brand-terracotta opacity-5 rounded-full"></div>
            
            <p class="text-xs uppercase tracking-widest text-brand-terracotta mb-3 font-semibold">Total Komisi</p>
            <h4 id="totalCommissions" class="text-4xl font-sariayu-serif text-brand-terracotta">
                <span class="text-xl font-sans">Rp</span> {{ number_format($totalCommissions, 0, ',', '.') }}
            </h4>
            <div class="mt-4 text-xs text-gray-500 uppercase tracking-tighter">Saldo Tersedia</div>
        </div>

        <div class="bg-white p-8 rounded-[2rem] shadow-sm border border-brand-cream hover:shadow-md transition-shadow">
            <p class="text-xs uppercase tracking-widest text-gray-400 mb-3 font-semibold">Bulan Ini</p>
            <h4 id="currentMonthCommissions" class="text-4xl font-sariayu-serif text-brand-olive">
                <span class="text-xl font-sans">Rp</span> {{ number_format($currentMonthCommissions, 0, ',', '.') }}
            </h4>
            <div class="mt-4 text-xs text-brand-olive font-medium opacity-70">{{ \Carbon\Carbon::now()->translatedFormat('F Y') }}</div>
        </div>
    </div>

    <div class="bg-white p-8 rounded-[2rem] shadow-sm border border-brand-cream">
        <div class="flex items-center justify-between mb-8">
            <h5 class="text-xl font-sariayu-serif text-brand-olive font-bold">Grafik Penjualan</h5>
            <span class="text-xs text-gray-400 font-sariayu-sans">7 Hari Terakhir</span>
        </div>
        <div class="relative h-[350px]">
            <canvas id="salesChart"></canvas>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const ctx = document.getElementById('salesChart').getContext('2d');
    
    const brandOlive = '#6b7331'; 
    
    const gradient = ctx.createLinearGradient(0, 0, 0, 400);
    gradient.addColorStop(0, 'rgba(107, 115, 49, 0.2)');
    gradient.addColorStop(1, 'rgba(107, 115, 49, 0)');

    const salesChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: @json($chartLabels),
            datasets: [{
                label: 'Produk Terjual',
                data: @json($chartData),
                borderColor: brandOlive,
                backgroundColor: gradient,
                fill: true,
                borderWidth: 3,
                pointBackgroundColor: '#fff',
                pointBorderColor: brandOlive,
                pointBorderWidth: 2,
                pointRadius: 4,
                pointHoverRadius: 6,
                tension: 0.4 
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: { display: false }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    grid: { color: '#f3f1ec' },
                    ticks: { 
                        color: '#9ca3af',
                        font: { family: 'Inter', size: 11 } 
                    }
                },
                x: {
                    grid: { display: false },
                    ticks: { 
                        color: '#9ca3af',
                        font: { family: 'Inter', size: 11 } 
                    }
                }
            }
        }
    });

    // Real-time data polling
    let lastUpdate = Date.now();
    let isUpdating = false;

    function updateDashboardData() {
        if (isUpdating) return;
        isUpdating = true;

        fetch('{{ route("afiliator.api.dashboard-data") }}', {
            method: 'GET',
            headers: {
                'X-Requested-With': 'XMLHttpRequest',
                'Accept': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            }
        })
        .then(response => response.json())
        .then(data => {
            // Update metrics with animation
            animateNumber('totalProductsSold', data.totalProductsSold);
            animateNumber('totalCommissions', data.totalCommissions, true);
            animateNumber('currentMonthCommissions', data.currentMonthCommissions, true);

            // Update chart data
            salesChart.data.labels = data.chartLabels;
            salesChart.data.datasets[0].data = data.chartData;
            salesChart.update('none'); // Update without animation for smoother experience

            lastUpdate = Date.now();
        })
        .catch(error => {
            console.error('Error updating dashboard data:', error);
        })
        .finally(() => {
            isUpdating = false;
        });
    }

    // Animate number changes
    function animateNumber(elementId, newValue, isCurrency = false) {
        const element = document.getElementById(elementId);
        if (!element) return;

        const currentText = element.textContent.replace(/[^\d]/g, '');
        const currentValue = parseInt(currentText) || 0;
        const targetValue = parseInt(newValue) || 0;

        if (currentValue === targetValue) return;

        // Simple animation
        const duration = 1000; // 1 second
        const startTime = Date.now();
        const startValue = currentValue;

        function updateNumber() {
            const elapsed = Date.now() - startTime;
            const progress = Math.min(elapsed / duration, 1);

            // Easing function
            const easeOutQuart = 1 - Math.pow(1 - progress, 4);
            const current = Math.round(startValue + (targetValue - startValue) * easeOutQuart);

            if (isCurrency) {
                element.innerHTML = '<span class="text-xl font-sans">Rp</span> ' + current.toLocaleString('id-ID');
            } else {
                element.textContent = current.toLocaleString('id-ID');
            }

            if (progress < 1) {
                requestAnimationFrame(updateNumber);
            }
        }

        updateNumber();
    }

    // Start polling every 30 seconds
    setInterval(updateDashboardData, 30000);

    // Also update on page focus (when user comes back to tab)
    document.addEventListener('visibilitychange', function() {
        if (!document.hidden) {
            // Check if it's been more than 30 seconds since last update
            if (Date.now() - lastUpdate > 30000) {
                updateDashboardData();
            }
        }
    });

    // Initial update after 5 seconds
    setTimeout(updateDashboardData, 5000);
</script>
@endsection