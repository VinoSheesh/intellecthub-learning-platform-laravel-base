<div class="font-poppins min-h-screen bg-gray-50">
    <!-- Top Bar -->
    <div class="bg-white border-b border-gray-200 px-4 py-3 flex items-center justify-between sticky top-0 z-40 shadow-sm">
        <div class="flex items-center gap-4">
            <a href="{{ route('showcourse', $course->id) }}" class="text-gray-500 hover:text-gray-700 transition">
                <i class="fas fa-arrow-left text-lg"></i>
            </a>
            <div>
                <p class="text-xs text-gray-500 uppercase tracking-wide font-medium">{{ $course->category->name ?? '' }}</p>
                <h1 class="font-bold text-gray-900 text-base lg:text-lg leading-tight truncate max-w-xs lg:max-w-lg">{{ $course->title }}</h1>
            </div>
        </div>
        <div class="flex items-center gap-3">
            <div class="hidden sm:flex items-center gap-2">
                <span class="text-sm font-semibold text-gray-700">{{ $progress }}%</span>
                <div class="w-32 bg-gray-200 rounded-full h-2">
                    <div class="bg-blue-600 h-2 rounded-full transition-all duration-500" style="width: {{ $progress }}%"></div>
                </div>
            </div>
            @if($progress >= 100)
            <a href="{{ route('certificate.download', $course->id) }}"
               class="inline-flex items-center gap-2 px-4 py-2 bg-yellow-500 hover:bg-yellow-600 text-white text-sm font-semibold rounded-lg shadow-sm transition">
                <i class="fas fa-award"></i>
                <span class="hidden sm:inline">Sertifikat</span>
            </a>
            @endif
        </div>
    </div>

    <!-- Main Layout -->
    <div class="flex h-[calc(100vh-57px)]">

        <!-- Sidebar - Lesson List -->
        <aside class="w-72 bg-white border-r border-gray-200 overflow-y-auto flex-shrink-0 hidden md:block">
            <div class="p-4 border-b border-gray-100">
                <h2 class="font-semibold text-gray-700 text-sm uppercase tracking-wide">Daftar Lesson</h2>
                <p class="text-xs text-gray-500 mt-1">{{ count($completedLessonIds) }} dari {{ $lessons->count() }} selesai</p>
            </div>

            <nav class="py-2">
                @foreach($lessons as $index => $item)
                    @php
                        $isDone = in_array($item->id, $completedLessonIds);
                        $isActive = $lesson && $lesson->id === $item->id;
                        $isLocked = !$isSubscribed;
                    @endphp
                    <button
                        wire:key="sidebar-lesson-{{ $item->id }}"
                        wire:click="{{ $isLocked ? '' : 'selectLesson(' . $item->id . ')' }}"
                        @if($isLocked) onclick="alert('Langganan diperlukan untuk mengakses lesson ini.')" @endif
                        class="w-full text-left px-4 py-3 flex items-start gap-3 transition-colors duration-150 border-l-2
                               {{ $isActive ? 'bg-blue-50 border-blue-500' : 'border-transparent hover:bg-gray-50' }}
                               {{ $isLocked ? 'opacity-60 cursor-not-allowed' : 'cursor-pointer' }}">
                        <span class="mt-0.5 flex-shrink-0 text-base
                            {{ $isDone ? 'text-green-500' : ($isLocked ? 'text-gray-400' : 'text-gray-400') }}">
                            @if($isLocked)
                                <i class="fas fa-lock"></i>
                            @elseif($isDone)
                                <i class="fas fa-check-circle"></i>
                            @else
                                <i class="far fa-circle"></i>
                            @endif
                        </span>
                        <div class="flex-1 min-w-0">
                            <p class="text-xs text-gray-400 mb-0.5">Lesson {{ $index + 1 }}</p>
                            <p class="text-sm font-medium text-gray-700 leading-snug line-clamp-2
                                {{ $isActive ? 'text-blue-700' : '' }}">
                                {{ $item->title }}
                            </p>
                        </div>
                    </button>
                @endforeach
            </nav>
        </aside>

        <!-- Main Content Area -->
        <main class="flex-1 overflow-y-auto">
            @if($showCompletionPage)
                <div class="flex flex-col items-center justify-center min-h-[calc(100vh-57px)] text-center px-4 py-8 bg-gray-50">
                    <div class="bg-white rounded-[2rem] border border-gray-100 shadow-[0_8px_30px_rgb(0,0,0,0.04)] p-10 lg:p-14 max-w-2xl w-full relative overflow-hidden">
                        <!-- Decorative background elements -->
                        <div class="absolute top-0 right-0 -mt-16 -mr-16 w-32 h-32 bg-yellow-400 rounded-full opacity-10 blur-2xl"></div>
                        <div class="absolute bottom-0 left-0 -mb-16 -ml-16 w-32 h-32 bg-blue-500 rounded-full opacity-10 blur-2xl"></div>

                        <div class="w-28 h-28 bg-gradient-to-tr from-yellow-100 to-yellow-50 rounded-full flex items-center justify-center mx-auto mb-8 shadow-inner border border-yellow-200/50">
                            <i class="fas fa-trophy text-yellow-500 text-5xl drop-shadow-sm"></i>
                        </div>
                        <h2 class="text-4xl font-extrabold text-gray-900 mb-5 tracking-tight">Selamat! Kursus Selesai <span class="inline-block animate-bounce ml-2">🎉</span></h2>
                        <p class="text-xl text-gray-600 mb-10 leading-relaxed max-w-lg mx-auto">
                            Kamu telah berhasil menyelesaikan seluruh materi dalam kursus <span class="font-bold text-gray-900">{{ $course->title }}</span>. Unduh sertifikat pencapaianmu sekarang!
                        </p>
                        <div class="flex flex-col sm:flex-row items-center justify-center gap-4 relative z-10">
                            <a href="{{ route('certificate.download', $course->id) }}"
                               class="inline-flex items-center justify-center w-full sm:w-auto px-8 py-4 bg-yellow-500 hover:bg-yellow-600 text-white font-bold rounded-2xl shadow-lg shadow-yellow-500/30 hover:shadow-xl hover:shadow-yellow-500/40 transition-all duration-300 transform hover:-translate-y-1 text-lg">
                                <i class="fas fa-download mr-3"></i>
                                Unduh Sertifikat
                            </a>
                            <a href="{{ route('dashboard') }}"
                               class="inline-flex items-center justify-center w-full sm:w-auto px-8 py-4 bg-white hover:bg-gray-50 text-gray-700 border-2 border-gray-200 hover:border-gray-300 font-semibold rounded-2xl transition-all duration-300 text-lg">
                                Kembali ke Dashboard
                            </a>
                        </div>
                    </div>
                </div>
            @elseif($lesson)
                <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-8" wire:key="lesson-container-{{ $lesson->id }}">

                    <!-- Lesson Header -->
                    <div class="mb-6">
                        <div class="flex items-center gap-2 text-sm text-gray-500 mb-2">
                            <i class="fas fa-book-open"></i>
                            <span>Lesson {{ collect($lessons)->values()->search(fn($l) => (int)$l->id === (int)$lesson->id) + 1 }} dari {{ $lessons->count() }}</span>
                        </div>
                        <h2 class="text-2xl font-bold text-gray-900">{{ $lesson->title }}</h2>
                    </div>

                    <!-- Progress Bar (Mobile) -->
                    <div class="sm:hidden mb-6 bg-white rounded-xl border border-gray-200 p-4">
                        <div class="flex justify-between text-sm mb-2">
                            <span class="text-gray-600 font-medium">Progress Kursus</span>
                            <span class="font-bold text-blue-600">{{ $progress }}%</span>
                        </div>
                        <div class="w-full bg-gray-200 rounded-full h-2">
                            <div class="bg-blue-600 h-2 rounded-full transition-all duration-500" style="width: {{ $progress }}%"></div>
                        </div>
                    </div>

                    <!-- Lesson Content -->
                    <div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-6 lg:p-8 mb-6">
                        <div class="prose prose-lg max-w-none text-gray-700 leading-relaxed">
                            {!! $lesson->content !!}
                        </div>
                    </div>

                    <!-- Complete Button -->
                    <div class="flex items-center justify-between">
                        @php $isDone = in_array($lesson->id, $completedLessonIds); @endphp
                        @if($isDone)
                            <span class="inline-flex items-center gap-2 px-5 py-3 bg-green-50 text-green-700 border border-green-200 rounded-xl font-semibold">
                                <i class="fas fa-check-circle text-green-500"></i>
                                Lesson Selesai
                            </span>
                        @else
                            <button wire:click="markComplete"
                                wire:key="mark-complete-btn-{{ $lesson->id }}"
                                wire:loading.attr="disabled"
                                class="inline-flex items-center gap-2 px-6 py-3 bg-blue-600 hover:bg-blue-700 text-white font-semibold rounded-xl shadow-sm transition disabled:opacity-50">
                                <span wire:loading.remove wire:target="markComplete">
                                    <i class="fas fa-check-circle mr-1"></i> Tandai Selesai
                                </span>
                                <span wire:loading wire:target="markComplete">
                                    <i class="fas fa-spinner fa-spin mr-1"></i> Menyimpan...
                                </span>
                            </button>
                        @endif

                        <!-- Next Lesson -->
                        @php
                            $lessonValues = collect($lessons)->values();
                            $currentIndex = $lessonValues->search(fn($l) => (int)$l->id === (int)$lesson->id);
                            $nextLesson = $currentIndex !== false ? $lessonValues->get($currentIndex + 1) : null;
                        @endphp
                        @if($nextLesson)
                            <button wire:click="selectLesson({{ $nextLesson->id }})"
                                wire:key="next-lesson-btn-{{ $nextLesson->id }}"
                                wire:loading.attr="disabled"
                                wire:target="selectLesson({{ $nextLesson->id }})"
                                class="inline-flex items-center gap-2 px-5 py-3 bg-white hover:bg-gray-50 text-gray-700 border border-gray-300 rounded-xl font-medium transition disabled:opacity-50 disabled:cursor-not-allowed">
                                <span wire:loading.remove wire:target="selectLesson({{ $nextLesson->id }})">Lesson Berikutnya</span>
                                <span wire:loading wire:target="selectLesson({{ $nextLesson->id }})">Memuat...</span>
                                <i wire:loading.remove wire:target="selectLesson({{ $nextLesson->id }})" class="fas fa-arrow-right"></i>
                                <i wire:loading wire:target="selectLesson({{ $nextLesson->id }})" class="fas fa-spinner fa-spin"></i>
                            </button>
                        @endif
                    </div>

                    <!-- (Completion box removed -> now handled by $showCompletionPage) -->

                </div>
            @else
                <div class="flex flex-col items-center justify-center h-full text-center px-4">
                    <i class="fas fa-folder-open text-6xl text-gray-300 mb-4"></i>
                    <h3 class="text-xl font-semibold text-gray-700">Kursus belum memiliki lesson</h3>
                    <p class="text-gray-500 mt-2">Lesson akan segera hadir.</p>
                </div>
            @endif
        </main>
    </div>
</div>
