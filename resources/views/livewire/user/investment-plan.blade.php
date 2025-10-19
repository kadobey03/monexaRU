<div>
    @if (count($plans) > 0)
        <div class="mt-4 row">
            <div class="col-md-8">
                <div class="card">
                    <x-danger-alert />
                    <x-success-alert />
                    <div class="card-body">
                        <!-- Remove 'active' class, this is just to show in Codepen thumbnail -->
                        <div class="select-menu" x-data="{ open: false }" :class="open ? 'active' : ''">
                            <div class="select-btn" @click="open = ! open">
                                <div class="d-flex">
                                    @if ($planSelected)
                                        <span class="mr-2 fas fa-hand-holding-seedling"></span>
                                        <span class="sBtn-text">{{ $planSelected->name }}</span>
                                    @else
                                        <span class="sBtn-text">Выберите план</span>
                                    @endif
                                </div>
                                <i class="fas fa-angle-down"></i>
                            </div>

                            <ul class="options">
                                @foreach ($plans as $plan)
                                    <li class="option" wire:click="selectPlan({{ $plan->id }})"
                                        @click=" open=false">
                                        <i class="fas fa-hand-holding-seedling"></i>
                                        <span class="option-text">{{ $plan->name }}</span>
                                    </li>
                                @endforeach

                            </ul>
                        </div>
                        <div class="mt-5">
                            <div class="">
                                <p>Выберите сумму для инвестирования</p>
                            </div>
                            <div class="flex-wrap mb-1 d-flex justify-content-start align-items-center">
                                <button class="mb-2 border-black rounded-none btn btn-light"
                                    wire:click="selectAmount('100')">{{ $settings->currency }}100</button>
                                <button class="mb-2 border-black rounded-none btn btn-light"
                                    wire:click="selectAmount('250')">{{ $settings->currency }}250</button>
                                <button class="mb-2 border-black rounded-none btn btn-light"
                                    wire:click="selectAmount('500')">{{ $settings->currency }}500</button>
                                <button class="mb-2 border-black rounded-none btn btn-light"
                                    wire:click="selectAmount('1000')">{{ $settings->currency }}1,000</button>
                                <button class="mb-2 border-black rounded-none btn btn-light"
                                    wire:click="selectAmount('1500')">{{ $settings->currency }}1,500</button>
                                <button class="mb-2 border-black rounded-none btn btn-light"
                                    wire:click="selectAmount('2000')">{{ $settings->currency }}2,000</button>
                            </div>
                        </div>

                        <div class="mt-5">
                            <div class="">
                                <p>Или введите сумму</p>
                                <div>
                                    <input type="number" required wire:model='amountToInvest'
                                        wire:keyup="checkIfAmountIsEmpty" name="" id=""
                                        class="form-control d-block w-100" placeholder="1000"
                                        min="{{ $planSelected ? $planSelected->min_price : '0' }}"
                                        max="{{ $planSelected ? $planSelected->max_price : '10000000000' }}">
                                </div>
                            </div>
                        </div>

                        <div class="mt-5">
                            <p>Выберите способ оплаты</p>
                        </div>
                        <div class="select-menu2">
                            <ul class="options2 d-block">
                                <li class="mb-3 option2 {{ $paymentMethod == 'Account Balance' ? 'bg-light border border-primary' : '' }}"
                                    id="acnt" wire:click="chanegePaymentMethod('Account Balance')">
                                    <i class="fas fa-wallet"></i>
                                    <span class="option-text2 d-block mr-2">Баланс счета </span> <br>
                                    <span class="small">
                                        {{ $settings->currency }}{{ number_format(Auth::user()->account_bal) }}
                                    </span>
                                </li>
                                {{-- <li class="mb-3 shadow option2 {{ $paymentMethod == 'BTC Wallet' ? 'bg-light border border-primary' : '' }}"
                                    id="btcbal" wire:click="chanegePaymentMethod('BTC Wallet')">
                                    <i class="fab fa-bitcoin"></i>
                                    <span class="option-text2">BTC Wallet</span>
                                    <span class="small">
                                        <strong> Balance: </strong> 0.00038828 BTC
                                    </span>
                                </li> --}}
                            </ul>
                        </div>
                    </div>

                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <p>Детали инвестиций</p>
                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <p class="mb-0 small">Название плана</p>
                                <span class="text-primary small">{{ $planSelected ? $planSelected->name : '-' }}</span>
                            </div>
                            <div class="mb-3 col-md-6">
                                <p class="mb-0 small">Цена плана</p>
                                <span
                                    class="text-primary small">{{ $settings->currency }}{{ $planSelected ? $planSelected->price : '-' }}</span>
                            </div>
                            <div class="mb-3 col-md-6">
                                <p class="mb-0 small">Длительность</p>
                                <span
                                    class="text-primary small">{{ $planSelected ? $planSelected->expiration : '-' }}</span>
                            </div>
                            <div class="mb-3 col-md-6">
                                <p class="mb-0 small">Прибыль</p>
                                <span class="text-primary small">
                                    @if ($planSelected)
                                        @if ($planSelected->increment_type == 'Fixed')
                                            {{ $settings->currency }}{{ $planSelected->increment_amount }}
                                            {{ $planSelected->increment_interval }}
                                        @else
                                            {{ $planSelected->increment_amount }}%
                                            {{ $planSelected->increment_interval }}
                                        @endif
                                    @else
                                        -
                                    @endif
                                </span>
                            </div>
                            <div class="mb-3 col-md-6">
                                <p class="mb-0 small">Минимальный депозит</p>
                                <span
                                    class="text-primary small">{{ $planSelected ? $settings->currency . $planSelected->min_price : '-' }}</span>
                            </div>
                            <div class="mb-3 col-md-6">
                                <p class="mb-0 small">Максимальный депозит</p>
                                <span
                                    class="text-primary small">{{ $planSelected ? $settings->currency . $planSelected->max_price : '-' }}</span>
                            </div>
                            <div class="mb-3 col-md-6">
                                <p class="mb-0 small">Минимальный доход</p>
                                <span
                                    class="text-primary small">{{ $planSelected ? $planSelected->minr . '%' : '-' }}</span>
                            </div>
                            <div class="mb-3 col-md-6">
                                <p class="mb-0 small">Максимальный доход</p>
                                <span
                                    class="text-primary small">{{ $planSelected ? $planSelected->maxr . '%' : '-' }}</span>
                            </div>
                            <div class="mb-3 col-md-6">
                                <p class="mb-0 small">Бонус</p>
                                <span
                                    class="text-primary small">{{ $planSelected ? $settings->currency . $planSelected->gift : '-' }}</span>
                            </div>
                        </div>
                        <hr>
                        <div class="justify-content-between d-md-flex">
                            <span class="small d-block d-md-inline">Способ оплаты:</span>
                            <span class="small text-primary">{{ $paymentMethod ? $paymentMethod : '-' }}</span>
                        </div>
                        <hr>
                        <div class="justify-content-between d-md-flex">
                            <span class="d-block d-md-inline font-weight-bold">Сумма для инвестирования:</span>
                            <span
                                class="text-primary font-weight-bold">{{ $settings->currency }}{{ $amountToInvest ? number_format($amountToInvest) : '0' }}</span>
                        </div>
                        <div class="mt-3 text-center">
                            <form action="" wire:submit.prevent="joinPlan">
                                <button class="px-3 btn btn-primary" {{ $disabled }}>
                                    Подтвердить и инвестировать
                                </button>
                            </form>
                            <span class="mt-2 small text-primary" wire:loading wire:target="joinPlan">
                                {{ $feedback }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @else
        <div class="mt-4 row">
            <div class="col-md-12">
                <div class="py-4 card">
                    <div class="text-center card-body">
                        <p>В настоящее время нет инвестиционных планов, пожалуйста, свяжитесь с нашей поддержкой для получения дополнительной информации</p>
                    </div>
                </div>
            </div>
        </div>
    @endif

</div>
