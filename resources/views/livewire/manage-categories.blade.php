<div class="w-full min-h-screen font-poppins bg-white p-6 lg:p-8">

    <div class="mb-8 flex flex-col md:flex-row md:items-end justify-between gap-4">
        <div>
            <h1 class="text-3xl font-bold text-gray-900 flex items-center gap-3 mb-1">
                <i class="fas fa-tags text-blue-600"></i> Manage Categories
            </h1>
            <p class="text-gray-500">Atur kategori kursus.</p>
        </div>
        <button wire:click="create"
            class="inline-flex items-center justify-center px-5 py-2.5 bg-blue-600 hover:bg-blue-700 text-white text-sm font-semibold rounded-lg transition-colors shadow-sm">
            <i class="fas fa-plus mr-2"></i>
            Tambah Kategori
        </button>
    </div>

    <!-- Search Bar -->
    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 mb-8">
        <div class="relative">
            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                <i class="fas fa-search text-gray-400"></i>
            </div>
            <input type="text" wire:model.live.debounce.300ms="search" placeholder="Cari kategori..."
                class="w-full pl-10 pr-4 py-2.5 bg-gray-50 border border-gray-200 text-gray-900 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors duration-200">
        </div>
    </div>

    <!-- Categories Table -->
    <div class="overflow-hidden bg-white border border-gray-100 rounded-2xl shadow-sm">
        <div class="overflow-x-auto">
            <table class="w-full text-left text-sm text-gray-600">
                <thead class="bg-gray-50/80 border-b border-gray-200 text-gray-700 uppercase font-semibold text-[10px] sm:text-xs">
                    <tr>
                        <th class="px-6 py-4 w-20">No</th>
                        <th class="px-6 py-4">Nama Kategori</th>
                        <th class="px-6 py-4 text-center w-40">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @forelse ($categories as $category)
                    <tr class="hover:bg-blue-50/30 transition-colors duration-150">
                        <td class="px-6 py-4 text-sm font-medium text-gray-400">
                            {{ ($categories->currentPage() - 1) * $categories->perPage() + $loop->iteration }}
                        </td>
                        <td class="px-6 py-4">
                            <p class="font-bold text-gray-900">{{ $category->name }}</p>
                        </td>
                        <td class="px-6 py-4 text-center">
                            <div class="flex items-center justify-center gap-2">
                                <button wire:click="edit({{ $category->id }})"
                                    class="w-8 h-8 inline-flex items-center justify-center bg-amber-50 text-amber-600 rounded-lg hover:bg-amber-600 hover:text-white transition-all border border-amber-100 shadow-sm"
                                    title="Edit Kategori">
                                    <i class="fas fa-edit text-xs"></i>
                                </button>
                                <button onclick="confirmDelete({{ $category->id }})"
                                    class="w-8 h-8 inline-flex items-center justify-center bg-red-50 text-red-600 rounded-lg hover:bg-red-600 hover:text-white transition-all border border-red-100 shadow-sm"
                                    title="Hapus Kategori">
                                    <i class="fas fa-trash text-xs"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="3" class="px-6 py-12 text-center">
                            <div class="flex flex-col items-center">
                                <div class="w-16 h-16 bg-gray-50 rounded-full flex items-center justify-center mb-4 text-gray-400">
                                    <i class="fas fa-folder-open text-2xl"></i>
                                </div>
                                <h3 class="text-lg font-bold text-gray-900 mb-1">Tidak ada kategori</h3>
                                <p class="text-sm text-gray-500 max-w-xs mx-auto">Mulai dengan menambahkan kategori baru.</p>
                            </div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
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