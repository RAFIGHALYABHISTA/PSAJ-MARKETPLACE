@extends('layouts.header')

@section('content')
<div class="min-h-screen transition-colors duration-300 dark:bg-slate-950 bg-[#F8FAFC]">
    
    <header class="bg-white dark:bg-slate-900 border-b border-gray-200 dark:border-slate-800 sticky top-0 z-30 p-4 px-8 flex justify-between items-center">
        <div>
            <h1 class="text-xl font-bold text-slate-800 dark:text-white">Manajemen Produk</h1>
            <p class="text-xs text-slate-400 font-medium">Kelola katalog, stok, dan harga <span class="text-indigo-600">Sariayu</span></p>
        </div>
        
        <div class="flex items-center space-x-4">
            <button @click="darkMode = !darkMode; localStorage.setItem('dark', darkMode)" 
                    class="p-2 text-slate-400 hover:text-indigo-600 transition-colors">
                <i class="fas" :class="darkMode ? 'fa-sun' : 'fa-moon'"></i>
            </button>

            <a href="{{ route('admin.produk.create') }}" class="bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded text-xs font-bold transition-all active:scale-95 shadow-sm">
                <i class="fas fa-plus mr-2 text-[10px]"></i> TAMBAH PRODUK
            </a>
        </div>
    </header>

    <div class="p-8 max-w-[1600px] mx-auto" x-data="{ stockModal: false, selectedProduct: null }">
        <!-- Filter Section -->
        <div class="bg-white dark:bg-slate-900 border border-gray-200 dark:border-slate-800 rounded-xl p-6 shadow-sm mb-8">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-4">
                <div>
                    <label class="block text-xs font-bold text-slate-600 dark:text-slate-300 uppercase mb-2">Cari Produk</label>
                    <input type="text" placeholder="Nama produk..." class="w-full px-4 py-2.5 bg-slate-50 dark:bg-slate-800 border border-gray-200 dark:border-slate-700 rounded-lg text-xs focus:ring-2 ring-indigo-500 outline-none dark:text-white">
                </div>
                <div>
                    <label class="block text-xs font-bold text-slate-600 dark:text-slate-300 uppercase mb-2">Status Produk</label>
                    <select class="w-full px-4 py-2.5 bg-slate-50 dark:bg-slate-800 border border-gray-200 dark:border-slate-700 rounded-lg text-xs focus:ring-2 ring-indigo-500 outline-none dark:text-white">
                        <option value="">Semua Status</option>
                        <option value="aktif">Aktif</option>
                        <option value="nonaktif">Non-aktif</option>
                    </select>
                </div>
                <div>
                    <label class="block text-xs font-bold text-slate-600 dark:text-slate-300 uppercase mb-2">Status Stok</label>
                    <select class="w-full px-4 py-2.5 bg-slate-50 dark:bg-slate-800 border border-gray-200 dark:border-slate-700 rounded-lg text-xs focus:ring-2 ring-indigo-500 outline-none dark:text-white">
                        <option value="">Semua Stok</option>
                        <option value="available">Tersedia</option>
                        <option value="low">Stok Rendah</option>
                        <option value="out">Habis</option>
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
                <p class="text-[10px] font-bold text-slate-400 uppercase tracking-wider mb-2">Total Produk</p>
                <h2 class="text-2xl font-bold text-slate-800 dark:text-white">24</h2>
                <p class="text-xs text-slate-500 dark:text-slate-400 mt-1">3 non-aktif</p>
            </div>

            <div class="bg-white dark:bg-slate-900 p-5 rounded-lg border border-gray-200 dark:border-slate-800 shadow-sm">
                <p class="text-[10px] font-bold text-slate-400 uppercase tracking-wider mb-2">Total Stok</p>
                <h2 class="text-2xl font-bold text-emerald-600 dark:text-emerald-400">284 pcs</h2>
                <p class="text-xs text-slate-500 dark:text-slate-400 mt-1">Rp 45.2M</p>
            </div>

            <div class="bg-white dark:bg-slate-900 p-5 rounded-lg border border-gray-200 dark:border-slate-800 shadow-sm">
                <p class="text-[10px] font-bold text-slate-400 uppercase tracking-wider mb-2">Stok Rendah</p>
                <h2 class="text-2xl font-bold text-amber-600 dark:text-amber-400">8 produk</h2>
                <p class="text-xs text-slate-500 dark:text-slate-400 mt-1">Perlu restock</p>
            </div>

            <div class="bg-white dark:bg-slate-900 p-5 rounded-lg border border-gray-200 dark:border-slate-800 shadow-sm">
                <p class="text-[10px] font-bold text-slate-400 uppercase tracking-wider mb-2">Habis Terjual</p>
                <h2 class="text-2xl font-bold text-rose-600 dark:text-rose-400">2 produk</h2>
                <p class="text-xs text-slate-500 dark:text-slate-400 mt-1">Perlu diisi kembali</p>
            </div>
        </div>

        <!-- Produk Table -->
        <div class="bg-white dark:bg-slate-900 border border-gray-200 dark:border-slate-800 rounded-xl shadow-sm overflow-hidden">
            <div class="p-5 border-b border-gray-100 dark:border-slate-800 bg-gray-50/50 dark:bg-slate-900/50 flex justify-between items-center">
                <h3 class="font-bold text-slate-800 dark:text-white text-sm uppercase tracking-tight">Daftar Produk</h3>
                <div class="flex gap-2">
                    <button class="bg-white dark:bg-slate-800 border border-gray-200 dark:border-slate-700 text-slate-600 dark:text-slate-300 px-4 py-2 rounded-lg text-xs font-bold hover:bg-gray-50 transition flex items-center gap-2">
                        <i class="fas fa-download"></i> EXPORT EXCEL
                    </button>
                </div>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead class="bg-white dark:bg-slate-900 border-b border-gray-100 dark:border-slate-800 text-slate-400 text-[10px] uppercase tracking-widest font-bold">
                        <tr>
                            <th class="px-6 py-4">Produk</th>
                            <th class="px-6 py-4">Harga</th>
                            <th class="px-6 py-4 text-center">Stok</th>
                            <th class="px-6 py-4">Status Stok</th>
                            <th class="px-6 py-4">Status Produk</th>
                            <th class="px-6 py-4">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-50 dark:divide-slate-800">
                        <!-- Produk 1 -->
                        <tr class="hover:bg-slate-50 dark:hover:bg-slate-800/50 transition-colors">
                            <td class="px-6 py-4">
                                <div class="flex flex-col">
                                    <span class="font-bold text-slate-800 dark:text-white">Sariayu Masker Wajah</span>
                                    <span class="text-[10px] text-slate-400 italic">ID: SAR-001</span>
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <span class="font-mono font-bold text-indigo-600 dark:text-indigo-400">Rp 180.000</span>
                            </td>
                            <td class="px-6 py-4 text-center">
                                <span class="font-bold text-slate-800 dark:text-white">45 <span class="text-xs font-normal">pcs</span></span>
                            </td>
                            <td class="px-6 py-4">
                                <span class="px-3 py-1 bg-emerald-100 dark:bg-emerald-500/20 text-emerald-700 dark:text-emerald-300 text-[10px] font-bold rounded-full uppercase inline-block">Tersedia</span>
                            </td>
                            <td class="px-6 py-4">
                                <span class="px-3 py-1 bg-emerald-100 dark:bg-emerald-500/20 text-emerald-700 dark:text-emerald-300 text-[10px] font-bold rounded-full uppercase inline-block">Aktif</span>
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex gap-2">
                                    <button @click="stockModal = true; selectedProduct = {id: 'SAR-001', name: 'Sariayu Masker Wajah', stock: 45}" 
                                            class="px-2 py-1 text-xs bg-blue-100 dark:bg-blue-500/20 text-blue-600 dark:text-blue-400 rounded hover:bg-blue-200 font-bold transition" title="Update Stok">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <a href="{{ route('admin.produk.edit', '#') }}" class="px-2 py-1 text-xs bg-indigo-100 dark:bg-indigo-500/20 text-indigo-600 dark:text-indigo-400 rounded hover:bg-indigo-200 font-bold transition">
                                        <i class="fas fa-pencil"></i>
                                    </a>
                                    <button class="px-2 py-1 text-xs bg-rose-100 dark:bg-rose-500/20 text-rose-600 dark:text-rose-400 rounded hover:bg-rose-200 font-bold transition" onclick="confirm('Hapus produk ini?')">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>

                        <!-- Produk 2 -->
                        <tr class="hover:bg-slate-50 dark:hover:bg-slate-800/50 transition-colors">
                            <td class="px-6 py-4">
                                <div class="flex flex-col">
                                    <span class="font-bold text-slate-800 dark:text-white">Sariayu Serum Vitamin C</span>
                                    <span class="text-[10px] text-slate-400 italic">ID: SAR-002</span>
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <span class="font-mono font-bold text-indigo-600 dark:text-indigo-400">Rp 250.000</span>
                            </td>
                            <td class="px-6 py-4 text-center">
                                <span class="font-bold text-slate-800 dark:text-white">8 <span class="text-xs font-normal">pcs</span></span>
                            </td>
                            <td class="px-6 py-4">
                                <span class="px-3 py-1 bg-amber-100 dark:bg-amber-500/20 text-amber-700 dark:text-amber-300 text-[10px] font-bold rounded-full uppercase inline-block">Stok Rendah</span>
                            </td>
                            <td class="px-6 py-4">
                                <span class="px-3 py-1 bg-emerald-100 dark:bg-emerald-500/20 text-emerald-700 dark:text-emerald-300 text-[10px] font-bold rounded-full uppercase inline-block">Aktif</span>
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex gap-2">
                                    <button @click="stockModal = true; selectedProduct = {id: 'SAR-002', name: 'Sariayu Serum Vitamin C', stock: 8}" 
                                            class="px-2 py-1 text-xs bg-blue-100 dark:bg-blue-500/20 text-blue-600 dark:text-blue-400 rounded hover:bg-blue-200 font-bold transition" title="Update Stok">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <a href="{{ route('admin.produk.edit', '#') }}" class="px-2 py-1 text-xs bg-indigo-100 dark:bg-indigo-500/20 text-indigo-600 dark:text-indigo-400 rounded hover:bg-indigo-200 font-bold transition">
                                        <i class="fas fa-pencil"></i>
                                    </a>
                                    <button class="px-2 py-1 text-xs bg-rose-100 dark:bg-rose-500/20 text-rose-600 dark:text-rose-400 rounded hover:bg-rose-200 font-bold transition" onclick="confirm('Hapus produk ini?')">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>

                        <!-- Produk 3 -->
                        <tr class="hover:bg-slate-50 dark:hover:bg-slate-800/50 transition-colors">
                            <td class="px-6 py-4">
                                <div class="flex flex-col">
                                    <span class="font-bold text-slate-800 dark:text-white">Sariayu Toner Pelembab</span>
                                    <span class="text-[10px] text-slate-400 italic">ID: SAR-003</span>
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <span class="font-mono font-bold text-indigo-600 dark:text-indigo-400">Rp 150.000</span>
                            </td>
                            <td class="px-6 py-4 text-center">
                                <span class="font-bold text-slate-800 dark:text-white">0 <span class="text-xs font-normal">pcs</span></span>
                            </td>
                            <td class="px-6 py-4">
                                <span class="px-3 py-1 bg-rose-100 dark:bg-rose-500/20 text-rose-700 dark:text-rose-300 text-[10px] font-bold rounded-full uppercase inline-block">Habis</span>
                            </td>
                            <td class="px-6 py-4">
                                <span class="px-3 py-1 bg-slate-100 dark:bg-slate-700 text-slate-700 dark:text-slate-300 text-[10px] font-bold rounded-full uppercase inline-block">Non-aktif</span>
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex gap-2">
                                    <button @click="stockModal = true; selectedProduct = {id: 'SAR-003', name: 'Sariayu Toner Pelembab', stock: 0}" 
                                            class="px-2 py-1 text-xs bg-blue-100 dark:bg-blue-500/20 text-blue-600 dark:text-blue-400 rounded hover:bg-blue-200 font-bold transition" title="Update Stok">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <a href="{{ route('admin.produk.edit', '#') }}" class="px-2 py-1 text-xs bg-indigo-100 dark:bg-indigo-500/20 text-indigo-600 dark:text-indigo-400 rounded hover:bg-indigo-200 font-bold transition">
                                        <i class="fas fa-pencil"></i>
                                    </a>
                                    <button class="px-2 py-1 text-xs bg-rose-100 dark:bg-rose-500/20 text-rose-600 dark:text-rose-400 rounded hover:bg-rose-200 font-bold transition" onclick="confirm('Hapus produk ini?')">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>

                        <!-- Produk 4 -->
                        <tr class="hover:bg-slate-50 dark:hover:bg-slate-800/50 transition-colors">
                            <td class="px-6 py-4">
                                <div class="flex flex-col">
                                    <span class="font-bold text-slate-800 dark:text-white">Sariayu Day Cream SPF 50</span>
                                    <span class="text-[10px] text-slate-400 italic">ID: SAR-004</span>
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <span class="font-mono font-bold text-indigo-600 dark:text-indigo-400">Rp 320.000</span>
                            </td>
                            <td class="px-6 py-4 text-center">
                                <span class="font-bold text-slate-800 dark:text-white">32 <span class="text-xs font-normal">pcs</span></span>
                            </td>
                            <td class="px-6 py-4">
                                <span class="px-3 py-1 bg-emerald-100 dark:bg-emerald-500/20 text-emerald-700 dark:text-emerald-300 text-[10px] font-bold rounded-full uppercase inline-block">Tersedia</span>
                            </td>
                            <td class="px-6 py-4">
                                <span class="px-3 py-1 bg-emerald-100 dark:bg-emerald-500/20 text-emerald-700 dark:text-emerald-300 text-[10px] font-bold rounded-full uppercase inline-block">Aktif</span>
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex gap-2">
                                    <button @click="stockModal = true; selectedProduct = {id: 'SAR-004', name: 'Sariayu Day Cream SPF 50', stock: 32}" 
                                            class="px-2 py-1 text-xs bg-blue-100 dark:bg-blue-500/20 text-blue-600 dark:text-blue-400 rounded hover:bg-blue-200 font-bold transition" title="Update Stok">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <a href="{{ route('admin.produk.edit', '#') }}" class="px-2 py-1 text-xs bg-indigo-100 dark:bg-indigo-500/20 text-indigo-600 dark:text-indigo-400 rounded hover:bg-indigo-200 font-bold transition">
                                        <i class="fas fa-pencil"></i>
                                    </a>
                                    <button class="px-2 py-1 text-xs bg-rose-100 dark:bg-rose-500/20 text-rose-600 dark:text-rose-400 rounded hover:bg-rose-200 font-bold transition" onclick="confirm('Hapus produk ini?')">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="px-6 py-4 bg-gray-50/50 dark:bg-slate-900/50 border-t border-gray-100 dark:border-slate-800 flex justify-between items-center">
                <p class="text-xs text-slate-500 dark:text-slate-400">Menampilkan 4 dari 24 produk</p>
                <div class="flex gap-2">
                    <button class="px-3 py-1.5 border border-gray-200 dark:border-slate-700 rounded text-xs font-bold hover:bg-gray-100 dark:hover:bg-slate-800">← Sebelumnya</button>
                    <button class="px-3 py-1.5 bg-indigo-600 text-white rounded text-xs font-bold hover:bg-indigo-700">Berikutnya →</button>
                </div>
            </div>
        </div>

        <!-- Modal Update Stok -->
        <div x-show="stockModal" class="fixed inset-0 bg-black/50 dark:bg-black/70 flex items-center justify-center z-50 p-4" @click="stockModal = false" style="display: none;">
            <div @click.stop class="bg-white dark:bg-slate-900 rounded-2xl shadow-2xl max-w-md w-full border border-gray-200 dark:border-slate-800">
                <!-- Modal Header -->
                <div class="p-6 border-b border-gray-100 dark:border-slate-800">
                    <h2 class="text-lg font-bold text-slate-800 dark:text-white">Update Stok Produk</h2>
                    <p class="text-xs text-slate-400 mt-1" x-text="selectedProduct?.name"></p>
                </div>

                <!-- Modal Content -->
                <div class="p-6 space-y-4">
                    <div>
                        <label class="block text-xs font-bold text-slate-600 dark:text-slate-300 uppercase mb-2">Stok Saat Ini</label>
                        <p class="text-2xl font-bold text-slate-800 dark:text-white mb-4" x-text="selectedProduct?.stock + ' pcs'"></p>
                    </div>

                    <div>
                        <label class="block text-xs font-bold text-slate-600 dark:text-slate-300 uppercase mb-2">Stok Baru</label>
                        <input type="number" min="0" placeholder="Masukkan jumlah stok..." class="w-full px-4 py-3 bg-slate-50 dark:bg-slate-800 border border-gray-200 dark:border-slate-700 rounded-lg text-sm focus:ring-2 ring-indigo-500 outline-none dark:text-white font-bold">
                    </div>

                    <div>
                        <label class="block text-xs font-bold text-slate-600 dark:text-slate-300 uppercase mb-2">Catatan (Opsional)</label>
                        <textarea placeholder="Mis: Restock dari supplier..." rows="3" class="w-full px-4 py-2 bg-slate-50 dark:bg-slate-800 border border-gray-200 dark:border-slate-700 rounded-lg text-xs focus:ring-2 ring-indigo-500 outline-none dark:text-white"></textarea>
                    </div>
                </div>

                <!-- Modal Footer -->
                <div class="p-6 border-t border-gray-100 dark:border-slate-800 flex gap-3">
                    <button @click="stockModal = false" class="flex-1 bg-slate-100 dark:bg-slate-800 text-slate-700 dark:text-slate-200 px-4 py-2.5 rounded-lg font-bold text-sm transition-all hover:bg-slate-200">
                        Batal
                    </button>
                    <button class="flex-1 bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2.5 rounded-lg font-bold text-sm transition-all active:scale-95">
                        <i class="fas fa-save mr-2"></i> Simpan
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
