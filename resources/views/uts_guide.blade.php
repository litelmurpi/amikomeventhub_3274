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

        <!-- ============================================================ -->
        <!-- SIMULASI DEBOUNCE VS NON-DEBOUNCE -->
        <!-- ============================================================ -->
        <section class="bg-white rounded-2xl border border-zinc-200 shadow-sm overflow-hidden mt-10">
            <div class="bg-gradient-to-r from-amber-500 to-orange-600 text-white px-6 py-4 flex items-center justify-between">
                <div class="flex items-center gap-3">
                    <span class="bg-white/20 px-3 py-1 rounded-lg text-xs font-bold uppercase tracking-wider">🛠️ Playground</span>
                    <h2 class="font-bold">Simulasi Interaktif: Debounce vs Tanpa Debounce</h2>
                </div>
                <button onclick="resetSimulation()" class="bg-white/25 hover:bg-white/40 text-white text-xs px-3.5 py-1.5 rounded-lg transition-all font-semibold flex items-center gap-1.5 shadow-sm">
                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 1121.21 7.89H18v3"></path>
                    </svg>
                    Reset Simulasi
                </button>
            </div>
            
            <div class="p-6 space-y-6">
                <div class="bg-zinc-50 border border-zinc-200 rounded-xl p-4 text-sm text-zinc-600 leading-relaxed flex items-start gap-3">
                    <span class="text-xl mt-0.5">💡</span>
                    <div>
                        <strong class="text-zinc-800 font-bold block">Bagaimana Cara Kerja Debounce?</strong>
                        <p class="mt-1 text-xs text-zinc-500">
                            Tanpa debounce, setiap karakter yang diketik langsung mengirim request ke server/database. Jika pengguna mengetik kata sepanjang 10 karakter, server akan menerima 10 kali request. Dengan debounce (misal 500ms), server hanya menerima 1 request setelah pengguna selesai mengetik/berhenti selama 500ms. Ini menghemat beban resource server dan database secara drastis!
                        </p>
                    </div>
                </div>

                <!-- Simulation Inputs -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Column: Tanpa Debounce -->
                    <div class="border border-red-100 bg-red-50/20 rounded-xl p-5 space-y-4">
                        <div class="flex justify-between items-center">
                            <span class="bg-red-100 text-red-700 text-[10px] font-bold px-2.5 py-1 rounded-full uppercase tracking-wider">Tanpa Debounce</span>
                            <div class="flex items-center gap-1.5">
                                <span id="status-dot-no-debounce" class="w-2 h-2 rounded-full bg-zinc-400"></span>
                                <span id="badge-no-debounce" class="text-xs font-mono text-zinc-500">Idle</span>
                            </div>
                        </div>
                        
                        <div class="space-y-1.5">
                            <label for="input-no-debounce" class="text-xs font-bold text-zinc-700 block">Ketik di Sini (Instant Search):</label>
                            <input type="text" id="input-no-debounce" oninput="handleNoDebounceInput(this.value)" placeholder="Cari partner (misal: Gojek)..." class="w-full px-3 py-2 border border-zinc-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500 bg-white transition-all text-sm">
                        </div>

                        <!-- Stats counters -->
                        <div class="grid grid-cols-2 gap-3 text-center">
                            <div class="bg-white p-3 rounded-lg border border-zinc-150 shadow-sm">
                                <div class="text-[10px] uppercase font-bold text-zinc-400 tracking-wider">Karakter Diketik</div>
                                <div id="count-no-debounce-keys" class="text-xl font-extrabold text-zinc-800 mt-0.5">0</div>
                            </div>
                            <div class="bg-white p-3 rounded-lg border border-zinc-150 shadow-sm">
                                <div class="text-[10px] uppercase font-bold text-zinc-400 tracking-wider">Request Database</div>
                                <div id="count-no-debounce-queries" class="text-xl font-extrabold text-red-600 mt-0.5">0</div>
                            </div>
                        </div>

                        <!-- SQL query preview -->
                        <div class="bg-zinc-900 rounded-lg p-3.5 text-[11px] font-mono text-zinc-300 overflow-x-auto space-y-1 shadow-inner border border-zinc-800">
                            <span class="text-zinc-500 block text-[10px] border-b border-zinc-800 pb-1 mb-1">// Laravel Eloquent Query</span>
                            <span class="text-indigo-400">Partner::</span><span class="text-amber-300">where</span>(<span class="text-emerald-300">'name'</span>, <span class="text-emerald-300">'LIKE'</span>, <span class="text-emerald-300">'%<span id="query-val-no-debounce" class="text-white underline font-semibold"></span>%'</span>)-><span class="text-amber-300">get</span>();
                        </div>
                    </div>

                    <!-- Column: Dengan Debounce -->
                    <div class="border border-emerald-100 bg-emerald-50/20 rounded-xl p-5 space-y-4">
                        <div class="flex justify-between items-center">
                            <span class="bg-emerald-100 text-emerald-700 text-[10px] font-bold px-2.5 py-1 rounded-full uppercase tracking-wider">Dengan Debounce (500ms)</span>
                            <div class="flex items-center gap-1.5">
                                <span id="status-dot-debounce" class="w-2 h-2 rounded-full bg-zinc-400"></span>
                                <span id="badge-debounce" class="text-xs font-mono text-zinc-500">Idle</span>
                            </div>
                        </div>
                        
                        <div class="space-y-1.5">
                            <label for="input-debounce" class="text-xs font-bold text-zinc-700 block">Ketik di Sini (Delayed Search):</label>
                            <input type="text" id="input-debounce" oninput="handleDebounceInput(this.value)" placeholder="Cari partner (misal: Gojek)..." class="w-full px-3 py-2 border border-zinc-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-emerald-500 bg-white transition-all text-sm">
                        </div>

                        <!-- Timer progress bar -->
                        <div class="space-y-1">
                            <div class="flex justify-between text-[11px] text-zinc-500 font-mono">
                                <span>Debounce Timer:</span>
                                <span id="timer-text" class="font-bold">0ms / 500ms</span>
                            </div>
                            <div class="w-full bg-zinc-200/60 rounded-full h-2 overflow-hidden border border-zinc-300/30">
                                <div id="timer-progress" class="bg-emerald-500 h-full w-0 transition-all duration-75"></div>
                            </div>
                        </div>

                        <!-- Stats counters -->
                        <div class="grid grid-cols-2 gap-3 text-center">
                            <div class="bg-white p-3 rounded-lg border border-zinc-150 shadow-sm">
                                <div class="text-[10px] uppercase font-bold text-zinc-400 tracking-wider">Karakter Diketik</div>
                                <div id="count-debounce-keys" class="text-xl font-extrabold text-zinc-800 mt-0.5">0</div>
                            </div>
                            <div class="bg-white p-3 rounded-lg border border-zinc-150 shadow-sm">
                                <div class="text-[10px] uppercase font-bold text-zinc-400 tracking-wider">Request Database</div>
                                <div id="count-debounce-queries" class="text-xl font-extrabold text-emerald-600 mt-0.5">0</div>
                            </div>
                        </div>

                        <!-- SQL query preview -->
                        <div class="bg-zinc-900 rounded-lg p-3.5 text-[11px] font-mono text-zinc-300 overflow-x-auto space-y-1 shadow-inner border border-zinc-800">
                            <span class="text-zinc-500 block text-[10px] border-b border-zinc-800 pb-1 mb-1">// Laravel Eloquent Query</span>
                            <span class="text-indigo-400">Partner::</span><span class="text-amber-300">where</span>(<span class="text-emerald-300">'name'</span>, <span class="text-emerald-300">'LIKE'</span>, <span class="text-emerald-300">'%<span id="query-val-debounce" class="text-white underline font-semibold"></span>%'</span>)-><span class="text-amber-300">get</span>();
                        </div>
                    </div>
                </div>

                <!-- Server Performance Stats -->
                <div class="bg-slate-900 text-slate-100 rounded-xl p-5 border border-slate-800 shadow-md">
                    <h4 class="text-xs font-bold text-zinc-450 uppercase tracking-wider mb-4 flex items-center gap-1.5">
                        <svg class="w-4 h-4 text-amber-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                        </svg>
                        Efisiensi & Analisis Beban Server
                    </h4>
                    <div class="grid grid-cols-1 sm:grid-cols-3 gap-6">
                        <div class="border-l-2 border-amber-500 pl-4 space-y-1">
                            <div class="text-[11px] text-zinc-400 uppercase font-semibold">Total Query Terhemat</div>
                            <div id="saved-queries" class="text-2xl font-extrabold text-amber-400 font-mono">0 Query</div>
                            <div class="text-[10px] text-zinc-500">Jumlah load query yang dibatalkan</div>
                        </div>
                        <div class="border-l-2 border-emerald-500 pl-4 space-y-1">
                            <div class="text-[11px] text-zinc-400 uppercase font-semibold">Beban Server Berkurang</div>
                            <div id="saving-percent" class="text-2xl font-extrabold text-emerald-400 font-mono">0%</div>
                            <div class="text-[10px] text-zinc-500">Efisiensi optimasi server</div>
                        </div>
                        <div class="border-l-2 border-blue-500 pl-4 space-y-1">
                            <div class="text-[11px] text-zinc-400 uppercase font-semibold">Status Beban Server</div>
                            <div class="mt-1">
                                <span id="server-load-status" class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-bold bg-slate-800 text-emerald-400 border border-slate-700">
                                    <span class="w-2.5 h-2.5 rounded-full bg-emerald-400 animate-pulse"></span> Aman (Ringan)
                                </span>
                            </div>
                            <div class="text-[10px] text-zinc-500">Kondisi simulated database</div>
                        </div>
                    </div>
                </div>

                <!-- Simulation Live Filter Results -->
                <div class="bg-zinc-50 rounded-xl border border-zinc-200 p-5 space-y-3">
                    <div class="flex justify-between items-center">
                        <h4 class="text-xs font-bold text-zinc-700 uppercase tracking-wider">🔎 Live View: Hasil Filter Pencarian</h4>
                        <span class="text-[10px] text-zinc-400 font-medium">Tampil dinamis sesuai query database yang sukses dijalankan</span>
                    </div>
                    <div id="search-results-container" class="grid grid-cols-2 sm:grid-cols-3 gap-3">
                        <!-- Populated by JS -->
                    </div>
                </div>

                <!-- Real-time Console Log Terminal -->
                <div class="space-y-2">
                    <div class="flex justify-between items-center">
                        <h4 class="text-xs font-bold text-zinc-500 uppercase tracking-wider flex items-center gap-1.5">
                            <span class="flex h-2 w-2 relative">
                              <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-red-400 opacity-75"></span>
                              <span class="relative inline-flex rounded-full h-2 w-2 bg-red-500"></span>
                            </span>
                            Log Terminal Server & Database (Real-time)
                        </h4>
                        <button onclick="clearLogs()" class="text-[11px] text-zinc-450 hover:text-zinc-650 transition-colors flex items-center gap-1 hover:underline">
                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                            </svg>
                            Clear Logs
                        </button>
                    </div>
                    <div id="console-logs" class="bg-zinc-950 text-zinc-350 font-mono text-xs rounded-xl p-4 h-56 overflow-y-auto space-y-1.5 border border-zinc-900 shadow-inner">
                        <div class="text-zinc-500">[System] Terminal dijalankan. Ketik sesuatu di form input untuk memicu event...</div>
                    </div>
                </div>

            </div>
        </section>

    </main>

    <footer class="bg-white border-t border-zinc-200 py-6 text-center text-xs text-zinc-400 mt-10">
        &copy; 2026 Universitas Amikom Yogyakarta &middot; NIM: 24.12.3274 &middot; Script Video UTS — Amikom Event Hub
    </footer>

    <!-- Interactive Debounce Simulation Script -->
    <script>
        let noDebounceKeys = 0;
        let noDebounceQueries = 0;
        let debounceKeys = 0;
        let debounceQueries = 0;

        let debounceTimeout = null;
        let progressInterval = null;
        let elapsed = 0;
        const duration = 500; // debounce time in ms

        const mockPartners = [
            { id: 1, name: "Gojek", category: "Sponsor Utama", logo: "🚗" },
            { id: 2, name: "Grab", category: "Sponsor Utama", logo: "🏍️" },
            { id: 3, name: "Google Amikom", category: "Partner Pendidikan", logo: "🎓" },
            { id: 4, name: "GitHub Student", category: "Sponsor Gold", logo: "🐙" },
            { id: 5, name: "Kopi Kenangan", category: "F&B Partner", logo: "☕" },
            { id: 6, name: "Dicoding Indonesia", category: "Media Partner", logo: "💻" }
        ];

        function renderResults(keyword = "") {
            const container = document.getElementById("search-results-container");
            if (!container) return;

            const filtered = mockPartners.filter(p => 
                p.name.toLowerCase().includes(keyword.toLowerCase())
            );

            container.innerHTML = "";
            if (filtered.length === 0) {
                container.innerHTML = `
                    <div class="col-span-full text-center py-6 text-xs text-zinc-400 bg-zinc-100/50 border border-dashed border-zinc-200 rounded-lg">
                        ⚠️ Tidak ada partner dengan nama "${keyword}" ditemukan
                    </div>
                `;
                return;
            }

            filtered.forEach(p => {
                const itemHtml = `
                    <div class="bg-white border border-zinc-200 rounded-xl p-3 flex items-center gap-3 hover:border-indigo-400 hover:shadow-sm transition-all duration-300">
                        <div class="w-10 h-10 rounded-lg bg-zinc-50 border border-zinc-100 flex items-center justify-center text-xl shrink-0">
                            ${p.logo}
                        </div>
                        <div class="overflow-hidden">
                            <div class="text-xs font-bold text-zinc-800 truncate">${p.name}</div>
                            <div class="text-[10px] text-zinc-500 truncate">${p.category}</div>
                        </div>
                    </div>
                `;
                container.innerHTML += itemHtml;
            });
        }

        function addLog(message, type = "info") {
            const consoleLogs = document.getElementById("console-logs");
            if (!consoleLogs) return;

            const now = new Date();
            const time = now.toTimeString().split(' ')[0] + '.' + String(now.getMilliseconds()).padStart(3, '0');
            
            let colorClass = "text-zinc-300";
            let prefix = "";
            if (type === "no-debounce") {
                colorClass = "text-red-400 font-semibold";
                prefix = "[Tanpa Debounce] ";
            } else if (type === "debounce") {
                colorClass = "text-emerald-400 font-semibold";
                prefix = "[Dengan Debounce] ";
            } else if (type === "system") {
                colorClass = "text-amber-400";
                prefix = "[System] ";
            } else if (type === "reset") {
                colorClass = "text-cyan-400";
                prefix = "[System] ";
            }

            const newLog = document.createElement("div");
            newLog.className = `${colorClass} leading-relaxed`;
            newLog.innerHTML = `<span class="text-zinc-600">[${time}]</span> ${prefix}${message}`;
            consoleLogs.appendChild(newLog);

            // Scroll to bottom
            consoleLogs.scrollTop = consoleLogs.scrollHeight;
        }

        function clearLogs() {
            const consoleLogs = document.getElementById("console-logs");
            if (consoleLogs) {
                consoleLogs.innerHTML = `<div class="text-zinc-550">[System] Log dibersihkan.</div>`;
            }
        }

        function updateComparisonStats() {
            const saved = Math.max(0, noDebounceQueries - debounceQueries);
            document.getElementById("saved-queries").innerText = `${saved} Query`;

            let percent = 0;
            if (noDebounceQueries > 0) {
                percent = Math.round((saved / noDebounceQueries) * 100);
            }
            document.getElementById("saving-percent").innerText = `${percent}%`;

            const statusEl = document.getElementById("server-load-status");
            
            if (noDebounceQueries > 15 && (noDebounceQueries > debounceQueries * 2)) {
                statusEl.className = "inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-bold bg-red-950 text-red-400 border border-red-800";
                statusEl.innerHTML = `<span class="w-2.5 h-2.5 rounded-full bg-red-500 animate-ping"></span> KRITIS (Overload / Kebanjiran Request)`;
            } else if (noDebounceQueries > 6) {
                statusEl.className = "inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-bold bg-amber-950 text-amber-400 border border-amber-800";
                statusEl.innerHTML = `<span class="w-2.5 h-2.5 rounded-full bg-amber-400"></span> SEDANG (Load Bertambah)`;
            } else {
                statusEl.className = "inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-bold bg-slate-800 text-emerald-400 border border-slate-700";
                statusEl.innerHTML = `<span class="w-2.5 h-2.5 rounded-full bg-emerald-400"></span> AMAN (Sangat Ringan)`;
            }
        }

        function handleNoDebounceInput(val) {
            noDebounceKeys++;
            document.getElementById("count-no-debounce-keys").innerText = noDebounceKeys;
            
            // Text to show inside SQL
            document.getElementById("query-val-no-debounce").innerText = val;

            const statusDot = document.getElementById("status-dot-no-debounce");
            const badge = document.getElementById("badge-no-debounce");

            // Instantly trigger database query
            noDebounceQueries++;
            document.getElementById("count-no-debounce-queries").innerText = noDebounceQueries;

            // Flash visual status
            statusDot.className = "w-2 h-2 rounded-full bg-red-550 animate-ping";
            badge.className = "text-xs font-mono text-red-500 font-bold";
            badge.innerText = "QUERY RUNNING";

            addLog(`Keystroke #${noDebounceKeys} terdeteksi. Mengirim request instan untuk kata kunci: "${val}"`, "no-debounce");

            // Render live result mock
            renderResults(val);

            setTimeout(() => {
                statusDot.className = "w-2 h-2 rounded-full bg-red-500";
                badge.innerText = "Query Selesai";
                
                setTimeout(() => {
                    if (badge.innerText === "Query Selesai") {
                        statusDot.className = "w-2 h-2 rounded-full bg-zinc-400";
                        badge.className = "text-xs font-mono text-zinc-500";
                        badge.innerText = "Idle";
                    }
                }, 400);
            }, 100);

            updateComparisonStats();
        }

        function handleDebounceInput(val) {
            debounceKeys++;
            document.getElementById("count-debounce-keys").innerText = debounceKeys;

            const statusDot = document.getElementById("status-dot-debounce");
            const badge = document.getElementById("badge-debounce");
            const timerProgress = document.getElementById("timer-progress");
            const timerText = document.getElementById("timer-text");

            // Cancel existing debounce
            if (debounceTimeout) {
                clearTimeout(debounceTimeout);
                addLog(`Keystroke #${debounceKeys} terdeteksi. Jeda diam dibatalkan! Timer di-reset.`, "system");
            }

            if (progressInterval) {
                clearInterval(progressInterval);
            }

            statusDot.className = "w-2 h-2 rounded-full bg-amber-500 animate-pulse";
            badge.className = "text-xs font-mono text-amber-500 font-bold";
            badge.innerText = "MENUNGGU JEDA DIAM...";

            // Start progress bar animation
            elapsed = 0;
            const intervalTime = 10; // update progress every 10ms
            
            progressInterval = setInterval(() => {
                elapsed += intervalTime;
                const percent = Math.min((elapsed / duration) * 100, 100);
                timerProgress.style.width = `${percent}%`;
                timerText.innerText = `${Math.min(elapsed, duration)}ms / 500ms`;

                if (elapsed >= duration) {
                    clearInterval(progressInterval);
                }
            }, intervalTime);

            // Set timeout for debounce query
            debounceTimeout = setTimeout(() => {
                // When 500ms has elapsed without new typing:
                debounceQueries++;
                document.getElementById("count-debounce-queries").innerText = debounceQueries;
                
                document.getElementById("query-val-debounce").innerText = val;

                statusDot.className = "w-2 h-2 rounded-full bg-emerald-500 animate-ping";
                badge.className = "text-xs font-mono text-emerald-500 font-bold";
                badge.innerText = "QUERY RUNNING";

                addLog(`Jeda diam 500ms tercapai. Mengirim request stabil untuk kata kunci: "${val}"`, "debounce");

                renderResults(val);

                setTimeout(() => {
                    statusDot.className = "w-2 h-2 rounded-full bg-emerald-500";
                    badge.innerText = "Query Selesai";
                    
                    setTimeout(() => {
                        if (badge.innerText === "Query Selesai") {
                            statusDot.className = "w-2 h-2 rounded-full bg-zinc-400";
                            badge.className = "text-xs font-mono text-zinc-500";
                            badge.innerText = "Idle";
                        }
                    }, 400);
                }, 100);

                updateComparisonStats();
            }, duration);
        }

        function resetSimulation() {
            noDebounceKeys = 0;
            noDebounceQueries = 0;
            debounceKeys = 0;
            debounceQueries = 0;

            if (debounceTimeout) clearTimeout(debounceTimeout);
            if (progressInterval) clearInterval(progressInterval);

            document.getElementById("input-no-debounce").value = "";
            document.getElementById("input-debounce").value = "";

            document.getElementById("count-no-debounce-keys").innerText = "0";
            document.getElementById("count-no-debounce-queries").innerText = "0";
            document.getElementById("count-debounce-keys").innerText = "0";
            document.getElementById("count-debounce-queries").innerText = "0";

            document.getElementById("query-val-no-debounce").innerText = "";
            document.getElementById("query-val-debounce").innerText = "";

            document.getElementById("timer-progress").style.width = "0%";
            document.getElementById("timer-text").innerText = "0ms / 500ms";

            const statusDotNo = document.getElementById("status-dot-no-debounce");
            const badgeNo = document.getElementById("badge-no-debounce");
            statusDotNo.className = "w-2 h-2 rounded-full bg-zinc-400";
            badgeNo.className = "text-xs font-mono text-zinc-500";
            badgeNo.innerText = "Idle";

            const statusDotDeb = document.getElementById("status-dot-debounce");
            const badgeDeb = document.getElementById("badge-debounce");
            statusDotDeb.className = "w-2 h-2 rounded-full bg-zinc-400";
            badgeDeb.className = "text-xs font-mono text-zinc-500";
            badgeDeb.innerText = "Idle";

            clearLogs();
            addLog("Simulasi berhasil di-reset ke kondisi awal.", "reset");
            renderResults("");
            updateComparisonStats();
        }

        document.addEventListener('DOMContentLoaded', () => {
            renderResults("");
        });
    </script>
</body>
</html>
