@extends('layouts.admin.header')

@section('content')
<div class="min-h-screen transition-colors duration-300 dark:bg-slate-950 bg-[#F8FAFC]">
    
    <header class="bg-white dark:bg-slate-900 border-b border-gray-200 dark:border-slate-800 sticky top-0 z-30 p-4 px-8 flex justify-between items-center">
        <div>
            <h1 class="text-xl font-bold text-slate-800 dark:text-white">Rekap Penjualan</h1>
            <p class="text-xs text-slate-400 font-medium">Laporan Keuangan & Pendapatan <span class="text-indigo-600">Sariayu x Smega</span></p>
        </div>
        
        <div class="flex items-center space-x-4">
            <button @click="darkMode = !darkMode; localStorage.setItem('dark', darkMode)" 
                    class="p-2 text-slate-400 hover:text-indigo-600 transition-colors">
                <i class="fas" :class="darkMode ? 'fa-sun' : 'fa-moon'"></i>
            </button>

            <button class="p-2 text-slate-400 hover:text-indigo-600 relative">
                <span class="absolute top-1 right-1 w-2 h-2 bg-red-500 rounded-full border-2 border-white dark:border-slate-900"></span>
                <i class="fas fa-bell"></i>
            </button>

            <button class="bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded text-xs font-bold transition-all active:scale-95 shadow-sm">
                <i class="fas fa-download mr-2 text-[10px]"></i> EXPORT EXCEL
            </button>
        </div>
    </header>

    <div class="p-8 max-w-[1600px] mx-auto">
        <!-- Filter Section -->
        <div class="bg-white dark:bg-slate-900 border border-gray-200 dark:border-slate-800 rounded-xl p-6 shadow-sm mb-8">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-4">
                <div>
                    <label class="block text-xs font-bold text-slate-600 dark:text-slate-300 uppercase mb-2">Dari Tanggal</label>
                    <input type="date" value="2026-03-01" class="w-full px-4 py-2.5 bg-slate-50 dark:bg-slate-800 border border-gray-200 dark:border-slate-700 rounded-lg text-xs focus:ring-2 ring-indigo-500 outline-none dark:text-white">
                </div>
                <div>
                    <label class="block text-xs font-bold text-slate-600 dark:text-slate-300 uppercase mb-2">Sampai Tanggal</label>
                    <input type="date" value="2026-03-06" class="w-full px-4 py-2.5 bg-slate-50 dark:bg-slate-800 border border-gray-200 dark:border-slate-700 rounded-lg text-xs focus:ring-2 ring-indigo-500 outline-none dark:text-white">
                </div>
                <div>
                    <label class="block text-xs font-bold text-slate-600 dark:text-slate-300 uppercase mb-2">Status Pembayaran</label>
                    <select class="w-full px-4 py-2.5 bg-slate-50 dark:bg-slate-800 border border-gray-200 dark:border-slate-700 rounded-lg text-xs focus:ring-2 ring-indigo-500 outline-none dark:text-white">
                        <option value="">Semua Status</option>
                        <option value="pending">Pending</option>
                        <option value="paid">Paid</option>
                        <option value="failed">Failed</option>
                    </select>
                </div>
                <div class="flex items-end gap-2">
                    <button class="flex-1 bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2.5 rounded-lg text-xs font-bold transition-all active:scale-95 shadow-sm">
                        <i class="fas fa-search mr-2"></i> FILTER
                    </button>
                    <button class="px-4 py-2.5 bg-slate-100 dark:bg-slate-800 border border-gray-200 dark:border-slate-700 rounded-lg text-xs font-bold hover:bg-slate-200 transition">
                        <i class="fas fa-redo"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- KPI Cards -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 mb-8">
            <!-- Total Pendapatan -->
            <div class="bg-white dark:bg-slate-900 p-6 rounded-xl border border-gray-200 dark:border-slate-800 shadow-sm hover:shadow-lg transition">
                <div class="flex justify-between items-start mb-3">
                    <div>
                        <p class="text-[10px] font-bold text-slate-400 uppercase tracking-wider mb-2">Total Pendapatan</p>
                        <h2 class="text-2xl font-bold text-slate-800 dark:text-white">Rp 45.200.000</h2>
                    </div>
                    <div class="bg-emerald-100 dark:bg-emerald-500/20 p-3 rounded-lg">
                        <i class="fas fa-chart-line text-emerald-600 dark:text-emerald-400 text-lg"></i>
                    </div>
                </div>
                <div class="flex items-center text-emerald-600 dark:text-emerald-400 text-xs font-bold">
                    <i class="fas fa-arrow-up mr-1"></i> +18% dari bulan lalu
                </div>
            </div>

            <!-- Total Order -->
            <div class="bg-white dark:bg-slate-900 p-6 rounded-xl border border-gray-200 dark:border-slate-800 shadow-sm hover:shadow-lg transition">
                <div class="flex justify-between items-start mb-3">
                    <div>
                        <p class="text-[10px] font-bold text-slate-400 uppercase tracking-wider mb-2">Total Pesanan</p>
                        <h2 class="text-2xl font-bold text-slate-800 dark:text-white">284</h2>
                    </div>
                    <div class="bg-blue-100 dark:bg-blue-500/20 p-3 rounded-lg">
                        <i class="fas fa-shopping-cart text-blue-600 dark:text-blue-400 text-lg"></i>
                    </div>
                </div>
                <div class="flex items-center text-blue-600 dark:text-blue-400 text-xs font-bold">
                    <i class="fas fa-arrow-up mr-1"></i> +12 pesanan hari ini
                </div>
            </div>

            <!-- Total Komisi -->
            <div class="bg-white dark:bg-slate-900 p-6 rounded-xl border border-gray-200 dark:border-slate-800 shadow-sm hover:shadow-lg transition">
                <div class="flex justify-between items-start mb-3">
                    <div>
                        <p class="text-[10px] font-bold text-slate-400 uppercase tracking-wider mb-2">Total Komisi</p>
                        <h2 class="text-2xl font-bold text-slate-800 dark:text-white">Rp 9.040.000</h2>
                    </div>
                    <div class="bg-purple-100 dark:bg-purple-500/20 p-3 rounded-lg">
                        <i class="fas fa-handshake text-purple-600 dark:text-purple-400 text-lg"></i>
                    </div>
                </div>
                <div class="flex justify-between text-xs text-slate-500 dark:text-slate-400 mt-2">
                    <span>Approved: Rp 5.500.000</span>
                    <span>Pending: Rp 3.540.000</span>
                </div>
            </div>

            <!-- Margin Keuntungan -->
            <div class="bg-white dark:bg-slate-900 p-6 rounded-xl border border-gray-200 dark:border-slate-800 shadow-sm hover:shadow-lg transition">
                <div class="flex justify-between items-start mb-3">
                    <div>
                        <p class="text-[10px] font-bold text-slate-400 uppercase tracking-wider mb-2">Margin Bersih</p>
                        <h2 class="text-2xl font-bold text-slate-800 dark:text-white">Rp 36.160.000</h2>
                    </div>
                    <div class="bg-rose-100 dark:bg-rose-500/20 p-3 rounded-lg">
                        <i class="fas fa-wallet text-rose-600 dark:text-rose-400 text-lg"></i>
                    </div>
                </div>
                <div class="text-xs text-slate-500 dark:text-slate-400">80% dari total pendapatan</div>
            </div>
        </div>

        <!-- Status Pembayaran Breakdown -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-8">
            <!-- Payment Status -->
            <div class="bg-white dark:bg-slate-900 border border-gray-200 dark:border-slate-800 rounded-xl shadow-sm overflow-hidden">
                <div class="p-5 border-b border-gray-100 dark:border-slate-800 bg-gray-50/50 dark:bg-slate-900/50">
                    <h3 class="font-bold text-slate-800 dark:text-white text-sm uppercase tracking-tight">Status Pembayaran</h3>
                </div>
                <div class="p-6 space-y-3">
                    <div class="flex justify-between items-center pb-3 border-b border-gray-100 dark:border-slate-800">
                        <div>
                            <p class="text-xs font-bold text-slate-600 dark:text-slate-300 uppercase">Paid</p>
                            <p class="text-sm text-slate-400">Pembayaran Terverifikasi</p>
                        </div>
                        <div class="text-right">
                            <p class="text-xl font-bold text-emerald-600 dark:text-emerald-400">225</p>
                            <p class="text-xs text-slate-400">78%</p>
                        </div>
                    </div>
                    
                    <div class="flex justify-between items-center pb-3 border-b border-gray-100 dark:border-slate-800">
                        <div>
                            <p class="text-xs font-bold text-slate-600 dark:text-slate-300 uppercase">Pending</p>
                            <p class="text-sm text-slate-400">Menunggu Verifikasi</p>
                        </div>
                        <div class="text-right">
                            <p class="text-xl font-bold text-amber-600 dark:text-amber-400">45</p>
                            <p class="text-xs text-slate-400">16%</p>
                        </div>
                    </div>

                    <div class="flex justify-between items-center">
                        <div>
                            <p class="text-xs font-bold text-slate-600 dark:text-slate-300 uppercase">Failed</p>
                            <p class="text-sm text-slate-400">Pembayaran Gagal</p>
                        </div>
                        <div class="text-right">
                            <p class="text-xl font-bold text-rose-600 dark:text-rose-400">14</p>
                            <p class="text-xs text-slate-400">6%</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Metode Pembayaran -->
            <div class="bg-white dark:bg-slate-900 border border-gray-200 dark:border-slate-800 rounded-xl shadow-sm overflow-hidden">
                <div class="p-5 border-b border-gray-100 dark:border-slate-800 bg-gray-50/50 dark:bg-slate-900/50">
                    <h3 class="font-bold text-slate-800 dark:text-white text-sm uppercase tracking-tight">Metode Pembayaran</h3>
                </div>
                <div class="p-6 space-y-3">
                    <div class="flex justify-between items-center pb-3 border-b border-gray-100 dark:border-slate-800">
                        <div class="flex items-center gap-2">
                            <i class="fas fa-mobile text-indigo-600 text-lg"></i>
                            <div>
                                <p class="text-xs font-bold text-slate-600 dark:text-slate-300">QRIS Online</p>
                                <p class="text-xs text-slate-400">Transfer Digital</p>
                            </div>
                        </div>
                        <div class="text-right">
                            <p class="text-lg font-bold text-slate-700 dark:text-slate-200">189</p>
                            <p class="text-xs text-slate-400">67%</p>
                        </div>
                    </div>

                    <div class="flex justify-between items-center">
                        <div class="flex items-center gap-2">
                            <i class="fas fa-hand-holding-usd text-green-600 text-lg"></i>
                            <div>
                                <p class="text-xs font-bold text-slate-600 dark:text-slate-300">Offline</p>
                                <p class="text-xs text-slate-400">Transfer Manual</p>
                            </div>
                        </div>
                        <div class="text-right">
                            <p class="text-lg font-bold text-slate-700 dark:text-slate-200">95</p>
                            <p class="text-xs text-slate-400">33%</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Komisi Breakdown -->
            <div class="bg-white dark:bg-slate-900 border border-gray-200 dark:border-slate-800 rounded-xl shadow-sm overflow-hidden">
                <div class="p-5 border-b border-gray-100 dark:border-slate-800 bg-gray-50/50 dark:bg-slate-900/50">
                    <h3 class="font-bold text-slate-800 dark:text-white text-sm uppercase tracking-tight">Status Komisi</h3>
                </div>
                <div class="p-6 space-y-3">
                    <div class="flex justify-between items-center pb-3 border-b border-gray-100 dark:border-slate-800">
                        <div>
                            <p class="text-xs font-bold text-slate-600 dark:text-slate-300 uppercase">Approved</p>
                            <p class="text-sm text-slate-400">Siap Dibayarkan</p>
                        </div>
                        <div class="text-right">
                            <p class="text-lg font-bold text-emerald-600 dark:text-emerald-400">Rp 5.5M</p>
                            <p class="text-xs text-slate-400">45 komisi</p>
                        </div>
                    </div>

                    <div class="flex justify-between items-center pb-3 border-b border-gray-100 dark:border-slate-800">
                        <div>
                            <p class="text-xs font-bold text-slate-600 dark:text-slate-300 uppercase">Pending</p>
                            <p class="text-sm text-slate-400">Menunggu Approval</p>
                        </div>
                        <div class="text-right">
                            <p class="text-lg font-bold text-amber-600 dark:text-amber-400">Rp 3.5M</p>
                            <p class="text-xs text-slate-400">128 komisi</p>
                        </div>
                    </div>

                    <div class="flex justify-between items-center">
                        <div>
                            <p class="text-xs font-bold text-slate-600 dark:text-slate-300 uppercase">Paid</p>
                            <p class="text-sm text-slate-400">Sudah Dibayarkan</p>
                        </div>
                        <div class="text-right">
                            <p class="text-lg font-bold text-blue-600 dark:text-blue-400">Rp 8.2M</p>
                            <p class="text-xs text-slate-400">89 komisi</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Transaksi Detail Table -->
        <div class="bg-white dark:bg-slate-900 border border-gray-200 dark:border-slate-800 rounded-xl shadow-sm overflow-hidden mb-8" x-data="{ detailModal: false, selectedTransaction: null }">
            <div class="p-5 border-b border-gray-100 dark:border-slate-800 flex justify-between items-center bg-gray-50/50 dark:bg-slate-900/50">
                <h3 class="font-bold text-slate-800 dark:text-white text-sm uppercase tracking-tight">Daftar Transaksi Penjualan</h3>
                <div class="relative">
                    <input type="text" placeholder="Cari invoice..." class="pl-10 pr-4 py-2 bg-white dark:bg-slate-800 border border-gray-200 dark:border-slate-700 rounded-lg text-xs focus:ring-2 ring-indigo-500 outline-none w-64 dark:text-white transition-all">
                    <i class="fas fa-search absolute left-3 top-2.5 text-slate-400 text-[10px]"></i>
                </div>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead class="bg-white dark:bg-slate-900 border-b border-gray-100 dark:border-slate-800 text-slate-400 text-[10px] uppercase tracking-widest font-bold">
                        <tr>
                            <th class="px-6 py-4">Invoice</th>
                            <th class="px-6 py-4">Customer</th>
                            <th class="px-6 py-4 text-right">Total</th>
                            <th class="px-6 py-4">Status Bayar</th>
                            <th class="px-6 py-4">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-50 dark:divide-slate-800">
                        <!-- Sample Data -->
                        <tr class="hover:bg-slate-50 dark:hover:bg-slate-800/50 transition-colors">
                            <td class="px-6 py-4">
                                <span class="font-mono text-xs font-bold text-indigo-600 dark:text-indigo-400">#INV-2026-0001</span>
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex flex-col">
                                    <span class="text-sm font-bold text-slate-700 dark:text-slate-200">Siti Nurhaliza</span>
                                </div>
                            </td>
                            <td class="px-6 py-4 text-right">
                                <span class="font-mono text-sm font-bold text-emerald-600 dark:text-emerald-400">Rp. 216.000</span>
                            </td>
                            <td class="px-6 py-4">
                                <span class="px-3 py-1 bg-emerald-100 dark:bg-emerald-500/20 text-emerald-700 dark:text-emerald-300 text-[10px] font-bold rounded-full uppercase">Paid</span>
                            </td>
                            <td class="px-6 py-4">
                                <button @click="detailModal = true; selectedTransaction = {invoice: '#INV-2026-0001', customer: 'Siti Nurhaliza', email: 'Sarah@gmail.com', affiliator: 'Marky Store', productPrice: 'Rp. 180.000', commission: 'Rp. 36.000', total: 'Rp. 216.000', status: 'Paid', method: 'QRIS', date: '06/03/2026 14:25'}" class="text-indigo-600 dark:text-indigo-400 hover:text-indigo-700 text-[10px] font-bold uppercase hover:underline">
                                    Detail
                                </button>
                            </td>
                        </tr>

                        <tr class="hover:bg-slate-50 dark:hover:bg-slate-800/50 transition-colors">
                            <td class="px-6 py-4">
                                <span class="font-mono text-xs font-bold text-indigo-600 dark:text-indigo-400">#INV-2026-0002</span>
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex flex-col">
                                    <span class="text-sm font-bold text-slate-700 dark:text-slate-200">Budi Santoso</span>
                                </div>
                            </td>
                            <td class="px-6 py-4 text-right">
                                <span class="font-mono text-sm font-bold text-emerald-600 dark:text-emerald-400">Rp. 300.000</span>
                            </td>
                            <td class="px-6 py-4">
                                <span class="px-3 py-1 bg-amber-100 dark:bg-amber-500/20 text-amber-700 dark:text-amber-300 text-[10px] font-bold rounded-full uppercase">Pending</span>
                            </td>
                            <td class="px-6 py-4">
                                <button @click="detailModal = true; selectedTransaction = {invoice: '#INV-2026-0002', customer: 'Budi Santoso', email: 'budi@email.com', affiliator: 'Fashion Hub', productPrice: 'Rp. 250.000', commission: 'Rp. 50.000', total: 'Rp. 300.000', status: 'Pending', method: 'Offline', date: '05/03/2026 11:30'}" class="text-indigo-600 dark:text-indigo-400 hover:text-indigo-700 text-[10px] font-bold uppercase hover:underline">
                                    Detail
                                </button>
                            </td>
                        </tr>

                        <tr class="hover:bg-slate-50 dark:hover:bg-slate-800/50 transition-colors">
                            <td class="px-6 py-4">
                                <span class="font-mono text-xs font-bold text-indigo-600 dark:text-indigo-400">#INV-2026-0003</span>
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex flex-col">
                                    <span class="text-sm font-bold text-slate-700 dark:text-slate-200">Ana Wijaya</span>
                                </div>
                            </td>
                            <td class="px-6 py-4 text-right">
                                <span class="font-mono text-sm font-bold text-emerald-600 dark:text-emerald-400">Rp. 150.000</span>
                            </td>
                            <td class="px-6 py-4">
                                <span class="px-3 py-1 bg-emerald-100 dark:bg-emerald-500/20 text-emerald-700 dark:text-emerald-300 text-[10px] font-bold rounded-full uppercase">Paid</span>
                            </td>
                            <td class="px-6 py-4">
                                <button @click="detailModal = true; selectedTransaction = {invoice: '#INV-2026-0003', customer: 'Ana Wijaya', email: 'ana.wijaya@email.com', affiliator: '-', productPrice: 'Rp. 150.000', commission: 'Rp. 0', total: 'Rp. 150.000', status: 'Paid', method: 'QRIS', date: '04/03/2026 09:15'}" class="text-indigo-600 dark:text-indigo-400 hover:text-indigo-700 text-[10px] font-bold uppercase hover:underline">
                                    Detail
                                </button>
                            </td>
                        </tr>

                        <tr class="hover:bg-slate-50 dark:hover:bg-slate-800/50 transition-colors">
                            <td class="px-6 py-4">
                                <span class="font-mono text-xs font-bold text-indigo-600 dark:text-indigo-400">#INV-2026-0004</span>
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex flex-col">
                                    <span class="text-sm font-bold text-slate-700 dark:text-slate-200">Rini Handoko</span>
                                </div>
                            </td>
                            <td class="px-6 py-4 text-right">
                                <span class="font-mono text-sm font-bold text-emerald-600 dark:text-emerald-400">Rp. 384.000</span>
                            </td>
                            <td class="px-6 py-4">
                                <span class="px-3 py-1 bg-rose-100 dark:bg-rose-500/20 text-rose-700 dark:text-rose-300 text-[10px] font-bold rounded-full uppercase">Failed</span>
                            </td>
                            <td class="px-6 py-4">
                                <button @click="detailModal = true; selectedTransaction = {invoice: '#INV-2026-0004', customer: 'Rini Handoko', email: 'rini.h@email.com', affiliator: 'Beauty Plus', productPrice: 'Rp. 320.000', commission: 'Rp. 64.000', total: 'Rp. 384.000', status: 'Failed', method: 'Offline', date: '03/03/2026 16:45'}" class="text-indigo-600 dark:text-indigo-400 hover:text-indigo-700 text-[10px] font-bold uppercase hover:underline">
                                    Detail
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="px-6 py-4 bg-gray-50/50 dark:bg-slate-900/50 border-t border-gray-100 dark:border-slate-800 flex justify-between items-center">
                <p class="text-xs text-slate-500 dark:text-slate-400">Menampilkan 4 dari 284 transaksi</p>
                <div class="flex gap-2">
                    <button class="px-3 py-1.5 border border-gray-200 dark:border-slate-700 rounded text-xs font-bold hover:bg-gray-100 dark:hover:bg-slate-800 disabled:opacity-50">← Sebelumnya</button>
                    <button class="px-3 py-1.5 bg-indigo-600 text-white rounded text-xs font-bold hover:bg-indigo-700">Berikutnya →</button>
                </div>
            </div>

            <!-- Modal Detail Transaksi -->
            <div x-show="detailModal" class="fixed inset-0 bg-black/50 dark:bg-black/70 flex items-center justify-center z-50 p-4" @click="detailModal = false" style="display: none;">
                <div @click.stop class="bg-white dark:bg-slate-900 rounded-2xl shadow-2xl max-w-2xl w-full max-h-[90vh] overflow-y-auto border border-gray-200 dark:border-slate-800">
                    <!-- Modal Header -->
                    <div class="sticky top-0 p-6 border-b border-gray-100 dark:border-slate-800 bg-white dark:bg-slate-900 flex justify-between items-center">
                        <div>
                            <h2 class="text-xl font-bold text-slate-800 dark:text-white" x-text="selectedTransaction?.invoice"></h2>
                            <p class="text-xs text-slate-400 mt-1">Detail Transaksi Penjualan</p>
                        </div>
                        <button @click="detailModal = false" class="p-2 hover:bg-slate-100 dark:hover:bg-slate-800 rounded-lg transition">
                            <i class="fas fa-times text-slate-400 text-lg"></i>
                        </button>
                    </div>

                    <!-- Modal Content -->
                    <div class="p-6 space-y-6">
                        <!-- Status Badge -->
                        <div>
                            <span class="px-4 py-2 text-sm font-bold rounded-full uppercase inline-block"
                                :class="selectedTransaction?.status === 'Paid' ? 'bg-emerald-100 dark:bg-emerald-500/20 text-emerald-700 dark:text-emerald-300' : selectedTransaction?.status === 'Pending' ? 'bg-amber-100 dark:bg-amber-500/20 text-amber-700 dark:text-amber-300' : 'bg-rose-100 dark:bg-rose-500/20 text-rose-700 dark:text-rose-300'"
                                x-text="selectedTransaction?.status">
                            </span>
                        </div>

                        <!-- Customer Info -->
                        <div class="bg-slate-50 dark:bg-slate-800/50 rounded-xl p-5 border border-gray-100 dark:border-slate-700">
                            <h3 class="font-bold text-slate-800 dark:text-white mb-4 uppercase text-sm tracking-tight flex items-center">
                                <i class="fas fa-user mr-2 text-indigo-600 dark:text-indigo-400"></i> Informasi Pelanggan
                            </h3>
                            <div class="space-y-3">
                                <div class="flex justify-between items-start">
                                    <p class="text-xs text-slate-600 dark:text-slate-400 font-semibold uppercase">Nama Customer</p>
                                    <p class="font-bold text-slate-700 dark:text-slate-200" x-text="selectedTransaction?.customer"></p>
                                </div>
                                <div class="flex justify-between items-start">
                                    <p class="text-xs text-slate-600 dark:text-slate-400 font-semibold uppercase">Email</p>
                                    <p class="font-semibold text-slate-600 dark:text-slate-300" x-text="selectedTransaction?.email"></p>
                                </div>
                            </div>
                        </div>

                        <!-- Afiliator Info -->
                        <div class="bg-purple-50 dark:bg-purple-500/10 rounded-xl p-5 border border-purple-200 dark:border-purple-500/20">
                            <h3 class="font-bold text-slate-800 dark:text-white mb-4 uppercase text-sm tracking-tight flex items-center">
                                <i class="fas fa-handshake mr-2 text-purple-600 dark:text-purple-400"></i> Informasi Afiliator
                            </h3>
                            <div class="space-y-3">
                                <div class="flex justify-between items-start">
                                    <p class="text-xs text-slate-600 dark:text-slate-400 font-semibold uppercase">Nama Afiliator</p>
                                    <p class="font-bold text-slate-700 dark:text-slate-200" x-text="selectedTransaction?.affiliator"></p>
                                </div>
                            </div>
                        </div>

                        <!-- Payment Info -->
                        <div class="bg-blue-50 dark:bg-blue-500/10 rounded-xl p-5 border border-blue-200 dark:border-blue-500/20">
                            <h3 class="font-bold text-slate-800 dark:text-white mb-4 uppercase text-sm tracking-tight flex items-center">
                                <i class="fas fa-credit-card mr-2 text-blue-600 dark:text-blue-400"></i> Informasi Pembayaran
                            </h3>
                            <div class="space-y-3">
                                <div class="flex justify-between items-start pb-3 border-b border-blue-200 dark:border-blue-500/20">
                                    <p class="text-xs text-slate-600 dark:text-slate-400 font-semibold uppercase">Metode Pembayaran</p>
                                    <p class="font-bold text-slate-700 dark:text-slate-200" x-text="selectedTransaction?.method"></p>
                                </div>
                                <div class="flex justify-between items-start pb-3 border-b border-blue-200 dark:border-blue-500/20">
                                    <p class="text-xs text-slate-600 dark:text-slate-400 font-semibold uppercase">Tanggal Pembayaran</p>
                                    <p class="font-semibold text-slate-600 dark:text-slate-300" x-text="selectedTransaction?.date"></p>
                                </div>
                                <div class="flex justify-between items-start">
                                    <p class="text-xs text-slate-600 dark:text-slate-400 font-semibold uppercase">Status Pembayaran</p>
                                    <span class="px-3 py-1 text-xs font-bold rounded-full uppercase"
                                        :class="selectedTransaction?.status === 'Paid' ? 'bg-emerald-100 dark:bg-emerald-500/20 text-emerald-700 dark:text-emerald-300' : selectedTransaction?.status === 'Pending' ? 'bg-amber-100 dark:bg-amber-500/20 text-amber-700 dark:text-amber-300' : 'bg-rose-100 dark:bg-rose-500/20 text-rose-700 dark:text-rose-300'"
                                        x-text="selectedTransaction?.status">
                                    </span>
                                </div>
                            </div>
                        </div>

                        <!-- Transaction Details -->
                        <div class="bg-emerald-50 dark:bg-emerald-500/10 rounded-xl p-5 border border-emerald-200 dark:border-emerald-500/20">
                            <h3 class="font-bold text-slate-800 dark:text-white mb-4 uppercase text-sm tracking-tight flex items-center">
                                <i class="fas fa-receipt mr-2 text-emerald-600 dark:text-emerald-400"></i> Rincian Transaksi
                            </h3>
                            <div class="space-y-3">
                                <div class="flex justify-between items-start pb-3 border-b border-emerald-200 dark:border-emerald-500/20">
                                    <p class="text-xs text-slate-600 dark:text-slate-400 font-semibold uppercase">Harga Produk</p>
                                    <p class="font-mono font-bold text-slate-700 dark:text-slate-200" x-text="selectedTransaction?.productPrice"></p>
                                </div>
                                <div class="flex justify-between items-start pb-3 border-b border-emerald-200 dark:border-emerald-500/20">
                                    <p class="text-xs text-slate-600 dark:text-slate-400 font-semibold uppercase">Komisi Afiliator</p>
                                    <p class="font-mono font-bold text-purple-600 dark:text-purple-400" x-text="selectedTransaction?.commission"></p>
                                </div>
                                <div class="flex justify-between items-start bg-emerald-100 dark:bg-emerald-500/20 p-3 rounded-lg">
                                    <p class="text-xs text-slate-800 dark:text-slate-200 font-bold uppercase">Total Pembayaran</p>
                                    <p class="font-mono text-lg font-bold text-emerald-700 dark:text-emerald-300" x-text="selectedTransaction?.total"></p>
                                </div>
                            </div>
                        </div>

                        <!-- Action Buttons -->
                        <div class="flex gap-3 pt-4">
                            <button class="flex-1 bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-3 rounded-lg font-bold text-sm transition-all active:scale-95">
                                <i class="fas fa-print mr-2"></i> Cetak Invoice
                            </button>
                            <button class="flex-1 bg-slate-100 dark:bg-slate-800 hover:bg-slate-200 dark:hover:bg-slate-700 text-slate-700 dark:text-slate-200 px-4 py-3 rounded-lg font-bold text-sm transition-all">
                                <i class="fas fa-download mr-2"></i> Download PDF
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Summary Statistics -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
            <!-- Top Afiliator -->
            <div class="bg-white dark:bg-slate-900 border border-gray-200 dark:border-slate-800 rounded-xl shadow-sm overflow-hidden">
                <div class="p-5 border-b border-gray-100 dark:border-slate-800 bg-gray-50/50 dark:bg-slate-900/50">
                    <h3 class="font-bold text-slate-800 dark:text-white text-sm uppercase tracking-tight">Top 5 Afiliator</h3>
                </div>

                <div class="divide-y divide-gray-100 dark:divide-slate-800">
                    <div class="p-5 hover:bg-slate-50 dark:hover:bg-slate-800/50 transition cursor-pointer flex justify-between items-center">
                        <div>
                            <p class="font-bold text-slate-700 dark:text-slate-200 text-sm">1. Marky Store</p>
                            <p class="text-[10px] text-slate-400 mt-1">45 pesanan • Komisi: Rp 3.600.000</p>
                        </div>
                        <div class="text-right">
                            <span class="inline-block bg-indigo-100 dark:bg-indigo-500/20 text-indigo-700 dark:text-indigo-300 px-3 py-1 rounded-full text-xs font-bold">Approved</span>
                        </div>
                    </div>

                    <div class="p-5 hover:bg-slate-50 dark:hover:bg-slate-800/50 transition cursor-pointer flex justify-between items-center">
                        <div>
                            <p class="font-bold text-slate-700 dark:text-slate-200 text-sm">2. Fashion Hub</p>
                            <p class="text-[10px] text-slate-400 mt-1">38 pesanan • Komisi: Rp 2.850.000</p>
                        </div>
                        <div class="text-right">
                            <span class="inline-block bg-amber-100 dark:bg-amber-500/20 text-amber-700 dark:text-amber-300 px-3 py-1 rounded-full text-xs font-bold">Pending</span>
                        </div>
                    </div>

                    <div class="p-5 hover:bg-slate-50 dark:hover:bg-slate-800/50 transition cursor-pointer flex justify-between items-center">
                        <div>
                            <p class="font-bold text-slate-700 dark:text-slate-200 text-sm">3. Beauty Plus</p>
                            <p class="text-[10px] text-slate-400 mt-1">32 pesanan • Komisi: Rp 2.400.000</p>
                        </div>
                        <div class="text-right">
                            <span class="inline-block bg-emerald-100 dark:bg-emerald-500/20 text-emerald-700 dark:text-emerald-300 px-3 py-1 rounded-full text-xs font-bold">Paid</span>
                        </div>
                    </div>

                    <div class="p-5 hover:bg-slate-50 dark:hover:bg-slate-800/50 transition cursor-pointer flex justify-between items-center">
                        <div>
                            <p class="font-bold text-slate-700 dark:text-slate-200 text-sm">4. Wellness Zone</p>
                            <p class="text-[10px] text-slate-400 mt-1">28 pesanan • Komisi: Rp 2.100.000</p>
                        </div>
                        <div class="text-right">
                            <span class="inline-block bg-emerald-100 dark:bg-emerald-500/20 text-emerald-700 dark:text-emerald-300 px-3 py-1 rounded-full text-xs font-bold">Paid</span>
                        </div>
                    </div>

                    <div class="p-5 hover:bg-slate-50 dark:hover:bg-slate-800/50 transition cursor-pointer flex justify-between items-center">
                        <div>
                            <p class="font-bold text-slate-700 dark:text-slate-200 text-sm">5. Premium Select</p>
                            <p class="text-[10px] text-slate-400 mt-1">24 pesanan • Komisi: Rp 1.800.000</p>
                        </div>
                        <div class="text-right">
                            <span class="inline-block bg-indigo-100 dark:bg-indigo-500/20 text-indigo-700 dark:text-indigo-300 px-3 py-1 rounded-full text-xs font-bold">Approved</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Alur Pembayaran Summary -->
            <div class="bg-white dark:bg-slate-900 border border-gray-200 dark:border-slate-800 rounded-xl shadow-sm overflow-hidden">
                <div class="p-5 border-b border-gray-100 dark:border-slate-800 bg-gray-50/50 dark:bg-slate-900/50">
                    <h3 class="font-bold text-slate-800 dark:text-white text-sm uppercase tracking-tight">Ringkasan Alur Pembayaran</h3>
                </div>

                <div class="p-6 space-y-6">
                    <!-- Paid Flow -->
                    <div>
                        <div class="flex items-start gap-4 mb-3">
                            <div class="bg-emerald-100 dark:bg-emerald-500/20 rounded-lg p-3 text-emerald-600 dark:text-emerald-400">
                                <i class="fas fa-check-circle text-lg"></i>
                            </div>
                            <div class="flex-1">
                                <h4 class="font-bold text-slate-800 dark:text-white mb-1">Pembayaran Terverifikasi</h4>
                                <p class="text-xs text-slate-500 dark:text-slate-400 mb-2">Pembayaran sudah dikonfirmasi oleh admin</p>
                                <div class="flex justify-between">
                                    <span class="text-sm font-bold text-slate-700 dark:text-slate-200">225 transaksi</span>
                                    <span class="text-sm font-bold text-emerald-600 dark:text-emerald-400">Rp 39.480.000</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Pending Flow -->
                    <div>
                        <div class="flex items-start gap-4 mb-3">
                            <div class="bg-amber-100 dark:bg-amber-500/20 rounded-lg p-3 text-amber-600 dark:text-amber-400">
                                <i class="fas fa-hourglass-half text-lg"></i>
                            </div>
                            <div class="flex-1">
                                <h4 class="font-bold text-slate-800 dark:text-white mb-1">Menunggu Verifikasi</h4>
                                <p class="text-xs text-slate-500 dark:text-slate-400 mb-2">Bukti pembayaran sudah diunggah, menunggu admin verifikasi</p>
                                <div class="flex justify-between">
                                    <span class="text-sm font-bold text-slate-700 dark:text-slate-200">45 transaksi</span>
                                    <span class="text-sm font-bold text-amber-600 dark:text-amber-400">Rp 4.320.000</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Failed Flow -->
                    <div>
                        <div class="flex items-start gap-4">
                            <div class="bg-rose-100 dark:bg-rose-500/20 rounded-lg p-3 text-rose-600 dark:text-rose-400">
                                <i class="fas fa-times-circle text-lg"></i>
                            </div>
                            <div class="flex-1">
                                <h4 class="font-bold text-slate-800 dark:text-white mb-1">Pembayaran Gagal</h4>
                                <p class="text-xs text-slate-500 dark:text-slate-400 mb-2">Pembayaran ditolak atau ada kendala dalam verifikasi</p>
                                <div class="flex justify-between">
                                    <span class="text-sm font-bold text-slate-700 dark:text-slate-200">14 transaksi</span>
                                    <span class="text-sm font-bold text-rose-600 dark:text-rose-400">Rp 1.400.000</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
