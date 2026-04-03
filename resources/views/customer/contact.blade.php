@extends('layouts.customer')

@section('title', 'Home')

@section('content')
<section class="bg-[#FDF8F5] py-20 px-6">
    <div class="max-w-6xl mx-auto grid md:grid-cols-2 gap-12 items-center">

        <!-- LEFT (INFO) -->
        <div>
            <h2 class="text-3xl font-serif text-[#5B2C04] mb-4">
                Hubungi Kami
            </h2>
            <p class="text-gray-600 mb-8">
                Punya pertanyaan atau butuh bantuan? Tim kami siap membantu Anda kapan saja.
            </p>

            <div class="space-y-6 text-sm">

                <!-- EMAIL -->
                <div class="flex items-center gap-4">
                    <div class="bg-green-100 p-3 rounded-full">
                        📧
                    </div>
                    <div>
                        <p class="font-semibold">Email</p>
                        <p class="text-gray-500">support@skincare.com</p>
                    </div>
                </div>

                <!-- PHONE -->
                <div class="flex items-center gap-4">
                    <div class="bg-green-100 p-3 rounded-full">
                        📞
                    </div>
                    <div>
                        <p class="font-semibold">Telepon</p>
                        <p class="text-gray-500">+62 812 3456 7890</p>
                    </div>
                </div>

                <!-- LOCATION -->
                <div class="flex items-center gap-4">
                    <div class="bg-green-100 p-3 rounded-full">
                        📍
                    </div>
                    <div>
                        <p class="font-semibold">Alamat</p>
                        <p class="text-gray-500">
                            Surabaya, Jawa Timur, Indonesia
                        </p>
                    </div>
                </div>

            </div>
        </div>

        <!-- RIGHT (FORM) -->
        <div class="bg-white p-8 rounded-2xl shadow-lg">

            <h3 class="text-xl font-semibold mb-6 text-center">
                Kirim Pesan
            </h3>

            <form class="space-y-5">

                <!-- Nama -->
                <input type="text" placeholder="Nama"
                    class="w-full border rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-green-500">

                <!-- Email -->
                <input type="email" placeholder="Email"
                    class="w-full border rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-green-500">

                <!-- Pesan -->
                <textarea rows="4" placeholder="Pesan"
                    class="w-full border rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-green-500"></textarea>

                <!-- Button -->
                <button type="submit"
                    class="w-full bg-green-700 text-white py-2 rounded-lg hover:bg-green-800 transition">
                    Kirim Pesan
                </button>

            </form>
        </div>

    </div>
<iframe  class="w-full h-64 rounded-xl mt-10" <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3957.5390171807126!2d112.7976118735716!3d-7.293170771684754!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd7fa703f7422ad%3A0xc69436739d68f5e3!2sSMK%20Negeri%2010%20Surabaya!5e0!3m2!1sid!2sid!4v1775225564389!5m2!1sid!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
</section>
@endsection