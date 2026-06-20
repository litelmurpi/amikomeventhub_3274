@extends('layouts.app')

@section('title', 'Profil - Amikom Event Hub')

@section('content')
<div class="max-w-4xl mx-auto px-6 py-20 space-y-12">
    <div class="space-y-2">
        <h1 class="text-4xl md:text-5xl font-extrabold tracking-tight text-slate-900">Pengaturan <span class="text-indigo-600">Profil</span></h1>
        <p class="text-slate-500 font-medium text-lg">Kelola informasi akun dan preferensi Anda.</p>
    </div>

    <div class="bg-white rounded-3xl p-8 md:p-12 border border-slate-100 shadow-sm space-y-12">
        <!-- Avatar Section -->
        <div class="flex flex-col md:flex-row items-center gap-8 pb-12 border-b border-slate-100">
            <div class="relative group">
                <div class="w-32 h-32 bg-slate-100 rounded-3xl border-4 border-white shadow-md overflow-hidden transition-transform group-hover:scale-105">
                    <img src="/images/avatar.png" alt="Avatar" class="w-full h-full object-cover" onerror="this.src='https://api.dicebear.com/7.x/avataaars/svg?seed=Amikom'">
                </div>
                <button class="absolute -bottom-2 -right-2 p-3 bg-indigo-600 text-white rounded-2xl shadow-lg shadow-indigo-200 hover:scale-110 transition-transform">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 13a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                </button>
            </div>
            <div class="text-center md:text-left space-y-2">
                <h3 class="text-2xl font-bold text-slate-800">Administrator</h3>
                <p class="text-slate-500 font-medium flex items-center justify-center md:justify-start gap-2">
                    <svg class="w-5 h-5 text-indigo-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                    admin@amikom.ac.id
                </p>
                <div class="pt-2">
                    <span class="inline-block px-4 py-1.5 bg-indigo-50 text-indigo-600 text-xs font-bold uppercase tracking-wider rounded-lg">Akun Terverifikasi</span>
                </div>
            </div>
        </div>

        <!-- Form Section -->
        <form class="space-y-8">
            <div class="grid md:grid-cols-2 gap-8">
                <div class="space-y-3">
                    <label for="name" class="block text-sm font-bold text-slate-700 uppercase tracking-wide">Nama Lengkap</label>
                    <div class="relative">
                        <svg class="w-5 h-5 absolute left-4 top-1/2 -translate-y-1/2 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                        <input type="text" id="name" value="Admin Amikom" class="w-full bg-slate-50 border-2 border-slate-100 focus:border-indigo-500 rounded-2xl py-4 pl-12 pr-4 text-sm font-semibold text-slate-800 transition-all outline-none">
                    </div>
                </div>
                <div class="space-y-3">
                    <label for="nim" class="block text-sm font-bold text-slate-700 uppercase tracking-wide">NIM / ID Staff</label>
                    <div class="relative">
                        <svg class="w-5 h-5 absolute left-4 top-1/2 -translate-y-1/2 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V8a2 2 0 00-2-2h-5m-4 0V5a2 2 0 114 0v1m-4 0a2 2 0 104 0m-5 8a2 2 0 100-4 2 2 0 000 4zm0 0c1.306 0 2.417.835 2.83 2M9 14a3.001 3.001 0 00-2.83 2M15 11h3m-3 4h2"></path></svg>
                        <input type="text" id="nim" value="24.12.3274" disabled class="w-full bg-slate-100 border-2 border-transparent rounded-2xl py-4 pl-12 pr-4 text-sm font-bold text-slate-400 cursor-not-allowed">
                    </div>
                </div>
            </div>

            <div class="space-y-3">
                <label for="bio" class="block text-sm font-bold text-slate-700 uppercase tracking-wide">Bio Singkat</label>
                <textarea id="bio" rows="3" class="w-full bg-slate-50 border-2 border-slate-100 focus:border-indigo-500 rounded-2xl py-4 px-4 text-sm font-semibold text-slate-800 transition-all outline-none resize-none">Administrator of Amikom Event Hub. Passionate about organizing student events.</textarea>
            </div>

            <div class="pt-6 flex flex-col md:flex-row gap-4">
                <button type="submit" class="px-10 py-4 bg-indigo-600 text-white rounded-2xl font-bold shadow-lg shadow-indigo-200 hover:bg-indigo-700 hover:shadow-xl transition-all active:scale-[0.98]">Simpan Perubahan</button>
                <button type="button" class="px-10 py-4 border-2 border-slate-200 text-slate-600 rounded-2xl font-bold hover:border-rose-500 hover:text-rose-500 transition-all">Keluar Sesi</button>
            </div>
        </form>
    </div>
</div>
@endsection
