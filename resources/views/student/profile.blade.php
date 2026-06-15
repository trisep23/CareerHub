<x-mobile-layout title="Profil - CareerHub">
    <div class="px-6 py-8">
        <!-- Profile header -->
        <div class="flex flex-col items-center text-center mb-8">
            <div class="w-20 h-20 bg-blue-600 text-white rounded-full flex items-center justify-center font-black text-2xl shadow-xl shadow-blue-200 border-4 border-white mb-4">
                {{ strtoupper(substr(auth()->user()->name, 0, 2)) }}
            </div>
            
            <h2 class="text-lg font-black text-slate-800 tracking-tight">{{ auth()->user()->name }}</h2>
            <p class="text-xs text-slate-400 mt-0.5">{{ auth()->user()->email }}</p>
            
            <span class="mt-2.5 px-3 py-1 bg-blue-50 text-blue-600 rounded-full text-[10px] font-bold tracking-wider uppercase">
                Mahasiswa Aktif
            </span>
        </div>

        <!-- Account stats -->
        <div class="bg-white rounded-3xl border border-slate-100 p-5 shadow-sm mb-6 flex justify-around">
            <div class="text-center w-1/3 border-r border-slate-50">
                <span class="text-[9px] font-bold text-slate-400 uppercase tracking-wider block">Lamaran</span>
                <span class="text-lg font-black text-slate-800 mt-1 block">4</span>
            </div>
            <div class="text-center w-1/3 border-r border-slate-50">
                <span class="text-[9px] font-bold text-slate-400 uppercase tracking-wider block">Wawancara</span>
                <span class="text-lg font-black text-slate-800 mt-1 block">1</span>
            </div>
            <div class="text-center w-1/3">
                <span class="text-[9px] font-bold text-slate-400 uppercase tracking-wider block">Diterima</span>
                <span class="text-lg font-black text-emerald-600 mt-1 block">1</span>
            </div>
        </div>

        <!-- Menu items list -->
        <div class="bg-white rounded-3xl border border-slate-100 shadow-sm overflow-hidden mb-8">
            <div class="p-4 border-b border-slate-50 flex items-center justify-between text-xs hover:bg-slate-50 transition cursor-pointer">
                <div class="flex items-center gap-3">
                    <span>👤</span>
                    <span class="font-bold text-slate-700">Edit Profil</span>
                </div>
                <span class="text-slate-400 font-extrabold text-[10px]">&gt;</span>
            </div>

            <div class="p-4 border-b border-slate-50 flex items-center justify-between text-xs hover:bg-slate-50 transition cursor-pointer">
                <div class="flex items-center gap-3">
                    <span>📄</span>
                    <span class="font-bold text-slate-700">Unggah CV / Resume</span>
                </div>
                <span class="text-emerald-500 font-bold text-[10px]">Telah Diunggah</span>
            </div>

            <div class="p-4 border-b border-slate-50 flex items-center justify-between text-xs hover:bg-slate-50 transition cursor-pointer">
                <div class="flex items-center gap-3">
                    <span>🔔</span>
                    <span class="font-bold text-slate-700">Notifikasi Lowongan</span>
                </div>
                <span class="text-slate-400 font-extrabold text-[10px]">&gt;</span>
            </div>
        </div>

        <!-- Logout Form and Button -->
        <form method="POST" action="{{ route('logout') }}" id="profile-logout-form">
            @csrf
            <button type="submit" class="w-full py-3.5 bg-rose-50 hover:bg-rose-100 text-rose-600 font-bold rounded-2xl text-xs transition text-center shadow-sm">
                Keluar dari Akun
            </button>
        </form>
    </div>
</x-mobile-layout>
