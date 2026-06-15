<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $title ?? config('app.name', 'CareerHub') }}</title>

    <!-- PWA Meta Tags -->
    <meta name="theme-color" content="#2563EB">
    <link rel="manifest" href="/manifest.json">
    <link rel="apple-touch-icon" href="/icons/icon-192x192.png">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="default">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Outfit', sans-serif;
        }
        /* Glassmorphism utility */
        .glass-nav {
            background: rgba(255, 255, 255, 0.85);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
        }
        /* Hide scrollbar */
        .no-scrollbar::-webkit-scrollbar {
            display: none;
        }
        .no-scrollbar {
            -ms-overflow-style: none;
            scrollbar-width: none;
        }
    </style>

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-slate-100 antialiased min-h-screen flex items-center justify-center p-0 sm:p-4">

    <!-- PWA Install Prompt Banner (Styled premiumly) -->
    <div id="install-banner" class="hidden fixed top-4 z-50 max-w-sm w-full mx-4 bg-white/95 backdrop-blur-md rounded-2xl shadow-2xl p-4 border border-blue-50/50 flex items-center justify-between transition-all duration-300 transform translate-y-[-100px]">
        <div class="flex items-center gap-3">
            <div class="w-10 h-10 bg-blue-600 rounded-xl flex items-center justify-center text-white font-bold text-lg shadow-md">
                CH
            </div>
            <div>
                <h4 class="font-bold text-slate-800 text-sm">Install CareerHub</h4>
                <p class="text-xs text-slate-500">Akses cepat dari Home Screen</p>
            </div>
        </div>
        <div class="flex gap-2">
            <button id="btn-install-close" class="px-2 py-1 text-xs text-slate-400 font-medium hover:text-slate-600">Nanti</button>
            <button id="btn-install-app" class="px-3 py-1.5 bg-blue-600 text-white text-xs font-bold rounded-xl shadow-md shadow-blue-200 hover:bg-blue-700 transition">Install</button>
        </div>
    </div>

    <!-- Phone mockup wrapper -->
    <div class="w-full sm:max-w-md h-screen sm:h-[840px] bg-slate-50 sm:rounded-[40px] sm:shadow-2xl overflow-hidden flex flex-col relative sm:border-[8px] sm:border-slate-800">
        
        <!-- Status bar gap/notch simulator for desktop -->
        <div class="hidden sm:block absolute top-0 left-1/2 transform -translate-x-1/2 w-40 h-6 bg-slate-800 rounded-b-2xl z-50"></div>

        <!-- Header -->
        <header class="bg-white border-b border-slate-100 px-5 pt-6 pb-4 flex items-center justify-between shrink-0 shadow-sm z-30">
            <div class="flex items-center gap-2">
                <div class="w-8 h-8 bg-blue-600 rounded-lg flex items-center justify-center text-white font-bold text-sm shadow-md">
                    CH
                </div>
                <span class="text-lg font-bold text-slate-800 tracking-tight">Career<span class="text-blue-600 font-extrabold">Hub</span></span>
            </div>
            
            <div class="flex items-center gap-3">
                @auth
                    <!-- Badge Role -->
                    <span class="px-2.5 py-0.5 rounded-full text-[10px] font-bold tracking-wider uppercase {{ auth()->user()->role === 'admin' ? 'bg-indigo-50 text-indigo-600' : 'bg-blue-50 text-blue-600' }}">
                        {{ auth()->user()->role }}
                    </span>
                @else
                    <a href="{{ route('login') }}" class="text-xs font-semibold text-blue-600 hover:text-blue-700">Masuk</a>
                @endauth
            </div>
        </header>

        <!-- Main Content Area -->
        <main class="flex-1 overflow-y-auto no-scrollbar pb-24 relative z-10 bg-slate-50">
            @if(session('success'))
                <div class="mx-4 mt-4 p-3 bg-emerald-50 border border-emerald-100 text-emerald-700 rounded-xl text-xs font-medium flex items-center gap-2 shadow-sm animate-fade-in">
                    <svg class="w-4 h-4 text-emerald-500 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    <span>{{ session('success') }}</span>
                </div>
            @endif

            @if(session('error'))
                <div class="mx-4 mt-4 p-3 bg-rose-50 border border-rose-100 text-rose-700 rounded-xl text-xs font-medium flex items-center gap-2 shadow-sm animate-fade-in">
                    <svg class="w-4 h-4 text-rose-500 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    <span>{{ session('error') }}</span>
                </div>
            @endif

            {{ $slot }}
        </main>

        <!-- Bottom Navigation Bar -->
        @auth
            <nav class="absolute bottom-0 left-0 right-0 h-20 glass-nav border-t border-slate-100 px-6 pb-2 pt-3 flex justify-around items-center z-40 rounded-t-3xl shadow-lg shadow-slate-100">
                @if(auth()->user()->role === 'admin')
                    <!-- Admin Navigation -->
                    <a href="/admin/dashboard" class="flex flex-col items-center gap-1.5 transition-all {{ request()->is('admin/dashboard') ? 'text-blue-600 scale-105 font-semibold' : 'text-slate-400 hover:text-slate-600' }}">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v4a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v4a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v4a2 2 0 01-2 2H6a2 2 0 01-2-2v-4zM14 16a2 2 0 012-2h2a2 2 0 012 2v4a2 2 0 01-2 2h-2a2 2 0 01-2-2v-4z"/></svg>
                        <span class="text-[10px]">Dashboard</span>
                    </a>
                    
                    <a href="/admin/vacancies" class="flex flex-col items-center gap-1.5 transition-all {{ request()->is('admin/vacancies') && !request()->is('admin/vacancies/create') ? 'text-blue-600 scale-105 font-semibold' : 'text-slate-400 hover:text-slate-600' }}">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"/></svg>
                        <span class="text-[10px]">Kelola</span>
                    </a>

                    <a href="/admin/vacancies/create" class="flex flex-col items-center gap-1.5 transition-all {{ request()->is('admin/vacancies/create') ? 'text-blue-600 scale-105 font-semibold' : 'text-slate-400 hover:text-slate-600' }}">
                        <div class="w-10 h-10 bg-blue-600 hover:bg-blue-700 text-white rounded-full flex items-center justify-center -translate-y-5 shadow-lg shadow-blue-200 transition">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 4v16m8-8H4"/></svg>
                        </div>
                        <span class="text-[10px] -translate-y-4">Tambah</span>
                    </a>

                    <form method="POST" action="{{ route('logout') }}" id="logout-form" class="hidden">@csrf</form>
                    <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="flex flex-col items-center gap-1.5 text-slate-400 hover:text-rose-600 transition-all">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/></svg>
                        <span class="text-[10px]">Keluar</span>
                    </a>
                @else
                    <!-- Student Navigation -->
                    <a href="/dashboard" class="flex flex-col items-center gap-1.5 transition-all {{ request()->is('dashboard') ? 'text-blue-600 scale-105 font-semibold' : 'text-slate-400 hover:text-slate-600' }}">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/></svg>
                        <span class="text-[10px]">Home</span>
                    </a>

                    <a href="/vacancies" class="flex flex-col items-center gap-1.5 transition-all {{ request()->is('vacancies') && !request()->has('search') ? 'text-blue-600 scale-105 font-semibold' : 'text-slate-400 hover:text-slate-600' }}">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                        <span class="text-[10px]">Lowongan</span>
                    </a>

                    <a href="/search" class="flex flex-col items-center gap-1.5 transition-all {{ request()->is('search') || (request()->is('vacancies') && request()->has('search')) ? 'text-blue-600 scale-105 font-semibold' : 'text-slate-400 hover:text-slate-600' }}">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                        <span class="text-[10px]">Search</span>
                    </a>

                    <a href="/profile" class="flex flex-col items-center gap-1.5 transition-all {{ request()->is('profile') ? 'text-blue-600 scale-105 font-semibold' : 'text-slate-400 hover:text-slate-600' }}">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
                        <span class="text-[10px]">Profil</span>
                    </a>
                @endif
            </nav>
        @endauth
    </div>

    <!-- PWA Service Worker Registration & Interaction scripts -->
    <script>
        if ('serviceWorker' in navigator) {
            window.addEventListener('load', () => {
                navigator.serviceWorker.register('/sw.js')
                    .then(reg => console.log('Service Worker registered successfully!', reg))
                    .catch(err => console.log('Service Worker registration failed:', err));
            });
        }

        // Handle PWA installation trigger
        let deferredPrompt;
        const installBanner = document.getElementById('install-banner');
        const installBtn = document.getElementById('btn-install-app');
        const closeBtn = document.getElementById('btn-install-close');

        window.addEventListener('beforeinstallprompt', (e) => {
            e.preventDefault();
            deferredPrompt = e;
            
            // Show the custom banner
            if (installBanner) {
                installBanner.classList.remove('hidden');
                setTimeout(() => {
                    installBanner.style.transform = 'translateY(0)';
                }, 100);
            }
        });

        if (installBtn) {
            installBtn.addEventListener('click', async () => {
                if (deferredPrompt) {
                    deferredPrompt.prompt();
                    const { outcome } = await deferredPrompt.userChoice;
                    console.log(`User response to install prompt: ${outcome}`);
                    deferredPrompt = null;
                    hideBanner();
                }
            });
        }

        if (closeBtn) {
            closeBtn.addEventListener('click', () => {
                hideBanner();
            });
        }

        function hideBanner() {
            if (installBanner) {
                installBanner.style.transform = 'translateY(-100px)';
                setTimeout(() => {
                    installBanner.classList.add('hidden');
                }, 300);
            }
        }
    </script>
</body>
</html>
