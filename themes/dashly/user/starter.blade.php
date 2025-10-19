@extends('layouts.dashly')
@section('title', $title)
@section('content')
    <!-- Title -->
    <h1 class="h2">
        Добро пожаловать
    </h1>
    <x-danger-alert />
    <x-success-alert />

@endsection
