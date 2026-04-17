@extends('layouts.app')

@section('title', 'Bantuan - Amikom Event Hub')

@section('content')
<div class="max-w-4xl mx-auto space-y-16">
    <div class="text-center space-y-4">
        <div class="inline-flex p-4 bg-yellow-50 dark:bg-yellow-900/20 rounded-3xl text-vibrant mb-4">
            <i class="ph-bold ph-lifebuoy text-4xl"></i>
        </div>
        <h1 class="text-4xl md:text-5xl font-extrabold tracking-tighter">Butuh <span class="text-vibrant">Bantuan?</span></h1>
        <p class="text-gray-400 font-medium max-w-lg mx-auto">Kami di sini untuk membantu Anda menavigasi setiap event di Amikom.</p>
    </div>

    <div class="grid md:grid-cols-2 gap-8">
        <!-- FAQ Item 1 -->
        <div class="group p-8 bg-white dark:bg-dark-card rounded-[2.5rem] border border-gray-100 dark:border-gray-800 hover:border-vibrant transition-all">
            <div class="w-10 h-10 bg-blue-50 dark:bg-blue-900/20 rounded-xl flex items-center justify-center text-electric mb-6">
                <i class="ph-bold ph-question text-xl"></i>
            </div>
            <h3 class="text-xl font-bold mb-3">Bagaimana cara mendaftar event?</h3>
            <p class="text-gray-400 text-sm leading-relaxed">
                Pilih event yang Anda inginkan dari katalog, masuk ke halaman detail, dan klik tombol "Daftar Sekarang". Pastikan Anda sudah login dengan akun Amikom Anda.
            </p>
        </div>

        <!-- FAQ Item 2 -->
        <div class="group p-8 bg-white dark:bg-dark-card rounded-[2.5rem] border border-gray-100 dark:border-gray-800 hover:border-vibrant transition-all">
            <div class="w-10 h-10 bg-yellow-50 dark:bg-yellow-900/20 rounded-xl flex items-center justify-center text-vibrant mb-6">
                <i class="ph-bold ph-ticket text-xl"></i>
            </div>
            <h3 class="text-xl font-bold mb-3">Di mana saya bisa melihat tiket saya?</h3>
            <p class="text-gray-400 text-sm leading-relaxed">
                Semua event yang telah Anda daftarkan akan muncul di dashboard profil Anda pada bagian "Event Saya".
            </p>
        </div>

        <!-- FAQ Item 3 -->
        <div class="group p-8 bg-white dark:bg-dark-card rounded-[2.5rem] border border-gray-100 dark:border-gray-800 hover:border-vibrant transition-all">
            <div class="w-10 h-10 bg-purple-50 dark:bg-purple-900/20 rounded-xl flex items-center justify-center text-purple-500 mb-6">
                <i class="ph-bold ph-warning-circle text-xl"></i>
            </div>
            <h3 class="text-xl font-bold mb-3">Batal mengikuti event?</h3>
            <p class="text-gray-400 text-sm leading-relaxed">
                Anda dapat membatalkan pendaftaran melalui dashboard profil sebelum batas waktu yang ditentukan oleh penyelenggara event.
            </p>
        </div>

        <!-- Support Section -->
        <div class="p-8 bg-electric text-white rounded-[2.5rem] flex flex-col justify-between space-y-8">
            <div>
                <h3 class="text-2xl font-extrabold mb-2">Masih Bingung?</h3>
                <p class="text-blue-100 text-sm">Hubungi tim dukungan kami langsung melalui email atau telepon.</p>
            </div>
            <div class="space-y-4">
                <a href="mailto:support@amikom.ac.id" class="flex items-center gap-3 text-sm font-bold bg-white/10 p-4 rounded-2xl hover:bg-white/20 transition-all">
                    <i class="ph-bold ph-envelope"></i> support@amikom.ac.id
                </a>
                <a href="tel:+62274123456" class="flex items-center gap-3 text-sm font-bold bg-white/10 p-4 rounded-2xl hover:bg-white/20 transition-all">
                    <i class="ph-bold ph-phone"></i> +62 274 123456
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
