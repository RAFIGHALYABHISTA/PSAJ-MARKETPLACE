<footer class="bg-[#2D1B0E] text-stone-300 mt-20 relative overflow-hidden">
    <div class="absolute top-0 left-0 w-full h-1 bg-gradient-to-r from-transparent via-[#738029] to-transparent opacity-50"></div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12 sm:py-16 relative z-10">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-10 sm:gap-12">
            
            <div class="space-y-6">
                <div class="flex items-center">
                    <img src="{{ asset('images/logo.png') }}" alt="Sariayu Logo" class="h-16 w-auto brightness-0 invert" />
                </div>
                <p class="text-sm leading-relaxed text-stone-400 font-light">
                    Menghadirkan rahasia kecantikan alami Indonesia ke tangan Anda. Filosofi kecantikan holistik untuk pancaran pesona sejati dari luar dan dalam.
                </p>
                <div class="flex flex-wrap gap-4 pt-2">
                    <a href="#" class="text-stone-400 hover:text-[#738029] transition-colors duration-300">
                        <i class="fab fa-instagram text-xl"></i>
                    </a>
                    <a href="#" class="text-stone-400 hover:text-[#738029] transition-colors duration-300">
                        <i class="fab fa-facebook text-xl"></i>
                    </a>
                    <a href="#" class="text-stone-400 hover:text-[#738029] transition-colors duration-300">
                        <i class="fab fa-tiktok text-xl"></i>
                    </a>
                </div>
            </div>

            <div class="space-y-6">
                <h4 class="font-serif text-lg text-white tracking-wide">Navigasi</h4>
                <ul class="space-y-4 text-sm">
                    <li><a href="{{ url('/') }}" class="hover:text-[#738029] transition flex items-center gap-2 group py-2">
                        <span class="w-0 group-hover:w-2 h-[1px] bg-[#738029] transition-all"></span> Home</a>
                    </li>
                    <li><a href="{{ url('/produk') }}" class="hover:text-[#738029] transition flex items-center gap-2 group py-2">
                        <span class="w-0 group-hover:w-2 h-[1px] bg-[#738029] transition-all"></span> Koleksi Produk</a>
                    </li>
                    <li><a href="{{ url('/keranjang') }}" class="hover:text-[#738029] transition flex items-center gap-2 group py-2">
                        <span class="w-0 group-hover:w-2 h-[1px] bg-[#738029] transition-all"></span> Keranjang</a>
                    </li>
                    <li><a href="#" class="hover:text-[#738029] transition flex items-center gap-2 group py-2">
                        <span class="w-0 group-hover:w-2 h-[1px] bg-[#738029] transition-all"></span> Kisah Kami</a>
                    </li>
                </ul>
            </div>

            <div class="space-y-6">
                <h4 class="font-serif text-lg text-white tracking-wide">Bantuan</h4>
                <ul class="space-y-4 text-sm">
                    <li><a href="#" class="block hover:text-[#738029] transition py-2">Hubungi Kami</a></li>
                    <li><a href="#" class="block hover:text-[#738029] transition py-2">Panduan Belanja</a></li>
                    <li><a href="#" class="block hover:text-[#738029] transition py-2">Kebijakan Privasi</a></li>
                    <li><a href="#" class="block hover:text-[#738029] transition py-2">Syarat & Ketentuan</a></li>
                </ul>
            </div>

            <div class="space-y-6">
                <h4 class="font-serif text-lg text-white tracking-wide">Kontak</h4>
                <ul class="space-y-4 text-sm text-stone-400">
                    <li class="flex items-start gap-3">
                        <i class="fas fa-map-marker-alt mt-1 text-[#738029]"></i>
                        <span>Jakarta, Indonesia</span>
                    </li>
                    <li class="flex items-center gap-3">
                        <i class="fas fa-envelope text-[#738029]"></i>
                        <a href="mailto:info@sariayu.com" class="hover:text-white transition">info@sariayu.com</a>
                    </li>
                    <li class="flex items-center gap-3">
                        <i class="fas fa-phone text-[#738029]"></i>
                        <span>+62 123 4567 890</span>
                    </li>
                </ul>
            </div>
        </div>

        <div class="border-t border-stone-800 mt-16 pt-8">
            <div class="flex flex-col md:flex-row justify-between items-center gap-4 text-[11px] uppercase tracking-[0.2em] text-stone-500">
                <p>&copy; 2026 Sariayu Martha Tilaar. Seluruh Hak Cipta Dilindungi.</p>
                <p class="flex items-center gap-1">
                    Handcrafted with <span class="text-[#738029]">♥</span> for Local Beauty
                </p>
            </div>
        </div>
    </div>
</footer>