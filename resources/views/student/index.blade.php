<x-mobile-layout title="Daftar Lowongan - CareerHub">
    <div class="px-6 py-6">
        <div class="mb-4">
            <h2 class="text-xl font-extrabold text-slate-800 tracking-tight">Eksplorasi Lowongan</h2>
            <p class="text-xs text-slate-500 mt-1">Menampilkan total {{ $vacancies->count() }} lowongan pekerjaan & magang.</p>
        </div>

        <!-- Quick Location Filter Links -->
        <div class="flex gap-2 overflow-x-auto no-scrollbar pb-3 mb-2">
            <a href="/vacancies" class="px-3.5 py-1.5 rounded-full text-xs font-semibold shrink-0 {{ !request('location') ? 'bg-blue-600 text-white shadow-md shadow-blue-200' : 'bg-white text-slate-500 border border-slate-100 hover:bg-slate-50' }}">
                Semua
            </a>
            <a href="/vacancies?location=Bandung" class="px-3.5 py-1.5 rounded-full text-xs font-semibold shrink-0 {{ request('location') === 'Bandung' ? 'bg-blue-600 text-white shadow-md shadow-blue-200' : 'bg-white text-slate-500 border border-slate-100 hover:bg-slate-50' }}">
                Bandung
            </a>
            <a href="/vacancies?location=Jakarta" class="px-3.5 py-1.5 rounded-full text-xs font-semibold shrink-0 {{ request('location') === 'Jakarta' ? 'bg-blue-600 text-white shadow-md shadow-blue-200' : 'bg-white text-slate-500 border border-slate-100 hover:bg-slate-50' }}">
                Jakarta
            </a>
            <a href="/vacancies?location=Surabaya" class="px-3.5 py-1.5 rounded-full text-xs font-semibold shrink-0 {{ request('location') === 'Surabaya' ? 'bg-blue-600 text-white shadow-md shadow-blue-200' : 'bg-white text-slate-500 border border-slate-100 hover:bg-slate-50' }}">
                Surabaya
            </a>
        </div>

        <!-- Job Cards List (JobStreet/Glints Layout) -->
        <div class="space-y-4 mt-2">
            @forelse($vacancies as $vacancy)
                <a href="/vacancies/{{ $vacancy->id }}" class="block bg-white p-5 rounded-3xl border border-slate-100/90 shadow-sm hover:shadow-md transition duration-200 relative group active:scale-[0.99]">
                    
                    <!-- Top Info badge -->
                    <div class="flex items-center justify-between mb-3">
                        <span class="px-2.5 py-1 bg-blue-50 text-blue-600 rounded-lg text-[9px] font-bold tracking-wide uppercase">
                            Full-time / Intern
                        </span>
                        
                        @php
                            $isUrgent = \Carbon\Carbon::parse($vacancy->deadline)->diffInDays(now()) <= 7;
                        @endphp
                        @if($isUrgent)
                            <span class="px-2.5 py-1 bg-rose-50 text-rose-600 rounded-lg text-[9px] font-bold tracking-wide uppercase">
                                Segera Berakhir
                            </span>
                        @endif
                    </div>

                    <!-- Job Title -->
                    <h3 class="text-sm font-extrabold text-slate-800 tracking-tight group-hover:text-blue-600 transition">
                        {{ $vacancy->title }}
                    </h3>

                    <!-- Company Name -->
                    <p class="text-xs font-semibold text-slate-600 mt-1 flex items-center gap-1.5">
                        <svg class="w-3.5 h-3.5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/></svg>
                        {{ $vacancy->company }}
                    </p>

                    <!-- Details Row -->
                    <div class="flex items-center gap-4 mt-4 pt-3.5 border-t border-slate-50 text-[10px] text-slate-400">
                        <span class="flex items-center gap-1">📍 {{ $vacancy->location }}</span>
                        <span class="flex items-center gap-1">
                            <svg class="w-3 h-3 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                            Deadline: {{ \Carbon\Carbon::parse($vacancy->deadline)->format('d M Y') }}
                        </span>
                    </div>

                    <!-- Arrow Chevron -->
                    <div class="absolute right-5 top-1/2 -translate-y-1/2 w-8 h-8 bg-slate-50 rounded-full flex items-center justify-center text-slate-400 group-hover:bg-blue-600 group-hover:text-white transition shadow-sm">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7"/></svg>
                    </div>
                </a>
            @empty
                <div class="text-center py-12 bg-white rounded-3xl border border-slate-100/80 p-8 shadow-sm">
                    <div class="w-16 h-16 bg-slate-50 text-slate-400 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    </div>
                    <h4 class="font-bold text-slate-700 text-sm">Tidak ada lowongan ditemukan</h4>
                    <p class="text-xs text-slate-400 mt-1">Coba cari lokasi atau kategori lainnya.</p>
                </div>
            @endforelse
        </div>
    </div>
</x-mobile-layout>
