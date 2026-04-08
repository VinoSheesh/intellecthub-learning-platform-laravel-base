<div class="w-full min-h-screen font-poppins bg-white p-6 lg:p-8">

    <!-- Header Section -->
    <div class="mb-8 flex flex-col md:flex-row md:items-end justify-between gap-4">
        <div>
            <h1 class="text-3xl font-bold text-gray-900 flex items-center gap-3 mb-1">
                <i class="fas fa-book-open text-blue-600"></i> Semua Kursus
            </h1>
            <p class="text-gray-500">Cari kursus yang anda inginkan</p>
        </div>
    </div>

    <!-- Search Bar dan Filter -->
    <div class="bg-gray-50 rounded-2xl shadow-sm border border-gray-100 p-6 mb-8">
        <div class="relative flex flex-col md:flex-row gap-3">
            <div class="relative flex-1">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <i class="fas fa-search text-gray-400"></i>
                </div>
                <input type="text" wire:model.live.debounce.300ms="search" placeholder="Cari kursus..."
                    class="w-full pl-10 pr-4 py-2.5 bg-white border border-gray-200 text-gray-900 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors duration-200 shadow-sm">
            </div>

            <div class="relative" x-data="{ open: false }">
                <button @click="open = !open"
                    class="flex items-center justify-center w-full md:w-auto px-5 h-11 bg-white border border-gray-200 hover:bg-gray-50 text-gray-700 rounded-xl transition-colors duration-200 focus:ring-2 focus:ring-blue-500 focus:ring-offset-1 shadow-sm">
                    <i class="fas fa-filter text-gray-500 mr-2"></i> Filter Kategori
                </button>

                <div x-show="open" @click.away="open = false" style="display: none;" x-transition
                    class="absolute w-full md:w-56 md:right-0 mt-2 bg-white rounded-xl shadow-lg border border-gray-100 z-20 py-1 overflow-hidden">
                    <button wire:click="$set('category', '')" @click="open = false"
                        class="block w-full text-left px-4 py-2.5 text-sm text-gray-700 hover:bg-blue-50 hover:text-blue-700 transition-colors">
                        <i class="fas fa-list-ul mr-2 w-4 text-gray-400"></i> Semua Kategori
                    </button>
                    @foreach ($categories as $cat)
                        <button wire:click="$set('category', '{{ $cat->id }}')" @click="open = false"
                            class="block w-full text-left px-4 py-2.5 text-sm text-gray-700 hover:bg-blue-50 hover:text-blue-700 transition-colors">
                            <i class="fas fa-tag mr-2 w-4 text-gray-400"></i> {{ $cat->name }}
                        </button>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <!-- Responsive LMS course grid -->
    @if($courses->count() > 0)
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
        @foreach ($courses as $course)
            <livewire:course-card :course="$course" :wire:key="$course->id" />
        @endforeach
    </div>
    @else
    <div class="flex flex-col items-center justify-center py-12 md:py-20 bg-white rounded-3xl border border-dashed border-gray-200">
        <div class="w-14 h-14 md:w-20 md:h-20 bg-gray-50 rounded-full flex items-center justify-center mb-4 md:mb-5">
            <i class="fas fa-book-open text-gray-300 text-xl md:text-3xl"></i>
        </div>
        <h3 class="text-base md:text-xl font-bold text-gray-800 mb-2">Tidak Ada Kursus Ditemukan</h3>
        <p class="text-gray-500 text-xs md:text-base text-center max-w-[260px] md:max-w-sm">Coba ubah kata kunci atau filter kategori Anda.</p>
    </div>
    @endif

    {{-- Tambahkan script ini di akhir file, sebelum closing </div> --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        window.addEventListener('request-course-delete', event => {
            confirmDeleteCourse(event.detail.courseId);
        });

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
