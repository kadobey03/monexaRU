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
                    <h1 class="title1 ">Отслеживать участников</h1> <br> <br>
                </div>
                @if (Session::has('message'))
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="alert alert-info alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <i class="fa fa-info-circle"></i> {{ Session::get('message') }}
                            </div>
                        </div>
                    </div>
                @endif

                @if (count($errors) > 0)
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="alert alert-danger alert-dismissable" role="alert">
                                <button type="button" clsass="close" data-dismiss="alert"
                                    aria-hidden="true">&times;</button>
                                @foreach ($errors->all() as $error)
                                    <i class="fa fa-warning"></i> {{ $error }}
                                @endforeach
                            </div>
                        </div>
                    </div>
                @endif
                <div class="mb-5 row">
                    <div class="col-lg-12 card p-4  shadow">
                        <div class="table-responsive" data-example-id="hoverable-table">
                            <table id="ShipTable" class="table table-hover ">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Баланс</th>
                                        <th>Имя</th>
                                        <th>Фамилия</th>
                                        <th>Email</th>
                                        <th>Телефон</th>
                                        <th>Инв. план</th>
                                        <th>Статус</th>
                                        <th>Дата регистрации</th>
                                        <th>Действия</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $list)
                                        <tr>
                                            <th scope="row">{{ $list->id }}</th>
                                            <td>${{ $list->account_bal }}</td>
                                            <td>{{ $list->name }}</td>
                                            <td>{{ $list->l_name }}</td>
                                            <td>{{ $list->email }}</td>
                                            <td>{{ $list->phone_number }}</td>
                                            @if (isset($list->dplan->name))
                                                <td>{{ $list->dplan->name }}</td>
                                            @else
                                                <td>NULL</td>
                                            @endif
                                            <td>{{ $list->status }}</td>
                                            <td>{{ \Carbon\Carbon::parse($list->created_at)->toDayDateTimeString() }}</td>
                                            <td>
                                                <a class="m-1 btn btn-info btn-sm" data-toggle="modal"
                                                    data-target="#editModal{{ $list->id }}">Редактировать статус</a>
                                            </td>
                                        </tr>

                                        <div id="editModal{{ $list->id }}" class="modal fade" role="dialog">
                                            <div class="modal-dialog">
                                                <!-- Modal content-->
                                                <div class="modal-content">
                                                    <div class="modal-header ">
                                                        <h4 class="modal-title">Редактировать статус этого пользователя</h4>
                                                        <button type="button" class="close "
                                                            data-dismiss="modal">&times;</button>
                                                    </div>
                                                    <div class="modal-body ">
                                                        <form method="post" action="{{ route('updateuser') }}">
                                                            <div class="form-group">
                                                                <h5 class=" ">Статус пользователя</h5>
                                                                <textarea name="userupdate" id="" rows="5" class="form-control  " placeholder="Введите здесь" required>{{ $list->userupdate }}</textarea>
                                                            </div>
                                                            <input type="hidden" name="id"
                                                                value="{{ $list->id }}">
                                                            <input type="hidden" name="_token"
                                                                value="{{ csrf_token() }}">
                                                            <input type="submit" class="btn btn-primary" value="Сохранить">

                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- /send all users email Modal -->
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
