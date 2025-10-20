@extends('layouts.app')
@section('content')
    @include('admin.topmenu')
    @include('admin.sidebar')
    <div class="main-panel">
        <div class="content ">
            <div class="page-inner">
                <div class="mt-2 mb-4">
                    <h1 class="title1 ">Системные планы</h1>
                </div>
                <x-danger-alert />
                <x-success-alert />
                <div class="mb-5 row">
                    <div class="mt-2 mb-3 col-lg-12">
                        <a class="btn btn-primary" href="{{ route('newplan') }}"><i class="fa fa-plus"></i> Новый план</a>
                    </div>
                    @forelse ($plans as $plan)
                        <div class="col-lg-4">
                            <div class="pricing-table purple border p-4 card">
                                <div class="card-body">
                                    <h2 class="">{{ $plan->name }} <span
                                class="fs-3 fw-normal text-success">{{ $plan->tag ?? '' }}</span></h2>
                                    <!-- Price -->
                                    <div class="price-tag">
                                        <span class="symbol ">{{ $settings->currency }}</span>
                                        <span class="amount ">{{ number_format($plan->price) }}</span>
                                    </div>
                                    <!-- Features -->
                                    <div class="pricing-features">
                                        <div class="feature text-dark">Минимальный возможный депозит:<span
                                                class="">{{ $settings->currency }}{{ number_format($plan->min_price) }}</span>
                                        </div>
                                        <div class="feature text-dark">Максимальный возможный депозит:<span
                                                class="">{{ $settings->currency }}{{ number_format($plan->max_price) }}</span>
                                        </div>
                                        <div class="feature text-dark">Минимальная доходность:<span
                                                class="">{{ number_format($plan->minr) }}%</span></div>
                                        <div class="feature text-dark">Максимальная доходность:<span
                                                class="">{{ number_format($plan->maxr) }}%</span></div>
                                        <div class="feature text-dark">Подарочный бонус:<span
                                                class="">{{ $settings->currency }}{{ $plan->gift }}</span></div>
                                        <div class="feature text-dark">Продолжительность:<span
                                                class="">{{ $plan->expiration }}</span>
                                        </div>
                                    </div> <br>

                                    <!-- Button -->
                                    <div class="text-center">
                                        <a href="{{ route('editplan', $plan->id) }}" class="btn btn-primary"><i
                                                class="text-white flaticon-pencil"></i>
                                        </a> &nbsp;
                                        <a href="{{ url('admin/dashboard/trashplan') }}/{{ $plan->id }}"
                                            class="btn btn-danger"><i class="text-white fa fa-times"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="col-lg-12 text-center">
                            <div class="pricing-table card purple border p-4">
                                <h4 class="">В данный момент инвестиционных планов нет, нажмите кнопку выше, чтобы добавить план.
                                </h4>
                            </div>
                        </div>
                    @endforelse

                </div>
            </div>
        </div>
    @endsection
