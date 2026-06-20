@extends('layouts.app')

@section('title', 'Welcome - Amikom Event Hub')

@section('content')
<!-- Hero Section -->
    <section
      class="max-w-7xl mx-auto px-6 py-20 flex flex-col md:flex-row items-center gap-12"
    >
      <div class="flex-1 space-y-8 reveal">
        <span
          class="inline-block px-4 py-1.5 bg-indigo-100 text-indigo-700 rounded-full text-sm font-bold uppercase tracking-wider"
          >#1 Event Platform</span
        >
        <h1 class="text-5xl md:text-7xl font-extrabold leading-tight">
          Temukan & Pesan
          <span class="text-indigo-600">Tiket Event</span> Impianmu.
        </h1>
        <p class="text-lg text-slate-500 max-w-lg leading-relaxed reveal reveal-delay-1">
          Dari konser musik hingga workshop teknologi, semua ada di genggamanmu.
          Pesan aman & cepat dengan Midtrans.
        </p>
        <div class="flex gap-4 reveal reveal-delay-2">
          <a
            href="#events"
            class="group flex items-center gap-2 px-8 py-4 bg-indigo-600 text-white rounded-2xl font-bold text-lg shadow-xl shadow-indigo-200 hover:scale-105 hover:shadow-indigo-300 transition-all"
          >
            Mulai Jelajah
            <svg class="w-5 h-5 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
          </a>
          <a
            href="#"
            class="px-8 py-4 border-2 border-slate-200 rounded-2xl font-bold text-lg hover:border-indigo-600 hover:text-indigo-600 transition-colors"
          >
            Cara Pesan
          </a>
        </div>
      </div>
      <div class="flex-1 relative reveal reveal-delay-3">
        <div
          class="absolute -top-10 -left-10 w-64 h-64 bg-indigo-400 rounded-full mix-blend-multiply filter blur-3xl opacity-20 animate-blob"
        ></div>
        <div
          class="absolute -bottom-10 -right-10 w-64 h-64 bg-purple-400 rounded-full mix-blend-multiply filter blur-3xl opacity-20 animate-blob animation-delay-2000"
        ></div>
        
        <img
          src="assets/concert.png"
          alt="Concert"
          class="rounded-[2rem] shadow-2xl relative z-10 w-full object-cover aspect-[4/5] object-center effect-morph transition-all duration-700"
        />

        <div
          class="absolute -bottom-6 -left-6 glass p-6 rounded-2xl shadow-xl z-20 border border-white hover:-translate-y-2 transition-transform duration-500"
        >
          <div class="flex items-center gap-4">
            <div
              class="w-12 h-12 bg-green-100 rounded-full flex items-center justify-center text-green-600"
            >
              <svg
                class="w-6 h-6"
                fill="none"
                stroke="currentColor"
                viewBox="0 0 24 24"
              >
                <path
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  stroke-width="2"
                  d="M5 13l4 4L19 7"
                ></path>
              </svg>
            </div>
            <div>
              <p class="text-xs text-slate-500 font-bold uppercase">
                Terverifikasi
              </p>
              <p class="font-bold">Pembayaran Aman via Midtrans</p>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Events Grid -->
    <section id="events" class="max-w-7xl mx-auto px-6 py-20 reveal">
      <div class="flex justify-between items-end mb-12">
        <div>
          <h2 class="text-3xl font-extrabold mb-2">Event Terdekat</h2>
          <p class="text-slate-500 font-medium">
            Jangan sampai ketinggalan acara seru minggu ini!
          </p>
        </div>
        <div class="flex gap-2">
          <a
            href="{{ route('katalog') }}"
            class="p-3 border rounded-xl hover:bg-white hover:shadow-md hover:border-indigo-200 transition"
          >
            Semua Kategori
          </a>
        </div>
      </div>

      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        @foreach($events as $event)
        <div
          class="group bg-white rounded-3xl border border-slate-100 shadow-sm hover:shadow-2xl transition-all duration-300 overflow-hidden"
        >
          <div class="relative overflow-hidden aspect-[3/4]">
            <img
              src="{{ asset($event->poster_path ?? 'assets/concert.png') }}"
              alt="{{ $event->title }}"
              class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500"
            />
            <div
              class="absolute top-4 left-4 px-3 py-1 bg-white/90 backdrop-blur rounded-lg text-xs font-bold uppercase text-indigo-600"
            >
              {{ $event->category->name ?? 'Uncategorized' }}
            </div>
          </div>
          <div class="p-6">
            <h3
              class="text-xl font-bold mb-2 group-hover:text-indigo-600 transition"
            >
              {{ $event->title }}
            </h3>
            <div class="flex items-center gap-2 text-slate-500 text-sm mb-4">
              <svg
                class="w-4 h-4"
                fill="none"
                stroke="currentColor"
                viewBox="0 0 24 24"
              >
                <path
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  stroke-width="2"
                  d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"
                ></path>
              </svg>
              <span>{{ $event->date }}</span>
            </div>
            <div class="flex justify-between items-center pt-4 border-t">
              <span class="text-2xl font-black text-indigo-600">{{ $event->price }}</span>
              <a
                href="{{ route('event-detail', $event->slug) }}"
                class="px-5 py-2 bg-indigo-50 text-indigo-600 rounded-xl font-bold hover:bg-indigo-600 hover:text-white transition"
                >Lihat Detail</a
              >
            </div>
          </div>
        </div>
        @endforeach
      </div>
    </section>

    <!-- Gallery Preview Section -->
    <section class="max-w-7xl mx-auto px-6 py-20 border-t border-slate-100 reveal">
      <div class="flex justify-between items-end mb-12">
        <div>
          <h2 class="text-3xl font-extrabold mb-2">Galeri Foto Event</h2>
          <p class="text-slate-500 font-medium">
            Keseruan dan dokumentasi momen terbaik dari event-event kami.
          </p>
        </div>
        <div class="flex gap-2">
          <a
            href="{{ route('gallery') }}"
            class="px-6 py-3 bg-indigo-50 text-indigo-600 rounded-xl font-bold hover:bg-indigo-600 hover:text-white transition"
          >
            Lihat Semua Foto &rarr;
          </a>
        </div>
      </div>

      @if($galleries->isEmpty())
        <div class="text-center py-12 bg-white rounded-3xl border border-slate-100 shadow-sm">
          <p class="text-slate-400 font-semibold">Belum ada foto galeri.</p>
        </div>
      @else
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8">
          @foreach($galleries as $gallery)
            <div class="group bg-white rounded-3xl border border-slate-100 shadow-sm hover:shadow-2xl transition-all duration-500 overflow-hidden cursor-pointer animate-fade-in" onclick="openWelcomeLightbox('{{ asset($gallery->image) }}', '{{ addslashes($gallery->caption) }}')">
              <div class="relative overflow-hidden aspect-[4/3] bg-slate-100">
                <img
                  src="{{ asset($gallery->image) }}"
                  alt="{{ $gallery->caption }}"
                  class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700"
                />
                <div class="absolute inset-0 bg-gradient-to-t from-slate-950/80 via-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500 flex items-end p-6">
                  <span class="px-3 py-1.5 bg-white/20 backdrop-blur text-white text-xs font-bold rounded-lg uppercase tracking-wide">
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
    <div id="welcome-lightbox" class="fixed inset-0 z-50 bg-slate-950/90 backdrop-blur-md hidden opacity-0 transition-opacity duration-300 flex items-center justify-center p-4">
        <button onclick="closeWelcomeLightbox()" class="absolute top-6 right-6 text-white/70 hover:text-white transition-colors duration-300 p-2 rounded-full hover:bg-white/10">
            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
            </svg>
        </button>
        <div class="max-w-5xl w-full flex flex-col items-center justify-center" onclick="event.stopPropagation()">
            <div class="relative bg-black rounded-2xl overflow-hidden max-h-[80vh] flex items-center justify-center">
                <img id="welcome-lightbox-img" src="" alt="" class="max-h-[75vh] max-w-full object-contain">
            </div>
            <p id="welcome-lightbox-caption" class="text-white text-lg font-bold text-center mt-6 max-w-2xl leading-relaxed"></p>
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
        .reveal-delay-1 { transition-delay: 100ms; }
        .reveal-delay-2 { transition-delay: 200ms; }
        .reveal-delay-3 { transition-delay: 300ms; }

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
            from { transform: translateX(0); }
            to { transform: translateX(calc(-100% - 2rem)); }
        }
        /* Morphing Shape */
        @keyframes morphing {
            0% { border-radius: 2rem; }
            50% { border-radius: 60% 40% 30% 70% / 60% 30% 70% 40%; }
            100% { border-radius: 2rem; }
        }
        .effect-morph {
            animation: morphing 6s ease-in-out infinite alternate;
        }
    </style>

    <script>
        // Intersection Observer for Reveal on Scroll
        document.addEventListener('DOMContentLoaded', () => {
            const reveals = document.querySelectorAll('.reveal');
            const revealOptions = {
                threshold: 0.15,
                rootMargin: "0px 0px -50px 0px"
            };

            const revealOnScroll = new IntersectionObserver(function(entries, observer) {
                entries.forEach(entry => {
                    if (!entry.isIntersecting) return;
                    entry.target.classList.add('active');
                    observer.unobserve(entry.target);
                });
            }, revealOptions);

            reveals.forEach(reveal => {
                revealOnScroll.observe(reveal);
            });
        });

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

    <!-- Partners Section -->
    <section class="max-w-7xl mx-auto px-6 py-20 border-t border-slate-100 reveal">
      <div class="text-center mb-12">
        <h2 class="text-3xl font-extrabold mb-2">Partner & Sponsor Kami</h2>
        <p class="text-slate-500 font-medium">
          Bekerja sama dengan institusi dan perusahaan terkemuka untuk menghadirkan event terbaik.
        </p>
      </div>

      <div class="marquee-container mt-12">
        <div class="marquee-content">
            @foreach($partners as $partner)
            <div class="group flex flex-col items-center justify-center p-6 bg-white rounded-3xl border border-slate-100 shadow-sm hover:shadow-xl transition-all duration-300 min-w-[200px]">
              <div class="h-20 w-full flex items-center justify-center mb-4">
                <img
                  src="{{ Str::startsWith($partner->logo_url, 'http') ? $partner->logo_url : asset($partner->logo_url) }}"
                  alt="{{ $partner->name }}"
                  class="max-h-full max-w-full object-contain grayscale group-hover:grayscale-0 opacity-70 group-hover:opacity-100 transition-all duration-300"
                />
              </div>
              <span class="text-sm font-bold text-slate-500 group-hover:text-indigo-600 transition duration-300 text-center">{{ $partner->name }}</span>
            </div>
            @endforeach
            <!-- Duplicate for infinite effect -->
            @foreach($partners as $partner)
            <div class="group flex flex-col items-center justify-center p-6 bg-white rounded-3xl border border-slate-100 shadow-sm hover:shadow-xl transition-all duration-300 min-w-[200px]">
              <div class="h-20 w-full flex items-center justify-center mb-4">
                <img
                  src="{{ Str::startsWith($partner->logo_url, 'http') ? $partner->logo_url : asset($partner->logo_url) }}"
                  alt="{{ $partner->name }}"
                  class="max-h-full max-w-full object-contain grayscale group-hover:grayscale-0 opacity-70 group-hover:opacity-100 transition-all duration-300"
                />
              </div>
              <span class="text-sm font-bold text-slate-500 group-hover:text-indigo-600 transition duration-300 text-center">{{ $partner->name }}</span>
            </div>
            @endforeach
        </div>
      </div>
    </section>
@endsection
