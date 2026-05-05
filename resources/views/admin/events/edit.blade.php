@extends('layouts.admin.admin')

@section('title', 'Edit Event - Amikom Event Hub')

@section('content')
<main class="flex-1 p-10 overflow-y-auto">
    <header class="flex justify-between items-center mb-10">
        <div>
            <h1 class="text-3xl font-black">Edit Event</h1>
            <p class="text-slate-500 font-medium">Ubah informasi event Anda di bawah ini.</p>
        </div>
        <a href="{{ route('admin.events') }}" class="px-6 py-3 bg-slate-100 text-slate-600 rounded-2xl font-bold hover:bg-slate-200 transition">
            Kembali
        </a>
    </header>

    <div class="bg-white rounded-[2.5rem] border border-slate-100 shadow-sm overflow-hidden p-8">
        <form action="{{ route('admin.events.update', $event->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf
            @method('PUT')

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Title -->
                <div>
                    <label class="block text-sm font-bold text-slate-700 mb-2">Nama Event *</label>
                    <input type="text" name="title" value="{{ old('title', $event->title) }}" required placeholder="Masukkan nama event" 
                        class="w-full px-5 py-3 rounded-xl border-slate-200 border bg-white focus:ring-2 focus:ring-indigo-500 outline-none transition">
                    @error('title') <p class="text-rose-500 text-xs mt-1">{{ $message }}</p> @enderror
                </div>

                <!-- Category -->
                <div>
                    <label class="block text-sm font-bold text-slate-700 mb-2">Kategori *</label>
                    <select name="category_id" required class="w-full px-5 py-3 rounded-xl border-slate-200 border bg-white focus:ring-2 focus:ring-indigo-500 outline-none transition">
                        <option value="">Pilih Kategori</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}" {{ old('category_id', $event->category_id) == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                        @endforeach
                    </select>
                    @error('category_id') <p class="text-rose-500 text-xs mt-1">{{ $message }}</p> @enderror
                </div>

                <!-- Date -->
                <div>
                    <label class="block text-sm font-bold text-slate-700 mb-2">Tanggal & Waktu *</label>
                    <input type="datetime-local" name="date" value="{{ old('date', date('Y-m-d\TH:i', strtotime($event->getAttributes()['date'] ?? $event->date))) }}" required 
                        class="w-full px-5 py-3 rounded-xl border-slate-200 border bg-white focus:ring-2 focus:ring-indigo-500 outline-none transition">
                    @error('date') <p class="text-rose-500 text-xs mt-1">{{ $message }}</p> @enderror
                </div>

                <!-- Location -->
                <div>
                    <label class="block text-sm font-bold text-slate-700 mb-2">Lokasi *</label>
                    <input type="text" name="location" value="{{ old('location', $event->location) }}" required placeholder="Lokasi acara" 
                        class="w-full px-5 py-3 rounded-xl border-slate-200 border bg-white focus:ring-2 focus:ring-indigo-500 outline-none transition">
                    @error('location') <p class="text-rose-500 text-xs mt-1">{{ $message }}</p> @enderror
                </div>

                <!-- Price -->
                <div>
                    <label class="block text-sm font-bold text-slate-700 mb-2">Harga Tiket (Rp) *</label>
                    <input type="number" name="price" value="{{ old('price', $event->price_value ?? $event->getAttributes()['price']) }}" required placeholder="0 untuk gratis" min="0" 
                        class="w-full px-5 py-3 rounded-xl border-slate-200 border bg-white focus:ring-2 focus:ring-indigo-500 outline-none transition">
                    @error('price') <p class="text-rose-500 text-xs mt-1">{{ $message }}</p> @enderror
                </div>

                <!-- Stock -->
                <div>
                    <label class="block text-sm font-bold text-slate-700 mb-2">Stok Tiket *</label>
                    <input type="number" name="stock" value="{{ old('stock', $event->stock) }}" required placeholder="Jumlah tiket" min="1" 
                        class="w-full px-5 py-3 rounded-xl border-slate-200 border bg-white focus:ring-2 focus:ring-indigo-500 outline-none transition">
                    @error('stock') <p class="text-rose-500 text-xs mt-1">{{ $message }}</p> @enderror
                </div>
                
                <!-- Organizer Name -->
                <div>
                    <label class="block text-sm font-bold text-slate-700 mb-2">Nama Organizer</label>
                    <input type="text" name="organizer_name" value="{{ old('organizer_name', $event->organizer_name) }}" placeholder="Nama penyelenggara" 
                        class="w-full px-5 py-3 rounded-xl border-slate-200 border bg-white focus:ring-2 focus:ring-indigo-500 outline-none transition">
                    @error('organizer_name') <p class="text-rose-500 text-xs mt-1">{{ $message }}</p> @enderror
                </div>

                <!-- Organizer Initials -->
                <div>
                    <label class="block text-sm font-bold text-slate-700 mb-2">Inisial Organizer</label>
                    <input type="text" name="organizer_initials" value="{{ old('organizer_initials', $event->organizer_initials) }}" placeholder="Contoh: JJC" 
                        class="w-full px-5 py-3 rounded-xl border-slate-200 border bg-white focus:ring-2 focus:ring-indigo-500 outline-none transition">
                    @error('organizer_initials') <p class="text-rose-500 text-xs mt-1">{{ $message }}</p> @enderror
                </div>
            </div>

            <!-- Description -->
            <div>
                <label class="block text-sm font-bold text-slate-700 mb-2">Deskripsi 1</label>
                <textarea name="description" rows="3" placeholder="Deskripsi utama event"
                    class="w-full px-5 py-3 rounded-xl border-slate-200 border bg-white focus:ring-2 focus:ring-indigo-500 outline-none transition">{{ old('description', $event->description) }}</textarea>
                @error('description') <p class="text-rose-500 text-xs mt-1">{{ $message }}</p> @enderror
            </div>

            <!-- Description 2 -->
            <div>
                <label class="block text-sm font-bold text-slate-700 mb-2">Deskripsi Tambahan</label>
                <textarea name="description2" rows="3" placeholder="Info tambahan (opsional)"
                    class="w-full px-5 py-3 rounded-xl border-slate-200 border bg-white focus:ring-2 focus:ring-indigo-500 outline-none transition">{{ old('description2', $event->description2) }}</textarea>
                @error('description2') <p class="text-rose-500 text-xs mt-1">{{ $message }}</p> @enderror
            </div>

            <!-- Poster -->
            <div>
                <label class="block text-sm font-bold text-slate-700 mb-2">Poster Event (Opsional)</label>
                @if($event->poster_path)
                    <div class="mb-3">
                        <img src="{{ asset($event->poster_path) }}" alt="Current Poster" class="w-32 h-40 object-cover rounded-xl shadow-sm border border-slate-100">
                    </div>
                @endif
                <input type="file" name="poster" accept="image/*"
                    class="w-full px-5 py-3 rounded-xl border-slate-200 border bg-white focus:ring-2 focus:ring-indigo-500 outline-none transition">
                <p class="text-xs text-slate-400 mt-2">Biarkan kosong jika tidak ingin mengubah poster saat ini.</p>
                @error('poster') <p class="text-rose-500 text-xs mt-1">{{ $message }}</p> @enderror
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
