@extends('layouts.admin.admin')

@section('title', 'Kelola Kategori - Admin Amikom Event Hub')

@section('content')
<header class="flex flex-col sm:flex-row justify-between sm:items-center gap-4 mb-6 md:mb-10">
    <div>
        <h1 class="text-2xl md:text-3xl font-black text-slate-800">Kelola Kategori</h1>
        <p class="text-sm md:text-base text-slate-500 font-medium">Atur kategori event untuk mempermudah pencarian.</p>
    </div>
    <a href="{{ route('admin.categories.create') }}"
        class="inline-flex items-center justify-center px-6 py-3 bg-indigo-600 text-white rounded-2xl font-bold text-sm md:text-base shadow-lg shadow-indigo-100 hover:bg-indigo-700 active:scale-95 transition">
        + Tambah Kategori
    </a>
</header>

<div class="bg-white rounded-2xl md:rounded-[2.5rem] border border-slate-100 shadow-sm overflow-hidden">
    <div class="p-4 md:px-8 md:py-6 bg-slate-50/50 border-b">
        <form method="GET" action="{{ route('admin.categories') }}" id="search-form" class="flex flex-col sm:flex-row gap-2">
            <input type="text" name="search" id="search-input" value="{{ request('search') }}" placeholder="Cari nama kategori..."
                class="flex-1 px-4 md:px-5 py-2.5 md:py-3 rounded-xl border-slate-200 border bg-white focus:ring-2 focus:ring-indigo-500 outline-none text-sm transition">
            <div class="flex gap-2">
                <button type="submit" class="flex-1 sm:flex-none px-6 py-2.5 md:py-3 bg-indigo-600 text-white rounded-xl font-bold text-sm hover:bg-indigo-700 transition">Cari</button>
                @if(request('search'))
                    <a href="{{ route('admin.categories') }}" class="px-4 py-2.5 md:py-3 bg-slate-200 text-slate-700 rounded-xl font-bold text-sm hover:bg-slate-300 transition flex items-center justify-center">Reset</a>
                @endif
            </div>
        </form>
    </div>

    <div class="overflow-x-auto">
        <table class="w-full text-left border-collapse min-w-[500px]">
            <thead class="bg-slate-50 text-slate-400 uppercase text-[10px] font-black tracking-widest">
                <tr>
                    <th class="px-6 py-4 w-12">No</th>
                    <th class="px-6 py-4">Nama Kategori</th>
                    <th class="px-6 py-4">Slug</th>
                    <th class="px-6 py-4">Jumlah Event</th>
                    <th class="px-6 py-4">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y border-t">
                @foreach($categories as $category)
                <tr class="hover:bg-slate-50/50 transition">
                    <td class="px-6 py-4 font-bold text-slate-400 text-sm">{{ $loop->iteration }}</td>
                    <td class="px-6 py-4">
                        <p class="font-black text-slate-800 text-sm md:text-base">{{ $category->name }}</p>
                    </td>
                    <td class="px-6 py-4">
                        <span class="px-3 py-1 bg-slate-100 text-slate-600 rounded-lg text-xs font-mono font-bold">{{ $category->slug }}</span>
                    </td>
                    <td class="px-6 py-4 font-bold text-indigo-600 text-sm">
                        {{ $category->events_count }} Event
                    </td>
                    <td class="px-6 py-4">
                        <div class="flex gap-2">
                            <a href="{{ route('admin.categories.edit', $category->id) }}"
                                class="p-2 md:p-2.5 bg-indigo-50 text-indigo-600 rounded-xl hover:bg-indigo-600 hover:text-white transition" title="Edit">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M11 5H6a2 2 0 00-2 2v11a2 2 0 00-2 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z">
                                    </path>
                                </svg>
                            </a>
                            <form action="{{ route('admin.categories.destroy', $category->id) }}" method="POST" class="inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus kategori ini?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="p-2 md:p-2.5 bg-rose-50 text-rose-600 rounded-xl hover:bg-rose-600 hover:text-white transition" title="Hapus">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16">
                                        </path>
                                    </svg>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<script>
    let searchTimeout = null;
    const searchInput = document.getElementById('search-input');
    const searchForm = document.getElementById('search-form');

    if (searchInput && searchForm) {
        searchInput.addEventListener('input', function() {
            clearTimeout(searchTimeout);
            searchTimeout = setTimeout(() => {
                searchForm.submit();
            }, 500);
        });

        if (searchInput.value) {
            const val = searchInput.value;
            searchInput.value = '';
            searchInput.focus();
            searchInput.value = val;
        }
    }
</script>
@endsection
