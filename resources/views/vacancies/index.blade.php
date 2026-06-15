<x-app-layout>

    <div class="py-6">
        <div class="max-w-5xl mx-auto">

            <h1 class="text-3xl font-bold mb-6">
                CareerHub
            </h1>
            <a href="/vacancies/create"
   class="bg-blue-500 text-white px-4 py-2 rounded">
    + Tambah Lowongan
</a>
            @foreach($vacancies as $vacancy)
                <div class="bg-white shadow rounded-xl p-5 mb-4">

                    <h2 class="text-xl font-semibold">
                        {{ $vacancy->title }}
                    </h2>

                    <p class="text-gray-600">
                        {{ $vacancy->company }}
                    </p>

                    <p>
                        📍 {{ $vacancy->location }}
                    </p>

                    <p class="mt-2">
                        Deadline: {{ $vacancy->deadline }}
                    </p>

                </div>
            @endforeach

        </div>
    </div>

</x-app-layout>