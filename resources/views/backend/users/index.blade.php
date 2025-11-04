@extends('backend.layouts.app')

@section('title') Customers @endsection

@section('content')
    <div class="flex-1 flex flex-col pt-4 lg:pt-8">
        <main id="main-content" class="flex-1 p-3 sm:p-4 lg:p-6 xl:p-8 bg-gray-50 dark:bg-gray-900 overflow-y-auto">
            <div class="mb-4 sm:mb-6 lg:mb-8">
                <h1 class="text-xl sm:text-2xl font-bold text-gray-900 dark:text-white">Customers</h1>
            </div>

            <div class="bg-white dark:bg-gray-800 rounded-xl sm:rounded-2xl shadow-sm border border-gray-200 dark:border-gray-700">
                <div class="p-4 sm:p-5 lg:p-6 border-b border-gray-200 dark:border-gray-700">
                    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3 sm:gap-0">
                        <h2 class="text-base sm:text-lg font-semibold text-gray-900 dark:text-white">Customer List</h2>
                    </div>
                </div>
                <div class="overflow-x-auto">
                    <table class="w-full divide-y divide-gray-200 dark:divide-gray-700">
                        <thead class="bg-gray-50 dark:bg-gray-900 sticky top-0">
                            <tr>
                                <th class="px-2 sm:px-3 lg:px-4 py-2 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Customer</th>
                                <th class="px-2 sm:px-3 lg:px-4 py-2 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider hidden md:table-cell">Email</th>
                                <th class="px-2 sm:px-3 lg:px-4 py-2 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Appointments</th>
                                <th class="px-2 sm:px-3 lg:px-4 py-2 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider hidden lg:table-cell">Last Consulted</th>
                                <th class="px-2 sm:px-3 lg:px-4 py-2 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Action</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700">
                            @forelse($customers as $c)
                            <tr class="hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors duration-150">
                                <td class="px-2 sm:px-3 lg:px-4 py-2 sm:py-3 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <img class="h-5 w-5 sm:h-6 sm:w-6 rounded-full" src="{{ asset('placeholder.svg') }}" alt="User">
                                        <div class="ml-1 sm:ml-2">
                                            <div class="text-xs font-medium text-gray-900 dark:text-white">{{ $c->name ?? '—' }}</div>
                                            <div class="text-xs text-gray-500 dark:text-gray-400 md:hidden">{{ $c->email }}</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-2 sm:px-3 lg:px-4 py-2 sm:py-3 whitespace-nowrap text-xs text-gray-900 dark:text-white hidden md:table-cell">{{ $c->email }}</td>
                                <td class="px-2 sm:px-3 lg:px-4 py-2 sm:py-3 whitespace-nowrap">
                                    <span class="inline-flex px-1.5 py-0.5 text-xs font-semibold rounded-full bg-indigo-100 dark:bg-indigo-900 text-indigo-800 dark:text-indigo-300">{{ $c->total_consultations }}</span>
                                </td>
                                <td class="px-2 sm:px-3 lg:px-4 py-2 sm:py-3 whitespace-nowrap text-xs text-gray-500 dark:text-gray-400 hidden lg:table-cell">{{ \Carbon\Carbon::parse($c->last_consulted)->format('Y-m-d') }}</td>
                                <td class="px-2 sm:px-3 lg:px-4 py-2 sm:py-3 whitespace-nowrap">
                                    <div class="flex items-center space-x-1">
                                        <a href="{{ route('users.show', ['user' => $c->email]) }}" class="p-1 text-gray-400 hover:text-blue-600 dark:hover:text-blue-400 transition-colors duration-150" title="View">
                                            <svg class="w-3 h-3 sm:w-4 sm:h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                                        </a>
                                        <a href="{{ route('users.edit', ['user' => $c->email]) }}" class="p-1 text-gray-400 hover:text-green-600 dark:hover:text-green-400 transition-colors duration-150" title="Edit">
                                            <svg class="w-3 h-3 sm:w-4 sm:h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>
                                        </a>
                                        <form method="POST" action="{{ route('users.destroy', ['user' => $c->email]) }}" onsubmit="return confirm('Delete this customer?');">
                                            @csrf
                                            @method('DELETE')
                                            <button class="p-1 text-gray-400 hover:text-red-600 dark:hover:text-red-400 transition-colors duration-150" title="Delete">
                                                <svg class="w-3 h-3 sm:w-4 sm:h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="5" class="px-4 py-6 text-center text-xs sm:text-sm text-gray-500 dark:text-gray-400">No customers found.</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                <div class="px-3 sm:px-4 lg:px-6 py-3 sm:py-4 border-t border-gray-200 dark:border-gray-700">
                    {{ $customers->links() }}
                </div>
            </div>
        </main>
    </div>
@endsection


