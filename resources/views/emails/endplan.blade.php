{{-- blade-formatter-disable --}}
@component('mail::message')
# Привет {{ $demo->receiver_name }},

Это уведомление о том, что срок вашего инвестиционного плана (план {{ $demo->receiver_plan }}) истек и капитал по этому плану был добавлен на ваш счет для вывода. <br>

<strong>План:</strong> {{ $demo->receiver_plan }} <br>

<strong>Сумма:</strong> {{ $demo->received_amount }} <br>

<strong>Дата:</strong> {{ $demo->date }} <br>

С уважением,<br>
{{ $demo->sender }}.
@endcomponent
{{-- blade-formatter-disable --}}
