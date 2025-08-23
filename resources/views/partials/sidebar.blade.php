<!-- Sidebar -->
<aside id="sidebar"
    class="fixed left-0 top-16 bottom-0 w-64 bg-white shadow-xl transform transition-all duration-300 ease-in-out z-40 border-r border-gray-100 overflow-hidden">

    <!-- Navigation Menu -->
    <nav class="flex-1 px-4 py-6 space-y-2">
        <!-- Dashboard -->
        <a href="{{ route('dashboard') }}"
            class="sidebar-menu-item group flex items-center px-4 py-3 text-sm font-medium rounded-xl transition-all duration-200 {{ request()->routeIs('dashboard') ? 'bg-blue-50 text-blue-700 border-r-4 border-blue-600' : 'text-gray-600 hover:bg-gray-50 hover:text-gray-900' }}">
            <i class="fa-solid fa-house mr-3"></i>
            <span class="menu-text">Dashboard</span>
            @if (request()->routeIs('dashboard'))
                <div class="ml-auto w-2 h-2 bg-blue-600 rounded-full flex-shrink-0"></div>
            @endif
        </a>

        <!-- My Courses -->
        <div x-data="{ open: {{ request()->routeIs('courses.*') ? 'true' : 'false' }} }" class="sidebar-dropdown">
            <button @click="open = !open"
                class="sidebar-menu-item w-full group flex items-center justify-between px-4 py-3 text-sm font-medium rounded-xl transition-all duration-200 {{ request()->routeIs('courses.*') ? 'bg-blue-50 text-blue-700' : 'text-gray-600 hover:bg-gray-50 hover:text-gray-900' }}">
                <div class="flex items-center">
                    <i class="fa-solid fa-book-open mr-3"></i>
                    <span class="menu-text">My Courses</span>
                </div>
                <i class="fa-solid fa-caret-down":class="{ 'rotate-180': open }" fill="none" stroke="currentColor"
                    viewBox="0 0 24 24"></i>

            </button>

            <!-- Submenu -->
            <div x-show="open" x-transition:enter="transition ease-out duration-200"
                x-transition:enter-start="opacity-0 -translate-y-1" x-transition:enter-end="opacity-100 translate-y-0"
                class="submenu ml-8 mt-2 space-y-1">
                <a href="#"
                    class="menu-text block px-4 py-2 text-sm text-gray-600 rounded-lg hover:bg-gray-50 hover:text-gray-900 transition-colors">All
                    Courses</a>
                <a href="#"
                    class="menu-text block px-4 py-2 text-sm text-gray-600 rounded-lg hover:bg-gray-50 hover:text-gray-900 transition-colors">In
                    Progress</a>
                <a href="#"
                    class="menu-text block px-4 py-2 text-sm text-gray-600 rounded-lg hover:bg-gray-50 hover:text-gray-900 transition-colors">Completed</a>
                <a href="#"
                    class="menu-text block px-4 py-2 text-sm text-gray-600 rounded-lg hover:bg-gray-50 hover:text-gray-900 transition-colors">Favorites</a>
            </div>
        </div>

        <!-- Assignments -->
        <a href="#"
            class="group flex items-center px-4 py-3 text-sm font-medium rounded-xl text-gray-600 hover:bg-gray-50 hover:text-gray-900 transition-all duration-200">
            <i class="fa-solid fa-clipboard-list mr-3"></i>
            Assignments

        </a>

        <!-- Grades -->
        <a href="#"
            class="group flex items-center px-4 py-3 text-sm font-medium rounded-xl text-gray-600 hover:bg-gray-50 hover:text-gray-900 transition-all duration-200">
            <i class="fa-solid fa-chart-simple mr-3 "></i>
            Grades & Progress
        </a>

        <!-- Calendar -->
        <a href="#"
            class="group flex items-center px-4 py-3 text-sm font-medium rounded-xl text-gray-600 hover:bg-gray-50 hover:text-gray-900 transition-all duration-200">
            <i class="fa-solid fa-calendar mr-3"></i>
            Calendar
        </a>

</aside>

<!-- Overlay for mobile -->
<div id="sidebarOverlay"
    class="fixed inset-0 bg-black bg-opacity-50 z-30 lg:hidden opacity-0 pointer-events-none transition-opacity duration-300">
</div>

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
