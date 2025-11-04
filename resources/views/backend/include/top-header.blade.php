<!-- Top navbar -->
<header class="bg-white dark:bg-gray-800 border-b border-gray-200 dark:border-gray-700 fixed top-0 right-0 left-0 lg:left-64 z-10">
    <div class="px-3 sm:px-4 lg:px-8">
        <div class="flex justify-between items-center h-14 lg:h-16">
            <!-- Mobile menu button -->
            <div class="flex items-center lg:hidden">
                <label for="sidebar-toggle" class="cursor-pointer p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 dark:hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-indigo-500">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                </label>
            </div>

            <!-- Search -->
            <div class="flex-1 max-w-lg mx-2 sm:mx-4">
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <svg class="h-4 w-4 sm:h-5 sm:w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                    </div>
                    <input type="search" placeholder="Search..." class="block w-full pl-8 sm:pl-10 pr-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg leading-5 bg-gray-50 dark:bg-gray-700 placeholder-gray-500 dark:placeholder-gray-400 focus:outline-none focus:placeholder-gray-400 focus:ring-1 focus:ring-indigo-500 focus:border-indigo-500 dark:text-white transition-colors duration-150 text-xs sm:text-sm">
                </div>
            </div>

            <!-- Right side -->
            <div class="flex items-center space-x-1 sm:space-x-2 lg:space-x-4">
                <!-- Frontend Link -->
                <a href="{{ route('home') }}" target="_blank" class="hidden sm:flex items-center px-2 lg:px-3 py-1 lg:py-2 text-xs lg:text-sm font-medium text-gray-700 dark:text-gray-300 bg-gray-100 dark:bg-gray-700 rounded-lg hover:bg-gray-200 dark:hover:bg-gray-600 transition-colors duration-150">
                    <svg class="w-3 h-3 lg:w-4 lg:h-4 mr-1 lg:mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path>
                    </svg>
                    <span class="hidden lg:inline">View Website</span>
                </a>

                <!-- Dark mode toggle -->
                <label for="dark-mode-toggle" class="relative inline-flex items-center cursor-pointer">
                    <input type="checkbox" id="dark-mode-toggle" class="dark-toggle sr-only">
                    <div class="dark-toggle-bg w-9 h-5 sm:w-11 sm:h-6 bg-gray-200 dark:bg-gray-600 rounded-full transition-colors duration-200">
                        <div class="dark-toggle-dot absolute top-0.5 left-0.5 w-4 h-4 sm:w-5 sm:h-5 bg-white rounded-full transition-transform duration-200 flex items-center justify-center shadow-md">
                            <svg class="w-2 h-2 sm:w-3 sm:h-3 text-gray-400 dark:text-gray-300" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"></path>
                            </svg>
                        </div>
                    </div>
                </label>

                <!-- Notifications -->
                <div class="relative">
                    <button id="notification-btn" class="relative p-1.5 sm:p-2 text-gray-400 hover:text-gray-500 dark:hover:text-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 rounded-lg transition-colors duration-150">
                        <svg class="w-5 h-5 sm:w-6 sm:h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"></path>
                        </svg>
                    </button>
                </div>

                <!-- User menu -->
                <div class="relative">
                    <button id="user-menu-btn" class="flex items-center space-x-1 sm:space-x-2 cursor-pointer focus:outline-none focus:ring-2 focus:ring-indigo-500 rounded-lg p-1">
                        <img class="w-6 h-6 sm:w-8 sm:h-8 rounded-full bg-gray-300" src="{{ asset('assets/images/admin.png') }}" alt="User avatar">
                        <svg class="w-3 h-3 sm:w-4 sm:h-4 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                        </svg>
                    </button>
                    
                    <!-- User dropdown -->
                    <div id="user-dropdown" class="absolute right-0 mt-2 w-40 sm:w-48 bg-white dark:bg-gray-800 rounded-lg shadow-lg border border-gray-200 dark:border-gray-700 py-1 hidden z-50">
                        <a href="{{ route('profile.edit') }}" class="block px-3 sm:px-4 py-2 text-xs sm:text-sm text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700">Profile</a>
                        <a href="{{ route('website-settings') }}" class="block px-3 sm:px-4 py-2 text-xs sm:text-sm text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700">Settings</a>
                        
                        <!-- Logout Form -->
                        <form method="POST" action="{{ route('logout') }}" class="block">
                            @csrf
                            <button type="submit" class="w-full text-left px-3 sm:px-4 py-2 text-xs sm:text-sm text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 focus:outline-none">
                                Sign out
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>

