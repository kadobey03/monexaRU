@extends('layouts.dasht')
@section('title', $title)
@section('content')
<!-- Alpine.js Component for Loan History -->
<div x-data="loanHistory()" class="min-h-screen bg-gray-50 dark:bg-gray-900 py-8">
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
                <span class="text-gray-900 dark:text-gray-100 font-medium">История займов</span>
            </nav>

            <!-- Page Title & Stats -->
            <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-6">
                <div>
                    <h1 class="text-3xl font-bold text-gray-900 dark:text-white mb-2">
                        <i data-lucide="history" class="w-8 h-8 inline mr-3 text-blue-600 dark:text-blue-400"></i>
                        История займов
                    </h1>
                    <p class="text-gray-600 dark:text-gray-400 text-lg">
                        Отслеживайте и управляйте всеми своими заявками на займ и их статусом
                    </p>
                </div>

                <!-- Quick Action -->
                <div class="flex gap-3">
                    <a href="{{ route('loan.view') }}"
                       class="inline-flex items-center gap-2 bg-gradient-to-r from-blue-600 to-blue-700 hover:from-blue-700 hover:to-blue-800 text-white font-semibold py-3 px-6 rounded-xl transition-all transform hover:scale-105">
                        <i data-lucide="plus-circle" class="w-5 h-5"></i>
                        Новая заявка
                    </a>
                </div>
            </div>
        </div>

        <!-- Alert Messages -->
        <div class="mb-6">
            <x-danger-alert />
            <x-success-alert />
        </div>

        <!-- Summary Statistics -->
        <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
            <!-- Total Applications -->
            <div class="bg-white dark:bg-gray-900 rounded-2xl p-6 shadow-sm ring-1 ring-gray-200 dark:ring-gray-800">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm text-gray-600 dark:text-gray-400 mb-1">Всего заявок</p>
                        <p class="text-3xl font-bold text-gray-900 dark:text-white">{{ count($loans) }}</p>
                    </div>
                    <div class="p-3 bg-blue-100 dark:bg-blue-900/30 rounded-xl">
                        <i data-lucide="file-text" class="w-6 h-6 text-blue-600 dark:text-blue-400"></i>
                    </div>
                </div>
            </div>

            <!-- Approved Loans -->
            <div class="bg-white dark:bg-gray-900 rounded-2xl p-6 shadow-sm ring-1 ring-gray-200 dark:ring-gray-800">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm text-gray-600 dark:text-gray-400 mb-1">Одобрено</p>
                        <p class="text-3xl font-bold text-green-600 dark:text-green-400">
                            {{ $loans->where('active', 'Processed')->count() }}
                        </p>
                    </div>
                    <div class="p-3 bg-green-100 dark:bg-green-900/30 rounded-xl">
                        <i data-lucide="check-circle" class="w-6 h-6 text-green-600 dark:text-green-400"></i>
                    </div>
                </div>
            </div>

            <!-- Pending -->
            <div class="bg-white dark:bg-gray-900 rounded-2xl p-6 shadow-sm ring-1 ring-gray-200 dark:ring-gray-800">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm text-gray-600 dark:text-gray-400 mb-1">В ожидании</p>
                        <p class="text-3xl font-bold text-yellow-600 dark:text-yellow-400">
                            {{ $loans->where('active', '!=', 'Processed')->count() }}
                        </p>
                    </div>
                    <div class="p-3 bg-yellow-100 dark:bg-yellow-900/30 rounded-xl">
                        <i data-lucide="clock" class="w-6 h-6 text-yellow-600 dark:text-yellow-400"></i>
                    </div>
                </div>
            </div>

            <!-- Total Value -->
            <div class="bg-white dark:bg-gray-900 rounded-2xl p-6 shadow-sm ring-1 ring-gray-200 dark:ring-gray-800">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm text-gray-600 dark:text-gray-400 mb-1">Общая сумма</p>
                        <p class="text-3xl font-bold text-purple-600 dark:text-purple-400">
                            {{ $settings->currency }}{{ number_format($loans->sum('amount'), 2) }}
                        </p>
                    </div>
                    <div class="p-3 bg-purple-100 dark:bg-purple-900/30 rounded-xl">
                        <i data-lucide="dollar-sign" class="w-6 h-6 text-purple-600 dark:text-purple-400"></i>
                    </div>
                </div>
            </div>
        </div>

        <!-- Filters -->
        <div class="bg-white dark:bg-gray-900 rounded-2xl p-6 shadow-sm ring-1 ring-gray-200 dark:ring-gray-800 mb-8">
            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
                <h2 class="text-xl font-bold text-gray-900 dark:text-white">
                    <i data-lucide="filter" class="w-5 h-5 inline mr-2"></i>
                    Заявки на займ
                </h2>

                <!-- Filter Controls -->
                <div class="flex flex-col sm:flex-row gap-3">
                    <!-- Status Filter -->
                    <select x-model="statusFilter"
                            @change="filterLoans()"
                            class="px-4 py-2 bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-700 rounded-lg text-gray-900 dark:text-white focus:ring-2 focus:ring-blue-500 dark:focus:ring-blue-400">
                        <option value="">Все статусы</option>
                        <option value="Processed">Одобрено</option>
                        <option value="Pending">В ожидании</option>
                        <option value="Under review">На рассмотрении</option>
                    </select>

                    <!-- Date Filter -->
                    <select x-model="dateFilter"
                            @change="filterLoans()"
                            class="px-4 py-2 bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-700 rounded-lg text-gray-900 dark:text-white focus:ring-2 focus:ring-blue-500 dark:focus:ring-blue-400">
                        <option value="">Все время</option>
                        <option value="today">Сегодня</option>
                        <option value="week">На этой неделе</option>
                        <option value="month">В этом месяце</option>
                        <option value="year">В этом году</option>
                    </select>
                </div>
            </div>
        </div>

        <!-- Loans Display -->
        @forelse($loans as $loan)
        @if($loop->first)
        <!-- Desktop Table View -->
        <div class="hidden lg:block bg-white dark:bg-gray-900 rounded-2xl shadow-sm ring-1 ring-gray-200 dark:ring-gray-800 overflow-hidden mb-8">
            <div class="px-6 py-4 border-b border-gray-200 dark:border-gray-800">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Детали заявки</h3>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead class="bg-gray-50 dark:bg-gray-800">
                        <tr>
                            <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Сумма</th>
                            <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Цель</th>
                            <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Срок</th>
                            <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Статус</th>
                            <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Дата подачи</th>
                            <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Действия</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200 dark:divide-gray-800">
        @endif
                        <tr class="hover:bg-gray-50 dark:hover:bg-gray-800 transition-colors">
                            <!-- Amount -->
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center">
                                    <div class="p-2 bg-green-100 dark:bg-green-900/30 rounded-lg mr-3">
                                        <i data-lucide="dollar-sign" class="w-4 h-4 text-green-600 dark:text-green-400"></i>
                                    </div>
                                    <span class="text-lg font-bold text-gray-900 dark:text-white">
                                        {{ $settings->currency }}{{ number_format($loan->amount, 2) }}
                                    </span>
                                </div>
                            </td>

                            <!-- Purpose -->
                            <td class="px-6 py-4">
                                <div class="max-w-xs">
                                    <p class="text-sm font-medium text-gray-900 dark:text-white truncate" title="{{ $loan->purpose }}">
                                        {{ Str::limit($loan->purpose, 50) }}
                                    </p>
                                </div>
                            </td>

                            <!-- Duration -->
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="inline-flex items-center px-3 py-1 rounded-lg text-sm font-medium bg-blue-100 dark:bg-blue-900/30 text-blue-800 dark:text-blue-300">
                                    <i data-lucide="calendar" class="w-4 h-4 mr-1"></i>
                                    {{ $loan->duration }} месяцев
                                </span>
                            </td>

                            <!-- Status -->
                            <td class="px-6 py-4 whitespace-nowrap">
                                @if($loan->active == 'Processed')
                                <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-green-100 dark:bg-green-900/30 text-green-800 dark:text-green-300">
                                    <div class="w-2 h-2 bg-green-500 rounded-full mr-2"></div>
                                    Одобрено
                                </span>
                                @elseif($loan->active == 'Under review')
                                <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-blue-100 dark:bg-blue-900/30 text-blue-800 dark:text-blue-300">
                                    <div class="w-2 h-2 bg-blue-500 rounded-full mr-2 animate-pulse"></div>
                                    На рассмотрении
                                </span>
                                @else
                                <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-yellow-100 dark:bg-yellow-900/30 text-yellow-800 dark:text-yellow-300">
                                    <div class="w-2 h-2 bg-yellow-500 rounded-full mr-2 animate-pulse"></div>
                                    {{ $loan->active }}
                                </span>
                                @endif
                            </td>

                            <!-- Date -->
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600 dark:text-gray-400">
                                <div class="flex flex-col">
                                    <span>{{ \Carbon\Carbon::parse($loan->created_at)->format('M d, Y') }}</span>
                                    <span class="text-xs text-gray-500">{{ \Carbon\Carbon::parse($loan->created_at)->format('H:i A') }}</span>
                                </div>
                            </td>

                            <!-- Actions -->
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center gap-2">
                                    <button @click="viewLoanDetails('{{ $loan->id }}')"
                                            class="inline-flex items-center px-3 py-1 bg-blue-100 dark:bg-blue-900/30 text-blue-700 dark:text-blue-300 text-sm font-medium rounded-lg hover:bg-blue-200 dark:hover:bg-blue-900/50 transition-colors">
                                        <i data-lucide="eye" class="w-4 h-4 mr-1"></i>
                                        Просмотр
                                    </button>
                                    @if($loan->active != 'Processed')
                                    <button class="inline-flex items-center px-3 py-1 bg-gray-100 dark:bg-gray-800 text-gray-700 dark:text-gray-300 text-sm font-medium rounded-lg hover:bg-gray-200 dark:hover:bg-gray-700 transition-colors">
                                        <i data-lucide="edit" class="w-4 h-4 mr-1"></i>
                                        Изменить
                                    </button>
                                    @endif
                                </div>
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
                <!-- Header -->
                <div class="flex items-center justify-between mb-4">
                    <div class="flex items-center gap-3">
                        <div class="p-2 bg-green-100 dark:bg-green-900/30 rounded-lg">
                            <i data-lucide="dollar-sign" class="w-5 h-5 text-green-600 dark:text-green-400"></i>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 dark:text-white">
                            {{ $settings->currency }}{{ number_format($loan->amount, 2) }}
                        </h3>
                    </div>

                    <!-- Status Badge -->
                    @if($loan->active == 'Processed')
                    <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-green-100 dark:bg-green-900/30 text-green-800 dark:text-green-300">
                        <div class="w-2 h-2 bg-green-500 rounded-full mr-2"></div>
                        Одобрено
                    </span>
                    @else
                    <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-yellow-100 dark:bg-yellow-900/30 text-yellow-800 dark:text-yellow-300">
                        <div class="w-2 h-2 bg-yellow-500 rounded-full mr-2 animate-pulse"></div>
                        {{ $loan->active }}
                    </span>
                    @endif
                </div>

                <!-- Loan Details -->
                <div class="space-y-3 mb-4">
                    <div>
                        <p class="text-sm text-gray-600 dark:text-gray-400 mb-1">Цель</p>
                        <p class="text-sm text-gray-900 dark:text-white">{{ Str::limit($loan->purpose, 100) }}</p>
                    </div>

                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <p class="text-sm text-gray-600 dark:text-gray-400 mb-1">Срок</p>
                            <span class="inline-flex items-center px-2 py-1 rounded-lg text-sm font-medium bg-blue-100 dark:bg-blue-900/30 text-blue-800 dark:text-blue-300">
                                {{ $loan->duration }} месяцев
                            </span>
                        </div>

                        <div>
                            <p class="text-sm text-gray-600 dark:text-gray-400 mb-1">Дата подачи</p>
                            <p class="text-sm text-gray-900 dark:text-white">{{ \Carbon\Carbon::parse($loan->created_at)->format('M d, Y') }}</p>
                        </div>
                    </div>
                </div>

                <!-- Actions -->
                <div class="flex gap-2 pt-4 border-t border-gray-200 dark:border-gray-800">
                    <button @click="viewLoanDetails('{{ $loan->id }}')"
                            class="flex-1 inline-flex items-center justify-center gap-2 bg-blue-600 hover:bg-blue-700 text-white font-medium py-2 px-4 rounded-lg transition-colors">
                        <i data-lucide="eye" class="w-4 h-4"></i>
                        Подробности
                    </button>
                    @if($loan->active != 'Processed')
                    <button class="inline-flex items-center justify-center gap-2 bg-gray-100 dark:bg-gray-800 text-gray-700 dark:text-gray-300 font-medium py-2 px-4 rounded-lg hover:bg-gray-200 dark:hover:bg-gray-700 transition-colors">
                        <i data-lucide="edit" class="w-4 h-4"></i>
                        Изменить
                    </button>
                    @endif
                </div>
            </div>
        </div>
        @empty
        <!-- Empty State -->
        <div class="text-center py-16">
            <div class="mx-auto w-24 h-24 bg-gray-100 dark:bg-gray-800 rounded-full flex items-center justify-center mb-6">
                <i data-lucide="file-text" class="w-12 h-12 text-gray-400"></i>
            </div>
            <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-2">Нет заявок на займ</h3>
            <p class="text-gray-600 dark:text-gray-400 mb-6 max-w-md mx-auto">
                Вы еще не подавали ни одной заявки на займ. Начните с подачи заявки на займ, который соответствует вашим потребностям.
            </p>
            <a href="{{ route('loan.view') }}"
               class="inline-flex items-center gap-2 bg-blue-600 hover:bg-blue-700 text-white font-semibold py-3 px-6 rounded-xl transition-colors">
                <i data-lucide="plus-circle" class="w-5 h-5"></i>
                Подать заявку на займ
            </a>
        </div>
        @endforelse

        <!-- Loan Details Modal -->
        <div x-show="showModal"
             x-transition:enter="transition ease-out duration-300"
             x-transition:enter-start="opacity-0"
             x-transition:enter-end="opacity-100"
             x-transition:leave="transition ease-in duration-200"
             x-transition:leave-start="opacity-100"
             x-transition:leave-end="opacity-0"
             class="fixed inset-0 z-50 overflow-y-auto"
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
                        <h3 class="text-xl font-bold text-gray-900 dark:text-white">Детали заявки на займ</h3>
                        <button @click="closeModal()"
                                class="rounded-lg p-1 text-gray-400 hover:text-gray-600 dark:hover:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-800 transition-colors">
                            <i data-lucide="x" class="w-6 h-6"></i>
                        </button>
                    </div>

                    <!-- Modal content will be populated by JavaScript -->
                    <div id="modalContent">
                        <p class="text-gray-600 dark:text-gray-400">Загрузка деталей займа...</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Alpine.js Script -->
<script>
function loanHistory() {
    return {
        statusFilter: '',
        dateFilter: '',
        showModal: false,

        filterLoans() {
            // Логика фильтрации может быть реализована здесь при необходимости
            console.log('Фильтрация займов:', {
                status: this.statusFilter,
                date: this.dateFilter
            });
        },

        viewLoanDetails(loanId) {
            this.showModal = true;
            document.body.style.overflow = 'hidden';
            // Здесь можно загрузить детали займа через AJAX или показать существующие данные
        },

        closeModal() {
            this.showModal = false;
            document.body.style.overflow = 'auto';
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
