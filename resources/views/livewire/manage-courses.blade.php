<div class="w-full min-h-screen font-poppins bg-white p-4 pt-20 sm:p-6 lg:p-8 overflow-x-hidden">

    <div class="mb-6 sm:mb-8 flex flex-col md:flex-row md:items-end justify-between gap-4">
        <div>
            <h1 class="text-2xl sm:text-3xl font-bold text-gray-900 flex items-center gap-2 sm:gap-3 mb-1">
                <i class="fas fa-book text-blue-600"></i> Manage Courses
            </h1>
            <p class="text-gray-500 text-sm sm:text-base">Kelola daftar kursus, modul, dan publikasi.</p>
        </div>
        <a href="{{ route('createcourse') }}"
            class="inline-flex items-center justify-center w-full sm:w-auto px-5 py-2.5 bg-blue-600 hover:bg-blue-700 text-white text-sm font-semibold rounded-lg transition-colors shadow-sm">
            <i class="fas fa-plus mr-2"></i>
            Tambah Kursus
        </a>
    </div>

<!-- Flash Message Handler -->

    <!-- Search Bar dan Filter -->
    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 mb-8">
        <div class="relative flex flex-row gap-2">
            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                <i class="fas fa-search text-gray-400"></i>
            </div>
            <input type="text" wire:model.live.debounce.300ms="search" placeholder="Cari kursus..."
                class="w-full pl-10 pr-4 py-2.5 bg-gray-50 border border-gray-200 text-gray-900 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors duration-200">
            <div class="relative">
                <button
                    class="flex items-center justify-center w-11 h-11 bg-white border border-gray-200 hover:bg-gray-50 text-gray-600 rounded-xl transition-colors duration-200 focus:ring-2 focus:ring-blue-500 focus:ring-offset-2"
                    onclick="toggleFilter()" title="Filter Kategori">
                    <i class="fas fa-filter"></i>
                </button>

                <div id="filterPanel" style="display: none"
                    class="w-48 right-0 border border-gray-100 rounded-xl absolute bg-white mt-2 z-20 shadow-lg overflow-hidden py-1">

                    <button wire:click="$set('categories', null)"
                        class="w-full text-left hover:bg-gray-50 px-4 py-2 text-sm text-gray-700 transition-colors {{ $categories == null ? 'bg-blue-50 text-blue-700 font-medium' : '' }}">
                        <i class="fas fa-list-ul mr-2 w-4"></i> Semua Kategori
                    </button>

                    @foreach ($category as $cat)
                        <button wire:click="$set('categories', {{ $cat->id }})"
                            class="w-full text-left hover:bg-gray-50 px-4 py-2 text-sm text-gray-700 transition-colors {{ $categories == $cat->id ? 'bg-blue-50 text-blue-700 font-medium' : '' }}">
                            <i class="fas fa-tag mr-2 w-4"></i> {{ $cat->name }}
                        </button>
                    @endforeach
                </div>
            </div>
        </div>
    </div>




    <!-- Courses Table -->
    @if ($courses->count() > 0)
        <div class="overflow-hidden bg-white border border-gray-100 rounded-2xl shadow-sm">
            <div class="overflow-x-auto">
                <table class="w-full text-left text-sm text-gray-600 min-w-[850px]">
                    <thead class="bg-gray-50/80 border-b border-gray-200 text-gray-700 uppercase font-semibold text-[10px] sm:text-xs">
                        <tr>
                            <th scope="col" class="px-6 py-4 w-[25%] sm:min-w-[220px]">Nama Kursus</th>
                            <th scope="col" class="px-6 py-4 w-[18%] sm:min-w-[150px]">Kategori</th>
                            <th scope="col" class="px-6 py-4 w-[12%] sm:min-w-[120px] text-center">Status</th>
                            <th scope="col" class="px-6 py-4 w-[25%] sm:min-w-[200px]">Deskripsi</th>
                            <th scope="col" class="px-6 py-4 sm:min-w-[140px] text-center w-40">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">
                    @foreach ($courses as $course)
                        <tr class="hover:bg-blue-50/30 transition-colors duration-150">
                            <td class="px-6 py-4 align-top">
                                <div class="flex items-center gap-4">
                                    <div class="relative flex-shrink-0">
                                        @if ($course->thumbnail)
                                            <img src="{{ asset($course->thumbnail) }}" alt="{{ $course->title }}"
                                                class="w-12 h-12 rounded-lg object-cover shadow-sm ring-1 ring-gray-200">
                                        @else
                                            <div class="w-12 h-12 rounded-lg bg-gray-100 flex items-center justify-center ring-1 ring-gray-200">
                                                <i class="fas fa-image text-gray-400 text-lg"></i>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="min-w-0">
                                        <p class="font-bold text-gray-900 line-clamp-1" title="{{ $course->title }}">{{ $course->title }}</p>
                                        <span class="text-[10px] text-gray-500 block mt-0.5">ID: #{{ $course->id }}</span>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 align-top">
                                @if ($course->category)
                                    <span class="inline-flex items-center px-2 py-0.5 bg-blue-100 text-blue-700 rounded text-[10px] font-medium whitespace-nowrap">
                                        {{ $course->category->name }}
                                    </span>
                                @else
                                    <span class="text-gray-400 italic text-[11px]">Tanpa Kategori</span>
                                @endif
                            </td>
                            <td class="px-6 py-4 align-top text-center">
                                @if($course->is_published)
                                    <span class="inline-flex items-center px-2.5 py-1 rounded-md text-[10px] font-semibold bg-green-100 text-green-700 border border-green-200 shadow-sm">
                                        <span class="w-1.5 h-1.5 rounded-full bg-green-500 mr-1.5 animate-pulse"></span>
                                        Published
                                    </span>
                                @else
                                    <span class="inline-flex items-center px-2.5 py-1 rounded-md text-[10px] font-semibold bg-gray-100 text-gray-600 border border-gray-200 shadow-sm">
                                        <span class="w-1.5 h-1.5 rounded-full bg-gray-400 mr-1.5"></span>
                                        Draft
                                    </span>
                                @endif
                            </td>
                            <td class="px-6 py-4 align-top">
                                <p class="text-[11px] text-gray-500 line-clamp-2" title="{{ strip_tags($course->description) }}">
                                    {{ strip_tags($course->description) }}
                                </p>
                            </td>
                            <td class="px-6 py-4 align-top text-center">
                                <div class="flex items-center justify-center gap-2">
                                    <a href="{{ route('editcourse', $course->id) }}"
                                        class="w-8 h-8 inline-flex items-center justify-center bg-amber-50 text-amber-600 rounded-lg hover:bg-amber-600 hover:text-white transition-all border border-amber-100 shadow-sm"
                                        title="Edit Kursus">
                                        <i class="fas fa-edit text-xs"></i>
                                    </a>
                                    <a href="{{ route('coursedetail', $course->id) }}"
                                        class="w-8 h-8 inline-flex items-center justify-center bg-blue-50 text-blue-600 rounded-lg hover:bg-blue-600 hover:text-white transition-all border border-blue-100 shadow-sm"
                                        title="Lihat Materi">
                                        <i class="fas fa-eye text-xs"></i>
                                    </a>
                                    <button wire:click="deleteCourse({{ $course->id }})"
                                        wire:confirm="Apakah Anda yakin ingin menghapus kursus ini?"
                                        class="w-8 h-8 inline-flex items-center justify-center bg-red-50 text-red-600 rounded-lg hover:bg-red-600 hover:text-white transition-all border border-red-100 shadow-sm"
                                        title="Hapus Kursus">
                                        <i class="fas fa-trash text-xs"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <div class="mt-6">
            {{ $courses->links() }}
        </div>
    @else
        <div class="text-center py-12">
            <i class="fa-regular fa-circle-xmark text-6xl text-gray-500 mb-2"></i>
            <h3 class="text-xl font-medium text-gray-900 mb-2">Tidak ada kursus</h3>
            <p class="text-gray-600 mb-6">Mulai dengan membuat kursus pertama Anda</p>
        </div>
    @endif

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        // Restoring the filter toggle functionality
        function toggleFilter() {
            const panel = document.getElementById('filterPanel');
            if (panel) {
                if (!panel.style.display || panel.style.display === 'none') {
                    panel.style.display = 'block';
                } else {
                    panel.style.display = 'none';
                }
            }
        }

        // Global function to check and show flash messages
        window.checkFlash = function() {
            @if (session('success'))
                Swal.fire({
                    icon: 'success',
                    title: 'Berhasil!',
                    text: "{{ session('success') }}",
                    showConfirmButton: false,
                    timer: 3000,
                    timerProgressBar: true,
                    background: '#ffffff',
                    customClass: {
                        popup: 'rounded-2xl shadow-xl border border-slate-100',
                        title: 'text-slate-800 font-poppins font-bold',
                        htmlContainer: 'text-slate-600 font-poppins'
                    }
                });
            @endif
        }

        // Initialize on both page load and livewire navigation (for wire:navigate)
        document.addEventListener('DOMContentLoaded', window.checkFlash);
        document.addEventListener('livewire:navigated', window.checkFlash);
    </script>
</div>
