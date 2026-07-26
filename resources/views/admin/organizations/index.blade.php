@extends('layouts.admin.admin')

@section('title', 'Kelola Penyelenggara - Admin Amikom Event Hub')

@section('content')
<main class="flex-1 p-10 overflow-y-auto">
    <header class="flex justify-between items-center mb-10">
        <div>
            <h1 class="text-3xl font-black">Manajemen Penyelenggara</h1>
            <p class="text-slate-500 font-medium">Verifikasi dan kelola kepanitiaan / HIMA terdaftar (Multi-Tenant).</p>
        </div>
    </header>

    @if(session('success'))
        <div class="mb-8 p-4 bg-emerald-50 border border-emerald-100 text-emerald-700 rounded-2xl font-bold flex items-center gap-2">
            <span>✓</span> {{ session('success') }}
        </div>
    @endif

    <div class="bg-white rounded-[2.5rem] border border-slate-100 shadow-sm overflow-hidden">
        <!-- Status Filter Tabs & Search -->
        <div class="px-8 pt-6 pb-4 bg-slate-50/50 border-b space-y-4">
            <div class="flex flex-wrap gap-2">
                <a href="{{ route('admin.organizations', array_merge(request()->except('status'), ['status' => ''])) }}"
                    class="px-4 py-2 rounded-xl text-xs font-bold transition flex items-center gap-2 {{ request('status') == '' ? 'bg-indigo-600 text-white shadow-md shadow-indigo-100' : 'bg-white text-slate-600 hover:bg-slate-100 border border-slate-200' }}">
                    Semua <span class="{{ request('status') == '' ? 'bg-indigo-500 text-white' : 'bg-slate-100 text-slate-600' }} px-2 py-0.5 rounded-lg text-[10px]">{{ $counts['all'] ?? 0 }}</span>
                </a>
                <a href="{{ route('admin.organizations', array_merge(request()->except('status'), ['status' => 'approved'])) }}"
                    class="px-4 py-2 rounded-xl text-xs font-bold transition flex items-center gap-2 {{ request('status') == 'approved' ? 'bg-emerald-600 text-white shadow-md shadow-emerald-100' : 'bg-white text-slate-600 hover:bg-slate-100 border border-slate-200' }}">
                    Terverifikasi <span class="{{ request('status') == 'approved' ? 'bg-emerald-500 text-white' : 'bg-emerald-50 text-emerald-700' }} px-2 py-0.5 rounded-lg text-[10px]">{{ $counts['approved'] ?? 0 }}</span>
                </a>
                <a href="{{ route('admin.organizations', array_merge(request()->except('status'), ['status' => 'pending'])) }}"
                    class="px-4 py-2 rounded-xl text-xs font-bold transition flex items-center gap-2 {{ request('status') == 'pending' ? 'bg-amber-600 text-white shadow-md shadow-amber-100' : 'bg-white text-slate-600 hover:bg-slate-100 border border-slate-200' }}">
                    Menunggu Approval <span class="{{ request('status') == 'pending' ? 'bg-amber-500 text-white' : 'bg-amber-50 text-amber-700' }} px-2 py-0.5 rounded-lg text-[10px]">{{ $counts['pending'] ?? 0 }}</span>
                </a>
                <a href="{{ route('admin.organizations', array_merge(request()->except('status'), ['status' => 'rejected'])) }}"
                    class="px-4 py-2 rounded-xl text-xs font-bold transition flex items-center gap-2 {{ request('status') == 'rejected' ? 'bg-rose-600 text-white shadow-md shadow-rose-100' : 'bg-white text-slate-600 hover:bg-slate-100 border border-slate-200' }}">
                    Nonaktif / Ditolak <span class="{{ request('status') == 'rejected' ? 'bg-rose-500 text-white' : 'bg-rose-50 text-rose-700' }} px-2 py-0.5 rounded-lg text-[10px]">{{ $counts['rejected'] ?? 0 }}</span>
                </a>
            </div>

            <form method="GET" action="{{ route('admin.organizations') }}" id="search-form" class="flex gap-2">
                @if(request('status'))
                    <input type="hidden" name="status" value="{{ request('status') }}">
                @endif
                <input type="text" name="search" id="search-input" value="{{ request('search') }}" placeholder="Cari nama organisasi..."
                    class="flex-1 px-5 py-3 rounded-xl border-slate-200 border bg-white focus:ring-2 focus:ring-indigo-500 outline-none transition text-sm">
                <button type="submit" class="px-6 py-3 bg-indigo-600 text-white rounded-xl font-bold hover:bg-indigo-700 transition text-sm">Cari</button>
                @if(request('search'))
                    <a href="{{ route('admin.organizations', request()->only('status')) }}" class="px-4 py-3 bg-slate-200 text-slate-700 rounded-xl font-bold hover:bg-slate-300 transition flex items-center text-sm">Reset</a>
                @endif
            </form>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead class="bg-slate-50 text-slate-400 uppercase text-[10px] font-black tracking-widest">
                    <tr>
                        <th class="px-8 py-4 w-16">No</th>
                        <th class="px-8 py-4">Organisasi</th>
                        <th class="px-8 py-4">Tipe & Kontak Verification</th>
                        <th class="px-8 py-4">Pemilik (User)</th>
                        <th class="px-8 py-4">Jumlah Event</th>
                        <th class="px-8 py-4">Status Verifikasi</th>
                        <th class="px-8 py-4 text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y border-t">
                    @forelse($organizations as $org)
                    <tr class="hover:bg-slate-50/50 transition">
                        <td class="px-8 py-6 font-bold text-slate-400">{{ $loop->iteration }}</td>
                        <td class="px-8 py-6">
                            <div class="flex items-center gap-4">
                                @if($org->logo_path)
                                    <img src="{{ asset($org->logo_path) }}" alt="Logo" class="w-12 h-12 rounded-xl object-cover border shadow-sm">
                                @else
                                    <div class="w-12 h-12 bg-indigo-100 text-indigo-700 rounded-xl font-bold flex items-center justify-center text-sm shadow-sm">
                                        {{ strtoupper(substr($org->name, 0, 2)) }}
                                    </div>
                                @endif
                                <div>
                                    <p class="font-black text-slate-800">{{ $org->name }}</p>
                                    <p class="text-xs text-slate-400 font-mono">{{ $org->slug }}</p>
                                </div>
                            </div>
                        </td>
                        <td class="px-8 py-6">
                            @if(($org->organization_type ?? 'internal') === 'internal')
                                <span class="px-2.5 py-1 bg-indigo-50 text-indigo-700 border border-indigo-200 rounded-md text-[10px] font-black uppercase tracking-wider">Internal Kampus</span>
                            @else
                                <span class="px-2.5 py-1 bg-purple-50 text-purple-700 border border-purple-200 rounded-md text-[10px] font-black uppercase tracking-wider">Eksternal / Komunitas</span>
                            @endif

                            <div class="mt-2 text-xs space-y-0.5">
                                <p class="text-slate-700 font-bold flex items-center gap-1">
                                    <span class="text-slate-400 font-normal">WA:</span> {{ $org->phone_number ?? '-' }}
                                </p>
                                @if($org->social_media)
                                <p class="text-slate-500 truncate max-w-[180px]">
                                    <span class="text-slate-400">Web/IG:</span> {{ $org->social_media }}
                                </p>
                                @endif
                            </div>
                        </td>
                        <td class="px-8 py-6">
                            <p class="font-bold text-sm text-slate-800">{{ $org->owner->name ?? 'User Terhapus' }}</p>
                            <p class="text-xs text-slate-400">{{ $org->owner->email ?? '-' }}</p>
                        </td>
                        <td class="px-8 py-6 font-bold text-indigo-600">
                            {{ $org->events_count }} Event
                        </td>
                        <td class="px-8 py-6">
                            @if($org->isApproved())
                                <span class="px-3 py-1 bg-emerald-100 text-emerald-700 rounded-lg text-xs font-bold uppercase tracking-wider">Terverifikasi</span>
                            @elseif($org->isRejected())
                                @if($org->events_count > 0 || Str::contains(strtolower($org->rejection_reason ?? ''), ['nonaktif', 'dinonaktifkan']))
                                    <span class="px-3 py-1 bg-slate-100 text-slate-700 border border-slate-200 rounded-lg text-xs font-bold uppercase tracking-wider" title="{{ $org->rejection_reason }}">Nonaktif</span>
                                @else
                                    <span class="px-3 py-1 bg-rose-100 text-rose-700 rounded-lg text-xs font-bold uppercase tracking-wider" title="{{ $org->rejection_reason }}">Ditolak</span>
                                @endif
                            @else
                                <span class="px-3 py-1 bg-amber-100 text-amber-700 rounded-lg text-xs font-bold uppercase tracking-wider">Menunggu Approval</span>
                            @endif
                        </td>
                        <td class="px-8 py-6 text-right space-x-2">
                            @if(!$org->isApproved())
                                <form action="{{ route('admin.organizations.approve', $org->id) }}" method="POST" class="inline">
                                    @csrf
                                    <button type="submit" class="px-4 py-2 bg-emerald-600 hover:bg-emerald-700 text-white rounded-xl text-xs font-bold transition shadow-md shadow-emerald-100">
                                        ✓ {{ $org->isRejected() ? 'Aktifkan Kembali' : 'Setujui (Approve)' }}
                                    </button>
                                </form>
                            @endif

                            @if($org->isApproved())
                                <button type="button" onclick="openRejectModal({{ $org->id }}, '{{ addslashes($org->name) }}', true)" class="px-3 py-1.5 bg-rose-50 hover:bg-rose-100 text-rose-700 rounded-lg text-xs font-bold transition">
                                    Nonaktifkan
                                </button>
                            @elseif(!$org->isRejected())
                                <button type="button" onclick="openRejectModal({{ $org->id }}, '{{ addslashes($org->name) }}', false)" class="px-3 py-1.5 bg-rose-50 hover:bg-rose-100 text-rose-700 rounded-lg text-xs font-bold transition">
                                    Tolak Pendaftaran
                                </button>
                            @endif
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="px-8 py-12 text-center text-slate-400 font-medium">Belum ada organisasi yang mendaftar.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <!-- Modal Reject / Nonaktifkan -->
    <div id="rejectModal" class="fixed inset-0 bg-slate-900/50 backdrop-blur-sm hidden items-center justify-center z-50 p-4">
        <div class="bg-white rounded-3xl p-8 max-w-lg w-full shadow-2xl border border-slate-100">
            <h3 class="text-xl font-black text-slate-800 mb-2" id="rejectModalTitle">Tolak Pendaftaran Organisasi</h3>
            <p class="text-sm text-slate-500 mb-6" id="rejectModalOrgName">Berikan alasan untuk organisasi ini:</p>
            
            <form id="rejectForm" method="POST" action="">
                @csrf
                <div class="mb-6">
                    <label class="block text-xs font-bold text-slate-500 uppercase tracking-wider mb-2" id="rejectModalLabel">Alasan Penolakan</label>
                    <textarea name="rejection_reason" id="rejectModalInput" rows="4" required class="w-full px-4 py-3 border border-slate-200 rounded-xl text-slate-800 text-sm focus:ring-2 focus:ring-rose-500 focus:outline-none" placeholder="Masukkan alasan..."></textarea>
                </div>

                <div class="flex justify-end gap-3">
                    <button type="button" onclick="closeRejectModal()" class="px-5 py-2.5 bg-slate-100 hover:bg-slate-200 text-slate-700 font-bold rounded-xl text-xs transition">
                        Batal
                    </button>
                    <button type="submit" id="rejectModalSubmit" class="px-5 py-2.5 bg-rose-600 hover:bg-rose-700 text-white font-bold rounded-xl text-xs shadow-lg shadow-rose-600/30 transition">
                        Konfirmasi
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>
        function openRejectModal(orgId, orgName, isDeactivation = false) {
            const modal = document.getElementById('rejectModal');
            const form = document.getElementById('rejectForm');
            const titleEl = document.getElementById('rejectModalTitle');
            const orgNameEl = document.getElementById('rejectModalOrgName');
            const labelEl = document.getElementById('rejectModalLabel');
            const inputEl = document.getElementById('rejectModalInput');
            const submitBtn = document.getElementById('rejectModalSubmit');
            
            form.action = `/admin/organizations/${orgId}/reject`;

            if (isDeactivation) {
                titleEl.innerText = 'Nonaktifkan Organisasi';
                orgNameEl.innerText = `Berikan alasan penonaktifan untuk "${orgName}":`;
                labelEl.innerText = 'Alasan Penonaktifan';
                inputEl.placeholder = 'Contoh: Organisasi sudah tidak aktif / melanggar ketentuan.';
                submitBtn.innerText = 'Konfirmasi Penonaktifan';
            } else {
                titleEl.innerText = 'Tolak Pendaftaran Organisasi';
                orgNameEl.innerText = `Berikan alasan penolakan untuk "${orgName}":`;
                labelEl.innerText = 'Alasan Penolakan';
                inputEl.placeholder = 'Contoh: Nama/Logo organisasi tidak sesuai dengan standar Amikom.';
                submitBtn.innerText = 'Konfirmasi Penolakan';
            }

            modal.classList.remove('hidden');
            modal.classList.add('flex');
        }

        function closeRejectModal() {
            const modal = document.getElementById('rejectModal');
            modal.classList.add('hidden');
            modal.classList.remove('flex');
        }

        let searchTimeout = null;
        const searchInput = document.getElementById('search-input');
        const searchForm = document.getElementById('search-form');

        if (searchInput && searchForm) {
            searchInput.addEventListener('input', function() {
                clearTimeout(searchTimeout);
                searchTimeout = setTimeout(() => {
                    searchForm.submit();
                }, 500); // Debounce 500ms
            });

            if (searchInput.value) {
                const val = searchInput.value;
                searchInput.value = '';
                searchInput.focus();
                searchInput.value = val;
            }
        }
    </script>
</main>
@endsection
