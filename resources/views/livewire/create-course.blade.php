<div class="font-poppins">
    <nav class="flex mb-6" aria-label="Breadcrumb">
        <!-- breadcrumb tetap sama -->
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
                    <span class="ml-1 text-sm font-medium text-gray-500 md:ml-2">Tambah Kursus</span>
                </div>
            </li>
        </ol>
    </nav>

    <div class="w-full flex flex-col items-center">
    <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between">
        <div class="mb-4 lg:mb-0">
            <h1 class="text-4xl text-gray-800 font-bold mb-2">Tambah Kursus</h1>
            <p class="text-gray-600">Tambahkan Kursus untuk pelanggan</p>
        </div>
    </div>


    <div class="w-fit h-fit flex justify-center p-6 rounded-3xl shadow">
        <form wire:submit.prevent="save" class="space-y-6">
            <div class="max-w-full">
                <label class="font-medium">Nama Kursus</label>
                <input type="text" wire:model="title"
                    class="w-full border border-gray-300 rounded-lg shadow-sm mt-2">
            </div>

            <div class="w-full" wire:ignore>
                <label class="font-medium">Deskripsi</label>
                <textarea id="description" class="w-full border border-gray-300 rounded-lg shadow-sm mt-2"></textarea>
            </div>

            <div class="max-w-full">
                <label for="thumbnail" class="font-medium">
                    Gambar Kursus
                </label>
                <input type="file" id="thumbnail" wire:model="thumbnail" accept="image/*"
                    class="block w-full text-sm text-gray-500 file:mr-4 file:py-3 file:px-4 
                                       file:rounded-lg file:border-0 file:text-sm file:font-medium 
                                       file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100 
                                       file:cursor-pointer cursor-pointer border border-gray-300 
                                       rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 mt-2">
                <p class="text-xs text-gray-500 mt-2">
                    PNG, JPG, atau JPEG (Maksimal 2MB)
                </p>
            </div>

            <div class="max-w-full mb-6">
                <label class="font-medium">Kategori</label>
                <select wire:model="category_id" class="w-full border border-gray-300 rounded-lg shadow-sm mt-2">
                    <option value="">Pilih Kategori</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="w-full px-4 py-2 h-11 bg-blue-600 hover:bg-blue-700 text-white rounded-lg">
                Tambah Kursus
            </button>
        </form>
    </div>
</div>
</div>

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
    </script>
@endpush
