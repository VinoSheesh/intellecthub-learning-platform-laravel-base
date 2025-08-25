<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <style>
        /* Custom CSS untuk Laravel E-Learning Navbar & Sidebar */

        /* Sidebar smooth transitions */
        #sidebar {
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            /* Fixed width and overflow issues */
            overflow-x: hidden;
            overflow-y: auto;
            min-width: 4rem;
        }

        #sidebar .menu-text {
            transition: opacity 0.2s ease-in-out;
            /* Prevent text wrapping and overflow */
            white-space: nowrap;
            overflow: hidden;
        }

        #sidebar .dropdown-arrow {
            transition: all 0.2s ease-in-out;
        }

        #sidebar .sidebar-menu-item {
            transition: all 0.2s ease-in-out;
            /* Prevent horizontal overflow */
            overflow: hidden;
        }

        #sidebar .submenu {
            transition: all 0.2s ease-in-out;
        }

        /* Main content transition */
        main {
            transition: margin-left 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            /* Ensure proper width calculation */
            width: calc(100% - 16rem);
        }

        /* Main content responsive width adjustments */
        main.sidebar-collapsed {
            width: calc(100% - 4rem) !important;
        }

        main.sidebar-expanded {
            width: calc(100% - 16rem) !important;
        }

        /* Gradient backgrounds */
        .gradient-bg {
            background: linear-gradient(135deg, #2563eb 0%, #1d4ed8 100%);
        }

        .gradient-bg-alt {
            background: linear-gradient(135deg, #3b82f6 0%, #2563eb 100%);
        }

        /* Glass effect */
        .glass-effect {
            backdrop-filter: blur(10px);
            background: rgba(255, 255, 255, 0.1);
        }

        /* Hover glow effect */
        .hover-glow:hover {
            box-shadow: 0 0 20px rgba(37, 99, 235, 0.3);
        }

        /* Navigation item animations */
        .nav-item {
            transition: all 0.2s cubic-bezier(0.4, 0, 0.2, 1);
            position: relative;
        }

        .nav-item:hover {
            transform: translateX(8px);
        }

        .nav-item.active::before {
            content: '';
            position: absolute;
            left: 0;
            top: 50%;
            transform: translateY(-50%);
            width: 4px;
            height: 100%;
            background: linear-gradient(to bottom, #2563eb, #1d4ed8);
            border-radius: 0 4px 4px 0;
        }

        /* Dropdown animations */
        .dropdown-enter {
            opacity: 0;
            transform: translateY(-10px) scale(0.95);
        }

        .dropdown-enter-active {
            opacity: 1;
            transform: translateY(0) scale(1);
            transition: all 0.2s ease-out;
        }

        /* Sidebar animations */
        .sidebar-transition {
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        /* Smooth width transition for desktop sidebar collapse */
        .sidebar-collapsed {
            width: 4rem !important;
        }

        .sidebar-expanded {
            width: 16rem !important;
        }

        /* Hide overflow during transition */
        .sidebar-transitioning {
            overflow: hidden;
        }

        /* Badge animations */
        @keyframes pulse-scale {
            0%, 100% {
                transform: scale(1);
            }
            50% {
                transform: scale(1.1);
            }
        }

        .badge-pulse {
            animation: pulse-scale 2s infinite;
        }

        /* Active menu item indicator */
        .menu-item-active {
            background: linear-gradient(135deg, rgba(37, 99, 235, 0.1) 0%, rgba(29, 78, 216, 0.1) 100%);
            border-left: 4px solid #2563eb;
            color: #2563eb;
        }

        .menu-item-active svg {
            color: #2563eb;
        }

        /* Search input focus effect */
        .search-input:focus {
            background: rgba(255, 255, 255, 0.2);
            border-color: rgba(255, 255, 255, 0.8);
            box-shadow: 0 0 0 3px rgba(255, 255, 255, 0.1);
        }

        /* Mobile responsive adjustments */
        @media (max-width: 1023px) {
            .sidebar-mobile {
                transform: translateX(-100%);
            }

            .sidebar-mobile.open {
                transform: translateX(0);
            }

            /* Ensure main content takes full width on mobile */
            main {
                margin-left: 0 !important;
                width: 100% !important;
            }
        }

        /* Desktop adjustments */
        @media (min-width: 1024px) {
            /* Main content margin adjustment for desktop */
            main.sidebar-collapsed {
                margin-left: 4rem !important;
            }

            main.sidebar-expanded {
                margin-left: 16rem !important;
            }
        }

        /* Smooth scrollbar */
        .custom-scrollbar::-webkit-scrollbar {
            width: 6px;
        }

        .custom-scrollbar::-webkit-scrollbar-track {
            background: rgba(255, 255, 255, 0.1);
        }

        .custom-scrollbar::-webkit-scrollbar-thumb {
            background: rgba(255, 255, 255, 0.3);
            border-radius: 3px;
        }

        .custom-scrollbar::-webkit-scrollbar-thumb:hover {
            background: rgba(255, 255, 255, 0.5);
        }

        /* Notification badge */
        .notification-badge {
            position: absolute;
            top: -2px;
            right: -2px;
            min-width: 18px;
            height: 18px;
            background: #ef4444;
            color: white;
            font-size: 11px;
            font-weight: 600;
            border-radius: 9px;
            display: flex;
            align-items: center;
            justify-content: center;
            animation: pulse 2s infinite;
        }

        /* Prevent body horizontal scroll */
        body {
            overflow-x: hidden;
        }

        /* Ensure sidebar container doesn't cause overflow */
        .sidebar-container {
            position: fixed;
            top: 0;
            left: 0;
            height: 100vh;
            z-index: 50;
        }

        /* Utility classes */
        .backdrop-blur-sm {
            backdrop-filter: blur(4px);
        }

        .backdrop-blur-md {
            backdrop-filter: blur(8px);
        }

        .text-shadow {
            text-shadow: 0 1px 2px rgba(0, 0, 0, 0.1);
        }

        /* Prevent text selection during transitions */
        .no-select {
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }
    </style>
    @include('includes.cdn')
    @vite('resources/css/app.css')
    @livewireStyles
</head>

<body class="flex h-screen bg-gray-100 overflow-x-hidden">
    @include('partials.sidebar')
    <!-- Removed pt-24 since no navbar, added proper responsive classes -->
    <main id="mainContent" class="flex-1 overflow-auto p-6 transition-all duration-300 ease-in-out ml-64 lg:ml-64">
        {{ $slot }}
    </main>
    @livewireScripts

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const sidebar = document.getElementById('sidebar');
            const sidebarToggle = document.getElementById('sidebarToggle');
            const sidebarOverlay = document.getElementById('sidebarOverlay');
            const mainContent = document.getElementById('mainContent');
            const body = document.body;

            let isCollapsed = false;
            let isMobile = window.innerWidth < 1024;

            // Initialize sidebar state
            function initializeSidebar() {
                updateMainContentClasses();
                
                if (isMobile) {
                    sidebar.classList.add('-translate-x-full');
                    mainContent.style.marginLeft = '0';
                    mainContent.style.width = '100%';
                } else {
                    sidebar.classList.remove('-translate-x-full');
                    if (isCollapsed) {
                        collapseSidebar();
                    } else {
                        expandSidebar();
                    }
                }
            }

            // Update main content classes
            function updateMainContentClasses() {
                mainContent.classList.remove('sidebar-collapsed', 'sidebar-expanded');
                
                if (!isMobile) {
                    if (isCollapsed) {
                        mainContent.classList.add('sidebar-collapsed');
                        mainContent.style.marginLeft = '4rem';
                        mainContent.style.width = 'calc(100% - 4rem)';
                    } else {
                        mainContent.classList.add('sidebar-expanded');
                        mainContent.style.marginLeft = '16rem';
                        mainContent.style.width = 'calc(100% - 16rem)';
                    }
                }
            }

            // Toggle sidebar function
            function toggleSidebar() {
                if (isMobile) {
                    toggleMobileSidebar();
                } else {
                    toggleDesktopSidebar();
                }
            }

            // Mobile sidebar toggle
            function toggleMobileSidebar() {
                const isHidden = sidebar.classList.contains('-translate-x-full');

                if (isHidden) {
                    // Show sidebar
                    sidebar.classList.remove('-translate-x-full');
                    if (sidebarOverlay) {
                        sidebarOverlay.classList.remove('opacity-0', 'pointer-events-none');
                    }
                    body.classList.add('overflow-hidden');
                } else {
                    // Hide sidebar
                    closeMobileSidebar();
                }
            }

            // Close mobile sidebar
            function closeMobileSidebar() {
                sidebar.classList.add('-translate-x-full');
                if (sidebarOverlay) {
                    sidebarOverlay.classList.add('opacity-0', 'pointer-events-none');
                }
                body.classList.remove('overflow-hidden');
            }

            // Desktop sidebar toggle
            function toggleDesktopSidebar() {
                isCollapsed = !isCollapsed;

                if (isCollapsed) {
                    collapseSidebar();
                } else {
                    expandSidebar();
                }
                
                updateMainContentClasses();
            }

            // Collapse sidebar (desktop)
            function collapseSidebar() {
                sidebar.style.width = '4rem';
                sidebar.classList.add('sidebar-transitioning');

                // Hide elements immediately for smoother transition
                const elementsToHide = sidebar.querySelectorAll('.menu-text, .dropdown-arrow, .submenu');
                elementsToHide.forEach(el => {
                    el.style.opacity = '0';
                });

                setTimeout(() => {
                    elementsToHide.forEach(el => {
                        el.style.display = 'none';
                    });

                    // Center menu icons
                    const menuItems = sidebar.querySelectorAll('.sidebar-menu-item');
                    menuItems.forEach(item => {
                        item.classList.add('justify-center');
                        item.classList.remove('justify-start');
                    });

                    sidebar.classList.remove('sidebar-transitioning');
                }, 150);
            }

            // Expand sidebar (desktop)
            function expandSidebar() {
                sidebar.style.width = '16rem';
                sidebar.classList.add('sidebar-transitioning');

                // Reset menu items first
                const menuItems = sidebar.querySelectorAll('.sidebar-menu-item');
                menuItems.forEach(item => {
                    item.classList.remove('justify-center');
                    item.classList.add('justify-start');
                });

                // Show elements
                setTimeout(() => {
                    const elementsToShow = sidebar.querySelectorAll('.menu-text, .dropdown-arrow, .submenu');
                    elementsToShow.forEach(el => {
                        el.style.display = '';
                        el.style.opacity = '1';
                    });

                    sidebar.classList.remove('sidebar-transitioning');
                }, 150);
            }

            // Handle window resize
            function handleResize() {
                const newIsMobile = window.innerWidth < 1024;

                if (newIsMobile !== isMobile) {
                    isMobile = newIsMobile;
                    initializeSidebar();
                }
            }

            // Event listeners
            if (sidebarToggle) {
                sidebarToggle.addEventListener('click', toggleSidebar);
            }

            if (sidebarOverlay) {
                sidebarOverlay.addEventListener('click', function() {
                    if (isMobile) {
                        closeMobileSidebar();
                    }
                });
            }

            // Handle ESC key
            document.addEventListener('keydown', function(e) {
                if (e.key === 'Escape' && isMobile && !sidebar.classList.contains('-translate-x-full')) {
                    closeMobileSidebar();
                }
            });

            // Handle window resize with debounce
            let resizeTimeout;
            window.addEventListener('resize', function() {
                clearTimeout(resizeTimeout);
                resizeTimeout = setTimeout(handleResize, 100);
            });

            // Initialize on page load
            initializeSidebar();

            console.log('Sidebar initialized successfully');
        });
    </script>
</body>

</html>
