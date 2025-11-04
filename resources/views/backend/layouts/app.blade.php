<!DOCTYPE html>
<html lang="en" class="h-full bg-gray-50 dark:bg-gray-900">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - {{ config('app.name') }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            darkMode: 'class'
        }
    </script>
    <style>
        /* Custom styles for checkbox hacks */
        .peer:checked ~ .peer-checked\:translate-x-0 {
            transform: translateX(0);
        }
        .peer:checked ~ .peer-checked\:opacity-50 {
            opacity: 0.5;
        }
        
        /* Dark mode toggle animation */
        .dark-toggle:checked ~ .dark-toggle-bg {
            background-color: rgb(79 70 229);
        }
        .dark-toggle:checked ~ .dark-toggle-bg .dark-toggle-dot {
            transform: translateX(1rem);
        }
        @media (min-width: 640px) {
            .dark-toggle:checked ~ .dark-toggle-bg .dark-toggle-dot {
                transform: translateX(1.25rem);
            }
        }
        
        /* Sidebar mobile toggle */
        .sidebar-toggle:checked ~ .sidebar {
            transform: translateX(0);
        }
        .sidebar-toggle:checked ~ .sidebar-overlay {
            opacity: 1;
            visibility: visible;
        }
        
        /* Modal toggle */
        .modal-toggle:checked ~ .modal-backdrop {
            opacity: 1;
            visibility: visible;
        }
        .modal-toggle:checked ~ .modal-backdrop .modal-content {
            opacity: 1;
            transform: scale(1);
        }
    </style>

    @stack('style')
    <style>
        @media (max-width: 767px) {
            #main-content{
                margin-top: 20px;
            }
        }
    </style>
</head>
<body class="h-full bg-gray-50 dark:bg-gray-900 transition-colors duration-200 flex">
    
    @include('backend.include.left-nav')

    @include('backend.components.modal')

    <!-- Main layout -->
    <div class="flex-1 lg:ml-64 h-screen flex flex-col">

        @include('backend.include.top-header');

        @yield('content')
        
    </div>

    <script>
        // Handle dark mode based on system preference
        if (localStorage.theme === 'dark' || (!('theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
            document.documentElement.classList.add('dark');
            document.getElementById('dark-mode-toggle').checked = true;
        } else {
            document.documentElement.classList.remove('dark');
        }

        // Toggle dark mode
        document.getElementById('dark-mode-toggle').addEventListener('change', function() {
            if (this.checked) {
                document.documentElement.classList.add('dark');
                localStorage.theme = 'dark';
            } else {
                document.documentElement.classList.remove('dark');
                localStorage.theme = 'light';
            }
        });

        // Close sidebar when clicking overlay
        document.querySelector('.sidebar-overlay').addEventListener('click', function() {
            document.getElementById('sidebar-toggle').checked = false;
        });

        // Close modal when clicking backdrop
        document.querySelector('.modal-backdrop').addEventListener('click', function(e) {
            if (e.target === this) {
                document.getElementById('modal-toggle').checked = false;
            }
        });

        // Notification dropdown functionality
        const notificationBtn = document.getElementById('notification-btn');
        const notificationDropdown = document.getElementById('notification-dropdown');
        
        notificationBtn.addEventListener('click', function(e) {
            e.stopPropagation();
            notificationDropdown.classList.toggle('hidden');
            // Close user dropdown if open
            document.getElementById('user-dropdown').classList.add('hidden');
        });

        // User menu dropdown functionality
        const userMenuBtn = document.getElementById('user-menu-btn');
        const userDropdown = document.getElementById('user-dropdown');
        
        userMenuBtn.addEventListener('click', function(e) {
            e.stopPropagation();
            userDropdown.classList.toggle('hidden');
            // Close notification dropdown if open
            notificationDropdown.classList.add('hidden');
        });

        // Close dropdowns when clicking outside
        document.addEventListener('click', function(e) {
            if (!notificationBtn.contains(e.target) && !notificationDropdown.contains(e.target)) {
                notificationDropdown.classList.add('hidden');
            }
            if (!userMenuBtn.contains(e.target) && !userDropdown.contains(e.target)) {
                userDropdown.classList.add('hidden');
            }
        });
    </script>

    @stack('script')
</body>
</html>



