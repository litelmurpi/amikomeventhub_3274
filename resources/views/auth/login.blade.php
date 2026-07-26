<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - AmikomEventHub</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet">
    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
        }

        .glass {
            background: rgba(255, 255, 255, 0.85);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
        }

        @keyframes float {
            0%, 100% { transform: translateY(0px) rotate(0deg); }
            50% { transform: translateY(-20px) rotate(3deg); }
        }

        @keyframes float-reverse {
            0%, 100% { transform: translateY(0px) rotate(0deg); }
            50% { transform: translateY(20px) rotate(-3deg); }
        }

        @keyframes fade-in-up {
            from { opacity: 0; transform: translateY(30px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .animate-float { animation: float 6s ease-in-out infinite; }
        .animate-float-reverse { animation: float-reverse 7s ease-in-out infinite; }
        .animate-fade-in-up { animation: fade-in-up 0.6s ease-out forwards; }

        .input-focus:focus {
            box-shadow: 0 0 0 4px rgba(99, 102, 241, 0.1);
        }
    </style>
</head>

<body class="min-h-screen bg-gradient-to-br from-slate-50 via-indigo-50/30 to-purple-50/20 flex items-center justify-center p-4 relative overflow-hidden">

    <!-- Background Decorations -->
    <div class="absolute -top-32 -left-32 w-96 h-96 bg-indigo-400/10 rounded-full blur-3xl animate-float"></div>
    <div class="absolute -bottom-32 -right-32 w-96 h-96 bg-purple-400/10 rounded-full blur-3xl animate-float-reverse"></div>
    <div class="absolute top-1/2 left-1/4 w-64 h-64 bg-amber-300/5 rounded-full blur-3xl animate-float-reverse"></div>

    <!-- Main Card -->
    <div class="w-full max-w-md animate-fade-in-up" style="animation-delay: 0.1s;">
        <!-- Logo & Header -->
        <div class="text-center mb-8">
            <a href="{{ route('home') }}" class="inline-flex items-center gap-3 mb-6 group">
                <div class="w-12 h-12 bg-indigo-600 rounded-2xl flex items-center justify-center text-white font-bold text-xl shadow-lg shadow-indigo-200 group-hover:scale-110 transition-transform">
                    AH</div>
                <span class="text-2xl font-bold tracking-tight text-slate-800">AmikomEventHub</span>
            </a>
            <h1 class="text-3xl font-extrabold text-slate-900 mb-2">Selamat Datang Kembali</h1>
            <p class="text-slate-500 font-medium">Masuk ke akun Anda untuk melanjutkan</p>
        </div>

        <!-- Form Card -->
        <div class="glass rounded-3xl border border-white/60 shadow-xl shadow-slate-200/50 p-8">
            <!-- Error Messages -->
            @if($errors->any())
                <div class="mb-6 p-4 bg-rose-50 border border-rose-200 rounded-2xl">
                    <div class="flex items-center gap-2 text-rose-700">
                        <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        <span class="text-sm font-bold">{{ $errors->first() }}</span>
                    </div>
                </div>
            @endif

            @if(session('success'))
                <div class="mb-6 p-4 bg-green-50 border border-green-200 rounded-2xl">
                    <div class="flex items-center gap-2 text-green-700">
                        <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                        <span class="text-sm font-bold">{{ session('success') }}</span>
                    </div>
                </div>
            @endif

            <form method="POST" action="{{ route('login') }}" class="space-y-5">
                @csrf

                <!-- Email -->
                <div>
                    <label for="email" class="block text-sm font-bold text-slate-700 mb-2 uppercase tracking-wide">Email</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                            <svg class="w-5 h-5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207"></path>
                            </svg>
                        </div>
                        <input type="email" id="email" name="email" value="{{ old('email') }}" placeholder="nama@email.com"
                            class="input-focus w-full pl-12 pr-5 py-4 bg-white/80 border-2 border-slate-100 rounded-2xl focus:border-indigo-500 outline-none transition font-medium text-slate-800 placeholder:text-slate-400"
                            required autofocus>
                    </div>
                </div>

                <!-- Password -->
                <div>
                    <label for="password" class="block text-sm font-bold text-slate-700 mb-2 uppercase tracking-wide">Password</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                            <svg class="w-5 h-5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                            </svg>
                        </div>
                        <input type="password" id="password" name="password" placeholder="••••••••"
                            class="input-focus w-full pl-12 pr-5 py-4 bg-white/80 border-2 border-slate-100 rounded-2xl focus:border-indigo-500 outline-none transition font-medium text-slate-800 placeholder:text-slate-400"
                            required>
                    </div>
                </div>

                <!-- Remember Me -->
                <div class="flex items-center justify-between">
                    <label class="flex items-center gap-3 cursor-pointer group">
                        <input type="checkbox" name="remember"
                            class="w-5 h-5 rounded-lg border-2 border-slate-200 text-indigo-600 focus:ring-indigo-500 focus:ring-offset-0 cursor-pointer">
                        <span class="text-sm font-medium text-slate-600 group-hover:text-slate-800 transition">Ingat saya</span>
                    </label>
                </div>

                <!-- Submit Button -->
                <button type="submit"
                    class="w-full py-4 bg-indigo-600 text-white rounded-2xl font-bold text-lg shadow-lg shadow-indigo-200 hover:bg-indigo-700 hover:shadow-xl hover:shadow-indigo-200 active:scale-[0.98] transition-all">
                    Masuk
                </button>
            </form>

            <!-- Divider -->
            <div class="flex items-center gap-4 my-6">
                <div class="flex-1 h-px bg-slate-200"></div>
                <span class="text-xs font-bold text-slate-400 uppercase tracking-wider">atau</span>
                <div class="flex-1 h-px bg-slate-200"></div>
            </div>

            <!-- Google Login Button -->
            <a href="{{ route('google.login') }}" class="w-full flex items-center justify-center gap-3 py-3.5 bg-white border-2 border-slate-200 rounded-2xl text-slate-700 font-bold hover:bg-slate-50 hover:border-slate-300 transition-all active:scale-[0.98] mb-6 shadow-sm">
                <svg class="w-5 h-5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z" fill="#4285F4"/>
                    <path d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z" fill="#34A853"/>
                    <path d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l2.85-2.22.81-.62z" fill="#FBBC05"/>
                    <path d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z" fill="#EA4335"/>
                </svg>
                Lanjutkan dengan Google
            </a>

            <!-- Register Link -->
            <div class="text-center">
                <p class="text-slate-500 font-medium">
                    Belum punya akun?
                    <a href="{{ route('register') }}" class="text-indigo-600 font-bold hover:text-indigo-700 hover:underline underline-offset-4 transition">
                        Daftar Sekarang
                    </a>
                </p>
            </div>
        </div>

        <!-- Footer -->
        <p class="text-center text-sm text-slate-400 mt-8 font-medium">
            &copy; {{ date('Y') }} AmikomEventHub. Built with Laravel & Tailwind CSS.
        </p>
    </div>

</body>

</html>