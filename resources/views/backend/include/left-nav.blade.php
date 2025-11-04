<!-- Skip to content link -->
<a href="#main-content" class="sr-only focus:not-sr-only focus:absolute focus:top-4 focus:left-4 bg-indigo-600 text-white px-4 py-2 rounded-lg z-50">
    Skip to main content
</a>

<!-- Mobile sidebar toggle -->
<input type="checkbox" id="sidebar-toggle" class="sidebar-toggle sr-only peer">

<!-- Mobile sidebar overlay -->
<div class="sidebar-overlay fixed inset-0 bg-gray-900 bg-opacity-50 z-30 opacity-0 invisible transition-all duration-300 lg:hidden"></div>

<!-- Sidebar -->
<nav class="sidebar fixed top-0 left-0 z-40 w-64 h-screen bg-white dark:bg-gray-800 border-r border-gray-200 dark:border-gray-700 transform -translate-x-full lg:translate-x-0 transition-transform duration-300 lg:fixed lg:inset-y-0 lg:left-0" aria-label="Main navigation">
    <div class="flex flex-col h-full">
        <!-- Sidebar header -->
        <div class="flex items-center justify-between p-6 border-b border-gray-200 dark:border-gray-700">
            <div class="flex items-center space-x-3">
                <div class="w-8 h-8 bg-indigo-600 rounded-lg flex items-center justify-center">
                    <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"></path>
                    </svg>
                </div>
                <span class="text-lg font-semibold dark:text-white text-orange-400">InboundHome</span>
            </div>
            <label for="sidebar-toggle" class="lg:hidden cursor-pointer p-1">
                <svg class="w-6 h-6 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </label>
        </div>
        
        <!-- Navigation items -->
        <div class="flex-1 px-3 py-4 space-y-1">
            <a href="{{ route('dashboard') }}" class="flex items-center px-3 py-4 text-sm font-medium {{ request()->routeIs('dashboard') ? 'text-white bg-indigo-600' : 'text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700' }} rounded-lg transition-colors duration-150" {{ request()->routeIs('dashboard') ? 'aria-current="page"' : '' }}>
                <svg class="w-5 h-5 mr-3" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M10 2L3 7v11a1 1 0 001 1h3a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1h3a1 1 0 001-1V7l-7-5z" clip-rule="evenodd"></path>
                </svg>
                Dashboard 
            </a>
            <a href="{{ route('admin.consultations.index') }}" class="flex items-center px-3 py-4 text-sm font-medium {{ request()->routeIs('admin.consultations.index') ? 'text-white bg-indigo-600' : 'text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700' }} rounded-lg transition-colors duration-150" {{ request()->routeIs('admin.consultations.index') ? 'aria-current="page"' : '' }}>
                <svg class="w-5 h-5 mr-3" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M3 4a1 1 0 011-1h12a1 1 0 011 1v2a1 1 0 01-1 1H4a1 1 0 01-1-1V4zM3 10a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H4a1 1 0 01-1-1v-6zM14 9a1 1 0 00-1 1v6a1 1 0 001 1h2a1 1 0 001-1v-6a1 1 0 00-1-1h-2z"></path>
                </svg>
                Design Request 
            </a>
            <a href="{{ route('users.index') }}" class="flex items-center px-3 py-4 text-sm font-medium {{ request()->routeIs('users.index') ? 'text-white bg-indigo-600' : 'text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700' }} rounded-lg transition-colors duration-150" {{ request()->routeIs('users.index') ? 'aria-current="page"' : '' }}>
                <svg class="w-5 h-5 mr-3" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M9 6a3 3 0 11-6 0 3 3 0 016 0zM17 6a3 3 0 11-6 0 3 3 0 016 0zM12.93 17c.046-.327.07-.66.07-1a6.97 6.97 0 00-1.5-4.33A5 5 0 0119 16v1h-6.07zM6 11a5 5 0 015 5v1H1v-1a5 5 0 015-5z"></path>
                </svg>
                Customers List 
            </a>
            <a href="{{ route('visitor-analytics.index') }}" class="flex items-center px-3 py-4 text-sm font-medium {{ request()->routeIs('visitor-analytics.index') ? 'text-white bg-indigo-600' : 'text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700' }} rounded-lg transition-colors duration-150" {{ request()->routeIs('visitor-analytics.index') ? 'aria-current="page"' : '' }}>
                <svg class="w-5 h-5 mr-3" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M2 11a1 1 0 011-1h2a1 1 0 011 1v5a1 1 0 01-1 1H3a1 1 0 01-1-1v-5zM8 7a1 1 0 011-1h2a1 1 0 011 1v9a1 1 0 01-1 1H9a1 1 0 01-1-1V7zM14 4a1 1 0 011-1h2a1 1 0 011 1v12a1 1 0 01-1 1h-2a1 1 0 01-1-1V4z"></path>
                </svg>
                Visitor Analytics 
            </a>
            <a href="{{ route('contact-messages.index') }}" class="flex items-center px-3 py-4 text-sm font-medium {{ request()->routeIs('contact-messages*') ? 'text-white bg-indigo-600' : 'text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700' }} rounded-lg transition-colors duration-150" {{ request()->routeIs('contact-messages*') ? 'aria-current="page"' : '' }}>
                <svg class="w-5 h-5 mr-3" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z"></path>
                    <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"></path>
                </svg>
                Contact Messages
                @php
                    $unreadCount = \App\Models\ContactMessage::where('is_read', false)->count();
                @endphp
                @if($unreadCount > 0)
                    <span class="ml-auto inline-flex items-center px-4 py-0.5 rounded-full text-xs font-medium bg-red-100 text-red-800 dark:bg-red-900 dark:text-red-200">
                        {{ $unreadCount }}
                    </span>
                @endif
            </a>
            <a href="{{ route('website-settings') }}" class="flex items-center px-3 py-4 text-sm font-medium {{ request()->routeIs('website-settings*') ? 'text-white bg-indigo-600' : 'text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700' }} rounded-lg transition-colors duration-150" {{ request()->routeIs('website-settings*') ? 'aria-current="page"' : '' }}>
                <svg class="w-5 h-5 mr-3" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M11.49 3.17c-.38-1.56-2.6-1.56-2.98 0a1.532 1.532 0 01-2.286.948c-1.372-.836-2.942.734-2.106 2.106.54.886.061 2.042-.947 2.287-1.561.379-1.561 2.6 0 2.978a1.532 1.532 0 01.947 2.287c-.836 1.372.734 2.942 2.106 2.106a1.532 1.532 0 012.287.947c.379 1.561 2.6 1.561 2.978 0a1.533 1.533 0 012.287-.947c1.372.836 2.942-.734 2.106-2.106a1.533 1.533 0 01.947-2.287c1.561-.379 1.561-2.6 0-2.978a1.532 1.532 0 01-.947-2.287c.836-1.372-.734-2.942-2.106-2.106a1.532 1.532 0 01-2.287-.947zM10 13a3 3 0 100-6 3 3 0 000 6z" clip-rule="evenodd"></path>
                </svg>
                Website Settings
            </a>
        </div>
        
        <!-- Sidebar footer -->
        <div class="p-3 border-t border-gray-200 dark:border-gray-700">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="w-full flex items-center px-3 py-4 text-sm font-medium text-gray-700 dark:text-gray-300 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors duration-150 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                    <svg class="w-5 h-5 mr-3" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M3 3a1 1 0 00-1 1v12a1 1 0 102 0V4a1 1 0 01-1-1zm10.293 9.293a1 1 0 001.414 1.414l3-3a1 1 0 000-1.414l-3-3a1 1 0 10-1.414 1.414L14.586 9H7a1 1 0 100 2h7.586l-1.293 1.293z" clip-rule="evenodd"></path>
                    </svg>
                    Logout
                </button>
            </form>
        </div>
    </div>
</nav>


