@extends('layouts.dashly')
@section('title', $title)
@section('content')
    <!-- Title -->
    <div class="d-flex align-items-baseline justify-content-between">
        <!-- Title -->
        <h1 class="h2">
            KYC Верификация
        </h1>
    </div>
    <x-danger-alert />
    <x-success-alert />
    <x-error-alert />
    <div class="row justify-content-center">
        <div class="col-lg-10 col-xl-9 col-xxl-7">
            <div>
                <ul class="nav nav-pills steps mb-7 mt-n3 w-75 w-xxl-50 mx-auto" id="wizard-tab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="wizardTabOne" data-bs-toggle="pill"
                            data-bs-target="#wizardStepOne" type="button" role="tab" aria-controls="wizardStepOne"
                            aria-selected="true">
                            1
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        @if (Auth::user()->account_verify == 'Verified' or Auth::user()->account_verify == 'Under review')
                            <button class="nav-link" id="wizardTabTwo" data-bs-toggle="pill" data-bs-target="#wizardStepTwo"
                                type="button" role="tab" aria-controls="wizardStepTwo" aria-selected="false" disabled>
                                2
                            </button>
                        @else
                            <button class="nav-link" id="wizardTabTwo" data-bs-toggle="pill" data-bs-target="#wizardStepTwo"
                                type="button" role="tab" aria-controls="wizardStepTwo" aria-selected="false">
                                2
                            </button>
                        @endif
                    </li>
                </ul>
                <div class="tab-content" id="wizard-tabContent">

                    <div class="tab-pane fade show active" id="wizardStepOne" role="tabpanel"
                        aria-labelledby="wizardTabOne">
                        <!-- Card -->
                        <div class="card border-0 py-6 px-md-6">
                            <div class="card-body">
                                @if (Auth::user()->account_verify == 'Verified' or Auth::user()->account_verify == 'Under review')
                                    <div class="alert alert-info">
                                        Ваша KYC верификация {{ Auth::user()->account_verify }}.
                                    </div>
                                @endif
                                <h2 class="text-center mb-0">KYC Верификация</h2>
                                <p class="text-secondary text-center">Для соблюдения регулирования каждый участник
                                    должен пройти верификацию личности (KYC/AML) для предотвращения
                                    мошенничества.</p>

                            </div>
                            <div class="card-footer">
                                <div class="d-flex justify-content-between">
                                    <div></div>
                                    <!-- Button -->
                                    @if (Auth::user()->account_verify == 'Verified' or Auth::user()->account_verify == 'Under review')
                                        <a class="btn btn-primary" data-toggle="wizard" href="#wizardStepTwo"
                                            disabled>Далее</a>
                                    @else
                                        <a class="btn btn-primary" data-toggle="wizard" href="#wizardStepTwo">Далее</a>
                                    @endif

                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-body d-lg-flex justify-content-lg-between">
                                <div>
                                    <h4 class="m-0">Мы здесь, чтобы помочь вам!</h4>
                                    <p class="m-0">
                                        Задайте вопрос, управляйте запросами, сообщите о проблеме. Наша команда поддержки
                                        свяжется с вами по электронной почте.
                                    </p>
                                </div>
                                <div>
                                    <a href="{{ route('support') }}"
                                        class="px-3 btn btn-outline-primary btn-sm">Помощь/Поддержка</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="wizardStepTwo" role="tabpanel" aria-labelledby="wizardTabTwo">
                        <!-- Card -->
                        <div class="card border-0 py-6 px-md-6">
                            <div class="card-body">
                                <div class="row">
                                    <form action="{{ route('kycsubmit') }}" method="POST" enctype="multipart/form-data"
                                        class="needs-validation">
                                        @csrf
                                        <div class="col-12 border-bottom">
                                            <h5>Личные данные</h5>
                                            <p>Ваша простая личная информация, необходимая для идентификации</p>
                                        </div>
                                        <div class="col-12">
                                            <small>
                                                Пожалуйста, внимательно заполните форму своими личными данными.
                                                После отправки формы вы не сможете редактировать эти данные.
                                            </small>
                                        </div>
                                        <div class="mt-4 col-12">
                                            <div class="row">
                                                <div class="mb-3 col-md-6">
                                                    <label for="firstname">Имя <span
                                                            class="text-danger">*</span></label>
                                                    <input type="text" name="first_name" class="form-control" required>
                                                </div>
                                                <div class="mb-3 col-md-6">
                                                    <label for="lastname">Фамилия <span
                                                            class="text-danger">*</span></label>
                                                    <input type="text" name="last_name" class="form-control" required>
                                                </div>
                                                <div class="mb-3 col-md-6">
                                                    <label for="email">Email <span class="text-danger">*</span></label>
                                                    <input type="email" name="email" class="form-control" required>
                                                </div>
                                                <div class="mb-3 col-md-6">
                                                    <label for="phone_number">Номер телефона <span
                                                            class="text-danger">*</span></label>
                                                    <input type="text" name="phone_number" class="form-control" required>
                                                </div>
                                                <div class="mb-3 col-md-6">
                                                    <label for="dob">Дата рождения <span
                                                            class="text-danger">*</span></label>
                                                    <input type="date" name="dob" class="form-control"
                                                        data-toggle="date" placeholder="Выберите дату" required>
                                                </div>
                                                <div class="mb-3 col-md-6">
                                                    <label for="social_media">Имя пользователя Twitter или Facebook</label>
                                                    <input type="text" name="social_media" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="pt-3 mt-3 col-12 border-bottom border-top">
                                            <h5>Ваш адрес</h5>
                                            <p>Ваша простая информация о местоположении, необходимая для идентификации</p>
                                        </div>
                                        <div class="mt-4 col-12">
                                            <div class="row">
                                                <div class="mb-3 col-md-6">
                                                    <label for="address">Адресная строка<span
                                                            class="text-danger">*</span></label>
                                                    <input type="text" name="address" class="form-control" required>
                                                </div>
                                                <div class="mb-3 col-md-6">
                                                    <label for="city">Город<span class="text-danger">*</span></label>
                                                    <input type="text" name="city" class="form-control" required>
                                                </div>
                                                <div class="mb-3 col-md-6">
                                                    <label for="state">Область<span class="text-danger">*</span></label>
                                                    <input type="text" name="state" class="form-control" required>
                                                </div>
                                                <div class="mb-3 col-md-6">
                                                    <label for="country">Национальность <span
                                                            class="text-danger">*</span></label>
                                                    <input type="text" name="country" class="form-control" required>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="pt-3 mt-3 col-12 border-bottom border-top">
                                            <h5>Загрузка документа</h5>
                                            <p>Ваш простой личный документ, необходимый для идентификации</p>
                                        </div>
                                        <div class="mt-4 col-12">
                                            <div class="row">
                                                <div class="mb-2 col-md-12">
                                                    <div class="flex-wrap btn-group-toggle d-flex justify-content-around"
                                                        data-toggle="buttons">
                                                        <label class="mb-2 shadow-sm btn btn-primary active">

                                                            <input type="radio" name="document_type"
                                                                value="Int'l Passport" autocomplete="off" checked> Международный
                                                            Паспорт
                                                        </label>
                                                        <label class="mb-2 shadow-sm btn btn-primary">

                                                            <input type="radio" name="document_type"
                                                                value="National ID" autocomplete="off"> Национальный ID
                                                        </label>
                                                        <label class="mb-2 shadow-sm btn btn-primary">

                                                            <input type="radio" name="document_type"
                                                                value="Drivers License" autocomplete="off"> Водительские права
                                                        </label>
                                                    </div>
                                                    <div class="mt-4">
                                                        <h6 class=" font-weight-bold">Чтобы избежать задержек в верификации аккаунта,
                                                            убедитесь, что ваш документ соответствует следующим критериям:</h6>
                                                        <ul class=" list-group">
                                                            <li>
                                                                <i class="fas fa-check-square text-primary"></i>
                                                                Выбранный документ удостоверения личности не должен быть просроченным.
                                                            </li>
                                                            <li>
                                                                <i class="fas fa-check-square text-primary"></i>
                                                                Документ должен быть в хорошем состоянии и четко видимым.
                                                            </li>
                                                            <li>
                                                                <i class="fas fa-check-square text-primary"></i>
                                                                Убедитесь, что на документе нет бликов от света.
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <p class="mt-3 text-black h6">Загрузите переднюю сторону <span
                                                            class="text-danger">*</span></p>
                                                    <div class="mt-3 align-items-center justify-content-around d-md-flex">
                                                        <div class="p-2 border p-md-5 ">
                                                            <div class="custom-file">
                                                                <input type="file" name="frontimg"
                                                                    class="form-control" required>
                                                            </div>
                                                        </div>
                                                        <div class="text-center">
                                                            <i class="bi bi-credit-card fs-1"></i>
                                                        </div>
                                                    </div>
                                                    <hr>
                                                    <p class="mt-3 text-black h6">Загрузите заднюю сторону <span
                                                            class="text-danger">*</span></p>
                                                    <div class="mt-3 align-items-center justify-content-around d-md-flex">
                                                        <div class="p-2 border p-md-5 ">
                                                            <div class="custom-file">
                                                                <input type="file" name="backimg" class="form-control"
                                                                    required>
                                                            </div>
                                                        </div>
                                                        <div class="text-center">
                                                            <i class="bi bi-credit-card-2-back fs-1"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mt-3 col-12">
                                            <div class="mb-2 form-check">
                                                <input class="form-check-input" type="checkbox" value=""
                                                    id="defaultCheck1" required>
                                                <label class="form-check-label" for="defaultCheck1">
                                                    Вся информация, которую я ввел, верна.
                                                </label>
                                            </div>
                                            @if (Auth::user()->account_verify == 'Under review')
                                                <button type="submit" class="px-4 btn btn-primary d-block"
                                                    disabled>Отправить
                                                    Заявку</button>
                                                <small class="text-success">Ваша предыдущая заявка рассматривается,
                                                    пожалуйста, подождите</small>
                                            @else
                                                <button type="submit" class="px-4 btn btn-primary">Отправить
                                                    Заявку</button>
                                            @endif
                                        </div>
                                    </form>
                                </div>

                            </div>
                            <div class="card-footer">
                                <div class="d-flex justify-content-between">
                                    <!-- Button -->
                                    <a class="btn btn-light" data-toggle="wizard" href="#wizardStepOne">Назад</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection





{{-- <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="mb-5 row">
                        <div class="col-lg-8 offset-lg-2">
                            <div class="p-3 text-center">
                                <h2 class="">KYC Verification</h2>
                                <p>To comply with regulation, each participant will have to go through indentity
                                    verification (KYC/AML) to prevent fraud causes.</p>
                            </div>
                            <div class="p-2 text-center shadow-lg p-md-5">
                                <i class="p-4 mb-3 fas fa-copy fa-4x bg-light rounded-pill"></i>
                                <p>You have not submitted your necessary documents to verify your identity. In order to
                                    enjoy our investment system, please verify your identity.</p>

                                @if (Auth::user()->account_verify == 'Verified' or Auth::user()->account_verify == 'Under review')
                                    <button class="mt-2 btn btn-primary btn-sm" disabled>Click here to complete your
                                        KYC</button> <br>
                                    <small class="text-success">Your previous application is under review, please
                                        wait</small>
                                @else
                                    <a href="{{ route('kycform') }}" class="mt-2 btn btn-primary btn-sm">Click here to
                                        complete your KYC</a>
                                @endif
                            </div>
                            <div class="p-2 mt-5 shadow-lg d-md-flex justify-content-between">
                                <div class="p-2">
                                    <i class="p-4 fas fa-envelope-open-text fa-4x bg-light rounded-pill"></i>
                                </div>
                                <div class="p-2">
                                    <h4>We’re here to help you!</h4>
                                    <p>Ask a question, manage request, report an issue. Our support team will get back to
                                        you by email.</p>
                                </div>
                                <div class="p-md-4">
                                    <a href="{{ route('support') }}" class="px-3 btn btn-outline-primary btn-sm">Get Support
                                        Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
