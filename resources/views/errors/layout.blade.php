<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('code') - @yield('title') | AmikomEventHub</title>
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

        @keyframes pulse-glow {
            0%, 100% { box-shadow: 0 0 0 0px rgba(99, 102, 241, 0.4); }
            50% { box-shadow: 0 0 0 20px rgba(99, 102, 241, 0); }
        }

        @keyframes bounce-slow {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-8px); }
        }

        .animate-float { animation: float 6s ease-in-out infinite; }
        .animate-float-reverse { animation: float-reverse 7s ease-in-out infinite; }
        .animate-fade-in-up { animation: fade-in-up 0.6s ease-out forwards; }
        .animate-pulse-glow { animation: pulse-glow 2s infinite; }
        .animate-bounce-slow { animation: bounce-slow 3s ease-in-out infinite; }
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
        </div>

        <!-- Glassmorphism Card -->
        <div class="glass rounded-3xl border border-white/60 shadow-xl shadow-slate-200/50 p-8 md:p-10 text-center relative overflow-hidden">
            <!-- Pulsing lock/status illustration -->
            <div class="relative w-24 h-24 mx-auto mb-6 flex items-center justify-center bg-indigo-50 rounded-full animate-pulse-glow">
                <div class="w-16 h-16 bg-gradient-to-tr from-indigo-500 to-purple-600 rounded-full flex items-center justify-center text-white shadow-lg shadow-indigo-200">
                    @yield('icon')
                </div>
            </div>

            <!-- Error Code & Description -->
            <h1 class="text-6xl font-extrabold text-transparent bg-clip-text bg-gradient-to-r from-indigo-600 to-purple-600 tracking-wider mb-2">@yield('code')</h1>
            <h2 class="text-2xl font-bold text-slate-800 mb-3">@yield('message')</h2>
            <p class="text-slate-500 font-medium text-sm max-w-sm mx-auto mb-8 leading-relaxed">
                @yield('description')
            </p>

            @yield('extra-content')

            <!-- Actions -->
            <div class="flex flex-col sm:flex-row gap-3 justify-center max-w-sm mx-auto">
                @yield('actions')
            </div>
        </div>

        <!-- Footer -->
        <p class="text-center text-sm text-slate-400 mt-8 font-medium">
            &copy; {{ date('Y') }} AmikomEventHub. Built with Laravel & Tailwind CSS.
        </p>
    </div>

</body>

</html>
