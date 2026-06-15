<x-mobile-layout title="Selamat Datang di CareerHub">
    <!-- Welcome Screen Banner -->
    <div class="px-6 pt-8 pb-6 bg-gradient-to-br from-blue-600 to-indigo-700 text-white rounded-b-[32px] shadow-lg shadow-blue-100 flex flex-col items-center text-center relative overflow-hidden">
        <!-- Abstract patterns for aesthetic visual -->
        <div class="absolute -right-10 -top-10 w-40 h-40 bg-white/10 rounded-full blur-2xl"></div>
        <div class="absolute -left-10 -bottom-10 w-40 h-40 bg-blue-500/20 rounded-full blur-2xl"></div>

        <div class="w-16 h-16 bg-white text-blue-600 rounded-2xl flex items-center justify-center font-black text-3xl shadow-xl shadow-blue-900/20 mb-4 tracking-tighter">
            CH
        </div>

        <h1 class="text-2xl font-extrabold tracking-tight">Career<span class="text-blue-200">Hub</span></h1>
        <p class="text-xs text-blue-100/90 mt-1 max-w-xs leading-relaxed">
            Platform Terpusat Lowongan Kerja, Magang, dan Part-Time Mahasiswa
        </p>

        <!-- CTA Buttons -->
        <div class="grid grid-cols-2 gap-3 w-full mt-6 z-10">
            <a href="{{ route('login') }}" class="py-3 bg-white text-blue-700 font-bold rounded-xl text-xs hover:bg-slate-50 shadow-md transition text-center">
                Masuk
            </a>
            <a href="{{ route('register') }}" class="py-3 bg-blue-500/35 border border-blue-400/30 text-white font-bold rounded-xl text-xs hover:bg-blue-500/50 transition text-center">
                Daftar Baru
            </a>
        </div>
    </div>

    <!-- Quick Features / Intro -->
    <div class="px-6 py-6">
        <h3 class="text-xs font-bold text-slate-400 uppercase tracking-widest mb-4">Mengapa CareerHub?</h3>
        
        <div class="space-y-4">
            <div class="flex items-start gap-3.5 bg-white p-4 rounded-2xl border border-slate-100 shadow-sm">
                <div class="w-8 h-8 bg-blue-50 text-blue-600 rounded-lg flex items-center justify-center shrink-0">
                    <svg class="w-4.5 h-4.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                </div>
                <div>
                    <h4 class="text-xs font-bold text-slate-800">Lowongan Terpusat</h4>
                    <p class="text-[11px] text-slate-500 mt-0.5 leading-relaxed">Cari info magang dan kerja part-time terverifikasi khusus mahasiswa.</p>
                </div>
            </div>

            <div class="flex items-start gap-3.5 bg-white p-4 rounded-2xl border border-slate-100 shadow-sm">
                <div class="w-8 h-8 bg-emerald-50 text-emerald-600 rounded-lg flex items-center justify-center shrink-0">
                    <svg class="w-4.5 h-4.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                </div>
                <div>
                    <h4 class="text-xs font-bold text-slate-800">Proses Cepat & Mudah</h4>
                    <p class="text-[11px] text-slate-500 mt-0.5 leading-relaxed">Pantau langsung tanggal deadline dan deskripsi lengkap lowongan.</p>
                </div>
            </div>

            <div class="flex items-start gap-3.5 bg-white p-4 rounded-2xl border border-slate-100 shadow-sm">
                <div class="w-8 h-8 bg-purple-50 text-purple-600 rounded-lg flex items-center justify-center shrink-0">
                    <svg class="w-4.5 h-4.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z"/></svg>
                </div>
                <div>
                    <h4 class="text-xs font-bold text-slate-800">Aplikasi PWA Ringan</h4>
                    <p class="text-[11px] text-slate-500 mt-0.5 leading-relaxed">Dapat diinstal langsung ke HP Anda tanpa memakan ruang penyimpanan.</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Latest Vacancies Preview -->
    <div class="px-6 pb-6">
        <div class="flex justify-between items-center mb-3">
            <h3 class="text-xs font-bold text-slate-400 uppercase tracking-widest">Lowongan Terbaru</h3>
            <a href="{{ route('login') }}" class="text-[11px] font-bold text-blue-600">Lihat Semua</a>
        </div>

        <div class="space-y-3">
            @php
                $previewVacancies = \App\Models\Vacancy::latest()->take(2)->get();
            @endphp

            @forelse($previewVacancies as $v)
                <div class="p-4 bg-white rounded-2xl border border-slate-100 shadow-sm">
                    <div class="flex items-center justify-between mb-2">
                        <span class="px-2 py-0.5 bg-blue-50 text-blue-600 rounded-md text-[9px] font-bold">Magang</span>
                        <span class="text-[10px] text-slate-400">Hingga {{ \Carbon\Carbon::parse($v->deadline)->format('d M Y') }}</span>
                    </div>
                    <h4 class="text-xs font-bold text-slate-800">{{ $v->title }}</h4>
                    <p class="text-[11px] text-slate-500 mt-0.5">{{ $v->company }} &bull; {{ $v->location }}</p>
                </div>
            @empty
                <div class="text-center py-6 bg-white rounded-2xl border border-slate-100 text-slate-400 text-xs">
                    Belum ada lowongan terdaftar.
                </div>
            @endforelse
        </div>
    </div>
</x-mobile-layout>
