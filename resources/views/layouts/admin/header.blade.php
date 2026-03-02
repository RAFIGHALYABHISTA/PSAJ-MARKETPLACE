<!DOCTYPE html>
<html lang="id">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Admin Dashboard | Sariayu x Smega</title>
        @vite('resources/css/app.css')
        @vite('resources/js/app.js')
        <script src="https://unpkg.com/alpinejs" defer></script>
        <script>tailwind.config = { darkMode: 'class' }</script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />
    </head>
    <body class="bg-gray-50">
        <div class="flex h-screen overflow-hidden">
            @include('layouts.admin.sidebar')
            <main class="flex-1 overflow-auto">
                @yield('content')
            </main>
        </div>
    </body>
</html>
