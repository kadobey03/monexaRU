<?php
if (Auth('admin')->User()->dashboard_style == 'light') {
    $text = 'dark';
} else {
    $text = 'light';
}
?>
@extends('layouts.app')
@section('content')
@section('styles')
<style>
   .bg-gradient-primary {
       background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
   }
   .page-icon-wrapper {
       position: relative;
   }
   .page-icon {
       width: 70px;
       height: 70px;
       box-shadow: 0 4px 15px rgba(0,0,0,0.2);
   }
   .modal-icon-wrapper {
       background: rgba(255,255,255,0.2);
       padding: 12px;
       border-radius: 50%;
   }
   .table th {
       font-weight: 600;
       text-transform: uppercase;
       font-size: 0.875rem;
       letter-spacing: 0.5px;
   }
   .table td {
       vertical-align: middle;
       font-size: 0.9rem;
   }
   .dropdown-toggle::after {
       margin-left: 0.5rem;
   }
   .password-info {
       border-left: 4px solid #ffc107;
   }
   .info-icon {
       flex-shrink: 0;
   }
</style>
@endsection
    @include('admin.topmenu')
    @include('admin.sidebar')
    <div class="main-panel ">
        <div class="content ">
            <div class="page-inner">
                <div class="mt-2 mb-5 d-flex align-items-center">
                    <div class="page-icon-wrapper me-3">
                        <div class="page-icon bg-gradient-primary text-white rounded-circle d-flex align-items-center justify-content-center">
                            <i class="fas fa-user-shield fa-2x"></i>
                        </div>
                    </div>
                    <div>
                        <h1 class="title1 mb-1">Список администраторов</h1>
                        <p class="text-muted mb-0">Просматривайте и управляйте системными администраторами</p>
                    </div>
                </div>
                <x-danger-alert />
                <x-success-alert />

                <div class="mb-5 row">
                    <div class="col">
                        <div class="card shadow-lg border-0 overflow-hidden">
                            <div class="card-header bg-gradient-primary text-white py-3">
                                <div class="d-flex align-items-center">
                                    <i class="fas fa-table fa-lg me-2"></i>
                                    <h5 class="mb-0 text-white">Список администраторов</h5>
                                </div>
                            </div>
                            <div class="card-body p-0">
                                <div class="table-responsive" data-example-id="hoverable-table">
                                    <table id="ShipTable" class="table table-hover mb-0">
                                        <thead class="bg-light">
                                            <tr>
                                                <th class="border-0 py-3">
                                                    <i class="fas fa-id-badge me-2 text-primary"></i>ID
                                                </th>
                                                <th class="border-0 py-3">
                                                    <i class="fas fa-user me-2 text-success"></i>Имя
                                                </th>
                                                <th class="border-0 py-3">
                                                    <i class="fas fa-user me-2 text-info"></i>Фамилия
                                                </th>
                                                <th class="border-0 py-3">
                                                    <i class="fas fa-envelope me-2 text-warning"></i>Email
                                                </th>
                                                <th class="border-0 py-3">
                                                    <i class="fas fa-phone me-2 text-danger"></i>Телефон
                                                </th>
                                                <th class="border-0 py-3">
                                                    <i class="fas fa-tag me-2 text-secondary"></i>Тип
                                                </th>
                                                <th class="border-0 py-3">
                                                    <i class="fas fa-toggle-on me-2 text-primary"></i>Статус
                                                </th>
                                                <th class="border-0 py-3 text-center">
                                                    <i class="fas fa-cogs me-2 text-primary"></i>Действия
                                                </th>
                                            </tr>
                                        </thead>
                                <tbody>
                                    @foreach ($admins as $admin)
                                        <tr>
                                            <td>{{ $admin->id }}</td>
                                            <td>{{ $admin->firstName }}</td>
                                            <td>{{ $admin->lastName }}</td>
                                            <td>{{ $admin->email }}</td>
                                            <td>{{ $admin->phone }}</td>
                                            <td>{{ $admin->type }}</td>
                                            <td>{{ $admin->acnt_type_active }}</td>
                                            <td>
                                               <div class="dropdown text-center">
                                                   <a class="btn btn-primary btn-sm dropdown-toggle px-3" href="#"
                                                       role="button" id="dropdownMenuLink" data-toggle="dropdown"
                                                       aria-haspopup="true" aria-expanded="false">
                                                       <i class="fas fa-cogs me-1"></i>Действия
                                                   </a>
                                                    <div class="dropdown-menu " aria-labelledby="dropdownMenuLink">

                                                        @if ($admin->acnt_type_active == null || $admin->acnt_type_active == 'blocked')
                                                            <a class="m-1 btn btn-primary btn-sm"
                                                                href="{{ url('admin/dashboard/unblock') }}/{{ $admin->id }}">Разблокировать</a>
                                                        @else
                                                            <a class="m-1 btn btn-danger btn-sm"
                                                                href="{{ url('admin/dashboard/ublock') }}/{{ $admin->id }}">Заблокировать</a>
                                                        @endif
                                                        <a href="#" data-toggle="modal"
                                                            data-target="#resetpswdModal{{ $admin->id }}"
                                                            class="m-1 btn btn-warning btn-sm">Сбросить пароль</a>

                                                        <a href="#" data-toggle="modal"
                                                            data-target="#deleteModal{{ $admin->id }}"
                                                            class="m-1 btn btn-danger btn-sm">Удалить</a>
                                                        <a href="#" data-toggle="modal"
                                                            data-target="#edituser{{ $admin->id }}"
                                                            class="m-1 btn btn-secondary btn-sm">Редактировать</a>
                                                        <a href="#" data-toggle="modal"
                                                            data-target="#sendmailModal{{ $admin->id }}"
                                                            class="m-1 btn btn-info btn-sm">Отправить email</a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>


                                        <!-- Reset user password Modal -->
                                        <div id="resetpswdModal{{ $admin->id }}" class="modal fade" role="dialog">
                                            <div class="modal-dialog modal-lg">
                                                <!-- Modal content-->
                                                <div class="modal-content border-0 shadow-lg">
                                                    <div class="modal-header bg-gradient-warning text-white">
                                                        <div class="d-flex align-items-center">
                                                            <div class="modal-icon-wrapper me-3">
                                                                <i class="fas fa-key fa-2x"></i>
                                                            </div>
                                                            <div>
                                                                <h4 class="modal-title mb-0 text-white">Сброс пароля</h4>
                                                                <small class="text-white-50">Сброс пароля для {{ $admin->firstName }} {{ $admin->lastName }}</small>
                                                            </div>
                                                        </div>
                                                        <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body p-4">
                                                        <div class="alert alert-warning">
                                                            <i class="fas fa-exclamation-triangle me-2"></i>
                                                            <strong>Внимание!</strong> Эта операция изменит пароль пользователя на значение по умолчанию.
                                                        </div>

                                                        <div class="password-info bg-light p-3 rounded-lg mb-3">
                                                            <div class="d-flex align-items-center">
                                                                <div class="info-icon bg-warning text-white rounded-circle d-flex align-items-center justify-content-center me-3" style="width: 40px; height: 40px;">
                                                                    <i class="fas fa-lock"></i>
                                                                </div>
                                                                <div>
                                                                    <h6 class="mb-1">Новый пароль</h6>
                                                                    <p class="mb-0 text-muted">Пароль пользователя: <strong class="text-primary">admin01236</strong></p>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <p class="mb-4">Вы уверены, что хотите сбросить пароль для {{ $admin->firstName }} на значение по умолчанию?</p>

                                                        <div class="d-flex gap-2">
                                                            <a class="btn btn-warning btn-lg px-4 flex-fill"
                                                                href="{{ url('admin/dashboard/resetadpwd') }}/{{ $admin->id }}">
                                                                <i class="fas fa-key me-2"></i>Да, сбросить
                                                            </a>
                                                            <button type="button" class="btn btn-secondary btn-lg" data-dismiss="modal">
                                                                <i class="fas fa-times me-2"></i>Отмена
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- /Reset user password Modal -->

                                        <!-- Delete user Modal -->
                                        <div id="deleteModal{{ $admin->id }}" class="modal fade" role="dialog">
                                            <div class="modal-dialog">

                                                <!-- Modal content-->
                                                <div class="modal-content">
                                                    <div class="modal-header ">

                                                        <h4 class="modal-title ">Удалить администраторов</strong></h4>
                                                        <button type="button" class="close "
                                                            data-dismiss="modal">&times;</button>
                                                    </div>
                                                    <div class="modal-body  p-3">
                                                        <p class="">Вы уверены, что хотите удалить пользователя {{ $admin->firstName }}?</p>
                                                        <a class="btn btn-danger"
                                                            href="{{ url('admin/dashboard/deleletadmin') }}/{{ $admin->id }}">Да, я уверен</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- /Delete user Modal -->

                                        <!-- Edit user Modal -->
                                        <div id="edituser{{ $admin->id }}" class="modal fade" role="dialog">
                                            <div class="modal-dialog">
                                                <!-- Modal content-->
                                                <div class="modal-content">
                                                    <div class="modal-header ">

                                                        <h4 class="modal-title ">Редактировать детали пользователя.</strong></h4>
                                                        <button type="button" class="close "
                                                            data-dismiss="modal">&times;</button>
                                                    </div>
                                                    <div class="modal-body ">
                                                        <form style="padding:3px;" role="form" method="post"
                                                            action="{{ route('editadmin') }}">
                                                            <h5 class=" ">Имя</h5>
                                                            <input style="padding:5px;" class="form-control  "
                                                                value="{{ $admin->firstName }}" type="text"
                                                                name="fname" required><br />
                                                            <h5 class=" ">Фамилия</h5>
                                                            <input style="padding:5px;" class="form-control  "
                                                                value="{{ $admin->lastName }}" type="text"
                                                                name="l_name" required><br />
                                                            <h5 class=" ">Email</h5>
                                                            <input style="padding:5px;" class="form-control  "
                                                                value="{{ $admin->email }}" type="email"
                                                                name="email" required><br />
                                                            <h5 class=" ">Номер телефона</h5>
                                                            <input style="padding:5px;" class="form-control  "
                                                                value="{{ $admin->phone }}" type="text"
                                                                name="phone" required>
                                                            <br>
                                                            <h5 class=" ">Тип</h5>
                                                            <select class="form-control  " name="type">
                                                                <option>{{ $admin->type }}</option>
                                                                <option>Супер Администратор</option>
                                                                <option>Администратор</option>
                                                                <option>Агент по конверсии</option>
                                                            </select><br>
                                                            <input type="hidden" name="_token"
                                                                value="{{ csrf_token() }}">
                                                            <input type="hidden" name="user_id"
                                                                value="{{ $admin->id }}">
                                                            <input type="submit" class="btn btn-info"
                                                                value="Обновить аккаунт">
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- /Edit user Modal -->
                                        <!-- send a single user email Modal-->
                                        <div id="sendmailModal{{ $admin->id }}" class="modal fade" role="dialog">
                                            <div class="modal-dialog">
                                                <!-- Modal content-->
                                                <div class="modal-content">
                                                    <div class="modal-header ">
                                                        <h4 class="modal-title ">Отправить сообщение по email</h4>
                                                        <button type="button" class="close "
                                                            data-dismiss="modal">&times;</button>
                                                    </div>

                                                    <div class="modal-body ">
                                                        <p class="">Это сообщение будет отправлено пользователю {{ $admin->firstName }} {{ $admin->lastName }}.</p>
                                                        <form role="form" method="post"
                                                            action="{{ route('sendmailtoadmin') }}">
                                                            <input type="hidden" name="user_id"
                                                                value="{{ $admin->id }}">
                                                            <div class="form-group">
                                                                <input type="text" name="subject"
                                                                    class="form-control  "
                                                                    placeholder="Введите тему email">
                                                            </div>
                                                            <div class="form-group">
                                                                <textarea class="form-control  " name="message " row="3" placeholder="Напишите ваше сообщение здесь" required></textarea>
                                                            </div>
                                                            <div class="form-group">
                                                                <input type="hidden" name="_token"
                                                                    value="{{ csrf_token() }}">
                                                                <input type="submit" class="btn btn-primary"
                                                                    value="Отправить">
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
