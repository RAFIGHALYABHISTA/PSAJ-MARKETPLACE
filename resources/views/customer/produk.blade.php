@extends('layouts.customer')

@section('title', 'Produk')

@section('content')
    {{-- Hero Section --}}
    <section class="relative bg-[#F9F1E7] overflow-hidden py-16 sm:py-20 px-4 sm:px-6 lg:px-6">
        <div
            class="absolute top-0 right-0 w-48 sm:w-64 h-48 sm:h-64 bg-green-800/5 rounded-full blur-3xl -translate-y-1/2 translate-x-1/2 pointer-events-none">
        </div>
        <div
            class="absolute bottom-0 left-0 w-72 sm:w-96 h-72 sm:h-96 bg-[#B96710]/5 rounded-full blur-3xl translate-y-1/2 -translate-x-1/2 pointer-events-none">
        </div>

        <div class="max-w-7xl mx-auto text-center md:text-left relative z-10">
            <h1 class="text-4xl sm:text-5xl md:text-6xl font-serif text-[#5B2C04] leading-tight mb-4">
                Discover Your <br>
                <span class="text-[#738029] italic">Natural Glow</span> Collection
            </h1>
            <p class="text-stone-600 text-base sm:text-lg max-w-xl md:mx-0 mx-auto">
                Rangkaian perawatan kulit dan kecantikan yang diformulasikan dari kekayaan alam Indonesia untuk memancarkan
                pesona sejatimu.
            </p>
        </div>
    </section>

    {{-- Category Sticky Bar --}}
    <section class="sticky top-0 z-20 bg-white/80 backdrop-blur-md border-b border-stone-100 px-4 sm:px-6 lg:px-6 shadow-sm">
        <div class="max-w-7xl mx-auto py-4 overflow-x-auto no-scrollbar">
            <div class="flex md:justify-center gap-3 md:gap-4 min-w-max md:min-w-0">
                <button data-filter="all"
                    class="group flex items-center gap-2 px-5 py-2.5 rounded-full border border-transparent hover:border-[#738029]/30 hover:bg-[#F9F1E7] transition-all duration-300">
                    <svg xmlns="http://www.w3.org/2000/svg"
                        class="h-5 w-5 text-stone-400 group-hover:text-[#738029] transition-colors" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                            d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                    <span class="text-sm font-medium text-stone-600 group-hover:text-[#5B2C04]">Semua</span>
                </button>
                @foreach ($categories as $cat)
                    <button data-filter="{{ $cat->name }}"
                        class="group flex items-center gap-2 px-5 py-2.5 rounded-full border border-transparent hover:border-[#738029]/30 hover:bg-[#F9F1E7] transition-all duration-300">
                        <svg xmlns="http://www.w3.org/2000/svg"
                            class="h-5 w-5 text-stone-400 group-hover:text-[#738029] transition-colors" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                d="M7 21h10l-1-7H8l-1 7zM12 3v11" />
                        </svg>
                        <span class="text-sm font-medium text-stone-600 group-hover:text-[#5B2C04]">{{ $cat->name }}</span>
                    </button>
                @endforeach
            </div>
        </div>
    </section>

    {{-- Main Content Section --}}
    <section class="px-4 sm:px-6 lg:px-6 py-12 min-h-screen bg-stone-50">
        <div class="max-w-7xl mx-auto flex flex-col lg:flex-row gap-10">

            {{-- Left Sidebar Filter --}}
            <div class="w-full lg:w-72 shrink-0 mx-auto lg:mx-0">
                <details open
                    class="group bg-white rounded-2xl shadow-sm border border-stone-100 overflow-hidden lg:sticky lg:top-32">
                    <summary
                        class="list-none cursor-pointer flex items-center justify-between gap-2 p-5 bg-white hover:bg-stone-50 transition select-none">
                        <span class="flex items-center gap-2 font-serif text-lg text-[#5B2C04]">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 4h18l-7 8v6l-4 2v-8L3 4z" />
                            </svg>
                            Filter Produk
                        </span>
                        <span class="text-stone-400 transition-transform group-open:rotate-180">▼</span>
                    </summary>

                    <div class="p-6 space-y-8 border-t border-stone-100">
                        <div>
                            <h3 class="text-sm font-bold uppercase tracking-widest text-stone-400 mb-4">Kategori Cepat</h3>
                            <div class="space-y-2">
                                <a href="#"
                                    class="block w-full text-center rounded-lg border border-stone-200 py-2.5 text-sm text-stone-600 hover:border-[#738029] hover:text-[#738029] hover:bg-[#F9F1E7] transition-all">New
                                    Arrival</a>
                                <a href="#"
                                    class="block w-full text-center rounded-lg border border-stone-200 py-2.5 text-sm text-stone-600 hover:border-[#738029] hover:text-[#738029] hover:bg-[#F9F1E7] transition-all">Best
                                    Seller</a>
                            </div>
                        </div>

                        <div>
                            <h3 class="text-sm font-bold uppercase tracking-widest text-stone-400 mb-4">Urutkan</h3>
                            <div class="space-y-3">
                                <label class="flex items-center gap-3 cursor-pointer group">
                                    <input type="radio" name="sort" value="low" class="accent-[#738029] w-4 h-4">
                                    <span class="text-sm text-stone-600 group-hover:text-[#738029] transition">Harga
                                        Terendah</span>
                                </label>
                                <label class="flex items-center gap-3 cursor-pointer group">
                                    <input type="radio" name="sort" value="high" class="accent-[#738029] w-4 h-4">
                                    <span class="text-sm text-stone-600 group-hover:text-[#738029] transition">Harga
                                        Tertinggi</span>
                                </label>
                            </div>
                        </div>

                        <div>
                            <h3 class="text-sm font-bold uppercase tracking-widest text-stone-400 mb-4">Rentang Harga</h3>
                            <div class="flex justify-between text-[#738029] font-bold text-xs mb-4">
                                <span>Rp 0</span>
                                <span id="priceMax">Rp 1jt+</span>
                            </div>
                            <input id="priceRange" type="range" min="0" max="1000000" step="10000"
                                value="1000000"
                                class="w-full h-1.5 bg-stone-200 rounded-lg appearance-none cursor-pointer accent-[#738029]">
                        </div>

                        <button id="resetFilters"
                            class="w-full py-3 text-xs font-bold uppercase tracking-widest text-stone-500 border-t border-stone-100 hover:text-red-500 transition mt-4">
                            Reset Filter
                        </button>
                    </div>
                </details>
            </div>

            {{-- Product Grid --}}
            <div class="flex-1">
                <div class="flex flex-col md:flex-row md:items-center justify-between mb-8 gap-4">
                    <h2 class="text-2xl font-serif text-[#5B2C04]">Katalog Produk</h2>

                    <div class="relative group w-full md:w-80">
                        <input id="productSearch" type="text" placeholder="Cari produk kecantikan..."
                            class="w-full pl-4 pr-10 py-3 rounded-full bg-white border border-stone-200 focus:outline-none focus:border-[#738029] focus:ring-1 focus:ring-[#738029] transition-all text-sm text-stone-600 shadow-sm">
                        <a href="#"
                            class="w-8 h-8 rounded-full border border-stone-200 text-stone-400 hover:bg-[#738029] hover:border-[#738029] hover:text-white transition-colors flex items-center justify-center">
                            <svg xmlns="http://www.w3.org/2000/svg"
                                class="h-5 w-5 text-stone-400 absolute right-4 top-1/2 -translate-y-1/2 group-focus-within:text-[#738029] transition-colors"
                                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="m21 21-4.35-4.35M10.5 18a7.5 7.5 0 1 1 0-15 7.5 7.5 0 0 1 0 15z" />
                            </svg>
                        </a>
                    </div>
                </div>

                {{-- DYNAMIC GRID --}}
                <div id="productGrid" class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
                    @forelse($products as $prod)
                        <div class="product-card group" data-category="{{ $prod->category?->name ?? 'uncategorized' }}"
                            data-price="{{ $prod->price }}" data-name="{{ strtolower($prod->name) }}">
                            <div
                                class="bg-white rounded-[20px] p-4 border border-stone-100 shadow-[0_2px_15px_rgba(0,0,0,0.03)] hover:shadow-[0_10px_30px_rgba(0,0,0,0.08)] hover:-translate-y-1 transition-all duration-300 h-full flex flex-col">

                                <div
                                    class="bg-[#F9F1E7] rounded-[15px] h-40 sm:h-48 flex items-center justify-center mb-4 relative overflow-hidden">
                                    {{-- Handling Image Realtime --}}
                                    <img src="{{ Str::startsWith($prod->image, 'http') ? $prod->image : asset($prod->image) }}"
                                        alt="{{ $prod->name }}"
                                        class="h-32 sm:h-36 object-contain mix-blend-multiply group-hover:scale-110 transition duration-500">

                                    <button
                                        class="absolute bottom-3 right-3 bg-white w-8 h-8 rounded-full shadow flex items-center justify-center text-[#738029] opacity-0 group-hover:opacity-100 translate-y-2 group-hover:translate-y-0 transition-all duration-300 hover:bg-[#738029] hover:text-white">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                        </svg>
                                    </button>
                                </div>

                                <div class="flex-1 flex flex-col">
                                    <p class="text-[10px] text-[#9C4A1A] font-bold uppercase tracking-wider mb-1">
                                        {{ $prod->category?->name ?? 'Uncategorized' }}</p>
                                    <h3
                                        class="text-sm font-bold text-[#5B2C04] leading-snug mb-2 line-clamp-2 uppercase tracking-tighter">
                                        {{ $prod->name }}</h3>

                                    <div class="mt-auto pt-3 border-t border-stone-50 space-y-2">
                                        <div class="flex items-center justify-between">
                                            <p class="font-serif text-lg text-[#5B2C04]">Rp
                                                {{ number_format($prod->price, 0, ',', '.') }}</p>
                                            <p class="text-xs font-medium {{ $prod->stock > 0 ? 'text-[#738029]' : 'text-red-500' }}">
                                                Stok: {{ $prod->stock }} pcs
                                            </p>
                                        </div>
                                        <a href="{{ route('customer.transaksi.show', $prod->id) }}"
                                            class="w-full py-2 rounded-full border border-stone-200 text-stone-400 hover:bg-[#738029] hover:border-[#738029] hover:text-white transition-colors flex items-center justify-center gap-2 text-sm font-medium">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none"
                                                viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M12 4v16m8-8H4" />
                                            </svg>
                                            Beli
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="col-span-full py-20 text-center empty-state">
                            <p class="text-stone-400 italic">Belum ada produk yang tersedia saat ini.</p>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
    </section>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const categoryButtons = document.querySelectorAll('[data-filter]');
            const searchInput = document.getElementById('productSearch');
            const sortRadios = document.querySelectorAll('input[name="sort"]');
            const priceRange = document.getElementById('priceRange');
            const resetButton = document.getElementById('resetFilters');
            const productGrid = document.getElementById('productGrid');
            const productCards = Array.from(document.querySelectorAll('.product-card'));
            const priceMaxLabel = document.getElementById('priceMax');
            let activeCategory = 'all';
            let searchTerm = '';
            let activeSort = '';
            let activeMaxPrice = 1000000;

            function setActiveCategory(button) {
                categoryButtons.forEach(btn => {
                    btn.classList.remove('border-[#738029]', 'text-[#5B2C04]', 'bg-[#F9F1E7]');
                });
                if (button) {
                    button.classList.add('border-[#738029]', 'text-[#5B2C04]', 'bg-[#F9F1E7]');
                }
            }

            function updatePriceLabel() {
                if (!priceMaxLabel) return;
                priceMaxLabel.textContent = activeMaxPrice >= 1000000 ? 'Rp 1jt+' : 'Rp ' + activeMaxPrice
                    .toLocaleString('id-ID');
            }

            function applyFilters() {
                let visibleCount = 0;

                productCards.forEach(card => {
                    const name = card.dataset.name || '';
                    const category = card.dataset.category || 'uncategorized';
                    const price = Number(card.dataset.price || 0);
                    let visible = true;

                    if (activeCategory !== 'all' && category !== activeCategory) {
                        visible = false;
                    }
                    if (searchTerm && !name.includes(searchTerm)) {
                        visible = false;
                    }
                    if (price > activeMaxPrice) {
                        visible = false;
                    }

                    card.style.display = visible ? '' : 'none';
                    if (visible) visibleCount += 1;
                });

                sortProducts();

                const emptyState = document.querySelector('.empty-state');
                if (emptyState) {
                    emptyState.classList.toggle('hidden', visibleCount > 0);
                }
            }

            function sortProducts() {
                if (!productGrid) return;
                const visibleCards = productCards.filter(card => card.style.display !== 'none');
                if (!visibleCards.length) return;

                if (activeSort === 'low') {
                    visibleCards.sort((a, b) => Number(a.dataset.price) - Number(b.dataset.price));
                } else if (activeSort === 'high') {
                    visibleCards.sort((a, b) => Number(b.dataset.price) - Number(a.dataset.price));
                }

                visibleCards.forEach(card => productGrid.appendChild(card));
            }

            categoryButtons.forEach(button => {
                button.addEventListener('click', function() {
                    activeCategory = this.dataset.filter || 'all';
                    setActiveCategory(this);
                    applyFilters();
                });
            });

            if (searchInput) {
                searchInput.addEventListener('input', function() {
                    searchTerm = this.value.toLowerCase();
                    applyFilters();
                });
            }

            sortRadios.forEach(radio => {
                radio.addEventListener('change', function() {
                    activeSort = this.checked ? this.value : '';
                    applyFilters();
                });
            });

            if (priceRange) {
                priceRange.addEventListener('input', function() {
                    activeMaxPrice = Number(this.value) || 1000000;
                    updatePriceLabel();
                    applyFilters();
                });
            }

            if (resetButton) {
                resetButton.addEventListener('click', function(event) {
                    event.preventDefault();
                    activeCategory = 'all';
                    searchTerm = '';
                    activeSort = '';
                    activeMaxPrice = 1000000;

                    if (searchInput) {
                        searchInput.value = '';
                    }
                    sortRadios.forEach(radio => radio.checked = false);
                    if (priceRange) {
                        priceRange.value = activeMaxPrice;
                    }
                    updatePriceLabel();
                    setActiveCategory(document.querySelector('[data-filter="all"]'));
                    applyFilters();
                });
            }

            setActiveCategory(document.querySelector('[data-filter="all"]'));
            updatePriceLabel();
            applyFilters();
        });
    </script>
@endsection
