<!-- PWA Floating Install Prompt Banner -->
<div id="pwa-install-banner" class="fixed bottom-4 left-4 right-4 md:left-auto md:right-6 md:max-w-md z-[9990] bg-slate-900/95 backdrop-blur-md text-white p-4 rounded-3xl shadow-2xl border border-white/10 hidden transform translate-y-8 opacity-0 transition-all duration-500 select-none">
    <div class="flex items-center gap-3">
        <div class="w-12 h-12 bg-indigo-600 rounded-2xl flex items-center justify-center shrink-0 shadow-lg shadow-indigo-500/30 p-2 border border-white/20">
            <img src="{{ asset('assets/logo.svg') }}" alt="Logo" class="w-full h-full object-contain">
        </div>
        
        <div class="flex-1 min-w-0">
            <h4 class="font-extrabold text-sm text-white truncate">Install Aplikasi EventHub</h4>
            <p class="text-xs text-indigo-200/80 truncate" id="pwa-prompt-subtext">Akses cepat & fitur scan tiket offline di HP Anda.</p>
        </div>

        <button id="pwa-install-btn" class="px-4 py-2 bg-indigo-500 hover:bg-indigo-400 text-white rounded-xl font-bold text-xs shadow-md active:scale-95 transition whitespace-nowrap">
            Install
        </button>

        <button onclick="closePwaBanner()" class="p-1 text-slate-400 hover:text-white rounded-lg transition" title="Tutup">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
            </svg>
        </button>
    </div>
</div>

<script>
    let deferredPrompt = null;

    window.addEventListener('beforeinstallprompt', (e) => {
        // Prevent default browser mini-infobar
        e.preventDefault();
        deferredPrompt = e;

        // Don't show if user dismissed prompt recently
        if (localStorage.getItem('pwa_install_dismissed')) return;

        // Show custom install banner with smooth animation
        const banner = document.getElementById('pwa-install-banner');
        if (banner) {
            banner.classList.remove('hidden');
            setTimeout(() => {
                banner.classList.remove('translate-y-8', 'opacity-0');
            }, 100);
        }
    });

    const installBtn = document.getElementById('pwa-install-btn');
    if (installBtn) {
        installBtn.addEventListener('click', async () => {
            if (!deferredPrompt) return;

            // Show native browser install prompt
            deferredPrompt.prompt();
            const { outcome } = await deferredPrompt.userChoice;
            console.log(`[PWA] Install prompt outcome: ${outcome}`);

            deferredPrompt = null;
            closePwaBanner();
        });
    }

    function closePwaBanner() {
        const banner = document.getElementById('pwa-install-banner');
        if (banner) {
            banner.classList.add('translate-y-8', 'opacity-0');
            setTimeout(() => {
                banner.classList.add('hidden');
            }, 500);
        }
        localStorage.setItem('pwa_install_dismissed', 'true');
    }

    // Check if running on iOS Safari
    const isIOS = /iPad|iPhone|iPod/.test(navigator.userAgent) && !window.MSStream;
    const isStandalone = window.matchMedia('(display-mode: standalone)').matches || window.navigator.standalone;

    if (isIOS && !isStandalone && !localStorage.getItem('pwa_install_dismissed')) {
        window.addEventListener('load', () => {
            const banner = document.getElementById('pwa-install-banner');
            const subtext = document.getElementById('pwa-prompt-subtext');
            const btn = document.getElementById('pwa-install-btn');

            if (banner && subtext && btn) {
                subtext.innerText = 'Tap 📤 (Bagikan) lalu pilih "Tambah ke Utama"';
                btn.style.display = 'none';
                banner.classList.remove('hidden');
                setTimeout(() => {
                    banner.classList.remove('translate-y-8', 'opacity-0');
                }, 1000);
            }
        });
    }
</script>
