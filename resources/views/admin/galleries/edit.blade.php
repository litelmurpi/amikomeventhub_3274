@extends('layouts.admin.admin')

@section('title', 'Edit Galeri - Admin Amikom Event Hub')

@section('content')
<header class="mb-6 md:mb-10">
    <a href="{{ route('admin.galleries') }}"
        class="text-indigo-600 font-bold hover:text-indigo-800 flex items-center gap-2 mb-4 text-sm md:text-base transition">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18">
            </path>
        </svg>
        Kembali ke Kelola Galeri
    </a>
    <h1 class="text-2xl md:text-3xl font-black text-slate-800">Edit Galeri</h1>
    <p class="text-sm md:text-base text-slate-500 font-medium">Perbarui informasi galeri foto.</p>
</header>

@if ($errors->any())
    <div class="mb-6 p-4 bg-rose-50 border border-rose-200 text-rose-700 rounded-2xl font-semibold text-sm">
        <ul class="list-disc list-inside space-y-1">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="bg-white rounded-2xl md:rounded-[2.5rem] border border-slate-100 shadow-sm overflow-hidden p-5 md:p-8 max-w-2xl">
    <form action="{{ route('admin.galleries.update', $gallery->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @method('PUT')
        @csrf
        <div class="space-y-2">
            <label for="caption" class="block font-black text-slate-700 text-sm md:text-base">Caption</label>
            <input type="text" name="caption" id="caption" value="{{ old('caption', $gallery->caption) }}"
                placeholder="Masukkan caption foto..."
                class="w-full px-4 md:px-5 py-2.5 md:py-3 rounded-xl border-slate-200 border bg-white focus:ring-2 focus:ring-indigo-500 outline-none text-sm transition"
                required>
        </div>

        <div class="space-y-2">
            <label for="image" class="block font-black text-slate-700 text-sm md:text-base">Upload Gambar Baru (Opsional)</label>
            <input type="file" name="image" id="image"
                class="w-full text-slate-500 text-xs md:text-sm file:mr-4 file:py-2 file:px-4 file:rounded-xl file:border-0 file:text-xs md:file:text-sm file:font-bold file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100 transition">
            <p class="text-xs text-slate-400 font-medium">Format: JPEG, PNG, JPG, GIF, SVG, WEBP (Maks. 2MB). Biarkan kosong jika tidak ingin mengubah gambar.</p>
        </div>

        <div class="p-4 md:p-5 bg-slate-50 rounded-2xl border border-slate-200">
            <p class="text-xs md:text-sm font-bold text-slate-600 mb-3">Gambar Saat Ini:</p>
            <div class="w-24 h-24 md:w-32 md:h-32 rounded-xl border border-slate-200 bg-white p-2 flex items-center justify-center overflow-hidden">
                <img src="{{ asset($gallery->image) }}" alt="{{ $gallery->caption }}"
                    class="max-h-full max-w-full object-cover rounded-lg">
            </div>
        </div>

        <div class="pt-6 border-t flex flex-col sm:flex-row justify-end gap-3">
            <a href="{{ route('admin.galleries') }}"
                class="w-full sm:w-auto text-center px-6 py-3 bg-slate-100 text-slate-700 rounded-xl font-bold text-sm hover:bg-slate-200 transition">Batal</a>
            <button type="submit"
                class="w-full sm:w-auto px-6 py-3 bg-indigo-600 text-white rounded-xl font-bold text-sm hover:bg-indigo-700 transition">Perbarui Galeri</button>
        </div>
    </form>
</div>
@endsection
