@extends('layouts.customer')
@section('title', 'Transaksi')
@section('content')
 
   <section class="max-w-7xl mx-auto px-6 py-10">
  <div class="grid grid-cols-1 lg:grid-cols-3 gap-10">

    <!-- LEFT: IMAGE GALLERY -->
  <div>
  <!-- GAMBAR UTAMA -->
  <div class="relative bg-white rounded-xl shadow-md p-4 group">
    <img src="{{ asset('images/produk.png') }}"
         class="w-full rounded-lg object-contain">

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
  <div class="flex gap-3 mt-4">
    
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
      <div>
    <label class="text-sm font-medium">Metode Pembayaran</label>
    <select id="metodePembayaran" class="w-full border rounded-lg px-3 py-2 mt-1">
      <option value="">Pilih metode pembayaran</option>
      <option value="qris">QRIS</option>
      <option value="transfer">Transfer Bank</option>
    </select>
  </div>

  <!-- QRIS -->
  <div id="qrisBox" class="hidden text-center">
    <p class="text-sm mb-2">Scan QRIS berikut:</p>
    <img src="{{ asset('images/zahira.jpg') }}" class="mx-auto w-40">
  </div>

  <!-- Transfer Bank -->
  <div id="transferBox" class="hidden">
    <label class="text-sm font-medium">Pilih Bank</label>
    <select class="w-full border rounded-lg px-3 py-2 mt-1">
      <option>BCA - 123456789 a.n Marketplace</option>
      <option>BRI - 987654321 a.n Marketplace</option>
      <option>BNI - 1122334455 a.n Marketplace</option>
      <option>Mandiri - 6677889900 a.n Marketplace</option>
    </select>
  </div>
      <!-- Buttons -->
      <a href="{{ url('/keranjang') }}" class="w-full bg-yellow-600 text-white py-2 rounded-lg flex items-center justify-center gap-2 hover:bg-yellow-700 transition">
        Masukkan ke keranjang
      </a>
        <button onclick="openPayment()" class="w-full border py-2 rounded-lg hover:bg-gray-100 transition">
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

<!-- POPUP PREVIEW -->
<div id="imagePreview" 
     class="fixed inset-0 bg-black/80 hidden items-center justify-center z-50"
     onclick="closePreview()">

  <img id="previewImg" class="max-w-[90%] max-h-[90%] rounded-xl shadow-2xl">

</div>
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
    const metode = document.getElementById("metodePembayaran");
const qris = document.getElementById("qrisBox");
const transfer = document.getElementById("transferBox");

metode.addEventListener("change", function() {

  qris.classList.add("hidden");
  transfer.classList.add("hidden");

  if(this.value === "qris"){
    qris.classList.remove("hidden");
  }

  if(this.value === "transfer"){
    transfer.classList.remove("hidden");
  }

});
  });

function openPreview(src){
  document.getElementById('previewImg').src = src;
  document.getElementById('imagePreview').classList.remove('hidden');
  document.getElementById('imagePreview').classList.add('flex');
}

function closePreview(){
  document.getElementById('imagePreview').classList.add('hidden');
}
</script>

@endsection