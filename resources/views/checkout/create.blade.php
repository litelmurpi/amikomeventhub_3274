@extends('layouts.app')

@section('title', 'Checkout - ' . $event->title)

@section('content')
<main class="max-w-3xl mx-auto px-4 sm:px-6 py-8 md:py-16">
    <div class="mb-8 md:mb-12">
        <a href="{{ route('event-detail', $event->slug) }}" class="text-indigo-600 font-bold text-xs sm:text-sm flex items-center gap-2 mb-4">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
            </svg>
            Kembali ke Event
        </a>
        <h1 class="text-3xl sm:text-4xl font-extrabold text-slate-900">Checkout Tiket</h1>
        <p class="text-slate-500 mt-2 text-sm sm:text-base">Lengkapi data Anda untuk mendapatkan tiket.</p>
    </div>

    @if(session('error'))
    <div class="mb-6 p-4 bg-red-100 text-red-700 rounded-xl font-bold text-sm">
        {{ session('error') }}
    </div>
    @endif

    <div class="grid grid-cols-1 gap-6 md:gap-8">
        <!-- Summary Card -->
        <div class="bg-white rounded-3xl border border-slate-200 p-6 sm:p-8 shadow-sm">
            <h3 class="text-lg sm:text-xl font-bold mb-6 border-b pb-4">Pesanan Anda</h3>
            <div class="flex flex-col sm:flex-row gap-4 sm:gap-6 items-start">
                <img src="{{ asset($event->image) }}" alt="Event" class="w-full sm:w-24 h-48 sm:h-24 rounded-2xl object-cover">
                <div class="min-w-0 flex-1">
                    <h4 class="font-extrabold text-base sm:text-lg text-slate-900 leading-snug">{{ $event->title }}</h4>
                    <p class="text-slate-500 text-xs sm:text-sm mt-1">{{ $event->date }} • {{ $event->location }}</p>
                    <p class="text-indigo-600 font-bold mt-2 text-sm sm:text-base">1 x {{ $event->price }}</p>
                </div>
            </div>
            <div class="mt-8 pt-6 border-t space-y-3">
                <div class="flex justify-between text-slate-500">
                    <span>Harga Tiket</span>
                    <span>{{ $event->price }}</span>
                </div>
                @if(!$isFreeEvent)
                <div class="flex justify-between text-slate-500">
                    <span>Biaya Layanan</span>
                    <span>Rp {{ number_format($serviceFee, 0, ',', '.') }}</span>
                </div>
                @endif
                <div id="discount-row" class="flex justify-between text-emerald-600 hidden">
                    <span>Diskon (<span id="discount-code-label"></span>)</span>
                    <span>-Rp <span id="discount-value-label">0</span></span>
                </div>
                <div class="flex justify-between text-2xl font-black mt-4 pt-4 border-t">
                    <span>Total Bayar</span>
                    <span id="total-price-label" class="text-indigo-600">
                        {{ $isFreeEvent ? 'Gratis' : 'Rp ' . number_format($event->price_value + $serviceFee, 0, ',', '.') }}
                    </span>
                </div>
            </div>
        </div>

        <!-- Form Card -->
        <div class="bg-white rounded-3xl border border-slate-200 p-8 shadow-sm">
            <h3 class="text-xl font-bold mb-4 text-indigo-600">🎫 Data Pemesan</h3>

            <!-- Auto-fill toggle -->
            <div class="mb-6 p-4 bg-indigo-50 rounded-2xl border border-indigo-100">
                <label class="flex items-center gap-3 cursor-pointer select-none">
                    <input type="checkbox" id="use-account-data" checked
                        class="w-5 h-5 rounded-lg text-indigo-600 border-slate-300 focus:ring-indigo-500 accent-indigo-600 cursor-pointer">
                    <div>
                        <span class="font-bold text-slate-800">Gunakan data akun saya</span>
                        <p class="text-xs text-slate-500 mt-0.5">Otomatis isi nama & email dari akun <strong>{{ Auth::user()->email }}</strong></p>
                    </div>
                </label>
            </div>

            <form id="checkout-form" class="space-y-6">
                <div>
                    <label class="block text-sm font-bold text-slate-700 mb-2 uppercase tracking-wide">Nama Lengkap</label>
                    <input type="text" name="customer_name" id="customer_name" placeholder="Masukkan nama sesuai identitas"
                        class="w-full px-5 py-4 bg-white border-2 border-slate-100 rounded-2xl focus:ring-4 focus:ring-indigo-500/10 focus:border-indigo-600 outline-none transition font-medium"
                        required value="{{ old('customer_name', Auth::user()->name) }}">
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-bold text-slate-700 mb-2 uppercase tracking-wide">Email Aktif</label>
                        <input type="email" name="customer_email" id="customer_email" placeholder="contoh@gmail.com"
                            class="w-full px-5 py-4 bg-white border-2 border-slate-100 rounded-2xl focus:ring-4 focus:ring-indigo-500/10 focus:border-indigo-600 outline-none transition font-medium"
                            required value="{{ old('customer_email', Auth::user()->email) }}">
                        <p class="text-[10px] text-slate-400 mt-2 font-bold uppercase tracking-tighter">*E-Ticket akan dikirim ke email ini</p>
                    </div>
                    <div>
                        <label class="block text-sm font-bold text-slate-700 mb-2 uppercase tracking-wide">No. WhatsApp</label>
                        <input type="tel" name="customer_phone" id="customer_phone" placeholder="08xxxxxxx"
                            class="w-full px-5 py-4 bg-white border-2 border-slate-100 rounded-2xl focus:ring-4 focus:ring-indigo-500/10 focus:border-indigo-600 outline-none transition font-medium"
                            required value="{{ old('customer_phone') }}">
                    </div>
                </div>

                <!-- Promo Code Section -->
                <div class="bg-slate-50 p-4 sm:p-5 rounded-2xl border border-slate-200/80">
                    <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2">Punya Kode Promo?</label>
                    <div class="flex flex-col sm:flex-row gap-2">
                        <input type="text" id="promo-input" placeholder="Masukkan kode promo" class="flex-1 px-4 py-3 bg-white border border-slate-200 rounded-xl text-xs sm:text-sm font-semibold uppercase tracking-wider focus:outline-none focus:border-indigo-500 transition">
                        <button type="button" id="btn-apply-promo" class="px-5 py-3 bg-slate-900 hover:bg-slate-800 text-white rounded-xl text-xs sm:text-sm font-bold transition shrink-0">
                            Terapkan
                        </button>
                    </div>
                    <div id="promo-feedback" class="mt-2 text-xs font-bold hidden"></div>
                </div>

                <button type="button" id="pay-button"
                    class="w-full py-5 bg-indigo-600 text-white rounded-2xl font-black text-xl shadow-xl shadow-indigo-200 hover:bg-indigo-700 active:scale-95 transition-all flex items-center justify-center gap-3">
                    <span id="button-text">{{ $isFreeEvent ? 'Daftar Gratis' : 'Lanjut Pembayaran' }}</span>
                    <span id="button-spinner" class="hidden">
                        <svg class="animate-spin h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                        </svg>
                    </span>
                </button>
                <p class="text-center text-xs text-slate-400">Dengan menekan tombol di atas, Anda menyetujui Syarat & Ketentuan kami.</p>
            </form>
        </div>
    </div>
</main>
@endsection

@push('scripts')
<script src="{{ config('midtrans.is_production')
    ? 'https://app.midtrans.com/snap/snap.js'
    : 'https://app.sandbox.midtrans.com/snap/snap.js' }}"
    data-client-key="{{ config('midtrans.client_key') }}"></script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Auto-fill logic
        const checkbox = document.getElementById('use-account-data');
        const nameInput = document.getElementById('customer_name');
        const emailInput = document.getElementById('customer_email');
        const phoneInput = document.getElementById('customer_phone');

        const userData = {
            name: @json(Auth::user()->name),
            email: @json(Auth::user()->email)
        };

        checkbox.addEventListener('change', function() {
            if (this.checked) {
                nameInput.value = userData.name;
                emailInput.value = userData.email;
            } else {
                nameInput.value = '';
                emailInput.value = '';
            }
        });

        // Promo Code logic
        const btnApplyPromo = document.getElementById('btn-apply-promo');
        const promoInput = document.getElementById('promo-input');
        const promoFeedback = document.getElementById('promo-feedback');
        const discountRow = document.getElementById('discount-row');
        const discountCodeLabel = document.getElementById('discount-code-label');
        const discountValueLabel = document.getElementById('discount-value-label');
        const totalPriceLabel = document.getElementById('total-price-label');
        
        const rawEventPrice = parseInt(@json($event->price_value));
        const rawServiceFee = parseInt(@json($serviceFee));
        const eventId = @json($event->id);
        const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

        let activePromoCode = null;
        let discountAmount = 0;

        btnApplyPromo.addEventListener('click', async function() {
            const code = promoInput.value.trim();
            if (!code) {
                alert('Silakan masukkan kode promo terlebih dahulu.');
                return;
            }

            btnApplyPromo.disabled = true;
            btnApplyPromo.textContent = 'Mengecek...';
            promoFeedback.classList.add('hidden');

            try {
                const res = await fetch('/promo/validate', {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': csrfToken,
                        'Content-Type': 'application/json',
                        'Accept': 'application/json'
                    },
                    body: JSON.stringify({ code: code, event_id: eventId })
                });

                const data = await res.json();

                if (!res.ok) {
                    promoFeedback.textContent = data.message || 'Kode promo tidak valid.';
                    promoFeedback.className = 'mt-2 text-xs font-bold text-rose-600';
                    promoFeedback.classList.remove('hidden');
                    
                    // Reset discount
                    activePromoCode = null;
                    discountAmount = 0;
                    discountRow.classList.add('hidden');
                    updateTotalPrice();
                } else {
                    activePromoCode = data.code;
                    discountAmount = data.discount_amount;

                    promoFeedback.textContent = `Kode promo "${data.code}" berhasil diterapkan!`;
                    promoFeedback.className = 'mt-2 text-xs font-bold text-emerald-600';
                    promoFeedback.classList.remove('hidden');

                    // Update UI discount details
                    discountCodeLabel.textContent = data.code;
                    discountValueLabel.textContent = formatRupiah(data.discount_amount);
                    discountRow.classList.remove('hidden');
                    updateTotalPrice();
                }
            } catch (err) {
                console.error(err);
                alert('Gagal menghubungi server untuk memvalidasi kode promo.');
            } finally {
                btnApplyPromo.disabled = false;
                btnApplyPromo.textContent = 'Terapkan';
            }
        });

        function updateTotalPrice() {
            const finalTotal = Math.max(0, rawEventPrice - discountAmount + rawServiceFee);
            totalPriceLabel.textContent = 'Rp ' + formatRupiah(finalTotal);
        }

        function formatRupiah(amount) {
            return new Intl.NumberFormat('id-ID').format(amount);
        }

        // Midtrans Snap payment flow
        const payButton = document.getElementById('pay-button');
        const buttonText = document.getElementById('button-text');
        const buttonSpinner = document.getElementById('button-spinner');
        const slug = @json($event->slug);

        payButton.addEventListener('click', async function() {
            // Client side validation check
            if (!nameInput.value.trim() || !emailInput.value.trim() || !phoneInput.value.trim()) {
                alert('Harap lengkapi semua data pemesan!');
                return;
            }

            // Enter loading state
            payButton.disabled = true;
            buttonText.textContent = 'Memproses Pembayaran...';
            buttonSpinner.classList.remove('hidden');

            try {
                const res = await fetch(`/checkout/${slug}`, {
                    method: 'POST',
                    headers: { 
                        'X-CSRF-TOKEN': csrfToken, 
                        'Content-Type': 'application/json',
                        'Accept': 'application/json'
                    },
                    body: JSON.stringify({ 
                        customer_name: nameInput.value, 
                        customer_email: emailInput.value, 
                        customer_phone: phoneInput.value,
                        promo_code: activePromoCode
                    })
                });

                if (!res.ok) {
                    const error = await res.json();
                    
                    // Handle Laravel validation errors (422)
                    if (res.status === 422 && error.errors) {
                        let validationMessages = '';
                        for (const field in error.errors) {
                            validationMessages += `• ${error.errors[field].join(', ')}\n`;
                        }
                        alert(`Validasi data gagal:\n${validationMessages}`);
                    } else {
                        alert(error.message || 'Terjadi kesalahan saat memproses checkout.');
                    }
                    
                    resetLoadingState();
                    return;
                }

                const responseData = await res.json();

                // Handle Free Event Bypass
                if (responseData.free_event) {
                    window.location.href = responseData.redirect_url;
                    return;
                }

                const { snap_token, order_id } = responseData;

                // Open Midtrans Snap modal popup overlay
                window.snap.pay(snap_token, {
                    onSuccess: function(result) {
                        window.location.href = `/payment/success/${result.order_id || order_id}`;
                    },
                    onPending: function(result) {
                        window.location.href = `/payment/success/${result.order_id || order_id}`;
                    },
                    onError: function(result) {
                        alert('Pembayaran gagal dilakukan. Silakan coba lagi.');
                        resetLoadingState();
                    },
                    onClose: function() {
                        alert('Popup ditutup. Pembayaran Anda belum diselesaikan.');
                        resetLoadingState();
                    }
                });

            } catch (err) {
                console.error(err);
                alert('Gagal terhubung ke server. Periksa jaringan Anda dan coba lagi.');
                resetLoadingState();
            }
        });

        function resetLoadingState() {
            payButton.disabled = false;
            buttonText.textContent = 'Lanjut Pembayaran';
            buttonSpinner.classList.add('hidden');
        }
    });
</script>
@endpush