@extends('layouts.app')

@section('title', $event->title . ' - Amikom Event Hub')

@section('content')
@php
    $eventDate = $event->getRawOriginal('date');
    $isExpired = $eventDate && \Carbon\Carbon::parse($eventDate)->startOfDay()->isPast();
@endphp
<main class="max-w-7xl mx-auto px-4 sm:px-6 py-6 md:py-12 grid grid-cols-1 lg:grid-cols-3 gap-8 md:gap-12">
        <!-- Left: Poster -->
        <div class="lg:col-span-1">
            <div class="sticky top-24 md:top-32">
                <img src="{{ asset($event->poster_path ?? 'assets/concert.png') }}" alt="{{ $event->title }}"
                    class="w-full rounded-2xl md:rounded-[2.5rem] shadow-2xl border-4 md:border-8 border-white">
                <div class="mt-6 md:mt-8 p-6 bg-white rounded-3xl border border-slate-100 shadow-sm">
                    <h4 class="font-bold mb-4">Penyelenggara</h4>
                    <div class="flex items-center gap-4">
                        <div
                            class="w-12 h-12 bg-indigo-100 rounded-full flex items-center justify-center text-indigo-600 font-bold shrink-0">
                            {{ $event->organization ? strtoupper(substr($event->organization->name, 0, 2)) : ($event->organizer_initials ?? 'AH') }}</div>
                        <div class="min-w-0">
                            <p class="font-bold text-slate-800 truncate">{{ $event->organization->name ?? ($event->organizer_name ?? 'AmikomEventHub') }}</p>
                            <p class="text-xs text-slate-500">Verified Organizer</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Right: Details -->
        <div class="lg:col-span-2 space-y-8 md:space-y-12">
            @if(session('success'))
                <div class="p-5 bg-emerald-50 border border-emerald-100 rounded-3xl flex items-start gap-4 text-emerald-800 shadow-sm">
                    <i class="ph ph-check-circle text-2xl text-emerald-600 shrink-0"></i>
                    <div>
                        <span class="font-bold text-sm block">Berhasil</span>
                        <p class="text-xs text-emerald-600 font-semibold mt-1">{{ session('success') }}</p>
                    </div>
                </div>
            @elseif(session('error'))
                <div class="p-5 bg-rose-50 border border-rose-100 rounded-3xl flex items-start gap-4 text-rose-800 shadow-sm">
                    <i class="ph ph-warning-circle text-2xl text-rose-600 shrink-0"></i>
                    <div>
                        <span class="font-bold text-sm block">Perhatian</span>
                        <p class="text-xs text-rose-600 font-semibold mt-1">{{ session('error') }}</p>
                    </div>
                </div>
            @elseif($isExpired)
                <div class="p-5 bg-rose-50 border border-rose-100 rounded-3xl flex items-start gap-4 text-rose-800 shadow-sm">
                    <i class="ph ph-warning-circle text-2xl text-rose-600 shrink-0"></i>
                    <div>
                        <span class="font-bold text-sm block">Informasi Event</span>
                        <p class="text-xs text-rose-600 font-semibold mt-1">
                            Event ini telah berakhir. Pemesanan tiket sudah tidak tersedia.
                        </p>
                    </div>
                </div>
            @endif

            <div class="space-y-4">
                <span
                    class="px-4 py-1.5 bg-indigo-100 text-indigo-700 rounded-full text-xs sm:text-sm font-bold uppercase tracking-wider">{{ $event->category->name ?? 'Uncategorized' }}</span>
                <h1 class="text-3xl sm:text-4xl md:text-5xl font-black leading-tight text-slate-900">{{ $event->title }}</h1>
                
                <!-- Rating Ringkasan di Header Event -->
                <div class="flex items-center gap-3">
                    <div class="flex items-center gap-1 text-amber-500">
                        <i class="ph-fill ph-star text-amber-400 text-xl"></i>
                    </div>
                    <span class="font-black text-slate-800 text-lg">{{ number_format($event->average_rating, 1) }}</span>
                    <span class="text-slate-400 text-sm font-medium">({{ $event->review_count }} Ulasan Peserta)</span>
                </div>

                <div class="flex flex-wrap gap-4 sm:gap-6 text-slate-500 font-medium text-sm sm:text-base">
                    <div class="flex items-center gap-2">
                        <i class="ph ph-calendar-blank text-indigo-600 text-xl"></i>
                        <span>{{ $event->date }}</span>
                    </div>
                    <div class="flex items-center gap-2">
                        <i class="ph ph-map-pin text-indigo-600 text-xl"></i>
                        <span>{{ $event->location }}</span>
                    </div>
                </div>
            </div>

            <div class="prose prose-slate max-w-none">
                <h3 class="text-xl sm:text-2xl font-bold mb-4">Deskripsi Event</h3>
                <p class="text-base sm:text-lg text-slate-600 leading-relaxed">
                    {{ $event->description }}
                </p>
                @if($event->description2)
                <p class="text-base sm:text-lg text-slate-600 leading-relaxed mt-4">
                    {!! nl2br(e($event->description2)) !!}
                </p>
                @endif
            </div>

            <div
                class="bg-indigo-600 rounded-3xl md:rounded-[2.5rem] p-6 sm:p-8 md:p-12 text-white shadow-2xl shadow-indigo-200 relative overflow-hidden">
                <div class="relative z-10 flex flex-col sm:flex-row justify-between items-start sm:items-center gap-6">
                    <div>
                        <p class="text-indigo-200 font-bold uppercase tracking-widest text-xs sm:text-sm mb-2">Harga Tiket</p>
                        <h2 class="text-3xl sm:text-5xl font-black">{{ $event->price }} <span class="text-base sm:text-lg font-medium text-indigo-200">/ orang</span></h2>
                        <div class="mt-4 text-indigo-100 flex items-center gap-2">
                            @if($isExpired)
                                <span class="inline-flex items-center gap-1.5 px-3 py-1 bg-slate-500/30 text-slate-300 border border-slate-500/40 rounded-lg text-xs font-bold uppercase tracking-wider">
                                    <span class="w-2 h-2 rounded-full bg-slate-400 inline-block"></span>
                                    Event Berakhir
                                </span>
                            @elseif($event->stock > 50)
                                <span class="inline-flex items-center gap-1.5 px-3 py-1 bg-emerald-500/20 text-emerald-200 border border-emerald-500/30 rounded-lg text-xs font-bold uppercase tracking-wider">
                                    <span class="w-2 h-2 rounded-full bg-emerald-400 animate-pulse inline-block"></span>
                                    Tersedia: {{ $event->stock }} tiket
                                </span>
                            @elseif($event->stock <= 50 && $event->stock > 10)
                                <span class="inline-flex items-center gap-1.5 px-3 py-1 bg-amber-500/20 text-amber-200 border border-amber-500/30 rounded-lg text-xs font-bold uppercase tracking-wider">
                                    <span class="w-2 h-2 rounded-full bg-amber-400 animate-pulse inline-block"></span>
                                    Segera Habis! Sisa {{ $event->stock }} tiket
                                </span>
                            @elseif($event->stock <= 10 && $event->stock > 0)
                                <span class="inline-flex items-center gap-1.5 px-3 py-1 bg-red-500/20 text-red-200 border border-red-500/30 rounded-lg text-xs font-bold uppercase tracking-wider animate-pulse">
                                    <span class="w-2 h-2 rounded-full bg-rose-400 animate-pulse inline-block"></span>
                                    Hampir Habis! Sisa {{ $event->stock }} tiket!
                                </span>
                            @else
                                <span class="inline-flex items-center gap-1.5 px-3 py-1 bg-slate-500/30 text-slate-300 border border-slate-500/40 rounded-lg text-xs font-bold uppercase tracking-wider">
                                    <span class="w-2 h-2 rounded-full bg-slate-400 inline-block"></span>
                                    Tiket Habis (SOLD OUT)
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="w-full sm:w-auto">
                        @if($isExpired)
                            <button disabled
                                class="w-full sm:w-auto text-center px-8 sm:px-10 py-4 sm:py-5 bg-slate-300 text-slate-500 rounded-2xl font-black text-lg sm:text-xl cursor-not-allowed shadow-inner">
                                BERAKHIR
                            </button>
                        @elseif($event->stock <= 0)
                            <button disabled
                                class="w-full sm:w-auto text-center px-8 sm:px-10 py-4 sm:py-5 bg-slate-300 text-slate-500 rounded-2xl font-black text-lg sm:text-xl cursor-not-allowed shadow-inner">
                                SOLD OUT
                            </button>
                        @elseif(Auth::check())
                            <a href="{{ route('checkout', $event->slug) }}"
                                class="w-full sm:w-auto block text-center px-8 sm:px-10 py-4 sm:py-5 bg-white text-indigo-600 rounded-2xl font-black text-lg sm:text-xl hover:scale-105 transition-transform shadow-xl">
                                Pesan Sekarang
                            </a>
                        @else
                            <button onclick="openLoginRequiredModal()"
                                class="w-full sm:w-auto text-center px-8 sm:px-10 py-4 sm:py-5 bg-white text-indigo-600 rounded-2xl font-black text-lg sm:text-xl hover:scale-105 transition-transform shadow-xl">
                                Pesan Sekarang
                            </button>
                        @endif
                    </div>
                </div>
                <!-- Decoration -->
                <div class="absolute -right-20 -bottom-20 w-64 h-64 bg-white opacity-10 rounded-full pointer-events-none"></div>
                <div class="absolute -left-10 -top-10 w-32 h-32 bg-indigo-400 opacity-20 rounded-full pointer-events-none"></div>
            </div>

            <!-- ========================================== -->
            <!-- SECTION TAMBAHAN PERSON B: REVIEW & RATING -->
            <!-- ========================================== -->
            <div id="review-section" class="bg-white rounded-3xl p-6 sm:p-8 border border-slate-100 shadow-sm space-y-6 scroll-mt-28">
                <div class="flex items-center justify-between border-b pb-4">
                    <div>
                        <h3 class="text-xl font-bold text-slate-900">Ulasan & Rating Peserta</h3>
                        <p class="text-xs text-slate-500 mt-1">Pendapat dan pengalaman dari peserta yang telah mengikuti event ini.</p>
                    </div>
                    <div class="text-right">
                        <span class="text-2xl font-black text-indigo-600">{{ number_format($event->average_rating, 1) }}</span>
                        <span class="text-slate-400 text-sm">/ 5.0</span>
                    </div>
                </div>

                <!-- Form Beri Ulasan (Hanya muncul jika user login) -->
                @auth
                    <div class="bg-slate-50 p-6 rounded-2xl border border-slate-200">
                        <h4 class="font-bold text-slate-800 mb-3">Tulis Ulasan Anda</h4>
                        <form action="{{ route('review.store', $event->slug) }}" method="POST" class="space-y-4">
                            @csrf
                            <div>
                                <label class="block text-xs font-bold text-slate-600 uppercase tracking-wider mb-2">Rating Bintang</label>
                                <select name="rating" required class="w-full md:w-1/3 px-4 py-2.5 bg-white border border-slate-200 rounded-xl font-bold text-slate-700 focus:outline-none focus:border-indigo-600">
                                    <option value="5">⭐⭐⭐⭐⭐ (5 - Sangat Memuaskan)</option>
                                    <option value="4">⭐⭐⭐⭐ (4 - Memuaskan)</option>
                                    <option value="3">⭐⭐⭐ (3 - Cukup)</option>
                                    <option value="2">⭐⭐ (2 - Kurang)</option>
                                    <option value="1">⭐ (1 - Sangat Kurang)</option>
                                </select>
                            </div>
                            <div>
                                <label class="block text-xs font-bold text-slate-600 uppercase tracking-wider mb-2">Komentar / Pesan</label>
                                <textarea name="comment" rows="3" placeholder="Ceritakan pengalaman atau masukan kamu mengenai event ini..." class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl text-slate-700 focus:outline-none focus:border-indigo-600 text-sm"></textarea>
                            </div>
                            <button type="submit" class="px-6 py-3 bg-indigo-600 hover:bg-indigo-700 text-white font-bold rounded-xl text-sm transition shadow-md shadow-indigo-100">
                                Kirim Ulasan
                            </button>
                        </form>
                    </div>
                @else
                    <div class="p-4 bg-indigo-50 border border-indigo-100 rounded-2xl text-center text-indigo-700 text-sm font-semibold">
                        Silakan <a href="{{ route('login') }}" class="underline font-bold">login</a> terlebih dahulu untuk memberikan ulasan pada event ini.
                    </div>
                @endauth

                <!-- List Daftar Ulasan -->
                <div class="space-y-4 pt-2">
                    @forelse($event->reviews()->latest()->get() as $review)
                        <div class="p-5 bg-white border border-slate-100 rounded-2xl shadow-sm space-y-2">
                            <div class="flex items-center justify-between">
                                <div class="flex items-center gap-3">
                                    <div class="w-10 h-10 bg-indigo-100 rounded-full flex items-center justify-center font-bold text-indigo-600 text-sm">
                                        {{ strtoupper(substr($review->user->name, 0, 2)) }}
                                    </div>
                                    <div>
                                        <p class="font-bold text-slate-800 text-sm">{{ $review->user->name }}</p>
                                        <p class="text-[10px] text-slate-400">{{ $review->created_at->diffForHumans() }}</p>
                                    </div>
                                </div>
                                <div class="flex items-center text-amber-500 text-sm font-bold gap-1">
                                    <i class="ph-fill ph-star text-amber-400 text-base"></i>
                                    <span>{{ $review->rating }}.0</span>
                                </div>
                            </div>
                            @if($review->comment)
                                <p class="text-slate-600 text-sm pl-13 leading-relaxed">
                                    {{ $review->comment }}
                                </p>
                            @endif
                        </div>
                    @empty
                        <div class="text-center py-8 text-slate-400 text-sm font-medium">
                            Belum ada ulasan untuk event ini. Jadilah yang pertama memberikan ulasan!
                        </div>
                    @endforelse
                </div>
            </div>
            <!-- ========================================== -->

            <div class="space-y-4">
                <h3 class="text-xl font-bold">Kebijakan Tiket</h3>
                <ul class="space-y-3 text-slate-500">
                    <li class="flex items-start gap-2">
                        <svg class="w-5 h-5 text-green-500 mt-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7">
                            </path>
                        </svg>
                        E-Ticket akan dikirimkan otomatis setelah pembayaran berhasil.
                    </li>
                    <li class="flex items-start gap-2">
                        <svg class="w-5 h-5 text-green-500 mt-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7">
                            </path>
                        </svg>
                        Tiket dapat discan di pintu masuk (Check-in).
                    </li>
                    <li class="flex items-start gap-2 text-rose-500">
                        <svg class="w-5 h-5 text-rose-500 mt-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        Tiket yang sudah dibeli tidak dapat direfund.
                    </li>
                </ul>
            </div>
        </div>
    </main>

    <!-- Modal Login Required -->
    <div id="loginRequiredModal" class="fixed inset-0 z-50 hidden items-center justify-center bg-slate-900/60 backdrop-blur-sm p-4 transition-all duration-300">
        <div class="bg-white w-full max-w-md rounded-3xl shadow-2xl border border-slate-100 overflow-hidden transform scale-95 opacity-0 transition-all duration-300" id="loginModalContent">
            <!-- Header / Icon -->
            <div class="p-8 text-center">
                <div class="w-20 h-20 bg-indigo-50 rounded-full flex items-center justify-center mx-auto mb-6 text-indigo-600">
                    <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                    </svg>
                </div>
                
                <h3 class="text-2xl font-black text-slate-800 mb-2">Yuk, Login Dulu!</h3>
                <p class="text-slate-500 leading-relaxed text-sm">Kamu perlu masuk ke akun AmikomEventHub terlebih dahulu sebelum bisa memesan tiket event ini.</p>
            </div>
            
            <!-- Action Buttons -->
            <div class="px-8 pb-8 flex flex-col gap-3">
                <a href="{{ route('login') }}" class="w-full py-4 bg-indigo-600 hover:bg-indigo-700 text-white rounded-2xl font-bold text-center transition shadow-lg shadow-indigo-200">
                    Login Sekarang
                </a>
                <a href="{{ route('register') }}" class="w-full py-4 bg-slate-50 hover:bg-slate-100 text-slate-700 rounded-2xl font-bold text-center border border-slate-200 transition">
                    Belum punya akun? Daftar
                </a>
                <button onclick="closeLoginRequiredModal()" class="w-full py-3 text-slate-400 hover:text-slate-600 font-semibold text-sm transition">
                    Batal
                </button>
            </div>
        </div>
    </div>

    <script>
        function openLoginRequiredModal() {
            const modal = document.getElementById('loginRequiredModal');
            const content = document.getElementById('loginModalContent');
            
            modal.classList.remove('hidden');
            modal.classList.add('flex');
            
            // Trigger transition
            setTimeout(() => {
                content.classList.remove('scale-95', 'opacity-0');
                content.classList.add('scale-100', 'opacity-100');
            }, 10);
        }

        function closeLoginRequiredModal() {
            const modal = document.getElementById('loginRequiredModal');
            const content = document.getElementById('loginModalContent');
            
            content.classList.remove('scale-100', 'opacity-100');
            content.classList.add('scale-95', 'opacity-0');
            
            setTimeout(() => {
                modal.classList.remove('flex');
                modal.classList.add('hidden');
            }, 300);
        }

        // Close modal if clicked outside
        window.onclick = function(event) {
            const modal = document.getElementById('loginRequiredModal');
            if (event.target === modal) {
                closeLoginRequiredModal();
            }
        }
    </script>
@endsection