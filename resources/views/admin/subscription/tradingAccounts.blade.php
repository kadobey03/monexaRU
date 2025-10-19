@extends('layouts.app')
@section('content')
    @include('admin.topmenu')
    @include('admin.sidebar')
    <div class="main-panel">
        <div class="content">
            <div class="page-inner ">
                <div class="mt-2 mb-4 d-flex justify-content-between">
                    <div class="">
                        <h1 class="title1">Подключенные счета</h1>
                        <div class="">
                            <h4 class="m-0">Эти счета подключены к вашему главному торговому счету.
                            </h4>
                            <ul class="text-primary font-weight-bold">
                                <li>
                                    Счета будут удалены через 10 дней после истечения срока действия, если не будут продлены.

                                <li>
                                    Счета не будут получать сделки, если они не развернуты, даже если копи-трейдинг включен.

                                </li>
                            </ul>
                        </div>
                    </div>
                    <div>
                        <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#addccount">Добавить
                            счет</button>

                        <div class="modal fade" id="addccount" tabindex="-1" aria-labelledby="delete" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content shadow-3">
                                    <div class="modal-header">
                                        <div class="icon icon-shape rounded-3 bg-soft-primary text-primary text-lg me-4">
                                            <i class="fa fa-plus"></i>
                                        </div>
                                        <div>
                                            <h5 class="mb-1">Добавить счет</h5>
                                        </div>
                                    </div>
                                    <div class="modal-body">
                                        <form role="form" method="post" action="{{ route('create.sub') }}">
                                            @csrf
                                            <div class="form-row">
                                                <div class="form-group col-md-6 text-left">
                                                    <label>Логин*:</label>
                                                    <input class="form-control" type="text" name="login" required>
                                                </div>
                                                <div class="form-group col-md-6 text-left">
                                                    <label>Пароль счета*:</label>
                                                    <input class="form-control  " type="text" name="password" required>
                                                </div>
                                                <div class="form-group col-md-6 text-left">
                                                    <label>Имя счета*:</label>
                                                    <input class="form-control" type="text" name="name" required>
                                                </div>
                                                <div class="form-group col-md-6 text-left">
                                                    <label>Сервер*:</label>
                                                    <input class="form-control " Placeholder="Например, HantecGlobal-live"
                                                        type="text" name="serverName" required>
                                                </div>
                                                <div class="form-group col-md-6 text-left">
                                                    <label>Тип счета:</label>
                                                    <input class="form-control  " Placeholder="Например, Standard" type="text"
                                                        name="acntype" required>
                                                </div>
                                                <div class="form-group col-md-6 text-left">
                                                    <label>Кредитное плечо:</label>
                                                    <input class="form-control  " Placeholder="Например, 1:500" type="text"
                                                        name="leverage" required>
                                                </div>
                                                <div class="form-group col-md-6 text-left">
                                                    <label>Валюта:</label>
                                                    <input class="form-control" Placeholder="Например, USD" type="text"
                                                        name="currency" required>
                                                </div>
                                                <div class="form-group col-md-12 text-left">
                                                    <input type="submit" class="btn btn-primary" value="Добавить счет">
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <x-danger-alert />
                <x-success-alert />
                <div class="mt-2 mb-5 row">
                    <div class="col-12">
                        <div class="card p-3">
                            <div class="row">
                                <div class="col-12">
                                    <ul class="nav nav-pills">
                                        <li class="nav-item">
                                            <a href="{{ route('msubtrade') }}" class="nav-link ">Отправленные счета</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="{{ route('tacnts') }}" class="nav-link active">Подключенные счета</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="mt-3 row">

                                <div class="col-12">
                                    <div class="table-responsive" data-example-id="hoverable-table">
                                        <table class="table table-hover">
                                            <thead>
                                                <tr>
                                                    <th>ID счета</th>
                                                    <th>Пароль счета</th>
                                                    <th>Тип счета</th>
                                                    <th>Имя счета</th>
                                                    <th>Сервер</th>
                                                    <th>Начато в</th>
                                                    <th>Истекает в</th>
                                                    <th>Развертывание</th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @forelse ($data['data'] as $item)
                                                    <tr>
                                                        <td>
                                                            {{ $item['login'] }}
                                                        </td>
                                                        <td>
                                                            {{ $item['password'] }}
                                                        </td>
                                                        <td>
                                                            {{ $item['account_type'] }}
                                                        </td>
                                                        <td>
                                                            {{ $item['account_name'] }}
                                                        </td>
                                                        <td>
                                                            {{ $item['server'] }}
                                                        </td>
                                                        <td>
                                                            <span>{{ \Carbon\Carbon::parse($item['start_date'])->toDayDateTimeString() }}</span>
                                                        </td>
                                                        <td>

                                                            @if (now()->greaterThanOrEqualTo(\Carbon\Carbon::parse($item['end_date'])))
                                                                <span
                                                                    class="text-danger">{{ \Carbon\Carbon::parse($item['end_date'])->toDayDateTimeString() }}</span>
                                                                <a href="" class="btn btn-info btn-sm"
                                                                    data-target="#renewModal{{ $item['id'] }}"
                                                                    data-toggle="modal">Продлить</a>
                                                            @else
                                                                <span>{{ \Carbon\Carbon::parse($item['end_date'])->toDayDateTimeString() }}</span>
                                                            @endif
                                                        </td>
                                                        <td>
                                                            @if ($item['deployment_status'] == 'Deployed')
                                                                <h2 class="badge badge-success">
                                                                    {{ $item['deployment_status'] }}</h2>
                                                                <a href="{{ route('acnt.deployment', ['id' => $item['id'], 'deployment' => 'Undeploy']) }}"
                                                                    class="btn btn-warning btn-sm">Отменить развертывание</a>
                                                            @else
                                                                <h2 class="badge badge-warning">
                                                                    {{ $item['deployment_status'] }}</h2>
                                                                @if (!now()->greaterThanOrEqualTo(\Carbon\Carbon::parse($item['end_date'])))
                                                                    <a href="{{ route('acnt.deployment', ['id' => $item['id'], 'deployment' => 'Deploy']) }}"
                                                                        class="btn btn-success btn-sm">Развернуть</a>
                                                                @endif
                                                            @endif
                                                        </td>
                                                        <td>
                                                            @if (!$item['started_copy_trade'])
                                                                <button class="btn btn-sm btn-primary m-1"
                                                                    data-toggle="modal"
                                                                    data-target="#copytrade{{ $item['id'] }}">
                                                                    Начать копи-трейдинг
                                                                </button>
                                                                @include('admin.subscription.subscriber.copytrade')
                                                            @else
                                                                <span class="badge badge-success mt-1">
                                                                    Копи-трейдинг включен
                                                                </span>
                                                                <span>Поставщик: {{ $item['provider'] }}</span>
                                                            @endif
                                                            <a href="#" class="btn btn-danger btn-sm m-1"
                                                                data-toggle="modal" data-target="#deleteModal">
                                                                Удалить счет
                                                            </a>
                                                        </td>
                                                    </tr>
                                                    <!-- Modal -->
                                                    <div class="modal fade" id="deleteModal" tabindex="-1"
                                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLabel">Удалить
                                                                        торговый счет
                                                                    </h5>
                                                                    <button type="button" class="close"
                                                                        data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body text-left">
                                                                    Вы уверены, что хотите удалить торговый счет?
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary"
                                                                        data-dismiss="modal">Закрыть
                                                                    </button>
                                                                    <a href="{{ route('del.sub', ['id' => $item['id']]) }}"
                                                                        type="button" class="btn btn-danger">
                                                                        Да, удалить
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <!-- Modal -->
                                                    <div class="modal fade" id="renewModal{{ $item['id'] }}"
                                                        tabindex="-1" aria-labelledby="exampleModalLabel"
                                                        aria-hidden="true">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLabel">Продлить
                                                                        торговый счет
                                                                    </h5>
                                                                    <button type="button" class="close"
                                                                        data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body text-center">
                                                                    <h3>С вас будет взята плата ${{ $amountPerSlot }} за
                                                                        продление.</h3>
                                                                    <form action="{{ route('renew.acnt') }}"
                                                                        method="POST">
                                                                        @csrf
                                                                        <input type="hidden" name="account_id"
                                                                            value="{{ $item['id'] }}">
                                                                        <button type="submit" class="btn btn-primary">
                                                                            Да, продолжить
                                                                        </button>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @empty
                                                    <tr>
                                                        <td colspan="9" class="text-center">
                                                            Данные отсутствуют
                                                        </td>
                                                    </tr>
                                                @endforelse
                                            </tbody>
                                        </table>
                                        {{-- {{ $data['links'] }} --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
