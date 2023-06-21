<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="initial-scale=1, width=device-width" />
    <link rel="icon" href="images/favicon.png" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
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
                        <div class="your-donation text-center">Your Donation will be sent to:</div>
                        <div class="row g-0">
                            <div class="col-sm-4">
                            </div>
                            <div class="col-sm-8">
                                <div class="card-body">
                                    <div>
                                        <div style="width: 30%;float: left;/*! height: 100px; */">
                                            <img style="height: 100px;" src="{{ $data['charity_logo'] }}"
                                                class="img-fluid rounded-start" alt="{{ $data['charity_name'] }}">
                                        </div>
                                        <div
                                            style="width: 70%;float: left;padding: 10px;text-align: left;font-weight: 500;font-size: 20px;">
                                            <p class="nonprofit-name">{{ $data['charity_name'] }}</p>
                                            <p class="nonprofit-name">{{ $data['ein'] }}</p>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="col-sm-12 pb-2">
                                <p class="card-text"
                                    style="font-style: italic;text-align: left;font-weight: 400;font-size: 16px;line-height: 26px;">
                                    ...not the right place? <a href="/">go back</a> </p>
                            </div>
                        </div>
                    </div>
                </div>


            </div>



        </div>
    </section>
    <section class="pt-2 summary-section">
        <div class="container" style="padding: 30px;">
            <div class="col-md-9">
                <div class="summary12">Summary
                    <span data-toggle="modal" data-target=".bs-example-modal-lg">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                            fill="currentColor" class="bi bi-exclamation-circle-fill" viewBox="0 0 16 16">
                            <path
                                d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8 4a.905.905 0 0 0-.9.995l.35 3.507a.552.552 0 0 0 1.1 0l.35-3.507A.905.905 0 0 0 8 4zm.002 6a1 1 0 1 0 0 2 1 1 0 0 0 0-2z" />
                        </svg>
                    </span>
                </div>
            </div>
            <div class="col-md-9">
                <div class="donation">
                    <div class="donation-text">Donation</div>
                    <div class="amount-text">${{ $data['amount'] }}</div>
                </div>
                <div class="contribution">
                    <div class="contribution-text"><img style="height: 100px;" src="images/favicon.png"
                            class="img-fluid rounded-start123" alt="{{ $data['charity_name'] }}"> Contribution</div>
                    <div class="contribution-amount">${{ $data['contribution'] }}</div>
                </div>
                <div class="hr-line"></div>

                <div class="total">
                    <div class="total-text">Total</div>
                    <div class="total-amount">${{ $data['total'] }}</div>
                </div>

                <form id="payment-form" action="{{route('payment-form')}}" method="post">
                    @csrf
                    <input type="hidden" name="total" value="{{ $data['total'] }}">
                    <input type="hidden" name="donationAmount" value="{{ $data['amount'] }}">
                    <input type="hidden" name="charityEin" value="{{ $data['ein'] }}">
                    <input type="hidden" name="charityName" value="{{ $data['charity_name'] }}">
                    <div>
                        <button id="submit-button"
                            style="background-color:black;border : black;color:white;width:100%;padding : 12px 12px 12px 12px;border-radius:10px;font: 600 24px/32px
    Barlow Condensed;margin-top: 30px;letter-spacing: 0.01em;">Confirm
                            Payment</button>
                    </div>
                  </form>
            </div>
        </div>
    </section>

</body>

<style>
    #info .modal-dialog {
        position:fixed;
        top:auto;
        right:auto;
        left:auto;
        bottom:-20px;
        border: 2px solid #18191F;
        margin: 0px;

    }

    #info .modal-content {
        border-radius: 16px 16px 0 0;
        padding: 0px 0px 20px 0;
    }

    #info .modal-header {
        border-bottom: 2px solid #18191F;
        padding-left: 20px;
        padding-right: 20px;
        margin: 0px;
    }
    #info .modal-body {
        padding-left: 30px;
        padding-right: 30px;
    }
    #info .modal-body p {
        text-align: left;
    }
    </style>

    <div id="info" class="modal fade bs-example-modal-lg" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" style="font-size: 34px;" class="btn " data-dismiss="modal"><i class="fas fa-exclamation-circle"></i></button>
                    <button type="button" style="font-size: 34px;" class="btn" data-dismiss="modal"><i class="fas fa-times"></i></button>
                </div>
                <div class="modal-body">
                    <p><strong>Donation:</strong> 100% of your donation is tax-deductible to the extent allowed by US law. Your donation is first made to mygoodness, a tax-exempt US 501(c)(3) charity, and we immediately issue a receipt for your charitable contribution. We then disperse your donation as unrestricted funds to the nonprofit of your choice on your behalf on a monthly basis.
                        <strong>The selected nonprofit may not have provided advanced consent or permission and has not reviewed or approved the content of this solicitation. See Terms for more information.</strong><br><br>

                        <strong>MG (mygoodness) Contribution: </strong>An additional 11% (maximum $10)  fee is added to cover payment processing fees and to support the development of donor tools like this one. mygoodness is a nonprofit too, so this fee is tax-deductible. </p>
                </div>
            </div>
        </div>
    </div>

</html>
