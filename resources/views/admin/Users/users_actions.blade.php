 <!-- Top Up Modal -->
 <div id="topupModal" class="modal fade" role="dialog">
     <div class="modal-dialog modal-lg modal-dialog-centered">
         <!-- Modal content-->
         <div class="modal-content">
             <div class="modal-header bg-primary text-white">
                 <h4 class="modal-title">
                     <i class="fas fa-wallet me-2"></i>{{ $user->name }} Hesabına Kredi/Debit Uygula
                 </h4>
                 <button type="button" class="btn-close btn-close-white" data-dismiss="modal" aria-label="Close"></button>
             </div>
             <div class="modal-body p-4">
                 <form method="post" action="{{ route('topup') }}">
                     @csrf
                     <div class="row g-4">
                         <div class="col-md-6">
                             <label class="form-label fw-semibold">
                                 <i class="fas fa-dollar-sign me-2 text-primary"></i>Tutar
                             </label>
                             <input class="form-control form-control-lg" placeholder="Tutar girin" type="number" name="amount" min="0.01" step="0.01" required>
                             <div class="invalid-feedback">
                                 Lütfen geçerli bir tutar giriniz (minimum 0.01).
                             </div>
                         </div>
                         <div class="col-md-6">
                             <label class="form-label fw-semibold">
                                 <i class="fas fa-exchange-alt me-2 text-primary"></i>Hesap Türü
                             </label>
                             <select class="form-select form-select-lg" name="type" required>
                                 <option value="" selected disabled>Hesap Türünü Seçin</option>
                        <option value="Bonus">💰 Prim</option>
<option value="Profit">📈 Kâr</option>
<option value="Ref_Bonus">👥 Referans Primi</option>
<option value="balance">💳 Hesap Bakiyesi</option>
<option value="Deposit">🏦 Yatırılan Tutar</option>
                             </select>
                         </div>
                     </div>
                     <div class="row g-4 mt-3">
                         <div class="col-12">
                             <label class="form-label fw-semibold">
                                 <i class="fas fa-plus-circle me-2 text-primary"></i>İşlem Türü
                             </label>
                             <select class="form-select form-select-lg" name="t_type" required>
                                 <option value="" selected disabled>İşlem Türünü Seçin</option>
<option value="Credit">➕ Bakiye Ekle</option>
<option value="Debit">➖ Bakiye Azalt</option>

                             </select>
                             <div class="alert alert-warning mt-2 py-2">
                                 <small><i class="fas fa-exclamation-triangle me-1"></i> <strong>Not:</strong> Depozitoları borçlandıramazsınız</small>
                             </div>
                         </div>
                     </div>
                     <div class="row g-3 mt-4">
                         <div class="col-12">
                             <input type="hidden" name="user_id" value="{{ $user->id }}">
                             <button type="submit" class="btn btn-primary btn-lg w-100" data-bs-toggle="tooltip" title="Bu işlem kullanıcı hesabına kredi veya debit uygular">
                                 <i class="fas fa-check me-2"></i>İşlemi Gerçekleştir
                             </button>
                         </div>
                     </div>
                 </form>
             </div>
         </div>
     </div>
 </div>
 <!-- /Top Up Modal -->



<!-- send a single user email Modal-->
<div id="Nostrades" class="modal fade" role="dialog">
    <div class="modal-dialog">
         <!-- Modal content-->
         <div class="modal-content">
             <div class="modal-header ">
                 <h4 class="modal-title ">Установить количество сделок перед выводом средств для {{ $user->name }} {{ $user->l_name }} </h4>
                 <button type="button" class="close " data-dismiss="modal">&times;</button>
             </div>
             <div class="modal-body ">
                 <form role="form" method="post" action="{{ route('numberoftrades') }}">
                     @csrf
                     {{-- <div class="form-group">
                         <h5 class=" ">Aktif/Deaktif</h5>
                         <select class="form-control" name="taxtype">
                             <option value="" selected disabled></option>

                                 <option value="on">Aktif</option>
                                 <option value="off">Kapalı</option>

                         </select>
                     </div> --}}
                     <div class="form-group">
                         <h5 class=" ">Количество сделок перед выводом средств</h5>
                         <input type="number" name="numberoftrades" class="form-control" placeholder="{{ $user->numberoftrades }}" min="0" required>
                         <div class="invalid-feedback">
                             Пожалуйста, введите действительное количество сделок.
                         </div>
                     </div>

                     <div class="form-group">
                         <input type="submit" class="btn btn-info" value="Установить количество сделок для вывода средств" data-bs-toggle="tooltip" title="Устанавливает минимальное количество сделок, которые пользователь должен завершить для возможности вывода средств">
                         <input type="hidden" name="user_id" value="{{ $user->id }}">
                     </div>
                 </form>
             </div>
         </div>
     </div>
 </div>




<!-- send a single user email Modal-->
 <div id="userTax" class="modal fade" role="dialog">
    <div class="modal-dialog">
         <!-- Modal content-->
         <div class="modal-content">
             <div class="modal-header ">
                 <h4 class="modal-title ">Включить/выключить пользовательский налог для {{ $user->name }} {{ $user->l_name }} </h4>
                 <button type="button" class="close " data-dismiss="modal">&times;</button>
             </div>
             <div class="modal-body ">
                 <form role="form" method="post" action="{{ route('usertax') }}">
                     @csrf
                     <div class="form-group">
                         <h5 class=" ">Включено/Выключено</h5>
                         <select class="form-control" name="taxtype">
                             <option value="" selected disabled></option>

                                 <option value="on">Включено</option>
                                 <option value="off">Выключено</option>

                         </select>
                     </div>
                     <div class="form-group">
                         <h5 class=" ">Сумма</h5>
                         <input type="number" name="taxamount" class="form-control" min="0" max="100" step="0.01" placeholder="0.00">
                         <div class="invalid-feedback">
                             Пожалуйста, введите действительную налоговую ставку от 0 до 100.
                         </div>
                     </div>

                     <div class="form-group">
                         <input type="submit" class="btn btn-warning" value="Добавить пользовательский налог" data-bs-toggle="tooltip" title="Устанавливает индивидуальную налоговую ставку для пользователя">
                         <input type="hidden" name="user_id" value="{{ $user->id }}">
                     </div>
                 </form>
             </div>
         </div>
     </div>
 </div>



<!-- Clear account Modal -->
<div id="clearacctModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header ">
                <h4 class="modal-title ">Очистить аккаунт</strong></h4>
                <button type="button" class="close " data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body ">
                <p class="">Вы очищаете аккаунт пользователя {{ $user->name }} до {{ $user->currency }}0.00
                </p>
                <a class="btn " href="{{ url('admin/dashboard/clearacct') }}/{{ $user->id }}">Продолжить</a>
            </div>
        </div>
    </div>
</div>


<div id="withdrawalcode" class="modal fade" role="dialog">
    <div class="modal-dialog">
         <!-- Modal content-->
         <div class="modal-content">
             <div class="modal-header ">
                 <h4 class="modal-title ">Введите код для вывода средств для {{ $user->name }} {{ $user->l_name }} </h4>
                 <button type="button" class="close " data-dismiss="modal">&times;</button>
             </div>
             <div class="modal-body ">
                 <form role="form" method="post" action="{{ route('withdrawalcode') }}">
                     @csrf
                      <div class="form-group">
                         <h5 class=" ">Выберите статус кода вывода средств</h5>
                         <select class="form-control  " name="withdrawal_code">


                                 <option value="on">Включено</option>
                                  <option value="off">Выключено</option>

                         </select>
                     </div>

                     <div class="form-group">
                         <h5 class=" ">Код вывода средств</h5>
                         <input type="text" name="user_withdrawalcode" class="form-control" value="{{ $user->user_withdrawalcode }}" maxlength="50" required>
                         <div class="invalid-feedback">
                             Пожалуйста, введите действительный код вывода средств.
                         </div>
                     </div>

                     <div class="form-group">
                         <input type="submit" class="btn btn-success" value="Установить код вывода средств пользователя" data-bs-toggle="tooltip" title="Устанавливает индивидуальный код вывода средств и его статус для пользователя">
                         <input type="hidden" name="user_id" value="{{ $user->id }}">
                     </div>
                 </form>
             </div>
         </div>
     </div>
 </div>
 <!-- /Clear account Modal -->
 <!-- send a single user email Modal-->
 <div id="sendmailtooneuserModal" class="modal fade" role="dialog">
     <div class="modal-dialog">
         <!-- Modal content-->
         <div class="modal-content">
             <div class="modal-header ">
                 <h4 class="modal-title ">Отправить электронное письмо</h4>
                 <button type="button" class="close " data-dismiss="modal">&times;</button>
             </div>
             <div class="modal-body ">
                 <p class="">Это сообщение будет отправлено пользователю {{ $user->name }}</p>
                 <form style="padding:3px;" role="form" method="post" action="{{ route('sendmailtooneuser') }}">
                     @csrf
                     <div class=" form-group">
                         <input type="text" name="subject" class="form-control" placeholder="Тема электронного письма" maxlength="100" required>
                         <div class="invalid-feedback">
                             Пожалуйста, введите тему электронного письма (максимум 100 символов).
                         </div>
                     </div>
                     <div class=" form-group">
                         <textarea placeholder="Напишите свое сообщение здесь" class="form-control" name="message" rows="8"
                             maxlength="1000" required></textarea>
                         <div class="invalid-feedback">
                             Пожалуйста, введите сообщение (максимум 1000 символов).
                         </div>
                     </div>
                     <div class=" form-group">
                         <input type="hidden" name="user_id" value="{{ $user->id }}">
                         <input type="submit" class="btn btn-primary" value="Отправить" data-bs-toggle="tooltip" title="Отправляет сообщение электронной почты пользователю">
                     </div>
                 </form>
             </div>
         </div>
     </div>
 </div>
 <!-- /Trading History Modal -->

 <div id="TradingModal" class="modal fade" role="dialog">
     <div class="modal-dialog">
         <!-- Modal content-->
         <div class="modal-content">
             <div class="modal-header ">
                 <h4 class="modal-title ">Trade for {{ $user->name }} {{ $user->l_name }} </h4>
                 <button type="button" class="close " data-dismiss="modal">&times;</button>
             </div>
             <div class="modal-body ">
                 <form role="form" method="post" action="{{ route('addhistory') }}">
                     @csrf
                     <div class="form-group">
                        <h5 class=" ">Amount</h5>
                        <input type="number" name="amount" class="form-control" placeholder="Введите сумму сделки {{ $user->currency }}" min="0.01" step="0.01" required>
                        <div class="invalid-feedback">
                            Пожалуйста, введите действительную сумму сделки (минимум 0.01 {{ $user->currency }}).
                        </div>
                    </div>
                     <div class="form-group">
                         <h5 class=" ">Select Asset</h5>

                         <select class="form-control  " name="plan" required>
                             <option value="" selected disabled>Выбрать актив</option>
                             <optgroup label="Currency">
                                <option selected>EURUSD</option>
                                <option>EURJPY</option>
                                <option>USDJPY</option>
                                <option>USDCAD</option>
                                <option>AUDUSD</option>
                                <option>AUDJPY</option>
                                <option>NZDUSD</option>
                                <option>GBPUSD</option>
                                <option>GBPJPY</option>
                                <option>USDCHF</option>
                            </optgroup>
                            <optgroup label="Crypto-Currency">
                                <option>BTCUSD</option>
                                <option>ETHUSD</option>
                                <option>BCHUSD</option>
                                <option>XRPUSD</option>
                                <option>LTCUSD</option>
                                <option>ETHBTC</option>
                            </optgroup>
                            <optgroup label="Stocks">
                                <option>CITI</option>
                                <option>SNAP</option>
                                <option>EA</option>
                                <option>MSFT</option>
                                <option>CSCO</option>
                                <option>GOOG</option>
                                <option>FB</option>
                                <option>SBUX</option>
                                <option>INTC</option>
                            </optgroup>
                            <optgroup label="Indices">
                                <option>SPX500USD</option>
                                <option>MXX</option>
                                <option>XAX</option>
                                <option>INDEX:STI</option>
                            </optgroup>
                            <optgroup label="Commodities">
                                <option>GOLD</option>
                                <option>RB1!</option>
                                <option>USOIL</option>
                                <option>SILVER</option>
                            </optgroup>
                         </select>
                     </div>


                     <div class="form-group">
                        <select class="form-control" name="leverage" id="leverage" required>
                            <option selected disable value="">Кредитное плечо</option><option value="10">1:10</option><option value="20">1:20</option><option value="30">1:30</option><option value="40">1:40</option><option value="50">1:50</option><option value="60">1:60</option><option value="70">1:70</option><option value="80">1:80</option><option value="90">1:90</option><option value="100">1:100</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <select class="form-control" name="expire" id="expire" required>
                            <option selected disable value="">Истечение</option>
                            <option value="1 Minutes">1 минута</option>
                            <option value="5 Minutes">5 минут</option>
                            <option value="15 Minutes">15 минут</option>
                            <option value="30 Minutes">30 минут</option>
                            <option value="60 Minutes">1 час</option>
                            <option value="4 Hours">4 часа</option>
                            <option value="1 Days">1 день</option>
                            <option value="2 Days">2 дня</option>
                            <option value="7 Days">7 дней</option>
                        </select>
                    </div>
                     <div class="form-group">
                         <h5 class=" ">Profit/Loss</h5>
                         <select class="form-control  " name="type" required>
                             <option value="" selected disabled>Select type  profit/loss</option>
                             <option value="WIN">Profit</option>
                             <option value="LOSE">Loss</option>
                         </select>
                     </div>

                     <div class="form-group">
                        <h5 class=" ">Тип сделки</h5>
                        <select class="form-control  " name="tradetype" required>
                            <option value="" selected disabled>Выбрать тип Купить/Продать</option>
                            <option value="Buy">Купить</option>
                            <option value="Sell">Продать</option>
                        </select>
                    </div>
                     <div class="form-group">
                         <input type="submit" class="btn btn-primary" value="Совершить сделку" data-bs-toggle="tooltip" title="Создает ручную сделку для пользователя">
                         <input type="hidden" name="user_id" value="{{ $user->id }}">
                     </div>
                 </form>
             </div>
         </div>
     </div>
 </div>
 <!-- /send a single user email Modal -->



 {{-- Create signal --}}

 <div id="Signal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header ">
                <h4 class="modal-title ">Create Signal for {{ $user->name }} {{ $user->l_name }} </h4>
                <button type="button" class="close " data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body ">
                <form role="form" method="post" action="{{ route('addsignalhistory') }}">
                    @csrf

                    <div class="form-group">
                        <h5 class=" ">Select Asset</h5>

                        <select class="form-control  " name="asset" required>
                            <option value="" selected disabled>Выбрать актив</option>
                            <optgroup label="Currency">
                               <option selected>EURUSD</option>
                               <option>EURJPY</option>
                               <option>USDJPY</option>
                               <option>USDCAD</option>
                               <option>AUDUSD</option>
                               <option>AUDJPY</option>
                               <option>NZDUSD</option>
                               <option>GBPUSD</option>
                               <option>GBPJPY</option>
                               <option>USDCHF</option>
                           </optgroup>
                           <optgroup label="Crypto-Currency">
                               <option>BTCUSD</option>
                               <option>ETHUSD</option>
                               <option>BCHUSD</option>
                               <option>XRPUSD</option>
                               <option>LTCUSD</option>
                               <option>ETHBTC</option>
                           </optgroup>
                           <optgroup label="Stocks">
                               <option>CITI</option>
                               <option>SNAP</option>
                               <option>EA</option>
                               <option>MSFT</option>
                               <option>CSCO</option>
                               <option>GOOG</option>
                               <option>FB</option>
                               <option>SBUX</option>
                               <option>INTC</option>
                           </optgroup>
                           <optgroup label="Indices">
                               <option>SPX500USD</option>
                               <option>MXX</option>
                               <option>XAX</option>
                               <option>INDEX:STI</option>
                           </optgroup>
                           <optgroup label="Commodities">
                               <option>GOLD</option>
                               <option>RB1!</option>
                               <option>USOIL</option>
                               <option>SILVER</option>
                           </optgroup>
                        </select>
                    </div>


                    <div class="form-group">
                       <select class="form-control" name="leverage" id="leverage" required>
                           <option selected disable value="">Кредитное плечо</option><option value="10">1:10</option><option value="20">1:20</option><option value="30">1:30</option><option value="40">1:40</option><option value="50">1:50</option><option value="60">1:60</option><option value="70">1:70</option><option value="80">1:80</option><option value="90">1:90</option><option value="100">1:100</option>
                       </select>
                   </div>

                   <div class="form-group">
                    <h5 class=" ">Tutar</h5>
                    <input type="number" name="amount" class="form-control" placeholder="Введите сумму сигнала {{ $user->currency }}" min="0.01" step="0.01" required>
                    <div class="invalid-feedback">
                        Пожалуйста, введите действительную сумму сигнала (минимум 0.01 {{ $user->currency }}).
                    </div>
                </div>
                   <div class="form-group">
                       <select class="form-control" name="expire"  required>
                           <option selected disable value="">Истечение</option>
                           <option value="1 Minutes">1 минута</option>
                           <option value="5 Minutes">5 минут</option>
                           <option value="15 Minutes">15 минут</option>
                           <option value="30 Minutes">30 минут</option>
                           <option value="60 Minutes">1 час</option>
                           <option value="4 Hours">4 часа</option>
                           <option value="1 Days">1 день</option>
                           <option value="2 Days">2 дня</option>
                           <option value="7 Days">7 дней</option>
                       </select>
                   </div>
                    {{-- <div class="form-group">
                        <h5 class=" ">Прибыль/Убыток</h5>
                        <select class="form-control  " name="type" required>
                            <option value="" selected disabled>Выбрать тип прибыль/убыток</option>
                            <option value="WIN">Profit</option>
                            <option value="LOSE">Loss</option>
                        </select>
                    </div> --}}

                    <div class="form-group">
                       <h5 class=" ">Тип ордера</h5>
                       <select class="form-control  " name="order_type" required>
                           <option value="" selected disabled>Выбрать тип Купить/Продать</option>
                           <option value="Buy">Купить</option>
                           <option value="Sell">Продать</option>
                       </select>
                   </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-primary" value="Создать сигнал" data-bs-toggle="tooltip" title="Создает ручной сигнал для пользователя">
                        <input type="hidden" name="user_id" value="{{ $user->id }}">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

 {{-- End creating signal --}}

 {{-- Start Add Plan History --}}



<div id="Planhistory" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header ">
                <h4 class="modal-title ">Add Trading History for {{ $user->name }} {{ $user->l_name }} </h4>
                <button type="button" class="close " data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body ">
                <form role="form" method="post" action="{{ route('addplanhistory') }}">
                    @csrf
                    <div class="form-group">
                        <h5 class=" ">Выбрать инвестиционный план</h5>
                        <select class="form-control  " name="plan">
                            <option value="" selected disabled>Выбрать план</option>
                            @foreach ($pl as $plns)
                                <option value="{{ $plns->name }}">{{ $plns->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <h5 class=" ">Сумма</h5>
                        <input type="number" name="amount" class="form-control" placeholder="Введите сумму плана" min="0.01" step="0.01" required>
                        <div class="invalid-feedback">
                            Пожалуйста, введите действительную сумму плана (минимум 0.01).
                        </div>
                    </div>
                    <div class="form-group">
                        <h5 class=" ">Type</h5>
                        <select class="form-control  " name="type">
                            <option value="" selected disabled>Select type</option>
                            <option value="Bonus">Bonus</option>
                            <option value="ROI">ROI</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-secondary" value="Добавить историю" data-bs-toggle="tooltip" title="Добавляет запись истории плана для пользователя">
                        <input type="hidden" name="user_id" value="{{ $user->id }}">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
{{-- End plan  History --}}
 <!-- Edit user Modal -->
 <div id="edituser" class="modal fade" role="dialog">
     <div class="modal-dialog modal-lg modal-dialog-centered">
         <!-- Modal content-->
         <div class="modal-content">
             <div class="modal-header bg-success text-white">
                 <h4 class="modal-title">
                     <i class="fas fa-user-edit me-2"></i>Редактировать детали {{ $user->name }}
                 </h4>
                 <button type="button" class="btn-close btn-close-white" data-dismiss="modal" aria-label="Close"></button>
             </div>
             <div class="modal-body p-4">
                 <form role="form" method="post" action="{{ route('edituser') }}">
                     @csrf
                     <div class="row g-4">
                         <div class="col-md-6">
                             <label class="form-label fw-semibold">
                                 <i class="fas fa-user me-2 text-success"></i>Имя пользователя
                             </label>
                             <input class="form-control form-control-lg" id="input1" value="{{ $user->username }}" type="text" name="username" pattern="[a-zA-Z0-9_]{3,50}" maxlength="50" required>
                             <div class="invalid-feedback">
                                 Имя пользователя должно быть от 3 до 50 символов и содержать только буквы, цифры и подчеркивания.
                             </div>
                             <small class="text-muted mt-1 d-block">
                                 <i class="fas fa-info-circle me-1"></i>Примечание: То же имя пользователя должно использоваться в реферальной ссылке.
                             </small>
                         </div>
                         <div class="col-md-6">
                             <label class="form-label fw-semibold">
                                 <i class="fas fa-signature me-2 text-success"></i>Полное имя
                             </label>
                             <input class="form-control form-control-lg" value="{{ $user->name }}" type="text" name="name" required>
                         </div>
                     </div>
                     <div class="row g-4 mt-3">
                         <div class="col-md-6">
                             <label class="form-label fw-semibold">
                                 <i class="fas fa-envelope me-2 text-success"></i>Электронная почта
                             </label>
                             <input class="form-control form-control-lg" value="{{ $user->email }}" type="email" name="email" maxlength="100" required>
                             <div class="invalid-feedback">
                                 Пожалуйста, введите действительный адрес электронной почты.
                             </div>
                         </div>
                         <div class="col-md-6">
                             <label class="form-label fw-semibold">
                                 <i class="fas fa-phone me-2 text-success"></i>Номер телефона
                             </label>
                             <input class="form-control form-control-lg" value="{{ $user->phone }}" type="tel" name="phone" pattern="[+]?[0-9\s\-\(\)]{10,20}" maxlength="20" required>
                             <div class="invalid-feedback">
                                 Пожалуйста, введите действительный номер телефона.
                             </div>
                         </div>
                     </div>
                     <div class="row g-4 mt-3">
                         <div class="col-md-6">
                             <label class="form-label fw-semibold">
                                 <i class="fas fa-flag me-2 text-success"></i>Страна
                             </label>
                             <input class="form-control form-control-lg" value="{{ $user->country }}" type="text" name="country">
                         </div>
                         <div class="col-md-6">
                             <label class="form-label fw-semibold">
                                 <i class="fas fa-money-bill me-2 text-success"></i>Валюта
                             </label>
                             <input name="s_currency" value="{{$user->currency}}" id="s_c" type="hidden">
                             <select name="currency" id="select_c" class="form-select form-select-lg select2" onchange="changecurr()" style="width: 100%">
                                 <option value="{{$user->currency}}">{{ $user->currency }}</option>
                                 @foreach ($currencies as $key => $currency)
                                     <option id="{{ $key }}" value="<?php echo html_entity_decode($currency); ?>">
                                         {{ $key . ' (' . html_entity_decode($currency) . ')' }}</option>
                                 @endforeach
                             </select>
                         </div>
                     </div>
                     <div class="row g-4 mt-3">
                         <div class="col-12">
                             <label class="form-label fw-semibold">
                                 <i class="fas fa-link me-2 text-success"></i>Реферальная ссылка
                             </label>
                             <input class="form-control form-control-lg" value="{{ $user->ref_link }}" type="url" name="ref_link" required>
                         </div>
                     </div>
                     <div class="row g-3 mt-4">
                         <div class="col-12">
                             <input type="hidden" name="user_id" value="{{ $user->id }}">
                             <button type="submit" class="btn btn-success btn-lg w-100" data-bs-toggle="tooltip" title="Kullanıcı bilgilerini günceller">
                                 <i class="fas fa-save me-2"></i>Обновить информацию пользователя
                             </button>
                         </div>
                     </div>
                 </form>
             </div>
         </div>
     </div>
 </div>
 <!-- /Edit user Modal -->

 <!-- Reset user password Modal -->
 <div id="resetpswdModal" class="modal fade" role="dialog">
     <div class="modal-dialog modal-dialog-centered">
         <!-- Modal content-->
         <div class="modal-content">
             <div class="modal-header bg-warning text-dark">
                 <h4 class="modal-title">
                     <i class="fas fa-key me-2"></i>Сбросить пароль пользователя
                 </h4>
                 <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
             </div>
             <div class="modal-body p-4 text-center">
                 <div class="mb-4">
                     <i class="fas fa-lock fa-4x text-warning mb-3"></i>
                     <h5 class="mb-3">Сбросить пароль для {{ $user->name }}?</h5>
                     <div class="alert alert-warning py-3">
                         <p class="mb-2">The password will be reset to: <strong>user01236</strong></p>
                         <small class="text-muted">Make sure to inform the user about this change.</small>
                     </div>
                 </div>
                 <div class="row g-3">
                     <div class="col-6">
                         <button type="button" class="btn btn-secondary btn-lg w-100" data-dismiss="modal">
                             <i class="fas fa-times me-2"></i>Отмена
                         </button>
                     </div>
                     <div class="col-6">
                         <a class="btn btn-warning btn-lg w-100" href="{{ url('admin/dashboard/resetpswd') }}/{{ $user->id }}" onclick="return confirm('Вы действительно хотите сбросить пароль пользователя {{ $user->name }}? Новый пароль: user01236')">
                             <i class="fas fa-key me-2"></i>Сбросить пароль
                         </a>
                     </div>
                 </div>
             </div>
         </div>
     </div>
 </div>
 <!-- /Reset user password Modal -->


  <!-- Trading Progress Modal -->
  <div id="tradingProgressModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header bg-{{$bg}}">
                <h4 class="modal-title text-{{$text}}">Установить торговый сигнал</strong></h4>

            </div>
            <div class="modal-body bg-{{$bg}}">
                <form role="form" method="post" action="{{route('tradingprogress')}}">
                    <div class="form-group">
                        <h5 class=" text-{{$text}}">Торговый сигнал %</h5>
                        <input class="form-control bg-{{$bg}} text-{{$text}}" value="{{$user->progress}}" type="number" name="progress" min="0" max="100" step="0.1" required>
                        <div class="invalid-feedback">
                            Пожалуйста, введите действительное процентное значение от 0 до 100.
                        </div>
                         <small>Сила сигнала в %. Для отображения силы сигнала на панели пользователя увеличьте его значение </small>
                    </div>


                    <div class="form-group">
                        @csrf
                        <input type="hidden" name="user_id" value="{{$user->id}}">
                        <input type="submit" class="btn btn-{{$text}}" value="Обновить силу сигнала" data-bs-toggle="tooltip" title="Устанавливает силу сигнала для пользователя">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- /Trading Progress Modal password Modal -->

 <!-- Switch useraccount Modal -->
 <div id="switchuserModal" class="modal fade" role="dialog">
     <div class="modal-dialog modal-dialog-centered">
         <!-- Modal content-->
         <div class="modal-content">
             <div class="modal-header bg-info text-white">
                 <h4 class="modal-title">
                     <i class="fas fa-exchange-alt me-2"></i>Войти как {{ $user->name }}
                 </h4>
                 <button type="button" class="btn-close btn-close-white" data-dismiss="modal" aria-label="Close"></button>
             </div>
             <div class="modal-body p-4 text-center">
                 <div class="mb-4">
                     <i class="fas fa-user-circle fa-4x text-info mb-3"></i>
                     <h5 class="mb-3">Переключиться на аккаунт {{ $user->name }}?</h5>
                     <p class="text-muted mb-0">
                         Вы войдете в систему как этот пользователь. Вы можете вернуться в админ-панель в любое время.
                     </p>
                 </div>
                 <div class="row g-3">
                     <div class="col-6">
                         <button type="button" class="btn btn-secondary btn-lg w-100" data-dismiss="modal">
                             <i class="fas fa-times me-2"></i>Отмена
                         </button>
                     </div>
                     <div class="col-6">
                         <a class="btn btn-info btn-lg w-100" href="{{ url('admin/dashboard/switchuser') }}/{{ $user->id }}" onclick="return confirm('Вы уверены, что хотите войти как пользователь {{ $user->name }}? Вы можете вернуться в админ-панель в любое время.')">
                             <i class="fas fa-sign-in-alt me-2"></i>Переключиться на аккаунт пользователя
                         </a>
                     </div>
                 </div>
             </div>
         </div>
     </div>
 </div>
 <!-- /Switch user account Modal -->

 <div id="notifyuser" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header ">
                <h4 class="modal-title ">Уведомить панель {{$user->username}}</h4>
                <button type="button" class="close " data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body ">
                <p class="">Это покажет уведомление на панели {{ $user->name }}</p>
                <form style="padding:3px;" role="form" method="post" action="{{ route('notifyuser') }}">
                    @csrf
                    <div class=" form-group">
                        <label>Включить/выключить уведомление панели : {{$user->notify}}</label>
                        <select class="form-control  " name="notifystatus">

                            <option value="on">Включено</option>
                                <option value="off">Выключено</option>

                        </select>
                    </div>
                    <div class=" form-group">
                        <textarea placeholder="Напишите свое уведомление" class="form-control" name="notify" rows="8"
                            maxlength="500" required></textarea>
                        <div class="invalid-feedback">
                            Пожалуйста, введите сообщение уведомления (максимум 500 символов).
                        </div>
                    </div>
                    <div class=" form-group">
                        <input type="hidden" name="user_id" value="{{ $user->id }}">
                        <input type="submit" class="btn btn-info" value="Отправить" data-bs-toggle="tooltip" title="Отправляет уведомление на панель пользователя">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

{{-- upgrade User plan status  --}}
<div id="ugpradePlanStatus" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header ">
                <h4 class="modal-title ">Turn on/off {{$user->username}} Plan Upgrade status </h4>
                <button type="button" class="close " data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body ">
                <p class="">This will show Upgrade Plan notice on  {{ $user->name }} Dashboard</p>
                <form style="padding:3px;" role="form" method="post" action="{{ route('upgradeplanstatus') }}">
                    @csrf
                    <div class=" form-group">
                        <label>Turn on/off Plan Upgrade Status : {{$user->plan_status}}</label>
                        <select class="form-control  " name="planstatus">

                            <option value="on">On</option>
                                <option value="off">Off</option>

                        </select>
                    </div>
                    <div class=" form-group">
                        <select class="form-control  " name="user_plan">
                          @foreach($plans as $plan)
                            <option value="{{ $plan->name }}">{{ $plan->name }}</option>
                            @endforeach


                        </select>
                    </div>
                    <div class=" form-group">
                        <input type="hidden" name="user_id" value="{{ $user->id }}">
                        <input type="submit" class="btn btn-warning" value="Planı Yükselt" data-bs-toggle="tooltip" title="Kullanıcı için plan yükseltme durumunu ayarlar">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>



{{-- upgrade User Signal status  --}}
<div id="ugpradeSignalStatus" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header ">
                <h4 class="modal-title ">Turn on/off {{$user->username}} Signal Upgrade status </h4>
                <button type="button" class="close " data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body ">
                <p class="">This will show Upgrade Signal notice on  {{ $user->name }} Dashboard</p>
                <form style="padding:3px;" role="form" method="post" action="{{ route('upgradesignalstatus') }}">
                    @csrf
                    <div class=" form-group">
                        <label>Turn on/off Signal Upgrade Status : {{$user->signal_status}}</label>
                        <select class="form-control  " name="signal_status">

                            <option value="on">On</option>
                                <option value="off">Off</option>

                        </select>
                    </div>
                    <div class=" form-group">
                        <select class="form-control  " name="user_signal">
                          @foreach($signals as $signal)
                            <option value="{{ $signal->name }}">{{ $signal->name }}</option>
                            @endforeach


                        </select>
                    </div>
                    <div class=" form-group">
                        <input type="hidden" name="user_id" value="{{ $user->id }}">
                        <input type="submit" class="btn btn-info" value="Обновить сигнал" data-bs-toggle="tooltip" title="Устанавливает статус обновления сигнала для пользователя">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
 <!-- Delete user Modal -->
 <div id="deleteModal" class="modal fade" role="dialog">
     <div class="modal-dialog modal-dialog-centered">
         <!-- Modal content-->
         <div class="modal-content">
             <div class="modal-header bg-danger text-white">
                 <h4 class="modal-title">
                     <i class="fas fa-exclamation-triangle me-2"></i>Удалить аккаунт пользователя
                 </h4>
                 <button type="button" class="btn-close btn-close-white" data-dismiss="modal" aria-label="Close"></button>
             </div>
             <div class="modal-body p-4 text-center">
                 <div class="mb-4">
                     <i class="fas fa-user-times fa-4x text-danger mb-3"></i>
                     <h5 class="mb-3">Удалить аккаунт {{ $user->name }}?</h5>
                     <p class="text-muted mb-0">
                         Это действие необратимо. Все данные, связанные с этим аккаунтом, будут безвозвратно потеряны.
                     </p>
                 </div>
                 <div class="row g-3">
                     <div class="col-6">
                         <button type="button" class="btn btn-secondary btn-lg w-100" data-dismiss="modal">
                             <i class="fas fa-times me-2"></i>Отмена
                         </button>
                     </div>
                     <div class="col-6">
                         <a class="btn btn-danger btn-lg w-100" href="{{ url('admin/dashboard/delsystemuser') }}/{{ $user->id }}" onclick="return confirm('Эта операция необратима. Вы действительно хотите удалить пользователя {{ $user->name }}?')">
                             <i class="fas fa-trash me-2"></i>Да, удалить аккаунт
                         </a>
                     </div>
                 </div>
             </div>
         </div>
     </div>
 </div>
 <!-- /Delete user Modal -->
