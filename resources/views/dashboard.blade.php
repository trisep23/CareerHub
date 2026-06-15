<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            CareerHub
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white shadow-sm rounded-lg p-6 mb-6">
                <h1 class="text-2xl font-bold mb-2">
                    Selamat Datang di CareerHub
                </h1>

                <p class="text-gray-600">
                    Temukan lowongan kerja dan magang terbaik untuk mahasiswa.
                </p>
            </div>

            <div class="bg-white shadow-sm rounded-lg p-6">
                <h2 class="text-xl font-semibold mb-4">
                    Menu Utama
                </h2>

                <div class="grid md:grid-cols-2 gap-4">

                    <a href="/vacancies"
                       class="block p-4 border rounded-lg hover:bg-gray-100">
                        📄 Daftar Lowongan
                    </a>

                    <a href="#"
                       class="block p-4 border rounded-lg hover:bg-gray-100">
                        🔍 Cari Lowongan
                    </a>

                    <a href="#"
                       class="block p-4 border rounded-lg hover:bg-gray-100">
                        🏢 Lowongan Magang
                    </a>

                    <a href="/profile"
                       class="block p-4 border rounded-lg hover:bg-gray-100">
                        👤 Profil Saya
                    </a>

                </div>
            </div>

        </div>
    </div>
</x-app-layout>