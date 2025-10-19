<div>
    @if ($hasSubscribe)
        <div class="row">
            <div class="col-12 text-center">
                <i class="fas fa-check-circle fa-4x text-success"></i>
                <div>
                    <div class="input-group my-2">
                        <input type="text" class="form-control" wire:model='inviteLink' readonly>
                    </div>
                    <small>
                        Скопируйте и используйте вашу ссылку-приглашение. Вы можете использовать ссылку-приглашение только один раз, и она
                        будет недоступна после обновления страницы.
                    </small>
                </div>
            </div>
        </div>
    @else
        <form action="" wire:submit.prevent='subscribe'>
            <div class="form-group mb-2 text-left">
                <label for="">Выберите длительность</label>
                <select name="" id="" class="form-control" wire:model='duration'
                    wire:change='calculate'>
                    <option value="Choose">Выберите длительность</option>
                    <option value="Monthly">Ежемесячно</option>
                    <option value="Quarterly">Ежеквартально</option>
                    <option value="Yearly">Ежегодно</option>
                </select>
            </div>
            <div class="form-group mb-2 text-left">
                <label for="">Amount ({{ $settings->currency }})</label>
                <input type="number" wire:model='amount' class="form-control" id="" readonly>
                <small>Amount will be deducted from your account balance.</small>
            </div>
            <div class="form-group mb-2 text-left">
                <button class="btn btn-primary">Subscribe</button>
            </div>
        </form>
    @endif

</div>
