<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <title>Home</title>
</head>
<body class="bg-stone-100 overflow-x-hidden">
    <nav class="bg-white shadow-md sticky top-0 z-30">
        <div class="max-w-7xl mx-auto px-4">
            <div class="flex h-16 items-center justify-between">
                <!-- LEFT : Logo -->
                <div class="flex items-center">
                    <img src="{{ asset('images/logo.png') }}" alt="Logo" class="h-30 w-auto mt-5" />
                </div>
                <!-- CENTER : Menu -->
                <ul class="hidden md:flex items-center space-x-8 font-medium">
                    <li><a href="{{ url('/') }}" class="text-gray-700 hover:text-yellow-600 transition">Home</a></li>
                    <li><a href="#" class="text-gray-700 hover:text-yellow-600 transition">About Us</a></li>
                    <li><a href="{{ url('/produk') }}" class="text-gray-700 hover:text-yellow-600 transition">Product</a></li>
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

    <!-- OVERLAY -->
    <section class="bg-[#FFEADB] w-full px-6 py-16 grid md:grid-cols-2 gap-10 items-center">
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
                <a href="#" class="bg-green-600 text-white px-5 py-2 rounded-full text-sm hover:bg-green-700 transition">Jelajahi Produk Kami →</a>
                <a href="#" class="bg-white px-5 py-2 rounded-full text-sm border hover:bg-gray-100 transition">Story Kolaborasi Kami</a>
            </div>
        </div>
        <!-- IMAGE -->
        <div class="rounded-[40px] overflow-hidden flex justify-end">
            <img src="/images/sariayu.jpg" class="w-50 h-50  object-cover rounded-[40px]">
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
                        <img src="/images/gambar1.png" class="relative rounded-[40px] w-full object-cover">
                    </div>
                </div>

                <!-- ITEM 2 (REVERSE) -->
                <div class="grid md:grid-cols-2 items-center gap-14">
                    <!-- IMAGE -->
                    <div class="relative ml-6">
                    <div class="absolute -left-6 -top-6 w-full h-full bg-[#9C4A1A] rounded-[40px]"></div>
                    <img src="/images/gambar2.png" class="relative rounded-[40px] w-full object-cover">
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
                        <img src="/images/gambar3.png" class="relative rounded-[40px] w-full object-cover">
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

  <!-- PROFILE PANEL -->
  <aside id="profilePanel"
  class="w-80 bg-white shadow-2xl fixed right-0 top-0 h-full
         translate-x-full transition-transform duration-300 z-40">

  <!-- HEADER -->
  <div class="p-5 border-b flex justify-between items-center">
    <h2 class="text-lg font-semibold text-gray-800">Profil Saya</h2>
    <button onclick="closeProfile()"
      class="text-gray-400 hover:text-gray-700 transition text-xl">
      ✕
    </button>
  </div>

  <!-- PROFILE CONTENT -->
  <div class="p-6 space-y-6">

    <!-- USER INFO -->
    <div class="text-center">
      <img src="{{ asset('images/sariayu.jpg') }}"
        alt="User Profile"
        class="w-24 h-24 rounded-full mx-auto border-4 border-pink-100 shadow-md">

      <h3 class="mt-4 font-semibold text-gray-800">Nama User</h3>
      <p class="text-sm text-gray-500">user@email.com</p>
    </div>

    <!-- MENU -->
    <div class="space-y-3 text-sm">
      <a href="{{ url('/edit-profil') }}"
        class="flex items-center justify-center gap-2 rounded-full
               border border-gray-300 py-2
               hover:bg-pink-500 hover:text-white hover:border-pink-500
               transition">
        Edit Profil
      </a>

      <a href="#"
        class="flex items-center justify-center gap-2 rounded-full
               border border-gray-300 py-2
               hover:bg-pink-500 hover:text-white hover:border-pink-500
               transition">
        Pesanan Saya
      </a>

      <a href="#"
        class="flex items-center justify-center gap-2 rounded-full
               border border-gray-300 py-2
               hover:bg-pink-500 hover:text-white hover:border-pink-500
               transition">
        Daftar Afiliator
      </a>

      <!-- LOGOUT -->
      <a href="#"
        class="flex items-center justify-center gap-2 rounded-full
               border border-red-300 py-2 text-red-500
               hover:bg-red-500 hover:text-white hover:border-red-500
               transition">
        Logout
      </a>
    </div>
  </div>
</aside>
   
<script>
  function openProfile() {
    document.getElementById('profilePanel')
      .classList.remove('translate-x-full');

    document.getElementById('mainContent')
      .classList.add('-translate-x-80');
  }

  function closeProfile() {
    document.getElementById('profilePanel')
      .classList.add('translate-x-full');

    document.getElementById('mainContent')
      .classList.remove('-translate-x-80');
  }
</script>
</body>
</html>