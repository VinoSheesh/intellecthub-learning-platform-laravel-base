<div class="w-full min-h-screen font-poppins bg-white p-6 lg:p-8">

    <div class="mb-8 flex flex-col md:flex-row md:items-end justify-between gap-4">
        <div>
            <h1 class="text-3xl font-bold text-gray-900 flex items-center gap-3 mb-1">
                <i class="fas fa-check-circle text-green-600"></i> Completed
            </h1>
            <p class="text-gray-500">Kursus yang telah berhasil anda selesaikan 100%</p>
        </div>
    </div>

    @if($courses->count() > 0)
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
        @foreach ($courses as $course)
            <livewire:course-card :course="$course" :wire:key="$course->id" />
        @endforeach
    </div>
    @else
    <div class="flex flex-col items-center justify-center py-12 md:py-20 bg-white rounded-3xl border border-dashed border-gray-200">
        <div class="w-14 h-14 md:w-20 md:h-20 bg-gray-50 rounded-full flex items-center justify-center mb-4 md:mb-5">
            <i class="fas fa-check-circle text-gray-300 text-xl md:text-3xl"></i>
        </div>
        <h3 class="text-base md:text-xl font-bold text-gray-800 mb-2">Belum Ada Kursus yang Selesai</h3>
        <p class="text-gray-500 text-xs md:text-base text-center max-w-[260px] md:max-w-sm">Berjuang pelajari materi dan selesaikan kursus Anda!</p>
    </div>
    @endif
</div>
