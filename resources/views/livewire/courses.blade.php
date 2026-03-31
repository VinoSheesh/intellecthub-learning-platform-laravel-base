<div class="min-h-screen font-poppins p-6 lg:p-8">
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

        </div>
    </div>

    <!-- Responsive LMS course grid -->
    @if($courses->count() > 0)
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
        @foreach ($courses as $course)
            <div class="group bg-white rounded-2xl border border-gray-100 hover:border-blue-200 shadow-sm hover:shadow-xl transition-all duration-300 flex flex-col overflow-hidden hover:-translate-y-1">

                <!-- Thumbnail -->
                <a href="{{ route('showcourse', ['id' => $course->id]) }}" wire:navigate
                   class="block relative overflow-hidden bg-gray-100 flex-shrink-0" style="aspect-ratio: 16/9;">
                    <img src="/{{ $course->thumbnail }}" alt="{{ $course->title }}"
                        class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500 ease-in-out">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/40 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 pointer-events-none"></div>
                    <!-- Category badge -->
                    <span class="absolute top-3 left-3 inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-[10px] font-bold bg-blue-600 text-white shadow-md tracking-widest uppercase">
                        {{ $course->category->name }}
                    </span>
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
                        <a href="{{ route('showcourse', ['id' => $course->id]) }}" wire:navigate
                            class="flex-1 text-center py-2.5 bg-blue-600 hover:bg-blue-700 text-white text-[12px] font-bold rounded-xl transition-all duration-300 shadow-sm shadow-blue-100 active:scale-[0.98]">
                            Lihat Kursus
                        </a>
                        @can('edit-course')
                            <a href="{{ route('editcourse', ['id' => $course->id]) }}" wire:navigate
                                title="Edit Kursus"
                                class="flex-shrink-0 inline-flex items-center justify-center w-10 h-10 rounded-xl bg-gray-50 text-amber-600 hover:bg-amber-500 hover:text-white transition-all duration-200 border border-gray-100 shadow-sm">
                                <i class="fas fa-pencil-alt text-[11px]"></i>
                            </a>
                        @endcan
                        @can('hapus-course')
                            <button onclick="confirmDeleteCourse({{ $course->id }})" title="Hapus Kursus"
                                class="flex-shrink-0 inline-flex items-center justify-center w-10 h-10 rounded-xl bg-gray-50 text-red-500 hover:bg-red-500 hover:text-white transition-all duration-200 border border-gray-100 shadow-sm">
                                <i class="fas fa-trash-alt text-[11px]"></i>
                            </button>
                        @endcan
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    @else
    <div class="flex flex-col items-center justify-center py-20 bg-white rounded-3xl border border-dashed border-gray-200">
        <div class="w-20 h-20 bg-gray-50 rounded-full flex items-center justify-center mb-5">
            <i class="fas fa-book-open text-gray-300 text-3xl"></i>
        </div>
        <h3 class="text-xl font-bold text-gray-800 mb-2">Tidak Ada Kursus Ditemukan</h3>
        <p class="text-gray-500 text-center max-w-sm">Coba ubah kata kunci atau filter kategori Anda.</p>
    </div>
    @endif

    {{-- Tambahkan script ini di akhir file, sebelum closing </div> --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        function confirmDeleteCourse(courseId) {
            Swal.fire({
                title: 'Hapus Kursus?',
                text: 'Apakah anda yakin ingin menghapus kursus ini? Tindakan ini tidak dapat dibatalkan.',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#dc2626',
                cancelButtonColor: '#6b7280',
                confirmButtonText: 'Ya, Hapus!',
                cancelButtonText: 'Batal',
                backdrop: true,
                allowOutsideClick: false,
                willOpen: () => {
                    document.querySelector('.swal2-confirm').focus();
                }
            }).then((result) => {
                if (result.isConfirmed) {
                    // Panggil method Livewire
                    @this.call('deleteCourse', courseId);
                    
                    // Tampilkan alert sukses setelah delay
                    setTimeout(() => {
                        Swal.fire({
                            icon: 'success',
                            title: 'Berhasil!',
                            text: 'Kursus berhasil dihapus.',
                            showConfirmButton: false,
                            timer: 2000,
                            timerProgressBar: true
                        });
                    }, 500);
                }
            });
        }

        // Tampilkan notifikasi jika ada session success
        @if (session('success'))
            Swal.fire({
                icon: 'success',
                title: 'Berhasil!',
                text: '{{ session('success') }}',
                showConfirmButton: false,
                timer: 2000,
                timerProgressBar: true
            });
        @endif
    </script>
</div>
