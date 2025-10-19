@extends('errors::minimal')

@section('title', __('Ошибка сервера'))
@section('code', '500')
@section('message', __('Произошла неожиданная ошибка. Попробуйте обновить страницу? Или свяжитесь с нами, если проблема persists'))
