<x-mobile-layout title="Kelola Lowongan - CareerHub">
    <div class="px-6 py-6">
        <div class="flex justify-between items-center mb-5">
            <div>
                <h2 class="text-xl font-extrabold text-slate-800 tracking-tight">Kelola Lowongan</h2>
                <p class="text-xs text-slate-500 mt-1">Total {{ $vacancies->count() }} lowongan pekerjaan & magang.</p>
            </div>
            <a href="/admin/vacancies/create" class="px-3.5 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-xl text-xs font-bold shadow-md shadow-blue-200 transition">
                + Tambah
            </a>
        </div>

        <!-- Vacancy Management List -->
        <div class="space-y-3.5">
            @forelse($vacancies as $vacancy)
                <div class="bg-white p-4.5 rounded-2xl border border-slate-100 shadow-sm flex flex-col gap-3">
                    <div>
                        <div class="flex justify-between items-center mb-1.5">
                            <span class="text-[9px] font-bold text-slate-400 uppercase tracking-wider">📍 {{ $vacancy->location }}</span>
                            <span class="text-[10px] text-slate-400">Deadline: {{ \Carbon\Carbon::parse($vacancy->deadline)->format('d M Y') }}</span>
                        </div>
                        <h4 class="text-xs font-extrabold text-slate-800 tracking-tight leading-snug">{{ $vacancy->title }}</h4>
                        <p class="text-[10px] text-slate-500 font-semibold mt-0.5">{{ $vacancy->company }}</p>
                    </div>

                    <!-- Actions Row -->
                    <div class="flex gap-2 pt-2.5 border-t border-slate-50 justify-end">
                        <!-- Edit Button -->
                        <a href="/admin/vacancies/{{ $vacancy->id }}/edit" class="px-3 py-1.5 bg-slate-50 hover:bg-indigo-50 text-indigo-600 hover:text-indigo-700 border border-slate-100 rounded-xl text-[10px] font-bold transition flex items-center gap-1">
                            ✏️ Edit
                        </a>

                        <!-- Delete Button / Form -->
                        <form method="POST" action="/admin/vacancies/{{ $vacancy->id }}" onsubmit="return confirm('Apakah Anda yakin ingin menghapus lowongan ini?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="px-3 py-1.5 bg-rose-50 hover:bg-rose-100 text-rose-600 border border-rose-100/55 rounded-xl text-[10px] font-bold transition flex items-center gap-1">
                                🗑️ Hapus
                            </button>
                        </form>
                    </div>
                </div>
            @empty
                <div class="text-center py-12 bg-white rounded-3xl border border-slate-100 p-8 shadow-sm">
                    <div class="w-16 h-16 bg-slate-50 text-slate-400 rounded-full flex items-center justify-center mx-auto mb-4">
                        📄
                    </div>
                    <h4 class="font-bold text-slate-700 text-sm">Belum ada lowongan</h4>
                    <p class="text-xs text-slate-400 mt-1">Mulai buat lowongan baru pertama Anda.</p>
                </div>
            @endforelse
        </div>
    </div>
</x-mobile-layout>
