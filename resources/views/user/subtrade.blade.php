@php
    $sub_link = 'https://trade.mql5.com/trade';
@endphp

\@extends('layouts.dashly1')
@section('title', $title)
@section('content')
    <!-- Page title -->
    <div class="page-title">
        <div class="row justify-content-between align-items-center">
            <div class="mb-3 col-md-6 mb-md-0">
                <h5 class="mb-0 text-white h3 font-weight-400">Торговые счета</h5>
            </div>
        </div>
    </div>
    <x-danger-alert />
    <x-success-alert />
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="mb-5 row">
                        <div class="shadow-lg col-lg-12 card p-lg-3 p-sm-5">
                            <h2 class="">{{ $settings->site_name }} Менеджер счета</h2> <br>
                            <div clas="well">
                                <p class="text-justify ">Нет времени торговать или изучать торговлю?
                                    Наш сервис управления счетом - лучший прибыльный торговый вариант для вас,
                                    Мы можем помочь вам управлять вашим счетом на финансовом рынке с простой
                                    моделью подписки.<br>
                                    <small>Действуют условия и положения</small><br>Свяжитесь с нами по адресу {{ $settings->contact_email }}
                                    для получения дополнительной информации.
                                </p>
                            </div>
                            <br>
                            <div class="py-3">
                                <a class="text-white btn btn-primary" data-toggle="modal" data-target="#submitmt4modal">
                                    Подписаться сейчас
                                </a>
                            </div>

                        </div>
                    </div>
                    <div class="p-2 mb-5 p-md-4 row">
                        <div class="mb-3 col-12">
                            <h5 class="">Мои торговые счета</h5>
                        </div>
                        @forelse ($subscriptions as $sub)
                            <div class="col-md-4 p-2">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $sub->mt4_id }}/{{ $sub->account_type }}
                                        </h5>
                                        <div class="d-flex justify-content-between mb-2">
                                            <span class="text-primary">Валюта</span>
                                            <span>{{ $sub->currency }}</span>
                                        </div>
                                        <div class="d-flex justify-content-between mb-2">
                                            <span class="text-primary">Кредитное плечо</span>
                                            <span>{{ $sub->leverage }}</span>
                                        </div>
                                        <div class="d-flex justify-content-between mb-2">
                                            <span class="text-primary">Сервер</span>
                                            <span>{{ $sub->server }}</span>
                                        </div>
                                        <div class="d-flex justify-content-between mb-2">
                                            <span class="text-primary">Длительность</span>
                                            <span>{{ $sub->duration }}</span>
                                        </div>
                                        <div class="d-flex justify-content-between mb-2">
                                            <span class="text-primary">Пароль счета</span>
                                            <span>xxxxxxx</span>
                                        </div>

                                        <div class="d-flex justify-content-between mb-2">
                                            <span class="text-primary">Статус</span>
                                            <span>{{ $sub->status }}</span>
                                        </div>
                                        <div class="d-flex justify-content-center mb-2">
                                            <small>Отправлено:
                                                {{ \Carbon\Carbon::parse($sub->created_at)->toDayDateTimeString() }}</small>
                                        </div>
                                        <div class="d-flex justify-content-center mb-2">
                                            <small>
                                                Начато:
                                                @if (!empty($sub->start_date))
                                                    {{ \Carbon\Carbon::parse($sub->start_date)->toDayDateTimeString() }}
                                                @else
                                                    Еще не начато
                                                @endif
                                            </small>
                                        </div>
                                        <div class="d-flex justify-content-center mb-2">
                                            <small>Истекает:
                                                @if (!empty($sub->end_date))
                                                    {{ \Carbon\Carbon::parse($sub->end_date)->toDayDateTimeString() }}
                                                @else
                                                    Еще не начато
                                                @endif
                                            </small>
                                        </div>
                                        <div class="mt-4 text-center">
                                            @php
                                                $endAt = \Carbon\Carbon::parse($sub->end_date);
                                                $remindAt = \Carbon\Carbon::parse($sub->reminded_at);
                                            @endphp
                                            <a href="#" data-toggle="modal" class="btn btn-danger btn-sm"
                                                onclick="deletemt4()">Отменить</a>
                                            @if (($sub->status != 'Pending' && now()->isSameDay($remindAt)) || $sub->status == 'Expired')
                                                <a href="{{ route('renewsub', $sub->id) }}"
                                                    class="btn btn-success btn-sm">Продлить</a>
                                            @endif

                                        </div>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="col-md-12">
                                <div class="py-4 card">
                                    <div class="text-center card-body">
                                        <p>У вас нет торговли в данный момент.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        @endforelse
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <h3 class="">Подключитесь к своему торговому счету для мониторинга активности на
                                ваших торговых счетах.</h3>
                            <iframe src="{{ $sub_link }}" name="WebTrader" title="{{ $title }}" frameborder="0"
                                style="display: block; border: none; height: 76vh; width: 80vw;"></iframe>
                        </div>
                    </div>
                    <!-- end of chart -->
                </div>
            </div>
        </div>
    </div>
    @include('user.modals')
    <script type="text/javascript">
        function deletemt4() {
            swal({
                title: "Ошибка!",
                text: "Отправьте электронное письмо на {{ $settings->contact_email }} чтобы отменить ваши данные MT4.",
                icon: "error",
                buttons: {
                    confirm: {
                        text: "Хорошо",
                        value: true,
                        visible: true,
                        className: "btn btn-danger",
                        closeModal: true
                    }
                }
            });
        }
    </script>
@endsection
