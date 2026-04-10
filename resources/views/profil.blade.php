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
    </style>
</head>
<body class="bg-[#FDFDFC] text-[#1b1b18] min-h-screen flex flex-col items-center p-8 lg:p-24">
    
    <header class="w-full max-w-2xl flex justify-between items-center mb-24">
        <a href="/" class="text-sm font-medium tracking-tight hover:opacity-70 transition-opacity">Amikom Event Hub</a>
        <nav class="flex gap-8 text-sm">
            <a href="/katalog" class="hover:opacity-70 transition-opacity">Katalog</a>
            <a href="/bantuan" class="hover:opacity-70 transition-opacity text-gray-400">Bantuan</a>
            <a href="/kontak" class="hover:opacity-70 transition-opacity text-gray-400">Kontak</a>
        </nav>
    </header>

    <main class="w-full max-w-lg flex-grow">
        <h1 class="text-2xl font-medium mb-12 tracking-tight">Profil</h1>
        
        <section class="space-y-12">
            <div>
                <label class="block text-[10px] uppercase tracking-widest text-gray-400 mb-2">User</label>
                <div class="flex items-center gap-4">
                    <div class="w-12 h-12 bg-gray-100 rounded-full"></div>
                    <div>
                        <p class="font-medium text-sm">Administrator</p>
                        <p class="text-gray-400 text-xs">admin@amikom.ac.id</p>
                    </div>
                </div>
            </div>

            <form class="space-y-8">
                <div>
                    <label for="name" class="block text-[10px] uppercase tracking-widest text-gray-400 mb-2">Nama Lengkap</label>
                    <input type="text" id="name" value="Admin Amikom" class="w-full bg-transparent border-b border-gray-100 py-2 text-sm focus:outline-none focus:border-black transition-colors">
                </div>
                <div>
                    <label for="bio" class="block text-[10px] uppercase tracking-widest text-gray-400 mb-2">Bio</label>
                    <textarea id="bio" rows="2" class="w-full bg-transparent border-b border-gray-100 py-2 text-sm focus:outline-none focus:border-black transition-colors resize-none">Administrator of Amikom Event Hub.</textarea>
                </div>
                <button type="submit" class="text-xs font-medium border border-black px-6 py-2 hover:bg-black hover:text-white transition-all">Simpan</button>
            </form>
        </section>
    </main>

    <footer class="mt-24 w-full max-w-2xl flex justify-center gap-12 text-[10px] uppercase tracking-[0.2em] text-gray-300">
        <a href="/katalog" class="hover:text-black transition-colors">Katalog Event</a>
        <a href="/bantuan" class="hover:text-black transition-colors">Pusat Bantuan</a>
        <a href="/kontak" class="hover:text-black transition-colors">Kontak Kami</a>
    </footer>

</body>
</html>
