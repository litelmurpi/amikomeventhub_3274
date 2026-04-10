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
            <a href="/katalog" class="hover:text-black transition-colors">Katalog</a>
            <a href="/profil" class="hover:text-black transition-colors">Profil</a>
            <a href="/bantuan" class="hover:text-black transition-colors">Bantuan</a>
            <a href="/kontak" class="text-black underline underline-offset-8 decoration-1">Kontak</a>
        </nav>
    </header>

    <main class="w-full max-w-lg flex-grow opacity-0 animate-in" style="animation-delay: 0.3s">
        <h1 class="text-3xl font-medium mb-16 tracking-tighter">Kontak</h1>
        
        <section class="space-y-16">
            <p class="text-gray-400 text-sm leading-relaxed max-w-xs italic">
                Ada pertanyaan atau ingin bekerjasama? Kami siap membantu Anda melalui formulir di bawah ini.
            </p>

            <form class="space-y-10">
                <div class="group">
                    <label for="name" class="block text-[9px] uppercase tracking-[0.2em] text-gray-300 mb-2 group-focus-within:text-black transition-colors">Nama</label>
                    <input type="text" id="name" required class="w-full bg-transparent border-b border-gray-100 py-3 text-sm focus:outline-none focus:border-black transition-colors">
                </div>
                <div class="group">
                    <label for="email" class="block text-[9px] uppercase tracking-[0.2em] text-gray-300 mb-2 group-focus-within:text-black transition-colors">Email</label>
                    <input type="email" id="email" required class="w-full bg-transparent border-b border-gray-100 py-3 text-sm focus:outline-none focus:border-black transition-colors">
                </div>
                <div class="group">
                    <label for="message" class="block text-[9px] uppercase tracking-[0.2em] text-gray-300 mb-2 group-focus-within:text-black transition-colors">Pesan</label>
                    <textarea id="message" rows="3" required class="w-full bg-transparent border-b border-gray-100 py-3 text-sm focus:outline-none focus:border-black transition-colors resize-none"></textarea>
                </div>
                <div class="pt-4">
                    <button type="submit" class="text-[10px] uppercase tracking-[0.2em] font-semibold border border-black px-10 py-3 hover:bg-black hover:text-white transition-all active:scale-95">Kirim Pesan</button>
                </div>
            </form>

            <div class="pt-16 border-t border-gray-50 flex justify-between items-start">
                <div>
                    <p class="text-[9px] uppercase tracking-[0.2em] text-gray-300 mb-4">Email</p>
                    <p class="text-xs font-medium">admin@amikomeventhub.com</p>
                </div>
                <div class="text-right">
                    <p class="text-[9px] uppercase tracking-[0.2em] text-gray-300 mb-4">Lokasi</p>
                    <p class="text-xs font-medium">Yogyakarta, Indonesia</p>
                </div>
            </div>
        </section>
    </main>

    <footer class="mt-32 w-full max-w-2xl flex justify-center gap-10 text-[9px] uppercase tracking-[0.3em] text-gray-300 opacity-0 animate-in" style="animation-delay: 0.5s">
        <a href="/katalog" class="hover:text-black transition-colors">Event</a>
        <a href="/profil" class="hover:text-black transition-colors">Profil</a>
        <a href="/bantuan" class="hover:text-black transition-colors">Bantuan</a>
    </footer>

</body>
</html>
