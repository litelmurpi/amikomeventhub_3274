# 🏆 Tantangan Praktik Mandiri: Fitur Galeri CRUD (Tingkat Menengah)

## Deskripsi Kasus
Sebagai developer **Amikom EventHub**, Anda ditantang untuk membangun fitur **Galeri Dokumentasi Event** dari nol. Fitur ini ditujukan untuk mempublikasikan foto-foto keseruan acara yang telah berlangsung.

Admin harus bisa mengelola data galeri melalui dasbor admin, dan pengunjung umum dapat melihat galeri tersebut di halaman depan. Anda harus merancang dan menulis seluruh kode secara mandiri tanpa bantuan panduan langkah-demi-langkah.

---

## 📋 Persyaratan Fitur (Spesifikasi Teknis)

### 1. Desain Database & Model (Migrasi)
* Rancang tabel database bernama `galleries` untuk menyimpan data galeri.
* Tentukan tipe data kolom yang tepat untuk menampung:
  - **Takarir / Caption** gambar (tidak boleh kosong).
  - **File Gambar** (simpan sebagai path/lokasi penyimpanan file lokal di server).
* Buat model Eloquent yang sesuai dan pastikan fitur **Mass Assignment** aktif pada kolom-kolom yang diperlukan.

### 2. Konfigurasi Routing
* Buat pemetaan rute (routing) menggunakan standar Laravel:
  - Rute publik untuk melihat halaman galeri.
  - Rute admin untuk mengelola Galeri (CRUD lengkap). Bungkus rute admin ini di dalam grup rute admin yang sudah ada agar memiliki prefix `/admin/` dan nama rute yang konsisten.

### 3. Logika Controller & Penanganan File (CRUD)
Buat controller yang menangani seluruh operasi CRUD galeri dengan ketentuan ketat berikut:
* **Validasi Input Form:**
  - Wajib membatasi input takarir agar tidak kosong dan tidak melebihi batas panjang karakter database.
  - Wajib membatasi upload berkas hanya berupa gambar (format standar gambar) dengan ukuran file maksimal **2MB**.
  - Pada form tambah, berkas gambar bersifat wajib. Pada form edit, berkas gambar bersifat opsional (jika kosong, gunakan gambar lama).
* **Upload Berkas:**
  - Gambar harus disimpan secara lokal di dalam folder publik proyek Anda dengan nama berkas yang unik untuk menghindari bentrok nama file.
* **Manajemen Penyimpanan Disk (Cleanup):**
  - **Penting:** Pastikan sistem menghapus file fisik gambar lama dari server ketika admin memperbarui galeri dengan gambar baru, atau ketika data galeri dihapus (destroy). Jangan biarkan ada file sampah tak terpakai di server!

### 4. Integrasi Tampilan (Blade Views)
* **Tampilan Admin:**
  - Halaman List: Tampilkan data dalam bentuk tabel lengkap dengan nomor urut, pratinjau gambar berukuran kecil, takarir gambar, tanggal diunggah, dan tombol aksi (Edit & Hapus). Tombol Hapus harus menggunakan metode HTTP yang aman (spoofing) dan memicu dialog konfirmasi.
  - Form Tambah & Edit: Rancang form dengan layout yang rapi. Pastikan form dapat mengirimkan data biner (file upload) dengan benar ke server. Tampilkan pesan error di bawah input masing-masing jika validasi gagal.
* **Tampilan Publik:**
  - Tampilkan seluruh galeri di halaman depan menggunakan susunan Grid CSS yang responsif. Ketika gambar di-klik, tampilkan gambar tersebut dalam ukuran penuh menggunakan modal popup (lightbox) sederhana.

---

## ⚡ Tantangan Ekstra (Opsional - Untuk Nilai Tambahan)
1. **Fitur Pencarian:** Implementasikan fitur pencarian galeri berdasarkan takarir (caption). Pastikan kueri pencarian Anda kompatibel secara universal baik menggunakan database MySQL maupun PostgreSQL (ingat perbedaan sensitivitas huruf/case-sensitivity pada operator perbandingan).
2. **Debounce Search:** Tambahkan script JavaScript di halaman index admin agar pencarian berjalan otomatis saat admin mengetik kata kunci, namun beri jeda waktu (debounce) agar tidak membebani server database Anda.
