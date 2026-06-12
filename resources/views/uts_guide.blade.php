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
                <p class="text-xs text-zinc-500">Amikom Event Hub • NIM 24.12.3274 • Durasi Target: Maksimal 3 Menit</p>
            </div>
            <div class="flex items-center gap-2">
                <span class="px-3 py-1 bg-green-100 text-green-700 text-xs font-bold rounded-full">⏱ Maks 3 Menit</span>
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
                Tips Rekaman Cepat (Maksimal 3 Menit)
            </h2>
            <ul class="text-xs text-amber-700 space-y-1.5 leading-relaxed">
                <li>✅ Pastikan database sudah terisi data awal (seeding) agar langsung siap didemokan.</li>
                <li>✅ Demonstrasikan CRUD dengan cepat: input langsung dan simpan tanpa banyak jeda.</li>
                <li>✅ Gunakan shortcut browser atau siapkan tab-tab terpisah (Homepage, Admin Kategori, Admin Partner) agar tidak membuang waktu loading.</li>
                <li>✅ Bicaralah secara padat, fokus pada fungsi/kode yang diminta pada soal UTS.</li>
            </ul>
        </div>

        <!-- ============================================================ -->
        <!-- SCENE 1: PEMBUKAAN & INTRO -->
        <!-- ============================================================ -->
        <section class="bg-white rounded-2xl border border-zinc-200 shadow-sm overflow-hidden">
            <div class="bg-indigo-600 text-white px-6 py-4 flex items-center justify-between">
                <div class="flex items-center gap-3">
                    <span class="bg-white/20 px-3 py-1 rounded-lg text-xs font-bold">SCENE 1</span>
                    <h2 class="font-bold">Pembukaan & Intro Aplikasi</h2>
                </div>
                <span class="timestamp text-xs bg-white/20 px-3 py-1 rounded-lg font-mono">⏱ 00:00 – 00:30</span>
            </div>
            <div class="p-6 space-y-5">
                <div class="space-y-2">
                    <h3 class="text-xs font-bold text-zinc-400 uppercase tracking-wider">📹 Yang Ditampilkan di Layar</h3>
                    <ol class="text-sm text-zinc-600 space-y-2 leading-relaxed list-decimal list-inside">
                        <li>Buka halaman depan <strong>Homepage</strong> (<code class="bg-zinc-100 px-1.5 py-0.5 rounded text-xs font-mono">/</code>).</li>
                        <li>Tunjukkan Hero Section dan perkenalkan nama, NIM, serta nama aplikasi.</li>
                    </ol>
                </div>
                <div class="bg-indigo-50 border border-indigo-100 rounded-xl p-5 space-y-3">
                    <h3 class="text-xs font-bold text-indigo-600 uppercase tracking-wider">🎙️ Narasi (Yang Diucapkan)</h3>
                    <div class="text-sm text-zinc-700 space-y-3 leading-relaxed italic">
                        <p>"Assalamualaikum wr. wb. Perkenalkan saya <strong>Yudistira Azfa Dani Wibowo</strong>, NIM <strong>24.12.3274</strong> dari prodi Bisnis Digital."</p>
                        <p>"Berikut adalah demonstrasi aplikasi web **Amikom Event Hub** yang dibangun dengan Laravel 12 dan PostgreSQL. Halaman ini adalah Homepage publik tempat pengguna menjelajahi event dan melihat daftar partner."</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- ============================================================ -->
        <!-- SCENE 2: CRUD KATEGORI -->
        <!-- ============================================================ -->
        <section class="bg-white rounded-2xl border border-zinc-200 shadow-sm overflow-hidden">
            <div class="bg-emerald-600 text-white px-6 py-4 flex items-center justify-between">
                <div class="flex items-center gap-3">
                    <span class="bg-white/20 px-3 py-1 rounded-lg text-xs font-bold">SCENE 2</span>
                    <h2 class="font-bold">CRUD Kategori (Soal 1 — 25%)</h2>
                </div>
                <span class="timestamp text-xs bg-white/20 px-3 py-1 rounded-lg font-mono">⏱ 00:30 – 01:10</span>
            </div>
            <div class="p-6 space-y-5">
                <div class="space-y-2">
                    <h3 class="text-xs font-bold text-zinc-400 uppercase tracking-wider">📹 Yang Ditampilkan di Layar</h3>
                    <ol class="text-sm text-zinc-600 space-y-2 leading-relaxed list-decimal list-inside">
                        <li>Pindah ke tab <strong>Admin Kategori</strong> (<code class="bg-zinc-100 px-1.5 py-0.5 rounded text-xs font-mono">/admin/categories</code>).</li>
                        <li>Tambah kategori baru (contoh: "Seminar") → simpan.</li>
                        <li>Edit kategori tersebut menjadi "Seminar & Web" → simpan.</li>
                        <li>Hapus kategori dummy lain yang tidak terpakai.</li>
                    </ol>
                </div>
                <div class="bg-emerald-50 border border-emerald-100 rounded-xl p-5 space-y-3">
                    <h3 class="text-xs font-bold text-emerald-600 uppercase tracking-wider">🎙️ Narasi (Yang Diucapkan)</h3>
                    <div class="text-sm text-zinc-700 space-y-3 leading-relaxed italic">
                        <p>"Sekarang kita masuk ke Dashboard Admin pada menu Kategori. Di sini tampil tabel daftar kategori (Read)."</p>
                        <p>"Saya klik Tambah, masukkan 'Seminar'. Slug ter-generate otomatis secara real-time. Klik Simpan (Create). Datanya muncul."</p>
                        <p>"Saya klik Edit, ganti nama kategori menjadi 'Seminar & Web', lalu klik Simpan (Update). Perubahan tersimpan."</p>
                        <p>"Terakhir, saya klik tombol Hapus untuk menghapus kategori yang dipilih (Delete). Fitur CRUD Kategori berjalan sukses."</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- ============================================================ -->
        <!-- SCENE 3: CRUD PARTNER -->
        <!-- ============================================================ -->
        <section class="bg-white rounded-2xl border border-zinc-200 shadow-sm overflow-hidden">
            <div class="bg-violet-600 text-white px-6 py-4 flex items-center justify-between">
                <div class="flex items-center gap-3">
                    <span class="bg-white/20 px-3 py-1 rounded-lg text-xs font-bold">SCENE 3</span>
                    <h2 class="font-bold">CRUD Partner (Soal 2 — 25%)</h2>
                </div>
                <span class="timestamp text-xs bg-white/20 px-3 py-1 rounded-lg font-mono">⏱ 01:10 – 01:50</span>
            </div>
            <div class="p-6 space-y-5">
                <div class="space-y-2">
                    <h3 class="text-xs font-bold text-zinc-400 uppercase tracking-wider">📹 Yang Ditampilkan di Layar</h3>
                    <ol class="text-sm text-zinc-600 space-y-2 leading-relaxed list-decimal list-inside">
                        <li>Pindah ke tab <strong>Admin Partner</strong> (<code class="bg-zinc-100 px-1.5 py-0.5 rounded text-xs font-mono">/admin/partners</code>).</li>
                        <li>Tambah partner baru → masukkan Nama, upload file gambar logo/paste URL logo → simpan.</li>
                        <li>Edit partner tersebut → simpan.</li>
                        <li>Hapus salah satu partner dummy.</li>
                    </ol>
                </div>
                <div class="bg-violet-50 border border-violet-100 rounded-xl p-5 space-y-3">
                    <h3 class="text-xs font-bold text-violet-600 uppercase tracking-wider">🎙️ Narasi (Yang Diucapkan)</h3>
                    <div class="text-sm text-zinc-700 space-y-3 leading-relaxed italic">
                        <p>"Selanjutnya adalah modul Kelola Partner. Pada tabel ini, kita melihat data partner beserta preview logonya (Read)."</p>
                        <p>"Saya klik Tambah, beri nama 'Gojek' dan upload logonya (atau gunakan image URL), lalu klik Simpan (Create)."</p>
                        <p>"Untuk update, saya klik Edit, ubah nama atau logonya, lalu simpan (Update)."</p>
                        <p>"Untuk delete, klik Hapus. Partner terhapus dari database, dan jika logo di-upload lokal, filenya juga otomatis dihapus dari storage."</p>
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
                    <h2 class="font-bold">Filter & Pencarian (Soal 3 — 25%)</h2>
                </div>
                <span class="timestamp text-xs bg-white/20 px-3 py-1 rounded-lg font-mono">⏱ 01:50 – 02:20</span>
            </div>
            <div class="p-6 space-y-5">
                <div class="space-y-2">
                    <h3 class="text-xs font-bold text-zinc-400 uppercase tracking-wider">📹 Yang Ditampilkan di Layar</h3>
                    <ol class="text-sm text-zinc-600 space-y-2 leading-relaxed list-decimal list-inside">
                        <li>Di halaman Kategori, ketik kata kunci pencarian (misal: "Web"). Tunjukkan tabel ter-filter.</li>
                        <li>Di halaman Partner, ketik kata kunci pencarian (misal: "Gojek"). Tunjukkan tabel ter-filter.</li>
                    </ol>
                </div>
                <div class="bg-orange-50 border border-orange-100 rounded-xl p-5 space-y-3">
                    <h3 class="text-xs font-bold text-orange-600 uppercase tracking-wider">🎙️ Narasi (Yang Diucapkan)</h3>
                    <div class="text-sm text-zinc-700 space-y-3 leading-relaxed italic">
                        <p>"Masuk ke fitur pencarian. Baik di halaman Kategori maupun Partner, terdapat form input pencarian di atas tabel."</p>
                        <p>"Kueri ini didukung oleh sintaks Eloquent <code class="bg-orange-100 px-1 rounded text-xs text-orange-800">where('name', 'LIKE/ILIKE', '%keyword%')</code> pada Controller."</p>
                        <p>"Ketika saya mengetik kata kunci pencarian, tabel akan ter-filter secara otomatis. Terdapat juga Debounce 500ms agar server tidak kebanjiran request saat mengetik."</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- ============================================================ -->
        <!-- SCENE 5: RENDER TAMPILAN PUBLIK & PENUTUP -->
        <!-- ============================================================ -->
        <section class="bg-white rounded-2xl border border-zinc-200 shadow-sm overflow-hidden">
            <div class="bg-rose-600 text-white px-6 py-4 flex items-center justify-between">
                <div class="flex items-center gap-3">
                    <span class="bg-white/20 px-3 py-1 rounded-lg text-xs font-bold">SCENE 5</span>
                    <h2 class="font-bold">Render Layar Publik & Penutup (Soal 4 — 25%)</h2>
                </div>
                <span class="timestamp text-xs bg-white/20 px-3 py-1 rounded-lg font-mono">⏱ 02:20 – 02:45</span>
            </div>
            <div class="p-6 space-y-5">
                <div class="space-y-2">
                    <h3 class="text-xs font-bold text-zinc-400 uppercase tracking-wider">📹 Yang Ditampilkan di Layar</h3>
                    <ol class="text-sm text-zinc-600 space-y-2 leading-relaxed list-decimal list-inside">
                        <li>Buka tab **Homepage publik** → scroll ke bagian paling bawah (Sponsor/Partner).</li>
                        <li>Tunjukkan logo partner yang baru saja ditambahkan dari panel admin sudah muncul secara otomatis.</li>
                        <li>Tutup video dengan salam penutup.</li>
                    </ol>
                </div>
                <div class="bg-rose-50 border border-rose-100 rounded-xl p-5 space-y-3">
                    <h3 class="text-xs font-bold text-rose-600 uppercase tracking-wider">🎙️ Narasi (Yang Diucapkan)</h3>
                    <div class="text-sm text-zinc-700 space-y-3 leading-relaxed italic">
                        <p>"Terakhir, kita beralih ke halaman depan utama. Di bagian bawah terdapat section Partner & Sponsor."</p>
                        <p>"Data partner yang telah kita input dari panel admin tadi langsung tampil dinamis di sini menggunakan directive <code class="bg-rose-100 px-1 rounded text-xs text-rose-800">@@foreach</code> di file Blade, yang di-passing dari HomeController."</p>
                        <p>"Demikian demonstrasi seluruh poin tugas UTS saya. Seluruh fitur dari CRUD Kategori, CRUD Partner, Pencarian, hingga Render Publik telah berjalan dengan baik. Terima kasih, wassalamualaikum wr. wb."</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- ============================================================ -->
        <!-- TIMELINE VISUAL (3 MENIT) -->
        <!-- ============================================================ -->
        <section class="bg-white rounded-2xl border border-zinc-200 shadow-sm overflow-hidden">
            <div class="px-6 py-4 border-b border-zinc-100">
                <h2 class="font-bold text-zinc-900">⏱️ Timeline Visual (Target Durasi Maks 3 Menit)</h2>
                <p class="text-xs text-zinc-500 mt-1">Estimasi pembagian waktu tiap scene untuk menjaga video tetap ringkas (total 2 menit 45 detik).</p>
            </div>
            <div class="p-6 space-y-3">
                <!-- Scene 1 -->
                <div class="flex items-center gap-3">
                    <span class="text-xs font-mono text-zinc-400 w-24 shrink-0">00:00–00:30</span>
                    <div class="flex-1 bg-indigo-500 rounded-full h-6 flex items-center px-3" style="width: 18%">
                        <span class="text-white text-[10px] font-bold whitespace-nowrap">Intro (30s)</span>
                    </div>
                </div>
                <!-- Scene 2 -->
                <div class="flex items-center gap-3">
                    <span class="text-xs font-mono text-zinc-400 w-24 shrink-0">00:30–01:10</span>
                    <div class="flex-1 bg-emerald-500 rounded-full h-6 flex items-center px-3" style="width: 24%">
                        <span class="text-white text-[10px] font-bold whitespace-nowrap">CRUD Kategori (40s)</span>
                    </div>
                </div>
                <!-- Scene 3 -->
                <div class="flex items-center gap-3">
                    <span class="text-xs font-mono text-zinc-400 w-24 shrink-0">01:10–01:50</span>
                    <div class="flex-1 bg-violet-500 rounded-full h-6 flex items-center px-3" style="width: 24%">
                        <span class="text-white text-[10px] font-bold whitespace-nowrap">CRUD Partner (40s)</span>
                    </div>
                </div>
                <!-- Scene 4 -->
                <div class="flex items-center gap-3">
                    <span class="text-xs font-mono text-zinc-400 w-24 shrink-0">01:50–02:20</span>
                    <div class="flex-1 bg-orange-500 rounded-full h-6 flex items-center px-3" style="width: 18%">
                        <span class="text-white text-[10px] font-bold whitespace-nowrap">Pencarian (30s)</span>
                    </div>
                </div>
                <!-- Scene 5 -->
                <div class="flex items-center gap-3">
                    <span class="text-xs font-mono text-zinc-400 w-24 shrink-0">02:20–02:45</span>
                    <div class="flex-1 bg-rose-500 rounded-full h-6 flex items-center px-3" style="width: 16%">
                        <span class="text-white text-[10px] font-bold whitespace-nowrap">Render & Closing (25s)</span>
                    </div>
                </div>
            </div>
        </section>

    </main>

    <footer class="bg-white border-t border-zinc-200 py-6 text-center text-xs text-zinc-400 mt-10">
        &copy; 2026 Universitas Amikom Yogyakarta &middot; NIM: 24.12.3274 &middot; Script Video UTS — Amikom Event Hub
    </footer>

</body>
</html>
