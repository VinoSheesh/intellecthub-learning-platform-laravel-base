<div class="font-poppins bg-background text-foreground min-h-screen">
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
                        <p class="text-gray-600 leading-relaxed text-base">
                            {{ $course->description }}
                        </p>
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
                        <button
                            class="flex-1 bg-blue-600 hover:bg-blue-700 text-white font-medium py-3 px-5 rounded-lg transition-all duration-200 shadow-sm hover:shadow-md transform hover:scale-[1.01] active:scale-[0.99]">
                            <span class="flex items-center justify-center gap-2">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M14.828 14.828a4 4 0 01-5.656 0M9 10h1m4 0h1m-6 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z">
                                    </path>
                                </svg>
                                <span class="text-sm font-medium">Mulai Belajar</span>
                            </span>
                        </button>
                        <button
                            class="sm:w-auto bg-white hover:bg-gray-50 text-gray-700 font-medium py-3 px-5 rounded-lg border border-gray-300 hover:border-gray-400 transition-all duration-200 transform hover:scale-[1.01] active:scale-[0.99]">
                            <span class="flex items-center justify-center gap-2">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z">
                                    </path>
                                </svg>
                                <span class="text-sm font-medium">Simpan</span>
                            </span>
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Learning Outcomes Section -->
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 lg:p-8 mb-8">
            <div class="flex items-center gap-3 mb-8">
                <div class="w-12 h-12 bg-blue-100 rounded-xl flex items-center justify-center">
                    <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z">
                        </path>
                    </svg>
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
            <div class="flex items-center gap-3 mb-8">
                <div class="w-12 h-12 bg-purple-100 rounded-xl flex items-center justify-center">
                    <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 5H7a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2">
                        </path>
                    </svg>
                </div>
                <h2 class="text-2xl font-bold text-gray-900">Kurikulum Kursus</h2>
            </div>

            <div class="space-y-4">
                <div class="border border-gray-200 rounded-xl p-5 hover:shadow-md transition-shadow duration-200">
                    <div class="flex items-center justify-between mb-3">
                        <h3 class="text-lg font-semibold text-gray-900">Week 1-2: Pengenalan & Setup</h3>
                        <span class="bg-blue-100 text-blue-700 text-sm font-medium px-3 py-1 rounded-full">4
                            Lessons</span>
                    </div>
                    <p class="text-gray-600 mb-3">Memahami konsep dasar, setup environment, dan tools yang diperlukan
                    </p>
                    <div class="flex items-center gap-4 text-sm text-gray-500">
                        <span class="flex items-center gap-1">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            3.5 jam
                        </span>
                        <span class="flex items-center gap-1">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                                </path>
                            </svg>
                            2 Assignment
                        </span>
                    </div>
                </div>

                <div class="border border-gray-200 rounded-xl p-5 hover:shadow-md transition-shadow duration-200">
                    <div class="flex items-center justify-between mb-3">
                        <h3 class="text-lg font-semibold text-gray-900">Week 3-4: Fundamental Skills</h3>
                        <span class="bg-green-100 text-green-700 text-sm font-medium px-3 py-1 rounded-full">6
                            Lessons</span>
                    </div>
                    <p class="text-gray-600 mb-3">Mendalami skill fundamental dan best practices dalam development</p>
                    <div class="flex items-center gap-4 text-sm text-gray-500">
                        <span class="flex items-center gap-1">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            5.2 jam
                        </span>
                        <span class="flex items-center gap-1">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                                </path>
                            </svg>
                            3 Assignment
                        </span>
                    </div>
                </div>

                <div class="border border-gray-200 rounded-xl p-5 hover:shadow-md transition-shadow duration-200">
                    <div class="flex items-center justify-between mb-3">
                        <h3 class="text-lg font-semibold text-gray-900">Week 5-8: Advanced & Final Project</h3>
                        <span class="bg-orange-100 text-orange-700 text-sm font-medium px-3 py-1 rounded-full">8
                            Lessons</span>
                    </div>
                    <p class="text-gray-600 mb-3">Teknik advanced, optimasi, dan pengembangan final project portfolio
                    </p>
                    <div class="flex items-center gap-4 text-sm text-gray-500">
                        <span class="flex items-center gap-1">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            8.5 jam
                        </span>
                        <span class="flex items-center gap-1">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10">
                                </path>
                            </svg>
                            Final Project
                        </span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Requirements Section -->
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 lg:p-8 mb-8">
            <div class="flex items-center gap-3 mb-8">
                <div class="w-12 h-12 bg-red-100 rounded-xl flex items-center justify-center">
                    <i class="fa-solid fa-microchip text-gray-600"></i>
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
</div>
