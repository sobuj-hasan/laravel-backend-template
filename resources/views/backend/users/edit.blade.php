@extends('backend.layouts.app')

@section('title') Edit Customer @endsection

@section('content')
    <div class="flex-1 flex flex-col pt-4 lg:pt-8">
        <main id="main-content" class="flex-1 p-3 sm:p-4 lg:p-6 xl:p-8 bg-gray-50 dark:bg-gray-900 overflow-y-auto">
            <div class="mb-4 sm:mb-6 lg:mb-8">
                <h1 class="text-xl sm:text-2xl font-bold text-gray-900 dark:text-white">Edit Customer</h1>
                <p class="text-sm text-gray-600 dark:text-gray-400">{{ $email }}</p>
            </div>

            <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 p-4 sm:p-6 max-w-lg">
                <form method="POST" action="{{ route('users.update', $email) }}" class="space-y-4">
                    @csrf
                    @method('PUT')
                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Full name</label>
                        <input type="text" name="full_name" value="{{ old('full_name', $name) }}" class="w-full h-10 border rounded-lg border-gray-300 dark:border-gray-600 dark:bg-gray-800 dark:text-white" required>
                        @error('full_name')
                            <p class="text-xs text-red-600 mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="flex items-center space-x-2">
                        <button type="submit" class="px-3 py-1.5 text-xs font-medium rounded-lg bg-indigo-600 text-white">Save</button>
                        <a href="{{ route('users.show', $email) }}" class="px-3 py-1.5 text-xs font-medium rounded-lg bg-gray-100 dark:bg-gray-700 text-gray-700 dark:text-gray-300">Cancel</a>
                    </div>
                </form>
            </div>
        </main>
    </div>
@endsection


