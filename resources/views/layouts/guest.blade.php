<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Tailwind CSS CDN -->
        <script src="https://cdn.tailwindcss.com"></script>
        
        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
        
        <style>
            body { font-family: 'Inter', sans-serif; }
        </style>
    </head>
    <body class="bg-gradient-to-br from-blue-50 via-white to-indigo-100 min-h-screen">
        <div class="min-h-screen flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
            <div class="max-w-lg w-full space-y-8">
                <!-- Logo Section -->
                <div class="text-center">
                    @if(request()->routeIs('login'))
                        <h2 class="mt-6 text-xl md:text-2xl font-bold text-gray-900">
                            Welcome Back <span style="color:#d4af37;">InboundHome</span>
                        </h2>
                        <p class="mt-2 text-sm text-gray-600">
                            Sign in to your account to continue
                        </p>
                    @elseif(request()->routeIs('register'))
                        <h2 class="mt-6 text-3xl font-bold text-gray-900">
                            Create Account
                        </h2>
                        <p class="mt-2 text-sm text-gray-600">
                            Join us today and get started
                        </p>
                    @elseif(request()->routeIs('password.request'))
                        <h2 class="mt-6 text-3xl font-bold text-gray-900">
                            Forgot Password?
                        </h2>
                        <p class="mt-2 text-sm text-gray-600">
                            No problem! We'll send you a reset link
                        </p>
                    @elseif(request()->routeIs('password.reset'))
                        <h2 class="mt-6 text-3xl font-bold text-gray-900">
                            Reset Password
                        </h2>
                        <p class="mt-2 text-sm text-gray-600">
                            Enter your new password below
                        </p>
                    @elseif(request()->routeIs('password.confirm'))
                        <h2 class="mt-6 text-3xl font-bold text-gray-900">
                            Confirm Password
                        </h2>
                        <p class="mt-2 text-sm text-gray-600">
                            Please confirm your password to continue
                        </p>
                    @elseif(request()->routeIs('verification.notice'))
                        <h2 class="mt-6 text-3xl font-bold text-gray-900">
                            Verify Email
                        </h2>
                        <p class="mt-2 text-sm text-gray-600">
                            Please verify your email address
                        </p>
                    @else
                        <h2 class="mt-6 text-3xl font-bold text-gray-900">
                            Welcome
                        </h2>
                        <p class="mt-2 text-sm text-gray-600">
                            Access your account
                        </p>
                    @endif
                </div>

                <!-- Form Section -->
                <div class="bg-white py-8 px-6 shadow-xl rounded-2xl border border-gray-100">
                    {{ $slot }}
                </div>
            </div>
        </div>
    </body>
</html>
