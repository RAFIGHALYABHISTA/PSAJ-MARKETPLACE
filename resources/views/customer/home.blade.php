<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <title>Home</title>
</head>
<body class="bg-stone-100">
    <nav class="bg-white shadow-xl">
        <div class="mx-auto max-w-7xl px-2 sm:px-6 lg:px-8">
        <div class="relative flex h-16 items-center">
            <!-- Logo -->
            <div class="flex shrink-0 items-center">
            <img  src="{{ asset('images/logo.png') }}"
                alt="Your Company"
                class="h-30 w-auto mt-4" />
            </div>
            <!-- Menu (kanan) -->
            <div class="ml-auto">
            <ul class="flex space-x-8">
                <li>
                <a href="{{ url('/') }}" class="text-black hover:text-yellow-600">Home</a>
                </li>
                <li>
                <a href="#" class="text-black hover:text-yellow-600">About Us</a>
                </li>
                <li>
                <a href="{{ url('/produk') }}" class="text-black hover:text-yellow-600">Product</a>
                </li>
            </ul>
            </div>
            <!-- Icons (paling kanan) -->
            <div class="ml-8 flex space-x-4">
            <!-- Shopping Bag -->
            <a href="#" class="text-black hover:text-yellow-600">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 10.5V6a3.75 3.75 0 1 0-7.5 0v4.5m11.356-1.993 1.263 12c.07.665-.45 1.243-1.119 1.243H4.25a1.125 1.125 0 0 1-1.12-1.243l1.264-12A1.125 1.125 0 0 1 5.513 7.5h12.974c.576 0 1.059.435 1.119 1.007ZM8.625 10.5a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm7.5 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z" />
                </svg>
            </a>
            <!-- User -->
            <a href="#" class="text-black hover:text-yellow-600">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" />
                </svg>
            </a>
            </div>
        </div>
        </div>
    </nav>
    <section class="bg-[#FFEADB] max-w-7xl mx-auto px-6 py-16 grid md:grid-cols-2 gap-10 items-center">
  <!-- TEXT -->
        <div class="space-y-4">
            <h1 class="text-4xl font-serif">
            Temukan <br>
            <span class="text-green-700">Kecantikan</span> Sejati
            </h1>

            <p class="text-sm text-gray-700 max-w-md">
            Perawatan kulit yang terinspirasi dari alam, diformulasikan dengan bahan-bahan organik pilihan.
            </p>

            <div class="flex gap-3">
            <a href="#" class="bg-green-600 text-white px-5 py-2 rounded-full text-sm hover:bg-green-700 transition">
                Jelajahi Produk Kami →
            </a>
            <a href="#" class="bg-white px-5 py-2 rounded-full text-sm border hover:bg-gray-100 transition">
                Story Kolaborasi Kami
            </a>
            </div>
        </div>

        <!-- IMAGE -->
        <div class="rounded-3xl overflow-hidden">
            <img src="/images/produk.png" class="w-full h-full object-cover">
        </div>
    </section>
    <section class="bg-stone-100 py-12 text-center">
        <h2 class="text-3xl text-[#5B2C04] font-serif mb-2">Filosofi Kami</h2>
        <hr class="my-2 border-black/80 w-30 mx-auto">
        <p class="text-black text-sm max-w-2xl mx-auto">
            Kami percaya bahwa kulit yang sehat adalah hasil dari harmoni antara alam dan ilmu pengetahuan.
        </p> 
    </section>
    <section class="bg-[#FFEADB] py-20">
        <div class="max-w-7xl mx-auto px-6">

            <!-- TITLE -->
            <h2 class="text-center text-3xl font-serif text-[#5B2C04] mb-20">
            Beauty Tips
            </h2>

            <div class="space-y-32">

            <!-- ITEM 1 -->
            <div class="grid md:grid-cols-2 items-center gap-14">
                <!-- TEXT -->
                <div>
                <div class="flex items-center gap-6 mb-4">
                    <h3 class="text-xl font-semibold">Make Up</h3>
                    <span class="flex-1 h-px bg-gray-600"></span>
                </div>
                <p class="text-sm text-gray-700 leading-relaxed max-w-md">
                    Kilau Alami yang Juga Melindungi Kulitmu tampil cantik bukan cuma soal warna,
                    tapi juga tentang kesehatan kulitmu. Temukan rahasia make up dasar yang mampu
                    memberikan glow natural, ringan dipakai seharian, sekaligus membantu menjaga
                    kelembapan dan perlindungan kulitmu.
                </p>
                </div>

                <!-- IMAGE -->
                <div class="relative mr-6">
                <div class="absolute -right-6 -bottom-6 w-full h-full bg-gray-300 rounded-[40px]"></div>
                <img src="/images/gambar1.png"
                    class="relative rounded-[40px] w-full object-cover">
                </div>
            </div>

            <!-- ITEM 2 (REVERSE) -->
            <div class="grid md:grid-cols-2 items-center gap-14">
                <!-- IMAGE -->
                <div class="relative ml-6">
                <div class="absolute -left-6 -top-6 w-full h-full bg-[#9C4A1A] rounded-[40px]"></div>
                <img src="/images/gambar2.png"
                    class="relative rounded-[40px] w-full object-cover">
                </div>

                <!-- TEXT -->
                <div>
                <div class="flex items-center gap-6 mb-4">
                    <h3 class="text-xl font-semibold">Skin Care</h3>
                    <span class="flex-1 h-px bg-gray-600"></span>
                </div>
                <p class="text-sm text-gray-700 leading-relaxed max-w-md">
                    Si kecil yang penuh keajaiban! Jeruk nipis dikenal kaya akan vitamin C
                    dan antioksidan yang membantu mencerahkan kulit, mengurangi minyak berlebih,
                    serta menyamarkan noda hitam secara alami.
                </p>
                </div>
            </div>

            <!-- ITEM 3 -->
            <div class="grid md:grid-cols-2 items-center gap-14">
                <!-- TEXT -->
                <div>
                <div class="flex items-center gap-6 mb-4">
                    <h3 class="text-xl font-semibold">Skin Care</h3>
                    <span class="flex-1 h-px bg-gray-600"></span>
                </div>
                <p class="text-sm text-gray-700 leading-relaxed max-w-md">
                    Perawatan Wajah Intensif dengan Belerang. Kulit berminyak dan berjerawat?
                    Saatnya mencoba perawatan dengan belerang yang membantu mengontrol produksi minyak,
                    membersihkan pori-pori secara mendalam, serta meredakan peradangan akibat jerawat.
                </p>
                </div>

                <!-- IMAGE -->
                <div class="relative mr-6">
                <div class="absolute -right-6 -bottom-6 w-full h-full bg-blue-300  rounded-[40px]"></div>
                <img src="/images/gambar3.png"
                    class="relative rounded-[40px] w-full object-cover">
                </div>
            </div>

            </div>
        </div>
    </section>
    <section class="bg-stone-100 max-w-7xl mx-auto px-6 py-16">
        <div class="max-w-7xl mx-auto px-6">

            <!-- HEADER -->
            <p class="text-black text-3xl font-serif">
                Koleksi Kami
            </p>
            <div class="flex justify-between items-center mb-8">
            <p class="text-black text-xl font-serif">
                Pilih perawatan untuk kulit bercahayamu.
            </p>
            <div class="flex gap-3">
                <a href="#" class="bg-[#B96710] text-black px-6 py-3 rounded-full text-xs hover:bg-[#9C4A1A] transition shadow-xl">
                New Product
                </a>
                <a href="#" class="bg-gray-300 border border-white text-black px-6 py-3 rounded-full text-xs hover:bg-gray-400 transition shadow-xl">
                Best Seller
                </a>
            </div>
            </div>

            <!-- PRODUCT LIST -->
            <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
            <div class="bg-white rounded-xl p-4 shadow-md hover:shadow-xl hover:-translate-y-1 transition-all duration-300">
                <img src="/images/produk.png" class="mb-3">
                <p class="text-sm font-medium">SARIAYU Facial Foam</p>
                <p class="text-xs text-gray-500">★★★★☆</p>
                <p class="font-semibold">Rp 25.500</p>
            </div>

            <div class="bg-white rounded-xl p-4 shadow-md hover:shadow-xl hover:-translate-y-1 transition-all duration-300">
                <img src="/images/produk.png" class="mb-3">
                <p class="text-sm font-medium">Bright Skin Serum</p>
                <p class="text-xs text-gray-500">★★★★☆</p>
                <p class="font-semibold">Rp 36.200</p>
            </div>
            <div class="bg-white rounded-xl p-4 shadow-md hover:shadow-xl hover:-translate-y-1 transition-all duration-300">
                <img src="/images/produk.png" class="mb-3">
                <p class="text-sm font-medium">SARIAYU Facial Foam</p>
                <p class="text-xs text-gray-500">★★★★☆</p>
                <p class="font-semibold">Rp 25.500</p>
            </div>

            <div class="bg-white rounded-xl p-4 shadow-md hover:shadow-xl hover:-translate-y-1 transition-all duration-300">
                <img src="/images/produk.png" class="mb-3">
                <p class="text-sm font-medium">Bright Skin Serum</p>
                <p class="text-xs text-gray-500">★★★★☆</p>
                <p class="font-semibold">Rp 36.200</p>
            </div>

            <!-- DUPLICATE CARD -->
            </div>

        </div>
    </section>
    <footer class="bg-gradient-to-r from-[#B3C247] to-[#7E640F] text-white mt-16">
        <div class="max-w-7xl mx-auto px-6 py-10">
            <!-- TOP FOOTER -->
            <div class="flex flex-col md:flex-row justify-between items-start gap-6">
            <!-- LEFT -->
            <div class="max-w-md space-y-2">
            <img src="{{ asset('images/logo.png') }}" alt="Sariayu" class="h-28 w-auto"/>
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
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                    viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                        d="M7 3h10a4 4 0 014 4v10a4 4 0 01-4 4H7a4 4 0 01-4-4V7a4 4 0 014-4z"/>
                    <circle cx="12" cy="12" r="3"/>
                    <circle cx="17.5" cy="6.5" r="0.5"/>
                </svg>
                </a>
                <a href="#" class="text-black hover:text-white transition" aria-label="Facebook">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                    viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                        d="M15 3h-3a4 4 0 00-4 4v3H6v4h2v7h4v-7h3l1-4h-4V7a1 1 0 011-1h3V3z"/>
                </svg>
                </a>
                <!-- Twitter -->
                <a href="#" class="text-black hover:text-white transition" aria-label="Twitter">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                    viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                        d="M23 3a10.9 10.9 0 01-3.14 1.53A4.48 4.48 0 0016 3a4.48 4.48 0 00-4.47 5.49A12.94 12.94 0 013 4s-4 9 5 13a13.07 13.07 0 01-7 2c9 5 20 0 20-11.5a4.5 4.5 0 00-.08-.83A7.72 7.72 0 0023 3z"/>
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
</body>
</html>