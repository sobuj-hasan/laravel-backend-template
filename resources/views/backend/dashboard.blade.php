@extends('backend.layouts.app')

@section('title')
    Dashboard 
@endsection

@section('content')
    <!-- Main content wrapper -->
    <div class="flex-1 flex flex-col pt-4 lg:pt-8">
        <!-- Main content -->
        <main id="main-content" class="flex-1 p-3 sm:p-4 lg:p-6 xl:p-8 bg-gray-50 dark:bg-gray-900 overflow-y-auto">
            <!-- Page header -->
            <div class="mb-4 sm:mb-6 lg:mb-8">
                <h1 class="text-xl sm:text-2xl font-bold text-gray-900 dark:text-white">Admin Dashboard</h1>
            </div>

            <!-- KPI Cards -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-3 sm:gap-4 lg:gap-6 mb-4 sm:mb-6 lg:mb-8">
                <div class="bg-white dark:bg-gray-800 rounded-xl sm:rounded-2xl shadow-sm border border-gray-200 dark:border-gray-700 p-4 sm:p-5 lg:p-6">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-xs sm:text-sm font-medium text-gray-600 dark:text-gray-400">Total Users</p>
                            <p class="text-2xl sm:text-3xl font-bold text-gray-900 dark:text-white">{{ $total_users }}</p>
                        </div>
                        <div class="w-10 h-10 sm:w-12 sm:h-12 bg-indigo-100 dark:bg-indigo-900 rounded-lg sm:rounded-xl flex items-center justify-center">
                            <svg class="w-5 h-5 sm:w-6 sm:h-6 text-indigo-600 dark:text-indigo-400" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M9 6a3 3 0 11-6 0 3 3 0 016 0zM17 6a3 3 0 11-6 0 3 3 0 016 0zM12.93 17c.046-.327.07-.66.07-1a6.97 6.97 0 00-1.5-4.33A5 5 0 0119 16v1h-6.07zM6 11a5 5 0 015 5v1H1v-1a5 5 0 015-5z"></path>
                            </svg>
                        </div>
                    </div>
                </div>

                <div class="bg-white dark:bg-gray-800 rounded-xl sm:rounded-2xl shadow-sm border border-gray-200 dark:border-gray-700 p-4 sm:p-5 lg:p-6">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-xs sm:text-sm font-medium text-gray-600 dark:text-gray-400">Contact Messages</p>
                            <p class="text-2xl sm:text-3xl font-bold text-gray-900 dark:text-white">{{ $total_contact_messages }}</p>
                        </div>
                        <div class="w-10 h-10 sm:w-12 sm:h-12 bg-green-100 dark:bg-green-900 rounded-lg sm:rounded-xl flex items-center justify-center">
                            <svg class="w-5 h-5 sm:w-6 sm:h-6 text-green-600 dark:text-green-400" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M2 5a3 3 0 013-3h10a3 3 0 013 3v6a3 3 0 01-3 3H8.414l-3.121 3.121A1 1 0 013 16.414V16a3 3 0 01-3-3V5zm3-1a1 1 0 00-1 1v6a1 1 0 001 1h9a1 1 0 001-1V5a1 1 0 00-1-1H5z"></path>
                            </svg>
                        </div>
                    </div>
                </div>

                <div class="bg-white dark:bg-gray-800 rounded-xl sm:rounded-2xl shadow-sm border border-gray-200 dark:border-gray-700 p-4 sm:p-5 lg:p-6">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-xs sm:text-sm font-medium text-gray-600 dark:text-gray-400">Total Services</p>
                            <p class="text-2xl sm:text-3xl font-bold text-gray-900 dark:text-white">{{ $total_services }}</p>
                        </div>
                        <div class="w-10 h-10 sm:w-12 sm:h-12 bg-orange-100 dark:bg-orange-900 rounded-lg sm:rounded-xl flex items-center justify-center">
                            <svg class="w-5 h-5 sm:w-6 sm:h-6 text-orange-600 dark:text-orange-400" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M6 2a2 2 0 00-2 2v2h12V4a2 2 0 00-2-2H6zm10 6H4v8a2 2 0 002 2h8a2 2 0 002-2V8z"></path>
                            </svg>
                        </div>
                    </div>
                </div>

                <div class="bg-white dark:bg-gray-800 rounded-xl sm:rounded-2xl shadow-sm border border-gray-200 dark:border-gray-700 p-4 sm:p-5 lg:p-6">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-xs sm:text-sm font-medium text-gray-600 dark:text-gray-400">Appointments</p>
                            <p class="text-2xl sm:text-3xl font-bold text-gray-900 dark:text-white">{{ $total_consultations }}</p>
                        </div>
                        <div class="w-10 h-10 sm:w-12 sm:h-12 bg-purple-100 dark:bg-purple-900 rounded-lg sm:rounded-xl flex items-center justify-center">
                            <svg class="w-5 h-5 sm:w-6 sm:h-6 text-purple-600 dark:text-purple-400" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M6 2a2 2 0 00-2 2v1h12V4a2 2 0 00-2-2H6zm10 5H4v7a2 2 0 002 2h8a2 2 0 002-2V7zM7 9a1 1 0 012 0v1a1 1 0 11-2 0V9zm4 0a1 1 0 012 0v1a1 1 0 11-2 0V9z" clip-rule="evenodd"></path>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Content grid -->
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-4 sm:gap-6 lg:gap-8 mb-4 sm:mb-6 lg:mb-8">
                <!-- Recent Consultations Table -->
                <div class="lg:col-span-2">
                    <div class="bg-white dark:bg-gray-800 rounded-xl sm:rounded-2xl shadow-sm border border-gray-200 dark:border-gray-700">
                        <div class="p-4 sm:p-5 lg:p-6 border-b border-gray-200 dark:border-gray-700">
                            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3 sm:gap-0">
                                <h2 class="text-base sm:text-lg font-semibold text-gray-900 dark:text-white">Recent Design Request</h2>
                            </div>
                        </div>
                        <div class="overflow-x-auto">
                            <table class="w-full divide-y divide-gray-200 dark:divide-gray-700">
                                <thead class="bg-gray-50 dark:bg-gray-900 sticky top-0">
                                    <tr>
                                        <th scope="col" class="px-2 sm:px-3 lg:px-4 py-2 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider cursor-pointer hover:bg-gray-100 dark:hover:bg-gray-800 transition-colors duration-150">
                                            <div class="flex items-center space-x-1">
                                                <span class="hidden sm:inline">ID</span>
                                                <span class="sm:hidden">ID</span>
                                                <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16V4m0 0L3 8m4-4l4 4m6 0v12m0 0l4-4m-4 4l-4-4"></path>
                                                </svg>
                                            </div>
                                        </th>
                                        <th scope="col" class="px-2 sm:px-3 lg:px-4 py-2 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider cursor-pointer hover:bg-gray-100 dark:hover:bg-gray-800 transition-colors duration-150">
                                            <span class="hidden sm:inline">Name</span>
                                            <span class="sm:hidden">Name</span>
                                        </th>
                                        <th scope="col" class="px-2 sm:px-3 lg:px-4 py-2 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider cursor-pointer hover:bg-gray-100 dark:hover:bg-gray-800 transition-colors duration-150 hidden md:table-cell">Service</th>
                                        <th scope="col" class="px-2 sm:px-3 lg:px-4 py-2 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider cursor-pointer hover:bg-gray-100 dark:hover:bg-gray-800 transition-colors duration-150">Budget</th>
                                        <th scope="col" class="px-2 sm:px-3 lg:px-4 py-2 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider cursor-pointer hover:bg-gray-100 dark:hover:bg-gray-800 transition-colors duration-150">Status</th>
                                        <th scope="col" class="px-2 sm:px-3 lg:px-4 py-2 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider cursor-pointer hover:bg-gray-100 dark:hover:bg-gray-800 transition-colors duration-150 hidden lg:table-cell">Date</th>
                                        <th scope="col" class="px-2 sm:px-3 lg:px-4 py-2 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Action</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700">
                                    @forelse($consultations as $c)
                                        <tr class="hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors duration-150">
                                            <td class="px-2 sm:px-3 lg:px-4 py-2 sm:py-3 whitespace-nowrap text-xs font-medium text-gray-900 dark:text-white">#CF-{{ sprintf('%04d', $c->id) }}</td>
                                            <td class="px-2 sm:px-3 lg:px-4 py-2 sm:py-3 whitespace-nowrap">
                                                <div class="flex items-center">
                                                    <img class="h-5 w-5 sm:h-6 sm:w-6 rounded-full" src="{{ asset('placeholder.svg') }}" alt="User">
                                                    <div class="ml-1 sm:ml-2">
                                                        <div class="text-xs font-medium text-gray-900 dark:text-white">{{ $c->full_name }}</div>
                                                        <div class="text-xs text-gray-500 dark:text-gray-400 hidden sm:block">{{ $c->email }}</div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="px-2 sm:px-3 lg:px-4 py-2 sm:py-3 whitespace-nowrap text-xs text-gray-900 dark:text-white hidden md:table-cell">{{ $c->service_display_name }}</td>
                                            <td class="px-2 sm:px-3 lg:px-4 py-2 sm:py-3 whitespace-nowrap text-xs font-medium text-gray-900 dark:text-white">{{ $c->budget_display_name }}</td>
                                            <td class="px-2 sm:px-3 lg:px-4 py-2 sm:py-3 whitespace-nowrap">
                                                @php
                                                    $status = strtolower($c->status);
                                                    $map = [
                                                        'confirmed' => ['bg' => 'bg-green-100 dark:bg-green-900', 'text' => 'text-green-800 dark:text-green-300'],
                                                        'completed' => ['bg' => 'bg-blue-100 dark:bg-blue-900', 'text' => 'text-blue-800 dark:text-blue-300'],
                                                        'cancelled' => ['bg' => 'bg-red-100 dark:bg-red-900', 'text' => 'text-red-800 dark:text-red-300'],
                                                        'pending' => ['bg' => 'bg-yellow-100 dark:bg-yellow-900', 'text' => 'text-yellow-800 dark:text-yellow-300'],
                                                    ];
                                                    $cls = $map[$status] ?? $map['pending'];
                                                @endphp
                                                <span class="inline-flex px-1.5 py-0.5 text-xs font-semibold rounded-full {{ $cls['bg'] }} {{ $cls['text'] }}">{{ ucfirst($status) }}</span>
                                            </td>
                                            <td class="px-2 sm:px-3 lg:px-4 py-2 sm:py-3 whitespace-nowrap text-xs text-gray-500 dark:text-gray-400 hidden lg:table-cell">{{ $c->created_at->format('Y-m-d') }}</td>
                                            <td class="px-2 sm:px-3 lg:px-4 py-2 sm:py-3 whitespace-nowrap">
                                                <div class="flex items-center space-x-1">
                                                    <a href="{{ route('admin.consultations.show', $c) }}" class="p-1 text-gray-400 hover:text-blue-600 dark:hover:text-blue-400 transition-colors duration-150" title="View">
                                                        <svg class="w-3 h-3 sm:w-4 sm:h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                                        </svg>
                                                    </a>
                                                    <a href="{{ route('admin.consultations.edit', $c) }}" class="p-1 text-gray-400 hover:text-green-600 dark:hover:text-green-400 transition-colors duration-150" title="Status Update">
                                                        <svg class="w-3 h-3 sm:w-4 sm:h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                                        </svg>
                                                    </a>
                                                    <form method="POST" action="{{ route('admin.consultations.destroy', $c) }}" onsubmit="return confirm('Delete this consultation?');">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button class="p-1 text-gray-400 hover:text-red-600 dark:hover:text-red-400 transition-colors duration-150" title="Delete">
                                                        <svg class="w-3 h-3 sm:w-4 sm:h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                                        </svg>
                                                        </button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="7" class="px-4 py-6 text-center text-xs sm:text-sm text-gray-500 dark:text-gray-400">No Appointments found.</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                        <!-- Pagination (static UI placeholder) -->
                        <div class="px-3 sm:px-4 lg:px-6 py-3 sm:py-4 border-t border-gray-200 dark:border-gray-700">
                            {{ $consultations->links() }}
                        </div>
                    </div>
                </div>

                <!-- Top Services -->
                <div class="bg-white dark:bg-gray-800 rounded-xl sm:rounded-2xl shadow-sm border border-gray-200 dark:border-gray-700">
                    <div class="p-4 sm:p-5 lg:p-6 border-b border-gray-200 dark:border-gray-700">
                        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3 sm:gap-0">
                            <h2 class="text-base sm:text-lg font-semibold text-gray-900 dark:text-white">Top Services</h2>
                        </div>
                    </div>
                    <div class="p-4 sm:p-5 lg:p-6 space-y-3 sm:space-y-4">
                        @foreach($top_services as $svc)
                        <div class="flex items-center justify-between">
                            <div class="flex-1">
                                <p class="text-xs sm:text-sm font-medium text-gray-900 dark:text-white">{{ $svc['name'] }}</p>
                                <p class="text-xs text-gray-500 dark:text-gray-400">{{ $svc['budget_label'] }}</p>
                                <div class="w-full bg-gray-200 dark:bg-gray-700 rounded-full h-1.5 sm:h-2 mt-2">
                                    <div class="h-1.5 sm:h-2 rounded-full {{ $svc['color_class'] }}" style="width: {{ $svc['percent'] }}%"></div>
                                </div>
                            </div>
                            <span class="text-xs sm:text-sm font-medium text-gray-900 dark:text-white ml-3 sm:ml-4">{{ $svc['percent'] }}%</span>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </main>
        
        <!-- Footer -->
        <footer class="bg-white dark:bg-gray-800 border-t border-gray-200 dark:border-gray-700 px-3 sm:px-4 lg:px-6 xl:px-8 py-3 sm:py-4">
            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-2 sm:gap-0">
                <div class="text-xs sm:text-sm text-gray-500 dark:text-gray-400">
                    © {{ date('Y') }} InboundHome. All rights reserved.
                </div>
                <div class="flex items-center space-x-3 sm:space-x-4 text-xs sm:text-sm text-gray-500 dark:text-gray-400">
                    <a href="{{ route('home') }}" target="_blank" class="hover:text-gray-700 dark:hover:text-gray-300 transition-colors duration-150">View Website</a>
                </div>
            </div>
        </footer>
    </div>
@endsection
