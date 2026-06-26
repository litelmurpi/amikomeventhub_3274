@extends('layouts.app')

@section('title', 'Status Transaksi - AmikomEventHub')

@section('content')
<main class="max-w-xl mx-auto px-6 py-20">
    <div class="bg-white rounded-3xl border border-slate-200 shadow-xl overflow-hidden">
        
        <!-- Header status color accent -->
        @if(strtolower($transaction->status) === 'success')
            <div class="h-4 bg-green-500"></div>
        @elseif(strtolower($transaction->status) === 'pending')
            <div class="h-4 bg-amber-500 animate-pulse"></div>
        @else
            <div class="h-4 bg-red-500"></div>
        @endif

        <div class="p-8 md:p-10 flex flex-col items-center">
            
            <!-- Status Icon -->
            @if(strtolower($transaction->status) === 'success')
                <div class="w-20 h-20 bg-green-50 rounded-full flex items-center justify-center text-green-500 mb-6 ring-8 ring-green-50/50">
                    <svg class="w-10 h-10 animate-bounce" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path>
                    </svg>
                </div>
                <h1 class="text-2xl font-black text-slate-800 text-center">Pembayaran Berhasil!</h1>
                <p class="text-slate-500 text-sm text-center mt-2">Tiket Anda telah terbit dan siap digunakan.</p>
            @elseif(strtolower($transaction->status) === 'pending')
                <div class="w-20 h-20 bg-amber-50 rounded-full flex items-center justify-center text-amber-500 mb-6 ring-8 ring-amber-50/50">
                    <svg class="w-10 h-10 animate-spin" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
                <h1 class="text-2xl font-black text-slate-800 text-center">Menunggu Pembayaran</h1>
                <p id="pending-description" class="text-slate-500 text-sm text-center mt-2">Sedang memverifikasi pembayaran Anda. Halaman akan diperbarui otomatis...</p>
                
                @if($transaction->snap_token)
                    <button onclick="payPending()" class="mt-4 px-6 py-3 bg-amber-500 hover:bg-amber-600 text-white font-bold rounded-2xl text-sm shadow-md shadow-amber-100 hover:shadow-lg transition flex items-center gap-2">
                        💳 Bayar Sekarang via Midtrans
                    </button>
                @endif
            @else
                <div class="w-20 h-20 bg-red-50 rounded-full flex items-center justify-center text-red-500 mb-6 ring-8 ring-red-50/50">
                    <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </div>
                <h1 class="text-2xl font-black text-slate-800 text-center">Transaksi Kadaluarsa</h1>
                <p class="text-slate-500 text-sm text-center mt-2">Batas waktu pembayaran telah habis atau dibatalkan.</p>
            @endif

            <!-- Divider -->
            <div class="w-full border-b my-8 border-slate-100"></div>

            <!-- E-Ticket Container (Only for Successful Transactions with Ticket Code) -->
            @if(strtolower($transaction->status) === 'success' && $transaction->ticket_code)
                <div class="w-full flex flex-col items-center justify-center p-6 bg-slate-50 rounded-2xl border-2 border-dashed border-slate-200 mb-8">
                    @if(class_exists('SimpleSoftwareIO\QrCode\Facades\QrCode'))
                        <div class="bg-white p-2 rounded-xl shadow-sm">
                            {!! SimpleSoftwareIO\QrCode\Facades\QrCode::size(140)->generate($transaction->ticket_code) !!}
                        </div>
                    @else
                        <div class="bg-white p-2 rounded-xl shadow-sm">
                            <img src="https://api.qrserver.com/v1/create-qr-code/?size=140x140&data={{ urlencode($transaction->ticket_code) }}" alt="QR Code" class="w-36 h-36">
                        </div>
                    @endif
                    <span class="mt-4 font-mono font-black text-lg tracking-widest text-indigo-600">{{ $transaction->ticket_code }}</span>
                    <p class="text-[10px] text-slate-400 font-bold uppercase mt-1">Tunjukkan QR Code ini di pintu masuk event</p>
                </div>
            @endif

            <!-- Detail Grid -->
            <div class="w-full space-y-4">
                <div class="flex justify-between items-center text-sm border-b border-slate-50 pb-2">
                    <span class="text-slate-400 font-medium">Order ID</span>
                    <span class="font-mono font-bold text-slate-800">{{ $transaction->order_id }}</span>
                </div>
                <div class="flex justify-between items-start text-sm border-b border-slate-50 pb-2">
                    <span class="text-slate-400 font-medium">Event</span>
                    <span class="font-bold text-slate-800 text-right max-w-[200px]">{{ $transaction->event->title ?? 'Event Dihapus' }}</span>
                </div>
                <div class="flex justify-between items-center text-sm border-b border-slate-50 pb-2">
                    <span class="text-slate-400 font-medium">Nama Pemesan</span>
                    <span class="font-bold text-slate-800">{{ $transaction->customer_name }}</span>
                </div>
                <div class="flex justify-between items-center text-sm border-b border-slate-50 pb-2">
                    <span class="text-slate-400 font-medium">No. WhatsApp</span>
                    <span class="font-medium text-slate-800">{{ $transaction->customer_phone }}</span>
                </div>
                @if($transaction->payment_type)
                    <div class="flex justify-between items-center text-sm border-b border-slate-50 pb-2">
                        <span class="text-slate-400 font-medium">Metode Bayar</span>
                        <span class="font-mono font-bold text-slate-800">{{ strtoupper($transaction->payment_type) }}</span>
                    </div>
                @endif
                <div class="flex justify-between items-center text-base pt-2">
                    <span class="text-slate-800 font-bold">Total Pembayaran</span>
                    <span class="text-indigo-600 font-black text-lg">Rp {{ number_format($transaction->total_price, 0, ',', '.') }}</span>
                </div>
            </div>

            <!-- Action Buttons -->
            <div class="w-full mt-10 space-y-3">
                @if(strtolower($transaction->status) === 'success' && $transaction->ticket_code)
                    <a href="{{ route('eticket.show', $transaction->ticket_code) }}" target="_blank" class="w-full py-4 bg-indigo-600 text-white rounded-2xl font-bold flex items-center justify-center gap-2 hover:bg-indigo-700 shadow-lg shadow-indigo-100 active:scale-95 transition-all">
                        🎫 Tampilkan E-Ticket Resmi
                    </a>
                @endif
                <a href="{{ route('home') }}" class="w-full py-4 border border-slate-200 text-slate-600 rounded-2xl font-bold flex items-center justify-center hover:bg-slate-50 active:scale-95 transition-all">
                    Kembali ke Beranda
                </a>
            </div>

        </div>
    </div>
</main>

@if(strtolower($transaction->status) === 'pending')
@push('scripts')
<script src="{{ config('midtrans.is_production')
    ? 'https://app.midtrans.com/snap/snap.js'
    : 'https://app.sandbox.midtrans.com/snap/snap.js' }}"
    data-client-key="{{ config('midtrans.client_key') }}"></script>

<script>
    // Launch Midtrans payment popup for pending transactions
    function payPending() {
        window.snap.pay('{{ $transaction->snap_token }}', {
            onSuccess: function(result) {
                window.location.reload();
            },
            onPending: function(result) {
                window.location.reload();
            },
            onError: function(result) {
                alert('Pembayaran gagal dilakukan. Silakan coba kembali.');
            },
            onClose: function() {
                alert('Popup ditutup. Pembayaran belum diselesaikan.');
            }
        });
    }

    document.addEventListener('DOMContentLoaded', function() {
        let attempts = 0;
        const maxAttempts = 36; // 3 minutes total (36 * 5s)
        const checkStatusInterval = setInterval(function() {
            attempts++;
            if (attempts >= maxAttempts) {
                clearInterval(checkStatusInterval);
                const desc = document.getElementById('pending-description');
                if (desc) {
                    desc.textContent = 'Verifikasi tertunda. Silakan hubungi admin atau lakukan pembayaran secara manual.';
                    desc.classList.add('text-red-500', 'font-bold');
                }
                return;
            }
            
            // Reload the page to fetch fresh status from the database
            window.location.reload();
        }, 5000);
    });
</script>
@endpush
@endif
@endsection
