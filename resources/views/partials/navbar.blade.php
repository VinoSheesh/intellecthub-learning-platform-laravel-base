<!-- Navbar Header -->
<header class="fixed top-0 left-0 right-0 z-50 bg-gradient-to-r from-blue-600 to-blue-700 shadow-lg">
    <div class="flex items-center justify-between px-6 h-16">
        <!-- Logo & Menu Toggle -->
        <div class="flex items-center space-x-4">
            <button id="sidebarToggle"
                class="text-white hover:bg-white/20 p-2 rounded-lg transition-all duration-200 hover:shadow-lg hover:shadow-blue-500/25">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16">
                    </path>
                </svg>
            </button>
            <div class="hidden md:flex items-center space-x-3">
                <div class="w-10 h-10 bg-white/20 rounded-xl flex items-center justify-center backdrop-blur-sm">
                    <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 20 20">
                        <path
                            d="M10.394 2.08a1 1 0 00-.788 0l-7 3a1 1 0 000 1.84L5.25 8.051a.999.999 0 01.356-.257l4-1.714a1 1 0 11.788 1.838L7.667 9.088l1.94.831a1 1 0 00.787 0l7-3a1 1 0 000-1.838l-7-3zM3.31 9.397L5 10.12v4.102a8.969 8.969 0 00-1.05-.174 1 1 0 01-.89-.89 11.115 11.115 0 01.25-3.762zM9.3 16.573A9.026 9.026 0 007 14.935v-3.957l1.818.78a3 3 0 002.364 0l5.508-2.361a11.026 11.026 0 01.25 3.762 1 1 0 01-.89.89 8.968 8.968 0 00-5.35 2.524 1 1 0 01-1.4 0zM6 18a1 1 0 001-1v-2.065a8.935 8.935 0 00-2-.712V17a1 1 0 001 1z" />
                    </svg>
                </div>
                <span class="text-white font-bold text-xl tracking-wide">IntellectHub</span>
            </div>
        </div>

        <!-- Search Bar (Desktop) -->
        <div class="hidden lg:flex items-center flex-1 max-w-md mx-8">
            <div class="relative w-full">
                <input type="text" placeholder="Search courses, topics..."
                    class="w-full pl-12 pr-4 py-3 rounded-xl bg-white/10 text-white placeholder-white/70 border border-white/20 focus:border-white focus:bg-white/20 transition-all duration-300 backdrop-blur-sm">
                <svg class="w-5 h-5 absolute left-4 top-4 text-white/70" fill="none" stroke="currentColor"
                    viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m21 21-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                </svg>
            </div>
        </div>

        <!-- Right Menu -->
        <div class="flex items-center">
            <!-- Mobile Search Toggle -->
            <button class="lg:hidden text-white hover:bg-white/20 p-2 rounded-lg transition-all duration-200">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m21 21-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                </svg>
            </button>

            <!-- Notifications -->
            <div class="relative">
                <button
                    class="text-white hover:bg-white/20 p-2 rounded-lg transition-all duration-200 hover:shadow-lg hover:shadow-blue-500/25">
                    <i class="fas fa-bell w-6 h-6"></i>
                    <span
                        class="absolute -top-1 -right-1 bg-red-500 text-white text-xs rounded-full w-5 h-5 flex items-center justify-center animate-pulse">3</span>
                </button>
            </div>

            <!-- User Menu -->
            <div class="relative" x-data="{ open: false }">
                <button @click="open = !open"
                    class="flex items-center space-x-3 text-white hover:bg-white/20 px-4 py-2 rounded-xl transition-all duration-200 hover:shadow-lg hover:shadow-blue-500/25">
                    <div
                        class="w-8 h-8 bg-gradient-to-br from-white/30 to-white/10 rounded-full flex items-center justify-center backdrop-blur-sm">
                        <span class="text-sm font-semibold">{{ substr(auth()->user()->name, 0, 1) }}</span>
                    </div>
                    <span class="hidden md:block font-medium">{{ auth()->user()->name }}</span>
                    <svg class="w-4 h-4 transition-transform duration-200" :class="{ 'rotate-180': open }"
                        fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 9-7 7-7-7"></path>
                    </svg>
                </button>

                <!-- Dropdown Menu -->
                <div x-show="open" x-transition:enter="transition ease-out duration-200"
                    x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100"
                    x-transition:leave="transition ease-in duration-75" x-transition:leave-start="opacity-100 scale-100"
                    x-transition:leave-end="opacity-0 scale-95" @click.outside="open = false"
                    class="absolute right-0 mt-3 w-56 bg-white rounded-2xl shadow-xl border border-gray-100 py-2 overflow-hidden">
                    <div class="px-4 py-3 border-b border-gray-100">
                        <p class="text-sm font-semibold text-gray-900">{{ auth()->user()->name }}</p>
                        <p class="text-sm text-gray-500">{{ auth()->user()->email }}</p>
                    </div>

                    <a href="#"
                        class="flex items-center px-4 py-3 text-gray-700 hover:bg-blue-50 hover:text-blue-600 transition-colors group">
                        <svg class="w-5 h-5 mr-3 text-gray-400 group-hover:text-blue-500" fill="none"
                            stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                        </svg>
                        Profile Settings
                    </a>

                    <a href="#"
                        class="flex items-center px-4 py-3 text-gray-700 hover:bg-blue-50 hover:text-blue-600 transition-colors group">
                        <svg class="w-5 h-5 mr-3 text-gray-400 group-hover:text-blue-500" fill="none"
                            stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z">
                            </path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                        </svg>
                        Account Settings
                    </a>

                    <div class="border-t border-gray-100 mt-2"></div>

                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit"
                            class="w-full flex items-center px-4 py-3 text-red-600 hover:bg-red-50 transition-colors group">
                            <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1">
                                </path>
                            </svg>
                            Sign Out
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Mobile Search Bar (Hidden by default) -->
    <div class="lg:hidden border-t border-white/20 px-6 py-3" style="display: none;" id="mobileSearch">
        <div class="relative">
            <input type="text" placeholder="Search courses, topics..."
                class="w-full pl-12 pr-4 py-3 rounded-xl bg-white/10 text-white placeholder-white/70 border border-white/20 focus:border-white focus:bg-white/20 transition-all duration-300 backdrop-blur-sm">
            <svg class="w-5 h-5 absolute left-4 top-4 text-white/70" fill="none" stroke="currentColor"
                viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="m21 21-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
            </svg>
        </div>
    </div>
</header>

<!-- Add Alpine.js for dropdown functionality -->
<script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
