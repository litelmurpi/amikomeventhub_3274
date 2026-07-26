@extends('layouts.admin.admin')

@section('title', 'Validasi & Check-in Tiket - AmikomEventHub')

@section('content')
<div class="space-y-6 sm:space-y-8">
    <header class="flex justify-between items-center mb-6 md:mb-10">
        <div>
            <h1 class="text-2xl sm:text-3xl font-black">Check-in Tiket</h1>
            <p class="text-slate-500 font-medium text-sm sm:text-base">Validasi tiket masuk peserta event secara real-time.</p>
        </div>
    </header>

    <!-- Stats Grid -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6 md:mb-10">
        <div class="bg-white p-6 rounded-3xl border border-slate-100 shadow-sm flex items-center gap-4">
            <div class="w-12 h-12 bg-indigo-50 text-indigo-600 rounded-2xl flex items-center justify-center flex-shrink-0">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 5v2m0 4v2m0 4v2M5 5a2 2 0 00-2 2v3a2 2 0 110 4v3a2 2 0 002 2h14a2 2 0 002-2v-3a2 2 0 110-4V7a2 2 0 00-2-2H5z"></path>
                </svg>
            </div>
            <div>
                <span class="block text-slate-400 text-xs font-bold uppercase tracking-wide">Tiket Lunas</span>
                <span class="text-2xl font-black text-slate-800">{{ $totalSoldTickets }}</span>
            </div>
        </div>
        <div class="bg-white p-6 rounded-3xl border border-slate-100 shadow-sm flex items-center gap-4">
            <div class="w-12 h-12 bg-emerald-50 text-emerald-600 rounded-2xl flex items-center justify-center flex-shrink-0">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
            </div>
            <div>
                <span class="block text-slate-400 text-xs font-bold uppercase tracking-wide">Sudah Hadir</span>
                <span id="stat-checked-in" class="text-2xl font-black text-slate-800">{{ $totalCheckedIn }}</span>
            </div>
        </div>
        <div class="bg-white p-6 rounded-3xl border border-slate-100 shadow-sm flex items-center gap-4">
            <div class="w-12 h-12 bg-amber-50 text-amber-600 rounded-2xl flex items-center justify-center flex-shrink-0">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
            </div>
            <div>
                <span class="block text-slate-400 text-xs font-bold uppercase tracking-wide">Belum Datang</span>
                <span id="stat-pending" class="text-2xl font-black text-slate-800">{{ max(0, $totalSoldTickets - $totalCheckedIn) }}</span>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        
        <!-- Check-in Form & Scanner Card -->
        <div class="lg:col-span-1 bg-white rounded-3xl sm:rounded-[2.5rem] border border-slate-100 p-6 sm:p-8 shadow-sm h-fit">
            <h3 class="text-xl font-bold text-slate-800 mb-2">Pindai / Input Tiket</h3>
            <p class="text-slate-400 text-xs font-semibold mb-6">Pindai QR Code via kamera HP/Webcam atau masukkan kode tiket secara manual.</p>
            
            <!-- Button Camera Scanner Toggle -->
            <button id="toggle-scanner-btn" type="button" onclick="toggleQrScanner()"
                class="w-full mb-6 py-3.5 px-4 bg-indigo-600 hover:bg-indigo-700 text-white rounded-2xl font-bold transition flex items-center justify-center gap-2 shadow-lg shadow-indigo-100 text-sm">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z"></path>
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 13a3 3 0 11-6 0 3 3 0 016 0z"></path>
                </svg>
                <span id="scanner-btn-label">📷 Buka Kamera Scanner</span>
            </button>

            <!-- Video Preview Container -->
            <div id="scanner-wrapper" class="hidden mb-6">
                <div id="qr-reader" class="rounded-2xl overflow-hidden border-2 border-indigo-500/30 bg-slate-900"></div>
                <p class="text-[11px] text-center text-slate-400 mt-2 font-medium">Arahkan kamera ke QR Code E-Ticket peserta</p>
            </div>

            <!-- Dynamic AJAX Result Alert -->
            <div id="ajax-result" class="hidden mb-6"></div>

            <!-- Session Alerts (Fallback Manual Form) -->
            @if(session('success'))
                <div class="mb-6 p-4 bg-emerald-50 border border-emerald-100 text-emerald-700 rounded-2xl text-sm font-bold flex items-start gap-3">
                    <span class="text-lg">✓</span>
                    <span>{{ session('success') }}</span>
                </div>
            @endif

            @if(session('warning'))
                <div class="mb-6 p-4 bg-amber-50 border border-amber-100 text-amber-700 rounded-2xl text-sm font-bold flex items-start gap-3">
                    <span class="text-lg">⚠️</span>
                    <span>{{ session('warning') }}</span>
                </div>
            @endif

            @if(session('error'))
                <div class="mb-6 p-4 bg-red-50 border border-red-100 text-red-700 rounded-2xl text-sm font-bold flex items-start gap-3">
                    <span class="text-lg">✕</span>
                    <span>{{ session('error') }}</span>
                </div>
            @endif

            <!-- Form Manual -->
            <form action="{{ route('admin.checkin.verify') }}" method="POST" class="space-y-6">
                @csrf
                <div>
                    <label for="ticket_code" class="block text-xs font-black text-slate-400 uppercase tracking-widest mb-2">Kode Tiket (Manual Input)</label>
                    <input type="text" name="ticket_code" id="ticket_code" placeholder="EVT-XXXXX-XXXXX" 
                        class="w-full px-5 py-4 border border-slate-200 bg-slate-50 focus:bg-white rounded-2xl focus:ring-4 focus:ring-indigo-500/10 focus:border-indigo-600 outline-none transition font-mono font-bold text-center tracking-widest text-base sm:text-lg uppercase"
                        required autofocus value="{{ old('ticket_code') }}">
                </div>
                <button type="submit" class="w-full py-4 bg-slate-900 hover:bg-slate-800 text-white rounded-2xl font-bold transition shadow-md">
                    Verifikasi Kehadiran
                </button>
            </form>
        </div>

        <!-- Recent Check-ins Card -->
        <div class="lg:col-span-2 bg-white rounded-3xl sm:rounded-[2.5rem] border border-slate-100 p-6 sm:p-8 shadow-sm">
            <h3 class="text-xl font-bold text-slate-800 mb-6">Kehadiran Terbaru</h3>
            
            <div class="overflow-x-auto min-w-full">
                <table class="w-full text-left border-collapse min-w-[500px]">
                    <thead class="bg-slate-50 text-slate-400 uppercase text-[10px] font-black tracking-widest">
                        <tr>
                            <th class="px-6 py-4">Kode Tiket</th>
                            <th class="px-6 py-4">Nama Pemesan</th>
                            <th class="px-6 py-4">Nama Event</th>
                            <th class="px-6 py-4">Waktu Check-in</th>
                        </tr>
                    </thead>
                    <tbody id="recent-checkins-tbody" class="divide-y border-t">
                        @forelse($recentCheckins as $checkin)
                            <tr class="hover:bg-slate-50/50 transition">
                                <td class="px-6 py-4">
                                    <span class="font-mono font-bold text-indigo-600 bg-indigo-50 px-2.5 py-1 rounded-lg text-xs">
                                        {{ $checkin->ticket_code }}
                                    </span>
                                </td>
                                <td class="px-6 py-4 font-bold text-slate-800 text-sm">
                                    {{ $checkin->customer_name }}
                                </td>
                                <td class="px-6 py-4 text-slate-600 text-sm">
                                    {{ $checkin->event->title ?? '-' }}
                                </td>
                                <td class="px-6 py-4 text-slate-500 text-xs font-semibold">
                                    {{ $checkin->checked_in_at ? $checkin->checked_in_at->diffForHumans() : '-' }}
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="px-6 py-10 text-center text-slate-500 text-sm">Belum ada check-in hari ini</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</div>

<!-- HTML5 QR Code Library -->
<script src="https://unpkg.com/html5-qrcode"></script>
<script>
    let html5QrCode = null;
    let isScanning = false;
    let isProcessing = false;

    function toggleQrScanner() {
        const wrapper = document.getElementById('scanner-wrapper');
        const btnLabel = document.getElementById('scanner-btn-label');
        const toggleBtn = document.getElementById('toggle-scanner-btn');

        if (isScanning) {
            stopScanner();
            wrapper.classList.add('hidden');
            btnLabel.innerText = '📷 Buka Kamera Scanner';
            toggleBtn.classList.remove('bg-rose-600', 'hover:bg-rose-700');
            toggleBtn.classList.add('bg-indigo-600', 'hover:bg-indigo-700');
        } else {
            wrapper.classList.remove('hidden');
            btnLabel.innerText = '✕ Tutup Kamera Scanner';
            toggleBtn.classList.remove('bg-indigo-600', 'hover:bg-indigo-700');
            toggleBtn.classList.add('bg-rose-600', 'hover:bg-rose-700');
            startScanner();
        }
    }

    function startScanner() {
        if (!html5QrCode) {
            html5QrCode = new Html5Qrcode("qr-reader");
        }

        const config = { fps: 10, qrbox: { width: 250, height: 250 } };

        html5QrCode.start(
            { facingMode: "environment" },
            config,
            onScanSuccess,
            onScanFailure
        ).then(() => {
            isScanning = true;
        }).catch(err => {
            console.error("Camera access error:", err);
            showAjaxResult('error', 'Gagal mengakses kamera. Pastikan izin kamera telah diberikan.');
        });
    }

    function stopScanner() {
        if (html5QrCode && isScanning) {
            html5QrCode.stop().then(() => {
                isScanning = false;
            }).catch(err => console.error("Stop scanner error:", err));
        }
    }

    function onScanSuccess(decodedText, decodedResult) {
        if (isProcessing) return;
        isProcessing = true;

        // Visual feedback
        showAjaxResult('info', '⏳ Memproses kode tiket ' + decodedText + '...');

        fetch("{{ route('admin.checkin.ajax') }}", {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
                "X-CSRF-TOKEN": "{{ csrf_token() }}"
            },
            body: JSON.stringify({ ticket_code: decodedText })
        })
        .then(response => response.json())
        .then(data => {
            showAjaxResult(data.status, data.message);
            if (data.status === 'success') {
                updateStatsAndTable(data.data);
            }
        })
        .catch(err => {
            console.error("AJAX Checkin Error:", err);
            showAjaxResult('error', 'Terjadi kesalahan jaringan saat memverifikasi tiket.');
        })
        .finally(() => {
            // Debounce scanner for 2.5 seconds to prevent multi-triggering
            setTimeout(() => {
                isProcessing = false;
            }, 2500);
        });
    }

    function onScanFailure(error) {
        // Silently ignore frame scan failures
    }

    function showAjaxResult(status, message) {
        const container = document.getElementById('ajax-result');
        container.classList.remove('hidden');

        let bgClass = 'bg-emerald-50 border-emerald-100 text-emerald-700';
        let icon = '✓';

        if (status === 'warning') {
            bgClass = 'bg-amber-50 border-amber-100 text-amber-700';
            icon = '⚠️';
        } else if (status === 'error') {
            bgClass = 'bg-red-50 border-red-100 text-red-700';
            icon = '✕';
        } else if (status === 'info') {
            bgClass = 'bg-indigo-50 border-indigo-100 text-indigo-700';
            icon = 'ℹ️';
        }

        container.className = `mb-6 p-4 border rounded-2xl text-sm font-bold flex items-start gap-3 ${bgClass}`;
        container.innerHTML = `<span class="text-lg">${icon}</span><span>${message}</span>`;
    }

    function updateStatsAndTable(data) {
        if (!data) return;

        // Update stats counters
        const checkedInElem = document.getElementById('stat-checked-in');
        const pendingElem = document.getElementById('stat-pending');
        if (checkedInElem) checkedInElem.innerText = parseInt(checkedInElem.innerText || 0) + 1;
        if (pendingElem) pendingElem.innerText = Math.max(0, parseInt(pendingElem.innerText || 0) - 1);

        // Prepend to recent checkins table
        const tbody = document.getElementById('recent-checkins-tbody');
        if (tbody) {
            const tr = document.createElement('tr');
            tr.className = 'hover:bg-slate-50/50 transition bg-emerald-50/40';
            tr.innerHTML = `
                <td class="px-6 py-4">
                    <span class="font-mono font-bold text-indigo-600 bg-indigo-50 px-2.5 py-1 rounded-lg text-xs">
                        ${data.ticket_code}
                    </span>
                </td>
                <td class="px-6 py-4 font-bold text-slate-800 text-sm">
                    ${data.customer_name}
                </td>
                <td class="px-6 py-4 text-slate-600 text-sm">
                    ${data.event_title}
                </td>
                <td class="px-6 py-4 text-slate-500 text-xs font-semibold">
                    Baru saja
                </td>
            `;
            tbody.insertBefore(tr, tbody.firstChild);
        }
    }
</script>
@endsection

