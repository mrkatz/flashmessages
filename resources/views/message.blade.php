<div class="absolute space-y-5 {{ config('flash.location', 'bottom-5 right-5') }}">
    @if (session('flash_notifications'))
        @foreach (session('flash_notifications') as $notification)
            <div x-data="{ show: true }" x-init="@if ($notification['timeout'] > 0) setTimeout(() => show = false, {{ $notification['timeout'] }}); @endif" x-show="show"
                class="p-4 border-t-2 rounded-lg bg-teal-50 dark:bg-teal-800/30" role="alert">
                <div class="flex items-center justify-between">
                    <div class="flex items-center">

                        @if ($notification['type'] === 'success')
                            <span
                                class="inline-flex items-center justify-center text-teal-800 bg-teal-200 border-4 border-teal-100 rounded-full size-8 dark:border-teal-900 dark:bg-teal-800 dark:text-teal-400">
                                <svg class="flex-shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24"
                                    height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M12 22c5.523 0 10-4.477 10-10S17.523 2 12 2 2 6.477 2 12s4.477 10 10 10z">
                                    </path>
                                    <path d="m9 12 2 2 4-4"></path>
                                </svg>
                            </span>
                        @elseif ($notification['type'] === 'error')
                            <span
                                class="inline-flex items-center justify-center text-red-800 bg-red-200 border-4 border-red-100 rounded-full size-8 dark:border-red-900 dark:bg-red-800 dark:text-red-400">
                                <svg class="flex-shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24"
                                    height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <circle cx="12" cy="12" r="10"></circle>
                                    <line x1="12" y1="8" x2="12" y2="12"></line>
                                    <line x1="12" y1="16" x2="12.01" y2="16"></line>
                                </svg>
                            </span>
                        @elseif ($notification['type'] === 'warning')
                            <span
                                class="inline-flex items-center justify-center text-yellow-800 bg-yellow-200 border-4 border-yellow-100 rounded-full size-8 dark:border-yellow-900 dark:bg-yellow-800 dark:text-yellow-400">
                                <svg class="flex-shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24"
                                    height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path
                                        d="M10.29 3.86L1.82 18a1.25 1.25 0 0 0 1.07 1.86h18.22a1.25 1.25 0 0 0 1.07-1.86l-8.47-14.14a1.25 1.25 0 0 0-2.14 0zM12 9v4">
                                    </path>
                                    <path d="M12 17h.01"></path>
                                </svg>
                            </span>
                        @elseif ($notification['type'] === 'info')
                            <span
                                class="inline-flex items-center justify-center text-blue-800 bg-blue-200 border-4 border-blue-100 rounded-full size-8 dark:border-blue-900 dark:bg-blue-800 dark:text-blue-400">
                                <svg class="flex-shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24"
                                    height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <circle cx="12" cy="12" r="10"></circle>
                                    <line x1="12" y1="16" x2="12" y2="16"></line>
                                    <line x1="12" y1="12" x2="12" y2="12"></line>
                                </svg>
                            </span>
                        @endif

                        <div class="ms-3">
                            <p class="text-sm text-gray-700 dark:text-gray-400">
                                {{ $notification['message'] }}
                            </p>
                        </div>
                    </div>

                    <button @click="show = false"
                        class="text-gray-500 ms-3 dark:text-gray-300 hover:text-gray-700 dark:hover:text-gray-100 focus:outline-none">
                        <span class="sr-only">Dismiss</span>
                        &times;
                    </button>

                </div>
            </div>
        @endforeach
    @endif
</div>
@php
    session()->forget('flash_notifications');
@endphp
