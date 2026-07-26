<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>AmikomEventHub - Temukan Event Seru!</title>

    <!-- PWA Meta Tags & Manifest -->
    <link rel="manifest" href="/manifest.json">
    <meta name="theme-color" content="#4f46e5">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
    <meta name="apple-mobile-web-app-title" content="EventHub">
    <link rel="apple-touch-icon" href="/icons/icon-192x192.png">

    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {}
            }
        }
    </script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">
    <style>
        html {
            scroll-behavior: smooth;
        }

        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
        }

        .glass {
            background: rgba(255, 255, 255, 0.7);
            backdrop-filter: blur(10px);
        }

        .no-scrollbar::-webkit-scrollbar {
            display: none;
        }
        .no-scrollbar {
            -ms-overflow-style: none;
            scrollbar-width: none;
        }
    </style>
</head>

<body class="bg-slate-50 text-slate-900 overflow-x-hidden">

    <!-- Navigation -->
    <nav class="glass sticky top-2 md:top-6 z-40 mx-2 sm:mx-4 mt-2 sm:mt-4 px-3 sm:px-6 py-2.5 sm:py-4 rounded-2xl border border-white/20 shadow-lg">
        <div class="flex justify-between items-center">
            <a href="{{ route('home') }}" onclick="if (window.location.pathname === '/') { event.preventDefault(); window.scrollTo({ top: 0, behavior: 'smooth' }); history.pushState(null, null, window.location.pathname); }" class="flex items-center gap-2.5 min-w-0">
                <img src="{{ asset('assets/logo-icon.svg') }}" alt="Logo" class="w-9 h-9 sm:w-10 sm:h-10 rounded-xl shadow-md shadow-indigo-100 shrink-0">
                <span class="text-base sm:text-xl font-extrabold tracking-tight truncate text-slate-900 max-w-[120px] min-[380px]:max-w-none">Amikom<span class="text-indigo-600">EventHub</span></span>
            </a>
            
            <div class="hidden md:flex gap-8 font-medium">
                <a href="{{ route('katalog') }}" class="hover:text-indigo-600 transition">Jelajahi</a>
                <a href="{{ route('home') }}#become-organizer" class="hover:text-indigo-600 transition">Penyelenggara</a>
                <a href="{{ route('tentang') }}" class="hover:text-indigo-600 transition">Tentang Kami</a>
                <a href="{{ route('gallery') }}" class="hover:text-indigo-600 transition">Galeri</a>
            </div>

            <div class="flex gap-1.5 sm:gap-3 items-center">
                @auth
                    @if(Auth::user()->role === 'superadmin')
                        <a href="{{ route('admin.dashboard') }}"
                            class="hidden sm:inline-block px-3 md:px-4 py-2 bg-indigo-50 text-indigo-600 rounded-xl font-bold text-xs md:text-sm hover:bg-indigo-100 transition">
                            Superadmin Panel
                    </a>
                @elseif(Auth::user()->role === 'organizer')
                    <a href="{{ route('organizer.dashboard') }}"
                        class="px-3 sm:px-4 py-1.5 sm:py-2 bg-emerald-50 text-emerald-700 rounded-xl font-bold text-xs sm:text-sm hover:bg-emerald-100 transition">
                        Panel Organizer
                    </a>
                @else
                    <a href="{{ route('organizer.register') }}"
                        class="px-3 sm:px-4 py-1.5 sm:py-2 bg-emerald-50 text-emerald-700 rounded-xl font-bold text-xs sm:text-sm hover:bg-emerald-100 transition">
                        + Buat Event
                        </a>
                    @endif
                    <a href="{{ route('user.tickets') }}" class="hidden sm:inline-block px-3 md:px-4 py-2 border border-slate-200 text-slate-700 rounded-xl font-bold text-xs md:text-sm hover:bg-slate-100 transition">
                        Tiket Saya
                    </a>
                    <div class="flex items-center gap-2 md:gap-3">
                        <div class="hidden md:block text-right">
                            <p class="text-sm font-bold text-slate-700">{{ Auth::user()->name }}</p>
                            <p class="text-xs text-slate-400">{{ Auth::user()->email }}</p>
                        </div>
                        <div class="w-8 h-8 sm:w-10 sm:h-10 bg-indigo-100 rounded-xl flex items-center justify-center text-indigo-600 font-bold text-xs sm:text-sm shadow-sm shrink-0">
                            {{ strtoupper(substr(Auth::user()->name, 0, 2)) }}
                        </div>
                        <form method="POST" action="{{ route('logout') }}" class="hidden sm:block">
                            @csrf
                            <button type="submit"
                                class="px-2 md:px-4 py-2 text-slate-500 hover:text-rose-600 hover:bg-rose-50 rounded-xl font-semibold text-sm transition"
                                title="Logout">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                                </svg>
                            </button>
                        </form>
                    </div>
                @else
                    <div class="hidden sm:flex items-center gap-2">
                        <a href="{{ route('login') }}" class="px-4 py-2 text-sm rounded-xl font-semibold hover:bg-slate-200 transition">Login</a>
                        <a href="{{ route('register') }}"
                            class="px-4 py-2 bg-indigo-600 text-white rounded-xl font-semibold text-sm shadow-lg shadow-indigo-200 hover:bg-indigo-700 transition">Daftar</a>
                    </div>
                @endauth

                <!-- Mobile Menu Button -->
                <button onclick="toggleMobileMenu()" class="md:hidden p-2 text-slate-700 hover:text-indigo-600 hover:bg-indigo-50 rounded-xl transition" title="Menu">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path>
                    </svg>
                </button>
            </div>
        </div>

        <!-- Mobile Dropdown Menu -->
        <div id="mobile-menu" class="hidden md:hidden mt-4 pt-4 border-t border-slate-200/80 flex flex-col gap-2 font-medium text-slate-700">
            <a href="{{ route('katalog') }}" class="px-3 py-2.5 rounded-xl hover:bg-indigo-50 hover:text-indigo-600 transition">Jelajahi Event</a>
            <a href="{{ route('home') }}#become-organizer" onclick="toggleMobileMenu()" class="px-3 py-2.5 rounded-xl hover:bg-indigo-50 hover:text-indigo-600 transition">Penyelenggara</a>
            <a href="{{ route('tentang') }}" class="px-3 py-2.5 rounded-xl hover:bg-indigo-50 hover:text-indigo-600 transition">Tentang Kami</a>
            <a href="{{ route('gallery') }}" class="px-3 py-2.5 rounded-xl hover:bg-indigo-50 hover:text-indigo-600 transition">Galeri</a>

            @auth
                <div class="pt-2 border-t border-slate-200/60 flex flex-col gap-2">
                    <p class="px-3 text-xs font-bold text-slate-400 uppercase">Akun Saya ({{ Auth::user()->name }})</p>
                    <a href="{{ route('user.tickets') }}" class="px-3 py-2.5 bg-indigo-50 text-indigo-600 font-bold rounded-xl text-sm">
                        🎟️ Tiket Saya
                    </a>
                    @if(Auth::user()->role === 'organizer')
                        <a href="{{ route('organizer.dashboard') }}" class="px-3 py-2.5 bg-emerald-50 text-emerald-700 font-bold rounded-xl text-sm">
                            💼 Panel Organizer
                        </a>
                    @elseif(Auth::user()->role === 'admin' || Auth::user()->role === 'superadmin')
                        <a href="{{ route('admin.dashboard') }}" class="px-3 py-2.5 bg-amber-50 text-amber-700 font-bold rounded-xl text-sm">
                            ⚡ Panel Admin
                        </a>
                    @endif
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="w-full text-left px-3 py-2.5 text-rose-600 font-bold rounded-xl hover:bg-rose-50 text-sm transition">
                            🚪 Logout
                        </button>
                    </form>
                </div>
            @else
                <div class="pt-3 border-t border-slate-200/60 grid grid-cols-2 gap-2 sm:hidden">
                    <a href="{{ route('login') }}" class="py-2.5 border border-slate-200 text-slate-700 text-center rounded-xl font-bold text-sm hover:bg-slate-100 transition">Login</a>
                    <a href="{{ route('register') }}" class="py-2.5 bg-indigo-600 text-white text-center rounded-xl font-bold text-sm shadow-md shadow-indigo-100 hover:bg-indigo-700 transition">Daftar</a>
                </div>
            @endauth
        </div>
    </nav>

    <script>
        function toggleMobileMenu() {
            const menu = document.getElementById('mobile-menu');
            menu.classList.toggle('hidden');
        }
    </script>

    <main>
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-indigo-900 text-indigo-100 py-12 md:py-20 px-4 sm:px-6 mt-12 md:mt-20">
        <div class="max-w-7xl mx-auto grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-8 md:gap-12">
            <div class="space-y-4 col-span-1 sm:col-span-2">
                <div class="flex items-center gap-2">
                    <div
                        class="w-10 h-10 bg-white rounded-xl flex items-center justify-center text-indigo-900 font-bold text-xl">
                        AH</div>
                    <span class="text-2xl font-bold text-white">AmikomEventHub</span>
                </div>
                <p class="max-w-xs text-indigo-300">Platform reservasi tiket event online terbaik untuk mahasiswa dan
                    penyelenggara profesional.</p>
            </div>
            <div>
                <h4 class="text-white font-bold mb-4 md:mb-6">Navigasi</h4>
                <ul class="space-y-3 md:space-y-4">
                    <li><a href="{{ route('home') }}" onclick="if (window.location.pathname === '/') { event.preventDefault(); window.scrollTo({ top: 0, behavior: 'smooth' }); history.pushState(null, null, window.location.pathname); }" class="hover:text-white transition">Home</a></li>
                    <li><a href="{{ route('katalog') }}" class="hover:text-white transition">Semua Event</a></li>
                    <li><a href="{{ route('gallery') }}" class="hover:text-white transition">Galeri</a></li>
                </ul>
            </div>
            <div>
                <h4 class="text-white font-bold mb-4 md:mb-6">Hubungi Kami</h4>
                <ul class="space-y-3 md:space-y-4">
                    <li>support@eventtiket.com</li>
                    <li>+62 812 3456 7890</li>
                </ul>
            </div>
        </div>
        <div class="max-w-7xl mx-auto pt-8 md:pt-12 mt-8 md:mt-12 border-t border-indigo-800 text-center text-indigo-400 text-sm">
            &copy; 2024 AmikomEventHub. Built with Laravel & Tailwind CSS.
        </div>
    </footer>

    <!-- PWA Service Worker Registration -->
    <script>
        if ('serviceWorker' in navigator) {
            window.addEventListener('load', () => {
                navigator.serviceWorker.register('/sw.js')
                    .then((reg) => console.log('[PWA] Service Worker registered:', reg.scope))
                    .catch((err) => console.error('[PWA] Service Worker registration failed:', err));
            });
        }
    </script>
    @stack('scripts')
</body>

</html>