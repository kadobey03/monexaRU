<?php
if (Auth('admin')->User()->dashboard_style == 'light') {
    $text = 'dark';
} else {
    $text = 'light';
}
?>
@extends('layouts.app')
@section('content')
    @include('admin.topmenu')
    @include('admin.sidebar')
    <div class="main-panel ">
        <div class="content ">
            <div class="page-inner">
                <div class="mt-2 mb-5">
                    <h1 class="title1 ">Изменить пароль</h1> <br> <br>
                </div>
                <x-danger-alert />
                <x-success-alert />
                <div class="mb-5 row">
                    <div class="col-lg-8 offset-lg-2 card p-4  shadow">
                        <form method="post" action="{{ route('adminupdatepass') }}">
                            <div class="">
                                <h5 class=" ">Старый пароль</h5>
                                <input type="password" name="old_password" class="form-control  " required>
                            </div>
                            <div class="">
                                <h5 class=" ">Новый пароль*</h5>
                                <input type="password" name="password" class="form-control  " required>
                            </div>
                            <div class="">
                                <h5 class=" ">Подтвердить пароль</h5>
                                <input type="password" name="password_confirmation" class="form-control  " required>
                            </div> <br>
                            <input type="submit" class="btn btn-primary" value="Отправить">

                            <input type="hidden" name="id" value="{{ Auth('admin')->User()->id }}">
                            <input type="hidden" name="current_password" value="{{ Auth('admin')->User()->password }}">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}"><br />
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endsection
