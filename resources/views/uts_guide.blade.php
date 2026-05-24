<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Script Video UTS - Amikom Event Hub</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
        .timestamp {
            font-variant-numeric: tabular-nums;
        }
    </style>
</head>
<body class="bg-slate-50 text-zinc-800 min-h-screen">

    <!-- Header -->
    <header class="bg-white border-b border-zinc-200 sticky top-0 z-50 shadow-sm">
        <div class="max-w-4xl mx-auto px-6 py-4 flex justify-between items-center">
            <div>
                <h1 class="text-lg font-bold text-zinc-900">🎬 Script Video UTS</h1>
                <p class="text-xs text-zinc-500">Amikom Event Hub • NIM 24.12.3274 • Durasi Target: 3–5 Menit</p>
            </div>
            <div class="flex items-center gap-2">
                <span class="px-3 py-1 bg-green-100 text-green-700 text-xs font-bold rounded-full">± 4 Menit</span>
            </div>
        </div>
    </header>

    <main class="max-w-4xl mx-auto px-6 py-10 space-y-10">

        <!-- ============================================================ -->
        <!-- TIPS SEBELUM RECORDING -->
        <!-- ============================================================ -->
        <div class="bg-amber-50 border border-amber-200 rounded-2xl p-6 space-y-3">
            <h2 class="text-sm font-bold text-amber-800 flex items-center gap-2">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                Tips Sebelum Merekam
            </h2>
            <ul class="text-xs text-amber-700 space-y-1.5 leading-relaxed">
                <li>✅ Pastikan database PostgreSQL sudah terkoneksi dan <code class="bg-amber-100 px-1 rounded">php artisan serve</code> berjalan.</li>
                <li>✅ Siapkan beberapa data dummy (minimal 2–3 kategori dan 2–3 partner) sebelum mulai rekam.</li>
                <li>✅ Gunakan software screen recorder (OBS Studio / built-in recorder) + mikrofon.</li>
                <li>✅ Buka browser pada URL <code class="bg-amber-100 px-1 rounded">http://localhost:8000</code> dan <code class="bg-amber-100 px-1 rounded">http://localhost:8000/admin</code>.</li>
                <li>✅ Bicara dengan tenang, jelas, dan tidak terlalu cepat. Ikuti narasi di bawah.</li>
                <li>✅ Resolusi layar yang disarankan: 1920×1080 (Full HD).</li>
            </ul>
        </div>

        <!-- ============================================================ -->
        <!-- SCENE 1: PEMBUKAAN & PERKENALAN -->
        <!-- ============================================================ -->
        <section class="bg-white rounded-2xl border border-zinc-200 shadow-sm overflow-hidden">
            <div class="bg-indigo-600 text-white px-6 py-4 flex items-center justify-between">
                <div class="flex items-center gap-3">
                    <span class="bg-white/20 px-3 py-1 rounded-lg text-xs font-bold">SCENE 1</span>
                    <h2 class="font-bold">Pembukaan & Perkenalan Aplikasi</h2>
                </div>
                <span class="timestamp text-xs bg-white/20 px-3 py-1 rounded-lg font-mono">⏱ 00:00 – 00:45</span>
            </div>
            <div class="p-6 space-y-5">

                <!-- Aksi yang dilakukan -->
                <div class="space-y-2">
                    <h3 class="text-xs font-bold text-zinc-400 uppercase tracking-wider">📹 Yang Ditampilkan di Layar</h3>
                    <ol class="text-sm text-zinc-600 space-y-2 leading-relaxed list-decimal list-inside">
                        <li>Buka browser, tampilkan halaman <strong>Homepage</strong> (<code class="bg-zinc-100 px-1.5 py-0.5 rounded text-xs font-mono">http://localhost:8000</code>).</li>
                        <li>Scroll perlahan ke bawah untuk menunjukkan keseluruhan tampilan halaman depan (Hero Section, Event Grid, dan Partner Section).</li>
                        <li>Klik salah satu event untuk menunjukkan halaman <strong>Detail Event</strong>.</li>
                        <li>Tekan tombol "Back" di browser, kembali ke Homepage.</li>
                    </ol>
                </div>

                <!-- Narasi -->
                <div class="bg-indigo-50 border border-indigo-100 rounded-xl p-5 space-y-3">
                    <h3 class="text-xs font-bold text-indigo-600 uppercase tracking-wider">🎙️ Narasi (Yang Diucapkan)</h3>
                    <div class="text-sm text-zinc-700 space-y-3 leading-relaxed italic">
                        <p>"Assalamualaikum warahmatullahi wabarakatuh. Perkenalkan, nama saya <strong>[NAMA LENGKAP]</strong>, dengan NIM <strong>24.12.3274</strong>, dari Program Studi Informatika, Universitas Amikom Yogyakarta."</p>
                        <p>"Pada video kali ini, saya akan mendemonstrasikan aplikasi web yang saya buat untuk tugas Ujian Tengah Semester, yaitu <strong>Amikom Event Hub</strong>."</p>
                        <p>"<strong>Amikom Event Hub</strong> adalah sebuah platform manajemen dan pemesanan tiket event berbasis web yang dibangun menggunakan framework <strong>Laravel 12</strong> dengan arsitektur <strong>MVC (Model-View-Controller)</strong> dan database <strong>PostgreSQL</strong>."</p>
                        <p>"Tujuan dari aplikasi ini adalah menyediakan sebuah sistem yang memudahkan penyelenggara event dalam mengelola data event, kategori, dan partner, serta memungkinkan pengunjung untuk melihat dan memesan tiket event secara online dengan tampilan yang modern dan responsif."</p>
                        <p>"Seperti yang bisa dilihat di layar, ini adalah tampilan <strong>Homepage</strong> dari Amikom Event Hub. Di sini terdapat Hero Section, daftar event terdekat yang menampilkan poster, kategori, tanggal, dan harga tiket, serta di bagian bawah ada section Partner dan Sponsor."</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- ============================================================ -->
        <!-- SCENE 2: MODUL KATEGORI (CRUD) -->
        <!-- ============================================================ -->
        <section class="bg-white rounded-2xl border border-zinc-200 shadow-sm overflow-hidden">
            <div class="bg-emerald-600 text-white px-6 py-4 flex items-center justify-between">
                <div class="flex items-center gap-3">
                    <span class="bg-white/20 px-3 py-1 rounded-lg text-xs font-bold">SCENE 2</span>
                    <h2 class="font-bold">CRUD Modul Kategori (Soal 1 — Bobot 25%)</h2>
                </div>
                <span class="timestamp text-xs bg-white/20 px-3 py-1 rounded-lg font-mono">⏱ 00:45 – 01:45</span>
            </div>
            <div class="p-6 space-y-5">

                <div class="space-y-2">
                    <h3 class="text-xs font-bold text-zinc-400 uppercase tracking-wider">📹 Yang Ditampilkan di Layar</h3>
                    <ol class="text-sm text-zinc-600 space-y-2 leading-relaxed list-decimal list-inside">
                        <li>Navigasi ke halaman <strong>Admin Panel</strong> → klik menu <strong>"Kategori"</strong> di sidebar (<code class="bg-zinc-100 px-1.5 py-0.5 rounded text-xs font-mono">/admin/categories</code>).</li>
                        <li>Tunjukkan <strong>tabel daftar kategori</strong> yang sudah ada (Read).</li>
                        <li>Klik tombol <strong>"Tambah Kategori"</strong> → isi form dengan nama kategori baru (contoh: "Workshop") → klik <strong>"Simpan"</strong> (Create).</li>
                        <li>Tunjukkan bahwa kategori baru sudah muncul di tabel.</li>
                        <li>Klik tombol <strong>"Edit"</strong> pada kategori yang baru dibuat → ubah nama (contoh: dari "Workshop" menjadi "Workshop & Seminar") → klik <strong>"Simpan"</strong> (Update).</li>
                        <li>Tunjukkan bahwa nama kategori sudah berubah di tabel.</li>
                        <li>Klik tombol <strong>"Hapus"</strong> pada salah satu kategori → konfirmasi penghapusan (Delete).</li>
                        <li>Tunjukkan bahwa kategori sudah terhapus dari tabel.</li>
                    </ol>
                </div>

                <div class="bg-emerald-50 border border-emerald-100 rounded-xl p-5 space-y-3">
                    <h3 class="text-xs font-bold text-emerald-600 uppercase tracking-wider">🎙️ Narasi (Yang Diucapkan)</h3>
                    <div class="text-sm text-zinc-700 space-y-3 leading-relaxed italic">
                        <p>"Selanjutnya saya akan mendemonstrasikan fitur yang pertama, yaitu <strong>CRUD Modul Kategori</strong> sesuai Soal Nomor 1."</p>
                        <p>"Saya masuk ke halaman admin, dan di sidebar terdapat menu Kategori. Di halaman ini terdapat tabel yang menampilkan daftar semua kategori yang sudah ada di database. Ini merupakan fitur <strong>Read</strong>."</p>
                        <p>"Sekarang saya akan menambahkan kategori baru. Saya klik tombol Tambah Kategori, lalu mengisi nama kategori, misalnya 'Workshop', dan menekan Simpan. Bisa dilihat kategori baru sudah berhasil ditambahkan ke dalam tabel. Ini merupakan fitur <strong>Create</strong>."</p>
                        <p>"Kemudian untuk fitur <strong>Update</strong>, saya klik tombol Edit pada kategori yang barusan dibuat, lalu mengubah namanya menjadi 'Workshop & Seminar', dan tekan Simpan. Data berhasil diperbarui."</p>
                        <p>"Yang terakhir adalah fitur <strong>Delete</strong>. Saya klik tombol Hapus pada salah satu kategori, dan data berhasil terhapus dari tabel."</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- ============================================================ -->
        <!-- SCENE 3: MODUL PARTNER (CRUD) -->
        <!-- ============================================================ -->
        <section class="bg-white rounded-2xl border border-zinc-200 shadow-sm overflow-hidden">
            <div class="bg-violet-600 text-white px-6 py-4 flex items-center justify-between">
                <div class="flex items-center gap-3">
                    <span class="bg-white/20 px-3 py-1 rounded-lg text-xs font-bold">SCENE 3</span>
                    <h2 class="font-bold">CRUD Modul Partner (Soal 2 — Bobot 25%)</h2>
                </div>
                <span class="timestamp text-xs bg-white/20 px-3 py-1 rounded-lg font-mono">⏱ 01:45 – 02:45</span>
            </div>
            <div class="p-6 space-y-5">

                <div class="space-y-2">
                    <h3 class="text-xs font-bold text-zinc-400 uppercase tracking-wider">📹 Yang Ditampilkan di Layar</h3>
                    <ol class="text-sm text-zinc-600 space-y-2 leading-relaxed list-decimal list-inside">
                        <li>Klik menu <strong>"Partner"</strong> di sidebar admin (<code class="bg-zinc-100 px-1.5 py-0.5 rounded text-xs font-mono">/admin/partners</code>).</li>
                        <li>Tunjukkan <strong>tabel daftar partner</strong> yang sudah ada (termasuk preview logo). (Read)</li>
                        <li>Klik tombol <strong>"Tambah Partner"</strong> → isi form:
                            <ul class="ml-5 mt-1 space-y-1 list-disc text-xs">
                                <li>Nama: contoh "Tokopedia"</li>
                                <li>Logo: <strong>upload file gambar</strong> ATAU paste <strong>URL logo</strong> dari internet</li>
                            </ul>
                            → klik <strong>"Simpan"</strong>. (Create)
                        </li>
                        <li>Tunjukkan partner baru sudah muncul di tabel, lengkap dengan preview logo.</li>
                        <li>Klik <strong>"Edit"</strong> pada partner tersebut → ubah nama atau ganti logo → klik <strong>"Simpan"</strong>. (Update)</li>
                        <li>Klik <strong>"Hapus"</strong> pada salah satu partner → konfirmasi. (Delete)</li>
                    </ol>
                </div>

                <div class="bg-violet-50 border border-violet-100 rounded-xl p-5 space-y-3">
                    <h3 class="text-xs font-bold text-violet-600 uppercase tracking-wider">🎙️ Narasi (Yang Diucapkan)</h3>
                    <div class="text-sm text-zinc-700 space-y-3 leading-relaxed italic">
                        <p>"Fitur kedua adalah <strong>CRUD Modul Partner</strong>, sesuai Soal Nomor 2."</p>
                        <p>"Di halaman admin Partner, tabel menampilkan daftar partner beserta preview logo mereka. Kolom yang terdapat di tabel partners adalah <strong>id</strong>, <strong>name</strong>, <strong>logo_url</strong>, <strong>created_at</strong>, dan <strong>updated_at</strong>, sesuai dengan ketentuan soal."</p>
                        <p>"Saya akan menambahkan partner baru. Saya klik Tambah Partner, lalu mengisi nama partner, misalnya 'Tokopedia'. Untuk logo, di sini ada dua opsi, yaitu bisa upload file gambar langsung atau memasukkan URL logo dari internet. Saya akan [upload file / masukkan URL], lalu tekan Simpan."</p>
                        <p>"Partner berhasil ditambahkan. Sekarang saya coba edit datanya dengan mengubah [nama/logo], kemudian simpan. Data sudah berhasil diperbarui."</p>
                        <p>"Dan untuk fitur hapus, saya klik tombol Hapus, data partner berhasil dihapus dari database, dan jika logonya tersimpan secara lokal, file-nya juga otomatis ikut terhapus."</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- ============================================================ -->
        <!-- SCENE 4: FILTER & PENCARIAN -->
        <!-- ============================================================ -->
        <section class="bg-white rounded-2xl border border-zinc-200 shadow-sm overflow-hidden">
            <div class="bg-orange-500 text-white px-6 py-4 flex items-center justify-between">
                <div class="flex items-center gap-3">
                    <span class="bg-white/20 px-3 py-1 rounded-lg text-xs font-bold">SCENE 4</span>
                    <h2 class="font-bold">Filter & Pencarian (Soal 3 — Bobot 25%)</h2>
                </div>
                <span class="timestamp text-xs bg-white/20 px-3 py-1 rounded-lg font-mono">⏱ 02:45 – 03:30</span>
            </div>
            <div class="p-6 space-y-5">

                <div class="space-y-2">
                    <h3 class="text-xs font-bold text-zinc-400 uppercase tracking-wider">📹 Yang Ditampilkan di Layar</h3>
                    <ol class="text-sm text-zinc-600 space-y-2 leading-relaxed list-decimal list-inside">
                        <li>Di halaman <strong>Admin Kategori</strong> (<code class="bg-zinc-100 px-1.5 py-0.5 rounded text-xs font-mono">/admin/categories</code>):
                            <ul class="ml-5 mt-1 space-y-1 list-disc text-xs">
                                <li>Ketik kata kunci pencarian di kolom search (contoh: "musik").</li>
                                <li>Tunjukkan hasil yang terfilter — hanya kategori yang mengandung kata "musik" yang tampil.</li>
                                <li>Hapus teks pencarian → tabel kembali menampilkan semua data.</li>
                            </ul>
                        </li>
                        <li>Pindah ke halaman <strong>Admin Partner</strong> (<code class="bg-zinc-100 px-1.5 py-0.5 rounded text-xs font-mono">/admin/partners</code>):
                            <ul class="ml-5 mt-1 space-y-1 list-disc text-xs">
                                <li>Lakukan pencarian dengan kata kunci (contoh: "gojek" atau "toko").</li>
                                <li>Tunjukkan hasil yang terfilter.</li>
                            </ul>
                        </li>
                    </ol>
                </div>

                <div class="bg-orange-50 border border-orange-100 rounded-xl p-5 space-y-3">
                    <h3 class="text-xs font-bold text-orange-600 uppercase tracking-wider">🎙️ Narasi (Yang Diucapkan)</h3>
                    <div class="text-sm text-zinc-700 space-y-3 leading-relaxed italic">
                        <p>"Fitur ketiga adalah <strong>Filter dan Pencarian</strong>, sesuai Soal Nomor 3."</p>
                        <p>"Pada setiap halaman admin, baik Kategori maupun Partner, terdapat form pencarian di bagian atas tabel. Pencarian ini menggunakan Eloquent query <strong>where('name', 'LIKE', '%...%')</strong> di Controller, yang berfungsi untuk mencari data berdasarkan nama secara parsial."</p>
                        <p>"Saya coba ketik 'musik' di pencarian Kategori, dan bisa dilihat tabel langsung menampilkan hanya kategori yang mengandung kata tersebut. Pencarian ini juga dilengkapi dengan fitur <strong>debounce</strong>, dimana request baru ke server hanya dikirim setelah pengguna berhenti mengetik selama 500 milidetik, sehingga tidak membebani server."</p>
                        <p>"Sekarang saya tunjukkan juga fitur pencarian di halaman Partner. Saya ketik kata kunci, misalnya 'toko', dan hasilnya langsung terfilter sesuai kata pencarian."</p>
                        <p>"Karena database yang digunakan adalah PostgreSQL, maka operator yang digunakan secara otomatis adalah <strong>ILIKE</strong> untuk pencarian case-insensitive."</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- ============================================================ -->
        <!-- SCENE 5: RENDER KE LAYAR PUBLIK -->
        <!-- ============================================================ -->
        <section class="bg-white rounded-2xl border border-zinc-200 shadow-sm overflow-hidden">
            <div class="bg-rose-600 text-white px-6 py-4 flex items-center justify-between">
                <div class="flex items-center gap-3">
                    <span class="bg-white/20 px-3 py-1 rounded-lg text-xs font-bold">SCENE 5</span>
                    <h2 class="font-bold">Render Tampilan ke Layar Publik (Soal 4 — Bobot 25%)</h2>
                </div>
                <span class="timestamp text-xs bg-white/20 px-3 py-1 rounded-lg font-mono">⏱ 03:30 – 04:15</span>
            </div>
            <div class="p-6 space-y-5">

                <div class="space-y-2">
                    <h3 class="text-xs font-bold text-zinc-400 uppercase tracking-wider">📹 Yang Ditampilkan di Layar</h3>
                    <ol class="text-sm text-zinc-600 space-y-2 leading-relaxed list-decimal list-inside">
                        <li>Buka tab baru → navigasi ke <strong>Homepage</strong> (<code class="bg-zinc-100 px-1.5 py-0.5 rounded text-xs font-mono">http://localhost:8000</code>).</li>
                        <li>Scroll ke bawah ke bagian <strong>"Partner & Sponsor Kami"</strong>.</li>
                        <li>Tunjukkan bahwa partner yang tadi sudah ditambahkan/diedit di panel admin <strong>sudah muncul</strong> di halaman homepage publik dengan logo dan nama mereka.</li>
                        <li><strong>(Opsional)</strong> Kembali ke admin, tambahkan 1 partner baru → kembali ke homepage → refresh → tunjukkan partner baru langsung tampil.</li>
                    </ol>
                </div>

                <div class="bg-rose-50 border border-rose-100 rounded-xl p-5 space-y-3">
                    <h3 class="text-xs font-bold text-rose-600 uppercase tracking-wider">🎙️ Narasi (Yang Diucapkan)</h3>
                    <div class="text-sm text-zinc-700 space-y-3 leading-relaxed italic">
                        <p>"Fitur keempat dan terakhir adalah <strong>Render Tampilan ke Layar Publik</strong>, sesuai Soal Nomor 4."</p>
                        <p>"Sekarang saya buka halaman Homepage publik. Jika saya scroll ke bawah, di sini terdapat section <strong>Partner & Sponsor Kami</strong>. Bisa dilihat bahwa data partner yang tadi saya kelola melalui panel admin sudah otomatis tampil di halaman depan yang bisa dilihat oleh pengunjung."</p>
                        <p>"Secara teknis, data ini diambil di <strong>HomeController</strong> menggunakan perintah <strong>Partner::latest()->get()</strong>, kemudian dikirim ke view <strong>welcome.blade.php</strong> menggunakan fungsi <strong>compact()</strong>. Di dalam file Blade, data partner di-loop menggunakan directive <strong>@@foreach</strong> dan di-render sebagai grid kartu dengan logo dan nama masing-masing partner."</p>
                        <p>"Jadi bisa dibuktikan, jika saya menambahkan partner baru dari admin, maka datanya langsung tampil di homepage publik secara real-time."</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- ============================================================ -->
        <!-- SCENE 6: PENUTUP -->
        <!-- ============================================================ -->
        <section class="bg-white rounded-2xl border border-zinc-200 shadow-sm overflow-hidden">
            <div class="bg-zinc-800 text-white px-6 py-4 flex items-center justify-between">
                <div class="flex items-center gap-3">
                    <span class="bg-white/20 px-3 py-1 rounded-lg text-xs font-bold">SCENE 6</span>
                    <h2 class="font-bold">Penutup</h2>
                </div>
                <span class="timestamp text-xs bg-white/20 px-3 py-1 rounded-lg font-mono">⏱ 04:15 – 04:30</span>
            </div>
            <div class="p-6 space-y-5">

                <div class="space-y-2">
                    <h3 class="text-xs font-bold text-zinc-400 uppercase tracking-wider">📹 Yang Ditampilkan di Layar</h3>
                    <ol class="text-sm text-zinc-600 space-y-2 leading-relaxed list-decimal list-inside">
                        <li>Tetap tampilkan halaman Homepage atau Dashboard Admin.</li>
                        <li>Jika sempat, tunjukkan sekilas struktur folder proyek di code editor (opsional).</li>
                    </ol>
                </div>

                <div class="bg-zinc-100 border border-zinc-200 rounded-xl p-5 space-y-3">
                    <h3 class="text-xs font-bold text-zinc-500 uppercase tracking-wider">🎙️ Narasi (Yang Diucapkan)</h3>
                    <div class="text-sm text-zinc-700 space-y-3 leading-relaxed italic">
                        <p>"Demikian demonstrasi keempat fitur utama yang telah saya implementasikan untuk tugas UTS ini, yaitu: CRUD Kategori, CRUD Partner, fitur Filter dan Pencarian, serta Render data Partner ke halaman publik."</p>
                        <p>"Seluruh fitur dibangun menggunakan arsitektur MVC Laravel dengan database PostgreSQL, sesuai dengan ketentuan yang diberikan."</p>
                        <p>"Terima kasih atas perhatiannya. Wassalamualaikum warahmatullahi wabarakatuh."</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- ============================================================ -->
        <!-- RINGKASAN FITUR (CHEAT SHEET) -->
        <!-- ============================================================ -->
        <section class="bg-white rounded-2xl border border-zinc-200 shadow-sm overflow-hidden">
            <div class="px-6 py-4 border-b border-zinc-100">
                <h2 class="font-bold text-zinc-900">📋 Ringkasan Fitur Aplikasi (Cheat Sheet)</h2>
                <p class="text-xs text-zinc-500 mt-1">Gunakan tabel ini sebagai referensi cepat saat rekaman jika lupa poin-poin penting.</p>
            </div>
            <div class="p-6">
                <table class="w-full text-sm text-left">
                    <thead>
                        <tr class="border-b border-zinc-200 text-xs font-bold text-zinc-500 uppercase">
                            <th class="pb-3 pr-4">Aspek</th>
                            <th class="pb-3">Detail</th>
                        </tr>
                    </thead>
                    <tbody class="text-zinc-600 text-sm leading-relaxed">
                        <tr class="border-b border-zinc-100">
                            <td class="py-3 pr-4 font-semibold text-zinc-800 align-top">Nama Aplikasi</td>
                            <td class="py-3">Amikom Event Hub</td>
                        </tr>
                        <tr class="border-b border-zinc-100">
                            <td class="py-3 pr-4 font-semibold text-zinc-800 align-top">Deskripsi</td>
                            <td class="py-3">Platform manajemen dan pemesanan tiket event berbasis web</td>
                        </tr>
                        <tr class="border-b border-zinc-100">
                            <td class="py-3 pr-4 font-semibold text-zinc-800 align-top">Tujuan</td>
                            <td class="py-3">Memudahkan penyelenggara dalam mengelola event, kategori, dan partner, serta memungkinkan pengunjung melihat dan memesan tiket event secara online</td>
                        </tr>
                        <tr class="border-b border-zinc-100">
                            <td class="py-3 pr-4 font-semibold text-zinc-800 align-top">Tech Stack</td>
                            <td class="py-3">
                                <div class="flex flex-wrap gap-1.5">
                                    <span class="px-2 py-0.5 bg-red-100 text-red-700 rounded text-xs font-medium">Laravel 12</span>
                                    <span class="px-2 py-0.5 bg-blue-100 text-blue-700 rounded text-xs font-medium">PostgreSQL</span>
                                    <span class="px-2 py-0.5 bg-cyan-100 text-cyan-700 rounded text-xs font-medium">Tailwind CSS</span>
                                    <span class="px-2 py-0.5 bg-green-100 text-green-700 rounded text-xs font-medium">Blade Engine</span>
                                    <span class="px-2 py-0.5 bg-purple-100 text-purple-700 rounded text-xs font-medium">Eloquent ORM</span>
                                </div>
                            </td>
                        </tr>
                        <tr class="border-b border-zinc-100">
                            <td class="py-3 pr-4 font-semibold text-zinc-800 align-top">Arsitektur</td>
                            <td class="py-3">MVC (Model-View-Controller)</td>
                        </tr>
                        <tr class="border-b border-zinc-100">
                            <td class="py-3 pr-4 font-semibold text-zinc-800 align-top">Fitur UTS</td>
                            <td class="py-3">
                                <ol class="list-decimal list-inside space-y-1">
                                    <li><strong>CRUD Kategori</strong> — Create, Read, Update, Delete data kategori event</li>
                                    <li><strong>CRUD Partner</strong> — Kelola data partner/sponsor (nama + logo, support upload & URL)</li>
                                    <li><strong>Filter & Pencarian</strong> — Search di halaman admin Kategori & Partner (ILIKE/LIKE)</li>
                                    <li><strong>Render Publik</strong> — Data partner dari admin tampil di Homepage via <code class="bg-zinc-100 px-1 rounded text-xs">@@foreach</code></li>
                                </ol>
                            </td>
                        </tr>
                        <tr class="border-b border-zinc-100">
                            <td class="py-3 pr-4 font-semibold text-zinc-800 align-top">Fitur Tambahan</td>
                            <td class="py-3">
                                <ul class="list-disc list-inside space-y-1">
                                    <li>CRUD Event (dengan upload poster)</li>
                                    <li>Halaman Detail Event & Checkout</li>
                                    <li>Dashboard Admin dengan statistik (total revenue, tiket terjual, event aktif)</li>
                                    <li>Laporan Transaksi</li>
                                    <li>Debounce search 500ms (optimasi performa)</li>
                                    <li>Responsive design (mobile-friendly)</li>
                                </ul>
                            </td>
                        </tr>
                        <tr>
                            <td class="py-3 pr-4 font-semibold text-zinc-800 align-top">URL Penting</td>
                            <td class="py-3">
                                <div class="space-y-1 font-mono text-xs">
                                    <div><span class="text-zinc-400 w-28 inline-block">Homepage:</span> <code class="bg-zinc-100 px-1.5 py-0.5 rounded">/</code></div>
                                    <div><span class="text-zinc-400 w-28 inline-block">Dashboard:</span> <code class="bg-zinc-100 px-1.5 py-0.5 rounded">/admin</code></div>
                                    <div><span class="text-zinc-400 w-28 inline-block">Kategori:</span> <code class="bg-zinc-100 px-1.5 py-0.5 rounded">/admin/categories</code></div>
                                    <div><span class="text-zinc-400 w-28 inline-block">Partner:</span> <code class="bg-zinc-100 px-1.5 py-0.5 rounded">/admin/partners</code></div>
                                    <div><span class="text-zinc-400 w-28 inline-block">Events:</span> <code class="bg-zinc-100 px-1.5 py-0.5 rounded">/admin/events</code></div>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </section>

        <!-- ============================================================ -->
        <!-- TIMELINE VISUAL -->
        <!-- ============================================================ -->
        <section class="bg-white rounded-2xl border border-zinc-200 shadow-sm overflow-hidden">
            <div class="px-6 py-4 border-b border-zinc-100">
                <h2 class="font-bold text-zinc-900">⏱️ Timeline Visual</h2>
                <p class="text-xs text-zinc-500 mt-1">Estimasi pembagian waktu tiap scene (total ±4 menit 30 detik).</p>
            </div>
            <div class="p-6 space-y-3">
                <!-- Scene 1 -->
                <div class="flex items-center gap-3">
                    <span class="text-xs font-mono text-zinc-400 w-24 shrink-0">00:00–00:45</span>
                    <div class="flex-1 bg-indigo-500 rounded-full h-6 flex items-center px-3 relative" style="width: 17%">
                        <span class="text-white text-[10px] font-bold whitespace-nowrap">Pembukaan</span>
                    </div>
                    <span class="text-xs text-zinc-400">45 dtk</span>
                </div>
                <!-- Scene 2 -->
                <div class="flex items-center gap-3">
                    <span class="text-xs font-mono text-zinc-400 w-24 shrink-0">00:45–01:45</span>
                    <div class="flex-1 bg-emerald-500 rounded-full h-6 flex items-center px-3" style="width: 22%">
                        <span class="text-white text-[10px] font-bold whitespace-nowrap">CRUD Kategori</span>
                    </div>
                    <span class="text-xs text-zinc-400">60 dtk</span>
                </div>
                <!-- Scene 3 -->
                <div class="flex items-center gap-3">
                    <span class="text-xs font-mono text-zinc-400 w-24 shrink-0">01:45–02:45</span>
                    <div class="flex-1 bg-violet-500 rounded-full h-6 flex items-center px-3" style="width: 22%">
                        <span class="text-white text-[10px] font-bold whitespace-nowrap">CRUD Partner</span>
                    </div>
                    <span class="text-xs text-zinc-400">60 dtk</span>
                </div>
                <!-- Scene 4 -->
                <div class="flex items-center gap-3">
                    <span class="text-xs font-mono text-zinc-400 w-24 shrink-0">02:45–03:30</span>
                    <div class="flex-1 bg-orange-500 rounded-full h-6 flex items-center px-3" style="width: 17%">
                        <span class="text-white text-[10px] font-bold whitespace-nowrap">Pencarian</span>
                    </div>
                    <span class="text-xs text-zinc-400">45 dtk</span>
                </div>
                <!-- Scene 5 -->
                <div class="flex items-center gap-3">
                    <span class="text-xs font-mono text-zinc-400 w-24 shrink-0">03:30–04:15</span>
                    <div class="flex-1 bg-rose-500 rounded-full h-6 flex items-center px-3" style="width: 17%">
                        <span class="text-white text-[10px] font-bold whitespace-nowrap">Render Publik</span>
                    </div>
                    <span class="text-xs text-zinc-400">45 dtk</span>
                </div>
                <!-- Scene 6 -->
                <div class="flex items-center gap-3">
                    <span class="text-xs font-mono text-zinc-400 w-24 shrink-0">04:15–04:30</span>
                    <div class="flex-1 bg-zinc-700 rounded-full h-6 flex items-center px-3" style="width: 5%">
                        <span class="text-white text-[10px] font-bold whitespace-nowrap">Penutup</span>
                    </div>
                    <span class="text-xs text-zinc-400">15 dtk</span>
                </div>
            </div>
        </section>

    </main>

    <footer class="bg-white border-t border-zinc-200 py-6 text-center text-xs text-zinc-400 mt-10">
        &copy; 2026 Universitas Amikom Yogyakarta &middot; NIM: 24.12.3274 &middot; Script Video UTS — Amikom Event Hub
    </footer>

</body>
</html>
