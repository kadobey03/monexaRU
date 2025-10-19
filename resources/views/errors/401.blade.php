@extends('errors::minimal')

@section('title', __('Несанкционированный'))
@section('code', '401')
@section('message', __('У вас нет прав для выполнения этого действия'))
