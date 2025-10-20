@extends('layouts.app')
@section('content')
    @include('admin.topmenu')
    @include('admin.sidebar')
    <div class="main-panel ">
        <div class="content ">
            <div class="page-inner">
                <div class="mt-2 mb-4">
                    <h1 class="title1 ">Редактировать главную страницу вашего сайта</h1>
                </div>
                <x-danger-alert />
                <x-success-alert />

                @if (count($errors) > 0)
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="alert alert-danger alert-dismissable" role="alert">
                                <button type="button" class="close" data-dismiss="alert"
                                    aria-hidden="true">&times;</button>
                                @foreach ($errors->all() as $error)
                                    <i class="fa fa-warning"></i> {{ $error }}
                                @endforeach
                            </div>
                        </div>
                    </div>
                @endif
                <div class="mb-5 row">
                    <div class="p-3 col-12">
                        @include('admin.Settings.FrontendSettings.faqs')
                        @include('admin.Settings.FrontendSettings.testimony')
                        @include('admin.Settings.FrontendSettings.images')
                        @include('admin.Settings.FrontendSettings.content')
                    </div>
                    <div class="col-12">
                        <nav>
                            <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
                                <a class="mb-2 nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#1"
                                    role="tab" aria-controls="nav-home" aria-selected="true">
                                    ЧЗВО</a>

                                <a class="mb-2 nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#2"
                                    role="tab" aria-controls="nav-profile" aria-selected="false">ОТЗЫВЫ</a>

                                <a class="mb-2 nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#3"
                                    role="tab" aria-controls="nav-contact" aria-selected="false">КОНТЕНТ САЙТА</a>

                                <a class="mb-2 nav-item nav-link" id="nav-about-tab" data-toggle="tab" href="#4"
                                    role="tab" aria-controls="nav-about" aria-selected="false">ИЗОБРАЖЕНИЯ</a>
                            </div>
                        </nav>


                        <div class="px-3 py-3 tab-content px-sm-0" id="nav-tabContent">
                            {{-- This is the first Tab content --}}
                            <div class="tab-pane fade show active p-3" id="1" role="tabpanel"
                                aria-labelledby="nav-home-tab">
                                <div class="boxes">
                                    <div class="row">
                                        @forelse($faqs as $faq)
                                            <div class="p-1 col-md-4">
                                                <div class="card border p-1 ">
                                                    <div class="card-body">
                                                        <h5 class="card-title "><strong>{{ $faq->question }}</strong>
                                                        </h5>
                                                        <p class="card-text ">{{ $faq->answer }}</p>
                                                        <a href="{{ url('admin/dashboard/delfaq') }}/{{ $faq->id }}"
                                                            type="button" data-toggle="tooltip" title=""
                                                            class="btn btn-sm btn-danger" data-original-title="Remove"><i
                                                                class="fa fa-times"></i></a> &nbsp;
                                                        <a href="#" data-toggle="modal"
                                                            data-target="#editfaq{{ $faq->id }}"
                                                            class="btn btn-primary btn-sm">Редактировать</a>
                                                    </div>
                                                </div>
                                            </div>

                                            <div id="editfaq{{ $faq->id }}" class="modal fade" role="dialog">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header ">
                                                            <h4 class="modal-title" style="text-align:center;">Обновить ЧЗВО
                                                            </h4>
                                                            <button type="button" class="close "
                                                                data-dismiss="modal">&times;</button>
                                                        </div>
                                                        <div class="modal-body ">
                                                            <form action="{{ route('updatefaq') }}" method="post">
                                                                {{ csrf_field() }}
                                                                <div class="form-group">
                                                                    <h5 class="">Вопрос</h5>
                                                                    <input type="text" name="question"
                                                                        value="{{ $faq->question }}"
                                                                        placeholder="Введите вопрос здесь"
                                                                        class="form-control  " required>
                                                                </div>
                                                                <div class="form-group">
                                                                    <h5 class="">Ответ</h5>
                                                                    <textarea name="answer" placeholder="Введите ответ на вопрос выше" class="form-control  " rows="4"
                                                                        required>{{ $faq->answer }}</textarea>
                                                                </div>
                                                                <input type="hidden" name="id"
                                                                    value="{{ $faq->id }}">
                                                                <button type="submit"
                                                                    class="btn btn-primary">Обновить</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @empty
                                            <div class="col-12">
                                                <div class="card border">
                                                    <div class="card-body text-center">
                                                        <h5>Данные отсутствуют</h5>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforelse
                                    </div>
                                </div>

                            </div>

                            {{-- This is the second Tab Content --}}
                            <div class="tab-pane fade p-3" id="2" role="tabpanel"
                                aria-labelledby="nav-profile-tab">
                                <div class="boxes">
                                    <div class="row">
                                        @forelse ($testimonies as $faq)
                                            <div class="p-1 col-md-4">
                                                <div class="card border p-1 ">
                                                    <div class="card-body">

                                                        <h5 class="card-title "><strong>{{ $faq->name }}</strong> </h5>
                                                        <p class="card-text ">{{ $faq->what_is_said }}</p>
                                                    </div>
                                                    <ul class="list-group list-group-flush ">
                                                        <li class="list-group-item  ">
                                                            {{ $faq->position }}</li>
                                                        <li class=" list-group-item ">
                                                            {{ $faq->picture }}</li>
                                                    </ul>
                                                    <div class="card-body">
                                                        <a href="{{ url('admin/dashboard/deltestimony') }}/{{ $faq->id }}"
                                                            type="button" data-toggle="tooltip" title=""
                                                            class="btn btn-sm btn-danger" data-original-title="Remove"><i
                                                                class="fa fa-times"></i></a> &nbsp; &nbsp;
                                                        <a href="#" data-toggle="modal"
                                                            data-target="#edittes{{ $faq->id }}"
                                                            class="btn btn-primary btn-sm">Редактировать</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div id="edittes{{ $faq->id }}" class="modal fade" role="dialog">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header ">
                                                            <h4 class="modal-title" style="text-align:center;">Обновить
                                                                Отзыв</h4>
                                                            <button type="button" class="close "
                                                                data-dismiss="modal">&times;</button>
                                                        </div>
                                                        <div class="modal-body ">
                                                            <form action="{{ route('updatetestimony') }}" method="post">
                                                                {{ csrf_field() }}
                                                                <div class="form-group">
                                                                    <h5 class="">Имя клиента</h5>
                                                                    <input type="text" name="testifier"
                                                                        placeholder="Полное имя"
                                                                        value="{{ $faq->name }}"
                                                                        class="form-control  ">
                                                                </div>
                                                                <div class="form-group">
                                                                    <h5 class=" ">Должность</h5>
                                                                    <input type="text" name="position"
                                                                        value="{{ $faq->position }}"
                                                                        placeholder="Пользователь системы или анонимный"
                                                                        class="form-control  ">
                                                                </div>
                                                                <div class="form-group">
                                                                    <h5 class=" ">Что сказал клиент</h5>
                                                                    <textarea name="said" class="form-control  " rows="4">{{ $faq->what_is_said }}</textarea>
                                                                </div>
                                                                <div class="form-group">
                                                                    <h5 class=" ">Изображение</h5>
                                                                    <select name="picture" class="form-control  ">
                                                                        <option value="{{ $faq->picture }}">
                                                                            {{ $faq->picture }}</option>
                                                                        @foreach ($images as $item)
                                                                            <option>{{ $item->img_path }}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                                <input type="hidden" name="id"
                                                                    value="{{ $faq->id }}">
                                                                <button type="submit"
                                                                    class="btn btn-primary">Обновить</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @empty
                                            <div class="col-12">
                                                <div class="card border">
                                                    <div class="card-body text-center">
                                                        <h5>Данные отсутствуют</h5>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforelse
                                    </div>
                                </div>
                            </div>

                            {{-- This is the Third Tab Content --}}
                            <div class="tab-pane fade p-3" id="3" role="tabpanel"
                                aria-labelledby="nav-contact-tab">
                                <div class="boxes">
                                    <div class="row">
                                        @forelse ($contents as $faq)
                                            <div class="p-1 col-md-3">
                                                <div class="card border p-1 ">
                                                    <div class="card-body">
                                                        <h5 class="card-title "><strong>{{ $faq->title }}</strong> </h5>
                                                        <p class="card-text ">{{ $faq->description }}</p>

                                                        <a href="#" data-toggle="modal"
                                                            data-target="#editcont{{ $faq->id }}"
                                                            class="btn btn-primary btn-sm">Редактировать</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div id="editcont{{ $faq->id }}" class="modal fade" role="dialog">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header ">
                                                            <h4 class="modal-title" style="text-align:center;">Обновить
                                                                Общий контент</h4>
                                                            <button type="button" class="close "
                                                                data-dismiss="modal">&times;</button>
                                                        </div>
                                                        <div class="modal-body ">
                                                            <form action="{{ route('updatecontents') }}" method="post">
                                                                {{ csrf_field() }}
                                                                <div class="form-group">
                                                                    <h5 class=" ">Заголовок контента</h5>
                                                                    <input type="text" name="title"
                                                                        placeholder="Название контента"
                                                                        value="{{ $faq->title }} "
                                                                        class="form-control  " required>
                                                                </div>
                                                                <div class="form-group">
                                                                    <h5 class="">Описание контента</h5>
                                                                    <textarea name="content" placeholder="Опишите контент" class="form-control  " rows="2" required>{{ $faq->description }}</textarea>
                                                                </div>
                                                                <input type="hidden" name="id"
                                                                    value="{{ $faq->id }}">
                                                                <button type="submit"
                                                                    class="btn btn-primary">Обновить</button>
                                                            </form>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @empty
                                            <div class="col-12">
                                                <div class="card border">
                                                    <div class="card-body text-center">
                                                        <h5>Данные отсутствуют</h5>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforelse
                                    </div>
                                </div>

                            </div>

                            {{-- This is the Fouth Tab Content --}}
                            <div class="tab-pane fade p-3" id="4" role="tabpanel"
                                aria-labelledby="nav-about-tab">
                                <div class="boxes">
                                    <div class="row">
                                        @foreach ($images as $faq)
                                            <div class="p-1 col-md-4">
                                                <div class="card border p-1 ">
                                                    <img src="{{ asset('storage/app/public/' . $faq->img_path) }}"
                                                        class="card-img-top w-50" alt="Image">

                                                    <div class="card-body">
                                                        <h5 class="card-title "><strong>{{ $faq->title }}</strong> </h5>
                                                        <p class="card-text ">{{ $faq->description }}</p>
                                                    </div>
                                                    <div class="card-body">
                                                        <a href="#" data-toggle="modal"
                                                            data-target="#editimg{{ $faq->id }}"
                                                            class="btn btn-primary btn-sm">Редактировать</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div id="editimg{{ $faq->id }}" class="modal fade" role="dialog">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header ">
                                                            <h4 class="modal-title" style="text-align:center;">Обновить
                                                                Изображение</h4>
                                                            <button type="button" class="close "
                                                                data-dismiss="modal">&times;</button>
                                                        </div>
                                                        <div class="modal-body ">
                                                            <form action="{{ route('updateimg') }}" method="post"
                                                                enctype="multipart/form-data">
                                                                {{ csrf_field() }}
                                                                <div class="form-group">
                                                                    <h5 class="">Заголовок изображения</h5>
                                                                    <input type="text" name="img_title"
                                                                        value="{{ $faq->title }}"
                                                                        placeholder="Название изображения"
                                                                        class="form-control  ">
                                                                </div>
                                                                <div class="form-group">
                                                                    <h5 class="">Описание изображения</h5>
                                                                    <textarea name="img_desc" placeholder="Опишите изображение" class="form-control  " rows="2">{{ $faq->description }}</textarea>
                                                                </div>
                                                                <div class="form-group">
                                                                    <h5 class="">Изображение</h5>
                                                                    <input name="image" class="form-control  "
                                                                        type="file">
                                                                </div>
                                                                <input type="hidden" name="id"
                                                                    value="{{ $faq->id }}">
                                                                <button type="submit"
                                                                    class="btn btn-primary">Обновить</button>
                                                            </form>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
