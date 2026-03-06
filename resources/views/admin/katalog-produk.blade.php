@extends('layouts.header')

@section('content')
<div class="min-h-screen transition-colors duration-300 dark:bg-slate-950 bg-[#F8FAFC]">
    
    <header class="bg-white dark:bg-slate-900 border-b border-gray-200 dark:border-slate-800 sticky top-0 z-30 p-4 px-8 flex justify-between items-center">
        <div>
            <h1 class="text-xl font-bold text-slate-800 dark:text-white">Katalog Produk</h1>
            <p class="text-xs text-slate-400 font-medium">Monitor katalog dan stok <span class="text-indigo-600">Sariayu</span></p>
        </div>
        
        <div class="flex items-center space-x-4">
            <button @click="darkMode = !darkMode; localStorage.setItem('dark', darkMode)" 
                    class="p-2 text-slate-400 hover:text-indigo-600 transition-colors">
                <i class="fas" :class="darkMode ? 'fa-sun' : 'fa-moon'"></i>
            </button>

            <a href="{{ route('admin.manajemen-produk') }}" class="bg-slate-700 hover:bg-slate-800 text-white px-4 py-2 rounded text-xs font-bold transition-all active:scale-95 shadow-sm">
                <i class="fas fa-sliders-h mr-2 text-[10px]"></i> KELOLA PRODUK
            </a>
        </div>
    </header>

    <div class="p-8 max-w-[1600px] mx-auto" x-data="{ detailModal: false, selectedProduct: null }">
        <!-- Filter Section -->
        <div class="bg-white dark:bg-slate-900 border border-gray-200 dark:border-slate-800 rounded-xl p-6 shadow-sm mb-8">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-4">
                <div>
                    <label class="block text-xs font-bold text-slate-600 dark:text-slate-300 uppercase mb-2">Cari Produk</label>
                    <input type="text" placeholder="Nama produk..." class="w-full px-4 py-2.5 bg-slate-50 dark:bg-slate-800 border border-gray-200 dark:border-slate-700 rounded-lg text-xs focus:ring-2 ring-indigo-500 outline-none dark:text-white">
                </div>
                <div>
                    <label class="block text-xs font-bold text-slate-600 dark:text-slate-300 uppercase mb-2">Filter Status</label>
                    <select class="w-full px-4 py-2.5 bg-slate-50 dark:bg-slate-800 border border-gray-200 dark:border-slate-700 rounded-lg text-xs focus:ring-2 ring-indigo-500 outline-none dark:text-white">
                        <option value="">Semua Status</option>
                        <option value="aktif">Aktif</option>
                        <option value="nonaktif">Non-aktif</option>
                    </select>
                </div>
                <div>
                    <label class="block text-xs font-bold text-slate-600 dark:text-slate-300 uppercase mb-2">Filter Stok</label>
                    <select class="w-full px-4 py-2.5 bg-slate-50 dark:bg-slate-800 border border-gray-200 dark:border-slate-700 rounded-lg text-xs focus:ring-2 ring-indigo-500 outline-none dark:text-white">
                        <option value="">Semua Produk</option>
                        <option value="available">Tersedia</option>
                        <option value="low">Stok Rendah</option>
                        <option value="out">Habis Terjual</option>
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
        <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-8">
            <div class="bg-white dark:bg-slate-900 p-5 rounded-lg border border-gray-200 dark:border-slate-800 shadow-sm">
                <p class="text-[10px] font-bold text-slate-400 uppercase tracking-wider mb-2">
                    <i class="fas fa-box mr-2 text-indigo-600"></i> Total Produk
                </p>
                <h2 class="text-2xl font-bold text-slate-800 dark:text-white">24</h2>
                <p class="text-xs text-slate-500 dark:text-slate-400 mt-1">21 Aktif • 3 Non-aktif</p>
            </div>

            <div class="bg-white dark:bg-slate-900 p-5 rounded-lg border border-gray-200 dark:border-slate-800 shadow-sm">
                <p class="text-[10px] font-bold text-slate-400 uppercase tracking-wider mb-2">
                    <i class="fas fa-cubes mr-2 text-emerald-600"></i> Total Stok
                </p>
                <h2 class="text-2xl font-bold text-emerald-600 dark:text-emerald-400">284 pcs</h2>
                <p class="text-xs text-slate-500 dark:text-slate-400 mt-1">Nilai: Rp 45.2M</p>
            </div>

            <div class="bg-white dark:bg-slate-900 p-5 rounded-lg border border-gray-200 dark:border-slate-800 shadow-sm">
                <p class="text-[10px] font-bold text-slate-400 uppercase tracking-wider mb-2">
                    <i class="fas fa-exclamation-triangle mr-2 text-amber-600"></i> Stok Rendah
                </p>
                <h2 class="text-2xl font-bold text-amber-600 dark:text-amber-400">8 produk</h2>
                <p class="text-xs text-slate-500 dark:text-slate-400 mt-1">Perlu perhatian</p>
            </div>

            <div class="bg-white dark:bg-slate-900 p-5 rounded-lg border border-gray-200 dark:border-slate-800 shadow-sm">
                <p class="text-[10px] font-bold text-slate-400 uppercase tracking-wider mb-2">
                    <i class="fas fa-ban mr-2 text-rose-600"></i> Habis Terjual
                </p>
                <h2 class="text-2xl font-bold text-rose-600 dark:text-rose-400">2 produk</h2>
                <p class="text-xs text-slate-500 dark:text-slate-400 mt-1">Butuh restock</p>
            </div>
        </div>

        <!-- Katalog Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
            <!-- Produk 1 -->
            <div class="bg-white dark:bg-slate-900 rounded-2xl border border-gray-100 dark:border-slate-800 shadow-sm hover:shadow-lg hover:-translate-y-1 transition-all duration-300 overflow-hidden group cursor-pointer">
                <div class="h-48 bg-gradient-to-br from-slate-100 to-slate-200 dark:from-slate-800 dark:to-slate-700 relative overflow-hidden">
                    <div class="flex items-center justify-center h-full">
                        <i class="fas fa-spa text-slate-400 text-5xl"></i>
                    </div>
                    
                    <div class="absolute top-4 right-4 flex gap-2">
                        <span class="px-3 py-1.5 bg-emerald-500 text-white text-[9px] font-black uppercase tracking-widest rounded-full shadow-lg">
                            Aktif
                        </span>
                    </div>

                    <div class="absolute inset-0 bg-black/0 group-hover:bg-black/40 transition-all duration-300 flex items-center justify-center">
                        <button @click="detailModal = true; selectedProduct = {name: 'Sariayu Masker Wajah', id: 'SAR-001', price: 'Rp 180.000', stock: 45, status: 'Aktif', stockStatus: 'Tersedia', description: 'Masker wajah dengan bahan alami untuk perawatan kulit sehari-hari'}" 
                                class="opacity-0 group-hover:opacity-100 transition-all duration-300 px-4 py-2 bg-indigo-600 text-white rounded-lg text-xs font-bold">
                            <i class="fas fa-eye mr-1"></i> Lihat Detail
                        </button>
                    </div>
                </div>

                <div class="p-5">
                    <div class="mb-3">
                        <h3 class="font-bold text-slate-800 dark:text-white line-clamp-2 mb-1">
                            Sariayu Masker Wajah
                        </h3>
                        <p class="text-[10px] text-slate-400 font-mono uppercase">ID: SAR-001</p>
                    </div>
                    
                    <div class="flex items-center justify-between mb-3 bg-slate-50 dark:bg-slate-800/50 p-3 rounded-lg">
                        <div>
                            <p class="text-[9px] text-slate-400 uppercase font-bold">Harga</p>
                            <p class="font-bold text-indigo-600 dark:text-indigo-400 text-sm">Rp 180.000</p>
                        </div>
                        <div class="text-right border-l border-gray-200 dark:border-slate-700 pl-3">
                            <p class="text-[9px] text-slate-400 uppercase font-bold">Stok</p>
                            <p class="font-bold text-slate-800 dark:text-slate-200 text-sm">45 <span class="text-[10px] font-normal">pcs</span></p>
                        </div>
                    </div>

                    <div class="flex gap-2">
                        <span class="flex-1 px-2 py-2 bg-emerald-100 dark:bg-emerald-500/20 text-emerald-700 dark:text-emerald-300 text-center text-[10px] font-bold rounded-lg uppercase">
                            Tersedia
                        </span>
                        <button @click="detailModal = true; selectedProduct = {name: 'Sariayu Masker Wajah', id: 'SAR-001', price: 'Rp 180.000', stock: 45, status: 'Aktif', stockStatus: 'Tersedia', description: 'Masker wajah dengan bahan alami untuk perawatan kulit sehari-hari'}"
                                class="px-3 py-2 bg-indigo-100 dark:bg-indigo-500/20 text-indigo-600 dark:text-indigo-400 rounded-lg text-[10px] font-bold hover:bg-indigo-200 transition">
                            <i class="fas fa-eye"></i>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Produk 2 - Stok Rendah -->
            <div class="bg-white dark:bg-slate-900 rounded-2xl border border-gray-100 dark:border-slate-800 shadow-sm hover:shadow-lg hover:-translate-y-1 transition-all duration-300 overflow-hidden group cursor-pointer">
                <div class="h-48 bg-gradient-to-br from-amber-50 to-orange-100 dark:from-slate-800 dark:to-slate-700 relative overflow-hidden border-b-2 border-amber-200 dark:border-amber-500/30">
                    <div class="flex items-center justify-center h-full">
                        <i class="fas fa-droplet text-amber-300 text-5xl"></i>
                    </div>
                    
                    <div class="absolute top-4 right-4 flex gap-2">
                        <span class="px-3 py-1.5 bg-amber-500 text-white text-[9px] font-black uppercase tracking-widest rounded-full shadow-lg">
                            Stok Rendah
                        </span>
                    </div>

                    <div class="absolute inset-0 bg-black/0 group-hover:bg-black/40 transition-all duration-300 flex items-center justify-center">
                        <button @click="detailModal = true; selectedProduct = {name: 'Sariayu Serum Vitamin C', id: 'SAR-002', price: 'Rp 250.000', stock: 8, status: 'Aktif', stockStatus: 'Stok Rendah', description: 'Serum wajah dengan vitamin C untuk mencerahkan dan meratakan warna kulit'}"
                                class="opacity-0 group-hover:opacity-100 transition-all duration-300 px-4 py-2 bg-indigo-600 text-white rounded-lg text-xs font-bold">
                            <i class="fas fa-eye mr-1"></i> Lihat Detail
                        </button>
                    </div>
                </div>

                <div class="p-5">
                    <div class="mb-3">
                        <h3 class="font-bold text-slate-800 dark:text-white line-clamp-2 mb-1">
                            Sariayu Serum Vitamin C
                        </h3>
                        <p class="text-[10px] text-slate-400 font-mono uppercase">ID: SAR-002</p>
                    </div>
                    
                    <div class="flex items-center justify-between mb-3 bg-slate-50 dark:bg-slate-800/50 p-3 rounded-lg">
                        <div>
                            <p class="text-[9px] text-slate-400 uppercase font-bold">Harga</p>
                            <p class="font-bold text-indigo-600 dark:text-indigo-400 text-sm">Rp 250.000</p>
                        </div>
                        <div class="text-right border-l border-gray-200 dark:border-slate-700 pl-3">
                            <p class="text-[9px] text-slate-400 uppercase font-bold">Stok</p>
                            <p class="font-bold text-amber-600 dark:text-amber-400 text-sm">8 <span class="text-[10px] font-normal">pcs</span></p>
                        </div>
                    </div>

                    <div class="flex gap-2">
                        <span class="flex-1 px-2 py-2 bg-amber-100 dark:bg-amber-500/20 text-amber-700 dark:text-amber-300 text-center text-[10px] font-bold rounded-lg uppercase">
                            Perlu Restock
                        </span>
                        <button @click="detailModal = true; selectedProduct = {name: 'Sariayu Serum Vitamin C', id: 'SAR-002', price: 'Rp 250.000', stock: 8, status: 'Aktif', stockStatus: 'Stok Rendah', description: 'Serum wajah dengan vitamin C untuk mencerahkan dan meratakan warna kulit'}"
                                class="px-3 py-2 bg-indigo-100 dark:bg-indigo-500/20 text-indigo-600 dark:text-indigo-400 rounded-lg text-[10px] font-bold hover:bg-indigo-200 transition">
                            <i class="fas fa-eye"></i>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Produk 3 - Habis -->
            <div class="bg-white dark:bg-slate-900 rounded-2xl border border-gray-100 dark:border-slate-800 shadow-sm hover:shadow-lg hover:-translate-y-1 transition-all duration-300 overflow-hidden group cursor-pointer opacity-75">
                <div class="h-48 bg-gradient-to-br from-slate-100 to-slate-300 dark:from-slate-800 dark:to-slate-700 relative overflow-hidden">
                    <div class="flex items-center justify-center h-full">
                        <i class="fas fa-wind text-slate-400 text-5xl"></i>
                    </div>
                    
                    <div class="absolute top-4 right-4 flex gap-2">
                        <span class="px-3 py-1.5 bg-rose-500 text-white text-[9px] font-black uppercase tracking-widest rounded-full shadow-lg">
                            Habis
                        </span>
                    </div>

                    <div class="absolute inset-0 bg-black/0 group-hover:bg-black/40 transition-all duration-300 flex items-center justify-center">
                        <button @click="detailModal = true; selectedProduct = {name: 'Sariayu Toner Pelembab', id: 'SAR-003', price: 'Rp 150.000', stock: 0, status: 'Non-aktif', stockStatus: 'Habis', description: 'Toner pelembab dengan formula ringan untuk kulit sensitif'}"
                                class="opacity-0 group-hover:opacity-100 transition-all duration-300 px-4 py-2 bg-indigo-600 text-white rounded-lg text-xs font-bold">
                            <i class="fas fa-eye mr-1"></i> Lihat Detail
                        </button>
                    </div>
                </div>

                <div class="p-5">
                    <div class="mb-3">
                        <h3 class="font-bold text-slate-800 dark:text-white line-clamp-2 mb-1">
                            Sariayu Toner Pelembab
                        </h3>
                        <p class="text-[10px] text-slate-400 font-mono uppercase">ID: SAR-003</p>
                    </div>
                    
                    <div class="flex items-center justify-between mb-3 bg-slate-50 dark:bg-slate-800/50 p-3 rounded-lg">
                        <div>
                            <p class="text-[9px] text-slate-400 uppercase font-bold">Harga</p>
                            <p class="font-bold text-indigo-600 dark:text-indigo-400 text-sm">Rp 150.000</p>
                        </div>
                        <div class="text-right border-l border-gray-200 dark:border-slate-700 pl-3">
                            <p class="text-[9px] text-slate-400 uppercase font-bold">Stok</p>
                            <p class="font-bold text-rose-600 dark:text-rose-400 text-sm">0 <span class="text-[10px] font-normal">pcs</span></p>
                        </div>
                    </div>

                    <div class="flex gap-2">
                        <span class="flex-1 px-2 py-2 bg-rose-100 dark:bg-rose-500/20 text-rose-700 dark:text-rose-300 text-center text-[10px] font-bold rounded-lg uppercase">
                            Habis Terjual
                        </span>
                        <button @click="detailModal = true; selectedProduct = {name: 'Sariayu Toner Pelembab', id: 'SAR-003', price: 'Rp 150.000', stock: 0, status: 'Non-aktif', stockStatus: 'Habis', description: 'Toner pelembab dengan formula ringan untuk kulit sensitif'}"
                                class="px-3 py-2 bg-indigo-100 dark:bg-indigo-500/20 text-indigo-600 dark:text-indigo-400 rounded-lg text-[10px] font-bold hover:bg-indigo-200 transition">
                            <i class="fas fa-eye"></i>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Produk 4 -->
            <div class="bg-white dark:bg-slate-900 rounded-2xl border border-gray-100 dark:border-slate-800 shadow-sm hover:shadow-lg hover:-translate-y-1 transition-all duration-300 overflow-hidden group cursor-pointer">
                <div class="h-48 bg-gradient-to-br from-slate-100 to-slate-200 dark:from-slate-800 dark:to-slate-700 relative overflow-hidden">
                    <div class="flex items-center justify-center h-full">
                        <i class="fas fa-sun text-slate-400 text-5xl"></i>
                    </div>
                    
                    <div class="absolute top-4 right-4 flex gap-2">
                        <span class="px-3 py-1.5 bg-emerald-500 text-white text-[9px] font-black uppercase tracking-widest rounded-full shadow-lg">
                            Aktif
                        </span>
                    </div>

                    <div class="absolute inset-0 bg-black/0 group-hover:bg-black/40 transition-all duration-300 flex items-center justify-center">
                        <button @click="detailModal = true; selectedProduct = {name: 'Sariayu Day Cream SPF 50', id: 'SAR-004', price: 'Rp 320.000', stock: 32, status: 'Aktif', stockStatus: 'Tersedia', description: 'Cream siang dengan SPF 50 untuk perlindungan maksimal dari sinar UV'}"
                                class="opacity-0 group-hover:opacity-100 transition-all duration-300 px-4 py-2 bg-indigo-600 text-white rounded-lg text-xs font-bold">
                            <i class="fas fa-eye mr-1"></i> Lihat Detail
                        </button>
                    </div>
                </div>

                <div class="p-5">
                    <div class="mb-3">
                        <h3 class="font-bold text-slate-800 dark:text-white line-clamp-2 mb-1">
                            Sariayu Day Cream SPF 50
                        </h3>
                        <p class="text-[10px] text-slate-400 font-mono uppercase">ID: SAR-004</p>
                    </div>
                    
                    <div class="flex items-center justify-between mb-3 bg-slate-50 dark:bg-slate-800/50 p-3 rounded-lg">
                        <div>
                            <p class="text-[9px] text-slate-400 uppercase font-bold">Harga</p>
                            <p class="font-bold text-indigo-600 dark:text-indigo-400 text-sm">Rp 320.000</p>
                        </div>
                        <div class="text-right border-l border-gray-200 dark:border-slate-700 pl-3">
                            <p class="text-[9px] text-slate-400 uppercase font-bold">Stok</p>
                            <p class="font-bold text-slate-800 dark:text-slate-200 text-sm">32 <span class="text-[10px] font-normal">pcs</span></p>
                        </div>
                    </div>

                    <div class="flex gap-2">
                        <span class="flex-1 px-2 py-2 bg-emerald-100 dark:bg-emerald-500/20 text-emerald-700 dark:text-emerald-300 text-center text-[10px] font-bold rounded-lg uppercase">
                            Tersedia
                        </span>
                        <button @click="detailModal = true; selectedProduct = {name: 'Sariayu Day Cream SPF 50', id: 'SAR-004', price: 'Rp 320.000', stock: 32, status: 'Aktif', stockStatus: 'Tersedia', description: 'Cream siang dengan SPF 50 untuk perlindungan maksimal dari sinar UV'}"
                                class="px-3 py-2 bg-indigo-100 dark:bg-indigo-500/20 text-indigo-600 dark:text-indigo-400 rounded-lg text-[10px] font-bold hover:bg-indigo-200 transition">
                            <i class="fas fa-eye"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal Detail Produk -->
        <div x-show="detailModal" class="fixed inset-0 bg-black/50 dark:bg-black/70 flex items-center justify-center z-50 p-4" @click="detailModal = false" style="display: none;">
            <div @click.stop class="bg-white dark:bg-slate-900 rounded-2xl shadow-2xl max-w-md w-full border border-gray-200 dark:border-slate-800">
                <!-- Modal Header -->
                <div class="p-6 border-b border-gray-100 dark:border-slate-800">
                    <div class="flex justify-between items-start">
                        <div>
                            <h2 class="text-lg font-bold text-slate-800 dark:text-white" x-text="selectedProduct?.name"></h2>
                            <p class="text-xs text-slate-400 mt-1 font-mono" x-text="'ID: ' + selectedProduct?.id"></p>
                        </div>
                        <button @click="detailModal = false" class="p-2 hover:bg-slate-100 dark:hover:bg-slate-800 rounded-lg transition">
                            <i class="fas fa-times text-slate-400 text-lg"></i>
                        </button>
                    </div>
                </div>

                <!-- Modal Content -->
                <div class="p-6 space-y-4">
                    <div class="bg-slate-50 dark:bg-slate-800/50 p-4 rounded-lg space-y-3 border border-gray-100 dark:border-slate-700">
                        <div class="flex justify-between items-center">
                            <p class="text-sm font-bold text-slate-600 dark:text-slate-300">Harga</p>
                            <p class="text-lg font-bold text-indigo-600 dark:text-indigo-400" x-text="selectedProduct?.price"></p>
                        </div>
                        <div class="border-t border-gray-200 dark:border-slate-600 pt-3 flex justify-between items-center">
                            <p class="text-sm font-bold text-slate-600 dark:text-slate-300">Stok Tersedia</p>
                            <p class="text-lg font-bold text-slate-800 dark:text-slate-200" x-text="selectedProduct?.stock + ' pcs'"></p>
                        </div>
                    </div>

                    <div class="bg-slate-50 dark:bg-slate-800/50 p-4 rounded-lg space-y-2 border border-gray-100 dark:border-slate-700">
                        <div class="flex justify-between items-center">
                            <p class="text-xs font-bold text-slate-600 dark:text-slate-300 uppercase">Status Produk</p>
                            <span class="px-2 py-1 text-[10px] font-bold rounded-full" :class="selectedProduct?.status === 'Aktif' ? 'bg-emerald-100 dark:bg-emerald-500/20 text-emerald-700 dark:text-emerald-300' : 'bg-slate-200 dark:bg-slate-600 text-slate-700 dark:text-slate-200'" x-text="selectedProduct?.status"></span>
                        </div>
                        <div class="flex justify-between items-center">
                            <p class="text-xs font-bold text-slate-600 dark:text-slate-300 uppercase">Status Stok</p>
                            <span class="px-2 py-1 text-[10px] font-bold rounded-full" :class="selectedProduct?.stockStatus === 'Tersedia' ? 'bg-emerald-100 dark:bg-emerald-500/20 text-emerald-700 dark:text-emerald-300' : selectedProduct?.stockStatus === 'Stok Rendah' ? 'bg-amber-100 dark:bg-amber-500/20 text-amber-700 dark:text-amber-300' : 'bg-rose-100 dark:bg-rose-500/20 text-rose-700 dark:text-rose-300'" x-text="selectedProduct?.stockStatus"></span>
                        </div>
                    </div>

                    <div class="bg-slate-50 dark:bg-slate-800/50 p-4 rounded-lg border border-gray-100 dark:border-slate-700">
                        <p class="text-xs font-bold text-slate-600 dark:text-slate-300 uppercase mb-2">Deskripsi</p>
                        <p class="text-sm text-slate-700 dark:text-slate-300 leading-relaxed" x-text="selectedProduct?.description"></p>
                    </div>
                </div>

                <!-- Modal Footer -->
                <div class="p-6 border-t border-gray-100 dark:border-slate-800">
                    <button @click="detailModal = false" class="w-full bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2.5 rounded-lg font-bold text-sm transition-all">
                        Tutup
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
