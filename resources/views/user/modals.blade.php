<!-- Submit MT4 MODAL modal -->
<div id="submitmt4modal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header ">
                <h4 class="modal-title ">Подписаться на торговые подписки</h4>
                <button type="button" class="close " data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body ">
                <form role="form" method="post" action="{{ route('savemt4details') }}">
                    @csrf
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label class="">Длительность подписки</label>
                            <select class="form-control  " onchange="calcAmount(this)" name="duration" class="duration"
                                id="duratn">
                                <option value="default">Выберите длительность</option>
                                <option>Ежемесячно</option>
                                <option>Ежеквартально</option>
                                <option>Ежегодно</option>
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label class="">Сумма к оплате</label>
                            <input class="form-control subamount  " type="text" id="amount" disabled><br />

                        </div>
                        <div class="form-group col-md-6">
                            <label class=" ">Логин*:</label>
                            <input class="form-control  " type="text" name="userid" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label class=" ">Пароль счета*:</label>
                            <input class="form-control  " type="text" name="pswrd" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label class=" ">Имя счета*:</label>
                            <input class="form-control  " type="text" name="name" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label class=" ">Тип счета:</label>
                            <input class="form-control  " Placeholder="Например, Стандартный" type="text" name="acntype"
                                required>
                        </div>
                        <div class="form-group col-md-6">
                            <label class=" ">Валюта*:</label>
                            <input class="form-control  " Placeholder="Например, USD" type="text" name="currency"
                                required>
                        </div>
                        <div class="form-group col-md-6">
                            <label class=" ">Кредитное плечо*:</label>
                            <input class="form-control  " Placeholder="Например, 1:500" type="text" name="leverage"
                                required>
                        </div>
                        <div class="form-group col-md-6">
                            <label class=" ">Сервер*:</label>
                            <input class="form-control  " Placeholder="Например, HantecGlobal-live" type="text"
                                name="server" required>
                        </div>
                        <div class="form-group col-12">
                            <small class="">Сумма будет списана с вашего баланса счета</small>
                        </div>
                        <div class="form-group col-md-6">
                            <input id="amountpay" type="hidden" name="amount">
                            <input type="submit" class="btn btn-primary" value="Подписаться сейчас">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- /plans Modal -->
<script type="text/javascript">
    function calcAmount(sub) {
        if (sub.value == "Ежеквартально") {
            var amount = document.getElementById('amount');
            var amountpay = document.getElementById('amountpay');
            amount.value = '<?php echo Auth::user()->currency . $settings->quarterlyfee; ?>';
            amountpay.value = '<?php echo $settings->quarterlyfee; ?>';
        }
        if (sub.value == "Ежегодно") {
            var amount = document.getElementById('amount');
            var amountpay = document.getElementById('amountpay');
            amount.value = '<?php echo Auth::user()->currency . $settings->yearlyfee; ?>';
            amountpay.value = '<?php echo $settings->yearlyfee; ?>';
        }
        if (sub.value == "Ежемесячно") {
            var amount = document.getElementById('amount');
            var amountpay = document.getElementById('amountpay');
            amount.value = '<?php echo Auth::user()->currency . $settings->monthlyfee; ?>';
            amountpay.value = '<?php echo $settings->monthlyfee; ?>';
        }
    }
</script>
