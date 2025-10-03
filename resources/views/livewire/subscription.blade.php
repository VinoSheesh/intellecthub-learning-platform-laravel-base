<div class="min-h-screen font-poppins">
    {{-- Hero Section --}}
    <div class="mx-auto pt-4 pb-16 px-6">
        <div class="text-center mb-20">
            <h1 class="text-5xl md:text-6xl font-bold text-gray-900 mb-6">
                Tingkatkan Skill Coding Anda
            </h1>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto leading-relaxed">
                Bergabunglah dengan ribuan developer yang telah mengembangkan karir mereka melalui kursus coding premium kami
            </p>
        </div>

        {{-- Pricing Section --}}
        <div class="mb-24">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-bold text-gray-900 mb-4">
                    Pilih Paket Langganan
                </h2>
                <p class="text-lg text-gray-600 max-w-2xl mx-auto">
                    Investasi terbaik untuk masa depan karir coding Anda
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8 max-w-6xl mx-auto">
                {{-- Redesigned pricing cards with clean minimalist style --}}
                {{-- Paket 1 Bulan --}}
                <div class="group relative border border-gray-200 rounded-2xl p-8 text-center transition-all duration-300 hover:border-gray-300 hover:shadow-lg hover:-translate-y-1 cursor-pointer">
                    <div class="mb-6">
                        <h3 class="text-2xl font-semibold text-gray-900 mb-2">Starter</h3>
                        <p class="text-gray-500">1 bulan</p>
                    </div>
                    <div class="mb-8">
                        <span class="text-4xl font-bold text-gray-900">Rp 1,5jt</span>
                        <p class="text-gray-500 mt-2">per bulan</p>
                    </div>
                    <button wire:click="pay('1_month', 1500000)"
                        class="w-full bg-gray-900 hover:bg-gray-800 text-white font-medium py-4 px-6 rounded-xl transition-all duration-200">
                        Mulai Belajar
                    </button>
                </div>

                {{-- Paket 3 Bulan --}}
                <div class="group relative border border-gray-200 rounded-2xl p-8 text-center transition-all duration-300 hover:border-gray-300 hover:shadow-lg hover:-translate-y-1 cursor-pointer">
                    <div class="mb-6">
                        <h3 class="text-2xl font-semibold text-gray-900 mb-2">Growth</h3>
                        <p class="text-gray-500">3 bulan</p>
                    </div>
                    <div class="mb-8">
                        <span class="text-4xl font-bold text-gray-900">Rp 4,5jt</span>
                        <p class="text-gray-500 mt-2">Rp 1,5jt/bulan</p>
                    </div>
                    <button wire:click="pay('3_month', 4500000)"
                        class="w-full bg-gray-900 hover:bg-gray-800 text-white font-medium py-4 px-6 rounded-xl transition-all duration-200">
                        Pilih Paket
                    </button>
                </div>

                {{-- Paket 6 Bulan - Popular --}}
                <div class="group relative border-2 border-blue-500 rounded-2xl p-8 text-center transition-all duration-300 hover:border-blue-600 hover:shadow-xl hover:-translate-y-2 cursor-pointer transform scale-105">
                    <div class="absolute -top-4 left-1/2 transform -translate-x-1/2">
                        <span class="bg-blue-500 text-white text-sm font-medium px-6 py-2 rounded-full">
                            Hemat 10%
                        </span>
                    </div>
                    <div class="mb-6 mt-4">
                        <h3 class="text-2xl font-semibold text-gray-900 mb-2">Professional</h3>
                        <p class="text-gray-500">6 bulan</p>
                    </div>
                    <div class="mb-8">
                        <p class="line-through text-gray-400 text-lg mb-1">Rp 9jt</p>
                        <span class="text-4xl font-bold text-blue-600">Rp 8,1jt</span>
                        <p class="text-gray-500 mt-2">Rp 1,35jt/bulan</p>
                    </div>
                    <button wire:click="pay('6_month', 8100000)"
                        class="w-full bg-blue-500 hover:bg-blue-600 text-white font-medium py-4 px-6 rounded-xl transition-all duration-200 transform group-hover:scale-105">
                        Pilih Paket
                    </button>
                </div>

                {{-- Paket 1 Tahun --}}
                <div class="group relative border-2 border-green-500 rounded-2xl p-8 text-center transition-all duration-300 hover:border-green-600 hover:shadow-lg hover:-translate-y-1 cursor-pointer">
                    <div class="absolute -top-4 left-1/2 transform -translate-x-1/2">
                        <span class="bg-green-500 text-white text-sm font-medium px-6 py-2 rounded-full">
                            Hemat 30%
                        </span>
                    </div>
                    <div class="mb-6 mt-4">
                        <h3 class="text-2xl font-semibold text-gray-900 mb-2">Expert</h3>
                        <p class="text-gray-500">1 tahun</p>
                    </div>
                    <div class="mb-8">
                        <p class="line-through text-gray-400 text-lg mb-1">Rp 18jt</p>
                        <span class="text-4xl font-bold text-green-600">Rp 12,6jt</span>
                        <p class="text-gray-500 mt-2">Rp 1,05jt/bulan</p>
                    </div>
                    <button wire:click="pay('1_year', 12600000)"
                        class="w-full bg-green-500 hover:bg-green-600 text-white font-medium py-4 px-6 rounded-xl transition-all duration-200">
                        Pilih Paket
                    </button>
                </div>
            </div>
        </div>

        {{-- Moved benefits section after pricing as requested --}}
        {{-- Benefits Section --}}
        <div class="mb-20">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-bold text-gray-900 mb-4">
                    Apa yang Anda Dapatkan?
                </h2>
                <p class="text-lg text-gray-600 max-w-2xl mx-auto">
                    Akses lengkap ke semua fitur premium untuk mengakselerasi pembelajaran coding Anda
                </p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 max-w-6xl mx-auto">
                {{-- Simplified benefit cards with clean design --}}
                {{-- Benefit 1 --}}
                <div class="group border border-gray-200 rounded-2xl p-8 transition-all duration-300 hover:border-gray-300 hover:shadow-md hover:-translate-y-1">
                    <div class="w-16 h-16 bg-blue-50 rounded-2xl flex items-center justify-center mb-6 group-hover:bg-blue-100 transition-colors duration-300">
                        <svg class="w-8 h-8 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900 mb-3">
                        Akses Semua Kursus
                    </h3>
                    <p class="text-gray-600 leading-relaxed">
                        Akses unlimited ke 100+ kursus coding dari basic hingga advanced level
                    </p>
                </div>

                {{-- Benefit 2 --}}
                <div class="group border border-gray-200 rounded-2xl p-8 transition-all duration-300 hover:border-gray-300 hover:shadow-md hover:-translate-y-1">
                    <div class="w-16 h-16 bg-green-50 rounded-2xl flex items-center justify-center mb-6 group-hover:bg-green-100 transition-colors duration-300">
                        <svg class="w-8 h-8 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900 mb-3">
                        Sertifikat Resmi
                    </h3>
                    <p class="text-gray-600 leading-relaxed">
                        Dapatkan sertifikat yang diakui industri untuk setiap kursus yang diselesaikan
                    </p>
                </div>

                {{-- Benefit 3 --}}
                <div class="group border border-gray-200 rounded-2xl p-8 transition-all duration-300 hover:border-gray-300 hover:shadow-md hover:-translate-y-1">
                    <div class="w-16 h-16 bg-purple-50 rounded-2xl flex items-center justify-center mb-6 group-hover:bg-purple-100 transition-colors duration-300">
                        <svg class="w-8 h-8 text-purple-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900 mb-3">
                        Komunitas Developer
                    </h3>
                    <p class="text-gray-600 leading-relaxed">
                        Bergabung dengan komunitas eksklusif untuk networking dan diskusi
                    </p>
                </div>

                {{-- Benefit 4 --}}
                <div class="group border border-gray-200 rounded-2xl p-8 transition-all duration-300 hover:border-gray-300 hover:shadow-md hover:-translate-y-1">
                    <div class="w-16 h-16 bg-orange-50 rounded-2xl flex items-center justify-center mb-6 group-hover:bg-orange-100 transition-colors duration-300">
                        <svg class="w-8 h-8 text-orange-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900 mb-3">
                        Mentoring 1-on-1
                    </h3>
                    <p class="text-gray-600 leading-relaxed">
                        Sesi mentoring personal dengan expert developer berpengalaman
                    </p>
                </div>

                {{-- Benefit 5 --}}
                <div class="group border border-gray-200 rounded-2xl p-8 transition-all duration-300 hover:border-gray-300 hover:shadow-md hover:-translate-y-1">
                    <div class="w-16 h-16 bg-red-50 rounded-2xl flex items-center justify-center mb-6 group-hover:bg-red-100 transition-colors duration-300">
                        <svg class="w-8 h-8 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900 mb-3">
                        Project Portfolio
                    </h3>
                    <p class="text-gray-600 leading-relaxed">
                        Bangun portfolio dengan 20+ project real-world yang siap dipresentasikan
                    </p>
                </div>

                {{-- Benefit 6 --}}
                <div class="group border border-gray-200 rounded-2xl p-8 transition-all duration-300 hover:border-gray-300 hover:shadow-md hover:-translate-y-1">
                    <div class="w-16 h-16 bg-indigo-50 rounded-2xl flex items-center justify-center mb-6 group-hover:bg-indigo-100 transition-colors duration-300">
                        <svg class="w-8 h-8 text-indigo-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900 mb-3">
                        Update Konten Terbaru
                    </h3>
                    <p class="text-gray-600 leading-relaxed">
                        Akses konten terbaru dan teknologi terkini dalam dunia programming
                    </p>
                </div>
            </div>
        </div>

        {{-- Simplified trust section with clean styling --}}
        {{-- Trust Section --}}
        <div class="text-center border border-gray-200 rounded-3xl p-12">
            <h3 class="text-3xl font-bold text-gray-900 mb-6">
                Mengapa Memilih Kami?
            </h3>
            <p class="text-gray-600 max-w-4xl mx-auto leading-relaxed text-lg mb-8">
                Dengan pengalaman lebih dari 5 tahun dalam industri teknologi, kami telah membantu ribuan developer 
                mencapai karir impian mereka. Kurikulum kami selalu update dengan teknologi terkini dan diajarkan 
                oleh praktisi berpengalaman dari perusahaan teknologi terkemuka.
            </p>
            <div class="flex flex-wrap justify-center items-center gap-8 text-gray-600">
                <div class="flex items-center gap-3">
                    <div class="w-6 h-6 bg-blue-500 rounded-full flex items-center justify-center">
                        <svg class="w-4 h-4 text-white" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                        </svg>
                    </div>
                    <span class="font-medium">Garansi 30 hari</span>
                </div>
                <div class="flex items-center gap-3">
                    <div class="w-6 h-6 bg-green-500 rounded-full flex items-center justify-center">
                        <svg class="w-4 h-4 text-white" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                        </svg>
                    </div>
                    <span class="font-medium">Support 24/7</span>
                </div>
                <div class="flex items-center gap-3">
                    <div class="w-6 h-6 bg-blue-500 rounded-full flex items-center justify-center">
                        <svg class="w-4 h-4 text-white" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                        </svg>
                    </div>
                    <span class="font-medium">Akses seumur hidup</span>
                </div>
            </div>
        </div>
    </div>
</div>