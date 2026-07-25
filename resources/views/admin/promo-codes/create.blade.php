@extends('layouts.admin.admin')

@section('title', 'Tambah Kode Promo - Admin Dashboard')

@section('content')
<main class="max-w-3xl mx-auto p-10 overflow-y-auto">
    <header class="mb-10">
        <a href="{{ route('admin.promo-codes.index') }}" class="text-indigo-600 font-bold flex items-center gap-2 mb-6">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
            </svg>
            Kembali ke Daftar Promo
        </a>
        <h1 class="text-3xl font-black">Tambah Kode Promo Baru</h1>
        <p class="text-slate-500 font-medium">Buat kode promo global atau khusus untuk event tertentu.</p>
    </header>

    @if($errors->any())
        <div class="mb-6 p-4 bg-red-50 border border-red-100 text-red-700 rounded-2xl text-sm font-bold">
            <ul class="list-disc pl-5 space-y-1">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="bg-white rounded-[2.5rem] border border-slate-100 p-8 shadow-sm">
        <form action="{{ route('admin.promo-codes.store') }}" method="POST" class="space-y-6">
            @csrf

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label for="code" class="block text-sm font-bold text-slate-700 mb-2 uppercase tracking-wide">Kode Promo</label>
                    <input type="text" name="code" id="code" placeholder="CONTOH: RAMADHAN20"
                        class="w-full px-5 py-4 border-2 border-slate-100 focus:border-indigo-600 rounded-2xl outline-none transition font-mono font-bold uppercase"
                        required value="{{ old('code') }}">
                    <p class="text-[10px] text-slate-400 mt-2 font-bold uppercase">*Hanya huruf dan angka, tanpa spasi</p>
                </div>
                <div>
                    <label for="is_active" class="block text-sm font-bold text-slate-700 mb-2 uppercase tracking-wide">Status</label>
                    <div class="mt-4">
                        <label class="inline-flex items-center cursor-pointer select-none">
                            <input type="checkbox" name="is_active" id="is_active" checked value="1"
                                class="w-5 h-5 rounded-lg text-indigo-600 border-slate-300 focus:ring-indigo-500 accent-indigo-600 cursor-pointer">
                            <span class="ml-3 font-bold text-slate-700">Aktifkan Kode Promo</span>
                        </label>
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label for="type" class="block text-sm font-bold text-slate-700 mb-2 uppercase tracking-wide">Tipe Potongan</label>
                    <select name="type" id="type" class="w-full px-5 py-4 bg-white border-2 border-slate-100 focus:border-indigo-600 rounded-2xl outline-none transition font-bold" required>
                        <option value="fixed" {{ old('type') == 'fixed' ? 'selected' : '' }}>Nominal Tetap (Rupiah)</option>
                        <option value="percent" {{ old('type') == 'percent' ? 'selected' : '' }}>Persentase (%)</option>
                    </select>
                </div>
                <div>
                    <label for="value" class="block text-sm font-bold text-slate-700 mb-2 uppercase tracking-wide">Nilai Potongan</label>
                    <input type="number" name="value" id="value" placeholder="Contoh: 10000 atau 15"
                        class="w-full px-5 py-4 border-2 border-slate-100 focus:border-indigo-600 rounded-2xl outline-none transition font-bold"
                        required min="1" value="{{ old('value') }}">
                </div>
            </div>

            <div>
                <label for="event_id" class="block text-sm font-bold text-slate-700 mb-2 uppercase tracking-wide">Batasan Event (Opsional)</label>
                <select name="event_id" id="event_id" class="w-full px-5 py-4 bg-white border-2 border-slate-100 focus:border-indigo-600 rounded-2xl outline-none transition font-bold">
                    <option value="">Berlaku Global (Untuk Semua Event)</option>
                    @foreach($events as $event)
                        <option value="{{ $event->id }}" {{ old('event_id') == $event->id ? 'selected' : '' }}>{{ $event->title }}</option>
                    @endforeach
                </select>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label for="max_uses" class="block text-sm font-bold text-slate-700 mb-2 uppercase tracking-wide">Kuota Penggunaan</label>
                    <input type="number" name="max_uses" id="max_uses" placeholder="Contoh: 100"
                        class="w-full px-5 py-4 border-2 border-slate-100 focus:border-indigo-600 rounded-2xl outline-none transition font-bold"
                        required min="0" value="{{ old('max_uses', 0) }}">
                    <p class="text-[10px] text-slate-400 mt-2 font-bold uppercase">*Set 0 untuk penggunaan tanpa batas</p>
                </div>
                <div>
                    <label for="valid_until" class="block text-sm font-bold text-slate-700 mb-2 uppercase tracking-wide">Masa Berlaku (Sampai)</label>
                    <input type="datetime-local" name="valid_until" id="valid_until"
                        class="w-full px-5 py-4 border-2 border-slate-100 focus:border-indigo-600 rounded-2xl outline-none transition font-semibold"
                        value="{{ old('valid_until') }}">
                    <p class="text-[10px] text-slate-400 mt-2 font-bold uppercase">*Kosongkan jika berlaku selamanya</p>
                </div>
            </div>

            <div class="pt-4 border-t flex justify-end gap-3">
                <a href="{{ route('admin.promo-codes.index') }}" class="px-6 py-4 bg-slate-50 text-slate-500 rounded-2xl font-bold hover:bg-slate-100 transition">
                    Batal
                </a>
                <button type="submit" class="px-8 py-4 bg-indigo-600 text-white rounded-2xl font-bold shadow-lg shadow-indigo-100 hover:bg-indigo-700 hover:shadow-xl transition-all">
                    Simpan Promo
                </button>
            </div>
        </form>
    </div>
</main>
@endsection
