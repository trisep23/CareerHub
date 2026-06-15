<x-mobile-layout title="Cari Lowongan - CareerHub">
    <div class="px-6 py-6">
        <div class="mb-5">
            <h2 class="text-xl font-extrabold text-slate-800 tracking-tight">Cari Pekerjaan</h2>
            <p class="text-xs text-slate-500 mt-1">Gunakan kata kunci judul atau nama perusahaan.</p>
        </div>

        <!-- Search Form -->
        <form method="GET" action="/search" class="space-y-4 bg-white p-5 rounded-3xl border border-slate-100 shadow-sm mb-6">
            <!-- Keyword search -->
            <div class="space-y-1">
                <label for="search" class="text-[11px] font-bold text-slate-500 uppercase tracking-wider">Kata Kunci</label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none text-slate-400">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                    </div>
                    <input type="text" name="search" id="search" value="{{ request('search') }}"
                        class="w-full pl-9 pr-4 py-2.5 bg-slate-50 border border-slate-200 rounded-2xl text-xs font-semibold text-slate-700 focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500 transition"
                        placeholder="Contoh: Frontend, Designer...">
                </div>
            </div>

            <!-- Location search dropdown -->
            <div class="space-y-1">
                <label for="location" class="text-[11px] font-bold text-slate-500 uppercase tracking-wider">Lokasi</label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none text-slate-400">
                        <span>📍</span>
                    </div>
                    <select name="location" id="location" 
                        class="w-full pl-9 pr-4 py-2.5 bg-slate-50 border border-slate-200 rounded-2xl text-xs font-semibold text-slate-700 focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500 transition appearance-none">
                        <option value="">Semua Lokasi</option>
                        @foreach($locations as $loc)
                            <option value="{{ $loc }}" {{ request('location') === $loc ? 'selected' : '' }}>{{ $loc }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="grid grid-cols-2 gap-3 pt-2">
                <a href="/search" class="py-2.5 border border-slate-100 hover:bg-slate-50 text-slate-500 font-bold rounded-2xl text-xs text-center transition">
                    Reset
                </a>
                <button type="submit" class="py-2.5 bg-blue-600 hover:bg-blue-700 text-white font-bold rounded-2xl text-xs shadow-md shadow-blue-200 transition">
                    Cari Lowongan
                </button>
            </div>
        </form>

        <!-- Search Results -->
        <div>
            @if($isSearched)
                <h3 class="text-xs font-bold text-slate-400 uppercase tracking-widest mb-4">Hasil Pencarian ({{ $vacancies->count() }})</h3>
                
                <div class="space-y-4">
                    @forelse($vacancies as $vacancy)
                        <a href="/vacancies/{{ $vacancy->id }}" class="block bg-white p-4 rounded-2xl border border-slate-100 shadow-sm hover:shadow-md transition active:scale-[0.99] duration-150">
                            <div class="flex items-center justify-between mb-2">
                                <span class="px-2 py-0.5 bg-blue-50 text-blue-600 rounded-md text-[9px] font-bold">Terverifikasi</span>
                                <span class="text-[10px] text-slate-400">Deadline: {{ \Carbon\Carbon::parse($vacancy->deadline)->format('d M Y') }}</span>
                            </div>
                            <h4 class="text-xs font-bold text-slate-800 tracking-tight">{{ $vacancy->title }}</h4>
                            <p class="text-[11px] text-slate-500 mt-0.5">{{ $vacancy->company }} &bull; {{ $vacancy->location }}</p>
                        </a>
                    @empty
                        <div class="text-center py-10 bg-white rounded-3xl border border-slate-100 p-6">
                            <div class="w-12 h-12 bg-slate-50 text-slate-400 rounded-full flex items-center justify-center mx-auto mb-3">
                                🔍
                            </div>
                            <h4 class="font-bold text-slate-700 text-xs">Pencarian Nihil</h4>
                            <p class="text-[11px] text-slate-400 mt-1">Coba kata kunci lain atau pilih Semua Lokasi.</p>
                        </div>
                    @endforelse
                </div>
            @else
                <!-- Show recommendations/tips if not searched yet -->
                <div class="bg-white p-6 rounded-3xl border border-slate-100 text-center shadow-sm">
                    <div class="w-16 h-16 bg-blue-50 text-blue-600 rounded-full flex items-center justify-center mx-auto mb-4 text-2xl">
                        💡
                    </div>
                    <h4 class="text-sm font-bold text-slate-800">Mulai Pencarian Anda</h4>
                    <p class="text-xs text-slate-500 mt-1.5 leading-relaxed">Masukkan kata kunci posisi atau nama perusahaan di form pencarian di atas untuk mulai mencari lowongan terpusat.</p>
                </div>
            @endif
        </div>
    </div>
</x-mobile-layout>
