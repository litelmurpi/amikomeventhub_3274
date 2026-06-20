<div align="center">
  <img src="https://ui-avatars.com/api/?name=Amikom+Event+Hub&background=6366f1&color=fff&size=128" alt="Logo" width="80" height="80" style="border-radius: 20px; margin-bottom: 20px;">
  <h1>Amikom Event Hub</h1>
  <p><strong>Platform Manajemen Event Modern untuk Komunitas Amikom</strong></p>

  <p>
    <img src="https://img.shields.io/badge/Laravel-FF2D20?style=for-the-badge&logo=laravel&logoColor=white" alt="Laravel">
    <img src="https://img.shields.io/badge/Tailwind_CSS-38B2AC?style=for-the-badge&logo=tailwind-css&logoColor=white" alt="Tailwind">
    <img src="https://img.shields.io/badge/JavaScript-F7DF1E?style=for-the-badge&logo=javascript&logoColor=black" alt="JS">
  </p>

  <a href="http://amikomeventhub3274.page.gd/"><strong>Lihat Website Production (InfinityFree)</strong></a> | <a href="https://amikomeventhub-3274-main-oeqkoy.free.laravel.cloud/">Lihat Demo (Laravel Cloud)</a>
</div>

---

### 👤 Identitas Mahasiswa

- **Nama:** Yudistira Azfa Dani Wibowo
- **NIM:** 24.12.3274
- **Prodi:** Digital Business
- **Repository:** amikomeventhub_3274

---

### 📂 Daftar Tugas & Halaman Demo

| Nama Tugas  | Deskripsi / Bagian | Link Cloud (Demo) | Link Production (InfinityFree) |
| :---------- | :----------------- | :---------------- | :----------------------------- |
| **TUGAS 1** | Project Initial    | [Buka](https://amikomeventhub-3274-main-oeqkoy.free.laravel.cloud/) | [Buka](http://amikomeventhub3274.page.gd/) |
|             | Halaman Katalog    | [Buka](https://amikomeventhub-3274-main-oeqkoy.free.laravel.cloud/katalog) | [Buka](http://amikomeventhub3274.page.gd/katalog) |
|             | Halaman Bantuan    | [Buka](https://amikomeventhub-3274-main-oeqkoy.free.laravel.cloud/bantuan) | [Buka](http://amikomeventhub3274.page.gd/bantuan) |
|             | Halaman Profil     | [Buka](https://amikomeventhub-3274-main-oeqkoy.free.laravel.cloud/profil) | [Buka](http://amikomeventhub3274.page.gd/profil) |
|             | Halaman Tentang    | [Buka](https://amikomeventhub-3274-main-oeqkoy.free.laravel.cloud/tentang) | [Buka](http://amikomeventhub3274.page.gd/tentang) |
|             | Halaman Kontak     | [Buka](https://amikomeventhub-3274-main-oeqkoy.free.laravel.cloud/kontak) | [Buka](http://amikomeventhub3274.page.gd/kontak) |
|             | Halaman Galeri     | [Buka](https://amikomeventhub-3274-main-oeqkoy.free.laravel.cloud/gallery) | [Buka](http://amikomeventhub3274.page.gd/gallery) |
| **TUGAS 2** | Dashboard Admin    | [Buka](https://amikomeventhub-3274-main-oeqkoy.free.laravel.cloud/admin) | [Buka](http://amikomeventhub3274.page.gd/admin) |
|             | Manajemen Event    | [Buka](https://amikomeventhub-3274-main-oeqkoy.free.laravel.cloud/admin/events) | [Buka](http://amikomeventhub3274.page.gd/admin/events) |
|             | Laporan Transaksi  | [Buka](https://amikomeventhub-3274-main-oeqkoy.free.laravel.cloud/admin/transactions) | [Buka](http://amikomeventhub3274.page.gd/admin/transactions) |
|             | Tiket Saya (User)  | [Buka](https://amikomeventhub-3274-main-oeqkoy.free.laravel.cloud/my-tickets) | [Buka](http://amikomeventhub3274.page.gd/my-tickets) |
|             | Beranda / Welcome  | [Buka](https://amikomeventhub-3274-main-oeqkoy.free.laravel.cloud/) | [Buka](http://amikomeventhub3274.page.gd/) |
|             | Kelola Kategori    | [Buka](https://amikomeventhub-3274-main-oeqkoy.free.laravel.cloud/admin/categories) | [Buka](http://amikomeventhub3274.page.gd/admin/categories) |
|             | Detail Event       | [Buka](https://amikomeventhub-3274-main-oeqkoy.free.laravel.cloud/event-detail/jazz-night-2024) | [Buka](http://amikomeventhub3274.page.gd/event-detail/jazz-night-2024) |
|             | Checkout (Demo)    | [Buka](https://amikomeventhub-3274-main-oeqkoy.free.laravel.cloud/checkout/jazz-night-2024) | [Buka](http://amikomeventhub3274.page.gd/checkout/jazz-night-2024) |
<!-- | **UTS**     | Script Video UTS   | [Buka](https://amikomeventhub-3274-main-oeqkoy.free.laravel.cloud/admin/partners) | [Buka](http://amikomeventhub3274.page.gd/admin/partners) | -->

---

### 🚀 Panduan Setup & Instalasi Lokal

Ikuti langkah-langkah berikut untuk menjalankan aplikasi Amikom Event Hub di server lokal Anda:

#### 1. Clone Repository
```bash
git clone https://github.com/litelmurpi/amikomeventhub_3274.git
cd amikomeventhub_3274
```

#### 2. Install Dependensi PHP & Javascript
```bash
# Pasang paket PHP (Composer)
composer install

# Pasang paket Node.js & build frontend assets
npm install
npm run build
```

#### 3. Salin Environment & Generate Application Key
```bash
cp .env.example .env
php artisan key:generate
```

#### 4. Konfigurasi Database di file `.env`
Buat database baru bernama `amikomeventhub_3274` menggunakan PostgreSQL atau MySQL, kemudian sesuaikan parameter `.env` Anda:

##### Opsi A: PostgreSQL (PgSQL)
```ini
DB_CONNECTION=pgsql
DB_HOST=127.0.0.1
DB_PORT=5432
DB_DATABASE=amikomeventhub_3274
DB_USERNAME=postgres
DB_PASSWORD=password_postgres_anda
```

##### Opsi B: MySQL / MariaDB
```ini
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=amikomeventhub_3274
DB_USERNAME=root
DB_PASSWORD=password_mysql_anda
```

#### 5. Jalankan Migrasi & Seeders
Jalankan migrasi tabel beserta pengisian data awal (kategori, event, partner/sponsor, akun admin):
```bash
# Hapus cache konfigurasi terlebih dahulu
php artisan config:clear

# Jalankan migrasi & seed
php artisan migrate --seed
```

#### 6. Hubungkan Storage (Symlink)
Gunakan link simbolis agar poster event yang diupload dapat diakses oleh browser:
```bash
php artisan storage:link
```

#### 7. Jalankan Server Lokal
```bash
php artisan serve
```
Akses aplikasi melalui browser pada alamat [http://127.0.0.1:8000](http://127.0.0.1:8000).

---

### ☁️ Panduan Deployment ke Laravel Cloud
Aplikasi ini sudah dikonfigurasi untuk terhubung dengan **Laravel Cloud**. Setiap push ke branch utama (`main`) atau penggabungan (merge) Pull Request di GitHub akan memicu pembaruan otomatis di server produksi.

Untuk mengubah konfigurasi branch deployment atau memicu deployment manual:
1. Kunjungi **[cloud.laravel.com](https://cloud.laravel.com)**.
2. Masuk ke halaman **Settings -> Git** untuk mengganti target **Git branch**.
3. Buka tab **Deployments** dan klik **Deploy** untuk memperbarui secara manual.

---

### 🌐 Website Production (InfinityFree) & CI/CD

Aplikasi ini di-host di hosting gratis **InfinityFree**:
- **URL Website**: [http://amikomeventhub3274.page.gd/](http://amikomeventhub3274.page.gd/)
- **Metode Deployment**: **Otomatis (CI/CD via GitHub Actions)**
  Setiap kali ada perubahan yang dipush ke branch `main`, GitHub Actions akan otomatis menjalankan workflow:
  1. Melakukan setup PHP & Node.js.
  2. Menginstal composer & NPM dependencies (production mode).
  3. Membangun aset frontend (Vite & Tailwind CSS).
  4. Menyiapkan struktur folder yang kompatibel dengan shared hosting InfinityFree.
  5. Mengunggah file secara otomatis ke server InfinityFree via FTP (hanya file yang berubah).
- **Panduan Lengkap**: Silakan merujuk ke file [DEPLOY_GUIDE.md](file:///var/www/html/eventhub_3274/DEPLOY_GUIDE.md) untuk detail langkah konfigurasi hosting, database, dan setup repository secret.

