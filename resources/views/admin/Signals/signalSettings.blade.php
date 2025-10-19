@extends('layouts.app')
@section('content')
    @include('admin.topmenu')
    @include('admin.sidebar')
    <div class="main-panel ">
        <div class="content">
            <div class="page-inner">
                <x-danger-alert />
                <x-success-alert />
                <div class="mt-2 mb-4">
                    <h1 class="title1 m-0">Настройки торговых сигналов</h1>
                    <p>Установить тарифы подписки на торговые сигналы</p>
                </div>
                <div class="mb-5 row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-8 offset-lg-2">
                                        <form action="{{ route('save.settings') }}" method="post">
                                            @csrf
                                            @method('PUT')
                                            <div class="form-group">
                                                <label for="">Месячная плата ({{ $settings->currency }})</label>
                                                <input type="number" class="form-control"
                                                    value="{{ $signalSettings->signal_monthly_fee }}" name="monthly"
                                                    id="">
                                            </div>
                                            <div class="form-group">
                                                <label for="">Квартальная плата ({{ $settings->currency }})</label>
                                                <input type="number" step="any"
                                                    value="{{ $signalSettings->signal_quartly_fee }}" class="form-control"
                                                    name="quaterly">
                                            </div>
                                            <div class="form-group">
                                                <label for="">Годовая плата ({{ $settings->currency }})</label>
                                                <input type="number" step="any"
                                                    value="{{ $signalSettings->signal_yearly_fee }}" class="form-control"
                                                    name="yearly">
                                            </div>
                                            <div class="form-group">
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <label for="">ID чата</label>
                                                    @if ($signalSettings->chat_id == '')
                                                        <a href="{{ route('chat.id') }}" class="btn btn-info btn-sm">Получить
                                                            ID</a>
                                                    @else
                                                        <a href="{{ route('delete.id') }}"
                                                            class="btn btn-danger btn-sm">Удалить
                                                            ID</a>
                                                    @endif
                                                </div>
                                                <input type="text" value="{{ $signalSettings->chat_id }}"
                                                    class="form-control" name="chat_id" readonly>
                                                @if ($signalSettings->chat_id == '')
                                                    <small>
                                                        Пожалуйста, убедитесь, что вы ввели API вашего Telegram бота и отправили
                                                        хотя бы одно сообщение в ваш приватный канал. Также убедитесь,
                                                        что вы добавили бота в качестве администратора приватного канала, для того
                                                        чтобы получить ID чата.
                                                    </small>
                                                @endif
                                            </div>
                                            <div class="form-group">
                                                <label for="">API Telegram бота</label>
                                                <input type="text" value="{{ $signalSettings->telegram_bot_api }}"
                                                    class="form-control" name="telegram_bot_api">
                                                <p><a href="https://learn.microsoft.com/en-us/azure/bot-service/bot-service-channel-connect-telegram?view=azure-bot-service-4.0#create-a-new-telegram-bot-with-botfather"
                                                        target="_blank" class="mt-2 text-danger">
                                                        Посмотреть как <i class="fa fa-link"></i>
                                                    </a> создать вашего telegram бота</p>
                                            </div>

                                            <div class="form-group">
                                                <button class="btn btn-primary px-4" type="submit">Сохранить</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
