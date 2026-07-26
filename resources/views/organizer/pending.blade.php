@extends('layouts.app')

@section('title', 'Status Pendaftaran Organisasi - Amikom Event Hub')

@section('content')
<main class="max-w-xl mx-auto px-6 py-20">
    <div class="bg-white rounded-3xl border border-slate-200 shadow-xl overflow-hidden">
        
        @if($org && $org->isRejected())
            @php
                $isDeactivated = ($org->events_count ?? 0) > 0 || \Illuminate\Support\Str::contains(strtolower($org->rejection_reason ?? ''), ['nonaktif', 'dinonaktifkan']);
            @endphp
            <!-- Rejected/Deactivated Header Accent -->
            <div class="h-4 bg-rose-500"></div>

            <div class="p-8 md:p-10 flex flex-col items-center">
                <!-- Rejected Icon -->
                <div class="w-20 h-20 bg-rose-50 rounded-full flex items-center justify-center text-rose-500 mb-6 ring-8 ring-rose-50/50">
                    <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path>
                    </svg>
                </div>

                <h1 class="text-2xl font-black text-slate-800 text-center">
                    {{ $isDeactivated ? 'Organisasi Dinonaktifkan' : 'Pendaftaran Organisasi Ditolak' }}
                </h1>
                <p class="text-slate-500 text-sm text-center mt-2">
                    {{ $isDeactivated ? 'Akun dan organisasi Anda saat ini dalam status dinonaktifkan oleh Superadmin.' : 'Mohon maaf, pengajuan pendaftaran organisasi Anda belum dapat disetujui saat ini.' }}
                </p>

                <!-- Rejection Reason Alert -->
                <div class="w-full mt-6 bg-rose-50 border border-rose-200 rounded-2xl p-5 text-sm text-rose-800">
                    <p class="font-bold mb-1 flex items-center gap-2">
                        <svg class="w-4 h-4 text-rose-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        {{ $isDeactivated ? 'Alasan Penonaktifan dari Superadmin:' : 'Alasan Penolakan dari Superadmin:' }}
                    </p>
                    <p class="text-slate-700 italic mt-1">{{ $org->rejection_reason ?? 'Persyaratan dokumen organisasi belum lengkap/tidak valid.' }}</p>
                </div>

                <!-- Form Ajukan Ulang -->
                <form action="{{ route('organizer.register.store') }}" method="POST" enctype="multipart/form-data" class="w-full mt-8 space-y-4">
                    @csrf
                    <h3 class="font-bold text-slate-800 text-base">Ajukan Ulang / Perbaiki Data Organisasi</h3>
                    
                    <div>
                        <label class="block text-xs font-bold text-slate-500 uppercase tracking-wider mb-2">Nama Organisasi *</label>
                        <input type="text" name="name" value="{{ old('name', $org->name) }}" required class="w-full px-4 py-3 border border-slate-200 rounded-xl text-slate-800 focus:ring-2 focus:ring-indigo-500 focus:outline-none text-sm">
                    </div>

                    <div>
                        <label class="block text-xs font-bold text-slate-500 uppercase tracking-wider mb-2">Tipe Organisasi *</label>
                        <select name="organization_type" required class="w-full px-4 py-3 border border-slate-200 rounded-xl text-slate-800 focus:ring-2 focus:ring-indigo-500 focus:outline-none text-sm">
                            <option value="internal" {{ old('organization_type', $org->organization_type) === 'internal' ? 'selected' : '' }}>Internal Kampus (HIMA/UKM/BEM/Prodi)</option>
                            <option value="external" {{ old('organization_type', $org->organization_type) === 'external' ? 'selected' : '' }}>Eksternal Kampus / Komunitas Partner</option>
                        </select>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-xs font-bold text-slate-500 uppercase tracking-wider mb-2">No. WA Penanggung Jawab *</label>
                            <input type="tel" name="phone_number" value="{{ old('phone_number', $org->phone_number) }}" required class="w-full px-4 py-3 border border-slate-200 rounded-xl text-slate-800 focus:ring-2 focus:ring-indigo-500 focus:outline-none text-sm">
                        </div>
                        <div>
                            <label class="block text-xs font-bold text-slate-500 uppercase tracking-wider mb-2">Link Medsos / Website</label>
                            <input type="text" name="social_media" value="{{ old('social_media', $org->social_media) }}" class="w-full px-4 py-3 border border-slate-200 rounded-xl text-slate-800 focus:ring-2 focus:ring-indigo-500 focus:outline-none text-sm">
                        </div>
                    </div>

                    <div>
                        <label class="block text-xs font-bold text-slate-500 uppercase tracking-wider mb-2">Deskripsi Organisasi</label>
                        <textarea name="description" rows="3" class="w-full px-4 py-3 border border-slate-200 rounded-xl text-slate-800 focus:ring-2 focus:ring-indigo-500 focus:outline-none text-sm">{{ old('description', $org->description) }}</textarea>
                    </div>

                    <div>
                        <label class="block text-xs font-bold text-slate-500 uppercase tracking-wider mb-2">Logo Organisasi (Opsional)</label>
                        <input type="file" name="logo" accept="image/*" class="w-full text-sm text-slate-500 file:mr-4 file:py-2 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-semibold file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100">
                    </div>

                    <div class="pt-4 flex gap-3">
                        <a href="{{ route('home') }}" class="w-1/2 py-3 border border-slate-200 text-slate-600 rounded-xl font-bold flex items-center justify-center text-sm hover:bg-slate-50 active:scale-95 transition-all">
                            Kembali
                        </a>
                        <button type="submit" class="w-1/2 py-3 bg-indigo-600 hover:bg-indigo-700 text-white font-bold rounded-xl text-sm shadow-lg shadow-indigo-600/30 active:scale-95 transition-all">
                            Kirim Ulang
                        </button>
                    </div>
                </form>

            </div>
        @else
            <!-- Header status color accent -->
            <div class="h-4 bg-amber-500 animate-pulse"></div>

            <div class="p-8 md:p-10 flex flex-col items-center">
                
                <!-- Status Icon -->
                <div class="w-20 h-20 bg-amber-50 rounded-full flex items-center justify-center text-amber-500 mb-6 ring-8 ring-amber-50/50">
                    <svg class="w-10 h-10 animate-spin" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>

                <h1 class="text-2xl font-black text-slate-800 text-center">Menunggu Verifikasi Organisasi</h1>
                <p class="text-slate-500 text-sm text-center mt-2">Pendaftaran Anda telah diterima dan sedang dalam tahap peninjauan oleh Superadmin.</p>

                <!-- Divider -->
                <div class="w-full border-b my-8 border-slate-100"></div>

                <!-- Detail Grid -->
                <div class="w-full space-y-4">
                    <div class="flex justify-between items-center text-sm border-b border-slate-50 pb-2">
                        <span class="text-slate-400 font-medium">Nama Organisasi</span>
                        <span class="font-bold text-slate-800">{{ $org->name ?? '-' }}</span>
                    </div>
                    <div class="flex justify-between items-center text-sm border-b border-slate-50 pb-2">
                        <span class="text-slate-400 font-medium">Tipe Organisasi</span>
                        <span class="font-bold text-indigo-600">{{ ($org->organization_type ?? 'internal') === 'internal' ? 'Internal Kampus (HIMA/UKM)' : 'Eksternal / Komunitas' }}</span>
                    </div>
                    <div class="flex justify-between items-center text-sm border-b border-slate-50 pb-2">
                        <span class="text-slate-400 font-medium">No. WA Penanggung Jawab</span>
                        <span class="font-bold text-slate-800">{{ $org->phone_number ?? '-' }}</span>
                    </div>
                    @if($org->social_media)
                    <div class="flex justify-between items-center text-sm border-b border-slate-50 pb-2">
                        <span class="text-slate-400 font-medium">Medsos / Website</span>
                        <span class="font-medium text-indigo-600">{{ $org->social_media }}</span>
                    </div>
                    @endif
                    <div class="flex justify-between items-center text-sm border-b border-slate-50 pb-2">
                        <span class="text-slate-400 font-medium">Pemilik Akun</span>
                        <span class="font-bold text-slate-800">{{ Auth::user()->name }}</span>
                    </div>
                    <div class="flex justify-between items-center text-sm border-b border-slate-50 pb-2">
                        <span class="text-slate-400 font-medium">Tanggal Pendaftaran</span>
                        <span class="font-medium text-slate-800">{{ $org ? $org->created_at->format('d M Y, H:i') : '-' }}</span>
                    </div>
                    <div class="flex justify-between items-center text-sm border-b border-slate-50 pb-2">
                        <span class="text-slate-400 font-medium">Status</span>
                        <span class="px-3 py-1 bg-amber-100 text-amber-700 rounded-lg text-xs font-bold uppercase tracking-wider">Menunggu Approval</span>
                    </div>
                </div>

                <!-- Action Buttons -->
                <div class="w-full mt-10">
                    <a href="{{ route('home') }}" class="w-full py-4 border border-slate-200 text-slate-600 rounded-2xl font-bold flex items-center justify-center hover:bg-slate-50 active:scale-95 transition-all">
                        Kembali ke Beranda
                    </a>
                </div>

            </div>
        @endif
    </div>
</main>
@endsection
