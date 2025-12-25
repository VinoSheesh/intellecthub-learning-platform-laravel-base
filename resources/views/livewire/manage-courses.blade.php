<div class="w-full min-h-screen font-poppins bg-white p-6 lg:p-8 text-slate-900">

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
                    <span class="ml-1 text-sm font-medium text-gray-500 md:ml-2">Manage Courses</span>
                </div>
            </li>
        </ol>
    </nav>

    <div class="mb-8 flex flex-col md:flex-row md:items-end justify-between gap-4">
        <div>
            {{-- Menggunakan text-slate-900 (hampir hitam) agar terbaca jelas --}}
            <h1 class="text-4xl lg:text-5xl font-extrabold mb-2 tracking-tight text-slate-900">
                Manage Courses
            </h1>
            {{-- Menggelapkan warna deskripsi dari slate-400 ke slate-600 --}}
            <p class="text-slate-600 text-lg font-medium">Atur Seluruh Course</p>
        </div>
    </div>

</div>
