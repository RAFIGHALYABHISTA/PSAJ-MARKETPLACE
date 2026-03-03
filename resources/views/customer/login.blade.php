<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Login</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>

<div class="min-h-screen grid grid-cols-1 md:grid-cols-2">

  <!-- LEFT PANEL -->
  <div class="hidden md:flex items-center justify-center bg-gradient-to-br from-yellow-600 to-yellow-800 text-white text-center rounded-tr-[80px] rounded-br-[80px] ">
    <div class="text-center space-y-4">
      <h2 class="text-3xl font-bold">Hello, Welcome!</h2>
      <p class="text-sm">Don't have an account?</p>
      <a href="{{ url('/regis') }}"
         class="inline-block px-6 py-2 rounded-full border border-white hover:bg-white hover:text-yellow-700 transition">
        Registration
      </a>
    </div>
  </div>

  <!-- RIGHT PANEL -->
  <div class="flex items-center justify-center bg-white">
    <div class="w-full max-w-md px-8">

      <h3 class="text-2xl font-bold text-center mb-6">
        Login
      </h3>

      <form class="space-y-4">

        <!-- Username -->
        <input
          type="text"
          placeholder="Username"
          class="w-full px-4 py-3 text-sm border rounded-lg
                 focus:outline-none focus:ring-2 focus:ring-yellow-500"
        >

        <!-- Password -->
        <input
          type="password"
          placeholder="Password"
          class="w-full px-4 py-3 text-sm border rounded-lg
                 focus:outline-none focus:ring-2 focus:ring-yellow-500"
        >

        <!-- Button -->
        <button type="submit" class="w-full py-3 rounded-full bg-yellow-600 text-white font-semibold hover:bg-yellow-700 transition">
          LOGIN
        </button>

      </form>

    </div>
  </div>

</div>

</body>
</html>