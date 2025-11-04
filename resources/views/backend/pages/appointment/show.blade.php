@extends('backend.layouts.app')

@section('title') Appointment Details @endsection

@section('content')
    <!-- Main content wrapper -->
    <div class="flex-1 flex flex-col pt-4 lg:pt-8">
        <!-- Main content -->
        <main id="main-content" class="flex-1 p-3 sm:p-4 lg:p-6 xl:p-8 bg-gray-50 dark:bg-gray-900 overflow-y-auto">
            <!-- Page header -->
            <div class="mb-4 sm:mb-6 lg:mb-8">
                <h1 class="text-xl sm:text-2xl font-bold text-gray-900 dark:text-white">Appointment #CF-{{ sprintf('%04d', $consultation->id) }}</h1>
            </div>

            <div class="">
                <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 p-4 sm:p-6">
                    <h1 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">Appointment #CF-{{ sprintf('%04d', $consultation->id) }}</h1>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 text-sm">
                        <div>
                            <div class="text-gray-500 dark:text-gray-400">Name</div>
                            <div class="text-gray-900 dark:text-white">{{ $consultation->full_name }}</div>
                        </div>
                        <div>
                            <div class="text-gray-500 dark:text-gray-400">Email</div>
                            <div class="text-gray-900 dark:text-white">{{ $consultation->email }}</div>
                        </div>
                        <div>
                            <div class="text-gray-500 dark:text-gray-400">Service</div>
                            <div class="text-gray-900 dark:text-white">{{ $consultation->service_display_name }}</div>
                        </div>
                        <div>
                            <div class="text-gray-500 dark:text-gray-400">Budget</div>
                            <div class="text-gray-900 dark:text-white">{{ $consultation->budget_display_name }}</div>
                        </div>
                        <div>
                            <div class="text-gray-500 dark:text-gray-400">Appointment</div>
                            <div class="text-gray-900 dark:text-white">{{ $consultation->formatted_appointment_date }} at {{ $consultation->formatted_appointment_time }}</div>
                        </div>
                        <div>
                            <div class="text-gray-500 dark:text-gray-400">Status</div>
                            <div class="text-gray-900 dark:text-white capitalize">{{ $consultation->status }}</div>
                        </div>
                    </div>

                    @if($consultation->notes)
                    <div class="mt-4">
                        <div class="text-gray-500 dark:text-gray-400">Notes</div>
                        <div class="text-gray-900 dark:text-white whitespace-pre-wrap">{{ $consultation->notes }}</div>
                    </div>
                    @endif

                    <div class="mt-6">
                        <a href="{{ route('admin.consultations.edit', $consultation) }}" class="inline-flex items-center px-3 py-1.5 text-xs font-medium rounded-lg bg-indigo-600 text-white">Update Status</a>
                    </div>
                </div>
            </div>
        </main>
    </div>
@endsection


