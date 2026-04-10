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
    </style>
</head>
<body class="bg-[#FDFDFC] text-[#1b1b18] min-h-screen flex flex-col items-center p-8 lg:p-24">
    
    <header class="w-full max-w-2xl flex justify-between items-center mb-24">
        <a href="/" class="text-sm font-medium tracking-tight hover:opacity-70 transition-opacity">Amikom Event Hub</a>
        <nav class="flex gap-8 text-sm">
            <a href="/profil" class="hover:opacity-70 transition-opacity">Profil</a>
            <a href="/bantuan" class="hover:opacity-70 transition-opacity text-gray-400">Bantuan</a>
            <a href="/kontak" class="hover:opacity-70 transition-opacity text-gray-400">Kontak</a>
        </nav>
    </header>

    <main class="w-full max-w-lg flex-grow">
        <h1 class="text-2xl font-medium mb-12 tracking-tight">Katalog</h1>
        
        <div class="space-y-16">
            <article class="group">
                <p class="text-[10px] uppercase tracking-widest text-gray-400 mb-2">12 April 2026</p>
                <h2 class="text-lg font-medium group-hover:underline underline-offset-4 cursor-pointer">Seminar Teknologi Web</h2>
                <p class="text-gray-400 text-sm mt-1">Gedung 4, Ruang 4.2.1</p>
            </article>

            <article class="group">
                <p class="text-[10px] uppercase tracking-widest text-gray-400 mb-2">15 April 2026</p>
                <h2 class="text-lg font-medium group-hover:underline underline-offset-4 cursor-pointer">Workshop UI/UX Design</h2>
                <p class="text-gray-400 text-sm mt-1">Laboratorium Komputer 5</p>
            </article>

            <article class="group opacity-50">
                <p class="text-[10px] uppercase tracking-widest text-gray-400 mb-2">20 April 2026</p>
                <h2 class="text-lg font-medium">Lomba Inovasi Mahasiswa</h2>
                <p class="text-gray-400 text-sm mt-1">Segera Datang</p>
            </article>
        </div>
    </main>

    <footer class="mt-24 w-full max-w-2xl flex justify-center gap-12 text-[10px] uppercase tracking-[0.2em] text-gray-300">
        <a href="/profil" class="hover:text-black transition-colors">Profil Saya</a>
        <a href="/bantuan" class="hover:text-black transition-colors">Pusat Bantuan</a>
        <a href="/kontak" class="hover:text-black transition-colors">Kontak Kami</a>
    </footer>

</body>
</html>
