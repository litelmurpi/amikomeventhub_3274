@extends('layouts.app')

@section('title', 'Tentang Aplikasi - Amikom Event Hub')

@section('content')
<div class="max-w-5xl mx-auto px-4 sm:px-6 py-10 md:py-24 min-h-screen space-y-12 md:space-y-20">
    <!-- Hero Section -->
    <div class="text-center space-y-4 md:space-y-6 max-w-3xl mx-auto">
        <span class="inline-block px-4 py-1.5 bg-indigo-100 text-indigo-700 rounded-full text-xs font-bold uppercase tracking-wider">
            Tentang Aplikasi
        </span>
        <h1 class="text-3xl sm:text-4xl md:text-6xl font-extrabold tracking-tighter">
            Amikom <span class="text-indigo-600">Event Hub</span>
        </h1>
        <p class="text-slate-500 text-base sm:text-lg leading-relaxed">
            Platform modern untuk reservasi tiket event secara online. Dirancang khusus untuk mempermudah civitas akademika Universitas Amikom Yogyakarta dan penyelenggara luar dalam melakukan manajemen event, penjualan tiket, dan pembayaran aman melalui Midtrans.
        </p>
    </div>

    <!-- Features Section -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 md:gap-8">
        <!-- Feature 1 -->
        <div class="p-6 sm:p-8 bg-white border border-slate-100 rounded-3xl shadow-sm hover:shadow-xl transition-all duration-300">
            <div class="w-12 h-12 bg-indigo-50 rounded-2xl flex items-center justify-center text-indigo-600 mb-6">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 5v2m0 4v2m0 4v2M5 5a2 2 0 00-2 2v3a2 2 0 110 4v3a2 2 0 002 2h14a2 2 0 002-2v-3a2 2 0 110-4V7a2 2 0 00-2-2H5z"></path></svg>
            </div>
            <h3 class="text-xl font-bold mb-3">Reservasi Instan</h3>
            <p class="text-slate-500 text-sm leading-relaxed">
                Pesan tiket konser, seminar, workshop, hingga turnamen e-sport hanya dalam hitungan detik.
            </p>
        </div>

        <!-- Feature 2 -->
        <div class="p-6 sm:p-8 bg-white border border-slate-100 rounded-3xl shadow-sm hover:shadow-xl transition-all duration-300">
            <div class="w-12 h-12 bg-amber-50 rounded-2xl flex items-center justify-center text-amber-600 mb-6">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z"></path></svg>
            </div>
            <h3 class="text-xl font-bold mb-3">Gerbang Pembayaran</h3>
            <p class="text-slate-500 text-sm leading-relaxed">
                Transaksi aman dan otomatis terverifikasi menggunakan payment gateway terpercaya Midtrans.
            </p>
        </div>

        <!-- Feature 3 -->
        <div class="p-6 sm:p-8 bg-white border border-slate-100 rounded-3xl shadow-sm hover:shadow-xl transition-all duration-300">
            <div class="w-12 h-12 bg-purple-50 rounded-2xl flex items-center justify-center text-purple-600 mb-6">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path></svg>
            </div>
            <h3 class="text-xl font-bold mb-3">Panel Admin Lengkap</h3>
            <p class="text-slate-500 text-sm leading-relaxed">
                Manajemen event, penanganan kategori dinamis, pendaftaran sponsor, hingga verifikasi transaksi.
            </p>
        </div>
    </div>

    <!-- Complete Installation Guide Section -->
    <div class="space-y-8 md:space-y-12">
        <div class="border-b border-slate-100 pb-4">
            <h2 class="text-2xl sm:text-3xl font-extrabold tracking-tight">Panduan Setup Lengkap</h2>
            <p class="text-slate-500 mt-2 font-medium text-sm sm:text-base">Ikuti langkah-langkah di bawah ini untuk menjalankan aplikasi Event Hub di mesin lokal Anda dari awal.</p>
        </div>

        <div class="space-y-8">
            <!-- Step 1: Clone Repo -->
            <div class="flex flex-col sm:flex-row gap-4 sm:gap-6 items-start">
                <div class="flex-shrink-0 w-10 h-10 bg-indigo-600 text-white rounded-2xl flex items-center justify-center font-bold text-sm shadow-md shadow-indigo-200">1</div>
                <div class="space-y-3 flex-1 w-full min-w-0">
                    <h3 class="text-lg sm:text-xl font-extrabold text-slate-800">Clone Repository</h3>
                    <p class="text-slate-500 text-sm">Clone proyek ini dari repositori Git Anda dan masuk ke direktori proyek:</p>
                    <div class="bg-slate-900 text-slate-200 rounded-2xl p-4 sm:p-5 font-mono text-[11px] sm:text-xs shadow-md border border-slate-800 overflow-x-auto max-w-full">
                        <span class="text-indigo-400">git clone https://github.com/username/eventhub_3274.git</span><br>
                        <span class="text-indigo-400">cd eventhub_3274</span>
                    </div>
                </div>
            </div>

            <!-- Step 2: Install Dependencies -->
            <div class="flex flex-col sm:flex-row gap-4 sm:gap-6 items-start">
                <div class="flex-shrink-0 w-10 h-10 bg-indigo-600 text-white rounded-2xl flex items-center justify-center font-bold text-sm shadow-md shadow-indigo-200">2</div>
                <div class="space-y-3 flex-1 w-full min-w-0">
                    <h3 class="text-lg sm:text-xl font-extrabold text-slate-800">Install Dependencies</h3>
                    <p class="text-slate-500 text-sm">Pasang semua dependensi PHP (Composer) dan Javascript (NPM) yang dibutuhkan oleh framework Laravel:</p>
                    <div class="bg-slate-900 text-slate-200 rounded-2xl p-4 sm:p-5 font-mono text-[11px] sm:text-xs shadow-md border border-slate-800 overflow-x-auto max-w-full">
                        <span class="text-slate-500 block mb-1"># Install dependensi backend</span>
                        <span class="text-indigo-400">composer install</span><br><br>
                        <span class="text-slate-500 block mb-1"># Install dependensi frontend dan build assets</span>
                        <span class="text-indigo-400">npm install</span><br>
                        <span class="text-indigo-400">npm run build</span>
                    </div>
                </div>
            </div>

            <!-- Step 3: Copy Environment Configuration -->
            <div class="flex flex-col sm:flex-row gap-4 sm:gap-6 items-start">
                <div class="flex-shrink-0 w-10 h-10 bg-indigo-600 text-white rounded-2xl flex items-center justify-center font-bold text-sm shadow-md shadow-indigo-200">3</div>
                <div class="space-y-3 flex-1 w-full min-w-0">
                    <h3 class="text-lg sm:text-xl font-extrabold text-slate-800">Copy Environment & Generate App Key</h3>
                    <p class="text-slate-500 text-sm">Salin file konfigurasi environment utama dan generate application key Laravel:</p>
                    <div class="bg-slate-900 text-slate-200 rounded-2xl p-4 sm:p-5 font-mono text-[11px] sm:text-xs shadow-md border border-slate-800 overflow-x-auto max-w-full">
                        <span class="text-indigo-400">cp .env.example .env</span><br>
                        <span class="text-indigo-400">php artisan key:generate</span>
                    </div>
                </div>
            </div>

            <!-- Step 4: Database Settings (pgsql / mysql) -->
            <div class="flex flex-col sm:flex-row gap-4 sm:gap-6 items-start">
                <div class="flex-shrink-0 w-10 h-10 bg-indigo-600 text-white rounded-2xl flex items-center justify-center font-bold text-sm shadow-md shadow-indigo-200">4</div>
                <div class="space-y-4 flex-1 w-full min-w-0">
                    <h3 class="text-lg sm:text-xl font-extrabold text-slate-800">Konfigurasi Database di file `.env`</h3>
                    <p class="text-slate-500 text-sm">Buatlah database kosong dengan nama <code class="px-1.5 py-0.5 bg-slate-100 rounded text-rose-600 font-mono text-xs">amikomeventhub_3274</code>, lalu edit file <code class="px-1.5 py-0.5 bg-slate-100 rounded text-rose-600 font-mono text-xs">.env</code> Anda sesuai database engine yang Anda gunakan:</p>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- PostgreSQL Option -->
                        <div class="space-y-2">
                            <h4 class="text-sm font-bold text-slate-800 flex items-center gap-1.5">
                                <span class="w-2 h-2 rounded-full bg-blue-500"></span> Opsi PostgreSQL (PgSQL)
                            </h4>
                            <div class="bg-slate-900 text-slate-200 rounded-2xl p-4 sm:p-5 font-mono text-[11px] sm:text-xs shadow-md border border-slate-800 overflow-x-auto max-w-full">
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
                            <div class="bg-slate-900 text-slate-200 rounded-2xl p-4 sm:p-5 font-mono text-[11px] sm:text-xs shadow-md border border-slate-800 overflow-x-auto max-w-full">
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
            <div class="flex flex-col sm:flex-row gap-4 sm:gap-6 items-start">
                <div class="flex-shrink-0 w-10 h-10 bg-indigo-600 text-white rounded-2xl flex items-center justify-center font-bold text-sm shadow-md shadow-indigo-200">5</div>
                <div class="space-y-3 flex-1 w-full min-w-0">
                    <h3 class="text-lg sm:text-xl font-extrabold text-slate-800">Migrasi Tabel & Seeders Data</h3>
                    <p class="text-slate-500 text-sm">Buat skema tabel-tabel di database serta isi dengan data default kategori, event awal, dan akun admin:</p>
                    <div class="bg-slate-900 text-slate-200 rounded-2xl p-4 sm:p-5 font-mono text-[11px] sm:text-xs shadow-md border border-slate-800 overflow-x-auto max-w-full">
                        <span class="text-slate-500 block mb-1"># Bersihkan config cache agar variabel .env yang baru terbaca</span>
                        <span class="text-indigo-400">php artisan config:clear</span><br><br>
                        <span class="text-slate-500 block mb-1"># Jalankan migrasi dan isi database</span>
                        <span class="text-indigo-400">php artisan migrate --seed</span>
                    </div>
                </div>
            </div>

            <!-- Step 6: Create Storage Symlink -->
            <div class="flex flex-col sm:flex-row gap-4 sm:gap-6 items-start">
                <div class="flex-shrink-0 w-10 h-10 bg-indigo-600 text-white rounded-2xl flex items-center justify-center font-bold text-sm shadow-md shadow-indigo-200">6</div>
                <div class="space-y-3 flex-1 w-full min-w-0">
                    <h3 class="text-lg sm:text-xl font-extrabold text-slate-800">Hubungkan Storage (Symlink)</h3>
                    <p class="text-slate-500 text-sm">Gunakan link simbolis agar file upload seperti gambar poster event dapat diakses oleh browser:</p>
                    <div class="bg-slate-900 text-slate-200 rounded-2xl p-4 sm:p-5 font-mono text-[11px] sm:text-xs shadow-md border border-slate-800 overflow-x-auto max-w-full">
                        <span class="text-indigo-400">php artisan storage:link</span>
                    </div>
                </div>
            </div>

            <!-- Step 7: Run Local Server -->
            <div class="flex flex-col sm:flex-row gap-4 sm:gap-6 items-start">
                <div class="flex-shrink-0 w-10 h-10 bg-indigo-600 text-white rounded-2xl flex items-center justify-center font-bold text-sm shadow-md shadow-indigo-200">7</div>
                <div class="space-y-3 flex-1 w-full min-w-0">
                    <h3 class="text-lg sm:text-xl font-extrabold text-slate-800">Jalankan Aplikasi Web</h3>
                    <p class="text-slate-500 text-sm">Nyalakan web server lokal Laravel. Buka alamat yang tertera (biasanya <code class="px-1 py-0.5 bg-slate-100 rounded font-mono text-xs">http://127.0.0.1:8000</code>) di browser Anda:</p>
                    <div class="bg-slate-900 text-slate-200 rounded-2xl p-4 sm:p-5 font-mono text-[11px] sm:text-xs shadow-md border border-slate-800 overflow-x-auto max-w-full">
                        <span class="text-indigo-400">php artisan serve</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
