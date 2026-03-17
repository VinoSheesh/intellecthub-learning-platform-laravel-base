<div class="w-full min-h-screen font-poppins bg-white p-6 lg:p-8 text-slate-900">

    <div class="mb-8 flex flex-col md:flex-row md:items-end justify-between gap-4">
        <div>
            {{-- Menggunakan text-slate-900 (hampir hitam) agar terbaca jelas --}}
            <h1 class="text-4xl lg:text-5xl font-extrabold mb-2 tracking-tight text-slate-900">
                Admin Panel<span class="text-transparent bg-clip-text bg-gradient-to-r from-blue-700 to-cyan-600"></span>
            </h1>
            {{-- Menggelapkan warna deskripsi dari slate-400 ke slate-600 --}}
            <p class="text-slate-600 text-lg font-medium">pilih menu berikut ini</p>
        </div>
        <div class="text-sm font-bold text-blue-800 bg-blue-50 px-4 py-2 rounded-full border border-blue-200 shadow-sm">
            {{ Carbon\Carbon::now()->translatedFormat('l, d F Y') }}
        </div>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6 items-stretch">
        <a class="w-full flex flex-col items-center justify-center gap-3 p-6 md:p-8 bg-gradient-to-r from-blue-700 to-cyan-600 rounded-xl border border-blue-100 min-h-[160px] hover:shadow-lg transition-shadow duration-200"
            href="{{ route('managecourses') }}">
            <i class="fa-solid fa-book-open text-5xl md:text-6xl text-white"></i>
            <h2 class="text-white text-lg md:text-xl font-bold">Manage Course</h2>
        </a>

        <a class="w-full flex flex-col items-center justify-center gap-3 p-6 md:p-8 bg-gradient-to-r from-blue-700 to-cyan-600 rounded-xl border border-blue-100 min-h-[160px] hover:shadow-lg transition-shadow duration-200"
            href="{{ route('managecategories') }}">
            <i class="fa-solid fa-filter text-5xl md:text-6xl text-white"></i>
            <h2 class="text-white text-lg md:text-xl font-bold">Manage Categories</h2>
        </a>
    </div>


</div>
