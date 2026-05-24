@extends('layouts.app')

@section('title', 'Tentang Aplikasi - Amikom Event Hub')

@section('content')
<div class="max-w-5xl mx-auto px-6 py-24 min-h-screen space-y-20">
    <!-- Hero Section -->
    <div class="text-center space-y-6 max-w-3xl mx-auto">
        <span class="inline-block px-4 py-1.5 bg-indigo-100 text-indigo-700 rounded-full text-xs font-bold uppercase tracking-wider">
            Tentang Aplikasi
        </span>
        <h1 class="text-4xl md:text-6xl font-extrabold tracking-tighter">
            Amikom <span class="text-electric">Event Hub</span>
        </h1>
        <p class="text-slate-500 text-lg leading-relaxed">
            Platform modern untuk reservasi tiket event secara online. Dirancang khusus untuk mempermudah civitas akademika Universitas Amikom Yogyakarta dan penyelenggara luar dalam melakukan manajemen event, penjualan tiket, dan pembayaran aman melalui Midtrans.
        </p>
    </div>

    <!-- Features Section -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
        <!-- Feature 1 -->
        <div class="p-8 bg-white border border-slate-100 rounded-3xl shadow-sm hover:shadow-xl transition-all duration-300">
            <div class="w-12 h-12 bg-indigo-50 rounded-2xl flex items-center justify-center text-electric mb-6">
                <i class="ph-bold ph-ticket text-2xl"></i>
            </div>
            <h3 class="text-xl font-bold mb-3">Reservasi Instan</h3>
            <p class="text-slate-500 text-sm leading-relaxed">
                Pesan tiket konser, seminar, workshop, hingga turnamen e-sport hanya dalam hitungan detik.
            </p>
        </div>

        <!-- Feature 2 -->
        <div class="p-8 bg-white border border-slate-100 rounded-3xl shadow-sm hover:shadow-xl transition-all duration-300">
            <div class="w-12 h-12 bg-yellow-50 rounded-2xl flex items-center justify-center text-vibrant mb-6">
                <i class="ph-bold ph-credit-card text-2xl"></i>
            </div>
            <h3 class="text-xl font-bold mb-3">Gerbang Pembayaran</h3>
            <p class="text-slate-500 text-sm leading-relaxed">
                Transaksi aman dan otomatis terverifikasi menggunakan payment gateway terpercaya Midtrans.
            </p>
        </div>

        <!-- Feature 3 -->
        <div class="p-8 bg-white border border-slate-100 rounded-3xl shadow-sm hover:shadow-xl transition-all duration-300">
            <div class="w-12 h-12 bg-purple-50 rounded-2xl flex items-center justify-center text-purple-600 mb-6">
                <i class="ph-bold ph-shield-check text-2xl"></i>
            </div>
            <h3 class="text-xl font-bold mb-3">Panel Admin Lengkap</h3>
            <p class="text-slate-500 text-sm leading-relaxed">
                Manajemen event, penanganan kategori dinamis, pendaftaran sponsor, hingga verifikasi transaksi.
            </p>
        </div>
    </div>

    <!-- Complete Installation Guide Section -->
    <div class="space-y-12">
        <div class="border-b border-slate-100 pb-4">
            <h2 class="text-3xl font-extrabold tracking-tight">Panduan Setup Lengkap</h2>
            <p class="text-slate-500 mt-2 font-medium">Ikuti langkah-langkah di bawah ini untuk menjalankan aplikasi Event Hub di mesin lokal Anda dari awal.</p>
        </div>

        <div class="space-y-8">
            <!-- Step 1: Clone Repo -->
            <div class="flex gap-6 items-start">
                <div class="flex-shrink-0 w-10 h-10 bg-indigo-600 text-white rounded-2xl flex items-center justify-center font-bold text-sm shadow-md shadow-indigo-200">1</div>
                <div class="space-y-3 flex-1">
                    <h3 class="text-xl font-extrabold text-slate-800">Clone Repository</h3>
                    <p class="text-slate-500 text-sm">Clone proyek ini dari repositori Git Anda dan masuk ke direktori proyek:</p>
                    <div class="bg-slate-900 text-slate-200 rounded-2xl p-5 font-mono text-xs shadow-md border border-slate-800">
                        <span class="text-indigo-400">git clone https://github.com/username/eventhub_3274.git</span><br>
                        <span class="text-indigo-400">cd eventhub_3274</span>
                    </div>
                </div>
            </div>

            <!-- Step 2: Install Dependencies -->
            <div class="flex gap-6 items-start">
                <div class="flex-shrink-0 w-10 h-10 bg-indigo-600 text-white rounded-2xl flex items-center justify-center font-bold text-sm shadow-md shadow-indigo-200">2</div>
                <div class="space-y-3 flex-1">
                    <h3 class="text-xl font-extrabold text-slate-800">Install Dependencies</h3>
                    <p class="text-slate-500 text-sm">Pasang semua dependensi PHP (Composer) dan Javascript (NPM) yang dibutuhkan oleh framework Laravel:</p>
                    <div class="bg-slate-900 text-slate-200 rounded-2xl p-5 font-mono text-xs shadow-md border border-slate-800">
                        <span class="text-slate-500 block mb-1"># Install dependensi backend</span>
                        <span class="text-indigo-400">composer install</span><br><br>
                        <span class="text-slate-500 block mb-1"># Install dependensi frontend dan build assets</span>
                        <span class="text-indigo-400">npm install</span><br>
                        <span class="text-indigo-400">npm run build</span>
                    </div>
                </div>
            </div>

            <!-- Step 3: Copy Environment Configuration -->
            <div class="flex gap-6 items-start">
                <div class="flex-shrink-0 w-10 h-10 bg-indigo-600 text-white rounded-2xl flex items-center justify-center font-bold text-sm shadow-md shadow-indigo-200">3</div>
                <div class="space-y-3 flex-1">
                    <h3 class="text-xl font-extrabold text-slate-800">Copy Environment & Generate App Key</h3>
                    <p class="text-slate-500 text-sm">Salin file konfigurasi environment utama dan generate application key Laravel:</p>
                    <div class="bg-slate-900 text-slate-200 rounded-2xl p-5 font-mono text-xs shadow-md border border-slate-800">
                        <span class="text-indigo-400">cp .env.example .env</span><br>
                        <span class="text-indigo-400">php artisan key:generate</span>
                    </div>
                </div>
            </div>

            <!-- Step 4: Database Settings (pgsql / mysql) -->
            <div class="flex gap-6 items-start">
                <div class="flex-shrink-0 w-10 h-10 bg-indigo-600 text-white rounded-2xl flex items-center justify-center font-bold text-sm shadow-md shadow-indigo-200">4</div>
                <div class="space-y-4 flex-1">
                    <h3 class="text-xl font-extrabold text-slate-800">Konfigurasi Database di file `.env`</h3>
                    <p class="text-slate-500 text-sm">Buatlah database kosong dengan nama <code class="px-1.5 py-0.5 bg-slate-100 rounded text-rose-600 font-mono text-xs">amikomeventhub_3274</code>, lalu edit file <code class="px-1.5 py-0.5 bg-slate-100 rounded text-rose-600 font-mono text-xs">.env</code> Anda sesuai database engine yang Anda gunakan:</p>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- PostgreSQL Option -->
                        <div class="space-y-2">
                            <h4 class="text-sm font-bold text-slate-800 flex items-center gap-1.5">
                                <span class="w-2 h-2 rounded-full bg-blue-500"></span> Opsi PostgreSQL (PgSQL)
                            </h4>
                            <div class="bg-slate-900 text-slate-200 rounded-2xl p-5 font-mono text-xs shadow-md border border-slate-800">
                                <span class="text-emerald-400">DB_CONNECTION</span>=pgsql<br>
                                <span class="text-emerald-400">DB_HOST</span>=127.0.0.1<br>
                                <span class="text-emerald-400">DB_PORT</span>=5432<br>
                                <span class="text-emerald-400">DB_DATABASE</span>=amikomeventhub_3274<br>
                                <span class="text-emerald-400">DB_USERNAME</span>=postgres<br>
                                <span class="text-emerald-400">DB_PASSWORD</span>=your_password
                            </div>
                        </div>

                        <!-- MySQL Option -->
                        <div class="space-y-2">
                            <h4 class="text-sm font-bold text-slate-800 flex items-center gap-1.5">
                                <span class="w-2 h-2 rounded-full bg-amber-500"></span> Opsi MySQL / MariaDB
                            </h4>
                            <div class="bg-slate-900 text-slate-200 rounded-2xl p-5 font-mono text-xs shadow-md border border-slate-800">
                                <span class="text-emerald-400">DB_CONNECTION</span>=mysql<br>
                                <span class="text-emerald-400">DB_HOST</span>=127.0.0.1<br>
                                <span class="text-emerald-400">DB_PORT</span>=3306<br>
                                <span class="text-emerald-400">DB_DATABASE</span>=amikomeventhub_3274<br>
                                <span class="text-emerald-400">DB_USERNAME</span>=root<br>
                                <span class="text-emerald-400">DB_PASSWORD</span>=your_password
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Step 5: Database Migration & Seeding -->
            <div class="flex gap-6 items-start">
                <div class="flex-shrink-0 w-10 h-10 bg-indigo-600 text-white rounded-2xl flex items-center justify-center font-bold text-sm shadow-md shadow-indigo-200">5</div>
                <div class="space-y-3 flex-1">
                    <h3 class="text-xl font-extrabold text-slate-800">Migrasi Tabel & Seeders Data</h3>
                    <p class="text-slate-500 text-sm">Buat skema tabel-tabel di database serta isi dengan data default kategori, event awal, dan akun admin:</p>
                    <div class="bg-slate-900 text-slate-200 rounded-2xl p-5 font-mono text-xs shadow-md border border-slate-800">
                        <span class="text-slate-500 block mb-1"># Bersihkan config cache agar variabel .env yang baru terbaca</span>
                        <span class="text-indigo-400">php artisan config:clear</span><br><br>
                        <span class="text-slate-500 block mb-1"># Jalankan migrasi dan isi database</span>
                        <span class="text-indigo-400">php artisan migrate --seed</span>
                    </div>
                </div>
            </div>

            <!-- Step 6: Create Storage Symlink -->
            <div class="flex gap-6 items-start">
                <div class="flex-shrink-0 w-10 h-10 bg-indigo-600 text-white rounded-2xl flex items-center justify-center font-bold text-sm shadow-md shadow-indigo-200">6</div>
                <div class="space-y-3 flex-1">
                    <h3 class="text-xl font-extrabold text-slate-800">Hubungkan Storage (Symlink)</h3>
                    <p class="text-slate-500 text-sm">Gunakan link simbolis agar file upload seperti gambar poster event dapat diakses oleh browser:</p>
                    <div class="bg-slate-900 text-slate-200 rounded-2xl p-5 font-mono text-xs shadow-md border border-slate-800">
                        <span class="text-indigo-400">php artisan storage:link</span>
                    </div>
                </div>
            </div>

            <!-- Step 7: Run Local Server -->
            <div class="flex gap-6 items-start">
                <div class="flex-shrink-0 w-10 h-10 bg-indigo-600 text-white rounded-2xl flex items-center justify-center font-bold text-sm shadow-md shadow-indigo-200">7</div>
                <div class="space-y-3 flex-1">
                    <h3 class="text-xl font-extrabold text-slate-800">Jalankan Aplikasi Web</h3>
                    <p class="text-slate-500 text-sm">Nyalakan web server lokal Laravel. Buka alamat yang tertera (biasanya <code class="px-1 py-0.5 bg-slate-100 rounded font-mono text-xs">http://127.0.0.1:8000</code>) di browser Anda:</p>
                    <div class="bg-slate-900 text-slate-200 rounded-2xl p-5 font-mono text-xs shadow-md border border-slate-800">
                        <span class="text-indigo-400">php artisan serve</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
