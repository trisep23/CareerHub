<x-mobile-layout title="Tambah Lowongan - CareerHub">
    <div class="px-6 py-6">
        <!-- Back Button -->
        <a href="/admin/vacancies" class="inline-flex items-center justify-center w-10 h-10 bg-white border border-slate-100 rounded-xl text-slate-500 hover:text-slate-700 shadow-sm mb-5 transition">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M15 19l-7-7 7-7"/></svg>
        </a>

        <div class="mb-5">
            <h2 class="text-xl font-extrabold text-slate-800 tracking-tight">Tambah Lowongan</h2>
            <p class="text-xs text-slate-500 mt-1">Masukkan informasi detail mengenai lowongan baru.</p>
        </div>

        <form method="POST" action="/admin/vacancies" class="space-y-4 bg-white p-5 rounded-3xl border border-slate-100 shadow-sm">
            @csrf

            <!-- Job Title -->
            <div class="space-y-1">
                <label for="title" class="text-[10px] font-bold text-slate-500 uppercase tracking-wider">Judul Lowongan</label>
                <input type="text" name="title" id="title" value="{{ old('title') }}" required
                    class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-2xl text-xs font-semibold text-slate-700 focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500 transition"
                    placeholder="Contoh: Frontend Developer Intern">
                <x-input-error :messages="$errors->get('title')" class="mt-1 text-[10px] text-rose-500" />
            </div>

            <!-- Company Name -->
            <div class="space-y-1">
                <label for="company" class="text-[10px] font-bold text-slate-500 uppercase tracking-wider">Nama Perusahaan</label>
                <input type="text" name="company" id="company" value="{{ old('company') }}" required
                    class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-2xl text-xs font-semibold text-slate-700 focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500 transition"
                    placeholder="Contoh: PT Digital Nusantara">
                <x-input-error :messages="$errors->get('company')" class="mt-1 text-[10px] text-rose-500" />
            </div>

            <!-- Location -->
            <div class="space-y-1">
                <label for="location" class="text-[10px] font-bold text-slate-500 uppercase tracking-wider">Lokasi</label>
                <input type="text" name="location" id="location" value="{{ old('location') }}" required
                    class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-2xl text-xs font-semibold text-slate-700 focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500 transition"
                    placeholder="Contoh: Bandung, Jakarta (Hybrid)">
                <x-input-error :messages="$errors->get('location')" class="mt-1 text-[10px] text-rose-500" />
            </div>

            <!-- Deadline -->
            <div class="space-y-1">
                <label for="deadline" class="text-[10px] font-bold text-slate-500 uppercase tracking-wider">Tanggal Deadline</label>
                <input type="date" name="deadline" id="deadline" value="{{ old('deadline') }}" required
                    class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-2xl text-xs font-semibold text-slate-700 focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500 transition">
                <x-input-error :messages="$errors->get('deadline')" class="mt-1 text-[10px] text-rose-500" />
            </div>

            <!-- Description -->
            <div class="space-y-1">
                <label for="description" class="text-[10px] font-bold text-slate-500 uppercase tracking-wider">Deskripsi Pekerjaan</label>
                <textarea name="description" id="description" rows="5" required
                    class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-2xl text-xs font-semibold text-slate-700 focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500 transition resize-none"
                    placeholder="Tuliskan kualifikasi, deskripsi pekerjaan, dan benefit..."></textarea>
                <x-input-error :messages="$errors->get('description')" class="mt-1 text-[10px] text-rose-500" />
            </div>

            <!-- Submit Button -->
            <button type="submit" class="w-full py-3 bg-blue-600 hover:bg-blue-700 text-white font-bold rounded-2xl text-xs shadow-md shadow-blue-200 transition">
                Simpan Lowongan
            </button>
        </form>
    </div>
</x-mobile-layout>
