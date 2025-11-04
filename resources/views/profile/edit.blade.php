@extends('backend.layouts.app')

@section('title')
    Profile Settings
@endsection

@section('content')
    <!-- Main content wrapper -->
    <div class="flex-1 flex flex-col pt-4 lg:pt-8">
        <!-- Main content -->
        <main id="main-content" class="flex-1 p-3 sm:p-4 lg:p-6 xl:p-8 bg-gray-50 dark:bg-gray-900 overflow-y-auto">
            <!-- Page header -->
            <div class="mb-4 sm:mb-6 lg:mb-8">
                <h1 class="text-xl md:text-2xl font-bold text-gray-900 dark:text-white">Profile Settings</h1>
            </div>

            <!-- Profile Information Section -->
            <section aria-labelledby="profile-info-heading" class="bg-white dark:bg-gray-800 shadow-sm rounded-lg border border-gray-200 dark:border-gray-700 mb-6">
                <div class="px-4 sm:px-6 lg:px-8 py-5 border-b border-gray-200 dark:border-gray-700">
                    <h2 id="profile-info-heading" class="text-lg font-semibold text-gray-900 dark:text-white">Profile Information</h2>
                    <p class="mt-1 text-sm text-gray-600 dark:text-gray-300">Update your account's profile information and email address.</p>
                </div>

                <form id="send-verification" method="post" action="{{ route('verification.send') }}">
                    @csrf
                </form>

                <form method="post" action="{{ route('profile.update') }}" class="px-4 sm:px-6 lg:px-8 py-6 space-y-6">
                    @csrf
                    @method('patch')

                    @if(session('status') === 'profile-updated')
                        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                            <span class="block sm:inline">{{ __('Saved.') }}</span>
                        </div>
                    @endif

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label for="name" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Name</label>
                            <input id="name" name="name" type="text" value="{{ old('name', $user->name) }}" class="mt-1 h-11 px-3 py-2 block w-full rounded-md border border-gray-300 dark:border-gray-500 dark:bg-gray-900 dark:text-gray-100 focus:border-indigo-500 focus:ring-indigo-500 @error('name') border-red-500 @enderror" required autofocus autocomplete="name" />
                            @error('name')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="email" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Email</label>
                            <input id="email" name="email" type="email" value="{{ old('email', $user->email) }}" class="mt-1 h-11 px-3 py-2 block w-full rounded-md border border-gray-300 dark:border-gray-500 dark:bg-gray-900 dark:text-gray-100 focus:border-indigo-500 focus:ring-indigo-500 @error('email') border-red-500 @enderror" required autocomplete="username" />
                            @error('email')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror

                            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                                <div class="mt-2">
                                    <p class="text-sm text-gray-800 dark:text-gray-200">
                                        {{ __('Your email address is unverified.') }}

                                        <button form="send-verification" class="underline text-sm text-indigo-600 hover:text-indigo-900 dark:text-indigo-400 dark:hover:text-indigo-300 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                            {{ __('Click here to re-send the verification email.') }}
                                        </button>
                                    </p>

                                    @if (session('status') === 'verification-link-sent')
                                        <p class="mt-2 font-medium text-sm text-green-600">
                                            {{ __('A new verification link has been sent to your email address.') }}
                                        </p>
                                    @endif
                                </div>
                            @endif
                        </div>
                    </div>

                    <div class="pt-2 flex items-center justify-end gap-3">
                        <button type="submit" class="inline-flex items-center px-4 py-2 rounded-md text-sm font-semibold text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Save Changes</button>
                    </div>
                </form>
            </section>

            <!-- Update Password Section -->
            <section aria-labelledby="password-heading" class="bg-white dark:bg-gray-800 shadow-sm rounded-lg border border-gray-200 dark:border-gray-700 mb-6">
                <div class="px-4 sm:px-6 lg:px-8 py-5 border-b border-gray-200 dark:border-gray-700">
                    <h2 id="password-heading" class="text-lg font-semibold text-gray-900 dark:text-white">Update Password</h2>
                    <p class="mt-1 text-sm text-gray-600 dark:text-gray-300">Ensure your account is using a long, random password to stay secure.</p>
                </div>

                <form method="post" action="{{ route('password.update') }}" class="px-4 sm:px-6 lg:px-8 py-6 space-y-6">
                    @csrf
                    @method('put')

                    @if(session('status') === 'password-updated')
                        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                            <span class="block sm:inline">{{ __('Saved.') }}</span>
                        </div>
                    @endif

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="md:col-span-2">
                            <label for="update_password_current_password" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Current Password</label>
                            <input id="update_password_current_password" name="current_password" type="password" class="mt-1 h-11 px-3 py-2 block w-full rounded-md border border-gray-300 dark:border-gray-500 dark:bg-gray-900 dark:text-gray-100 focus:border-indigo-500 focus:ring-indigo-500 @error('current_password', 'updatePassword') border-red-500 @enderror" autocomplete="current-password" />
                            @error('current_password', 'updatePassword')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="update_password_password" class="block text-sm font-medium text-gray-700 dark:text-gray-200">New Password</label>
                            <input id="update_password_password" name="password" type="password" class="mt-1 h-11 px-3 py-2 block w-full rounded-md border border-gray-300 dark:border-gray-500 dark:bg-gray-900 dark:text-gray-100 focus:border-indigo-500 focus:ring-indigo-500 @error('password', 'updatePassword') border-red-500 @enderror" autocomplete="new-password" />
                            @error('password', 'updatePassword')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="update_password_password_confirmation" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Confirm Password</label>
                            <input id="update_password_password_confirmation" name="password_confirmation" type="password" class="mt-1 h-11 px-3 py-2 block w-full rounded-md border border-gray-300 dark:border-gray-500 dark:bg-gray-900 dark:text-gray-100 focus:border-indigo-500 focus:ring-indigo-500 @error('password_confirmation', 'updatePassword') border-red-500 @enderror" autocomplete="new-password" />
                            @error('password_confirmation', 'updatePassword')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="pt-2 flex items-center justify-end gap-3">
                        <button type="submit" class="inline-flex items-center px-4 py-2 rounded-md text-sm font-semibold text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Update Password</button>
                    </div>
                </form>
            </section>

            <!-- Delete Account Section -->
            <section aria-labelledby="delete-account-heading" class="bg-white dark:bg-gray-800 shadow-sm rounded-lg border border-gray-200 dark:border-gray-700">
                <div class="px-4 sm:px-6 lg:px-8 py-5 border-b border-gray-200 dark:border-gray-700">
                    <h2 id="delete-account-heading" class="text-lg font-semibold text-gray-900 dark:text-white">Delete Account</h2>
                    <p class="mt-1 text-sm text-gray-600 dark:text-gray-300">Once your account is deleted, all of its resources and data will be permanently deleted. Before deleting your account, please download any data or information that you wish to retain.</p>
                </div>

                <div class="px-4 sm:px-6 lg:px-8 py-6">
                    <button
                        onclick="document.getElementById('delete-modal').classList.remove('hidden')"
                        class="inline-flex items-center px-4 py-2 rounded-md text-sm font-semibold text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500"
                    >{{ __('Delete Account') }}</button>

                    <!-- Delete Account Modal -->
                    <div id="delete-modal" class="fixed inset-0 bg-gray-900 bg-opacity-50 z-50 hidden flex items-center justify-center p-4">
                        <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-xl w-full max-w-md">
                            <form method="post" action="{{ route('profile.destroy') }}" class="p-6">
                                @csrf
                                @method('delete')

                                <h2 class="text-lg font-medium text-gray-900 dark:text-white">
                                    {{ __('Are you sure you want to delete your account?') }}
                                </h2>

                                <p class="mt-1 text-sm text-gray-600 dark:text-gray-300">
                                    {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Please enter your password to confirm you would like to permanently delete your account.') }}
                                </p>

                                <div class="mt-6">
                                    <label for="password" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Password</label>

                                    <input
                                        id="password"
                                        name="password"
                                        type="password"
                                        class="mt-1 h-11 px-3 py-2 block w-full rounded-md border border-gray-300 dark:border-gray-500 dark:bg-gray-900 dark:text-gray-100 focus:border-indigo-500 focus:ring-indigo-500 @error('password', 'userDeletion') border-red-500 @enderror"
                                        placeholder="{{ __('Password') }}"
                                    />

                                    @error('password', 'userDeletion')
                                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="mt-6 flex justify-end gap-3">
                                    <button type="button" onclick="document.getElementById('delete-modal').classList.add('hidden')" class="inline-flex items-center px-4 py-2 rounded-md text-sm font-medium border border-gray-300 dark:border-gray-600 text-gray-700 dark:text-gray-200 hover:bg-gray-50 dark:hover:bg-gray-700">
                                        {{ __('Cancel') }}
                                    </button>

                                    <button type="submit" class="inline-flex items-center px-4 py-2 rounded-md text-sm font-semibold text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">
                                        {{ __('Delete Account') }}
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </section>
        </main>
    </div>
@endsection

@push('script')
<script>
    // Handle modal backdrop click to close
    document.getElementById('delete-modal').addEventListener('click', function(e) {
        if (e.target === this) {
            this.classList.add('hidden');
        }
    });
</script>
@endpush
