<aside id="profilePanel" class="fixed right-0 top-16 h-screen w-96 bg-white shadow-2xl translate-x-full transition-transform duration-300 ease-out z-40 overflow-y-auto">
  <div class="p-6">
    
    <!-- Close Button -->
    <button onclick="closeProfile()" class="absolute top-6 right-6 text-gray-500 hover:text-gray-800 transition-colors">
      <svg xmlns="http://www.w3.org/2000/svg" class="w-7 h-7" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
      </svg>
    </button>

    <!-- Profile Content -->
    <div class="mt-10 space-y-6">
      <!-- Profile Picture & Name -->
      <div class="text-center">
        <img src="https://via.placeholder.com/100" alt="Profile Picture" class="w-20 h-20 rounded-full mx-auto border-4 border-yellow-500" />
        <p class="mt-4 font-bold text-lg text-gray-800">
          @if(auth()->check())
            {{ auth()->user()->name }}
          @else
            Guest User
          @endif
        </p>
        <p class="text-sm text-gray-500">
          @if(auth()->check())
            {{ auth()->user()->email }}
            <br>
            <span class="inline-block mt-1 px-3 py-1 bg-blue-100 text-blue-700 text-xs rounded-full font-semibold">
              {{ ucfirst(auth()->user()->role) }}
            </span>
          @else
            Please login to see your profile
          @endif
        </p>
      </div>

      <!-- Menu Items -->
      @if(auth()->check())
      <div class="space-y-4">
        <a href="#" class="flex items-center gap-2 rounded-full border border-gray-300 p-2 hover:bg-yellow-100 transition">
          <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-gray-700" viewBox="0 0 24 24" fill="currentColor">
            <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 3c1.66 0 3 1.34 3 3s-1.34 3-3 3-3-1.34-3-3 1.34-3 3-3zm0 14.2c-2.5 0-4.71-1.28-6-3.22.03-1.99 4-3.08 6-3.08 1.99 0 5.97 1.09 6 3.08-1.29 1.94-3.5 3.22-6 3.22z" />
          </svg>
          <span class="text-gray-800 font-medium">Profil Saya</span>
        </a>

        @if(!in_array(auth()->user()->role, ['admin', 'superadmin', 'afiliator']))
        <a href="#" class="flex items-center gap-2 rounded-full border border-gray-300 p-2 hover:bg-yellow-100 transition">
          <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-gray-700" viewBox="0 0 24 24" fill="currentColor">
            <path d="M17 3H7c-1.1 0-1.99.9-1.99 2L5 21l7-3 7 3V5c0-1.1-.9-2-2-2z" />
          </svg>
          <span class="text-gray-800 font-medium">Wishlist</span>
        </a>

        <a href="#" class="flex items-center gap-2 rounded-full border border-gray-300 p-2 hover:bg-yellow-100 transition">
          <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-gray-700" viewBox="0 0 24 24" fill="currentColor">
            <path d="M19 3H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm0 16H5V5h14v14zm-5.04-6.71l-2.75 3.54-2.12-2.59c-.18-.23-.48-.29-.74-.12-.26.16-.34.5-.18.77l2.91 3.59c.15.19.42.31.67.31.25 0 .52-.12.67-.31l3.59-4.58c.16-.27.08-.61-.18-.77-.27-.17-.56-.11-.74.12z" />
          </svg>
          <span class="text-gray-800 font-medium">Pesanan Saya</span>
        </a>

        <a href="#" class="flex items-center gap-2 rounded-full border border-gray-300 p-2 hover:bg-yellow-100 transition">
          <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-gray-700" viewBox="0 0 24 24" fill="currentColor">
            <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z" />
          </svg>
          <span class="text-gray-800 font-medium">Daftar Afiliator</span>
        </a>
        @elseif(in_array(auth()->user()->role, ['admin', 'superadmin', 'afiliator']))
        <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-2 rounded-full border border-blue-300 p-2 hover:bg-blue-100 transition">
          <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-blue-700" viewBox="0 0 24 24" fill="currentColor">
            <path d="M3 13h8V3H3v10zm0 8h8v-6H3v6zm10 0h8V11h-8v10zm0-18v6h8V3h-8z" />
          </svg>
          <span class="text-gray-800 font-medium">Admin Dashboard</span>
        </a>
        @endif

        <!-- LOGOUT -->
        <form action="{{ route('auth.logout') }}" method="POST" class="w-full">
          @csrf
          <button type="submit" class="w-full flex items-center justify-center gap-2 rounded-full border border-red-300 py-2 text-red-500 hover:bg-red-500 hover:text-white hover:border-red-500 transition font-medium">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" fill="currentColor">
              <path d="M17 7l-1.41 1.41L18.17 11H8v2h10.17l-2.58 2.58L17 17l5-5zM4 5h8V3H4c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h8v-2H4V5z" />
            </svg>
            Logout
          </button>
        </form>
      </div>
      @else
      <div class="text-center space-y-4">
        <p class="text-sm text-gray-600">Login dulu untuk kategori menu ini</p>
        <a href="{{ route('auth.login') }}" class="block w-full rounded-full bg-yellow-500 text-white py-2 hover:bg-yellow-600 transition font-medium">
          Login Sekarang
        </a>
        <a href="{{ route('auth.register') }}" class="block w-full rounded-full border border-yellow-500 text-yellow-500 py-2 hover:bg-yellow-50 transition font-medium">
          Daftar Akun
        </a>
      </div>
      @endif
    </div>
  </div>
</aside>
