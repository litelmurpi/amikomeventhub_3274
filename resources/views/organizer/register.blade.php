@extends('layouts.app')

@section('title', 'Daftar Penyelenggara - Amikom Event Hub')

@section('content')
<main class="max-w-2xl mx-auto px-4 py-6 sm:py-10">
    <div class="mb-6">
        <a href="{{ route('home') }}" class="text-indigo-600 font-semibold flex items-center gap-1.5 mb-3 text-xs">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
            </svg>
            Kembali ke Beranda
        </a>
        <h1 class="text-2xl font-black text-slate-900">Daftar Penyelenggara Event</h1>
        <p class="text-xs text-slate-500 mt-1">Daftarkan kepanitiaan atau HIMA Anda untuk mulai memublikasikan event.</p>
    </div>

    @if($errors->any())
        <div class="mb-5 p-3.5 bg-rose-50 border border-rose-200 text-rose-700 rounded-xl text-xs font-bold">
            <ul class="list-disc list-inside space-y-0.5">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="bg-white rounded-2xl border border-slate-200/80 p-5 sm:p-6 shadow-sm">
        <h3 class="text-sm font-extrabold mb-4 text-indigo-600 uppercase tracking-wide">Informasi Organisasi & Validasi</h3>

        <form action="{{ route('organizer.register.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
            @csrf

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div>
                    <label for="name" class="block text-xs font-bold text-slate-700 mb-1 uppercase tracking-wider">Nama Organisasi *</label>
                    <input type="text" name="name" id="name" placeholder="Contoh: HIMA SI Amikom"
                        class="w-full px-3.5 py-2.5 bg-white border border-slate-200 rounded-xl focus:border-indigo-600 focus:ring-1 focus:ring-indigo-600 outline-none text-xs font-medium text-slate-900 transition"
                        required value="{{ old('name') }}">
                </div>
                <div>
                    <label for="organization_type" class="block text-xs font-bold text-slate-700 mb-1 uppercase tracking-wider">Tipe Organisasi *</label>
                    <select name="organization_type" id="organization_type" required
                        class="w-full px-3.5 py-2.5 bg-white border border-slate-200 rounded-xl focus:border-indigo-600 focus:ring-1 focus:ring-indigo-600 outline-none text-xs font-medium text-slate-900 transition">
                        <option value="internal" {{ old('organization_type') === 'internal' ? 'selected' : '' }}>Internal Kampus (HIMA/UKM/BEM)</option>
                        <option value="external" {{ old('organization_type') === 'external' ? 'selected' : '' }}>Eksternal Kampus / Komunitas</option>
                    </select>
                </div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div>
                    <label for="phone_number" class="block text-xs font-bold text-slate-700 mb-1 uppercase tracking-wider">No. WA Penanggung Jawab *</label>
                    <input type="tel" name="phone_number" id="phone_number" placeholder="08xxxxxxxxxx"
                        class="w-full px-3.5 py-2.5 bg-white border border-slate-200 rounded-xl focus:border-indigo-600 focus:ring-1 focus:ring-indigo-600 outline-none text-xs font-medium text-slate-900 transition"
                        required value="{{ old('phone_number') }}">
                </div>
                <div>
                    <label for="social_media" class="block text-xs font-bold text-slate-700 mb-1 uppercase tracking-wider">Medsos / Website</label>
                    <input type="text" name="social_media" id="social_media" placeholder="instagram.com/hima_si"
                        class="w-full px-3.5 py-2.5 bg-white border border-slate-200 rounded-xl focus:border-indigo-600 focus:ring-1 focus:ring-indigo-600 outline-none text-xs font-medium text-slate-900 transition"
                        value="{{ old('social_media') }}">
                </div>
            </div>

            <div>
                <label for="description" class="block text-xs font-bold text-slate-700 mb-1 uppercase tracking-wider">Deskripsi Organisasi</label>
                <textarea name="description" id="description" rows="3" placeholder="Profil singkat organisasi..."
                    class="w-full px-3.5 py-2.5 bg-white border border-slate-200 rounded-xl focus:border-indigo-600 focus:ring-1 focus:ring-indigo-600 outline-none text-xs font-medium text-slate-900 transition">{{ old('description') }}</textarea>
            </div>

            <div>
                <label for="logo" class="block text-xs font-bold text-slate-700 mb-1 uppercase tracking-wider">Logo Organisasi (Opsional)</label>
                <input type="file" name="logo" id="logo" accept="image/*"
                    class="w-full px-3 py-2 bg-white border border-slate-200 rounded-xl outline-none text-xs text-slate-500 file:mr-3 file:py-1 file:px-3 file:rounded-lg file:border-0 file:text-xs file:font-semibold file:bg-indigo-50 file:text-indigo-600 hover:file:bg-indigo-100 cursor-pointer">
            </div>

            <button type="submit"
                class="w-full py-3 bg-indigo-600 hover:bg-indigo-700 text-white rounded-xl font-bold text-sm shadow-sm transition active:scale-[0.98] mt-2">
                Kirim Pendaftaran Organisasi
            </button>
        </form>
    </div>
</main>
@endsection
