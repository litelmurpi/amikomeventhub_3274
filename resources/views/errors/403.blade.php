@extends('errors.layout')

@section('title', 'Akses Ditolak')
@section('code', '403')
@section('message', 'Akses Tidak Diizinkan')

@section('icon')
    <!-- Lock Icon -->
    <svg class="w-8 h-8 animate-bounce-slow" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
            d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
    </svg>
@endsection

@section('description')
    {{ isset($exception) && $exception->getMessage() ? $exception->getMessage() : 'Maaf, Anda tidak memiliki izin untuk mengakses halaman ini.' }}
@endsection

@section('extra-content')
    @auth
        <div class="bg-slate-50/80 border border-slate-100 rounded-2xl p-4 mb-8 text-left max-w-sm mx-auto flex items-center gap-4">
            <div class="w-12 h-12 rounded-xl bg-indigo-100 flex items-center justify-center text-indigo-600 font-bold shadow-sm">
                {{ strtoupper(substr(Auth::user()->name, 0, 2)) }}
            </div>
            <div>
                <p class="text-xs font-bold text-slate-400 uppercase tracking-wide">Pengguna Terhubung</p>
                <p class="text-sm font-bold text-slate-800 leading-tight mb-1">{{ Auth::user()->name }}</p>
                <div class="flex items-center gap-1.5">
                    <span class="w-1.5 h-1.5 rounded-full bg-rose-500"></span>
                    <span class="text-xs font-semibold text-slate-500">Role: <span class="px-2 py-0.5 bg-rose-50 text-rose-600 rounded-full font-bold text-[10px] uppercase">{{ Auth::user()->role }}</span></span>
                </div>
            </div>
        </div>
    @endauth
@endsection

@section('actions')
    <a href="{{ route('home') }}"
        class="flex-1 px-5 py-3.5 bg-indigo-600 text-white rounded-2xl font-bold text-sm shadow-lg shadow-indigo-100 hover:bg-indigo-700 hover:shadow-xl hover:shadow-indigo-200 hover:scale-[1.02] active:scale-[0.98] transition-all text-center">
        Beranda
    </a>
    @auth
        <form action="{{ route('logout') }}" method="POST" class="flex-1">
            @csrf
            <input type="hidden" name="redirect_to" value="{{ route('login') }}">
            <button type="submit"
                class="w-full px-5 py-3.5 border-2 border-slate-200 hover:border-indigo-600 hover:text-indigo-600 text-slate-600 rounded-2xl font-bold text-sm hover:scale-[1.02] active:scale-[0.98] transition-all">
                Ganti Akun
            </button>
        </form>
    @else
        <a href="{{ route('login') }}"
            class="flex-1 px-5 py-3.5 border-2 border-indigo-600 text-indigo-600 hover:bg-indigo-50 rounded-2xl font-bold text-sm hover:scale-[1.02] active:scale-[0.98] transition-all text-center">
            Login
        </a>
    @endauth
@endsection
