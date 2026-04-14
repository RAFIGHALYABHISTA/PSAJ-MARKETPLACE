@extends('layouts.customer')
@section('title', $product->name)

@section('content')

<section class="max-w-7xl mx-auto px-4 sm:px-6 py-8 sm:py-10">
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 lg:gap-10">

        {{-- LEFT: IMAGE GALLERY --}}
        <div class="space-y-4">
            <div class="relative bg-white rounded-xl shadow-md p-4 group overflow-hidden">
                <img id="mainImage"
                     src="{{ $product->image ? asset($product->image) : ($product->image_url ?? asset('images/produk.png')) }}"
                     class="w-full rounded-lg object-cover h-[320px] sm:h-[360px]">

                <button onclick="openPreview(document.getElementById('mainImage').src)"
                        class="absolute bottom-3 right-3 bg-black/60 text-white p-2 rounded-full opacity-0 group-hover:opacity-100 transition">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.477 0 8.268 2.943 9.542 7-1.274 4.057-5.065 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                    </svg>
                </button>
            </div>

            {{-- Thumbnail --}}
            <div class="flex gap-3 overflow-x-auto pb-2">
                <div class="relative group shrink-0">
                    <img src="{{ $product->image ? asset($product->image) : ($product->image_url ?? asset('images/produk.png')) }}"
                         onclick="changeImage(this.src)"
                         class="w-16 h-16 rounded-lg border cursor-pointer hover:border-[#738029] transition">
                </div>
            </div>
        </div>

        {{-- CENTER: PRODUCT INFO --}}
        <div class="space-y-5">
            <div>
                <p class="text-xs font-bold text-[#9C4A1A] uppercase tracking-wider mb-1">
                    {{ $product->category?->name ?? '-' }}
                </p>
                <h1 class="text-2xl font-serif font-semibold text-[#5B2C04]">
                    {{ $product->name }}
                </h1>
            </div>

            <div>
                <p class="text-3xl font-bold text-[#5B2C04]">
                    Rp {{ number_format($product->price, 0, ',', '.') }}
                </p>
                <p class="text-sm text-stone-400 mt-1">
                    Stok tersedia: <span class="font-bold text-[#738029]">{{ $product->stock }}</span>
                </p>
            </div>

            {{-- Tabs --}}
            <div class="flex flex-wrap gap-2 mt-4">
                <button data-filter="deskripsi"
                        class="tab-btn px-4 py-2 rounded-full bg-[#738029] text-white text-sm">
                    Deskripsi
                </button>
                <button data-filter="spesifikasi"
                        class="tab-btn px-4 py-2 rounded-full border border-stone-200 text-stone-600 text-sm">
                    Spesifikasi
                </button>
            </div>

            <div id="deskripsi" class="tab-content text-sm text-gray-600 leading-relaxed">
                {{ $product->description ?? 'Belum ada deskripsi.' }}
            </div>

            <div id="spesifikasi" class="tab-content text-sm text-gray-600 leading-relaxed hidden">
                {{ $product->specification ?? 'Belum ada spesifikasi.' }}
            </div>
        </div>

        {{-- RIGHT: BUY CARD --}}
        <div class="bg-white rounded-2xl shadow-[0_5px_30px_rgba(0,0,0,0.05)] border border-stone-100 p-5 sm:p-6 h-fit space-y-5">
            <h3 class="font-serif text-xl text-[#5B2C04]">Ringkasan Belanja</h3>

            {{-- Quantity --}}
            <div>
                <label class="text-xs font-bold text-stone-400 uppercase tracking-wider mb-2 block">Jumlah</label>
                <div class="flex items-center border border-stone-200 rounded-full h-10 w-fit">
                    <button type="button" onclick="decreaseQty()"
                        class="w-10 h-full text-stone-500 hover:text-[#738029] flex items-center justify-center transition">-</button>
                    <input type="number" id="qty" value="1" min="1" max="{{ $product->stock }}"
                        class="w-14 h-full text-center text-sm font-bold text-[#5B2C04] bg-transparent outline-none border-x border-stone-100">
                    <button type="button" onclick="increaseQty()"
                        class="w-10 h-full text-stone-500 hover:text-[#738029] flex items-center justify-center transition">+</button>
                </div>
            </div>

            {{-- Kode Referral --}}
            <div>
                <label class="text-xs font-bold text-stone-400 uppercase tracking-wider mb-2 block">Kode Referral</label>
                <div class="flex gap-2">
                    <input type="text" id="referralCode" placeholder="Masukan kode referral"
                        class="w-full bg-stone-50 border border-stone-200 rounded-lg px-3 py-2 text-sm outline-none focus:border-[#738029] transition">
                    <button type="button" onclick="applyReferral()"
                        class="bg-stone-800 text-white px-4 rounded-lg text-xs font-bold uppercase tracking-wider hover:bg-[#5B2C04] transition">
                        Apply
                    </button>
                </div>
                <p id="referralMsg" class="text-xs mt-1 hidden"></p>
            </div>

            {{-- Rincian --}}
            <div class="space-y-2 text-sm text-stone-600 border-b border-stone-100 pb-4">
                <div class="flex justify-between">
                    <span>Harga satuan</span>
                    <span class="font-medium text-[#5B2C04]" id="hargaSatuan">
                        Rp {{ number_format($product->price, 0, ',', '.') }}
                    </span>
                </div>
                <div class="flex justify-between">
                    <span>Subtotal</span>
                    <span class="font-bold text-[#738029]" id="subtotalLabel">
                        Rp {{ number_format($product->price, 0, ',', '.') }}
                    </span>
                </div>

                {{-- Metode Pembayaran --}}
                <div class="pt-2">
                    <label class="text-xs font-bold text-stone-400 uppercase tracking-wider mb-2 block">Metode Pembayaran</label>
                    <select id="metodePembayaran"
                        class="w-full border border-stone-200 rounded-lg px-3 py-2 text-sm outline-none focus:border-[#738029] transition bg-stone-50">
                        <option value="">Pilih metode pembayaran</option>
                        <option value="online">QRIS</option>
                        <option value="offline">Tunai</option>
                    </select>
                </div>

                {{-- QRIS Box --}}
                <div id="qrisBox" class="hidden text-center pt-2 space-y-2">
                    <p class="text-xs text-stone-400 uppercase tracking-wider font-bold">Scan QRIS:</p>
                    <img src="{{ asset('images/zahira.jpg') }}" class="mx-auto w-36 rounded-xl border border-stone-100 shadow-sm">
                    <div class="text-left">
                        <label class="text-xs font-bold text-stone-400 uppercase tracking-wider mb-1 block">Upload Bukti Bayar</label>
                        <input type="file" id="paymentProof" accept="image/*"
                            class="w-full text-xs text-stone-500 file:mr-3 file:py-2 file:px-3 file:rounded-full file:border-0 file:text-xs file:font-bold file:bg-[#F9F1E7] file:text-[#5B2C04] hover:file:bg-[#738029] hover:file:text-white transition">
                    </div>
                </div>
            </div>

            {{-- Total --}}
            <div class="flex justify-between items-center">
                <span class="text-stone-500 font-medium text-sm">Total</span>
                <span class="font-serif text-2xl font-bold text-[#738029]" id="totalLabel">
                    Rp {{ number_format($product->price, 0, ',', '.') }}
                </span>
            </div>

            {{-- Tombol Keranjang --}}
            <form id="formKeranjang" action="{{ route('customer.keranjang.store') }}" method="POST">
                @csrf
                <input type="hidden" name="product_id" value="{{ $product->id }}">
                <input type="hidden" name="quantity" id="qtyKeranjang" value="1">
                <button type="submit"
                    class="w-full border-2 border-[#738029] text-[#738029] hover:bg-[#738029] hover:text-white py-3 rounded-full font-bold uppercase tracking-[0.15em] text-xs transition-all active:scale-95 flex items-center justify-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"/>
                    </svg>
                    Keranjang
                </button>
            </form>

            {{-- Tombol Bayar --}}
            <form id="formBayar" action="{{ route('customer.transaksi.bayar', $product->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="quantity" id="qtyBayar" value="1">
                <input type="hidden" name="referral_code" id="referralCodeBayar">
                <input type="hidden" name="payment_method" id="paymentMethodBayar">
                <input type="file" name="payment_proof" id="paymentProofBayar" class="hidden" accept="image/*">

                <button type="button" onclick="submitBayar()"
                    class="w-full bg-[#738029] hover:bg-[#5B2C04] text-white py-3 rounded-full font-bold uppercase tracking-[0.15em] text-xs transition-all shadow-lg active:scale-95 flex items-center justify-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
                    </svg>
                    Bayar Sekarang
                </button>
            </form>

            <p class="text-[10px] text-stone-400 text-center">
                Dengan melanjutkan, anda menyetujui Syarat & Ketentuan kami.
            </p>
        </div>
    </div>

    {{-- REKOMENDASI --}}
    <div class="mt-12">
        <h2 class="text-xl font-serif font-semibold text-[#5B2C04] mb-6">Produk Serupa</h2>
        <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 gap-4">
            @forelse($rekomendasi as $prod)
            <a href="{{ route('customer.transaksi.show', $prod->id) }}"
               class="bg-white rounded-xl p-4 shadow-sm border border-stone-100 text-center hover:shadow-md hover:-translate-y-1 transition-all duration-300 group">
                <img src="{{ $prod->image ? asset($prod->image) : ($prod->image_url ?? asset('images/produk.png')) }}"
                     class="h-28 mx-auto object-contain mix-blend-multiply group-hover:scale-105 transition duration-300">
                <p class="text-xs text-[#9C4A1A] font-bold uppercase tracking-wider mt-2">{{ $prod->category?->name }}</p>
                <p class="text-sm font-medium text-[#5B2C04] mt-1 line-clamp-2">{{ $prod->name }}</p>
                <p class="font-bold text-[#738029] mt-1">Rp {{ number_format($prod->price, 0, ',', '.') }}</p>
            </a>
            @empty
            <p class="col-span-4 text-sm text-stone-400 italic">Tidak ada rekomendasi produk.</p>
            @endforelse
        </div>
    </div>
</section>

{{-- POPUP PREVIEW --}}
<div id="imagePreview"
     class="fixed inset-0 bg-black/80 hidden items-center justify-center z-50"
     onclick="closePreview()">
    <img id="previewImg" class="max-w-[90%] max-h-[90%] rounded-xl shadow-2xl">
</div>

<script>
    const harga = {{ $product->price }};

    function decreaseQty() {
        const input = document.getElementById('qty');
        if (parseInt(input.value) > 1) {
            input.value = parseInt(input.value) - 1;
            updateTotal();
        }
    }

    function increaseQty() {
        const input = document.getElementById('qty');
        const max = parseInt(input.max);
        if (parseInt(input.value) < max) {
            input.value = parseInt(input.value) + 1;
            updateTotal();
        }
    }

    function updateTotal() {
        const qty = parseInt(document.getElementById('qty').value) || 1;
        const total = harga * qty;
        const formatted = 'Rp ' + total.toLocaleString('id-ID');
        document.getElementById('subtotalLabel').textContent = formatted;
        document.getElementById('totalLabel').textContent = formatted;
        document.getElementById('qtyKeranjang').value = qty;
        document.getElementById('qtyBayar').value = qty;
    }

    document.getElementById('qty').addEventListener('input', updateTotal);

    // Metode pembayaran
    const metode = document.getElementById("metodePembayaran");
    const qrisBox = document.getElementById("qrisBox");

    metode.addEventListener("change", function () {
        qrisBox.classList.toggle("hidden", this.value !== "online");
    });

    // Referral
    function applyReferral() {
        const code = document.getElementById('referralCode').value;
        const msg = document.getElementById('referralMsg');

        if (!code) {
            msg.textContent = 'Masukan kode referral terlebih dahulu.';
            msg.className = 'text-xs mt-1 text-red-500';
            msg.classList.remove('hidden');
            return;
        }

        fetch(`/check-referral?code=${code}`)
            .then(res => res.json())
            .then(data => {
                msg.classList.remove('hidden');
                if (data.valid) {
                    msg.textContent = `Kode valid! Afiliator: ${data.name}`;
                    msg.className = 'text-xs mt-1 text-green-600';
                } else {
                    msg.textContent = 'Kode referral tidak ditemukan.';
                    msg.className = 'text-xs mt-1 text-red-500';
                }
            });
    }

    // Submit Bayar — copy file input ke form tersembunyi
    function submitBayar() {
        const paymentMethod = metode.value;

        if (!paymentMethod) {
            alert('Pilih metode pembayaran terlebih dahulu.');
            return;
        }

        if (paymentMethod === 'online') {
            const proofFile = document.getElementById('paymentProof').files[0];
            if (!proofFile) {
                alert('Upload bukti bayar terlebih dahulu.');
                return;
            }

            // Transfer file ke input hidden di formBayar
            const dt = new DataTransfer();
            dt.items.add(proofFile);
            document.getElementById('paymentProofBayar').files = dt.files;
        }

        document.getElementById('referralCodeBayar').value = document.getElementById('referralCode').value;
        document.getElementById('paymentMethodBayar').value = paymentMethod;
        document.getElementById('formBayar').submit();
    }

    // Tabs
    const tabs = document.querySelectorAll('.tab-btn');
    const contents = document.querySelectorAll('.tab-content');

    tabs.forEach(btn => {
        btn.addEventListener('click', () => {
            const target = btn.dataset.filter;

            tabs.forEach(b => {
                b.classList.remove('bg-[#738029]', 'text-white');
                b.classList.add('border', 'border-stone-200', 'text-stone-600');
            });
            contents.forEach(c => c.classList.add('hidden'));

            btn.classList.add('bg-[#738029]', 'text-white');
            btn.classList.remove('border', 'border-stone-200', 'text-stone-600');
            document.getElementById(target).classList.remove('hidden');
        });
    });

    // Image preview
    function changeImage(src) {
        document.getElementById('mainImage').src = src;
    }

    function openPreview(src) {
        document.getElementById('previewImg').src = src;
        document.getElementById('imagePreview').classList.remove('hidden');
        document.getElementById('imagePreview').classList.add('flex');
    }

    function closePreview() {
        document.getElementById('imagePreview').classList.add('hidden');
        document.getElementById('imagePreview').classList.remove('flex');
    }
</script>

@endsection