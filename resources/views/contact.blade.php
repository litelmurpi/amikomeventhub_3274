<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kontak - Amikom Event Hub</title>
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
            <a href="/katalog" class="hover:opacity-70 transition-opacity">Katalog</a>
            <a href="/bantuan" class="hover:opacity-70 transition-opacity">Bantuan</a>
        </nav>
    </header>

    <main class="w-full max-w-lg flex-grow">
        <h1 class="text-2xl font-medium mb-12 tracking-tight">Kontak</h1>
        
        <section class="space-y-12">
            <p class="text-gray-400 text-sm leading-relaxed max-w-xs">
                Ada pertanyaan atau ingin bekerjasama? Kami siap membantu Anda melalui formulir di bawah ini.
            </p>

            <form class="space-y-8">
                <div>
                    <label for="name" class="block text-[10px] uppercase tracking-widest text-gray-400 mb-2">Nama</label>
                    <input type="text" id="name" required class="w-full bg-transparent border-b border-gray-100 py-2 text-sm focus:outline-none focus:border-black transition-colors">
                </div>
                <div>
                    <label for="email" class="block text-[10px] uppercase tracking-widest text-gray-400 mb-2">Email</label>
                    <input type="email" id="email" required class="w-full bg-transparent border-b border-gray-100 py-2 text-sm focus:outline-none focus:border-black transition-colors">
                </div>
                <div>
                    <label for="message" class="block text-[10px] uppercase tracking-widest text-gray-400 mb-2">Pesan</label>
                    <textarea id="message" rows="3" required class="w-full bg-transparent border-b border-gray-100 py-2 text-sm focus:outline-none focus:border-black transition-colors resize-none"></textarea>
                </div>
                <button type="submit" class="text-xs font-medium border border-black px-6 py-2 hover:bg-black hover:text-white transition-all">Kirim Pesan</button>
            </form>

            <div class="pt-12 border-t border-gray-50">
                <p class="text-[10px] uppercase tracking-widest text-gray-400 mb-4">Informasi</p>
                <div class="space-y-2 text-xs">
                    <p>admin@amikomeventhub.com</p>
                    <p>Yogyakarta, Indonesia</p>
                </div>
            </div>
        </section>
    </main>

    <footer class="mt-24 w-full max-w-2xl flex justify-center gap-12 text-[10px] uppercase tracking-[0.2em] text-gray-300">
        <a href="/profil" class="hover:text-black transition-colors">Profil Saya</a>
        <a href="/bantuan" class="hover:text-black transition-colors">Pusat Bantuan</a>
        <a href="/katalog" class="hover:text-black transition-colors">Katalog Event</a>
    </footer>

</body>
</html>
