<div>
    @if ($notificationsCount > 0)
        <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill text-bg-danger">
            {{ $notificationsCount }}<span class="visually-hidden">непрочитанных
                сообщений</span>
        </span>
    @endif
</div>
