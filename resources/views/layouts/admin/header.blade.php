<!DOCTYPE html>
<html lang="id" x-data="{ darkMode: localStorage.getItem('dark') === 'true' }" :class="darkMode && 'dark'">
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
    <body class="bg-slate-50 dark:bg-slate-950">
        <div class="flex h-screen bg-slate-50 dark:bg-slate-950">
            {{-- Sidebar --}}
            @include('layouts.admin.sidebar')
            
            {{-- Main Content --}}
            <main class="flex-1 overflow-auto">
                @yield('content')
            </main>
        </div>
    </body>
</html>
