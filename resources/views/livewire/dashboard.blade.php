<div class="w-full min-h-screen font-poppins bg-white p-4 sm:p-6 lg:p-8 text-slate-900">
    {{-- HEADER --}}
    <div class="mb-6 sm:mb-8 flex flex-col md:flex-row md:items-end justify-between gap-4">
        <div>
            <h1 class="text-3xl sm:text-4xl lg:text-5xl font-extrabold mb-2 tracking-tight text-slate-900">
                Selamat datang, <span class="text-transparent bg-clip-text bg-gradient-to-r from-blue-700 to-cyan-600">{{ $user->name }}</span> 👋
            </h1>
            <p class="text-slate-600 text-base sm:text-lg font-medium">Lanjutkan progres belajarmu hari ini.</p>
        </div>
        <div class="text-xs sm:text-sm font-bold text-blue-800 bg-blue-50 px-4 py-2 rounded-full border border-blue-200 shadow-sm whitespace-nowrap self-start md:self-auto">
            {{ Carbon\Carbon::now()->translatedFormat('l, d F Y') }}
        </div>
    </div>

    {{-- STATS SECTION - 2 kolom di mobile, 4 kolom di desktop --}}
    <div class="grid grid-cols-2 lg:grid-cols-4 gap-3 sm:gap-6 mb-6 sm:mb-8">
        {{-- Kursus Terdaftar --}}
        <div class="bg-white rounded-2xl p-4 sm:p-6 shadow-sm border-2 border-slate-100 hover:border-blue-200 transition-all group">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-slate-500 text-[10px] sm:text-xs font-bold uppercase tracking-wider">Kursus Terdaftar</p>
                    <p class="text-3xl sm:text-4xl font-black text-slate-900 mt-1 sm:mt-2 group-hover:text-blue-700 transition-colors">{{ $totalEnrolled }}</p>
                </div>
                <div class="bg-blue-50 p-2.5 sm:p-3 rounded-xl border border-blue-100 group-hover:!bg-blue-600 transition-colors duration-300">
                    <i class="fas fa-book text-lg sm:text-xl text-blue-700 group-hover:!text-white transition-colors"></i>
                </div>
            </div>
            <p class="text-xs sm:text-sm font-bold text-emerald-600 mt-3 sm:mt-4 flex items-center gap-1">
                <i class="fas fa-arrow-trend-up text-xs"></i>
                Semua kursusmu
            </p>
        </div>

        {{-- Progress Belajar --}}
        <div class="bg-white rounded-2xl p-4 sm:p-6 shadow-sm border-2 border-slate-100 hover:border-cyan-200 transition-all group">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-slate-500 text-[10px] sm:text-xs font-bold uppercase tracking-wider">Progress Belajar</p>
                    <p class="text-3xl sm:text-4xl font-black text-slate-900 mt-1 sm:mt-2 group-hover:text-cyan-700 transition-colors">{{ $averageProgress }}%</p>
                </div>
                <div class="bg-cyan-50 p-2.5 sm:p-3 rounded-xl border border-cyan-100 group-hover:!bg-cyan-600 transition-colors duration-300">
                    <i class="fas fa-chart-line text-lg sm:text-xl text-cyan-700 group-hover:!text-white transition-colors"></i>
                </div>
            </div>
            <div class="w-full bg-slate-200 rounded-full h-2 sm:h-3 mt-3 sm:mt-4 overflow-hidden">
                <div class="bg-gradient-to-r from-cyan-600 to-blue-700 h-full rounded-full transition-all duration-500" style="width: {{ $averageProgress }}%"></div>
            </div>
        </div>

        {{-- Modul Selesai --}}
        <div class="bg-white rounded-2xl p-4 sm:p-6 shadow-sm border-2 border-slate-100 hover:border-indigo-200 transition-all group">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-slate-500 text-[10px] sm:text-xs font-bold uppercase tracking-wider">Modul Selesai</p>
                    <p class="text-3xl sm:text-4xl font-black text-slate-900 mt-1 sm:mt-2 group-hover:text-indigo-700 transition-colors">{{ $completedModules }}</p>
                </div>
                <div class="bg-indigo-50 p-2.5 sm:p-3 rounded-xl border border-indigo-100 group-hover:!bg-indigo-600 transition-colors duration-300">
                    <i class="fas fa-clipboard-list text-lg sm:text-xl text-indigo-700 group-hover:!text-white transition-colors"></i>
                </div>
            </div>
            <p class="text-[10px] sm:text-xs font-semibold text-slate-500 mt-3 sm:mt-4">Total modul telah dipelajari</p>
        </div>

        {{-- Kursus Selesai (menggantikan Sertifikat) --}}
        <div class="bg-white rounded-2xl p-4 sm:p-6 shadow-sm border-2 border-slate-100 hover:border-emerald-200 transition-all group">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-slate-500 text-[10px] sm:text-xs font-bold uppercase tracking-wider">Kursus Selesai</p>
                    <p class="text-3xl sm:text-4xl font-black text-slate-900 mt-1 sm:mt-2 group-hover:text-emerald-700 transition-colors">{{ $completedCourses }}</p>
                </div>
                <div class="bg-emerald-50 p-2.5 sm:p-3 rounded-xl border border-emerald-100 group-hover:!bg-emerald-600 transition-colors duration-300">
                    <i class="fas fa-check-circle text-lg sm:text-xl text-emerald-700 group-hover:!text-white transition-colors"></i>
                </div>
            </div>
            <p class="text-[10px] sm:text-xs font-semibold text-slate-500 mt-3 sm:mt-4">Progress 100% tercapai</p>
        </div>
    </div>

    {{-- BANNER PREMIUM - dengan peringatan jika sisa hari < 3 --}}
    @if ($subscription)
        <div class="relative overflow-hidden {{ $subscriptionExpiringSoon ? 'bg-gradient-to-r from-amber-500 to-orange-500 shadow-orange-200' : 'bg-gradient-to-r from-blue-700 to-blue-600 shadow-blue-200' }} rounded-2xl shadow-xl p-5 sm:p-8 mb-6 sm:mb-8 text-white">
            <div class="absolute top-0 right-0 -mr-16 -mt-16 w-64 h-64 rounded-full bg-white opacity-10 blur-2xl"></div>
            
            <div class="relative z-10 flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4 sm:gap-6">
                <div class="flex items-center space-x-4 sm:space-x-5">
                    <div class="bg-white/20 backdrop-blur-md p-3 sm:p-4 rounded-2xl border border-white/20 shrink-0">
                        @if ($subscriptionExpiringSoon)
                            <i class="fas fa-exclamation-triangle text-2xl sm:text-3xl text-white"></i>
                        @else
                            <i class="fas fa-crown text-2xl sm:text-3xl text-white"></i>
                        @endif
                    </div>
                    <div class="min-w-0">
                        @if ($subscriptionExpiringSoon)
                            <h3 class="text-xl sm:text-2xl font-bold">Premium Segera Berakhir!</h3>
                            <p class="text-white/80 mt-1 font-medium text-sm sm:text-base">Berlaku hingga {{ \Carbon\Carbon::parse($subscription->ends_at)->translatedFormat('d M Y') }} (Sisa {{ $subscriptionDaysLeft }} Hari)</p>
                        @else
                            <h3 class="text-xl sm:text-2xl font-bold">Premium Aktif</h3>
                            <p class="text-blue-100 mt-1 font-medium text-sm sm:text-base">Berlaku hingga {{ \Carbon\Carbon::parse($subscription->ends_at)->translatedFormat('d M Y') }} (Sisa {{ $subscriptionDaysLeft }} Hari)</p>
                        @endif
                    </div>
                </div>
                <a href="{{ route('subscriptionplan') }}" class="{{ $subscriptionExpiringSoon ? 'bg-white text-orange-600 hover:bg-orange-50' : 'bg-blue-800/50 backdrop-blur-sm text-white border border-white/20 hover:bg-blue-800/70' }} px-6 sm:px-8 py-2.5 sm:py-3 rounded-xl font-bold transition-all whitespace-nowrap shrink-0 text-sm sm:text-base">
                    Perpanjang
                </a>
            </div>
        </div>
    @else
        <div class="relative overflow-hidden bg-gradient-to-r from-blue-700 to-blue-600 rounded-2xl shadow-xl shadow-blue-200 p-5 sm:p-8 mb-6 sm:mb-8 text-white">
            <div class="absolute top-0 right-0 -mr-16 -mt-16 w-64 h-64 rounded-full bg-white opacity-10 blur-2xl"></div>
            
            <div class="relative z-10 flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4 sm:gap-6">
                <div class="flex items-center space-x-4 sm:space-x-5">
                    <div class="bg-white/20 backdrop-blur-md p-3 sm:p-4 rounded-2xl border border-white/20 shrink-0">
                        <i class="fas fa-gem text-2xl sm:text-3xl text-white"></i>
                    </div>
                    <div>
                        <h3 class="text-xl sm:text-2xl font-bold">Upgrade ke Premium</h3>
                        <p class="text-blue-100 mt-1 font-medium text-sm sm:text-base">Dapatkan akses penuh ke semua kursus</p>
                    </div>
                </div>
                <a href="{{ route('subscriptionplan') }}" class="bg-white text-blue-700 px-6 sm:px-8 py-2.5 sm:py-3 rounded-xl font-bold hover:bg-gray-50 hover:shadow-lg transition-all transform hover:-translate-y-0.5 whitespace-nowrap shrink-0 text-sm sm:text-base">
                    Pilih Paket
                </a>
            </div>
        </div>
    @endif

    {{-- MAIN CONTENT GRID --}}
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 sm:gap-8">
        {{-- PEMBELAJARAN LANJUTAN --}}
        <div class="lg:col-span-2 space-y-6 relative" wire:loading.class="opacity-50">
            <div class="bg-white rounded-2xl shadow-sm border-2 border-slate-100 p-4 sm:p-6">
                <div class="flex items-center justify-between mb-4 sm:mb-6">
                    <h2 class="text-lg sm:text-xl font-bold text-slate-900 flex items-center gap-2 sm:gap-3">
                        <span class="w-8 h-8 sm:w-10 sm:h-10 rounded-xl bg-blue-100 text-blue-700 flex items-center justify-center border border-blue-200">
                            <i class="fas fa-play-circle text-sm sm:text-base"></i>
                        </span>
                        Pembelajaran Lanjutan
                    </h2>
                    <a href="{{ route('inprogress') }}" class="text-blue-700 hover:text-blue-800 font-bold text-xs sm:text-sm bg-blue-50 px-3 sm:px-4 py-1.5 sm:py-2 rounded-full hover:bg-blue-100 transition-all whitespace-nowrap">Lihat Semua →</a>
                </div>

                <div class="space-y-4">
                    @forelse($recentCourses as $course)
                        <div class="border-2 border-slate-100 rounded-2xl p-4 sm:p-5 hover:border-blue-300 hover:bg-blue-50/30 transition-all group">
                            <div class="flex items-start justify-between gap-3 sm:gap-4">
                                <div class="flex-1 min-w-0">
                                    <div class="flex flex-wrap items-center gap-2 mb-2 sm:mb-3">
                                        @php
                                            $colorMap = [
                                                'green' => 'bg-emerald-100 text-emerald-800',
                                                'blue' => 'bg-blue-100 text-blue-800',
                                                'yellow' => 'bg-yellow-100 text-yellow-800',
                                            ];
                                            $badgeClass = $colorMap[$course['statusColor']] ?? 'bg-gray-100 text-gray-800';
                                        @endphp
                                        <span class="px-2.5 sm:px-3 py-1 {{ $badgeClass }} rounded-full text-[10px] sm:text-xs font-bold uppercase tracking-wide">{{ $course['statusLabel'] }}</span>
                                        <span class="text-xs sm:text-sm text-slate-600 font-semibold">{{ $course['progress'] }}% complete</span>
                                    </div>
                                    <h3 class="font-bold text-slate-900 text-base sm:text-lg group-hover:text-blue-700 transition-colors truncate">{{ $course['title'] }}</h3>
                                    <p class="text-xs sm:text-sm text-slate-600 mt-1 sm:mt-2 font-medium">IntellectHub Instructor</p>
                                </div>
                                <div class="w-11 h-11 sm:w-14 sm:h-14 bg-gradient-to-br from-blue-500 to-blue-700 rounded-xl shadow-md flex items-center justify-center text-white font-bold text-base sm:text-xl shrink-0">
                                    {{ $course['initials'] }}
                                </div>
                            </div>
                            
                            @if($course['progress'] > 0)
                                <div class="mt-3 sm:mt-4 w-full bg-slate-200 rounded-full h-2 sm:h-2.5">
                                    <div class="bg-blue-600 h-full rounded-full transition-all duration-500" style="width: {{ $course['progress'] }}%"></div>
                                </div>
                                <div class="mt-2 sm:mt-3 flex justify-end">
                                    <a href="{{ route('courseplayer', ['courseId' => $course['id']]) }}" class="text-blue-700 font-bold hover:underline text-xs sm:text-sm">
                                        Lanjutkan Kursus →
                                    </a>
                                </div>
                            @else
                                <a href="{{ route('courseplayer', ['courseId' => $course['id']]) }}" class="mt-3 sm:mt-4 block text-center w-full py-2.5 sm:py-3 bg-white border-2 border-blue-600 text-blue-700 rounded-xl font-bold hover:bg-blue-600 hover:text-white transition-all text-xs sm:text-sm">
                                    Mulai Kursus
                                </a>
                            @endif
                        </div>
                    @empty
                        <div class="border-2 border-dashed border-slate-200 rounded-2xl p-6 sm:p-8 text-center bg-slate-50">
                            <i class="fas fa-book-open text-3xl sm:text-4xl text-slate-300 mb-3 block"></i>
                            <h3 class="font-bold text-slate-700 text-base sm:text-lg mb-1">Belum ada kursus yang diikuti.</h3>
                            <p class="text-xs sm:text-sm text-slate-500 mb-4">Yuk, cari materi kelas baru dan mulai perjalanan belajarmu sekarang!</p>
                            <a href="{{ route('allcourse') }}" class="inline-block bg-blue-600 hover:bg-blue-700 text-white font-bold px-5 sm:px-6 py-2 rounded-xl transition-all text-sm">
                                Jelajahi Kursus
                            </a>
                        </div>
                    @endforelse
                </div>
            </div>
            
            {{-- Loading Overlay --}}
            <div wire:loading class="absolute inset-0 z-10 bg-white/50 backdrop-blur-sm flex items-center justify-center rounded-2xl">
                <div class="bg-white px-4 py-2 rounded-lg shadow-lg border border-gray-100 flex items-center gap-3 text-blue-600 font-medium">
                    <i class="fas fa-spinner fa-spin text-xl"></i> Memuat Data...
                </div>
            </div>
        </div>

        {{-- SIDEBAR KANAN --}}
        <div class="space-y-6">
            {{-- MENU CEPAT --}}
            <div class="bg-white rounded-2xl shadow-sm border-2 border-slate-100 p-4 sm:p-6">
                <h3 class="text-lg font-bold text-slate-900 mb-4 sm:mb-5 pl-3 border-l-4 border-blue-600">Menu Cepat</h3>
                <div class="space-y-3">
                    <a href="{{ route('allcourse') }}" class="flex items-center gap-3 sm:gap-4 p-3 rounded-xl bg-slate-50 border border-slate-200 hover:bg-blue-50 hover:border-blue-200 transition-all group cursor-pointer">
                        <div class="w-10 h-10 rounded-lg bg-white flex items-center justify-center border border-slate-200 group-hover:!bg-blue-600 transition-all shadow-sm shrink-0">
                            <i class="fas fa-compass text-sm text-blue-600 group-hover:!text-white transition-colors"></i>
                        </div>
                        <div class="flex-1 min-w-0">
                            <p class="font-bold text-slate-800 group-hover:text-blue-800 transition-colors text-sm sm:text-base">Jelajahi Kursus</p>
                        </div>
                        <i class="fas fa-chevron-right text-xs text-slate-400 group-hover:text-blue-600 group-hover:translate-x-1 transition-all"></i>
                    </a>

                    <a href="{{ route('favorites') }}" class="flex items-center gap-3 sm:gap-4 p-3 rounded-xl bg-slate-50 border border-slate-200 hover:bg-red-50 hover:border-red-200 transition-all group cursor-pointer">
                        <div class="w-10 h-10 rounded-lg bg-white flex items-center justify-center border border-slate-200 group-hover:!bg-red-600 transition-all shadow-sm shrink-0">
                            <i class="fas fa-heart text-sm text-red-500 group-hover:!text-white transition-colors"></i>
                        </div>
                        <div class="flex-1 min-w-0">
                            <p class="font-bold text-slate-800 group-hover:text-red-800 transition-colors text-sm sm:text-base">Kursus Favorit</p>
                        </div>
                        <i class="fas fa-chevron-right text-xs text-slate-400 group-hover:text-red-600 group-hover:translate-x-1 transition-all"></i>
                    </a>
                </div>
            </div>

            {{-- TIPS HARI INI --}}
            <div class="bg-gradient-to-br from-blue-50 to-white rounded-2xl shadow-sm border border-blue-100 p-4 sm:p-6">
                <h3 class="text-lg font-bold mb-2 flex items-center gap-2 text-blue-800">
                    💡 Tips Hari Ini
                </h3>
                <p class="text-sm text-slate-700 leading-relaxed font-medium">
                    Konsistensi adalah kunci! Belajar sedikit demi sedikit setiap hari jauh lebih baik.
                </p>
            </div>
        </div>
    </div>

    @if (session()->has('success'))
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Berhasil!',
                text: '{{ session('success') }}',
                showConfirmButton: false,
                timer: 2000,
                timerProgressBar: true,
                customClass: {
                    popup: 'bg-white shadow-xl',
                    title: 'text-slate-900',
                    htmlContainer: 'text-slate-600'
                }
            });
        </script>
    @endif
</div>