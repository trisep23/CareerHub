<x-mobile-layout title="Dashboard Admin - CareerHub">
    <!-- Admin Greeting Header -->
    <div class="px-6 pt-6 pb-8 bg-gradient-to-br from-indigo-700 to-blue-800 text-white rounded-b-[32px] shadow-lg shadow-indigo-100 flex flex-col relative overflow-hidden">
        <div class="absolute -right-10 -top-10 w-36 h-36 bg-white/10 rounded-full blur-xl"></div>
        
        <span class="text-xs text-indigo-200/90 font-medium uppercase tracking-wider">Admin Panel &bull; CareerHub</span>
        <h2 class="text-xl font-extrabold tracking-tight mt-1">Halo, {{ auth()->user()->name }}! 👑</h2>
        <p class="text-[11px] text-indigo-100/90 mt-0.5">Kelola lowongan dan ketersediaan kerja mahasiswa secara terpusat.</p>
    </div>

    <!-- Admin Statistics Grid -->
    <div class="px-6 -translate-y-4">
        <div class="grid grid-cols-3 gap-3">
            <div class="bg-white p-3.5 rounded-2xl border border-slate-100 shadow-sm text-center">
                <span class="text-[9px] font-bold text-slate-400 uppercase tracking-wider block">Lowongan</span>
                <span class="text-lg font-black text-slate-800 mt-1 block">{{ $totalVacancies }}</span>
            </div>
            <div class="bg-white p-3.5 rounded-2xl border border-slate-100 shadow-sm text-center">
                <span class="text-[9px] font-bold text-slate-400 uppercase tracking-wider block">Aktif</span>
                <span class="text-lg font-black text-indigo-600 mt-1 block">{{ $activeVacancies }}</span>
            </div>
            <div class="bg-white p-3.5 rounded-2xl border border-slate-100 shadow-sm text-center">
                <span class="text-[9px] font-bold text-slate-400 uppercase tracking-wider block">Mahasiswa</span>
                <span class="text-lg font-black text-slate-800 mt-1 block">{{ $totalStudents }}</span>
            </div>
        </div>
    </div>

    <!-- Quick Navigation Shortcuts -->
    <div class="px-6 pb-4">
        <h3 class="text-xs font-bold text-slate-400 uppercase tracking-widest mb-3">Aksi Cepat</h3>
        
        <div class="grid grid-cols-2 gap-3">
            <a href="/admin/vacancies" class="flex flex-col items-center justify-center p-5 bg-white border border-slate-100 rounded-2xl shadow-sm hover:shadow-md transition text-center group">
                <div class="w-10 h-10 bg-indigo-50 text-indigo-600 rounded-xl flex items-center justify-center mb-2.5 font-bold group-hover:scale-105 transition">
                    📋
                </div>
                <h4 class="text-xs font-bold text-slate-800">Kelola Lowongan</h4>
                <p class="text-[10px] text-slate-400 mt-0.5">Edit & Hapus data</p>
            </a>

            <a href="/admin/vacancies/create" class="flex flex-col items-center justify-center p-5 bg-white border border-slate-100 rounded-2xl shadow-sm hover:shadow-md transition text-center group">
                <div class="w-10 h-10 bg-emerald-50 text-emerald-600 rounded-xl flex items-center justify-center mb-2.5 font-bold group-hover:scale-105 transition">
                    ➕
                </div>
                <h4 class="text-xs font-bold text-slate-800">Tambah Data</h4>
                <p class="text-[10px] text-slate-400 mt-0.5">Kirim info terbaru</p>
            </a>
        </div>
    </div>

    <!-- Recent Postings by Admin -->
    <div class="px-6 pb-6">
        <h3 class="text-xs font-bold text-slate-400 uppercase tracking-widest mb-3">Postingan Terakhir</h3>
        
        <div class="space-y-3">
            @forelse($recentVacancies as $v)
                <div class="bg-white p-4 rounded-2xl border border-slate-100 shadow-sm flex justify-between items-center">
                    <div>
                        <h4 class="text-xs font-bold text-slate-800 tracking-tight">{{ $v->title }}</h4>
                        <p class="text-[10px] text-slate-400 mt-0.5">{{ $v->company }} &bull; {{ $v->location }}</p>
                    </div>
                    <div class="flex gap-2">
                        <a href="/admin/vacancies/{{ $v->id }}/edit" class="p-1.5 bg-slate-50 hover:bg-indigo-50 hover:text-indigo-600 text-slate-500 rounded-lg text-xs transition" title="Edit">
                            ✏️
                        </a>
                    </div>
                </div>
            @empty
                <div class="text-center py-6 bg-white rounded-2xl border border-slate-100 text-slate-400 text-xs">
                    Belum ada postingan lowongan.
                </div>
            @endforelse
        </div>
    </div>
</x-mobile-layout>
