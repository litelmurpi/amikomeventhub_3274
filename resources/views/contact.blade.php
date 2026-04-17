@extends('layouts.app')

@section('title', 'Kontak - Amikom Event Hub')

@section('content')
<div class="max-w-5xl mx-auto flex flex-col lg:flex-row gap-16 items-start">
    <!-- Left Side: Info -->
    <div class="lg:w-1/3 space-y-12">
        <div class="space-y-4">
            <h1 class="text-4xl md:text-5xl font-extrabold tracking-tighter leading-tight">Ayo <span class="text-electric">Kolaborasi.</span></h1>
            <p class="text-gray-400 font-medium leading-relaxed">Punya pertanyaan, ide, atau ingin bekerja sama menyelenggarakan event? Sapa kami!</p>
        </div>

        <div class="space-y-8">
            <div class="flex items-center gap-6 group">
                <div class="w-12 h-12 bg-white dark:bg-dark-card rounded-2xl border border-gray-100 dark:border-gray-800 flex items-center justify-center text-electric shadow-sm group-hover:border-vibrant transition-all">
                    <i class="ph-bold ph-envelope text-2xl"></i>
                </div>
                <div>
                    <p class="text-[10px] uppercase tracking-widest font-extrabold text-gray-300">Email Admin</p>
                    <p class="font-bold">admin@amikomeventhub.com</p>
                </div>
            </div>

            <div class="flex items-center gap-6 group">
                <div class="w-12 h-12 bg-white dark:bg-dark-card rounded-2xl border border-gray-100 dark:border-gray-800 flex items-center justify-center text-vibrant shadow-sm group-hover:border-electric transition-all">
                    <i class="ph-bold ph-map-pin text-2xl"></i>
                </div>
                <div>
                    <p class="text-[10px] uppercase tracking-widest font-extrabold text-gray-300">Lokasi</p>
                    <p class="font-bold">Yogyakarta, Indonesia</p>
                </div>
            </div>
        </div>

        <!-- Social Icons (Simulated) -->
        <div class="flex gap-4">
            <a href="#" class="w-10 h-10 rounded-xl bg-gray-50 dark:bg-gray-800 flex items-center justify-center text-gray-400 hover:text-electric transition-colors">
                <i class="ph-bold ph-instagram-logo"></i>
            </a>
            <a href="#" class="w-10 h-10 rounded-xl bg-gray-50 dark:bg-gray-800 flex items-center justify-center text-gray-400 hover:text-electric transition-colors">
                <i class="ph-bold ph-twitter-logo"></i>
            </a>
            <a href="#" class="w-10 h-10 rounded-xl bg-gray-50 dark:bg-gray-800 flex items-center justify-center text-gray-400 hover:text-electric transition-colors">
                <i class="ph-bold ph-linkedin-logo"></i>
            </a>
        </div>
    </div>

    <!-- Right Side: Form -->
    <div class="lg:w-2/3 w-full bg-white dark:bg-dark-card rounded-[3rem] p-8 md:p-12 border border-gray-100 dark:border-gray-800 shadow-xl shadow-gray-200/20 dark:shadow-none">
        <form class="space-y-8">
            <div class="grid md:grid-cols-2 gap-8">
                <div class="space-y-2">
                    <label for="name" class="block text-[10px] uppercase tracking-[0.2em] font-extrabold text-gray-400">Nama</label>
                    <input type="text" id="name" placeholder="Siapa nama Anda?" class="w-full bg-gray-50 dark:bg-gray-800/50 border-2 border-transparent focus:border-vibrant rounded-2xl py-4 px-6 text-sm font-semibold transition-all outline-none">
                </div>
                <div class="space-y-2">
                    <label for="email" class="block text-[10px] uppercase tracking-[0.2em] font-extrabold text-gray-400">Email</label>
                    <input type="email" id="email" placeholder="example@mail.com" class="w-full bg-gray-50 dark:bg-gray-800/50 border-2 border-transparent focus:border-vibrant rounded-2xl py-4 px-6 text-sm font-semibold transition-all outline-none">
                </div>
            </div>

            <div class="space-y-2">
                <label for="subject" class="block text-[10px] uppercase tracking-[0.2em] font-extrabold text-gray-400">Subjek</label>
                <select id="subject" class="w-full bg-gray-50 dark:bg-gray-800/50 border-2 border-transparent focus:border-vibrant rounded-2xl py-4 px-6 text-sm font-semibold transition-all outline-none appearance-none">
                    <option>Pertanyaan Umum</option>
                    <option>Kerja Sama Event</option>
                    <option>Laporan Masalah</option>
                </select>
            </div>

            <div class="space-y-2">
                <label for="message" class="block text-[10px] uppercase tracking-[0.2em] font-extrabold text-gray-400">Pesan</label>
                <textarea id="message" rows="5" placeholder="Tuliskan pesan Anda di sini..." class="w-full bg-gray-50 dark:bg-gray-800/50 border-2 border-transparent focus:border-vibrant rounded-2xl py-4 px-6 text-sm font-semibold transition-all outline-none resize-none"></textarea>
            </div>

            <div class="pt-4">
                <button type="submit" class="w-full md:w-auto px-12 py-5 bg-electric text-white rounded-2xl font-bold hover:shadow-lg hover:shadow-electric/30 transition-all flex items-center justify-center gap-3">
                    Kirim Pesan <i class="ph-bold ph-paper-plane-tilt"></i>
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
