<!doctype html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>Braintree-Demo</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    {{-- <script src="https://js.braintreegateway.com/web/dropin/1.8.1/js/dropin.min.js"></script> --}}
    <script src="https://js.braintreegateway.com/web/dropin/1.38.1/js/dropin.min.js"></script>
    {{-- submit-button --}}

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body>
    <div class="py-12">
        <form id="payment-form" action="{{ route('paypay')}}" method="post">
            @csrf


            <div id="dropin-container"></div>
            <script>
                var button = document.querySelector('#submit-button');

                braintree.dropin.create({
                    authorization: '{{ $clientToken }}',
                    container: '#dropin-container',
                    locale: 'en',
                    paypal: {
                        flow: 'vault'
                    },
                    googlePay: {
                        googlePayVersion: 2,
                        merchantId: 'merchant-id-from-google',
                        transactionInfo: {
                            totalPriceStatus: 'FINAL',
                            totalPrice: '123.45',
                            currencyCode: 'USD'
                        },
                        allowedPaymentMethods: [{
                            type: 'CARD',
                            parameters: {
                                // We recommend collecting and passing billing address information with all Google Pay transactions as a best practice.
                                billingAddressRequired: false,
                            }
                        }]
                    },
                    applePay: {
                        displayName: 'My Store',
                        paymentRequest: {
                            total: {
                                label: 'My Store',
                                amount: '19.99'
                            },
                            // We recommend collecting billing address information, at minimum
                            // billing postal code, and passing that billing postal code with all
                            // Apple Pay transactions as a best practice.
                            requiredBillingContactFields: ["postalAddress"]
                        }
                    },

                }, function(createErr, instance) {
                    button.addEventListener('click', function() {
                        instance.requestPaymentMethod(function(requestPaymentMethodErr, payload) {
                            // Submit payload.nonce to your server
                        });
                    });
                });
            </script>

            <input type="submit" id="submit-button" value="Purchase"></input>
        </form>
    </div>
</body>

</html>
