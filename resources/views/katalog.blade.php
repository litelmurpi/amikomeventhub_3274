@extends('layouts.app')

@section('title', 'Katalog - Amikom Event Hub')

@section('content')
<div class="max-w-7xl mx-auto px-6 py-24 min-h-screen space-y-12">
    <div class="flex flex-col gap-6 border-b border-slate-100 pb-8">
        <div class="space-y-2">
            <h1 class="text-4xl font-extrabold tracking-tighter">Katalog <span class="text-electric">Event</span></h1>
            <p class="text-slate-500 font-medium">Temukan event menarik yang sesuai dengan minatmu.</p>
        </div>
        
        <!-- Filters (Dynamic) -->
        <div class="flex gap-2 overflow-x-auto pb-2 no-scrollbar">
            <a href="{{ route('katalog') }}" class="px-6 py-2.5 rounded-xl text-sm font-bold whitespace-nowrap transition-all duration-300 {{ !request('category') ? 'bg-electric text-white shadow-lg shadow-electric/25' : 'bg-white border border-slate-200 text-slate-500 hover:border-electric hover:text-electric' }}">
                Semua
            </a>
            @foreach($categories as $category)
                <a href="{{ route('katalog', ['category' => $category->slug]) }}" class="px-6 py-2.5 rounded-xl text-sm font-bold whitespace-nowrap transition-all duration-300 {{ request('category') == $category->slug ? 'bg-electric text-white shadow-lg shadow-electric/25' : 'bg-white border border-slate-200 text-slate-500 hover:border-electric hover:text-electric' }}">
                    {{ $category->name }}
                </a>
            @endforeach
        </div>
    </div>

    <!-- Event Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
        @forelse($events as $event)
            @php
                $isEven = $loop->iteration % 2 == 0;
                $hoverBorderClass = $isEven ? 'hover:border-vibrant' : 'hover:border-electric';
                $circleClass = $isEven ? 'bg-yellow-50 dark:bg-yellow-900/10' : 'bg-blue-50 dark:bg-blue-900/10';
                $badgeClass = $isEven ? 'bg-yellow-50 dark:bg-yellow-900/30 text-yellow-600 dark:text-vibrant' : 'bg-blue-50 dark:bg-blue-900/30 text-electric';
                $titleHoverClass = $isEven ? 'group-hover:text-vibrant' : 'group-hover:text-electric';
                $btnClass = $isEven ? 'bg-vibrant text-black hover:shadow-lg hover:shadow-vibrant/30' : 'bg-electric text-white hover:shadow-lg hover:shadow-electric/30';
            @endphp

            <article onclick="window.location='{{ route('event-detail', $event->slug) }}'" class="group relative bg-white dark:bg-dark-card rounded-[2.5rem] p-8 border border-slate-100 dark:border-gray-800 {{ $hoverBorderClass }} hover:shadow-2xl transition-all duration-300 overflow-hidden cursor-pointer">
                <div class="absolute -top-12 -right-12 w-48 h-48 {{ $circleClass }} rounded-full group-hover:scale-110 transition-transform duration-500"></div>
                
                <div class="relative z-10 space-y-6">
                    <div class="flex justify-between items-start">
                        <span class="px-4 py-1.5 {{ $badgeClass }} text-[10px] font-extrabold uppercase tracking-widest rounded-full">{{ $event->category->name ?? 'Uncategorized' }}</span>
                        <span class="text-slate-400 dark:text-gray-700 font-bold text-xs uppercase tracking-tighter italic">{{ $event->date }}</span>
                    </div>
                    
                    <h2 class="text-2xl font-extrabold tracking-tight {{ $titleHoverClass }} transition-colors duration-300">{{ $event->title }}</h2>
                    
                    <div class="space-y-3">
                        <div class="flex items-center gap-2 text-slate-500 text-sm font-medium">
                            <i class="ph-bold ph-map-pin text-electric"></i>
                            <span>{{ $event->location }}</span>
                        </div>
                        <div class="flex items-center gap-2 text-slate-500 text-sm font-medium">
                            <i class="ph-bold ph-wallet text-vibrant"></i>
                            <span>{{ $event->price }}</span>
                        </div>
                    </div>

                    <div class="pt-4 flex items-center gap-4">
                        <a href="{{ route('event-detail', $event->slug) }}" class="flex-grow py-3 {{ $btnClass }} rounded-2xl font-bold transition-all duration-300 text-center">Daftar Sekarang</a>
                        <button class="p-3 bg-slate-50 dark:bg-gray-800 rounded-2xl text-slate-400 hover:text-red-500 transition-colors duration-300">
                            <i class="ph-bold ph-heart"></i>
                        </button>
                    </div>
                </div>
            </article>
        @empty
            <div class="col-span-2 py-20 flex flex-col items-center justify-center text-center space-y-4 bg-white dark:bg-dark-card rounded-[2.5rem] border border-dashed border-slate-200 dark:border-gray-800">
                <div class="w-20 h-20 bg-slate-50 dark:bg-gray-800 rounded-full flex items-center justify-center text-slate-400">
                    <i class="ph-bold ph-calendar-x text-4xl"></i>
                </div>
                <div>
                    <h3 class="text-2xl font-extrabold text-slate-400">Belum ada event</h3>
                    <p class="text-slate-300 mt-2 font-medium">Tidak ada event yang ditemukan di kategori ini.</p>
                </div>
            </div>
        @endforelse
    </div>
</div>
@endsection
