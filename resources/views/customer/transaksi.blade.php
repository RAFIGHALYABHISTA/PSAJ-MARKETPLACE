@extends('layouts.customer')
@section('title', 'Transaksi')

@section('content')

<section class="max-w-7xl mx-auto px-4 sm:px-6 py-8 sm:py-10">
  <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 lg:gap-10">

    <!-- LEFT: IMAGE GALLERY -->
    <div class="space-y-4">

      <!-- GAMBAR UTAMA -->
      <div class="relative bg-white rounded-xl shadow-md p-4 group overflow-hidden">
        <img src="{{ asset('images/produk.png') }}"
             class="w-full rounded-lg object-cover h-[320px] sm:h-[360px]">

        <!-- ICON MATA -->
        <button onclick="openPreview('{{ asset('images/produk.png') }}')" 
                class="absolute bottom-3 right-3 bg-black/60 text-white p-2 rounded-full opacity-0 group-hover:opacity-100 transition">
          <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M2.458 12C3.732 7.943 7.523 5 12 5c4.477 0 8.268 2.943 9.542 7-1.274 4.057-5.065 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
          </svg>
        </button>
      </div>

      <!-- THUMBNAIL -->
      <div class="flex gap-3 mt-4 overflow-x-auto pb-2">

        <div class="relative group">
          <img src="{{ asset('images/produk.png') }}"
               class="w-16 h-16 rounded-lg border cursor-pointer">

          <button onclick="openPreview('{{ asset('images/produk.png') }}')" 
                  class="absolute bottom-1 right-1 bg-black/60 text-white p-1 rounded-full opacity-0 group-hover:opacity-100 transition">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-3 h-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M2.458 12C3.732 7.943 7.523 5 12 5c4.477 0 8.268 2.943 9.542 7-1.274 4.057-5.065 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
            </svg>
          </button>
        </div>

        <div class="relative group">
          <img src="{{ asset('images/zahira.jpg') }}"
               class="w-16 h-16 rounded-lg border cursor-pointer">

          <button onclick="openPreview('{{ asset('images/zahira.jpg') }}')" 
                  class="absolute bottom-1 right-1 bg-black/60 text-white p-1 rounded-full opacity-0 group-hover:opacity-100 transition">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-3 h-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M2.458 12C3.732 7.943 7.523 5 12 5c4.477 0 8.268 2.943 9.542 7-1.274 4.057-5.065 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
            </svg>
          </button>
        </div>

      </div>
    </div>

    <!-- CENTER: PRODUCT INFO -->
    <div class="space-y-6">
      <h1 class="text-2xl font-serif font-semibold">
        Sariayu Kenanga Refreshing Toner
      </h1>

      <p class="text-sm text-gray-500">Terjual 750++</p>

      <div>
        <p class="text-3xl font-bold">Rp 18.900</p>
        <div class="flex items-center gap-2 mt-1">
          <span class="text-sm">8%</span>
          <span class="bg-red-600 text-white px-3 py-1 rounded-full text-sm line-through">
            Rp21.500
          </span>
        </div>
      </div>

      <!-- Tabs -->
      <div class="flex flex-wrap gap-2 mt-4">
        <button data-filter="deskripsi"
                class="tab-btn px-4 py-2 rounded-full bg-yellow-600 text-white text-sm">
          Deskripsi
        </button>

        <button data-filter="spesifikasi"
                class="tab-btn px-4 py-2 rounded-full border text-sm">
          Spesifikasi
        </button>
      </div>

      <!-- Description -->
      <p id="deskripsi" class="tab-content text-sm text-gray-600 leading-relaxed">
        Sariayu Kenanga Refreshing Toner mengandung kenanga oil dan peppermint oil
        serta ekstrak gardenia sebagai antioksidan. Menyegarkan wajah, membantu
        menjaga kelembutan alami kulit wajah.
      </p>

      <p id="spesifikasi" class="tab-content text-sm text-gray-600 leading-relaxed hidden">
        Lorem ipsum, dolor sit amet consectetur adipisicing elit. Sunt, totam atque ex illum rem nisi sit perspiciatis
        quo corrupti, facilis in cumque veniam commodi suscipit mollitia accusamus dolores consequatur doloribus?
      </p>
    </div>

    <!-- RIGHT: BUY CARD -->
    <div class="bg-white rounded-2xl shadow-[0_5px_30px_rgba(0,0,0,0.05)] border border-stone-100 p-5 sm:p-6 h-fit space-y-5">

      <h3 class="font-serif text-xl text-[#5B2C04] mb-6">Ringkasan Belanja</h3>
      <p class="text-m">Atur Jumlah pembelian</p>

      <div class="flex items-center justify-between">
        <input type="number" value="1" min="1" class="w-full text-center border rounded-lg px-4 py-2">
      </div>

      <div class="mb-6">
        <label class="text-xs font-bold text-stone-400 uppercase tracking-wider mb-2 block">
          Kode Voucher
        </label>
        <div class="flex flex-col gap-2 sm:flex-row">
          <input type="text" placeholder="Masukan kode voucher"
                 class="w-full bg-stone-50 border border-stone-200 rounded-lg px-3 py-2 text-sm outline-none focus:border-[#738029] transition">
          <button class="w-full sm:w-auto bg-stone-800 text-white px-4 py-2 rounded-lg text-xs font-bold uppercase tracking-wider hover:bg-[#5B2C04] transition">
            Apply
          </button>
        </div>
      </div>

      <div class="space-y-3 text-sm text-stone-600 border-b border-stone-100 pb-6">

        <div class="flex justify-between">
          <span>Subtotal (3 items)</span>
          <span class="font-medium text-[#5B2C04]">Rp 102.000</span>
        </div>

        <div class="flex justify-between">
          <span>Ongkos Kirim</span>
          <span class="font-medium text-[#5B2C04]">Rp 10.000</span>
        </div>

        <div class="flex justify-between text-green-600">
          <span>Diskon</span>
          <span>-Rp 0</span>
        </div>

        <label class="text-sm font-medium">Metode Pembayaran</label>

        <select id="metodePembayaran" class="w-full border rounded-lg px-3 py-2 mt-1">
          <option value="">Pilih metode pembayaran</option>
          <option value="qris">QRIS</option>
          <option value="transfer">Tunai</option>
        </select>

        <div id="qrisBox" class="hidden text-center">
          <p class="text-sm mb-2">Scan QRIS berikut:</p>
          <img src="{{ asset('images/zahira.jpg') }}" class="mx-auto w-40">
        </div>

      </div>

      <div class="flex justify-between items-end pt-6 mb-6">
        <span class="text-stone-500 font-medium">Total Tagihan</span>
        <span class="font-serif text-2xl font-bold text-[#738029]">Rp 112.000</span>
      </div>

      <button class="w-full bg-[#738029] hover:bg-[#5B2C04] text-white py-3.5 rounded-full font-bold uppercase tracking-[0.15em] text-sm sm:text-xs transition-all shadow-lg shadow-green-900/10 active:scale-95 flex items-center justify-center gap-2 group">
        Keranjang
      </button>

      <button class="w-full bg-[#738029] hover:bg-[#5B2C04] text-white py-3.5 rounded-full font-bold uppercase tracking-[0.15em] text-sm sm:text-xs transition-all shadow-lg shadow-green-900/10 active:scale-95 flex items-center justify-center gap-2 group">
        Bayar
      </button>

      <p class="text-[10px] text-stone-400 text-center mt-4">
        Dengan checkout, anda menyetujui Syarat & Ketentuan kami.
      </p>

    </div>

  </div>

  <!-- REKOMENDASI -->
  <div class="mt-10">
    <h2 class="text-lg sm:text-xl font-semibold mb-4">Rekomendasi Produk</h2>

    <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 gap-4">

      <div class="bg-white rounded-xl p-4 shadow text-center">
        <img src="{{ asset('images/produk.png') }}" class="h-28 sm:h-32 mx-auto object-contain">
        <p class="text-sm mt-2">Sariayu Lipstick</p>
        <p class="font-semibold">Rp 64.608</p>
      </div>

      <div class="bg-white rounded-xl p-4 shadow text-center">
        <img src="{{ asset('images/produk.png') }}" class="h-28 sm:h-32 mx-auto object-contain">
        <p class="text-sm mt-2">Sariayu Lipstick</p>
        <p class="font-semibold">Rp 64.608</p>
      </div>

      <div class="bg-white rounded-xl p-4 shadow text-center">
        <img src="{{ asset('images/produk.png') }}" class="h-28 sm:h-32 mx-auto object-contain">
        <p class="text-sm mt-2">Sariayu Lipstick</p>
        <p class="font-semibold">Rp 64.608</p>
      </div>

      <div class="bg-white rounded-xl p-4 shadow text-center">
        <img src="{{ asset('images/produk.png') }}" class="h-28 sm:h-32 mx-auto object-contain">
        <p class="text-sm mt-2">Sariayu Lipstick</p>
        <p class="font-semibold">Rp 64.608</p>
      </div>

    </div>
  </div>

</section>

<!-- POPUP PREVIEW -->
<div id="imagePreview"
     class="fixed inset-0 bg-black/80 hidden items-center justify-center z-50"
     onclick="closePreview()">

  <img id="previewImg" class="max-w-[90%] max-h-[90%] rounded-xl shadow-2xl">

</div>

<script>
  const tabs = document.querySelectorAll('.tab-btn');
  const contents = document.querySelectorAll('.tab-content');
  const metode = document.getElementById("metodePembayaran");
  const qris = document.getElementById("qrisBox");

  tabs.forEach(btn => {
    btn.addEventListener('click', () => {
      const target = btn.dataset.filter;

      tabs.forEach(b => {
        b.classList.remove('bg-yellow-600', 'text-white');
        b.classList.add('border');
      });

      contents.forEach(c => c.classList.add('hidden'));

      btn.classList.add('bg-yellow-600', 'text-white');
      btn.classList.remove('border');

      document.getElementById(target).classList.remove('hidden');
    });
  });

  if (metode && qris) {
    metode.addEventListener("change", function() {
      qris.classList.add("hidden");

      if (this.value === "qris") {
        qris.classList.remove("hidden");
      }
    });
  }

  function openPreview(src){
    document.getElementById('previewImg').src = src;
    document.getElementById('imagePreview').classList.remove('hidden');
    document.getElementById('imagePreview').classList.add('flex');
  }

  function closePreview(){
    document.getElementById('imagePreview').classList.add('hidden');
    document.getElementById('imagePreview').classList.remove('flex');
  }
</script>

@endsection