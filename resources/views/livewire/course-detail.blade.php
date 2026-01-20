<div class="w-full min-h-screen font-poppins bg-white p-6 lg:p-8" style="background-color: #ffffff;">
    @script
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/sortablejs@1.15.0/Sortable.min.js"></script>
    @endscript

    <!-- Breadcrumb Navigation -->
    <nav class="flex mb-8" aria-label="Breadcrumb">
        <ol class="inline-flex items-center space-x-1 md:space-x-3">
            <li class="inline-flex items-center">
                <a href="{{ route('dashboard') }}"
                    class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600 transition-colors">
                    <svg class="w-3 h-3 mr-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                        viewBox="0 0 20 20">
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
                        class="ml-1 text-sm font-medium text-gray-700 hover:text-blue-600 transition-colors">Kelola Kursus</a>
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
                            <div class="w-12 h-12 bg-gradient-to-br from-blue-500 to-blue-600 rounded-lg flex items-center justify-center shadow-sm">
                        <i class="fa-solid fa-graduation-cap text-white text-lg"></i>
                    </div>
                    <div>
                        <h1 class="text-2xl lg:text-3xl font-bold text-gray-900">{{ $course->title }}</h1>
                        <p class="text-sm text-gray-500 mt-1">{{ $course->category->name ?? 'Umum' }}</p>
                    </div>
                </div>
            </div>

            <!-- Course Stats -->
            <div class="grid grid-cols-2 gap-4 w-full lg:w-auto">
                <div class="bg-gradient-to-br from-blue-50 to-blue-100 rounded-lg p-4 border border-blue-200 flex items-center gap-3">
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
    </div>

    <!-- Empty State or Lesson List -->
    <div class="bg-white rounded-lg shadow-sm border border-gray-100 overflow-hidden">
        @if ($lessonsCount === 0)
            <!-- Empty State -->
            <div class="p-12 lg:p-16 text-center">
                <div class="flex justify-center mb-6">
                    <div class="w-24 h-24 bg-gradient-to-br from-blue-100 to-blue-50 rounded-full flex items-center justify-center">
                        <i class="fa-solid fa-folder-plus text-blue-500 text-3xl"></i>
                    </div>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-2">Belum Ada Materi</h3>
                <p class="text-gray-500 mb-8 max-w-md mx-auto">Mulai dengan membuat materi pertama untuk kursus ini. Materi dapat berupa video, dokumen, atau kuis interaktif.</p>
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
            <div id="lessons-list" class="divide-y divide-gray-100">
                @foreach ($lessons as $index => $lesson)
                    <div wire:key="lesson-{{ $lesson['id'] }}" data-id="{{ $lesson['id'] }}"
                        class="group p-5 lg:p-6 hover:bg-gray-50 transition-colors duration-200 flex items-start gap-4 lg:gap-6">

                        <!-- Drag Handle & Index -->
                            <div class="flex flex-col items-center gap-3 pt-1">
                            <div class="drag-handle cursor-grab active:cursor-grabbing p-2 rounded-md hover:bg-gray-200 transition-colors" title="Seret untuk mengurutkan ulang">
                                <i class="fa-solid fa-grip-vertical text-gray-400"></i>
                            </div>
                            <span class="text-xs font-semibold text-gray-400 bg-gray-100 px-2.5 py-1 rounded">
                                {{ $index + 1 }}
                            </span>
                        </div>

                        <!-- Lesson Content -->
                        <div class="flex-1 min-w-0">
                            <!-- Section Badge (if exists) -->
                            @if (!empty($lesson['section_name'] ?? null))
                                <div class="inline-block mb-3">
                                    <span class="inline-block px-3 py-1 bg-amber-100 text-amber-700 text-xs font-semibold rounded-full">
                                        {{ $lesson['section_name'] }}
                                    </span>
                                </div>
                            @endif

                            <!-- Title & Type -->
                            <div class="flex items-start gap-3 mb-2">
                                <!-- Content Type Icon -->
                                <div class="flex-shrink-0 mt-0.5">
                                    @php 
                                        $type = $lesson['content_type'] ?? 'video';
                                        $iconConfig = [
                                            'video' => ['icon' => 'fa-video', 'bg' => 'bg-red-100', 'text' => 'text-red-600'],
                                            'document' => ['icon' => 'fa-file-lines', 'bg' => 'bg-blue-100', 'text' => 'text-blue-600'],
                                            'article' => ['icon' => 'fa-book', 'bg' => 'bg-purple-100', 'text' => 'text-purple-600'],
                                            'quiz' => ['icon' => 'fa-question', 'bg' => 'bg-green-100', 'text' => 'text-green-600'],
                                            'other' => ['icon' => 'fa-box', 'bg' => 'bg-gray-100', 'text' => 'text-gray-600'],
                                        ];
                                        $config = $iconConfig[$type] ?? $iconConfig['other'];
                                    @endphp
                                    <div class="w-8 h-8 {{ $config['bg'] }} rounded-lg flex items-center justify-center">
                                        <i class="fa-solid {{ $config['icon'] }} {{ $config['text'] }}"></i>
                                    </div>
                                </div>

                                <!-- Title -->
                                <div>
                                    <h3 class="text-base font-semibold text-gray-900 line-clamp-2">{{ $lesson['title'] }}</h3>
                                    <p class="text-xs text-gray-500 mt-1 capitalize">
                                        @php
                                            $typeNames = [
                                                'video' => 'Video',
                                                'document' => 'Dokumen',
                                                'article' => 'Materi Teks',
                                                'quiz' => 'Kuis',
                                                'other' => 'Lainnya'
                                            ];
                                        @endphp
                                        {{ $typeNames[$type] ?? ucfirst($type) }} • {{ $lesson['duration'] ?? 5 }} menit
                                    </p>
                                </div>
                            </div>

                            <!-- Description -->
                            @if (!empty($lesson['description'] ?? null))
                                <p class="text-sm text-gray-600 line-clamp-2 mt-2">{{ $lesson['description'] }}</p>
                            @endif
                        </div>

                        <!-- Action Buttons (appear on hover/mobile) -->
                            <div class="flex items-center gap-2 flex-shrink-0 opacity-0 lg:group-hover:opacity-100 transition-opacity duration-200 lg:translate-x-2 lg:group-hover:translate-x-0">
                            <button wire:click="openEditLessonModal({{ $lesson['id'] }})"
                                class="inline-flex items-center justify-center w-9 h-9 rounded-lg bg-blue-100 hover:bg-blue-600 text-blue-600 hover:text-white transition-all duration-200 hover:scale-110 active:scale-95"
                                title="Edit">
                                <i class="fa-solid fa-pen text-sm"></i>
                            </button>
                            <button onclick="confirmDelete({{ $lesson['id'] }}, '{{ addslashes($lesson['title']) }}')"
                                class="inline-flex items-center justify-center w-9 h-9 rounded-lg bg-red-100 hover:bg-red-600 text-red-600 hover:text-white transition-all duration-200 hover:scale-110 active:scale-95"
                                title="Hapus">
                                <i class="fa-solid fa-trash text-sm"></i>
                            </button>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>

    <!-- Flash Messages -->
    @if (session()->has('success'))
        <div class="fixed bottom-4 right-4 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-lg shadow-lg animate-fade-in-up">
            <div class="flex items-center gap-2">
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M9 16.17L4.83 12l-1.42 1.41L9 19 21 7l-1.41-1.41z" />
                </svg>
                {{ session('success') }}
            </div>
        </div>
    @endif

    @this

    <!-- Add/Edit Modal -->
    @if ($showModal)
        <div class="fixed inset-0 z-50 overflow-y-auto" wire:click.self="closeModal">
            <!-- Overlay -->
            <div class="fixed inset-0 bg-black bg-opacity-50 transition-opacity"></div>

            <!-- Modal -->
            <div class="relative min-h-screen flex items-center justify-center p-4">
                <div class="relative bg-white rounded-lg shadow-xl max-w-2xl w-full max-h-[90vh] overflow-y-auto">

                    <!-- Modal Header -->
                    <div class="sticky top-0 flex items-center justify-between p-6 border-b border-gray-100 bg-white">
                        <div>
                            <h2 class="text-2xl font-bold text-gray-900">
                                {{ $isEditing ? 'Edit Materi' : 'Tambah Materi Baru' }}
                            </h2>
                            <p class="text-sm text-gray-500 mt-1">{{ $course->title }}</p>
                        </div>
                        <button wire:click="closeModal"
                            class="inline-flex items-center justify-center w-10 h-10 rounded-lg hover:bg-gray-100 text-gray-600 transition-colors">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>

                    <!-- Modal Body -->
                    <form wire:submit="saveLessonLesson" class="p-6 space-y-6">

                        <!-- Section Name -->
                        <div>
                            <label for="sectionName" class="block text-sm font-semibold text-gray-900 mb-2">
                                Nama Bagian <span class="text-gray-400">(Opsional)</span>
                            </label>
                            <input type="text" wire:model="sectionName" id="sectionName" placeholder="Contoh: Pengenalan, Implementasi Dasar"
                                class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-600 focus:border-transparent transition-all">
                            @error('sectionName')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Title -->
                        <div>
                            <label for="title" class="block text-sm font-semibold text-gray-900 mb-2">Judul Materi *</label>
                            <input type="text" wire:model="title" id="title" placeholder="Masukkan judul materi"
                                class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-600 focus:border-transparent transition-all">
                            @error('title')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Content Type -->
                        <div>
                            <label for="contentType" class="block text-sm font-semibold text-gray-900 mb-2">Jenis Konten *</label>
                            <select wire:model.live="contentType" id="contentType"
                                class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-600 focus:border-transparent transition-all">
                                <option value="video">📹 Video</option>
                                <option value="document">📄 Dokumen</option>
                                <option value="article">📝 Materi Teks & Gambar</option>
                                <option value="quiz">❓ Kuis</option>
                                <option value="other">📦 Lainnya</option>
                            </select>
                            @error('contentType')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Content URL/Link -->
                        <div>
                            <label for="content" class="block text-sm font-semibold text-gray-900 mb-2">
                                @if ($contentType === 'article')
                                    Konten Materi *
                                @else
                                    Konten (URL/Link) *
                                @endif
                            </label>
                            @if ($contentType === 'article')
                                <textarea wire:model="content" id="content" rows="6" placeholder="Tuliskan konten materi dengan teks dan deskripsi gambar..."
                                    class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-600 focus:border-transparent transition-all resize-none"></textarea>
                                <p class="mt-2 text-xs text-gray-500">💡 Anda dapat menulis konten dalam format teks dengan detail lengkap. Untuk gambar, berikan deskripsi atau URL.</p>
                            @else
                                <input type="text" wire:model="content" id="content" placeholder="Masukkan URL atau path file"
                                    class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-600 focus:border-transparent transition-all">
                                <p class="mt-2 text-xs text-gray-500">
                                    @if ($contentType === 'video')
                                        Contoh: https://youtube.com/embed/... atau https://vimeo.com/...
                                    @elseif ($contentType === 'document')
                                        Contoh: /storage/documents/file.pdf atau link ke Google Drive
                                    @elseif ($contentType === 'quiz')
                                        Contoh: /quizzes/1 atau link ke quiz eksternal
                                    @else
                                        Masukkan URL atau path file
                                    @endif
                                </p>
                            @endif
                            @error('content')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Description -->
                        <div>
                            <label for="description" class="block text-sm font-semibold text-gray-900 mb-2">
                                Deskripsi <span class="text-gray-400">(Opsional)</span>
                            </label>
                            <textarea wire:model="description" id="description" rows="4" placeholder="Jelaskan apa yang akan dipelajari dalam materi ini"
                                class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-600 focus:border-transparent transition-all resize-none"></textarea>
                            @error('description')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Duration -->
                        <div>
                            <label for="duration" class="block text-sm font-semibold text-gray-900 mb-2">Durasi (menit) *</label>
                            <input type="number" wire:model="duration" id="duration" min="1" placeholder="Contoh: 15"
                                class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-600 focus:border-transparent transition-all">
                            @error('duration')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Modal Footer -->
                        <div class="flex items-center justify-end gap-3 pt-6 border-t border-gray-100">
                            <button type="button" wire:click="closeModal"
                                class="px-6 py-2.5 text-gray-700 font-semibold bg-gray-100 hover:bg-gray-200 rounded-lg transition-all duration-200">
                                Batal
                            </button>
                            <button type="submit"
                                class="px-6 py-2.5 bg-blue-600 hover:bg-blue-700 text-white font-semibold rounded-lg transition-all duration-200 shadow-sm hover:shadow-md hover:scale-105 active:scale-95">
                                {{ $isEditing ? 'Perbarui Materi' : 'Tambah Materi' }}
                            </button>
                        </div>
                    </form>
                </div>
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
        // Initialize Sortable and re-init after Livewire updates
        function initSortable() {
            const el = document.getElementById('lessons-list');
            if (!el) return;

            // Destroy existing Sortable instance
            if (window.lessonsSortable) {
                try { window.lessonsSortable.destroy(); } catch (e) {}
            }

            window.lessonsSortable = Sortable.create(el, {
                handle: '.drag-handle',
                animation: 150,
                ghostClass: 'opacity-50 bg-gray-100',
                onEnd: function () {
                    const ids = Array.from(el.querySelectorAll('[data-id]')).map(i => {
                        const id = parseInt(i.dataset.id);
                        console.log('Extracted ID:', id);
                        return id;
                    });
                    console.log('Reordering with IDs:', ids);
                    
                    // Use proper Livewire v3 dispatch method
                    @this.call('reorderLessons', ids);
                }
            });
        }

        document.addEventListener('DOMContentLoaded', function () {
            initSortable();

            // Re-initialize Sortable after Livewire updates
            document.addEventListener('livewire:updated', function () {
                initSortable();
            });

            // Confirm delete using SweetAlert then call Livewire
            window.confirmDelete = function(id, title) {
                Swal.fire({
                    title: 'Hapus materi?',
                    text: "Anda akan menghapus: " + title,
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#3085d6',
                    confirmButtonText: 'Ya, hapus',
                    cancelButtonText: 'Batal'
                }).then((result) => {
                    if (result.isConfirmed) {
                        @this.call('deleteLesson', id);
                    }
                });
            }

            // SweetAlert listeners
            Livewire.on('lesson-created', (data) => {
                Swal.fire({icon:'success', title: data.title || 'Berhasil', text: data.message || 'Materi berhasil ditambahkan!', timer:2000, showConfirmButton:false});
            });
            Livewire.on('lesson-updated', (data) => {
                Swal.fire({icon:'success', title: data.title || 'Berhasil', text: data.message || 'Materi berhasil diperbarui!', timer:2000, showConfirmButton:false});
            });
            Livewire.on('lesson-deleted', (data) => {
                Swal.fire({icon:'success', title: data.title || 'Dihapus', text: data.message || 'Materi berhasil dihapus!', timer:2000, showConfirmButton:false});
            });
            Livewire.on('lesson-reordered', (data) => {
                Swal.fire({icon:'success', title: data.title || 'Berhasil', text: data.message || 'Urutan materi berhasil diperbarui!', timer:2000, showConfirmButton:false});
            });
            Livewire.on('lesson-error', (data) => {
                Swal.fire({icon:'error', title:'Gagal', text: data.message || 'Terjadi kesalahan!'});
            });
        });
    </script>

</div>
