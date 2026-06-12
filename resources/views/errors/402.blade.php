@extends('errors.layout')

@section('title', 'Pembayaran Diperlukan')
@section('code', '402')
@section('message', 'Pembayaran Diperlukan')

@section('icon')
    <!-- Credit Card Icon -->
    <svg class="w-8 h-8 animate-bounce-slow" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
            d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z" />
    </svg>
@endsection

@section('description')
    {{ isset($exception) && $exception->getMessage() ? $exception->getMessage() : 'Maaf, akses ke halaman atau transaksi ini memerlukan pembayaran yang valid.' }}
@endsection

@section('actions')
    <a href="{{ route('home') }}"
        class="flex-1 px-5 py-3.5 bg-indigo-600 text-white rounded-2xl font-bold text-sm shadow-lg shadow-indigo-100 hover:bg-indigo-700 hover:shadow-xl hover:shadow-indigo-200 hover:scale-[1.02] active:scale-[0.98] transition-all text-center">
        Beranda
    </a>
    <a href="{{ url('/katalog') }}"
        class="flex-1 px-5 py-3.5 border-2 border-slate-200 hover:border-indigo-600 hover:text-indigo-600 text-slate-600 rounded-2xl font-bold text-sm hover:scale-[1.02] active:scale-[0.98] transition-all text-center">
        Katalog Event
    </a>
@endsection
