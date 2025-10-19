@extends('layouts.base')

@section('title', 'Инвестиции')

@inject('content', 'App\Http\Controllers\FrontController')
@section('content')

<!-- Hero Section -->
<section class="relative overflow-hidden bg-gradient-to-br from-gray-900 to-gray-800 py-24">
    <!-- Abstract Background Elements -->
    <div class="absolute inset-0 z-0 pointer-events-none opacity-20">
        <!-- Investment chart pattern -->
        <div class="absolute top-0 right-0 w-full h-full">
            <svg class="absolute top-0 right-0 w-full h-full" viewBox="0 0 800 800" xmlns="http://www.w3.org/2000/svg">
                <defs>
                    <linearGradient id="investGrad1" x1="0%" y1="0%" x2="100%" y2="100%">
                        <stop stop-color="#3B82F6" stop-opacity=".25" offset="0%"/>
                        <stop stop-color="#10B981" stop-opacity=".2" offset="50%"/>
                        <stop stop-color="#6366F1" stop-opacity=".15" offset="100%"/>
                    </linearGradient>
                </defs>
                <!-- Investment chart-inspired shape -->
                <path d="M100,600 L150,550 L200,580 L250,500 L300,530 L350,480 L400,520 L450,460 L500,500 L550,420 L600,450 L650,380 L700,420"
                      stroke="url(#investGrad1)"
                      fill="none"
                      stroke-width="8"
                      stroke-linecap="round"
                      stroke-linejoin="round"/>

                <!-- Background grid lines -->
                <g stroke="currentColor" stroke-opacity="0.1">
                    <line x1="0" y1="100" x2="800" y2="100" />
                    <line x1="0" y1="200" x2="800" y2="200" />
                    <line x1="0" y1="300" x2="800" y2="300" />
                    <line x1="0" y1="400" x2="800" y2="400" />
                    <line x1="0" y1="500" x2="800" y2="500" />
                    <line x1="0" y1="600" x2="800" y2="600" />
                    <line x1="0" y1="700" x2="800" y2="700" />

                    <line x1="100" y1="0" x2="100" y2="800" />
                    <line x1="200" y1="0" x2="200" y2="800" />
                    <line x1="300" y1="0" x2="300" y2="800" />
                    <line x1="400" y1="0" x2="400" y2="800" />
                    <line x1="500" y1="0" x2="500" y2="800" />
                    <line x1="600" y1="0" x2="600" y2="800" />
                    <line x1="700" y1="0" x2="700" y2="800" />
                </g>
            </svg>
        </div>
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
            <div>
                <div class="inline-block px-3 py-1 mb-6 text-xs font-semibold tracking-wider text-emerald-400 uppercase bg-emerald-900 bg-opacity-30 rounded-full">
                    Безопасная Инвестиционная Платформа
                </div>
                <h1 class="text-4xl font-extrabold tracking-tight text-white sm:text-5xl md:text-6xl mb-4">
                    <span class="block">НАДЕЖНЫЕ ИНВЕСТИЦИИ С</span>
                    <span class="block text-emerald-400">{{$settings->site_name}}</span>
                </h1>
                <p class="mt-3 text-xl font-medium text-emerald-400 mb-6">
                    ПОЛУЧИТЕ ПОЖИЗНЕННЫЙ ДОХОД
                </p>
                <p class="text-base text-gray-300 sm:text-lg lg:text-base xl:text-lg max-w-xl">
                    Разработчики {{$settings->site_name}} создали уникального криптовалютного робота. Он предсказывает стоимость Bitcoin, генерируя ежедневную прибыль от операций. Робот может приносить пользу на любой стадии рынка: как при росте, так и при падении.
                </p>
                <p class="mt-4 text-base text-gray-300 sm:text-lg lg:text-base xl:text-lg max-w-xl">
                    Наш финансовый директор разработал уникальный маркетинговый план для полноценной работы платформы. Инвесторы имеют отличную возможность получать финансовые выгоды в стабильных условиях.
                </p>
                <div class="mt-8 flex flex-wrap gap-4">
                    <a href="#calculator" class="inline-flex items-center px-6 py-3 border border-transparent text-base font-medium rounded-md shadow-sm text-gray-900 bg-emerald-400 hover:bg-emerald-500 transition duration-300">
                        Рассчитать Прибыль
                        <svg class="ml-2 -mr-1 h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-11a1 1 0 10-2 0v2H7a1 1 0 100 2h2v2a1 1 0 102 0v-2h2a1 1 0 100-2h-2V7z" clip-rule="evenodd" />
                        </svg>
                    </a>
                    <a href="#investment-plans" class="inline-flex items-center px-6 py-3 border border-gray-700 text-base font-medium rounded-md text-gray-300 bg-transparent hover:bg-gray-800 transition duration-300">
                        Инвестиционные Планы
                    </a>
                </div>
            </div>
            <div class="hidden lg:block">
                <div class="relative">
                    <div class="absolute -inset-0.5 bg-gradient-to-r from-emerald-500 to-blue-600 rounded-lg blur opacity-30"></div>
                    <div class="relative bg-gray-800 bg-opacity-80 backdrop-blur-sm p-6 rounded-lg border border-gray-700">
                        <div class="flex justify-between items-center mb-6">
                            <div>
                                <span class="text-gray-400 text-sm">Обзор Инвестиций</span>
                                <h3 class="text-xl font-bold text-white">Умный Торговый Робот</h3>
                            </div>
                            <div class="text-right">
                                <span class="text-emerald-400 text-xl font-bold">ИИ Мощный</span>
                            </div>
                        </div>

                        <!-- Investment chart mockup -->
                        <div class="w-full h-48 relative mb-6">
                            <svg class="w-full h-full" viewBox="0 0 400 200" xmlns="http://www.w3.org/2000/svg">
                                <!-- Chart background -->
                                <defs>
                                    <linearGradient id="chartGradient" x1="0%" y1="0%" x2="0%" y2="100%">
                                        <stop offset="0%" stop-color="#10B981" stop-opacity="0.2"/>
                                        <stop offset="100%" stop-color="#10B981" stop-opacity="0"/>
                                    </linearGradient>
                                </defs>

                                <!-- Chart grid -->
                                <g stroke="#2D3748" stroke-width="0.5">
                                    <line x1="0" y1="40" x2="400" y2="40" />
                                    <line x1="0" y1="80" x2="400" y2="80" />
                                    <line x1="0" y1="120" x2="400" y2="120" />
                                    <line x1="0" y1="160" x2="400" y2="160" />
                                </g>

                                <!-- Chart line -->
                                <path d="M0,160 L40,150 L80,155 L120,140 L160,130 L200,100 L240,80 L280,70 L320,50 L360,45 L400,20"
                                      fill="none" stroke="#10B981" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>

                                <!-- Chart area -->
                                <path d="M0,160 L40,150 L80,155 L120,140 L160,130 L200,100 L240,80 L280,70 L320,50 L360,45 L400,20 L400,200 L0,200 Z"
                                      fill="url(#chartGradient)"/>
                            </svg>
                        </div>

                        <!-- Stats -->
                        <div class="grid grid-cols-3 gap-2 mt-4">
                            <div class="bg-gray-900 bg-opacity-50 p-2 rounded">
                                <div class="text-xs text-gray-400">Дневная Доходность</div>
                                <div class="text-sm text-white">1.8% - 3.3%</div>
                            </div>
                            <div class="bg-gray-900 bg-opacity-50 p-2 rounded">
                                <div class="text-xs text-gray-400">Минимальная Инвестиция</div>
                                <div class="text-sm text-white">10 USD</div>
                            </div>
                            <div class="bg-gray-900 bg-opacity-50 p-2 rounded">
                                <div class="text-xs text-gray-400">Автоматизация</div>
                                <div class="text-sm text-white">100%</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
            <!---->
<!-- Investment Plans Section -->
<section id="investment-plans" class="py-16 bg-gradient-to-b from-gray-800 to-gray-900">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <div class="inline-block px-3 py-1 mb-4 text-xs font-semibold tracking-wider text-emerald-400 uppercase bg-emerald-900 bg-opacity-30 rounded-full">
                Наши Предложения
            </div>
            <h2 class="text-3xl font-extrabold text-white sm:text-4xl">
                <span class="block">Инвестиционные Предложения</span>
            </h2>
            <p class="mt-4 text-xl text-gray-300 max-w-3xl mx-auto">
                Наша компания {{$settings->site_name}} гарантирует заработок каждому инвестору
            </p>
        </div>

        <!-- Investment Plans Cards -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8" x-data="{ activeTab: 'Starting' }">
            @foreach ($plans as $plan)
            <div class="relative" x-data="{ hover: false }" @mouseenter="hover = true" @mouseleave="hover = false">
                <!-- Gradient border effect -->
                <div class="absolute -inset-0.5 bg-gradient-to-r from-emerald-500 to-blue-600 rounded-xl blur opacity-30 transition-all duration-300" :class="{ 'opacity-60': hover }"></div>

                <!-- Card content -->
                <div class="relative bg-gray-800 bg-opacity-80 backdrop-filter backdrop-blur-sm rounded-xl p-6 border border-gray-700 transition-all duration-300 hover:transform hover:-translate-y-1 hover:shadow-xl">
                    <!-- Header with percentage -->
                    <div class="flex items-center justify-between mb-6">
                        <div class="flex items-center">
                            <div class="w-12 h-12 bg-emerald-900 bg-opacity-30 rounded-full flex items-center justify-center mr-4">
                                <svg class="w-6 h-6 text-emerald-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </div>
                            <div>
                                <h3 class="text-lg font-bold text-white">{{ $plan->name }}</h3>
                                <p class="text-sm text-gray-400">Инвестиционный План</p>
                            </div>
                        </div>
                        <div class="text-right">
                            <div class="text-3xl font-bold text-emerald-400">1.8<span class="text-xl">%</span></div>
                            <p class="text-sm text-emerald-300">Дневная Доходность</p>
                        </div>
                    </div>

                    <!-- Divider -->
                    <div class="w-full h-px bg-gray-700 my-4"></div>

                    <!-- Plan details -->
                    <div class="space-y-4">
                        <div class="flex justify-between items-center">
                            <span class="text-gray-400">Диапазон Инвестиций:</span>
                            <span class="text-white font-medium">1000 - 5000 USD</span>
                        </div>
                        <div class="flex justify-between items-center">
                            <span class="text-gray-400">Частота Выплат:</span>
                            <span class="text-white font-medium">Ежедневно</span>
                        </div>
                        <div class="flex justify-between items-center">
                            <span class="text-gray-400">Возврат Капитала:</span>
                            <span class="text-white font-medium">Включен</span>
                        </div>
                        <div class="flex justify-between items-center">
                            <span class="text-gray-400">Автоматизация:</span>
                            <span class="text-white font-medium">100%</span>
                        </div>
                    </div>

                    <!-- CTA Button -->
                    <div class="mt-6">
                        <a href="#calculator" class="block w-full py-3 px-4 bg-emerald-600 hover:bg-emerald-700 text-white font-medium rounded-lg text-center transition duration-300">
                            Инвестировать Сейчас
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <!-- Fee Structure Section -->
        <div class="mt-16">
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                <div class="lg:col-span-1">
                    <div class="bg-gray-800 bg-opacity-50 backdrop-filter backdrop-blur-sm rounded-xl p-6 border border-gray-700">
                        <div class="flex items-center mb-4">
                            <div class="w-10 h-10 bg-blue-900 bg-opacity-30 rounded-full flex items-center justify-center mr-3">
                                <svg class="w-5 h-5 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </div>
                            <h3 class="text-xl font-bold text-white">ОБЩИЕ КОМИССИИ</h3>
                        </div>
                        <p class="text-gray-300">
                            Эти комиссии взимаются {{$settings->site_name}} для работы платформы. Они не связаны с прибылью, получаемой нашими инвесторами.
                        </p>
                    </div>
                </div>

                <div class="lg:col-span-2">
                    <div class="bg-gray-800 bg-opacity-50 backdrop-filter backdrop-blur-sm rounded-xl p-6 border border-gray-700">
                        <div class="space-y-6" x-data="{ activeTab: 'Starting' }">
                            <!-- Tab Navigation -->
                            <div class="flex border-b border-gray-700 mb-4 overflow-x-auto hide-scrollbar">
                                <button
                                    @click="activeTab = 'Starting'"
                                    :class="{'text-emerald-400 border-emerald-400': activeTab === 'Starting', 'text-gray-400 border-transparent hover:text-gray-300': activeTab !== 'Starting'}"
                                    class="px-4 py-2 font-medium border-b-2 transition-all duration-200 whitespace-nowrap focus:outline-none">
                                    Стартовый План
                                </button>
                                <button
                                    @click="activeTab = 'Standard'"
                                    :class="{'text-emerald-400 border-emerald-400': activeTab === 'Standard', 'text-gray-400 border-transparent hover:text-gray-300': activeTab !== 'Standard'}"
                                    class="px-4 py-2 font-medium border-b-2 transition-all duration-200 whitespace-nowrap focus:outline-none">
                                    Стандартный План
                                </button>
                                <button
                                    @click="activeTab = 'Premium'"
                                    :class="{'text-emerald-400 border-emerald-400': activeTab === 'Premium', 'text-gray-400 border-transparent hover:text-gray-300': activeTab !== 'Premium'}"
                                    class="px-4 py-2 font-medium border-b-2 transition-all duration-200 whitespace-nowrap focus:outline-none">
                                    Премиум План
                                </button>
                            </div>

                            <!-- Tab Content -->
                            <div x-show="activeTab === 'Starting'" class="space-y-6">
                                <div class="flex items-start">
                                    <div class="flex-shrink-0">
                                        <div class="flex items-center justify-center h-10 w-10 rounded-md bg-gradient-to-r from-emerald-500 to-emerald-600 text-white">
                                            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                                            </svg>
                                        </div>
                                    </div>
                                    <div class="ml-4">
                                        <h4 class="text-lg font-medium text-white">КОМИССИЯ КОМПАНИИ</h4>
                                        <p class="mt-2 text-base text-gray-300">
                                            <span class="text-emerald-400 font-semibold">0.5%</span> с прибыли, полученной роботом. Эта комиссия показывает доходы всей структуры {{$settings->site_name}}, то есть каждого сотрудника.
                                        </p>
                                    </div>
                                </div>

                                <div class="flex items-start">
                                    <div class="flex-shrink-0">
                                        <div class="flex items-center justify-center h-10 w-10 rounded-md bg-gradient-to-r from-blue-500 to-blue-600 text-white">
                                            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                            </svg>
                                        </div>
                                    </div>
                                    <div class="ml-4">
                                        <h4 class="text-lg font-medium text-white">АДМИНИСТРАТИВНАЯ КОМИССИЯ</h4>
                                        <p class="mt-2 text-base text-gray-300">
                                            <span class="text-emerald-400 font-semibold">0.5%</span> для технической поддержки робота и всей компании. Эта комиссия включает расходы компании на развитие и маркетинг.
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <div x-show="activeTab === 'Standard'" class="space-y-6" style="display: none;">
                                <div class="flex items-start">
                                    <div class="flex-shrink-0">
                                        <div class="flex items-center justify-center h-10 w-10 rounded-md bg-gradient-to-r from-emerald-500 to-emerald-600 text-white">
                                            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                                            </svg>
                                        </div>
                                    </div>
                                    <div class="ml-4">
                                        <h4 class="text-lg font-medium text-white">КОМИССИЯ КОМПАНИИ</h4>
                                        <p class="mt-2 text-base text-gray-300">
                                            <span class="text-emerald-400 font-semibold">0.5%</span> с прибыли, полученной роботом. Эта комиссия показывает доходы всей структуры {{$settings->site_name}}, то есть каждого сотрудника.
                                        </p>
                                    </div>
                                </div>

                                <div class="flex items-start">
                                    <div class="flex-shrink-0">
                                        <div class="flex items-center justify-center h-10 w-10 rounded-md bg-gradient-to-r from-blue-500 to-blue-600 text-white">
                                            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                            </svg>
                                        </div>
                                    </div>
                                    <div class="ml-4">
                                        <h4 class="text-lg font-medium text-white">АДМИНИСТРАТИВНАЯ КОМИССИЯ</h4>
                                        <p class="mt-2 text-base text-gray-300">
                                            <span class="text-emerald-400 font-semibold">0.5%</span> для технической поддержки робота и всей компании. Эта комиссия включает расходы компании на развитие и маркетинг.
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <div x-show="activeTab === 'Premium'" class="space-y-6" style="display: none;">
                                <div class="flex items-start">
                                    <div class="flex-shrink-0">
                                        <div class="flex items-center justify-center h-10 w-10 rounded-md bg-gradient-to-r from-emerald-500 to-emerald-600 text-white">
                                            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                                            </svg>
                                        </div>
                                    </div>
                                    <div class="ml-4">
                                        <h4 class="text-lg font-medium text-white">КОМИССИЯ КОМПАНИИ</h4>
                                        <p class="mt-2 text-base text-gray-300">
                                            <span class="text-emerald-400 font-semibold">0.5%</span> с прибыли, полученной роботом. Эта комиссия показывает доходы всей структуры {{$settings->site_name}}, то есть каждого сотрудника.
                                        </p>
                                    </div>
                                </div>

                                <div class="flex items-start">
                                    <div class="flex-shrink-0">
                                        <div class="flex items-center justify-center h-10 w-10 rounded-md bg-gradient-to-r from-blue-500 to-blue-600 text-white">
                                            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                            </svg>
                                        </div>
                                    </div>
                                    <div class="ml-4">
                                        <h4 class="text-lg font-medium text-white">АДМИНИСТРАТИВНАЯ КОМИССИЯ</h4>
                                        <p class="mt-2 text-base text-gray-300">
                                            <span class="text-emerald-400 font-semibold">0.5%</span> для технической поддержки робота и всей компании. Эта комиссия включает расходы компании на развитие и маркетинг.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Profit Calculator -->
        <div id="calculator" class="mt-16 relative">
            <div class="absolute -inset-0.5 bg-gradient-to-r from-emerald-500 to-blue-600 rounded-xl blur opacity-30"></div>
            <div class="relative bg-gray-800 bg-opacity-80 backdrop-filter backdrop-blur-sm rounded-xl p-8 border border-gray-700">
                <div class="text-center mb-8">
                    <div class="inline-block px-3 py-1 mb-4 text-xs font-semibold tracking-wider text-emerald-400 uppercase bg-emerald-900 bg-opacity-30 rounded-full">
                        Прогноз Прибыли
                    </div>
                    <h3 class="text-2xl font-bold text-white">Рассчитайте Свою Инвестиционную Доходность</h3>
                    <p class="mt-2 text-gray-300">Посмотрите, сколько именно вы можете заработать</p>
                </div>

                <div class="grid grid-cols-1 lg:grid-cols-2 gap-8" x-data="{ showCalculator: true }">
                    <div class="space-y-6">
                        <div>
                            <label for="selectid" class="block text-sm font-medium text-gray-400 mb-2">Инвестиционный План</label>
                            <div class="relative">
                                <select id="selectid" class="block w-full pl-4 pr-10 py-3 text-base bg-gray-900 border border-gray-700 rounded-lg text-white focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 appearance-none">
                                    <option value="2" data-percent="1.8">Стартовый (1.8% в день)</option>
                                    <option value="3" data-percent="2.5">Стандартный (2.5% в день)</option>
                                    <option value="4" data-percent="3.3">Премиум (3.3% в день)</option>
                                </select>
                                <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-400">
                                    <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                            </div>
                        </div>

                        <div>
                            <label for="sum" class="block text-sm font-medium text-gray-400 mb-2">Сумма Инвестиции (USD)</label>
                            <div class="relative">
                                <input id="sum" type="number" class="block w-full pl-4 pr-20 py-3 text-base bg-gray-900 border border-gray-700 rounded-lg text-white focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500" value="100">
                                <div class="absolute inset-y-0 right-0 flex items-center px-4 text-gray-400 bg-gray-700 rounded-r-lg">
                                    USD
                                </div>
                            </div>
                            <div id="eror" class="text-red-500 text-sm mt-1"></div>
                        </div>

                        <div class="pt-4">
                            <a href="login" class="block w-full py-3 px-4 bg-emerald-600 hover:bg-emerald-700 text-white font-medium rounded-lg text-center transition duration-300">
                                Начать Инвестировать Сейчас
                            </a>
                        </div>
                    </div>

                    <div class="bg-gray-900 rounded-xl p-6">
                        <h4 class="text-lg font-medium text-white mb-6">Ожидаемая Доходность</h4>

                        <div class="grid grid-cols-1 divide-y divide-gray-700">
                            <div class="py-4 flex justify-between items-center">
                                <div>
                                    <p class="text-sm text-gray-400">Ежедневный Доход</p>
                                    <p id="daily" class="text-xl font-bold text-white">-</p>
                                </div>
                                <div class="w-12 h-12 bg-emerald-900 bg-opacity-30 rounded-full flex items-center justify-center">
                                    <svg class="w-6 h-6 text-emerald-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                </div>
                            </div>

                            <div class="py-4 flex justify-between items-center">
                                <div>
                                    <p class="text-sm text-gray-400">Еженедельный Доход</p>
                                    <p id="weekly" class="text-xl font-bold text-white">-</p>
                                </div>
                                <div class="w-12 h-12 bg-blue-900 bg-opacity-30 rounded-full flex items-center justify-center">
                                    <svg class="w-6 h-6 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                    </svg>
                                </div>
                            </div>

                            <div class="py-4 flex justify-between items-center">
                                <div>
                                    <p class="text-sm text-gray-400">Ежемесячный Доход</p>
                                    <p id="mountly" class="text-xl font-bold text-white">-</p>
                                </div>
                                <div class="w-12 h-12 bg-purple-900 bg-opacity-30 rounded-full flex items-center justify-center">
                                    <svg class="w-6 h-6 text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
                                    </svg>
                                </div>
                            </div>

                            <div class="pt-4">
                                <div class="p-4 bg-gray-800 rounded-lg border border-gray-700">
                                    <p class="text-sm text-gray-300">
                                        <span class="text-emerald-400">Примечание:</span> Эти расчеты основаны на текущих ставках. Фактическая доходность может варьироваться в зависимости от рыночных условий.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

    <script src="temp/custom/js/jquery.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){

//Calculator
function calc(n){

select = document.getElementById("selectid");
tar = select.value;

alert;
var okrs	= [2];


 minMoneyur2 = 10;

 minMoneyu2 = (10);
 maxMoneyu2 = (500);

valut = "USD";


 minMoneyur3 = 500;

 minMoneyu3 = (500);
 maxMoneyu3 = (25000);

valut = "USD";


 minMoneyur4 = 2000;

 minMoneyu4 = (2000);
 maxMoneyu4 = (75000);

valut = "USD";






	if(tar == 2){

var percent 	= [0.018];


		minMoneyr = minMoneyur2;
		minMoney = minMoneyu2;
		maxMoney = maxMoneyu2;

	}
	if(tar == 3){

var percent 	= [0.025];


		minMoneyr = minMoneyur3;
		minMoney = minMoneyu3;
		maxMoney = maxMoneyu3;

	}
	if(tar == 4){

var percent 	= [0.033];


		minMoneyr = minMoneyur4;
		minMoney = minMoneyu4;
		maxMoney = maxMoneyu4;

	}



		if(!n){
			document.getElementById("sum").value = minMoneyr;
		}

		if(parseFloat($("#sum").val())<minMoney){
	$("#eror").text("Min: " + minMoney +"");
		}else if(parseFloat($("#sum").val())>maxMoney){
	$("#eror").text("Max: " + maxMoney +"");
		}else if(parseFloat($("#sum").val())<=maxMoney){
	$("#eror").text("");
		}



	amount = parseFloat($("#sum").val());

			daily = amount * percent;
			daily = daily.toFixed(okrs);
			weekly = daily * 7;
			weekly = weekly.toFixed(okrs);
			mountly = daily * 30;
			mountly = mountly.toFixed(okrs);

			if(amount < minMoney || isNaN(amount) == true){
				$("#daily").text("-");
				$("#weekly").text("-");
				$("#mountly").text("-");

			} else {
				$("#daily").html(daily +'<sub> '+ valut +' </sub>');
				$("#weekly").html(weekly +'<sub> '+ valut +' </sub>');
				$("#mountly").html(mountly +'<sub> '+ valut +' </sub>');
			}



	}



	if($("#sum, #selectid").change){
		calc(false);
	}
	$("#sum").keyup(function(){
		calc(true);
	});
	$("#selectid").click(function(){
		calc(false);
	});
	$("#selectid").change(function(){
		calc(false);
	});
});
</script>            <!---->

<!-- Investment Steps Section -->
<section class="py-16 bg-gray-900 relative overflow-hidden">
    <!-- Background pattern -->
    <div class="absolute inset-0 opacity-10">
        <svg class="w-full h-full" viewBox="0 0 100 100" preserveAspectRatio="none">
            <defs>
                <pattern id="grid" width="8" height="8" patternUnits="userSpaceOnUse">
                    <path d="M 8 0 L 0 0 0 8" fill="none" stroke="currentColor" stroke-width="0.5" />
                </pattern>
            </defs>
            <rect width="100" height="100" fill="url(#grid)" />
        </svg>
    </div>

    <div class="container mx-auto px-4 relative">
        <div class="text-center mb-12">
            <div class="inline-block px-3 py-1 text-xs font-semibold tracking-wider text-blue-400 uppercase bg-blue-900 bg-opacity-30 rounded-full mb-4">
                Инвестиционный Процесс
            </div>
            <h2 class="text-3xl md:text-4xl font-bold text-white mb-4">Простые Шаги для Начала Инвестирования</h2>
            <p class="max-w-3xl mx-auto text-gray-300">
                Мы разработали упрощенный инвестиционный процесс, который является эффективным, быстрым и простым. Следуйте этим простым шагам, чтобы начать свое инвестиционное путешествие.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <!-- Step 1 -->
            <div class="relative">
                <div class="absolute -inset-0.5 bg-gradient-to-r from-blue-600 to-emerald-500 rounded-xl blur opacity-30"></div>
                <div class="bg-gray-800 bg-opacity-80 backdrop-filter backdrop-blur-sm rounded-xl p-6 border border-gray-700 relative h-full">
                    <div class="flex items-center justify-center w-16 h-16 bg-blue-900 bg-opacity-50 rounded-full mb-6 mx-auto">
                        <span class="text-2xl font-bold text-blue-400">1</span>
                    </div>
                    <h3 class="text-xl font-bold text-white mb-3 text-center">Регистрация</h3>
                    <p class="text-gray-300 text-center">
                        Нажмите кнопку регистрации. Заполните свои данные, чтобы в течение секунд создать БЕСПЛАТНЫЙ аккаунт {{$settings->site_name}}.
                    </p>

                    <svg class="absolute -bottom-3 -right-3 h-12 w-12 text-blue-500 opacity-20" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M12 22C6.477 22 2 17.523 2 12S6.477 2 12 2s10 4.477 10 10-4.477 10-10 10zm0-2a8 8 0 1 0 0-16 8 8 0 0 0 0 16zm-1-5h2v2h-2v-2zm2-1.645V14h-2v-1.5a1 1 0 0 1 1-1 1.5 1.5 0 1 0-1.471-1.794l-1.962-.393A3.5 3.5 0 1 1 13 13.355z"/>
                    </svg>
                </div>
            </div>

            <!-- Step 2 -->
            <div class="relative">
                <div class="absolute -inset-0.5 bg-gradient-to-r from-emerald-500 to-blue-600 rounded-xl blur opacity-30"></div>
                <div class="bg-gray-800 bg-opacity-80 backdrop-filter backdrop-blur-sm rounded-xl p-6 border border-gray-700 relative h-full">
                    <div class="flex items-center justify-center w-16 h-16 bg-emerald-900 bg-opacity-50 rounded-full mb-6 mx-auto">
                        <span class="text-2xl font-bold text-emerald-400">2</span>
                    </div>
                    <h3 class="text-xl font-bold text-white mb-3 text-center">Выберите Инвестиционный План</h3>
                    <p class="text-gray-300 text-center">
                        Мы предлагаем различные инвестиционные планы, соответствующие вашим финансовым целям. После изучения сделайте депозит.
                    </p>

                    <svg class="absolute -bottom-3 -right-3 h-12 w-12 text-emerald-500 opacity-20" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M12 22C6.477 22 2 17.523 2 12S6.477 2 12 2s10 4.477 10 10-4.477 10-10 10zm-3-12a3 3 0 1 1 6 0 3 3 0 0 1-6 0zm3 5c2.623 0 4.146.826 5 1.755V14a7 7 0 1 0-10 0v2.755c.854-.929 2.377-1.755 5-1.755z"/>
                    </svg>
                </div>
            </div>

            <!-- Step 3 -->
            <div class="relative">
                <div class="absolute -inset-0.5 bg-gradient-to-r from-blue-600 to-purple-500 rounded-xl blur opacity-30"></div>
                <div class="bg-gray-800 bg-opacity-80 backdrop-filter backdrop-blur-sm rounded-xl p-6 border border-gray-700 relative h-full">
                    <div class="flex items-center justify-center w-16 h-16 bg-blue-900 bg-opacity-50 rounded-full mb-6 mx-auto">
                        <span class="text-2xl font-bold text-blue-400">3</span>
                    </div>
                    <h3 class="text-xl font-bold text-white mb-3 text-center">Начните Получать Прибыль</h3>
                    <p class="text-gray-300 text-center">
                        После внесения депозита наблюдайте за ростом своего капитала, накапливая ежедневную прибыль в режиме реального времени.
                    </p>

                    <svg class="absolute -bottom-3 -right-3 h-12 w-12 text-blue-500 opacity-20" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M12 22C6.477 22 2 17.523 2 12S6.477 2 12 2s10 4.477 10 10-4.477 10-10 10zm1-10V7h-2v5H8l4 4 4-4h-3z"/>
                    </svg>
                </div>
            </div>
        </div>

        <div class="mt-12 text-center">
            <a href="register" class="inline-flex items-center px-6 py-3 bg-gradient-to-r from-blue-600 to-emerald-500 text-white font-medium rounded-lg transition duration-300 transform hover:scale-105">
                <span>Начните Свое Путешествие Сейчас</span>
                <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                </svg>
            </a>
        </div>
    </div>
</section>            <!---->
            <section class="text-columns">
              <div class="container">
                <h1 class="page-intro__title" id="classs"style="color: #69e2b0;">УНИКАЛЬНЫЙ ТОРГОВЫЙ РОБОТ ДЛЯ ТОРГОВЛИ</h1>
                <div class="typography">
                  <p>УНИКАЛЬНЫЙ ТОРГОВЫЙ РОБОТ ДЛЯ ТОРГОВЛИ Робот {{$settings->site_name}} является уникальным торговым инструментом для получения прибыли на этапах роста и падения криптовалютного рынка. Операции управляются без вмешательства пользователя. Работа робота полностью автоматизирована и не может содержать ошибок использования. Робот генерирует курс Bitcoin, принося пользу компании. Основным условием сотрудничества с {{$settings->site_name}} является наличие активного депозита для получения инвестиционной прибыли в будущем.</p>
                </div>
              </div>
            </section>

<!-- Trading Robot Section -->
<section class="py-16 bg-gray-900 relative overflow-hidden">
    <!-- Background pattern -->
    <div class="absolute inset-0 opacity-5">
        <svg width="100%" height="100%" xmlns="http://www.w3.org/2000/svg">
            <defs>
                <pattern id="circuit-pattern" width="100" height="100" patternUnits="userSpaceOnUse">
                    <path d="M0 50h40v-5h10v10h10v-15h10v20h30" stroke="currentColor" stroke-width="0.5" fill="none"/>
                    <path d="M0 25h20v15h10v-10h15v20h15v-30h40" stroke="currentColor" stroke-width="0.5" fill="none"/>
                    <path d="M0 75h25v-10h10v15h15v-20h50" stroke="currentColor" stroke-width="0.5" fill="none"/>
                </pattern>
            </defs>
            <rect width="100%" height="100%" fill="url(#circuit-pattern)" />
        </svg>
    </div>

    <div class="container mx-auto px-4 relative">
        <div class="text-center mb-12">
            <div class="inline-block px-3 py-1 text-xs font-semibold tracking-wider text-blue-400 uppercase bg-blue-900 bg-opacity-30 rounded-full mb-4">
                Передовые Технологии
            </div>
            <h2 class="text-3xl md:text-4xl font-bold text-emerald-400 mb-4">Лучшие Трейдеры {{$settings->site_name}}</h2>
            <p class="max-w-3xl mx-auto text-gray-300">
                В нашей компании работают лучшие разработчики криптовалют с богатым опытом и глубоким пониманием рынков криптовалют. Они подняли {{$settings->site_name}} до мирового уровня развития.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mt-12">
            <!-- Feature 1 -->
            <div class="relative group">
                <div class="absolute -inset-0.5 bg-gradient-to-r from-blue-600 to-emerald-500 rounded-xl blur opacity-30 group-hover:opacity-60 transition duration-300"></div>
                <div class="bg-gray-800 bg-opacity-80 backdrop-filter backdrop-blur-sm rounded-xl p-6 border border-gray-700 relative h-full group-hover:border-emerald-500 transition duration-300">
                    <div class="w-16 h-16 rounded-full bg-blue-900 bg-opacity-30 flex items-center justify-center mx-auto mb-6">
                        <svg class="w-8 h-8 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-white mb-3 text-center">Уникальный Торговый Бот</h3>
                    <p class="text-gray-300 text-center">
                        Команда профессионалов {{$settings->site_name}} создала уникального торгового робота, который генерирует прибыль на каждом этапе рынка, будь то рост или падение.
                    </p>
                </div>
            </div>

            <!-- Feature 2 -->
            <div class="relative group">
                <div class="absolute -inset-0.5 bg-gradient-to-r from-emerald-500 to-blue-600 rounded-xl blur opacity-50 group-hover:opacity-80 transition duration-300"></div>
                <div class="bg-gray-800 bg-opacity-80 backdrop-filter backdrop-blur-sm rounded-xl p-6 border border-gray-700 relative h-full group-hover:border-emerald-500 transition duration-300">
                    <div class="w-16 h-16 rounded-full bg-emerald-900 bg-opacity-30 flex items-center justify-center mx-auto mb-6">
                        <svg class="w-8 h-8 text-emerald-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-white mb-3 text-center">Стабильные и Автоматические Инвестиции</h3>
                    <p class="text-gray-300 text-center">
                        Робот работает независимо от человеческих ошибок, делая все инвестиции надежными и полностью безопасными для наших клиентов.
                    </p>
                </div>
            </div>

            <!-- Feature 3 -->
            <div class="relative group">
                <div class="absolute -inset-0.5 bg-gradient-to-r from-blue-600 to-purple-500 rounded-xl blur opacity-30 group-hover:opacity-60 transition duration-300"></div>
                <div class="bg-gray-800 bg-opacity-80 backdrop-filter backdrop-blur-sm rounded-xl p-6 border border-gray-700 relative h-full group-hover:border-emerald-500 transition duration-300">
                    <div class="w-16 h-16 rounded-full bg-purple-900 bg-opacity-30 flex items-center justify-center mx-auto mb-6">
                        <svg class="w-8 h-8 text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-white mb-3 text-center">Экспертное Управление</h3>
                    <p class="text-gray-300 text-center">
                        Высокопrofессиональная команда {{$settings->site_name}} контролирует все торговые процессы 24/7. Наблюдайте за ростом своего капитала в режиме реального времени после инвестирования.
                    </p>
                </div>
            </div>
        </div>
        <div class="mt-12 text-center">
            <p class="text-gray-300 mb-6 max-w-3xl mx-auto">
                Эксперты {{$settings->site_name}} работают 24/7, чтобы обеспечить стабильную работу платформы. Наш торговый робот обеспечивает максимальную эффективность и минимизирует человеческий фактор в торговых операциях.
            </p>
            <a href="login" class="inline-flex items-center px-6 py-3 bg-gradient-to-r from-blue-600 to-emerald-500 text-white font-medium rounded-lg transition duration-300 transform hover:scale-105">
                <span>ИНВЕСТИРУЙТЕ С НАМИ И ПОЛУЧАЙТЕ СТАБИЛЬНЫЙ ДОХОД</span>
                <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                </svg>
            </a>
        </div>
              </div>
            </section>

<!-- Payment Methods Section -->
<section class="py-16 bg-gray-900 relative overflow-hidden">
    <!-- Background pattern -->
    <div class="absolute inset-0 opacity-10">
        <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%">
            <defs>
                <pattern id="payment-grid" width="40" height="40" patternUnits="userSpaceOnUse">
                    <path d="M0 20h40M20 0v40" fill="none" stroke="currentColor" stroke-width="0.5" opacity="0.5"/>
                </pattern>
            </defs>
            <rect width="100%" height="100%" fill="url(#payment-grid)"/>
        </svg>
    </div>

    <div class="container mx-auto px-4 relative">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 items-center">
            <!-- Payment Methods Images -->
            <div class="relative order-2 md:order-1">
                <div class="absolute -inset-0.5 bg-gradient-to-r from-blue-600 to-emerald-500 rounded-xl blur opacity-30"></div>
                <div class="bg-gray-800 bg-opacity-80 backdrop-filter backdrop-blur-sm rounded-xl p-6 border border-gray-700 relative">
                    <div class="grid grid-cols-3 gap-4">
                        <!-- Bitcoin -->
                        <div class="bg-gray-900 bg-opacity-70 rounded-lg p-3 flex items-center justify-center">
                            <img src="{{asset('dash/bitcoin-btc-logo.png')}}" alt="Bitcoin" class="h-12 w-auto">
                        </div>
                        <!-- Ethereum -->
                        <div class="bg-gray-900 bg-opacity-70 rounded-lg p-3 flex items-center justify-center">
                            <img src="{{asset('dash/ethereum-eth-logo.png')}}" alt="Ethereum" class="h-12 w-auto">
                        </div>
                        <!-- USDT -->
                        <div class="bg-gray-900 bg-opacity-70 rounded-lg p-3 flex items-center justify-center">
                            <img src="{{asset('dash/tether-usdt-logo.png')}}" alt="USDT" class="h-12 w-auto">
                        </div>
                        <!-- Credit Card -->
                        <div class="bg-gray-900 bg-opacity-70 rounded-lg p-3 flex items-center justify-center">
                            <svg class="h-10 w-10 text-gray-200" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M20 4H4c-1.11 0-1.99.89-1.99 2L2 18c0 1.11.89 2 2 2h16c1.11 0 2-.89 2-2V6c0-1.11-.89-2-2-2zm0 14H4v-6h16v6zm0-10H4V6h16v2z"/>
                            </svg>
                        </div>
                        <!-- Bank Transfer -->
                        <div class="bg-gray-900 bg-opacity-70 rounded-lg p-3 flex items-center justify-center">
                            <svg class="h-10 w-10 text-gray-200" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M4 10v7h3v-7H4zm6 0v7h3v-7h-3zM2 22h19v-3H2v3zm14-12v7h3v-7h-3zm-4.5-9L2 6v2h19V6l-9.5-5z"/>
                            </svg>
                        </div>
                        <!-- E-wallet -->
                        <div class="bg-gray-900 bg-opacity-70 rounded-lg p-3 flex items-center justify-center">
                            <svg class="h-10 w-10 text-gray-200" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M21 18v1c0 1.1-.9 2-2 2H5a2 2 0 01-2-2V5a2 2 0 012-2h14c1.1 0 2 .9 2 2v1h-9a2 2 0 00-2 2v8a2 2 0 002 2h9zm-9-2h10V8H12v8zm4-2.5c-.83 0-1.5-.67-1.5-1.5s.67-1.5 1.5-1.5 1.5.67 1.5 1.5-.67 1.5-1.5 1.5z"/>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Payment Info -->
            <div class="order-1 md:order-2">
                <div class="inline-block px-3 py-1 text-xs font-semibold tracking-wider text-blue-400 uppercase bg-blue-900 bg-opacity-30 rounded-full mb-4">
                    Простые Операции
                </div>
                <h2 class="text-3xl font-bold text-white mb-4">Платежные Системы</h2>
                <p class="text-gray-300 mb-4">
                    {{$settings->site_name}} поддерживает широкий спектр платежных систем для вашего удобства.
                </p>
                <div class="bg-gray-800 bg-opacity-50 rounded-lg p-4 mb-6 border border-gray-700">
                    <p class="text-gray-300">
                        Наша компания не взимает комиссию за открытие депозита или вывод средств с платформы.
                    </p>
                </div>
                <a href="login" class="inline-flex items-center px-6 py-3 bg-gradient-to-r from-blue-600 to-emerald-500 text-white font-medium rounded-lg transition duration-300 transform hover:scale-105">
                    <span>НАЧАТЬ ИНВЕСТИРОВАТЬ СЕЙЧАС</span>
                    <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                    </svg>
                </a>
            </div>
        </div>
    </div>
</section>


    <div id="button-up">
        <i class="fa fa-chevron-up"></i>
    </div>    <link rel="stylesheet" href="https:/cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<style>
	    #button-up{
display: none;
position: fixed;
right: 20px;
bottom: 60px;
color: #000;
background-color: white;
text-align: center;
font-size: 30px;
padding: 3px 10px 10px 10px;
transition: .3s;
border-radius: 50px;
width: 50px;
height: 50px;
z-index: 9999;
    }

    #button-up:hover{
      cursor: pointer;
      background-color: #E8E8E8;
      transition: .3s;
    }
	</style>
	    <script>
    $(document).ready(function() {
      var button = $('#button-up');
      $(window).scroll (function () {
        if ($(this).scrollTop () > 300) {
          button.fadeIn();
        } else {
          button.fadeOut();
        }
    });
    button.on('click', function(){
    $('body, html').animate({
    scrollTop: 0
    }, 800);
    return false;
    });
    });
    </script><script ></script>

 @endsection
