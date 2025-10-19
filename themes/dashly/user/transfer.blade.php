@extends('layouts.dashly')
@section('title', $title)
@section('content')
    <div>
        <!-- Title -->
        <h1 class="h2 m-0">
            Перевод средств
        </h1>
        <p class="m-0">Вы можете отправлять деньги своим друзьям и близким, зарегистрированным на {{ $settings->site_name }}.</p>
    </div>
    <x-danger-alert />
    <x-success-alert />
    <div class="row mt-5">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-6 offset-lg-3 py-5">
                            <form method="post" action="javascript:void(0)" id="transferform">
                                @csrf
                                <div class="mb-3">
                                    <label>Email получателя или имя пользователя</label>
                                    <input type="text" name="email" class="form-control mt-2" required>
                                </div>
                                <div class="mb-3">
                                    <label>Сумма({{ $settings->currency }})</label>
                                    <input type="number" min="{{ $moresettings->min_transfer }}" name="amount"
                                        placeholder="Введите сумму, которую хотите перевести получателю"
                                        class="form-control mt-2" required>
                                </div>
                                <div class="mb-3">
                                    <h6>
                                        Комиссия за перевод:
                                        <strong class=" text-danger">{{ $moresettings->transfer_charges }}%</strong>
                                    </h6>
                                </div>
                                <input type="hidden" name="password" id="acntpass">
                                <div>
                                    <button type="reset" class="btn btn-dark">Очистить</button>
                                    <input type="submit" id="subbtn" class="py-2 btn btn-primary" value="Продолжить">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script>
        $('#transferform').on('submit', function() {
            (async () => {
                const {
                    value: password
                } = await Swal.fire({
                    title: 'Введите ваш пароль',
                    input: 'password',
                    inputLabel: 'Введите пароль вашего аккаунта для завершения перевода',
                    inputPlaceholder: 'Введите пароль аккаунта'
                })

                if (password) {

                    document.getElementById('acntpass').value = password;
                    $("#subbtn").attr("disabled", "disabled").val('Пожалуйста, подождите....');
                    $.ajax({
                        url: "{{ route('transfertouser') }}",
                        type: 'POST',
                        data: $('#transferform').serialize(),
                        success: function(response) {
                            if (response.status === 200) {
                                Swal.fire({
                                    title: 'Успешно!',
                                    text: response.message,
                                    icon: 'success',
                                    confirmButtonText: 'Отлично'
                                });
                                $("#subbtn").removeAttr("disabled").val('Proceed');
                                setTimeout(() => {
                                    let url = "{{ url('/dashboard/transfer-funds') }}";
                                    window.location.href = url;
                                }, 3000);
                            } else {
                                $("#subbtn").removeAttr("disabled").val('Proceed');
                                Swal.fire({
                                    title: 'Ошибка!',
                                    text: response.message,
                                    icon: 'error',
                                });
                            }
                        },
                        error: function(error) {
                            console.log(error);
                        },

                    });
                } else {
                    Swal.fire({
                        title: 'Ошибка!',
                        text: 'Пароль обязателен',
                        icon: 'error',
                        confirmButtonText: 'Хорошо'
                    })
                }

            })()

        });
    </script>
@endpush
