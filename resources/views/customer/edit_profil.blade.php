<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <title>Document</title>
</head>
<body class="bg-gray-100">

  <div class="max-w-4xl mx-auto px-6 py-10">

    <!-- HEADER -->
    <div class="flex items-center gap-4 mb-8">
      <a href="{{url('/')}}" class="text-gray-700 hover:text-black">
        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6"
          fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
            d="M15 19l-7-7 7-7"/>
        </svg>
      </a>
      <h1 class="text-2xl font-semibold">Edit Profil</h1>
    </div>

    <!-- CARD -->
    <div class="bg-white rounded-2xl shadow-md p-8 grid md:grid-cols-3 gap-8">

      <!-- FOTO PROFIL -->
      <div class="flex flex-col items-center text-center">
        <img src="{{ asset('images/sariayu.jpg') }}"
          class="w-32 h-32 border rounded-full object-cover shadow">

        <button
          class="mt-4 px-4 py-2 text-sm rounded-full border hover:bg-pink-500 hover:text-white transition">
          Ganti Foto
        </button>
      </div>

      <!-- FORM -->
      <div class="md:col-span-2">
        <form class="space-y-5">

          <div>
            <label class="text-sm text-gray-600">Nama Lengkap</label>
            <input type="text"
              class="w-full mt-1 px-4 py-2 rounded-lg border focus:ring-2 focus:ring-pink-400 focus:outline-none"
              placeholder="Nama Lengkap">
          </div>

          <div>
            <label class="text-sm text-gray-600">Email</label>
            <input type="email"
              class="w-full mt-1 px-4 py-2 rounded-lg border focus:ring-2 focus:ring-pink-400 focus:outline-none"
              placeholder="email@email.com">
          </div>

          <div>
            <label class="text-sm text-gray-600">No. Telepon</label>
            <input type="text"
              class="w-full mt-1 px-4 py-2 rounded-lg border focus:ring-2 focus:ring-pink-400 focus:outline-none"
              placeholder="08xxxxxxxxxx">
          </div>

          <!-- ACTION -->
          <div class="flex gap-3 pt-4">
            <button type="submit"
              class="px-6 py-2 bg-pink-500 text-white rounded-lg hover:bg-pink-600 transition">
              Simpan Perubahan
            </button>

            <button type="button"
              class="px-6 py-2 border rounded-lg hover:bg-gray-100 transition">
              Batal
            </button>
          </div>

        </form>
      </div>

    </div>
  </div>

</body>
</html>