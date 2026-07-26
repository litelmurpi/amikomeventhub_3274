@extends('layouts.admin.admin')

@section('title', 'Admin Dashboard - Amikom Event Hub')

@section('content')
<!-- Header -->
<header class="flex flex-col sm:flex-row justify-between sm:items-center gap-4 mb-6 md:mb-10">
    <div>
        <h1 class="text-2xl md:text-3xl font-black text-slate-800">Dashboard Ringkasan</h1>
        <p class="text-sm md:text-base text-slate-500 font-medium">Selamat datang kembali, Admin!</p>
    </div>
    <div class="flex items-center gap-4 self-start sm:self-auto">
        <div class="text-right hidden sm:block">
            <p class="font-bold text-slate-800 text-sm">Admin Super</p>
            <p class="text-xs text-slate-400">Penyelenggara Utama</p>
        </div>
        <div class="w-10 h-10 md:w-12 md:h-12 bg-white rounded-2xl shadow-sm border flex items-center justify-center p-1">
            <img src="https://ui-avatars.com/api/?name=Admin+Super&background=6366f1&color=fff"
                class="rounded-xl">
        </div>
    </div>
</header>

<!-- Stats Grid -->
<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 md:gap-6 mb-8 md:mb-10">
    <div class="bg-white p-5 md:p-6 rounded-2xl md:rounded-3xl border border-slate-100 shadow-sm">
        <div class="w-10 h-10 md:w-12 md:h-12 bg-indigo-50 text-indigo-600 rounded-2xl flex items-center justify-center mb-4">
            <svg class="w-5 h-5 md:w-6 md:h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z">
                </path>
            </svg>
        </div>
        <p class="text-slate-400 text-xs md:text-sm font-bold uppercase mb-1">Total Pendapatan</p>
        <h3 class="text-xl md:text-2xl font-black">Rp {{ $stats['total_revenue'] }}</h3>
        <p class="text-xs text-slate-400 mt-2 font-medium">Dari {{ $stats['tickets_sold'] }} tiket terjual</p>
    </div>
    <div class="bg-white p-5 md:p-6 rounded-2xl md:rounded-3xl border border-slate-100 shadow-sm">
        <div class="w-10 h-10 md:w-12 md:h-12 bg-green-50 text-green-600 rounded-2xl flex items-center justify-center mb-4">
            <svg class="w-5 h-5 md:w-6 md:h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M15 5v2m0 4v2m0 4v2M5 5a2 2 0 00-2 2v3a2 2 0 110 4v3a2 2 0 002 2h14a2 2 0 002-2v-3a2 2 0 110-4V7a2 2 0 00-2-2H5z">
                </path>
            </svg>
        </div>
        <p class="text-slate-400 text-xs md:text-sm font-bold uppercase mb-1">Tiket Terjual</p>
        <h3 class="text-xl md:text-2xl font-black">{{ $stats['tickets_sold'] }}</h3>
        <p class="text-xs text-slate-400 mt-2 font-medium">Transaksi sukses</p>
    </div>
    <div class="bg-white p-5 md:p-6 rounded-2xl md:rounded-3xl border border-slate-100 shadow-sm">
        <div class="w-10 h-10 md:w-12 md:h-12 bg-orange-50 text-orange-600 rounded-2xl flex items-center justify-center mb-4">
            <svg class="w-5 h-5 md:w-6 md:h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
            </svg>
        </div>
        <p class="text-slate-400 text-xs md:text-sm font-bold uppercase mb-1">Event Aktif Publik</p>
        <h3 class="text-xl md:text-2xl font-black text-slate-800">{{ $stats['active_events'] }} Event</h3>
        <p class="text-xs text-slate-400 mt-2 font-medium">Dari total {{ $stats['total_events'] }} event terdaftar</p>
    </div>
    <div class="bg-white p-5 md:p-6 rounded-2xl md:rounded-3xl border border-slate-100 shadow-sm">
        <div class="w-10 h-10 md:w-12 md:h-12 bg-purple-50 text-purple-600 rounded-2xl flex items-center justify-center mb-4">
            <svg class="w-5 h-5 md:w-6 md:h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5m0 0h4m-4 0V11m0 0h4m-4 0H9m4 0V5 font-bold"></path>
            </svg>
        </div>
        <p class="text-slate-400 text-xs md:text-sm font-bold uppercase mb-1">Penyelenggara</p>
        <h3 class="text-xl md:text-2xl font-black text-slate-800">{{ $stats['verified_orgs'] }} Aktif</h3>
        <p class="text-xs text-slate-400 mt-2 font-medium">
            @if(($stats['pending_orgs'] ?? 0) > 0)
                <span class="text-amber-600 font-bold">{{ $stats['pending_orgs'] }} Menunggu Verifikasi</span>
            @else
                Semua terverifikasi
            @endif
        </p>
    </div>
</div>

<!-- Charts Section -->
<div class="grid grid-cols-1 lg:grid-cols-2 gap-4 md:gap-6 mb-8 md:mb-10">
    <!-- Line Chart: Tren Pendapatan -->
    <div class="bg-white p-5 md:p-6 rounded-2xl md:rounded-3xl border border-slate-100 shadow-sm">
        <h3 class="font-black text-lg md:text-xl text-slate-800 mb-6">Tren Pendapatan Bulanan</h3>
        <div class="relative h-64 w-full">
            <canvas id="revenueChart"></canvas>
        </div>
    </div>

    <!-- Bar Chart: Pertumbuhan User & Event -->
    <div class="bg-white p-5 md:p-6 rounded-2xl md:rounded-3xl border border-slate-100 shadow-sm">
        <h3 class="font-black text-lg md:text-xl text-slate-800 mb-6">Pertumbuhan User & Event</h3>
        <div class="relative h-64 w-full">
            <canvas id="growthChart"></canvas>
        </div>
    </div>
</div>

<!-- Latest Sales Table -->
<div class="bg-white rounded-2xl md:rounded-3xl border border-slate-100 shadow-sm overflow-hidden">
    <div class="p-4 md:p-6 border-b flex justify-between items-center">
        <h3 class="font-black text-lg md:text-xl text-slate-800">Transaksi Terakhir</h3>
        <a href="{{ route('admin.transactions') }}" class="text-indigo-600 font-bold text-sm hover:underline">Lihat Semua &rarr;</a>
    </div>
    <div class="overflow-x-auto">
        <table class="w-full text-left border-collapse min-w-[600px]">
            <thead class="bg-slate-50 text-slate-400 uppercase text-[10px] font-black tracking-widest">
                <tr>
                    <th class="px-6 py-4">Pembeli</th>
                    <th class="px-6 py-4">Event</th>
                    <th class="px-6 py-4">Status</th>
                    <th class="px-6 py-4">Total</th>
                </tr>
            </thead>
            <tbody class="divide-y border-t">
                @foreach($transactions as $trx)
                <tr class="hover:bg-slate-50 transition">
                    <td class="px-6 py-4">
                        <p class="font-bold uppercase tracking-wide text-sm">{{ $trx->customer_name }}</p>
                        <p class="text-xs text-slate-400">{{ $trx->customer_email }}</p>
                    </td>
                    <td class="px-6 py-4 font-medium text-slate-600 text-sm">{{ $trx->event->title ?? '-' }}</td>
                    <td class="px-6 py-4">
                        <span
                            class="px-3 py-1 bg-{{ $trx->status == 'Success' ? 'green' : ($trx->status == 'Pending' ? 'orange' : 'slate') }}-100 text-{{ $trx->status == 'Success' ? 'green' : ($trx->status == 'Pending' ? 'orange' : 'slate') }}-700 rounded-lg text-xs font-bold uppercase">{{ $trx->status }}</span>
                    </td>
                    <td class="px-6 py-4 font-black text-indigo-600 text-sm">Rp {{ number_format($trx->total_price, 0, ',', '.') }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<!-- Chart.js CDN -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const chartData = @json($chartData);

        // 1. Line Chart untuk Tren Pendapatan
        const revenueCtx = document.getElementById('revenueChart').getContext('2d');
        new Chart(revenueCtx, {
            type: 'line',
            data: {
                labels: chartData.labels,
                datasets: [{
                    label: 'Total Pendapatan (Rp)',
                    data: chartData.revenues,
                    borderColor: '#4f46e5', // warna indigo-600 Tailwind
                    backgroundColor: 'rgba(79, 70, 229, 0.1)',
                    borderWidth: 2,
                    pointBackgroundColor: '#4f46e5',
                    pointBorderColor: '#fff',
                    pointHoverBackgroundColor: '#fff',
                    pointHoverBorderColor: '#4f46e5',
                    fill: true,
                    tension: 0.4
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false
                    },
                    tooltip: {
                        callbacks: {
                            label: function(context) {
                                let label = context.dataset.label || '';
                                if (label) {
                                    label += ': ';
                                }
                                if (context.parsed.y !== null) {
                                    label += new Intl.NumberFormat('id-ID', { style: 'currency', currency: 'IDR' }).format(context.parsed.y);
                                }
                                return label;
                            }
                        }
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            callback: function(value, index, values) {
                                if (value >= 1000000) {
                                    return 'Rp ' + (value / 1000000) + ' Jt';
                                }
                                return 'Rp ' + value;
                            }
                        }
                    }
                }
            }
        });

        // 2. Bar Chart untuk Pertumbuhan User dan Event
        const growthCtx = document.getElementById('growthChart').getContext('2d');
        new Chart(growthCtx, {
            type: 'bar',
            data: {
                labels: chartData.labels,
                datasets: [
                    {
                        label: 'Registrasi User Baru',
                        data: chartData.users,
                        backgroundColor: '#0ea5e9', // warna sky-500 Tailwind
                        borderRadius: 4
                    },
                    {
                        label: 'Event Baru',
                        data: chartData.events,
                        backgroundColor: '#f59e0b', // warna amber-500 Tailwind
                        borderRadius: 4
                    }
                ]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        position: 'top',
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            stepSize: 1
                        }
                    }
                }
            }
        });
    });
</script>
@endsection