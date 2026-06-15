<x-app-layout>

    <div class="max-w-3xl mx-auto py-8">

        <h1 class="text-2xl font-bold mb-6">
            Tambah Lowongan
        </h1>

        <form action="/vacancies" method="POST">

            @csrf

            <div class="mb-4">
                <label>Judul Lowongan</label>
                <input type="text" name="title"
                    class="border w-full p-2 rounded">
            </div>

            <div class="mb-4">
                <label>Perusahaan</label>
                <input type="text" name="company"
                    class="border w-full p-2 rounded">
            </div>

            <div class="mb-4">
                <label>Lokasi</label>
                <input type="text" name="location"
                    class="border w-full p-2 rounded">
            </div>

            <div class="mb-4">
                <label>Deskripsi</label>
                <textarea name="description"
                    class="border w-full p-2 rounded"></textarea>
            </div>

            <div class="mb-4">
                <label>Deadline</label>
                <input type="date" name="deadline"
                    class="border w-full p-2 rounded">
            </div>

            <button
                class="bg-blue-500 text-white px-4 py-2 rounded">
                Simpan
            </button>

        </form>

    </div>

</x-app-layout>