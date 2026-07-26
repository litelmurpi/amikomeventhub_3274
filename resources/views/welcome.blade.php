@extends('layouts.app')

@section('title', 'Welcome - Amikom Event Hub')

@section('content')
    <!-- Hero Section -->
    <section
        class="max-w-7xl mx-auto px-4 sm:px-6 py-10 md:py-20 flex flex-col lg:flex-row items-center gap-8 md:gap-12 overflow-hidden">
        <div class="flex-1 space-y-6 sm:space-y-8 reveal">
            <span
                class="inline-block px-4 py-1.5 bg-indigo-100 text-indigo-700 rounded-full text-xs sm:text-sm font-bold uppercase tracking-wider">#1
                Event Platform</span>
            <h1 class="text-3xl sm:text-5xl md:text-7xl font-extrabold leading-tight">
                Temukan & Pesan
                <span class="text-indigo-600">Tiket Event</span> Impianmu.
            </h1>
            <p class="text-base sm:text-lg text-slate-500 max-w-lg leading-relaxed reveal reveal-delay-1">
                Dari konser musik hingga workshop teknologi, semua ada di genggamanmu.
                Pesan aman & cepat dengan Midtrans.
            </p>
            <div class="flex flex-col sm:flex-row gap-3 sm:gap-4 reveal reveal-delay-2">
                <a href="#events"
                    class="group flex items-center justify-center gap-2 px-6 sm:px-8 py-3.5 sm:py-4 bg-indigo-600 text-white rounded-2xl font-bold text-base sm:text-lg shadow-xl shadow-indigo-200 hover:scale-105 hover:shadow-indigo-300 transition-all text-center">
                    Mulai Jelajah
                    <svg class="w-5 h-5 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3">
                        </path>
                    </svg>
                </a>
                <a href="{{ route('katalog') }}"
                    class="px-6 sm:px-8 py-3.5 sm:py-4 border-2 border-slate-200 rounded-2xl font-bold text-base sm:text-lg hover:border-indigo-600 hover:text-indigo-600 transition-colors text-center">
                    Lihat Katalog
                </a>
            </div>

            <!-- Organizer Quick Link Callout -->
            <div class="pt-2 flex flex-wrap items-center gap-2 text-xs sm:text-sm text-slate-500 reveal reveal-delay-3">
                <span class="inline-block w-2 h-2 rounded-full bg-indigo-500 animate-pulse"></span>
                <span>Ingin publikasikan event HIMA / Komunitasmu?</span>
                @auth
                    <a href="{{ route('organizer.register') }}"
                        class="font-extrabold text-indigo-600 hover:text-indigo-700 underline decoration-indigo-300 underline-offset-4 transition">
                        Daftar Penyelenggara &rarr;
                    </a>
                @else
                    <a href="{{ route('login', ['info' => 'organizer']) }}"
                        class="font-extrabold text-indigo-600 hover:text-indigo-700 underline decoration-indigo-300 underline-offset-4 transition">
                        Daftar Penyelenggara &rarr;
                    </a>
                @endauth
            </div>
        </div>
        <div class="flex-1 relative reveal reveal-delay-3 w-full">
            <div
                class="absolute -top-10 -left-10 w-48 sm:w-64 h-48 sm:h-64 bg-indigo-400 rounded-full mix-blend-multiply filter blur-3xl opacity-20 animate-blob">
            </div>
            <div
                class="absolute -bottom-10 -right-10 w-48 sm:w-64 h-48 sm:h-64 bg-purple-400 rounded-full mix-blend-multiply filter blur-3xl opacity-20 animate-blob animation-delay-2000">
            </div>

            <img src="assets/concert.png" alt="Concert"
                class="rounded-[2.5rem] shadow-2xl relative z-10 w-full object-cover aspect-[4/5] object-center border-4 border-white transition-all duration-500 hover:scale-[1.01]" />

            <div
                class="absolute -bottom-4 left-2 sm:-left-6 glass p-4 sm:p-6 rounded-2xl shadow-xl z-20 border border-white hover:-translate-y-2 transition-transform duration-500 max-w-[90%] sm:max-w-none">
                <div class="flex items-center gap-3 sm:gap-4">
                    <div
                        class="w-10 h-10 sm:w-12 sm:h-12 bg-green-100 rounded-full flex items-center justify-center text-green-600 shrink-0">
                        <svg class="w-5 h-5 sm:w-6 sm:h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                    </div>
                    <div>
                        <p class="text-[10px] sm:text-xs text-slate-500 font-bold uppercase">
                            Terverifikasi
                        </p>
                        <p class="font-bold text-xs sm:text-base">Pembayaran Aman via Midtrans</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Events Grid -->
    <section id="events" class="max-w-7xl mx-auto px-4 sm:px-6 py-10 md:py-20 reveal scroll-mt-24 md:scroll-mt-28">
        <div class="flex flex-col sm:flex-row sm:items-end justify-between gap-4 mb-8 md:mb-12">
            <div>
                <h2 class="text-2xl sm:text-3xl font-extrabold mb-2">Event Terdekat</h2>
                <p class="text-slate-500 font-medium text-sm sm:text-base">
                    Jangan sampai ketinggalan acara seru minggu ini!
                </p>
            </div>
            <div class="flex gap-2">
                <a href="{{ route('katalog') }}"
                    class="px-4 py-2.5 border rounded-xl text-sm font-bold hover:bg-white hover:shadow-md hover:border-indigo-200 transition">
                    Semua Kategori &rarr;
                </a>
            </div>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 md:gap-8">
            @forelse($events as $event)
                <div
                    class="group bg-white rounded-3xl border border-slate-100 shadow-sm hover:shadow-2xl transition-all duration-300 overflow-hidden flex flex-col justify-between">
                    <div>
                        <a href="{{ route('event-detail', $event->slug) }}"
                            class="block relative overflow-hidden aspect-[3/4]">
                            <img src="{{ asset($event->poster_path ?? 'assets/concert.png') }}" alt="{{ $event->title }}"
                                class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500" />
                            <div
                                class="absolute top-4 left-4 px-3 py-1 bg-white/90 backdrop-blur rounded-lg text-xs font-bold uppercase text-indigo-600 shadow-sm">
                                {{ $event->category->name ?? 'Uncategorized' }}
                            </div>
                            @if ($event->stock > 50)
                                <div
                                    class="absolute top-4 right-4 px-2.5 py-1 bg-emerald-500 text-white rounded-lg text-[10px] font-bold uppercase tracking-wider shadow-sm">
                                    Tersedia
                                </div>
                            @elseif($event->stock <= 50 && $event->stock > 10)
                                <div
                                    class="absolute top-4 right-4 px-2.5 py-1 bg-amber-500 text-white rounded-lg text-[10px] font-bold uppercase tracking-wider shadow-sm">
                                    {{ $event->stock }} Tiket
                                </div>
                            @elseif($event->stock <= 10 && $event->stock > 0)
                                <div
                                    class="absolute top-4 right-4 px-2.5 py-1 bg-red-500 text-white rounded-lg text-[10px] font-bold uppercase tracking-wider animate-pulse shadow-sm">
                                    Sisa {{ $event->stock }}!
                                </div>
                            @else
                                <div
                                    class="absolute top-4 right-4 px-2.5 py-1 bg-slate-800 text-slate-300 rounded-lg text-[10px] font-bold uppercase tracking-wider shadow-sm">
                                    Habis
                                </div>
                            @endif
                        </a>
                        <div class="p-5 sm:p-6">
                            @if ($event->organization)
                                <p class="text-xs text-indigo-600 font-bold mb-1.5 flex items-center gap-1.5">
                                    <span class="w-2 h-2 bg-indigo-500 rounded-full inline-block"></span>
                                    {{ $event->organization->name }}
                                </p>
                            @endif
                            <a href="{{ route('event-detail', $event->slug) }}" class="block">
                                <h3
                                    class="text-lg sm:text-xl font-bold mb-2 group-hover:text-indigo-600 transition line-clamp-2">
                                    {{ $event->title }}
                                </h3>
                            </a>
                            <div class="flex items-center gap-2 text-slate-500 text-sm mb-4">
                                <svg class="w-4 h-4 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                <span class="truncate">{{ $event->date }}</span>
                            </div>
                        </div>
                    </div>

                    <div class="p-5 sm:p-6 pt-0 border-t border-slate-50 mt-auto">
                        <div class="flex justify-between items-center pt-4 gap-2">
                            <span
                                class="text-xl sm:text-2xl font-black text-indigo-600 truncate">{{ $event->price }}</span>
                            <a href="{{ route('event-detail', $event->slug) }}"
                                class="px-4 sm:px-5 py-2 bg-indigo-50 text-indigo-600 rounded-xl font-bold text-xs sm:text-sm hover:bg-indigo-600 hover:text-white transition whitespace-nowrap shrink-0">Lihat
                                Detail</a>
                        </div>
                    </div>
                </div>
            @empty
                <div class="text-center py-16 bg-white rounded-3xl border border-slate-100 shadow-sm col-span-full">
                    <div
                        class="w-16 h-16 bg-indigo-50 text-indigo-600 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                            </path>
                        </svg>
                    </div>
                    <h3 class="text-lg font-bold text-slate-800">Belum ada event terdekat</h3>
                    <p class="text-slate-400 text-sm mt-1">Cek kembali dalam waktu dekat atau jelajahi katalog kami.</p>
                </div>
            @endforelse
        </div>
    </section>

    <!-- Gallery Preview Section -->
    <section class="max-w-7xl mx-auto px-4 sm:px-6 py-10 md:py-20 border-t border-slate-100 reveal">
        <div class="flex flex-col sm:flex-row sm:items-end justify-between gap-4 mb-8 md:mb-12">
            <div>
                <h2 class="text-2xl sm:text-3xl font-extrabold mb-2">Galeri Foto Event</h2>
                <p class="text-slate-500 font-medium text-sm sm:text-base">
                    Keseruan dan dokumentasi momen terbaik dari event-event kami.
                </p>
            </div>
            <div class="flex gap-2">
                <a href="{{ route('gallery') }}"
                    class="px-4 sm:px-6 py-2.5 sm:py-3 bg-indigo-50 text-indigo-600 rounded-xl font-bold text-xs sm:text-sm hover:bg-indigo-600 hover:text-white transition whitespace-nowrap">
                    Lihat Semua Foto &rarr;
                </a>
            </div>
        </div>

        @if ($galleries->isEmpty())
            <div class="text-center py-12 bg-white rounded-3xl border border-slate-100 shadow-sm">
                <p class="text-slate-400 font-semibold">Belum ada foto galeri.</p>
            </div>
        @else
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8">
                @foreach ($galleries as $gallery)
                    <div class="group bg-white rounded-3xl border border-slate-100 shadow-sm hover:shadow-2xl transition-all duration-500 overflow-hidden cursor-pointer animate-fade-in"
                        onclick="openWelcomeLightbox('{{ asset($gallery->image) }}', '{{ addslashes($gallery->caption) }}')">
                        <div class="relative overflow-hidden aspect-[4/3] bg-slate-100">
                            <img src="{{ asset($gallery->image) }}" alt="{{ $gallery->caption }}"
                                class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700" />
                            <div
                                class="absolute inset-0 bg-gradient-to-t from-slate-950/80 via-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500 flex items-end p-6">
                                <span
                                    class="px-3 py-1.5 bg-white/20 backdrop-blur text-white text-xs font-bold rounded-lg uppercase tracking-wide">
                                    Zoom Gambar
                                </span>
                            </div>
                        </div>
                        <div class="p-6">
                            <p class="font-bold text-slate-800 line-clamp-2 leading-relaxed">
                                {{ $gallery->caption }}
                            </p>
                            <span class="text-slate-400 text-xs font-semibold block mt-3 uppercase tracking-wider">
                                {{ $gallery->created_at->format('d M Y') }}
                            </span>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </section>

    <!-- Welcome Lightbox Modal -->
    <div id="welcome-lightbox"
        class="fixed inset-0 z-50 bg-slate-950/90 backdrop-blur-md hidden opacity-0 transition-opacity duration-300 flex items-center justify-center p-4">
        <button onclick="closeWelcomeLightbox()"
            class="absolute top-6 right-6 text-white/70 hover:text-white transition-colors duration-300 p-2 rounded-full hover:bg-white/10">
            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
            </svg>
        </button>
        <div class="max-w-5xl w-full flex flex-col items-center justify-center" onclick="event.stopPropagation()">
            <div class="relative bg-black rounded-2xl overflow-hidden max-h-[80vh] flex items-center justify-center">
                <img id="welcome-lightbox-img" src="" alt=""
                    class="max-h-[75vh] max-w-full object-contain">
            </div>
            <p id="welcome-lightbox-caption"
                class="text-white text-lg font-bold text-center mt-6 max-w-2xl leading-relaxed"></p>
        </div>
    </div>

    <style>
        /* Reveal on Scroll Animations */
        .reveal {
            opacity: 0;
            transform: translateY(30px);
            transition: all 0.8s ease-out;
        }

        .reveal.active {
            opacity: 1;
            transform: translateY(0);
        }

        .reveal-delay-1 {
            transition-delay: 100ms;
        }

        .reveal-delay-2 {
            transition-delay: 200ms;
        }

        .reveal-delay-3 {
            transition-delay: 300ms;
        }

        /* Infinite Marquee */
        .marquee-container {
            display: flex;
            overflow: hidden;
            user-select: none;
            gap: 2rem;
            mask-image: linear-gradient(to right, transparent, black 10%, black 90%, transparent);
        }

        .marquee-content {
            flex-shrink: 0;
            display: flex;
            justify-content: space-around;
            min-width: 100%;
            gap: 2rem;
            animation: scroll 20s linear infinite;
        }

        .marquee-container:hover .marquee-content {
            animation-play-state: paused;
        }

        @keyframes scroll {
            from {
                transform: translateX(0);
            }

            to {
                transform: translateX(calc(-100% - 2rem));
            }
        }

        /* Morphing Shape */
        @keyframes morphing {
            0% {
                border-radius: 2rem;
            }

            50% {
                border-radius: 60% 40% 30% 70% / 60% 30% 70% 40%;
            }

            100% {
                border-radius: 2rem;
            }
        }

        .effect-morph {
            animation: morphing 6s ease-in-out infinite alternate;
        }
    </style>

    <script>
        // Intersection Observer & Viewport Fallback for Reveal on Scroll
        function initReveals() {
            const reveals = document.querySelectorAll('.reveal');
            if (!reveals.length) return;

            const revealOptions = {
                threshold: 0.05,
                rootMargin: "0px 0px 100px 0px"
            };

            const revealOnScroll = new IntersectionObserver(function(entries, observer) {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('active');
                        observer.unobserve(entry.target);
                    }
                });
            }, revealOptions);

            reveals.forEach(reveal => {
                const rect = reveal.getBoundingClientRect();
                if (rect.top < window.innerHeight + 150) {
                    reveal.classList.add('active');
                } else {
                    revealOnScroll.observe(reveal);
                }
            });
        }

        if (document.readyState === 'loading') {
            document.addEventListener('DOMContentLoaded', initReveals);
        } else {
            initReveals();
        }
        window.addEventListener('load', initReveals);
        window.addEventListener('scroll', initReveals, { passive: true });

        function openWelcomeLightbox(imgUrl, caption) {
            const lightbox = document.getElementById('welcome-lightbox');
            const lightboxImg = document.getElementById('welcome-lightbox-img');
            const lightboxCaption = document.getElementById('welcome-lightbox-caption');

            lightboxImg.src = imgUrl;
            lightboxCaption.textContent = caption;

            lightbox.classList.remove('hidden');
            setTimeout(() => {
                lightbox.classList.remove('opacity-0');
            }, 10);
            document.body.style.overflow = 'hidden';
        }

        function closeWelcomeLightbox() {
            const lightbox = document.getElementById('welcome-lightbox');
            lightbox.classList.add('opacity-0');
            setTimeout(() => {
                lightbox.classList.add('hidden');
            }, 300);
            document.body.style.overflow = '';
        }

        // Close on ESC key
        document.addEventListener('keydown', function(event) {
            if (event.key === 'Escape') {
                closeWelcomeLightbox();
            }
        });
    </script>

    <!-- Become Organizer Section -->
    <section id="become-organizer"
        class="max-w-7xl mx-auto px-4 sm:px-6 py-10 md:py-20 border-t border-slate-100 reveal scroll-mt-24 md:scroll-mt-26">
        <div
            class="bg-gradient-to-br from-indigo-950 via-indigo-900 to-slate-900 rounded-[2.5rem] p-8 md:p-14 text-white shadow-2xl relative overflow-hidden">
            <!-- Ambient Light Accents -->
            <div class="absolute -top-24 -right-24 w-96 h-96 bg-indigo-500/20 rounded-full blur-3xl pointer-events-none">
            </div>
            <div class="absolute -bottom-24 -left-24 w-96 h-96 bg-purple-500/20 rounded-full blur-3xl pointer-events-none">
            </div>

            <div class="relative z-10 grid grid-cols-1 lg:grid-cols-12 gap-8 items-center">
                <div class="lg:col-span-7 space-y-6">
                    <span
                        class="inline-block px-4 py-1.5 bg-indigo-500/30 border border-indigo-400/30 text-indigo-200 rounded-full text-xs font-bold uppercase tracking-wider">
                        Khusus HIMA / UKM / Panitia Event
                    </span>
                    <h2 class="text-3xl sm:text-4xl md:text-5xl font-black leading-tight">
                        Ingin Menjadi <span class="text-indigo-400">Penyelenggara</span> di Amikom Event Hub?
                    </h2>
                    <p class="text-indigo-100/80 text-sm sm:text-base leading-relaxed max-w-xl">
                        Kelola pendaftaran peserta, pembayaran otomatis via Midtrans, hingga sistem verifikasi tiket QR Code
                        (Check-in) dalam satu platform terpadu.
                    </p>

                    <!-- 3 Steps Grid -->
                    <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 pt-2">
                        <div class="bg-white/10 backdrop-blur border border-white/10 p-4 rounded-2xl">
                            <div
                                class="w-8 h-8 bg-indigo-500 text-white rounded-xl font-black flex items-center justify-center text-sm mb-3">
                                1</div>
                            <h4 class="font-bold text-sm text-white mb-1">Buat Akun</h4>
                            <p class="text-xs text-indigo-200/70">Daftar akun di platform dan masuk ke sistem.</p>
                        </div>
                        <div class="bg-white/10 backdrop-blur border border-white/10 p-4 rounded-2xl">
                            <div
                                class="w-8 h-8 bg-indigo-500 text-white rounded-xl font-black flex items-center justify-center text-sm mb-3">
                                2</div>
                            <h4 class="font-bold text-sm text-white mb-1">Daftar Organisasi</h4>
                            <p class="text-xs text-indigo-200/70">Isi data HIMA / Komunitas & kirimkan verifikasi.</p>
                        </div>
                        <div class="bg-white/10 backdrop-blur border border-white/10 p-4 rounded-2xl">
                            <div
                                class="w-8 h-8 bg-indigo-500 text-white rounded-xl font-black flex items-center justify-center text-sm mb-3">
                                3</div>
                            <h4 class="font-bold text-sm text-white mb-1">Mulai Jual Tiket</h4>
                            <p class="text-xs text-indigo-200/70">Buat event dan kelola pendaftaran dengan mudah.</p>
                        </div>
                    </div>

                    <div class="pt-4 flex flex-col sm:flex-row gap-4">
                        @auth
                            <a href="{{ route('organizer.register') }}"
                                class="px-8 py-4 bg-indigo-500 hover:bg-indigo-400 text-white font-black rounded-2xl text-center shadow-lg shadow-indigo-500/40 hover:scale-105 active:scale-95 transition text-sm sm:text-base">
                                Daftarkan Organisasimu Sekarang &rarr;
                            </a>
                        @else
                            <a href="{{ route('login', ['info' => 'organizer']) }}"
                                class="px-8 py-4 bg-indigo-500 hover:bg-indigo-400 text-white font-black rounded-2xl text-center shadow-lg shadow-indigo-500/40 hover:scale-105 active:scale-95 transition text-sm sm:text-base">
                                Login & Daftar Organizer &rarr;
                            </a>
                        @endauth
                    </div>
                </div>

                <!-- Feature Highlights Box -->
                <div
                    class="lg:col-span-5 bg-white/5 backdrop-blur-md border border-white/10 p-6 md:p-8 rounded-3xl space-y-4">
                    <h3 class="font-extrabold text-lg text-white mb-2">Mengapa Pilih Platform Kami?</h3>

                    <div class="flex items-start gap-3">
                        <div
                            class="w-8 h-8 bg-emerald-500/20 text-emerald-400 rounded-lg flex items-center justify-center shrink-0 mt-0.5 font-bold">
                            ✓</div>
                        <div>
                            <p class="font-bold text-sm text-white">Multi-Tenant Dedicated Panel</p>
                            <p class="text-xs text-indigo-200/70">Dashboard khusus kelola event, tiket, & riwayat peserta.
                            </p>
                        </div>
                    </div>

                    <div class="flex items-start gap-3">
                        <div
                            class="w-8 h-8 bg-emerald-500/20 text-emerald-400 rounded-lg flex items-center justify-center shrink-0 mt-0.5 font-bold">
                            ✓</div>
                        <div>
                            <p class="font-bold text-sm text-white">Sistem QR Code Check-in</p>
                            <p class="text-xs text-indigo-200/70">Scan tiket digital otomatis saat hari H acara.</p>
                        </div>
                    </div>

                    <div class="flex items-start gap-3">
                        <div
                            class="w-8 h-8 bg-emerald-500/20 text-emerald-400 rounded-lg flex items-center justify-center shrink-0 mt-0.5 font-bold">
                            ✓</div>
                        <div>
                            <p class="font-bold text-sm text-white">Pembayaran Instant Midtrans</p>
                            <p class="text-xs text-indigo-200/70">Mendukung QRIS, GoPay, Bank Transfer, & E-Wallet.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @if ($partners->isNotEmpty())
        <!-- Partners Section -->
        <section class="max-w-7xl mx-auto px-4 sm:px-6 py-10 md:py-20 border-t border-slate-100 reveal">
            <div class="text-center mb-8 md:mb-12">
                <h2 class="text-2xl sm:text-3xl font-extrabold mb-2">Partner & Sponsor Kami</h2>
                <p class="text-slate-500 font-medium text-sm sm:text-base">
                    Bekerja sama dengan institusi dan perusahaan terkemuka untuk menghadirkan event terbaik.
                </p>
            </div>

            <div class="marquee-container mt-12">
                <div class="marquee-content">
                    @foreach ($partners as $partner)
                        <div
                            class="group flex flex-col items-center justify-center p-6 bg-white rounded-3xl border border-slate-100 shadow-sm hover:shadow-xl transition-all duration-300 min-w-[200px]">
                            <div class="h-20 w-full flex items-center justify-center mb-4">
                                <img src="{{ Str::startsWith($partner->logo_url, 'http') ? $partner->logo_url : asset($partner->logo_url) }}"
                                    alt="{{ $partner->name }}"
                                    class="max-h-full max-w-full object-contain grayscale group-hover:grayscale-0 opacity-70 group-hover:opacity-100 transition-all duration-300" />
                            </div>
                            <span
                                class="text-sm font-bold text-slate-500 group-hover:text-indigo-600 transition duration-300 text-center">{{ $partner->name }}</span>
                        </div>
                    @endforeach
                    <!-- Duplicate for infinite effect -->
                    @foreach ($partners as $partner)
                        <div
                            class="group flex flex-col items-center justify-center p-6 bg-white rounded-3xl border border-slate-100 shadow-sm hover:shadow-xl transition-all duration-300 min-w-[200px]">
                            <div class="h-20 w-full flex items-center justify-center mb-4">
                                <img src="{{ Str::startsWith($partner->logo_url, 'http') ? $partner->logo_url : asset($partner->logo_url) }}"
                                    alt="{{ $partner->name }}"
                                    class="max-h-full max-w-full object-contain grayscale group-hover:grayscale-0 opacity-70 group-hover:opacity-100 transition-all duration-300" />
                            </div>
                            <span
                                class="text-sm font-bold text-slate-500 group-hover:text-indigo-600 transition duration-300 text-center">{{ $partner->name }}</span>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif
@endsection
