<div class="w-full min-h-screen font-poppins bg-white p-6 lg:p-8 text-slate-900">

    <nav class="flex mb-6" aria-label="Breadcrumb">
        <ol class="inline-flex items-center space-x-1 md:space-x-3">
            <li class="inline-flex items-center">
                <a href="{{ route('admindashboard') }}"
                    class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600">
                    <svg class="w-3 h-3 mr-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                        viewBox="0 0 20 20">
                        <path
                            d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L9 3.414V19a1 1 0 0 0 2 0V3.414l7.293 7.293a1 1 0 0 0 1.414-1.414Z" />
                    </svg>
                    Admin Panel
                </a>
            </li>
            <li>
                <div class="flex items-center">
                    <svg class="w-3 h-3 text-gray-400 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 9 4-4-4-4" />
                    </svg>
                    <span class="ml-1 text-sm font-medium text-gray-500 md:ml-2">Manage Courses</span>
                </div>
            </li>
        </ol>
    </nav>

    <div class="mb-8 flex flex-col md:flex-row md:items-end justify-between gap-4">
        <div>
            <h1 class="text-4xl lg:text-5xl font-extrabold mb-2 tracking-tight text-slate-900">
                Manage Courses
            </h1>
            <p class="text-slate-600 text-lg font-medium">Atur Seluruh Course</p>
        </div>
        <a href="{{ route('createcourse') }}"
            class="inline-flex items-center justify-center px-6 py-3 bg-blue-600 hover:bg-blue-700 text-white font-semibold rounded-lg transition">
            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
            </svg>
            Tambah Kursus
        </a>
    </div>

<!-- Flash Message Handler -->

    <!-- Search Bar dan Filter -->
    <div class="relative mb-6 flex flex-row gap-2">
        <input type="text" wire:model.live="search" placeholder="Cari kursus..."
            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
        <button
            class="flex items-center justify-center w-11 h-11 bg-blue-600 hover:bg-blue-700 text-white rounded-lg transition-colors duration-200 focus:ring-2 focus:ring-blue-500 focus:ring-offset-2"
            onclick="toggleFilter()">
            <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                viewBox="0 0 20 20">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M7.75 4H19M7.75 4a2.25 2.25 0 0 1-4.5 0m4.5 0a2.25 2.25 0 0 0-4.5 0M1 4h2.25m13.5 6H19m-2.25 0a2.25 2.25 0 0 1-4.5 0m4.5 0a2.25 2.25 0 0 0-4.5 0M1 10h11.25m-4.5 6H19M7.75 16a2.25 2.25 0 0 1-4.5 0m4.5 0a2.25 2.25 0 0 0-4.5 0M1 16h2.25" />
            </svg>
        </button>

        <div id="filterPanel" style="display: none"
            class="w-48 right-0 border border-gray-700 rounded-lg absolute bg-white mt-4 z-10 shadow-lg">

            <button wire:click="$set('categories', null)"
                class="w-full text-left hover:bg-slate-100 p-3 border-b text-sm {{ $categories == null ? 'bg-blue-50' : '' }}">
                Semua Kategori
            </button>

            @foreach ($category as $cat)
                <button wire:click="$set('categories', {{ $cat->id }})"
                    class="w-full text-left hover:bg-slate-100 p-3 text-sm {{ $categories == $cat->id ? 'bg-blue-50 font-bold' : '' }}">
                    {{ $cat->name }}
                </button>
            @endforeach
        </div>
    </div>




    <!-- Courses Table -->
    @if ($courses->count() > 0)
        <div class="overflow-hidden bg-white border border-slate-200 rounded-2xl shadow-sm">
            <table class="w-full text-left border-collapse table-fixed">
                <thead class="bg-slate-50 border-b border-slate-200">
                    <tr>
                        <th class="px-6 py-4 text-xs font-bold text-slate-500 uppercase tracking-wider w-[25%]">Nama Kursus</th>
                        <th class="px-6 py-4 text-xs font-bold text-slate-500 uppercase tracking-wider w-[18%]">Kategori</th>
                        <th class="px-6 py-4 text-xs font-bold text-slate-500 uppercase tracking-wider w-[12%] text-center">Status</th>
                        <th class="px-6 py-4 text-xs font-bold text-slate-500 uppercase tracking-wider w-[25%]">Deskripsi</th>
                        <th class="px-6 py-4 text-center text-xs font-bold text-slate-500 uppercase tracking-wider w-48">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-200">
                    @foreach ($courses as $course)
                        <tr class="group hover:bg-slate-50/50 transition-colors duration-200">
                            <td class="px-6 py-5 align-top">
                                <div class="flex items-center gap-4">
                                    <div class="relative flex-shrink-0">
                                        @if ($course->thumbnail)
                                            <img src="{{ asset($course->thumbnail) }}" alt="{{ $course->title }}"
                                                class="w-14 h-14 rounded-xl object-cover shadow-sm ring-1 ring-slate-200">
                                        @else
                                            <div class="w-14 h-14 rounded-xl bg-slate-100 flex items-center justify-center ring-1 ring-slate-200">
                                                <svg class="w-6 h-6 text-slate-400" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                                </svg>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="min-w-0">
                                        <p class="font-bold text-slate-800 text-base leading-tight truncate" title="{{ $course->title }}">{{ $course->title }}</p>
                                        <span class="text-[10px] font-bold text-slate-400 block mt-1 uppercase tracking-tighter">ID: #{{ $course->id }}</span>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-5 align-top">
                                @if ($course->category)
                                    <span class="inline-flex items-center px-3 py-1 bg-blue-50 text-blue-700 rounded-full text-xs font-semibold border border-blue-100 whitespace-nowrap">
                                        {{ $course->category->name }}
                                    </span>
                                @else
                                    <span class="text-slate-300 italic text-sm">Tanpa Kategori</span>
                                @endif
                            </td>
                            <td class="px-6 py-5 align-top text-center">
                                @if($course->is_published)
                                    <span class="inline-flex items-center px-2.5 py-1 rounded-full bg-emerald-50 text-emerald-700 text-[11px] font-bold uppercase tracking-wider border border-emerald-100 shadow-sm">
                                        <span class="w-1.5 h-1.5 rounded-full bg-emerald-500 mr-2 animate-pulse"></span>
                                        Published
                                    </span>
                                @else
                                    <span class="inline-flex items-center px-2.5 py-1 rounded-full bg-slate-100 text-slate-500 text-[11px] font-bold uppercase tracking-wider border border-slate-200 shadow-sm">
                                        <span class="w-1.5 h-1.5 rounded-full bg-slate-400 mr-2"></span>
                                        Draft
                                    </span>
                                @endif
                            </td>
                            <td class="px-6 py-5 align-top">
                                <p class="text-sm text-slate-600 truncate" title="{{ strip_tags($course->description) }}">
                                    {{ Str::limit(strip_tags($course->description), 45) }}
                                </p>
                            </td>
                            <td class="px-6 py-5 align-top text-center">
                                <div class="flex items-center justify-center gap-2">
                                    <a href="{{ route('editcourse', $course->id) }}"
                                        class="p-2 bg-amber-50 text-amber-600 rounded-lg hover:bg-amber-100 hover:text-amber-700 transition-all border border-amber-100 shadow-sm"
                                        title="Edit Kursus">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                        </svg>
                                    </a>
                                    <a href="{{ route('coursedetail', $course->id) }}"
                                        class="p-2 bg-blue-50 text-blue-600 rounded-lg hover:bg-blue-100 hover:text-blue-700 transition-all border border-blue-100 shadow-sm"
                                        title="Lihat Materi">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                        </svg>
                                    </a>
                                    <button wire:click="deleteCourse({{ $course->id }})"
                                        wire:confirm="Apakah Anda yakin ingin menghapus kursus ini?"
                                        class="p-2 bg-red-50 text-red-600 rounded-lg hover:bg-red-100 hover:text-red-700 transition-all border border-red-100 shadow-sm"
                                        title="Hapus Kursus">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                        </svg>
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
