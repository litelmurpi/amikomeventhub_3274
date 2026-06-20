@extends('layouts.app')

@section('title', 'Bantuan - Amikom Event Hub')

@section('content')
<div class="max-w-5xl mx-auto px-6 py-20 space-y-16">
    <div class="text-center space-y-4">
        <div class="inline-flex p-4 bg-indigo-50 rounded-3xl text-indigo-600 mb-4 shadow-sm border border-indigo-100">
            <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 5.636a9 9 0 010 12.728m0 0l-2.829-2.829m2.829 2.829L21 21M15.536 8.464a5 5 0 010 7.072m0 0l-2.829-2.829m-4.243 2.829a4.978 4.978 0 01-1.414-2.83m-1.414 5.658a9 9 0 01-2.167-9.238m7.824 2.167a1 1 0 111.414 1.414m-1.414-1.414L3 3m8.293 8.293l1.414 1.414"></path></svg>
        </div>
        <h1 class="text-4xl md:text-5xl font-extrabold tracking-tight text-slate-900">Butuh <span class="text-indigo-600">Bantuan?</span></h1>
        <p class="text-slate-500 font-medium max-w-lg mx-auto text-lg">Kami di sini untuk membantu Anda menavigasi setiap event di Amikom Event Hub.</p>
    </div>

    <div class="grid md:grid-cols-2 gap-8">
        <!-- FAQ Item 1 -->
        <div class="group p-8 bg-white rounded-3xl border border-slate-100 shadow-sm hover:shadow-xl hover:border-indigo-100 transition-all duration-300">
            <div class="w-12 h-12 bg-indigo-50 rounded-2xl flex items-center justify-center text-indigo-600 mb-6 group-hover:scale-110 transition-transform">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
            </div>
            <h3 class="text-xl font-bold mb-3 text-slate-800 group-hover:text-indigo-600 transition-colors">Bagaimana cara mendaftar event?</h3>
            <p class="text-slate-500 text-sm leading-relaxed font-medium">
                Pilih event yang Anda inginkan dari katalog, masuk ke halaman detail, dan klik tombol "Pesan Sekarang". Pastikan Anda sudah login dengan akun Amikom Anda.
            </p>
        </div>

        <!-- FAQ Item 2 -->
        <div class="group p-8 bg-white rounded-3xl border border-slate-100 shadow-sm hover:shadow-xl hover:border-indigo-100 transition-all duration-300">
            <div class="w-12 h-12 bg-indigo-50 rounded-2xl flex items-center justify-center text-indigo-600 mb-6 group-hover:scale-110 transition-transform">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 5v2m0 4v2m0 4v2M5 5a2 2 0 00-2 2v3a2 2 0 110 4v3a2 2 0 002 2h14a2 2 0 002-2v-3a2 2 0 110-4V7a2 2 0 00-2-2H5z"></path></svg>
            </div>
            <h3 class="text-xl font-bold mb-3 text-slate-800 group-hover:text-indigo-600 transition-colors">Di mana saya bisa melihat tiket saya?</h3>
            <p class="text-slate-500 text-sm leading-relaxed font-medium">
                Semua tiket dari event yang telah Anda beli dan berhasil dibayar akan muncul di halaman "Tiket Saya".
            </p>
        </div>

        <!-- FAQ Item 3 -->
        <div class="group p-8 bg-white rounded-3xl border border-slate-100 shadow-sm hover:shadow-xl hover:border-indigo-100 transition-all duration-300">
            <div class="w-12 h-12 bg-indigo-50 rounded-2xl flex items-center justify-center text-indigo-600 mb-6 group-hover:scale-110 transition-transform">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
            </div>
            <h3 class="text-xl font-bold mb-3 text-slate-800 group-hover:text-indigo-600 transition-colors">Batal mengikuti event?</h3>
            <p class="text-slate-500 text-sm leading-relaxed font-medium">
                Sesuai kebijakan platform, tiket yang sudah dibeli tidak dapat direfund. Pastikan Anda telah merencanakan kehadiran sebelum melakukan pembayaran.
            </p>
        </div>

        <!-- Support Section -->
        <div class="p-8 bg-indigo-600 text-white rounded-3xl flex flex-col justify-between space-y-8 shadow-xl shadow-indigo-200">
            <div>
                <h3 class="text-2xl font-extrabold mb-2">Masih Bingung?</h3>
                <p class="text-indigo-100 text-sm font-medium">Hubungi tim dukungan kami langsung melalui email atau telepon.</p>
            </div>
            <div class="space-y-4">
                <a href="mailto:support@amikom.ac.id" class="flex items-center gap-3 text-sm font-bold bg-white/10 p-4 rounded-2xl hover:bg-white/20 transition-all">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg> 
                    support@amikom.ac.id
                </a>
                <a href="tel:+62274123456" class="flex items-center gap-3 text-sm font-bold bg-white/10 p-4 rounded-2xl hover:bg-white/20 transition-all">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path></svg> 
                    +62 274 123456
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
