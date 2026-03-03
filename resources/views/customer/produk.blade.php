<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Produk</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    {{-- @vite('resources/css/app.css') --}}
</head>
<body class="bg-stone-100">
    <nav class="bg-white shadow-md sticky top-0 z-30">
        <div class="max-w-7xl mx-auto px-4">
            <div class="flex h-16 items-center justify-between">
                <!-- LEFT : Logo -->
                <div class="flex items-center">
                    <img src="{{ asset('images/logo.png') }}" alt="Logo" class="h-30 w-auto mt-5" />
                </div>
                <!-- CENTER : Menu -->
                <ul class="hidden md:flex items-center space-x-8 font-medium">
                    <li>
                        <a href="{{ url('/') }}" class="text-gray-700 hover:text-yellow-600 transition">Home</a>
                    </li>
                    <li>
                        <a href="#" class="text-gray-700 hover:text-yellow-600 transition">About Us</a>
                    </li>
                    <li>
                        <a href="{{ url('/produk') }}" class="text-gray-700 hover:text-yellow-600 transition">Product</a>
                    </li>
                </ul>
                <!-- RIGHT : Icons + Button -->
                <div class="flex items-center space-x-4">
                    <!-- Cart -->
                    <a href="{{ url('/keranjang') }}" class="text-gray-700 hover:text-yellow-600 transition">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 10.5V6a3.75 3.75 0 1 0-7.5 0v4.5m11.356-1.993 1.263 12c.07.665-.45 1.243-1.119 1.243H4.25 a1.125 1.125 0 0 1-1.12-1.243l1.264-12 A1.125 1.125 0 0 1 5.513 7.5h12.974 c.576 0 1.059.435 1.119 1.007Z"/>
                        </svg>
                    </a>
                    <!-- Profile -->
                    <button onclick="openProfile()" class="text-gray-700 hover:text-yellow-600 transition">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118 a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75 c-2.676 0-5.216-.584-7.499-1.632Z"/>
                        </svg>
                    </button>
                    <!-- Login Button -->
                    <a href="{{ url('/login') }}" class="ml-2 px-4 py-1.5 rounded-full bg-yellow-500 text-white text-sm font-medium hover:bg-yellow-600 transition">Masuk</a>
                </div>
            </div>
        </div>
    </nav>
<!-- HERO -->
    <section class="bg-gradient-to-r from-yellow-900 via-yellow-700 to-yellow-500 text-white py-16 px-6 mt-8">
        <div class="max-w-7xl mx-auto">
            <h1 class="text-4xl md:text-5xl font-serif leading-tight">
                Discover Your <br>
                <span class="text-pink-300">Glow</span> Collection
            </h1>
            <p class="mt-4 text-sm opacity-90">
                Semua orang berhak memiliki kulit yang sehat dan cerah
            </p>
        </div>
    </section>

    <!-- SEARCH & CATEGORY -->
    <section class="bg-stone-100 py-6 px-6 mt-4">
        <div class="max-w-7xl mx-auto space-y-4">
            <!-- Search -->
            <div class="flex gap-4">
                <!-- Categories -->
                <div class="flex flex-1 bg-white rounded-lg px-6 py-3 gap-10 text-sm justify-around shadow-md hover:shadow-xl">
                    <!-- Skin Care -->
                    <button data-filter="skincare" class="category-btn flex items-center gap-2 text-black hover:text-pink-500 transition">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 3c2.755 0 5 2.245 5 5 0 3.866-5 8-5 8s-5-4.134-5-8c0-2.755 2.245-5 5-5z"/>
                        </svg>
                        Skin Care
                    </button>
                    <!-- Body Care -->
                    <button data-filter="body-care" class="category-btn flex items-center gap-2 text-black hover:text-pink-500 transition">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 2h6v4H9zM7 6h10v14H7z"/>
                        </svg>
                        Body Care
                    </button>
                    <!-- Decorative -->
                    <button data-filter="decorative" class="category-btn flex items-center gap-2 text-black hover:text-pink-500 transition">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M7 21h10l-1-7H8l-1 7zM12 3v11"/>
                        </svg>
                        Decorative
                    </button>
                    <!-- Hair Care -->
                    <button data-filter="hair-care" class="category-btn flex items-center gap-2 text-black hover:text-pink-500 transition">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 2a6 6 0 016 6c0 4-6 12-6 12S6 12 6 8a6 6 0 016-6z"/>
                        </svg>
                        Hair Care
                    </button>
                    <!-- Make Up Base -->
                    <button data-filter="make-up-base" class="category-btn flex items-center gap-2 text-black hover:text-pink-500 transition">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M8 3h8l-1 10H9L8 3zM7 21h10"/>
                        </svg>
                        Make Up Base
                    </button>
                </div>
            </div>
        </div>
    </section>

    <!-- CONTENT -->
    <section class="px-6 py-10 min-h-screen bg-stone-100">
        <div class="max-w-7xl mx-auto flex gap-8">
            <details class="relative">
                <summary class="list-none cursor-pointer flex items-center gap-2 rounded-full border border-pink-300 px-4 py-2 text-pink-500 hover:bg-pink-500 hover:text-white">
                    <!-- icon -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4h18l-7 8v6l-4 2v-8L3 4z"/>
                    </svg>
                    Filter
                </summary>
                <!-- SIDEBAR (FIXED) -->
                <aside class="bg-white rounded-2xl p-6 shadow-xl w-72 space-y-8">
                    <!-- FILTER PRODUCT -->
                    <div>
                        <h3 class="text-xl font-semibold mb-4">Filter Product</h3>
                        <div class="space-y-3">
                            <a href="#" class="block w-full text-center rounded-full border border-pink-300 py-2 text-pink-500 transition-all duration-300 hover:bg-pink-500 hover:text-white hover:border-pink-500 hover:shadow-md active:scale-95">New Product</a>
                            <a href="#" class="block w-full text-center rounded-full border border-pink-300 py-2 text-pink-500 transition-all duration-300 hover:bg-pink-500 hover:text-white hover:border-pink-500 hover:shadow-md active:scale-95">Best Seller</a>
                            <a href="#" class="block w-full text-center rounded-full border border-pink-300 py-2 text-pink-500 transition-all duration-300 hover:bg-pink-500 hover:text-white hover:border-pink-500 hover:shadow-md active:scale-95">New Product</a>
                        </div>
                    </div>
                    <!-- SORT -->
                    <div>
                        <h3 class="text-xl font-semibold mb-4">Urutkan</h3>
                        <div class="space-y-3 text-sm">
                            <label class="flex items-center gap-3 border border-pink-300 rounded-full py-2 px-4 text-pink-500"><input type="radio" name="sort" class="accent-pink-500"> Harga Terendah</label>
                            <label class="flex items-center gap-3 border border-pink-300 rounded-full py-2 px-4 text-pink-500 "><input type="radio" name="sort" class="accent-pink-500"> Harga Tertinggi</label>
                            <label class="flex items-center gap-3 border border-pink-300 rounded-full py-2 px-4 text-pink-500"><input type="radio" name="sort" class="accent-pink-500"> Rating Terbaik</label>
                            <label class="flex items-center gap-3 border border-pink-300 rounded-full py-2 px-4 text-pink-500 "><input type="radio" name="sort" class="accent-pink-500"> Urutan Produk Dari A - Z</label>
                        </div>
                    </div>
                    <!-- PRICE RANGE -->
                    <div>
                        <h3 class="text-xl font-semibold mb-4">Rentang Harga</h3>
                        <div class="flex justify-between text-pink-500 text-sm mb-4"><span>Rp20.000</span><span>Rp800.000</span></div>
                        <input type="range" min="20000" max="800000" step="10000" class="w-full accent-pink-500 cursor-pointer">
                    </div>
                    <!-- RESET -->
                    <a href="#" class="block w-full text-center rounded-full border border-pink-300 py-2 text-pink-500 transition-all duration-300 hover:bg-pink-500 hover:text-white hover:border-pink-500 hover:shadow-md active:scale-95">Reset Semua Produk</a>
                </aside>
            </details>
            <!-- PRODUCT GRID -->
            <div class="flex-1 pr-4">
                <div class="flex items-center justify-between mb-6">
                    <h2 class="text-xl font-semibold text-black mb-4">All Product</h2>
                    <div class="flex items-center bg-white rounded-lg px-4 py-3 w-80 shadow-md hover:shadow-xl gap-2">
                        <input type="text" placeholder="Search Product" class="w-full outline-none text-sm">
                        <!-- Search Icon -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-black" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="m21 21-4.35-4.35M10.5 18a7.5 7.5 0 1 1 0-15 7.5 7.5 0 0 1 0 15z"/>
                        </svg>
                    </div>
                </div>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                    <!-- CARD -->
                    <div class="product-card" data-category="skincare">
                        <div class="bg-white rounded-xl p-4 shadow-md hover:shadow-xl hover:-translate-y-1 transition-all duration-300">
                            <img src="{{ asset('images/produk.png') }}" class="mx-auto h-40 object-contain">
                            <h3 class="mt-3 text-sm font-semibold">SARIAYU Facial Foam Series</h3>
                            {{-- <p class="text-xs text-gray-500">⭐⭐⭐⭐☆ 412 ulasan</p> --}}
                            <div class="flex items-center justify-between mt-3">
                                <p class="font-semibold mt-1">Rp 25.500</p>
                                <button onclick="openDetail()" class="text-xs px-3 py-1.5 rounded-full bg-pink-500 text-white hover:bg-pink-600 transition">Detail</button>
                            </div>
                        </div>
                    </div>
                    <div class="product-card" data-category="body-care">
                        <div class="bg-white rounded-xl p-4 shadow-md hover:shadow-xl hover:-translate-y-1 transition-all duration-300">
                            <img src="{{ asset('images/produk.png') }}" class="mx-auto h-40 object-contain">
                            <h3 class="mt-3 text-sm font-semibold">ulum</h3>
                            {{-- <p class="text-xs text-gray-500">⭐⭐⭐⭐☆ 412 ulasan</p> --}}
                            <div class="flex items-center justify-between mt-3">
                                <p class="font-semibold mt-1">Rp 25.500</p>
                                <button onclick="openDetail()" class="text-xs px-3 py-1.5 rounded-full bg-pink-500 text-white hover:bg-pink-600 transition">Detail</button>
                            </div>
                        </div>
                    </div>
                    <div class="product-card" data-category="hair-care">
                        <div class="bg-white rounded-xl p-4 shadow-md hover:shadow-xl hover:-translate-y-1 transition-all duration-300">
                            <img src="{{ asset('images/produk.png') }}" class="mx-auto h-40 object-contain">
                            <h3 class="mt-3 text-sm font-semibold">rafi</h3>
                            {{-- <p class="text-xs text-gray-500">⭐⭐⭐⭐☆ 412 ulasan</p> --}}
                            <div class="flex items-center justify-between mt-3">
                                <p class="font-semibold mt-1">Rp 25.500</p>
                                <button onclick="openDetail()" class="text-xs px-3 py-1.5 rounded-full bg-pink-500 text-white hover:bg-pink-600 transition">Detail</button>
                            </div>
                        </div>
                    </div>
                    <div class="product-card" data-category="decorative">
                        <div class="bg-white rounded-xl p-4 shadow-md hover:shadow-xl hover:-translate-y-1 transition-all duration-300">
                            <img src="{{ asset('images/produk.png') }}" class="mx-auto h-40 object-contain">
                            <h3 class="mt-3 text-sm font-semibold">sigit</h3>
                            {{-- <p class="text-xs text-gray-500">⭐⭐⭐⭐☆ 412 ulasan</p> --}}
                            <div class="flex items-center justify-between mt-3">
                                <p class="font-semibold mt-1">Rp 25.500</p>
                                <button onclick="openDetail()" class="text-xs px-3 py-1.5 rounded-full bg-pink-500 text-white hover:bg-pink-600 transition">Detail</button>
                            </div>
                        </div>
                    </div>
                    <div class="product-card" data-category="make-up-base">
                        <div class="bg-white rounded-xl p-4 shadow-md hover:shadow-xl hover:-translate-y-1 transition-all duration-300">
                            <img src="{{ asset('images/produk.png') }}" class="mx-auto h-40 object-contain">
                            <h3 class="mt-3 text-sm font-semibold">kevin</h3>
                            {{-- <p class="text-xs text-gray-500">⭐⭐⭐⭐☆ 412 ulasan</p> --}}
                            <div class="flex items-center justify-between mt-3">
                                <p class="font-semibold mt-1">Rp 25.500</p>
                                <button onclick="openDetail()" class="text-xs px-3 py-1.5 rounded-full bg-pink-500 text-white hover:bg-pink-600 transition">Detail</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<footer class="bg-gradient-to-r from-[#B3C247] to-[#7E640F] text-white mt-16">
        <div class="max-w-7xl mx-auto px-6 py-10">
            <!-- TOP FOOTER -->
            <div class="flex flex-col md:flex-row justify-between items-start gap-6">
                <!-- LEFT -->
                <div class="max-w-md space-y-3">
                    <img src="{{ asset('images/logo.png') }}" alt="Sariayu" class="h-28" />
                    <p class="text-black text-sm leading-relaxed">
                        Merawat kecantikan alami Anda dengan formula terpercaya berbasis sains dan alam Indonesia.
                    </p>
                </div>
                <!-- RIGHT -->
                <div class="text-right space-y-3">
                    <p class="font-medium text-black">Ikuti kami</p>
                    <div class="flex justify-end gap-3">
                        <!-- Instagram -->
                        <a href="#" class="text-black hover:text-white transition" aria-label="Instagram">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M7 3h10a4 4 0 014 4v10a4 4 0 01-4 4H7a4 4 0 01-4-4V7a4 4 0 014-4z" />
                                <circle cx="12" cy="12" r="3" />
                                <circle cx="17.5" cy="6.5" r="0.5" />
                            </svg>
                        </a>
                        <!-- Facebook -->
                        <a href="#" class="text-black hover:text-white transition" aria-label="Facebook">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 3h-3a4 4 0 00-4 4v3H6v4h2v7h4v-7h3l1-4h-4V7a1 1 0 011-1h3V3z" />
                            </svg>
                        </a>
                        <!-- Twitter -->
                        <a href="#" class="text-black hover:text-white transition" aria-label="Twitter">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M23 3a10.9 10.9 0 01-3.14 1.53A4.48 4.48 0 0016 3a4.48 4.48 0 00-4.47 5.49A12.94 12.94 0 013 4s-4 9 5 13a13.07 13.07 0 01-7 2c9 5 20 0 20-11.5a4.5 4.5 0 00-.08-.83A7.72 7.72 0 0023 3z" />
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
            <!-- DIVIDER -->
            <hr class="my-6 border-black/60">
            <!-- BOTTOM -->
            <p class="text-center text-sm text-black opacity-90">
                © 2025 SariayuXsmkn10sby. All rights reserved.
            </p>
        </div>
    </footer>

    <aside id="profilePanel" class="w-80 bg-white shadow-xl fixed right-0 top-0 h-full translate-x-full transition-transform duration-300 z-40">
        <!-- HEADER -->
        <div class="p-6 border-b flex justify-between items-center">
            <h2 class="text-lg font-semibold">Profil</h2>
            <button onclick="closeProfile()" class="text-gray-400 hover:text-gray-600">✕</button>
        </div>
        <!-- PROFILE CONTENT -->
        <div class="p-6 space-y-6">
            <div class="text-center">
                <img src="{{ asset('images/sariayu.jpg') }}" alt="User Profile" class="w-24 h-24 rounded-full mx-auto shadow">
                <h3 class="mt-3 font-semibold">Nama User</h3>
                <p class="text-sm text-gray-500">user@email.com</p>
            </div>
            <div class="space-y-3 text-sm">
                <a href="#" class="block rounded-full border py-2 text-center hover:bg-pink-500 hover:text-white transition">Edit Profil</a>
                <a href="#" class="block rounded-full border py-2 text-center hover:bg-pink-500 hover:text-white transition">Pesanan Saya</a>
                <a href="#" class="block rounded-full border py-2 text-center hover:bg-pink-500 hover:text-white transition">Daftar afiliator</a>
                <a href="#" class="block rounded-full border py-2 text-center text-red-500 hover:bg-red-500 hover:text-white transition">Logout</a>
            </div>
        </div>
    </aside>

    <!-- MODAL BACKDROP -->
    <div id="detailModal" class="fixed inset-0 bg-black/50 flex items-center justify-center z-50 hidden">
        <div class="bg-white w-full max-w-md rounded-xl p-6 relative animate-fadeIn">
            <button onclick="closeDetail()" class="absolute top-3 right-3 text-gray-400 hover:text-black">✕</button>
            <img src="{{ asset('images/produk.png') }}" class="mx-auto h-40 object-contain">
            <h2 class="mt-4 text-lg font-semibold text-center">SARIAYU Facial Foam Series</h2>
            {{-- <p class="text-sm text-gray-500 text-center mt-1">⭐⭐⭐⭐☆ 412 ulasan</p> --}}
            <p class="text-center text-pink-600 font-semibold text-xl mt-3">Rp 25.500</p>
            <p class="text-sm text-gray-600 mt-4 text-center">
                Facial foam dengan formula lembut untuk membersihkan wajah dan menjaga kelembapan alami kulit.
            </p>
            <div class="mt-6 flex justify-center gap-3">
                <button class="px-4 py-2 bg-pink-500 text-white rounded-lg hover:bg-pink-600"> 🛒 Tambah Keranjang</button>
                <button class="px-4 py-2 bg-pink-500 text-white rounded-lg hover:bg-pink-600">  ⚡ Beli Sekarangg</button>
            </div>
        </div>
    </div>

    <script>
        function openProfile() {
            document.getElementById('profilePanel').classList.remove('translate-x-full');
            document.getElementById('mainContent').classList.add('-translate-x-80');
        }

        function closeProfile() {
            document.getElementById('profilePanel').classList.add('translate-x-full');
            document.getElementById('mainContent').classList.remove('-translate-x-80');
        }

        function openDetail() {
            document.getElementById('detailModal').classList.remove('hidden');
            document.body.classList.add('overflow-hidden');
        }

        function closeDetail() {
            document.getElementById('detailModal').classList.add('hidden');
            document.body.classList.remove('overflow-hidden');
        }

        const buttons = document.querySelectorAll('.category-btn');
        const products = document.querySelectorAll('.product-card');

        buttons.forEach(btn => {
            btn.addEventListener('click', () => {
                const category = btn.dataset.filter;

                products.forEach(product => {
                    if (product.dataset.category === category) {
                        product.classList.remove('hidden');
                    } else {
                        product.classList.add('hidden');
                    }
                });

                // active state
                buttons.forEach(b => b.classList.remove('text-pink-500','font-semibold'));
                btn.classList.add('text-pink-500','font-semibold');
            });
        });
    </script>
</body>
</html>