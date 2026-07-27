@extends('layouts.admin.admin')

@section('title', 'Laporan Transaksi - Admin Amikom Event Hub')

@section('content')
<header class="flex flex-col lg:flex-row justify-between lg:items-center gap-4 mb-6 md:mb-10">
    <div>
        <h1 class="text-2xl md:text-3xl font-black text-slate-800">Laporan Transaksi</h1>
        <p class="text-sm md:text-base text-slate-500 font-medium">Pantau arus kas dan penjualan tiket Anda.</p>
    </div>
    <div class="flex flex-wrap gap-2 md:gap-3 items-center">
        <form action="{{ route('admin.transactions.expire-pending') }}" method="POST" class="w-full sm:w-auto"
            onsubmit="return confirm('Apakah Anda yakin ingin mengubah semua transaksi pending yang berusia > 24 jam menjadi expired?')">
            @csrf
            <button type="submit"
                class="w-full sm:w-auto px-4 md:px-5 py-2.5 md:py-3 bg-rose-50 hover:bg-rose-100 border border-rose-200 text-rose-600 rounded-xl md:rounded-2xl font-bold text-xs md:text-sm transition flex items-center justify-center gap-1.5 shadow-sm">
                <i class="ph ph-trash text-lg"></i>
                <span>Bersihkan Kadaluarsa</span>
            </button>
        </form>
        <button
            class="flex-1 sm:flex-none px-4 md:px-5 py-2.5 md:py-3 border-2 border-slate-200 rounded-xl md:rounded-2xl font-bold text-xs md:text-sm hover:bg-white hover:border-indigo-600 hover:text-indigo-600 transition">
            Ekspor Excel
        </button>
        <button
            class="flex-1 sm:flex-none px-4 md:px-5 py-2.5 md:py-3 bg-indigo-600 text-white rounded-xl md:rounded-2xl font-bold text-xs md:text-sm shadow-lg hover:bg-indigo-700 transition">
            Unduh PDF
        </button>
    </div>
</header>

@if(session('success'))
    <div class="mb-6 p-4 bg-emerald-50 border border-emerald-100 text-emerald-700 rounded-2xl text-xs md:text-sm font-bold shadow-sm">
        {{ session('success') }}
    </div>
@endif

<div class="bg-white rounded-2xl md:rounded-[2.5rem] border border-slate-100 shadow-sm overflow-hidden">
    <form action="{{ route('admin.transactions') }}" method="GET" class="p-4 md:px-8 md:py-6 bg-slate-50/50 border-b flex flex-col md:flex-row gap-3 md:items-center justify-between">
        <div class="flex-1 min-w-full md:min-w-[280px]">
            <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari Order ID, Nama, Email, atau Kode..."
                class="w-full px-4 md:px-5 py-2.5 md:py-3 rounded-xl border-slate-200 border bg-white focus:ring-2 focus:ring-indigo-500 outline-none transition uppercase text-xs md:text-sm font-medium tracking-wide">
        </div>
        <div class="flex flex-wrap gap-2">
            <select name="status" onchange="this.form.submit()"
                class="flex-1 sm:flex-none px-4 md:px-5 py-2.5 md:py-3 rounded-xl border-slate-200 border bg-white outline-none text-xs md:text-sm font-bold">
                <option value="">Semua Status</option>
                <option value="Success" {{ request('status') == 'Success' ? 'selected' : '' }} class="text-green-600">Success</option>
                <option value="Pending" {{ request('status') == 'Pending' ? 'selected' : '' }} class="text-orange-600">Pending</option>
                <option value="Expired" {{ request('status') == 'Expired' ? 'selected' : '' }} class="text-rose-600">Expired</option>
            </select>
            @if(request('search') || request('status'))
                <a href="{{ route('admin.transactions') }}" class="px-4 py-2.5 md:py-3 rounded-xl border border-slate-200 bg-white hover:bg-slate-50 outline-none text-xs md:text-sm font-bold text-slate-500 transition flex items-center justify-center">
                    Reset
                </a>
            @endif
        </div>
    </form>

    <div class="overflow-x-auto">
        <table class="w-full text-left border-collapse min-w-[700px]">
            <thead class="bg-slate-50 text-slate-400 uppercase text-[10px] font-black tracking-widest">
                <tr>
                    <th class="px-6 py-4">Order ID</th>
                    <th class="px-6 py-4">Detail Pembeli</th>
                    <th class="px-6 py-4">Event</th>
                    <th class="px-6 py-4">Tgl Transaksi</th>
                    <th class="px-6 py-4">Status</th>
                    <th class="px-6 py-4 text-right">Total Tagihan</th>
                </tr>
            </thead>
            <tbody class="divide-y border-t">
                 @forelse($transactions as $trx)
                <tr class="hover:bg-slate-50/50 transition {{ strtolower($trx->status) == 'pending' ? 'text-slate-400' : '' }}">
                    <td class="px-6 py-4">
                        <span class="font-mono font-bold px-3 py-1 rounded-lg text-xs md:text-sm {{ strtolower($trx->status) == 'pending' ? 'bg-slate-100' : 'text-indigo-600 bg-indigo-50' }}">
                            {{ $trx->order_id }}
                        </span>
                        @if($trx->payment_type)
                            <div class="mt-1 text-[10px] text-slate-400 font-mono">Via: {{ strtoupper($trx->payment_type) }}</div>
                        @endif
                    </td>
                    <td class="px-6 py-4">
                        <p class="font-bold text-slate-800 text-sm">{{ $trx->customer_name }}</p>
                        <p class="text-xs text-slate-500">{{ $trx->customer_email }}<br>{{ $trx->customer_phone }}</p>
                    </td>
                    <td class="px-6 py-4">
                        <p class="font-medium text-slate-700 text-sm">{{ $trx->event->title ?? '-' }}</p>
                        @if($trx->ticket_code)
                            <p class="text-xs text-indigo-600 font-mono mt-1 font-bold">{{ $trx->ticket_code }}</p>
                        @endif
                    </td>
                    <td class="px-6 py-4 text-xs md:text-sm text-slate-500">
                        {{ $trx->created_at->format('d M Y, H:i') }}
                    </td>
                    <td class="px-6 py-4">
                        <div class="flex flex-col gap-1">
                            <div>
                                @if(strtolower($trx->status) === 'settlement' || strtolower($trx->status) === 'success')
                                    <span class="px-3 py-1 bg-green-100 text-green-700 rounded-lg text-xs font-bold uppercase ring-1 ring-green-200">Success</span>
                                @elseif(strtolower($trx->status) === 'pending')
                                    <span class="px-3 py-1 bg-orange-100 text-orange-700 rounded-lg text-xs font-bold uppercase ring-1 ring-orange-200">Pending</span>
                                @else
                                    <span class="px-3 py-1 bg-rose-100 text-rose-700 rounded-lg text-xs font-bold uppercase ring-1 ring-rose-200">{{ $trx->status }}</span>
                                @endif
                            </div>
                            @if($trx->is_checked_in)
                                <span class="text-[10px] text-emerald-600 font-bold">✓ Checked In</span>
                            @endif
                        </div>
                    </td>
                    <td class="px-6 py-4 text-right font-black text-sm md:text-base {{ strtolower($trx->status) == 'pending' ? '' : 'text-slate-900' }}">
                        Rp {{ number_format($trx->total_price, 0, ',', '.') }}
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="px-6 py-10 text-center text-slate-500 text-sm">Belum ada transaksi</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="p-4 md:px-8 md:py-6 bg-slate-50/50 border-t items-center">
        {{ $transactions->links() }}
    </div>
</div>
@endsection