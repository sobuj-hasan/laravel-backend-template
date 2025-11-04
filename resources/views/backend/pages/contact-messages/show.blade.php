@extends('backend.layouts.app')

@section('title')
    View Message - {{ $contactMessage->subject }}
@endsection

@section('content')
    <!-- Main content wrapper -->
    <div class="flex-1 flex flex-col pt-4 lg:pt-8">
        <!-- Main content -->
        <main id="main-content" class="flex-1 p-3 sm:p-4 lg:p-6 xl:p-8 bg-gray-50 dark:bg-gray-900 overflow-y-auto">
            <!-- Page header -->
            <div class="mb-4 sm:mb-6 lg:mb-8">
                <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between">
                    <div class="flex items-center space-x-4">
                        <a href="{{ route('contact-messages.index') }}" 
                           class="inline-flex items-center px-3 py-2 border border-gray-300 dark:border-gray-600 shadow-sm text-sm leading-4 font-medium rounded-md text-gray-700 dark:text-gray-200 bg-white dark:bg-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            <svg class="h-4 w-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                            </svg>
                            Back to Messages
                        </a>
                        <div>
                            <h1 class="text-xl md:text-2xl font-bold text-gray-900 dark:text-white">Message Details</h1>
                            <p class="mt-1 text-sm text-gray-600 dark:text-gray-300">View and respond to customer inquiry</p>
                        </div>
                    </div>
                    <div class="mt-4 sm:mt-0 flex items-center space-x-3">
                        @if(!$contactMessage->is_read)
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-red-100 text-red-800 dark:bg-red-900 dark:text-red-200">
                                Unread
                            </span>
                        @else
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-200">
                                Read
                            </span>
                        @endif
                        <span class="text-sm text-gray-500 dark:text-gray-400">
                            {{ $contactMessage->created_at->format('M j, Y \a\t g:i A') }}
                        </span>
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                <!-- Message Details -->
                <div class="lg:col-span-2 space-y-6">
                    <!-- Contact Information -->
                    <div class="bg-white dark:bg-gray-800 shadow-sm rounded-lg border border-gray-200 dark:border-gray-700">
                        <div class="px-4 sm:px-6 lg:px-8 py-5 border-b border-gray-200 dark:border-gray-700">
                            <h2 class="text-lg font-semibold text-gray-900 dark:text-white">Contact Information</h2>
                        </div>
                        <div class="px-4 sm:px-6 lg:px-8 py-6">
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-200">Full Name</label>
                                    <p class="mt-1 text-sm text-gray-900 dark:text-white">{{ $contactMessage->full_name }}</p>
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-200">Email</label>
                                    <p class="mt-1 text-sm text-gray-900 dark:text-white">
                                        <a href="mailto:{{ $contactMessage->email }}" class="text-indigo-600 hover:text-indigo-900 dark:text-indigo-400 dark:hover:text-indigo-300">
                                            {{ $contactMessage->email }}
                                        </a>
                                    </p>
                                </div>
                                @if($contactMessage->phone)
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-200">Phone</label>
                                        <p class="mt-1 text-sm text-gray-900 dark:text-white">
                                            <a href="tel:{{ $contactMessage->phone }}" class="text-indigo-600 hover:text-indigo-900 dark:text-indigo-400 dark:hover:text-indigo-300">
                                                {{ $contactMessage->phone }}
                                            </a>
                                        </p>
                                    </div>
                                @endif
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-200">Preferred Contact Method</label>
                                    <p class="mt-1 text-sm text-gray-900 dark:text-white">
                                        {{ $contactMessage->contact_method ? ucfirst($contactMessage->contact_method) : 'Not specified' }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Project Details -->
                    <div class="bg-white dark:bg-gray-800 shadow-sm rounded-lg border border-gray-200 dark:border-gray-700">
                        <div class="px-4 sm:px-6 lg:px-8 py-5 border-b border-gray-200 dark:border-gray-700">
                            <h2 class="text-lg font-semibold text-gray-900 dark:text-white">Project Details</h2>
                        </div>
                        <div class="px-4 sm:px-6 lg:px-8 py-6 space-y-6">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 dark:text-gray-200">Subject</label>
                                <p class="mt-1 text-lg font-medium text-gray-900 dark:text-white">{{ $contactMessage->subject }}</p>
                            </div>
                            
                            @if($contactMessage->service)
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-200">Service Interested In</label>
                                    <p class="mt-1">
                                        <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-indigo-100 text-indigo-800 dark:bg-indigo-900 dark:text-indigo-200">
                                            {{ $contactMessage->service }}
                                        </span>
                                    </p>
                                </div>
                            @endif

                            @if($contactMessage->budget)
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-200">Budget</label>
                                    <p class="mt-1 text-lg font-semibold text-green-600 dark:text-green-400">
                                        R{{ number_format((float)$contactMessage->budget) }}
                                    </p>
                                </div>
                            @endif

                            <div>
                                <label class="block text-sm font-medium text-gray-700 dark:text-gray-200">Project Description</label>
                                <div class="mt-1 text-sm text-gray-900 dark:text-white whitespace-pre-wrap bg-gray-50 dark:bg-gray-700 p-4 rounded-lg">
                                    {{ $contactMessage->project_details }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Sidebar -->
                <div class="space-y-6">
                    <!-- Quick Actions -->
                    <div class="bg-white dark:bg-gray-800 shadow-sm rounded-lg border border-gray-200 dark:border-gray-700">
                        <div class="px-4 sm:px-6 lg:px-8 py-5 border-b border-gray-200 dark:border-gray-700">
                            <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Quick Actions</h3>
                        </div>
                        <div class="px-4 sm:px-6 lg:px-8 py-6 space-y-3">
                            <a href="mailto:{{ $contactMessage->email }}?subject=Re: {{ $contactMessage->subject }}" 
                               class="w-full inline-flex items-center justify-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                <svg class="h-4 w-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                                </svg>
                                Reply via Email
                            </a>
                            
                            @if($contactMessage->phone)
                                <a href="tel:{{ $contactMessage->phone }}" 
                                   class="w-full inline-flex items-center justify-center px-4 py-2 border border-gray-300 dark:border-gray-600 text-sm font-medium rounded-md text-gray-700 dark:text-gray-200 bg-white dark:bg-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                    <svg class="h-4 w-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                                    </svg>
                                    Call Customer
                                </a>
                            @endif

                            @if(!$contactMessage->is_read)
                                <button onclick="markAsRead({{ $contactMessage->id }})" 
                                        class="w-full inline-flex items-center justify-center px-4 py-2 border border-green-300 dark:border-green-600 text-sm font-medium rounded-md text-green-700 dark:text-green-200 bg-green-50 dark:bg-green-900/20 hover:bg-green-100 dark:hover:bg-green-900/30 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                                    <svg class="h-4 w-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                    </svg>
                                    Mark as Read
                                </button>
                            @endif
                        </div>
                    </div>

                    <!-- Message Info -->
                    <div class="bg-white dark:bg-gray-800 shadow-sm rounded-lg border border-gray-200 dark:border-gray-700">
                        <div class="px-4 sm:px-6 lg:px-8 py-5 border-b border-gray-200 dark:border-gray-700">
                            <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Message Info</h3>
                        </div>
                        <div class="px-4 sm:px-6 lg:px-8 py-6 space-y-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 dark:text-gray-200">Received</label>
                                <p class="mt-1 text-sm text-gray-900 dark:text-white">
                                    {{ $contactMessage->created_at->format('M j, Y \a\t g:i A') }}
                                </p>
                                <p class="text-xs text-gray-500 dark:text-gray-400">
                                    {{ $contactMessage->created_at->diffForHumans() }}
                                </p>
                            </div>
                            
                            <div>
                                <label class="block text-sm font-medium text-gray-700 dark:text-gray-200">Status</label>
                                <p class="mt-1">
                                    @if($contactMessage->is_read)
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-200">
                                            Read
                                        </span>
                                    @else
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-red-100 text-red-800 dark:bg-red-900 dark:text-red-200">
                                            Unread
                                        </span>
                                    @endif
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- Danger Zone -->
                    <div class="bg-white dark:bg-gray-800 shadow-sm rounded-lg border border-red-200 dark:border-red-700">
                        <div class="px-4 sm:px-6 lg:px-8 py-5 border-b border-red-200 dark:border-red-700">
                            <h3 class="text-lg font-semibold text-red-900 dark:text-red-200">Danger Zone</h3>
                        </div>
                        <div class="px-4 sm:px-6 lg:px-8 py-6">
                            <form method="POST" action="{{ route('contact-messages.destroy', $contactMessage) }}" 
                                  onsubmit="return confirm('Are you sure you want to delete this message? This action cannot be undone.')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" 
                                        class="w-full inline-flex items-center justify-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">
                                    <svg class="h-4 w-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                    </svg>
                                    Delete Message
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
@endsection

@push('script')
<script>
    function markAsRead(messageId) {
        fetch(`/contact-messages/${messageId}/mark-read`, {
            method: 'PATCH',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                'Content-Type': 'application/json',
            },
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                location.reload();
            }
        })
        .catch(error => {
            console.error('Error:', error);
        });
    }
</script>
@endpush
