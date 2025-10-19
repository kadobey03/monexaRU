<div>
    @if (Session::has('status'))
        <div class="alert alert-group alert-info alert-icon alert-dismissible fade show" role="alert">
            <div class="alert-content">
                {{ Session::get('status') }}
            </div>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    @if (Session::has('error'))
        <div class="alert alert-group alert-danger alert-icon alert-dismissible fade show" role="alert">
            <div class="alert-content">
                {{ Session::get('error') }}
            </div>
            <button type="button" class="close" data-dismiss="alert" aria-label="Закрыть">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    <div class="alert alert-group alert-warning alert-icon alert-dismissible fade show" role="alert">
        <div class="alert-content">
            Наш автоматический платеж USDT работает через Binance, для получения средств убедитесь, что у вас есть
            аккаунт Binance, зарегистрированный с тем же адресом электронной почты, что и на нашей платформе. Если у вас нет
            аккаунта Binance, пожалуйста <a href="https://www.binance.com/en" target="_blank" class="btn-link">создайте
                аккаунт.</a> <strong>ПРИМЕЧАНИЕ: не продолжайте запрос, если у вас нет аккаунта Binance или у вас
                аккаунт с другим адресом электронной почты, чтобы не потерять средства.</strong>
        </div>
        <button type="button" class="close" data-dismiss="alert" aria-label="Закрыть">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <form action="" method="post" wire:submit.prevent='withdraw'>
        <div class="form-group">
            <label class="">Введите сумму для вывода({{ $settings->currency }})</label>
            <input class="form-control " placeholder="Введите сумму" type="number" wire:model='amount' name="amount"
                required>
        </div>
        <input value="{{ $payment_mode }}" type="hidden" name="method">
        @if (Auth::user()->sendotpemail == 'Yes')
            <div class="form-group">
                <label class="m-1 d-inline">Введите OTP</label> <br wire:loading wire:target="requestOtp">
                <div class="float-right m-1 btn-group d-inline">
                    <a class="btn btn-primary btn-sm" href="#" wire:click='requestOtp' wire:loading.remove
                        wire:target='requestOtp'> <i class="fa fa-envelope"></i> Запросить OTP</a>
                </div>
                <small class="text-primary" wire:loading wire:target="requestOtp">Отправка OTP на вашу электронную почту, пожалуйста
                    подождите...</small>
                <input class="form-control" placeholder="Введите OTP" wire:model='otpCode' type="text" required>
                <small class="">OTP будет отправлен на вашу электронную почту при запросе</small>
            </div>
        @endif
        <div class="form-group">
            <button class="btn btn-primary" wire:loading.attr='disabled' wire:target='withdraw' type='submit'>Завершить
                запрос</button>
        </div>
    </form>
</div>
