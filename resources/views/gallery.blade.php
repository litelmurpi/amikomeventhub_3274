@extends('layouts.app')

@section('title', 'Galeri Foto - Amikom Event Hub')

@section('content')
    <!-- Hero Section -->
    <section class="max-w-7xl mx-auto px-6 pt-16 pb-8 text-center">
        <span class="inline-block px-4 py-1.5 bg-indigo-100 text-indigo-700 rounded-full text-sm font-bold uppercase tracking-wider mb-4">
            Dokumentasi Event
        </span>
        <h1 class="text-4xl md:text-6xl font-extrabold leading-tight mb-4">
            Galeri <span class="text-indigo-600">Amikom Event Hub</span>
        </h1>
        <p class="text-lg text-slate-500 max-w-2xl mx-auto leading-relaxed">
            Kumpulan momen-momen terbaik dan dokumentasi keseruan event yang telah diselenggarakan oleh Universitas Amikom Yogyakarta.
        </p>
    </section>

    <!-- Gallery Grid Section -->
    <section class="max-w-7xl mx-auto px-6 py-12">
        @if($galleries->isEmpty())
            <div class="text-center py-20 bg-white rounded-3xl border border-slate-100 shadow-sm">
                <div class="w-20 h-20 bg-indigo-50 text-indigo-600 rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                    </svg>
                </div>
                <h3 class="text-2xl font-bold text-slate-800 mb-2">Belum Ada Foto</h3>
                <p class="text-slate-500">Saat ini galeri foto masih kosong. Silakan kembali lagi nanti!</p>
            </div>
        @else
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">
                @foreach($galleries as $gallery)
                    <div class="group bg-white rounded-3xl border border-slate-100 shadow-sm hover:shadow-2xl transition-all duration-500 overflow-hidden cursor-pointer" onclick="openLightbox('{{ asset($gallery->image) }}', '{{ addslashes($gallery->caption) }}')">
                        <div class="relative overflow-hidden aspect-[4/3] bg-slate-100">
                            <img src="{{ asset($gallery->image) }}" alt="{{ $gallery->caption }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                            <div class="absolute inset-0 bg-gradient-to-t from-slate-950/80 via-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500 flex items-end p-6">
                                <span class="px-3 py-1.5 bg-white/20 backdrop-blur text-white text-xs font-bold rounded-lg uppercase tracking-wide">
                                    Lihat Detail
                                </span>
                            </div>
                        </div>
                        <div class="p-6">
                            <p class="font-bold text-slate-800 line-clamp-2 leading-relaxed hover:text-indigo-600 transition-colors duration-300">{{ $gallery->caption }}</p>
                            <span class="text-slate-400 text-xs font-semibold block mt-3 uppercase tracking-wider">
                                {{ $gallery->created_at->format('d M Y') }}
                            </span>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Pagination -->
            <div class="mt-16 flex justify-center">
                {{ $galleries->links() }}
            </div>
        @endif
    </section>

    <!-- Lightbox Modal -->
    <div id="lightbox" class="fixed inset-0 z-50 bg-slate-950/90 backdrop-blur-md hidden opacity-0 transition-opacity duration-300 flex items-center justify-center p-4">
        <button onclick="closeLightbox()" class="absolute top-6 right-6 text-white/70 hover:text-white transition-colors duration-300 p-2 rounded-full hover:bg-white/10">
            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
            </svg>
        </button>
        <div class="max-w-5xl w-full flex flex-col items-center justify-center" onclick="event.stopPropagation()">
            <div class="relative bg-black rounded-2xl overflow-hidden max-h-[80vh] flex items-center justify-center">
                <img id="lightbox-img" src="" alt="" class="max-h-[75vh] max-w-full object-contain">
            </div>
            <p id="lightbox-caption" class="text-white text-lg font-bold text-center mt-6 max-w-2xl leading-relaxed"></p>
        </div>
    </div>

    <script>
        function openLightbox(imgUrl, caption) {
            const lightbox = document.getElementById('lightbox');
            const lightboxImg = document.getElementById('lightbox-img');
            const lightboxCaption = document.getElementById('lightbox-caption');

            lightboxImg.src = imgUrl;
            lightboxCaption.textContent = caption;

            lightbox.classList.remove('hidden');
            setTimeout(() => {
                lightbox.classList.remove('opacity-0');
            }, 10);
            document.body.style.overflow = 'hidden';
        }

        function closeLightbox() {
            const lightbox = document.getElementById('lightbox');
            lightbox.classList.add('opacity-0');
            setTimeout(() => {
                lightbox.classList.add('hidden');
            }, 300);
            document.body.style.overflow = '';
        }

        // Close on ESC key
        document.addEventListener('keydown', function(event) {
            if (event.key === 'Escape') {
                closeLightbox();
            }
        });
    </script>
@endsection
