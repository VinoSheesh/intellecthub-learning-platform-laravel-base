<div>
    <h1 class="text-4xl text-gray-600 font-bold">Semua Kursus</h1>

    <div class="w-full grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mt-6">
        @foreach ($courses as $course)
            <div
                class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow hover:shadow-lg transition-shadow duration-300 group">
                <img src="{{ $course->thumbnail }}" alt="{{ $course->title }}"
                    class="w-full h-40 object-cover rounded-md mb-4 group-hover:scale-105 transition-transform duration-300">
                <h2 class="text-xl font-semibold text-gray-800 dark:text-gray-200 mb-2">{{ $course->title }}</h2>
                <p class="text-gray-600 dark:text-gray-400">{{ Str::limit($course->description, 100) }}</p>
                <p class="text-green-500">Rp{{ $course->price }}</p>
            </div>
        @endforeach

    </div>
</div>
