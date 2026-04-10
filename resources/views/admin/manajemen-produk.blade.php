@extends('layouts.admin.header')

@section('content')
<div class="min-h-screen transition-colors duration-300 dark:bg-slate-950 bg-[#F8FAFC]">

    <header class="bg-white dark:bg-slate-900 border-b border-gray-200 dark:border-slate-800 sticky top-0 z-30 p-4 px-8 flex justify-between items-center">
        <div>
            <h1 class="text-xl font-bold text-slate-800 dark:text-white">Manajemen Produk</h1>
            <p class="text-xs text-slate-400 font-medium">Kelola katalog, stok, dan harga <span class="text-indigo-600">Sariayu</span></p>
        </div>

        <div class="flex items-center space-x-4">
            <a href="{{ route('admin.produk.create') }}" class="bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded text-xs font-bold transition-all active:scale-95 shadow-sm">
                <i class="fas fa-plus mr-2 text-[10px]"></i> TAMBAH PRODUK
            </a>
        </div>
    </header>

    <div class="p-8 max-w-[1600px] mx-auto" x-data="{ stockModal: false, selectedProduct: null, newStock: '' }">
        <!-- Filter Section -->
        <form method="GET" action="{{ route('admin.manajemen-produk') }}" class="bg-white dark:bg-slate-900 border border-gray-200 dark:border-slate-800 rounded-xl p-6 shadow-sm mb-8">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-4">
                <div>
                    <label class="block text-xs font-bold text-slate-600 dark:text-slate-300 uppercase mb-2">Cari Produk</label>
                    <input type="text" name="search" value="{{ request('search') }}" placeholder="Nama produk..." class="w-full px-4 py-2.5 bg-slate-50 dark:bg-slate-800 border border-gray-200 dark:border-slate-700 rounded-lg text-xs focus:ring-2 ring-indigo-500 outline-none dark:text-white">
                </div>
                <div>
                    <label class="block text-xs font-bold text-slate-600 dark:text-slate-300 uppercase mb-2">Status Produk</label>
                    <select name="status" class="w-full px-4 py-2.5 bg-slate-50 dark:bg-slate-800 border border-gray-200 dark:border-slate-700 rounded-lg text-xs focus:ring-2 ring-indigo-500 outline-none dark:text-white">
                        <option value="">Semua Status</option>
                        <option value="aktif" {{ request('status') == 'aktif' ? 'selected' : '' }}>Aktif</option>
                        <option value="nonaktif" {{ request('status') == 'nonaktif' ? 'selected' : '' }}>Non-aktif</option>
                    </select>
                </div>
                <div>
                    <label class="block text-xs font-bold text-slate-600 dark:text-slate-300 uppercase mb-2">Status Stok</label>
                    <select name="stock_status" class="w-full px-4 py-2.5 bg-slate-50 dark:bg-slate-800 border border-gray-200 dark:border-slate-700 rounded-lg text-xs focus:ring-2 ring-indigo-500 outline-none dark:text-white">
                        <option value="">Semua Stok</option>
                        <option value="available" {{ request('stock_status') == 'available' ? 'selected' : '' }}>Tersedia</option>
                        <option value="low" {{ request('stock_status') == 'low' ? 'selected' : '' }}>Stok Rendah</option>
                        <option value="out" {{ request('stock_status') == 'out' ? 'selected' : '' }}>Habis</option>
                    </select>
                </div>
                <div class="flex items-end gap-2">
                    <button type="submit" class="flex-1 bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2.5 rounded-lg text-xs font-bold transition-all active:scale-95 shadow-sm">
                        <i class="fas fa-search mr-2"></i> FILTER
                    </button>
                    <a href="{{ route('admin.manajemen-produk') }}" class="px-4 py-2.5 bg-slate-100 dark:bg-slate-800 border border-gray-200 dark:border-slate-700 rounded-lg text-xs font-bold hover:bg-slate-200 transition">
                        <i class="fas fa-redo"></i>
                    </a>
                </div>
            </div>
        </form>

        <!-- KPI Cards -->
        <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-8">
            <div class="bg-white dark:bg-slate-900 p-5 rounded-lg border border-gray-200 dark:border-slate-800 shadow-sm">
                <p class="text-[10px] font-bold text-slate-400 uppercase tracking-wider mb-2">Total Produk</p>
                <h2 class="text-2xl font-bold text-slate-800 dark:text-white">{{ $totalProducts }}</h2>
                <p class="text-xs text-slate-500 dark:text-slate-400 mt-1">{{ $inactiveProducts }} non-aktif</p>
            </div>

            <div class="bg-white dark:bg-slate-900 p-5 rounded-lg border border-gray-200 dark:border-slate-800 shadow-sm">
                <p class="text-[10px] font-bold text-slate-400 uppercase tracking-wider mb-2">Total Stok</p>
                <h2 class="text-2xl font-bold text-emerald-600 dark:text-emerald-400">{{ number_format($totalStock) }} pcs</h2>
                <p class="text-xs text-slate-500 dark:text-slate-400 mt-1">Rp {{ number_format($totalValue / 1000000, 1) }}M</p>
            </div>

            <div class="bg-white dark:bg-slate-900 p-5 rounded-lg border border-gray-200 dark:border-slate-800 shadow-sm">
                <p class="text-[10px] font-bold text-slate-400 uppercase tracking-wider mb-2">Stok Rendah</p>
                <h2 class="text-2xl font-bold text-amber-600 dark:text-amber-400">{{ $lowStockCount }} produk</h2>
                <p class="text-xs text-slate-500 dark:text-slate-400 mt-1">Perlu restock</p>
            </div>

            <div class="bg-white dark:bg-slate-900 p-5 rounded-lg border border-gray-200 dark:border-slate-800 shadow-sm">
                <p class="text-[10px] font-bold text-slate-400 uppercase tracking-wider mb-2">Habis Terjual</p>
                <h2 class="text-2xl font-bold text-rose-600 dark:text-rose-400">{{ $outOfStockCount }} produk</h2>
                <p class="text-xs text-slate-500 dark:text-slate-400 mt-1">Perlu diisi kembali</p>
            </div>
        </div>

        <!-- Produk Table -->
        <div class="bg-white dark:bg-slate-900 border border-gray-200 dark:border-slate-800 rounded-xl shadow-sm overflow-hidden">
            <div class="p-5 border-b border-gray-100 dark:border-slate-800 bg-gray-50/50 dark:bg-slate-900/50 flex justify-between items-center">
                <h3 class="font-bold text-slate-800 dark:text-white text-sm uppercase tracking-tight">Daftar Produk</h3>
                <div class="flex gap-2">
                    <button onclick="alert('Fitur export Excel akan segera hadir!')" class="bg-white dark:bg-slate-800 border border-gray-200 dark:border-slate-700 text-slate-600 dark:text-slate-300 px-4 py-2 rounded-lg text-xs font-bold hover:bg-gray-50 transition flex items-center gap-2">
                        <i class="fas fa-download"></i> EXPORT EXCEL
                    </button>
                </div>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead class="bg-white dark:bg-slate-900 border-b border-gray-100 dark:border-slate-800 text-slate-400 text-[10px] uppercase tracking-widest font-bold">
                        <tr>
                            <th class="px-6 py-4">Produk</th>
                            <th class="px-6 py-4">Kategori</th>
                            <th class="px-6 py-4">Harga</th>
                            <th class="px-6 py-4 text-center">Stok</th>
                            <th class="px-6 py-4">Status Stok</th>
                            <th class="px-6 py-4">Status Produk</th>
                            <th class="px-6 py-4">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-50 dark:divide-slate-800">
                        @forelse($products as $product)
                        @php
                            $stockStatus = $product->stock == 0 ? 'out' : ($product->stock <= 10 ? 'low' : 'available');
                            $stockLabels = [
                                'available' => ['Tersedia', 'bg-emerald-100 dark:bg-emerald-500/20 text-emerald-700 dark:text-emerald-300'],
                                'low' => ['Stok Rendah', 'bg-amber-100 dark:bg-amber-500/20 text-amber-700 dark:text-amber-300'],
                                'out' => ['Habis', 'bg-rose-100 dark:bg-rose-500/20 text-rose-700 dark:text-rose-300']
                            ];
                            $statusLabels = [
                                true => ['Aktif', 'bg-emerald-100 dark:bg-emerald-500/20 text-emerald-700 dark:text-emerald-300'],
                                false => ['Non-aktif', 'bg-slate-100 dark:bg-slate-700 text-slate-700 dark:text-slate-300']
                            ];
                            // Get realtime category data
                            $catId = $product->category_id ?? 0;
                            $categoryData = $categories[$catId] ?? null;
                            $categoryIcon = $categoryData ? ($categoryData->icon ?? 'fa-tag') : 'fa-question';

                            // Dynamic colors
                            $colorPalettes = [
                                ['bg-blue-100 dark:bg-blue-500/20 text-blue-700 dark:text-blue-300', 'border-blue-200'],
                                ['bg-pink-100 dark:bg-pink-500/20 text-pink-700 dark:text-pink-300', 'border-pink-200'],
                                ['bg-purple-100 dark:bg-purple-500/20 text-purple-700 dark:text-purple-300', 'border-purple-200'],
                                ['bg-orange-100 dark:bg-orange-500/20 text-orange-700 dark:text-orange-300', 'border-orange-200'],
                                ['bg-teal-100 dark:bg-teal-500/20 text-teal-700 dark:text-teal-300', 'border-teal-200'],
                                ['bg-cyan-100 dark:bg-cyan-500/20 text-cyan-700 dark:text-cyan-300', 'border-cyan-200'],
                                ['bg-lime-100 dark:bg-lime-500/20 text-lime-700 dark:text-lime-300', 'border-lime-200'],
                                ['bg-amber-100 dark:bg-amber-500/20 text-amber-700 dark:text-amber-300', 'border-amber-200'],
                                ['bg-rose-100 dark:bg-rose-500/20 text-rose-700 dark:text-rose-300', 'border-rose-200'],
                                ['bg-emerald-100 dark:bg-emerald-500/20 text-emerald-700 dark:text-emerald-300', 'border-emerald-200'],
                                ['bg-indigo-100 dark:bg-indigo-500/20 text-indigo-700 dark:text-indigo-300', 'border-indigo-200'],
                                ['bg-fuchsia-100 dark:bg-fuchsia-500/20 text-fuchsia-700 dark:text-fuchsia-300', 'border-fuchsia-200'],
                            ];
                            $colorIndex = $catId > 0 ? (($catId - 1) % count($colorPalettes)) : 0;
                            $catStyle = $categoryData ? $colorPalettes[$colorIndex] : ['bg-slate-100 dark:bg-slate-700 text-slate-600 dark:text-slate-400', 'border-slate-200'];
                        @endphp
                        <tr class="hover:bg-slate-50 dark:hover:bg-slate-800/50 transition-colors {{ !$product->is_active ? 'opacity-60' : '' }}">
                            <td class="px-6 py-4">
                                <div class="flex flex-col">
                                    <span class="font-bold {{ !$product->is_active ? 'text-slate-400' : 'text-slate-800 dark:text-white' }}">{{ $product->name }}</span>
                                    <span class="text-[10px] text-slate-400 italic">ID: PROD-{{ str_pad($product->id, 3, '0', STR_PAD_LEFT) }}</span>
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                @if($categoryData)
                                    <span class="inline-flex items-center px-2.5 py-1 {{ $catStyle[0] }} border {{ $catStyle[1] }} text-[9px] font-bold rounded-full">
                                        <i class="fas {{ $categoryIcon }} mr-1.5 text-[8px]"></i> {{ $categoryData->name }}
                                    </span>
                                @elseif($product->category_id)
                                    <span class="inline-flex items-center px-2.5 py-1 bg-slate-100 dark:bg-slate-700 text-slate-500 text-[9px] font-bold rounded-full">Kategori #{{ $product->category_id }}</span>
                                @else
                                    <span class="text-[10px] text-slate-400">-</span>
                                @endif
                            </td>
                            <td class="px-6 py-4">
                                <span class="font-mono font-bold text-indigo-600 dark:text-indigo-400">Rp {{ number_format($product->price, 0, ',', '.') }}</span>
                            </td>
                            <td class="px-6 py-4 text-center">
                                <span class="font-bold text-slate-800 dark:text-white">{{ $product->stock }} <span class="text-xs font-normal">pcs</span></span>
                            </td>
                            <td class="px-6 py-4">
                                <span class="px-3 py-1 {{ $stockLabels[$stockStatus][1] }} text-[10px] font-bold rounded-full uppercase inline-block">{{ $stockLabels[$stockStatus][0] }}</span>
                            </td>
                            <td class="px-6 py-4">
                                <span class="px-3 py-1 {{ $statusLabels[$product->is_active][1] }} text-[10px] font-bold rounded-full uppercase inline-block">{{ $statusLabels[$product->is_active][0] }}</span>
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex gap-2">
                                    <button @click="stockModal = true; selectedProduct = {id: {{ $product->id }}, name: '{{ $product->name }}', stock: {{ $product->stock }}}; newStock = ''"
                                            class="px-2 py-1 text-xs bg-blue-100 dark:bg-blue-500/20 text-blue-600 dark:text-blue-400 rounded hover:bg-blue-200 font-bold transition" title="Update Stok">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <a href="{{ route('admin.produk.edit', $product) }}" class="px-2 py-1 text-xs bg-indigo-100 dark:bg-indigo-500/20 text-indigo-600 dark:text-indigo-400 rounded hover:bg-indigo-200 font-bold transition">
                                        <i class="fas fa-pencil"></i>
                                    </a>
                                    <form action="{{ route('admin.produk.destroy', $product) }}" method="POST" class="inline" x-ref="deleteForm{{ $product->id }}">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button" @click="$dispatch('confirm-delete', $refs.deleteForm{{ $product->id }})" class="px-2 py-1 text-xs bg-rose-100 dark:bg-rose-500/20 text-rose-600 dark:text-rose-400 rounded hover:bg-rose-200 font-bold transition">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" class="px-6 py-10 text-center text-slate-400">
                                <i class="fas fa-box-open text-4xl mb-3"></i>
                                <p class="text-sm">Tidak ada produk ditemukan</p>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="px-6 py-4 bg-gray-50/50 dark:bg-slate-900/50 border-t border-gray-100 dark:border-slate-800 flex justify-between items-center">
                <p class="text-xs text-slate-500 dark:text-slate-400">Menampilkan {{ $products->count() }} dari {{ $products->total() }} produk</p>
                <div class="flex gap-2">
                    {{ $products->links() }}
                </div>
            </div>
        </div>

        <!-- Modal Update Stok -->
        <div x-show="stockModal" class="fixed inset-0 bg-black/50 dark:bg-black/70 flex items-center justify-center z-50 p-4" @click="stockModal = false" style="display: none;">
            <div @click.stop class="bg-white dark:bg-slate-900 rounded-2xl shadow-2xl max-w-md w-full border border-gray-200 dark:border-slate-800">
                <form :action="'/admin/produk/' + selectedProduct?.id" method="POST">
                    @csrf
                    @method('PATCH')
                    <input type="hidden" name="update_stock_only" value="1">

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
                            <input type="number" name="stock" x-model="newStock" min="0" placeholder="Masukkan jumlah stok..." class="w-full px-4 py-3 bg-slate-50 dark:bg-slate-800 border border-gray-200 dark:border-slate-700 rounded-lg text-sm focus:ring-2 ring-indigo-500 outline-none dark:text-white font-bold" required>
                        </div>

                        <div>
                            <label class="block text-xs font-bold text-slate-600 dark:text-slate-300 uppercase mb-2">Catatan (Opsional)</label>
                            <textarea name="stock_note" placeholder="Mis: Restock dari supplier..." rows="3" class="w-full px-4 py-2 bg-slate-50 dark:bg-slate-800 border border-gray-200 dark:border-slate-700 rounded-lg text-xs focus:ring-2 ring-indigo-500 outline-none dark:text-white"></textarea>
                        </div>
                    </div>

                    <!-- Modal Footer -->
                    <div class="p-6 border-t border-gray-100 dark:border-slate-800 flex gap-3">
                        <button type="button" @click="stockModal = false" class="flex-1 bg-slate-100 dark:bg-slate-800 text-slate-700 dark:text-slate-200 px-4 py-2.5 rounded-lg font-bold text-sm transition-all hover:bg-slate-200">
                            Batal
                        </button>
                        <button type="submit" class="flex-1 bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2.5 rounded-lg font-bold text-sm transition-all active:scale-95">
                            <i class="fas fa-save mr-2"></i> Simpan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
