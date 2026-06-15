<x-mobile-layout title="Detail Lowongan - CareerHub">
    <div x-data="{ applied: false }" class="px-6 py-6">
        <!-- Back Button -->
        <a href="{{ url()->previous() == url()->current() ? '/vacancies' : url()->previous() }}" 
           class="inline-flex items-center justify-center w-10 h-10 bg-white border border-slate-100 rounded-xl text-slate-500 hover:text-slate-700 shadow-sm mb-5 transition">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M15 19l-7-7 7-7"/></svg>
        </a>

        <!-- Main Details Card -->
        <div class="bg-white rounded-3xl border border-slate-100 shadow-sm p-6 mb-6">
            <div class="flex items-center justify-between mb-4">
                <span class="px-2.5 py-1 bg-blue-50 text-blue-600 rounded-lg text-[9px] font-bold tracking-wide uppercase">
                    Pekerjaan Paruh Waktu / Magang
                </span>
                
                @php
                    $isExpired = \Carbon\Carbon::parse($vacancy->deadline)->isPast();
                @endphp
                @if($isExpired)
                    <span class="px-2.5 py-1 bg-rose-50 text-rose-600 rounded-lg text-[9px] font-bold tracking-wide uppercase">
                        Selesai
                    </span>
                @else
                    <span class="px-2.5 py-1 bg-emerald-50 text-emerald-600 rounded-lg text-[9px] font-bold tracking-wide uppercase">
                        Aktif
                    </span>
                @endif
            </div>

            <!-- Job Title -->
            <h1 class="text-lg font-black text-slate-800 tracking-tight leading-snug">
                {{ $vacancy->title }}
            </h1>
            
            <!-- Company -->
            <p class="text-sm font-semibold text-blue-600 mt-1.5">{{ $vacancy->company }}</p>

            <!-- Metadata info grid -->
            <div class="grid grid-cols-2 gap-3 mt-6 pt-5 border-t border-slate-50">
                <div class="p-3 bg-slate-50/75 rounded-2xl">
                    <span class="text-[9px] font-bold text-slate-400 uppercase tracking-wider block">Lokasi</span>
                    <span class="text-xs font-bold text-slate-700 mt-1 block">📍 {{ $vacancy->location }}</span>
                </div>
                <div class="p-3 bg-slate-50/75 rounded-2xl">
                    <span class="text-[9px] font-bold text-slate-400 uppercase tracking-wider block">Batas Pendaftaran</span>
                    <span class="text-xs font-bold text-rose-600 mt-1 block flex items-center gap-1">
                        📅 {{ \Carbon\Carbon::parse($vacancy->deadline)->format('d M Y') }}
                    </span>
                </div>
            </div>
        </div>

        <!-- Description Details -->
        <div class="bg-white rounded-3xl border border-slate-100 shadow-sm p-6 mb-20">
            <h3 class="text-xs font-bold text-slate-800 uppercase tracking-wider mb-3 pb-2 border-b border-slate-50">Deskripsi Pekerjaan</h3>
            <div class="text-xs text-slate-600 leading-relaxed space-y-3 whitespace-pre-line">
                {{ $vacancy->description }}
            </div>
        </div>

        <!-- Floating Apply Bar -->
        <div class="fixed bottom-20 left-0 right-0 p-4 max-w-md mx-auto z-40 bg-white/90 backdrop-blur-md border-t border-slate-100/70 flex gap-3 rounded-t-3xl shadow-lg">
            @if($isExpired)
                <button disabled class="w-full py-3.5 bg-slate-300 text-slate-500 font-bold rounded-2xl text-xs cursor-not-allowed text-center">
                    Pendaftaran Ditutup
                </button>
            @else
                <button x-show="!applied" @click="applied = true; setTimeout(() => { applied = false }, 5000)" 
                    class="w-full py-3.5 bg-blue-600 hover:bg-blue-700 text-white font-bold rounded-2xl text-xs shadow-lg shadow-blue-200 hover:shadow-blue-300 transition text-center">
                    Kirim Lamaran Sekarang
                </button>
                <div x-show="applied" class="w-full py-3 px-4 bg-emerald-50 border border-emerald-100 text-emerald-700 rounded-2xl text-xs font-bold flex items-center justify-center gap-2 animate-bounce">
                    <span>✅ Lamaran Berhasil Terkirim!</span>
                </div>
            @endif
        </div>
    </div>
</x-mobile-layout>
