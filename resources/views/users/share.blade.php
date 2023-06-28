<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <link rel="icon" href="images/favicon.png">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css2?family=Karla:wght@300;400;500;600;700;800&amp;display=swap"
        rel="stylesheet">
    <title>{{ config('app.name', 'mygoodness') }}</title>
    <!--fonts-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Barlow+Condensed:wght@300;400;500;600;700;800;900&family=Barlow:wght@100;200;300;400;500;600;700;800;900&family=Roboto+Slab:wght@300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="https://site-assets.fontawesome.com/releases/v5.15.4/css/all.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/responsive.css">
    <link rel="stylesheet" type="text/css" href="css/index.css" />
    <link rel="stylesheet" type="text/css" href="css/global.css" />
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/custom.js"></script>

    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Barlow Condensed:wght@600&display=swap" />
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Barlow:ital,wght@0,400;0,500;0,600;1,400&display=swap" />

    <style>
        .white-bg {
            background: #fff;
            width: 100%;
            float: left;
            margin: auto;
            /* padding: 20px 0; */
        }

        .white-bg .logohead {
            padding: 0;
            clear: both;
            float: left;
            background: #61e4c5;
        }

        .white-bg .middlebox {
            width: 100%;
            float: left;
            margin: auto;
            position: relative;
            background: #61e4c5;
            border-bottom-left-radius: 450% 130%;
            border-bottom-right-radius: 450% 130%;
            height: 670px;
        }

        #textarea {
            margin: 0px 0px;
            padding: 5px;
            height: 160px;
            line-height: 16px;
            display: block;
            margin: 0px auto;
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

        .mainheading .mobileviews .donate,
        .mainheading .mobileviews .donatetext,
            {
            text-align: left;
        }

        .mainheading .mobileviews .donatetext {
            font-size: 18px;
            font-weight: 500;
            font-style: normal;
        }

        .search-drop {
            font-size: 18px !important;
            line-height: 26px !important;
            font-weight: 500;
            font-style: normal;
            color: #212121 !important;
        }

        .aftersend {
            font-size: 18px;
            font-weight: 500;
            font-style: normal;
            text-align: center;
        }

        .bottomimagesshowmobile .images {
            width: 60%;
            float: right;
            margin: auto;
            position: relative;
        }
    </style>
</head>

<body class="white-bg">
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
    <section class="middlebox">
        <div class="container">
            <div class="pick-a">Invite Friends</div>
            <img class="payment-inner" alt="" src="images/share-page2.png">

            <div class="col-sm-10 mainheading">
                <div class="mobileviews">
                    <div class="col-sm-4 lefticons">
                        <span class="images">
                            <img src="images/friendsleft.png" class="img-fluid">
                        </span>
                    </div>
                    <div class="col-sm-8 textformat">
                        <p class="donate" style="text-align: left !important;">Ask three friends to give too. </p>
                        <span class="donatetext">We know, we know. You already gave! But this last step is where the
                            magic happens. Nudge your friends and watch your impact multiply.</span>
                    </div>
                    <div class="col-sm-12">
                        <label class="text-left search-drop" style="padding-left: 3px;">Write a custom text below. Or,
                            go with what we've got here.
                            <span data-toggle="modal" data-target=".bs-example-modal-lg" type="button">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                    fill="currentColor" class="bi bi-exclamation-circle-fill" viewBox="0 0 16 16">
                                    <path
                                        d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8 4a.905.905 0 0 0-.9.995l.35 3.507a.552.552 0 0 0 1.1 0l.35-3.507A.905.905 0 0 0 8 4zm.002 6a1 1 0 1 0 0 2 1 1 0 0 0 0-2z" />
                                </svg>
                            </span>
                        </label>
                    </div>
                </div>
                <div class="deskviews">
                    <p class="donate" style="text-align: left !important;">Ask three friends to give too.</p>
                    <span class="donatetext">We know, we know. You already gave! But this last step is where the magic
                        happens. Nudge your friends and watch your impact multiply.</span>
                </div>

            </div>
        </div>
    </section>

    <section style="position: relative;top: -100px;">
        <form method="POST" action="{{ url('invite') }}" enctype="multipart/form-data">
            @csrf
            <div class="col-sm-8 formwhite">
                <div class="">
                    <div class="col-sm-12 form-group">
                        <input type="hidden" name="org" value="{{ $data->nonprofit }}">
                        <input type="hidden" name="chain" value="{{ $data->chain }}">
                        <input type="hidden" name="invitee_1" value="2134747975">
                        <input type="hidden" name="invitee_1" value="2134747976">
                        <input type="hidden" name="invitee_1" value="2134747977">

                        <textarea id="txtarea" class="form-control paddingss" name="message">Hi, It’s {{ Auth::user()->name == 'User' ? 'I' : Auth::user()->name }}. I donated to something I care about today and think you should, too. Visit the link below to join my giving chain. </textarea>
                        <input type="hidden" id="chainlink" name="chainLinkUrl"
                        value="{{ url('invites') }}?chain={{ $data->chain }}">
                    </div>

                    <div class="bottomimagesshow">
                        <div class="col-sm-6 leftside">
                            <span class="images">
                                <img src="images/friendsleft.png" class="img-fluid">
                            </span>
                        </div>
                        <div class="col-sm-6 rightside">
                            <span class="images">
                                <img src="images/friendsshare.png" class="img-fluid">
                            </span>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 pt-2 pb-4 send">
                    <button type="button" class="startbtn" onclick="testWebShare()" id="share"
                        style="z-index: 111;position: relative;">Share</button>
                </div>
                <div class="col-sm-12 pt-2 pb-4 aftersend">
                    <p>Fun Fact: Friends are more likely to donate if you ask them to.</p>
                </div>
                <br><br>
                <div class="col-sm-12 bottomimagesshowmobile">
                    <span>
                        {{-- <img src="images/friends.png" class="img-fluid"> --}}
                    </span>
                    <span class="images">
                        <img src="images/friends.png" class="img-fluid">
                    </span>
                </div>
            </div>
        </form>
    </section>

    @include('footer')
    <style>
        #myModal .modal-header .close {
            position: absolute;
            opacity: 1;
            /* left: -68px; */
            top: -20px;
            z-index: 999999;
            opacity: 1 !important;
            right: -15px !important;
        }

        #myModal h4.modal-title {
            padding-bottom: 0px;
        }

        #myModal .modal-body {
            padding-top: 0px;
        }

        #info .modal-dialog {
            position: fixed;
            top: auto;
            right: auto;
            left: auto;
            bottom: -20px;
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
                    <button type="button" style="font-size: 34px;" class="btn " data-dismiss="modal"><i
                            class="fas fa-exclamation-circle"></i></button>
                    <button type="button" style="font-size: 34px;" class="btn" data-dismiss="modal"><i
                            class="fas fa-times"></i></button>
                </div>
                <div class="modal-body">
                    <p>Sharing the link of your giving chain, you provide consent that you endorse the selected
                        nonprofit and consent to have your name be visible by anyone with access to the link.</p>
                </div>
            </div>
        </div>
    </div>

    <div id="myModal" class="modal fade hide" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><img src="images/close-btn.png"
                            style="width: 30px;height: auto;position: relative;right: -150px;"></button>
                    <h4 class="modal-title">Donation Confirmed!</h4>
                    <div></div>
                    {{-- <p><i>Check your texts for a link to your receipt.</i></p> --}}
                </div>
                <div class="modal-body">
                    <p><i>Check your texts for a link to your receipt.</i></p>
                    <img src="images/share-page-popup2.png"
                        style="width: 116%;height: auto;padding: 20px 0px;position: relative;left: -25px;">

                    <p>We don’t care what everyone says about you, you’re all right in our book. </p>
                    <p><i>Now keep the goodness going... </i></p>
                </div>
            </div>
        </div>
    </div>

    <script defer>
        'use strict';
        setTimeout(function() {
            $('#myModal').modal('hide');
        }, 4000);
        $(document).ready(function() {
            if ('test' == "") {
                alert('Please make a donation before sharing');
                window.location.href = "/create";
            }
            $('#myModal').modal('show');
        });

        function expandTextarea(id) {
            document.getElementById(id).addEventListener('keyup', function() {
                this.style.overflow = 'hidden';
                this.style.height = 0;
                this.style.height = this.scrollHeight + 'px';
            }, false);
        }

        expandTextarea('txtarea');

        async function testWebShare() {
            const title = 'MyGoodness Dialog';
            const text = $('#txtarea').val() + $('#chainlink').val();
            const url = $('#chainlink').val();
            try {
                await navigator.share({
                    title,
                    text,
                    url
                });
                console.log('Successfully sent share');
            } catch (error) {
                console.log('Error sharing: ' + error);
            }
        }
    </script>

</body>

</html>
