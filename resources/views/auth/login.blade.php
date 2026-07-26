<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - AmikomEventHub</title>
    
    <!-- PWA Meta Tags & Manifest -->
    <link rel="manifest" href="{{ asset('manifest.json') }}">
    <meta name="theme-color" content="#4f46e5">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-title" content="EventHub">
    <link rel="apple-touch-icon" href="{{ asset('icons/icon-192x192.png') }}">

    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
    </style>
</head>

<body class="min-h-screen bg-slate-50 text-slate-900 flex items-center justify-center p-4">

    <div class="w-full max-w-md my-auto py-6">
        <!-- Logo & Header -->
        <div class="text-center mb-6">
            <a href="{{ route('home') }}" class="inline-flex items-center gap-2.5 mb-4 group">
                <div class="w-10 h-10 bg-indigo-600 rounded-xl flex items-center justify-center text-white font-bold text-lg shadow-sm">
                    AH
                </div>
                <span class="text-xl font-extrabold tracking-tight text-slate-900">AmikomEventHub</span>
            </a>
            <h1 class="text-2xl font-black text-slate-900 mb-1">Selamat Datang Kembali</h1>
            <p class="text-xs text-slate-500 font-medium">Masuk ke akun Anda untuk melanjutkan</p>
        </div>

        <!-- Form Card -->
        <div class="bg-white rounded-2xl border border-slate-200/80 shadow-sm p-6 sm:p-8">
            @if(request('info') === 'organizer')
                <div class="mb-5 p-3.5 bg-indigo-50 border border-indigo-200 rounded-xl text-indigo-800 text-xs font-semibold leading-relaxed">
                    Silakan login terlebih dahulu untuk mendaftarkan organisasi Anda.
                </div>
            @endif

            <!-- Error Messages -->
            @if($errors->any())
                <div class="mb-5 p-3.5 bg-rose-50 border border-rose-200 rounded-xl text-rose-700 text-xs font-bold">
                    {{ $errors->first() }}
                </div>
            @endif

            @if(session('success'))
                <div class="mb-5 p-3.5 bg-emerald-50 border border-emerald-200 rounded-xl text-emerald-700 text-xs font-bold">
                    {{ session('success') }}
                </div>
            @endif

            <form method="POST" action="{{ route('login') }}" class="space-y-4">
                @csrf
                @if(request('info'))
                    <input type="hidden" name="info" value="{{ request('info') }}">
                @endif

                <!-- Email -->
                <div>
                    <label for="email" class="block text-xs font-bold text-slate-700 mb-1.5 uppercase tracking-wider">Email</label>
                    <input type="email" id="email" name="email" value="{{ old('email') }}" placeholder="nama@email.com"
                        class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl focus:border-indigo-600 focus:ring-1 focus:ring-indigo-600 outline-none font-medium text-sm text-slate-900 transition"
                        required autofocus>
                </div>

                <!-- Password -->
                <div>
                    <label for="password" class="block text-xs font-bold text-slate-700 mb-1.5 uppercase tracking-wider">Password</label>
                    <input type="password" id="password" name="password" placeholder="••••••••"
                        class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl focus:border-indigo-600 focus:ring-1 focus:ring-indigo-600 outline-none font-medium text-sm text-slate-900 transition"
                        required>
                </div>

                <!-- Remember Me -->
                <div class="flex items-center justify-between pt-1">
                    <label class="flex items-center gap-2 cursor-pointer select-none">
                        <input type="checkbox" name="remember" class="w-4 h-4 rounded border-slate-300 text-indigo-600 focus:ring-indigo-500">
                        <span class="text-xs font-medium text-slate-600">Ingat saya</span>
                    </label>
                </div>

                <!-- Submit Button -->
                <button type="submit"
                    class="w-full py-3 bg-indigo-600 hover:bg-indigo-700 text-white rounded-xl font-bold text-sm shadow-sm transition active:scale-[0.98]">
                    Masuk
                </button>
            </form>

            <!-- Divider -->
            <div class="flex items-center gap-3 my-5">
                <div class="flex-1 h-px bg-slate-200"></div>
                <span class="text-[10px] font-bold text-slate-400 uppercase tracking-widest">atau</span>
                <div class="flex-1 h-px bg-slate-200"></div>
            </div>

            <!-- Register Link -->
            <div class="text-center text-xs">
                <span class="text-slate-500">Belum punya akun?</span>
                <a href="{{ route('register') }}" class="text-indigo-600 font-bold hover:underline ml-1">
                    Daftar Sekarang
                </a>
            </div>
        </div>

        <p class="text-center text-xs text-slate-400 mt-6">
            &copy; {{ date('Y') }} AmikomEventHub
        </p>
    </div>

</body>
</html>
