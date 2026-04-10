<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bantuan - Amikom Event Hub</title>
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
            <a href="/katalog" class="hover:opacity-70 transition-opacity text-gray-400">Katalog</a>
            <a href="/kontak" class="hover:opacity-70 transition-opacity text-gray-400">Kontak</a>
        </nav>
    </header>

    <main class="w-full max-w-lg flex-grow">
        <h1 class="text-2xl font-medium mb-12 tracking-tight">Bantuan</h1>
        
        <div class="space-y-12">
            <div>
                <h3 class="text-sm font-medium mb-2">Cara mendaftar event?</h3>
                <p class="text-gray-400 text-sm leading-relaxed">Pilih event di katalog, kemudian klik tombol daftar yang tersedia di halaman detail event tersebut.</p>
            </div>

            <div>
                <h3 class="text-sm font-medium mb-2">Kontak Kami</h3>
                <p class="text-gray-400 text-sm leading-relaxed">Email: support@amikom.ac.id<br>Telp: +62 274 123456</p>
            </div>

            <div class="pt-8">
                <a href="mailto:support@amikom.ac.id" class="text-xs font-medium border border-black px-6 py-2 hover:bg-black hover:text-white transition-all">Kirim Pesan</a>
            </div>
        </div>
    </main>

    <footer class="mt-24 w-full max-w-2xl flex justify-center gap-12 text-[10px] uppercase tracking-[0.2em] text-gray-300">
        <a href="/profil" class="hover:text-black transition-colors">Profil Saya</a>
        <a href="/katalog" class="hover:text-black transition-colors">Katalog Event</a>
        <a href="/kontak" class="hover:text-black transition-colors">Kontak Kami</a>
    </footer>

</body>
</html>
