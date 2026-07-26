@extends('layouts.organizer.organizer')

@section('title', 'Profil Organisasi - Amikom Event Hub')

@section('content')
<main class="flex-1 p-10 overflow-y-auto">
    <header class="flex justify-between items-center mb-10">
        <div>
            <h1 class="text-3xl font-black">Profil Organisasi</h1>
            <p class="text-slate-500 font-medium">Perbarui informasi dan logo organisasi {{ $org->name }}.</p>
        </div>
        <a href="{{ route('organizer.dashboard') }}" class="px-6 py-3 bg-slate-100 text-slate-600 rounded-2xl font-bold hover:bg-slate-200 transition">
            Kembali
        </a>
    </header>

    @if(session('success'))
        <div class="mb-8 p-4 bg-green-50 border border-green-100 text-green-700 rounded-2xl font-bold flex items-center gap-2">
            <span>✓</span> {{ session('success') }}
        </div>
    @endif

    <div class="max-w-3xl bg-white rounded-[2.5rem] border border-slate-100 shadow-sm overflow-hidden p-8">
        <form action="{{ route('organizer.profile.update') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf
            @method('PUT')

            <div>
                <label class="block text-sm font-bold text-slate-700 mb-2">Nama Organisasi *</label>
                <input type="text" name="name" value="{{ old('name', $org->name) }}" required
                    class="w-full px-5 py-3 rounded-xl border-slate-200 border bg-white focus:ring-2 focus:ring-indigo-500 outline-none transition">
                @error('name') <p class="text-rose-500 text-xs mt-1">{{ $message }}</p> @enderror
            </div>

            <div>
                <label class="block text-sm font-bold text-slate-700 mb-2">Deskripsi Organisasi</label>
                <textarea name="description" rows="4" placeholder="Jelaskan mengenai organisasi Anda..."
                    class="w-full px-5 py-3 rounded-xl border-slate-200 border bg-white focus:ring-2 focus:ring-indigo-500 outline-none transition">{{ old('description', $org->description) }}</textarea>
                @error('description') <p class="text-rose-500 text-xs mt-1">{{ $message }}</p> @enderror
            </div>

            <div>
                <label class="block text-sm font-bold text-slate-700 mb-2">Logo Organisasi</label>
                @if($org->logo_path)
                    <div class="mb-3">
                        <img src="{{ asset($org->logo_path) }}" alt="Logo" class="w-24 h-24 rounded-xl object-cover border shadow-sm">
                    </div>
                @endif
                <input type="file" name="logo" accept="image/*"
                    class="w-full px-5 py-3 rounded-xl border-slate-200 border bg-white focus:ring-2 focus:ring-indigo-500 outline-none transition">
                @error('logo') <p class="text-rose-500 text-xs mt-1">{{ $message }}</p> @enderror
            </div>

            <div class="pt-6 border-t border-slate-100 flex justify-end">
                <button type="submit" class="px-8 py-4 bg-indigo-600 text-white rounded-2xl font-bold shadow-lg shadow-indigo-100 hover:bg-indigo-700 active:scale-95 transition">
                    Simpan Perubahan
                </button>
            </div>
        </form>
    </div>
</main>
@endsection
