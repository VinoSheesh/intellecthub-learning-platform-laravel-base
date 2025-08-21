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
        }

        #sidebar .menu-text {
            transition: opacity 0.2s ease-in-out;
        }

        #sidebar .dropdown-arrow {
            transition: all 0.2s ease-in-out;
        }

        #sidebar .sidebar-menu-item {
            transition: all 0.2s ease-in-out;
        }

        #sidebar .submenu {
            transition: all 0.2s ease-in-out;
        }

        /* Main content transition */
        main {
            transition: margin-left 0.3s cubic-bezier(0.4, 0, 0.2, 1);
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

            0%,
            100% {
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

            /* Ensure main content doesn't have left margin on mobile */
            main {
                margin-left: 0 !important;
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
            background: #f1f5f9;
        }

        .custom-scrollbar::-webkit-scrollbar-thumb {
            background: #cbd5e1;
            border-radius: 3px;
        }

        .custom-scrollbar::-webkit-scrollbar-thumb:hover {
            background: #94a3b8;
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

        /* Loading skeleton */
        .skeleton {
            background: linear-gradient(90deg, #f0f0f0 25%, #e0e0e0 50%, #f0f0f0 75%);
            background-size: 200% 100%;
            animation: loading 1.5s infinite;
        }

        @keyframes loading {
            0% {
                background-position: 200% 0;
            }

            100% {
                background-position: -200% 0;
            }
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

        /* Dark mode support */
        @media (prefers-color-scheme: dark) {
            .dark-mode {
                --bg-primary: #1f2937;
                --bg-secondary: #111827;
                --text-primary: #f9fafb;
                --text-secondary: #d1d5db;
                --border-color: #374151;
            }
        }

        /* Print styles */
        @media print {
            .no-print {
                display: none !important;
            }
        }

        2563eb;
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

            /* Ensure main content doesn't have left margin on mobile */
            main {
                margin-left: 0 !important;
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
            background: #f1f5f9;
        }

        .custom-scrollbar::-webkit-scrollbar-thumb {
            background: #cbd5e1;
            border-radius: 3px;
        }

        .custom-scrollbar::-webkit-scrollbar-thumb:hover {
            background: #94a3b8;
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

        /* Loading skeleton */
        .skeleton {
            background: linear-gradient(90deg, #f0f0f0 25%, #e0e0e0 50%, #f0f0f0 75%);
            background-size: 200% 100%;
            animation: loading 1.5s infinite;
        }

        @keyframes loading {
            0% {
                background-position: 200% 0;
            }

            100% {
                background-position: -200% 0;
            }
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

        /* Dark mode support */
        @media (prefers-color-scheme: dark) {
            .dark-mode {
                --bg-primary: #1f2937;
                --bg-secondary: #111827;
                --text-primary: #f9fafb;
                --text-secondary: #d1d5db;
                --border-color: #374151;
            }
        }

        /* Print styles */
        @media print {
            .no-print {
                display: none !important;
            }
        }
    </style>
    @vite('resources/css/app.css')
    @livewireStyles
</head>

<body class="flex h-screen bg-gray-100">
    @include('partials.sidebar')
    <div class="flex-1 flex flex-col">
        @include('partials.navbar')
        <main class="p-6 flex-1 overflow-auto">
            {{ $slot }}
        </main>
    </div>
    @livewireScripts

    <script>
        // JavaScript untuk Laravel E-Learning Sidebar - Fixed Version
        document.addEventListener('DOMContentLoaded', function() {
            const sidebar = document.getElementById('sidebar');
            const sidebarToggle = document.getElementById('sidebarToggle');
            const sidebarOverlay = document.getElementById('sidebarOverlay');
            const body = document.body;

            let isCollapsed = false;
            let isMobile = window.innerWidth < 1024;

            // Initialize sidebar state
            function initializeSidebar() {
                if (isMobile) {
                    sidebar.classList.add('-translate-x-full');
                    sidebar.style.width = '';
                } else {
                    sidebar.classList.remove('-translate-x-full');
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
                    sidebarOverlay.classList.remove('opacity-0', 'pointer-events-none');
                    body.classList.add('overflow-hidden');
                } else {
                    // Hide sidebar
                    closeMobileSidebar();
                }
            }

            // Close mobile sidebar
            function closeMobileSidebar() {
                sidebar.classList.add('-translate-x-full');
                sidebarOverlay.classList.add('opacity-0', 'pointer-events-none');
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
            }

            // Collapse sidebar (desktop)
            function collapseSidebar() {
                sidebar.style.width = '4rem';

                // Add transition class
                sidebar.classList.add('sidebar-transitioning');

                // Hide elements after a short delay
                setTimeout(() => {
                    const elementsToHide = sidebar.querySelectorAll(
                    '.menu-text, .dropdown-arrow, .submenu');
                    elementsToHide.forEach(el => {
                        el.style.display = 'none';
                    });

                    // Center menu icons
                    const menuItems = sidebar.querySelectorAll('.sidebar-menu-item');
                    menuItems.forEach(item => {
                        item.style.justifyContent = 'center';
                        item.style.paddingLeft = '0.75rem';
                        item.style.paddingRight = '0.75rem';
                    });

                    sidebar.classList.remove('sidebar-transitioning');
                }, 150);
            }

            // Expand sidebar (desktop)
            function expandSidebar() {
                sidebar.style.width = '16rem';

                // Add transition class
                sidebar.classList.add('sidebar-transitioning');

                // Reset menu items first
                const menuItems = sidebar.querySelectorAll('.sidebar-menu-item');
                menuItems.forEach(item => {
                    item.style.justifyContent = '';
                    item.style.paddingLeft = '';
                    item.style.paddingRight = '';
                });

                // Show elements after a short delay
                setTimeout(() => {
                    const elementsToShow = sidebar.querySelectorAll(
                    '.menu-text, .dropdown-arrow, .submenu');
                    elementsToShow.forEach(el => {
                        el.style.display = '';
                    });

                    sidebar.classList.remove('sidebar-transitioning');
                }, 150);
            }

            // Handle window resize
            function handleResize() {
                const newIsMobile = window.innerWidth < 1024;

                if (newIsMobile !== isMobile) {
                    isMobile = newIsMobile;

                    if (isMobile) {
                        // Switched to mobile
                        resetSidebarForMobile();
                    } else {
                        // Switched to desktop
                        resetSidebarForDesktop();
                    }
                }
            }

            // Reset sidebar for mobile
            function resetSidebarForMobile() {
                closeMobileSidebar();
                resetSidebarStyles();
                isCollapsed = false;
            }

            // Reset sidebar for desktop
            function resetSidebarForDesktop() {
                sidebar.classList.remove('-translate-x-full');
                sidebarOverlay.classList.add('opacity-0', 'pointer-events-none');
                body.classList.remove('overflow-hidden');

                if (!isCollapsed) {
                    sidebar.style.width = '';
                }
            }

            // Reset all sidebar styles
            function resetSidebarStyles() {
                sidebar.style.width = '';

                const elementsToReset = sidebar.querySelectorAll('.menu-text, .dropdown-arrow, .submenu');
                elementsToReset.forEach(el => {
                    el.style.display = '';
                });

                const menuItems = sidebar.querySelectorAll('.sidebar-menu-item');
                menuItems.forEach(item => {
                    item.style.justifyContent = '';
                    item.style.paddingLeft = '';
                    item.style.paddingRight = '';
                });
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

            // Tooltip functionality for collapsed sidebar
            function initializeTooltips() {
                if (!isCollapsed || isMobile) return;

                const menuItems = sidebar.querySelectorAll('.sidebar-menu-item');

                menuItems.forEach(item => {
                    const text = item.querySelector('.menu-text')?.textContent;
                    if (text && !item.hasAttribute('title')) {
                        item.setAttribute('title', text);
                    }
                });
            }

            // Call tooltip initialization after collapse
            const originalCollapseSidebar = collapseSidebar;
            collapseSidebar = function() {
                originalCollapseSidebar();
                setTimeout(initializeTooltips, 200);
            };

            // Remove tooltips when expanded
            const originalExpandSidebar = expandSidebar;
            expandSidebar = function() {
                const menuItems = sidebar.querySelectorAll('.sidebar-menu-item');
                menuItems.forEach(item => {
                    item.removeAttribute('title');
                });
                originalExpandSidebar();
            };

            // Smooth scroll for sidebar
            sidebar.style.scrollBehavior = 'smooth';

            // Add custom scrollbar
            sidebar.classList.add('custom-scrollbar');

            console.log('Sidebar initialized successfully');
        });
    </script>
</body>

</html>
