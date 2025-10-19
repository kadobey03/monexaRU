<div>
    <form wire:submit.prevent='purchaseSlot'>
        @csrf
        <div class="form-group">
            <label for="">Количество слотов</label>
            <input type="number" name="numofslot" wire:keyup='calculateSlot' wire:model='slot' class="form-control"
                required>
            <small class="text-danger">{{ $message }}</small>
        </div>
        <div class="form-group">
            <label for="">С вас будет взиматься плата ($)</label>
            <input type="number" name="amount" wire:model='amount' class="form-control" readonly>
            <small>Сумма будет списана с вашего кошелька</small>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Приобрести</button>
        </div>
    </form>
</div>
