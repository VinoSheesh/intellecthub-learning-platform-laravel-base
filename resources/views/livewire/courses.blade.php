<div class="min-h-screen font-poppins">
    <!-- Added breadcrumbs navigation -->
    <nav class="flex mb-6" aria-label="Breadcrumb">
        <ol class="inline-flex items-center space-x-1 md:space-x-3">
            <li class="inline-flex items-center">
                <a href="{{ route('allcourse') }}"
                    class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600">
                    <svg class="w-3 h-3 mr-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                        viewBox="0 0 20 20">
                        <path
                            d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L9 3.414V19a1 1 0 0 0 2 0V3.414l7.293 7.293a1 1 0 0 0 1.414-1.414Z" />
                    </svg>
                    Kursus
                </a>
            </li>
            <li>
                <div class="flex items-center">
                    <svg class="w-3 h-3 text-gray-400 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 9 4-4-4-4" />
                    </svg>
                    <span class="ml-1 text-sm font-medium text-gray-500 md:ml-2">Semua Kursus</span>
                </div>
            </li>
        </ol>
    </nav>

    <!-- Redesigned header with search and filter on the right -->
    <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between mb-8">
        <div class="mb-4 lg:mb-0">
            <h1 class="text-4xl text-gray-800 font-bold mb-2">Semua Kursus</h1>
            <p class="text-gray-600">Cari kursus yang anda inginkan</p>
        </div>

        <!-- Search and filter moved to right side with improved styling -->
        <div class="flex items-center gap-3">
            <!-- Search Input -->
            <div class="relative">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <svg class="w-4 h-4 text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        fill="none" viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                    </svg>
                </div>
                <input type="text" wire:model.live.debounce.300ms="search"
                    class="w-64 pl-10 pr-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent bg-white text-gray-800"
                    placeholder="Cari kursus...">
            </div>

            <!-- Category filter changed to filter icon with blue background -->
            <div class="relative" x-data="{ open: false }">
                <button @click="open = !open"
                    class="flex items-center justify-center w-11 h-11 bg-blue-600 hover:bg-blue-700 text-white rounded-lg transition-colors duration-200 focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                    <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M7.75 4H19M7.75 4a2.25 2.25 0 0 1-4.5 0m4.5 0a2.25 2.25 0 0 0-4.5 0M1 4h2.25m13.5 6H19m-2.25 0a2.25 2.25 0 0 1-4.5 0m4.5 0a2.25 2.25 0 0 0-4.5 0M1 10h11.25m-4.5 6H19M7.75 16a2.25 2.25 0 0 1-4.5 0m4.5 0a2.25 2.25 0 0 0-4.5 0M1 16h2.25" />
                    </svg>
                </button>

                <div x-show="open" @click.away="open = false" x-transition
                    class="absolute right-0 mt-2 w-48 bg-white rounded-lg shadow-lg border border-gray-200 z-10">
                    <div class="py-1">
                        <button wire:click="$set('category', '')" @click="open = false"
                            class="block w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                            Semua Kategori
                        </button>
                        @foreach ($categories as $cat)
                            <button wire:click="$set('category', '{{ $cat->id }}')" @click="open = false"
                                class="block w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                {{ $cat->name }}
                            </button>
                        @endforeach
                    </div>
                </div>

            </div>

            @can('tambah-course')
                <a href="{{ route('createcourse') }}"
                    class="flex items-center px-4 py-2 h-11 bg-blue-600 hover:bg-blue-700  text-white rounded-lg font-semibold transition-all duration-200">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                    </svg>
                    Tambah Kursus
                </a>
            @endcan

        </div>
    </div>

    <!-- Enhanced card grid with more attractive and interactive design -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        @foreach ($courses as $course)
            <div
                class="group bg-white rounded-2xl shadow-sm hover:shadow-2xl transition-all duration-500 overflow-hidden border border-gray-100 hover:border-blue-200 hover:-translate-y-2 cursor-pointer">
                <!-- Enhanced image container with overlay effects -->
                <div class="relative overflow-hidden">
                    <img src="/{{ $course->thumbnail }}" alt="{{ $course->title }}"
                        class="w-full h-52 object-cover group-hover:scale-110 transition-transform duration-700">

                    <!-- Added gradient overlay for better text readability -->
                    <div
                        class="absolute inset-0 bg-gradient-to-t from-black/20 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                    </div>

                    <!-- Enhanced category badge with animation -->
                    <div
                        class="absolute top-4 left-4 transform group-hover:scale-105 transition-transform duration-300">
                        <span
                            class="inline-flex items-center px-3 py-1.5 rounded-full text-xs font-semibold bg-white/95 text-gray-700 shadow-lg backdrop-blur-sm border border-white/20">
                            {{ $course->category->name }}
                        </span>
                    </div>

                    <!-- Added floating action button -->
                    <div
                        class="absolute top-4 right-4 opacity-0 group-hover:opacity-100 transform translate-y-2 group-hover:translate-y-0 transition-all duration-300">
                        <button
                            class="w-10 h-10 bg-white/90 hover:bg-white text-gray-700 rounded-full shadow-lg backdrop-blur-sm flex items-center justify-center transition-colors duration-200">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z">
                                </path>
                            </svg>
                        </button>
                    </div>

                    <!-- Added progress indicator -->
                    <div class="absolute bottom-0 left-0 right-0 h-1 bg-gray-200">
                        <div class="h-full bg-blue-500 transition-all duration-500 group-hover:bg-blue-400"
                            style="width: {{ rand(20, 80) }}%"></div>
                    </div>
                </div>

                <!-- Enhanced card content with better typography and spacing -->
                <div class="p-6 space-y-4">
                    <!-- Added instructor info -->


                    <h2
                        class="text-xl font-bold text-gray-900 group-hover:text-blue-600 transition-colors duration-300 line-clamp-2">
                        {{ $course->title }}
                    </h2>

                    <p class="text-gray-600 text-sm leading-relaxed line-clamp-3">
                        {{ Str::limit($course->description, 120) }}
                    </p>

                    <!-- Enhanced price and action section -->
                    <div class="flex items-center justify-between pt-4 border-t border-gray-100 group">

                        <a href="{{ route('showcourse', ['id' => $course->id]) }}" wire:navigate
                            class="px-6 py-2.5 bg-blue-600 hover:bg-blue-700 text-white text-sm font-semibold rounded-xl transition-all duration-300 shadow-lg hover:shadow-xl hover:scale-105">
                            Lihat
                        </a>
                    </div>

                </div>

                <!-- Added subtle glow effect on hover -->
                <div
                    class="absolute inset-0 rounded-2xl opacity-0 group-hover:opacity-100 transition-opacity duration-500 pointer-events-none">
                    <div class="absolute inset-0 rounded-2xl shadow-2xl shadow-blue-500/10"></div>
                </div>
            </div>
        @endforeach
    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @if (session('success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Berhasil!',
                text: '{{ session('success') }}',
                showConfirmButton: false,
                timer: 2000
            })
        </script>
    @endif
</div>
