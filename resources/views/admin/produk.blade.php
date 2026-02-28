@extends('layouts.header')

@section('content')
<div class="min-h-screen transition-colors duration-300 dark:bg-slate-950 bg-[#F8FAFC]">
    
    <header class="bg-white dark:bg-slate-900 border-b border-gray-200 dark:border-slate-800 sticky top-0 z-10 p-4 px-8 flex justify-between items-center">
        <div>
            <h1 class="text-xl font-bold text-slate-800 dark:text-white">Koleksi Produk</h1>
            <p class="text-xs text-slate-400 font-medium">Manajemen stok dan katalog <span class="text-indigo-600">Sariayu</span></p>
        </div>
        <a href="{{ route('admin.produk.create') }}" class="bg-indigo-600 hover:bg-indigo-700 text-white px-5 py-2.5 rounded-xl text-xs font-bold transition-all active:scale-95 shadow-sm flex items-center">
            <i class="fas fa-plus mr-2 text-[10px]"></i> TAMBAH PRODUK
        </a>
    </header>

    <div class="p-8 max-w-[1600px] mx-auto">
        <div class="mb-8 flex flex-wrap gap-4 justify-between items-center">
            <div class="relative">
                <input type="text" placeholder="Cari nama produk..." 
                       class="pl-10 pr-4 py-2.5 bg-white dark:bg-slate-900 border border-gray-200 dark:border-slate-800 rounded-xl text-xs focus:ring-1 ring-indigo-500 outline-none w-72 transition-all dark:text-white shadow-sm">
                <i class="fas fa-search absolute left-4 top-3.5 text-slate-400 text-xs"></i>
            </div>
            <div class="flex space-x-2">
                <button class="bg-white dark:bg-slate-900 border border-gray-200 dark:border-slate-800 text-slate-600 dark:text-slate-300 px-4 py-2.5 rounded-xl text-[10px] font-black tracking-widest hover:bg-gray-50 transition uppercase">
                    Kategori <i class="fas fa-chevron-down ml-2"></i>
                </button>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
            @forelse($products as $product)
            <div class="bg-white dark:bg-slate-900 rounded-[2rem] border border-gray-100 dark:border-slate-800 shadow-sm hover:shadow-xl hover:-translate-y-1 transition-all duration-300 overflow-hidden group">
                <div class="h-52 bg-slate-100 dark:bg-slate-800 relative overflow-hidden">
                    @if($product->image_url)
                        <img src="{{ $product->image_url }}" alt="Produk" class="h-full w-full object-cover group-hover:scale-110 transition-transform duration-500">
                    @else
                        <div class="flex flex-col items-center justify-center h-full">
                            <i class="fas fa-spa text-slate-300 text-5xl mb-2"></i>
                            <span class="text-[10px] text-slate-400 uppercase tracking-tighter">No Image Available</span>
                        </div>
                    @endif
                    
                    <div class="absolute top-4 right-4">
                        <span class="px-3 py-1.5 {{ $product->is_active ? 'bg-emerald-500' : 'bg-rose-500' }} text-white text-[9px] font-black uppercase tracking-widest rounded-full shadow-lg">
                            {{ $product->is_active ? 'Aktif' : 'Off' }}
                        </span>
                    </div>
                </div>

                <div class="p-6">
                    <div class="flex justify-between items-start mb-2">
                        <h3 class="font-bold text-slate-800 dark:text-white leading-tight line-clamp-1 flex-1 pr-2">
                            {{ $product->name ?? 'Produk Sariayu' }} 
                            <span class="text-[10px] text-slate-300 font-mono block mt-1 uppercase">ID: {{ substr(base64_encode($product->id), 0, 8) }}</span>
                        </h3>
                    </div>
                    
                    <p class="text-xs text-slate-500 dark:text-slate-400 mb-4 line-clamp-2 min-h-[2rem]">
                        {{ $product->description }}
                    </p>

                    <div class="flex items-center justify-between mb-6 bg-slate-50 dark:bg-slate-800/50 p-3 rounded-2xl">
                        <div>
                            <p class="text-[9px] text-slate-400 uppercase font-bold tracking-tighter">Harga Retail</p>
                            <p class="font-black text-indigo-600 dark:text-indigo-400 text-base">Rp {{ number_format($product->price, 0, ',', '.') }}</p>
                        </div>
                        <div class="text-right border-l border-gray-200 dark:border-slate-700 pl-4">
                            <p class="text-[9px] text-slate-400 uppercase font-bold tracking-tighter">Stok</p>
                            <p class="font-black text-slate-700 dark:text-slate-200">{{ $product->stock }} <span class="text-[10px] font-normal">pcs</span></p>
                        </div>
                    </div>

                    <div class="flex gap-2">
                        <a href="{{ route('admin.produk.edit', $product) }}" 
                           class="flex-1 bg-slate-100 dark:bg-slate-800 hover:bg-indigo-600 hover:text-white text-slate-600 dark:text-slate-300 text-center py-3 rounded-xl text-[10px] font-black uppercase tracking-widest transition-all">
                            Edit
                        </a>
                        <form action="{{ route('admin.produk.destroy', $product) }}" method="POST" class="flex-1">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Hapus produk ini?')" 
                                    class="w-full bg-slate-50 dark:bg-slate-800/30 hover:bg-rose-500 hover:text-white text-rose-500 text-center py-3 rounded-xl text-[10px] font-black uppercase tracking-widest transition-all">
                                Hapus
                            </button>
                        </form>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-span-full py-20 text-center">
                <div class="inline-block p-6 bg-white dark:bg-slate-900 rounded-[2rem] border border-gray-100 dark:border-slate-800">
                    <i class="fas fa-box-open text-slate-200 text-5xl mb-4 block"></i>
                    <p class="text-slate-400 text-sm font-medium">Belum ada produk dalam katalog Anda.</p>
                </div>
            </div>
            @endforelse
        </div>

        @if($products->hasPages())
        <div class="mt-12 flex justify-center">
            <div class="bg-white dark:bg-slate-900 p-2 rounded-2xl shadow-sm border border-gray-100 dark:border-slate-800">
                {{ $products->links() }}
            </div>
        </div>
        @endif
    </div>
</div>
@endsection