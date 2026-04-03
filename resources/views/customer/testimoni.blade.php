@extends('layouts.customer')

@section('title', 'Home')

@section('content')
<section class="bg-[#FDF8F5] py-20 px-6">
    <div class="max-w-6xl mx-auto">

        <!-- HEADER -->
        <div class="text-center mb-16">
            <h2 class="text-3xl font-serif text-[#5B2C04]">
                Apa Kata Mereka?
            </h2>
            <p class="text-gray-600 mt-3 max-w-xl mx-auto">
                Ribuan pelanggan telah merasakan manfaat dari produk kami.
            </p>
        </div>

        <!-- TESTIMONI GRID -->
        <div class="grid md:grid-cols-3 gap-8">

            <!-- CARD 1 -->
            <div class="bg-white p-6 rounded-2xl shadow-md hover:shadow-xl transition">

                <!-- USER -->
                <div class="flex items-center gap-4 mb-4">
                    <img src="{{ asset('images/user1.jpg') }}"
                         class="w-12 h-12 rounded-full object-cover">
                    <div>
                        <h4 class="font-semibold text-sm">Ayu Lestari</h4>
                        <p class="text-xs text-gray-500">Surabaya</p>
                    </div>
                </div>

                <!-- RATING -->
                <div class="text-yellow-400 text-sm mb-2">
                    ⭐⭐⭐⭐⭐
                </div>

                <!-- TESTI -->
                <p class="text-gray-600 text-sm leading-relaxed">
                    Kulit aku jadi lebih cerah dan lembab! Baru 2 minggu pakai sudah kelihatan hasilnya 😍
                </p>
            </div>

            <!-- CARD 2 -->
            <div class="bg-white p-6 rounded-2xl shadow-md hover:shadow-xl transition">

                <div class="flex items-center gap-4 mb-4">
                    <img src="{{ asset('images/user2.jpg') }}"
                         class="w-12 h-12 rounded-full object-cover">
                    <div>
                        <h4 class="font-semibold text-sm">Dewi Anggraeni</h4>
                        <p class="text-xs text-gray-500">Jakarta</p>
                    </div>
                </div>

                <div class="text-yellow-400 text-sm mb-2">
                    ⭐⭐⭐⭐☆
                </div>

                <p class="text-gray-600 text-sm leading-relaxed">
                    Teksturnya ringan banget di kulit, gak bikin berminyak. Cocok untuk daily skincare!
                </p>
            </div>

            <!-- CARD 3 -->
            <div class="bg-white p-6 rounded-2xl shadow-md hover:shadow-xl transition">

                <div class="flex items-center gap-4 mb-4">
                    <img src="{{ asset('images/user3.jpg') }}"
                         class="w-12 h-12 rounded-full object-cover">
                    <div>
                        <h4 class="font-semibold text-sm">Sinta Maharani</h4>
                        <p class="text-xs text-gray-500">Bandung</p>
                    </div>
                </div>

                <div class="text-yellow-400 text-sm mb-2">
                    ⭐⭐⭐⭐⭐
                </div>

                <p class="text-gray-600 text-sm leading-relaxed">
                    Jerawatku berkurang banyak! Produk ini bener-bener worth it 😭✨
                </p>
            </div>

        </div>

    </div>
</section>
@endsection