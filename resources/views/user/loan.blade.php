@extends('layouts.dasht')
@section('title', $title)
@section('content')
<!-- Alpine.js Component for Loan Application -->
<div x-data="loanApplication()" class="min-h-screen bg-gray-50 dark:bg-gray-900 py-8">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">

        <!-- Header Section -->
        <div class="mb-8">
            <!-- Breadcrumb -->
            <nav class="flex items-center text-sm text-gray-500 dark:text-gray-400 mb-6" aria-label="Breadcrumb">
                <a href="{{ route('dashboard') }}" class="hover:text-blue-600 dark:hover:text-blue-400 transition-colors">
                    <i data-lucide="home" class="w-4 h-4 inline mr-1"></i>
                    Панель управления
                </a>
                <i data-lucide="chevron-right" class="w-4 h-4 mx-2"></i>
                <span class="text-gray-900 dark:text-gray-100 font-medium">Заявка на кредит</span>
            </nav>

            <!-- Page Title -->
            <div class="text-center mb-8">
                <h1 class="text-3xl font-bold text-gray-900 dark:text-white mb-2">
                    <i data-lucide="credit-card" class="w-8 h-8 inline mr-3 text-blue-600 dark:text-blue-400"></i>
                    Заявка на кредит
                </h1>
                <p class="text-gray-600 dark:text-gray-400 text-lg max-w-2xl mx-auto">
                    Подавайте заявки на различные кредитные продукты с конкурентными ставками и гибкими условиями
                </p>
            </div>
        </div>

        <!-- Alert Messages -->
        <div class="mb-6">
            <x-danger-alert/>
            <x-success-alert/>
            <x-error-alert/>
        </div>

        <!-- Loan Benefits Section -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
            <div class="bg-white dark:bg-gray-900 rounded-2xl p-6 shadow-sm ring-1 ring-gray-200 dark:ring-gray-800 text-center">
                <div class="p-3 bg-green-100 dark:bg-green-900/30 rounded-xl w-fit mx-auto mb-4">
                    <i data-lucide="percent" class="w-6 h-6 text-green-600 dark:text-green-400"></i>
                </div>
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-2">Конкурентные ставки</h3>
                <p class="text-gray-600 dark:text-gray-400">Низкие процентные ставки от 5.5% годовых</p>
            </div>

            <div class="bg-white dark:bg-gray-900 rounded-2xl p-6 shadow-sm ring-1 ring-gray-200 dark:ring-gray-800 text-center">
                <div class="p-3 bg-blue-100 dark:bg-blue-900/30 rounded-xl w-fit mx-auto mb-4">
                    <i data-lucide="clock" class="w-6 h-6 text-blue-600 dark:text-blue-400"></i>
                </div>
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-2">Быстрое одобрение</h3>
                <p class="text-gray-600 dark:text-gray-400">Получите одобрение в течение 24-48 часов</p>
            </div>

            <div class="bg-white dark:bg-gray-900 rounded-2xl p-6 shadow-sm ring-1 ring-gray-200 dark:ring-gray-800 text-center">
                <div class="p-3 bg-purple-100 dark:bg-purple-900/30 rounded-xl w-fit mx-auto mb-4">
                    <i data-lucide="shield-check" class="w-6 h-6 text-purple-600 dark:text-purple-400"></i>
                </div>
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-2">Безопасный процесс</h3>
                <p class="text-gray-600 dark:text-gray-400">Банковский уровень безопасности и шифрования</p>
            </div>
        </div>

        <!-- Application Form -->
        <div class="bg-white dark:bg-gray-900 rounded-2xl shadow-sm ring-1 ring-gray-200 dark:ring-gray-800 overflow-hidden">
            <!-- Form Header -->
            <div class="bg-gradient-to-r from-blue-600 to-blue-700 px-6 py-4">
                <h2 class="text-xl font-bold text-white flex items-center">
                    <i data-lucide="file-text" class="w-6 h-6 mr-2"></i>
                    Форма заявки на кредит
                </h2>
            </div>

            <!-- Form Content -->
            <form action="{{ route('loan.store') }}" method="post" class="p-6 space-y-6" @submit="handleSubmit">
                @csrf

                <!-- Loan Amount Section -->
                <div class="space-y-4">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white border-b border-gray-200 dark:border-gray-800 pb-2">
                        <i data-lucide="dollar-sign" class="w-5 h-5 inline mr-2 text-blue-600 dark:text-blue-400"></i>
                        Детали кредита
                    </h3>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Loan Amount -->
                        <div>
                            <label class="block text-sm font-semibold text-gray-900 dark:text-white mb-2">
                                Сумма кредита ({{ $settings->currency }})
                                <span class="text-red-500">*</span>
                            </label>
                            <div class="relative">
                                <span class="absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-500 dark:text-gray-400">{{ $settings->currency }}</span>
                                <input type="number"
                                       name="amount"
                                       x-model="loanAmount"
                                       @input="calculateMonthlyPayment()"
                                       required
                                       min="1000"
                                       step="100"
                                       class="w-full pl-12 pr-4 py-3 bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-700 rounded-xl text-gray-900 dark:text-white placeholder-gray-500 dark:placeholder-gray-400 focus:ring-2 focus:ring-blue-500 dark:focus:ring-blue-400 focus:border-transparent transition-all"
                                       placeholder="Введите сумму кредита" />
                            </div>
                            <p class="text-sm text-gray-600 dark:text-gray-400 mt-1">Минимальная сумма: {{ $settings->currency }}1,000</p>
                        </div>

                        <!-- Duration -->
                        <div>
                            <label class="block text-sm font-semibold text-gray-900 dark:text-white mb-2">
                                Срок кредита
                                <span class="text-red-500">*</span>
                            </label>
                            <select name="duration"
                                    x-model="duration"
                                    @change="calculateMonthlyPayment()"
                                    required
                                    class="w-full px-4 py-3 bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-700 rounded-xl text-gray-900 dark:text-white focus:ring-2 focus:ring-blue-500 dark:focus:ring-blue-400 focus:border-transparent transition-all">
                                <option value="">Выберите срок</option>
                                <option value="6">6 месяцев</option>
                                <option value="12">12 месяцев (1 год)</option>
                                <option value="24">24 месяца (2 года)</option>
                                <option value="36">36 месяцев (3 года)</option>
                                <option value="48">48 месяцев (4 года)</option>
                                <option value="60">60 месяцев (5 лет)</option>
                            </select>
                        </div>
                    </div>

                    <!-- Monthly Payment Calculator -->
                    <div x-show="monthlyPayment > 0"
                         x-transition
                         class="bg-blue-50 dark:bg-blue-900/20 rounded-xl p-4 border border-blue-200 dark:border-blue-800">
                        <h4 class="text-sm font-semibold text-blue-900 dark:text-blue-300 mb-2">
                            <i data-lucide="calculator" class="w-4 h-4 inline mr-1"></i>
                            Предполагаемый ежемесячный платеж
                        </h4>
                        <p class="text-2xl font-bold text-blue-600 dark:text-blue-400" x-text="`{{ $settings->currency }}${monthlyPayment.toFixed(2)}`"></p>
                        <p class="text-sm text-blue-700 dark:text-blue-300">На основе 8.5% годовых (ставки могут варьироваться)</p>
                    </div>
                </div>

                <!-- Credit Facility Section -->
                <div class="space-y-4">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white border-b border-gray-200 dark:border-gray-800 pb-2">
                        <i data-lucide="building-2" class="w-5 h-5 inline mr-2 text-blue-600 dark:text-blue-400"></i>
                        Тип кредитного продукта
                    </h3>

                    <div>
                        <label class="block text-sm font-semibold text-gray-900 dark:text-white mb-2">
                            Выберите кредитный продукт
                            <span class="text-red-500">*</span>
                        </label>
                        <select name="facility"
                                required
                                class="w-full px-4 py-3 bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-700 rounded-xl text-gray-900 dark:text-white focus:ring-2 focus:ring-blue-500 dark:focus:ring-blue-400 focus:border-transparent transition-all">
                            <option value="">Выберите кредит/кредитный продукт</option>
                            <option value="Personal Home Loans">🏠 Персональные жилищные кредиты</option>
                            <option value="Joint Mortgage">🏘️ Совместная ипотека</option>
                            <option value="Automobile Loans">🚗 Автокредиты</option>
                            <option value="Salary loans">💼 Зарплатные кредиты</option>
                            <option value="Secured Overdraft">🔒 Обеспеченный овердрафт</option>
                            <option value="Contract Finance">📋 Контракт финансирование</option>
                            <option value="Secured Term Loans">🏦 Обеспеченные срочные кредиты</option>
                            <option value="StartUp/Products Financing">🚀 Финансирование стартапов/продуктов</option>
                            <option value="Local Purchase Orders Finance">📦 Финансирование местных заказов на покупку</option>
                            <option value="Operational Vehicles">🚚 Операционные транспортные средства</option>
                            <option value="Revenue Loans and Overdraft">💰 Доходные кредиты и овердрафт</option>
                            <option value="Retail TOD">🏪 Розничный TOD</option>
                            <option value="Commercial Mortgage">🏢 Коммерческая ипотека</option>
                            <option value="Office Equipment">💻 Офисное оборудование</option>
                            <option value="Health Finance">🏥 Медицинское финансирование</option>
                        </select>
                    </div>
                </div>

                <!-- Personal Information Section -->
                <div class="space-y-4">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white border-b border-gray-200 dark:border-gray-800 pb-2">
                        <i data-lucide="user" class="w-5 h-5 inline mr-2 text-blue-600 dark:text-blue-400"></i>
                        Финансовая информация
                    </h3>

                    <div>
                        <label class="block text-sm font-semibold text-gray-900 dark:text-white mb-2">
                            Ежемесячный чистый доход
                            <span class="text-red-500">*</span>
                        </label>
                        <select name="income"
                                required
                                class="w-full px-4 py-3 bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-700 rounded-xl text-gray-900 dark:text-white focus:ring-2 focus:ring-blue-500 dark:focus:ring-blue-400 focus:border-transparent transition-all">
                            <option value="">Выберите диапазон доходов</option>
                            <option value="2,000-5,000">{{ $settings->currency }}2,000 - {{ $settings->currency }}5,000</option>
                            <option value="6,000-10,000">{{ $settings->currency }}6,000 - {{ $settings->currency }}10,000</option>
                            <option value="11,000-20,000">{{ $settings->currency }}11,000 - {{ $settings->currency }}20,000</option>
                            <option value="21,000-50,000">{{ $settings->currency }}21,000 - {{ $settings->currency }}50,000</option>
                            <option value="51,000-100,000">{{ $settings->currency }}51,000 - {{ $settings->currency }}100,000</option>
                            <option value="100,000 and above">{{ $settings->currency }}100,000 и выше</option>
                        </select>
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-gray-900 dark:text-white mb-2">
                            Цель кредита
                            <span class="text-red-500">*</span>
                        </label>
                        <textarea name="purpose"
                                  required
                                  rows="4"
                                  class="w-full px-4 py-3 bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-700 rounded-xl text-gray-900 dark:text-white placeholder-gray-500 dark:placeholder-gray-400 focus:ring-2 focus:ring-blue-500 dark:focus:ring-blue-400 focus:border-transparent transition-all resize-none"
                                  placeholder="Пожалуйста, предоставьте подробную информацию о цели данного кредита..."></textarea>
                        <p class="text-sm text-gray-600 dark:text-gray-400 mt-1">Минимум 50 символов</p>
                    </div>
                </div>

                <!-- Terms and Conditions -->
                <div class="bg-gray-50 dark:bg-gray-800 rounded-xl p-6">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">
                        <i data-lucide="file-check" class="w-5 h-5 inline mr-2 text-blue-600 dark:text-blue-400"></i>
                        Условия и положения
                    </h3>

                    <div class="space-y-3 text-sm text-gray-600 dark:text-gray-400">
                        <div class="flex items-start gap-3">
                            <i data-lucide="check-circle" class="w-5 h-5 text-green-600 dark:text-green-400 flex-shrink-0 mt-0.5"></i>
                            <p>Процентные ставки подлежат кредитной оценке и могут варьироваться в зависимости от типа кредита и срока.</p>
                        </div>
                        <div class="flex items-start gap-3">
                            <i data-lucide="check-circle" class="w-5 h-5 text-green-600 dark:text-green-400 flex-shrink-0 mt-0.5"></i>
                            <p>Все заявки на кредит подлежат одобрению и верификации предоставленной информации.</p>
                        </div>
                        <div class="flex items-start gap-3">
                            <i data-lucide="check-circle" class="w-5 h-5 text-green-600 dark:text-green-400 flex-shrink-0 mt-0.5"></i>
                            <p>Доступны варианты досрочного погашения с возможным снижением комиссий.</p>
                        </div>
                    </div>

                    <div class="mt-4 flex items-center gap-3">
                        <input type="checkbox"
                               id="terms"
                               x-model="acceptedTerms"
                               required
                               class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                        <label for="terms" class="text-sm text-gray-900 dark:text-white">
                            Я принимаю <a href="#" class="text-blue-600 dark:text-blue-400 hover:underline">условия и положения</a>
                            <span class="text-red-500">*</span>
                        </label>
                    </div>
                </div>

                <!-- Submit Button -->
                <div class="pt-6">
                    <button type="submit"
                            :disabled="!acceptedTerms"
                            :class="acceptedTerms ? 'bg-gradient-to-r from-blue-600 to-blue-700 hover:from-blue-700 hover:to-blue-800 transform hover:scale-105' : 'bg-gray-400 cursor-not-allowed'"
                            class="w-full text-white font-semibold py-4 px-6 rounded-xl transition-all duration-300 focus:outline-none focus:ring-4 focus:ring-blue-300 dark:focus:ring-blue-800 flex items-center justify-center gap-2">
                        <i data-lucide="send" class="w-5 h-5"></i>
                        <span>Подать заявку на кредит</span>
                    </button>

                    <p class="text-center text-sm text-gray-600 dark:text-gray-400 mt-4">
                        <i data-lucide="shield" class="w-4 h-4 inline mr-1"></i>
                        Ваша информация зашифрована и защищена. Мы рассмотрим вашу заявку в течение 24-48 часов.
                    </p>
                </div>
            </form>
        </div>

        <!-- Additional Information -->
        <div class="mt-8 text-center">
            <p class="text-gray-600 dark:text-gray-400 mb-4">Нужна помощь с заявкой?</p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="{{ route('support') }}"
                   class="inline-flex items-center gap-2 bg-white dark:bg-gray-900 text-gray-700 dark:text-gray-300 font-semibold py-2 px-4 rounded-lg border border-gray-300 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-800 transition-colors">
                    <i data-lucide="headphones" class="w-4 h-4"></i>
                    Связаться с поддержкой
                </a>
                <a href="#"
                   class="inline-flex items-center gap-2 bg-white dark:bg-gray-900 text-gray-700 dark:text-gray-300 font-semibold py-2 px-4 rounded-lg border border-gray-300 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-800 transition-colors">
                    <i data-lucide="download" class="w-4 h-4"></i>
                    Скачать брошюру
                </a>
            </div>
        </div>
    </div>
</div>

<!-- Alpine.js Script -->
<script>
function loanApplication() {
    return {
        loanAmount: 0,
        duration: '',
        monthlyPayment: 0,
        acceptedTerms: false,

        calculateMonthlyPayment() {
            if (this.loanAmount > 0 && this.duration > 0) {
                // Simple loan calculation with 8.5% annual interest rate
                const monthlyRate = 0.085 / 12;
                const numPayments = parseInt(this.duration);

                if (monthlyRate === 0) {
                    this.monthlyPayment = this.loanAmount / numPayments;
                } else {
                    this.monthlyPayment = this.loanAmount * (monthlyRate * Math.pow(1 + monthlyRate, numPayments)) / (Math.pow(1 + monthlyRate, numPayments) - 1);
                }
            } else {
                this.monthlyPayment = 0;
            }
        },

        handleSubmit(e) {
            // Add any additional validation here
            if (!this.acceptedTerms) {
                e.preventDefault();
                alert('Пожалуйста, примите условия и положения для продолжения.');
            }
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
