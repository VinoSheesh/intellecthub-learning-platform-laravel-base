<!-- Modern Sidebar -->
<aside id="sidebar" x-data="{ 
    isCollapsed: false, 
    isMobile: window.innerWidth < 1024,
    coursesOpen: {{ request()->routeIs('courses') || request()->routeIs('courses.*') ? 'true' : 'false' }},
    userMenuOpen: false
}" 
x-init="
    const updateMobileState = () => {
        isMobile = window.innerWidth < 1024;
        if (isMobile) {
            $el.classList.add('-translate-x-full');
            isCollapsed = false; // Reset collapse state on mobile
        } else {
            $el.classList.remove('-translate-x-full');
        }
    };
    updateMobileState();
    window.addEventListener('resize', updateMobileState);
    
    $watch('isCollapsed', value => {
        if (!isMobile) {
            const mainContent = document.getElementById('mainContent');
            if (value) {
                $el.style.width = '4rem';
                $el.classList.add('sidebar-collapsed');
                $el.classList.remove('sidebar-expanded');
                if (mainContent) {
                    mainContent.style.marginLeft = '4rem';
                    mainContent.style.width = 'calc(100vw - 4rem)';
                    mainContent.classList.add('sidebar-collapsed');
                    mainContent.classList.remove('sidebar-expanded');
                }
            } else {
                $el.style.width = '16rem';
                $el.classList.add('sidebar-expanded');
                $el.classList.remove('sidebar-collapsed');
                if (mainContent) {
                    mainContent.style.marginLeft = '16rem';
                    mainContent.style.width = 'calc(100vw - 16rem)';
                    mainContent.classList.add('sidebar-expanded');
                    mainContent.classList.remove('sidebar-collapsed');
                }
            }
        }
    })
"
class="fixed left-0 top-0 bottom-0 w-64 bg-gradient-to-b from-blue-600 via-blue-700 to-blue-800 shadow-2xl transform transition-all duration-300 ease-in-out z-50 overflow-hidden">

    <!-- Sidebar Header -->
    <div class="flex items-center justify-between p-4 border-b border-blue-500/30" :class="{ 'justify-center px-2': isCollapsed }">
        <!-- Logo & Brand -->
        <div class="flex items-center space-x-3" :class="{ 'justify-center space-x-0': isCollapsed }">
            <div class="w-8 h-8 bg-white/20 rounded-lg flex items-center justify-center backdrop-blur-sm ring-1 ring-white/10 flex-shrink-0">
                <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M10.394 2.08a1 1 0 00-.788 0l-7 3a1 1 0 000 1.84L5.25 8.051a.999.999 0 01.356-.257l4-1.714a1 1 0 11.788 1.838L7.667 9.088l1.94.831a1 1 0 00.787 0l7-3a1 1 0 000-1.838l-7-3zM3.31 9.397L5 10.12v4.102a8.969 8.969 0 00-1.05-.174 1 1 0 01-.89-.89 11.115 11.115 0 01.25-3.762zM9.3 16.573A9.026 9.026 0 007 14.935v-3.957l1.818.78a3 3 0 002.364 0l5.508-2.361a11.026 11.026 0 01.25 3.762 1 1 0 01-.89.89 8.968 8.968 0 00-5.35 2.524 1 1 0 01-1.4 0zM6 18a1 1 0 001-1v-2.065a8.935 8.935 0 00-2-.712V17a1 1 0 001 1z" />
                </svg>
            </div>
            <div class="menu-text" x-show="!isCollapsed" x-transition:enter="transition ease-out duration-200 delay-150" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100">
                <span class="text-white font-bold text-lg tracking-wide">IntellectHub</span>
            </div>
        </div>

        <!-- Toggle Button -->
        <button @click="isCollapsed = !isCollapsed" 
                id="sidebarToggle"
                class="hidden lg:flex items-center justify-center w-7 h-7 text-white/80 hover:text-white hover:bg-white/10 rounded-lg transition-all duration-200 flex-shrink-0"
                :class="{ 'ml-2': !isCollapsed }">
            <svg class="w-4 h-4 transition-transform duration-200" :class="{ 'rotate-180': isCollapsed }" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
            </svg>
        </button>
    </div>

    <!-- Navigation Menu -->
    <!-- Improved collapsed state styling with better icon centering and spacing -->
    <nav class="flex-1 py-4 space-y-1 overflow-y-auto" :class="{ 'px-2': isCollapsed, 'px-4': !isCollapsed }">
        <!-- Dashboard -->
        <a href="{{ route('dashboard') }}"
            class="sidebar-menu-item group flex items-center py-3 text-sm font-medium rounded-xl transition-all duration-200 relative overflow-hidden
            {{ request()->routeIs('dashboard') ? 'bg-white/20 text-white shadow-lg backdrop-blur-sm' : 'text-white/80 hover:bg-white/10 hover:text-white' }}"
            :class="{ 'justify-center px-0': isCollapsed, 'px-4': !isCollapsed }">
            
            <i class="fa-solid fa-house text-lg flex-shrink-0" :class="{ 'mr-0': isCollapsed, 'mr-3': !isCollapsed }"></i>
            <span class="menu-text" x-show="!isCollapsed" x-transition:enter="transition ease-out duration-200 delay-100" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100">Dashboard</span>
            
            @if (request()->routeIs('dashboard'))
                <div class="menu-text ml-auto w-2 h-2 bg-white rounded-full flex-shrink-0 animate-pulse" x-show="!isCollapsed"></div>
                <div class="absolute inset-0 bg-gradient-to-r from-white/5 to-transparent opacity-50"></div>
            @endif
        </a>

        <!-- My Courses -->
        <div class="sidebar-dropdown">
            <button @click="coursesOpen = !coursesOpen"
                class="sidebar-menu-item w-full group flex items-center py-3 text-sm font-medium rounded-xl transition-all duration-200 relative overflow-hidden
                {{ request()->routeIs('courses.*') ? 'bg-white/20 text-white shadow-lg backdrop-blur-sm' : 'text-white/80 hover:bg-white/10 hover:text-white' }}"
                :class="{ 'justify-center px-0': isCollapsed, 'px-4': !isCollapsed }">
                
                <i class="fa-solid fa-book-open text-lg flex-shrink-0" :class="{ 'mr-0': isCollapsed, 'mr-3': !isCollapsed }"></i>
                <span class="menu-text flex-1 text-left" x-show="!isCollapsed" x-transition:enter="transition ease-out duration-200 delay-100" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100">My Courses</span>
                <i class="fa-solid fa-caret-down dropdown-arrow transition-transform duration-200 menu-text flex-shrink-0" 
                   :class="{ 'rotate-180': coursesOpen }" x-show="!isCollapsed"></i>
                
                @if (request()->routeIs('courses.*'))
                    <div class="absolute inset-0 bg-gradient-to-r from-white/5 to-transparent opacity-50"></div>
                @endif
            </button>

            <!-- Submenu -->
            <div x-show="coursesOpen && !isCollapsed" 
                 x-transition:enter="transition ease-out duration-200"
                 x-transition:enter-start="opacity-0 -translate-y-2" 
                 x-transition:enter-end="opacity-100 translate-y-0"
                 class="submenu ml-6 mt-2 space-y-1 border-l-2 border-white/20 pl-4">
                
                <a href="{{ route('allcourse') }}"
                    class="menu-text flex items-center px-3 py-2 text-sm rounded-lg transition-all duration-200 relative
                    {{ request()->routeIs('allcourse') ? 'bg-white/15 text-white shadow-md' : 'text-white/70 hover:bg-white/10 hover:text-white' }}">
                    <i class="fa-solid fa-list-ul text-xs mr-2 opacity-60"></i>
                    All Courses
                    @if (request()->routeIs('allcourse'))
                        <div class="ml-auto w-1.5 h-1.5 bg-white rounded-full animate-pulse"></div>
                    @endif
                </a>
                
                <a href="{{ route('inprogress') }}"
                    class="menu-text flex items-center px-3 py-2 text-sm rounded-lg transition-all duration-200 relative
                    {{ request()->routeIs('inprogress') ? 'bg-white/15 text-white shadow-md' : 'text-white/70 hover:bg-white/10 hover:text-white' }}">
                    <i class="fa-solid fa-clock text-xs mr-2 opacity-60"></i>
                    In Progress
                    @if (request()->routeIs('inprogress'))
                        <div class="ml-auto w-1.5 h-1.5 bg-white rounded-full animate-pulse"></div>
                    @endif
                </a>
                
                <a href="{{ route('completed') }}"
                    class="menu-text flex items-center px-3 py-2 text-sm rounded-lg transition-all duration-200 relative
                    {{ request()->routeIs('completed') ? 'bg-white/15 text-white shadow-md' : 'text-white/70 hover:bg-white/10 hover:text-white' }}">
                    <i class="fa-solid fa-check-circle text-xs mr-2 opacity-60"></i>
                    Completed
                    @if (request()->routeIs('completed'))
                        <div class="ml-auto w-1.5 h-1.5 bg-white rounded-full animate-pulse"></div>
                    @endif
                </a>
                
                <a href="{{ route('favorites') }}"
                    class="menu-text flex items-center px-3 py-2 text-sm rounded-lg transition-all duration-200 relative
                    {{ request()->routeIs('favorites') ? 'bg-white/15 text-white shadow-md' : 'text-white/70 hover:bg-white/10 hover:text-white' }}">
                    <i class="fa-solid fa-heart text-xs mr-2 opacity-60"></i>
                    Favorites
                    @if (request()->routeIs('favorites'))
                        <div class="ml-auto w-1.5 h-1.5 bg-white rounded-full animate-pulse"></div>
                    @endif
                </a>
            </div>
        </div>

        <!-- Assignments -->
        <a href="#"
            class="sidebar-menu-item group flex items-center py-3 text-sm font-medium rounded-xl transition-all duration-200 text-white/80 hover:bg-white/10 hover:text-white relative overflow-hidden"
            :class="{ 'justify-center px-0': isCollapsed, 'px-4': !isCollapsed }">
            <i class="fa-solid fa-clipboard-list text-lg flex-shrink-0" :class="{ 'mr-0': isCollapsed, 'mr-3': !isCollapsed }"></i>
            <span class="menu-text" x-show="!isCollapsed" x-transition:enter="transition ease-out duration-200 delay-100" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100">Assignments</span>
        </a>

        <!-- Grades -->
        <a href="#"
            class="sidebar-menu-item group flex items-center py-3 text-sm font-medium rounded-xl transition-all duration-200 text-white/80 hover:bg-white/10 hover:text-white relative overflow-hidden"
            :class="{ 'justify-center px-0': isCollapsed, 'px-4': !isCollapsed }">
            <i class="fa-solid fa-chart-simple text-lg flex-shrink-0" :class="{ 'mr-0': isCollapsed, 'mr-3': !isCollapsed }"></i>
            <span class="menu-text" x-show="!isCollapsed" x-transition:enter="transition ease-out duration-200 delay-100" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100">Grades & Progress</span>
        </a>

        <!-- Calendar -->
        <a href="#"
            class="sidebar-menu-item group flex items-center py-3 text-sm font-medium rounded-xl transition-all duration-200 text-white/80 hover:bg-white/10 hover:text-white relative overflow-hidden"
            :class="{ 'justify-center px-0': isCollapsed, 'px-4': !isCollapsed }">
            <i class="fa-solid fa-calendar text-lg flex-shrink-0" :class="{ 'mr-0': isCollapsed, 'mr-3': !isCollapsed }"></i>
            <span class="menu-text" x-show="!isCollapsed" x-transition:enter="transition ease-out duration-200 delay-100" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100">Calendar</span>
        </a>

        <!-- Divider -->
        <div class="border-t border-white/20 my-4" :class="{ 'mx-2': isCollapsed, 'mx-0': !isCollapsed }"></div>

        <!-- Notifications -->
        <button class="sidebar-menu-item group flex items-center py-3 text-sm font-medium rounded-xl transition-all duration-200 text-white/80 hover:bg-white/10 hover:text-white relative overflow-hidden w-full"
                :class="{ 'justify-center px-0': isCollapsed, 'space-x-3 px-3': !isCollapsed }">
            <div class="relative flex-shrink-0" :class="{ 'mr-0': isCollapsed, 'mr-3': !isCollapsed }">
                <i class="fa-solid fa-bell text-lg"></i>
                <!-- Improved notification badge positioning for collapsed state -->
                <span class="absolute -top-1 -right-1 bg-red-500 text-white text-xs rounded-full w-4 h-4 flex items-center justify-center animate-pulse font-medium">3</span>
            </div>
            <span class="menu-text" x-show="!isCollapsed" x-transition:enter="transition ease-out duration-200 delay-100" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100">Notifications</span>
        </button>
    </nav>

    <!-- User Profile Section -->
    <!-- Improved user profile section styling for collapsed state -->
    <div class="border-t border-white/20 p-3" :class="{ 'px-2': isCollapsed }">
        <div class="relative" x-data="{ userMenuOpen: false }">
            <button @click="userMenuOpen = !userMenuOpen"
                class="w-full flex items-center text-white hover:bg-white/10 py-3 rounded-xl transition-all duration-200 group"
                :class="{ 'justify-center px-0': isCollapsed, 'space-x-3 px-3': !isCollapsed }">
                
                <div class="w-9 h-9 bg-gradient-to-br from-white/30 to-white/10 rounded-full flex items-center justify-center backdrop-blur-sm ring-2 ring-white/20 flex-shrink-0">
                    <span class="text-sm font-semibold">{{ substr(auth()->user()->name, 0, 1) }}</span>
                </div>
                
                <div class="menu-text flex-1 text-left" x-show="!isCollapsed" x-transition:enter="transition ease-out duration-200 delay-100" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100">
                    <p class="font-medium text-sm truncate">{{ auth()->user()->name }}</p>
                    <p class="text-xs text-white/70 truncate">{{ auth()->user()->email }}</p>
                </div>
                
                <svg class="menu-text w-4 h-4 transition-transform duration-200 flex-shrink-0" 
                     :class="{ 'rotate-180': userMenuOpen }" fill="none" stroke="currentColor" viewBox="0 0 24 24" x-show="!isCollapsed">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 9-7 7-7-7"></path>
                </svg>
            </button>

            <!-- User Dropdown Menu -->
            <div x-show="userMenuOpen && !isCollapsed" 
                 x-transition:enter="transition ease-out duration-200"
                 x-transition:enter-start="opacity-0 scale-95" 
                 x-transition:enter-end="opacity-100 scale-100"
                 @click.outside="userMenuOpen = false"
                 class="absolute bottom-full left-0 right-0 mb-2 bg-white rounded-xl shadow-xl border border-gray-100 py-2 overflow-hidden">
                
                <a href="#" class="flex items-center px-4 py-3 text-gray-700 hover:bg-blue-50 hover:text-blue-600 transition-colors group">
                    <svg class="w-4 h-4 mr-3 text-gray-400 group-hover:text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                    </svg>
                    <span class="text-sm">Profile Settings</span>
                </a>

                <a href="#" class="flex items-center px-4 py-3 text-gray-700 hover:bg-blue-50 hover:text-blue-600 transition-colors group">
                    <svg class="w-4 h-4 mr-3 text-gray-400 group-hover:text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37.996.608 2.296.07 2.572-1.065z"></path>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                    </svg>
                    <span class="text-sm">Account Settings</span>
                </a>

                <div class="border-t border-gray-100 my-1"></div>

                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="w-full flex items-center px-4 py-3 text-red-600 hover:bg-red-50 transition-colors group">
                        <svg class="w-4 h-4 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                        </svg>
                        <span class="text-sm">Sign Out</span>
                    </button>
                </form>
            </div>
        </div>
    </div>
</aside>

<!-- Mobile Toggle Button -->
<!-- Simplified mobile toggle with better Alpine.js integration -->
<button x-data @click="
    const sidebar = document.getElementById('sidebar');
    const overlay = document.getElementById('sidebarOverlay');
    const isHidden = sidebar.classList.contains('-translate-x-full');
    
    if (isHidden) {
        sidebar.classList.remove('-translate-x-full');
        overlay.classList.remove('opacity-0', 'pointer-events-none');
        document.body.classList.add('overflow-hidden');
    } else {
        sidebar.classList.add('-translate-x-full');
        overlay.classList.add('opacity-0', 'pointer-events-none');
        document.body.classList.remove('overflow-hidden');
    }
"
class="lg:hidden fixed top-4 left-4 z-50 bg-blue-600 text-white p-3 rounded-xl shadow-lg hover:bg-blue-700 transition-colors">
    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
    </svg>
</button>

<!-- Mobile Overlay -->
<div id="sidebarOverlay" 
     x-data @click="
        const sidebar = document.getElementById('sidebar');
        sidebar.classList.add('-translate-x-full');
        $el.classList.add('opacity-0', 'pointer-events-none');
        document.body.classList.remove('overflow-hidden');
     "
     class="fixed inset-0 bg-black bg-opacity-50 z-40 lg:hidden opacity-0 pointer-events-none transition-opacity duration-300">
</div>

<style>
/* Enhanced styles for better collapsed state appearance */
#sidebar::-webkit-scrollbar {
    width: 4px;
}

#sidebar::-webkit-scrollbar-track {
    background: rgba(255, 255, 255, 0.1);
    border-radius: 2px;
}

#sidebar::-webkit-scrollbar-thumb {
    background: rgba(255, 255, 255, 0.3);
    border-radius: 2px;
}

#sidebar::-webkit-scrollbar-thumb:hover {
    background: rgba(255, 255, 255, 0.5);
}

.sidebar-menu-item:focus {
    outline: 2px solid rgba(255, 255, 255, 0.5);
    outline-offset: 2px;
}

.sidebar-menu-item {
    position: relative;
}

.sidebar-menu-item::before {
    content: '';
    position: absolute;
    left: 0;
    top: 50%;
    transform: translateY(-50%);
    width: 3px;
    height: 0;
    background: white;
    border-radius: 0 2px 2px 0;
    transition: height 0.2s ease;
}

.sidebar-menu-item:hover::before,
.sidebar-menu-item.active::before {
    height: 60%;
}

/* Collapsed state specific styles */
.sidebar-collapsed .sidebar-menu-item {
    width: 3rem;
    height: 3rem;
    margin: 0 auto 0.25rem auto;
    display: flex;
    align-items: center;
    justify-content: center;
}

.sidebar-collapsed .sidebar-menu-item i {
    margin: 0 !important;
}
</style>

<!-- Alpine.js for interactivity -->
<script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>

<!-- Simplified JavaScript with better mobile handling -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    const sidebar = document.getElementById('sidebar');
    const overlay = document.getElementById('sidebarOverlay');
    const mainContent = document.getElementById('mainContent');
    
    // Handle escape key for mobile
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape' && window.innerWidth < 1024 && !sidebar.classList.contains('-translate-x-full')) {
            sidebar.classList.add('-translate-x-full');
            overlay.classList.add('opacity-0', 'pointer-events-none');
            document.body.classList.remove('overflow-hidden');
        }
    });
    
    // Initialize main content positioning
    function initializeLayout() {
        if (window.innerWidth >= 1024 && mainContent) {
            const isCollapsed = sidebar.classList.contains('sidebar-collapsed');
            if (isCollapsed) {
                mainContent.style.marginLeft = '4rem';
                mainContent.style.width = 'calc(100vw - 4rem)';
            } else {
                mainContent.style.marginLeft = '16rem';
                mainContent.style.width = 'calc(100vw - 16rem)';
            }
        } else if (mainContent) {
            mainContent.style.marginLeft = '0';
            mainContent.style.width = '100%';
        }
    }
    
    // Initialize on load
    initializeLayout();
    
    // Handle window resize
    window.addEventListener('resize', function() {
        if (window.innerWidth >= 1024) {
            sidebar.classList.remove('-translate-x-full');
            overlay.classList.add('opacity-0', 'pointer-events-none');
            document.body.classList.remove('overflow-hidden');
        } else {
            sidebar.classList.add('-translate-x-full');
        }
        initializeLayout();
    });
});
</script>
