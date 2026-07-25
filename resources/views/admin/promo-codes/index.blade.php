@extends('layouts.admin.admin')

@section('title', 'Kelola Kode Promo - Admin Dashboard')

@section('content')
<main class="flex-1 p-10 overflow-y-auto">
    <header class="flex justify-between items-center mb-10">
        <div>
            <h1 class="text-3xl font-black">Kelola Kode Promo</h1>
            <p class="text-slate-500 font-medium">Buat dan atur kupon diskon untuk event tiket Anda.</p>
        </div>
        <div>
            <a href="{{ route('admin.promo-codes.create') }}"
                class="px-6 py-3 bg-indigo-600 text-white rounded-2xl font-bold shadow-lg hover:bg-indigo-700 transition flex items-center gap-2">
                ＋ Tambah Promo
            </a>
        </div>
    </header>

    @if(session('success'))
        <div class="mb-6 p-4 bg-emerald-50 border border-emerald-100 text-emerald-700 rounded-2xl text-sm font-bold">
            {{ session('success') }}
        </div>
    @endif

    <div class="bg-white rounded-[2.5rem] border border-slate-100 shadow-sm overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead class="bg-slate-50 text-slate-400 uppercase text-[10px] font-black tracking-widest">
                    <tr>
                        <th class="px-8 py-4">Kode</th>
                        <th class="px-8 py-4">Tipe Diskon</th>
                        <th class="px-8 py-4">Nilai Potongan</th>
                        <th class="px-8 py-4">Batasan Event</th>
                        <th class="px-8 py-4">Penggunaan</th>
                        <th class="px-8 py-4">Status</th>
                        <th class="px-8 py-4">Berlaku Sampai</th>
                        <th class="px-8 py-4 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y border-t">
                    @forelse($promoCodes as $promo)
                        <tr class="hover:bg-slate-50/50 transition">
                            <td class="px-8 py-6">
                                <span class="font-mono font-black text-indigo-600 bg-indigo-50 px-3 py-1 rounded-lg text-sm">
                                    {{ $promo->code }}
                                </span>
                            </td>
                            <td class="px-8 py-6 text-sm font-bold text-slate-700">
                                {{ $promo->type === 'fixed' ? 'Nominal (Rupiah)' : 'Persentase (%)' }}
                            </td>
                            <td class="px-8 py-6 text-sm font-black text-slate-800">
                                {{ $promo->type === 'fixed' ? 'Rp ' . number_format($promo->value, 0, ',', '.') : $promo->value . '%' }}
                            </td>
                            <td class="px-8 py-6 text-sm text-slate-500 font-medium">
                                {{ $promo->event->title ?? 'Berlaku Global (Semua Event)' }}
                            </td>
                            <td class="px-8 py-6 text-sm font-medium text-slate-700">
                                <span class="text-slate-800 font-bold">{{ $promo->used_count }}</span> / {{ $promo->max_uses == 0 ? '∞' : $promo->max_uses }}
                            </td>
                            <td class="px-8 py-6">
                                @if($promo->is_active && (!$promo->valid_until || $promo->valid_until->isFuture()))
                                    <span class="px-3 py-1 bg-green-100 text-green-700 rounded-lg text-xs font-bold uppercase ring-1 ring-green-200">Aktif</span>
                                @else
                                    <span class="px-3 py-1 bg-red-100 text-red-700 rounded-lg text-xs font-bold uppercase ring-1 ring-red-200">Non-Aktif</span>
                                @endif
                            </td>
                            <td class="px-8 py-6 text-sm text-slate-500 font-medium">
                                {{ $promo->valid_until ? $promo->valid_until->format('d M Y, H:i') : '-' }}
                            </td>
                            <td class="px-8 py-6 text-center">
                                <div class="flex gap-2 justify-center">
                                    <a href="{{ route('admin.promo-codes.edit', $promo->id) }}"
                                        class="px-3 py-1.5 bg-slate-100 text-slate-600 rounded-xl text-xs font-bold hover:bg-slate-200 transition">
                                        Edit
                                    </a>
                                    <form action="{{ route('admin.promo-codes.destroy', $promo->id) }}" method="POST"
                                        onsubmit="return confirm('Apakah Anda yakin ingin menghapus kode promo ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="px-3 py-1.5 bg-red-50 text-red-600 hover:bg-red-100 rounded-xl text-xs font-bold transition">
                                            Hapus
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" class="px-8 py-10 text-center text-slate-500 text-sm">Belum ada kode promo dibuat</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="px-8 py-6 bg-slate-50/50 border-t">
            {{ $promoCodes->links() }}
        </div>
    </div>
</main>
@endsection
