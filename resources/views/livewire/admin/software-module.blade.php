<div>
    <div class="row">
        <div class="col-12">

            <h3 class="text-info">Этот раздел описывает, как вы хотите использовать скрипт Pro Remedy Investment.</h3>
            <form action="">
                <div class="row">
                    <div class="mt-4 col-md-6">

                        <h5 class="">Инвестиции:</h5>
                        <div class="selectgroup">
                            <label class="selectgroup-item">
                                <input type="radio" class="selectgroup-input" name="investment"
                                    wire:click="updateModule('investment','true')"
                                    {{ $mod['investment'] == 'true' ? 'checked' : '' }}>
                                <span class="selectgroup-button">Включено</span>
                            </label>
                            <label class="selectgroup-item">
                                <input type="radio" class="selectgroup-input" name="investment"
                                    wire:click="updateModule('investment','false')"
                                    {{ $mod['investment'] == 'false' ? '' : 'checked' }}>
                                <span class="selectgroup-button">Отключено</span>
                            </label>
                        </div>
                        <div class="mt-2 pr-3">
                            <small class="">Все функции, связанные с инвестициями пользователей, будут
                                отображаться в панели пользователя (покупка плана и получение прибыли и т.д.).</small>
                        </div>
                    </div>

                    <div class="mt-4 col-md-6">
                        <h5 class="">Crypto Swap:</h5>
                        <div class="selectgroup">
                            <label class="selectgroup-item">
                                <input type="radio" class="selectgroup-input" name="cryptoswap"
                                    wire:click="updateModule('cryptoswap','true')"
                                    {{ $mod['cryptoswap'] ? 'checked' : '' }}>
                                <span class="selectgroup-button">Включено</span>
                            </label>
                            <label class="selectgroup-item">
                                <input type="radio" class="selectgroup-input" name="cryptoswap"
                                    wire:click="updateModule('cryptoswap','false')"
                                    {{ $mod['cryptoswap'] ? '' : 'checked' }}>
                                <span class="selectgroup-button">Disabled</span>
                            </label>
                        </div>
                        <div class="mt-2">
                            <small class="">Если включено, система отобразит все
                                функции криптообмена в панели пользователя.</small>
                        </div>
                    </div>


                    
                </div>
            </form>
        </div>
    </div>
</div>
