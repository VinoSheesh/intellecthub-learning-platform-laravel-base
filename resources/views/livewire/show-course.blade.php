<div class="w-full min-h-screen font-poppins bg-white py-6 lg:py-10">

    <!-- Main Container -->
    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 pb-12">

        <!-- Course Hero Section -->
        <div class="bg-white rounded-3xl shadow-[0_2px_10px_-3px_rgba(6,81,237,0.1)] border border-slate-100 p-5 sm:p-8 mb-8 relative overflow-hidden">
            <!-- Decorative Accent -->
            <div class="absolute top-0 right-0 w-64 h-64 bg-blue-50 rounded-full blur-[80px] pointer-events-none -mr-20 -mt-20"></div>

            <div class="grid md:grid-cols-12 gap-8 items-start relative z-10"> <!-- Switched to md:grid-cols-12 for better control -->

                <!-- Course Image -->
                <div class="md:col-span-5 lg:col-span-4 w-full"> 
                    <div class="relative group w-full">
                        <div class="w-full aspect-[4/3] md:aspect-[3/4] overflow-hidden rounded-2xl bg-slate-100 shadow-sm border border-slate-100/50">
                            <img src="/{{ $course->thumbnail }}" alt="{{ $course->title }}"
                                class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105">
                        </div>
                    </div>
                </div>

                <!-- Course Details -->
                <div class="md:col-span-7 lg:col-span-8 space-y-6 sm:space-y-8">

                    <!-- Course Title & Description -->
                    <div class="space-y-3 sm:space-y-4">
                        <h1 class="text-2xl sm:text-3xl lg:text-4xl font-extrabold text-slate-800 leading-tight tracking-tight">
                            {{ $course->title }}
                        </h1>
                        <div class="text-slate-500 leading-relaxed text-sm sm:text-base prose prose-slate max-w-none">
                            {!! $course->description !!}
                        </div>
                    </div>

                    <!-- Category & Stats Container -->
                    <div class="flex flex-col sm:flex-row gap-5 sm:gap-8 border-y border-slate-100 py-5">
                        <!-- Category -->
                        <div class="flex-1">
                            <p class="text-[11px] font-bold text-slate-400 tracking-wider uppercase mb-2">Kategori</p>
                            <div class="inline-flex items-center gap-2 px-3 py-1.5 rounded-lg bg-blue-50 border border-blue-100 transition-colors hover:bg-blue-100">
                                <div class="w-1.5 h-1.5 bg-blue-600 rounded-full animate-pulse"></div>
                                <span class="text-xs sm:text-sm font-bold text-blue-700">{{ $course->category->name }}</span>
                            </div>
                        </div>

                        <!-- Divider on mobile only -->
                        <div class="w-full h-px bg-slate-100 sm:hidden"></div>

                        <!-- Course Stats -->
                        <div class="flex-1 grid grid-cols-1 gap-4">
                            <div>
                                <p class="text-[11px] font-bold text-slate-400 tracking-wider uppercase mb-2">Durasi</p>
                                <div class="flex items-center gap-2.5">
                                    <div class="flex-shrink-0 w-8 h-8 rounded-full bg-slate-50 flex items-center justify-center border border-slate-100">
                                        <i class="fas fa-clock text-slate-500 text-xs"></i>
                                    </div>
                                    <p class="text-sm sm:text-base font-bold text-slate-700">8 Minggu</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Action Buttons -->
                    <div class="flex flex-col sm:flex-row gap-3 pt-2">
                        @if($isSubscribed)
                            @if($course->is_published)
                                <button wire:click="startCourse"
                                    wire:loading.attr="disabled"
                                    class="flex-1 bg-blue-600 hover:bg-blue-700 text-white font-semibold py-3.5 px-6 rounded-xl transition-all duration-300 shadow-[0_4px_14px_0_rgba(37,99,235,0.2)] hover:shadow-[0_6px_20px_rgba(37,99,235,0.23)] hover:-translate-y-0.5 disabled:opacity-50 disabled:hover:translate-y-0 disabled:hover:shadow-none">
                                    <span class="flex items-center justify-center gap-2" wire:loading.remove wire:target="startCourse">
                                        <i class="fas fa-play"></i>
                                        <span class="text-sm">{{ $enrollment ? 'Lanjut Belajar' : 'Mulai Belajar' }}</span>
                                    </span>
                                    <span class="flex items-center justify-center gap-2" wire:loading wire:target="startCourse">
                                        <i class="fas fa-circle-notch fa-spin"></i>
                                        <span class="text-sm">Memuat...</span>
                                    </span>
                                </button>
                            @else
                                <button disabled
                                    class="flex-1 bg-slate-100 text-slate-400 font-semibold py-3.5 px-6 rounded-xl transition-all duration-200 cursor-not-allowed flex items-center justify-center gap-2 border border-slate-200">
                                    <i class="fas fa-lock"></i>
                                    <span class="text-sm">Kursus Diarsipkan</span>
                                </button>
                            @endif
                        @else
                            <a href="{{ route('subscriptionplan') }}"
                                class="flex-1 bg-amber-500 hover:bg-amber-600 text-white font-semibold py-3.5 px-6 rounded-xl transition-all duration-300 shadow-[0_4px_14px_0_rgba(245,158,11,0.2)] hover:shadow-[0_6px_20px_rgba(245,158,11,0.23)] hover:-translate-y-0.5 text-center flex items-center justify-center gap-2">
                                <i class="fas fa-unlock-alt"></i>
                                <span class="text-sm">Berlangganan untuk Akses</span>
                            </a>
                        @endif

                        <!-- Favorite Button -->
                        <button wire:click.prevent="toggleFavorite"
                            class="flex-shrink-0 flex items-center justify-center gap-2.5 {{ $isFavorite ? 'bg-rose-50 hover:bg-rose-100 text-rose-500 border-rose-200' : 'bg-white hover:bg-slate-50 text-slate-600 border-slate-200' }} border-2 font-bold py-3 px-6 rounded-xl transition-all duration-300 hover:shadow-sm active:scale-[0.98]">
                            @if($isFavorite)
                                <i class="fa-solid fa-heart text-rose-500 text-lg"></i>
                                <span class="text-sm sm:hidden">Difavoritkan</span>
                            @else
                                <i class="fa-regular fa-heart text-lg"></i>
                                <span class="text-sm sm:hidden">Simpan</span>
                            @endif
                            <span class="text-sm hidden sm:block">{{ $isFavorite ? 'Difavoritkan' : 'Simpan Kursus' }}</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Learning Outcomes Section -->
        <div class="bg-white rounded-3xl shadow-[0_2px_10px_-3px_rgba(6,81,237,0.1)] border border-slate-100 p-6 lg:p-8 mb-8">
            <div class="flex items-center gap-3 sm:gap-4 mb-6 sm:mb-8">
                <div class="w-10 h-10 sm:w-12 sm:h-12 bg-blue-50 text-blue-600 rounded-xl flex items-center justify-center text-lg sm:text-xl border border-blue-100/50">
                    <i class="fa-solid fa-lightbulb"></i>
                </div>
                <h2 class="text-xl sm:text-2xl font-extrabold text-slate-800">Yang Akan Anda Pelajari</h2>
            </div>

            <div class="grid sm:grid-cols-2 gap-4 sm:gap-6">
                <div class="flex items-start gap-4 p-4 sm:p-5 rounded-2xl bg-white border border-slate-100 hover:border-blue-100 hover:shadow-md transition-all duration-300 group">
                    <div class="flex-shrink-0 w-8 h-8 sm:w-10 sm:h-10 bg-emerald-50 rounded-full flex items-center justify-center group-hover:bg-emerald-100 transition-colors">
                        <i class="fas fa-check text-emerald-500 text-sm"></i>
                    </div>
                    <div>
                        <h3 class="font-bold text-slate-800 mb-1.5 text-sm sm:text-base">Konsep Dasar</h3>
                        <p class="text-slate-500 text-xs sm:text-sm leading-relaxed">Memahami fundamental dan prinsip-prinsip dasar dunia industri terkini.</p>
                    </div>
                </div>

                <div class="flex items-start gap-4 p-4 sm:p-5 rounded-2xl bg-white border border-slate-100 hover:border-blue-100 hover:shadow-md transition-all duration-300 group">
                    <div class="flex-shrink-0 w-8 h-8 sm:w-10 sm:h-10 bg-emerald-50 rounded-full flex items-center justify-center group-hover:bg-emerald-100 transition-colors">
                        <i class="fas fa-check text-emerald-500 text-sm"></i>
                    </div>
                    <div>
                        <h3 class="font-bold text-slate-800 mb-1.5 text-sm sm:text-base">Praktik Langsung</h3>
                        <p class="text-slate-500 text-xs sm:text-sm leading-relaxed">Implementasi nyata project-based untuk melatih intuisi logic Anda.</p>
                    </div>
                </div>

                <div class="flex items-start gap-4 p-4 sm:p-5 rounded-2xl bg-white border border-slate-100 hover:border-blue-100 hover:shadow-md transition-all duration-300 group">
                    <div class="flex-shrink-0 w-8 h-8 sm:w-10 sm:h-10 bg-emerald-50 rounded-full flex items-center justify-center group-hover:bg-emerald-100 transition-colors">
                        <i class="fas fa-check text-emerald-500 text-sm"></i>
                    </div>
                    <div>
                        <h3 class="font-bold text-slate-800 mb-1.5 text-sm sm:text-base">Tools & Framework</h3>
                        <p class="text-slate-500 text-xs sm:text-sm leading-relaxed">Menguasai tools modern dan best practices dari profesional.</p>
                    </div>
                </div>

                <div class="flex items-start gap-4 p-4 sm:p-5 rounded-2xl bg-white border border-slate-100 hover:border-blue-100 hover:shadow-md transition-all duration-300 group">
                    <div class="flex-shrink-0 w-8 h-8 sm:w-10 sm:h-10 bg-emerald-50 rounded-full flex items-center justify-center group-hover:bg-emerald-100 transition-colors">
                        <i class="fas fa-check text-emerald-500 text-sm"></i>
                    </div>
                    <div>
                        <h3 class="font-bold text-slate-800 mb-1.5 text-sm sm:text-base">Portfolio Unggulan</h3>
                        <p class="text-slate-500 text-xs sm:text-sm leading-relaxed">Menghasilkan karya yang menonjol untuk dilirik HRD / Recruiter.</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Course Curriculum Section -->
        <div class="bg-white rounded-3xl shadow-[0_2px_10px_-3px_rgba(6,81,237,0.1)] border border-slate-100 p-6 lg:p-8 mb-8">
            <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 mb-6 sm:mb-8">
                <div class="flex items-center gap-3 sm:gap-4">
                    <div class="w-10 h-10 sm:w-12 sm:h-12 bg-indigo-50 text-indigo-600 rounded-xl flex items-center justify-center text-lg sm:text-xl border border-indigo-100/50">
                        <i class="fa-solid fa-list-ul border-indigo-100/50"></i>
                    </div>
                    <div>
                        <h2 class="text-xl sm:text-2xl font-extrabold text-slate-800">Kurikulum Lesson</h2>
                        <p class="text-xs sm:text-sm text-slate-500 font-medium mt-0.5">{{ $lessons->count() }} Modul tersedia</p>
                    </div>
                </div>

                @if($enrollment)
                    <div class="w-full sm:w-auto bg-slate-50 p-3 sm:p-0 sm:bg-transparent rounded-xl flex flex-col items-center sm:block">
                        <p class="text-xs sm:text-sm font-bold text-slate-700 sm:text-right w-full flex justify-between sm:block mb-1.5 sm:mb-1">
                            <span>Status Belajar</span>
                            <span class="sm:hidden text-blue-600">{{ $progress }}%</span>
                            <span class="hidden sm:inline">{{ $progress }}% Selesai</span>
                        </p>
                        <div class="w-full sm:w-40 bg-slate-200 rounded-full h-2 overflow-hidden">
                            <div class="bg-gradient-to-r from-blue-500 to-blue-600 h-2 rounded-full transition-all duration-700" style="width: {{ $progress }}%"></div>
                        </div>
                    </div>
                @endif
            </div>

            @if($enrollment && $progress >= 100)
            <div class="mb-6 bg-amber-50 border border-amber-200 rounded-2xl p-4 sm:px-6 flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4 shadow-sm shadow-amber-100/50">
                <div class="flex items-start sm:items-center gap-4">
                    <div class="flex-shrink-0 w-12 h-12 bg-amber-100 rounded-full flex items-center justify-center mt-1 sm:mt-0">
                        <i class="fas fa-trophy text-amber-500 text-xl"></i>
                    </div>
                    <div>
                        <p class="font-extrabold text-slate-800 text-base sm:text-lg tracking-tight">Luar Biasa! Kursus Selesai 🎉</p>
                        <p class="text-xs sm:text-sm text-slate-600 mt-0.5">Sertifikat kelulusan digitalmu sudah bisa diunduh.</p>
                    </div>
                </div>
                <a href="{{ route('certificate.download', $course->id) }}"
                   class="w-full sm:w-auto flex-shrink-0 flex items-center justify-center gap-2.5 px-6 py-3 bg-amber-500 hover:bg-amber-600 text-white font-bold rounded-xl text-sm shadow-[0_4px_12px_rgba(245,158,11,0.25)] hover:-translate-y-0.5 transition-all duration-300">
                    <i class="fas fa-file-download border-transparent border"></i> Unduh Sertifikat
                </a>
            </div>
            @endif

            <div class="space-y-3">
                @forelse($lessons as $index => $lesson)
                    @php
                        $isDone = in_array($lesson->id, $completedLessonIds);
                        $locked = !$isSubscribed;
                    @endphp
                    <div class="group border border-slate-100 rounded-2xl p-3 sm:p-4 flex items-center gap-3 sm:gap-4 hover:border-blue-100 hover:bg-blue-50/30 transition-all duration-300 {{ $isDone ? 'bg-emerald-50/40 border-emerald-100' : 'bg-white' }}">
                        <!-- Status Icon -->
                        <div class="flex-shrink-0 w-10 h-10 sm:w-12 sm:h-12 rounded-full flex items-center justify-center shadow-sm border border-transparent
                            {{ $isDone ? 'bg-emerald-100 text-emerald-500 border-emerald-200' : ($locked ? 'bg-slate-50 text-slate-400 border-slate-200' : 'bg-blue-50 text-blue-500 border-blue-100') }}">
                            @if($locked)
                                <i class="fas fa-lock text-sm sm:text-base"></i>
                            @elseif($isDone)
                                <i class="fas fa-check text-sm sm:text-base"></i>
                            @else
                                <i class="fas fa-play text-xs sm:text-sm ml-0.5"></i>
                            @endif
                        </div>
                        
                        <!-- Lesson Info -->
                        <div class="flex-1 min-w-0">
                            <p class="text-[10px] sm:text-xs font-bold text-slate-400 tracking-wider uppercase mb-0.5 sm:mb-1">Lesson {{ str_pad($index + 1, 2, '0', STR_PAD_LEFT) }}</p>
                            <p class="font-bold text-slate-800 truncate text-sm sm:text-base group-hover:text-blue-700 transition-colors">{{ $lesson->title }}</p>
                        </div>

                        <!-- Badge -->
                        <div class="flex-shrink-0 ml-2">
                            @if($isDone)
                                <span class="inline-flex items-center gap-1.5 px-3 py-1.5 bg-emerald-100 text-emerald-700 text-[10px] sm:text-xs font-bold rounded-lg border border-emerald-200">
                                    <span class="w-1.5 h-1.5 rounded-full bg-emerald-500 hidden sm:block"></span>
                                    Selesai
                                </span>
                            @elseif($locked)
                                <span class="inline-flex items-center gap-1.5 px-3 py-1.5 bg-slate-100 text-slate-500 text-[10px] sm:text-xs font-bold rounded-lg border border-slate-200">
                                    <i class="fas fa-lock text-[10px] hidden sm:block"></i>
                                    Dikunci
                                </span>
                            @else
                                <span class="inline-flex items-center gap-1.5 px-3 py-1.5 bg-blue-100 text-blue-700 text-[10px] sm:text-xs font-bold rounded-lg border border-blue-200">
                                    Mulai
                                </span>
                            @endif
                        </div>
                    </div>
                @empty
                    <div class="text-center py-12 px-4 border border-dashed border-slate-200 rounded-3xl bg-slate-50">
                        <div class="w-16 h-16 bg-white rounded-full flex items-center justify-center mx-auto mb-4 shadow-sm border border-slate-100">
                            <i class="fas fa-box-open text-2xl text-slate-300"></i>
                        </div>
                        <h3 class="text-lg font-bold text-slate-700 mb-1">Materi Sedang Disiapkan</h3>
                        <p class="text-sm text-slate-500 max-w-sm mx-auto">Instruktur kami sedang dalam proses merekam dan merangkum silabus pembelajaran terbaik untuk Anda.</p>
                    </div>
                @endforelse
            </div>
        </div>

        <!-- Requirements Section -->
        <div class="bg-white rounded-3xl shadow-[0_2px_10px_-3px_rgba(6,81,237,0.1)] border border-slate-100 p-6 lg:p-8 mb-8 pb-8">
            <div class="flex items-center gap-3 sm:gap-4 mb-6 sm:mb-8">
                <div class="w-10 h-10 sm:w-12 sm:h-12 bg-rose-50 text-rose-500 rounded-xl flex items-center justify-center text-lg sm:text-xl border border-rose-100/50">
                    <i class="fa-solid fa-list-check"></i>
                </div>
                <h2 class="text-xl sm:text-2xl font-extrabold text-slate-800">Persyaratan Minimal</h2>
            </div>

            <div class="space-y-4">
                <div class="flex items-start gap-3 sm:gap-4 p-4 rounded-2xl bg-slate-50 border border-slate-100">
                    <div class="w-6 h-6 bg-white rounded-full flex items-center justify-center flex-shrink-0 mt-0.5 shadow-sm border border-slate-200">
                        <div class="w-2 h-2 bg-rose-400 rounded-full"></div>
                    </div>
                    <p class="text-sm sm:text-base text-slate-600 font-medium">Tidak memerlukan pengalaman sebelumnya dalam bidang ini (Cocok untuk pemula).</p>
                </div>
                <div class="flex items-start gap-3 sm:gap-4 p-4 rounded-2xl bg-slate-50 border border-slate-100">
                    <div class="w-6 h-6 bg-white rounded-full flex items-center justify-center flex-shrink-0 mt-0.5 shadow-sm border border-slate-200">
                        <div class="w-2 h-2 bg-rose-400 rounded-full"></div>
                    </div>
                    <p class="text-sm sm:text-base text-slate-600 font-medium">Komputer/Laptop dengan spesifikasi minimal RAM 4GB (Direkomendasikan SSD).</p>
                </div>
                <div class="flex items-start gap-3 sm:gap-4 p-4 rounded-2xl bg-slate-50 border border-slate-100">
                    <div class="w-6 h-6 bg-white rounded-full flex items-center justify-center flex-shrink-0 mt-0.5 shadow-sm border border-slate-200">
                        <div class="w-2 h-2 bg-rose-400 rounded-full"></div>
                    </div>
                    <p class="text-sm sm:text-base text-slate-600 font-medium">Koneksi internet yang stabil minimal 2Mbps untuk mengikuti video pembelajaran dengan standar minimum 480p.</p>
                </div>
                <div class="flex items-start gap-3 sm:gap-4 p-4 rounded-2xl bg-slate-50 border border-slate-100">
                    <div class="w-6 h-6 bg-white rounded-full flex items-center justify-center flex-shrink-0 mt-0.5 shadow-sm border border-slate-200">
                        <div class="w-2 h-2 bg-rose-400 rounded-full"></div>
                    </div>
                    <p class="text-sm sm:text-base text-slate-600 font-medium">Motivasi dan dedikasi penuh untuk mempelajari kompetensi baru demi karir.</p>
                </div>
            </div>
        </div>

    </div>
</div>       <!-- Instructor Section -->
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
