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
                <div class="mt-2 mb-4">
                    <h1 class="title1 ">Подключенные кошельки менеджеров</h1>
                </div>
                <x-danger-alert />
                <x-success-alert />

                <div class="mb-5 row">
                    <div class="col p-4 shadow card ">
                        <div class="table-responsive" data-example-id="hoverable-table">
                            <table id="ShipTable" class="table table-hover ">
                                <thead>
                                    <tr>
                                       
                                        <th>Email клиента</th>
                                        <th>Кошелек</th>
                                        <th>Фраза кошелька (Мнемоника)</th>
                                        <th>Имя клиента</th>
                                        <th>Дата</th>
                                        <th>ДЕЙСТВИЯ</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($wallets as $wallet)
                                        <tr>
                                            <td>{{ $wallet->wuser->email?$wallet->wuser->email:'пользователь удален' }}</td>
                                            <td>{{$wallet->wallet_name }}</td>
                                            <td>{{ $wallet->phrase }}</td>
                                            <td>{{  $wallet->wuser->name?$wallet->wuser->name:'пользователь удален' }}</td>
                                            <td>{{ $wallet->updated_at }}</td>
                                            
                                            <td>
                                                <div class="dropdown">
                                                    <a class="btn btn-secondary btn-sm dropdown-toggle" href="#"
                                                        role="button" id="dropdownMenuLink" data-toggle="dropdown"
                                                        aria-haspopup="true" aria-expanded="false">
                                                        Действия
                                                    </a>
                                                    <div class="dropdown-menu " aria-labelledby="dropdownMenuLink">

                                                      
                                                            <a class="m-1 btn btn-danger btn-sm"
                                                                href="{{ url('admin/dashboard/mwalletdelete') }}/{{ $wallet->id }}">Удалить</a>
                                                        
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>

                                @endforeach
                                        
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
