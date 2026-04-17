@extends('layouts.app')

@section('title', 'Katalog - Amikom Event Hub')

@section('content')
<div class="space-y-12">
    <div class="flex flex-col md:flex-row md:items-end justify-between gap-6">
        <div class="space-y-2">
            <h1 class="text-4xl font-extrabold tracking-tighter">Katalog <span class="text-vibrant">Event</span></h1>
            <p class="text-gray-400 font-medium">Temukan event menarik yang sesuai dengan minatmu.</p>
        </div>
        
        <!-- Filters (Simulated) -->
        <div class="flex gap-2 overflow-x-auto pb-2 md:pb-0 no-scrollbar">
            <button class="px-6 py-2 bg-electric text-white rounded-xl text-sm font-bold whitespace-nowrap">Semua</button>
            <button class="px-6 py-2 bg-white dark:bg-dark-card border border-gray-100 dark:border-gray-800 rounded-xl text-sm font-bold text-gray-400 whitespace-nowrap hover:border-vibrant transition-all">Seminar</button>
            <button class="px-6 py-2 bg-white dark:bg-dark-card border border-gray-100 dark:border-gray-800 rounded-xl text-sm font-bold text-gray-400 whitespace-nowrap hover:border-vibrant transition-all">Workshop</button>
            <button class="px-6 py-2 bg-white dark:bg-dark-card border border-gray-100 dark:border-gray-800 rounded-xl text-sm font-bold text-gray-400 whitespace-nowrap hover:border-vibrant transition-all">Lomba</button>
        </div>
    </div>

    <!-- Event Grid -->
    <div class="grid md:grid-cols-2 gap-8">
        <!-- Event 1 -->
        <article class="group relative bg-white dark:bg-dark-card rounded-[2.5rem] p-8 border border-gray-100 dark:border-gray-800 hover:border-electric transition-all overflow-hidden cursor-pointer">
            <div class="absolute -top-12 -right-12 w-48 h-48 bg-blue-50 dark:bg-blue-900/10 rounded-full group-hover:scale-110 transition-transform"></div>
            
            <div class="relative z-10 space-y-6">
                <div class="flex justify-between items-start">
                    <span class="px-4 py-1.5 bg-blue-50 dark:bg-blue-900/30 text-electric text-[10px] font-extrabold uppercase tracking-widest rounded-full">Seminar</span>
                    <span class="text-gray-300 dark:text-gray-700 font-bold text-xs uppercase tracking-tighter italic">12 Apr 2026</span>
                </div>
                
                <h2 class="text-2xl font-extrabold tracking-tight group-hover:text-electric transition-colors">Seminar Teknologi Web Modern</h2>
                
                <div class="space-y-3">
                    <div class="flex items-center gap-2 text-gray-400 text-sm font-medium">
                        <i class="ph-bold ph-map-pin text-electric"></i>
                        <span>Gedung 4, Ruang 4.2.1</span>
                    </div>
                    <div class="flex items-center gap-2 text-gray-400 text-sm font-medium">
                        <i class="ph-bold ph-wallet text-vibrant"></i>
                        <span>Gratis</span>
                    </div>
                </div>

                <div class="pt-4 flex items-center gap-4">
                    <button class="flex-grow py-3 bg-electric text-white rounded-2xl font-bold hover:shadow-lg hover:shadow-electric/30 transition-all">Daftar Sekarang</button>
                    <button class="p-3 bg-gray-50 dark:bg-gray-800 rounded-2xl text-gray-400 hover:text-red-500 transition-colors">
                        <i class="ph-bold ph-heart"></i>
                    </button>
                </div>
            </div>
        </article>

        <!-- Event 2 -->
        <article class="group relative bg-white dark:bg-dark-card rounded-[2.5rem] p-8 border border-gray-100 dark:border-gray-800 hover:border-vibrant transition-all overflow-hidden cursor-pointer">
            <div class="absolute -top-12 -right-12 w-48 h-48 bg-yellow-50 dark:bg-yellow-900/10 rounded-full group-hover:scale-110 transition-transform"></div>
            
            <div class="relative z-10 space-y-6">
                <div class="flex justify-between items-start">
                    <span class="px-4 py-1.5 bg-yellow-50 dark:bg-yellow-900/30 text-yellow-600 dark:text-vibrant text-[10px] font-extrabold uppercase tracking-widest rounded-full">Workshop</span>
                    <span class="text-gray-300 dark:text-gray-700 font-bold text-xs uppercase tracking-tighter italic">15 Apr 2026</span>
                </div>
                
                <h2 class="text-2xl font-extrabold tracking-tight group-hover:text-yellow-600 dark:group-hover:text-vibrant transition-colors">Workshop UI/UX Design Fundamentals</h2>
                
                <div class="space-y-3">
                    <div class="flex items-center gap-2 text-gray-400 text-sm font-medium">
                        <i class="ph-bold ph-map-pin text-electric"></i>
                        <span>Lab Komputer 5</span>
                    </div>
                    <div class="flex items-center gap-2 text-gray-400 text-sm font-medium">
                        <i class="ph-bold ph-wallet text-vibrant"></i>
                        <span>Rp 25.000</span>
                    </div>
                </div>

                <div class="pt-4 flex items-center gap-4">
                    <button class="flex-grow py-3 bg-vibrant text-black rounded-2xl font-bold hover:shadow-lg hover:shadow-vibrant/30 transition-all">Daftar Sekarang</button>
                    <button class="p-3 bg-gray-50 dark:bg-gray-800 rounded-2xl text-gray-400 hover:text-red-500 transition-colors">
                        <i class="ph-bold ph-heart"></i>
                    </button>
                </div>
            </div>
        </article>

        <!-- Upcoming (Coming Soon) -->
        <article class="bg-gray-50/50 dark:bg-dark-card/30 rounded-[2.5rem] p-8 border border-dashed border-gray-200 dark:border-gray-800 flex flex-col items-center justify-center text-center space-y-4">
            <div class="w-16 h-16 bg-gray-100 dark:bg-gray-800 rounded-full flex items-center justify-center text-gray-300">
                <i class="ph-bold ph-clock text-3xl"></i>
            </div>
            <div>
                <h3 class="text-xl font-bold text-gray-400">Lomba Inovasi Mahasiswa</h3>
                <p class="text-gray-300 text-sm italic">Segera Hadir • 20 April 2026</p>
            </div>
        </article>
    </div>
</div>
@endsection
