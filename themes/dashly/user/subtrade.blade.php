@extends('layouts.dashly')
@section('title', $title)
@section('content')
    <!-- Title -->
    <h1 class="h2">
        Управляемые счета
    </h1>
    <x-danger-alert />
    <x-success-alert />
    <div class="row">
        <div class="col-lg-8">
            <!-- Card -->
            <div class="card border-0">
                <div class="card-header border-0">
                    <!-- Title -->
                    <h2 class="h3 mb-0">
                        Продвинутый менеджер счетов {{ $settings->site_name }}
                    </h2>
                </div>

                <div class="card-body">
                    <h4 class="mb-3">Описание</h4>

                    <p class="mb-3">
                        У вас нет времени торговать или изучать торговлю?</p>
                    <p>
                        Наша служба управления счетами - лучший прибыльный торговый вариант для вас,
                        мы можем помочь вам управлять вашим счетом на финансовом рынке с помощью простой модели подписки.
                    </p>
                    <small>
                        Действуют условия и положения</small><br>Свяжитесь с нами по адресу {{ $settings->contact_email }}
                    для получения дополнительной информации.

                    <h4 class="my-3">Контрольный список</h4>
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="checklist1" checked
                                    disabled>
                                <label class="form-check-label" for="checklist1">
                                    Торговля от вашего имени
                                </label>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="checklist2" checked
                                    disabled>
                                <label class="form-check-label" for="checklist2">
                                    Управление вашим счетом
                                </label>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="checklist3" disabled
                                    checked>
                                <label class="form-check-label" for="checklist3">
                                    Снимайте прибыль самостоятельно
                                </label>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="checklist3" disabled
                                    checked>
                                <label class="form-check-label" for="checklist3">
                                    Поддержка 24/7
                                </label>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="checklist3" disabled
                                    checked>
                                <label class="form-check-label" for="checklist3">
                                    100% прозрачность
                                </label>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="checklist3" disabled
                                    checked>
                                <label class="form-check-label" for="checklist3">
                                    100% контроль у вас
                                </label>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="checklist3" disabled
                                    checked>
                                <label class="form-check-label" for="checklist3">
                                    100% безопасность и надежность
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Card -->
            <div class="card border-0">
                <div class="card-body">
                    <h4 class="mb-5">Счета под управлением.</h4>
                    @if ($subscriptions->count() === 0)
                        <div class="text-center">
                            <i class="bi bi-database-fill-exclamation" style="font-size: 50px"></i>
                            <h2 class="h3">У вас нет управляемых счетов</h2>
                            <a class="btn btn-primary" data-toggle="modal" data-target="#submitmt4modal">
                                Добавить счет
                            </a>
                        </div>
                    @else
                        <div class=" table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <th>Счет</th>
                                    <th>Валюта</th>
                                    <th>Кредитное плечо</th>
                                    <th>Сервер</th>
                                    <th>Продолжительность</th>
                                    <th>Пароль счета</th>
                                    <th>Статус</th>
                                    <th>Отправлено</th>
                                    <th>Дата начала/окончания</th>
                                    <th></th>
                                </thead>
                                <tbody>
                                    @foreach ($subscriptions as $sub)
                                        <tr>
                                            <td>
                                                {{ $sub->mt4_id }} <br> {{ $sub->account_type }}
                                            </td>
                                            <td>
                                                {{ $sub->currency }}
                                            </td>
                                            <td>
                                                {{ $sub->leverage }}
                                            </td>
                                            <td>
                                                {{ $sub->server }}
                                            </td>
                                            <td>
                                                {{ $sub->duration }}
                                            </td>
                                            <td>
                                                **********
                                            </td>
                                            <td>
                                                <span class="badge bg-info"> {{ $sub->status }}</span>
                                            </td>
                                            <td>
                                                {{ \Carbon\Carbon::parse($sub->created_at)->format('M d Y') }}
                                            </td>
                                            <td>
                                                @if (!empty($sub->start_date))
                                                    {{ \Carbon\Carbon::parse($sub->start_date)->format('M d Y') }}
                                                @else
                                                    -
                                                @endif
                                                /
                                                @if (!empty($sub->end_date))
                                                    {{ \Carbon\Carbon::parse($sub->end_date)->format('M d Y') }}
                                                @else
                                                    -
                                                @endif
                                            </td>
                                            <td>
                                                @php
                                                    $endAt = \Carbon\Carbon::parse($sub->end_date);
                                                    $remindAt = \Carbon\Carbon::parse($sub->reminded_at);
                                                @endphp
                                                <a href="#" data-bs-toggle="modal" class="btn btn-danger btn-sm"
                                                    onclick="deletemt4()">Отменить</a>
                                                @if (($sub->status != 'Pending' && now()->isSameDay($remindAt)) || $sub->status == 'Expired')
                                                    <a href="{{ route('renewsub', $sub->id) }}"
                                                        class="btn btn-primary btn-sm">Обновить</a>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @endif
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <livewire:user.add-new-account />
        </div>
    </div> <!-- / .row -->
@endsection
@push('scripts')
    <script type="text/javascript">
        function deletemt4() {
            Swal.fire({
                title: 'Ошибка!',
                text: 'Отправьте электронное письмо на адрес {{ $settings->contact_email }} для отмены вашего счета.',
                icon: 'error',
                confirmButtonText: 'Хорошо'
            });
        }
    </script>
@endpush
