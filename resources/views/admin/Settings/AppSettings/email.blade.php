<div class="row">
    <div class="col-md-12">
        <h4>Конфигурация</h4>
        <hr>
    </div>
    <div class="col-md-12">
        <form action="javascript:void(0)" method="POST" id="emailform">
            @csrf
            @method('PUT')
            <div class=" form-row">
                <div class="form-group col-md-12">
                    <div class="">
                        <h5 class="">Почтовый сервер</h5>
                        <div class="selectgroup">
                            <label class="selectgroup-item">
                                <input type="radio" name="server" id="sendmailserver" value="sendmail"
                                    class="selectgroup-input" checked="">
                                <span class="selectgroup-button">Sendmail</span>
                            </label>
                            <label class="selectgroup-item">
                                <input type="radio" name="server" id="smtpserver" value="smtp"
                                    class="selectgroup-input">
                                <span class="selectgroup-button">SMTP</span>
                            </label>
                        </div>
                    </div>
                </div>
                <div class="form-group col-md-6">
                    <h5 class="">Email отправителя</h5>
                    <input type="email" name="emailfrom" class="form-control  " value="{{ $settings->emailfrom }}"
                        required>
                </div>
                <div class="form-group col-md-6">
                    <h5 class="">Имя отправителя</h5>
                    <input type="text" name="emailfromname" class="form-control  "
                        value="{{ $settings->emailfromname }}" required>
                </div>
                <div class="form-group col-md-6 smtp d-none">
                    <h5 class="">SMTP хост</h5>
                    <input type="text" name="smtp_host" class="form-control   smtpinput"
                        value="{{ $settings->smtp_host }}">
                </div>
                <div class="form-group col-md-6 smtp d-none">
                    <h5 class="">SMTP порт</h5>
                    <input type="text" name="smtp_port" class="form-control   smtpinput"
                        value="{{ $settings->smtp_port }}">
                </div>
                <div class="form-group col-md-6 smtp d-none">
                    <h5 class="">SMTP шифрование</h5>
                    <input type="text" name="smtp_encrypt" class="form-control   smtpinput"
                        value="{{ $settings->smtp_encrypt }}">
                </div>
                <div class="form-group col-md-6 smtp d-none">
                    <h5 class="">SMTP имя пользователя</h5>
                    <input type="text" name="smtp_user" class="form-control   smtpinput"
                        value="{{ $settings->smtp_user }}">
                </div>
                <div class="form-group col-md-6 smtp d-none">
                    <h5 class="">SMTP пароль</h5>
                    <input type="text" name="smtp_password" class="form-control   smtpinput"
                        value="{{ $settings->smtp_password }}">
                </div>
            </div>
            <hr>
            <div class="form-row">
                <div class="col-md-12">
                    <h4>Учетные данные Google для входа</h4>
                    <hr>
                </div>
            </div>
            <div class=" form-row">
                <div class="form-group col-md-6">
                    <h5 class="">ID клиента</h5>
                    <input type="text" name="google_id" class="form-control  " value="{{ $settings->google_id }}">
                    <small class=""> Из console.cloud.google.com</small>
                </div>
                <div class="form-group col-md-6">
                    <h5 class="">Секретный ключ клиента</h5>
                    <input type="text" name="google_secret" class="form-control  "
                        value="{{ $settings->google_secret }}">
                    <small class=""> Из console.cloud.google.com</small>
                </div>
                <div class="form-group col-md-6">
                    <h5 class="">URL перенаправления</h5>
                    <input type="text" name="google_redirect" class="form-control  "
                        value="{{ $settings->google_redirect }}">
                    <small class="">Установите это как ваш действительный URI перенаправления OAuth в console.cloud.google.com. Обязательно
                        замените 'yoursite.com' на URL вашего веб-сайта </small>
                </div>
            </div>
            <div class="mt-4 form-row">
                <div class="col-md-12">
                    <h4>Учетные данные Google Captcha</h4>
                    <hr>
                </div>
            </div>
            <div class=" form-row">
                <div class="form-group col-md-6">
                    <h5 class="">Секретный ключ Captcha</h5>
                    <input type="text" name="capt_secret" class="form-control  "
                        value="{{ $settings->capt_secret }}">
                    <small class=""> Из https://www.google.com/recaptcha/admin/create </small>
                </div>
                <div class="form-group col-md-6">
                    <h5 class="">Ключ сайта Captcha</h5>
                    <input type="text" name="capt_sitekey" class="form-control  "
                        value="{{ $settings->capt_sitekey }}">
                    <small class=""> Из https://www.google.com/recaptcha/admin/create</small>
                </div>
                <div class="form-group col-md-12">
                    <input type="submit" class="px-5 btn btn-primary btn-lg" value="Сохранить">
                </div>
            </div>
        </form>
    </div>
</div>


@if ($settings->mail_server == 'sendmail')
    <script>
        document.getElementById("sendmailserver").checked = true;
    </script>
@else
    <script>
        document.getElementById("smtpserver").checked = true;
    </script>
@endif
