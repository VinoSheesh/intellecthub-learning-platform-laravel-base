<div class="w-full min-h-screen font-poppins bg-white p-6 lg:p-8" style="background-color: #ffffff;">
    @script
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
            crossorigin="anonymous" referrerpolicy="no-referrer" />
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="https://cdn.jsdelivr.net/gh/livewire/sortable@v1.x.x/dist/livewire-sortable.js"></script>
    @endscript

    <!-- Breadcrumb Navigation -->
    <nav class="flex mb-8" aria-label="Breadcrumb">
        <ol class="inline-flex items-center space-x-1 md:space-x-3">
            <li class="inline-flex items-center">
                <a href="{{ route('dashboard') }}"
                    class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600 transition-colors">
                    <svg class="w-3 h-3 mr-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        fill="currentColor" viewBox="0 0 20 20">
                        <path
                            d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L9 3.414V19a1 1 0 0 0 2 0V3.414l7.293 7.293a1 1 0 0 0 1.414-1.414Z" />
                    </svg>
                    Dashboard
                </a>
            </li>
            <li>
                <div class="flex items-center">
                    <svg class="w-3 h-3 text-gray-400 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 9 4-4-4-4" />
                    </svg>
                    <a href="{{ route('allcourse') }}"
                        class="ml-1 text-sm font-medium text-gray-700 hover:text-blue-600 transition-colors">Kelola
                        Kursus</a>
                </div>
            </li>
            <li>
                <div class="flex items-center">
                    <svg class="w-3 h-3 text-gray-400 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 9 4-4-4-4" />
                    </svg>
                    <span class="ml-1 text-sm font-medium text-gray-500">{{ $course->title }}</span>
                </div>
            </li>
        </ol>
    </nav>

    <!-- Course Header Card -->
    <div class="bg-white rounded-lg shadow-sm border border-gray-100 p-6 lg:p-8 mb-8">
        <div class="flex flex-col lg:flex-row items-start lg:items-center justify-between gap-6">
            <div>
                <div class="flex items-center gap-3 mb-4">
                    <div
                        class="w-12 h-12 bg-gradient-to-br from-blue-500 to-blue-600 rounded-lg flex items-center justify-center shadow-sm">
                        <i class="fa-solid fa-graduation-cap text-white text-lg"></i>
                    </div>
                    <div>
                        <h1 class="text-2xl lg:text-3xl font-bold text-gray-900">{{ $course->title }}</h1>
                        <p class="text-sm text-gray-500 mt-1">{{ $course->category->name ?? '' }}</p>
                    </div>
                </div>
            </div>

            <!-- Course Stats -->
            <div class="grid grid-cols-2 gap-4 w-full lg:w-auto">
                <div
                    class="bg-gradient-to-br from-blue-50 to-blue-100 rounded-lg p-4 border border-blue-200 flex items-center gap-3">
                    <div class="w-10 h-10 bg-white/50 rounded-md flex items-center justify-center">
                        <i class="fa-solid fa-list text-blue-600"></i>
                    </div>
                    <div>
                        <p class="text-xs font-medium text-blue-600 uppercase tracking-wide">Total Materi</p>
                        <p class="text-2xl font-bold text-blue-900 mt-1">{{ $lessonsCount }}</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Add New Lesson Button -->
        <div class="mt-8 pt-6 border-t border-gray-100">
            <button wire:click="openAddLessonModal"
                class="inline-flex items-center justify-center gap-2 px-6 py-3 bg-blue-600 hover:bg-blue-700 text-white font-semibold rounded-lg transition-all duration-200 shadow-sm hover:shadow-md hover:scale-105 active:scale-95">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                </svg>
                <span>Tambah Materi Baru</span>
            </button>
        </div>

        @if ($openAddModal)
            <div>
                <div
                    class="fixed inset-0 z-50 flex items-center justify-center overflow-x-hidden overflow-y-auto outline-none focus:outline-none">

                    <div class="fixed inset-0 bg-black opacity-50 shadow-2xl"></div>

                    <div class="relative w-full max-w-lg mx-auto my-6 z-[60]">
                        <div
                            class="relative flex flex-col w-full bg-white border-0 rounded-lg shadow-lg outline-none focus:outline-none">

                            <div
                                class="flex items-start justify-between p-4 border-b border-solid border-gray-200 rounded-t">
                                <h3 class="text-xl font-semibold text-gray-800">
                                    Tambah Materi
                                </h3>
                            </div>

                            <div class="relative p-6 flex-auto">
                                <div class="space-y-4">
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700">Judul Materi</label>
                                        <input type="text" wire:model="title"
                                            class="w-full rounded-lg border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                                        @error('title')
                                            <span class="text-red-500 text-xs">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div>
                                        <label class="block text-sm font-medium text-gray-700">Konten / Link
                                            Video</label>
                                        <textarea wire:model="content" rows="3"
                                            class="w-full rounded-lg border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                                            placeholder="Masukkan materi atau link YouTube..."></textarea>
                                        @error('content')
                                            <span class="text-red-500 text-xs">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div
                                    class="flex items-center justify-end p-4 border-t border-solid border-gray-200 rounded-b gap-2">
                                    <button wire:click="closeAddLessonModal"
                                        class="px-4 py-2 text-sm text-red-600 hover:text-gray-800 font-bold">
                                        Batal
                                    </button>
                                    <button wire:click="saveLesson"
                                        class="px-6 py-2 bg-blue-600 text-white text-sm font-bold rounded shadow hover:bg-blue-700 transition-all">
                                        Simpan
                                    </button>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
        @endif
    </div>



    <!-- Empty State or Lesson List -->
    <div class="bg-white rounded-lg shadow-sm border border-gray-100 overflow-hidden">
        @if ($lessonsCount === 0)
            <!-- Empty State -->
            <div class="p-12 lg:p-16 text-center">
                <div class="flex justify-center mb-6">
                    <div
                        class="w-24 h-24 bg-gradient-to-br from-blue-100 to-blue-50 rounded-full flex items-center justify-center">
                        <i class="fa-solid fa-folder-plus text-blue-500 text-3xl"></i>
                    </div>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-2">Belum Ada Materi</h3>
                <p class="text-gray-500 mb-8 max-w-md mx-auto">Mulai dengan membuat materi pertama untuk kursus ini.
                    Materi dapat berupa video, dokumen, atau kuis interaktif.</p>
                <button wire:click="openAddLessonModal"
                    class="inline-flex items-center justify-center gap-2 px-6 py-3 bg-blue-600 hover:bg-blue-700 text-white font-semibold rounded-lg transition-all duration-200 shadow-sm hover:shadow-md hover:scale-105 active:scale-95">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                    </svg>
                    Buat Materi Pertama
                </button>
            </div>
        @else
            <!-- Lesson List -->
            <div id="lessons-list" class="divide-y divide-gray-100" wire:sortable="updateLessonOrder">
                @foreach ($lessons as $index => $lesson)
                    <div wire:key="lesson-{{ $lesson['id'] }}" wire:sortable.item="{{ $lesson['id'] }}"
                        data-id="{{ $lesson['id'] }}"
                        class="group p-5 lg:p-6 hover:bg-gray-50 transition-colors duration-200 flex items-start gap-4 lg:gap-6">

                        <!-- Drag Handle & Index -->
                        <div class="flex flex-col items-center gap-3 pt-1">
                            <div wire:sortable.handle
                                class="drag-handle cursor-grab active:cursor-grabbing p-2 rounded-md hover:bg-gray-200 transition-colors"
                                title="Seret untuk mengurutkan ulang">
                                <i class="fa-solid fa-grip-vertical text-gray-400"></i>
                            </div>
                            <span class="text-xs font-semibold text-gray-400 bg-gray-100 px-2.5 py-1 rounded">
                                {{ $index + 1 }}
                            </span>
                        </div>

                        <!-- Lesson Content -->
                        <div class="flex-1 min-w-0">

                            <!-- Title -->
                            <h3 class="text-base font-semibold text-gray-900 line-clamp-2">{{ $lesson['title'] }}</h3>
                        </div>

                        <!-- Action Buttons (appear on hover/mobile) -->
                        <div>
                            <a href="{{ route('editcourse', $course->id) }}"
                                class="inline-flex items-center px-3 py-2 bg-amber-50 text-amber-700 rounded-lg hover:bg-amber-100 transition text-sm font-medium">
                                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                </svg>
                                Edit
                            </a>
                            <button
                                onclick="confirmDelete({{ $lesson['id'] }} , '{{ addslashes($lesson['title']) }}' )"
                                class="inline-flex items-center px-3 py-2 bg-red-50 text-red-700 rounded-lg hover:bg-red-100 transition text-sm font-medium">
                                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                </svg>
                                Hapus
                            </button>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>

    <!-- Flash Messages -->
    @if (session()->has('success'))
        <div
            class="fixed bottom-4 right-4 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-lg shadow-lg animate-fade-in-up">
            <div class="flex items-center gap-2">
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M9 16.17L4.83 12l-1.42 1.41L9 19 21 7l-1.41-1.41z" />
                </svg>
                {{ session('success') }}
            </div>
        </div>
    @endif

    <style>
        @keyframes fade-in-up {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .animate-fade-in-up {
            animation: fade-in-up 0.3s ease-out;
        }

        .line-clamp-2 {
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }
    </style>

    <script>
        window.addEventListener('lesson-added', event => {
            Swal.fire({
                title: 'Berhasil!',
                text: event.detail.message, // Mengambil pesan dari PHP
                icon: 'success',
                timer: 2000, // Hilang otomatis dalam 2 detik
                showConfirmButton: false,
                timerProgressBar: true,
            });
        });

        function confirmDelete(id, title) {
            Swal.fire({
                title: 'Hapus Materi?',
                text: "Materi '" + title + "' akan dihapus permanen!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, Hapus!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Memanggil fungsi deleteLesson di class Livewire
                    @this.call('deleteLesson', id);
                }
            })
        }

        // Listen untuk notifikasi sukses (gunakan cara 'sakti' yang tadi)
        window.addEventListener('swal', event => {
            const data = event.detail[0];
            Swal.fire({
                title: data.title,
                text: data.text,
                icon: data.icon,
                timer: 2000,
                showConfirmButton: false
            });
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</div>
