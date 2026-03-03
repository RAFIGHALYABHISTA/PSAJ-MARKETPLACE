<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <title>Document</title>
</head>
<body>
  <div class="min-h-screen grid grid-cols-1 md:grid-cols-2">
    <!-- LEFT : REGISTRATION -->
    <div class="flex items-center justify-center bg-white">
      <div class="w-full max-w-md px-8">
        <h3 class="text-2xl font-bold text-center mb-6">Registration</h3>
        <form class="space-y-4">
          <div class="flex items-center border rounded-lg px-3 py-2">
            <svg class="w-5 h-5 text-gray-400 mr-2" fill="currentColor" viewBox="0 0 24 24">
              <path d="M12 12a5 5 0 100-10 5 5 0 000 10zm0 2c-4.4 0-8 2.2-8 5v1h16v-1c0-2.8-3.6-5-8-5z"/>
            </svg>
            <input type="text" placeholder="Username"
              class="w-full outline-none text-sm">
          </div>
          <div class="flex items-center border rounded-lg px-3 py-2">
            <svg class="w-5 h-5 text-gray-400 mr-2" fill="currentColor" viewBox="0 0 24 24">
              <path d="M6.6 10.8a15.1 15.1 0 006.6 6.6l2.2-2.2a1 1 0 011-.24c1.1.36 2.3.56 3.6.56a1 1 0 011 1V21a1 1 0 01-1 1C9.4 22 2 14.6 2 5a1 1 0 011-1h3.5a1 1 0 011 1c0 1.2.2 2.4.6 3.5a1 1 0 01-.24 1L6.6 10.8z"/>
            </svg>
            <input type="number" placeholder="Telepon"
              class="w-full outline-none text-sm">
          </div>
          <div class="flex items-center border rounded-lg px-3 py-2">
            <svg class="w-5 h-5 text-gray-400 mr-2" fill="currentColor" viewBox="0 0 24 24">
              <path d="M20 4H4a2 2 0 00-2 2v12a2 2 0 002 2h16a2 2 0 002-2V6a2 2 0 00-2-2zm0 4l-8 5-8-5"/>
            </svg>
            <input type="email" placeholder="Email"
              class="w-full outline-none text-sm">
          </div>
          <div class="flex items-center border rounded-lg px-3 py-2">
            <svg class="w-5 h-5 text-gray-400 mr-2" fill="currentColor" viewBox="0 0 24 24">
              <path d="M12 2a5 5 0 00-5 5v3H5v12h14V10h-2V7a5 5 0 00-5-5z"/>
            </svg>
            <input type="password" placeholder="Password"
              class="w-full outline-none text-sm">
          </div>
          <button class="w-full py-3 rounded-full bg-yellow-600 text-white font-semibold hover:bg-yellow-700 transition">
            SIGN IN
          </button>
        </form>
      </div>
    </div>
    <!-- RIGHT : WELCOME -->
    <div class="hidden md:flex flex-col items-center justify-center bg-gradient-to-br from-yellow-600 to-yellow-800 text-white text-center rounded-tl-[80px] rounded-bl-[80px]">
      <h2 class="text-3xl font-bold">Hello, Welcome!</h2>
      <p class="mt-2 text-sm">Have an account?</p>
      <a href="{{ url('/login') }}" class="mt-4 px-6 py-2 border  rounded-full border-white hover:bg-white hover:text-yellow-700 transition">
        Login
      </a>
    </div>
  </div>
</body>
</html>