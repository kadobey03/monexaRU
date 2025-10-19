@inject('uc', 'App\Http\Controllers\User\UsersController')
@php
    $array = \App\Models\User::all();
    $usr = Auth::user()->id;
@endphp
@extends('layouts.dasht')
@section('title', $title)
@section('content')
<div class="container mx-auto px-3 sm:px-4 lg:px-6 py-4 sm:py-6 lg:py-8"
     x-data="{
        showCopied: false,
        showQRCode: false,
        selectedTab: 'overview',
        searchQuery: '',
        showShareModal: false,
        shareToast: false
     }">

    <x-danger-alert />
    <x-success-alert />

    <!-- Header Section -->
    <div class="mb-6 sm:mb-8">
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
            <div>
                <h1 class="text-2xl sm:text-3xl font-bold text-white mb-2">Реферальная программа</h1>
                <p class="text-gray-400 text-sm sm:text-base">Расширьте свою сеть с {{ $settings->site_name }} и получайте награды</p>
            </div>
            <div class="flex flex-wrap gap-2">
                <button @click="showShareModal = true"
                        class="inline-flex items-center px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-lg transition-colors duration-200 text-sm font-medium">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.684 13.342C8.886 12.938 9 12.482 9 12c0-.482-.114-.938-.316-1.342m0 2.684a3 3 0 110-2.684m0 2.684l6.632 3.316m-6.632-6l6.632-3.316m0 0a3 3 0 105.367-2.684 3 3 0 00-5.367 2.684zm0 9.316a3 3 0 105.367 2.684 3 3 0 00-5.367-2.684z"></path>
                    </svg>
                    Поделиться программой
                </button>
                <button @click="showQRCode = !showQRCode"
                        class="inline-flex items-center px-4 py-2 bg-gray-600 hover:bg-gray-700 text-white rounded-lg transition-colors duration-200 text-sm font-medium">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v1m6 11h2m-6 0h-2v4m0-11v3m0 0h.01M12 12h4.01M16 20h4M4 12h4m12 0h2M5 8h2a1 1 0 001-1V5a1 1 0 00-1-1H5a1 1 0 00-1 1v2a1 1 0 001 1zm12 0h2a1 1 0 001-1V5a1 1 0 00-1-1h-2a1 1 0 00-1 1v2a1 1 0 001 1zM5 20h2a1 1 0 001-1v-2a1 1 0 00-1-1H5a1 1 0 00-1 1v2a1 1 0 001 1z"></path>
                    </svg>
                    QR Kod
                </button>
            </div>
        </div>
    </div>

    <!-- Statistics Cards -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 sm:gap-6 mb-6 sm:mb-8">
        <div class="bg-gray-900 rounded-xl p-4 sm:p-6 border border-gray-800">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-gray-400 text-xs sm:text-sm font-medium">Всего рефералов</p>
                    <p class="text-white text-xl sm:text-2xl font-bold mt-1">{{ count($array->where('ref_by', Auth::user()->id)) }}</p>
                </div>
                <div class="bg-blue-600/10 p-2 sm:p-3 rounded-lg">
                    <svg class="w-5 h-5 sm:w-6 sm:h-6 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                    </svg>
                </div>
            </div>
            <div class="mt-3 sm:mt-4">
                <span class="text-green-500 text-xs sm:text-sm font-medium">В этом месяце +12%</span>
            </div>
        </div>

        <div class="bg-gray-900 rounded-xl p-4 sm:p-6 border border-gray-800">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-gray-400 text-xs sm:text-sm font-medium">Общий доход</p>
                    <p class="text-white text-xl sm:text-2xl font-bold mt-1">${{ number_format(Auth::user()->ref_earnings ?? 0, 2) }}</p>
                </div>
                <div class="bg-green-600/10 p-2 sm:p-3 rounded-lg">
                    <svg class="w-5 h-5 sm:w-6 sm:h-6 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1"></path>
                    </svg>
                </div>
            </div>
            <div class="mt-3 sm:mt-4">
                <span class="text-green-500 text-xs sm:text-sm font-medium">В этом месяце +8.3%</span>
            </div>
        </div>

        <div class="bg-gray-900 rounded-xl p-4 sm:p-6 border border-gray-800">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-gray-400 text-xs sm:text-sm font-medium">Ваш уровень</p>
                    <p class="text-white text-xl sm:text-2xl font-bold mt-1">
                        @php
                            $referralCount = count($array->where('ref_by', Auth::user()->id));
                            if($referralCount >= 100) echo 'Элитный';
                            elseif($referralCount >= 50) echo 'Золото';
                            elseif($referralCount >= 25) echo 'Серебро';
                            elseif($referralCount >= 10) echo 'Бронза';
                            else echo 'Начинающий';
                        @endphp
                    </p>
                </div>
                <div class="bg-purple-600/10 p-2 sm:p-3 rounded-lg">
                    <svg class="w-5 h-5 sm:w-6 sm:h-6 text-purple-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3l1.168 4.312L18 8.8l-5.045 2.57L14.8 18H9.2l1.845-6.63L6 8.8l4.832-1.488L12 3z"></path>
                    </svg>
                </div>
            </div>
            <div class="mt-3 sm:mt-4">
                <div class="w-full bg-gray-700 rounded-full h-2">
                    <div class="bg-purple-600 h-2 rounded-full" style="width: {{ min(100, ($referralCount % 25) * 4) }}%"></div>
                </div>
            </div>
        </div>

        <div class="bg-gray-900 rounded-xl p-4 sm:p-6 border border-gray-800">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-gray-400 text-xs sm:text-sm font-medium">Пригласивший</p>
                    <p class="text-white text-lg sm:text-xl font-bold mt-1">{{ $uc->getUserParent($usr) ?: 'Прямая регистрация' }}</p>
                </div>
                <div class="bg-amber-600/10 p-2 sm:p-3 rounded-lg">
                    <svg class="w-5 h-5 sm:w-6 sm:h-6 text-amber-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                    </svg>
                </div>
            </div>
        </div>
    </div>

    <!-- Referral Tools Section -->
    <div class="bg-gray-900 rounded-xl p-4 sm:p-6 border border-gray-800 mb-6 sm:mb-8">
        <h2 class="text-lg sm:text-xl font-bold text-white mb-4 sm:mb-6">Реферальные инструменты</h2>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
            <!-- Referral Link -->
            <div class="space-y-4">
                <div>
                    <label class="block text-sm font-medium text-gray-300 mb-2">Ваша реферальная ссылка</label>
                    <div class="flex rounded-lg overflow-hidden">
                        <input type="text"
                               value="{{ Auth::user()->ref_link }}"
                               readonly
                               class="flex-1 bg-gray-800 border border-gray-700 text-white px-4 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <button @click="navigator.clipboard.writeText('{{ Auth::user()->ref_link }}'); showCopied = true; setTimeout(() => showCopied = false, 2000)"
                                class="bg-blue-600 hover:bg-blue-700 px-4 py-3 text-white transition-colors duration-200">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"></path>
                            </svg>
                        </button>
                    </div>
                    <div x-show="showCopied" x-transition class="text-green-500 text-sm mt-2">
                        ✓ Ссылка скопирована в буфер обмена!
                    </div>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-300 mb-2">Ваш реферальный ID</label>
                    <div class="bg-gray-800 border border-gray-700 rounded-lg px-4 py-3">
                        <span class="text-blue-400 font-mono text-lg">{{ Auth::user()->username }}</span>
                    </div>
                </div>
            </div>

            <!-- QR Code -->
            <div class="space-y-4" x-show="showQRCode" x-transition>
                <div>
                    <label class="block text-sm font-medium text-gray-300 mb-2">QR-код</label>
                    <div class="bg-gray-800 border border-gray-700 rounded-lg p-4 text-center">
                        <div id="qrcode" class="inline-block"></div>
                        <p class="text-gray-400 text-sm mt-2">Отсканируйте для использования реферальной ссылки</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Tab Navigation -->
    <div class="bg-gray-900 rounded-xl border border-gray-800 overflow-hidden">
        <div class="border-b border-gray-800">
            <nav class="flex">
                <button @click="selectedTab = 'overview'"
                        :class="selectedTab === 'overview' ? 'bg-blue-600 text-white' : 'text-gray-400 hover:text-white hover:bg-gray-800'"
                        class="px-4 sm:px-6 py-3 sm:py-4 text-sm font-medium transition-colors duration-200">
                    Обзор
                </button>
                <button @click="selectedTab = 'referrals'"
                        :class="selectedTab === 'referrals' ? 'bg-blue-600 text-white' : 'text-gray-400 hover:text-white hover:bg-gray-800'"
                        class="px-4 sm:px-6 py-3 sm:py-4 text-sm font-medium transition-colors duration-200">
                    Мои рефералы
                </button>
            </nav>
        </div>

        <!-- Tab Content -->
        <div class="p-4 sm:p-6">
            <!-- Overview Tab -->
            <div x-show="selectedTab === 'overview'" x-transition>
                <div class="space-y-6">
                    <div>
                        <h3 class="text-lg font-semibold text-white mb-4">Как это работает</h3>
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                            <div class="text-center">
                                <div class="bg-blue-600/10 w-12 h-12 rounded-full flex items-center justify-center mx-auto mb-3">
                                    <span class="text-blue-500 font-bold">1</span>
                                </div>
                                <h4 class="text-white font-medium mb-2">Поделитесь ссылкой</h4>
                                <p class="text-gray-400 text-sm">Поделитесь своей уникальной реферальной ссылкой с друзьями и семьей</p>
                            </div>
                            <div class="text-center">
                                <div class="bg-green-600/10 w-12 h-12 rounded-full flex items-center justify-center mx-auto mb-3">
                                    <span class="text-green-500 font-bold">2</span>
                                </div>
                                <h4 class="text-white font-medium mb-2">Katılırlar</h4>
                                <p class="text-gray-400 text-sm">Birisi bağlantınızı kullanarak kaydolduğunda, referansınız olur</p>
                            </div>
                            <div class="text-center">
                                <div class="bg-purple-600/10 w-12 h-12 rounded-full flex items-center justify-center mx-auto mb-3">
                                    <span class="text-purple-500 font-bold">3</span>
                                </div>
                                <h4 class="text-white font-medium mb-2">Получайте награды</h4>
                                <p class="text-gray-400 text-sm">Получайте комиссию от торговой деятельности и транзакций</p>
                            </div>
                        </div>
                    </div>

                    <div>
                        <h3 class="text-lg font-semibold text-white mb-4">Реферальные уровни</h3>
                        <div class="space-y-3">
                            <div class="flex items-center justify-between p-3 bg-gray-800 rounded-lg">
                                <div class="flex items-center">
                                    <div class="w-8 h-8 bg-gray-600 rounded-full flex items-center justify-center mr-3">
                                        <span class="text-xs font-bold text-white">S</span>
                                    </div>
                                    <div>
                                        <span class="text-white font-medium">Начинающий</span>
                                        <p class="text-gray-400 text-sm">0-9 рефералов</p>
                                    </div>
                                </div>
                                <span class="text-gray-400">5% комиссии</span>
                            </div>
                            <div class="flex items-center justify-between p-3 bg-gray-800 rounded-lg">
                                <div class="flex items-center">
                                    <div class="w-8 h-8 bg-amber-600 rounded-full flex items-center justify-center mr-3">
                                        <span class="text-xs font-bold text-white">B</span>
                                    </div>
                                    <div>
                                        <span class="text-white font-medium">Бронза</span>
                                        <p class="text-gray-400 text-sm">10-24 рефералов</p>
                                    </div>
                                </div>
                                <span class="text-amber-400">7% комиссии</span>
                            </div>
                            <div class="flex items-center justify-between p-3 bg-gray-800 rounded-lg">
                                <div class="flex items-center">
                                    <div class="w-8 h-8 bg-gray-400 rounded-full flex items-center justify-center mr-3">
                                        <span class="text-xs font-bold text-gray-900">S</span>
                                    </div>
                                    <div>
                                        <span class="text-white font-medium">Серебро</span>
                                        <p class="text-gray-400 text-sm">25-49 рефералов</p>
                                    </div>
                                </div>
                                <span class="text-gray-400">10% комиссии</span>
                            </div>
                            <div class="flex items-center justify-between p-3 bg-gray-800 rounded-lg">
                                <div class="flex items-center">
                                    <div class="w-8 h-8 bg-yellow-500 rounded-full flex items-center justify-center mr-3">
                                        <span class="text-xs font-bold text-gray-900">G</span>
                                    </div>
                                    <div>
                                        <span class="text-white font-medium">Золото</span>
                                        <p class="text-gray-400 text-sm">50-99 рефералов</p>
                                    </div>
                                </div>
                                <span class="text-yellow-400">12% комиссии</span>
                            </div>
                            <div class="flex items-center justify-between p-3 bg-gray-800 rounded-lg">
                                <div class="flex items-center">
                                    <div class="w-8 h-8 bg-purple-600 rounded-full flex items-center justify-center mr-3">
                                        <span class="text-xs font-bold text-white">E</span>
                                    </div>
                                    <div>
                                        <span class="text-white font-medium">Элитный</span>
                                        <p class="text-gray-400 text-sm">100+ рефералов</p>
                                    </div>
                                </div>
                                <span class="text-purple-400">15% комиссии</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Referrals Tab -->
            <div x-show="selectedTab === 'referrals'" x-transition>
                <!-- Search and Filter -->
                <div class="mb-6">
                    <div class="flex flex-col sm:flex-row gap-4">
                        <div class="flex-1">
                            <input type="text"
                                   x-model="searchQuery"
                                   placeholder="Поиск рефералов..."
                                   class="w-full bg-gray-800 border border-gray-700 rounded-lg px-4 py-2 text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500">
                        </div>
                    </div>
                </div>

                <!-- Desktop Table -->
                <div class="hidden lg:block overflow-x-auto">
                    <table class="w-full">
                        <thead>
                            <tr class="border-b border-gray-800">
                                <th class="text-left py-3 px-4 text-gray-400 font-medium">Имя клиента</th>
                                <th class="text-left py-3 px-4 text-gray-400 font-medium">Уровень</th>
                                <th class="text-left py-3 px-4 text-gray-400 font-medium">Верхний</th>
                                <th class="text-left py-3 px-4 text-gray-400 font-medium">Статус</th>
                                <th class="text-left py-3 px-4 text-gray-400 font-medium">Дата регистрации</th>
                            </tr>
                        </thead>
                        <tbody>
                            {!! $uc->getdownlines($array, $usr) !!}
                        </tbody>
                    </table>
                </div>

                <!-- Mobile Cards -->
                <div class="lg:hidden space-y-4">
                    @php
                        $referrals = $array->where('ref_by', Auth::user()->id);
                    @endphp
                    @if($referrals->count() > 0)
                        @foreach($referrals as $referral)
                        <div class="bg-gray-800 rounded-lg p-4 border border-gray-700">
                            <div class="flex items-center justify-between mb-3">
                                <h3 class="text-white font-medium">{{ $referral->name }}</h3>
                                <span class="px-2 py-1 text-xs rounded-full
                                    {{ $referral->status == 'active' ? 'bg-green-600/20 text-green-400' : 'bg-red-600/20 text-red-400' }}">
                                    {{ ucfirst($referral->status ?? 'pending') }}
                                </span>
                            </div>
                            <div class="space-y-2 text-sm">
                                <div class="flex justify-between">
                                    <span class="text-gray-400">E-mail:</span>
                                    <span class="text-white">{{ $referral->email }}</span>
                                </div>
                                <div class="flex justify-between">
                                    <span class="text-gray-400">Присоединился:</span>
                                    <span class="text-white">{{ $referral->created_at->format('M d, Y') }}</span>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    @else
                        <div class="text-center py-12">
                            <div class="bg-gray-800 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4">
                                <svg class="w-8 h-8 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                                </svg>
                            </div>
                            <h3 class="text-gray-400 font-medium mb-2">Рефералов пока нет</h3>
                            <p class="text-gray-500 text-sm mb-4">Начните делиться своей реферальной ссылкой для построения сети</p>
                            <button @click="navigator.clipboard.writeText('{{ Auth::user()->ref_link }}'); showCopied = true; setTimeout(() => showCopied = false, 2000)"
                                    class="inline-flex items-center px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-lg transition-colors duration-200 text-sm">
                                Скопировать реферальную ссылку
                            </button>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <!-- Share Modal -->
    <div x-show="showShareModal"
         x-transition:enter="transition ease-out duration-300"
         x-transition:enter-start="opacity-0"
         x-transition:enter-end="opacity-100"
         x-transition:leave="transition ease-in duration-200"
         x-transition:leave-start="opacity-100"
         x-transition:leave-end="opacity-0"
         class="fixed inset-0 z-50 overflow-y-auto"
         @click="showShareModal = false">

        <div class="flex items-center justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
            <div class="fixed inset-0 bg-gray-900 bg-opacity-75 transition-opacity"></div>

            <div class="inline-block align-bottom bg-gray-800 rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full"
                 @click.stop>
                <div class="bg-gray-800 px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                    <div class="sm:flex sm:items-start">
                        <div class="w-full">
                            <h3 class="text-lg leading-6 font-medium text-white mb-4">Поделиться реферальной программой</h3>

                            <div class="grid grid-cols-2 gap-3">
                                <button @click="shareToSocial('twitter')"
                                        class="flex items-center justify-center px-4 py-3 bg-blue-500 hover:bg-blue-600 text-white rounded-lg transition-colors duration-200">
                                    <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z"/>
                                    </svg>
                                    Twitter
                                </button>

                                <button @click="shareToSocial('facebook')"
                                        class="flex items-center justify-center px-4 py-3 bg-blue-600 hover:bg-blue-700 text-white rounded-lg transition-colors duration-200">
                                    <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/>
                                    </svg>
                                    Facebook
                                </button>

                                <button @click="shareToSocial('linkedin')"
                                        class="flex items-center justify-center px-4 py-3 bg-blue-700 hover:bg-blue-800 text-white rounded-lg transition-colors duration-200">
                                    <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/>
                                    </svg>
                                    LinkedIn
                                </button>

                                <button @click="shareToSocial('whatsapp')"
                                        class="flex items-center justify-center px-4 py-3 bg-green-600 hover:bg-green-700 text-white rounded-lg transition-colors duration-200">
                                    <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893A11.821 11.821 0 0020.885 3.488"/>
                                    </svg>
                                    WhatsApp
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="bg-gray-700 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                    <button @click="showShareModal = false"
                            class="w-full inline-flex justify-center rounded-md border border-gray-600 shadow-sm px-4 py-2 bg-gray-600 text-base font-medium text-white hover:bg-gray-500 sm:ml-3 sm:w-auto sm:text-sm">
                        Закрыть
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Toast Notification -->
    <div x-show="shareToast"
         x-transition:enter="transition ease-out duration-300"
         x-transition:enter-start="opacity-0 transform translate-y-2"
         x-transition:enter-end="opacity-100 transform translate-y-0"
         x-transition:leave="transition ease-in duration-200"
         x-transition:leave-start="opacity-100 transform translate-y-0"
         x-transition:leave-end="opacity-0 transform translate-y-2"
         class="fixed bottom-4 right-4 bg-green-600 text-white px-6 py-3 rounded-lg shadow-lg z-50">
        <div class="flex items-center">
            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
            </svg>
            Успешно поделились!
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/qrcode@1.5.3/build/qrcode.min.js"></script>
<script>
document.addEventListener('alpine:init', () => {
    Alpine.data('referralData', () => ({
        shareToSocial(platform) {
            const url = '{{ Auth::user()->ref_link }}';
            const text = `Присоединяйтесь к {{ $settings->site_name }} - лучшая торговая платформа! Используйте мою реферальную ссылку для начала: `;

            let shareUrl = '';

            switch(platform) {
                case 'twitter':
                    shareUrl = `https://twitter.com/intent/tweet?text=${encodeURIComponent(text)}&url=${encodeURIComponent(url)}`;
                    break;
                case 'facebook':
                    shareUrl = `https://www.facebook.com/sharer/sharer.php?u=${encodeURIComponent(url)}`;
                    break;
                case 'linkedin':
                    shareUrl = `https://www.linkedin.com/sharing/share-offsite/?url=${encodeURIComponent(url)}`;
                    break;
                case 'whatsapp':
                    shareUrl = `https://wa.me/?text=${encodeURIComponent(text + url)}`;
                    break;
            }

            if (shareUrl) {
                window.open(shareUrl, '_blank', 'width=600,height=400');
                this.showShareModal = false;
                this.shareToast = true;
                setTimeout(() => this.shareToast = false, 3000);
            }
        }
    }));
});

// Generate QR Code when page loads
document.addEventListener('DOMContentLoaded', function() {
    if (typeof QRCode !== 'undefined') {
        QRCode.toCanvas(document.getElementById('qrcode'), '{{ Auth::user()->ref_link }}', {
            width: 150,
            height: 150,
            colorDark: '#000000',
            colorLight: '#ffffff'
        });
    }
});

// Legacy copy function for compatibility
function myFunction() {
    navigator.clipboard.writeText('{{ Auth::user()->ref_link }}').then(() => {
        // Show copied feedback
        const event = new CustomEvent('showCopied');
        document.dispatchEvent(event);
    });
}
</script>
@endsection
