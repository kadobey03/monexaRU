@extends('layouts.dasht')
@section('title', $title)
@section('content')
    <!-- Title -->
    <h1 class="h2">
        Завершить запрос на вывод
    </h1>
    @if (session('status'))
        <script type="text/javascript">
            Swal.fire({
                title: 'Ошибка!',
                text: "{{ session('status') }}",
                icon: 'error',
                confirmButtonText: 'Хорошо'
            })
        </script>
        {{ session()->forget('status') }}
    @endif
    <x-danger-alert />
    <x-success-alert />
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="mb-5 row">
                        <div class="col-lg-8 offset-md-2">
                            <div class="mb-3">
                                <h4 class="h2"> <i class="bi bi-cursor"></i> {{ $payment_mode }}</h4>
                            </div>
                            @if ($payment_mode == 'USDT' and $settings->auto_merchant_option == 'Binance' and $settings->withdrawal_option == 'auto')
                                <livewire:user.crypto-withdaw :payment_mode="$payment_mode" />
                            @else
                                <form action="{{ route('completewithdrawal') }}" method="post">
                                    @csrf
                                    <div class="mb-3">
                                        <label class="">Введите сумму для вывода
                                            ({{ $settings->currency }})</label>
                                        <input class="form-control " placeholder="Введите сумму" type="number"
                                            name="amount" step="any" required>
                                    </div>
                                    <input value="{{ $payment_mode }}" type="hidden" name="method">

                                    @if (Auth::user()->sendotpemail == 'Yes')
                                        <div class="mb-3">
                                            <label class="m-1 d-inline">Введите OTP</label>
                                            <div class="float-right m-1 btn-group d-inline">
                                                <a class="btn btn-primary btn-sm" href="{{ route('getotp') }}"> <i
                                                        class="fa fa-envelope"></i> Запросить OTP</a>
                                            </div>
                                            <input class="form-control " placeholder="Введите OTP" type="text"
                                                name="otpcode" required>
                                            <small class="">OTP будет отправлен на вашу электронную почту
                                                при запросе</small>
                                        </div>
                                    @endif
                                    @if (!$default or $payment_mode == 'BUSD')
                                        @if ($methodtype == 'crypto')
                                            <div class="mb-3">
                                                <h5 class="">Введите адрес {{ $payment_mode }} </h5>
                                                <input class="form-control " placeholder="Введите адрес {{ $payment_mode }}"
                                                    type="text" name="details" required>
                                                <small class="">{{ $payment_mode }} не является опцией по умолчанию
                                                    для вывода с вашего аккаунта, введите правильный
                                                    адрес кошелька для получения средств.</small>
                                            </div>
                                        @else
                                            <div class="mb-3">
                                                <label class="">Введите данные {{ $payment_mode }} </label>
                                                <textarea class="form-control " row="4" name="details"
                                                    placeholder="Название банка: Название, Номер счета: Номер, Имя счета: Имя, Swift код: Код" required>

                                            </textarea>
                                                <small class="">{{ $payment_mode }} не является опцией по умолчанию
                                                    для вывода с вашего аккаунта, введите правильные банковские
                                                    данные через запятую для получения средств.</small> <br />
                                                <span class="text-danger">Название банка: Название, Номер счета: Номер,
                                                    Имя счета: Имя, Swift код: Код</span>
                                            </div>
                                        @endif
                                    @endif
                                    <div class="mb-3">
                                        <button class="btn btn-primary" type='submit'>Завершить запрос</button>
                                    </div>
                                </form>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
