@extends('layouts.base')

@section('title', 'Условия и Политика Конфиденциальности')

@inject('content', 'App\Http\Controllers\FrontController')
@section('content')

<!-- Hero Section -->
<section class="relative overflow-hidden bg-gradient-to-br from-gray-900 to-gray-800">
    <!-- Abstract Background Elements -->
    <div class="absolute inset-0 z-20 md:z-0 pointer-events-none">
        <div class="absolute top-0 left-0 w-full h-full opacity-60 md:opacity-20">
            <svg class="absolute top-0 left-0 w-full h-full" viewBox="0 0 800 800" xmlns="http://www.w3.org/2000/svg">
                <defs>
                    <linearGradient id="a" x1="50%" x2="50%" y1="0%" y2="100%">
                        <stop stop-color="#3B82F6" stop-opacity=".25" offset="0%"/>
                        <stop stop-color="#10B981" stop-opacity=".2" offset="100%"/>
                    </linearGradient>
                </defs>
                <path fill="url(#a)" d="M400,115 C515.46,115 615,214.54 615,330 C615,445.46 515.46,545 400,545 C284.54,545 185,445.46 185,330 C185,214.54 284.54,115 400,115 Z" transform="translate(0 -50)" />
                <path fill="url(#a)" d="M400,115 C515.46,115 615,214.54 615,330 C615,445.46 515.46,545 400,545 C284.54,545 185,445.46 185,330 C185,214.54 284.54,115 400,115 Z" transform="translate(350 150)" />
            </svg>
        </div>
        <div class="absolute bottom-0 right-0 w-full h-full opacity-50 md:opacity-10">
            <svg width="100%" height="100%" viewBox="0 0 800 800" xmlns="http://www.w3.org/2000/svg">
                <g fill="none" stroke="#6366F1" stroke-width="2">
                    <path d="M769 229L1037 260.9M927 880L731 737 520 660 309 538 40 599 295 764"/>
                    <path d="M-4 44L190 190 731 737 520 660 309 538 40 599 295 764"/>
                    <path d="M-4 44L190 190 731 737M490 85L309 538 40 599 295 764"/>
                    <path d="M733 738L520 660M603 493L731 737M520 660L309 538"/>
                </g>
            </svg>
        </div>
    </div>

    <!-- Hero Content -->
    <div class="relative z-10 px-4 py-16 mx-auto max-w-7xl sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <div class="inline-block px-3 py-1 mb-4 text-xs font-semibold tracking-wider text-blue-400 uppercase bg-blue-900 bg-opacity-30 rounded-full">
                Правовые документы
            </div>
            <h1 class="text-3xl font-extrabold tracking-tight text-white sm:text-4xl md:text-5xl">
                <span class="block">Политика Конфиденциальности</span>
                <span class="block mt-1 text-transparent bg-clip-text bg-gradient-to-r from-blue-400 to-teal-400">Защита Ваших Данных</span>
            </h1>
            <p class="max-w-2xl mt-5 mx-auto text-xl text-gray-300">
                Узнайте, как мы защищаем вашу информацию и уважаем вашу конфиденциальность
            </p>
        </div>
    </div>
</section>

<!-- Privacy Policy Content -->
<section class="py-12 bg-gray-900">
    <div class="container max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="bg-gray-800 bg-opacity-70 backdrop-blur-sm rounded-2xl border border-gray-700 shadow-xl overflow-hidden">
            <div class="p-6 md:p-10">
                <!-- Policy Content -->
                <div class="prose prose-lg prose-invert max-w-none">
                    {!!$terms->description!!}
                </div>

                <!-- Call to Action -->
                <div class="mt-12 text-center" x-data="{ open: false }">
                    <button
                        @click="open = !open"
                        class="inline-flex items-center px-6 py-3 border border-transparent text-base font-medium rounded-md shadow-sm text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition duration-150">
                        <span x-text="open ? 'Скрыть Детали Защиты Данных' : 'Узнать Больше о Защите Данных'">Узнать Больше о Защите Данных</span>
                        <svg class="ml-2 -mr-1 h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                        </svg>
                    </button>

                    <div x-show="open"
                         x-transition:enter="transition ease-out duration-300"
                         x-transition:enter-start="opacity-0 transform scale-95"
                         x-transition:enter-end="opacity-100 transform scale-100"
                         x-transition:leave="transition ease-in duration-200"
                         x-transition:leave-start="opacity-100 transform scale-100"
                         x-transition:leave-end="opacity-0 transform scale-95"
                         class="mt-8 bg-gray-900 bg-opacity-50 p-6 rounded-xl backdrop-blur-sm border border-gray-700">
                        <p class="text-gray-300">
                            В {{ $settings->site_name }} мы очень серьезно относимся к защите данных. Все пользовательские данные шифруются и хранятся безопасно. Мы никогда не передаем вашу персональную информацию третьим лицам без вашего явного согласия и строго соблюдаем международные правила защиты данных.
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Quick Navigation -->
        <div class="mt-12 grid grid-cols-1 md:grid-cols-3 gap-6">
            <a href="/about" class="bg-gray-800 bg-opacity-50 backdrop-blur-sm p-6 rounded-xl border border-gray-700 hover:border-blue-500 transition-colors duration-300 group">
                <h3 class="text-lg font-semibold text-white mb-2 group-hover:text-blue-400">О Нас</h3>
                <p class="text-gray-400">Узнайте больше о нашей компании и нашей миссии</p>
            </a>
            <a href="/contact" class="bg-gray-800 bg-opacity-50 backdrop-blur-sm p-6 rounded-xl border border-gray-700 hover:border-blue-500 transition-colors duration-300 group">
                <h3 class="text-lg font-semibold text-white mb-2 group-hover:text-blue-400">Связаться с Нами</h3>
                <p class="text-gray-400">Есть вопросы о конфиденциальности? Свяжитесь с нами</p>
            </a>
            <a href="/register" class="bg-gray-800 bg-opacity-50 backdrop-blur-sm p-6 rounded-xl border border-gray-700 hover:border-blue-500 transition-colors duration-300 group">
                <h3 class="text-lg font-semibold text-white mb-2 group-hover:text-blue-400">Начать Торговлю</h3>
                <p class="text-gray-400">Создайте аккаунт для начала торговли</p>
            </a>
        </div>
    </div>
</section>

@endsection

@section('scripts')
@parent

@endsection
