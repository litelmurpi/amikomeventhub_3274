@extends('errors.layout')

@section('title', 'Autentikasi Diperlukan')
@section('code', '401')
@section('message', 'Autentikasi Diperlukan')

@section('icon')
    <!-- User/Key Icon -->
    <svg class="w-8 h-8 animate-bounce-slow" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
            d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
    </svg>
@endsection

@section('description')
    {{ isset($exception) && $exception->getMessage() ? $exception->getMessage() : 'Maaf, Anda harus masuk (login) terlebih dahulu untuk mengakses halaman ini.' }}
@endsection

@section('actions')
    <a href="{{ route('login') }}"
        class="flex-1 px-5 py-3.5 bg-indigo-600 text-white rounded-2xl font-bold text-sm shadow-lg shadow-indigo-100 hover:bg-indigo-700 hover:shadow-xl hover:shadow-indigo-200 hover:scale-[1.02] active:scale-[0.98] transition-all text-center">
        Login
    </a>
    <a href="{{ route('home') }}"
        class="flex-1 px-5 py-3.5 border-2 border-slate-200 hover:border-indigo-600 hover:text-indigo-600 text-slate-600 rounded-2xl font-bold text-sm hover:scale-[1.02] active:scale-[0.98] transition-all text-center">
        Beranda
    </a>
@endsection
