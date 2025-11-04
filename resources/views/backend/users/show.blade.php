@extends('backend.layouts.app')

@section('title') Customer Details @endsection

@section('content')
    <div class="flex-1 flex flex-col pt-4 lg:pt-8">
        <main id="main-content" class="flex-1 p-3 sm:p-4 lg:p-6 xl:p-8 bg-gray-50 dark:bg-gray-900 overflow-y-auto">
            <div class="mb-4 sm:mb-6 lg:mb-8">
                <h1 class="text-xl sm:text-2xl font-bold text-gray-900 dark:text-white">{{ $name ?? 'Customer' }}</h1>
                <p class="text-sm text-gray-600 dark:text-gray-400">{{ $email }}</p>
            </div>

            <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700">
                <div class="p-4 border-b border-gray-200 dark:border-gray-700">
                    <h2 class="text-base font-semibold text-gray-900 dark:text-white">Appointments</h2>
                </div>
                <div class="overflow-x-auto">
                    <table class="w-full divide-y divide-gray-200 dark:divide-gray-700">
                        <thead class="bg-gray-50 dark:bg-gray-900">
                            <tr>
                                <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase">Service</th>
                                <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase">Budget</th>
                                <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase">Status</th>
                                <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase">Date</th>
                                <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase">Action</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700">
                            @foreach($consultations as $c)
                            <tr>
                                <td class="px-4 py-2 text-xs text-gray-900 dark:text-white">{{ $c->service_display_name }}</td>
                                <td class="px-4 py-2 text-xs text-gray-900 dark:text-white">{{ $c->budget_display_name }}</td>
                                <td class="px-4 py-2 text-xs text-gray-900 dark:text-white capitalize">{{ $c->status }}</td>
                                <td class="px-4 py-2 text-xs text-gray-500 dark:text-gray-400">{{ $c->created_at->format('Y-m-d') }}</td>
                                <td class="px-4 py-2 text-xs">
                                    <a href="{{ route('admin.consultations.show', $c) }}" class="text-indigo-600">View</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="px-4 py-3 border-t border-gray-200 dark:border-gray-700">
                    {{ $consultations->links() }}
                </div>
            </div>
        </main>
    </div>
@endsection


