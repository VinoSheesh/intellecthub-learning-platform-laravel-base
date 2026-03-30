<div class="font-poppins min-h-screen bg-gray-50">
    <!-- Top Bar -->
    <div class="bg-white border-b border-gray-200 px-4 py-3 flex items-center justify-between sticky top-0 z-40 shadow-sm">
        <div class="flex items-center gap-4">
            <a href="{{ route('showcourse', $course->id) }}" class="text-gray-500 hover:text-gray-700 transition">
                <i class="far fa-arrow-left text-lg"></i>
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
                <i class="far fa-certificate"></i>
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
                        wire:click="{{ $isLocked ? '' : 'selectLesson(' . $item->id . ')' }}"
                        @if($isLocked) onclick="alert('Langganan diperlukan untuk mengakses lesson ini.')" @endif
                        class="w-full text-left px-4 py-3 flex items-start gap-3 transition-colors duration-150 border-l-2
                               {{ $isActive ? 'bg-blue-50 border-blue-500' : 'border-transparent hover:bg-gray-50' }}
                               {{ $isLocked ? 'opacity-60 cursor-not-allowed' : 'cursor-pointer' }}">
                        <span class="mt-0.5 flex-shrink-0 text-base
                            {{ $isDone ? 'text-green-500' : ($isLocked ? 'text-gray-400' : 'text-gray-400') }}">
                            @if($isLocked)
                                <i class="far fa-lock"></i>
                            @elseif($isDone)
                                <i class="far fa-check-circle"></i>
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
            @if($lesson)
                <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-8">

                    <!-- Lesson Header -->
                    <div class="mb-6">
                        <div class="flex items-center gap-2 text-sm text-gray-500 mb-2">
                            <i class="far fa-book-open"></i>
                            <span>Lesson {{ $lessons->search(fn($l) => $l->id === $lesson->id) + 1 }} dari {{ $lessons->count() }}</span>
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
                                <i class="far fa-check-circle text-green-500"></i>
                                Lesson Selesai
                            </span>
                        @else
                            <button wire:click="markComplete"
                                wire:loading.attr="disabled"
                                class="inline-flex items-center gap-2 px-6 py-3 bg-blue-600 hover:bg-blue-700 text-white font-semibold rounded-xl shadow-sm transition disabled:opacity-50">
                                <span wire:loading.remove wire:target="markComplete">
                                    <i class="far fa-check-circle mr-1"></i> Tandai Selesai
                                </span>
                                <span wire:loading wire:target="markComplete">
                                    <i class="fa-solid fa-spinner fa-spin mr-1"></i> Menyimpan...
                                </span>
                            </button>
                        @endif

                        <!-- Next Lesson -->
                        @php
                            $currentIndex = $lessons->search(fn($l) => $l->id === $lesson->id);
                            $nextLesson = $lessons->get($currentIndex + 1);
                        @endphp
                        @if($nextLesson)
                            <button wire:click="selectLesson({{ $nextLesson->id }})"
                                class="inline-flex items-center gap-2 px-5 py-3 bg-white hover:bg-gray-50 text-gray-700 border border-gray-300 rounded-xl font-medium transition">
                                Lesson Berikutnya
                                <i class="far fa-arrow-right"></i>
                            </button>
                        @endif
                    </div>

                    @if($progress >= 100)
                    <div class="mt-6 bg-yellow-50 border border-yellow-200 rounded-2xl p-5 flex flex-col sm:flex-row sm:items-center gap-4">
                        <div class="flex items-center gap-3">
                            <div class="w-12 h-12 bg-yellow-100 rounded-xl flex items-center justify-center flex-shrink-0">
                                <i class="far fa-certificate text-yellow-600 text-xl"></i>
                            </div>
                            <div>
                                <p class="font-bold text-gray-900">Selamat! Kamu telah menyelesaikan kursus ini 🎉</p>
                                <p class="text-sm text-gray-600">Unduh sertifikat penyelesaian kursusmu sekarang.</p>
                            </div>
                        </div>
                        <a href="{{ route('certificate.download', $course->id) }}"
                           class="sm:ml-auto flex-shrink-0 inline-flex items-center gap-2 px-5 py-2.5 bg-yellow-500 hover:bg-yellow-600 text-white font-semibold rounded-lg shadow-sm transition">
                            <i class="far fa-certificate"></i>
                            Unduh Sertifikat
                        </a>
                    </div>
                    @endif

                </div>
            @else
                <div class="flex flex-col items-center justify-center h-full text-center px-4">
                    <i class="far fa-folder-open text-6xl text-gray-300 mb-4"></i>
                    <h3 class="text-xl font-semibold text-gray-700">Kursus belum memiliki lesson</h3>
                    <p class="text-gray-500 mt-2">Lesson akan segera hadir.</p>
                </div>
            @endif
        </main>
    </div>
</div>
