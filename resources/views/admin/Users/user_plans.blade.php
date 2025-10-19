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
    <div class="main-panel">
        <div class="content ">
            <div class="page-inner">
                <div class="mt-2 mb-4">
                    <h1 class="title1  d-inline"> {{ $user->name }} Сделки клиентов</h1>
                    <div class="d-inline">
                        <div class="float-right btn-group">
                            <a class="btn btn-primary btn-sm" href="{{ route('viewuser', $user->id) }}"> <i
                                    class="fa fa-arrow-left"></i> назад</a>
                        </div>
                    </div>
                </div>
                <x-danger-alert />
                <x-success-alert />
                <div class="mb-5 row">
                    <div class="col card p-3 shadow ">
                        <div class="bs-example widget-shadow table-responsive" data-example-id="hoverable-table">
                            <span style="margin:3px;">
                                <table id="ShipTable" class="table table-hover ">
                                    <thead>
                                        <tr>
                                            {{-- <th>Client name</th> --}}
                                            <th>Активы</th>
                                            <th>Сумма</th>
                                            <th>Статус</th>
                                            <th>Кредитное плечо</th>
                                            <th>Тип сделки</th>
                                            <th>Длительность</th>
                                            <th>Создано</th>
                                            <th>Истекает</th>
                                            <th>Прибыль/Убыток</th>
                                            <th>Опции</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($plans as $plan)
                                            <tr>
                                                {{-- <td>{{$plan->duser->name}}</td> --}}
                                                <td>{{ $plan->assets }}</td>
                                                <td>{{ $user->currency }}{{ number_format($plan->amount) }}</td>
                                                <td>
                                                    @if ($plan->active == 'yes')
                                                        <span class="badge badge-success">{{ $plan->active }}</span>
                                                    @else
                                                        <span class="badge badge-danger">{{ $plan->active }}</span>
                                                    @endif
                                                </td>
                                                <td>1:{{ $plan->leverage }}</td>
                                                @if($plan->type=='Buy')
                                                <td >
                                                    <span class='badge badge-success'>{{ $plan->type }}</span>
                                                </td>
                                                @else
                                                <td>
                                                    <span class="badge badge-danger">{{ $plan->type }}</span>
                                                </td>
                                                   
                                                @endif
                                                
                                                <td>{{ $plan->inv_duration }}</td>
                                                <td>{{ \Carbon\Carbon::parse($plan->created_at)->toDayDateTimeString() }}
                                                </td>
                                                <td>{{ \Carbon\Carbon::parse($plan->expire_date)->toDayDateTimeString() }}
                                                </td>

                                                <td>
                                                
                                                    @if ($plan->active == 'yes')
                                                    <a href="{{ route('markprofit', $plan->id) }}"
                                                        class="m-1 btn btn-success btn-sm"> Отметить как прибыль</a>
                                                        <a href="{{ route('markloss', $plan->id) }}"
                                                            class="m-1 btn btn-danger btn-sm"> Отметить как убыток</a>
                                                            @endif
                                            </td>
                                                <td>
                                                    
                                                    @if ($plan->active == 'yes')
                                                        <a href="{{ route('markas', ['id' => $plan->id, 'status' => 'expired']) }}"
                                                            class="m-1 btn btn-danger btn-sm">Отметить как истекший</a>
                                                    @else
                                                        <a href="{{ route('markas', ['id' => $plan->id, 'status' => 'yes']) }}"
                                                            class="m-1 btn btn-success btn-sm">Отметить как активный</a>
                                                    @endif

                                                    <a href="{{ route('deleteplan', $plan->id) }}"
                                                        class="m-1 btn btn-info btn-sm"> Удалить сделку</a>
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
