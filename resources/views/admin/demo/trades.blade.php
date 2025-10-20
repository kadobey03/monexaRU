<?php
if (Auth('admin')->User()->dashboard_style == 'light') {
    $text = 'dark';
    $bg = 'light';
} else {
    $text = 'light';
    $bg = 'dark';
}
?>
@extends('layouts.app')
@section('content')
    @include('admin.topmenu')
    @include('admin.sidebar')
    <div class="main-panel">
        <div class="content">
            <div class="page-inner">
                <div class="mt-2 mb-4">
                    <h1 class="title1 d-inline text-{{ $text }}">Управление демо-торгами</h1>
                    <div class="d-inline">
                        <div class="float-right btn-group">
                            <a class="btn btn-primary btn-sm" href="{{ route('admin.demo.users') }}">
                                <i class="fa fa-users"></i> Управление демо-пользователями
                            </a>
                        </div>
                    </div>
                </div>
                <x-danger-alert />
                <x-success-alert />

                <!-- Statistics Cards -->
                <div class="mb-4 row">
                    <div class="col-xl-3 col-md-6 mb-4">
                        <div class="card shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                            Всего демо-торгов</div>
                                        <div class="h5 mb-0 font-weight-bold text-{{ $text }}">{{ $stats['total_trades'] }}</div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-chart-line fa-2x text-gray-300"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-3 col-md-6 mb-4">
                        <div class="card shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                            Активные торги</div>
                                        <div class="h5 mb-0 font-weight-bold text-{{ $text }}">{{ $stats['active_trades'] }}</div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-play-circle fa-2x text-gray-300"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-3 col-md-6 mb-4">
                        <div class="card shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                            Общий объем</div>
                                        <div class="h5 mb-0 font-weight-bold text-{{ $text }}">
                                            ${{ number_format($stats['total_volume'], 2) }}
                                        </div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-3 col-md-6 mb-4">
                        <div class="card shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                            Прибыльные торги</div>
                                        <div class="h5 mb-0 font-weight-bold text-{{ $text }}">{{ $stats['profitable_trades'] }}</div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-trophy fa-2x text-gray-300"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Filters Section -->
                <div class="mb-4 row">
                    <div class="col-12 card shadow p-4">
                        <h6 class="m-0 font-weight-bold text-primary mb-3">Фильтрация демо-торгов</h6>
                        <form method="GET" class="row">
                            <div class="col-md-3 mb-3">
                                <label for="search" class="form-label">Поиск</label>
                                <input type="text" class="form-control" id="search" name="search"
                                       value="{{ request('search') }}" placeholder="User name, email, or asset">
                            </div>
                            <div class="col-md-2 mb-3">
                                <label for="status" class="form-label">Статус</label>
                                <select class="form-control" id="status" name="status">
                                    <option value="">Все статусы</option>
                                    <option value="yes" {{ request('status') == 'yes' ? 'selected' : '' }}>Активный</option>
                                    <option value="no" {{ request('status') == 'no' ? 'selected' : '' }}>Закрытый</option>
                                </select>
                            </div>
                            <div class="col-md-2 mb-3">
                                <label for="type" class="form-label">Тип</label>
                                <select class="form-control" id="type" name="type">
                                    <option value="">Все типы</option>
                                    <option value="buy" {{ request('type') == 'buy' ? 'selected' : '' }}>Покупка</option>
                                    <option value="sell" {{ request('type') == 'sell' ? 'selected' : '' }}>Продажа</option>
                                </select>
                            </div>
                            <div class="col-md-2 mb-3">
                                <label for="asset" class="form-label">Актив</label>
                                <input type="text" class="form-control" id="asset" name="asset"
                                       value="{{ request('asset') }}" placeholder="BTC, ETH, etc.">
                            </div>
                            <div class="col-md-3 mb-3 d-flex align-items-end">
                                <button type="submit" class="btn btn-primary me-2">Фильтр</button>
                                <a href="{{ route('admin.demo.trades') }}" class="btn btn-secondary ml-2">Очистить</a>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Demo Trades Table -->
                <div class="mb-5 row">
                    <div class="col-12 card shadow p-4">
                        <div class="table-responsive" data-example-id="hoverable-table">
                            <table id="ShipTable" class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>ID торга</th>
                                        <th>Имя пользователя</th>
                                        <th>Email пользователя</th>
                                        <th>Актив</th>
                                        <th>Тип</th>
                                        <th>Сумма</th>
                                        <th>Кредитное плечо</th>
                                        <th>Цена входа</th>
                                        <th>Текущий P&L</th>
                                        <th>Статус</th>
                                        <th>Дата создания</th>
                                        <th>Опция</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($demoTrades as $trade)
                                    <tr>
                                        <td>{{ $trade->id }}</td>
                                        <td>{{ $trade->user ? $trade->user->name : 'Пользователь не найден' }}</td>
                                        <td>{{ $trade->user ? $trade->user->email : 'Не указано' }}</td>
                                        <td>
                                            <span class="badge badge-info">{{ $trade->assets }}</span>
                                        </td>
                                        <td>
                                            <span class="badge {{ $trade->type == 'buy' ? 'badge-success' : 'badge-danger' }}">
                                                {{ strtoupper($trade->type) }}
                                            </span>
                                        </td>
                                        <td>${{ number_format($trade->amount, 2) }}</td>
                                        <td>{{ $trade->leverage }}x</td>
                                        <td>${{ number_format($trade->entry_price, 2) }}</td>
                                        <td>
                                            @php
                                                $pnl = $trade->calculatePnL();
                                            @endphp
                                            <span class="badge {{ $pnl >= 0 ? 'badge-success' : 'badge-danger' }}">
                                                ${{ number_format($pnl, 2) }}
                                            </span>
                                        </td>
                                        <td>
                                            @if($trade->active == 'yes')
                                                <span class="badge badge-success">Активный</span>
                                            @else
                                                <span class="badge badge-secondary">Закрытый</span>
                                            @endif
                                        </td>
                                        <td>{{ $trade->created_at->toDayDateTimeString() }}</td>
                                        <td>
                                            @if($trade->active == 'yes')
                                                <form action="{{ route('admin.demo.close-trade', $trade->id) }}" method="POST" class="d-inline">
                                                    @csrf
                                                    <button type="submit" class="btn btn-warning btn-sm m-1"
                                                            onclick="return confirm('Вы уверены, что хотите закрыть этот демо-торг?')"
                                                            title="Закрыть торг">
                                                        <i class="fa fa-stop-circle"></i> Закрыть
                                                    </button>
                                                </form>
                                            @endif
                                            <a href="{{ route('admin.demo.users') }}?search={{ $trade->user ? $trade->user->email : '' }}"
                                               class="btn btn-info btn-sm m-1" title="Просмотреть пользователя">
                                                <i class="fa fa-user"></i> Просмотреть пользователя
                                            </a>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="12" class="text-center">
                                            <div class="py-4">
                                                <i class="fas fa-chart-line fa-3x text-gray-300 mb-3"></i>
                                                <h5 class="text-gray-500">Демо-торги не найдены</h5>
                                                <p class="text-muted">Нет активности демо-торговли, соответствующей вашим фильтрам.</p>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Auto-refresh page every 30 seconds for real-time data
            setInterval(function() {
                if (!document.querySelector('.dropdown.show')) {
                    window.location.reload();
                }
            }, 30000);
        });
    </script>
@endsection
