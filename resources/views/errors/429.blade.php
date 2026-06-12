@extends('errors.layout')

@section('title', 'Terlalu Banyak Permintaan')
@section('code', '429')
@section('message', 'Terlalu Banyak Permintaan')

@section('icon')
    <!-- Speedometer/Limit Icon -->
    <svg class="w-8 h-8 animate-bounce-slow" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
            d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
    </svg>
@endsection

@section('description')
    {{ isset($exception) && $exception->getMessage() ? $exception->getMessage() : 'Anda mengirim terlalu banyak permintaan dalam waktu singkat. Mohon tunggu beberapa saat sebelum mencoba kembali.' }}
@endsection

@section('actions')
    <a href="{{ route('home') }}"
        class="flex-1 px-5 py-3.5 bg-indigo-600 text-white rounded-2xl font-bold text-sm shadow-lg shadow-indigo-100 hover:bg-indigo-700 hover:shadow-xl hover:shadow-indigo-200 hover:scale-[1.02] active:scale-[0.98] transition-all text-center">
        Beranda
    </a>
    <a href="javascript:window.location.reload()"
        class="flex-1 px-5 py-3.5 border-2 border-slate-200 hover:border-indigo-600 hover:text-indigo-600 text-slate-600 rounded-2xl font-bold text-sm hover:scale-[1.02] active:scale-[0.98] transition-all text-center">
        Coba Lagi
    </a>
@endsection
