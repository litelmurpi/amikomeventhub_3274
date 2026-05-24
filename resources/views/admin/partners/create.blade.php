@extends('layouts.admin.admin')

@section('title', 'Tambah Partner - Admin Amikom Event Hub')

@section('content')
<main class="flex-1 p-10 overflow-y-auto">
    <header class="mb-10">
        <a href="{{ route('admin.partners') }}" class="text-indigo-600 font-bold hover:text-indigo-800 flex items-center gap-2 mb-4 transition">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
            </svg>
            Kembali ke Kelola Partner
        </a>
        <h1 class="text-3xl font-black">Tambah Partner Baru</h1>
        <p class="text-slate-500 font-medium">Buat kemitraan baru dengan partner atau sponsor.</p>
    </header>

    @if($errors->any())
    <div class="mb-6 p-4 bg-rose-50 border border-rose-200 text-rose-700 rounded-2xl font-semibold">
        <ul class="list-disc list-inside">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <div class="bg-white rounded-[2.5rem] border border-slate-100 shadow-sm overflow-hidden p-8 max-w-2xl">
        <form action="{{ route('admin.partners.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf
            
            <div class="space-y-2">
                <label for="name" class="block font-black text-slate-700">Nama Partner</label>
                <input type="text" name="name" id="name" value="{{ old('name') }}" placeholder="Contoh: Google Cloud Indonesia"
                    class="w-full px-5 py-3 rounded-xl border-slate-200 border bg-white focus:ring-2 focus:ring-indigo-500 outline-none transition" required>
            </div>

            <div class="space-y-4 border-t pt-4">
                <h3 class="font-black text-slate-700">Logo Partner</h3>
                <p class="text-xs text-slate-400 font-semibold uppercase tracking-wider">Silakan pilih salah satu opsi di bawah ini:</p>
                
                <!-- Opsi 1: Upload File -->
                <div class="p-5 bg-slate-50 rounded-2xl border border-slate-200 space-y-2">
                    <label for="logo" class="block font-bold text-slate-700">Opsi A: Unggah Berkas Logo</label>
                    <input type="file" name="logo" id="logo" 
                        class="w-full text-slate-500 file:mr-4 file:py-2 file:px-4 file:rounded-xl file:border-0 file:text-sm file:font-bold file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100 transition">
                    <p class="text-xs text-slate-400 font-medium">Format: JPEG, PNG, JPG, GIF, SVG (Maks. 2MB)</p>
                </div>

                <!-- Opsi 2: Input URL -->
                <div class="p-5 bg-slate-50 rounded-2xl border border-slate-200 space-y-2">
                    <label for="logo_url" class="block font-bold text-slate-700">Opsi B: Masukkan URL Logo Gambar</label>
                    <input type="url" name="logo_url" id="logo_url" value="{{ old('logo_url') }}" placeholder="https://contoh.com/logo.png"
                        class="w-full px-5 py-3 rounded-xl border-slate-200 border bg-white focus:ring-2 focus:ring-indigo-500 outline-none transition">
                    <p class="text-xs text-slate-400 font-medium">Gunakan opsi ini jika ingin menggunakan gambar dari internet/CDN luar.</p>
                </div>
            </div>

            <div class="pt-6 border-t flex justify-end gap-3">
                <a href="{{ route('admin.partners') }}" class="px-6 py-3 bg-slate-100 text-slate-700 rounded-xl font-bold hover:bg-slate-200 transition">Batal</a>
                <button type="submit" class="px-6 py-3 bg-indigo-600 text-white rounded-xl font-bold hover:bg-indigo-700 transition">Simpan Partner</button>
            </div>
        </form>
    </div>
</main>
@endsection
