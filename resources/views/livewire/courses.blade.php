<div class="min-h-screen bg-gray-50 dark:bg-gray-900">
    <!-- Added breadcrumbs navigation -->
    <nav class="flex mb-6" aria-label="Breadcrumb">
        <ol class="inline-flex items-center space-x-1 md:space-x-3">
            <li class="inline-flex items-center">
                <a href="{{ route('dashboard') }}" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600 dark:text-gray-400 dark:hover:text-white">
                    <svg class="w-3 h-3 mr-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                        <path d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L9 3.414V19a1 1 0 0 0 2 0V3.414l7.293 7.293a1 1 0 0 0 1.414-1.414Z"/>
                    </svg>
                    Dashboard
                </a>
            </li>
            <li>
                <div class="flex items-center">
                    <svg class="w-3 h-3 text-gray-400 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                    </svg>
                    <span class="ml-1 text-sm font-medium text-gray-500 md:ml-2 dark:text-gray-400">Semua Kursus</span>
                </div>
            </li>
        </ol>
    </nav>

    <!-- Redesigned header with search and filter on the right -->
    <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between mb-8">
        <div class="mb-4 lg:mb-0">
            <h1 class="text-4xl text-gray-800 dark:text-gray-100 font-bold mb-2">Semua Kursus</h1>
            <p class="text-gray-600 dark:text-gray-400">Cari kursus yang anda inginkan</p>
        </div>
        
        <!-- Search and filter moved to right side with improved styling -->
        <div class="flex items-center gap-3">
            <!-- Search Input -->
            <div class="relative">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <svg class="w-4 h-4 text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                    </svg>
                </div>
                <input type="text" wire:model.live.debounce.300ms="search"
                    class="w-64 pl-10 pr-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent dark:bg-gray-800 dark:border-gray-600 dark:text-gray-200 dark:focus:ring-blue-400"
                    placeholder="Cari kursus...">
            </div>
            
            <!-- Category filter changed to filter icon with blue background -->
            <div class="relative" x-data="{ open: false }">
                <button @click="open = !open" 
                    class="flex items-center justify-center w-11 h-11 bg-blue-600 hover:bg-blue-700 text-white rounded-lg transition-colors duration-200 focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                    <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7.75 4H19M7.75 4a2.25 2.25 0 0 1-4.5 0m4.5 0a2.25 2.25 0 0 0-4.5 0M1 4h2.25m13.5 6H19m-2.25 0a2.25 2.25 0 0 1-4.5 0m4.5 0a2.25 2.25 0 0 0-4.5 0M1 10h11.25m-4.5 6H19M7.75 16a2.25 2.25 0 0 1-4.5 0m4.5 0a2.25 2.25 0 0 0-4.5 0M1 16h2.25"/>
                    </svg>
                </button>
                
                <div x-show="open" @click.away="open = false" x-transition
                    class="absolute right-0 mt-2 w-48 bg-white dark:bg-gray-800 rounded-lg shadow-lg border border-gray-200 dark:border-gray-700 z-10">
                    <div class="py-1">
                        <button wire:click="$set('category', '')" @click="open = false"
                            class="block w-full text-left px-4 py-2 text-sm text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700">
                            Semua Kategori
                        </button>
                        @foreach ($categories as $cat)
                            <button wire:click="$set('category', '{{ $cat->id }}')" @click="open = false"
                                class="block w-full text-left px-4 py-2 text-sm text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700">
                                {{ $cat->name }}
                            </button>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Enhanced card grid with more attractive and interactive design -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        @foreach ($courses as $course)
            <div class="group bg-white dark:bg-gray-800 rounded-2xl shadow-sm hover:shadow-2xl transition-all duration-500 overflow-hidden border border-gray-100 dark:border-gray-700 hover:border-blue-200 dark:hover:border-blue-600 hover:-translate-y-2 cursor-pointer">
                <!-- Enhanced image container with overlay effects -->
                <div class="relative overflow-hidden">
                    <img src="{{ $course->thumbnail }}" alt="{{ $course->title }}"
                        class="w-full h-52 object-cover group-hover:scale-110 transition-transform duration-700">
                    
                    <!-- Added gradient overlay for better text readability -->
                    <div class="absolute inset-0 bg-gradient-to-t from-black/20 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                    
                    <!-- Enhanced category badge with animation -->
                    <div class="absolute top-4 left-4 transform group-hover:scale-105 transition-transform duration-300">
                        <span class="inline-flex items-center px-3 py-1.5 rounded-full text-xs font-semibold bg-white/95 text-gray-700 shadow-lg backdrop-blur-sm border border-white/20">
                            {{ $course->category->name }}
                        </span>
                    </div>
                    
                    <!-- Added floating action button -->
                    <div class="absolute top-4 right-4 opacity-0 group-hover:opacity-100 transform translate-y-2 group-hover:translate-y-0 transition-all duration-300">
                        <button class="w-10 h-10 bg-white/90 hover:bg-white text-gray-700 rounded-full shadow-lg backdrop-blur-sm flex items-center justify-center transition-colors duration-200">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                            </svg>
                        </button>
                    </div>
                    
                    <!-- Added progress indicator -->
                    <div class="absolute bottom-0 left-0 right-0 h-1 bg-gray-200 dark:bg-gray-700">
                        <div class="h-full bg-blue-500 transition-all duration-500 group-hover:bg-blue-400" style="width: {{ rand(20, 80) }}%"></div>
                    </div>
                </div>
                
                <!-- Enhanced card content with better typography and spacing -->
                <div class="p-6 space-y-4">
                    <!-- Added instructor info -->
                    <div class="flex items-center space-x-2 text-sm text-gray-500 dark:text-gray-400">
                        <div class="w-6 h-6 bg-blue-100 dark:bg-blue-900 rounded-full flex items-center justify-center">
                            <svg class="w-3 h-3 text-blue-600 dark:text-blue-400" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"></path>
                            </svg>
                        </div>
                        <span>Instructor Name</span>
                        <span>•</span>
                        <span>{{ rand(50, 200) }} siswa</span>
                    </div>
                    
                    <h2 class="text-xl font-bold text-gray-900 dark:text-gray-100 group-hover:text-blue-600 dark:group-hover:text-blue-400 transition-colors duration-300 line-clamp-2">
                        {{ $course->title }}
                    </h2>
                    
                    <p class="text-gray-600 dark:text-gray-400 text-sm leading-relaxed line-clamp-3">
                        {{ Str::limit($course->description, 120) }}
                    </p>
                    
                    <!-- Added rating and stats -->
                    <div class="flex items-center space-x-4 text-sm">
                        <div class="flex items-center space-x-1">
                            <div class="flex items-center">
                                @for($i = 1; $i <= 5; $i++)
                                    <svg class="w-4 h-4 {{ $i <= 4 ? 'text-yellow-400' : 'text-gray-300' }}" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                                    </svg>
                                @endfor
                            </div>
                            <span class="text-gray-600 dark:text-gray-400">4.0</span>
                        </div>
                        <span class="text-gray-400">•</span>
                        <span class="text-gray-600 dark:text-gray-400">{{ rand(5, 25) }} jam</span>
                    </div>
                    
                    <!-- Enhanced price and action section -->
                    <div class="flex items-center justify-between pt-4 border-t border-gray-100 dark:border-gray-700">
                        <div class="space-y-1">
                            <span class="text-2xl font-bold text-green-600 dark:text-green-400">
                                Rp{{ number_format($course->price, 0, ',', '.') }}
                            </span>
                            <div class="text-xs text-gray-500 dark:text-gray-400">
                                <span class="line-through">Rp{{ number_format($course->price * 1.5, 0, ',', '.') }}</span>
                                <span class="ml-2 text-red-500 font-medium">33% OFF</span>
                            </div>
                        </div>
                        
                        <!-- Enhanced action buttons with better animations -->
                        <div class="flex items-center space-x-2">
                            <button class="px-6 py-2.5 bg-blue-600 hover:bg-blue-700 text-white text-sm font-semibold rounded-xl transition-all duration-300 opacity-0 group-hover:opacity-100 transform translate-x-4 group-hover:translate-x-0 shadow-lg hover:shadow-xl hover:scale-105">
                                Daftar Sekarang
                            </button>
                        </div>
                    </div>
                </div>
                
                <!-- Added subtle glow effect on hover -->
                <div class="absolute inset-0 rounded-2xl opacity-0 group-hover:opacity-100 transition-opacity duration-500 pointer-events-none">
                    <div class="absolute inset-0 rounded-2xl shadow-2xl shadow-blue-500/10"></div>
                </div>
            </div>
        @endforeach
    </div>
</div>
    