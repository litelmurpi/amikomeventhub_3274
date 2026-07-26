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
    (function() {
        const isStandalone = window.matchMedia('(display-mode: standalone)').matches || window.navigator.standalone || document.referrer.includes('android-app://');
        
        // Sembunyikan banner jika aplikasi sudah di-install & dibuka dalam mode PWA Standalone
        if (isStandalone) return;

        let deferredPrompt = null;

        function showBanner(subtextMessage = null, hideBtn = false) {
            if (localStorage.getItem('pwa_install_dismissed')) return;

            const banner = document.getElementById('pwa-install-banner');
            const subtext = document.getElementById('pwa-prompt-subtext');
            const btn = document.getElementById('pwa-install-btn');

            if (banner) {
                if (subtextMessage && subtext) subtext.innerText = subtextMessage;
                if (hideBtn && btn) btn.style.display = 'none';

                banner.classList.remove('hidden');
                setTimeout(() => {
                    banner.classList.remove('translate-y-8', 'opacity-0');
                }, 300);
            }
        }

        // 1. Tangkap event beforeinstallprompt resmi dari Chrome/Android
        window.addEventListener('beforeinstallprompt', (e) => {
            e.preventDefault();
            deferredPrompt = e;
            showBanner("Akses cepat & fitur scan tiket offline di HP Anda.");
        });

        // 2. Fallback: Munculkan banner di mobile setelah page load jika beforeinstallprompt belum panggil
        window.addEventListener('load', () => {
            const isIOS = /iPad|iPhone|iPod/.test(navigator.userAgent) && !window.MSStream;
            const isMobile = /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent);

            if (isIOS) {
                showBanner('Tap 📤 (Bagikan) lalu pilih "Tambah ke Utama"', true);
            } else if (isMobile) {
                setTimeout(() => {
                    showBanner("Akses cepat & fitur scan tiket offline di HP Anda.");
                }, 1500);
            }
        });

        // 3. Eksekusi klik tombol Install
        document.addEventListener('DOMContentLoaded', () => {
            const installBtn = document.getElementById('pwa-install-btn');
            if (installBtn) {
                installBtn.addEventListener('click', async () => {
                    if (deferredPrompt) {
                        deferredPrompt.prompt();
                        const { outcome } = await deferredPrompt.userChoice;
                        console.log(`[PWA] User choice: ${outcome}`);
                        deferredPrompt = null;
                        closePwaBanner();
                    } else {
                        alert("Untuk menginstall aplikasi:\n1. Tap tombol titik tiga (⋮) di kanan atas browser Chrome.\n2. Pilih 'Install Aplikasi' atau 'Tambahkan ke Layar Utama'.");
                    }
                });
            }
        });
    })();

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
</script>
