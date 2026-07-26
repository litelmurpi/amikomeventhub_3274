<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Organizer Dashboard - AmikomEventHub')</title>
    
    <!-- PWA Meta Tags & Manifest -->
    <link rel="manifest" href="/manifest.json">
    <meta name="theme-color" content="#4f46e5">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
    <meta name="apple-mobile-web-app-title" content="EventHub">
    <link rel="apple-touch-icon" href="/icons/icon-192x192.png">

    <script src="https://cdn.tailwindcss.com"></script>
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

    <!-- Mobile Header -->
    <header class="md:hidden bg-indigo-900 text-white px-4 py-3 flex justify-between items-center sticky top-0 z-50 shadow-md">
        <a href="{{ route('organizer.dashboard') }}" class="flex items-center gap-2.5 min-w-0">
            @if(isset($org) && $org->logo_path)
                <img src="{{ asset($org->logo_path) }}" alt="Logo" class="w-8 h-8 rounded-lg object-cover shadow shrink-0">
            @else
                <img src="{{ asset('assets/logo-icon.svg') }}" alt="Logo" class="w-8 h-8 rounded-lg shadow shrink-0">
            @endif
            <span class="text-base font-bold tracking-tight text-white truncate">{{ $org->name ?? 'Organizer Panel' }}</span>
        </a>
        <button onclick="toggleOrganizerSidebar()" class="p-2 text-indigo-200 hover:text-white rounded-lg hover:bg-indigo-800 transition" title="Toggle Sidebar">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path>
            </svg>
        </button>
    </header>

    <!-- Sidebar Backdrop Overlay (Mobile) -->
    <div id="sidebar-backdrop" onclick="toggleOrganizerSidebar()" class="fixed inset-0 bg-slate-900/60 backdrop-blur-sm z-40 hidden md:hidden transition-opacity"></div>

    <!-- Sidebar (Desktop & Mobile Drawer) -->
    <aside id="organizer-sidebar" class="fixed md:sticky top-0 left-0 z-50 md:z-auto w-64 bg-indigo-900 text-indigo-100 flex flex-col p-6 space-y-8 h-screen transform -translate-x-full md:translate-x-0 transition-transform duration-300 ease-in-out shadow-2xl md:shadow-none flex-shrink-0 overflow-y-auto">
        <div class="flex items-center justify-between">
            <div class="flex items-center gap-3 min-w-0">
                @if(isset($org) && $org->logo_path)
                    <img src="{{ asset($org->logo_path) }}" alt="Logo" class="w-10 h-10 rounded-xl object-cover shadow shrink-0">
                @else
                    <img src="{{ asset('assets/logo-icon.svg') }}" alt="Logo" class="w-10 h-10 rounded-xl shadow shrink-0">
                @endif
                <div class="overflow-hidden">
                    <span class="text-xl font-bold text-white tracking-tight block truncate">{{ $org->name ?? 'AmikomEventHub' }}</span>
                    <span class="text-[10px] uppercase font-bold text-indigo-300 tracking-wider">Panel Penyelenggara</span>
                </div>
            </div>
            <!-- Close Button for Mobile -->
            <button onclick="toggleOrganizerSidebar()" class="md:hidden text-indigo-300 hover:text-white shrink-0">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>
        </div>

        <nav class="flex-1 space-y-2">
            <p class="text-[10px] font-bold uppercase tracking-widest text-indigo-400 mb-4 px-2">Main Menu</p>

            <a href="{{ route('organizer.dashboard') }}"
                class="flex items-center gap-3 px-4 py-3 {{ request()->routeIs('organizer.dashboard') ? 'bg-indigo-800 text-white' : 'hover:bg-indigo-800' }} rounded-xl font-bold transition">
                <svg class="w-5 h-5 text-indigo-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z">
                    </path>
                </svg>
                Dashboard
            </a>

            <a href="{{ route('organizer.events') }}"
                class="flex items-center gap-3 px-4 py-3 {{ request()->routeIs('organizer.events*') ? 'bg-indigo-800 text-white' : 'hover:bg-indigo-800' }} rounded-xl font-bold transition">
                <svg class="w-5 h-5 text-indigo-400 group-hover:text-indigo-300" fill="none" stroke="currentColor"
                    viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                    </path>
                </svg>
                Kelola Event
            </a>

            <a href="{{ route('organizer.checkin') }}"
                class="flex items-center gap-3 px-4 py-3 {{ request()->routeIs('organizer.checkin*') ? 'bg-indigo-800 text-white' : 'hover:bg-indigo-800' }} rounded-xl font-bold transition">
                <svg class="w-5 h-5 text-indigo-400 group-hover:text-indigo-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v1m6 11h2m-6 0h-2v4m0-11v3m0 0h.01M12 12h4.01M16 20h4M4 12h4m12 0h.01M5 8h2a1 1 0 001-1V5a1 1 0 00-1-1H5a1 1 0 00-1 1v2a1 1 0 001 1zm12 0h2a1 1 0 001-1V5a1 1 0 00-1-1h-2a1 1 0 00-1 1v2a1 1 0 001 1zM5 20h2a1 1 0 001-1v-2a1 1 0 00-1-1H5a1 1 0 00-1 1v2a1 1 0 001 1z"></path>
                </svg>
                Scan Tiket (Check-in)
            </a>

            <a href="{{ route('organizer.profile') }}"
                class="flex items-center gap-3 px-4 py-3 {{ request()->routeIs('organizer.profile*') ? 'bg-indigo-800 text-white' : 'hover:bg-indigo-800' }} rounded-xl font-bold transition">
                <svg class="w-5 h-5 text-indigo-400 group-hover:text-indigo-300" fill="none" stroke="currentColor"
                    viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5m3 0h1m-1-4h.01M9 16h.01M9 12h.01M9 8h.01M15 16h.01M15 12h.01M15 8h.01">
                    </path>
                </svg>
                Profil Organisasi
            </a>
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
        function toggleOrganizerSidebar() {
            const sidebar = document.getElementById('organizer-sidebar');
            const backdrop = document.getElementById('sidebar-backdrop');
            
            sidebar.classList.toggle('-translate-x-full');
            backdrop.classList.toggle('hidden');
        }

        if ('serviceWorker' in navigator) {
            window.addEventListener('load', () => {
                navigator.serviceWorker.register('/sw.js')
                    .then((reg) => console.log('[PWA Organizer] Service Worker registered:', reg.scope))
                    .catch((err) => console.error('[PWA Organizer] Service Worker registration failed:', err));
            });
        }
    </script>
</body>

</html>
