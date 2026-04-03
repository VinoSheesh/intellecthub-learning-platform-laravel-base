<div class="font-poppins bg-background text-foreground min-h-screen p-6 lg:p-8">
    <!-- Breadcrumbs - keeping as requested -->
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
            <li>
                <div class="flex items-center">
                    <svg class="w-3 h-3 text-gray-400 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 9 4-4-4-4" />
                    </svg>
                    <span class="ml-1 text-sm font-medium text-gray-500 md:ml-2">{{ $course->title }}</span>
                </div>
            </li>
        </ol>
    </nav>

    <!-- Main Container -->
    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 pb-12">

        <!-- Course Hero Section -->
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 lg:p-8 mb-8">
            <div class="grid lg:grid-cols-3 gap-8 items-start">

                <!-- Course Image -->
                <div class="lg:col-span-1">
                    <div class="relative group">
                        <div class="aspect-[3/4] overflow-hidden rounded-xl bg-gray-100 shadow-sm">
                            <img src="/{{ $course->thumbnail }}" alt="{{ $course->title }}"
                                class="w-full h-full object-cover transition-transform duration-300 group-hover:scale-105">
                        </div>
                    </div>
                </div>

                <!-- Course Details -->
                <div class="lg:col-span-2 space-y-6">

                    <!-- Course Title & Description -->
                    <div>
                        <h1 class="text-2xl lg:text-3xl font-bold text-gray-900 leading-tight mb-4">
                            {{ $course->title }}
                        </h1>
                        <div class="text-gray-600 leading-relaxed text-base prose prose-lg max-w-none">
                            {!! $course->description !!}
                        </div>
                    </div>

                    <!-- Category & Stats Container -->
                    <div class="space-y-4">
                        <!-- Category -->
                        <div class="flex items-center gap-3">
                            <span class="text-sm font-medium text-gray-700">Kategori:</span>
                            <div
                                class="flex items-center gap-2 px-3 py-1.5 rounded-lg bg-blue-50 border border-blue-200">
                                <div class="w-2 h-2 bg-blue-500 rounded-full"></div>
                                <span class="text-sm font-medium text-blue-700">{{ $course->category->name }}</span>
                            </div>
                        </div>

                        <!-- Course Stats -->
                        <div class="grid grid-cols-2 gap-6">
                            <div class="flex items-center gap-3">
                                <div class="w-10 h-10 bg-blue-50 rounded-lg flex items-center justify-center">
                                    <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                </div>
                                <div>
                                    <p class="text-sm text-gray-500">Durasi</p>
                                    <p class="text-lg font-semibold text-gray-900">8 Minggu</p>
                                </div>
                            </div>
                            <div class="flex items-center gap-3">
                                <div class="w-10 h-10 bg-green-50 rounded-lg flex items-center justify-center">
                                    <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                </div>
                                <div>
                                    <p class="text-sm text-gray-500">Level</p>
                                    <p class="text-lg font-semibold text-gray-900">Pemula</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Action Buttons -->
                    <div class="flex flex-col sm:flex-row gap-3 pt-4">
                        @if($isSubscribed)
                            @if($course->is_published)
                                <button wire:click="startCourse"
                                    wire:loading.attr="disabled"
                                    class="flex-1 bg-blue-600 hover:bg-blue-700 text-white font-medium py-3 px-5 rounded-lg transition-all duration-200 shadow-sm hover:shadow-md transform hover:scale-[1.01] active:scale-[0.99] disabled:opacity-50">
                                    <span class="flex items-center justify-center gap-2" wire:loading.remove wire:target="startCourse">
                                        <i class="fas fa-play-circle"></i>
                                        <span class="text-sm font-medium">{{ $enrollment ? 'Lanjut Belajar' : 'Mulai Belajar' }}</span>
                                    </span>
                                    <span class="flex items-center justify-center gap-2" wire:loading wire:target="startCourse">
                                        <i class="fas fa-spinner fa-spin"></i>
                                        <span class="text-sm font-medium">Memuat...</span>
                                    </span>
                                </button>
                            @else
                                <button disabled
                                    class="flex-1 bg-gray-500 text-white font-medium py-3 px-5 rounded-lg transition-all duration-200 shadow-sm cursor-not-allowed flex items-center justify-center gap-2 opacity-80">
                                    <i class="fas fa-lock"></i>
                                    <span class="text-sm font-medium">Kursus Sedang Diarsipkan (Draft)</span>
                                </button>
                            @endif
                        @else
                            <a href="{{ route('subscriptionplan') }}"
                                class="flex-1 bg-amber-500 hover:bg-amber-600 text-white font-medium py-3 px-5 rounded-lg transition-all duration-200 shadow-sm text-center">
                                <span class="flex items-center justify-center gap-2">
                                    <i class="fas fa-lock"></i>
                                    <span class="text-sm font-medium">Berlangganan untuk Akses</span>
                                </span>
                            </a>
                        @endif

                        <!-- Favorite Button -->
                        <button wire:click="toggleFavorite"
                            class="flex-shrink-0 flex items-center justify-center gap-2 {{ $isFavorite ? 'bg-rose-50 hover:bg-rose-100 text-rose-500 border-rose-200' : 'bg-white hover:bg-gray-50 text-gray-600 border-gray-200' }} border font-medium py-3 px-5 rounded-lg transition-all duration-200 shadow-sm hover:shadow-md transform hover:scale-[1.01] active:scale-[0.99]">
                            <i class="{{ $isFavorite ? 'fa-solid text-red-500' : 'fa-regular' }} fa-heart text-lg"></i>
                            <span class="text-sm font-medium">{{ $isFavorite ? 'Difavoritkan' : 'Tambah Favorit' }}</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Learning Outcomes Section -->
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 lg:p-8 mb-8">
            <div class="flex items-center gap-3 mb-8">
                <div class="w-12 h-12 bg-blue-100 rounded-xl flex items-center justify-center">
                    <i class="fa-solid fa-lightbulb text-blue-600"></i>
                </div>
                <h2 class="text-2xl font-bold text-gray-900">Yang Akan Anda Pelajari</h2>
            </div>

            <div class="grid sm:grid-cols-2 gap-6">
                <div
                    class="flex items-start gap-4 p-5 rounded-xl bg-gray-50 border border-gray-100 hover:shadow-md transition-shadow duration-200">
                    <div
                        class="flex-shrink-0 w-8 h-8 bg-green-100 rounded-full flex items-center justify-center mt-0.5">
                        <svg class="w-4 h-4 text-green-600" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7">
                            </path>
                        </svg>
                    </div>
                    <div>
                        <h3 class="font-semibold text-gray-900 mb-2">Konsep Dasar</h3>
                        <p class="text-gray-600 text-sm leading-relaxed">Memahami fundamental dan prinsip-prinsip dasar
                        </p>
                    </div>
                </div>

                <div
                    class="flex items-start gap-4 p-5 rounded-xl bg-gray-50 border border-gray-100 hover:shadow-md transition-shadow duration-200">
                    <div
                        class="flex-shrink-0 w-8 h-8 bg-green-100 rounded-full flex items-center justify-center mt-0.5">
                        <svg class="w-4 h-4 text-green-600" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7">
                            </path>
                        </svg>
                    </div>
                    <div>
                        <h3 class="font-semibold text-gray-900 mb-2">Praktik Langsung</h3>
                        <p class="text-gray-600 text-sm leading-relaxed">Implementasi nyata melalui project-based
                            learning</p>
                    </div>
                </div>

                <div
                    class="flex items-start gap-4 p-5 rounded-xl bg-gray-50 border border-gray-100 hover:shadow-md transition-shadow duration-200">
                    <div
                        class="flex-shrink-0 w-8 h-8 bg-green-100 rounded-full flex items-center justify-center mt-0.5">
                        <svg class="w-4 h-4 text-green-600" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7">
                            </path>
                        </svg>
                    </div>
                    <div>
                        <h3 class="font-semibold text-gray-900 mb-2">Tools & Framework</h3>
                        <p class="text-gray-600 text-sm leading-relaxed">Menguasai tools dan framework yang digunakan
                            di industri</p>
                    </div>
                </div>

                <div
                    class="flex items-start gap-4 p-5 rounded-xl bg-gray-50 border border-gray-100 hover:shadow-md transition-shadow duration-200">
                    <div
                        class="flex-shrink-0 w-8 h-8 bg-green-100 rounded-full flex items-center justify-center mt-0.5">
                        <svg class="w-4 h-4 text-green-600" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7">
                            </path>
                        </svg>
                    </div>
                    <div>
                        <h3 class="font-semibold text-gray-900 mb-2">Portfolio Project</h3>
                        <p class="text-gray-600 text-sm leading-relaxed">Membuat project portfolio yang siap untuk
                            industri</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Course Curriculum Section -->
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 lg:p-8 mb-8">
            <div class="flex items-center justify-between mb-6">
                <div class="flex items-center gap-3">
                    <div class="w-12 h-12 bg-purple-100 rounded-xl flex items-center justify-center">
                        <i class="fa-solid fa-clipboard-list text-purple-700"></i>
                    </div>
                    <div>
                        <h2 class="text-2xl font-bold text-gray-900">Lesson</h2>
                        <p class="text-sm text-gray-500">{{ $lessons->count() }} Lesson tersedia</p>
                    </div>
                </div>
                @if($enrollment)
                    <div class="text-right">
                        <p class="text-sm font-semibold text-gray-700">{{ $progress }}% Selesai</p>
                        <div class="w-36 bg-gray-200 rounded-full h-2 mt-1">
                            <div class="bg-blue-600 h-2 rounded-full transition-all duration-500" style="width: {{ $progress }}%"></div>
                        </div>
                    </div>
                @endif
            </div>

            @if($enrollment && $progress >= 100)
            <div class="mb-6 bg-yellow-50 border border-yellow-200 rounded-xl p-4 flex items-center justify-between gap-4">
                <div class="flex items-center gap-3">
                    <i class="fas fa-award text-yellow-500 text-2xl"></i>
                    <div>
                        <p class="font-semibold text-gray-900">Kursus Selesai! 🎉</p>
                        <p class="text-sm text-gray-600">Unduh sertifikat penyelesaianmu.</p>
                    </div>
                </div>
                <a href="{{ route('certificate.download', $course->id) }}"
                   class="flex-shrink-0 inline-flex items-center gap-2 px-4 py-2 bg-yellow-500 hover:bg-yellow-600 text-white font-semibold rounded-lg text-sm transition">
                    <i class="fas fa-download"></i> Unduh
                </a>
            </div>
            @endif

            <div class="space-y-3">
                @forelse($lessons as $index => $lesson)
                    @php
                        $isDone = in_array($lesson->id, $completedLessonIds);
                        $locked = !$isSubscribed;
                    @endphp
                    <div class="border border-gray-200 rounded-xl p-4 flex items-center gap-4 hover:shadow-sm transition-shadow duration-200 {{ $isDone ? 'bg-green-50 border-green-200' : '' }}">
                        <!-- Status Icon -->
                        <div class="flex-shrink-0 w-10 h-10 rounded-full flex items-center justify-center
                            {{ $isDone ? 'bg-green-100' : ($locked ? 'bg-gray-100' : 'bg-blue-50') }}">
                            @if($locked)
                                <i class="fas fa-lock text-gray-400"></i>
                            @elseif($isDone)
                                <i class="fas fa-check-circle text-green-600"></i>
                            @else
                                <i class="far fa-circle text-blue-400"></i>
                            @endif
                        </div>
                        <!-- Lesson Info -->
                        <div class="flex-1 min-w-0">
                            <p class="text-xs text-gray-400 mb-0.5">Lesson {{ $index + 1 }}</p>
                            <p class="font-semibold text-gray-900 truncate">{{ $lesson->title }}</p>
                        </div>
                        <!-- Badge -->
                        <div class="flex-shrink-0">
                            @if($isDone)
                                <span class="px-3 py-1 bg-green-100 text-green-700 text-xs font-medium rounded-full">Selesai</span>
                            @elseif($locked)
                                <span class="px-3 py-1 bg-gray-100 text-gray-500 text-xs font-medium rounded-full">Terkunci</span>
                            @else
                                <span class="px-3 py-1 bg-blue-100 text-blue-700 text-xs font-medium rounded-full">Tersedia</span>
                            @endif
                        </div>
                    </div>
                @empty
                    <div class="text-center py-10">
                        <i class="fas fa-folder-open text-4xl text-gray-300 mb-3 block"></i>
                        <p class="text-gray-500">Belum ada lesson tersedia.</p>
                    </div>
                @endforelse
            </div>
        </div>

        <!-- Requirements Section -->
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 lg:p-8 mb-8">
            <div class="flex items-center gap-3 mb-8">
                <div class="w-12 h-12 bg-red-100 rounded-xl flex items-center justify-center">
                    <i class="fa-solid fa-microchip text-red-900"></i>
                </div>
                <h2 class="text-2xl font-bold text-gray-900">Persyaratan</h2>
            </div>

            <div class="space-y-4">
                <div class="flex items-start gap-4">
                    <div class="w-2 h-2 bg-gray-400 rounded-full mt-2.5 flex-shrink-0"></div>
                    <p class="text-gray-700">Tidak memerlukan pengalaman sebelumnya dalam bidang ini</p>
                </div>
                <div class="flex items-start gap-4">
                    <div class="w-2 h-2 bg-gray-400 rounded-full mt-2.5 flex-shrink-0"></div>
                    <p class="text-gray-700">Komputer/laptop dengan spesifikasi minimal RAM 4GB</p>
                </div>
                <div class="flex items-start gap-4">
                    <div class="w-2 h-2 bg-gray-400 rounded-full mt-2.5 flex-shrink-0"></div>
                    <p class="text-gray-700">Koneksi internet yang stabil untuk mengikuti video pembelajaran</p>
                </div>
                <div class="flex items-start gap-4">
                    <div class="w-2 h-2 bg-gray-400 rounded-full mt-2.5 flex-shrink-0"></div>
                    <p class="text-gray-700">Motivasi dan dedikasi untuk belajar secara konsisten</p>
                </div>
            </div>
        </div>

        <!-- Instructor Section -->
        {{-- <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 lg:p-8">
            <div class="flex items-center gap-3 mb-8">
                <div class="w-12 h-12 bg-yellow-100 rounded-xl flex items-center justify-center">
                    <svg class="w-6 h-6 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                    </svg>
                </div>
                <h2 class="text-2xl font-bold text-gray-900">Instruktur</h2>
            </div> --}}

        {{-- <div class="flex items-start gap-6">
                <div class="w-20 h-20 bg-gray-200 rounded-xl flex-shrink-0 overflow-hidden">
                    <img src="/api/placeholder/80/80" alt="Instructor" class="w-full h-full object-cover">
                </div>
                <div class="flex-1">
                    <h3 class="text-xl font-semibold text-gray-900 mb-2">John Doe</h3>
                    <p class="text-blue-600 font-medium mb-3">Senior Developer & Tech Educator</p>
                    <p class="text-gray-600 leading-relaxed mb-4">Dengan pengalaman 8+ tahun di industri teknologi dan telah mengajar 10,000+ siswa. Spesialisasi dalam web development dan telah bekerja di berbagai startup dan perusahaan teknologi terkemuka.</p>
                    
                    <div class="flex items-center gap-6 text-sm text-gray-500">
                        <span class="flex items-center gap-2">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0z"></path>
                            </svg>
                            15,240 Siswa
                        </span>
                        <span class="flex items-center gap-2">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            4.8/5 Rating
                        </span>
                        <span class="flex items-center gap-2">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                            </svg>
                            25 Courses
                        </span>
                    </div>
                </div>
            </div> --}}
    </div>
</div>
