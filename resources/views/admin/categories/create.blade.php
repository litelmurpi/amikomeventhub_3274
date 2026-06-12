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
                <input type="text" name="name" id="name" value="{{ old('name') }}" required placeholder="Masukkan nama kategori" 
                    class="w-full md:w-1/2 px-5 py-3 rounded-xl border-slate-200 border bg-white focus:ring-2 focus:ring-indigo-500 outline-none transition">
                @error('name') <p class="text-rose-500 text-xs mt-1">{{ $message }}</p> @enderror
            </div>

            <!-- Slug -->
            <div>
                <label class="block text-sm font-bold text-slate-700 mb-2">Slug Kategori (URL) *</label>
                <div class="flex gap-2 w-full md:w-1/2">
                    <input type="text" id="slug" name="slug" value="{{ old('slug') }}" required placeholder="kategori-slug" 
                        class="flex-1 px-5 py-3 rounded-xl border-slate-200 border bg-slate-50 text-slate-500 focus:ring-2 focus:ring-indigo-500 outline-none transition font-mono text-sm" readonly>
                    <button type="button" id="toggle-slug-lock" class="px-4 py-3 bg-slate-100 hover:bg-slate-200 text-slate-600 rounded-xl font-bold transition flex items-center gap-1.5 text-sm select-none">
                        <svg id="lock-icon" class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                        </svg>
                        <span>Kunci</span>
                    </button>
                </div>
                <p class="text-slate-400 text-xs mt-1.5">Akan terisi otomatis berdasarkan nama kategori. Klik tombol gembok untuk mengubah manual jika diperlukan.</p>
                @error('slug') <p class="text-rose-500 text-xs mt-1">{{ $message }}</p> @enderror
            </div>

            <div class="pt-6 border-t border-slate-100 flex justify-start">
                <button type="submit" class="px-8 py-4 bg-indigo-600 text-white rounded-2xl font-bold shadow-lg shadow-indigo-100 hover:bg-indigo-700 active:scale-95 transition">
                    Simpan Kategori
                </button>
            </div>
        </form>
    </div>

    <script>
        const nameInput = document.getElementById('name');
        const slugInput = document.getElementById('slug');
        const lockBtn = document.getElementById('toggle-slug-lock');
        const lockIcon = document.getElementById('lock-icon');
        let isLocked = true;

        function generateSlug(text) {
            return text.toString().toLowerCase()
                .replace(/\s+/g, '-')           // Replace spaces with -
                .replace(/[^\w\-]+/g, '')       // Remove all non-word chars
                .replace(/\-\-+/g, '-')         // Replace multiple - with single -
                .replace(/^-+/, '')             // Trim - from start of text
                .replace(/-+$/, '');            // Trim - from end of text
        }

        if (nameInput && slugInput) {
            nameInput.addEventListener('input', function() {
                if (isLocked) {
                    slugInput.value = generateSlug(nameInput.value);
                }
            });
        }

        if (lockBtn) {
            lockBtn.addEventListener('click', function() {
                isLocked = !isLocked;
                if (isLocked) {
                    slugInput.readOnly = true;
                    slugInput.classList.remove('bg-white', 'text-slate-850');
                    slugInput.classList.add('bg-slate-50', 'text-slate-500');
                    lockBtn.querySelector('span').textContent = 'Kunci';
                    lockIcon.innerHTML = '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>';
                    // Re-sync slug with current name
                    slugInput.value = generateSlug(nameInput.value);
                } else {
                    slugInput.readOnly = false;
                    slugInput.classList.remove('bg-slate-50', 'text-slate-500');
                    slugInput.classList.add('bg-white', 'text-slate-850');
                    lockBtn.querySelector('span').textContent = 'Buka';
                    lockIcon.innerHTML = '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 11V7a4 4 0 118 0m-4 8v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2z"></path>';
                }
            });
        }
    </script>
</main>
@endsection
