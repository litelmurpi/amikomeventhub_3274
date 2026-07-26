@extends('layouts.app')

@section('title', 'E-Ticket - ' . $transaction->ticket_code)

@section('content')
<!-- Include html2canvas for client-side PNG downloading -->
@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const downloadBtn = document.getElementById('btn-download-png');
        const printBtn = document.getElementById('btn-print');
        const ticketCard = document.getElementById('ticket-card');

        // PNG Download action
        if (downloadBtn) {
            downloadBtn.addEventListener('click', function() {
                // Temporarily remove shadow for clean capture
                ticketCard.classList.remove('shadow-2xl');
                
                html2canvas(ticketCard, {
                    scale: 2, // Double quality
                    useCORS: true,
                    backgroundColor: '#ffffff'
                }).then(canvas => {
                    const link = document.createElement('a');
                    link.download = `E-Ticket-${@json($transaction->ticket_code)}.png`;
                    link.href = canvas.toDataURL('image/png');
                    link.click();
                    
                    // Restore shadow
                    ticketCard.classList.add('shadow-2xl');
                }).catch(err => {
                    console.error('Error generating image:', err);
                    alert('Gagal mengunduh tiket sebagai gambar. Silakan gunakan tombol Cetak.');
                    ticketCard.classList.add('shadow-2xl');
                });
            });
        }

        // Native print action
        if (printBtn) {
            printBtn.addEventListener('click', function() {
                window.print();
            });
        }
    });
</script>
@endpush

<style>
    /* Styling for printing: hide navbar, footer and buttons */
    @media print {
        nav, footer, .no-print {
            display: none !important;
        }
        body {
            background: white !important;
            padding: 0 !important;
            margin: 0 !important;
        }
        main {
            padding: 0 !important;
            margin: 0 !important;
        }
        .ticket-container {
            padding: 0 !important;
            margin: 0 !important;
            max-width: 100% !important;
        }
        .ticket-card {
            border: 1px solid #e2e8f0 !important;
            box-shadow: none !important;
            margin: 0 auto !important;
        }
    }
</style>

<main class="max-w-xl mx-auto px-6 py-12 ticket-container">
    
    <!-- Action buttons (Hidden in Print) -->
    <div class="flex justify-between items-center mb-8 no-print">
        <a href="{{ route('user.tickets') }}" class="text-indigo-600 font-bold flex items-center gap-2">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
            </svg>
            Kembali ke Tiket Saya
        </a>
        <div class="flex gap-2">
            <button id="btn-print" class="px-4 py-2 border-2 border-slate-200 hover:bg-slate-100 rounded-xl text-slate-700 font-bold text-sm transition">
                Cetak PDF
            </button>
            <button id="btn-download-png" class="px-4 py-2 bg-indigo-600 hover:bg-indigo-700 text-white rounded-xl font-bold text-sm shadow-md transition">
                Unduh PNG
            </button>
        </div>
    </div>

    <!-- Ticket Card -->
    <div id="ticket-card" class="bg-white rounded-[2rem] border border-slate-200 shadow-2xl overflow-hidden flex flex-col">
        
        <!-- Header -->
        <div class="bg-indigo-900 p-8 text-white relative">
            <!-- Decorative circle punches -->
            <div class="absolute left-0 bottom-0 w-8 h-8 bg-slate-50 rounded-full translate-y-4 -translate-x-4 no-print"></div>
            <div class="absolute right-0 bottom-0 w-8 h-8 bg-slate-50 rounded-full translate-y-4 translate-x-4 no-print"></div>
            
            <div class="flex justify-between items-center mb-6">
                <div class="flex items-center gap-2">
                    <img src="{{ asset('assets/logo-icon.svg') }}" alt="Logo" class="w-7 h-7 rounded-lg shadow-sm">
                    <span class="px-3 py-1 bg-indigo-800 text-indigo-200 border border-indigo-700 rounded-lg text-xs font-bold uppercase tracking-wider">E-Ticket Resmi</span>
                </div>
                <span class="text-xs font-bold text-indigo-300">Order ID: {{ $transaction->order_id }}</span>
            </div>
            <h2 class="text-2xl font-black tracking-tight leading-tight">{{ $transaction->event->title ?? 'Event Dihapus' }}</h2>
            <p class="text-indigo-300 mt-2 text-sm">{{ $transaction->event->date ?? '-' }}</p>
        </div>

        <!-- Ticket Body -->
        <div class="p-8 flex-1 bg-white relative border-b border-dashed border-slate-200">
            <!-- Decorative circle punches -->
            <div class="absolute left-0 top-0 w-8 h-8 bg-slate-50 rounded-full -translate-y-4 -translate-x-4 no-print"></div>
            <div class="absolute right-0 top-0 w-8 h-8 bg-slate-50 rounded-full -translate-y-4 translate-x-4 no-print"></div>

            <div class="grid grid-cols-2 gap-y-6 gap-x-4">
                <div>
                    <span class="block text-[10px] uppercase font-bold text-slate-400 tracking-wider">Nama Pemesan</span>
                    <span class="font-extrabold text-slate-800 text-sm md:text-base">{{ $transaction->customer_name }}</span>
                </div>
                <div>
                    <span class="block text-[10px] uppercase font-bold text-slate-400 tracking-wider">No. WhatsApp</span>
                    <span class="font-bold text-slate-800 text-sm md:text-base">{{ $transaction->customer_phone }}</span>
                </div>
                <div>
                    <span class="block text-[10px] uppercase font-bold text-slate-400 tracking-wider">Lokasi</span>
                    <span class="font-medium text-slate-700 text-xs md:text-sm line-clamp-2">{{ $transaction->event->location ?? '-' }}</span>
                </div>
                <div>
                    <span class="block text-[10px] uppercase font-bold text-slate-400 tracking-wider">Metode Pembayaran</span>
                    <span class="font-mono font-bold text-indigo-600 text-sm">{{ strtoupper($transaction->payment_type ?? 'Online') }}</span>
                </div>
            </div>
        </div>

        <!-- Ticket Footer / QR Code Section -->
        <div class="p-8 bg-slate-50/50 flex flex-col items-center justify-center">
            <div class="bg-white p-4 rounded-3xl border border-slate-200 shadow-sm mb-4">
                @if(class_exists('SimpleSoftwareIO\QrCode\Facades\QrCode'))
                    {!! SimpleSoftwareIO\QrCode\Facades\QrCode::size(150)->generate($transaction->ticket_code) !!}
                @else
                    <img src="https://api.qrserver.com/v1/create-qr-code/?size=150x150&data={{ urlencode($transaction->ticket_code) }}" alt="QR Code" class="w-36 h-36">
                @endif
            </div>
            
            <span class="font-mono font-black text-2xl tracking-widest text-slate-800">{{ $transaction->ticket_code }}</span>
            <div class="flex items-center gap-2 text-slate-400 text-xs font-bold mt-2 uppercase tracking-wide">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                </svg>
                Pindai QR Code di Pintu Masuk
            </div>
        </div>

    </div>
    
    <p class="text-center text-xs text-slate-400 mt-6 no-print">E-Ticket ini bersifat pribadi dan rahasia. Jangan tunjukkan kode tiket atau QR Code kepada siapapun selain panitia resmi.</p>
</main>
@endsection
