<div class="row">
    <div class="col-12">
        <form method="post" action="{{ route('updatewebinfo') }}" id="appinfoform" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class=" form-row">
                <div class="form-group col-md-6">
                    <h5 class="text-{{ $text }}">Название веб-сайта</h5>
                    <input type="text" name="site_name" class="form-control " value="{{ $settings->site_name }}"
                        required>
                </div>
                <div class="form-group col-md-6">
                    <h5 class="text-{{ $text }}">Заголовок веб-сайта</h5>
                    <input type="text" name="site_title" class="form-control " value="{{ $settings->site_title }}"
                        required>
                </div>
                <div class="form-group col-md-6">
                    <h5 class="text-{{ $text }}">Ключевые слова веб-сайта</h5>
                    <input type="text" name="keywords" class="form-control " value="{{ $settings->keywords }}"
                        required>
                </div>
                <div class="form-group col-md-6">
                    <h5 class="text-{{ $text }}">URL веб-сайта (https://yoursite.com)</h5>
                    <input type="text" placeholder="https://yoursite.com" name="site_address" class="form-control "
                        value="{{ $settings->site_address }}" required>
                </div>
                <div class="form-group col-md-12">
                    <h5 class="text-{{ $text }}">Описание веб-сайта</h5>
                    <textarea name="description" class="form-control " rows="4">{{ $settings->description }}</textarea>
                </div>
            </div>

            <div class=" form-row">
                <div class="form-group col-md-12">
                    <h5 class="text-{{ $text }}">Объявление</h5>
                    <textarea name="update" class="form-control " rows="2">{{ $settings->newupdate }}</textarea>
                </div>
                <div class="form-group col-md-6">
                    <h5 class="text-{{ $text }}">Приветственные сообщения для новых зарегистрированных пользователей</h5>
                    <textarea name="welcome_message" class="form-control " rows="2">{{ $settings->welcome_message }}</textarea>
                    <small class="text-{{ $text }}">Это сообщение будет отображаться для пользователей, чья дата регистрации
                        составляет менее или равна 3 дням</small>
                </div>
                <div class="form-group col-md-6">
                    <h5 class="text-{{ $text }}">Номер WhatsApp</h5>
                    <input name="whatsapp" class="form-control " type="text"
                        value="{{ $settings->whatsapp }}">
                </div>
                 <div class="form-group col-md-6">
                    <h5 class="text-{{ $text }}">ID Tido livechat</h5>
                    <input name="tido" class="form-control " type="text"
                        value="{{ $settings->tido }}">
                </div>
                <div class="form-group col-md-6">
                    <h5 class="text-{{ $text }}">Год основания</h5>
                    <input name="twak" class="form-control " type="text"
                        value="{{ $settings->twak }}" placeholder='Год основания сайта'>
                </div>

                <!--<div class="form-group col-md-6">-->
                <!--    <h5 class="text-{{ $text }}">Personal Access Token</h5>-->
                <!--    <input name="merchant_key" class="form-control " type="text"-->
                <!--        value="{{ $settings->merchant_key }}">-->
                <!--</div>-->
                 <div class="form-group col-md-6">
                   <h5 class="">Процент выигрыша в торговле %</h5>
                    <input type="number" class="form-control " name="trading_winrate"
                        placeholder="например 75%" value="{{ $settings->trading_winrate }}">
                    <small>Если вы хотите установить процент выигрыша в торговле по умолчанию для пользователей, введите процент здесь. (Процент выигрыша в торговле определяет
                        коэффициент выигрыша вашего клиента при торговле. Чем выше процент выигрыша, тем более прибыльной будет торговля для вашего клиента, а более низкий процент дает больше убытков.) Диапазон от 1 до 100</small>

                </div>
                <div class="form-group col-md-6">
                    <h5 class="text-{{ $text }}">Часовой пояс</h5>
                    <select name="timezone" class="form-control  select2">
                        <option>{{ $settings->timezone }}</option>
                        @foreach ($timezones as $list)
                            <option value="{{ $list }}">{{ $list }}</option>
                        @endforeach
                    </select>
                    <div class="mt-4">
                        <h5 class="text-{{ $text }}">Тип установки</h5>
                        <select name="install_type" class="form-control ">
                            <option>{{ $settings->install_type }}</option>
                            <option>Основной домен</option>
                            <option>Поддомен</option>
                            <option>Подпапка</option>
                        </select>
                    </div>

                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <h5 class="text-{{ $text }}">Логотип (Рекомендуемый размер; максимальная ширина 200px и максимальная высота
                        100px.)</h5>
                    <input name="logo" class="form-control " type="file">
                    <div class="text-center border p-2 mt-2 rounded-none">
                        <img src="{{ asset('storage/app/public/' . $settings->logo) }}" alt=""
                            class="w-25 img-fluid">
                    </div>
                </div>
                <div class="form-group col-md-6">
                    <h5 class="text-{{ $text }}">Фавикон (Рекомендуемый размер: максимальная ширина 32px и максимальная
                        высота 32px.)</h5>
                    <input name="favicon" class="form-control " type="file">
                    <div class="text-center border p-2 mt-2 rounded-none">
                        <img src="{{ asset('storage/app/public/' . $settings->favicon) }}" alt=""
                            class="w-25 img-fluid">
                    </div>
                </div>
            </div>

            <div class="mt-3 form-row">
                <div class="col-12">
                    <input type="submit" class="px-5 btn btn-primary btn-lg" value="Обновить">
                </div>

            </div>

        </form>
    </div>
</div>
