<div align="center">
  <h2>👋 Halo, Saya Yudistira Azfa</h2>
  <p>
    <b>Yudistira Azfa Dani Wibowo</b><br>
    🎓 Mahasiswa Semester 4 | 💻 Sistem Informasi <br>
    🏫 Fakultas Ilmu Komputer, Universitas Amikom Yogyakarta
  </p>
</div>

---

# Amikom Event Hub

Amikom Event Hub adalah platform manajemen acara _(event management)_ untuk memfasilitasi pembuatan, pengelolaan, dan pendaftaran berbagai acara di lingkungan universitas.

## 🚀 Fitur Utama

- **Otentikasi & Autorisasi:** Manajemen pengguna dengan role (Admin, User/Peserta).
- **Manajemen Event:** Pembuatan, pengeditan, dan penghapusan event oleh penyelenggara.
- **Pendaftaran Peserta:** Sistem registrasi peserta untuk event yang tersedia.
- **Dashboard Terpusat:** Monitoring dan pelaporan data event (opsional).

## 🛠️ Stack Teknologi

- **Framework:** Laravel 12
- **PHP Version:** >= 8.3
- **Database:** MySQL / PostgreSQL / SQLite
- **Frontend Stack:** Tailwind CSS / Vue.js / Blade (sesuaikan jika ada)

## 📋 Persyaratan Sistem

Sebelum menjalankan project ini, pastikan sistem kamu memiliki:

- PHP >= 8.3
- Composer
- Node.js & NPM
- Database (MySQL/SQLite/dll)

## 💻 Cara Instalasi

1. **Clone repository ini**

    ```bash
    git clone <url-repo-kamu>
    cd amikomeventhub_3274
    ```

2. **Install dependency PHP**

    ```bash
    composer install
    ```

3. **Install dependency Node.js**

    ```bash
    npm install
    ```

4. **Siapkan file environment**

    ```bash
    cp .env.example .env
    ```

    _Edit file `.env` dan sesuaikan konfigurasi database kamu (DB_DATABASE, DB_USERNAME, DB_PASSWORD, dll)._

5. **Generate application key**

    ```bash
    php artisan key:generate
    ```

6. **Jalankan migrasi database (beserta seeder jika ada)**

    ```bash
    php artisan migrate --seed
    ```

7. **Jalankan server development**
    ```bash
    php artisan serve
    ```
    Buka terminal baru dan jalankan Vite untuk frontend:
    ```bash
    npm run dev
    ```

## 📚 Struktur Project Tambahan

- Penjelasan singkat bagian-bagian penting dalam project, misalnya:
- `app/Models` - Definisi struktur database interaktif.
- `routes/web.php` - Routing web aplikasi.

## 🤝 Kontribusi

Jika ingin berkontribusi, silakan buat _Pull Request_ atau laporkan _Issue_ pada repositori ini.

## 📄 Lisensi

[MIT License](https://opensource.org/licenses/MIT)
