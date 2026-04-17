@extends('layouts.app')

@section('title', 'Profil - Amikom Event Hub')

@section('content')
<div class="max-w-3xl mx-auto space-y-12">
    <div class="space-y-2">
        <h1 class="text-4xl font-extrabold tracking-tighter">Pengaturan <span class="text-electric">Profil</span></h1>
        <p class="text-gray-400 font-medium">Kelola informasi akun dan preferensi Anda.</p>
    </div>

    <div class="bg-white dark:bg-dark-card rounded-[2.5rem] p-8 md:p-12 border border-gray-100 dark:border-gray-800 space-y-12">
        <!-- Avatar Section -->
        <div class="flex flex-col md:flex-row items-center gap-8 pb-12 border-b border-gray-50 dark:border-gray-800">
            <div class="relative group">
                <div class="w-32 h-32 bg-gray-100 dark:bg-gray-800 rounded-3xl border-4 border-white dark:border-dark-card overflow-hidden transition-transform group-hover:scale-105">
                    <img src="/images/avatar.png" alt="Avatar" class="w-full h-full object-cover opacity-80" onerror="this.src='https://api.dicebear.com/7.x/avataaars/svg?seed=Amikom'">
                </div>
                <button class="absolute -bottom-2 -right-2 p-3 bg-vibrant text-black rounded-2xl shadow-lg hover:scale-110 transition-transform">
                    <i class="ph-bold ph-camera"></i>
                </button>
            </div>
            <div class="text-center md:text-left space-y-1">
                <h3 class="text-2xl font-extrabold">Administrator</h3>
                <p class="text-gray-400 font-medium flex items-center justify-center md:justify-start gap-2">
                    <i class="ph-bold ph-envelope text-electric"></i> admin@amikom.ac.id
                </p>
                <div class="pt-2">
                    <span class="px-4 py-1 bg-blue-50 dark:bg-blue-900/20 text-electric text-[10px] font-extrabold uppercase tracking-widest rounded-full">Akun Terverifikasi</span>
                </div>
            </div>
        </div>

        <!-- Form Section -->
        <form class="space-y-8">
            <div class="grid md:grid-cols-2 gap-8">
                <div class="space-y-2">
                    <label for="name" class="block text-[10px] uppercase tracking-[0.2em] font-extrabold text-gray-400">Nama Lengkap</label>
                    <div class="relative">
                        <i class="ph-bold ph-user absolute left-4 top-1/2 -translate-y-1/2 text-gray-300"></i>
                        <input type="text" id="name" value="Admin Amikom" class="w-full bg-gray-50 dark:bg-gray-800/50 border-2 border-transparent focus:border-vibrant rounded-2xl py-4 pl-12 pr-4 text-sm font-semibold transition-all outline-none">
                    </div>
                </div>
                <div class="space-y-2">
                    <label for="nim" class="block text-[10px] uppercase tracking-[0.2em] font-extrabold text-gray-400">NIM / ID Staff</label>
                    <div class="relative">
                        <i class="ph-bold ph-identification-badge absolute left-4 top-1/2 -translate-y-1/2 text-gray-300"></i>
                        <input type="text" id="nim" value="24.12.3274" disabled class="w-full bg-gray-100 dark:bg-gray-800 border-2 border-transparent rounded-2xl py-4 pl-12 pr-4 text-sm font-bold text-gray-400 cursor-not-allowed">
                    </div>
                </div>
            </div>

            <div class="space-y-2">
                <label for="bio" class="block text-[10px] uppercase tracking-[0.2em] font-extrabold text-gray-400">Bio Singkat</label>
                <textarea id="bio" rows="3" class="w-full bg-gray-50 dark:bg-gray-800/50 border-2 border-transparent focus:border-vibrant rounded-2xl py-4 px-4 text-sm font-semibold transition-all outline-none resize-none">Administrator of Amikom Event Hub. Passionate about organizing student events.</textarea>
            </div>

            <div class="pt-6 flex flex-col md:flex-row gap-4">
                <button type="submit" class="px-10 py-4 bg-electric text-white rounded-2xl font-bold hover:shadow-lg hover:shadow-electric/30 transition-all">Simpan Perubahan</button>
                <button type="button" class="px-10 py-4 bg-gray-50 dark:bg-gray-800 text-gray-500 rounded-2xl font-bold hover:bg-red-50 hover:text-red-500 transition-all">Keluar Sesi</button>
            </div>
        </form>
    </div>
</div>
@endsection
