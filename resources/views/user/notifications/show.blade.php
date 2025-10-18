@extends('layouts.dasht')
@section('title', 'Bildirim Detayları')

@section('content')
<div class="container mx-auto px-4 py-6" x-data="{ showDeleteModal: false }">
    <!-- Back button and header -->
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between mb-6">
        <div class="flex items-center mb-4 sm:mb-0">
            <a href="{{ route('notifications') }}" class="mr-3 flex items-center text-gray-600 dark:text-gray-400 hover:text-primary-600 dark:hover:text-primary-400 transition-colors">
                <i data-lucide="arrow-left" class="w-5 h-5"></i>
            </a>
            <h1 class="text-2xl font-bold text-gray-900 dark:text-white">Notification Details</h1>
        </div>
        <div>
            <span class="px-3 py-1 rounded-full text-xs font-semibold
                {{ $notification->type === 'success' ? 'bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-300' :
                ($notification->type === 'warning' ? 'bg-yellow-100 text-yellow-800 dark:bg-yellow-900 dark:text-yellow-300' :
                ($notification->type === 'danger' ? 'bg-red-100 text-red-800 dark:bg-red-900 dark:text-red-300' :
                'bg-blue-100 text-blue-800 dark:bg-blue-900 dark:text-blue-300')) }}">
                {{ ucfirst($notification->type) }}
            </span>
        </div>
    </div>

    <!-- Notification Card with slight animation on load -->
    <div class="bg-white dark:bg-gray-800 rounded-xl shadow-md overflow-hidden transform transition-all duration-300 ease-in-out hover:shadow-lg border border-gray-200 dark:border-gray-700"
         x-data="{ show: false }"
         x-init="setTimeout(() => show = true, 100)"
         :class="{ 'translate-y-0 opacity-100': show, 'translate-y-4 opacity-0': !show }">

        <!-- Header with title -->
        <div class="px-6 py-4 border-b border-gray-200 dark:border-gray-700 bg-gray-50 dark:bg-gray-900/50">
            <h2 class="text-xl font-semibold text-gray-800 dark:text-white">{{ $notification->title }}</h2>
        </div>

        <!-- Content area with message -->
        <div class="px-6 py-5">
            <div class="prose dark:prose-invert max-w-none mb-6 text-gray-600 dark:text-gray-300">
                <p>{{ $notification->message }}</p>
            </div>

            <!-- Metadata with modern styling -->
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 text-sm mt-6">
                <div class="flex items-center text-gray-600 dark:text-gray-400">
                    <i data-lucide="calendar" class="w-4 h-4 mr-2"></i>
                    <span class="mr-1 font-medium">Date:</span> {{ $notification->created_at->format('F d, Y h:i A') }}
                </div>
                <div class="flex items-center text-gray-600 dark:text-gray-400 sm:justify-end">
                    <i data-lucide="{{ $notification->is_read ? 'check-circle' : 'circle' }}" class="w-4 h-4 mr-2 {{ $notification->is_read ? 'text-green-500 dark:text-green-400' : 'text-gray-500 dark:text-gray-400' }}"></i>
                    <span class="mr-1 font-medium">Status:</span>
                    <span class="{{ $notification->is_read ? 'text-green-500 dark:text-green-400' : 'text-gray-500 dark:text-gray-400' }}">
                        {{ $notification->is_read ? 'Read' : 'Unread' }}
                    </span>
                </div>
            </div>

            @if($notification->source_id && $notification->source_type)
                <div class="mt-8" x-data="{ isOpen: true }">
                    <div class="flex items-center justify-between cursor-pointer mb-2" @click="isOpen = !isOpen">
                        <h3 class="text-base font-semibold text-gray-800 dark:text-white flex items-center">
                            <i data-lucide="link" class="w-4 h-4 mr-2"></i>
                            Related Information
                        </h3>
                        <button class="text-gray-500 dark:text-gray-400 focus:outline-none">
                            <i x-show="!isOpen" data-lucide="chevron-down" class="w-5 h-5"></i>
                            <i x-show="isOpen" data-lucide="chevron-up" class="w-5 h-5"></i>
                        </button>
                    </div>

                    <div x-show="isOpen" x-transition:enter="transition ease-out duration-200"
                         x-transition:enter-start="opacity-0 transform -translate-y-2"
                         x-transition:enter-end="opacity-100 transform translate-y-0"
                         class="rounded-lg bg-gray-50 dark:bg-gray-900/30 mt-2">
                        @php
                            $sourceModel = null;
                            try {
                                if (class_exists($notification->source_type)) {
                                    $sourceModel = $notification->source_type::find($notification->source_id);
                                }
                            } catch (\Exception $e) {
                                // Model not found or error
                            }
                        @endphp

                        @if($sourceModel)
                            <div class="overflow-hidden">
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-2 p-4">
                                    @if($notification->source_type == 'App\\Models\\Deposit')
                                        <div class="flex justify-between p-3 bg-white dark:bg-gray-800 rounded-md">
                                            <span class="font-medium text-gray-700 dark:text-gray-300">Amount</span>
                                            <span class="text-primary-600 dark:text-primary-400 font-semibold">{{ $sourceModel->amount }}</span>
                                        </div>
                                        <div class="flex justify-between p-3 bg-white dark:bg-gray-800 rounded-md">
                                            <span class="font-medium text-gray-700 dark:text-gray-300">Status</span>
                                            <span class="capitalize {{ $sourceModel->status == 'approved' ? 'text-green-500 dark:text-green-400' : ($sourceModel->status == 'pending' ? 'text-yellow-500 dark:text-yellow-400' : 'text-red-500 dark:text-red-400') }}">
                                                {{ $sourceModel->status }}
                                            </span>
                                        </div>
                                        <div class="flex justify-between p-3 bg-white dark:bg-gray-800 rounded-md md:col-span-2">
                                            <span class="font-medium text-gray-700 dark:text-gray-300">Payment Mode</span>
                                            <span class="text-gray-600 dark:text-gray-400">{{ $sourceModel->payment_mode }}</span>
                                        </div>
                                    @elseif($notification->source_type == 'App\\Models\\Withdrawal')
                                        <div class="flex justify-between p-3 bg-white dark:bg-gray-800 rounded-md">
                                            <span class="font-medium text-gray-700 dark:text-gray-300">Amount</span>
                                            <span class="text-primary-600 dark:text-primary-400 font-semibold">{{ $sourceModel->amount }}</span>
                                        </div>
                                        <div class="flex justify-between p-3 bg-white dark:bg-gray-800 rounded-md">
                                            <span class="font-medium text-gray-700 dark:text-gray-300">Status</span>
                                            <span class="capitalize {{ $sourceModel->status == 'approved' ? 'text-green-500 dark:text-green-400' : ($sourceModel->status == 'pending' ? 'text-yellow-500 dark:text-yellow-400' : 'text-red-500 dark:text-red-400') }}">
                                                {{ $sourceModel->status }}
                                            </span>
                                        </div>
                                        <div class="flex justify-between p-3 bg-white dark:bg-gray-800 rounded-md md:col-span-2">
                                            <span class="font-medium text-gray-700 dark:text-gray-300">Payment Mode</span>
                                            <span class="text-gray-600 dark:text-gray-400">{{ $sourceModel->payment_mode }}</span>
                                        </div>
                                    @elseif($notification->source_type == 'App\\Models\\User_plans')
                                        <div class="flex justify-between p-3 bg-white dark:bg-gray-800 rounded-md">
                                            <span class="font-medium text-gray-700 dark:text-gray-300">Amount</span>
                                            <span class="text-primary-600 dark:text-primary-400 font-semibold">{{ $sourceModel->amount }}</span>
                                        </div>
                                        <div class="flex justify-between p-3 bg-white dark:bg-gray-800 rounded-md">
                                            <span class="font-medium text-gray-700 dark:text-gray-300">Status</span>
                                            <span class="{{ $sourceModel->active ? 'text-green-500 dark:text-green-400' : 'text-red-500 dark:text-red-400' }}">
                                                {{ $sourceModel->active ? 'Active' : 'Inactive' }}
                                            </span>
                                        </div>
                                        <div class="flex justify-between p-3 bg-white dark:bg-gray-800 rounded-md md:col-span-2">
                                            <span class="font-medium text-gray-700 dark:text-gray-300">Asset</span>
                                            <span class="text-gray-600 dark:text-gray-400">{{ $sourceModel->assets }}</span>
                                        </div>
                                        @elseif($notification->source_type == 'App\\Models\\UserBotInvestment')
                                        <div class="flex justify-between p-3 bg-white dark:bg-gray-800 rounded-md">
                                            <span class="font-medium text-gray-700 dark:text-gray-300">Amount</span>
                                            <span class="text-primary-600 dark:text-primary-400 font-semibold">{{ $sourceModel->investment_amount }}</span>
                                        </div>
                                        <div class="flex justify-between p-3 bg-white dark:bg-gray-800 rounded-md">
                                            <span class="font-medium text-gray-700 dark:text-gray-300">Status</span>
                                            <span class="capitalize {{ $sourceModel->status == 'active' ? 'text-green-500 dark:text-green-400' : ($sourceModel->status == 'pending' ? 'text-yellow-500 dark:text-yellow-400' : 'text-red-500 dark:text-red-400') }}">
                                                {{ $sourceModel->status }}
                                            </span>
                                        </div>
                                        <div class="flex justify-between p-3 bg-white dark:bg-gray-800 rounded-md md:col-span-2">
                                            <span class="font-medium text-gray-700 dark:text-gray-300">Current Balance</span>
                                            <span class="text-primary-600 dark:text-primary-400 font-semibold">{{ $sourceModel->current_balance }}</span>
                                        </div>
                                        @else
                                        <div class="p-4 bg-white dark:bg-gray-800 rounded-md col-span-2 text-center">
                                            <p class="text-gray-500 dark:text-gray-400">No detailed information available.</p>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        @else
                            <div class="p-4 text-center text-gray-500 dark:text-gray-400">
                                <i data-lucide="info" class="h-6 w-6 mx-auto mb-2"></i>
                                <p>No related information available.</p>
                            </div>
                        @endif
                    </div>
                </div>
            @endif

            <!-- Action buttons with animations and confirmation modal -->
            <div class="flex flex-wrap gap-3 mt-8">
                <a href="{{ route('notifications') }}" class="inline-flex items-center px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm text-sm font-medium bg-white dark:bg-gray-800 text-gray-700 dark:text-gray-300 hover:bg-gray-50 dark:hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary-500 dark:focus:ring-offset-gray-900 transition-all duration-200">
                    <i data-lucide="arrow-left" class="w-4 h-4 mr-2"></i>
                    Back to Notifications
                </a>

                {{-- @if(!$notification->is_read)
                    <form method="post" action="/mark-all-read" class="inline-block">
                        @csrf
                        <input type="hidden" name="notification_id" value="{{ $notification->id }}">
                        <button type="submit" class="inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium bg-primary-600 dark:bg-primary-700 text-white hover:bg-primary-700 dark:hover:bg-primary-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary-500 dark:focus:ring-offset-gray-900 transition-all duration-200">
                            <i data-lucide="check-circle" class="w-4 h-4 mr-2"></i>
                            Mark as Read
                        </button>
                    </form>
                @endif --}}

                <button @click="showDeleteModal = true" class="inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium bg-red-600 dark:bg-red-700 text-white hover:bg-red-700 dark:hover:bg-red-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 dark:focus:ring-offset-gray-900 transition-all duration-200">
                    <i data-lucide="trash-2" class="w-4 h-4 mr-2"></i>
                    Delete
                </button>
            </div>
        </div>
    </div>

    <!-- Delete confirmation modal -->
    <div x-show="showDeleteModal"
         x-transition:enter="transition ease-out duration-300"
         x-transition:enter-start="opacity-0"
         x-transition:enter-end="opacity-100"
         x-transition:leave="transition ease-in duration-200"
         x-transition:leave-start="opacity-100"
         x-transition:leave-end="opacity-0"
         class="fixed inset-0 z-30 flex items-center justify-center bg-black bg-opacity-50"
         @click.away="showDeleteModal = false">
        <div class="bg-white dark:bg-gray-800 rounded-lg p-6 max-w-md mx-auto shadow-xl transform transition-all duration-300"
             x-transition:enter="transition ease-out duration-300"
             x-transition:enter-start="opacity-0 transform scale-95"
             x-transition:enter-end="opacity-100 transform scale-100"
             x-transition:leave="transition ease-in duration-200"
             x-transition:leave-start="opacity-100 transform scale-100"
             x-transition:leave-end="opacity-0 transform scale-95">
            <div class="flex items-center justify-center w-12 h-12 mx-auto bg-red-100 dark:bg-red-900/30 rounded-full mb-4">
                <i data-lucide="alert-triangle" class="w-6 h-6 text-red-600 dark:text-red-400"></i>
            </div>
            <h3 class="text-lg font-medium text-center text-gray-900 dark:text-white mb-4">Delete Notification</h3>
            <p class="text-sm text-gray-500 dark:text-gray-400 text-center mb-6">
                Are you sure you want to delete this notification? This action cannot be undone.
            </p>
            <div class="flex justify-center gap-3">
                <button @click="showDeleteModal = false" class="px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-md text-sm font-medium text-gray-700 dark:text-gray-300 bg-white dark:bg-gray-800 hover:bg-gray-50 dark:hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary-500 dark:focus:ring-offset-gray-900">
                    Cancel
                </button>
                <form method="POST" action="/notifications/delete">
                    @csrf
                    @method('DELETE')
                    <input type="hidden" name="notification_id" value="{{ $notification->id }}">
                    <button type="submit" class="px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium bg-red-600 dark:bg-red-700 text-white hover:bg-red-700 dark:hover:bg-red-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 dark:focus:ring-offset-gray-900">
                        Delete
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Initialize Lucide icons -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        lucide.createIcons();
    });
</script>
@endsection
