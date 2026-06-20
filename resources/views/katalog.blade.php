@extends('layouts.app')

@section('title', 'Katalog - Amikom Event Hub')

@section('content')
<div class="max-w-7xl mx-auto px-6 py-20 space-y-12 min-h-screen">
    <!-- Header & Filters -->
    <div class="flex flex-col gap-6 border-b border-slate-100 pb-8">
        <div class="space-y-2">
            <h1 class="text-4xl md:text-5xl font-extrabold tracking-tight text-slate-900">
                Katalog <span class="text-indigo-600">Event</span>
            </h1>
            <p class="text-slate-500 font-medium text-lg">Temukan event menarik yang sesuai dengan minatmu.</p>
        </div>
        
        <!-- Filters (Dynamic) -->
        <div class="flex gap-3 overflow-x-auto pb-2 no-scrollbar">
            <a href="{{ route('katalog') }}" class="px-6 py-2.5 rounded-xl text-sm font-bold whitespace-nowrap transition-all duration-300 {{ !request('category') ? 'bg-indigo-600 text-white shadow-lg shadow-indigo-200' : 'bg-white border border-slate-200 text-slate-500 hover:border-indigo-600 hover:text-indigo-600' }}">
                Semua
            </a>
            @foreach($categories as $category)
                <a href="{{ route('katalog', ['category' => $category->slug]) }}" class="px-6 py-2.5 rounded-xl text-sm font-bold whitespace-nowrap transition-all duration-300 {{ request('category') == $category->slug ? 'bg-indigo-600 text-white shadow-lg shadow-indigo-200' : 'bg-white border border-slate-200 text-slate-500 hover:border-indigo-600 hover:text-indigo-600' }}">
                    {{ $category->name }}
                </a>
            @endforeach
        </div>
    </div>

    <!-- Event Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        @forelse($events as $event)
        <div class="group bg-white rounded-3xl border border-slate-100 shadow-sm hover:shadow-2xl transition-all duration-300 overflow-hidden flex flex-col">
          <div class="relative overflow-hidden aspect-[4/3] sm:aspect-[3/4]">
            <img src="{{ asset($event->poster_path ?? 'assets/concert.png') }}" alt="{{ $event->title }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700" />
            <div class="absolute top-4 left-4 px-3 py-1 bg-white/90 backdrop-blur rounded-lg text-xs font-bold uppercase text-indigo-600">
              {{ $event->category->name ?? 'Uncategorized' }}
            </div>
          </div>
          <div class="p-6 flex flex-col flex-1">
            <h3 class="text-xl font-bold mb-2 group-hover:text-indigo-600 transition line-clamp-2">{{ $event->title }}</h3>
            
            <div class="space-y-2 mb-6">
                <div class="flex items-center gap-2 text-slate-500 text-sm font-medium">
                    <svg class="w-4 h-4 flex-shrink-0 text-indigo-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    <span class="truncate">{{ $event->date }}</span>
                </div>
                <div class="flex items-center gap-2 text-slate-500 text-sm font-medium">
                    <svg class="w-4 h-4 flex-shrink-0 text-indigo-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                    <span class="truncate">{{ $event->location }}</span>
                </div>
            </div>

            <div class="mt-auto flex justify-between items-center pt-4 border-t border-slate-100">
              <span class="text-xl font-black text-indigo-600">{{ $event->price }}</span>
              <a href="{{ route('event-detail', $event->slug) }}" class="px-5 py-2 bg-indigo-50 text-indigo-600 rounded-xl font-bold hover:bg-indigo-600 hover:text-white transition whitespace-nowrap">Lihat Detail</a>
            </div>
          </div>
        </div>
        @empty
            <div class="col-span-full py-24 flex flex-col items-center justify-center text-center space-y-4 bg-white rounded-3xl border border-slate-100 shadow-sm">
                <div class="w-20 h-20 bg-indigo-50 rounded-full flex items-center justify-center text-indigo-300">
                    <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
                <div>
                    <h3 class="text-2xl font-bold text-slate-800">Belum ada event</h3>
                    <p class="text-slate-500 mt-2 font-medium">Tidak ada event yang ditemukan untuk filter ini.</p>
                </div>
                <a href="{{ route('katalog') }}" class="mt-4 px-6 py-3 bg-indigo-50 text-indigo-600 font-bold rounded-xl hover:bg-indigo-100 transition">Reset Filter</a>
            </div>
        @endforelse
    </div>
</div>
@endsection
