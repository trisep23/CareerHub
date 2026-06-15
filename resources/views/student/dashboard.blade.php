<x-mobile-layout title="Dashboard - CareerHub">
    <!-- Greeting User Banner -->
    <div class="px-6 pt-6 pb-8 bg-gradient-to-br from-blue-600 to-indigo-600 text-white rounded-b-[32px] shadow-lg shadow-blue-100 flex flex-col relative overflow-hidden">
        <div class="absolute -right-10 -top-10 w-36 h-36 bg-white/10 rounded-full blur-xl"></div>
        
        <span class="text-xs text-blue-100/80 font-medium uppercase tracking-wider">Dashboard Mahasiswa</span>
        <h2 class="text-xl font-extrabold tracking-tight mt-1">Halo, {{ auth()->user()->name }}! 👋</h2>
        <p class="text-[11px] text-blue-100/90 mt-0.5">Sudah siap mencari karir impianmu hari ini?</p>

        <!-- Quick Search Bar Redirect -->
        <a href="/search" class="mt-5 bg-white text-slate-400 text-xs px-4 py-3 rounded-2xl shadow-sm border border-slate-100 flex items-center justify-between hover:text-slate-600 transition">
            <div class="flex items-center gap-2">
                <svg class="w-4 h-4 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                <span>Cari judul lowongan atau perusahaan...</span>
            </div>
            <span class="w-6 h-6 bg-blue-50 rounded-lg flex items-center justify-center text-blue-600">
                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
            </span>
        </a>
    </div>

    <!-- Job Stats Card -->
    <div class="px-6 -translate-y-4">
        <div class="bg-white rounded-2xl shadow-sm p-4 border border-slate-100 flex justify-around">
            <div class="text-center w-1/2 border-r border-slate-100">
                <span class="text-xs text-slate-400 font-semibold uppercase tracking-wider">Total Lowongan</span>
                <p class="text-2xl font-black text-slate-800 mt-1">{{ $totalVacancies }}</p>
            </div>
            <div class="text-center w-1/2">
                <span class="text-xs text-slate-400 font-semibold uppercase tracking-wider">Lowongan Aktif</span>
                <p class="text-2xl font-black text-blue-600 mt-1">{{ $activeVacancies }}</p>
            </div>
        </div>
    </div>

    <!-- Recent Job Listings -->
    <div class="px-6 pb-6">
        <div class="flex justify-between items-center mb-4">
            <h3 class="text-xs font-bold text-slate-400 uppercase tracking-widest">Lowongan Terbaru</h3>
            <a href="/vacancies" class="text-[11px] font-bold text-blue-600 hover:text-blue-700 transition">Lihat Semua</a>
        </div>

        <div class="space-y-3.5">
            @forelse($recentVacancies as $v)
                <a href="/vacancies/{{ $v->id }}" class="block bg-white p-4 rounded-2xl border border-slate-100/80 shadow-sm hover:shadow-md transition active:scale-[0.99] duration-150">
                    <div class="flex items-center justify-between mb-2.5">
                        <span class="px-2 py-0.5 bg-blue-50 text-blue-600 rounded-md text-[9px] font-bold">Terbaru</span>
                        <span class="text-[10px] text-slate-400 flex items-center gap-1">
                            <svg class="w-3 h-3 text-rose-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                            {{ \Carbon\Carbon::parse($v->deadline)->format('d M Y') }}
                        </span>
                    </div>
                    
                    <h4 class="text-sm font-bold text-slate-800 tracking-tight">{{ $v->title }}</h4>
                    <p class="text-xs text-slate-500 mt-0.5 font-medium">{{ $v->company }}</p>
                    
                    <div class="flex items-center gap-3 mt-3.5 pt-2.5 border-t border-slate-50 text-[10px] text-slate-400">
                        <span class="flex items-center gap-1">📍 {{ $v->location }}</span>
                    </div>
                </a>
            @empty
                <div class="text-center py-8 bg-white rounded-2xl border border-slate-100 text-slate-400 text-xs">
                    Belum ada lowongan terbaru saat ini.
                </div>
            @endforelse
        </div>
    </div>
</x-mobile-layout>
