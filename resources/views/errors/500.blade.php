@extends('errors.layout')

@section('title', 'Kesalahan Server Internal')
@section('code', '500')
@section('message', 'Terjadi Kesalahan Server')

@section('icon')
    <!-- Warning Icon -->
    <svg class="w-8 h-8 animate-bounce-slow" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
            d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
    </svg>
@endsection

@section('description')
    {{ isset($exception) && $exception->getMessage() ? $exception->getMessage() : 'Maaf, terjadi kesalahan internal di sistem kami. Tim kami sedang berusaha memperbaikinya.' }}
@endsection

@section('actions')
    <a href="{{ route('home') }}"
        class="flex-1 px-5 py-3.5 bg-indigo-600 text-white rounded-2xl font-bold text-sm shadow-lg shadow-indigo-100 hover:bg-indigo-700 hover:shadow-xl hover:shadow-indigo-200 hover:scale-[1.02] active:scale-[0.98] transition-all text-center">
        Beranda
    </a>
    <a href="javascript:window.location.reload()"
        class="flex-1 px-5 py-3.5 border-2 border-slate-200 hover:border-indigo-600 hover:text-indigo-600 text-slate-600 rounded-2xl font-bold text-sm hover:scale-[1.02] active:scale-[0.98] transition-all text-center">
        Muat Ulang
    </a>
@endsection
