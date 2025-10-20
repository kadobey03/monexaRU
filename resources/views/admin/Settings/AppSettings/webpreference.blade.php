<div class="row">
    <div class="col-12">
        <form method="post" action="javascript:void(0)" id="updatepreference">
            @csrf
            @method('PUT')
            <div class="form-row">
                <div class="form-group col-md-6">
                    <h5 class="">Контактная электронная почта</h5>
                    <input type="text" class="form-control  " name="contact_email"
                        value="{{ $settings->contact_email }}" required>
                </div>

                <input name="s_currency" value="{{ $settings->s_currency }}" id="s_c" type="hidden">
                <div class="form-group col-md-6">
                    <h5 class="">Валюта веб-сайта</h5>
                    <select name="currency" id="select_c" class="form-control   select2" onchange="changecurr()"
                        style="width: 100%">
                        <option value="<?php echo htmlentities($settings->currency); ?>">{{ $settings->currency }}</option>
                        @foreach ($currencies as $key => $currency)
                            <option id="{{ $key }}" value="<?php echo html_entity_decode($currency); ?>">
                                {{ $key . ' (' . html_entity_decode($currency) . ')' }}</option>
                        @endforeach
                    </select>

                </div>
                <input type="hidden" value="{{ $settings->site_preference }}" name="site_preference">
                <div class="form-group col-md-6">
                    <h5 class="">URL главной страницы (Перенаправление)</h5>
                    <input type="text" class="form-control " name="redirect_url"
                        placeholder="eg https://myhomepage.com" value="{{ $settings->redirect_url }}">
                    <small>Если вы используете кастомную главную страницу и хотите, чтобы все запросы перенаправлялись на эту страницу, введите URL здесь. Если оставить пустым, система будет использовать нашу главную страницу/веб-страницы по умолчанию</small>
                </div>
            </div>

            <div class="mt-3 row">
                <div class="mt-4 col-md-6">
                    <h5 class="">Объявление:</h5>
                    <div class="selectgroup">
                        <label class="selectgroup-item">
                            <input type="radio" name="annouc" value="on" class="selectgroup-input"
                                {{ $settings->enable_annoc == 'on' ? 'checked' : '' }}>
                            <span class="selectgroup-button">Включено</span>
                        </label>
                        <label class="selectgroup-item">
                            <input type="radio" name="annouc" value="off" class="selectgroup-input"
                                {{ $settings->enable_annoc != 'on' ? 'checked' : '' }}>
                            <span class="selectgroup-button">Отключено</span>
                        </label>
                    </div>
                </div>
                <div class="mt-4 col-md-6">
                    <h5 class="">Торговля на выходных:</h5>
                    <div class="selectgroup">
                        <label class="selectgroup-item">
                            <input type="radio" name="weekend_trade" value="on" class="selectgroup-input"
                                {{ $settings->weekend_trade == 'on' ? 'checked' : '' }}>
                            <span class="selectgroup-button">Включено</span>
                        </label>
                        <label class="selectgroup-item">
                            <input type="radio" name="weekend_trade"
                                {{ $settings->weekend_trade != 'on' ? 'checked' : '' }} value="off"
                                class="selectgroup-input">
                            <span class="selectgroup-button">Отключено</span>
                        </label>
                    </div>
                    <div>
                        <small class="">если выключена, пользователи не будут получать ROI на выходных</small>
                    </div>
                </div>

                <div class="mt-4 col-md-6">
                    <h5 class="">Вывод средств</h5>
                    <div class="selectgroup">
                        <label class="selectgroup-item">
                            <input type="radio" name="withdraw" id="withdraw" value="true"
                                class="selectgroup-input" {{ $settings->enable_with == 'true' ? 'checked' : '' }}>
                            <span class="selectgroup-button">Включить</span>
                        </label>
                        <label class="selectgroup-item">
                            <input type="radio" name="withdraw"
                                {{ $settings->enable_with != 'true' ? 'checked' : '' }}value="false"
                                class="selectgroup-input">
                            <span class="selectgroup-button">Отключить</span>
                        </label>
                    </div>
                    <div>
                        <small class="">если отключено, пользователи не смогут отправлять запросы на вывод средств</small>
                    </div>

                </div>

                <div class="mt-4 col-md-6">
                    <h5 class="">Google ReCaptcha:</h5>
                    <div class="selectgroup">
                        <label class="selectgroup-item">
                            <input type="radio" name="captcha" value="true" class="selectgroup-input"
                                {{ $settings->captcha == 'true' ? 'checked' : '' }}>
                            <span class="selectgroup-button">Включено</span>
                        </label>
                        <label class="selectgroup-item">
                            <input type="radio" name="captcha" {{ $settings->captcha != 'true' ? 'checked' : '' }}
                                value="false" class="selectgroup-input">
                            <span class="selectgroup-button">Отключено</span>
                        </label>
                    </div>
                    <div>
                        <small class="">если включена, пользователи должны будут пройти тест Google reCaptcha при регистрации. Также перед использованием посмотрите, как установить Google reCaptcha на вашем веб-сайте. <a
                                href="https://doc.onlinetrade.brynamics.xyz/details/how-to-add-google-recaptcha-"
                                target="_blank">Как это сделать</a></small>
                    </div>

                </div>

                <div class="mt-4 col-md-6">
                    <h5 class="">Перевод</h5>
                    <div class="selectgroup">
                        <label class="selectgroup-item">
                            <input type="radio" name="googlet" id="googlet" value="on"
                                class="selectgroup-input" {{ $settings->google_translate == 'on' ? 'checked' : '' }}>
                            <span class="selectgroup-button">Включено</span>
                        </label>
                        <label class="selectgroup-item">
                            <input type="radio" name="googlet"
                                {{ $settings->google_translate != 'on' ? 'checked' : '' }} value="off"
                                class="selectgroup-input">
                            <span class="selectgroup-button">Отключено</span>
                        </label>
                    </div>
                    <div>
                        <small class="">если включен, пользователи смогут выбирать предпочитаемый язык через Google Translate</small>
                    </div>
                </div>

                <div class="mt-4 col-md-6">
                    <h5 class="">Режим торговли</h5>
                    <div class="selectgroup">
                        <label class="selectgroup-item">
                            <input type="radio" name="trade_mode" value="on" class="selectgroup-input"
                                {{ $settings->trade_mode == 'on' ? 'checked' : '' }}>
                            <span class="selectgroup-button">Включено</span>
                        </label>
                        <label class="selectgroup-item">
                            <input type="radio" name="trade_mode"
                                {{ $settings->trade_mode != 'on' ? 'checked' : '' }} value="off"
                                class="selectgroup-input">
                            <span class="selectgroup-button">Отключено</span>
                        </label>
                    </div>
                    <div>
                        <small class="">если выключен, пользователи вообще не будут получать ROI.</small>
                    </div>
                </div>

                <div class="mt-4 col-md-6">
                    <h5 class="">KYC (Верификация)</h5>
                    <div class="selectgroup">
                        <label class="selectgroup-item">
                            <input type="radio" name="enable_kyc" value="yes" class="selectgroup-input"
                                {{ $settings->enable_kyc == 'yes' ? 'checked' : '' }}>
                            <span class="selectgroup-button">Включено</span>
                        </label>
                        <label class="selectgroup-item">
                            <input type="radio" name="enable_kyc"
                                {{ $settings->enable_kyc != 'yes' ? 'checked' : '' }} value="no"
                                class="selectgroup-input">
                            <span class="selectgroup-button">Отключено</span>
                        </label>
                    </div>
                    <div>
                        <small class="">если включена, пользователи должны будут отправить необходимые документы перед отправкой запроса на вывод средств.</small>
                    </div>
                </div>

                <div class="mt-4 col-md-6">
                    <h5 class="">KYC (Верификация) при регистрации</h5>
                    <div class="selectgroup">
                        <label class="selectgroup-item">
                            <input type="radio" name="enable_kyc_registration" value="yes"
                                class="selectgroup-input"
                                {{ $settings->enable_kyc_registration == 'yes' ? 'checked' : '' }}>
                            <span class="selectgroup-button">Включено</span>
                        </label>
                        <label class="selectgroup-item">
                            <input type="radio" name="enable_kyc_registration"
                                {{ $settings->enable_kyc_registration != 'yes' ? 'checked' : '' }} value="no"
                                class="selectgroup-input">
                            <span class="selectgroup-button">Отключено</span>
                        </label>
                    </div>
                    <div>
                        <small class="">если включена, пользователи должны будут пройти процесс верификации при регистрации и им не будет разрешено выполнять никаких операций в вашей системе, пока они не будут подтверждены администратором. Помните, что это повлияет на пользователей, которые не завершили свою текущую KYC. <strong>После отправки заявки вам придется подтвердить пользователя самостоятельно, прежде чем продолжить.</strong>
                        </small>
                    </div>
                </div>

                <div class="mt-4 col-md-6">
                    <h5 class="">Вход через Google</h5>
                    <div class="selectgroup">
                        <label class="selectgroup-item">
                            <input type="radio" name="social" id="social" value="yes"
                                class="selectgroup-input"
                                {{ $settings->enable_social_login == 'yes' ? 'checked' : '' }}>
                            <span class="selectgroup-button">Включено</span>
                        </label>
                        <label class="selectgroup-item">
                            <input type="radio" name="social"
                                {{ $settings->enable_social_login != 'yes' ? 'checked' : '' }} value="no"
                                class="selectgroup-input">
                            <span class="selectgroup-button">Отключено</span>
                        </label>
                    </div>
                    <div>
                        <small class="">Вход через Google позволяет пользователям входить/регистрироваться с помощью своих аккаунтов Google</small>
                    </div>
                </div>

                <div class="mt-4 col-md-6">
                    <h5 class="">Подтверждение электронной почты</h5>
                    <div class="selectgroup">
                        <label class="selectgroup-item">
                            <input type="radio" name="enail_verify" value="true" class="selectgroup-input"
                                {{ $settings->enable_verification == 'true' ? 'checked' : '' }}>
                            <span class="selectgroup-button">Включить</span>
                        </label>
                        <label class="selectgroup-item">
                            <input type="radio" name="enail_verify"
                                {{ $settings->enable_verification != 'true' ? 'checked' : '' }} value="false"
                                class="selectgroup-input">
                            <span class="selectgroup-button">Отключить</span>
                        </label>
                    </div>
                    <div>
                        <small class="">Если подтверждение электронной почты отключено, пользователям не будет предлагаться подтверждать свои адреса электронной почты.</small>
                    </div>
                </div>
                <div class="mt-4 col-md-6">
                    <h5 class="">Возврат капитала</h5>
                    <div class="selectgroup">
                        <label class="selectgroup-item">
                            <input type="radio" name="return_capital" value="true" class="selectgroup-input"
                                {{ $settings->return_capital ? 'checked' : '' }}>
                            <span class="selectgroup-button">Да</span>
                        </label>
                        <label class="selectgroup-item">
                            <input type="radio" name="return_capital"
                                {{ !$settings->return_capital ? 'checked' : '' }} value="false"
                                class="selectgroup-input">
                            <span class="selectgroup-button">Нет</span>
                        </label>
                    </div>
                    <div>
                        <small class="">Если возврат капитала Нет, система не будет кредитовать пользователю его капитал после окончания срока инвестиционного плана</small>
                    </div>
                </div>
                <div class="mt-4 col-md-6">
                    <h5 class="">Отмена плана</h5>
                    <div class="selectgroup">
                        <label class="selectgroup-item">
                            <input type="radio" name="should_cancel_plan" value="1" class="selectgroup-input"
                                {{ $settings->should_cancel_plan ? 'checked' : '' }}>
                            <span class="selectgroup-button">Включено</span>
                        </label>
                        <label class="selectgroup-item">
                            <input type="radio" name="should_cancel_plan"
                                {{ !$settings->should_cancel_plan ? 'checked' : '' }} value="0"
                                class="selectgroup-input">
                            <span class="selectgroup-button">Отключено</span>
                        </label>
                    </div>
                    <div>
                        <small class="">Включите, если хотите, чтобы пользователи могли отменять свои активные инвестиционные планы. Помните, что когда они отменяют свои планы, капитал будет возвращен на аккаунт пользователя.</small>
                    </div>
                </div>
            </div>
            <div class="mt-4">
                <input type="submit" class="px-5 btn btn-primary btn-lg" value="Сохранить">
            </div>
        </form>
    </div>
</div>
