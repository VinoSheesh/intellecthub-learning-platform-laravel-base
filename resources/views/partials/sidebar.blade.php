<!-- Sidebar -->
<aside id="sidebar" class="fixed left-0 top-16 bottom-0 w-64 bg-white shadow-xl transform transition-all duration-300 ease-in-out z-40 border-r border-gray-100 overflow-hidden">

    <!-- Navigation Menu -->
    <nav class="flex-1 px-4 py-6 space-y-2">
        <!-- Dashboard -->
        <a href="{{ route('dashboard') }}" class="sidebar-menu-item group flex items-center px-4 py-3 text-sm font-medium rounded-xl transition-all duration-200 {{ request()->routeIs('dashboard') ? 'bg-blue-50 text-blue-700 border-r-4 border-blue-600' : 'text-gray-600 hover:bg-gray-50 hover:text-gray-900' }}">
            <svg class="menu-icon w-5 h-5 mr-3 flex-shrink-0 {{ request()->routeIs('dashboard') ? 'text-blue-600' : 'text-gray-400 group-hover:text-gray-500' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2H5a2 2 0 00-2-2z"></path>
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 5a2 2 0 012-2h4a2 2 0 012 2v6H8V5z"></path>
            </svg>
            <span class="menu-text">Dashboard</span>
            @if(request()->routeIs('dashboard'))
                <div class="ml-auto w-2 h-2 bg-blue-600 rounded-full flex-shrink-0"></div>
            @endif
        </a>

        <!-- My Courses -->
        <div x-data="{ open: {{ request()->routeIs('courses.*') ? 'true' : 'false' }} }" class="sidebar-dropdown">
            <button @click="open = !open" class="sidebar-menu-item w-full group flex items-center justify-between px-4 py-3 text-sm font-medium rounded-xl transition-all duration-200 {{ request()->routeIs('courses.*') ? 'bg-blue-50 text-blue-700' : 'text-gray-600 hover:bg-gray-50 hover:text-gray-900' }}">
                <div class="flex items-center">
                    <svg class="menu-icon w-5 h-5 mr-3 flex-shrink-0 {{ request()->routeIs('courses.*') ? 'text-blue-600' : 'text-gray-400 group-hover:text-gray-500' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                    </svg>
                    <span class="menu-text">My Courses</span>
                </div>
                <svg class="dropdown-arrow w-4 h-4 transition-transform duration-200 flex-shrink-0" :class="{ 'rotate-180': open }" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 9-7 7-7-7"></path>
                </svg>
            </button>
            
            <!-- Submenu -->
            <div x-show="open" x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0 -translate-y-1" x-transition:enter-end="opacity-100 translate-y-0" class="submenu ml-8 mt-2 space-y-1">
                <a href="#" class="menu-text block px-4 py-2 text-sm text-gray-600 rounded-lg hover:bg-gray-50 hover:text-gray-900 transition-colors">All Courses</a>
                <a href="#" class="menu-text block px-4 py-2 text-sm text-gray-600 rounded-lg hover:bg-gray-50 hover:text-gray-900 transition-colors">In Progress</a>
                <a href="#" class="menu-text block px-4 py-2 text-sm text-gray-600 rounded-lg hover:bg-gray-50 hover:text-gray-900 transition-colors">Completed</a>
                <a href="#" class="menu-text block px-4 py-2 text-sm text-gray-600 rounded-lg hover:bg-gray-50 hover:text-gray-900 transition-colors">Favorites</a>
            </div>
        </div>

        <!-- Assignments -->
        <a href="#" class="group flex items-center px-4 py-3 text-sm font-medium rounded-xl text-gray-600 hover:bg-gray-50 hover:text-gray-900 transition-all duration-200">
            <svg class="w-5 h-5 mr-3 text-gray-400 group-hover:text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"></path>
            </svg>
            Assignments
    
        </a>

        <!-- Grades -->
        <a href="#" class="group flex items-center px-4 py-3 text-sm font-medium rounded-xl text-gray-600 hover:bg-gray-50 hover:text-gray-900 transition-all duration-200">
            <svg class="w-5 h-5 mr-3 text-gray-400 group-hover:text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
            </svg>
            Grades & Progress
        </a>

        <!-- Calendar -->
        <a href="#" class="group flex items-center px-4 py-3 text-sm font-medium rounded-xl text-gray-600 hover:bg-gray-50 hover:text-gray-900 transition-all duration-200">
            <svg class="w-5 h-5 mr-3 text-gray-400 group-hover:text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
            </svg>
            Calendar
        </a>

</aside>

<!-- Overlay for mobile -->
<div id="sidebarOverlay" class="fixed inset-0 bg-black bg-opacity-50 z-30 lg:hidden opacity-0 pointer-events-none transition-opacity duration-300"></div>

<!-- JavaScript for Sidebar Toggle -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const sidebar = document.getElementById('sidebar');
        const sidebarToggle = document.getElementById('sidebarToggle');
        const sidebarOverlay = document.getElementById('sidebarOverlay');
        const mainContent = document.querySelector('main');
        
        let isCollapsed = false;
        let isMobile = window.innerWidth < 1024;

        // Initially hide sidebar on mobile
        if (isMobile) {
            sidebar.classList.add('-translate-x-full');
        }

        function toggleSidebar() {
            if (isMobile) {
                // Mobile behavior - slide in/out
                const isHidden = sidebar.classList.contains('-translate-x-full');
                
                if (isHidden) {
                    // Show sidebar
                    sidebar.classList.remove('-translate-x-full');
                    sidebarOverlay.classList.remove('opacity-0', 'pointer-events-none');
                    document.body.classList.add('overflow-hidden');
                } else {
                    // Hide sidebar
                    sidebar.classList.add('-translate-x-full');
                    sidebarOverlay.classList.add('opacity-0', 'pointer-events-none');
                    document.body.classList.remove('overflow-hidden');
                }
            } else {
                // Desktop behavior - collapse/expand with smooth transition
                isCollapsed = !isCollapsed;
                
                if (isCollapsed) {
                    // Collapse sidebar
                    sidebar.style.width = '4rem'; // 16 * 0.25rem = 4rem
                    
                    // Hide text and arrows with delay
                    setTimeout(() => {
                        const menuTexts = sidebar.querySelectorAll('.menu-text');
                        const dropdownArrows = sidebar.querySelectorAll('.dropdown-arrow');
                        const submenu = sidebar.querySelectorAll('.submenu');
                        
                        menuTexts.forEach(text => {
                            text.style.opacity = '0';
                            text.style.display = 'none';
                        });
                        
                        dropdownArrows.forEach(arrow => {
                            arrow.style.opacity = '0';
                            arrow.style.display = 'none';
                        });
                        
                        submenu.forEach(menu => {
                            menu.style.display = 'none';
                        });
                        
                        // Center icons
                        const menuItems = sidebar.querySelectorAll('.sidebar-menu-item');
                        menuItems.forEach(item => {
                            item.style.justifyContent = 'center';
                            item.style.paddingLeft = '0.75rem';
                            item.style.paddingRight = '0.75rem';
                        });
                        
                    }, 150);
                    
                    // Adjust main content
                    if (mainContent) {
                        mainContent.style.marginLeft = '4rem';
                    }
                    
                } else {
                    // Expand sidebar
                    sidebar.style.width = '16rem'; // 64 * 0.25rem = 16rem
                    
                    // Reset menu items layout
                    const menuItems = sidebar.querySelectorAll('.sidebar-menu-item');
                    menuItems.forEach(item => {
                        item.style.justifyContent = '';
                        item.style.paddingLeft = '';
                        item.style.paddingRight = '';
                    });
                    
                    // Show text and arrows with delay
                    setTimeout(() => {
                        const menuTexts = sidebar.querySelectorAll('.menu-text');
                        const dropdownArrows = sidebar.querySelectorAll('.dropdown-arrow');
                        const submenu = sidebar.querySelectorAll('.submenu');
                        
                        menuTexts.forEach(text => {
                            text.style.display = '';
                            text.style.opacity = '1';
                        });
                        
                        dropdownArrows.forEach(arrow => {
                            arrow.style.display = '';
                            arrow.style.opacity = '1';
                        });
                        
                        submenu.forEach(menu => {
                            menu.style.display = '';
                        });
                        
                    }, 150);
                    
                    // Adjust main content
                    if (mainContent) {
                        mainContent.style.marginLeft = '16rem';
                    }
                }
            }
        }

        // Toggle sidebar
        if (sidebarToggle) {
            sidebarToggle.addEventListener('click', toggleSidebar);
        }

        // Close sidebar when clicking overlay (mobile)
        if (sidebarOverlay) {
            sidebarOverlay.addEventListener('click', function() {
                if (isMobile && !sidebar.classList.contains('-translate-x-full')) {
                    sidebar.classList.add('-translate-x-full');
                    sidebarOverlay.classList.add('opacity-0', 'pointer-events-none');
                    document.body.classList.remove('overflow-hidden');
                }
            });
        }

        // Handle window resize
        window.addEventListener('resize', function() {
            const wasMobile = isMobile;
            isMobile = window.innerWidth < 1024;
            
            if (wasMobile !== isMobile) {
                if (isMobile) {
                    // Switched to mobile
                    sidebar.classList.add('-translate-x-full');
                    sidebar.style.width = '';
                    sidebarOverlay.classList.add('opacity-0', 'pointer-events-none');
                    document.body.classList.remove('overflow-hidden');
                    isCollapsed = false;
                    
                    // Reset all styles
                    const menuTexts = sidebar.querySelectorAll('.menu-text');
                    const dropdownArrows = sidebar.querySelectorAll('.dropdown-arrow');
                    const submenu = sidebar.querySelectorAll('.submenu');
                    const menuItems = sidebar.querySelectorAll('.sidebar-menu-item');
                    
                    menuTexts.forEach(text => {
                        text.style.display = '';
                        text.style.opacity = '';
                    });
                    
                    dropdownArrows.forEach(arrow => {
                        arrow.style.display = '';
                        arrow.style.opacity = '';
                    });
                    
                    submenu.forEach(menu => {
                        menu.style.display = '';
                    });
                    
                    menuItems.forEach(item => {
                        item.style.justifyContent = '';
                        item.style.paddingLeft = '';
                        item.style.paddingRight = '';
                    });
                    
                    if (mainContent) {
                        mainContent.style.marginLeft = '';
                    }
                    
                } else {
                    // Switched to desktop
                    sidebar.classList.remove('-translate-x-full');
                    sidebarOverlay.classList.add('opacity-0', 'pointer-events-none');
                    document.body.classList.remove('overflow-hidden');
                }
            }
        });

        // Close sidebar with ESC key
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape' && isMobile && !sidebar.classList.contains('-translate-x-full')) {
                sidebar.classList.add('-translate-x-full');
                sidebarOverlay.classList.add('opacity-0', 'pointer-events-none');
                document.body.classList.remove('overflow-hidden');
            }
        });
    });
</script>
</script>

<!-- Add Alpine.js for dropdown functionality -->
<script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>