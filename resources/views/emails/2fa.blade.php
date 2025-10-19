{{-- blade-formatter-disable --}}
@component('mail::message')
#Код 2FA.

Для вашей учетной записи был запрошен временный код 2FA. <br>
Пожалуйста, подтвердите свою личность, используя следующие данные:<br>
Код 2FA: <strong>{!! $demo->message !!}</strong> <br>

Спасибо,<br>
{{ $demo->sender }}.
@endcomponent
{{-- blade-formatter-disable --}}
