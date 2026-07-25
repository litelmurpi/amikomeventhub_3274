@extends('layouts.admin.admin')

@section('title', 'Validasi & Check-in Tiket - AmikomEventHub')

@section('content')
<main class="flex-1 p-10 overflow-y-auto">
    <header class="flex justify-between items-center mb-10">
        <div>
            <h1 class="text-3xl font-black">Check-in Tiket</h1>
            <p class="text-slate-500 font-medium">Validasi tiket masuk peserta event secara real-time.</p>
        </div>
    </header>

    <!-- Stats Grid -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-10">
        <div class="bg-white p-6 rounded-3xl border border-slate-100 shadow-sm flex items-center gap-4">
            <div class="w-12 h-12 bg-indigo-50 text-indigo-600 rounded-2xl flex items-center justify-center">
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
            <div class="w-12 h-12 bg-emerald-50 text-emerald-600 rounded-2xl flex items-center justify-center">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
            </div>
            <div>
                <span class="block text-slate-400 text-xs font-bold uppercase tracking-wide">Sudah Hadir</span>
                <span class="text-2xl font-black text-slate-800">{{ $totalCheckedIn }}</span>
            </div>
        </div>
        <div class="bg-white p-6 rounded-3xl border border-slate-100 shadow-sm flex items-center gap-4">
            <div class="w-12 h-12 bg-amber-50 text-amber-600 rounded-2xl flex items-center justify-center">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
            </div>
            <div>
                <span class="block text-slate-400 text-xs font-bold uppercase tracking-wide">Belum Datang</span>
                <span class="text-2xl font-black text-slate-800">{{ max(0, $totalSoldTickets - $totalCheckedIn) }}</span>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        
        <!-- Check-in Form Card -->
        <div class="lg:col-span-1 bg-white rounded-[2.5rem] border border-slate-100 p-8 shadow-sm h-fit">
            <h3 class="text-xl font-bold text-slate-800 mb-4">Pindai / Input Tiket</h3>
            <p class="text-slate-400 text-xs font-semibold mb-6">Masukkan kode tiket (contoh: EVT-XXXXX-XXXXX) atau gunakan alat pemindai barcode untuk memvalidasi tiket masuk.</p>
            
            <!-- Session Alerts -->
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

            <!-- Form -->
            <form action="{{ route('admin.checkin.verify') }}" method="POST" class="space-y-6">
                @csrf
                <div>
                    <label for="ticket_code" class="block text-xs font-black text-slate-400 uppercase tracking-widest mb-2">Kode Tiket (Ticket Code)</label>
                    <input type="text" name="ticket_code" id="ticket_code" placeholder="EVT-XXXXX-XXXXX" 
                        class="w-full px-5 py-4 border border-slate-200 bg-slate-50 focus:bg-white rounded-2xl focus:ring-4 focus:ring-indigo-500/10 focus:border-indigo-600 outline-none transition font-mono font-bold text-center tracking-widest text-lg uppercase"
                        required autofocus value="{{ old('ticket_code') }}">
                </div>
                <button type="submit" class="w-full py-4 bg-indigo-600 hover:bg-indigo-700 text-white rounded-2xl font-bold transition shadow-lg shadow-indigo-100 hover:shadow-xl">
                    Verifikasi Kehadiran
                </button>
            </form>
        </div>

        <!-- Recent Check-ins Card -->
        <div class="lg:col-span-2 bg-white rounded-[2.5rem] border border-slate-100 p-8 shadow-sm">
            <h3 class="text-xl font-bold text-slate-800 mb-6">Kehadiran Terbaru</h3>
            
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead class="bg-slate-50 text-slate-400 uppercase text-[10px] font-black tracking-widest">
                        <tr>
                            <th class="px-6 py-4">Kode Tiket</th>
                            <th class="px-6 py-4">Nama Pemesan</th>
                            <th class="px-6 py-4">Nama Event</th>
                            <th class="px-6 py-4">Waktu Check-in</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y border-t">
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
</main>
@endsection
