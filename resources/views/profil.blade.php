<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil - Amikom Event Hub</title>
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
            <a href="/profil" class="text-black underline underline-offset-8 decoration-1">Profil</a>
            <a href="/bantuan" class="hover:text-black transition-colors">Bantuan</a>
            <a href="/kontak" class="hover:text-black transition-colors">Kontak</a>
        </nav>
    </header>

    <main class="w-full max-w-lg flex-grow opacity-0 animate-in" style="animation-delay: 0.3s">
        <h1 class="text-3xl font-medium mb-16 tracking-tighter">Profil</h1>
        
        <section class="space-y-16">
            <div class="flex items-center gap-6 group">
                <div class="w-16 h-16 bg-gray-50 rounded-full border border-gray-100 flex-shrink-0 transition-transform group-hover:scale-105"></div>
                <div>
                    <label class="block text-[9px] uppercase tracking-[0.2em] text-gray-300 mb-1">Status</label>
                    <p class="font-medium text-sm">Administrator</p>
                    <p class="text-gray-400 text-xs">admin@amikom.ac.id</p>
                </div>
            </div>

            <form class="space-y-10">
                <div class="group">
                    <label for="name" class="block text-[9px] uppercase tracking-[0.2em] text-gray-300 mb-2 group-focus-within:text-black transition-colors">Nama Lengkap</label>
                    <input type="text" id="name" value="Admin Amikom" class="w-full bg-transparent border-b border-gray-100 py-3 text-sm focus:outline-none focus:border-black transition-colors">
                </div>
                <div class="group">
                    <label for="bio" class="block text-[9px] uppercase tracking-[0.2em] text-gray-300 mb-2 group-focus-within:text-black transition-colors">Bio</label>
                    <textarea id="bio" rows="2" class="w-full bg-transparent border-b border-gray-100 py-3 text-sm focus:outline-none focus:border-black transition-colors resize-none">Administrator of Amikom Event Hub. Passionate about organizing student events.</textarea>
                </div>
                <div class="pt-4">
                    <button type="submit" class="text-[10px] uppercase tracking-[0.2em] font-semibold border border-black px-10 py-3 hover:bg-black hover:text-white transition-all active:scale-95">Simpan Perubahan</button>
                </div>
            </form>
        </section>
    </main>

    <footer class="mt-32 w-full max-w-2xl flex justify-center gap-10 text-[9px] uppercase tracking-[0.3em] text-gray-300 opacity-0 animate-in" style="animation-delay: 0.5s">
        <a href="/katalog" class="hover:text-black transition-colors">Event</a>
        <a href="/bantuan" class="hover:text-black transition-colors">Bantuan</a>
        <a href="/kontak" class="hover:text-black transition-colors">Kontak</a>
    </footer>

</body>
</html>
