@extends('layouts.app')
@section('content')

<div class="container-fluid px-6 py-8">
    <!-- Header -->
    <div class="flex items-center justify-between mb-8">
        <div>
            <nav class="flex items-center text-sm text-gray-600 dark:text-gray-400 mb-2">
                <a href="{{ route('admin.copy.index') }}" class="hover:text-gray-900 dark:hover:text-white">Копи-трейдинг</a>
                <i data-lucide="chevron-right" class="w-4 h-4 mx-2"></i>
                <span class="text-gray-900 dark:text-white">Добавить эксперта</span>
            </nav>
            <h1 class="text-3xl font-bold text-gray-900 dark:text-white">{{ $title }}</h1>
            <p class="text-gray-600 dark:text-gray-400 mt-2">Создайте нового эксперта-трейдера для системы копи-трейдинга</p>
        </div>
        <a href="{{ route('admin.copy.index') }}"
           class="inline-flex items-center gap-2 px-4 py-2 bg-gray-100 dark:bg-gray-700 text-gray-700 dark:text-gray-300 rounded-lg font-medium hover:bg-gray-200 dark:hover:bg-gray-600 transition-colors">
            <i data-lucide="arrow-left" class="w-4 h-4"></i>
            Назад к списку
        </a>
    </div>

    <!-- Form -->
    <div class="max-w-4xl">
        <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-lg border border-gray-200 dark:border-gray-700">
            <div class="px-6 py-4 border-b border-gray-200 dark:border-gray-700">
                <h2 class="text-xl font-bold text-gray-900 dark:text-white">Информация об эксперте-трейдере</h2>
                <p class="text-sm text-gray-600 dark:text-gray-400">Заполните данные нового эксперта-трейдера</p>
            </div>

            <form action="{{ route('admin.copy.store') }}" method="POST" enctype="multipart/form-data" class="p-6">
                @csrf
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Basic Information -->
                    <div class="space-y-6">
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white border-b border-gray-200 dark:border-gray-700 pb-2">
                            Основная информация
                        </h3>

                        <!-- Name -->
                        <div>
                            <label for="name" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                Имя эксперта *
                            </label>
                            <input type="text" 
                                   id="name" 
                                   name="name" 
                                   value="{{ old('name') }}"
                                   required
                                   class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent bg-white dark:bg-gray-700 text-gray-900 dark:text-white"
                                   placeholder="например, Иван Криптопро">
                            @error('name')
                                <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Tag/Title -->
                        <div>
                            <label for="tag" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                Профессиональный тег
                            </label>
                            <input type="text" 
                                   id="tag" 
                                   name="tag" 
                                   value="{{ old('tag') }}"
                                   class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent bg-white dark:bg-gray-700 text-gray-900 dark:text-white"
                                   placeholder="например, Криптоспециалист, Дневной трейдер">
                            @error('tag')
                                <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Photo Upload -->
                        <div>
                            <label for="photo" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                Фото профиля
                            </label>
                            <div class="flex items-center space-x-4">
                                <div id="photo-preview" class="w-20 h-20 rounded-full bg-gray-100 dark:bg-gray-700 flex items-center justify-center overflow-hidden">
                                    <i data-lucide="camera" class="w-8 h-8 text-gray-400"></i>
                                </div>
                                <div class="flex-1">
                                    <input type="file" 
                                           id="photo" 
                                           name="photo" 
                                           accept="image/*"
                                           onchange="previewPhoto(this)"
                                           class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent bg-white dark:bg-gray-700 text-gray-900 dark:text-white">
                                    <p class="text-xs text-gray-500 mt-1">JPG, PNG, GIF до 2МБ</p>
                                </div>
                            </div>
                            @error('photo')
                                <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Description -->
                        <div>
                            <label for="description" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                Описание
                            </label>
                            <textarea id="description" 
                                      name="description" 
                                      rows="4"
                                      class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent bg-white dark:bg-gray-700 text-gray-900 dark:text-white"
                                      placeholder="Краткое описание торгового стиля и экспертизы эксперта...">{{ old('description') }}</textarea>
                            @error('description')
                                <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <!-- Performance & Pricing -->
                    <div class="space-y-6">
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white border-b border-gray-200 dark:border-gray-700 pb-2">
                            Производительность и ценообразование
                        </h3>

                        <!-- Rating -->
                        <div>
                            <label for="rating" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                Рейтинг (1-5) *
                            </label>
                            <select id="rating" 
                                    name="rating" 
                                    required
                                    class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent bg-white dark:bg-gray-700 text-gray-900 dark:text-white">
                                <option value="">Выберите рейтинг</option>
                                @for($i = 1; $i <= 5; $i++)
                                    <option value="{{ $i }}" {{ old('rating') == $i ? 'selected' : '' }}>
                                        {{ $i }} {{ $i == 1 ? 'Звезда' : ($i < 5 ? 'Звезды' : 'Звезд') }}
                                    </option>
                                @endfor
                            </select>
                            @error('rating')
                                <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Win Rate -->
                        <div>
                            <label for="win_rate" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                Процент побед (%) *
                            </label>
                            <input type="number" 
                                   id="win_rate" 
                                   name="win_rate" 
                                   value="{{ old('win_rate') }}"
                                   min="0" 
                                   max="100" 
                                   required
                                   class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent bg-white dark:bg-gray-700 text-gray-900 dark:text-white"
                                   placeholder="например, 85">
                            @error('win_rate')
                                <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Total Profit -->
                        <div>
                            <label for="total_profit" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                Общая прибыль (%) *
                            </label>
                            <input type="number" 
                                   id="total_profit" 
                                   name="total_profit" 
                                   value="{{ old('total_profit') }}"
                                   step="0.01" 
                                   min="0" 
                                   required
                                   class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent bg-white dark:bg-gray-700 text-gray-900 dark:text-white"
                                   placeholder="например, 125.50">
                            @error('total_profit')
                                <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Equity -->
                        <div>
                            <label for="equity" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                Текущий капитал ($) *
                            </label>
                            <input type="number" 
                                   id="equity" 
                                   name="equity" 
                                   value="{{ old('equity') }}"
                                   step="0.01" 
                                   min="0" 
                                   required
                                   class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent bg-white dark:bg-gray-700 text-gray-900 dark:text-white"
                                   placeholder="например, 50000.00">
                            @error('equity')
                                <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Total Trades -->
                        <div>
                            <label for="total_trades" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                Всего сделок *
                            </label>
                            <input type="number" 
                                   id="total_trades" 
                                   name="total_trades" 
                                   value="{{ old('total_trades') }}"
                                   min="0" 
                                   required
                                   class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent bg-white dark:bg-gray-700 text-gray-900 dark:text-white"
                                   placeholder="например, 1250">
                            @error('total_trades')
                                <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Minimum Investment Price -->
                        <div>
                            <label for="price" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                Минимальная инвестиция ($) *
                            </label>
                            <input type="number" 
                                   id="price" 
                                   name="price" 
                                   value="{{ old('price') }}"
                                   step="0.01" 
                                   min="0" 
                                   required
                                   class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent bg-white dark:bg-gray-700 text-gray-900 dark:text-white"
                                   placeholder="например, 100.00">
                            @error('price')
                                <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Followers -->
                        <div>
                            <label for="followers" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                Начальные подписчики *
                            </label>
                            <input type="number" 
                                   id="followers" 
                                   name="followers" 
                                   value="{{ old('followers', 0) }}"
                                   min="0" 
                                   required
                                   class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent bg-white dark:bg-gray-700 text-gray-900 dark:text-white"
                                   placeholder="например, 150">
                            @error('followers')
                                <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Status -->
                        <div>
                            <label for="status" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                Статус *
                            </label>
                            <select id="status" 
                                    name="status" 
                                    required
                                    class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent bg-white dark:bg-gray-700 text-gray-900 dark:text-white">
                                <option value="">Выберите статус</option>
                                <option value="active" {{ old('status') == 'active' ? 'selected' : '' }}>Активный</option>
                                <option value="inactive" {{ old('status') == 'inactive' ? 'selected' : '' }}>Неактивный</option>
                            </select>
                            @error('status')
                                <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>

                <!-- Submit Buttons -->
                <div class="flex items-center gap-4 pt-6 mt-6 border-t border-gray-200 dark:border-gray-700">
                    <button type="submit"
                            class="inline-flex items-center gap-2 px-6 py-3 bg-blue-600 hover:bg-blue-700 text-white rounded-lg font-medium transition-colors shadow-lg hover:shadow-xl">
                        <i data-lucide="save" class="w-4 h-4"></i>
                        Создать эксперта-трейдера
                    </button>
                    <a href="{{ route('admin.copy.index') }}"
                       class="inline-flex items-center gap-2 px-6 py-3 bg-gray-100 dark:bg-gray-700 text-gray-700 dark:text-gray-300 rounded-lg font-medium hover:bg-gray-200 dark:hover:bg-gray-600 transition-colors">
                        <i data-lucide="x" class="w-4 h-4"></i>
                        Отмена
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection

@section('scripts')
    @parent
    <script>
        function previewPhoto(input) {
            const preview = document.getElementById('photo-preview');
            
            if (input.files && input.files[0]) {
                const reader = new FileReader();
                
                reader.onload = function(e) {
                    preview.innerHTML = `<img src="${e.target.result}" class="w-full h-full object-cover rounded-full" alt="Preview">`;
                };
                
                reader.readAsDataURL(input.files[0]);
            } else {
                preview.innerHTML = '<i data-lucide="camera" class="w-8 h-8 text-gray-400"></i>';
                lucide.createIcons();
            }
        }

        // Initialize Lucide icons
        document.addEventListener('DOMContentLoaded', function() {
            if (typeof lucide !== 'undefined') {
                lucide.createIcons();
            }
        });
    </script>
@endsection
