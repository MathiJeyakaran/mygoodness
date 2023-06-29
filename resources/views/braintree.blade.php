<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="initial-scale=1, width=device-width" />
    <link rel="icon" href="images/favicon.png" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta-data android:name="com.google.android.gms.wallet.api.enabled" android:value="true"/>
    <link href="https://fonts.googleapis.com/css2?family=Karla:wght@300;400;500;600;700;800&amp;display=swap"
        rel="stylesheet" />
    <title>{{ config('app.name', 'mygoodness') }}</title>
    <!--fonts-->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Barlow+Condensed:wght@300;400;500;600;700;800;900&family=Barlow:wght@100;200;300;400;500;600;700;800;900&family=Roboto+Slab:wght@300;400;500;600;700;800;900&display=swap"
        rel="stylesheet" />

    <link rel="stylesheet" type="text/css" href="https://site-assets.fontawesome.com/releases/v5.15.4/css/all.css" />
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="css/index.css" />
    <link rel="stylesheet" type="text/css" href="css/global.css" />
    <link rel="stylesheet" type="text/css" href="css/responsive.css" />
    <link rel="stylesheet" type="text/css" href="css/selectize.css" />
    <link rel="stylesheet" type="text/css" href="css/style.css" />
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/css/selectize.bootstrap3.min.css"/> -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/js/standalone/selectize.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/custom.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://js.braintreegateway.com/web/dropin/1.24.0/js/dropin.min.js"></script>
    <style>
        .selectize-contro {
            border-radius: 36px !important;
            display: inline-block;
            overflow: hidden;
            background: #cccccc;
            border: 1px solid #cccccc;
        }

        .my-account {
            text-align: right;
            float: right;
            position: relative;
            margin-top: 32px;
            font-family: var(--medium-text-xl);
            z-index: 1;
            padding-right: 20px;
            width: 150px;
            height: 35px;
            font-size: 24px;
        }

        header.container {
            padding: 0px;
            margin: 0px;
        }

        .pick-a {
            /* position: absolute; */
            font-size: 24px;
            letter-spacing: 0.01em;
            line-height: 32px;
            font-weight: 600;
            font-family: var(--title-3xl);
            color: var(--gray-900);
            display: inline-block;
            padding: 20px;
            text-align: left;
            width: 100%;
            padding-top: 0px;
            padding-bottom: 0px;
            letter-spacing: 0.01em;
        }

        .payment-inner {
            padding: 20px;
            margin-left: auto;
            margin-right: auto;
            width: 100%;
        }

        .middlebox-continue {
            width: 100%;
            float: left;
            margin: auto;
            position: relative;
            background: #FF9692;
            /* height: 100%; */
        }

        .body-bg {
            background: #FF9692;
        }

        .your-donation {
            /* top: 208px; */
            font-size: 24px;
            letter-spacing: 0.01em;
            line-height: 32px;
            font-weight: 600;
            font-family: var(--title-3xl);
            display: inline-block;
            /* width: 280px; */
            text-align: left !important;
            letter-spacing: 0.01em;
            color: #212121;
        }

        .summary12 {
            font-weight: 600;
            font-size: 18px;
            margin-bottom: 20px;
            line-height: 26px;
            font-family: Barlow;
            font-style: normal;
        }

        .rounded-start123 {
            height: 32px !important;
            border-radius: 50%;
        }

        .nonprofit-name {
            margin: 0;
            font-family: Barlow;
            font-style: normal;
            font-weight: 500;
            font-size: 20px;
            line-height: 28px;
            color: #212121;
        }

        .summary-section .donation,
        .summary-section .contribution,
        .summary-section .total {
            position: relative;
            top: 0;
            left: 0;
        }

        .summary-section .total-text,
        .summary-section .total-amount,
        .summary-section .donation-text,
        .summary-section .amount-text,
        .summary-section .contribution-text,
        .summary-section .contribution-amount {
            width: 50%;
            float: left;
            font-family: Barlow;
            font-style: normal;
            font-weight: 400;
            font-size: 18px;
            line-height: 26px;
            color: #000;
        }

        .summary-section .contribution-amount,
        .summary-section .amount-text,
        .summary-section .total-amount {
            text-align: right;
        }

        .hr-line {
            border: 1px solid #000;
            width: 100%;
            float: left;
            margin: 10px 0px;
        }
        .braintree-heading {
            display: none;
        }
    </style>


    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Barlow Condensed:wght@600&display=swap" />
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Barlow:ital,wght@0,400;0,500;0,600;1,400&display=swap" />

</head>

<body class="body-bg">
    <header>
        <div class="container" style="margin: 0px;padding: 0px;">
            <div class="col-sm-4 logohead ">
                <a href="/" class="logo">
                    <img src="images/favicon.png" class="img-fluid" style="height: 60px;" />
                </a>

                <a href="/my_account" class="my-account">
                    My Account
                </a>
            </div>
        </div>
    </header>
    <section class="middlebox-continue">
        <div class="container" style="margin: 0px;padding: 0px;">
            <div class="pick-a">Complete Payment</div>
            <img class="payment-inner" alt="" src="images/group-1855.svg">
            <div class="centerboxesform">

                <div class="col-sm-9" style="padding-bottom: 20px;">
                    <div class="card mb-3"
                        style="max-width: 540px;border: 3px solid;padding: 10px;box-shadow: 0px 6px 0px #18191F;border-radius: 16px;">
                        {{-- //styleName: title-3xl;
                        font-family: Barlow Condensed;
                        font-size: 24px;
                        font-weight: 600;
                        line-height: 32px;
                        letter-spacing: 0.01em;
                        text-align: left; --}}
                        <div class="your-donation text-center">Choose a payment method:</div>
                        <form id="payment-form" action="{{ route('token') }}" method="post">
                            @csrf
                            <input type="hidden" name="totalAmount" value="{{ $data['total'] }}">
                            <input type="hidden" name="donationAmount" value="{{ $data['donationAmount'] }}">
                            <input type="hidden" name="charityEin" value="{{ $data['charityEin'] }}">
                            <input type="hidden" name="charityName" value="{{ $data['charityName'] }}">
                            <input type="hidden" name="chain" value="{{ $data['chain'] }}">
                            <script src="https://js.braintreegateway.com/web/dropin/1.38.0/js/dropin.min.js"
                                data-braintree-dropin-authorization="{{ $data['clientToken'] }}"
                                data-locale="en"
                                data-payment-option-priority='["paypal","card", "paypalCredit"]'
                                data-paypal.flow="checkout"
                                data-paypal.amount="{{ $data['total'] }}"
                                data-paypal.currency="USD"
                                data-paypal-credit.flow="vault"></script>


                                <input type="submit" id="complete-pay123"
                        style="background-color:black;border : black;color:white;width:100%;padding : 12px 12px 12px 12px;border-radius:10px;font: 600 24px/32px
                            Barlow Condensed;margin-top: 30px;letter-spacing: 0.01em;"
                        value="Complete Payment"></input>

                        </form>
                    </div>
                    {{-- <div data-braintree-id="toggle" class="braintree-large-button braintree-toggle" tabindex="0" role="button">
                        <span>Choose another way to pay</span>
                      </div> --}}
                    <br><br><br><br>
                    {{-- <input type="submit" id="complete-pay"
                        style="background-color:black;border : black;color:white;width:100%;padding : 12px 12px 12px 12px;border-radius:10px;font: 600 24px/32px
                            Barlow Condensed;margin-top: 30px;letter-spacing: 0.01em;"
                        value="Complete Payment"></input> --}}
                </div>
            </div>
        </div>
    </section>
    <section>
        {{-- <div id="dropin-container"></div>
   <button id="submit-button">Purchase</button> --}}
    </section>
</body>

</html>
{{-- <script src="https://js.braintreegateway.com/web/dropin/1.38.1/js/dropin.min.js"></script> --}}
<script src="https://js.braintreegateway.com/web/3.94.0/js/client.min.js"></script>

<script>
//   var submitButton = document.querySelector('#submit-button');

//   braintree.dropin.create({
//     authorization: '{{ $data['clientToken'] }}',
//     selector: '#dropin-container',
//     applePay: {
//     displayName: 'Merchant Name',
//     paymentRequest: {
//       total: {
//         label: 'Localized Name',
//         amount: '10.00'
//       }
//     }
//   },
//   paypal: {
//     flow: 'checkout',
//     amount: '10.00',
//     currency: 'USD'
//   },
//  paypalCredit: {
//    flow: 'checkout',
//    amount: '10.00',
//    currency: 'USD'
//   },
//   googlePay: {
//    flow: 'checkout',
//    amount: '10.00',
//    currency: 'USD'
//   },
//   venmo: true,

//   }, function (err, dropinInstance) {
//     if (err) {
//       // Handle any errors that might've occurred when creating Drop-in
//       console.error(err);
//       return;
//     }
//     submitButton.addEventListener('click', function () {
//       dropinInstance.requestPaymentMethod(function (err, payload) {
//         if (err) {
//           // Handle errors in requesting payment method
//         }

//         // Send payload.nonce to your server
//       });
//     });
//   });


$(document).ready(function () {
    $('#payment-form .braintree-heading').text('test123')


});
$('#complete-pay').click(function () {
    $('#payment-form').submit()
})
</script>
