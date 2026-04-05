<div class="p-6 lg:p-8 font-poppins min-h-screen bg-white">
    <!-- Header -->
    <div class="mb-8 flex flex-col md:flex-row md:items-center md:justify-between gap-4">
        <div>
            <h1 class="text-3xl font-bold text-gray-900 flex items-center gap-3">
                <i class="fas fa-users text-blue-600"></i> User Management
            </h1>
            <p class="text-gray-500 mt-1">Kelola data pengguna, role, dan status masa aktif langganan.</p>
        </div>
    </div>

    <!-- Statistik -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
        <!-- Total User -->
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 flex items-center gap-4 hover:shadow-md transition-shadow duration-300">
            <div class="w-14 h-14 bg-blue-50 text-blue-600 rounded-xl flex items-center justify-center text-2xl flex-shrink-0">
                <i class="fas fa-user-friends"></i>
            </div>
            <div>
                <p class="text-sm font-medium text-gray-500">Total User</p>
                <h3 class="text-2xl font-bold text-gray-900">{{ $totalUsers }}</h3>
            </div>
        </div>

        <!-- Berlangganan Aktif -->
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 flex items-center gap-4 hover:shadow-md transition-shadow duration-300">
            <div class="w-14 h-14 bg-green-50 text-green-500 rounded-xl flex items-center justify-center text-2xl flex-shrink-0">
                <i class="fas fa-user-check"></i>
            </div>
            <div>
                <p class="text-sm font-medium text-gray-500">Berlangganan Aktif</p>
                <h3 class="text-2xl font-bold text-gray-900">{{ $activeSubscribers }}</h3>
            </div>
        </div>

        <!-- User Expired -->
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 flex items-center gap-4 hover:shadow-md transition-shadow duration-300">
            <div class="w-14 h-14 bg-red-50 text-red-500 rounded-xl flex items-center justify-center text-2xl flex-shrink-0">
                <i class="fas fa-user-times"></i>
            </div>
            <div>
                <p class="text-sm font-medium text-gray-500">User Expired</p>
                <h3 class="text-2xl font-bold text-gray-900">{{ $expiredSubscribers }}</h3>
            </div>
        </div>
    </div>

    <!-- Filter dan Pencarian -->
    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 mb-8">
        <div class="flex flex-col md:flex-row gap-4 items-center justify-between">
            <div class="w-full md:w-1/3 relative">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <i class="fas fa-search text-gray-400"></i>
                </div>
                <input wire:model.live.debounce.300ms="search" type="text" placeholder="Cari nama atau email..." 
                    class="w-full pl-10 pr-4 py-2.5 bg-gray-50 border border-gray-200 text-gray-900 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors duration-200">
            </div>

            <div class="flex w-full md:w-auto gap-4">
                <div class="relative w-full md:w-48">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <i class="fas fa-user-tag text-gray-400"></i>
                    </div>
                    <select wire:model.live="roleFilter" class="w-full pl-10 pr-4 py-2.5 bg-gray-50 border border-gray-200 text-gray-900 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 appearance-none">
                        <option value="">Semua Role</option>
                        <option value="SuperAdmin">Admin</option>
                        <option value="Student">User Biasa</option>
                    </select>
                </div>

                <div class="relative w-full md:w-48">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <i class="fas fa-filter text-gray-400"></i>
                    </div>
                    <select wire:model.live="statusFilter" class="w-full pl-10 pr-4 py-2.5 bg-gray-50 border border-gray-200 text-gray-900 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 appearance-none">
                        <option value="">Semua Status</option>
                        <option value="active">Langganan Aktif</option>
                        <option value="expired">Langganan Expired</option>
                        <option value="basic">Basic (Belum Langganan)</option>
                    </select>
                </div>
            </div>
        </div>
        
        <!-- Loading Indicator -->
        <div wire:loading class="text-blue-600 text-sm mt-3 flex items-center gap-2">
            <i class="fas fa-circle-notch fa-spin"></i> Memuat data...
        </div>
    </div>

    <!-- Tabel Data -->
    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden relative">
        <div class="overflow-x-auto relative min-h-[300px]">
            <table class="w-full text-left text-sm text-gray-600">
                <thead class="bg-gray-50/80 text-gray-700 uppercase font-semibold text-xs border-b border-gray-200">
                    <tr>
                        <th scope="col" class="px-6 py-4">Info User</th>
                        <th scope="col" class="px-6 py-4">Role</th>
                        <th scope="col" class="px-6 py-4 text-center">Akses Keluar</th>
                        <th scope="col" class="px-6 py-4">Langganan</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @forelse($users as $user)
                        <tr class="hover:bg-blue-50/30 transition-colors duration-150">
                            <!-- Info User -->
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-4">
                                    <div class="w-10 h-10 rounded-full bg-gradient-to-br from-blue-500 to-indigo-600 flex items-center justify-center text-white font-bold shadow-sm">
                                        {{ strtoupper(substr($user->name, 0, 1)) }}
                                    </div>
                                    <div>
                                        <div class="font-bold text-gray-900">{{ $user->name }}</div>
                                        <div class="text-xs text-gray-500 mt-0.5">{{ $user->email }}</div>
                                    </div>
                                </div>
                            </td>

                            <!-- Role -->
                            <td class="px-6 py-4">
                                @if($user->hasRole('SuperAdmin'))
                                    <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-semibold bg-purple-100 text-purple-700 border border-purple-200">
                                        <i class="fas fa-crown text-[10px]"></i> Admin
                                    </span>
                                @else
                                    <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-semibold bg-gray-100 text-gray-700 border border-gray-200">
                                        <i class="fas fa-user text-[10px]"></i> User Biasa
                                    </span>
                                @endif
                            </td>

                            <!-- Status Login (is_active) -->
                            <td class="px-6 py-4 text-center">
                                <button wire:click="toggleStatus({{ $user->id }})" wire:loading.attr="disabled" class="relative group outline-none overflow-hidden rounded-full cursor-pointer focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                                    <div class="w-12 h-6 flex items-center {{ $user->is_active ? 'bg-blue-600' : 'bg-gray-300' }} rounded-full p-1 transition-colors duration-300 ease-in-out">
                                        <div class="bg-white w-4 h-4 rounded-full shadow-md transform transition-transform duration-300 ease-in-out {{ $user->is_active ? 'translate-x-6' : 'translate-x-0' }}"></div>
                                    </div>
                                </button>
                                <div class="text-[10px] text-gray-400 mt-1">{{ $user->is_active ? 'Aktif' : 'Nonaktif' }}</div>
                            </td>

                            <!-- Langganan -->
                            <td class="px-6 py-4">
                                @php
                                    $isExpired = $user->subscription_until && \Carbon\Carbon::parse($user->subscription_until)->isPast();
                                    $isActive = $user->subscription_until && \Carbon\Carbon::parse($user->subscription_until)->isFuture();
                                @endphp

                                @if($isActive)
                                    <span class="inline-flex items-center px-2.5 py-1 rounded-md text-xs font-semibold bg-green-100 text-green-700 border border-green-200 w-fit mb-1">
                                        <i class="fas fa-check-circle mr-1.5"></i> Aktif
                                    </span>
                                    <div class="text-[11px] text-gray-500"><i class="far fa-calendar-alt"></i> s/d {{ \Carbon\Carbon::parse($user->subscription_until)->format('d M Y') }}</div>
                                @elseif($isExpired)
                                    <span class="inline-flex items-center px-2.5 py-1 rounded-md text-xs font-semibold bg-red-100 text-red-700 border border-red-200 w-fit mb-1">
                                        <i class="fas fa-times-circle mr-1.5"></i> Expired
                                    </span>
                                    <div class="text-[11px] text-gray-500"><i class="far fa-calendar-times"></i> Sejak {{ \Carbon\Carbon::parse($user->subscription_until)->format('d M Y') }}</div>
                                @else
                                    <span class="inline-flex items-center px-2.5 py-1 rounded-md text-xs font-semibold bg-gray-100 text-gray-600 border border-gray-200 w-fit mb-1">
                                        <i class="fas fa-minus-circle mr-1.5"></i> Basic
                                    </span>
                                    <div class="text-[11px] text-gray-400">Belum Berlangganan</div>
                                @endif
                            </td>

                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-6 py-10 text-center">
                                <div class="inline-flex items-center justify-center w-16 h-16 rounded-full bg-gray-100 mb-4">
                                    <i class="fas fa-inbox text-2xl text-gray-400"></i>
                                </div>
                                <h3 class="text-gray-900 font-semibold mb-1">Tidak ada data pengguna</h3>
                                <p class="text-sm text-gray-500">Gunakan kata kunci atau filter lain untuk mencari.</p>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <!-- Loading Overlay pada Tabel -->
        <div wire:loading class="absolute inset-0 z-10 bg-white/50 backdrop-blur-sm flex items-center justify-center">
            <div class="bg-white px-4 py-2 rounded-lg shadow-lg border border-gray-100 flex items-center gap-3 text-blue-600 font-medium">
                <i class="fas fa-spinner fa-spin text-xl"></i> Sedang Memproses...
            </div>
        </div>
    </div>

    <!-- Pagination -->
    <div class="mt-6">
        {{ $users->links() }}
    </div>
</div>
