<div x-data="{ saving: false }">
    <form method="POST" action="javascript:void(0)" id="updateprofileform" class="space-y-6">
        @csrf

        <!-- Profile Information Section -->
        <div class="space-y-6">
            <!-- Full Name -->
            <div class="grid grid-cols-1 md:grid-cols-4 gap-6 items-center">
                <div class="md:col-span-1">
                    <label for="fullName" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                        Полное имя
                    </label>
                    <p class="text-xs text-gray-500 dark:text-gray-400 mt-1">Ваше отображаемое имя на платформе</p>
                </div>
                <div class="md:col-span-3">
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <i data-lucide="user" class="h-5 w-5 text-gray-400"></i>
                        </div>
                        <input type="text"
                               id="fullName"
                               name="name"
                               value="{{ Auth::user()->name }}"
                               required
                               class="pl-10 block w-full rounded-xl border-gray-300 dark:border-gray-600 shadow-sm focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:text-white sm:text-sm py-4"
                        >
                    </div>
                    <p class="mt-1 text-xs text-red-600 dark:text-red-400 hidden">Пожалуйста, добавьте полное имя</p>
                </div>
            </div>

            <!-- Phone -->
            <div class="grid grid-cols-1 md:grid-cols-4 gap-6 items-center">
                <div class="md:col-span-1">
                    <label for="phone" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                        Номер телефона
                    </label>
                    <p class="text-xs text-gray-500 dark:text-gray-400 mt-1">Используется для верификации аккаунта</p>
                </div>
                <div class="md:col-span-3">
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <i data-lucide="phone" class="h-5 w-5 text-gray-400"></i>
                        </div>
                        <input type="text"
                               id="phone"
                               name="phone"
                               value="{{ Auth::user()->phone }}"
                               required
                               class="pl-10 block w-full rounded-xl border-gray-300 dark:border-gray-600 shadow-sm focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:text-white sm:text-sm py-4"
                        >
                    </div>
                </div>
            </div>

            <!-- Email -->
            <div class="grid grid-cols-1 md:grid-cols-4 gap-6 items-center">
                <div class="md:col-span-1">
                    <label for="emailAddress" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                        Адрес электронной почты
                    </label>
                    <p class="text-xs text-gray-500 dark:text-gray-400 mt-1">Ваш основной контактный email</p>
                </div>
                <div class="md:col-span-3">
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <i data-lucide="mail" class="h-5 w-5 text-gray-400"></i>
                        </div>
                        <input type="text"
                               id="emailAddress"
                               name="email"
                               value="{{ Auth::user()->email }}"
                               readonly
                               class="pl-10 block w-full rounded-xl border-gray-300 dark:border-gray-600 bg-gray-50 dark:bg-gray-600 shadow-sm focus:ring-blue-500 focus:border-blue-500 dark:text-gray-300 sm:text-sm py-4 cursor-not-allowed"
                        >
                    </div>
                    <p class="mt-2 text-xs text-gray-500 dark:text-gray-400">
                        <span class="inline-flex items-center">
                            <i data-lucide="info" class="h-3.5 w-3.5 mr-1 text-gray-400"></i>
                            Адрес электронной почты нельзя изменить
                        </span>
                    </p>
                </div>
            </div>

            <!-- Country -->
            <div class="grid grid-cols-1 md:grid-cols-4 gap-6 items-start">
                <div class="md:col-span-1">
                    <label for="country" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                        Страна
                    </label>
                    <p class="text-xs text-gray-500 dark:text-gray-400 mt-1">Ваше текущее местоположение</p>
                </div>
                <div class="md:col-span-3">
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <i data-lucide="globe" class="h-5 w-5 text-gray-400"></i>
                        </div>
                        <select
                            name="country"
                            id="country"
                            required
                            class="pl-10 pr-10 block w-full rounded-xl border-gray-300 dark:border-gray-600 shadow-sm focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:text-white sm:text-sm py-4 appearance-none"
                        >

                            <option value="{{ Auth::user()->country }}" selected disabled>{{ Auth::user()->country }}</option>

                            <option value="Afganistan">Афганистан</option>
<option value="Albania">Албания</option>
<option value="Algeria">Алжир</option>
<option value="American Samoa">Американское Самоа</option>
<option value="Andorra">Андорра</option>
<option value="Angola">Ангола</option>
<option value="Anguilla">Ангилья</option>
<option value="Antigua & Barbuda">Антигуа и Барбуда</option>
<option value="Argentina">Аргентина</option>
<option value="Armenia">Армения</option>
<option value="Aruba">Аруба</option>
<option value="Australia">Австралия</option>
<option value="Austria">Австрия</option>
<option value="Azerbaijan">Азербайджан</option>
<option value="Bahamas">Багамские острова</option>
<option value="Bahrain">Бахрейн</option>
<option value="Bangladesh">Бангладеш</option>
<option value="Barbados">Барбадос</option>
<option value="Belarus">Беларусь</option>
<option value="Belgium">Бельгия</option>
<option value="Belize">Белиз</option>
<option value="Benin">Бенин</option>
<option value="Bermuda">Бермудские острова</option>
<option value="Bhutan">Бутан</option>
<option value="Bolivia">Боливия</option>
<option value="Bonaire">Бонайре</option>
<option value="Bosnia & Herzegovina">Босния и Герцеговина</option>
<option value="Botswana">Ботсвана</option>
<option value="Brazil">Бразилия</option>
<option value="British Indian Ocean Ter">Британская территория в Индийском океане</option>
<option value="Brunei">Бруней</option>
<option value="Bulgaria">Болгария</option>
<option value="Burkina Faso">Буркина-Фасо</option>
<option value="Burundi">Бурунди</option>
<option value="Cambodia">Камбоджа</option>
<option value="Cameroon">Камерун</option>
<option value="Canada">Канада</option>
<option value="Canary Islands">Канарские острова</option>
<option value="Cape Verde">Кабо-Верде</option>
<option value="Cayman Islands">Каймановы острова</option>
<option value="Central African Republic">Центральноафриканская Республика</option>
<option value="Chad">Чад</option>
<option value="Channel Islands">Нормандские острова</option>
<option value="Chile">Чили</option>
<option value="China">Китай</option>
<option value="Christmas Island">Остров Рождества</option>
<option value="Cocos Island">Кокосовые острова</option>
<option value="Colombia">Колумбия</option>
<option value="Comoros">Коморы</option>
<option value="Congo">Конго</option>
<option value="Cook Islands">Острова Кука</option>
<option value="Costa Rica">Коста-Рика</option>
<option value="Cote DIvoire">Кот-д'Ивуар</option>
<option value="Croatia">Хорватия</option>
<option value="Cuba">Куба</option>
<option value="Curaco">Кюрасао</option>
<option value="Cyprus">Кипр</option>
<option value="Czech Republic">Чехия</option>
<option value="Denmark">Дания</option>
<option value="Djibouti">Джибути</option>
<option value="Dominica">Доминика</option>
<option value="Dominican Republic">Доминиканская Республика</option>
<option value="East Timor">Восточный Тимор</option>
<option value="Ecuador">Эквадор</option>
<option value="Egypt">Египет</option>
<option value="El Salvador">Сальвадор</option>
<option value="Equatorial Guinea">Экваториальная Гвинея</option>
<option value="Eritrea">Эритрея</option>
<option value="Estonia">Эстония</option>
<option value="Ethiopia">Эфиопия</option>
<option value="Falkland Islands">Фолклендские острова</option>
<option value="Faroe Islands">Фарерские острова</option>
<option value="Fiji">Фиджи</option>
<option value="Finland">Финляндия</option>
<option value="France">Франция</option>
<option value="French Guiana">Французская Гвиана</option>
<option value="French Polynesia">Французская Полинезия</option>
<option value="French Southern Ter">Французские Южные территории</option>
<option value="Gabon">Габон</option>
<option value="Gambia">Гамбия</option>
<option value="Georgia">Грузия</option>
<option value="Germany">Германия</option>
<option value="Ghana">Гана</option>
<option value="Gibraltar">Гибралтар</option>
<option value="Great Britain">Великобритания</option>
<option value="Greece">Греция</option>
<option value="Greenland">Гренландия</option>
<option value="Grenada">Гренада</option>
<option value="Guadeloupe">Гваделупа</option>
<option value="Guam">Гуам</option>
<option value="Guatemala">Гватемала</option>
<option value="Guinea">Гвинея</option>
<option value="Guyana">Гайана</option>
<option value="Haiti">Гаити</option>
<option value="Hawaii">Гавайи</option>
<option value="Honduras">Гондурас</option>
<option value="Hong Kong">Гонконг</option>
<option value="Hungary">Венгрия</option>
<option value="Iceland">Исландия</option>
<option value="India">Индия</option>
<option value="Indonesia">Индонезия</option>
<option value="Iran">Иран</option>
<option value="Iraq">Ирак</option>
<option value="Ireland">Ирландия</option>
<option value="Isle of Man">Остров Мэн</option>
<option value="Israel">Израиль</option>
<option value="Italy">Италия</option>
<option value="Jamaica">Ямайка</option>
<option value="Japan">Япония</option>
<option value="Jordan">Иордания</option>
<option value="Kazakhstan">Казахстан</option>
<option value="Kenya">Кения</option>
<option value="Kiribati">Кирибати</option>
<option value="Korea North">Северная Корея</option>
<option value="Korea Sout">Южная Корея</option>
<option value="Kuwait">Кувейт</option>
<option value="Kyrgyzstan">Кыргызстан</option>
<option value="Laos">Лаос</option>
<option value="Latvia">Латвия</option>
<option value="Lebanon">Ливан</option>
<option value="Lesotho">Лесото</option>
<option value="Liberia">Либерия</option>
<option value="Libya">Ливия</option>
<option value="Liechtenstein">Лихтенштейн</option>
<option value="Lithuania">Литва</option>
<option value="Luxembourg">Люксембург</option>
<option value="Macau">Макао</option>
<option value="Macedonia">Македония</option>
<option value="Madagascar">Мадагаскар</option>
<option value="Malaysia">Малайзия</option>
<option value="Malawi">Малави</option>
<option value="Maldives">Мальдивы</option>
<option value="Mali">Мали</option>
<option value="Malta">Мальта</option>
<option value="Marshall Islands">Маршалловы острова</option>
<option value="Martinique">Мартиника</option>
<option value="Mauritania">Мавритания</option>
<option value="Mauritius">Маврикий</option>
<option value="Mayotte">Майотта</option>
<option value="Mexico">Мексика</option>
<option value="Midway Islands">Острова Мидуэй</option>
<option value="Moldova">Молдова</option>
<option value="Monaco">Монако</option>
<option value="Mongolia">Монголия</option>
<option value="Montserrat">Монтсеррат</option>
<option value="Morocco">Марокко</option>
<option value="Mozambique">Мозамбик</option>
<option value="Myanmar">Мьянма</option>
<option value="Nambia">Намибия</option>
<option value="Nauru">Науру</option>
<option value="Nepal">Непал</option>
<option value="Netherland Antilles">Нидерландские Антилы</option>
<option value="Netherlands">Нидерланды</option>
<option value="Nevis">Невис</option>
<option value="New Caledonia">Новая Каледония</option>
<option value="New Zealand">Новая Зеландия</option>
<option value="Nicaragua">Никарагуа</option>
<option value="Niger">Нигер</option>
<option value="Nigeria">Нигерия</option>
<option value="Niue">Ниуэ</option>
<option value="Norfolk Island">Остров Норфолк</option>
<option value="Norway">Норвегия</option>
<option value="Oman">Оман</option>
<option value="Pakistan">Пакистан</option>
<option value="Palau Island">Остров Палау</option>
<option value="Palestine">Палестина</option>
<option value="Panama">Панама</option>
<option value="Papua New Guinea">Папуа — Новая Гвинея</option>
<option value="Paraguay">Парагвай</option>
<option value="Peru">Перу</option>
<option value="Phillipines">Филиппины</option>
<option value="Pitcairn Island">Остров Питкэрн</option>
<option value="Poland">Польша</option>
<option value="Portugal">Португалия</option>
<option value="Puerto Rico">Пуэрто-Рико</option>
<option value="Qatar">Катар</option>
<option value="Republic of Montenegro">Черногория</option>
<option value="Republic of Serbia">Сербия</option>
<option value="Reunion">Реюньон</option>
<option value="Romania">Румыния</option>
<option value="Russia">Россия</option>
<option value="Rwanda">Руанда</option>
<option value="St Barthelemy">Сен-Бартелеми</option>
<option value="St Eustatius">Синт-Эстатиус</option>
<option value="St Helena">Святой Елены остров</option>
<option value="St Kitts-Nevis">Сент-Китс и Невис</option>
<option value="St Lucia">Сент-Люсия</option>
<option value="St Maarten">Синт-Мартен</option>
<option value="St Pierre & Miquelon">Сен-Пьер и Микелон</option>
<option value="St Vincent & Grenadines">Сент-Винсент и Гренадины</option>
<option value="Saipan">Сайпан</option>
<option value="Samoa">Самоа</option>
<option value="Samoa American">Американское Самоа</option>
<option value="San Marino">Сан-Марино</option>
<option value="Sao Tome & Principe">Сан-Томе и Принсипи</option>
<option value="Saudi Arabia">Саудовская Аравия</option>
<option value="Senegal">Сенегал</option>
<option value="Serbia">Сербия</option>
<option value="Seychelles">Сейшелы</option>
<option value="Sierra Leone">Сьерра-Леоне</option>
<option value="Singapore">Сингапур</option>
<option value="Slovakia">Словакия</option>
<option value="Slovenia">Словения</option>
<option value="Solomon Islands">Соломоновы острова</option>
<option value="Somalia">Сомали</option>
<option value="South Africa">Южная Африка</option>
<option value="Spain">Испания</option>
<option value="Sri Lanka">Шри-Ланка</option>
<option value="Sudan">Судан</option>
<option value="Suriname">Суринам</option>
<option value="Swaziland">Эсватини</option>
<option value="Sweden">Швеция</option>
<option value="Switzerland">Швейцария</option>
<option value="Syria">Сирия</option>
<option value="Tahiti">Таити</option>
<option value="Taiwan">Тайвань</option>
<option value="Tajikistan">Таджикистан</option>
<option value="Tanzania">Танзания</option>
<option value="Thailand">Таиланд</option>
<option value="Togo">Того</option>
<option value="Tokelau">Токелау</option>
<option value="Tonga">Тонга</option>
<option value="Trinidad & Tobago">Тринидад и Тобаго</option>
<option value="Tunisia">Тунис</option>
<option value="Turkey">Турция</option>
<option value="Turkmenistan">Туркменистан</option>
<option value="Turks & Caicos Is">Острова Теркс и Кайкос</option>
<option value="Tuvalu">Тувалу</option>
<option value="Uganda">Уганда</option>
<option value="Ukraine">Украина</option>
<option value="United Arab Erimates">Объединенные Арабские Эмираты</option>
<option value="United Kingdom">Великобритания</option>
<option value="United States of America">Соединенные Штаты Америки</option>
<option value="Uraguay">Уругвай</option>
<option value="Uzbekistan">Узбекистан</option>
<option value="Vanuatu">Вануату</option>
<option value="Vatican City State">Ватикан</option>
<option value="Venezuela">Венесуэла</option>
<option value="Vietnam">Вьетнам</option>
<option value="Virgin Islands (Brit)">Британские Виргинские острова</option>
<option value="Virgin Islands (USA)">Виргинские острова США</option>
<option value="Wake Island">Остров Уэйк</option>
<option value="Wallis & Futana Is">Уоллис и Футуна</option>
<option value="Yemen">Йемен</option>
<option value="Zaire">Заир</option>
<option value="Zambia">Замбия</option>
                            <option value="Zimbabwe">Зимбабве</option>
                        </select>
                        <div class="absolute inset-y-0 right-0 flex items-center px-2 pointer-events-none">
                            <i data-lucide="chevron-down" class="h-5 w-5 text-gray-400"></i>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Username -->
            <div class="grid grid-cols-1 md:grid-cols-4 gap-6 items-center">
                <div class="md:col-span-1">
                    <label for="username" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                        Имя пользователя
                    </label>
                    <p class="text-xs text-gray-500 dark:text-gray-400 mt-1">Ваш уникальный идентификатор</p>
                </div>
                <div class="md:col-span-3">
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <i data-lucide="at-sign" class="h-5 w-5 text-gray-400"></i>
                        </div>
                        <input type="text"
                               id="username"
                               name="username"
                               value="{{ Auth::user()->username }}"
                               readonly
                               class="pl-10 block w-full rounded-xl border-gray-300 dark:border-gray-600 bg-gray-50 dark:bg-gray-600 shadow-sm focus:ring-blue-500 focus:border-blue-500 dark:text-gray-300 sm:text-sm py-4 cursor-not-allowed"
                        >
                    </div>
                    <p class="mt-2 text-xs text-gray-500 dark:text-gray-400">
                        <span class="inline-flex items-center">
                            <i data-lucide="lock" class="h-3.5 w-3.5 mr-1 text-gray-400"></i>
                            Имя пользователя нельзя изменить
                        </span>
                    </p>
                </div>
            </div>

            <!-- Submit Button -->
            <div class="pt-5 border-t border-gray-200 dark:border-gray-700">
                <div class="flex justify-end">
                    <button
                        type="submit"
                        class="inline-flex items-center px-6 py-4 border border-transparent rounded-xl shadow-sm text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-colors duration-200"
                        x-on:click="saving = true"
                        x-bind:disabled="saving"
                    >
                        <span x-show="!saving">
                            <i data-lucide="save" class="mr-2 h-5 w-5"></i>
                            Сохранить изменения
                        </span>
                        <span x-show="saving" style="display: none;">
                            <svg class="animate-spin -ml-1 mr-2 h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                            </svg>
                            Обработка...
                        </span>
                    </button>
                </div>
            </div>
        </div>
    </form>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Initialize Lucide icons if available
        if (typeof lucide !== 'undefined') {
            lucide.createIcons();
        }

        document.getElementById('updateprofileform').addEventListener('submit', function() {
            const profileApp = Alpine.data('{ saving: true }');

            $.ajax({
                url: "{{ route('profile.update') }}",
                type: 'POST',
                data: $('#updateprofileform').serialize(),
                success: function(response) {
                    if (response.status === 200) {
                        // Show success notification with modern styling
                        const toast = document.createElement('div');
                        toast.className = 'fixed top-4 right-4 bg-green-50 dark:bg-green-900/30 border-l-4 border-green-500 text-green-700 dark:text-green-400 p-4 rounded-lg shadow-lg transform transition-all duration-300 ease-out z-50 flex items-start max-w-sm';
                        toast.innerHTML = `
                            <div class="flex-shrink-0">
                                <svg class="h-5 w-5 text-green-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                                </svg>
                            </div>
                            <div class="ml-3">
                                <p class="text-sm font-medium">${response.success}</p>
                            </div>
                            <div class="ml-auto pl-3">
                                <div class="-mx-1.5 -my-1.5">
                                    <button type="button" class="inline-flex rounded-md p-1.5 text-green-500 hover:bg-green-100 dark:hover:bg-green-800 focus:outline-none">
                                        <span class="sr-only">Dismiss</span>
                                        <svg class="h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                            <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        `;

                        document.body.appendChild(toast);

                        // Add entrance animation
                        setTimeout(() => {
                            toast.classList.add('translate-y-2');
                        }, 10);

                        // Remove the notification after 5 seconds
                        setTimeout(() => {
                            toast.classList.remove('translate-y-2');
                            toast.classList.add('-translate-y-2', 'opacity-0');
                            setTimeout(() => {
                                toast.remove();
                            }, 300);
                        }, 5000);

                        // Add click listener to dismiss button
                        toast.querySelector('button').addEventListener('click', function() {
                            toast.classList.remove('translate-y-2');
                            toast.classList.add('-translate-y-2', 'opacity-0');
                            setTimeout(() => {
                                toast.remove();
                            }, 300);
                        });
                    }

                    // Reset the saving state after 1 second
                    setTimeout(() => {
                        Alpine.store('saving', false);
                    }, 1000);
                },
                error: function(data) {
                    console.log(data);

                    // Reset the saving state
                    Alpine.store('saving', false);

                    // Show error notification
                    const toast = document.createElement('div');
                    toast.className = 'fixed top-4 right-4 bg-red-50 dark:bg-red-900/30 border-l-4 border-red-500 text-red-700 dark:text-red-400 p-4 rounded-lg shadow-lg transform transition-all duration-300 ease-out z-50 flex items-start max-w-sm';
                    toast.innerHTML = `
                        <div class="flex-shrink-0">
                            <svg class="h-5 w-5 text-red-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd" />
                            </svg>
                        </div>
                        <div class="ml-3">
                            <p class="text-sm font-medium">Не удалось обновить профиль. Пожалуйста, попробуйте еще раз.</p>
                        </div>
                        <div class="ml-auto pl-3">
                            <div class="-mx-1.5 -my-1.5">
                                <button type="button" class="inline-flex rounded-md p-1.5 text-red-500 hover:bg-red-100 dark:hover:bg-red-800 focus:outline-none">
                                    <span class="sr-only">Dismiss</span>
                                    <svg class="h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                        <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                    `;

                    document.body.appendChild(toast);

                    // Add entrance animation
                    setTimeout(() => {
                        toast.classList.add('translate-y-2');
                    }, 10);

                    // Remove the notification after 5 seconds
                    setTimeout(() => {
                        toast.classList.remove('translate-y-2');
                        toast.classList.add('-translate-y-2', 'opacity-0');
                        setTimeout(() => {
                            toast.remove();
                        }, 300);
                    }, 5000);
                }
            });
        });
    });
</script>