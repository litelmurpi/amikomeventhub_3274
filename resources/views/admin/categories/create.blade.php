@extends('layouts.admin.admin')

@section('title', 'Tambah Kategori - Admin Amikom Event Hub')

@section('content')
<main class="flex-1 p-10 overflow-y-auto">
    <header class="flex justify-between items-center mb-10">
        <div>
            <h1 class="text-3xl font-black">Tambah Kategori</h1>
            <p class="text-slate-500 font-medium">Tambahkan kategori baru untuk event.</p>
        </div>
        <a href="{{ route('admin.categories') }}" class="px-6 py-3 bg-slate-100 text-slate-600 rounded-2xl font-bold hover:bg-slate-200 transition">
            Kembali
        </a>
    </header>

    <div class="bg-white rounded-[2.5rem] border border-slate-100 shadow-sm overflow-hidden p-8">
        <form action="{{ route('admin.categories.store') }}" method="POST" class="space-y-6">
            @csrf

            <!-- Name -->
            <div>
                <label class="block text-sm font-bold text-slate-700 mb-2">Nama Kategori *</label>
                <input type="text" name="name" value="{{ old('name') }}" required placeholder="Masukkan nama kategori" 
                    class="w-full md:w-1/2 px-5 py-3 rounded-xl border-slate-200 border bg-white focus:ring-2 focus:ring-indigo-500 outline-none transition">
                @error('name') <p class="text-rose-500 text-xs mt-1">{{ $message }}</p> @enderror
            </div>

            <div class="pt-6 border-t border-slate-100 flex justify-start">
                <button type="submit" class="px-8 py-4 bg-indigo-600 text-white rounded-2xl font-bold shadow-lg shadow-indigo-100 hover:bg-indigo-700 active:scale-95 transition">
                    Simpan Kategori
                </button>
            </div>
        </form>
    </div>
</main>
@endsection
