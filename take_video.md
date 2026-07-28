# Naskah Live Demo & Review Aplikasi: Amikom Event Hub 🎙️
**Durasi Target:** ~4 Menit (Sangat padat & langsung ke inti)
**Saran Persiapan:** 
- Buka semua tab web yang diperlukan sebelum record (Halaman Beranda, Dashboard Admin, Web WhatsApp, Halaman Login Google).
- Siapkan HP teman untuk demo scan QR & notif WA.

---

## 🎬 PEMBUKAAN (10 Detik - Bersama)
**[Semua Anggota in-frame]**
**Person A:** "Halo semuanya, kami dari kelompok [Nama Kelompok]. Hari ini kami akan mendemokan **Amikom Event Hub**, platform manajemen dan ticketing acara mahasiswa berbasis Multi-Tenant yang terintegrasi dengan berbagai teknologi modern."

---

## 👨‍💻 BAGIAN 1: PERSON A (1 Menit 15 Detik)
**Fokus Demo:** Arsitektur Multi-Tenant, Checkout, & Notifikasi WhatsApp.
**Layar:** Halaman Beranda $\rightarrow$ Pilih Event Gratis $\rightarrow$ Checkout $\rightarrow$ Sorot HP untuk Notif WA.

**Dialog (Person A):**
"Saya [Nama Person A], bertanggung jawab di bagian **Backend Core & Arsitektur**.
Pertama, platform ini dibangun menggunakan arsitektur **Multi-Tenant**. Artinya, setiap organisasi mahasiswa (HIMA/UKM) memiliki dashboard isolasi sendiri untuk mengelola event dan transaksinya masing-masing, tanpa tercampur dengan HIMA lain.

Mari kita demokan alur **Checkout**. Kami telah mengembangkan fitur *Bypass Gateway* untuk event gratis. Saat mahasiswa mendaftar event gratis, sistem tidak akan mengarahkan ke Midtrans, melainkan langsung menerbitkan E-Ticket. 

*(Klik Pesan Sekarang $\rightarrow$ Isi Data dengan nomor HP aktif $\rightarrow$ Klik Checkout)*

Selain itu, saya juga mengintegrasikan **WhatsApp Notification API menggunakan Fonnte dan Laravel Queue**. Begitu transaksi berhasil, sistem langsung men-dispatch job di background untuk mengirim E-Ticket via WhatsApp secara *real-time*. 
*(Tunjukkan layar HP yang baru saja menerima notifikasi WA masuk)*. 
Bisa dilihat, notifikasi dan link E-ticket langsung masuk ke WhatsApp mahasiswa!"

---

## 🧑‍💻 BAGIAN 2: PERSON B (1 Menit 15 Detik)
**Fokus Demo:** Google SSO, Rating & Review, Dashboard Grafik.
**Layar:** Halaman Login Google $\rightarrow$ Halaman Detail Event (Beri Ulasan) $\rightarrow$ Dashboard Admin (Grafik).

**Dialog (Person B):**
"Saya [Nama Person B], yang menangani **Integrasi Autentikasi dan Fitur Sosial**.
Untuk memudahkan mahasiswa login tanpa harus menghafal banyak password, saya mengimplementasikan **Google SSO (OAuth2) menggunakan Laravel Socialite**. Mahasiswa cukup klik 'Login with Google', dan sistem otomatis mengenali email `@amikom.ac.id` mereka. *(Demo klik tombol login Google)*.

Fitur kedua adalah **Rating & Review**. Setelah event berakhir, mahasiswa yang memiliki tiket lunas dapat memberikan ulasan bintang dan komentar. Sistem dilengkapi validasi ketat sehingga hanya peserta sah yang bisa memberikan rating. *(Demo submit bintang 5 dan ulasan di event yang sudah lewat)*.

Terakhir, untuk sisi penyelenggara, saya membangun **Dashboard Analitik** interaktif menggunakan **Chart.js**. HIMA bisa melihat grafik *real-time* mengenai tren pendapatan tiket dan jumlah pendaftar setiap bulannya. *(Tunjukkan halaman dashboard admin dengan grafik garis/batang)*."

---

## 👨‍🔧 BAGIAN 3: PERSON C (1 Menit 10 Detik)
**Fokus Demo:** PWA, QR Scanner Kamera, & Deployment (Production).
**Layar:** Tampilan Web di HP (PWA) $\rightarrow$ Menu Scanner di Akun Panitia $\rightarrow$ Scan E-Ticket.

**Dialog (Person C):**
"Saya [Nama Person C], bertanggung jawab penuh pada **Frontend, DevOps, dan Sistem Check-in**.
Aplikasi ini sudah mendukung **PWA (Progressive Web App)**, sehingga mahasiswa bisa menginstal website ini menjadi aplikasi native di *homescreen* HP mereka dengan performa yang sangat *smooth* dan responsif. *(Tunjukkan sekilas tampilan UI mobile/PWA)*.

Untuk sistem *Check-in* di hari H acara, saya membangun fitur **Live QR Code Scanner** berbasis HTML5 Camera. Panitia tidak perlu alat khusus, cukup buka dashboard, nyalakan kamera HP/laptop, dan scan E-Ticket peserta. *(Arahkan kamera ke layar HP teman yang menampilkan QR Code dari WA tadi)*.
Sistem akan langsung memverifikasi ke database secara instan apakah tiket ini valid atau sudah pernah di-scan sebelumnya.

Dan yang terpenting, seluruh infrastruktur yang kami demokan ini sudah **100% ter-deploy di server Production (InfinityFree)** secara *live*, bukan lagi di localhost."

---

## 🏁 PENUTUP (10 Detik - Bersama)
**[Semua Anggota in-frame]**
**Person C:** "Sekian presentasi dari kelompok kami. Amikom Event Hub siap mendigitalisasi seluruh event di kampus. Terima kasih!" 
*(Senyum & Tutup Video)*
