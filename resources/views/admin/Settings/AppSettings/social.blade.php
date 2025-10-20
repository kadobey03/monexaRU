<div class="row">
    <div class="col-md-12">
        <form action="" method="post">
            @csrf

            <div class=" form-row">
                <div class="form-group col-md-12">
                    <div class="">
                        <h5 class="">Выберите социальный логин для использования</h5>
                        <div class="selectgroup">
                            <label class="selectgroup-item">
                                <input type="radio" name="social" id="both" value="both"
                                    class="selectgroup-input" checked="">
                                <span class="selectgroup-button">Оба</span>
                            </label>
                            <label class="selectgroup-item">
                                <input type="radio" name="social" id="facebook" value="facebook"
                                    class="selectgroup-input">
                                <span class="selectgroup-button">Facebook</span>
                            </label>
                            <label class="selectgroup-item">
                                <input type="radio" name="social" id="google" value="google"
                                    class="selectgroup-input">
                                <span class="selectgroup-button">Google</span>
                            </label>

                        </div>
                    </div>
                </div>
                <div class="form-group col-md-6 facebook">
                    <h5 class="">ID приложения</h5>
                    <input type="email" name="site_name" class="form-control  " value="{{ $settings->site_name }}"
                        required>
                    <small> Из developer.facebook.com</small>
                </div>
                <div class="form-group col-md-6 facebook">
                    <h5 class="">Секретный ключ приложения</h5>
                    <input type="text" name="site_name" class="form-control  " value="{{ $settings->site_name }}"
                        required>
                    <small> Из developer.facebook.com</small>
                </div>
                <div class="form-group col-md-6 facebook">
                    <h5 class="">URL перенаправления</h5>
                    <input type="text" name="site_name" class="form-control  " value="{{ $settings->site_name }}"
                        required>
                    <small>Установите это как ваш действительный URI перенаправления OAuth в developers.facebook.com</small>
                </div>

                <div class="form-group col-md-12">
                    <button type="submit" class="px-4 btn btn-primary">Сохранить</button>
                </div>
            </div>
        </form>
    </div>
</div>
{{-- <script>
    let sendmail = document.querySelector('#sendmail');
    let smtp = document.querySelector('#smtp');
    let smtptext = document.querySelectorAll('.smtp');
    //console.log(sendmail);
    sendmail.addEventListener('click', sortform);
    smtp.addEventListener('click', sortform);
    
    function sortform(){
        if (sendmail.checked) {
            smtptext.forEach(element => {
                element.classList.add('d-none');
                element.removeAttribute('required','');
            });
        }
        if (smtp.checked) {
            smtptext.forEach(smtps => {
                smtps.classList.remove('d-none');
                smtps.setAttribute('required','');
            });
        }  
    }
    
</script> --}}
