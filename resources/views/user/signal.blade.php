@extends('layouts.dasht')
@section('title', $title)
@section('content')
<!-- Alpine.js Component for Signal Subscriptions -->
<div x-data="signalManager()" class="min-h-screen bg-gray-50 dark:bg-gray-900 py-8">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        <!-- Header Section -->
        <div class="mb-8">
            <!-- Breadcrumb -->
            <nav class="flex items-center text-sm text-gray-500 dark:text-gray-400 mb-6" aria-label="Breadcrumb">
                <a href="{{ route('dashboard') }}" class="hover:text-blue-600 dark:hover:text-blue-400 transition-colors">
                    <i data-lucide="home" class="w-4 h-4 inline mr-1"></i>
                    Dashboard
                </a>
                <i data-lucide="chevron-right" class="w-4 h-4 mx-2"></i>
                <span class="text-gray-900 dark:text-gray-100 font-medium">Trading Signals</span>
            </nav>

            <!-- Page Title & Description -->
            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
                <div>
                    <h1 class="text-3xl font-bold text-gray-900 dark:text-white mb-2">
                        <i data-lucide="signal" class="w-8 h-8 inline mr-3 text-blue-600 dark:text-blue-400"></i>
                        Premium Trading Signals
                    </h1>
                    <p class="text-gray-600 dark:text-gray-400 text-lg">
                        Subscribe to professional trading signals and enhance your trading success
                    </p>
                </div>

                <!-- Stats Cards -->
                <div class="flex flex-col sm:flex-row gap-4">
                    <div class="bg-white dark:bg-gray-900 rounded-xl p-4 shadow-sm ring-1 ring-gray-200 dark:ring-gray-800">
                        <div class="flex items-center gap-3">
                            <div class="p-2 bg-blue-100 dark:bg-blue-900/30 rounded-lg">
                                <i data-lucide="trending-up" class="w-5 h-5 text-blue-600 dark:text-blue-400"></i>
                            </div>
                            <div>
                                <p class="text-2xl font-bold text-gray-900 dark:text-white">{{ count($signals) }}</p>
                                <p class="text-sm text-gray-600 dark:text-gray-400">Available Signals</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Signals Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6 mb-8">
            @forelse($signals as $signal)
            <!-- Signal Card -->
            <div class="group relative bg-white dark:bg-gray-900 rounded-2xl shadow-sm ring-1 ring-gray-200 dark:ring-gray-800 hover:shadow-lg hover:ring-blue-300 dark:hover:ring-blue-700 transition-all duration-300 overflow-hidden">

                <!-- Signal Header -->
                <div class="relative p-6 pb-4">
                    <!-- Premium Badge -->
                    <div class="absolute top-4 right-4">
                        <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-medium bg-gradient-to-r from-blue-500 to-purple-600 text-white">
                            <i data-lucide="star" class="w-3 h-3 mr-1"></i>
                            Premium
                        </span>
                    </div>

                    <!-- Signal Icon & Name -->
                    <div class="flex items-center gap-3 mb-4">
                        <div class="p-3 bg-blue-100 dark:bg-blue-900/30 rounded-xl group-hover:scale-110 transition-transform duration-300">
                            <i data-lucide="radio" class="w-6 h-6 text-blue-600 dark:text-blue-400"></i>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 dark:text-white">{{ $signal->name }}</h3>
                    </div>

                    <!-- Pricing -->
                    <div class="mb-6">
                        <div class="flex items-center gap-2 mb-2">
                            <span class="text-3xl font-bold text-gray-900 dark:text-white">{{ Auth::user()->currency }} {{ number_format($signal->price, 2) }}</span>
                            <span class="text-sm text-gray-500 dark:text-gray-400">/month</span>
                        </div>
                        <p class="text-sm text-gray-600 dark:text-gray-400">Professional trading signals subscription</p>
                    </div>

                    <!-- Features -->
                    <div class="space-y-3 mb-6">
                        <div class="flex items-center gap-3">
                            <div class="flex-shrink-0 w-5 h-5 bg-green-100 dark:bg-green-900/30 rounded-full flex items-center justify-center">
                                <i data-lucide="check" class="w-3 h-3 text-green-600 dark:text-green-400"></i>
                            </div>
                            <span class="text-sm text-gray-700 dark:text-gray-300">Success Rate: {{ $signal->increment_amount }}%</span>
                        </div>
                        <div class="flex items-center gap-3">
                            <div class="flex-shrink-0 w-5 h-5 bg-green-100 dark:bg-green-900/30 rounded-full flex items-center justify-center">
                                <i data-lucide="check" class="w-3 h-3 text-green-600 dark:text-green-400"></i>
                            </div>
                            <span class="text-sm text-gray-700 dark:text-gray-300">Real-time notifications</span>
                        </div>
                        <div class="flex items-center gap-3">
                            <div class="flex-shrink-0 w-5 h-5 bg-green-100 dark:bg-green-900/30 rounded-full flex items-center justify-center">
                                <i data-lucide="check" class="w-3 h-3 text-green-600 dark:text-green-400"></i>
                            </div>
                            <span class="text-sm text-gray-700 dark:text-gray-300">Expert analysis</span>
                        </div>
                        <div class="flex items-center gap-3">
                            <div class="flex-shrink-0 w-5 h-5 bg-green-100 dark:bg-green-900/30 rounded-full flex items-center justify-center">
                                <i data-lucide="check" class="w-3 h-3 text-green-600 dark:text-green-400"></i>
                            </div>
                            <span class="text-sm text-gray-700 dark:text-gray-300">24/7 support</span>
                        </div>
                    </div>
                </div>

                <!-- Action Button -->
                <div class="p-6 pt-0">
                    <button @click="openSubscriptionModal('{{ $signal->id }}', '{{ $signal->name }}', '{{ $signal->price }}')"
                            class="w-full bg-gradient-to-r from-blue-600 to-blue-700 hover:from-blue-700 hover:to-blue-800 text-white font-semibold py-3 px-6 rounded-xl transition-all duration-300 transform hover:scale-105 focus:outline-none focus:ring-4 focus:ring-blue-300 dark:focus:ring-blue-800">
                        <i data-lucide="plus-circle" class="w-5 h-5 inline mr-2"></i>
                        Subscribe Now
                    </button>
                </div>

                <!-- Hover Effect Overlay -->
                <div class="absolute inset-0 bg-gradient-to-t from-blue-600/5 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 pointer-events-none"></div>
            </div>
            @empty
            <!-- Empty State -->
            <div class="col-span-full text-center py-16">
            <div class="mx-auto w-24 h-24 bg-gray-100 dark:bg-gray-800 rounded-full flex items-center justify-center mb-6">
                <i data-lucide="signal" class="w-12 h-12 text-gray-400"></i>
            </div>
            <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-2">No Signals Available</h3>
            <p class="text-gray-600 dark:text-gray-400 mb-6 max-w-md mx-auto">
                There are currently no trading signals available. Please check back later for premium signal subscriptions.
            </p>
            <a href="{{ route('dashboard') }}"
               class="inline-flex items-center gap-2 bg-blue-600 hover:bg-blue-700 text-white font-semibold py-3 px-6 rounded-xl transition-colors">
                <i data-lucide="arrow-left" class="w-5 h-5"></i>
                Back to Dashboard
            </a>
        </div>
            @endforelse
        </div>

        <!-- Subscription Modal -->
        <div x-show="showModal"
             x-transition:enter="transition ease-out duration-300"
             x-transition:enter-start="opacity-0"
             x-transition:enter-end="opacity-100"
             x-transition:leave="transition ease-in duration-200"
             x-transition:leave-start="opacity-100"
             x-transition:leave-end="opacity-0"
             class="fixed inset-0 z-50 overflow-y-auto"
             aria-labelledby="modal-title"
             role="dialog"
             aria-modal="true"
             style="display: none;">

            <!-- Backdrop -->
            <div class="fixed inset-0 bg-gray-500 dark:bg-gray-900 bg-opacity-75 dark:bg-opacity-75 transition-opacity"
                 @click="closeModal()"></div>

            <!-- Modal Content -->
            <div class="flex min-h-full items-end sm:items-center justify-center p-4 text-center sm:p-0">
                <div x-show="showModal"
                     x-transition:enter="transition ease-out duration-300"
                     x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                     x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
                     x-transition:leave="transition ease-in duration-200"
                     x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
                     x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                     class="relative transform overflow-hidden rounded-2xl bg-white dark:bg-gray-900 px-6 pt-6 pb-6 text-left shadow-2xl transition-all sm:my-8 sm:w-full sm:max-w-lg sm:p-8">

                    <!-- Modal Header -->
                    <div class="flex items-center justify-between mb-6">
                        <div class="flex items-center gap-3">
                            <div class="p-2 bg-blue-100 dark:bg-blue-900/30 rounded-lg">
                                <i data-lucide="signal" class="w-6 h-6 text-blue-600 dark:text-blue-400"></i>
                            </div>
                            <div>
                                <h3 class="text-xl font-bold text-gray-900 dark:text-white">Subscribe to Signal</h3>
                                <p class="text-sm text-gray-600 dark:text-gray-400" x-text="selectedSignal.name"></p>
                            </div>
                        </div>
                        <button @click="closeModal()"
                                class="rounded-lg p-1 text-gray-400 hover:text-gray-600 dark:hover:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-800 transition-colors">
                            <i data-lucide="x" class="w-6 h-6"></i>
                        </button>
                    </div>

                    <!-- Subscription Form -->
                    <form method="POST" action="{{ route('newdeposit') }}" class="space-y-6">
                        @csrf
                        <input type="hidden" name="asset" :value="selectedSignal.name">

                        <!-- Payment Method Selection -->
                        <div>
                            <label class="block text-sm font-semibold text-gray-900 dark:text-white mb-3">
                                <i data-lucide="credit-card" class="w-4 h-4 inline mr-2"></i>
                                Payment Method
                            </label>
                            <select name="payment_method"
                                    required
                                    class="w-full px-4 py-3 bg-white dark:bg-gray-900 border border-gray-300 dark:border-gray-700 rounded-xl text-gray-900 dark:text-white placeholder-gray-500 dark:placeholder-gray-400 focus:ring-2 focus:ring-blue-500 dark:focus:ring-blue-400 focus:border-transparent transition-all">
                                <option value="" selected disabled>Choose Payment Method</option>
                                @forelse($dmethods as $method)
                                <option value="{{ $method->name }}">{{ $method->name }}</option>
                                @empty
                                <option disabled>No Payment Method available at the moment</option>
                                @endforelse
                            </select>
                        </div>

                        <!-- Amount Display -->
                        <div>
                            <label class="block text-sm font-semibold text-gray-900 dark:text-white mb-3">
                                <i data-lucide="dollar-sign" class="w-4 h-4 inline mr-2"></i>
                                Subscription Amount ({{ Auth::user()->currency }})
                            </label>
                            <div class="relative">
                                <input type="number"
                                       name="amount"
                                       :value="selectedSignal.price"
                                       readonly
                                       class="w-full px-4 py-3 bg-gray-50 dark:bg-gray-800 border border-gray-300 dark:border-gray-700 rounded-xl text-gray-900 dark:text-white font-semibold text-lg">
                                <div class="absolute inset-y-0 right-0 flex items-center pr-4">
                                    <span class="text-sm text-gray-500 dark:text-gray-400">/month</span>
                                </div>
                            </div>
                            <p class="text-sm text-gray-600 dark:text-gray-400 mt-2">
                                <i data-lucide="info" class="w-4 h-4 inline mr-1"></i>
                                Recurring monthly subscription
                            </p>
                        </div>

                        <!-- Action Buttons -->
                        <div class="flex gap-3 pt-4">
                            <button type="button"
                                    @click="closeModal()"
                                    class="flex-1 bg-gray-100 dark:bg-gray-800 text-gray-700 dark:text-gray-300 font-semibold py-3 px-6 rounded-xl hover:bg-gray-200 dark:hover:bg-gray-700 transition-colors">
                                Cancel
                            </button>
                            <button type="submit"
                                    class="flex-1 bg-gradient-to-r from-blue-600 to-blue-700 hover:from-blue-700 hover:to-blue-800 text-white font-semibold py-3 px-6 rounded-xl transition-all transform hover:scale-105 focus:outline-none focus:ring-4 focus:ring-blue-300 dark:focus:ring-blue-800">
                                <i data-lucide="check-circle" class="w-5 h-5 inline mr-2"></i>
                                Complete Subscription
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Alpine.js Script -->
<script>
function signalManager() {
    return {
        showModal: false,
        selectedSignal: {
            id: '',
            name: '',
            price: ''
        },

        openSubscriptionModal(id, name, price) {
            this.selectedSignal = { id, name, price };
            this.showModal = true;
            document.body.style.overflow = 'hidden';
        },

        closeModal() {
            this.showModal = false;
            document.body.style.overflow = 'auto';
        }
    }
}

// Initialize Lucide icons when page loads
document.addEventListener('DOMContentLoaded', function() {
    if (typeof lucide !== 'undefined') {
        lucide.createIcons();
    }
});
</script>

@endsection
