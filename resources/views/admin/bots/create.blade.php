@php
if (Auth('admin')->User()->dashboard_style == "light") {
    $text = "dark";
	$bg = "light";
} else {
	$bg = 'dark';
    $text = "light";
}
@endphp
@extends('layouts.app')

@section('content')
@include('admin.topmenu')
@include('admin.sidebar')
<div class="main-panel">
    <div class="content">
        <div class="page-inner">
        <div class="page-header">
            <h4 class="page-title">Создать торгового бота</h4>
            <ul class="breadcrumbs">
                <li class="nav-home">
                    <a href="{{ route('admin.dashboard') }}">
                        <i class="flaticon-home"></i>
                    </a>
                </li>
                <li class="separator">
                    <i class="flaticon-right-arrow"></i>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.bots.index') }}">Торговые боты</a>
                </li>
                <li class="separator">
                    <i class="flaticon-right-arrow"></i>
                </li>
                <li class="nav-item">
                    <a href="#">Создать бота</a>
                </li>
            </ul>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">Создать нового торгового бота</div>
                    </div>
                    <form action="{{ route('admin.bots.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="row">
                                <!-- Основная информация -->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="name">Имя бота <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control @error('name') is-invalid @enderror"
                                               id="name" name="name" value="{{ old('name') }}"
                                               placeholder="Введите имя бота" required>
                                        @error('name')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="bot_type">Торговый рынок <span class="text-danger">*</span></label>
                                        <select class="form-control @error('bot_type') is-invalid @enderror"
                                                id="bot_type" name="bot_type" required>
                                            <option value="">Выбрать рынок</option>
                                            @foreach($botTypes as $key => $value)
                                                <option value="{{ $key }}" {{ old('bot_type') == $key ? 'selected' : '' }}>
                                                    {{ $value }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('bot_type')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="description">Описание <span class="text-danger">*</span></label>
                                        <textarea class="form-control @error('description') is-invalid @enderror"
                                                  id="description" name="description" rows="4"
                                                  placeholder="Введите описание бота" required>{{ old('description') }}</textarea>
                                        @error('description')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Настройки инвестиций -->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="min_investment">Минимальная инвестиция ($) <span class="text-danger">*</span></label>
                                        <input type="number" class="form-control @error('min_investment') is-invalid @enderror"
                                               id="min_investment" name="min_investment" value="{{ old('min_investment', 100) }}"
                                               step="0.01" min="1" required>
                                        @error('min_investment')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="max_investment">Максимальная инвестиция ($) <span class="text-danger">*</span></label>
                                        <input type="number" class="form-control @error('max_investment') is-invalid @enderror"
                                               id="max_investment" name="max_investment" value="{{ old('max_investment', 10000) }}"
                                               step="0.01" min="1" required>
                                        @error('max_investment')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Настройки прибыли -->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="daily_profit_min">Минимальная дневная прибыль (%) <span class="text-danger">*</span></label>
                                        <input type="number" class="form-control @error('daily_profit_min') is-invalid @enderror"
                                               id="daily_profit_min" name="daily_profit_min" value="{{ old('daily_profit_min', 0.5) }}"
                                               step="0.01" min="0" max="100" required>
                                        @error('daily_profit_min')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="daily_profit_max">Максимальная дневная прибыль (%) <span class="text-danger">*</span></label>
                                        <input type="number" class="form-control @error('daily_profit_max') is-invalid @enderror"
                                               id="daily_profit_max" name="daily_profit_max" value="{{ old('daily_profit_max', 3.0) }}"
                                               step="0.01" min="0" max="100" required>
                                        @error('daily_profit_max')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Производительность бота -->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="success_rate">Успешность (%) <span class="text-danger">*</span></label>
                                        <input type="number" class="form-control @error('success_rate') is-invalid @enderror"
                                               id="success_rate" name="success_rate" value="{{ old('success_rate', 85) }}"
                                               min="50" max="99" required>
                                        @error('success_rate')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="duration_days">Продолжительность (дней) <span class="text-danger">*</span></label>
                                        <input type="number" class="form-control @error('duration_days') is-invalid @enderror"
                                               id="duration_days" name="duration_days" value="{{ old('duration_days', 30) }}"
                                               min="1" max="365" required>
                                        @error('duration_days')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Status -->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="status">Статус <span class="text-danger">*</span></label>
                                        <select class="form-control @error('status') is-invalid @enderror"
                                                id="status" name="status" required>
                                            <option value="active" {{ old('status') == 'active' ? 'selected' : '' }}>Активный</option>
                                            <option value="inactive" {{ old('status') == 'inactive' ? 'selected' : '' }}>Неактивный</option>
                                            <option value="maintenance" {{ old('status') == 'maintenance' ? 'selected' : '' }}>Обслуживание</option>
                                        </select>
                                        @error('status')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Bot Image -->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="image">Аватар бота (необязательно)</label>
                                        <input type="file" class="form-control-file @error('image') is-invalid @enderror"
                                               id="image" name="image" accept="image/*">
                                        <small class="form-text text-muted">Загрузите изображение для бота (макс. 2МБ)</small>
                                        @error('image')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Торговые пары -->
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="trading_pairs">Торговые пары</label>
                                        <div id="trading-pairs-container">
                                            <div class="row">
                                                <div class="col-md-8">
                                                    <input type="text" class="form-control" name="trading_pairs[]"
                                                           placeholder="например, EUR/USD, BTC/USD">
                                                </div>
                                                <div class="col-md-4">
                                                    <button type="button" class="btn btn-primary btn-sm" id="add-pair">
                                                        <i class="fa fa-plus"></i> Добавить пару
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        <small class="form-text text-muted">Добавьте торговые пары, которыми будет торговать этот бот</small>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card-action">
                            <button type="submit" class="btn btn-success">
                                <i class="fa fa-save"></i> Создать бота
                            </button>
                            <a href="{{ route('admin.bots.index') }}" class="btn btn-danger">
                                <i class="fa fa-times"></i> Отмена
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
@parent
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Функционал добавления торговой пары
    let pairCount = 1;
    document.getElementById('add-pair').addEventListener('click', function() {
        if (pairCount < 10) { // Limit to 10 pairs
            const container = document.getElementById('trading-pairs-container');
            const newRow = document.createElement('div');
            newRow.className = 'row mt-2';
            newRow.innerHTML = `
                <div class="col-md-8">
                    <input type="text" class="form-control" name="trading_pairs[]" placeholder="e.g., EUR/USD, BTC/USD">
                </div>
                <div class="col-md-4">
                    <button type="button" class="btn btn-danger btn-sm remove-pair">
                        <i class="fa fa-trash"></i> Remove
                    </button>
                </div>
            `;
            container.appendChild(newRow);
            pairCount++;
        }
    });

    // Функционал удаления торговой пары
    document.addEventListener('click', function(e) {
        if (e.target.classList.contains('remove-pair') || e.target.parentElement.classList.contains('remove-pair')) {
            const row = e.target.closest('.row');
            row.remove();
            pairCount--;
        }
    });

    // Проверка диапазона прибыли
    document.getElementById('daily_profit_min').addEventListener('change', function() {
        const minVal = parseFloat(this.value);
        const maxInput = document.getElementById('daily_profit_max');
        if (parseFloat(maxInput.value) <= minVal) {
            maxInput.value = (minVal + 0.5).toFixed(2);
        }
    });

    document.getElementById('daily_profit_max').addEventListener('change', function() {
        const maxVal = parseFloat(this.value);
        const minInput = document.getElementById('daily_profit_min');
        if (parseFloat(minInput.value) >= maxVal) {
            minInput.value = (maxVal - 0.5).toFixed(2);
        }
    });

    // Проверка диапазона инвестиций
    document.getElementById('min_investment').addEventListener('change', function() {
        const minVal = parseFloat(this.value);
        const maxInput = document.getElementById('max_investment');
        if (parseFloat(maxInput.value) <= minVal) {
            maxInput.value = (minVal * 10).toFixed(2);
        }
    });

    document.getElementById('max_investment').addEventListener('change', function() {
        const maxVal = parseFloat(this.value);
        const minInput = document.getElementById('min_investment');
        if (parseFloat(minInput.value) >= maxVal) {
            minInput.value = (maxVal / 10).toFixed(2);
        }
    });
});
</script>
        </div>
    </div>
</div>
@endsection
