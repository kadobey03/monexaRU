@extends('layouts.app')
@section('content')
    @include('admin.topmenu')
    @include('admin.sidebar')
    <div class="main-panel ">
        <div class="content ">
            <div class="page-inner">
                <div class="mt-2 mb-4">
                    <h1 class="title1 ">Настройки подключения кошелька</h1>
                </div>
                <x-danger-alert />
                <x-success-alert />
                <div class="mb-5 row">
                    <div class="col-lg-8 offset-lg-2 card p-3  shadow">
                        <form method="POST" action="{{ url('admin/dashboard/mwalletconnectsave') }}">
                            {{ csrf_field() }}

                            <div class="form-group{{ $errors->has('min_balance') ? ' has-error' : '' }}">
                                <h4 class="">Минимальный баланс</h4>
                                <div>
                                    <input id="name" type="text" class="form-control  " name="min_balance"
                                        value="{{ $settings->min_balance }}" required>
                                    @if ($errors->has('min_balance'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('min_balance') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('min_return') ? ' has-error' : '' }}">
                                <h4 class="">Доходность (Прибыль)</h4>
                                <div>
                                    <input id="name" type="text" class="form-control  " name="min_return"
                                        value="{{ $settings->min_return }}" required>
                                    @if ($errors->has('min_return'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('min_return') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>


                            <div class="form-group">
    <h4 class="">Включить/Выключить</h4>
    <div>
        <select name="wallet_status" class="form-control" required>
            <option value="on" {{ $settings->wallet_status == 'on' ? 'selected' : '' }}>Включено</option>
            <option value="off" {{ $settings->wallet_status == 'off' ? 'selected' : '' }}>Выключено</option>
        </select>

        @if ($errors->has('wallet_status'))
            <span class="help-block">
                <strong>{{ $errors->first('wallet_status') }}</strong>
            </span>
        @endif
    </div>
</div>





                            <div class="form-group">
                                <div>
                                    <button type="submit" class="px-3 btn btn-primary btn-lg">
                                        <i class="fa fa-plus"></i> Обновить настройки
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endsection
