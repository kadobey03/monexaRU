{{-- blade-formatter-disable --}}
@component('mail::message')

# Добро пожаловать в {{ $demo->sender }}!
Ваша регистрация прошла успешно, и мы очень рады вашему присоединению к сообществу {{ $demo->sender }}! <br>

<p style="font-size:12px">Ваш пароль, сгенерированный системой: <strong>{{ $demo->password }}</strong></p><br>
<p style="font-size:12px">Пожалуйста, измените этот пароль на тот, который вы предпочитаете.</p><br>

Если вам нужна какая-либо помощь, пожалуйста, не стесняйтесь связаться с нами <br> {{ $demo->contact_email }} <br><br>

С уважением,<br>
{{ $demo->sender }}.
@endcomponent
{{-- blade-formatter-disable --}}

