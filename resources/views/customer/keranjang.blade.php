<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <title>keranjang</title>
</head>
<body class="bg-gray-100 min-h-screen">
  <div class="max-w-6xl mx-auto px-6 py-10">

    <!-- HEADER -->
    <div class="flex items-center gap-4 mb-8">
      <a href="{{url('/produk')}}" class="text-gray-700 hover:text-black">
        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6"
          fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
            d="M15 19l-7-7 7-7"/>
        </svg>
      </a>
      <h1 class="text-2xl font-semibold">Keranjang Belanja</h1>
    </div>

    <div class="grid md:grid-cols-3 gap-6">

      <!-- LIST PRODUK -->
      <div class="md:col-span-2 space-y-4">

        <!-- ITEM -->
        <div class="bg-white rounded-xl shadow-sm p-4 flex gap-4">
          <img src="{{ asset('images/produk.png') }}"
            class="w-28 h-28 object-contain rounded-lg bg-gray-50">

          <div class="flex-1 flex flex-col justify-between">
            <div>
              <h2 class="font-semibold text-gray-800">
                Sariayu Facial Wash
              </h2>
              <p class="text-sm text-gray-500">Skin Care</p>
            </div>

            <div class="flex items-center justify-between mt-4">
              <p class="font-semibold text-pink-600">Rp 45.000</p>

              <!-- QTY -->
              <div class="flex items-center gap-2">
                <input type="number" value="1" min="1"
                  class="w-16 text-center border rounded-lg">
              </div>
            </div>
          </div>

          <!-- ACTION -->
          <button class="flex items-center gap-1 text-sm text-gray-400 hover:text-red-600 transition group">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 group-hover:scale-110 transition" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M6 7h12M9 7V4h6v3m-7 0v13a2 2 0 002 2h4a2 2 0 002-2V7"/>
            </svg>
            Hapus
          </button>
        </div>

        <!-- ITEM 2 -->

      </div>

      <!-- RINGKASAN -->
      <div class="bg-white rounded-xl shadow-sm p-6 h-fit">
        <h3 class="font-semibold text-lg mb-4">Ringkasan Belanja</h3>

        <div class="space-y-2 text-sm">
          <div class="flex justify-between">
            <span>Subtotal</span>
            <span>Rp 100.000</span>
          </div>
          <div class="flex justify-between">
            <span>Ongkir</span>
            <span>Rp 10.000</span>
          </div>
          <hr>
          <div class="flex justify-between font-semibold text-base">
            <span>Total</span>
            <span class="text-pink-600">Rp 110.000</span>
          </div>
        </div>

        <button
          class="mt-6 w-full bg-pink-500 text-white py-3 rounded-lg hover:bg-pink-600 transition">
          🛍️ Checkout Sekarang
        </button>
      </div>

    </div>
  </div>
</body>
</html>