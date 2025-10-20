<?php
if (Auth('admin')->User()->dashboard_style == "light") {
    $text = "dark";
	$bg = 'light';
} else {
    $text = "light";
	$bg = 'dark';
}
?>
@extends('layouts.app')
    @section('content')
        @include('admin.topmenu')
        @include('admin.sidebar')
		<div class="main-panel">
			<div class="content bg-{{$bg}}">
				<div class="page-inner">
					<div class="mt-2 mb-4">
						<h1 class="title1 text-{{$text}}">Обновить план копи-трейдинга</h1>
					</div>
					<x-danger-alert/>
                    <x-success-alert/>
					<div class="mb-5 row">
						<div class="col-lg-10 d-flex justify-content-center ">
                            <div class="p-3 card bg-{{$bg}}">
                                <form role="form" method="post" action="{{ route('updatecopytrading') }}" enctype="multipart/form-data">
                                    <div class="form-row">
                                        <div class="form-group col-md-5">
                                            <h5 class="text-{{$text}}">Тег эксперта-трейдера (MID/PRO)</h5>
                                            <input  class="form-control text-{{$text}} bg-{{$bg}}" value ="{{ $copytrading->tag }}" placeholder="Введите тег эксперта-трейдера" type="text" name="tag" required>
                                        </div>
                                        <div class="form-group col-md-5">
                                            <h5 class="text-{{$text}}">Имя трейдера</h5>
                                            <input class="form-control text-{{$text}} bg-{{$bg}}" placeholder="Введите имя эксперта-трейдера" type="text" name="name" value ="{{ $copytrading->name }}" required>
                                            
                                       </div>	
                                       <div class="form-group col-md-5">
                                            <h5 class="text-{{$text}}">Количество подписчиков эксперта-трейдера</h5>
                                             <input placeholder="Введите количество подписчиков эксперта-трейдера" class="form-control text-{{$text}} bg-{{$bg}}" type="text" name="followers" value ="{{ $copytrading->followers }}" required>
                                             <small class="text-{{$text}}">Это количество подписчиков, которые в настоящее время торгуют с экспертом</small>
                                       </div>
                                       <div class="form-group col-md-5">
                                             <h5 class="text-{{$text}}">Введите общую прибыль эксперта ({{$settings->currency}})</h5>
                                             <input class="form-control text-{{$text}} bg-{{$bg}}" placeholder="Введите общую прибыль эксперта" type="text" name="total_profit"  value ="{{ $copytrading->total_profit }}" required>
                                            <small class="text-{{$text}}">Это общая прибыль, полученная этим экспертом-трейдером</small>
                                       </div>
                                       <div class="form-group col-md-5">
                                            <h5 class="text-{{$text}}">Тип копи-трейдинга (Копировать/Купить)</h5>
                                            <select class="form-control text-{{$text}} bg-{{$bg}}" name="button_name" value ="{{ $copytrading->button_name }}">
                                                <option>Копировать</option>
                                                <option>Купить</option>
                
                                            </select>  
                                        
                                       </div>
                                       <div class="form-group col-md-5">
                                            <h5 class="text-{{$text}}">Активные дни эксперта-трейдера</h5>
                                           <input class="form-control text-{{$text}} bg-{{$bg}}" placeholder="Введите максимальную доходность" type="text" name="active_days"  value ="{{ $copytrading->active_days }}" required>
                                           <small class="text-{{$text}}">Это ожидаемые дни, когда трейдер доступен</small>
                                       </div>
                                       <div class="form-group col-md-5">
                                            <h5 class="text-{{$text}}">Капитал (Процент побед) %</h5>
                                           <input class="form-control text-{{$text}} bg-{{$bg}}" placeholder="Введите капитал торговли эксперта" type="text" name="equity" value ="{{ $copytrading->equity }}" value="0" required>
                                           <small class="text-{{$text}}">Это процент побед эксперта</small>
                                       </div>
                                       
                                      

                                       <div class="form-group col-md-5">
                                           <h5 class="text-{{$text}}">Стартовая сумма ({{$settings->currency}})</h5>
                                           <input class="form-control text-{{$text}} bg-{{$bg}}" placeholder="Стартовая сумма" type="text" name="price" value ="{{ $copytrading->price }}" required>
                                           <small class="text-{{$text}}">Это цена этого копи-трейдинга</small>
                                       </div>
                                      
                                       <div class="form-group col-md-5">
                                        <h5 class="text-{{$text}}">Рейтинг эксперта-трейдера</h5>
                                           <input class="form-control text-{{$text}} bg-{{$bg}}" placeholder="Рейтинг эксперта-трейдера" type="text" name="rating"   value ="{{ $copytrading->rating }}" required>
                                           <small class="text-{{$text}}">Это рейтинг эксперта-трейдера</small>
                                           <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star checked"></span>
                                             <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star"></span>
                                            <span class="fa fa-star"></span>
                                            
                                       </div>



                                       <div class="form-group col-md-5">
                                        <h5 class="text-{{$text}}">Фото эксперта-трейдера</h5>
                                           <input class="form-control text-{{$text}} bg-{{$bg}}"  value ="{{ $copytrading->photo }}" placeholder="Фото эксперта-трейдера" type="file" name="photo"  >
                                           <small class="text-{{$text}}">Это фото эксперта-трейдера</small>
                                            
                                       </div>
                                       <div class="form-group col-md-12">
                                        <input type="hidden" name="id" value="{{ $copytrading->id}}">
                                           <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                           <input type="submit" class="btn btn-secondary" value="Добавить новый план копи-трейдинга">
                                       </div>
                                    </div>
                               </form>
                            </div>
						</div>
					</div>
				</div>
			</div>
            
            <div id="durationModal" class="modal fade" role="dialog">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-body bg-{{$bg}}">
                            <h5 class="text-{{$text}}">FIRSTLY, Always preceed the time frame with a digit, that is do not write the number in letters, <br> <br> SECONDLY, always add space after the number, <br> <br> LASTLY, the first letter of the timeframe should be in CAPS and always add 's' to the timeframe even if your duration is just a day, month or year.</h5>
                            <h2 class="text-{{$text}}">Eg, 1 Days, 3 Weeks, 1 Hours, 48 Hours, 4 Months, 1 Years, 9 Months</h2>
                           
                        </div>
                    </div>
                </div>
            </div>
            <div id="topupModal" class="modal fade" role="dialog">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-body bg-{{$bg}}">
                            
                        </div>
                    </div>
                </div>
            </div>

            <style>
                .checked {
  color: orange;
}
                </style>
	@endsection