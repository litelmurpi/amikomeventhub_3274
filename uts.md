### **Ketentuan Umum**

- **Sifat Ujian**: _Take Home_ dan _Open Book_ (boleh menggunakan internet).

- **Larangan**: Dilarang keras melakukan plagiasi atau menyalin kode milik teman sekelas.

- **Teknis Pengerjaan**:
- Melanjutkan proyek Laravel yang telah dibangun saat praktikum.

- Menggunakan arsitektur MVC (Model-View-Controller) untuk menyempurnakan antarmuka Manajemen Admin.

- Seluruh pekerjaan wajib dikerjakan di _branch_ khusus bernama: `ujian-tengah-semester-[NIM]`.

### **Soal Ujian (Bobot Tugas)**

1. **Pengembangan Modul Kategori (Bobot 25%)**:

- Implementasi CRUD (_Create, Read, Update, Delete_) untuk entitas `categories` di panel Admin.

- Fitur wajib: Tabel daftar kategori, Form tambah, Form/Modal edit, dan fungsi hapus.

- Kolom minimum: `id`, `name`, `created_at`, `updated_at`.

2. **Pengembangan Modul Partner (Bobot 25%)**:

- Implementasi siklus CRUD lengkap (Create, Read, Update, Delete).

- Kolom minimum pada _migration_: `id`, `name`, `logo_url`, `created_at`, `updated_at`.

3. **Fitur Filter dan Pencarian (Bobot 25%)**:

- Menambahkan form _search_ pada halaman indeks tabel Admin Partner dan Kategori.

- Modifikasi fungsi _Read_ pada _Controller_ menggunakan sintaks Eloquent `where('name', 'LIKE', '%...%')`.

4. **Render Tampilan ke Layar Publik (Bobot 25%)**:

- Menampilkan data "Partner" ke halaman _homepage_ user.

- Mengambil data melalui _Controller_ dan melakukan _looping_ menggunakan `@foreach` pada _Blade Engine_ untuk menampilkan daftar Partner.

### **Instruksi Pengumpulan**

- **GitHub**: Lakukan _git commit_ & _git push_ seluruh pekerjaan ke repositori GitHub tugas.

- **Video Demonstrasi**:
- Buat rekaman layar bersuara (maksimal 3 menit) yang mendemonstrasikan kelancaran 4 soal di atas (dari _insert_ hingga _public view_).

- Unggah video ke Google Drive atau YouTube dengan pengaturan visibilitas **Publik**.

- **Submit**: Setorkan link repositori GitHub (branch ujian) dan link video demonstrasi ke dashboard Amikom.
