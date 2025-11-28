{{-- filepath: d:\Project Coding\intellecthub\resources\views\livewire\edit-course.blade.php --}}
<div class="font-poppins">
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
                    Course
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
            <li>
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

    <div class="w-full flex flex-col items-center">
        <div class="flex items-center">
            <div class="mb-4 lg:mb-0">
                <h1 class="text-4xl text-gray-800 font-bold mb-2">Edit Kursus</h1>
                <p class="text-gray-600">Perbarui informasi kursus Anda</p>
            </div>
        </div>

        <div class="w-full max-w-2xl flex justify-center p-6 rounded-3xl shadow bg-white">
            <form wire:submit.prevent="update" class="space-y-6 w-full">
                <!-- Nama Kursus -->
                <div class="max-w-full">
                    <label class="block text-sm font-medium text-gray-700 mb-2">Nama Kursus</label>
                    <input type="text" wire:model="title"
                        class="w-full px-4 py-2.5 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all"
                        placeholder="Masukkan nama kursus">
                    @error('title')
                        <span class="text-red-500 text-sm mt-1 block">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Deskripsi -->
                <div class="w-full" wire:ignore>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Deskripsi</label>
                    <textarea id="description" wire:model="description"
                        class="w-full px-4 py-2.5 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all"
                        placeholder="Masukkan deskripsi kursus" rows="6"></textarea>
                    @error('description')
                        <span class="text-red-500 text-sm mt-1 block">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Kategori -->
                <div class="max-w-full">
                    <label class="block text-sm font-medium text-gray-700 mb-2">Kategori</label>
                    <select wire:model="category_id"
                        class="w-full px-4 py-2.5 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all">
                        <option value="">Pilih Kategori</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                    @error('category_id')
                        <span class="text-red-500 text-sm mt-1 block">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Thumbnail -->
                <div class="max-w-full">
                    <label for="thumbnail" class="block text-sm font-medium text-gray-700 mb-2">Gambar Kursus</label>

                    @if ($existing_thumbnail)
                        <div class="mb-4 p-4 bg-gray-50 rounded-lg border border-gray-200">
                            <p class="text-sm text-gray-600 mb-3 font-medium">Thumbnail Saat Ini:</p>
                            <img src="/{{ $existing_thumbnail }}" alt="Current thumbnail"
                                class="w-40 h-40 object-cover rounded-lg shadow-md">
                            <p class="text-xs text-gray-500 mt-2">Upload gambar baru untuk mengganti</p>
                        </div>
                    @endif

                    <input type="file" id="thumbnail" wire:model="thumbnail" accept="image/*"
                        class="block w-full text-sm text-gray-500 file:mr-4 file:py-2.5 file:px-4 
                                       file:rounded-lg file:border-0 file:text-sm file:font-medium 
                                       file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100 
                                       file:cursor-pointer cursor-pointer border border-gray-300 
                                       rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all">
                    <p class="text-xs text-gray-500 mt-2">
                        PNG, JPG, atau JPEG (Maksimal 2MB)
                    </p>
                    @error('thumbnail')
                        <span class="text-red-500 text-sm mt-1 block">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Action Buttons -->
                <div class="flex gap-3 pt-4">
                    <button type="submit"
                        class="flex-1 px-6 py-2.5 h-11 bg-blue-600 hover:bg-blue-700 text-white rounded-lg font-semibold transition-all duration-200 shadow-md hover:shadow-lg">
                        <div class="flex items-center justify-center gap-2">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M5 13l4 4L19 7" />
                            </svg>
                            Update Kursus
                        </div>
                    </button>
                    <a href="{{ route('allcourse') }}"
                        class="flex-1 px-6 py-2.5 h-11 bg-gray-300 hover:bg-gray-400 text-gray-800 rounded-lg font-semibold transition-all duration-200 shadow-md hover:shadow-lg flex items-center justify-center">
                        <div class="flex items-center justify-center gap-2">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                            Batal
                        </div>
                    </a>
                </div>
            </form>
        </div>
    </div>
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

                    ed.on('change keyup', function(e) {
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
                    // Redirect setelah alert ditutup
                    setTimeout(() => {
                        window.location.href = '{{ route("allcourse") }}';
                    }, 2000);
                }
            });
        });

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
@endpush
