<div class="w-full min-h-screen font-poppins bg-white p-6 lg:p-8">
    <!-- Header -->
    <div class="mb-8 flex flex-col md:flex-row md:items-end justify-between gap-4">
        <div>
            <h1 class="text-3xl font-bold text-gray-900 flex items-center gap-3">
                <i class="fas fa-chart-line text-blue-600"></i> Dashboard Utama
            </h1>
            <p class="text-gray-500 mt-1">Ringkasan statistik dan aktivitas terbaru pada platform.</p>
        </div>
        <div class="text-sm font-bold text-blue-800 bg-blue-50 px-4 py-2 rounded-full border border-blue-200 shadow-sm flex items-center gap-2">
            <i class="far fa-calendar text-blue-600"></i> {{ \Carbon\Carbon::now()->translatedFormat('l, d F Y') }}
        </div>
    </div>

    <!-- Stat Cards Top Row -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
        <!-- Total Users -->
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 flex items-center gap-4 hover:shadow-md transition-shadow duration-300">
            <div class="w-14 h-14 bg-blue-50 text-blue-600 rounded-xl flex items-center justify-center text-2xl flex-shrink-0">
                <i class="fas fa-users"></i>
            </div>
            <div>
                <p class="text-sm font-medium text-gray-500">Total Users</p>
                <h3 class="text-2xl font-bold text-gray-900">{{ $totalUsers }}</h3>
            </div>
        </div>

        <!-- Active Subscribers -->
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 flex items-center gap-4 hover:shadow-md transition-shadow duration-300">
            <div class="w-14 h-14 bg-green-50 text-green-500 rounded-xl flex items-center justify-center text-2xl flex-shrink-0">
                <i class="fas fa-user-check"></i>
            </div>
            <div>
                <p class="text-sm font-medium text-gray-500">Active Subscribers</p>
                <h3 class="text-2xl font-bold text-gray-900">{{ $activeSubscribers }}</h3>
            </div>
        </div>

        <!-- Total Courses -->
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 flex items-center gap-4 hover:shadow-md transition-shadow duration-300">
            <div class="w-14 h-14 bg-indigo-50 text-indigo-500 rounded-xl flex items-center justify-center text-2xl flex-shrink-0">
                <i class="fas fa-book"></i>
            </div>
            <div>
                <p class="text-sm font-medium text-gray-500">Total Courses</p>
                <h3 class="text-2xl font-bold text-gray-900">{{ $totalCourses }}</h3>
            </div>
        </div>

        <!-- Total Categories -->
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 flex items-center gap-4 hover:shadow-md transition-shadow duration-300">
            <div class="w-14 h-14 bg-purple-50 text-purple-500 rounded-xl flex items-center justify-center text-2xl flex-shrink-0">
                <i class="fas fa-tags"></i>
            </div>
            <div>
                <p class="text-sm font-medium text-gray-500">Total Categories</p>
                <h3 class="text-2xl font-bold text-gray-900">{{ $totalCategories }}</h3>
            </div>
        </div>
    </div>

    <!-- Recent Activity Bottom Row -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
        <!-- 5 Recent Courses -->
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden flex flex-col">
            <div class="p-5 border-b border-gray-100 bg-gray-50/50 flex justify-between items-center">
                <h3 class="font-bold text-gray-800"><i class="fas fa-book-open text-blue-500 mr-2"></i> Kursus Terbaru</h3>
                <a href="{{ route('managecourses') }}" class="text-sm text-blue-600 hover:text-blue-800 font-medium transition-colors">Lihat Semua &rarr;</a>
            </div>
            <div class="flex-1 overflow-x-auto">
                <table class="w-full text-left text-sm text-gray-600">
                    <thead class="bg-gray-50/80 text-gray-700 uppercase font-semibold text-[10px] sm:text-xs">
                        <tr>
                            <th scope="col" class="px-4 py-3">Nama Kursus</th>
                            <th scope="col" class="px-4 py-3">Kategori</th>
                            <th scope="col" class="px-4 py-3 text-right">Status</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">
                        @forelse($recentCourses as $course)
                            <tr class="hover:bg-blue-50/30 transition-colors">
                                <td class="px-4 py-3">
                                    <div class="font-medium text-gray-900 line-clamp-1">{{ $course->title }}</div>
                                    <div class="text-[11px] text-gray-500 mt-0.5">{{ $course->created_at->diffForHumans() }}</div>
                                </td>
                                <td class="px-4 py-3">
                                    <span class="inline-flex items-center px-2 py-0.5 rounded text-[10px] font-medium bg-blue-100 text-blue-700">
                                        {{ $course->category->name ?? 'Uncategorized' }}
                                    </span>
                                </td>
                                <td class="px-4 py-3 text-right">
                                    @if($course->is_published)
                                        <span class="inline-flex items-center justify-center w-6 h-6 rounded-full bg-green-100 text-green-600 mt-1" title="Published">
                                            <i class="fas fa-check text-[10px]"></i>
                                        </span>
                                    @else
                                        <span class="inline-flex items-center justify-center w-6 h-6 rounded-full bg-gray-100 text-gray-500 mt-1" title="Draft">
                                            <i class="fas fa-file-alt text-[10px]"></i>
                                        </span>
                                    @endif
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3" class="px-4 py-8 text-center text-gray-500 text-sm">Belum ada kursus ditambahkan.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <!-- 5 Recent Users -->
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden flex flex-col">
            <div class="p-5 border-b border-gray-100 bg-gray-50/50 flex justify-between items-center">
                <h3 class="font-bold text-gray-800"><i class="fas fa-user-plus text-green-500 mr-2"></i> Pendaftar Terbaru</h3>
                <a href="{{ route('manageusers') }}" class="text-sm text-blue-600 hover:text-blue-800 font-medium transition-colors">Kelola &rarr;</a>
            </div>
            <div class="flex-1 overflow-x-auto">
                <table class="w-full text-left text-sm text-gray-600">
                    <thead class="bg-gray-50/80 text-gray-700 uppercase font-semibold text-[10px] sm:text-xs">
                        <tr>
                            <th scope="col" class="px-4 py-3">Info Pendaftar</th>
                            <th scope="col" class="px-4 py-3">Role</th>
                            <th scope="col" class="px-4 py-3 text-right">Tanggal</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">
                        @forelse($recentUsers as $user)
                            <tr class="hover:bg-blue-50/30 transition-colors">
                                <td class="px-4 py-3">
                                    <div class="flex items-center gap-3">
                                        <div class="w-8 h-8 rounded-full bg-gradient-to-br from-gray-200 to-gray-300 flex items-center justify-center text-gray-600 font-bold text-xs flex-shrink-0">
                                            {{ strtoupper(substr($user->name, 0, 1)) }}
                                        </div>
                                        <div>
                                            <div class="font-medium text-gray-900 border-none truncate max-w-[120px] sm:max-w-xs">{{ $user->name }}</div>
                                            <div class="text-[11px] text-gray-500 truncate max-w-[120px] sm:max-w-xs">{{ $user->email }}</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-4 py-3">
                                    @if($user->hasRole('SuperAdmin'))
                                        <span class="inline-flex items-center px-2 py-0.5 rounded text-[10px] font-medium bg-purple-100 text-purple-700">Admin</span>
                                    @else
                                        <span class="inline-flex items-center px-2 py-0.5 rounded text-[10px] font-medium bg-gray-100 text-gray-700">User</span>
                                    @endif
                                </td>
                                <td class="px-4 py-3 text-right text-[11px] text-gray-500 whitespace-nowrap">
                                    {{ $user->created_at->format('d M Y') }}
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3" class="px-4 py-8 text-center text-gray-500 text-sm">Belum ada pengguna terdaftar.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
