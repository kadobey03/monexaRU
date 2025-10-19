@extends('layouts.dasht')
@section('title', 'Торговые рынки')
@section('content')

<div class="container mx-auto px-4 py-8" x-data="tradingMarkets()" x-cloak>
    <!-- TradingView Ticker Tape Widget -->
    <!--<div class="mb-6">-->
    <!--    <div class="tradingview-widget-container">-->
    <!--        <div class="tradingview-widget-container__widget"></div>-->
    <!--        <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-ticker-tape.js" async>-->
    <!--        {-->
    <!--            "symbols": [-->
    <!--                {"proName": "BINANCE:BTCUSDT", "title": "BTC/USDT"},-->
    <!--                {"proName": "BINANCE:ETHUSDT", "title": "ETH/USDT"},-->
    <!--                {"proName": "FX:EURUSD", "title": "EUR/USD"},-->
    <!--                {"proName": "NASDAQ:AAPL", "title": "APPLE"},-->
    <!--                {"proName": "NASDAQ:TSLA", "title": "TESLA"},-->
    <!--                {"proName": "TVC:GOLD", "title": "GOLD"}-->
    <!--            ],-->
    <!--            "showSymbolLogo": true,-->
    <!--            "colorTheme": "dark",-->
    <!--            "isTransparent": true,-->
    <!--            "displayMode": "adaptive",-->
    <!--            "locale": "en"-->
    <!--        }-->
    <!--        </script>-->
    <!--    </div>-->
    <!--</div>-->

    <x-danger-alert />
    <x-success-alert />
    <x-notify-alert />

    <!-- Page Header -->
    <div class="mb-8">
        <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
            <div>
                <h1 class="text-3xl font-bold text-gray-900 dark:text-white">Торговые рынки</h1>
                <p class="text-gray-600 dark:text-gray-400 mt-1">Выберите из тысяч торговых инструментов в нескольких классах активов</p>
            </div>

            <!-- Search and Stats -->
            <div class="flex items-center gap-4">
                <div class="relative">
                    <input type="text"
                           x-model="searchQuery"
                           placeholder="Поиск инструмента..."
                           class="w-64 pl-10 pr-4 py-2 bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent text-gray-900 dark:text-white">
                    <i data-lucide="search" class="absolute left-3 top-2.5 h-5 w-5 text-gray-400"></i>
                </div>

                <div class="hidden md:flex items-center gap-4 text-sm">
                    <div class="text-center">
                        <div class="text-gray-900 dark:text-white font-semibold" x-text="totalInstruments"></div>
                        <div class="text-gray-500 dark:text-gray-400">Инструменты</div>
                    </div>
                    <div class="w-px h-8 bg-gray-300 dark:bg-gray-600"></div>
                    <div class="text-center">
                        <div class="text-green-600 dark:text-green-400 font-semibold">7/24</div>
                        <div class="text-gray-500 dark:text-gray-400">Торговля</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Asset Type Filters -->
    <div class="mb-8">
        <div class="bg-white dark:bg-gray-800 rounded-xl border border-gray-200 dark:border-gray-700 p-1.5">
            <div class="flex flex-wrap gap-1">
                <button @click="selectedType = 'all'"
                        :class="selectedType === 'all' ? 'bg-blue-500 text-white shadow-md' : 'text-gray-600 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-700'"
                        class="px-4 py-2 rounded-lg font-medium transition-all duration-200 flex items-center gap-2">
                    <i data-lucide="grid-3x3" class="w-4 h-4"></i>
                    Все рынки
                </button>

                <button @click="selectedType = 'crypto'"
                        :class="selectedType === 'crypto' ? 'bg-blue-500 text-white shadow-md' : 'text-gray-600 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-700'"
                        class="px-4 py-2 rounded-lg font-medium transition-all duration-200 flex items-center gap-2">
                    <i data-lucide="bitcoin" class="w-4 h-4"></i>
                    Криптовалюты
                </button>

                <button @click="selectedType = 'stock'"
                        :class="selectedType === 'stock' ? 'bg-blue-500 text-white shadow-md' : 'text-gray-600 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-700'"
                        class="px-4 py-2 rounded-lg font-medium transition-all duration-200 flex items-center gap-2">
                    <i data-lucide="trending-up" class="w-4 h-4"></i>
                    Акции
                </button>

                <button @click="selectedType = 'forex'"
                        :class="selectedType === 'forex' ? 'bg-blue-500 text-white shadow-md' : 'text-gray-600 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-700'"
                        class="px-4 py-2 rounded-lg font-medium transition-all duration-200 flex items-center gap-2">
                    <i data-lucide="globe" class="w-4 h-4"></i>
                    Валюта
                </button>

                <button @click="selectedType = 'commodity'"
                        :class="selectedType === 'commodity' ? 'bg-blue-500 text-white shadow-md' : 'text-gray-600 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-700'"
                        class="px-4 py-2 rounded-lg font-medium transition-all duration-200 flex items-center gap-2">
                    <i data-lucide="zap" class="w-4 h-4"></i>
                    Товары
                </button>

                <button @click="selectedType = 'bond'"
                        :class="selectedType === 'bond' ? 'bg-blue-500 text-white shadow-md' : 'text-gray-600 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-700'"
                        class="px-4 py-2 rounded-lg font-medium transition-all duration-200 flex items-center gap-2">
                    <i data-lucide="landmark" class="w-4 h-4"></i>
                    Облигации
                </button>
            </div>
        </div>
    </div>

    <!-- Instruments Grid -->
    <div class="space-y-6">
        <!-- Loading State -->
        <div x-show="loading" class="flex items-center justify-center py-12">
            <div class="flex items-center gap-3">
                <div class="animate-spin rounded-full h-8 w-8 border-b-2 border-blue-500"></div>
                <span class="text-gray-600 dark:text-gray-400">Загрузка инструментов...</span>
            </div>
        </div>

        <!-- No Results -->
        <div x-show="!loading && filteredInstruments.length === 0" class="text-center py-12">
            <div class="bg-white dark:bg-gray-800 rounded-xl border border-gray-200 dark:border-gray-700 p-8">
                <i data-lucide="search-x" class="w-16 h-16 text-gray-400 mx-auto mb-4"></i>
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-2">Инструменты не найдены</h3>
                <p class="text-gray-600 dark:text-gray-400">Попробуйте изменить поисковый запрос или критерии фильтра</p>
            </div>
        </div>

        <!-- Instruments List -->
        <template x-for="(typeGroup, type) in groupedInstruments" :key="type">
            <div x-show="(selectedType === 'all' || selectedType === type) && typeGroup.length > 0" class="space-y-4">
                <!-- Section Header -->
                <div class="flex items-center gap-3 px-2">
                    <div class="flex items-center gap-2">
                        <template x-if="type === 'crypto'">
                            <i data-lucide="bitcoin" class="w-5 h-5 text-orange-500"></i>
                        </template>
                        <template x-if="type === 'stock'">
                            <i data-lucide="trending-up" class="w-5 h-5 text-green-500"></i>
                        </template>
                        <template x-if="type === 'forex'">
                            <i data-lucide="globe" class="w-5 h-5 text-blue-500"></i>
                        </template>
                        <template x-if="type === 'commodity'">
                            <i data-lucide="zap" class="w-5 h-5 text-yellow-500"></i>
                        </template>
                        <template x-if="type === 'bond'">
                            <i data-lucide="landmark" class="w-5 h-5 text-purple-500"></i>
                        </template>

                        <h2 class="text-xl font-bold text-gray-900 dark:text-white capitalize" x-text="getTypeDisplayName(type)"></h2>
                        <span class="text-sm text-gray-500 dark:text-gray-400" x-text="`(${typeGroup.length} инструментов)`"></span>
                    </div>
                </div>

                <!-- Instruments Grid -->
                <div class="bg-white dark:bg-gray-800 rounded-xl border border-gray-200 dark:border-gray-700 overflow-hidden">
                    <!-- Table Header -->
                    <div class="bg-gray-50 dark:bg-gray-700/50 px-6 py-4 border-b border-gray-200 dark:border-gray-600">
                        <div class="grid grid-cols-12 gap-4 items-center text-sm font-medium text-gray-600 dark:text-gray-400 uppercase tracking-wider">
                            <div class="col-span-8 md:col-span-3">Актив</div>
                            <div class="col-span-2 text-right hidden md:block">Цена</div>
                            <div class="col-span-2 text-right hidden md:block">Изм. за 24ч</div>
                            <div class="col-span-2 text-right hidden md:block">Объём</div>
                            <div class="col-span-4 md:col-span-3 text-right">Торговля</div>
                        </div>
                    </div>

                    <!-- Table Body -->
                    <div class="divide-y divide-gray-200 dark:divide-gray-600">
                        <template x-for="instrument in typeGroup" :key="instrument.id">
                            <div class="px-6 py-4 hover:bg-gray-50 dark:hover:bg-gray-700/50 transition-colors duration-150">
                                <div class="grid grid-cols-12 gap-4 items-center">
                                    <!-- Asset Info -->
                                    <div class="col-span-8 md:col-span-3">
                                        <div class="flex items-center gap-3">
                                            <div class="w-10 h-10 rounded-full bg-gray-100 dark:bg-gray-700 flex items-center justify-center flex-shrink-0">
                                                <template x-if="instrument.logo">
                                                    <img :src="instrument.logo" :alt="instrument.name" class="w-8 h-8 rounded-full object-cover">
                                                </template>
                                                <template x-if="!instrument.logo">
                                                    <span class="text-gray-500 dark:text-gray-400 font-semibold text-sm" x-text="instrument.symbol.substring(0, 2)"></span>
                                                </template>
                                            </div>
                                            <div class="min-w-0">
                                                <div class="font-semibold text-gray-900 dark:text-white truncate" x-text="instrument.name"></div>
                                                <div class="text-sm text-gray-500 dark:text-gray-400" x-text="instrument.symbol"></div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Price -->
                                    <div class="col-span-2 text-right hidden md:block">
                                        <div class="font-semibold text-gray-900 dark:text-white" x-text="formatPrice(instrument.price)"></div>
                                    </div>

                                    <!-- 24h Change -->
                                    <div class="col-span-2 text-right hidden md:block">
                                        <div class="flex flex-col items-end gap-1">
                                            <span :class="instrument.percent_change_24h >= 0 ? 'text-green-600 dark:text-green-400' : 'text-red-600 dark:text-red-400'"
                                                  class="font-semibold flex items-center gap-1">
                                                <template x-if="instrument.percent_change_24h >= 0">
                                                    <i data-lucide="trending-up" class="w-3 h-3"></i>
                                                </template>
                                                <template x-if="instrument.percent_change_24h < 0">
                                                    <i data-lucide="trending-down" class="w-3 h-3"></i>
                                                </template>
                                                <span x-text="formatPercentage(instrument.percent_change_24h)"></span>
                                            </span>
                                            <span :class="instrument.change >= 0 ? 'text-green-600 dark:text-green-400' : 'text-red-600 dark:text-red-400'"
                                                  class="text-sm" x-text="formatChange(instrument.change)"></span>
                                        </div>
                                    </div>

                                    <!-- Volume (hidden on mobile) -->
                                    <div class="col-span-2 text-right hidden md:block">
                                        <div class="text-gray-600 dark:text-gray-400" x-text="formatVolume(instrument.volume)"></div>
                                    </div>

                                    <!-- Trade Button -->
                                    <div class="col-span-4 md:col-span-3 text-right">
                                        <a :href="`{{ url('dashboard/trade') }}/${instrument.id}`"
                                           class="inline-flex items-center gap-2 px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-lg font-medium transition-colors duration-200 shadow-sm hover:shadow-md">
                                            <i data-lucide="trending-up" class="w-4 h-4"></i>
                                            <span>Торговать</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </template>
                    </div>
                </div>
            </div>
        </template>
    </div>
</div>

<script>
function tradingMarkets() {
    return {
        instruments: @json($instruments ?? []),
        selectedType: 'all',
        searchQuery: '',
        loading: false,

        get totalInstruments() {
            return this.instruments.length;
        },

        get filteredInstruments() {
            let filtered = this.instruments;

            // Filter by search query
            if (this.searchQuery) {
                const query = this.searchQuery.toLowerCase();
                filtered = filtered.filter(instrument =>
                    instrument.name.toLowerCase().includes(query) ||
                    instrument.symbol.toLowerCase().includes(query)
                );
            }

            // Filter by type
            if (this.selectedType !== 'all') {
                filtered = filtered.filter(instrument => instrument.type === this.selectedType);
            }

            return filtered;
        },

        get groupedInstruments() {
            const grouped = {};
            this.filteredInstruments.forEach(instrument => {
                if (!grouped[instrument.type]) {
                    grouped[instrument.type] = [];
                }
                grouped[instrument.type].push(instrument);
            });

            // Sort each group by market cap or volume
            Object.keys(grouped).forEach(type => {
                grouped[type].sort((a, b) => (b.volume || 0) - (a.volume || 0));
            });

            return grouped;
        },

        getTypeDisplayName(type) {
            const names = {
                'crypto': 'Криптовалюты',
                'stock': 'Акции',
                'forex': 'Валютные пары',
                'commodity': 'Товары',
                'bond': 'Облигации'
            };
            return names[type] || type;
        },

        formatPrice(price) {
            if (!price) return 'N/A';
            const num = parseFloat(price);
            if (num >= 1) {
                return '$' + num.toLocaleString('en-US', { minimumFractionDigits: 2, maximumFractionDigits: 2 });
            } else {
                return '$' + num.toFixed(6);
            }
        },

        formatPercentage(percent) {
            if (!percent) return '0.00%';
            const num = parseFloat(percent);
            return (num >= 0 ? '+' : '') + num.toFixed(2) + '%';
        },

        formatChange(change) {
            if (!change) return '$0.00';
            const num = parseFloat(change);
            return (num >= 0 ? '+$' : '-$') + Math.abs(num).toFixed(2);
        },

        formatVolume(volume) {
            if (!volume) return 'N/A';
            const num = parseFloat(volume);
            if (num >= 1e9) {
                return '$' + (num / 1e9).toFixed(1) + 'B';
            } else if (num >= 1e6) {
                return '$' + (num / 1e6).toFixed(1) + 'M';
            } else if (num >= 1e3) {
                return '$' + (num / 1e3).toFixed(1) + 'K';
            }
            return '$' + num.toLocaleString();
        },

        init() {
            // Initialize Lucide icons
            this.$nextTick(() => {
                if (typeof lucide !== 'undefined') {
                    lucide.createIcons();
                }
            });
        }
    }
}

// Re-initialize icons after Alpine updates
document.addEventListener('alpine:updated', () => {
    if (typeof lucide !== 'undefined') {
        lucide.createIcons();
    }
});
</script>

@endsection
