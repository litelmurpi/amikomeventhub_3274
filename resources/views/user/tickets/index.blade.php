@extends('layouts.app')

@section('title', 'Tiket Saya')

@section('content')
<main class="max-w-5xl mx-auto px-6 py-20">
    <div class="mb-12">
        <h1 class="text-4xl font-extrabold text-slate-900">Tiket Saya</h1>
        <p class="text-slate-500 mt-2">Daftar semua tiket event yang telah Anda pesan.</p>
    </div>

    <div class="bg-white rounded-3xl border border-slate-200 shadow-sm overflow-hidden">
        @if($tickets->count() > 0)
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead class="bg-slate-50 text-slate-400 uppercase text-[10px] font-black tracking-widest">
                    <tr>
                        <th class="px-8 py-4">Order ID</th>
                        <th class="px-8 py-4">Event</th>
                        <th class="px-8 py-4">Tgl Pemesanan</th>
                        <th class="px-8 py-4">Total Bayar</th>
                        <th class="px-8 py-4">Status</th>
                    </tr>
                </thead>
                <tbody class="divide-y border-t">
                    @foreach($tickets as $ticket)
                    <tr class="hover:bg-slate-50/50 transition">
                        <td class="px-8 py-6">
                            <span class="font-mono font-bold text-slate-700">
                                {{ $ticket->order_id }}
                            </span>
                        </td>
                        <td class="px-8 py-6">
                            <div class="flex items-center gap-4">
                                @if($ticket->event && $ticket->event->image)
                                    <img src="{{ asset($ticket->event->image) }}" class="w-12 h-12 rounded-xl object-cover">
                                @else
                                    <div class="w-12 h-12 bg-slate-100 rounded-xl flex items-center justify-center text-slate-400">
                                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                        </svg>
                                    </div>
                                @endif
                                <div>
                                    <p class="font-bold text-slate-800">{{ $ticket->event->title ?? 'Event Dihapus' }}</p>
                                    <p class="text-xs text-slate-500">{{ $ticket->event->date ?? '-' }}</p>
                                </div>
                            </div>
                        </td>
                        <td class="px-8 py-6 text-sm text-slate-500">
                            {{ $ticket->created_at->format('d M Y, H:i') }}
                        </td>
                        <td class="px-8 py-6 font-black text-slate-900">
                            Rp {{ number_format($ticket->total_price, 0, ',', '.') }}
                        </td>
                        <td class="px-8 py-6">
                            @if(strtolower($ticket->status) === 'settlement' || strtolower($ticket->status) === 'success')
                                <span class="px-3 py-1 bg-green-100 text-green-700 rounded-lg text-xs font-bold uppercase ring-1 ring-green-200">Success</span>
                            @elseif(strtolower($ticket->status) === 'pending')
                                <span class="px-3 py-1 bg-orange-100 text-orange-700 rounded-lg text-xs font-bold uppercase ring-1 ring-orange-200">Pending</span>
                            @else
                                <span class="px-3 py-1 bg-rose-100 text-rose-700 rounded-lg text-xs font-bold uppercase ring-1 ring-rose-200">{{ $ticket->status }}</span>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="px-8 py-6 bg-slate-50/50 border-t">
            {{ $tickets->links() }}
        </div>
        @else
        <div class="p-16 text-center">
            <div class="w-24 h-24 bg-indigo-50 text-indigo-300 rounded-full flex items-center justify-center mx-auto mb-6">
                <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 5v2m0 4v2m0 4v2M5 5a2 2 0 00-2 2v3a2 2 0 110 4v3a2 2 0 002 2h14a2 2 0 002-2v-3a2 2 0 110-4V7a2 2 0 00-2-2H5z"></path>
                </svg>
            </div>
            <h3 class="text-xl font-bold text-slate-800 mb-2">Belum ada tiket</h3>
            <p class="text-slate-500 mb-8 max-w-sm mx-auto">Anda belum melakukan pemesanan tiket apa pun. Yuk, jelajahi event seru sekarang!</p>
            <a href="{{ route('katalog') }}" class="inline-flex items-center gap-2 px-6 py-3 bg-indigo-600 text-white font-bold rounded-xl hover:bg-indigo-700 transition">
                Lihat Event
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                </svg>
            </a>
        </div>
        @endif
    </div>
</main>
@endsection
