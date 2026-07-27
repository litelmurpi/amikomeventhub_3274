<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - AmikomEventHub</title>
    
    <!-- PWA Meta Tags & Manifest -->
    <link rel="manifest" href="{{ asset('manifest.json') }}">
    <meta name="theme-color" content="#4f46e5">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
    <meta name="apple-mobile-web-app-title" content="EventHub">
    <link rel="apple-touch-icon" href="{{ asset('icons/icon-192x192.png') }}">

    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Phosphor Icons CDN -->
    <script src="https://unpkg.com/@phosphor-icons/web"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">
    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
        }
    </style>
</head>

<body class="bg-slate-50 text-slate-900 flex flex-col md:flex-row min-h-screen">
    @include('components.pwa-splash')
    @include('components.pwa-install-prompt')

    <!-- Mobile Header -->
    <header class="md:hidden bg-indigo-900 text-white px-4 py-3 flex justify-between items-center sticky top-0 z-50 shadow-md">
        <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-2.5">
            <img src="{{ asset('assets/logo-icon.svg') }}" alt="Logo" class="w-8 h-8 rounded-lg shadow">
            <span class="text-lg font-bold tracking-tight text-white">Admin Panel</span>
        </a>
        <button onclick="toggleAdminSidebar()" class="p-2 text-indigo-200 hover:text-white rounded-lg hover:bg-indigo-800 transition" title="Toggle Sidebar">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path>
            </svg>
        </button>
    </header>

    <!-- Sidebar Backdrop Overlay (Mobile) -->
    <div id="sidebar-backdrop" onclick="toggleAdminSidebar()" class="fixed inset-0 bg-slate-900/60 backdrop-blur-sm z-40 hidden md:hidden transition-opacity"></div>

    <!-- Sidebar (Desktop & Mobile Drawer) -->
    <aside id="admin-sidebar" class="fixed md:sticky top-0 left-0 z-50 md:z-auto w-64 bg-indigo-900 text-indigo-100 flex flex-col p-6 space-y-8 h-screen transform -translate-x-full md:translate-x-0 transition-transform duration-300 ease-in-out shadow-2xl md:shadow-none flex-shrink-0 overflow-y-auto">
        <div class="flex items-center justify-between">
            <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-3">
                <img src="{{ asset('assets/logo-icon.svg') }}" alt="Logo" class="w-10 h-10 rounded-xl shadow">
                <span class="text-xl font-bold text-white tracking-tight">AmikomEventHub</span>
            </a>
            <!-- Close Button for Mobile -->
            <button onclick="toggleAdminSidebar()" class="md:hidden text-indigo-300 hover:text-white">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>
        </div>

        <nav class="flex-1 space-y-2">
            <p class="text-[10px] font-bold uppercase tracking-widest text-indigo-400 mb-4 px-2">Main Menu</p>
            <a href="{{ route('admin.dashboard') }}"
                class="flex items-center gap-3 px-4 py-3 {{ request()->routeIs('admin.dashboard') ? 'bg-indigo-800 text-white' : 'hover:bg-indigo-800' }} rounded-xl font-bold transition">
                <svg class="w-5 h-5 text-indigo-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z">
                    </path>
                </svg>
                Dashboard
            </a>
            <a href="{{ route('admin.events') }}"
                class="flex items-center gap-3 px-4 py-3 {{ request()->routeIs('admin.events*') ? 'bg-indigo-800 text-white' : 'hover:bg-indigo-800' }} rounded-xl font-bold transition">
                <svg class="w-5 h-5 text-indigo-400 group-hover:text-indigo-300" fill="none" stroke="currentColor"
                    viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                    </path>
                </svg>
                Kelola Event
            </a>
            <a href="{{ route('admin.organizations') }}"
                class="flex items-center gap-3 px-4 py-3 {{ request()->routeIs('admin.organizations*') ? 'bg-indigo-800 text-white' : 'hover:bg-indigo-800' }} rounded-xl font-bold transition">
                <svg class="w-5 h-5 text-indigo-400 group-hover:text-indigo-300" fill="none" stroke="currentColor"
                    viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5m3 0h1m-1-4h.01M9 16h.01M9 12h.01M9 8h.01M15 16h.01M15 12h.01M15 8h.01">
                    </path>
                </svg>
                Penyelenggara (Tenant)
            </a>
            <a href="{{ route('admin.categories') }}"
                class="flex items-center gap-3 px-4 py-3 {{ request()->routeIs('admin.categories*') ? 'bg-indigo-800 text-white' : 'hover:bg-indigo-800' }} rounded-xl font-bold transition">
                <svg class="w-5 h-5 text-indigo-400 group-hover:text-indigo-300" fill="none" stroke="currentColor"
                    viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z">
                    </path>
                </svg>
                Kelola Kategori
            </a>
            <a href="{{ route('admin.partners') }}"
                class="flex items-center gap-3 px-4 py-3 {{ request()->routeIs('admin.partners*') ? 'bg-indigo-800 text-white' : 'hover:bg-indigo-800' }} rounded-xl font-bold transition">
                <svg class="w-5 h-5 text-indigo-400 group-hover:text-indigo-300" fill="none" stroke="currentColor"
                    viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z">
                    </path>
                </svg>
                Kelola Partner
            </a>
            <a href="{{ route('admin.galleries') }}"
                class="flex items-center gap-3 px-4 py-3 {{ request()->routeIs('admin.galleries*') ? 'bg-indigo-800 text-white' : 'hover:bg-indigo-800' }} rounded-xl font-bold transition">
                <svg class="w-5 h-5 text-indigo-400 group-hover:text-indigo-300" fill="none" stroke="currentColor"
                    viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z">
                    </path>
                </svg>
                Kelola Galeri
            </a>
            <a href="{{ route('admin.transactions') }}"
                class="flex items-center gap-3 px-4 py-3 {{ request()->routeIs('admin.transactions*') ? 'bg-indigo-800 text-white' : 'hover:bg-indigo-800' }} rounded-xl font-bold transition">
                <svg class="w-5 h-5 text-indigo-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z">
                    </path>
                </svg>
                Transaksi
            </a>
            <a href="{{ route('admin.checkin') }}"
                class="flex items-center gap-3 px-4 py-3 {{ request()->routeIs('admin.checkin*') ? 'bg-indigo-800 text-white' : 'hover:bg-indigo-800' }} rounded-xl font-bold transition">
                <svg class="w-5 h-5 text-indigo-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z">
                    </path>
                </svg>
                Check-in Tiket
            </a>
            @if(Route::has('admin.promo-codes.index'))
            <a href="{{ route('admin.promo-codes.index') }}"
                class="flex items-center gap-3 px-4 py-3 {{ request()->routeIs('admin.promo-codes*') ? 'bg-indigo-800 text-white' : 'hover:bg-indigo-800' }} rounded-xl font-bold transition">
                <svg class="w-5 h-5 text-indigo-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z">
                    </path>
                </svg>
                Kelola Promo
            </a>
            @endif
        </nav>

        <div class="pt-6 border-t border-indigo-800 space-y-2">
            <a href="{{ route('home') }}"
                class="flex items-center gap-3 px-4 py-3 text-indigo-300 hover:text-white hover:bg-indigo-800 rounded-xl transition font-medium">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6">
                    </path>
                </svg>
                Kembali ke Site
            </a>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit"
                    class="w-full flex items-center gap-3 px-4 py-3 text-indigo-300 hover:text-rose-300 hover:bg-indigo-800 rounded-xl transition font-medium">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1">
                        </path>
                    </svg>
                    Logout
                </button>
            </form>
        </div>
    </aside>

    <!-- Main Content -->
    <main class="flex-1 p-4 md:p-8 lg:p-10 overflow-y-auto min-w-0">
        @yield('content')
    </main>

    <script>
        function toggleAdminSidebar() {
            const sidebar = document.getElementById('admin-sidebar');
            const backdrop = document.getElementById('sidebar-backdrop');
            
            sidebar.classList.toggle('-translate-x-full');
            backdrop.classList.toggle('hidden');
        }

        if ('serviceWorker' in navigator) {
            window.addEventListener('load', () => {
                navigator.serviceWorker.register("{{ asset('sw.js') }}")
                    .then((reg) => console.log('[PWA Admin] Service Worker registered:', reg.scope))
                    .catch((err) => console.error('[PWA Admin] Service Worker registration failed:', err));
            });
        }
    </script>

</body>

</html>
