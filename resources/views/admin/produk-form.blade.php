@extends('layouts.admin.header')

@section('content')
<div class="min-h-screen transition-colors duration-300 dark:bg-slate-950 bg-[#F8FAFC]">
    
    <header class="bg-white dark:bg-slate-900 border-b border-gray-200 dark:border-slate-800 sticky top-0 z-10 p-4 px-8 flex justify-between items-center">
        <div>
            <h1 class="text-xl font-bold text-slate-800 dark:text-white">
                {{ isset($product) ? 'Edit Produk' : 'Tambah Produk Baru' }}
            </h1>
            <p class="text-xs text-slate-400 font-medium">Kelola katalog dan stok <span class="text-indigo-600">Sariayu</span></p>
        </div>
        <a href="{{ route('admin.produk') }}" class="text-slate-600 dark:text-slate-400 hover:text-slate-800 dark:hover:text-white transition">
            <i class="fas fa-arrow-left mr-2"></i> Kembali
        </a>
    </header>

    <div class="p-8 max-w-2xl mx-auto">
        @if ($errors->any())
        <div class="mb-6 bg-rose-50 dark:bg-rose-900/20 border border-rose-200 dark:border-rose-800 rounded-xl p-4 flex items-start space-x-3">
            <div class="shrink-0 w-10 h-10 bg-rose-100 dark:bg-rose-800/50 rounded-full flex items-center justify-center">
                <i class="fas fa-exclamation-circle text-rose-600 dark:text-rose-400 text-lg"></i>
            </div>
            <div class="flex-1 min-w-0">
                <p class="text-sm font-bold text-rose-800 dark:text-rose-300">Terjadi Kesalahan!</p>
                <ul class="mt-1 text-xs text-rose-600 dark:text-rose-400 space-y-1">
                    @foreach ($errors->all() as $error)
                        <li><i class="fas fa-times-circle mr-1 text-[10px]"></i> {{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
        @endif

        <form action="{{ isset($product) ? route('admin.produk.update', $product) : route('admin.produk.store') }}" 
              method="POST" 
              class="bg-white dark:bg-slate-900 border border-gray-200 dark:border-slate-800 rounded-2xl p-8 shadow-sm">
            @csrf
            @if(isset($product))
                @method('PUT')
            @endif

            <div class="space-y-6">
                <!-- Category Field -->
                <div>
                    <label class="block text-sm font-bold text-slate-700 dark:text-slate-300 mb-2">
                        Kategori Produk <span class="text-red-500">*</span>
                    </label>
                    <select name="category_id" 
                            class="w-full px-4 py-3 bg-slate-50 dark:bg-slate-800 border border-gray-200 dark:border-slate-700 text-slate-800 dark:text-white rounded-xl focus:ring-2 ring-indigo-500 outline-none transition"
                            required>
                        <option value="">-- Pilih Kategori --</option>
                        @foreach(App\Models\Category::getDropdownOptions() as $id => $name)
                            <option value="{{ $id }}" {{ old('category_id', $product->category_id ?? '') == $id ? 'selected' : '' }}>
                                {{ $name }}
                            </option>
                        @endforeach
                    </select>
                    <p class="text-xs text-slate-400 mt-2">
                        <i class="fas fa-info-circle mr-1"></i> Pilih kategori yang sesuai untuk produk ini
                    </p>
                </div>

                <!-- Description Field -->
                <div>
                    <label class="block text-sm font-bold text-slate-700 dark:text-slate-300 mb-2">
                        Nama Produk <span class="text-red-500">*</span>
                    </label>
                    <textarea name="name" 
                              rows="4"
                              placeholder="Masukkan deskripsi lengkap produk..." 
                              class="w-full px-4 py-3 bg-slate-50 dark:bg-slate-800 border border-gray-200 dark:border-slate-700 text-slate-800 dark:text-white placeholder-slate-400 rounded-xl focus:ring-2 ring-indigo-500 outline-none transition"
                              required>{{ old('name', $product->name ?? '') }}</textarea>
                </div>

                <!-- Price Field -->
                <div>
                    <label class="block text-sm font-bold text-slate-700 dark:text-slate-300 mb-2">
                        Harga Retail (Rp) <span class="text-red-500">*</span>
                    </label>
                    <div class="relative">
                        <span class="absolute left-4 top-3.5 text-slate-400 font-bold">Rp</span>
                        <input type="number" 
                               name="price" 
                               step="0.01"
                               min="0"
                               placeholder="0" 
                               class="w-full pl-12 pr-4 py-3 bg-slate-50 dark:bg-slate-800 border border-gray-200 dark:border-slate-700 text-slate-800 dark:text-white rounded-xl focus:ring-2 ring-indigo-500 outline-none transition"
                               value="{{ old('price', $product->price ?? '') }}"
                               required>
                    </div>
                </div>

                <!-- Image URL Field -->
                <div>
                    <label class="block text-sm font-bold text-slate-700 dark:text-slate-300 mb-2">
                        URL Gambar
                    </label>
                    <input type="url" 
                           name="image_url" 
                           placeholder="https://example.com/image.jpg" 
                           class="w-full px-4 py-3 bg-slate-50 dark:bg-slate-800 border border-gray-200 dark:border-slate-700 text-slate-800 dark:text-white placeholder-slate-400 rounded-xl focus:ring-2 ring-indigo-500 outline-none transition"
                           value="{{ old('image_url', $product->image_url ?? '') }}">
                    <p class="text-xs text-slate-400 mt-2">
                        <i class="fas fa-info-circle mr-1"></i> Gunakan URL lengkap (https://...)
                    </p>
                </div>

                <!-- Stock Field -->
                <div>
                    <label class="block text-sm font-bold text-slate-700 dark:text-slate-300 mb-2">
                        Stok <span class="text-red-500">*</span>
                    </label>
                    <input type="number" 
                           name="stock" 
                           min="0"
                           placeholder="0" 
                           class="w-full px-4 py-3 bg-slate-50 dark:bg-slate-800 border border-gray-200 dark:border-slate-700 text-slate-800 dark:text-white rounded-xl focus:ring-2 ring-indigo-500 outline-none transition"
                           value="{{ old('stock', $product->stock ?? 0) }}"
                           required>
                </div>

                <!-- Active Status Field -->
                <div>
                    <label class="flex items-center">
                        <input type="hidden" name="is_active" value="0">
                        <input type="checkbox"
                               name="is_active"
                               value="1"
                               class="w-5 h-5 rounded bg-slate-100 dark:bg-slate-800 border border-gray-300 dark:border-slate-700 text-indigo-600 focus:ring-2 ring-indigo-500 cursor-pointer"
                               {{ old('is_active', $product->is_active ?? true) ? 'checked' : '' }}>
                        <span class="ml-3 text-sm font-semibold text-slate-700 dark:text-slate-300">
                            <i class="fas fa-circle text-emerald-500 mr-2"></i> Produk Aktif / Tersedia
                        </span>
                    </label>
                    <p class="text-xs text-slate-400 mt-2 ml-8">
                        Produk akan ditampilkan di toko jika status aktif
                    </p>
                </div>
            </div>

            <!-- Action Buttons -->
            <div class="flex gap-4 mt-8 pt-6 border-t border-gray-200 dark:border-slate-700">
                <a href="{{ route('admin.manajemen-produk') }}" 
                   class="flex-1 bg-slate-100 dark:bg-slate-800 hover:bg-slate-200 dark:hover:bg-slate-700 text-slate-700 dark:text-slate-300 py-3 rounded-xl font-bold text-sm transition-colors text-center">
                    Batal
                </a>
                <button type="submit" 
                        class="flex-1 bg-indigo-600 hover:bg-indigo-700 text-white py-3 rounded-xl font-bold text-sm transition-colors shadow-lg shadow-indigo-200 dark:shadow-none">
                    <i class="fas fa-save mr-2"></i>
                    {{ isset($product) ? 'Simpan Perubahan' : 'Tambah Produk' }}
                </button>
            </div>
        </form>

        <!-- Preview Section (if product exists) -->
        @if(isset($product) && $product->id)
        <div class="mt-8 bg-white dark:bg-slate-900 border border-gray-200 dark:border-slate-800 rounded-2xl p-8 shadow-sm">
            <h3 class="text-lg font-bold text-slate-800 dark:text-white mb-6">
                <i class="fas fa-eye mr-2 text-indigo-600"></i> Pratinjau Produk
            </h3>
            <div class="bg-slate-50 dark:bg-slate-800 rounded-xl p-6 max-w-sm">
                <div class="h-40 bg-slate-200 dark:bg-slate-700 rounded-lg mb-4 flex items-center justify-center overflow-hidden">
                    @if($product->image_url)
                        <img src="{{ $product->image_url }}" alt="Produk" class="h-full w-full object-cover">
                    @else
                        <i class="fas fa-spa text-slate-300 text-4xl"></i>
                    @endif
                </div>
                <p class="text-xs text-slate-400 uppercase tracking-tighter mb-2 font-bold">Deskripsi</p>
                <p class="text-sm text-slate-700 dark:text-slate-300 mb-4 line-clamp-3">{{ $product->description }}</p>
                <div class="flex justify-between items-center">
                    <span class="font-bold text-indigo-600 dark:text-indigo-400">Rp {{ number_format($product->price, 0, ',', '.') }}</span>
                    <span class="text-[10px] font-bold {{ $product->is_active ? 'text-emerald-600' : 'text-rose-600' }}">
                        {{ $product->is_active ? 'AKTIF' : 'NONAKTIF' }}
                    </span>
                </div>
            </div>
        </div>
        @endif
    </div>
</div>
@endsection
