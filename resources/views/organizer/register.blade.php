@extends('layouts.app')

@section('title', 'Daftar Penyelenggara - Amikom Event Hub')

@section('content')
<main class="max-w-3xl mx-auto px-6 py-20">
    <div class="mb-12">
        <a href="{{ route('home') }}" class="text-indigo-600 font-bold flex items-center gap-2 mb-6">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
            </svg>
            Kembali ke Beranda
        </a>
        <h1 class="text-4xl font-extrabold">Daftar Penyelenggara Event</h1>
        <p class="text-slate-500 mt-2">Daftarkan kepanitiaan atau HIMA Anda untuk mulai memublikasikan event di Amikom Event Hub.</p>
    </div>

    @if($errors->any())
        <div class="mb-6 p-4 bg-red-100 text-red-700 rounded-xl font-bold">
            <ul class="list-disc list-inside">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="bg-white rounded-3xl border border-slate-200 p-8 shadow-sm">
        <h3 class="text-xl font-bold mb-6 text-indigo-600">🏢 Informasi Organisasi & Validasi Kepemilikan</h3>

        <form action="{{ route('organizer.register.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label for="name" class="block text-sm font-bold text-slate-700 mb-2 uppercase tracking-wide">Nama Organisasi *</label>
                    <input type="text" name="name" id="name" placeholder="Contoh: HIMA SI Amikom / BEM SI"
                        class="w-full px-5 py-4 bg-white border-2 border-slate-100 rounded-2xl focus:ring-4 focus:ring-indigo-500/10 focus:border-indigo-600 outline-none transition font-medium text-sm"
                        required value="{{ old('name') }}">
                </div>
                <div>
                    <label for="organization_type" class="block text-sm font-bold text-slate-700 mb-2 uppercase tracking-wide">Tipe Organisasi *</label>
                    <select name="organization_type" id="organization_type" required
                        class="w-full px-5 py-4 bg-white border-2 border-slate-100 rounded-2xl focus:ring-4 focus:ring-indigo-500/10 focus:border-indigo-600 outline-none transition font-medium text-sm">
                        <option value="internal" {{ old('organization_type') === 'internal' ? 'selected' : '' }}>Internal Kampus (HIMA/UKM/BEM/Prodi)</option>
                        <option value="external" {{ old('organization_type') === 'external' ? 'selected' : '' }}>Eksternal Kampus / Komunitas Partner</option>
                    </select>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label for="phone_number" class="block text-sm font-bold text-slate-700 mb-2 uppercase tracking-wide">No. WA Penanggung Jawab *</label>
                    <input type="tel" name="phone_number" id="phone_number" placeholder="08xxxxxxxxxx"
                        class="w-full px-5 py-4 bg-white border-2 border-slate-100 rounded-2xl focus:ring-4 focus:ring-indigo-500/10 focus:border-indigo-600 outline-none transition font-medium text-sm"
                        required value="{{ old('phone_number') }}">
                    <p class="text-[10px] text-slate-400 mt-1 font-bold uppercase tracking-tighter">*Digunakan Superadmin untuk konfirmasi verifikasi</p>
                </div>
                <div>
                    <label for="social_media" class="block text-sm font-bold text-slate-700 mb-2 uppercase tracking-wide">Link Medsos / Website Resmi</label>
                    <input type="text" name="social_media" id="social_media" placeholder="instagram.com/hima_si_amikom"
                        class="w-full px-5 py-4 bg-white border-2 border-slate-100 rounded-2xl focus:ring-4 focus:ring-indigo-500/10 focus:border-indigo-600 outline-none transition font-medium text-sm"
                        value="{{ old('social_media') }}">
                </div>
            </div>

            <div>
                <label for="description" class="block text-sm font-bold text-slate-700 mb-2 uppercase tracking-wide">Deskripsi Organisasi</label>
                <textarea name="description" id="description" rows="4" placeholder="Jelaskan profil organisasi atau jenis event yang akan diselenggarakan..."
                    class="w-full px-5 py-4 bg-white border-2 border-slate-100 rounded-2xl focus:ring-4 focus:ring-indigo-500/10 focus:border-indigo-600 outline-none transition font-medium text-sm">{{ old('description') }}</textarea>
            </div>

            <div>
                <label for="logo" class="block text-sm font-bold text-slate-700 mb-2 uppercase tracking-wide">Logo Organisasi (Opsional)</label>
                <input type="file" name="logo" id="logo" accept="image/*"
                    class="w-full px-5 py-4 bg-white border-2 border-slate-100 rounded-2xl focus:ring-4 focus:ring-indigo-500/10 focus:border-indigo-600 outline-none transition font-medium text-slate-500 file:mr-4 file:py-2 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-bold file:bg-indigo-50 file:text-indigo-600 hover:file:bg-indigo-100 cursor-pointer">
                <p class="text-[10px] text-slate-400 mt-2 font-bold uppercase tracking-tighter">*Format gambar (JPG, PNG). Maksimal 2MB.</p>
            </div>

            <button type="submit"
                class="w-full py-5 bg-indigo-600 text-white rounded-2xl font-black text-xl shadow-xl shadow-indigo-200 hover:bg-indigo-700 active:scale-95 transition-all">
                Kirim Pendaftaran Organisasi
            </button>
        </form>
    </div>
</main>
@endsection
