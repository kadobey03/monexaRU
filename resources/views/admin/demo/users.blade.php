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
                    <h1 class="title1 d-inline text-{{ $text }}">Управление демо-пользователями</h1>
                    <div class="d-inline">
                        <div class="float-right btn-group">
                            <form action="{{ route('admin.demo.bulk-reset') }}" method="POST" class="d-inline"
                                  onsubmit="return confirm('Вы уверены, что хотите сбросить ВСЕ демо-аккаунты? Это повлияет на всех пользователей.')">
                                @csrf
                                <button type="submit" class="btn btn-warning btn-sm">
                                    <i class="fa fa-sync-alt"></i> Массовый сброс всех
                                </button>
                            </form>
                            <a class="btn btn-primary btn-sm ml-2" href="{{ route('admin.demo.trades') }}">
                                <i class="fa fa-chart-line"></i> Демо-торги
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
                                            Всего демо-пользователей</div>
                                        <div class="h5 mb-0 font-weight-bold text-{{ $text }}">{{ $demoStats['total_users'] ?? $users->total() }}</div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-users fa-2x text-gray-300"></i>
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
                                            Активные демо-торги</div>
                                        <div class="h5 mb-0 font-weight-bold text-{{ $text }}">
                                            {{ $demoStats['active_demo_trades'] ?? 0 }}
                                        </div>
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
                                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                            Средний демо-баланс</div>
                                        <div class="h5 mb-0 font-weight-bold text-{{ $text }}">
                                            ${{ number_format($demoStats['avg_demo_balance'] ?? 0, 2) }}
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
                                            Общий демо-объем</div>
                                        <div class="h5 mb-0 font-weight-bold text-{{ $text }}">
                                            ${{ number_format($demoStats['total_demo_volume'] ?? 0, 2) }}
                                        </div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-coins fa-2x text-gray-300"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Search Filter -->
                <div class="mb-4 row">
                    <div class="col-12 card shadow p-4">
                        <h6 class="m-0 font-weight-bold text-primary mb-3">Поиск демо-пользователей</h6>
                        <form method="GET" class="row">
                            <div class="col-md-9 mb-3">
                                <input type="text" class="form-control" name="search"
                                       value="{{ request('search') }}" placeholder="Search by name, email, or username">
                            </div>
                            <div class="col-md-3 mb-3">
                                <button type="submit" class="btn btn-primary me-2">Поиск</button>
                                <a href="{{ route('admin.demo.users') }}" class="btn btn-secondary ml-2">Очистить</a>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Demo Users Table -->
                <div class="mb-5 row">
                    <div class="col-12 card shadow p-4">
                        <div class="table-responsive" data-example-id="hoverable-table">
                            <table id="ShipTable" class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>ID пользователя</th>
                                        <th>Имя пользователя</th>
                                        <th>Email пользователя</th>
                                        <th>Демо-баланс</th>
                                        <th>Демо-режим</th>
                                        <th>Баланс аккаунта</th>
                                        <th>Дата регистрации</th>
                                        <th>Опция</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($users as $user)
                                    <tr>
                                        <td>{{ $user->id }}</td>
                                        <td>{{ $user->name ?? 'N/A' }}</td>
                                        <td>{{ $user->email ?? 'N/A' }}</td>
                                        <td>
                                            <span class="badge {{ $user->demo_balance > 0 ? 'badge-success' : 'badge-secondary' }}">
                                                ${{ number_format($user->demo_balance, 2) }}
                                            </span>
                                        </td>
                                        <td>
                                            @if($user->demo_mode)
                                                <span class="badge badge-success">Активный</span>
                                            @else
                                                <span class="badge badge-secondary">Неактивный</span>
                                            @endif
                                        </td>
                                        <td>${{ number_format($user->account_bal, 2) }}</td>
                                        <td>{{ $user->created_at->toDayDateTimeString() }}</td>
                                        <td>
                                            <button type="button" class="btn btn-info btn-sm m-1"
                                                    data-toggle="modal" data-target="#updateBalanceModal"
                                                    data-user-id="{{ $user->id }}"
                                                    data-user-name="{{ $user->name }}"
                                                    data-demo-balance="{{ $user->demo_balance }}"
                                                    title="Редактировать демо-баланс">
                                                <i class="fa fa-edit"></i> Редактировать
                                            </button>

                                            <form action="{{ route('admin.demo.reset-user', $user->id) }}" method="POST" class="d-inline">
                                                @csrf
                                                <button type="submit" class="btn btn-warning btn-sm m-1"
                                                        onclick="return confirm('Вы уверены, что хотите сбросить демо-аккаунт этого пользователя?')"
                                                        title="Сбросить демо-аккаунт">
                                                    <i class="fa fa-sync-alt"></i> Сбросить
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="8" class="text-center">
                                            <div class="py-4">
                                                <i class="fas fa-users fa-3x text-gray-300 mb-3"></i>
                                                <h5 class="text-gray-500">Пользователи не найдены</h5>
                                                <p class="text-muted">Ни один пользователь не соответствует вашим критериям поиска.</p>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>

                        <!-- Pagination -->
                        @if($users->hasPages())
                            <div class="d-flex justify-content-center mt-3">
                                {{ $users->appends(request()->query())->links() }}
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Update Balance Modal -->
    <div class="modal fade" id="updateBalanceModal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Редактировать демо-баланс</h5>
                    <button type="button" class="close" data-dismiss="modal">
                        <span>&times;</span>
                    </button>
                </div>
                <form id="updateBalanceForm" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label><strong>Имя пользователя:</strong></label>
                            <input type="text" id="user-name-display" class="form-control" readonly>
                        </div>

                        <div class="form-group">
                            <label><strong>Текущий демо-баланс:</strong></label>
                            <input type="text" id="current-balance-display" class="form-control" readonly>
                        </div>

                        <div class="form-group">
                            <label for="action"><strong>Действие</strong></label>
                            <select name="action" id="action" class="form-control" required>
                                <option value="set">Установить баланс на</option>
                                <option value="add">Добавить сумму</option>
                                <option value="subtract">Вычесть сумму</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="demo_balance"><strong>Сумма</strong></label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">$</span>
                                </div>
                                <input type="number" step="0.01" class="form-control"
                                       name="demo_balance" id="demo_balance"
                                       value="100000" min="0" max="10000000" required>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Отмена</button>
                        <button type="submit" class="btn btn-primary">Обновить баланс</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            $('#updateBalanceModal').on('show.bs.modal', function (event) {
                var button = $(event.relatedTarget);
                var userId = button.data('user-id');
                var userName = button.data('user-name');
                var demoBalance = button.data('demo-balance');

                var modal = $(this);
                modal.find('#user-name-display').val(userName);
                modal.find('#current-balance-display').val('$' + parseFloat(demoBalance).toFixed(2));
                modal.find('#updateBalanceForm').attr('action', '/admin/demo/users/' + userId + '/balance');
            });
        });
    </script>
@endsection
