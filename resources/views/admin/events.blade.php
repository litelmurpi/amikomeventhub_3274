@extends('layouts.admin.admin')

@section('title', 'Kelola Event - Amikom Event Hub')

@section('content')
<header class="flex flex-col sm:flex-row justify-between sm:items-center gap-4 mb-6 md:mb-10">
    <div>
        <h1 class="text-2xl md:text-3xl font-black text-slate-800">Kelola Event</h1>
        <p class="text-sm md:text-base text-slate-500 font-medium">Buat dan atur acara seru Anda di sini.</p>
    </div>
    <a href="{{ route('admin.events.create') }}"
        class="inline-flex items-center justify-center px-6 py-3 bg-indigo-600 text-white rounded-2xl font-bold text-sm md:text-base shadow-lg shadow-indigo-100 hover:bg-indigo-700 active:scale-95 transition">
        + Tambah Event Baru
    </a>
</header>

<div class="bg-white rounded-2xl md:rounded-[2.5rem] border border-slate-100 shadow-sm overflow-hidden">
    <div class="p-4 md:px-8 md:py-6 bg-slate-50/50 border-b">
        <form method="GET" action="{{ route('admin.events') }}" id="search-form" class="flex flex-col sm:flex-row gap-2">
            <input type="text" name="search" id="search-input" value="{{ request('search') }}" placeholder="Cari nama event..."
                class="flex-1 px-4 md:px-5 py-2.5 md:py-3 rounded-xl border-slate-200 border bg-white focus:ring-2 focus:ring-indigo-500 outline-none text-sm transition">
            
            <select name="category_id" onchange="document.getElementById('search-form').submit()" class="px-4 py-2.5 md:py-3 rounded-xl border-slate-200 border bg-white text-slate-700 focus:ring-2 focus:ring-indigo-500 outline-none text-sm font-medium transition">
                <option value="">Semua Kategori</option>
                @foreach($categories as $cat)
                    <option value="{{ $cat->id }}" {{ request('category_id') == $cat->id ? 'selected' : '' }}>{{ $cat->name }}</option>
                @endforeach
            </select>

            <div class="flex gap-2">
                <button type="submit" class="flex-1 sm:flex-none px-6 py-2.5 md:py-3 bg-indigo-600 text-white rounded-xl font-bold text-sm hover:bg-indigo-700 transition">Cari</button>
                @if(request('search') || request('category_id'))
                    <a href="{{ route('admin.events') }}" class="px-4 py-2.5 md:py-3 bg-slate-200 text-slate-700 rounded-xl font-bold text-sm hover:bg-slate-300 transition flex items-center justify-center">Reset</a>
                @endif
            </div>
        </form>
    </div>

    <div class="overflow-x-auto">
        <table class="w-full text-left border-collapse min-w-[700px]">
            <thead class="bg-slate-50 text-slate-400 uppercase text-[10px] font-black tracking-widest">
                <tr>
                    <th class="px-6 py-4 w-12">No</th>
                    <th class="px-6 py-4">Poster</th>
                    <th class="px-6 py-4">Event</th>
                    <th class="px-6 py-4">Harga / Stok</th>
                    <th class="px-6 py-4">Status</th>
                    <th class="px-6 py-4">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y border-t">
                @foreach($events as $event)
                @php
                    $isOrgInactive = $event->organization_id && !$event->organization?->isApproved();
                    $rawDate = \Carbon\Carbon::parse($event->getRawOriginal('date'));
                    $isPast = $rawDate->lt(now()->startOfDay());
                @endphp
                <tr class="hover:bg-slate-50/50 transition">
                    <td class="px-6 py-4 font-bold text-slate-400 text-sm">{{ $loop->iteration }}</td>
                    <td class="px-6 py-4">
                        <img src="{{ asset($event->poster_path ?? 'assets/concert.png') }}" class="w-12 h-16 md:w-16 md:h-20 rounded-xl object-cover shadow-sm">
                    </td>
                    <td class="px-6 py-4">
                        <p class="font-black text-slate-800 text-sm md:text-base">{{ $event->title }}</p>
                        <p class="text-xs text-slate-400">
                            {{ $event->category->name ?? 'Uncategorized' }} • {{ $event->date }}
                            @if($event->organization)
                                • <span class="font-bold text-indigo-600">{{ $event->organization->name }}</span>
                            @endif
                        </p>
                    </td>
                    <td class="px-6 py-4">
                        <p class="font-bold text-indigo-600 text-sm">{{ $event->price }}</p>
                        <p class="text-xs text-slate-400">Stok: {{ $event->stock }}</p>
                    </td>
                    <td class="px-6 py-4">
                        @if($isOrgInactive)
                            <span class="px-2.5 py-1 bg-amber-50 text-amber-700 border border-amber-200 rounded-md text-[10px] font-black uppercase tracking-wider" title="Organisasi penanggung jawab nonaktif/belum disetujui">Org Nonaktif</span>
                        @elseif($isPast)
                            <span class="px-2.5 py-1 bg-slate-100 text-slate-600 rounded-md text-[10px] font-black uppercase tracking-wider">Selesai</span>
                        @else
                            <span class="px-2.5 py-1 bg-emerald-100 text-emerald-700 rounded-md text-[10px] font-black uppercase tracking-wider">Mendatang / Aktif</span>
                        @endif
                    </td>
                    <td class="px-6 py-4">
                        <div class="flex gap-2">
                            <a href="{{ route('admin.events.edit', $event->id) }}"
                                class="p-2 md:p-2.5 bg-indigo-50 text-indigo-600 rounded-xl hover:bg-indigo-600 hover:text-white transition" title="Edit">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M11 5H6a2 2 0 00-2 2v11a2 2 0 00-2 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z">
                                    </path>
                                </svg>
                            </a>
                            <form action="{{ route('admin.events.destroy', $event->id) }}" method="POST" class="inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus event ini?');">
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