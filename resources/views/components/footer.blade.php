<footer class="bg-[#1E1209] text-stone-300 mt-20 relative overflow-hidden">

    <!-- TOP GLOW LINE -->
    <div class="absolute top-0 left-0 w-full h-[2px] bg-gradient-to-r from-transparent via-[#738029] to-transparent opacity-70"></div>

    <!-- BACKGROUND ORNAMENT -->
    <div class="absolute -top-20 -left-20 w-72 h-72 bg-[#738029]/10 blur-3xl rounded-full"></div>
    <div class="absolute -bottom-20 -right-20 w-72 h-72 bg-[#5B2C04]/20 blur-3xl rounded-full"></div>

    <div class="max-w-7xl mx-auto px-6 py-16 relative z-10">

        <div class="grid grid-cols-1 md:grid-cols-4 gap-12">

            <!-- BRAND -->
            <div class="space-y-6">
                <img src="{{ asset('images/logo.png') }}" 
                     class="h-14 brightness-0 invert hover:scale-105 transition duration-300">

                <p class="text-sm leading-relaxed text-stone-400">
                    Menghadirkan rahasia kecantikan alami Indonesia ke tangan Anda. 
                    Filosofi kecantikan holistik untuk pancaran pesona sejati dari luar dan dalam.
                </p>

                <!-- SOCIAL -->
                <div class="flex gap-4 pt-2">
                    <a href="#" class="w-10 h-10 flex items-center justify-center rounded-full bg-white/5 hover:bg-[#738029] transition">
                        <i class="fab fa-instagram"></i>
                    </a>
                    <a href="#" class="w-10 h-10 flex items-center justify-center rounded-full bg-white/5 hover:bg-[#738029] transition">
                        <i class="fab fa-facebook"></i>
                    </a>
                    <a href="#" class="w-10 h-10 flex items-center justify-center rounded-full bg-white/5 hover:bg-[#738029] transition">
                        <i class="fab fa-tiktok"></i>
                    </a>
                </div>
            </div>

            <!-- NAVIGASI -->
            <div class="space-y-6">
                <h4 class="font-serif text-lg text-white border-b border-stone-700 pb-2">
                    Navigasi
                </h4>

                <ul class="space-y-3 text-sm">
                    <li><a href="{{ url('/') }}" class="hover:text-[#738029] transition">Home</a></li>
                    <li><a href="{{ url('/about') }}" class="hover:text-[#738029] transition">Tentang Kami</a></li>
                    <li><a href="{{ url('/produk') }}" class="hover:text-[#738029] transition">Koleksi Produk</a></li>
                    <li><a href="{{ url('/artikel') }}" class="hover:text-[#738029] transition">Artikel</a></li>
                    <li><a href="{{ url('/testimoni') }}" class="hover:text-[#738029] transition">Testimoni</a></li>
                    <li><a href="{{ url('/contact') }}" class="hover:text-[#738029] transition">Contact-us</a></li>
                </ul>
            </div>

            <!-- KONTAK -->
            <div class="space-y-6">
                <h4 class="font-serif text-lg text-white border-b border-stone-700 pb-2">
                    Kontak
                </h4>

                <ul class="space-y-4 text-sm">
                    <li class="flex items-start gap-3">
                        <i class="fas fa-map-marker-alt mt-1 text-[#738029]"></i>
                        <span>Jakarta, Indonesia</span>
                    </li>
                    <li class="flex items-center gap-3">
                        <i class="fas fa-envelope text-[#738029]"></i>
                        <a href="mailto:info@sariayu.com" class="hover:text-white transition">
                            info@sariayu.com
                        </a>
                    </li>
                    <li class="flex items-center gap-3">
                        <i class="fas fa-phone text-[#738029]"></i>
                        <span>+62 123 4567 890</span>
                    </li>
                </ul>
            </div>

            <!-- FITUR TAMBAHAN (GANTI NEWSLETTER) -->
            <div class="space-y-6">
                <h4 class="font-serif text-lg text-white border-b border-stone-700 pb-2">
                    Layanan
                </h4>

                <ul class="space-y-4 text-sm text-stone-400">
                    <li class="flex items-center gap-3">
                        <span class="w-2 h-2 bg-[#738029] rounded-full"></span>
                        Gratis Ongkir Seluruh Indonesia
                    </li>
                    <li class="flex items-center gap-3">
                        <span class="w-2 h-2 bg-[#738029] rounded-full"></span>
                        100% Produk Original
                    </li>
                    <li class="flex items-center gap-3">
                        <span class="w-2 h-2 bg-[#738029] rounded-full"></span>
                        Pembayaran Aman
                    </li>
                    <li class="flex items-center gap-3">
                        <span class="w-2 h-2 bg-[#738029] rounded-full"></span>
                        Customer Support 24/7
                    </li>
                </ul>
            </div>

        </div>

        <!-- BOTTOM -->
        <div class="border-t border-stone-800 mt-16 pt-6 text-center text-xs text-stone-500 tracking-wider">
            <p>&copy; 2026 Sariayu Martha Tilaar. Seluruh Hak Cipta Dilindungi.</p>
            <p class="mt-2">
                Handcrafted with <span class="text-[#738029]">♥</span> for Local Beauty
            </p>
        </div>

    </div>
</footer>