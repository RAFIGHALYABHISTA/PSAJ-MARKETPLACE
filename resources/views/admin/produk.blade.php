@extends('layouts.admin.header')

@section('content')
<div class="flex-1 bg-gray-50 min-h-screen">
    <header class="bg-white border-b border-gray-200 sticky top-0 z-10 p-4 px-8 flex justify-between items-center">
        <div>
            <h1 class="text-xl font-bold text-gray-800">Manajemen Produk</h1>
            <p class="text-xs text-gray-500">Kelola semua produk Sariayu x Smega.</p>
        </div>
        <a href="{{ route('admin.produk.create') }}" class="bg-indigo-600 text-white px-4 py-2 rounded-lg text-sm font-semibold hover:bg-indigo-700 shadow-sm transition">
            <i class="fas fa-plus mr-2"></i> Tambah Produk
        </a>
    </header>

    <div class="p-8">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @forelse($products as $product)
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 hover:shadow-md transition">
                <div class="h-40 bg-gradient-to-br from-indigo-100 to-indigo-200 rounded-t-2xl flex items-center justify-center">
                    @if($product->image_url)
                        <img src="{{ $product->image_url }}" alt="{{ $product->description }}" class="h-full w-full object-cover rounded-t-2xl">
                    @else
                        <i class="fas fa-image text-indigo-400 text-4xl"></i>
                    @endif
                </div>
                <div class="p-4">
                    <h3 class="font-bold text-gray-800 mb-2">{{ base64_encode($product->id) }}</h3>
                    <p class="text-xs text-gray-500 mb-2 line-clamp-2">{{ $product->description }}</p>
                    <div class="flex justify-between items-center mb-3">
                        <span class="font-bold text-indigo-600">Rp {{ number_format($product->price, 0, ',', '.') }}</span>
                        <span class="text-xs px-2 py-1 rounded-full {{ $product->is_active ? 'bg-green-100 text-green-700' : 'bg-red-100 text-red-700' }}">
                            {{ $product->is_active ? 'Aktif' : 'Tidak Aktif' }}
                        </span>
                    </div>
                    <p class="text-xs text-gray-500 mb-3">Stok: <strong>{{ $product->stock }}</strong></p>
                    <div class="flex gap-2">
                        <a href="{{ route('admin.produk.edit', $product) }}" class="flex-1 text-center text-indigo-600 hover:text-indigo-900 text-sm font-semibold hover:bg-indigo-50 py-2 rounded-lg transition">Edit</a>
                        <form action="{{ route('admin.produk.destroy', $product) }}" method="POST" class="flex-1">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Yakin ingin menghapus?')" class="w-full text-red-600 hover:text-red-900 text-sm font-semibold hover:bg-red-50 py-2 rounded-lg transition">
                                Hapus
                            </button>
                        </form>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-span-full text-center py-12">
                <i class="fas fa-box text-4xl text-gray-300 mb-4"></i>
                <p class="text-gray-500">Belum ada produk</p>
            </div>
            @endforelse
        </div>

        @if($products->hasPages())
        <div class="mt-8 flex justify-center">
            {{ $products->links() }}
        </div>
        @endif
    </div>
</div>
@endsection
