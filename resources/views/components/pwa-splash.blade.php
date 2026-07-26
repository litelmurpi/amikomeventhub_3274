<!-- PWA Splash Screen Launch Animation -->
<div id="pwa-splash" class="fixed inset-0 z-[9999] bg-[#0f172a] flex flex-col items-center justify-center p-6 transition-all duration-700 ease-in-out">
    <!-- Ambient Light Accents -->
    <div class="absolute -top-32 -left-32 w-96 h-96 bg-indigo-600/25 rounded-full blur-3xl animate-pulse"></div>
    <div class="absolute -bottom-32 -right-32 w-96 h-96 bg-emerald-500/25 rounded-full blur-3xl animate-pulse" style="animation-delay: 1s;"></div>

    <div class="relative flex flex-col items-center justify-center text-center space-y-6 max-w-sm">
        <!-- Logo Container with Pulsing Glow & Bounce Animation -->
        <div class="relative group">
            <div class="absolute -inset-4 bg-gradient-to-r from-indigo-500 to-emerald-500 rounded-3xl blur-xl opacity-60 animate-pulse"></div>
            <div class="relative w-28 h-28 bg-[#0f172a] border border-white/10 rounded-3xl p-3 shadow-2xl flex items-center justify-center animate-bounce-slow">
                <img src="{{ asset('assets/logo.svg') }}" alt="Amikom Event Hub" class="w-full h-full object-contain filter drop-shadow-lg">
            </div>
        </div>

        <!-- App Brand Name -->
        <div class="space-y-1">
            <h1 class="text-2xl font-black tracking-widest text-white uppercase">
                Amikom<span class="text-indigo-400">EventHub</span>
            </h1>
            <p class="text-emerald-400 font-bold text-xs tracking-[0.3em] uppercase">
                #1 Event Platform
            </p>
        </div>

        <!-- Progress Bar & Status Message -->
        <div class="w-48 space-y-3 pt-4">
            <div class="w-full h-1.5 bg-slate-800 rounded-full overflow-hidden p-0.5 border border-white/5">
                <div id="splash-bar" class="h-full bg-gradient-to-r from-indigo-500 via-emerald-400 to-indigo-500 rounded-full w-0 transition-all duration-1000 ease-out"></div>
            </div>
            <p id="splash-status" class="text-[11px] font-semibold text-slate-400 animate-pulse">
                Memuat Platform...
            </p>
        </div>
    </div>
</div>

<style>
    @keyframes bounce-slow {
        0%, 100% { transform: translateY(0) scale(1); }
        50% { transform: translateY(-8px) scale(1.03); }
    }
    .animate-bounce-slow {
        animation: bounce-slow 3s ease-in-out infinite;
    }
</style>

<script>
    (function() {
        const splash = document.getElementById('pwa-splash');
        const bar = document.getElementById('splash-bar');
        const status = document.getElementById('splash-status');

        if (splash && bar) {
            // Fill progress bar
            setTimeout(() => {
                bar.style.width = '70%';
            }, 100);

            setTimeout(() => {
                if (status) status.innerText = 'Menyiapkan Pengalaman Terbaik...';
                bar.style.width = '100%';
            }, 600);

            // Fade out splash screen
            setTimeout(() => {
                splash.classList.add('opacity-0', 'scale-105', 'pointer-events-none');
                setTimeout(() => {
                    splash.style.display = 'none';
                }, 700);
            }, 1200);
        }
    })();
</script>
