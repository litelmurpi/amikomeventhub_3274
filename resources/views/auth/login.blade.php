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
