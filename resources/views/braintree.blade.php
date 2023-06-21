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
  <script src="https://js.braintreegateway.com/web/dropin/1.24.0/js/dropin.min.js"></script>

  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
<div class="py-12">
    <form id="payment-form" action="{{route('token')}}" method="post">
        @csrf
        <input type="hidden" name="totalAmount" value="{{ $data['total'] }}">
        <input type="hidden" name="donationAmount" value="{{ $data['donationAmount'] }}">
        <input type="hidden" name="charityEin" value="{{ $data['charityEin'] }}">
        <input type="hidden" name="charityName" value="{{ $data['charityName'] }}">
        <input type="hidden" name="chain" value="{{ $data['chain'] }}">
        <script src="https://js.braintreegateway.com/web/dropin/1.38.0/js/dropin.min.js"
         data-braintree-dropin-authorization="{{$data['clientToken']}}"
         data-locale="en"
         data-payment-option-priority='["paypal","card","paypalCredit","googlePay","venmo","applePay"]'
         data-paypal.flow="checkout"
         data-paypal.amount="{{ $data['total'] }}"
         data-paypal.currency="USD"
         data-paypal-credit.flow="vault"
        ></script>
        <input type="submit" value="Purchase"></input>
      </form>
</div>
</body>
</html>
