<?php
if (Auth('admin')->User()->dashboard_style == 'light') {
    $text = 'dark';
    $bg = 'light';
} else {
    $text = 'light';
    $bg = 'dark';
}
?>
@extends('layouts.app')
@section('content')
    @include('admin.topmenu')
    @include('admin.sidebar')
    <div class="main-panel ">
        <div class="content ">
            <div class="page-inner">

                <div class="mt-2 mb-3 d-lg-flex justify-content-lg-between">
                    <div>
                        <h1 class="title1 text-{{ $text }} d-inline mr-4">Уроки только с категорией (без курса)
                        </h1>
                    </div>
                    <div class="mt-3 mt-lg-0">
                        @if ($lessons and !count($lessons) == 0)
                            <button class="btn btn-light shadow-sm px-3 border" type="button" data-toggle="modal"
                                data-target="#lessonModal">
                                <i class=" fa fa-plus"></i>
                                Новый урок
                            </button>
                        @endif
                    </div>

                </div>
                <x-danger-alert />
                <x-success-alert />

                <div class="mt-2 mb-5 row">

                    @forelse ($lessons as $less)
                        <div class="col-md-4">
                            <div class="card ">
                                <img src="{{ str_starts_with($less->thumbnail, 'http') ? $less->thumbnail : asset('storage/' . $less->thumbnail) }}"
                                    class="card-img-top" alt="course image">
                                <div class="card-body">
                                    <h4 class="text-{{ $text }} font-weight-bolder">{{ $loop->iteration }}.
                                        {{ $less->title }}
                                    </h4>
                                    <div class="d-flex justify-content-between align-items-center mt-2">
                                        <a href="#" class="btn btn-primary btn-sm px-2" data-toggle="modal"
                                            data-target="#lessonModal{{ $less->id }}">Редактировать урок</a>

                                        <div class="d-flex align-items-center text-{{ $text }}">
                                            <i class="mr-1 fa fa-clock"></i>
                                            <span> {{ $less->length }}</span>
                                        </div>
                                    </div>
                                    <div class="mt-2">
                                        <p><strong>Категория: </strong>{{ $less->category }}</p>
                                    </div>
                                    <a href="#" class="btn btn-danger btn-sm px-2 btn-block mt-3" data-toggle="modal"
                                        data-target="#lessonDeleteModal{{ $less->id }}">Удалить урок</a>
                                </div>
                            </div>
                        </div>
                        <!-- Modal -->
                        <div class="modal fade" tabindex="-1" id="lessonModal{{ $less->id }}"
                            aria-h6ledby="exampleModalh6" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header ">
                                        <h3 class="mb-2 d-inline text-{{ $text }}">Обновить урок</h3>
                                        <button type="button" class="close text-{{ $text }}" data-dismiss="modal"
                                            aria-h6="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body ">
                                        <div>
                                            <form method="POST" action="{{ route('updatedlesson') }}"
                                                enctype="multipart/form-data">
                                                @csrf
                                                @method('PATCH')
                                                <div class="form-row">
                                                    <div class="form-group col-md-12">
                                                        <h6 class="text-{{ $text }}">Категория урока</h6>
                                                        <select name="category" id=""
                                                            class="form-control  text-{{ $text }}">
                                                            <option value="{{ $less->category }}">
                                                                {{ $less->category }}</option>
                                                            @foreach ($categories as $cat)
                                                                <option value="{{ $cat->category }}">{{ $cat->category }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="form-group col-md-12">
                                                        <h6 class="text-{{ $text }}">Название урока</h6>
                                                        <input type="text"
                                                            class="form-control  text-{{ $text }}"
                                                            value="{{ $less->title }}" name="title" required>
                                                    </div>
                                                    <div class="form-group col-md-12">
                                                        <h6 class="text-{{ $text }}">Описание</h6>
                                                        <textarea name="desc" id="" cols="4" class="form-control  text-{{ $text }}" required>
                                                            {{ $less->description }}
                                                        </textarea>
                                                    </div>
                                                    <div class="form-group col-md-12">
                                                        <h6 class="text-{{ $text }}">Ссылка на видео</h6>
                                                        <input type="text"
                                                            class="form-control  text-{{ $text }}" name="videolink"
                                                            value="{{ $less->video_link }}" required>
                                                    </div>
                                                    <div class="form-group col-md-12">
                                                        <h6 class="text-{{ $text }}">Длительность видео</h6>
                                                        <input type="text"
                                                            class="form-control  text-{{ $text }}" name="length"
                                                            value="{{ $less->length }}" required>
                                                    </div>
                                                    <input type="hidden" value="true" name='preview'>

                                                    <div class="form-group col-md-12">
                                                        <h6 class="text-{{ $text }}">Миниатюра урока (Файл)</h6>
                                                        <input type="file"
                                                            class="form-control  text-{{ $text }}" name="image">

                                                        @error('image')
                                                            <div class="alert alert-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>

                                                    <div class="form-group col-md-12">
                                                        <h6 class="text-{{ $text }}">Миниатюра урока (URL)</h6>
                                                        <input type="text"
                                                            class="form-control  text-{{ $text }}" name="image_url"
                                                            value="{{ $less->thumbnail }}">
                                                    </div>
                                                    <h6 class="text-{{ $text }}">Используйте либо загрузку файла, либо URL для
                                                        выбора изображения урока. Если введены оба варианта, будет использована загрузка файла.
                                                    </h6>
                                                    <input type="hidden" value="{{ $less->id }}" name="lesson_id">
                                                </div>
                                                <button type="submit" class="px-4 btn btn-primary">Обновить урок</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- End add user modal --}}
                        <!-- Modal -->
                        <div class="modal fade" tabindex="-1" id="lessonDeleteModal{{ $less->id }}"
                            aria-h6ledby="exampleModalh6" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header ">
                                        <h3 class="mb-2 d-inline text-{{ $text }}">Удалить урок</h3>
                                        <button type="button" class="close text-{{ $text }}"
                                            data-dismiss="modal" aria-h6="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body ">
                                        <div>
                                            <p class="text-{{ $text }}">Вы уверены, что хотите удалить этот урок?
                                            </p>
                                            <a href="{{ route('deletelesson', $less->id) }}"
                                                class="btn btn-danger">УДАЛИТЬ</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- End add user modal --}}
                    @empty
                        <div class="col-md-12">
                            <div class="card  text-center py-3">
                                <h5 class="text-{{ $text }}">Нет уроков </h5>
                                <div>
                                    <button class="btn btn-secondary px-3" data-toggle="modal"
                                        data-target="#lessonModal">Добавить урок</button>
                                </div>

                            </div>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
        <!-- Modal -->
        <div class="modal fade" tabindex="-1" id="lessonModal" aria-h6ledby="exampleModalh6" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header ">
                        <h3 class="mb-2 d-inline text-{{ $text }}">Добавить урок</h3>
                        <button type="button" class="close text-{{ $text }}" data-dismiss="modal"
                            aria-h6="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body ">
                        <div>
                            <form method="POST" action="{{ route('addlesson') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <h6 class="text-{{ $text }}">Категория урока</h6>
                                        <select name="category" id=""
                                            class="form-control  text-{{ $text }}">
                                            @foreach ($categories as $cat)
                                                <option value="{{ $cat->category }}">{{ $cat->category }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <h6 class="text-{{ $text }}">Название урока</h6>
                                        <input type="text" class="form-control  text-{{ $text }}"
                                            name="title" required>
                                    </div>
                                    <input type="hidden" value="true" name='preview'>
                                    <div class="form-group col-md-12">
                                        <h6 class="text-{{ $text }}">Описание</h6>
                                        <textarea name="desc" id="" cols="4" class="form-control  text-{{ $text }}" required></textarea>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <h6 class="text-{{ $text }}">Ссылка на видео</h6>
                                        <input type="text" class="form-control  text-{{ $text }}"
                                            name="videolink" required>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <h6 class="text-{{ $text }}">Длительность видео</h6>
                                        <input type="text" class="form-control  text-{{ $text }}"
                                            name="length" required>
                                    </div>

                                    <div class="form-group col-md-12">
                                        <h6 class="text-{{ $text }}">Миниатюра урока (Файл)</h6>
                                        <input type="file" class="form-control  text-{{ $text }}"
                                            name="image">

                                        @error('image')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group col-md-12">
                                        <h6 class="text-{{ $text }}">Миниатюра урока (URL)</h6>
                                        <input type="text" class="form-control  text-{{ $text }}"
                                            name="image_url">
                                    </div>
                                    <h6 class="text-{{ $text }}">Используйте либо загрузку файла, либо URL для
                                        выбора изображения урока. Если введены оба варианта, будет использована загрузка файла.
                                    </h6>
                                </div>
                                <button type="submit" class="px-4 btn btn-primary">Добавить урок</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- End add user modal --}}
    @endsection
