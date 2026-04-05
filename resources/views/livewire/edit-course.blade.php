{{-- filepath: d:\Project Coding\intellecthub\resources\views\livewire\edit-course.blade.php --}}
<div class="w-full min-h-screen font-poppins bg-white p-6 lg:p-8 text-slate-900">
    <!-- Breadcrumbs -->
    <nav class="flex mb-6" aria-label="Breadcrumb">
        <ol class="inline-flex items-center space-x-1 md:space-x-3">
            <li class="inline-flex items-center">
                <a href="{{ route('admindashboard') }}"
                    class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600 transition-colors">
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
                    <a href="{{ route('managecourses') }}" class="ml-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ml-2 transition-colors">Manage Courses</a>
                </div>
            </li>
            <li aria-current="page">
                <div class="flex items-center">
                    <svg class="w-3 h-3 text-gray-400 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 9 4-4-4-4" />
                    </svg>
                    <span class="ml-1 text-sm font-medium text-gray-500 md:ml-2">Edit Kursus</span>
                </div>
            </li>
        </ol>
    </nav>

    <!-- Header -->
    <div class="mb-8">
        <h1 class="text-4xl lg:text-5xl font-extrabold mb-2 tracking-tight text-slate-900">
            Edit Kursus
        </h1>
        <p class="text-slate-600 text-lg font-medium">Perbarui informasi dan materi kursus Anda</p>
    </div>

    <!-- Main Content Grid -->
    <form wire:submit.prevent="update" class="grid grid-cols-1 xl:grid-cols-3 gap-8 pb-12">
        
        <!-- Kolom Kiri: Informasi Utama -->
        <div class="xl:col-span-2 space-y-6">
            <div class="bg-white p-6 lg:p-8 rounded-2xl shadow-sm border border-slate-200">
                <h2 class="text-xl font-bold text-slate-800 mb-6 flex items-center gap-2">
                    <i class="fa-solid fa-file-pen text-blue-600"></i> Informasi Dasar
                </h2>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                    <!-- Nama Kursus -->
                    <div>
                        <label class="block text-sm font-bold text-slate-700 mb-2">Nama Kursus</label>
                        <input type="text" wire:model="title"
                            class="w-full px-4 py-3 bg-slate-50 border border-slate-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 focus:bg-white transition-all shadow-sm"
                            placeholder="Masukkan nama kursus">
                        @error('title') <span class="text-red-500 text-sm mt-1.5 font-medium block">{{ $message }}</span> @enderror
                    </div>

                    <!-- Kategori -->
                    <div>
                        <label class="block text-sm font-bold text-slate-700 mb-2">Kategori</label>
                        <select wire:model="category_id"
                            class="w-full px-4 py-3 bg-slate-50 border border-slate-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 focus:bg-white transition-all shadow-sm">
                            <option value="">Pilih Kategori</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                        @error('category_id') <span class="text-red-500 text-sm mt-1.5 font-medium block">{{ $message }}</span> @enderror
                    </div>
                </div>

                <!-- Deskripsi -->
                <div class="w-full" wire:ignore>
                    <label class="block text-sm font-bold text-slate-700 mb-2">Deskripsi Kursus</label>
                    <textarea id="description" wire:model="description"
                        class="w-full px-4 py-3 bg-slate-50 border border-slate-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 focus:bg-white transition-all shadow-sm"
                        placeholder="Deskripsikan apa yang akan dipelajari..." rows="12"></textarea>
                    @error('description') <span class="text-red-500 text-sm mt-1.5 font-medium block hover:text-red-600 transition-colors">{{ $message }}</span> @enderror
                </div>
            </div>
        </div>

        <!-- Kolom Kanan: Pengaturan & Media -->
        <div class="space-y-6">
            
            <!-- Pengaturan Publikasi -->
            <div class="bg-white p-6 rounded-2xl shadow-sm border border-slate-200">
                <h2 class="text-xl font-bold text-slate-800 mb-5 flex items-center gap-2">
                    <i class="fa-solid fa-toggle-on text-emerald-600"></i> Publikasi
                </h2>
                
                <div class="border {{ $is_published ? 'bg-emerald-50 border-emerald-200' : 'bg-slate-50 border-slate-200' }} p-4 rounded-xl transition-colors duration-300">
                    <div class="flex items-center justify-between">
                        <div>
                            <span class="font-bold {{ $is_published ? 'text-emerald-800' : 'text-slate-800' }} text-sm block mb-1">Status Kursus</span>
                            <span class="text-xs {{ $is_published ? 'text-emerald-600' : 'text-slate-500' }}">
                                {{ $is_published ? 'Aktif - Terlihat di katalog' : 'Draft - Disembunyikan' }}
                            </span>
                        </div>
                        <label class="relative inline-flex items-center cursor-pointer">
                            <input type="checkbox" wire:model.live="is_published" class="sr-only peer">
                            <div class="w-11 h-6 bg-slate-300 peer-focus:outline-none peer-focus:ring-2 peer-focus:ring-emerald-300 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-slate-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-emerald-500 shadow-inner"></div>
                        </label>
                    </div>
                    @error('is_published')
                        <div class="mt-3 flex items-start gap-2 text-xs font-semibold text-red-700 bg-red-100 p-2.5 rounded-lg border border-red-200">
                            <i class="fa-solid fa-circle-exclamation mt-0.5"></i>
                            <span>{{ $message }}</span>
                        </div>
                    @enderror
                </div>
            </div>

            <!-- Thumbnail Media -->
            <div class="bg-white p-6 rounded-2xl shadow-sm border border-slate-200">
                <h2 class="text-xl font-bold text-slate-800 mb-4 flex items-center gap-2">
                    <i class="fa-solid fa-images text-purple-600"></i> Media Banner
                </h2>
                
                <!-- Thumbnail Preview Logic -->
                @if ($thumbnail)
                    <div class="mb-4 relative rounded-xl overflow-hidden border-2 border-blue-500 shadow-lg ring-4 ring-blue-50">
                        <img src="{{ $thumbnail->temporaryUrl() }}" alt="Preview Baru" class="w-full h-48 object-cover scale-105 transition-transform duration-500">
                        <div class="absolute inset-x-0 bottom-0 bg-gradient-to-t from-blue-900/80 to-transparent p-4">
                            <span class="text-white text-xs font-bold uppercase tracking-wider flex items-center gap-2">
                                <i class="fa-solid fa-circle-check animate-pulse text-blue-300"></i> Siap Disimpan
                            </span>
                        </div>
                    </div>
                @elseif ($existing_thumbnail)
                    <div class="mb-4 relative group rounded-xl overflow-hidden border border-slate-200 shadow-sm">
                        <img src="/{{ $existing_thumbnail }}" alt="Cover" class="w-full h-48 object-cover">
                        <div class="absolute inset-0 bg-slate-900/60 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center backdrop-blur-sm">
                            <span class="text-white text-sm font-medium px-4 py-1.5 bg-black/50 rounded-full border border-white/20">Gambar Terpasang</span>
                        </div>
                    </div>
                @endif

                <div class="flex items-center justify-center w-full">
                    <label for="new_thumbnail" class="flex flex-col items-center justify-center w-full h-32 border-2 border-slate-300 border-dashed rounded-xl cursor-pointer bg-slate-50 hover:bg-blue-50 hover:border-blue-300 transition-all group">
                        <div class="flex flex-col items-center justify-center pt-5 pb-6">
                            <i class="fa-solid fa-cloud-arrow-up text-3xl mb-2 text-slate-400 group-hover:text-blue-500 transition-colors"></i>
                            <p class="mb-1 text-sm text-slate-500 group-hover:text-blue-600 transition-colors"><span class="font-bold">Klik untuk unggah</span> gambar baru</p>
                            <p class="text-xs text-slate-400 font-medium">PNG, JPG or JPEG (Max 2MB)</p>
                        </div>
                        <input type="file" id="new_thumbnail" wire:model="thumbnail" class="hidden" accept="image/*" />
                    </label>
                </div>
                @error('thumbnail') <span class="text-red-500 text-sm mt-2 font-medium block">{{ $message }}</span> @enderror
                <div wire:loading wire:target="thumbnail" class="text-blue-600 text-sm mt-2 font-medium flex items-center gap-2">
                    <i class="fa-solid fa-spinner fa-spin"></i> Mengunggah gambar...
                </div>
            </div>

            <!-- Tombol Aksi -->
            <div class="bg-slate-50 p-6 rounded-2xl border border-slate-200 flex flex-col sm:flex-row gap-3">
                 <a href="{{ route('managecourses') }}"
                    class="flex-1 px-4 py-3 bg-white border border-slate-300 hover:bg-slate-100 hover:text-slate-900 text-slate-700 rounded-xl font-bold transition-all shadow-sm flex items-center justify-center gap-2">
                    <i class="fa-solid fa-xmark"></i>
                    Batal
                </a>
                <button type="submit"
                    class="flex-1 px-4 py-3 bg-blue-600 hover:bg-blue-700 text-white rounded-xl font-bold transition-all shadow-sm shadow-blue-600/20 flex items-center justify-center gap-2"
                    wire:loading.attr="disabled">
                    <span wire:loading.remove wire:target="update" class="flex items-center gap-2">
                        <i class="fa-solid fa-floppy-disk"></i>
                        Simpan
                    </span>
                    <span wire:loading wire:target="update" class="flex items-center gap-2">
                        <i class="fa-solid fa-spinner fa-spin"></i>
                        Menyimpan...
                    </span>
                </button>
            </div>
        </div>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@push('scripts')
    <script src="https://cdn.tiny.cloud/1/tk53il8cfcy4hloxph6vcbh3inhxm1fn11srse1i98t67hpm/tinymce/8/tinymce.min.js"
        referrerpolicy="origin" crossorigin="anonymous"></script>
    <script>
        let editor;

        function initTinyMCE() {
            if (tinymce.get('description')) {
                tinymce.get('description').remove();
            }

            tinymce.init({
                selector: 'textarea#description',
                plugins: 'code table lists',
                toolbar: 'undo redo | blocks | bold italic | alignleft aligncenter alignright | indent outdent | bullist numlist | code | table',
                setup: function(ed) {
                    editor = ed;

                    ed.on('init', function(e) {
                        console.log('TinyMCE initialized');
                    });

                    // Sync content to Livewire on multiple events
                    ed.on('change keyup NodeChange blur ExecCommand', function(e) {
                        @this.set('description', ed.getContent());
                    });
                }
            });
        }

        document.addEventListener('DOMContentLoaded', function() {
            initTinyMCE();
        });

        document.addEventListener('livewire:navigated', function() {
            initTinyMCE();
        });

        window.addEventListener('beforeunload', function() {
            if (editor) {
                @this.set('description', editor.getContent());
            }
        });

        // Listen untuk event courseUpdated
        Livewire.on('courseUpdated', function() {
            Swal.fire({
                icon: 'success',
                title: 'Berhasil!',
                text: 'Kursus berhasil diperbarui!',
                showConfirmButton: false,
                timer: 2000,
                timerProgressBar: true,
                didOpen: () => {
                    // Redirect back to manage courses after the success message
                    setTimeout(() => {
                        window.location.href = '{{ route("managecourses") }}';
                    }, 2000);
                }
            });
        });

        // Listen untuk event swal:error (saat validasi gagal)
        Livewire.on('swal:error', function(errorInfo) {
            let data = Array.isArray(errorInfo) ? errorInfo[0] : errorInfo;
            Swal.fire({
                icon: 'error',
                title: data.title || 'Error',
                text: data.text || 'Terjadi kesalahan.',
                confirmButtonText: 'Tutup',
                confirmButtonColor: '#dc2626'
            });
        });
    </script>
@endpush
