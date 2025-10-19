@extends('layouts.dasht')
@section('title', $title)
@section('content')
<!-- Alpine.js Component for Signal Management -->
<div x-data="signalDashboard()" class="min-h-screen bg-gray-50 dark:bg-gray-900 py-8">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        <!-- Header Section -->
        <div class="mb-8">
            <!-- Breadcrumb -->
            <nav class="flex items-center text-sm text-gray-500 dark:text-gray-400 mb-6" aria-label="Breadcrumb">
                <a href="{{ route('dashboard') }}" class="hover:text-blue-600 dark:hover:text-blue-400 transition-colors">
                    <i data-lucide="home" class="w-4 h-4 inline mr-1"></i>
                    Панель управления
                </a>
                <i data-lucide="chevron-right" class="w-4 h-4 mx-2"></i>
                <span class="text-gray-900 dark:text-gray-100 font-medium">Мои торговые сигналы</span>
            </nav>

            <!-- Page Title & Signal Info -->
            <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-6">
                <div>
                    <h1 class="text-3xl font-bold text-gray-900 dark:text-white mb-2">
                        <i data-lucide="activity" class="w-8 h-8 inline mr-3 text-blue-600 dark:text-blue-400"></i>
                        Мои торговые сигналы
                    </h1>
                    <p class="text-gray-600 dark:text-gray-400 text-lg">
                        Отслеживайте и управляйте вашими активными подписками на торговые сигналы
                    </p>
                </div>

                <!-- Current Subscription Status -->
                <div class="bg-white dark:bg-gray-900 rounded-2xl p-6 shadow-sm ring-1 ring-gray-200 dark:ring-gray-800">
                    <div class="flex items-center gap-4">
                        <div class="p-3 bg-blue-100 dark:bg-blue-900/30 rounded-xl">
                            <i data-lucide="radio" class="w-6 h-6 text-blue-600 dark:text-blue-400"></i>
                        </div>
                        <div>
                            <p class="text-sm text-gray-600 dark:text-gray-400 mb-1">Текущий план сигналов</p>
                            <p class="text-2xl font-bold text-gray-900 dark:text-white">{{ Auth::user()->signals ?? 'Нет активного плана' }}</p>
                        </div>
                        @if(Auth::user()->signals)
                        <div class="ml-4">
                            <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-green-100 dark:bg-green-900/30 text-green-800 dark:text-green-300">
                                <div class="w-2 h-2 bg-green-500 rounded-full mr-2 animate-pulse"></div>
                                Активен
                            </span>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <!-- Alert Messages -->
        <div class="mb-6">
            <x-danger-alert />
            <x-success-alert />
            <x-alert />
        </div>

        <!-- Signal Statistics Cards -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
            <!-- Total Signals -->
            <div class="bg-white dark:bg-gray-900 rounded-2xl p-6 shadow-sm ring-1 ring-gray-200 dark:ring-gray-800">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm text-gray-600 dark:text-gray-400 mb-1">Всего сигналов</p>
                        <p class="text-3xl font-bold text-gray-900 dark:text-white">{{ count($signals) }}</p>
                    </div>
                    <div class="p-3 bg-blue-100 dark:bg-blue-900/30 rounded-xl">
                        <i data-lucide="signal" class="w-6 h-6 text-blue-600 dark:text-blue-400"></i>
                    </div>
                </div>
            </div>

            <!-- Active Signals -->
            <div class="bg-white dark:bg-gray-900 rounded-2xl p-6 shadow-sm ring-1 ring-gray-200 dark:ring-gray-800">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm text-gray-600 dark:text-gray-400 mb-1">Активные сигналы</p>
                        <p class="text-3xl font-bold text-green-600 dark:text-green-400">
                            {{ $signals->where('status', 'ongoing')->count() }}
                        </p>
                    </div>
                    <div class="p-3 bg-green-100 dark:bg-green-900/30 rounded-xl">
                        <i data-lucide="trending-up" class="w-6 h-6 text-green-600 dark:text-green-400"></i>
                    </div>
                </div>
            </div>

            <!-- Total Value -->
            <div class="bg-white dark:bg-gray-900 rounded-2xl p-6 shadow-sm ring-1 ring-gray-200 dark:ring-gray-800">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm text-gray-600 dark:text-gray-400 mb-1">Общая стоимость сделок</p>
                        <p class="text-3xl font-bold text-purple-600 dark:text-purple-400">
                            {{ Auth::user()->currency }}{{ number_format($signals->sum('amount'), 2) }}
                        </p>
                    </div>
                    <div class="p-3 bg-purple-100 dark:bg-purple-900/30 rounded-xl">
                        <i data-lucide="dollar-sign" class="w-6 h-6 text-purple-600 dark:text-purple-400"></i>
                    </div>
                </div>
            </div>
        </div>

        <!-- Filters and Search -->
        <div class="bg-white dark:bg-gray-900 rounded-2xl p-6 shadow-sm ring-1 ring-gray-200 dark:ring-gray-800 mb-8">
            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
                <h2 class="text-xl font-bold text-gray-900 dark:text-white">
                    <i data-lucide="filter" class="w-5 h-5 inline mr-2"></i>
                    Активность сигналов
                </h2>

                <!-- Filter Controls -->
                <div class="flex flex-col sm:flex-row gap-3">
                    <!-- Status Filter -->
                    <select x-model="statusFilter"
                            @change="filterSignals()"
                            class="px-4 py-2 bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-700 rounded-lg text-gray-900 dark:text-white focus:ring-2 focus:ring-blue-500 dark:focus:ring-blue-400">
                        <option value="">Все статусы</option>
                        <option value="ongoing">Активные</option>
                        <option value="closed">Закрытые</option>
                    </select>

                    <!-- Order Type Filter -->
                    <select x-model="orderFilter"
                            @change="filterSignals()"
                            class="px-4 py-2 bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-700 rounded-lg text-gray-900 dark:text-white focus:ring-2 focus:ring-blue-500 dark:focus:ring-blue-400">
                        <option value="">Все ордера</option>
                        <option value="Buy">Ордера на покупку</option>
                        <option value="Sell">Ордера на продажу</option>
                    </select>
                </div>
            </div>
        </div>

        <!-- Signals Table/Cards -->
        @forelse($signals as $signal)
        @if($loop->first)
        <!-- Desktop Table View -->
        <div class="hidden lg:block bg-white dark:bg-gray-900 rounded-2xl shadow-sm ring-1 ring-gray-200 dark:ring-gray-800 overflow-hidden mb-8">
            <div class="px-6 py-4 border-b border-gray-200 dark:border-gray-800">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Детали сигналов</h3>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead class="bg-gray-50 dark:bg-gray-800">
                        <tr>
                            <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Актив</th>
                            <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Тип ордера</th>
                            <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Сумма</th>
                            <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Кредитное плечо</th>
                            <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Статус</th>
                            <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Дата</th>
                            <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">План</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200 dark:divide-gray-800">
        @endif
                        <tr class="hover:bg-gray-50 dark:hover:bg-gray-800 transition-colors">
                            <!-- Asset -->
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center">
                                    <div class="p-2 bg-blue-100 dark:bg-blue-900/30 rounded-lg mr-3">
                                        <i data-lucide="trending-up" class="w-4 h-4 text-blue-600 dark:text-blue-400"></i>
                                    </div>
                                    <span class="text-sm font-medium text-gray-900 dark:text-white">{{ $signal->asset }}</span>
                                </div>
                            </td>

                            <!-- Order Type -->
                            <td class="px-6 py-4 whitespace-nowrap">
                                @if($signal->order_type == 'Buy')
                                <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-green-100 dark:bg-green-900/30 text-green-800 dark:text-green-300">
                                    <i data-lucide="arrow-up" class="w-4 h-4 mr-1"></i>
                                    {{ $signal->order_type }}
                                </span>
                                @else
                                <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-red-100 dark:bg-red-900/30 text-red-800 dark:text-red-300">
                                    <i data-lucide="arrow-down" class="w-4 h-4 mr-1"></i>
                                    {{ $signal->order_type }}
                                </span>
                                @endif
                            </td>

                            <!-- Amount -->
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 dark:text-white">
                                {{ Auth::user()->currency }}{{ number_format($signal->amount, 2) }}
                            </td>

                            <!-- Leverage -->
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="inline-flex items-center px-2 py-1 rounded-lg text-sm font-medium bg-blue-100 dark:bg-blue-900/30 text-blue-800 dark:text-blue-300">
                                    1:{{ $signal->leverage }}
                                </span>
                            </td>

                            <!-- Status -->
                            <td class="px-6 py-4 whitespace-nowrap">
                                @if($signal->status == 'ongoing')
                                <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-yellow-100 dark:bg-yellow-900/30 text-yellow-800 dark:text-yellow-300">
                                    <div class="w-2 h-2 bg-yellow-500 rounded-full mr-2 animate-pulse"></div>
                                    {{ ucfirst($signal->status) }}
                                </span>
                                @else
                                <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-gray-100 dark:bg-gray-800 text-gray-800 dark:text-gray-300">
                                    <i data-lucide="check-circle" class="w-4 h-4 mr-1"></i>
                                    {{ ucfirst($signal->status) }}
                                </span>
                                @endif
                            </td>

                            <!-- Date -->
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600 dark:text-gray-400">
                                {{ \Carbon\Carbon::parse($signal->created_at)->format('M d, Y H:i') }}
                            </td>

                            <!-- Plan -->
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="inline-flex items-center px-2 py-1 rounded-lg text-sm font-medium bg-purple-100 dark:bg-purple-900/30 text-purple-800 dark:text-purple-300">
                                    {{ Auth::user()->signals }}
                                </span>
                            </td>
                        </tr>
        @if($loop->last)
                    </tbody>
                </table>
            </div>
        </div>
        @endif

        <!-- Mobile Card View -->
        <div class="block lg:hidden mb-6">
            <div class="bg-white dark:bg-gray-900 rounded-2xl p-6 shadow-sm ring-1 ring-gray-200 dark:ring-gray-800">
                <!-- Asset Header -->
                <div class="flex items-center justify-between mb-4">
                    <div class="flex items-center gap-3">
                        <div class="p-2 bg-blue-100 dark:bg-blue-900/30 rounded-lg">
                            <i data-lucide="trending-up" class="w-5 h-5 text-blue-600 dark:text-blue-400"></i>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white">{{ $signal->asset }}</h3>
                    </div>

                    <!-- Status Badge -->
                    @if($signal->status == 'ongoing')
                    <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-yellow-100 dark:bg-yellow-900/30 text-yellow-800 dark:text-yellow-300">
                        <div class="w-2 h-2 bg-yellow-500 rounded-full mr-2 animate-pulse"></div>
                        Активный
                    </span>
                    @else
                    <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-gray-100 dark:bg-gray-800 text-gray-800 dark:text-gray-300">
                        <i data-lucide="check-circle" class="w-4 h-4 mr-1"></i>
                        Закрыт
                    </span>
                    @endif
                </div>

                <!-- Signal Details Grid -->
                <div class="grid grid-cols-2 gap-4">
                    <!-- Order Type -->
                    <div>
                        <p class="text-sm text-gray-600 dark:text-gray-400 mb-1">Тип ордера</p>
                        @if($signal->order_type == 'Buy')
                        <span class="inline-flex items-center px-2 py-1 rounded-lg text-sm font-medium bg-green-100 dark:bg-green-900/30 text-green-800 dark:text-green-300">
                            <i data-lucide="arrow-up" class="w-4 h-4 mr-1"></i>
                            {{ $signal->order_type }}
                        </span>
                        @else
                        <span class="inline-flex items-center px-2 py-1 rounded-lg text-sm font-medium bg-red-100 dark:bg-red-900/30 text-red-800 dark:text-red-300">
                            <i data-lucide="arrow-down" class="w-4 h-4 mr-1"></i>
                            {{ $signal->order_type }}
                        </span>
                        @endif
                    </div>

                    <!-- Amount -->
                    <div>
                        <p class="text-sm text-gray-600 dark:text-gray-400 mb-1">Сумма сделки</p>
                        <p class="text-lg font-bold text-gray-900 dark:text-white">{{ Auth::user()->currency }}{{ number_format($signal->amount, 2) }}</p>
                    </div>

                    <!-- Leverage -->
                    <div>
                        <p class="text-sm text-gray-600 dark:text-gray-400 mb-1">Кредитное плечо</p>
                        <span class="inline-flex items-center px-2 py-1 rounded-lg text-sm font-medium bg-blue-100 dark:bg-blue-900/30 text-blue-800 dark:text-blue-300">
                            1:{{ $signal->leverage }}
                        </span>
                    </div>

                    <!-- Date -->
                    <div>
                        <p class="text-sm text-gray-600 dark:text-gray-400 mb-1">Дата добавления</p>
                        <p class="text-sm text-gray-900 dark:text-white">{{ \Carbon\Carbon::parse($signal->created_at)->format('M d, Y') }}</p>
                    </div>
                </div>

                <!-- Signal Plan -->
                <div class="mt-4 pt-4 border-t border-gray-200 dark:border-gray-800">
                    <div class="flex items-center justify-between">
                        <span class="text-sm text-gray-600 dark:text-gray-400">План сигналов</span>
                        <span class="inline-flex items-center px-3 py-1 rounded-lg text-sm font-medium bg-purple-100 dark:bg-purple-900/30 text-purple-800 dark:text-purple-300">
                            {{ Auth::user()->signals }}
                        </span>
                    </div>
                </div>
            </div>
        </div>
        @empty
        <!-- Empty State -->
        <div class="text-center py-16">
            <div class="mx-auto w-24 h-24 bg-gray-100 dark:bg-gray-800 rounded-full flex items-center justify-center mb-6">
                <i data-lucide="signal" class="w-12 h-12 text-gray-400"></i>
            </div>
            <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-2">Нет торговых сигналов</h3>
            <p class="text-gray-600 dark:text-gray-400 mb-6 max-w-md mx-auto">
                У вас пока нет торговых сигналов. Подпишитесь на план сигналов, чтобы начать получать профессиональные торговые рекомендации.
            </p>
            <a href="{{ route('tsignals') }}"
               class="inline-flex items-center gap-2 bg-blue-600 hover:bg-blue-700 text-white font-semibold py-3 px-6 rounded-xl transition-colors">
                <i data-lucide="plus-circle" class="w-5 h-5"></i>
                Подписаться на сигналы
            </a>
        </div>
        @endforelse
    </div>
</div>

<!-- Alpine.js Script -->
<script>
function signalDashboard() {
    return {
        statusFilter: '',
        orderFilter: '',

        filterSignals() {
            // Логика фильтрации может быть реализована здесь при необходимости
            console.log('Фильтрация сигналов:', {
                status: this.statusFilter,
                order: this.orderFilter
            });
        }
    }
}

// Инициализация иконок Lucide при загрузке страницы
document.addEventListener('DOMContentLoaded', function() {
    if (typeof lucide !== 'undefined') {
        lucide.createIcons();
    }
});
</script>

@endsection
