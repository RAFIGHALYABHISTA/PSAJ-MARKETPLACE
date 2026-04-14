@extends('layouts.admin.header')

@section('content')
<div class="min-h-screen transition-colors duration-300 dark:bg-slate-950 bg-[#F8FAFC]">

    <header class="bg-white dark:bg-slate-900 border-b border-gray-200 dark:border-slate-800 sticky top-0 z-30 p-4 px-8 flex justify-between items-center">
        <div>
            <h1 class="text-xl font-bold text-slate-800 dark:text-white">Katalog Produk</h1>
            <p class="text-xs text-slate-400 font-medium">Monitor katalog dan stok <span class="text-indigo-600">Sariayu</span></p>
        </div>

        <div class="flex items-center space-x-4">
            <a href="{{ route('admin.manajemen-produk') }}" class="bg-slate-700 hover:bg-slate-800 text-white px-4 py-2 rounded text-xs font-bold transition-all active:scale-95 shadow-sm">
                <i class="fas fa-sliders-h mr-2 text-[10px]"></i> KELOLA PRODUK
            </a>
        </div>
    </header>

    <div class="p-8 max-w-[1600px] mx-auto" x-data="{ detailModal: false, selectedProduct: null }">
        <!-- Filter Section -->
        <form method="GET" action="{{ route('admin.katalog-produk') }}" class="bg-white dark:bg-slate-900 border border-gray-200 dark:border-slate-800 rounded-xl p-6 shadow-sm mb-8">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-4">
                <div>
                    <label class="block text-xs font-bold text-slate-600 dark:text-slate-300 uppercase mb-2">Cari Produk</label>
                    <input type="text" name="search" value="{{ request('search') }}" placeholder="Nama produk..." class="w-full px-4 py-2.5 bg-slate-50 dark:bg-slate-800 border border-gray-200 dark:border-slate-700 rounded-lg text-xs focus:ring-2 ring-indigo-500 outline-none dark:text-white">
                </div>
                <div>
                    <label class="block text-xs font-bold text-slate-600 dark:text-slate-300 uppercase mb-2">Filter Status</label>
                    <select name="status" class="w-full px-4 py-2.5 bg-slate-50 dark:bg-slate-800 border border-gray-200 dark:border-slate-700 rounded-lg text-xs focus:ring-2 ring-indigo-500 outline-none dark:text-white">
                        <option value="">Semua Status</option>
                        <option value="aktif" {{ request('status') == 'aktif' ? 'selected' : '' }}>Aktif</option>
                        <option value="nonaktif" {{ request('status') == 'nonaktif' ? 'selected' : '' }}>Non-aktif</option>
                    </select>
                </div>
                <div>
                    <label class="block text-xs font-bold text-slate-600 dark:text-slate-300 uppercase mb-2">Filter Stok</label>
                    <select name="stock_status" class="w-full px-4 py-2.5 bg-slate-50 dark:bg-slate-800 border border-gray-200 dark:border-slate-700 rounded-lg text-xs focus:ring-2 ring-indigo-500 outline-none dark:text-white">
                        <option value="">Semua Produk</option>
                        <option value="available" {{ request('stock_status') == 'available' ? 'selected' : '' }}>Tersedia</option>
                        <option value="low" {{ request('stock_status') == 'low' ? 'selected' : '' }}>Stok Rendah</option>
                        <option value="out" {{ request('stock_status') == 'out' ? 'selected' : '' }}>Habis Terjual</option>
                    </select>
                </div>
                <div class="flex items-end gap-2">
                    <button type="submit" class="flex-1 bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2.5 rounded-lg text-xs font-bold transition-all active:scale-95 shadow-sm">
                        <i class="fas fa-search mr-2"></i> FILTER
                    </button>
                    <a href="{{ route('admin.katalog-produk') }}" class="px-4 py-2.5 bg-slate-100 dark:bg-slate-800 border border-gray-200 dark:border-slate-700 rounded-lg text-xs font-bold hover:bg-slate-200 transition">
                        <i class="fas fa-redo"></i>
                    </a>
                </div>
            </div>
        </form>

        <!-- KPI Cards -->
        <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-8">
            <div class="bg-white dark:bg-slate-900 p-5 rounded-lg border border-gray-200 dark:border-slate-800 shadow-sm">
                <p class="text-[10px] font-bold text-slate-400 uppercase tracking-wider mb-2">
                    <i class="fas fa-box mr-2 text-indigo-600"></i> Total Produk
                </p>
                <h2 class="text-2xl font-bold text-slate-800 dark:text-white">{{ $totalProducts }}</h2>
                <p class="text-xs text-slate-500 dark:text-slate-400 mt-1">{{ $activeProducts }} Aktif • {{ $inactiveProducts }} Non-aktif</p>
            </div>

            <div class="bg-white dark:bg-slate-900 p-5 rounded-lg border border-gray-200 dark:border-slate-800 shadow-sm">
                <p class="text-[10px] font-bold text-slate-400 uppercase tracking-wider mb-2">
                    <i class="fas fa-cubes mr-2 text-emerald-600"></i> Total Stok
                </p>
                <h2 class="text-2xl font-bold text-emerald-600 dark:text-emerald-400">{{ number_format($totalStock) }} pcs</h2>
                <p class="text-xs text-slate-500 dark:text-slate-400 mt-1">Nilai: Rp {{ number_format($totalValue / 1000000, 1) }}M</p>
            </div>

            <div class="bg-white dark:bg-slate-900 p-5 rounded-lg border border-gray-200 dark:border-slate-800 shadow-sm">
                <p class="text-[10px] font-bold text-slate-400 uppercase tracking-wider mb-2">
                    <i class="fas fa-exclamation-triangle mr-2 text-amber-600"></i> Stok Rendah
                </p>
                <h2 class="text-2xl font-bold text-amber-600 dark:text-amber-400">{{ $lowStockCount }} produk</h2>
                <p class="text-xs text-slate-500 dark:text-slate-400 mt-1">Perlu perhatian</p>
            </div>

            <div class="bg-white dark:bg-slate-900 p-5 rounded-lg border border-gray-200 dark:border-slate-800 shadow-sm">
                <p class="text-[10px] font-bold text-slate-400 uppercase tracking-wider mb-2">
                    <i class="fas fa-ban mr-2 text-rose-600"></i> Habis Terjual
                </p>
                <h2 class="text-2xl font-bold text-rose-600 dark:text-rose-400">{{ $outOfStockCount }} produk</h2>
                <p class="text-xs text-slate-500 dark:text-slate-400 mt-1">Butuh restock</p>
            </div>
        </div>

        <!-- Katalog Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
            @forelse($products as $product)
            @php
                $stockStatus = $product->stock == 0 ? 'out' : ($product->stock <= 10 ? 'low' : 'available');
                $cardStyles = [
                    'available' => ['from-slate-100 to-slate-200', 'bg-emerald-500', 'Tersedia', 'bg-emerald-100 dark:bg-emerald-500/20 text-emerald-700 dark:text-emerald-300'],
                    'low' => ['from-amber-50 to-orange-100 border-b-2 border-amber-200 dark:border-amber-500/30', 'bg-amber-500', 'Stok Rendah', 'bg-amber-100 dark:bg-amber-500/20 text-amber-700 dark:text-amber-300'],
                    'out' => ['from-slate-100 to-slate-300', 'bg-rose-500', 'Habis', 'bg-rose-100 dark:bg-rose-500/20 text-rose-700 dark:text-rose-300']
                ];
                $icons = ['available' => 'fa-spa', 'low' => 'fa-droplet text-amber-300', 'out' => 'fa-wind'];
                $isInactive = !$product->is_active;
                $opacity = ($stockStatus == 'out' || $isInactive) ? 'opacity-60' : '';

                // Get realtime category data from database
                $catId = $product->category_id ?? 0;
                $categoryData = $categories[$catId] ?? null;
                $categoryName = $categoryData ? $categoryData->name : 'Tanpa Kategori';
                $categoryIcon = $categoryData ? ($categoryData->icon ?? 'fa-tag') : 'fa-question';

                // Dynamic colors based on category ID (cycle through colors)
                $colorPalettes = [
                    ['bg-blue-100 dark:bg-blue-500/20 text-blue-700 dark:text-blue-300', 'border-blue-200 dark:border-blue-500/30'],
                    ['bg-pink-100 dark:bg-pink-500/20 text-pink-700 dark:text-pink-300', 'border-pink-200 dark:border-pink-500/30'],
                    ['bg-purple-100 dark:bg-purple-500/20 text-purple-700 dark:text-purple-300', 'border-purple-200 dark:border-purple-500/30'],
                    ['bg-orange-100 dark:bg-orange-500/20 text-orange-700 dark:text-orange-300', 'border-orange-200 dark:border-orange-500/30'],
                    ['bg-teal-100 dark:bg-teal-500/20 text-teal-700 dark:text-teal-300', 'border-teal-200 dark:border-teal-500/30'],
                    ['bg-cyan-100 dark:bg-cyan-500/20 text-cyan-700 dark:text-cyan-300', 'border-cyan-200 dark:border-cyan-500/30'],
                    ['bg-lime-100 dark:bg-lime-500/20 text-lime-700 dark:text-lime-300', 'border-lime-200 dark:border-lime-500/30'],
                    ['bg-amber-100 dark:bg-amber-500/20 text-amber-700 dark:text-amber-300', 'border-amber-200 dark:border-amber-500/30'],
                    ['bg-rose-100 dark:bg-rose-500/20 text-rose-700 dark:text-rose-300', 'border-rose-200 dark:border-rose-500/30'],
                    ['bg-emerald-100 dark:bg-emerald-500/20 text-emerald-700 dark:text-emerald-300', 'border-emerald-200 dark:border-emerald-500/30'],
                    ['bg-indigo-100 dark:bg-indigo-500/20 text-indigo-700 dark:text-indigo-300', 'border-indigo-200 dark:border-indigo-500/30'],
                    ['bg-fuchsia-100 dark:bg-fuchsia-500/20 text-fuchsia-700 dark:text-fuchsia-300', 'border-fuchsia-200 dark:border-fuchsia-500/30'],
                ];
                $colorIndex = $catId > 0 ? (($catId - 1) % count($colorPalettes)) : 0;
                $catStyle = $categoryData ? $colorPalettes[$colorIndex] : ['bg-slate-100 dark:bg-slate-700 text-slate-600 dark:text-slate-400', 'border-slate-200 dark:border-slate-600'];
                $escapedName = addslashes($product->name);
                $escapedCategory = addslashes($categoryName);
            @endphp
            <div class="bg-white dark:bg-slate-900 rounded-2xl border border-gray-100 dark:border-slate-800 shadow-sm hover:shadow-lg hover:-translate-y-1 transition-all duration-300 overflow-hidden group cursor-pointer {{ $opacity }} {{ $isInactive ? 'grayscale-[0.3]' : '' }}">
                <div class="h-48 bg-gradient-to-br {{ $cardStyles[$stockStatus][0] }} dark:from-slate-800 dark:to-slate-700 relative overflow-hidden">
                    <div class="flex items-center justify-center h-full">
                        @if($product->image)
                            <img src="{{ asset($product->image) }}" alt="{{ $product->name }}" class="h-full w-full object-contain p-4 {{ $isInactive ? 'grayscale' : '' }}">
                        @elseif($product->image_url)
                            <img src="{{ $product->image_url }}" alt="{{ $product->name }}" class="h-full w-full object-cover {{ $isInactive ? 'grayscale' : '' }}">
                        @else
                            <i class="fas {{ $icons[$stockStatus] }} {{ $isInactive ? 'grayscale' : '' }} text-slate-400 text-5xl"></i>
                        @endif
                    </div>

                    <!-- Category Label -->
                    <div class="absolute top-4 left-4">
                        <span class="px-2.5 py-1.5 {{ $catStyle[0] }} border {{ $catStyle[1] }} text-[9px] font-black uppercase tracking-tighter rounded-full shadow-sm flex items-center gap-1.5">
                            <i class="fas {{ $categoryIcon }}"></i> {{ $categoryName }}
                        </span>
                    </div>

                    <!-- Status Badge -->
                    <div class="absolute top-4 right-4 flex gap-2">
                        @if($isInactive)
                            <span class="px-3 py-1.5 bg-slate-500 text-white text-[9px] font-black uppercase tracking-widest rounded-full shadow-lg">
                                <i class="fas fa-ban mr-1"></i> Non-aktif
                            </span>
                        @else
                            <span class="px-3 py-1.5 {{ $cardStyles[$stockStatus][1] }} text-white text-[9px] font-black uppercase tracking-widest rounded-full shadow-lg">
                                Aktif
                            </span>
                        @endif
                    </div>

                    <div class="absolute inset-0 bg-black/0 group-hover:bg-black/40 transition-all duration-300 flex items-center justify-center">
                        <button @click="detailModal = true; selectedProduct = {id: {{ $product->id }}, name: '{{ $escapedName }}', price: 'Rp {{ number_format($product->price, 0, ',', '.') }}', stock: {{ $product->stock }}, status: '{{ $product->is_active ? 'Aktif' : 'Non-aktif' }}', stockStatus: '{{ $cardStyles[$stockStatus][2] }}', description: '{{ $escapedCategory }}'}"
                                class="opacity-0 group-hover:opacity-100 transition-all duration-300 px-4 py-2 bg-indigo-600 text-white rounded-lg text-xs font-bold">
                            <i class="fas fa-eye mr-1"></i> Lihat Detail
                        </button>
                    </div>
                </div>

                <div class="p-5">
                    <div class="mb-3">
                        <h3 class="font-bold text-slate-800 dark:text-white line-clamp-2 mb-1 {{ $isInactive ? 'text-slate-400' : '' }}">
                            {{ $product->name }}
                        </h3>
                        <div class="flex items-center gap-2 mt-1">
                            <p class="text-[10px] text-slate-400 font-mono uppercase">ID: PROD-{{ str_pad($product->id, 3, '0', STR_PAD_LEFT) }}</p>
                            @if($isInactive)
                                <span class="px-1.5 py-0.5 bg-slate-200 dark:bg-slate-700 text-slate-500 text-[8px] font-bold uppercase rounded">Nonaktif</span>
                            @endif
                        </div>
                    </div>

                    <div class="flex items-center justify-between mb-3 bg-slate-50 dark:bg-slate-800/50 p-3 rounded-lg {{ $isInactive ? 'opacity-70' : '' }}">
                        <div>
                            <p class="text-[9px] text-slate-400 uppercase font-bold">Harga</p>
                            <p class="font-bold text-indigo-600 dark:text-indigo-400 text-sm">Rp {{ number_format($product->price, 0, ',', '.') }}</p>
                        </div>
                        <div class="text-right border-l border-gray-200 dark:border-slate-700 pl-3">
                            <p class="text-[9px] text-slate-400 uppercase font-bold">Stok</p>
                            <p class="font-bold {{ $stockStatus == 'out' ? 'text-rose-600 dark:text-rose-400' : ($stockStatus == 'low' ? 'text-amber-600 dark:text-amber-400' : 'text-slate-800 dark:text-slate-200') }} text-sm">{{ $product->stock }} <span class="text-[10px] font-normal">pcs</span></p>
                        </div>
                    </div>

                    <div class="flex gap-2">
                        @if($isInactive)
                            <span class="flex-1 px-2 py-2 bg-slate-200 dark:bg-slate-700 text-slate-500 dark:text-slate-400 text-center text-[10px] font-bold rounded-lg uppercase">
                                <i class="fas fa-ban mr-1"></i> Produk Nonaktif
                            </span>
                        @else
                            <span class="flex-1 px-2 py-2 {{ $cardStyles[$stockStatus][3] }} text-center text-[10px] font-bold rounded-lg uppercase">
                                {{ $stockStatus == 'available' ? 'Tersedia' : ($stockStatus == 'low' ? 'Perlu Restock' : 'Habis Terjual') }}
                            </span>
                        @endif
                        <button @click="detailModal = true; selectedProduct = {id: {{ $product->id }}, name: '{{ $escapedName }}', price: 'Rp {{ number_format($product->price, 0, ',', '.') }}', stock: {{ $product->stock }}, status: '{{ $product->is_active ? 'Aktif' : 'Non-aktif' }}', stockStatus: '{{ $cardStyles[$stockStatus][2] }}', description: '{{ $escapedCategory }}'}"
                                class="px-3 py-2 bg-indigo-100 dark:bg-indigo-500/20 text-indigo-600 dark:text-indigo-400 rounded-lg text-[10px] font-bold hover:bg-indigo-200 transition">
                            <i class="fas fa-eye"></i>
                        </button>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-span-full text-center py-12">
                <i class="fas fa-box-open text-6xl text-slate-300 dark:text-slate-600 mb-4"></i>
                <p class="text-slate-500 dark:text-slate-400">Tidak ada produk ditemukan</p>
            </div>
            @endforelse
        </div>

        <!-- Pagination -->
        <div class="mt-8">
            {{ $products->links() }}
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
