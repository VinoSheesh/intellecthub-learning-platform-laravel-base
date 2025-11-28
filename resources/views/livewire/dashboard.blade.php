<div class="w-full min-h-screen font-poppins bg-white p-6 lg:p-8 text-slate-900">
    <div class="mb-8 flex flex-col md:flex-row md:items-end justify-between gap-4">
        <div>
            {{-- Menggunakan text-slate-900 (hampir hitam) agar terbaca jelas --}}
            <h1 class="text-4xl lg:text-5xl font-extrabold mb-2 tracking-tight text-slate-900">
                Selamat datang, <span class="text-transparent bg-clip-text bg-gradient-to-r from-blue-700 to-cyan-600">{{ $user->name }}</span> 👋
            </h1>
            {{-- Menggelapkan warna deskripsi dari slate-400 ke slate-600 --}}
            <p class="text-slate-600 text-lg font-medium">Lanjutkan progres belajarmu hari ini.</p>
        </div>
        <div class="text-sm font-bold text-blue-800 bg-blue-50 px-4 py-2 rounded-full border border-blue-200 shadow-sm">
            {{ Carbon\Carbon::now()->translatedFormat('l, d F Y') }}
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
        <div class="bg-white rounded-2xl p-6 shadow-sm border-2 border-slate-100 hover:border-blue-200 transition-all group">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-slate-500 text-xs font-bold uppercase tracking-wider">Kursus Terdaftar</p>
                    {{-- ANGKA STATISTIK DIPAKSA HITAM --}}
                    <p class="text-4xl font-black text-slate-900 mt-2 group-hover:text-blue-700 transition-colors">12</p>
                </div>
                <div class="bg-blue-50 p-3 rounded-xl border border-blue-100 group-hover:bg-blue-600 transition-colors duration-300">
                    <svg class="w-6 h-6 text-blue-700 group-hover:text-white transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C6.5 6.253 2 10.998 2 17s4.5 10.747 10 10.747c5.5 0 10-4.998 10-10.747S17.5 6.253 12 6.253z" />
                    </svg>
                </div>
            </div>
            <p class="text-sm font-bold text-emerald-600 mt-4 flex items-center gap-1">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path></svg>
                +2 minggu ini
            </p>
        </div>

        <div class="bg-white rounded-2xl p-6 shadow-sm border-2 border-slate-100 hover:border-cyan-200 transition-all group">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-slate-500 text-xs font-bold uppercase tracking-wider">Progress Belajar</p>
                    <p class="text-4xl font-black text-slate-900 mt-2 group-hover:text-cyan-700 transition-colors">68%</p>
                </div>
                <div class="bg-cyan-50 p-3 rounded-xl border border-cyan-100 group-hover:bg-cyan-600 transition-colors duration-300">
                    <svg class="w-6 h-6 text-cyan-700 group-hover:text-white transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                    </svg>
                </div>
            </div>
            <div class="w-full bg-slate-200 rounded-full h-3 mt-4 overflow-hidden">
                <div class="bg-gradient-to-r from-cyan-600 to-blue-700 h-3 rounded-full" style="width: 68%"></div>
            </div>
        </div>

        <div class="bg-white rounded-2xl p-6 shadow-sm border-2 border-slate-100 hover:border-indigo-200 transition-all group">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-slate-500 text-xs font-bold uppercase tracking-wider">Jam Belajar</p>
                    <p class="text-4xl font-black text-slate-900 mt-2 group-hover:text-indigo-700 transition-colors">42h</p>
                </div>
                <div class="bg-indigo-50 p-3 rounded-xl border border-indigo-100 group-hover:bg-indigo-600 transition-colors duration-300">
                    <svg class="w-6 h-6 text-indigo-700 group-hover:text-white transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
            </div>
            <p class="text-xs font-semibold text-slate-500 mt-4">Total waktu pembelajaran</p>
        </div>

        <div class="bg-white rounded-2xl p-6 shadow-sm border-2 border-slate-100 hover:border-purple-200 transition-all group">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-slate-500 text-xs font-bold uppercase tracking-wider">Sertifikat</p>
                    <p class="text-4xl font-black text-slate-900 mt-2 group-hover:text-purple-700 transition-colors">5</p>
                </div>
                <div class="bg-purple-50 p-3 rounded-xl border border-purple-100 group-hover:bg-purple-600 transition-colors duration-300">
                    <svg class="w-6 h-6 text-purple-700 group-hover:text-white transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z" />
                    </svg>
                </div>
            </div>
            <p class="text-xs font-semibold text-slate-500 mt-4">Sudah dicapai</p>
        </div>
    </div>

    <div class="relative overflow-hidden bg-gradient-to-r from-blue-700 to-blue-600 rounded-2xl shadow-xl shadow-blue-200 p-8 mb-8 text-white">
        <div class="absolute top-0 right-0 -mr-16 -mt-16 w-64 h-64 rounded-full bg-white opacity-10 blur-2xl"></div>
        
        <div class="relative z-10 flex flex-col md:flex-row items-center justify-between gap-6">
            <div class="flex items-center space-x-5">
                <div class="bg-white/20 backdrop-blur-md p-4 rounded-2xl border border-white/20">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
                <div>
                    @if ($subscription)
                        <h3 class="text-2xl font-bold">Berlangganan Premium Aktif ✓</h3>
                        <p class="text-blue-100 mt-1 font-medium">Berlaku hingga {{ Carbon\Carbon::parse($subscription->ends_at)->translatedFormat('d F Y') }}</p>
                    @else
                        <h3 class="text-2xl font-bold">Upgrade ke Premium</h3>
                        <p class="text-blue-100 mt-1 font-medium">Dapatkan akses penuh ke semua kursus</p>
                    @endif
                </div>
            </div>
            @if (!$subscription)
                <a href="{{ route('subscriptionplan') }}" class="bg-white text-blue-700 px-8 py-3 rounded-xl font-bold hover:bg-gray-50 hover:shadow-lg transition-all transform hover:-translate-y-0.5">
                    Pilih Paket
                </a>
            @else
                <a href="{{ route('subscriptionplan') }}" class="bg-blue-800/50 backdrop-blur-sm text-white px-8 py-3 rounded-xl font-bold border border-white/20 hover:bg-blue-800/70 transition-all">
                    Perpanjang
                </a>
            @endif
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <div class="lg:col-span-2 space-y-6">
            {{-- Menggunakan border slate-200 agar kontras dengan background putih --}}
            <div class="bg-white rounded-2xl shadow-sm border-2 border-slate-100 p-6">
                <div class="flex items-center justify-between mb-6">
                    <h2 class="text-xl font-bold text-slate-900 flex items-center gap-3">
                        <span class="w-10 h-10 rounded-xl bg-blue-100 text-blue-700 flex items-center justify-center border border-blue-200">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.752 11.168l-3.197-2.132A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        </span>
                        Pembelajaran Lanjutan
                    </h2>
                    <a href="#" class="text-blue-700 hover:text-blue-800 font-bold text-sm bg-blue-50 px-4 py-2 rounded-full hover:bg-blue-100 transition-all">Lihat Semua →</a>
                </div>

                <div class="space-y-4">
                    <div class="border-2 border-slate-100 rounded-2xl p-5 hover:border-blue-300 hover:bg-blue-50/30 transition-all cursor-pointer group">
                        <div class="flex items-start justify-between gap-4">
                            <div class="flex-1">
                                <div class="flex items-center gap-2 mb-3">
                                    <span class="px-3 py-1 bg-blue-100 text-blue-800 rounded-full text-xs font-bold uppercase tracking-wide">In Progress</span>
                                    <span class="text-sm text-slate-600 font-semibold">75% complete</span>
                                </div>
                                {{-- Judul Kursus Dipaksa Slate-900 --}}
                                <h3 class="font-bold text-slate-900 text-lg group-hover:text-blue-700 transition-colors">Web Development Mastery</h3>
                                <p class="text-sm text-slate-600 mt-2 font-medium">Instruktur: John Developer</p>
                            </div>
                            <div class="w-14 h-14 bg-gradient-to-br from-blue-500 to-blue-700 rounded-xl shadow-md flex items-center justify-center text-white font-bold text-xl shrink-0">
                                WD
                            </div>
                        </div>
                        <div class="mt-4 w-full bg-slate-200 rounded-full h-2.5">
                            <div class="bg-blue-600 h-2.5 rounded-full" style="width: 75%"></div>
                        </div>
                    </div>

                    <div class="border-2 border-slate-100 rounded-2xl p-5 hover:border-blue-300 hover:bg-blue-50/30 transition-all cursor-pointer group">
                        <div class="flex items-start justify-between gap-4">
                            <div class="flex-1">
                                <div class="flex items-center gap-2 mb-3">
                                    <span class="px-3 py-1 bg-yellow-100 text-yellow-800 rounded-full text-xs font-bold uppercase tracking-wide">Recommended</span>
                                    <span class="text-sm text-slate-600 font-semibold">Belum Dimulai</span>
                                </div>
                                <h3 class="font-bold text-slate-900 text-lg group-hover:text-blue-700 transition-colors">UI/UX Design Principles</h3>
                                <p class="text-sm text-slate-600 mt-2 font-medium">Instruktur: Sarah Designer</p>
                            </div>
                            <div class="w-14 h-14 bg-gradient-to-br from-yellow-400 to-orange-500 rounded-xl shadow-md flex items-center justify-center text-white font-bold text-xl shrink-0">
                                UI
                            </div>
                        </div>
                        <button class="mt-4 w-full py-3 bg-white border-2 border-blue-600 text-blue-700 rounded-xl font-bold hover:bg-blue-600 hover:text-white transition-all text-sm">
                            Mulai Kursus
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <div class="space-y-6">
            <div class="bg-white rounded-2xl shadow-sm border-2 border-slate-100 p-6">
                <h3 class="text-lg font-bold text-slate-900 mb-5 pl-3 border-l-4 border-blue-600">Menu Cepat</h3>
                <div class="space-y-3">
                    <a href="{{ route('allcourse') }}" class="flex items-center gap-4 p-3 rounded-xl bg-slate-50 border border-slate-200 hover:bg-blue-50 hover:border-blue-200 transition-all group cursor-pointer">
                        <div class="w-10 h-10 rounded-lg bg-white text-blue-600 flex items-center justify-center border border-slate-200 group-hover:bg-blue-600 group-hover:text-white transition-all shadow-sm">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C6.5 6.253 2 10.998 2 17s4.5 10.747 10 10.747c5.5 0 10-4.998 10-10.747S17.5 6.253 12 6.253z" /></svg>
                        </div>
                        <div class="flex-1">
                            {{-- Teks Menu Dipaksa Hitam/Gelap --}}
                            <p class="font-bold text-slate-800 group-hover:text-blue-800 transition-colors">Jelajahi Kursus</p>
                        </div>
                        <svg class="w-5 h-5 text-slate-400 group-hover:text-blue-600 group-hover:translate-x-1 transition-all" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                    </a>

                    <a href="#" class="flex items-center gap-4 p-3 rounded-xl bg-slate-50 border border-slate-200 hover:bg-purple-50 hover:border-purple-200 transition-all group cursor-pointer">
                        <div class="w-10 h-10 rounded-lg bg-white text-purple-600 flex items-center justify-center border border-slate-200 group-hover:bg-purple-600 group-hover:text-white transition-all shadow-sm">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z" /></svg>
                        </div>
                        <div class="flex-1">
                             {{-- Teks Menu Dipaksa Hitam/Gelap --}}
                            <p class="font-bold text-slate-800 group-hover:text-purple-800 transition-colors">Sertifikat Saya</p>
                        </div>
                        <svg class="w-5 h-5 text-slate-400 group-hover:text-purple-600 group-hover:translate-x-1 transition-all" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                    </a>
                </div>
            </div>

            <div class="bg-white rounded-2xl shadow-sm border-2 border-slate-100 p-6">
                <h3 class="text-lg font-bold text-slate-900 mb-4 pl-3 border-l-4 border-yellow-400">Pencapaian</h3>
                <div class="space-y-3">
                    <div class="flex items-center gap-3 p-3 rounded-xl bg-slate-50 border border-slate-100">
                        <div class="w-10 h-10 bg-gradient-to-br from-yellow-300 to-yellow-500 rounded-full flex items-center justify-center shadow-sm">
                            <span class="text-lg">🏆</span>
                        </div>
                        <div>
                            <p class="font-bold text-slate-900 text-sm">Quick Learner</p>
                            <p class="text-xs text-slate-600">3 Kursus Selesai</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="bg-gradient-to-br from-blue-50 to-white rounded-2xl shadow-sm border border-blue-100 p-6">
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
                // Memaksa SweetAlert juga menggunakan tema terang
                customClass: {
                    popup: 'bg-white shadow-xl',
                    title: 'text-slate-900',
                    htmlContainer: 'text-slate-600'
                }
            });
        </script>
    @endif
</div>