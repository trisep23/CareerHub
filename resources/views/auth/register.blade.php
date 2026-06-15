<x-mobile-layout title="Daftar Mahasiswa - CareerHub">
    <div class="px-6 py-8">
        <!-- Back Button -->
        <a href="/" class="inline-flex items-center justify-center w-10 h-10 bg-white border border-slate-100 rounded-xl text-slate-500 hover:text-slate-700 shadow-sm mb-6 transition">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M15 19l-7-7 7-7"/></svg>
        </a>

        <div class="mb-6">
            <h2 class="text-2xl font-black text-slate-800 tracking-tight">Buat Akun Mahasiswa</h2>
            <p class="text-xs text-slate-500 mt-1">Dapatkan kemudahan mencari lowongan magang & paruh waktu secara instan.</p>
        </div>

        <form method="POST" action="{{ route('register') }}" class="space-y-4">
            @csrf

            <!-- Name -->
            <div class="space-y-1.5">
                <label for="name" class="text-xs font-bold text-slate-700">Nama Lengkap</label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-slate-400">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
                    </div>
                    <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus autocomplete="name"
                        class="w-full pl-11 pr-4 py-3 bg-white border border-slate-200 rounded-2xl text-xs font-medium text-slate-700 focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500 transition shadow-sm"
                        placeholder="Nama lengkap Anda">
                </div>
                <x-input-error :messages="$errors->get('name')" class="mt-1 text-[11px] text-rose-600 font-medium" />
            </div>

            <!-- Email Address -->
            <div class="space-y-1.5">
                <label for="email" class="text-xs font-bold text-slate-700">Alamat Email</label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-slate-400">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.206"/></svg>
                    </div>
                    <input id="email" type="email" name="email" value="{{ old('email') }}" required autocomplete="username"
                        class="w-full pl-11 pr-4 py-3 bg-white border border-slate-200 rounded-2xl text-xs font-medium text-slate-700 focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500 transition shadow-sm"
                        placeholder="contoh@careerhub.com">
                </div>
                <x-input-error :messages="$errors->get('email')" class="mt-1 text-[11px] text-rose-600 font-medium" />
            </div>

            <!-- Password -->
            <div class="space-y-1.5">
                <label for="password" class="text-xs font-bold text-slate-700">Password</label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-slate-400">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/></svg>
                    </div>
                    <input id="password" type="password" name="password" required autocomplete="new-password"
                        class="w-full pl-11 pr-4 py-3 bg-white border border-slate-200 rounded-2xl text-xs font-medium text-slate-700 focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500 transition shadow-sm"
                        placeholder="Minimal 8 karakter">
                </div>
                <x-input-error :messages="$errors->get('password')" class="mt-1 text-[11px] text-rose-600 font-medium" />
            </div>

            <!-- Confirm Password -->
            <div class="space-y-1.5">
                <label for="password_confirmation" class="text-xs font-bold text-slate-700">Konfirmasi Password</label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-slate-400">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/></svg>
                    </div>
                    <input id="password_confirmation" type="password" name="password_confirmation" required autocomplete="new-password"
                        class="w-full pl-11 pr-4 py-3 bg-white border border-slate-200 rounded-2xl text-xs font-medium text-slate-700 focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500 transition shadow-sm"
                        placeholder="Ulangi password Anda">
                </div>
                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-1 text-[11px] text-rose-600 font-medium" />
            </div>

            <!-- Action Button -->
            <button type="submit" class="w-full py-3.5 bg-blue-600 hover:bg-blue-700 text-white font-bold rounded-2xl shadow-lg shadow-blue-200 hover:shadow-blue-300 transition text-xs">
                Daftar Akun
            </button>
        </form>

        <div class="mt-8 text-center border-t border-slate-100 pt-6">
            <p class="text-xs text-slate-500">Sudah memiliki akun?</p>
            <a href="{{ route('login') }}" class="inline-block mt-2 text-xs font-bold text-blue-600 hover:text-blue-700">Masuk Sekarang</a>
        </div>
    </div>
</x-mobile-layout>
