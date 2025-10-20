@extends('layouts.dasht')
@section('title', $title)
@section('content')
<!-- Main Content Container -->
<div class="container mx-auto px-4 py-8">
    <!-- Header Section -->
    <div class="mb-8">
        <!-- Breadcrumb Navigation -->
        <nav class="flex mb-5" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 md:space-x-3">
                <li class="inline-flex items-center">
                    <a href="{{route('dashboard')}}" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600 dark:text-gray-400 dark:hover:text-white">
                        <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"></path>
                        </svg>
                        Домой
                    </a>
                </li>
                <li>
                    <div class="flex items-center">
                        <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                        </svg>
                        <a href="{{route('mplans')}}" class="ml-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ml-2 dark:text-gray-400 dark:hover:text-white">Инвестиционные планы</a>
                    </div>
                </li>
                <li aria-current="page">
                    <div class="flex items-center">
                        <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                        </svg>
                        <span class="ml-1 text-sm font-medium text-gray-500 md:ml-2 dark:text-gray-400">Фондовый рынок</span>
                    </div>
                </li>
            </ol>
        </nav>

        <!-- Page Title with Stock Theme -->
        <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between">
            <div>
                <h1 class="text-4xl font-bold text-gray-800 dark:text-white mb-2 flex items-center">
                    <span class="text-4xl mr-3">📈</span>
                    <span class="bg-gradient-to-r from-blue-600 to-indigo-600 bg-clip-text text-transparent">Планы инвестиций на фондовом рынке</span>
                </h1>
                <p class="text-lg text-gray-600 dark:text-gray-300 mb-4">Инвестируйте в ведущие компании и создавайте богатство через фондовые рынки</p>
                <div class="flex flex-wrap gap-3">
                    <span class="inline-flex items-center px-3 py-1 bg-blue-100 dark:bg-blue-900/30 text-blue-800 dark:text-blue-300 rounded-full text-sm font-medium">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                        </svg>
                        Дивидендный доход
                    </span>
                    <span class="inline-flex items-center px-3 py-1 bg-indigo-100 dark:bg-indigo-900/30 text-indigo-800 dark:text-indigo-300 rounded-full text-sm font-medium">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6" />
                        </svg>
                        Рост капитала
                    </span>
                    <span class="inline-flex items-center px-3 py-1 bg-green-100 dark:bg-green-900/30 text-green-800 dark:text-green-300 rounded-full text-sm font-medium">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        Доказанная доходность
                    </span>
                </div>
            </div>
            <div class="mt-6 lg:mt-0">
                <div class="bg-white dark:bg-gray-800 rounded-xl p-6 shadow-lg border border-gray-100 dark:border-gray-700">
                    <div class="text-center">
                        <div class="text-3xl font-bold text-blue-600 dark:text-blue-400">5-25%</div>
                        <div class="text-sm text-gray-500 dark:text-gray-400">Годовая доходность</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <x-danger-alert />
    <x-success-alert />

    <!-- Stock Market Overview -->
    <div class="bg-gradient-to-r from-blue-50 to-indigo-50 dark:from-gray-800 dark:to-gray-700 rounded-xl p-6 mb-8 border border-blue-100 dark:border-gray-600">
        <h2 class="text-2xl font-bold text-gray-800 dark:text-white mb-4 flex items-center">
            <svg class="w-7 h-7 mr-3 text-blue-600 dark:text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6" />
            </svg>
            Аналитика глобального фондового рынка
        </h2>
        <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
            <div class="text-center">
                <div class="text-2xl font-bold text-blue-600 dark:text-blue-400">$95T</div>
                <div class="text-sm text-gray-600 dark:text-gray-300">Глобальная капитализация</div>
            </div>
            <div class="text-center">
                <div class="text-2xl font-bold text-indigo-600 dark:text-indigo-400">7.5%</div>
                <div class="text-sm text-gray-600 dark:text-gray-300">Историческая доходность</div>
            </div>
            <div class="text-center">
                <div class="text-2xl font-bold text-purple-600 dark:text-purple-400">60+</div>
                <div class="text-sm text-gray-600 dark:text-gray-300">Глобальные биржи</div>
            </div>
            <div class="text-center">
                <div class="text-2xl font-bold text-green-600 dark:text-green-400">40K+</div>
                <div class="text-sm text-gray-600 dark:text-gray-300">Листинговые компании</div>
            </div>
        </div>
    </div>

    <!-- Stock Plans Grid -->
    <div x-data="{ selectedPlan: null }" class="grid grid-cols-1 lg:grid-cols-2 xl:grid-cols-3 gap-8 mb-12">
        @php
            $stockPlans = $plans->where('investment_type', 'stock');
        @endphp

        @forelse ($stockPlans as $index => $plan)
            <!-- Stock Plan Card -->
            <div class="relative bg-white dark:bg-gray-800 rounded-xl shadow-lg overflow-hidden transition-all duration-300 hover:shadow-2xl hover:transform hover:-translate-y-2 border border-gray-100 dark:border-gray-700 group"
                 :class="{'ring-4 ring-blue-500 dark:ring-blue-600': selectedPlan === {{ $index }}}">

                <!-- Stock Badge -->
                <div class="absolute top-4 right-4 z-10">
                    <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-blue-100 dark:bg-blue-900/30 text-blue-800 dark:text-blue-300">
                        <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M3 4a1 1 0 011-1h12a1 1 0 011 1v2a1 1 0 01-1 1H4a1 1 0 01-1-1V4zm1 3a1 1 0 000 2h.01a1 1 0 100-2H4zm2 0a1 1 0 000 2h.01a1 1 0 100-2H6zm2 0a1 1 0 000 2h.01a1 1 0 100-2H8zm2 0a1 1 0 000 2h.01a1 1 0 100-2H10zm2 0a1 1 0 000 2h.01a1 1 0 100-2H12zm2 0a1 1 0 000 2h.01a1 1 0 100-2H14zm2 0a1 1 0 000 2h.01a1 1 0 100-2H16z" clip-rule="evenodd"></path>
                        </svg>
                        {{$plan->tag}}
                    </span>
                </div>

                <!-- Stock Visual Header -->
                <div class="relative h-48 bg-gradient-to-br from-blue-500 via-indigo-600 to-purple-700 overflow-hidden">
                    <div class="absolute inset-0 bg-black bg-opacity-20"></div>
                    <div class="absolute inset-0 flex items-center justify-center">
                        <div class="text-center text-white">
                            <svg class="w-16 h-16 mx-auto mb-2 opacity-80" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M3 4a1 1 0 011-1h12a1 1 0 011 1v2a1 1 0 01-1 1H4a1 1 0 01-1-1V4zm1 3a1 1 0 000 2h.01a1 1 0 100-2H4zm2 0a1 1 0 000 2h.01a1 1 0 100-2H6zm2 0a1 1 0 000 2h.01a1 1 0 100-2H8zm2 0a1 1 0 000 2h.01a1 1 0 100-2H10zm2 0a1 1 0 000 2h.01a1 1 0 100-2H12zm2 0a1 1 0 000 2h.01a1 1 0 100-2H14zm2 0a1 1 0 000 2h.01a1 1 0 100-2H16z" clip-rule="evenodd"></path>
                            </svg>
                            <div class="text-sm font-medium opacity-90">Инвестиции на фондовом рынке</div>
                        </div>
                    </div>
                    <!-- Floating ROI -->
                    <div class="absolute bottom-4 left-4">
                        <div class="bg-white bg-opacity-90 dark:bg-gray-800 dark:bg-opacity-90 rounded-lg px-3 py-1">
                            <div class="text-lg font-bold text-blue-600 dark:text-blue-400">{{$plan->increment_amount}}%</div>
                            <div class="text-xs text-gray-600 dark:text-gray-400">{{$plan->increment_interval}} ROI</div>
                        </div>
                    </div>
                </div>

                <!-- Card Content -->
                <div class="p-6">
                    <!-- Plan Header -->
                    <div class="mb-4">
                        <h3 class="text-xl font-bold text-gray-800 dark:text-white mb-2">{{$plan->name}}</h3>
                        <div class="flex items-center justify-between mb-3">
                            <div class="text-2xl font-bold text-blue-600 dark:text-blue-400">
                                {{Auth::user()->currency}}{{number_format($plan->min_price)}}
                                <span class="text-sm font-normal text-gray-500 dark:text-gray-400">минимум</span>
                            </div>
                            <div class="text-right">
                                <div class="text-sm text-gray-500 dark:text-gray-400">Срок</div>
                                <div class="font-semibold text-gray-800 dark:text-white">{{$plan->expiration}} дней</div>
                            </div>
                        </div>
                        <div class="h-1 w-full bg-gradient-to-r from-blue-500 to-indigo-600 rounded-full"></div>
                    </div>

                    <!-- Investment Features -->
                    <div class="space-y-3 mb-6">
                        <!-- Investment Range -->
                        <div class="flex items-center justify-between py-2 px-3 bg-gray-50 dark:bg-gray-700 rounded-lg">
                            <div class="flex items-center">
                                <svg class="w-4 h-4 text-blue-600 dark:text-blue-400 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                <span class="text-sm font-medium text-gray-700 dark:text-gray-300">Диапазон инвестиций</span>
                            </div>
                            <span class="text-sm font-bold text-gray-900 dark:text-white">
                                {{Auth::user()->currency}}{{number_format($plan->min_price)}} - {{Auth::user()->currency}}{{number_format($plan->max_price)}}
                            </span>
                        </div>

                        <!-- Return Rate -->
                        <div class="flex items-center justify-between py-2 px-3 bg-blue-50 dark:bg-blue-900/20 rounded-lg">
                            <div class="flex items-center">
                                <svg class="w-4 h-4 text-blue-600 dark:text-blue-400 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path>
                                </svg>
                                <span class="text-sm font-medium text-gray-700 dark:text-gray-300">Ставка доходности</span>
                            </div>
                            <span class="text-sm font-bold text-blue-600 dark:text-blue-400">
                                {{$plan->increment_amount}}% {{$plan->increment_interval}}
                            </span>
                        </div>

                        <!-- Expected Return -->
                        <div class="flex items-center justify-between py-2 px-3 bg-indigo-50 dark:bg-indigo-900/20 rounded-lg">
                            <div class="flex items-center">
                                <svg class="w-4 h-4 text-indigo-600 dark:text-indigo-400 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                                </svg>
                                <span class="text-sm font-medium text-gray-700 dark:text-gray-300">Общая ожидаемая доходность</span>
                            </div>
                            <span class="text-sm font-bold text-indigo-600 dark:text-indigo-400">{{$plan->expected_return}}%</span>
                        </div>

                        @if($plan->gift > 0)
                        <!-- Bonus Gift -->
                        <div class="flex items-center justify-between py-2 px-3 bg-purple-50 dark:bg-purple-900/20 rounded-lg">
                            <div class="flex items-center">
                                <svg class="w-4 h-4 text-purple-600 dark:text-purple-400 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v13m0-13V6a2 2 0 112 0v1.5m0 5v.5a2 2 0 01-2 2h-.5M12 8h.5a2 2 0 012 2v.5"></path>
                                </svg>
                                <span class="text-sm font-medium text-gray-700 dark:text-gray-300">Приветственный бонус</span>
                            </div>
                            <span class="text-sm font-bold text-purple-600 dark:text-purple-400">
                                {{Auth::user()->currency}}{{number_format($plan->gift)}}
                            </span>
                        </div>
                        @endif
                    </div>

                    <!-- Investment Form -->
                    <form method="post" action="{{route('joininvestmentplan')}}" class="space-y-4">
                        @csrf
                        <div x-data="{ amount: '{{$plan->min_price}}' }">
                            <!-- Amount Input -->
                            <div>
                                <label for="amount-{{$index}}" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                    Сумма инвестиции ({{Auth::user()->currency}})
                                </label>

                                <div class="relative">
                                    <span class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        <span class="text-gray-500 dark:text-gray-400">{{Auth::user()->currency}}</span>
                                    </span>
                                    <input
                                        type="number"
                                        id="amount-{{$index}}"
                                        name="iamount"
                                        min="{{$plan->min_price}}"
                                        max="{{$plan->max_price}}"
                                        x-model="amount"
                                        placeholder="Введите сумму"
                                        class="pl-8 block w-full rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 py-3 px-4 text-gray-900 dark:text-white shadow-sm focus:border-blue-500 focus:ring-2 focus:ring-blue-500 dark:focus:ring-blue-600 transition-colors duration-200"
                                        @click="selectedPlan = {{$index}}"
                                    >
                                </div>

                                <!-- Range Input -->
                                <div class="mt-3 px-1">
                                    <input
                                        type="range"
                                        min="{{$plan->min_price}}"
                                        max="{{$plan->max_price}}"
                                        x-model="amount"
                                        class="w-full h-2 bg-gray-200 dark:bg-gray-700 rounded-lg appearance-none cursor-pointer accent-blue-600 dark:accent-blue-500"
                                    >
                                    <div class="flex justify-between text-xs text-gray-500 dark:text-gray-400 mt-1">
                                        <span>{{Auth::user()->currency}}{{number_format($plan->min_price)}}</span>
                                        <span>{{Auth::user()->currency}}{{number_format($plan->max_price)}}</span>
                                    </div>
                                </div>

                                <!-- Profit Calculator -->
                                <div class="mt-3 p-3 bg-blue-50 dark:bg-blue-900/20 rounded-lg border border-blue-200 dark:border-blue-800">
                                    <div class="flex justify-between items-center text-sm">
                                        <span class="text-gray-600 dark:text-gray-400">{{$plan->increment_interval}} Доходность:</span>
                                        <span class="font-medium text-blue-600 dark:text-blue-400">
                                            {{Auth::user()->currency}}<span x-text="(amount * {{$plan->increment_amount}} / 100).toFixed(2)"></span>
                                        </span>
                                    </div>
                                    <div class="flex justify-between items-center text-sm mt-1">
                                        <span class="text-gray-600 dark:text-gray-400">Общая доходность ({{$plan->expiration}} дней):</span>
                                        <span class="font-bold text-blue-600 dark:text-blue-400">
                                            {{Auth::user()->currency}}<span x-text="(amount * {{$plan->expected_return}} / 100).toFixed(2)"></span>
                                        </span>
                                    </div>
                                </div>
                            </div>

                            <input type="hidden" name="duration" value="{{$plan->expiration}}">
                            <input type="hidden" name="id" value="{{ $plan->id }}">

                            <!-- Submit Button -->
                            <button
                                type="submit"
                                class="w-full relative py-3 px-6 rounded-lg bg-gradient-to-r from-blue-600 to-indigo-600 hover:from-blue-700 hover:to-indigo-700 text-white font-medium shadow-md hover:shadow-lg transition-all duration-300 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 dark:focus:ring-offset-gray-900 group"
                                @mouseenter="selectedPlan = {{$index}}"
                            >
                                <span class="flex items-center justify-center">
                                    <svg class="w-5 h-5 mr-2 group-hover:scale-110 transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path>
                                    </svg>
                                    Инвестировать в акции
                                </span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        @empty
            <!-- Empty State for Stocks -->
            <div class="col-span-full flex flex-col items-center justify-center p-12 bg-white dark:bg-gray-800 rounded-xl shadow-md border border-gray-100 dark:border-gray-700">
                <div class="w-24 h-24 bg-blue-100 dark:bg-blue-900/30 rounded-full flex items-center justify-center mb-6">
                    <svg class="w-12 h-12 text-blue-600 dark:text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path>
                    </svg>
                </div>
                <h3 class="text-2xl font-bold text-gray-800 dark:text-white mb-2">Планы акций недоступны</h3>
                <p class="text-gray-600 dark:text-gray-400 text-center max-w-md mb-6">
                    Планы инвестиций в акции обновляются. Пожалуйста, проверьте позже для новых возможностей инвестиций в акции.
                </p>
                <a href="{{ route('mplans') }}" class="inline-flex items-center px-5 py-2.5 bg-blue-600 hover:bg-blue-700 text-white font-medium rounded-lg transition-colors duration-200">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                    </svg>
                    Просмотреть все планы
                </a>
            </div>
        @endforelse
    </div>

    <!-- Stock Education Section -->
    <div class="bg-white dark:bg-gray-800 rounded-xl shadow-md p-8 mb-8 border border-gray-100 dark:border-gray-700">
        <h3 class="text-2xl font-bold text-gray-900 dark:text-white mb-6 flex items-center">
            <svg class="w-7 h-7 mr-3 text-blue-600 dark:text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C20.832 18.477 19.246 18 17.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
            </svg>
            Почему выбрать инвестиции на фондовом рынке?
        </h3>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <!-- Ownership Stake -->
            <div class="flex space-x-4 p-4 bg-blue-50 dark:bg-blue-900/20 rounded-xl">
                <div class="flex-shrink-0">
                    <div class="w-12 h-12 rounded-full bg-blue-100 dark:bg-blue-900/30 flex items-center justify-center">
                        <svg class="w-6 h-6 text-blue-600 dark:text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                        </svg>
                    </div>
                </div>
                <div>
                    <h4 class="text-lg font-semibold text-gray-900 dark:text-white mb-1">Владение компанией</h4>
                    <p class="text-gray-600 dark:text-gray-400 text-sm">Владейте частью успешных компаний и извлекайте выгоду из их роста и успеха.</p>
                </div>
            </div>

            <!-- Dividend Income -->
            <div class="flex space-x-4 p-4 bg-indigo-50 dark:bg-indigo-900/20 rounded-xl">
                <div class="flex-shrink-0">
                    <div class="w-12 h-12 rounded-full bg-indigo-100 dark:bg-indigo-900/30 flex items-center justify-center">
                        <svg class="w-6 h-6 text-indigo-600 dark:text-indigo-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                </div>
                <div>
                    <h4 class="text-lg font-semibold text-gray-900 dark:text-white mb-1">Дивидендный доход</h4>
                    <p class="text-gray-600 dark:text-gray-400 text-sm">Получайте регулярные дивидендные выплаты от прибыльных компаний как пассивный доход.</p>
                </div>
            </div>

            <!-- Long-term Growth -->
            <div class="flex space-x-4 p-4 bg-green-50 dark:bg-green-900/20 rounded-xl">
                <div class="flex-shrink-0">
                    <div class="w-12 h-12 rounded-full bg-green-100 dark:bg-green-900/30 flex items-center justify-center">
                        <svg class="w-6 h-6 text-green-600 dark:text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path>
                        </svg>
                    </div>
                </div>
                <div>
                    <h4 class="text-lg font-semibold text-gray-900 dark:text-white mb-1">Долгосрочный рост</h4>
                    <p class="text-gray-600 dark:text-gray-400 text-sm">Исторически акции обеспечивали превосходную долгосрочную доходность по сравнению с другими классами активов.</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Popular Stocks & Sectors -->
    <div class="bg-gradient-to-r from-gray-50 to-gray-100 dark:from-gray-800 dark:to-gray-700 rounded-xl p-8 mb-8 border border-gray-200 dark:border-gray-600">
        <h3 class="text-2xl font-bold text-gray-900 dark:text-white mb-6 text-center">Сектора нашего акционерного портфеля</h3>
        <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-6 gap-6">
            <div class="text-center">
                <div class="w-16 h-16 mx-auto mb-3 bg-blue-100 dark:bg-blue-900/30 rounded-xl flex items-center justify-center">
                    <svg class="w-8 h-8 text-blue-600 dark:text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 3v2m6-2v2M9 19v2m6-2v2M5 9H3m2 6H3m18-6h-2m2 6h-2M7 19h10a2 2 0 002-2V7a2 2 0 00-2-2H7a2 2 0 00-2 2v10a2 2 0 002 2zM9 9h6v6H9V9z"></path>
                    </svg>
                </div>
                <div class="text-sm font-medium text-gray-700 dark:text-gray-300">Технологии</div>
            </div>

            <div class="text-center">
                <div class="w-16 h-16 mx-auto mb-3 bg-green-100 dark:bg-green-900/30 rounded-xl flex items-center justify-center">
                    <svg class="w-8 h-8 text-green-600 dark:text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z"></path>
                    </svg>
                </div>
                <div class="text-sm font-medium text-gray-700 dark:text-gray-300">Здравоохранение</div>
            </div>

            <div class="text-center">
                <div class="w-16 h-16 mx-auto mb-3 bg-yellow-100 dark:bg-yellow-900/30 rounded-xl flex items-center justify-center">
                    <svg class="w-8 h-8 text-yellow-600 dark:text-yellow-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                    </svg>
                </div>
                <div class="text-sm font-medium text-gray-700 dark:text-gray-300">Энергетика</div>
            </div>

            <div class="text-center">
                <div class="w-16 h-16 mx-auto mb-3 bg-purple-100 dark:bg-purple-900/30 rounded-xl flex items-center justify-center">
                    <svg class="w-8 h-8 text-purple-600 dark:text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 14v3m4-3v3m4-3v3M3 21h18M3 10h18M3 7l9-4 9 4M4 10v11M20 10v11"></path>
                    </svg>
                </div>
                <div class="text-sm font-medium text-gray-700 dark:text-gray-300">Финансы</div>
            </div>

            <div class="text-center">
                <div class="w-16 h-16 mx-auto mb-3 bg-red-100 dark:bg-red-900/30 rounded-xl flex items-center justify-center">
                    <svg class="w-8 h-8 text-red-600 dark:text-red-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path>
                    </svg>
                </div>
                <div class="text-sm font-medium text-gray-700 dark:text-gray-300">Потребительские товары</div>
            </div>

            <div class="text-center">
                <div class="w-16 h-16 mx-auto mb-3 bg-indigo-100 dark:bg-indigo-900/30 rounded-xl flex items-center justify-center">
                    <svg class="w-8 h-8 text-indigo-600 dark:text-indigo-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z"></path>
                    </svg>
                </div>
                <div class="text-sm font-medium text-gray-700 dark:text-gray-300">Промышленность</div>
            </div>
        </div>
    </div>

    <!-- Investment Strategy -->
    <div class="bg-white dark:bg-gray-800 rounded-xl shadow-md p-6 border border-gray-100 dark:border-gray-700">
        <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-4 flex items-center">
            <svg class="w-6 h-6 mr-2 text-blue-600 dark:text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
            </svg>
            Инвестиционная стратегия и управление рисками
        </h3>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 text-sm text-gray-600 dark:text-gray-400">
            <div>
                <h4 class="font-semibold text-gray-800 dark:text-white mb-2">Наш инвестиционный подход:</h4>
                <ul class="list-disc list-inside space-y-1">
                    <li>Диверсифицированный портфель по нескольким секторам</li>
                    <li>Профессиональное управление фондами и анализ</li>
                    <li>Фокус на голубые фишки и растущие акции</li>
                    <li>Регулярная перебалансировка и оптимизация портфеля</li>
                </ul>
            </div>
            <div>
                <h4 class="font-semibold text-gray-800 dark:text-white mb-2">Соображения о рисках:</h4>
                <ul class="list-disc list-inside space-y-1">
                    <li>Цены на акции могут быть волатильными и могут снижаться</li>
                    <li>Рыночные условия могут влиять на все инвестиции</li>
                    <li>Прошлые результаты не гарантируют будущих результатов</li>
                    <li>Диверсификация помогает снизить, но не устраняет риск</li>
                </ul>
            </div>
        </div>
    </div>
</div>

<!-- Alpine.js Initialization -->
<script>
    document.addEventListener('alpine:init', () => {
        Alpine.data('stockPlans', () => ({
            selectedPlan: null,
            init() {
                // Stock specific initialization
            }
        }))
    })
</script>
@endsection
