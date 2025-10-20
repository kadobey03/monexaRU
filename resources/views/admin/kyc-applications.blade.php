<?php
if (Auth('admin')->User()->dashboard_style == 'light') {
    $text = 'dark';
    $bg = 'light';
} else {
    $bg = 'dark';
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
                <p>
                    <a href="{{ route('kyc') }}">
                        <i class="p-2 rounded-lg fa fa-arrow-circle-left fa-2x bg-light"></i>
                    </a>
                </p>

                <div class="mt-2 mb-4 d-flex justify-content-between align-items-center">
                    <div>
                        <h1 class="title1 text-{{ $text }}">{{ $kyc->user->name }} KYC Заявление</h1>
                        @if ($kyc->status == 'Verified')
                            <span class="badge badge-success">Подтверждено</span>
                        @else
                            <span class="badge badge-danger">{{ $kyc->status }}</span>
                        @endif
                    </div>
                    <a href="#" data-toggle="modal" data-target="#action" class="btn btn-primary btn-sm">Действие</a>
                </div>
                <div id="action" class="modal fade" role="dialog">
                    <div class="modal-dialog">
                        <!-- Modal content-->
                        <div class="modal-content">
                            <div class="modal-header ">
                                <h3 class="mb-2 d-inline text-{{ $text }}">KYC Обработка</h3>
                                <button type="button" class="close text-{{ $text }}" data-dismiss="modal"
                                    aria-h6="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body ">
                                <form action="{{ route('processkyc') }}" method="post">
                                    @csrf
                                    <div class="form-group">
                                        <select name="action" id="" class="form-control  text-{{ $text }}"
                                            required>
                                            <option value="Accept">Принять пользователя и подтвердить</option>
                                            <option value="Reject">Отклонить и оставить неподтвержденным</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <textarea name="message" placeholder="Введите сообщение" class="form-control  text-{{ $text }}" required>После проверки документов ваша учетная запись подтверждена. Теперь вы можете пользоваться всеми нашими услугами без ограничений. Спасибо!!</textarea>
                                    </div>
                                    <div class="form-group">
                                        <h5 class="text-{{ $text }}">Тема email</h5>
                                        <input type="text" name="subject" id=""
                                            class="form-control  text-{{ $text }}"
                                            placeholder="Учетная запись успешно подтверждена" required>
                                    </div>
                                    <input type="hidden" name="kyc_id" value="{{ $kyc->id }}">
                                    <div class="form-group">
                                        <button type="submit" class="px-4 btn btn-primary"> Подтвердить </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /view KYC ID Modal -->
                <x-danger-alert />
                <x-success-alert />
                <div class="mb-5 row">
                    <div class="col-md-12">
                        <div class="card p-md-4 p-2 ">
                            <div class="card-body">
                                <div class="row">
                                    <div class="mb-3 col-md-12 border-bottom">
                                        <small class="text-primary">Личная информация</small>
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <h2 class="text-{{ $text }}">{{ $kyc->first_name }}</h2>
                                        <small class="text-muted">Имя</small>
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <h2 class="text-{{ $text }}">{{ $kyc->last_name }}</h2>
                                        <small class="text-muted">Фамилия</small>
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <h2 class="text-{{ $text }}">{{ $kyc->email }}</h2>
                                        <small class="text-muted">Email</small>
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <h2 class="text-{{ $text }}">{{ $kyc->phone_number }}</h2>
                                        <small class="text-muted">Номер телефона</small>
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <h2 class="text-{{ $text }}">{{ $kyc->dob }}</h2>
                                        <small class="text-muted">Дата рождения</small>
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <h2 class="text-{{ $text }}">{{ $kyc->social_media }}</h2>
                                        <small class="text-muted">Имя пользователя в социальных сетях</small>
                                    </div>
                                    <div class="my-3 border-bottom col-md-12">
                                        <small class="text-primary">Информация об адресе</small>
                                    </div>

                                    <div class="mb-3 col-md-6">
                                        <h2 class="text-{{ $text }}">{{ $kyc->address }}</h2>
                                        <small class="text-muted">Адрес</small>
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <h2 class="text-{{ $text }}">{{ $kyc->city }}</h2>
                                        <small class="text-muted">Город</small>
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <h2 class="text-{{ $text }}">{{ $kyc->state }}</h2>
                                        <small class="text-muted">Штат/Область</small>
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <h2 class="text-{{ $text }}">{{ $kyc->country }}</h2>
                                        <small class="text-muted">Гражданство</small>
                                    </div>
                                    <div class="my-3 border-bottom col-md-12">
                                        <small class="text-primary">Информация о документах</small>
                                    </div>
                                    <div class="mb-5 col-md-12">
                                        <h2 class="text-{{ $text }}">{{ $kyc->document_type }}</h2>
                                        <small class="text-muted">Тип документа</small>
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <img src="{{ asset('storage/app/public/' . $kyc->frontimg) }}" alt=""
                                            class="w-50 img-fluid d-block">
                                        <small class="text-muted">Лицевая сторона документа</small>
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <img src="{{ asset('storage/app/public/' . $kyc->backimg) }}" alt=""
                                            class="w-50 img-fluid d-block">
                                        <small class="text-muted">Обратная сторона документа</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
