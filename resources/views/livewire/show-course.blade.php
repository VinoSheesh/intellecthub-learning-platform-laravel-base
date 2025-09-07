<div class="font-poppins bg-background text-foreground min-h-screen">
    <!-- Breadcrumbs - keeping as requested -->
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
                    Kursus
                </a>
            </li>
            <li>
                <div class="flex items-center">
                    <svg class="w-3 h-3 text-gray-400 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 9 4-4-4-4" />
                    </svg>
                    <span class="ml-1 text-sm font-medium text-gray-500 md:ml-2">Semua Kursus</span>
                </div>
            </li>
            <li>
                <div class="flex items-center">
                    <svg class="w-3 h-3 text-gray-400 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 9 4-4-4-4" />
                    </svg>
                    <span class="ml-1 text-sm font-medium text-gray-500 md:ml-2">{{ $course->title }}</span>
                </div>
            </li>
        </ol>
    </nav>

    <!-- Course Content -->
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 pb-16">
        <div class="grid lg:grid-cols-2 gap-12 lg:gap-16 items-start">
            <!-- Course Image -->
            <div class="relative group">
                <div
                    class="aspect-[4/3] overflow-hidden rounded-2xl bg-card shadow-lg group-hover:shadow-xl transition-shadow duration-300">
                    <img src="/{{ $course->thumbnail }}" alt="{{ $course->title }}"
                        class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                </div>
                <!-- Decorative gradient overlay -->
                <div
                    class="absolute inset-0 rounded-2xl bg-gradient-to-t from-black/20 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                </div>
            </div>

            <!-- Course Details -->
            <div class="space-y-4">
                <!-- Category Badge -->
                <div class="flex items-center gap-3">
                    <span
                        class="inline-flex items-center px-4 py-2 rounded-full text-sm font-semibold bg-primary/10 text-primary border border-primary/20">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z">
                            </path>
                        </svg>
                        {{ $course->category->name }}
                    </span>
                </div>

                <!-- Course Title -->
                <div class="space-y-4">
                    <h1 class="text-4xl lg:text-5xl font-bold text-foreground leading-tight text-balance">
                        {{ $course->title }}
                    </h1>
                </div>

                <!-- Course Description -->
                <div class="space-y-6">
                    <div class="prose prose-lg max-w-none">
                        <p class="text-lg text-muted-foreground leading-relaxed text-pretty">
                            {{ $course->description }}
                        </p>
                    </div>
                </div>

                <!-- Course Stats -->
                <div class="flex gap-6 pt-3 border-t border-border">
                    <div class="space-y-2">
                        <div class="flex items-center gap-2 text-muted-foreground">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            <span class="text-sm font-medium">Durasi</span>
                        </div>
                        <p class="text-lg font-semibold text-foreground">8 Minggu</p>
                    </div>
                    <div class="space-y-2">
                        <div class="flex items-center gap-2 text-muted-foreground">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            <span class="text-sm font-medium">Level</span>
                        </div>
                        <p class="text-lg font-semibold text-foreground">Pemula</p>
                    </div>
                </div>

                <!-- Action Buttons -->
                <div class="flex flex-col sm:flex-row gap-4">
                    <button
                        class="flex-1 bg-primary hover:bg-primary/90 text-primary-foreground font-semibold py-3 rounded-xl transition-all duration-200 hover:shadow-lg hover:scale-[1.02] active:scale-[0.98] text-white">
                        <span class="flex items-center justify-center gap-2">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M14.828 14.828a4 4 0 01-5.656 0M9 10h1m4 0h1m-6 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z">
                                </path>
                            </svg>
                            Mulai Belajar
                        </span>
                    </button>
                    <button
                        class="flex-1 sm:flex-initial bg-card hover:bg-muted text-card-foreground font-semibold py-1 px-3 rounded-xl border border-border transition-all duration-200 hover:shadow-md hover:scale-[1.02] active:scale-[0.98]">
                        <span class="flex items-center justify-center gap-2">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z">
                                </path>
                            </svg>
                            Simpan
                        </span>
                    </button>
                </div>
            </div>
        </div>

        <!-- Additional Course Information -->
        <div class="mt-20 space-y-12">
            <!-- What You'll Learn Section -->
            <div class="bg-card rounded-2xl p-8 lg:p-12 border border-border">
                <h2 class="text-2xl lg:text-3xl font-bold text-foreground mb-8">Yang Akan Anda Pelajari</h2>
                <div class="grid md:grid-cols-2 gap-6">
                    <div class="flex items-start gap-4">
                        <div
                            class="flex-shrink-0 w-6 h-6 bg-primary/10 rounded-full flex items-center justify-center mt-1">
                            <svg class="w-4 h-4 text-primary" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M5 13l4 4L19 7"></path>
                            </svg>
                        </div>
                        <div>
                            <h3 class="font-semibold text-foreground mb-2">Konsep Dasar</h3>
                            <p class="text-muted-foreground">Memahami fundamental dan prinsip-prinsip dasar</p>
                        </div>
                    </div>
                    <div class="flex items-start gap-4">
                        <div
                            class="flex-shrink-0 w-6 h-6 bg-primary/10 rounded-full flex items-center justify-center mt-1">
                            <svg class="w-4 h-4 text-primary" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M5 13l4 4L19 7"></path>
                            </svg>
                        </div>
                        <div>
                            <h3 class="font-semibold text-foreground mb-2">Praktik Langsung</h3>
                            <p class="text-muted-foreground">Implementasi nyata melalui project-based learning</p>
                        </div>
                    </div>
                    <div class="flex items-start gap-4">
                        <div
                            class="flex-shrink-0 w-6 h-6 bg-primary/10 rounded-full flex items-center justify-center mt-1">
                            <svg class="w-4 h-4 text-primary" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M5 13l4 4L19 7"></path>
                            </svg>
                        </div>
                        <div>
                            <h3 class="font-semibold text-foreground mb-2">Best Practices</h3>
                            <p class="text-muted-foreground">Teknik dan metodologi terbaik di industri</p>
                        </div>
                    </div>
                    <div class="flex items-start gap-4">
                        <div
                            class="flex-shrink-0 w-6 h-6 bg-primary/10 rounded-full flex items-center justify-center mt-1">
                            <svg class="w-4 h-4 text-primary" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M5 13l4 4L19 7"></path>
                            </svg>
                        </div>
                        <div>
                            <h3 class="font-semibold text-foreground mb-2">Portfolio Project</h3>
                            <p class="text-muted-foreground">Membangun project untuk portfolio profesional</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
