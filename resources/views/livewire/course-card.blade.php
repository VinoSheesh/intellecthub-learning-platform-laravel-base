<div class="group bg-white rounded-2xl border border-gray-100 hover:border-blue-200 shadow-sm hover:shadow-xl transition-all duration-300 flex flex-col overflow-hidden hover:-translate-y-1 relative">

    <!-- Favorite Button/Heart -->
    <button wire:click.prevent="toggleFavorite" class="absolute top-3 right-3 z-30 w-9 h-9 rounded-full bg-white/90 backdrop-blur-sm flex items-center justify-center shadow-lg transition-transform duration-300 hover:scale-110 active:scale-95 group/fav">
        @if($isFavorite)
            <i class="fa-solid fa-heart text-red-500 text-lg transition-all duration-300"></i>
        @else
            <i class="fa-regular fa-heart text-gray-400 group-hover/fav:text-red-400 text-lg transition-all duration-300"></i>
        @endif
    </button>

    <!-- Thumbnail -->
    <a href="{{ route('showcourse', ['id' => $course->id]) }}"
       class="block relative overflow-hidden bg-gray-100 flex-shrink-0" style="aspect-ratio: 16/9;">
        <img src="/{{ ltrim($course->thumbnail, '/') }}" alt="{{ $course->title }}"
            class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500 ease-in-out">
        <div class="absolute inset-0 bg-gradient-to-t from-black/40 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 pointer-events-none"></div>
        <!-- Category badge -->
        <div class="absolute top-3 left-3 flex flex-col gap-2 shadow-sm rounded-full">
            <span class="inline-flex items-center w-fit gap-1.5 px-2.5 py-1 rounded-full text-[10px] font-bold bg-blue-600 text-white shadow-md tracking-widest uppercase">
                {{ $course->category->name ?? 'Uncategorized' }}
            </span>
            @if(!$course->is_published)
                <span class="inline-flex items-center w-fit gap-1.5 px-2.5 py-1 rounded-full text-[10px] font-bold bg-gray-600 text-white shadow-md tracking-widest uppercase">
                    Archived
                </span>
            @endif
        </div>
    </a>

    <!-- Card Body: Refined padding & layout -->
    <div class="p-4 flex flex-col gap-2.5">
        <!-- Title: Premium typography -->
        <h2 class="text-sm font-bold text-gray-900 group-hover:text-blue-600 transition-colors duration-200 line-clamp-2 leading-snug min-h-[2.5rem]">
            {{ $course->title }}
        </h2>

        <!-- Description: Slightly smaller, cleaner spacing -->
        <p class="text-gray-400 text-[12px] leading-relaxed line-clamp-2 min-h-[2.2rem]">
            {{ Illuminate\Support\Str::limit(strip_tags($course->description), 85) }}
        </p>

        <!-- Meta row: Simplified to just lessons count -->
        <div class="flex items-center gap-3 text-[11px] font-medium text-gray-400/80 mb-1">
            <span class="inline-flex items-center gap-1.5 px-2 py-0.5 bg-gray-50 rounded-md border border-gray-100">
                <i class="fas fa-layer-group text-blue-500/70 text-[10px]"></i>
                {{ $course->lessons->count() }} Lesson
            </span>
        </div>

        <!-- Subtle Divider -->
        <div class="border-t border-gray-50 mt-1"></div>

        <!-- Footer actions -->
        <div class="flex items-center gap-2 mt-1">
            @if(request()->routeIs('inprogress') && $enrollment && $enrollment->last_lesson_id)
                <a href="{{ route('courseplayer', ['courseId' => $course->id, 'lessonId' => $enrollment->last_lesson_id]) }}" wire:navigate
                    class="flex-1 text-center py-2.5 bg-green-600 hover:bg-green-700 text-white text-[12px] font-bold rounded-xl transition-all duration-300 shadow-sm shadow-green-100 active:scale-[0.98]">
                    Lanjutkan
                </a>
            @else
                <a href="{{ route('showcourse', ['id' => $course->id]) }}"
                    class="flex-1 text-center py-2.5 bg-blue-600 hover:bg-blue-700 text-white text-[12px] font-bold rounded-xl transition-all duration-300 shadow-sm shadow-blue-100 active:scale-[0.98]">
                    Lihat Kursus
                </a>
            @endif

            @can('edit-course')
                <a href="{{ route('editcourse', ['id' => $course->id]) }}" wire:navigate
                    title="Edit Kursus"
                    class="flex-shrink-0 inline-flex items-center justify-center w-10 h-10 rounded-xl bg-gray-50 text-amber-600 hover:bg-amber-500 hover:text-white transition-all duration-200 border border-gray-100 shadow-sm">
                    <i class="fas fa-pencil-alt text-[11px]"></i>
                </a>
            @endcan
            @can('hapus-course')
                <button onclick="window.dispatchEvent(new CustomEvent('request-course-delete', { detail: { courseId: {{ $course->id }} } }))" title="Hapus Kursus"
                    class="flex-shrink-0 inline-flex items-center justify-center w-10 h-10 rounded-xl bg-gray-50 text-red-500 hover:bg-red-500 hover:text-white transition-all duration-200 border border-gray-100 shadow-sm">
                    <i class="fas fa-trash-alt text-[11px]"></i>
                </button>
            @endcan
        </div>
    </div>
</div>
