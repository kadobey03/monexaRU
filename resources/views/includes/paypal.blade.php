@if(!empty($settings->pp_ci) && $settings->pp_ci !== 'iidjdjdj')
<div id="paypal-button-container"></div>
<script
    src=" https://www.paypal.com/sdk/js?client-id={{ $settings->pp_ci }}&currency={{ strtoupper($settings->s_currency) }}">
</script>
<script>
    paypal.Buttons({
        createOrder: function(data, actions) {
            return actions.order.create({
                purchase_units: [{
                    amount: {
                        value: {{ $amount }}
                    }
                }]
            });
        },
        onApprove: function(data, actions) {
            return actions.order.capture().then(function(details) {
                alert('İşlem ' + details.payer.name.given_name + ' tarafından tamamlandı');
                // Call your server to save the transaction
                return fetch("dashboard/paypalverify/{{ $amount }}", {
                    method: 'post',
                    headers: {
                        'content-type': 'application/json',
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    body: JSON.stringify({
                        orderID: data.orderID
                    })
                });
            });
        }
    }).render('#paypal-button-container');
</script>
@endif
