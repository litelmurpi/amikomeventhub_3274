<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Katalog - Amikom Event Hub</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body { font-family: 'Instrument Sans', sans-serif; }
        @keyframes fadeInUp {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .animate-in { animation: fadeInUp 0.6s ease-out forwards; }
    </style>
</head>
<body class="bg-[#FDFDFC] text-[#1b1b18] min-h-screen flex flex-col items-center p-8 lg:p-24 selection:bg-black selection:text-white">
    
    <header class="w-full max-w-2xl flex justify-between items-center mb-24 opacity-0 animate-in" style="animation-delay: 0.1s">
        <a href="/" class="text-sm font-semibold tracking-tighter hover:opacity-50 transition-opacity">Amikom Event Hub</a>
        <nav class="flex gap-6 text-[11px] uppercase tracking-widest text-gray-400">
            <a href="/katalog" class="text-black underline underline-offset-8 decoration-1">Katalog</a>
            <a href="/profil" class="hover:text-black transition-colors">Profil</a>
            <a href="/bantuan" class="hover:text-black transition-colors">Bantuan</a>
            <a href="/kontak" class="hover:text-black transition-colors">Kontak</a>
        </nav>
    </header>

    <main class="w-full max-w-lg flex-grow opacity-0 animate-in" style="animation-delay: 0.3s">
        <h1 class="text-3xl font-medium mb-16 tracking-tighter">Katalog</h1>
        
        <div class="space-y-20">
            <article class="group cursor-pointer">
                <p class="text-[9px] uppercase tracking-[0.2em] text-gray-300 mb-3 group-hover:text-black transition-colors">12 April 2026</p>
                <h2 class="text-xl font-medium tracking-tight decoration-1 group-hover:underline underline-offset-8">Seminar Teknologi Web</h2>
                <div class="flex items-center gap-4 mt-2">
                    <p class="text-gray-400 text-xs">Gedung 4, Ruang 4.2.1</p>
                    <span class="w-1 h-1 bg-gray-200 rounded-full"></span>
                    <p class="text-gray-400 text-xs italic">Gratis</p>
                </div>
            </article>

            <article class="group cursor-pointer">
                <p class="text-[9px] uppercase tracking-[0.2em] text-gray-300 mb-3 group-hover:text-black transition-colors">15 April 2026</p>
                <h2 class="text-xl font-medium tracking-tight decoration-1 group-hover:underline underline-offset-8">Workshop UI/UX Design</h2>
                <div class="flex items-center gap-4 mt-2">
                    <p class="text-gray-400 text-xs">Laboratorium Komputer 5</p>
                    <span class="w-1 h-1 bg-gray-200 rounded-full"></span>
                    <p class="text-gray-400 text-xs italic">Berbayar</p>
                </div>
            </article>

            <article class="group opacity-40">
                <p class="text-[9px] uppercase tracking-[0.2em] text-gray-300 mb-3">20 April 2026</p>
                <h2 class="text-xl font-medium tracking-tight">Lomba Inovasi Mahasiswa</h2>
                <p class="text-gray-400 text-xs mt-2 italic">Segera Datang</p>
            </article>
        </div>
    </main>

    <footer class="mt-32 w-full max-w-2xl flex justify-center gap-10 text-[9px] uppercase tracking-[0.3em] text-gray-300 opacity-0 animate-in" style="animation-delay: 0.5s">
        <a href="/profil" class="hover:text-black transition-colors">Profil</a>
        <a href="/bantuan" class="hover:text-black transition-colors">Bantuan</a>
        <a href="/kontak" class="hover:text-black transition-colors">Kontak</a>
    </footer>

</body>
</html>
