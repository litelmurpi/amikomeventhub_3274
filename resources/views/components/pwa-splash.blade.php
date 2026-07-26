<!-- Premium Minimalist PWA Splash Screen -->
<script>
    // Inline early guard: Sembunyikan seketika (0ms) jika sudah di dalam sesi navigasi
    if (sessionStorage.getItem('pwa_splash_seen')) {
        document.write('<style>#pwa-splash { display: none !important; }</style>');
    }
</script>

<div id="pwa-splash" class="fixed inset-0 z-[9999] bg-[#090d16] text-white flex flex-col justify-between items-center py-12 px-6 transition-all duration-500 ease-out select-none">
    
    <!-- Top Spacer for Vertical Balance -->
    <div class="h-6"></div>

    <!-- Center Content: Crisp Logo & Brand Title -->
    <div class="flex flex-col items-center justify-center space-y-5 transition-all duration-700 ease-out" id="splash-content">
        <div class="relative w-20 h-20 sm:w-24 sm:h-24">
            <img src="{{ asset('assets/logo.svg') }}" alt="Amikom Event Hub" class="w-full h-full object-contain filter drop-shadow-2xl">
        </div>
        
        <div class="text-center space-y-1">
            <h1 class="text-xl sm:text-2xl font-black tracking-[0.2em] text-white uppercase">
                Amikom<span class="text-indigo-400">EventHub</span>
            </h1>
            <p class="text-[10px] sm:text-xs font-bold text-slate-400 tracking-[0.3em] uppercase">
                Event Ticketing Platform
            </p>
        </div>
    </div>

    <!-- Bottom Indicator: Sleek Minimalist Spinner & Tagline -->
    <div class="flex flex-col items-center space-y-4">
        <div class="w-5 h-5 border-2 border-indigo-500/20 border-t-indigo-500 rounded-full animate-spin"></div>
        <span class="text-[10px] font-semibold text-slate-500 tracking-widest uppercase">PWA Mobile Experience</span>
    </div>
</div>

<script>
    (function() {
        const splash = document.getElementById('pwa-splash');
        if (!splash) return;

        if (sessionStorage.getItem('pwa_splash_seen')) {
            splash.style.display = 'none';
            return;
        }

        // Simpan flag di sesi browser
        sessionStorage.setItem('pwa_splash_seen', 'true');

        // Animasi hanya berjalan 1x saat aplikasi/situs pertama kali dibuka (~500ms)
        setTimeout(() => {
            splash.classList.add('opacity-0', 'pointer-events-none');
            setTimeout(() => {
                splash.style.display = 'none';
            }, 450);
        }, 500);
    })();
</script>
