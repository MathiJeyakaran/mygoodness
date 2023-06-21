<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <link rel="icon" href="images/favicon.png" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link href="https://fonts.googleapis.com/css2?family=Karla:wght@300;400;500;600;700;800&amp;display=swap"
        rel="stylesheet" />
    <title>{{ config('app.name', 'mygoodness') }}</title>
    <!--fonts-->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link rel="stylesheet" type="text/css" href="css/global.css" />
    <link
        href="https://fonts.googleapis.com/css2?family=Barlow+Condensed:wght@300;400;500;600;700;800;900&family=Barlow:wght@100;200;300;400;500;600;700;800;900&family=Roboto+Slab:wght@300;400;500;600;700;800;900&display=swap"
        rel="stylesheet" />

    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Barlow Condensed:wght@600&display=swap" />
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Barlow:ital,wght@0,400;0,500;0,600;1,400&display=swap" />

    <link rel="stylesheet" type="text/css" href="https://site-assets.fontawesome.com/releases/v5.15.4/css/all.css" />
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="css/style.css" />
    <link rel="stylesheet" type="text/css" href="css/responsive.css" />
    <link rel="stylesheet" type="text/css" href="css/selectize.css" />
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

        .img-fluid {
            height: 60px;
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

        .pick-a {
            font-size: 24px;
            letter-spacing: 0.01em;
            line-height: 32px;
            font-weight: 600;
            font-family: var(--title-3xl);
            color: var(--gray-900);
            display: inline-block;
            text-align: left;
            width: 100%;
            padding-left: 20px;
            padding-right: 20px;
            line-height: 32px;
        }

        .payment-inner {
            padding: 20px;
            margin-left: auto;
            margin-right: auto;
            width: 100%;
            height: 75px;
        }

        .p-text {
            font-size: 20px;
            font-weight: 400;
            padding-top: 29px !important;
            position: relative;
            top: 25px;
            width: 100%;
            font-style: normal;
            color: #212121;
            font-family: Barlow;
        }

        .giveto {

            margin: auto;

            font-weight: 600 !important;
            font-size: 24px !important;
            margin-bottom: 20px;
            font-family: Barlow Condensed !important;
            letter-spacing: 0.01em;
        }

        .btn-margin {
            /* margin: 10px; */
            margin-right: 31px;
            background-color: #fff;
        }

        .active-radio {
            background-color: #FF9692 !important;
        }

        .star {
            position: absolute;
            left: 0px;
            top: 150px;
            width: 60px;
        }

        .tree {
            position: absolute;
            right: 20px;
            top: 200px;
            z-index: 1;
        }

        .custom-checkbox .custom-control-input:checked~.custom-control-label::before {
            background-color: #FFB900 !important;
        }

        .custom-checkbox .custom-control-input:checked:focus~.custom-control-label::before {
            box-shadow: 0 0 0 1px #000, 0 0 0 0.2rem rgba(0, 255, 0, 0.25)
        }

        .custom-checkbox .custom-control-input:focus~.custom-control-label::before {
            box-shadow: 0 0 0 1px #000, 0 0 0 0.2rem rgba(0, 0, 0, 0.25)
        }

        .custom-checkbox .custom-control-input:active~.custom-control-label::before {
            /* background-color: #C8FFC8; */
            background-color: #000;
        }

        .custom-control .custom-control-label {
            border-radius: 3px;
        }

        .custom-control .custom-control-label::before {
            background-color: #ccc !important;
            border: 2px solid #000;
            border-radius: 3px;
            width: 22px;
            height: 22px;
        }

        .custom-control .custom-control-label::after {
            border: 2px solid #000;
            border-radius: 3px;
            width: 22px;
            height: 22px;
        }

        .myTest {
            position: relative;
            bottom: 48px;
        }

        #customCheck1:checked+label::before {
            content: "\2713" !important;
            display: inline-block;
            margin-right: 5px;
            color: #000 !important;
            font-weight: bold;
            position: absolute;
            left: -23px;
        }

        .custom-control .custom-control-input:checked~.custom-control-label::after {
            background-image: url("");
        }

        .custom-check {
            padding-left: 0.25rem;
        }

        .search-drop {
            font-size: 20px !important;
            line-height: 28px !important;
            color: #212121 !important;
        }

        /* Bootstrap 4 text input with search icon */

        .has-search .form-control {
            padding-left: 2.375rem;
        }

        .has-search .form-control-feedback {
            position: absolute;
            z-index: 2;
            display: block;
            width: 2.375rem;
            height: 2.375rem;
            line-height: 2.375rem;
            text-align: center;
            pointer-events: none;
            color: #aaa;
            top: 46px;
            z-index: 1111111;
        }

        #org {
            width: 280px;
            float: left;
            position: relative;
            z-index: 11111;
        }

        .click-search {
            background: #FFB900;
            border: 2px solid #000;
            color: #000;
            float: right;
            font-size: 10px;
            padding-top: 8px;
            padding-bottom: 8px;
            border-radius: 50%;
            z-index: 11111;
            position: relative;
            cursor: pointer;
            bottom: 38px;
        }

        #submitForm:hover,
        .click-search:hover {
            background: #000;
            color: #fff;
        }

        #submitForm:hover {
            color: #fff;
        }

        .selectize-control.single .selectize-input {
            padding-left: 30px;
        }
        .selectize-dropdown.single{
            padding-left: 10px;
        }

        .btn-group .btn-margin {
            border-radius: 12px !important;
            font-weight: 600 !important;
            font-size: 12px !important;
            line-height: 16px !important;
            padding: 10px;
            border: 2px solid #000;
            margin-left: -5px !important;
        }

        .btn-margin:last-of-type {
            margin-right: 0px;
        }

        #orgein {
            display: block;
            margin-top: 20px;
            top: 20px;
            position: relative;
        }

        .selectize-control .selectize-input {
            border: 2px solid #000;
            border-radius: 12px;
            width: 280px !important;
            float: left;
            position: relative;
            left: -35px;
        }

        .selectize-control .selectize-input.full.has-items {
            left: -75px;
        }
    </style>
</head>

<body class="yellowbg white">

    <header>
        <div class="container">
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
    <section class="middlebox">
        <div class="container">
            <div class="pick-a">Pick a nonprofit and give...</div>
            <img class="payment-inner" alt="" src="images/donate-progress-bar.png">
            <img class="star" alt="" src="images/Group1.png">
            <img class="tree" alt="" src="images/Group.png">
            <div class="centerboxesform">
                <div class="col-sm-9 pinkbox">
                    <div class="circleoxes">
                        <br>
                        <br>
                        <div class="cirlehead">
                            <span class="dektopimages mobile">
                                <img src="images/payleftimage.png">
                            </span>
                        </div>
                    </div>
                    <span class="dektopimages">
                        <img src="images/payleftimage.png">
                    </span>
                </div>
            </div>
        </div>
    </section>

    <section>
        <form id="myForm" method="POST" action="{{ url('continue') }}" enctype="multipart/form-data">
            @if ($chainData)
                <div class="p-text text-center p-2">Margaret gave a donation to <br> Nonprofit...give there too or <br>
                    choose your own adventure.
                </div>
            @else
                {{-- <b>Donate</b> to a cause you care about.</div> --}}
                <br>
                <br>
            @endif

            @csrf
            @if ($chainData)
                <div class="fulwidth margiboxed" style="margin: 10px 0;position: relative;">
                    <div class="col-sm-12 likebox">
                        <br>
                        <br>
                        <div class="form-check custom-check">
                            <label class="containers giveto float-left">Give to [ORGANIZATION]
                            </label>
                            <div class="myTest custom-control custom-checkbox float-right">
                                <input type="checkbox" class="custom-control-input" id="customCheck1" />
                                <label class="custom-control-label" for="customCheck1"></label>
                            </div>
                        </div>
                    </div>
                </div>
            @else
                {{-- <b>Donate</b> to a cause you care about.</div> --}}
                <br>
                <br>
            @endif

            <div class="fulwidth margiboxed">
                <div class="col-sm-12">
                    <div class="form-group">
                        <label class="text-left search-drop" style="padding-left: 3px;">Or, search for a different
                            nonprofit
                            <span data-toggle="modal" data-target=".bs-example-modal-lg">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="bi bi-exclamation-circle-fill" viewBox="0 0 16 16">
                                    <path
                                        d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8 4a.905.905 0 0 0-.9.995l.35 3.507a.552.552 0 0 0 1.1 0l.35-3.507A.905.905 0 0 0 8 4zm.002 6a1 1 0 1 0 0 2 1 1 0 0 0 0-2z" />
                                </svg>
                            </span>
                        </label>
                        <input type="hidden" id="charity_name" name="charity_name" value="">
                        <input type="hidden" id="charity_logo" name="charity_logo" value="">
                        <!-- Actual search box -->
                        <div class="form-group has-search mb-2">
                            <span class="fa fa-search form-control-feedback"></span>
                            <select class="form-control ct" id="org" name="org" placeholder="" required>
                            </select>
                            <button class="click-search btn">
                                <i class="fas fa-arrow-right" style="font-size: 20px;"></i>
                            </button>
                        </div> <br>
                    </div>
                </div>
                <div class="col-sm-12 givebox" style="margin-top: 40px;margin-bottom: 29px;">
                    <div class="btn-group btn-group-toggle" data-toggle="buttons">
                        <label class="btn btn-secondary btn-margin active">
                            <input type="radio" name="amount" value="10" id="option1" autocomplete="off"
                                checked> $10
                        </label>
                        <label class="btn btn-secondary btn-margin">
                            <input type="radio" name="amount" value="20" id="option2" autocomplete="off">
                            $20
                        </label>
                        <label class="btn btn-secondary btn-margin">
                            <input type="radio" name="amount" value="50" id="option3" autocomplete="off">
                            $50
                        </label>
                        <label class="btn btn-secondary btn-margin">
                            <input type="radio" name="amount" value="100" id="option4" autocomplete="off">
                            $100
                        </label>
                        <label class="btn btn-secondary btn-margin">
                            <input type="radio" name="amount" value="200" id="option5" autocomplete="off">
                            $200
                        </label>
                    </div>
                </div>
                <div class="col-sm-12 pt-4">
                    <button type="button" id="submitForm" class="startbtn" style="width: 100%;">Continue</button>
                </div>
                <div class="col-sm-12 pt-2 text-justify"
                    style="font-family: Barlow;font-style: italic;font-size: 16px;line-height: 22px;font-weight: 500;">
                    <strong> mygoodness is a nonprofit too.</strong> A contribution is added to cover payment processing
                    fees and to support the development of donor tools like this.
                </div>
            </div>
        </form>
    </section>
    @include('footer')
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
                    <p>Results are generated based on public information available from every.org. mygoodness does not endorse or have any legal relationship with the nonprofits listed here.</p>
                </div>
            </div>
        </div>
    </div>
    <script>
        var organizations = '';
        var orgtext = ''
        $(document).ready(function() {
            $('select').selectize({
                sortField: 'text'
            });
            $(document).on('keyup', '.selectize-input', function(e) {
                var keyCode = e.keyCode || e.which;
                if (keyCode === 13) {
                    e.preventDefault();
                    getsearch();
                }
            })
            function getsearch() {
                var org = $('#org-selectized').val();
                console.log(org);
                if (org == '') {
                    alert('Please search organization')
                    return false;
                }
                orgtext = org
                console.log(orgtext);
                var len = org.length;
                if (len >= 2) {
                    $.ajax({
                        type: "post",
                        url: "{{ url('/getsearch') }}",
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        data: {
                            org: org
                        },
                        success: function(data) {
                            var result = data;
                            $('.ct').html(result);
                            $('select').selectize({
                                sortField: 'text',
                            });

                            $('#org-selectized').click();

                            $('.has-search .fa-search').attr('style','display:none')
                        }
                    });
                }
            }
        });

        document.getElementById("myForm").onkeypress = function(e) {
            var key = e.charCode || e.keyCode || 0;
            if (key == 13) {
                getorg();
                e.preventDefault();
            }
        }

        function getorg() {
            var name = $('.item').text();
            $('#charity_name').val(name);
        }

        $('#submitForm').click(function() {
            var orgein = $('.option.selected.active').attr("data-value")
            $.ajax({
                type: "post",
                url: "{{ url('/orgdata') }}",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    org: orgtext
                },
                success: function(data) {
                    organizations = data.find(organizations => organizations.ein === orgein);
                    console.log(organizations);
                    $('#charity_name').val(organizations.name);
                    $('#charity_logo').val(organizations.logoUrl);
                    $('#myForm').submit();
                }
            });
        });
    </script>
</body>
</html>
