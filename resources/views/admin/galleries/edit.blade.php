@extends('layouts.admin.admin')

@section('title', 'Edit Galeri - Admin Amikom Event Hub')

@section('content')
    <main class="flex-1 p-10 overflow-y-auto">
        <header class="mb-10">
            <a href="{{ route('admin.galleries') }}"
                class="text-indigo-600 font-bold hover:text-indigo-800 flex items-center gap-2 mb-4 transition">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18">
                    </path>
                </svg>
                Kembali ke Kelola Galeri
            </a>
            <h1 class="text-3xl font-black">Edit Galeri</h1>
            <p class="text-slate-500 font-medium">Perbarui informasi galeri foto.</p>
        </header>

        @if ($errors->any())
            <div class="mb-6 p-4 bg-rose-50 border border-rose-200 text-rose-700 rounded-2xl font-semibold">
                <ul class="list-disc list-inside">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="bg-white rounded-[2.5rem] border border-slate-100 shadow-sm overflow-hidden p-8 max-w-2xl">
            <form action="{{ route('admin.galleries.update', $gallery->id) }}" method="POST" enctype="multipart/form-data"
                class="space-y-6">
                @method('PUT')
                @csrf
                <div class="space-y-2">
                    <label for="caption" class="block font-black text-slate-700">Caption</label>
                    <input type="text" name="caption" id="caption" value="{{ old('caption', $gallery->caption) }}"
                        placeholder="Masukkan caption foto..."
                        class="w-full px-5 py-3 rounded-xl border-slate-200 border bg-white focus:ring-2 focus:ring-indigo-500 outline-none transition"
                        required>
                </div>

                <div class="space-y-2">
                    <label for="image" class="block font-black text-slate-700">Upload Gambar Baru (Opsional)</label>
                    <input type="file" name="image" id="image"
                        class="w-full text-slate-500 file:mr-4 file:py-2 file:px-4 file:rounded-xl file:border-0 file:text-sm file:font-bold file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100 transition">
                    <p class="text-xs text-slate-400 font-medium">Format: JPEG, PNG, JPG, GIF, SVG, WEBP (Maks. 2MB).
                        Biarkan kosong jika tidak ingin mengubah gambar.</p>
                </div>

                <div class="p-5 bg-slate-50 rounded-2xl border border-slate-200">
                    <p class="text-sm font-bold text-slate-600 mb-3">Gambar Saat Ini:</p>
                    <div
                        class="w-32 h-32 rounded-xl border border-slate-200 bg-white p-2 flex items-center justify-center overflow-hidden">
                        <img src="{{ asset($gallery->image) }}" alt="{{ $gallery->caption }}"
                            class="max-h-full max-w-full object-cover rounded-lg">
                    </div>
                </div>

                <div class="pt-6 border-t flex justify-end gap-3">
                    <a href="{{ route('admin.galleries') }}"
                        class="px-6 py-3 bg-slate-100 text-slate-700 rounded-xl font-bold hover:bg-slate-200 transition">Batal</a>
                    <button type="submit"
                        class="px-6 py-3 bg-indigo-600 text-white rounded-xl font-bold hover:bg-indigo-700 transition">Perbarui
                        Galeri</button>
                </div>
            </form>
        </div>
    </main>
@endsection
