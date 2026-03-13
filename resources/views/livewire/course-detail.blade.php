<div class="w-full min-h-screen font-poppins bg-white p-6 lg:p-8" style="background-color: #ffffff;">

    @script
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
            crossorigin="anonymous" referrerpolicy="no-referrer" />

        {{-- TinyMCE HARUS di sini, sebelum dipakai Alpine --}}
        <script src="https://cdn.tiny.cloud/1/tk53il8cfcy4hloxph6vcbh3inhxm1fn11srse1i98t67hpm/tinymce/8/tinymce.min.js"
            referrerpolicy="origin" crossorigin="anonymous"></script>

        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="https://cdn.jsdelivr.net/gh/livewire/sortable@v1.x.x/dist/livewire-sortable.js"></script>
    @endscript

    <!-- ===================== BREADCRUMB ===================== -->
    <nav class="flex mb-7" aria-label="Breadcrumb">
        <ol class="inline-flex items-center space-x-1 md:space-x-2">
            <li class="inline-flex items-center">
                <a href="{{ route('admindashboard') }}"
                    class="inline-flex items-center text-sm font-medium text-slate-500 hover:text-blue-600 transition-colors duration-200">
                    <svg class="w-3.5 h-3.5 mr-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        fill="currentColor" viewBox="0 0 20 20">
                        <path
                            d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L9 3.414V19a1 1 0 0 0 2 0V3.414l7.293 7.293a1 1 0 0 0 1.414-1.414Z" />
                    </svg>
                    Admin Panel
                </a>
            </li>
            <li>
                <div class="flex items-center">
                    <svg class="w-3 h-3 text-slate-300 mx-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 9 4-4-4-4" />
                    </svg>
                    <a href="{{ route('managecourses') }}"
                        class="ml-1 text-sm font-medium text-slate-500 hover:text-blue-600 transition-colors duration-200">Manage
                        Courses</a>
                </div>
            </li>
            <li>
                <div class="flex items-center">
                    <svg class="w-3 h-3 text-slate-300 mx-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 9 4-4-4-4" />
                    </svg>
                    <span
                        class="ml-1 text-sm font-semibold text-blue-600 bg-blue-50 px-2.5 py-0.5 rounded-full">{{ $course->title }}</span>
                </div>
            </li>
        </ol>
    </nav>

    <!-- ===================== COURSE HEADER CARD ===================== -->
    <div
        class="relative bg-white rounded-2xl shadow-sm border border-slate-100 p-6 lg:p-8 mb-6 overflow-hidden transition-shadow duration-300 hover:shadow-md">

        {{-- Decorative top accent bar --}}
        <div
            class="absolute top-0 left-0 right-0 h-1 bg-gradient-to-r from-blue-500 via-blue-400 to-indigo-500 rounded-t-2xl">
        </div>

        <div class="flex flex-col lg:flex-row items-start lg:items-center justify-between gap-6 pt-2">

            <!-- Course Identity -->
            <div class="flex items-center gap-4">
                <div
                    class="w-14 h-14 bg-gradient-to-br from-blue-500 to-indigo-600 rounded-xl flex items-center justify-center shadow-lg shadow-blue-200 flex-shrink-0">
                    <i class="fa-solid fa-graduation-cap text-white text-xl"></i>
                </div>
                <div>
                    <h1 class="text-xl lg:text-2xl font-bold text-slate-800 leading-tight">{{ $course->title }}</h1>
                    <p class="text-sm text-slate-400 mt-0.5 flex items-center gap-1.5">
                        <i class="fa-solid fa-tag text-blue-400 text-xs"></i>
                        {{ $course->category->name ?? 'Tanpa Kategori' }}
                    </p>
                </div>
            </div>

            <!-- Stats Badge -->
            <div class="flex items-stretch gap-3 w-full lg:w-auto">
                <div
                    class="flex-1 lg:flex-none bg-gradient-to-br from-blue-600 to-indigo-600 rounded-xl p-4 flex items-center gap-3 shadow-md shadow-blue-200 min-w-[140px]">
                    <div class="w-9 h-9 bg-white/20 rounded-lg flex items-center justify-center">
                        <i class="fa-solid fa-layer-group text-white text-sm"></i>
                    </div>
                    <div>
                        <p class="text-xs font-semibold text-blue-100 uppercase tracking-wider">Total Materi</p>
                        <p class="text-3xl font-extrabold text-white leading-none mt-1">{{ $lessonsCount }}</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Add Lesson Button -->
        <div class="mt-6 pt-5 border-t border-slate-100">
            <button wire:click="openAddLessonModal"
                class="group inline-flex items-center justify-center gap-2.5 px-6 py-2.5 bg-blue-600 hover:bg-blue-700 active:bg-blue-800 text-white font-semibold rounded-xl transition-all duration-200 shadow-sm shadow-blue-200 hover:shadow-md hover:shadow-blue-200 hover:-translate-y-0.5 active:translate-y-0">
                <div
                    class="w-5 h-5 bg-white/20 rounded-md flex items-center justify-center group-hover:bg-white/30 transition-colors">
                    <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M12 4v16m8-8H4" />
                    </svg>
                </div>
                <span>Tambah Materi Baru</span>
            </button>
        </div>

        <!-- ===================== ADD/EDIT LESSON MODAL ===================== -->
        @if ($openAddModal)
            <div>
                <div
                    class="fixed inset-0 z-50 flex items-center justify-center overflow-x-hidden overflow-y-auto outline-none focus:outline-none px-4">

                    {{-- Backdrop --}}
                    <div class="fixed inset-0 bg-slate-900/60 backdrop-blur-sm"></div>

                    {{-- Modal Panel --}}
                    <div class="relative w-full max-w-2xl mx-auto z-[60] animate-modal-in">
                        <div
                            class="relative flex flex-col w-full bg-white border-0 rounded-2xl shadow-2xl shadow-slate-900/20 outline-none focus:outline-none overflow-hidden">

                            {{-- Modal accent bar --}}
                            <div class="h-1 bg-gradient-to-r from-blue-500 via-blue-400 to-indigo-500"></div>

                            {{-- Modal Header --}}
                            <div class="flex items-center justify-between px-6 py-4 border-b border-slate-100">
                                <div class="flex items-center gap-3">
                                    <div class="w-8 h-8 bg-blue-50 rounded-lg flex items-center justify-center">
                                        <i
                                            class="fa-solid {{ $isEditMode ? 'fa-pen-to-square text-amber-500' : 'fa-plus text-blue-500' }} text-sm"></i>
                                    </div>
                                    <h3 class="text-lg font-bold text-slate-800">
                                        {{ $isEditMode ? 'Edit Materi' : 'Tambah Materi Baru' }}
                                    </h3>
                                </div>
                                <button wire:click="closeModal"
                                    class="w-8 h-8 rounded-lg flex items-center justify-center text-slate-400 hover:text-slate-600 hover:bg-slate-100 transition-all">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                                            d="M6 18L18 6M6 6l12 12" />
                                    </svg>
                                </button>
                            </div>

                            {{-- Modal Body --}}
                            <div class="p-6 space-y-5">

                                {{-- Judul Materi --}}
                                <div class="space-y-1.5">
                                    <label class="block text-sm font-semibold text-slate-700">
                                        Judul Materi
                                        <span class="text-red-400 ml-0.5">*</span>
                                    </label>
                                    <input type="text" wire:model="title" placeholder="Masukkan judul materi..."
                                        class="w-full px-4 py-2.5 rounded-xl border border-slate-200 bg-slate-50 text-slate-800 placeholder-slate-400 text-sm focus:outline-none focus:border-blue-400 focus:ring-2 focus:ring-blue-100 focus:bg-white transition-all duration-200">
                                    @error('title')
                                        <p class="text-red-500 text-xs flex items-center gap-1 mt-1">
                                            <i class="fa-solid fa-circle-exclamation"></i>
                                            {{ $message }}
                                        </p>
                                    @enderror
                                </div>

                                {{-- Konten / Link Video (TinyMCE) --}}
                                <div class="space-y-1.5">
                                    <label class="block text-sm font-semibold text-slate-700">
                                        Konten / Link Video
                                    </label>

                                    <div wire:ignore x-data="{
                                        initEditor() {
                                            if (tinymce.get('tinymce-content')) {
                                                tinymce.remove('#tinymce-content');
                                            }
                                    
                                            tinymce.init({
                                                selector: '#tinymce-content',
                                                menubar: false,
                                                statusbar: false,
                                                branding: false,
                                                min_height: 320,
                                                max_height: 500,
                                                plugins: 'code table lists',
                                                toolbar: 'bold italic underline | blocks | alignleft aligncenter alignright | bullist numlist | link | code | table | removeformat',
                                    
                                                setup: (ed) => {
                                                    ed.on('init', () => {
                                                        const val = $wire.get('content');
                                                        if (val) ed.setContent(val);
                                                    });
                                    
                                                    ed.on('input change', () => {
                                                        $wire.set('content', ed.getContent(), false);
                                                    });
                                    
                                                    ed.on('blur', () => {
                                                        $wire.set('content', ed.getContent());
                                                    });
                                                }
                                            });
                                        }
                                    }" x-init="$nextTick(() => initEditor())">
                                        <textarea id="tinymce-content"
                                            class="w-full px-4 py-2.5 rounded-xl border border-slate-200 bg-slate-50 text-slate-800 text-sm" rows="4"></textarea>
                                    </div>

                                    @error('content')
                                        <p class="text-red-500 text-xs flex items-center gap-1 mt-1">
                                            <i class="fa-solid fa-circle-exclamation"></i>
                                            {{ $message }}
                                        </p>
                                    @enderror
                                </div>
                            </div>

                            {{-- Modal Footer --}}
                            <div
                                class="flex items-center justify-end px-6 py-4 border-t border-slate-100 bg-slate-50/50 gap-3">
                                <button wire:click="closeModal"
                                    class="px-5 py-2.5 text-sm font-semibold text-slate-600 bg-white hover:bg-slate-100 border border-slate-200 rounded-xl transition-all duration-200">
                                    Batal
                                </button>
                                @if ($isEditMode)
                                    <button wire:click="updateLesson"
                                        class="px-6 py-2.5 bg-amber-500 hover:bg-amber-600 active:bg-amber-700 text-white text-sm font-bold rounded-xl shadow-sm shadow-amber-200 hover:shadow-md hover:shadow-amber-200 hover:-translate-y-0.5 transition-all duration-200">
                                        <i class="fa-solid fa-floppy-disk mr-1.5"></i>
                                        Update Materi
                                    </button>
                                @else
                                    <button wire:click="saveLesson"
                                        class="px-6 py-2.5 bg-blue-600 hover:bg-blue-700 active:bg-blue-800 text-white text-sm font-bold rounded-xl shadow-sm shadow-blue-200 hover:shadow-md hover:shadow-blue-200 hover:-translate-y-0.5 transition-all duration-200">
                                        <i class="fa-solid fa-plus mr-1.5"></i>
                                        Simpan Materi
                                    </button>
                                @endif
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>



    <!-- ===================== LESSON LIST / EMPTY STATE ===================== -->
    <div class="bg-white rounded-2xl shadow-sm border border-slate-100 overflow-hidden">

        @if ($lessonsCount === 0)
            <!-- Empty State -->
            <div class="p-14 lg:p-20 text-center">
                <div class="flex justify-center mb-6">
                    <div class="relative">
                        <div
                            class="w-24 h-24 bg-gradient-to-br from-blue-100 to-indigo-100 rounded-2xl flex items-center justify-center rotate-3">
                            <i class="fa-solid fa-folder-plus text-blue-500 text-4xl -rotate-3"></i>
                        </div>
                        {{-- Decorative dots --}}
                        <div class="absolute -top-2 -right-2 w-4 h-4 bg-blue-200 rounded-full opacity-60"></div>
                        <div class="absolute -bottom-1 -left-1 w-3 h-3 bg-indigo-200 rounded-full opacity-60"></div>
                    </div>
                </div>
                <h3 class="text-xl font-bold text-slate-800 mb-2">Belum Ada Materi</h3>
                <p class="text-slate-400 text-sm mb-8 max-w-xs mx-auto leading-relaxed">
                    Mulai dengan membuat materi pertama. Bisa berupa video, dokumen, atau kuis interaktif.
                </p>
                <button wire:click="openAddLessonModal"
                    class="group inline-flex items-center justify-center gap-2.5 px-6 py-2.5 bg-blue-600 hover:bg-blue-700 text-white font-semibold rounded-xl transition-all duration-200 shadow-sm shadow-blue-200 hover:shadow-md hover:-translate-y-0.5">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 4v16m8-8H4" />
                    </svg>
                    Buat Materi Pertama
                </button>
            </div>
        @else
            <!-- Lesson List Header -->
            <div class="px-5 lg:px-6 py-3.5 bg-slate-50 border-b border-slate-100 flex items-center gap-2">
                <i class="fa-solid fa-bars-staggered text-slate-400 text-sm"></i>
                <span class="text-xs font-semibold text-slate-400 uppercase tracking-wider">Daftar Materi</span>
                <span
                    class="ml-auto text-xs text-slate-400 font-medium bg-white border border-slate-200 px-2.5 py-0.5 rounded-full">{{ $lessonsCount }}
                    materi</span>
            </div>

            <!-- Sortable Lessons -->
            {{-- ID 'lessons-list' dan wire:sortable dipertahankan untuk fungsi drag-and-drop --}}
            <div id="lessons-list" class="divide-y divide-slate-50" wire:sortable="updateLessonOrder">

                @foreach ($lessons as $index => $lesson)
                    <div wire:key="lesson-{{ $lesson['id'] }}" wire:sortable.item="{{ $lesson['id'] }}"
                        data-id="{{ $lesson['id'] }}"
                        class="group flex items-center gap-4 lg:gap-5 px-5 lg:px-6 py-4 hover:bg-blue-50/30 transition-colors duration-150">

                        <!-- Drag Handle & Number -->
                        <div class="flex flex-col items-center gap-2.5 flex-shrink-0">
                            {{-- wire:sortable.handle dipertahankan, class 'drag-handle' dipertahankan --}}
                            <div wire:sortable.handle
                                class="drag-handle cursor-grab active:cursor-grabbing p-1.5 rounded-lg text-slate-300 hover:text-slate-500 hover:bg-slate-100 group-hover:text-slate-400 transition-all duration-200"
                                title="Seret untuk mengurutkan ulang">
                                <i class="fa-solid fa-grip-vertical text-sm"></i>
                            </div>
                            <span
                                class="text-xs font-bold text-slate-400 bg-slate-100 group-hover:bg-blue-100 group-hover:text-blue-500 w-6 h-6 flex items-center justify-center rounded-lg transition-colors duration-200">
                                {{ $index + 1 }}
                            </span>
                        </div>

                        <!-- Lesson Icon -->
                        <div
                            class="w-10 h-10 bg-blue-50 group-hover:bg-blue-100 rounded-xl flex items-center justify-center flex-shrink-0 transition-colors duration-200">
                            <i
                                class="fa-solid fa-play text-blue-400 text-xs group-hover:text-blue-500 transition-colors"></i>
                        </div>

                        <!-- Lesson Title -->
                        <div class="flex-1 min-w-0">
                            <h3
                                class="text-sm font-semibold text-slate-700 group-hover:text-slate-900 line-clamp-2 transition-colors duration-200">
                                {{ $lesson['title'] }}
                            </h3>
                        </div>

                        <!-- Action Buttons -->
                        <div
                            class="flex items-center gap-2 flex-shrink-0 opacity-60 group-hover:opacity-100 transition-opacity duration-200">
                            <button wire:click="openEditLessonModal({{ $lesson['id'] }})"
                                class="inline-flex items-center gap-1.5 px-3 py-1.5 bg-amber-50 text-amber-600 hover:bg-amber-100 hover:text-amber-700 border border-amber-100 hover:border-amber-200 rounded-lg transition-all duration-150 text-xs font-semibold">
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                </svg>
                                Edit
                            </button>

                            <button
                                onclick="confirmDelete({{ $lesson['id'] }}, '{{ addslashes($lesson['title']) }}')"
                                class="inline-flex items-center gap-1.5 px-3 py-1.5 bg-red-50 text-red-500 hover:bg-red-100 hover:text-red-700 border border-red-100 hover:border-red-200 rounded-lg transition-all duration-150 text-xs font-semibold">
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
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

    <!-- ===================== FLASH MESSAGE ===================== -->
    @if (session()->has('success'))
        <div
            class="fixed bottom-6 right-6 bg-white border border-green-200 text-green-700 px-5 py-3.5 rounded-xl shadow-lg shadow-green-100 animate-fade-in-up z-50">
            <div class="flex items-center gap-3">
                <div class="w-8 h-8 bg-green-100 rounded-lg flex items-center justify-center flex-shrink-0">
                    <svg class="w-4 h-4 text-green-600" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M9 16.17L4.83 12l-1.42 1.41L9 19 21 7l-1.41-1.41z" />
                    </svg>
                </div>
                <span class="text-sm font-semibold">{{ session('success') }}</span>
            </div>
        </div>
    @endif

    <!-- ===================== STYLES ===================== -->
    <style>
        /* Custom font fallback jika Google Fonts tidak termuat */
        .font-poppins {
            font-family: 'Poppins', 'Segoe UI', system-ui, sans-serif;
        }

        /* Animasi masuk untuk flash message toast */
        @keyframes fade-in-up {
            from {
                opacity: 0;
                transform: translateY(16px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .animate-fade-in-up {
            animation: fade-in-up 0.3s cubic-bezier(0.16, 1, 0.3, 1) both;
        }

        /* Animasi masuk untuk modal */
        @keyframes modal-in {
            from {
                opacity: 0;
                transform: scale(0.95) translateY(12px);
            }

            to {
                opacity: 1;
                transform: scale(1) translateY(0);
            }
        }

        .animate-modal-in {
            animation: modal-in 0.25s cubic-bezier(0.16, 1, 0.3, 1) both;
        }

        /* Truncate teks panjang pada judul lesson */
        .line-clamp-2 {
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        /* Pastikan drag handle tidak mengganggu layout saat diseret */
        .drag-handle {
            touch-action: none;
        }
    </style>

    <!-- ===================== SCRIPTS ===================== -->
    <script>
        // Notifikasi sukses saat materi berhasil ditambah (event dari Livewire)
        window.addEventListener('lesson-added', event => {
            Swal.fire({
                title: 'Berhasil!',
                text: event.detail.message,
                icon: 'success',
                timer: 2000,
                showConfirmButton: false,
                timerProgressBar: true,
            });
        });

        // Konfirmasi sebelum menghapus materi
        function confirmDelete(id, title) {
            Swal.fire({
                title: 'Hapus Materi?',
                text: "Materi '" + title + "' akan dihapus permanen!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#2563eb',
                cancelButtonColor: '#ef4444',
                confirmButtonText: 'Ya, Hapus!',
                cancelButtonText: 'Batal',
                borderRadius: '1rem',
                customClass: {
                    popup: 'rounded-2xl',
                    confirmButton: 'rounded-xl font-semibold',
                    cancelButton: 'rounded-xl font-semibold',
                }
            }).then((result) => {
                if (result.isConfirmed) {
                    // Memanggil fungsi deleteLesson di class Livewire
                    @this.call('deleteLesson', id);
                }
            });
        }

        // Listener untuk event swal generik dari Livewire
        window.addEventListener('swal', event => {
            const data = event.detail[0];
            Swal.fire({
                title: data.title,
                text: data.text,
                icon: data.icon,
                timer: 2000,
                showConfirmButton: false,
                customClass: {
                    popup: 'rounded-2xl',
                }
            });
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.tiny.cloud/1/tk53il8cfcy4hloxph6vcbh3inhxm1fn11srse1i98t67hpm/tinymce/8/tinymce.min.js"
        referrerpolicy="origin" crossorigin="anonymous"></script>

</div>
