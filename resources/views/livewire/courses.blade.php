<div>
    <h1 class="text-4xl text-gray-800 dark:text-gray-100 font-bold mb-2">Semua Kursus</h1>
    <p class="text-gray-600  mb-8">cari kursus yang anda inginkan</p>
    <div class="flex flex-col md:flex-row items-center gap-4 mb-6">
        <!-- Search -->
        <input type="text" wire:model.live.debounce.300ms="search"
            class="w-full md:w-1/2 p-2 border rounded-lg dark:bg-gray-800 dark:text-gray-200"
            placeholder="Cari kursus...">

        <!-- Category Filter -->
        <select wire:model.live="category"
            class="w-full md:w-1/3 p-2 border rounded-lg dark:bg-gray-800 dark:text-gray-200">
            <option value="">Semua Kategori</option>
            @foreach ($categories as $cat)
                <option value="{{ $cat->id }}">{{ $cat->name }}</option>
            @endforeach
        </select>
    </div>

     <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-8">
        @foreach ($courses as $course)
            <article class="group bg-white dark:bg-gray-800 rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-500 overflow-hidden border border-gray-100 dark:border-gray-700 hover:border-blue-200 dark:hover:border-blue-600 transform hover:-translate-y-3 hover:rotate-1">
                
                <!-- Image Container with Badge -->
                <div class="relative overflow-hidden bg-gradient-to-br from-gray-50 to-gray-100 dark:from-gray-700 dark:to-gray-800">
                    <img src="{{ $course->thumbnail }}" 
                         alt="{{ $course->title }}"
                         class="w-full h-52 object-cover transition-all duration-700 group-hover:scale-110 group-hover:brightness-110">
                    
                    <!-- Category Badge -->
                    <div class="absolute top-4 left-4">
                        <span class="inline-flex items-center px-3 py-1.5 rounded-full text-xs font-semibold bg-white/90 dark:bg-gray-900/90 text-gray-700 dark:text-gray-300 backdrop-blur-sm border border-white/20 dark:border-gray-700/50 shadow-lg">
                            {{ $course->category->name }}
                        </span>
                    </div>
                    
                    <!-- Gradient Overlay -->
                    <div class="absolute inset-0 bg-gradient-to-t from-black/30 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-all duration-300"></div>
                    
                    <!-- Floating Action Button -->
                    <div class="absolute top-4 right-4 opacity-0 group-hover:opacity-100 transition-all duration-300 transform translate-y-2 group-hover:translate-y-0">
                        <button class="w-10 h-10 bg-white dark:bg-gray-800 rounded-full shadow-lg flex items-center justify-center hover:bg-blue-50 dark:hover:bg-blue-900/50 transition-colors duration-200">
                            <svg class="w-5 h-5 text-gray-600 dark:text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                            </svg>
                        </button>
                    </div>
                </div>

                <!-- Content Section -->
                <div class="p-6 space-y-4">
                    <!-- Title -->
                    <h2 class="text-xl font-bold text-gray-800 dark:text-gray-100 leading-tight group-hover:text-blue-600 dark:group-hover:text-blue-400 transition-colors duration-300 line-clamp-2 min-h-[3.5rem]">
                        {{ $course->title }}
                    </h2>

                    <!-- Description -->
                    <p class="text-gray-600 dark:text-gray-400 text-sm leading-relaxed line-clamp-3 min-h-[4.5rem]">
                        {{ Str::limit($course->description, 120) }}
                    </p>

                    <!-- Stats Row -->
                    <div class="flex items-center gap-4 text-xs text-gray-500 dark:text-gray-400 pt-2 border-t border-gray-100 dark:border-gray-700">
                        <div class="flex items-center gap-1">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            <span>8 jam</span>
                        </div>
                        <div class="flex items-center gap-1">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                            </svg>
                            <span>150+ siswa</span>
                        </div>
                        <div class="flex items-center gap-1">
                            <svg class="w-4 h-4 text-yellow-500" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"></path>
                            </svg>
                            <span>4.8</span>
                        </div>
                    </div>
                </div>

                <!-- Footer Section -->
                <div class="px-6 pb-6">
                    <div class="flex items-center justify-between">
                        <!-- Price -->
                        <div class="flex flex-col">
                            <span class="text-xs text-gray-500 dark:text-gray-400">Mulai dari</span>
                            <span class="text-2xl font-bold text-emerald-600 dark:text-emerald-400 group-hover:text-emerald-500 transition-colors duration-300">
                                Rp{{ number_format($course->price, 0, ',', '.') }}
                            </span>
                        </div>

                        <!-- CTA Button -->
                        <button class="px-6 py-3 bg-gradient-to-r from-blue-600 to-blue-700 hover:from-blue-700 hover:to-blue-800 text-white text-sm font-semibold rounded-xl shadow-lg hover:shadow-xl transform transition-all duration-300 hover:scale-105 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 opacity-0 group-hover:opacity-100 translate-y-2 group-hover:translate-y-0">
                            <span class="flex items-center gap-2">
                                Mulai Belajar
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                                </svg>
                            </span>
                        </button>
                    </div>
                </div>

                <!-- Bottom Accent -->
                <div class="h-1.5 bg-gradient-to-r from-blue-500 via-purple-500 to-emerald-500 transform scale-x-0 group-hover:scale-x-100 transition-transform duration-700 origin-left"></div>
            </article>
        @endforeach
    </div>
</div>
</div>
