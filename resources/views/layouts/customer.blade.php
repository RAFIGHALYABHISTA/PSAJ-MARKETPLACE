<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <title>@yield('title', 'Sariayu Marketplace')</title>

    <style>
        /* Memastikan transisi semua elemen navbar berjalan mulus */
        #main-nav, #nav-menu, #nav-logo, #nav-container {
            transition: all 0.5s cubic-bezier(0.4, 0, 0.2, 1);
        }
        
        /* Memberikan ruang agar konten tidak tertutup navbar yang posisinya 'fixed' */
        body {
            padding-top: 80px; /* Sesuai dengan h-20 (80px) */
        }
    </style>
</head>
<body class="bg-stone-50 overflow-x-hidden text-stone-800">

    @include('components.navbar')

    <div id="profileOverlay" class="fixed inset-0 bg-black/0 z-30 transition-colors duration-300 pointer-events-none" onclick="closeProfile()"></div>

    <main id="mainContent" class="transition-transform duration-300">
        @yield('content')
    </main>

    @include('components.profile-panel')

    @include('components.footer')

    <script>
        // --- ANIMASI NAVBAR SCROLL ---
        window.addEventListener('scroll', function() {
            const nav = document.getElementById('main-nav');
            const navContainer = document.getElementById('nav-container');
            const menu = document.getElementById('nav-menu');
            const logo = document.getElementById('nav-logo');

            if (window.scrollY > 50) {
                // Efek saat scroll ke bawah
                nav.classList.add('bg-white/60', 'backdrop-blur-xl', 'shadow-md', 'py-0');
                nav.classList.remove('bg-white/80');

                navContainer.classList.remove('h-20');
                navContainer.classList.add('h-14');

                if(menu) {
                    menu.classList.add('opacity-0', 'pointer-events-none', '-translate-y-2');
                    menu.classList.remove('opacity-100');
                }

                if(logo) {
                    logo.style.height = '45px'; // Mengecilkan logo secara manual untuk presisi
                }
            } else {
                // Kembali ke posisi semula
                nav.classList.remove('bg-white/60', 'backdrop-blur-xl', 'shadow-md', 'py-0');
                nav.classList.add('bg-white/80');

                navContainer.classList.add('h-20');
                navContainer.classList.remove('h-14');

                if(menu) {
                    menu.classList.remove('opacity-0', 'pointer-events-none', '-translate-y-2');
                    menu.classList.add('opacity-100');
                }

                if(logo) {
                    logo.style.height = ''; // Kembali ke class Tailwind semula (h-20 atau md:h-24)
                }
            }
        });

        // --- FUNGSI PROFILE PANEL ---
        function openProfile() {
            document.getElementById('profilePanel').classList.remove('translate-x-full');
            document.getElementById('profilePanel').classList.add('translate-x-0');

            const overlay = document.getElementById('profileOverlay');
            overlay.classList.remove('bg-black/0', 'pointer-events-none');
            overlay.classList.add('bg-black/40');
        }

        function closeProfile() {
            document.getElementById('profilePanel').classList.add('translate-x-full');
            document.getElementById('profilePanel').classList.remove('translate-x-0');

            const overlay = document.getElementById('profileOverlay');
            overlay.classList.add('bg-black/0', 'pointer-events-none');
            overlay.classList.remove('bg-black/40');
        }
    </script>
</body>
</html>