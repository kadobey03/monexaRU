@extends('layouts.base')
@inject('content', 'App\Http\Controllers\FrontController')
@section('title', 'Образовательный Центр')

@section('content')

<!-- Hero Section -->
<section class="relative bg-gray-900 overflow-hidden">
    <!-- Background with overlay -->
    <div class="absolute inset-0 bg-gradient-to-r from-gray-900 via-gray-800 to-gray-900">
        <div class="absolute inset-0 bg-gray-900 opacity-70"></div>
        <!-- Abstract data pattern background -->
        <div class="absolute inset-0 opacity-10">
            <svg class="h-full w-full" viewBox="0 0 100 100" preserveAspectRatio="none">
                <path d="M0,0 L100,0 L100,100 L0,100 Z" fill="url(#grid-pattern)"></path>
                <defs>
                    <pattern id="grid-pattern" width="4" height="4" patternUnits="userSpaceOnUse">
                        <path d="M0 0h4v4H0V0zm2 2h2v2H2V2z" fill="currentColor"></path>
                    </pattern>
                </defs>
            </svg>
        </div>
        <!-- Glowing accent elements -->
        <div class="absolute top-1/4 left-1/4 w-64 h-64 bg-blue-500 rounded-full filter blur-3xl opacity-20"></div>
        <div class="absolute bottom-1/4 right-1/4 w-80 h-80 bg-emerald-400 rounded-full filter blur-3xl opacity-10"></div>
    </div>

    <div class="container mx-auto px-4 py-24 relative z-10">
        <div class="max-w-4xl mx-auto text-center">
            <div class="inline-block px-3 py-1 text-xs font-semibold tracking-wider text-emerald-400 uppercase bg-emerald-900 bg-opacity-30 rounded-full mb-6">
                Знание - Сила
            </div>
            <h1 class="text-4xl md:text-5xl font-bold text-white mb-6">Образовательный Центр</h1>
            <p class="text-xl text-gray-300 mb-10 max-w-2xl mx-auto">
                Освойте финансовые рынки с помощью наших комплексных образовательных ресурсов, предназначенных для трейдеров всех уровней.
            </p>

            <script type="application/ld+json">
                {
                    "@@context": "http://schema.org",
                    "@@type": "BreadcrumbList",
                    "itemListElement": [
                        {
                            "@@type": "ListItem",
                            "position": 1,
                            "item": {
                                "@@id": "{{$settings->site_address}}",
                                "name": "{{$settings->name}}"
                            }
                        },
                        {
                            "@@type": "ListItem",
                            "position": 2,
                            "item": {
                                "@@id": "{{$settings->site_address}}for-traders",
                                "name": "Для Трейдеров"
                            }
                        }
                    ]
                }
            </script>

            <div class="flex justify-center mt-8">
                <a href="#markets" class="px-6 py-3 bg-blue-600 hover:bg-blue-700 text-white font-medium rounded-lg flex items-center transition duration-300">
                    <span>Изучить Рынки</span>
                    <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                    </svg>
                </a>
            </div>
        </div>
    </div>
</section>

<!-- Markets Education Section -->
<section id="markets" class="py-16 bg-gray-900">
    <div class="container mx-auto px-4">
        <div class="text-center mb-12">
            <div class="inline-block px-3 py-1 text-xs font-semibold tracking-wider text-blue-400 uppercase bg-blue-900 bg-opacity-30 rounded-full mb-4">
                Торговое Образование
            </div>
            <h2 class="text-3xl font-bold text-white mb-4">Развивайте Свои Торговые Навыки</h2>
            <p class="text-gray-300 max-w-2xl mx-auto">
                Обучайтесь с помощью наших комплексных ресурсов и укрепляйте свои торговые стратегии с помощью надежных торговых инструментов.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <!-- Forex Card -->
            <div class="relative group" x-data="{ hover: false }" @mouseenter="hover = true" @mouseleave="hover = false">
                <div class="absolute -inset-0.5 bg-gradient-to-r from-blue-600 to-emerald-500 rounded-xl blur opacity-30 group-hover:opacity-70 transition duration-300"></div>
                <div class="relative bg-gray-800 bg-opacity-80 backdrop-filter backdrop-blur-sm p-6 rounded-xl border border-gray-700 group-hover:border-blue-500 transition duration-300 h-full">
                    <div class="flex items-center mb-4">
                        <div class="w-12 h-12 rounded-full bg-blue-900 bg-opacity-50 flex items-center justify-center mr-4">
                            <svg class="w-6 h-6 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold text-white">Forex</h3>
                    </div>

                    <p class="text-gray-300 mb-4">
                        Forex - это сокращение от иностранного обмена валюты. Рынок Forex - это место, где торгуют валютами. По состоянию на 2019 год это крупнейший и наиболее ликвидный финансовый рынок в мире с ежедневным средним оборотом 6,6 триллиона долларов США. Основа рынка Forex - колебания валютных курсов. Трейдеры Forex спекулируют на колебаниях цен валютных пар и зарабатывают на разнице между ценами покупки и продажи.
                    </p>

                    <div class="mt-4 flex justify-end">
                        <span class="text-blue-400 group-hover:text-blue-300 transition duration-300 flex items-center">
                            Узнать Больше
                            <svg class="w-5 h-5 ml-1 transform group-hover:translate-x-1 transition duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                            </svg>
                        </span>
                    </div>
                </div>
            </div>

            <!-- CFD Card -->
            <div class="relative group" x-data="{ hover: false }" @mouseenter="hover = true" @mouseleave="hover = false">
                <div class="absolute -inset-0.5 bg-gradient-to-r from-emerald-500 to-blue-600 rounded-xl blur opacity-30 group-hover:opacity-70 transition duration-300"></div>
                <div class="relative bg-gray-800 bg-opacity-80 backdrop-filter backdrop-blur-sm p-6 rounded-xl border border-gray-700 group-hover:border-emerald-500 transition duration-300 h-full">
                    <div class="flex items-center mb-4">
                        <div class="w-12 h-12 rounded-full bg-emerald-900 bg-opacity-50 flex items-center justify-center mr-4">
                            <svg class="w-6 h-6 text-emerald-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold text-white">CFD</h3>
                    </div>

                    <p class="text-gray-300 mb-4">
                        CFD или Контракт на Разницу - это тип финансового инструмента, который позволяет торговать движениями цен акций независимо от того, растут или падают цены. Основное преимущество CFD - возможность спекулировать на движениях цен актива (вверх или вниз) без фактического владения базовым активом.
                    </p>

                    <div class="mt-4 flex justify-end">
                        <span class="text-emerald-400 group-hover:text-emerald-300 transition duration-300 flex items-center">
                            Узнать Больше
                            <svg class="w-5 h-5 ml-1 transform group-hover:translate-x-1 transition duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                            </svg>
                        </span>
                    </div>
                </div>
            </div>

            <!-- Cryptocurrency Card -->
            <div class="relative group" x-data="{ hover: false }" @mouseenter="hover = true" @mouseleave="hover = false">
                <div class="absolute -inset-0.5 bg-gradient-to-r from-purple-600 to-blue-500 rounded-xl blur opacity-30 group-hover:opacity-70 transition duration-300"></div>
                <div class="relative bg-gray-800 bg-opacity-80 backdrop-filter backdrop-blur-sm p-6 rounded-xl border border-gray-700 group-hover:border-purple-500 transition duration-300 h-full">
                    <div class="flex items-center mb-4">
                        <div class="w-12 h-12 rounded-full bg-purple-900 bg-opacity-50 flex items-center justify-center mr-4">
                            <svg class="w-6 h-6 text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold text-white">Криптовалюта</h3>
                    </div>

                    <p class="text-gray-300 mb-4">
                        Криптовалюта - это цифровой актив, предназначенный для работы в качестве средства обмена; где записи о владении отдельными монетами, записи транзакций хранятся в распределенном реестре в форме компьютерной базы данных с использованием мощной криптографии для защиты записей транзакций, контроля создания дополнительных монет и проверки передачи владения монетами.
                    </p>

                    <div class="mt-4 flex justify-end">
                        <span class="text-purple-400 group-hover:text-purple-300 transition duration-300 flex items-center">
                            Узнать Больше
                            <svg class="w-5 h-5 ml-1 transform group-hover:translate-x-1 transition duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                            </svg>
                        </span>
                    </div>
                </div>
            </div>

            <!-- Digital Options Card -->
            <div class="relative group" x-data="{ hover: false }" @mouseenter="hover = true" @mouseleave="hover = false">
                <div class="absolute -inset-0.5 bg-gradient-to-r from-blue-600 to-indigo-500 rounded-xl blur opacity-30 group-hover:opacity-70 transition duration-300"></div>
                <div class="relative bg-gray-800 bg-opacity-80 backdrop-filter backdrop-blur-sm p-6 rounded-xl border border-gray-700 group-hover:border-indigo-500 transition duration-300 h-full">
                    <div class="flex items-center mb-4">
                        <div class="w-12 h-12 rounded-full bg-indigo-900 bg-opacity-50 flex items-center justify-center mr-4">
                            <svg class="w-6 h-6 text-indigo-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7h12m0 0l-4-4m4 4l-4 4m0 6H4m0 0l4 4m-4-4l4-4"></path>
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold text-white">Цифровые Опционы</h3>
                    </div>

                    <p class="text-gray-300 mb-4">
                        Цифровые Опционы - это торговый инструмент, который позволяет спекулировать на величине изменения цены, а не на общем направлении цены. Если цена базового актива достигает порогового значения, выбранного трейдером (известного как 'страйк-цена'), выплата может достигать 900%. Однако неудачная торговля приводит к потере инвестиций.
                    </p>

                    <div class="mt-4 flex justify-end">
                        <span class="text-indigo-400 group-hover:text-indigo-300 transition duration-300 flex items-center">
                            Узнать Больше
                            <svg class="w-5 h-5 ml-1 transform group-hover:translate-x-1 transition duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                            </svg>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- More to Explore Section -->
<section class="py-16 bg-gray-800 relative">
    <!-- Background pattern -->
    <div class="absolute inset-0 opacity-10">
        <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%">
            <pattern id="trading-grid" width="50" height="50" patternUnits="userSpaceOnUse">
                <path d="M25,0 L25,50 M0,25 L50,25" stroke="currentColor" stroke-width="0.5"/>
                <circle cx="25" cy="25" r="1" fill="currentColor"/>
            </pattern>
            <rect width="100%" height="100%" fill="url(#trading-grid)"/>
        </svg>
    </div>

    <div class="container mx-auto px-4 relative">
        <div class="text-center mb-12">
            <div class="inline-block px-3 py-1 text-xs font-semibold tracking-wider text-emerald-400 uppercase bg-emerald-900 bg-opacity-30 rounded-full mb-4">
                Торговый Инструментарий
            </div>
            <h2 class="text-3xl font-bold text-white mb-4">Больше для Исследования</h2>
            <p class="text-gray-300 max-w-2xl mx-auto">
                Исследуйте наши расширенные торговые функции, предназначенные для улучшения вашего торгового опыта и результатов.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6" x-data="{ activeCard: null }">
            <!-- Ultimate Platform Card -->
            <div class="relative h-full group"
                x-on:mouseenter="activeCard = 1"
                x-on:mouseleave="activeCard = null">
                <div class="absolute -inset-0.5 bg-gradient-to-r from-blue-600 to-emerald-500 rounded-xl blur opacity-30"
                    x-bind:class="{ 'opacity-70': activeCard === 1 }"></div>
                <div class="relative bg-gray-900 bg-opacity-90 backdrop-filter backdrop-blur-sm p-6 rounded-xl border border-gray-700 h-full flex flex-col transition duration-300"
                    x-bind:class="{ 'border-blue-500 transform scale-[1.02]': activeCard === 1 }">
                    <div class="w-16 h-16 rounded-full bg-blue-900 bg-opacity-50 flex items-center justify-center mb-6 mx-auto">
                        <svg class="w-8 h-8 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                        </svg>
                    </div>

                    <h3 class="text-xl font-bold text-white mb-4 text-center">Идеальная Платформа</h3>

                    <p class="text-gray-300 flex-grow">
                        Множественные графики, технический анализ, исторические цены и многое другое. Все, что вы ищете в платформе — на вашем предпочтительном устройстве.
                    </p>

                    <div class="mt-6 pt-4 border-t border-gray-700" x-show="activeCard === 1" x-transition>
                        <a href="#" class="flex items-center justify-center text-emerald-400 hover:text-emerald-300 transition">
                            <span>Исследовать Платформу</span>
                            <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Analysis & Alerts Card -->
            <div class="relative h-full group"
                x-on:mouseenter="activeCard = 2"
                x-on:mouseleave="activeCard = null">
                <div class="absolute -inset-0.5 bg-gradient-to-r from-emerald-500 to-blue-600 rounded-xl blur opacity-30"
                    x-bind:class="{ 'opacity-70': activeCard === 2 }"></div>
                <div class="relative bg-gray-900 bg-opacity-90 backdrop-filter backdrop-blur-sm p-6 rounded-xl border border-gray-700 h-full flex flex-col transition duration-300"
                    x-bind:class="{ 'border-emerald-500 transform scale-[1.02]': activeCard === 2 }">
                    <div class="w-16 h-16 rounded-full bg-emerald-900 bg-opacity-50 flex items-center justify-center mb-6 mx-auto">
                        <svg class="w-8 h-8 text-emerald-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 12l3-3 3 3 4-4M8 21l4-4 4 4M3 4h18M4 4h16v12a1 1 0 01-1 1H5a1 1 0 01-1-1V4z"></path>
                        </svg>
                    </div>

                    <h3 class="text-xl font-bold text-white mb-4 text-center">Анализ и Уведомления</h3>

                    <p class="text-gray-300 flex-grow">
                        В полной мере используйте фундаментальный и технический анализ с помощью наших новостных лент и экономических календарей. Более 100 наиболее часто используемых технических индикаторов.
                    </p>

                    <div class="mt-6 pt-4 border-t border-gray-700" x-show="activeCard === 2" x-transition>
                        <a href="#" class="flex items-center justify-center text-emerald-400 hover:text-emerald-300 transition">
                            <span>Посмотреть Инструменты</span>
                            <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Demo Account Card -->
            <div class="relative h-full group"
                x-on:mouseenter="activeCard = 3"
                x-on:mouseleave="activeCard = null">
                <div class="absolute -inset-0.5 bg-gradient-to-r from-purple-600 to-blue-500 rounded-xl blur opacity-30"
                    x-bind:class="{ 'opacity-70': activeCard === 3 }"></div>
                <div class="relative bg-gray-900 bg-opacity-90 backdrop-filter backdrop-blur-sm p-6 rounded-xl border border-gray-700 h-full flex flex-col transition duration-300"
                    x-bind:class="{ 'border-purple-500 transform scale-[1.02]': activeCard === 3 }">
                    <div class="w-16 h-16 rounded-full bg-purple-900 bg-opacity-50 flex items-center justify-center mb-6 mx-auto">
                        <svg class="w-8 h-8 text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4"></path>
                        </svg>
                    </div>

                    <h3 class="text-xl font-bold text-white mb-4 text-center">Демо-Аккаунт</h3>

                    <p class="text-gray-300 flex-grow">
                        Освойте свои навыки с помощью демо/тренировочного аккаунта и образовательного контента. Практикуйтесь с виртуальными средствами в реальных рыночных условиях без какого-либо риска.
                    </p>

                    <div class="mt-6 pt-4 border-t border-gray-700" x-show="activeCard === 3" x-transition>
                        <a href="#" class="flex items-center justify-center text-emerald-400 hover:text-emerald-300 transition">
                            <span>Запустить Демо</span>
                            <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Risk Management Card -->
            <div class="relative h-full group"
                x-on:mouseenter="activeCard = 4"
                x-on:mouseleave="activeCard = null">
                <div class="absolute -inset-0.5 bg-gradient-to-r from-blue-600 to-indigo-500 rounded-xl blur opacity-30"
                    x-bind:class="{ 'opacity-70': activeCard === 4 }"></div>
                <div class="relative bg-gray-900 bg-opacity-90 backdrop-filter backdrop-blur-sm p-6 rounded-xl border border-gray-700 h-full flex flex-col transition duration-300"
                    x-bind:class="{ 'border-indigo-500 transform scale-[1.02]': activeCard === 4 }">
                    <div class="w-16 h-16 rounded-full bg-indigo-900 bg-opacity-50 flex items-center justify-center mb-6 mx-auto">
                        <svg class="w-8 h-8 text-indigo-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                        </svg>
                    </div>

                    <h3 class="text-xl font-bold text-white mb-4 text-center">Управление Рисками</h3>

                    <p class="text-gray-300 flex-grow">
                        Управляйте своими потерями и прибылями на заранее определенных уровнях с помощью таких функций, как Stop Loss/Take Profit, защита от отрицательного баланса и Trailing Stop.
                    </p>

                    <div class="mt-6 pt-4 border-t border-gray-700" x-show="activeCard === 4" x-transition>
                        <a href="#" class="flex items-center justify-center text-emerald-400 hover:text-emerald-300 transition">
                            <span>Узнать Больше</span>
                            <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Call to Action Section -->
<section class="py-16 bg-gray-900 relative">
    <div class="absolute inset-0 bg-gradient-to-r from-blue-900 to-gray-900 opacity-50"></div>
    <div class="absolute bottom-0 left-0 right-0">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
            <path fill="rgba(17, 24, 39, 1)" fill-opacity="1" d="M0,224L40,213.3C80,203,160,181,240,181.3C320,181,400,203,480,218.7C560,235,640,245,720,229.3C800,213,880,171,960,165.3C1040,160,1120,192,1200,192C1280,192,1360,160,1400,144L1440,128L1440,320L1400,320C1360,320,1280,320,1200,320C1120,320,1040,320,960,320C880,320,800,320,720,320C640,320,560,320,480,320C400,320,320,320,240,320C160,320,80,320,40,320L0,320Z"></path>
        </svg>
    </div>

    <div class="container mx-auto px-4 relative z-10">
        <div class="max-w-4xl mx-auto bg-gray-800 bg-opacity-80 backdrop-filter backdrop-blur-sm rounded-xl p-8 border border-gray-700">
            <div class="text-center">
                <h2 class="text-3xl font-bold text-white mb-4">Готовы к Торговле?</h2>
                <p class="text-gray-300 mb-8 max-w-2xl mx-auto">
                    Примените свои знания и начните свое торговое путешествие с нашей продвинутой платформой. Создайте аккаунт сегодня и получите доступ ко всем нашим образовательным ресурсам.
                </p>
                <div class="flex flex-col sm:flex-row justify-center gap-4">
                    <a href="register" class="px-6 py-3 bg-gradient-to-r from-blue-600 to-emerald-500 text-white font-medium rounded-lg transition duration-300 transform hover:scale-105 flex items-center justify-center">
                        <span>Создать Аккаунт</span>
                        <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                        </svg>
                    </a>
                    <a href="login" class="px-6 py-3 bg-gray-700 hover:bg-gray-600 text-white font-medium rounded-lg transition duration-300 flex items-center justify-center">
                        <span>Войти</span>
                        <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"></path>
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
