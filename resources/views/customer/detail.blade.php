<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <title>Detail</title>
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
   <section class="max-w-7xl mx-auto px-6 py-10">
  <div class="grid grid-cols-1 lg:grid-cols-3 gap-10">

    <!-- LEFT: IMAGE GALLERY -->
    <div>
      <div class="bg-white rounded-xl shadow-md p-4">
        <img src="{{ asset('images/produk.png') }}"
             class="w-full rounded-lg object-contain">
      </div>

      <!-- Thumbnails -->
      <div class="flex gap-3 mt-4">
        <img src="{{ asset('images/produk.png') }}"
             class="w-16 h-16 rounded-lg border cursor-pointer">
        <img src="{{ asset('images/produk.png') }}"
             class="w-16 h-16 rounded-lg border cursor-pointer">
      </div>
    </div>

    <!-- CENTER: PRODUCT INFO -->
    <div class="space-y-4">
      <h1 class="text-2xl font-serif font-semibold">
        Sariayu Kenanga Refreshing Toner
      </h1>
      <p class="text-sm text-gray-500">Terjual 750++</p>
      <div>
        <p class="text-3xl font-bold">Rp 18.900</p>
        <div class="flex items-center  gap-2 mt-1">
          <span class="text-sm">8%</span>
          <span class="bg-red-600 text-white px-3 py-1 rounded-full text-sm line-through">
            Rp21.500
          </span>
        </div>
      </div>
      <!-- Tabs -->
      <div class="flex gap-2 mt-4">
        <button data-filter="deskripsi"
          class="tab-btn px-4 py-1 rounded-full bg-yellow-600 text-white text-sm">
          Deskripsi
        </button>
        <button data-filter="spesifikasi"
          class="tab-btn px-4 py-1 rounded-full border text-sm">
          Spesifikasi
        </button>
      </div>
      <!-- Description -->
      <p id="deskripsi" class="tab-content text-sm text-gray-600 leading-relaxed">
        Sariayu Kenanga Refreshing Toner mengandung kenanga oil dan peppermint oil
        serta ekstrak gardenia sebagai antioksidan. Menyegarkan wajah, membantu
        menjaga kelembutan alami kulit wajah.
      </p>
      <p id="spesifikasi" class="tab-content text-sm text-gray-600 leading-relaxed hidden ">
        Lorem ipsum, dolor sit amet consectetur adipisicing elit. Sunt, totam atque ex illum rem nisi sit perspiciatis
        quo corrupti, facilis in cumque veniam commodi suscipit mollitia accusamus dolores consequatur doloribus?
      </p>
    </div>
    <!-- RIGHT: BUY CARD -->
    <div class="bg-white rounded-xl shadow-md p-6 h-fit space-y-5">
      <p class="font-medium">Atur Jumlah pembelian</p>
      <!-- Quantity -->
      <div class="flex items-center justify-between ">
        <input type="number" value="1" min="1" class="w-full text-center border rounded-lg px-4 py-2">
        {{-- <button class="text-lg font-bold">−</button>
        <span>1</span>
        <button class="text-lg font-bold">+</button> --}}
      </div>
      <!-- Discount -->
      <div class="flex items-center justify-between">
        <span class="text-sm">8%</span>
        <span class="bg-red-600 text-white px-3 py-1 rounded-full text-sm line-through">
          Rp21.500
        </span>
      </div>
      <!-- Subtotal -->
      <div class="flex justify-between items-center">
        <span class="text-gray-500">Subtotal</span>
        <span class="text-2xl font-bold">Rp 18.900</span>
      </div>
      <!-- Buttons -->
      <a href="{{ url('/keranjang') }}" class="w-full bg-yellow-600 text-white py-2 rounded-lg flex items-center justify-center gap-2 hover:bg-yellow-700 transition">
        Masukkan ke keranjang
      </a>
      <button
        class="w-full border py-2 rounded-lg hover:bg-gray-100 transition">
        Beli Sekarang
      </button>
    </div>
  </div>
  <!-- REKOMENDASI -->
  <div class="mt-14">
    <h2 class="text-lg font-semibold mb-4">Rekomendasi Produk</h2>
    <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
      <div class="bg-white rounded-xl p-4 shadow">
        <img src="{{ asset('images/produk.png') }}" class="h-32 mx-auto">
        <p class="text-sm mt-2">Sariayu Lipstick</p>
        <p class="font-semibold">Rp 64.608</p>
      </div>
      <div class="bg-white rounded-xl p-4 shadow">
        <img src="{{ asset('images/produk.png') }}" class="h-32 mx-auto">
        <p class="text-sm mt-2">Sariayu Lipstick</p>
        <p class="font-semibold">Rp 64.608</p>
      </div>
      <div class="bg-white rounded-xl p-4 shadow">
        <img src="{{ asset('images/produk.png') }}" class="h-32 mx-auto">
        <p class="text-sm mt-2">Sariayu Lipstick</p>
        <p class="font-semibold">Rp 64.608</p>
      </div>
      <div class="bg-white rounded-xl p-4 shadow">
        <img src="{{ asset('images/produk.png') }}" class="h-32 mx-auto">
        <p class="text-sm mt-2">Sariayu Lipstick</p>
        <p class="font-semibold">Rp 64.608</p>
      </div>
      <!-- ulangi card -->
    </div>
  </div>
</section>
<script>
  const tabs = document.querySelectorAll('.tab-btn');
  const contents = document.querySelectorAll('.tab-content');
  tabs.forEach(btn => {
    btn.addEventListener('click', () => {
      const target = btn.dataset.filter;
      // reset button
      tabs.forEach(b => {
        b.classList.remove('bg-yellow-600', 'text-white');
        b.classList.add('border');
      });
      // hide content
      contents.forEach(c => c.classList.add('hidden'));
      // active button
      btn.classList.add('bg-yellow-600', 'text-white');
      btn.classList.remove('border');
      // show content
      document.getElementById(target).classList.remove('hidden');
    });
  });
</script>
</body>
</html>