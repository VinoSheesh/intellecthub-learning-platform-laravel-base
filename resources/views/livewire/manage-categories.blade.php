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
                    <span class="ml-1 text-sm font-medium text-gray-500 md:ml-2">Manage Categories</span>
                </div>
            </li>
        </ol>
    </nav>

    <div class="mb-8 flex flex-col md:flex-row md:items-end justify-between gap-4">
        <div>
            <h1 class="text-4xl lg:text-5xl font-extrabold mb-2 tracking-tight text-slate-900">
                Manage Categories
            </h1>
            <p class="text-slate-600 text-lg font-medium">Atur Kategori Kursus</p>
        </div>
        <button wire:click="create"
            class="inline-flex items-center justify-center px-6 py-3 bg-blue-600 hover:bg-blue-700 text-white font-semibold rounded-lg transition">
            <i class="fa-solid fa-plus mr-2"></i>
            Tambah Kategori
        </button>
    </div>

    <!-- Search Bar -->
    <div class="relative mb-6">
        <input type="text" wire:model.live="search" placeholder="Cari kategori..."
            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
    </div>

    <!-- Categories Table -->
    <div class="overflow-x-auto shadow-md rounded-lg">
        <table class="w-full bg-white">
            <thead class="bg-gray-100 border-b border-gray-300">
                <tr>
                    <th class="px-6 py-3 text-left text-sm font-semibold text-gray-700 w-16">ID</th>
                    <th class="px-6 py-3 text-left text-sm font-semibold text-gray-700">Nama Kategori</th>
                    <th class="px-6 py-3 text-center text-sm font-semibold text-gray-700 w-48">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($categories as $category)
                    <tr class="border-b border-gray-200 hover:bg-gray-50 transition">
                        <td class="px-6 py-4 text-sm text-gray-600">{{ $category->id }}</td>
                        <td class="px-6 py-4">
                            <p class="font-medium text-gray-900">{{ $category->name }}</p>
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex items-center justify-center gap-2">
                                <button wire:click="edit({{ $category->id }})"
                                    class="inline-flex items-center px-3 py-2 bg-amber-50 text-amber-700 rounded-lg hover:bg-amber-100 transition text-sm font-medium">
                                    <i class="fa-solid fa-pen mr-1"></i>
                                    Edit
                                </button>
                                <button onclick="confirmDelete({{ $category->id }})"
                                    class="inline-flex items-center px-3 py-2 bg-red-50 text-red-700 rounded-lg hover:bg-red-100 transition text-sm font-medium">
                                    <i class="fa-solid fa-trash mr-1"></i>
                                    Hapus
                                </button>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3" class="px-6 py-12 text-center">
                            <i class="fa-regular fa-folder-open text-6xl text-gray-400 mb-4 block"></i>
                            <h3 class="text-xl font-medium text-gray-900 mb-2">Tidak ada kategori ditemukan</h3>
                            <p class="text-gray-600">Mulai dengan menambahkan kategori baru.</p>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- Pagination -->
    <div class="mt-6">
        {{ $categories->links() }}
    </div>

    <!-- Modal Form -->
    @if($isModalOpen)
    <div class="fixed inset-0 z-50 overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
        <div class="flex items-center justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:p-0">
            <!-- Background overlay -->
            <div class="fixed inset-0 bg-gray-900 bg-opacity-50 transition-opacity backdrop-blur-sm" aria-hidden="true" wire:click="closeModal"></div>

            <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>

            <div class="relative inline-block align-bottom bg-white rounded-3xl text-left overflow-hidden shadow-2xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg w-full border border-gray-100">
                <form wire:submit.prevent="save">
                    <div class="bg-white p-6 sm:p-8">
                        <div class="mb-6">
                            <h3 class="text-2xl text-gray-800 font-bold" id="modal-title">
                                {{ $categoryId ? 'Edit Kategori' : 'Tambah Kategori' }}
                            </h3>
                            <p class="text-gray-600 mt-1">
                                {{ $categoryId ? 'Perbarui nama kategori yang sudah ada.' : 'Tambahkan kategori baru untuk kursus.' }}
                            </p>
                        </div>
                        
                        <div class="space-y-6">
                            <div>
                                <label for="name" class="font-medium text-gray-700 block">Nama Kategori</label>
                                <input type="text" wire:model="name" id="name"
                                    class="w-full border border-gray-300 rounded-lg shadow-sm mt-2 px-4 py-2.5 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors"
                                    placeholder="Masukkan nama kategori">
                                @error('name') <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span> @enderror
                            </div>
                        </div>
                        
                        <div class="mt-8 flex flex-col-reverse sm:flex-row sm:justify-end gap-3">
                            <button type="button" wire:click="closeModal"
                                class="w-full sm:w-auto px-6 py-2.5 h-11 bg-white border border-gray-300 hover:bg-gray-50 text-gray-700 font-medium rounded-lg shadow-sm transition-colors flex items-center justify-center">
                                Batal
                            </button>
                            <button type="submit" 
                                class="w-full sm:w-auto px-6 py-2.5 h-11 bg-blue-600 hover:bg-blue-700 text-white font-medium rounded-lg shadow-sm transition-colors disabled:opacity-50 flex items-center justify-center"
                                wire:loading.attr="disabled">
                                <span wire:loading.remove wire:target="save">Simpan</span>
                                <span wire:loading wire:target="save">
                                    <i class="fa-solid fa-spinner fa-spin mr-2"></i> Menyimpan...
                                </span>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @endif

    <!-- SweetAlert2 Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.addEventListener('livewire:initialized', () => {
            @this.on('swal:success', (event) => {
                Swal.fire({
                    title: event[0].title,
                    text: event[0].text,
                    icon: 'success',
                    timer: 3000,
                    showConfirmButton: false
                });
            });
        });

        function confirmDelete(id) {
            Swal.fire({
                title: 'Apakah Anda yakin?',
                text: "Data kategori ini akan dihapus permanen!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, hapus!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    @this.call('deleteCategory', id);
                }
            })
        }
    </script>
</div>
