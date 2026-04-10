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
            <a href="/bantuan" class="text-black underline underline-offset-8 decoration-1">Bantuan</a>
            <a href="/kontak" class="hover:text-black transition-colors">Kontak</a>
        </nav>
    </header>

    <main class="w-full max-w-lg flex-grow opacity-0 animate-in" style="animation-delay: 0.3s">
        <h1 class="text-3xl font-medium mb-16 tracking-tighter">Bantuan</h1>
        
        <div class="space-y-16">
            <div class="group">
                <h3 class="text-[10px] uppercase tracking-[0.2em] text-gray-300 mb-3 group-hover:text-black transition-colors">Pendaftaran</h3>
                <p class="text-sm font-medium mb-2">Bagaimana cara mendaftar event?</p>
                <p class="text-gray-400 text-xs leading-relaxed">Pilih event di katalog, kemudian klik tombol daftar yang tersedia di halaman detail event tersebut.</p>
            </div>

            <div class="group">
                <h3 class="text-[10px] uppercase tracking-[0.2em] text-gray-300 mb-3 group-hover:text-black transition-colors">Kontak Dukungan</h3>
                <div class="grid grid-cols-2 gap-8">
                    <div>
                        <p class="text-[9px] uppercase tracking-[0.1em] text-gray-300 mb-2">Email</p>
                        <p class="text-xs font-medium">support@amikom.ac.id</p>
                    </div>
                    <div>
                        <p class="text-[9px] uppercase tracking-[0.1em] text-gray-300 mb-2">Telepon</p>
                        <p class="text-xs font-medium">+62 274 123456</p>
                    </div>
                </div>
            </div>

            <div class="pt-8">
                <a href="mailto:support@amikom.ac.id" class="text-[10px] uppercase tracking-[0.2em] font-semibold border border-black px-10 py-3 hover:bg-black hover:text-white transition-all active:scale-95">Kirim Pesan</a>
            </div>
        </div>
    </main>

    <footer class="mt-32 w-full max-w-2xl flex justify-center gap-10 text-[9px] uppercase tracking-[0.3em] text-gray-300 opacity-0 animate-in" style="animation-delay: 0.5s">
        <a href="/katalog" class="hover:text-black transition-colors">Event</a>
        <a href="/profil" class="hover:text-black transition-colors">Profil</a>
        <a href="/kontak" class="hover:text-black transition-colors">Kontak</a>
    </footer>

</body>
</html>
