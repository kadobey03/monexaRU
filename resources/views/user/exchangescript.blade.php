<script>
    let destinationasset = document.getElementById('destinationasset');
    let sourceasset = document.getElementById('sourceasset');
    let amount = document.getElementById('amount');
    let quatity = document.getElementById('quantity');
    // console.log(destinationasset);

    destinationasset.addEventListener('change', validate);
    sourceasset.addEventListener('change', validate);
    if (destinationasset.value == sourceasset.value) {
        $.notify({
            // options
            icon: 'flaticon-alarm-1',
            title: '',
            message: 'Исходный и целевой счета не могут быть одинаковыми',
        },{
            type: 'danger',
        });

        destinationasset.value = '';
        amount.placeholder = '';
        quatity.placeholder = '';
        amount.value = '';
        quatity.value = '';
    } else {
        amount.placeholder = `Введите количество ${sourceasset.value}`;
        quatity.placeholder = `Количество ${destinationasset.value}`;

    }
    function validate(){
        amount.value = '';
        quatity.value = '';
        if (destinationasset.value == sourceasset.value) {
            $.notify({
                // options
                icon: 'flaticon-alarm-1',
                title: '',
                message: 'Исходный и целевой счета не могут быть одинаковыми',
            },{
                type: 'danger',
            });

            destinationasset.value = '';
            amount.placeholder = '';
            quatity.placeholder = '';
            amount.value = '';
            quatity.value = '';
        } else {
            amount.placeholder = `Введите количество ${sourceasset.value}`;
            quatity.placeholder = `Количество ${destinationasset.value}`;

        }
    }

    amount.addEventListener('keyup', getQuantity);

    function getQuantity(){
        if (amount.value === '' || parseFloat(amount.value) <= 0) {
            quatity.value = '';
            document.getElementById('realquantity').value = '';
            return;
        }

        // Show loading state
        quatity.value = 'Загрузка...';

        // Set a timeout to ensure we don't get stuck in "Loading..." state
        const loadingTimeout = setTimeout(function() {
            if (quatity.value === 'Загрузка...') {
                // Use emergency fallback calculation if still loading after 5 seconds
                let sourceValue = sourceasset.value.toLowerCase();
                let destValue = destinationasset.value.toLowerCase();
                let amountValue = parseFloat(amount.value) || 0;

                // Default fallback prices
                const fallbackPrices = {
                    'btc': 45000.00,
                    'eth': 3000.00,
                    'usdt': 1.00,
                    'bnb': 300.00,
                    'ada': 0.50,
                    'xrp': 0.60,
                    'ltc': 100.00,
                    'bch': 250.00,
                    'link': 15.00,
                    'xlm': 0.10,
                    'aave': 100.00,
                    'usd': 1.00
                };

                // Calculate locally
                let result = 0;
                const sourceRate = fallbackPrices[sourceValue] || 1;
                const destRate = fallbackPrices[destValue] || 1;

                if (destValue === 'usd') {
                    result = amountValue * sourceRate;
                } else if (sourceValue === 'usd') {
                    result = amountValue / destRate;
                } else {
                    result = (amountValue * sourceRate) / destRate;
                }

                quatity.value = parseFloat(result).toFixed(8) + ' ' + destValue.toUpperCase() + ' (Аварийный резерв)';
                document.getElementById('realquantity').value = result;

                $.notify({
                    icon: 'flaticon-warning',
                    title: 'Использование аварийных курсов',
                    message: 'Ответ сервера превышен по времени. Использование локальных курсов конвертации.',
                },{
                    type: 'warning',
                    delay: 3000
                });
            }
        }, 5000);

        let uurl = "{{url('/dashboard/asset-price/')}}" + '/' + sourceasset.value  + '/' + destinationasset.value+ '/' + amount.value;
        $.ajax({
            url: uurl,
            type: 'GET',
            timeout: 15000, // 15 second timeout

            success: function(response) {
                // Clear the loading timeout since we got a response
                clearTimeout(loadingTimeout);

                if (response.status === 200) {
                    let feeInfo = '';
                    if (response.fee && response.fee_percentage) {
                        feeInfo = ` (Fee: ${response.fee_percentage}% = ${parseFloat(response.fee).toFixed(8)})`;
                    }

                    // Display price with source info
                    let priceSource = response.price_source ? ` [${response.price_source}]` : '';
                    quatity.value = parseFloat(response.data).toFixed(8) + ' ' + destinationasset.value.toUpperCase() + feeInfo;
                    document.getElementById('realquantity').value = response.data;                    // Show success notification for first successful calculation
                    if (!window.priceCalculated) {
                        $.notify({
                            icon: 'flaticon-check-1',
                            title: 'Цена обновлена',
                            message: 'Обменный курс успешно рассчитан' + priceSource,
                        },{
                            type: 'success',
                            delay: 2000
                        });
                        window.priceCalculated = true;
                    }
                } else {
                    quatity.value = '';
                    document.getElementById('realquantity').value = '';
                    $.notify({
                        icon: 'flaticon-alarm-1',
                        title: 'Ошибка цены',
                        message: response.message || 'Не удается получить обменный курс. Пожалуйста, проверьте соединение и повторите попытку.',
                    },{
                        type: 'warning',
                    });
                }
            },
            error: function(xhr) {
                // Clear the loading timeout since we got a response (even if it's an error)
                clearTimeout(loadingTimeout);
                console.error("AJAX Error:", xhr);

                // Use emergency fallback calculation
                let sourceValue = sourceasset.value.toLowerCase();
                let destValue = destinationasset.value.toLowerCase();
                let amountValue = parseFloat(amount.value) || 0;

                // Default fallback prices
                const fallbackPrices = {
                    'btc': 45000.00,
                    'eth': 3000.00,
                    'usdt': 1.00,
                    'bnb': 300.00,
                    'ada': 0.50,
                    'xrp': 0.60,
                    'ltc': 100.00,
                    'bch': 250.00,
                    'link': 15.00,
                    'xlm': 0.10,
                    'aave': 100.00,
                    'usd': 1.00
                };

                // Calculate locally
                let result = 0;
                const sourceRate = fallbackPrices[sourceValue] || 1;
                const destRate = fallbackPrices[destValue] || 1;

                if (destValue === 'usd') {
                    result = amountValue * sourceRate;
                } else if (sourceValue === 'usd') {
                    result = amountValue / destRate;
                } else {
                    result = (amountValue * sourceRate) / destRate;
                }

                quatity.value = parseFloat(result).toFixed(8) + ' ' + destValue.toUpperCase() + ' (Резерв)';
                document.getElementById('realquantity').value = result;

                let errorMessage = 'Ошибка соединения, использование резервных курсов. Обновите страницу, чтобы попробовать снова.';

                if (xhr.status === 0) {
                    errorMessage = 'Ошибка сетевого соединения. Использование резервных курсов.';
                } else if (xhr.status === 408 || xhr.statusText === 'timeout') {
                    errorMessage = 'Превышено время ожидания запроса. Использование резервных курсов.';
                } else if (xhr.responseJSON && xhr.responseJSON.message) {
                    errorMessage = xhr.responseJSON.message + ' Использование резервных курсов.';
                } else if (xhr.status === 500) {
                    errorMessage = 'Ошибка сервера. Использование резервных курсов.';
                }

                $.notify({
                    icon: 'flaticon-alarm-1',
                    title: 'Использование резервных обменных курсов',
                    message: errorMessage,
                },{
                    type: 'warning',
                });
            },

        });
    }

    document.getElementById('exchnageform').addEventListener('submit', exchangeNow)

    function exchangeNow(event) {
        event.preventDefault();

        if (amount.value === '' || parseFloat(amount.value) <= 0) {
            $.notify({
                icon: 'flaticon-alarm-1',
                title: 'Неверная сумма',
                message: 'Пожалуйста, введите действительную сумму для обмена',
            },{
                type: 'danger',
            });
            return;
        }

        if (document.getElementById('realquantity').value === '') {
            $.notify({
                icon: 'flaticon-alarm-1',
                title: 'Отсутствует котировка',
                message: 'Пожалуйста, подождите загрузки обменного курса',
            },{
                type: 'warning',
            });
            return;
        }

        // Disable submit button and show loading
        let submitBtn = document.querySelector('#exchnageform button[type="submit"]');
        let originalBtnText = submitBtn.innerHTML;
        submitBtn.disabled = true;
        submitBtn.innerHTML = 'Обработка...';

        $.ajax({
            url: "{{route('exchangenow')}}",
            type: 'POST',
            data: $('#exchnageform').serialize(),
            success: function(response) {
                if (response.status === 200) {
                    $.notify({
                        icon: 'flaticon-alarm-1',
                        title: 'Успешно',
                        message: response.success,
                    },{
                        type: 'success',
                    });

                    // Reset form
                    amount.value = '';
                    quatity.value = '';
                    document.getElementById('realquantity').value = '';

                    setTimeout(function(){ window.location.reload(true);}, 3000);

                } else {
                    $.notify({
                        icon: 'flaticon-alarm-1',
                        title: 'Обмен не удался',
                        message: response.message || 'Обмен не может быть завершен',
                    },{
                        type: 'danger',
                    });
                }
            },
            error: function(xhr) {
                let errorMessage = 'Обмен не удался. Пожалуйста, попробуйте снова.';

                if (xhr.responseJSON && xhr.responseJSON.message) {
                    errorMessage = xhr.responseJSON.message;
                } else if (xhr.status === 422 && xhr.responseJSON && xhr.responseJSON.errors) {
                    // Handle validation errors
                    let errors = Object.values(xhr.responseJSON.errors).flat();
                    errorMessage = errors.join(', ');
                }

                $.notify({
                    icon: 'flaticon-alarm-1',
                    title: 'Ошибка обмена',
                    message: errorMessage,
                },{
                    type: 'danger',
                });
            },
            complete: function() {
                // Re-enable submit button
                submitBtn.disabled = false;
                submitBtn.innerHTML = originalBtnText;
            }
        });
    };

    function getcurrbalance() {
        let usdelement = document.querySelectorAll('.usdelement');
        //console.log(usdelement);
        usdelement.forEach(element => {
            let coin = element.id;
            $.ajax({
                url: "{{url('dashboard/balances/')}}" + '/' + coin,
                type: 'GET',
                success: function(response) {
                    element.textContent  = "{{Auth::user()->currency}}" + response.data;
                },
                error: function(error) {
                    console.log(error);
                },
            });
        });
    }
    getcurrbalance();
    setTimeout(function(){getcurrbalance();}, 60000);

    // Function to refresh prices
    function refreshPrices() {
        // Show refresh notification
        $.notify({
            icon: 'flaticon-refresh-button',
            title: 'Обновление цен',
            message: 'Загрузка обменных курсов...',
        },{
            type: 'info',
            delay: 2000
        });

        // Clear any cached data
        window.priceCalculated = false;

        // Force browser to bypass cache by adding a timestamp parameter
        const timestamp = new Date().getTime();
        const refreshUrl = window.location.href.split('?')[0] + '?refresh=' + timestamp;

        // First refresh balances
        getcurrbalance();

        // If there's an amount entered, force reset it and try again
        if (amount.value && parseFloat(amount.value) > 0) {
            const currentAmount = amount.value;
            amount.value = '';
            setTimeout(() => {
                amount.value = currentAmount;
                getQuantity();
            }, 500);
        }

        // Reload the page after a short delay to ensure fresh database rates
        setTimeout(function() {
            window.location.href = refreshUrl;
        }, 3000);
    }</script>
