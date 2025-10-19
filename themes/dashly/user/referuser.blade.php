@extends('layouts.dashly')
@section('title', $title)
@section('content')
    <!-- Title -->
    <h1 class="h2">
        Направляйте пользователей в сообщество {{ $settings->site_name }}
    </h1>
    <livewire:user.referral-system />
@endsection
