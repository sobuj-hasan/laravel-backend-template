@extends('backend.layouts.app')

@section('title') Update Appointment Status @endsection

@section('content')
<!-- Main content wrapper -->
    <div class="flex-1 flex flex-col pt-4 lg:pt-8">
        <!-- Main content -->
        <main id="main-content" class="flex-1 p-3 sm:p-4 lg:p-6 xl:p-8 bg-gray-50 dark:bg-gray-900 overflow-y-auto">
            <!-- Page header -->
            <div class="mb-4 sm:mb-6 lg:mb-8">
                <h1 class="text-xl sm:text-2xl font-bold text-gray-900 dark:text-white">Update Status - #CF-{{ sprintf('%04d', $consultation->id) }}</h1>
            </div>

            <div class="">
                <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 p-4 sm:p-6 max-w-lg">
                    <h1 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">Update Status - #CF-{{ sprintf('%04d', $consultation->id) }}</h1>

                    <form method="POST" action="{{ route('admin.consultations.update', $consultation) }}" class="space-y-4">
                        @csrf
                        @method('PUT')

                        <div>
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Status</label>
                            <select name="status" class="w-full h-10 border rounded-lg border-gray-300 dark:border-gray-600 dark:bg-gray-800 dark:text-white" required>
                                @foreach(['pending','confirmed','completed','cancelled'] as $st)
                                    <option value="{{ $st }}" @selected($consultation->status === $st)>{{ ucfirst($st) }}</option>
                                @endforeach
                            </select>
                            @error('status')
                                <p class="text-xs text-red-600 mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="flex items-center space-x-2">
                            <button type="submit" class="px-3 py-1.5 text-xs font-medium rounded-lg bg-indigo-600 text-white">Save</button>
                            <a href="{{ route('admin.consultations.show', $consultation) }}" class="px-3 py-1.5 text-xs font-medium rounded-lg bg-gray-100 dark:bg-gray-700 text-gray-700 dark:text-gray-300">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </main>
    </div>
@endsection


