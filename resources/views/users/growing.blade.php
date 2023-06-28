<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <link rel="icon" href="images/favicon.png" />
        <meta name="csrf-token" content="{{ csrf_token() }}"/>
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <link href="https://fonts.googleapis.com/css2?family=Karla:wght@300;400;500;600;700;800&amp;display=swap" rel="stylesheet" />
        <title>{{ config('app.name', 'mygoodness') }}</title>
        <!--fonts-->
        <link rel="preconnect" href="https://fonts.googleapis.com" />
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
        <link
            href="https://fonts.googleapis.com/css2?family=Barlow+Condensed:wght@300;400;500;600;700;800;900&family=Barlow:wght@100;200;300;400;500;600;700;800;900&family=Roboto+Slab:wght@300;400;500;600;700;800;900&display=swap"
            rel="stylesheet"
        />

        <link rel="stylesheet" type="text/css" href="https://site-assets.fontawesome.com/releases/v5.15.4/css/all.css" />
        <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css" />
        <link rel="stylesheet" type="text/css" href="css/style.css" />
        <link rel="stylesheet" type="text/css" href="css/responsive.css" />
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/custom.js"></script>
        <style>
            .highlight{
                background: white !important;
                color: black !important;
            }
            .greenbg {
    background: #fff;
    width: 100%;
    float: left;
    margin: auto;
    /* padding: 20px 0; */
    }
        .greenbg .logohead {
            padding: 0;
            clear: both;
            float: left;
            background: #61e4c5;
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
font-weight: 600;
color: #000;
        }
        .middlebox{
            width: 100%;
            float: left;
            margin: auto;
            position: relative;
            background: #61e4c5;
            border-bottom-left-radius: 450% 250%;
            border-bottom-right-radius: 450% 230%;
        }
        </style>
    </head>
    <body class="greenbg">
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
                <div class="growingcircle">
                    <div class="col-sm-9 growinghead">
                        <!-- <p class="donate">Goodness is growing!</p> -->
                        <img src="images/four-star-icon.png" alt="">
                        <img src="images/share-link-icon.png" alt="">
                        <p class="donate">Here’s the status!</p>
                        <span class="counts">{{$count}}</span>
                        @if($count=='1')
                        <span class="friendstext">friends have joined this chain of generosity.</span>
                        @else
                        <span class="friendstext">friends have joined this chain of generosity.</span>
                        @endif
                        {{-- <span class="donatetext">In this chain people have given to: </span> --}}
                        <div class="col-sm-12 buttonstext">
                            <button class="black" id="viewAll" style="display:none">View All</button>
                            @foreach($org as $chain)
                            <!-- <?php $name = preg_split("/\s+/", $chain)?>
                            @if(isset($name['1']))
                                <button title="{{$chain}}" class="black col-sm-3 mb-3" data-id="{{$chain}}">{{$name['0'].' '.$name['1']}}</button>
                            @else
                                <button title="{{$chain}}" class="black col-sm-3 mb-3" data-id="{{$chain}}">{{$name['0']}}</button>
                            @endif -->
                            <button title="{{$chain}}" class="black col-sm-3 mb-3" data-id="{{$chain}}">{{$chain}}</button>
                            @endforeach
                        </div>
                        <div class="showdesk">
                            <img align="left" src="images/growdesktop.png">
                        </div>
                    </div>


                </div>
            </div>
        </section>

        <section>
            <div class="mobileviewgrowiing">
                <div class="grrencolorbox">
                    <div class="row">

                    </div>
                    <p class="donate flex" style="text-align: center;">Now for the good stuff.</p>
                    <img src="images/share-link-icon.png" alt="" style="position: relative;top: 100px;width: 76px;left: 130px;">
                    <img src="images/four-star-icon.png" alt="" style="position: relative;top: 140px;width: 50px;right: 170px;">
                    <div class="showdesk">
                        <img src="images/growingmobile.png">
                    </div>
                </div>
                {{-- <span class="friendstext" style="font-weight:400 !important">Here's the status of the chain you participated in:</span> --}}
                <span class="counts">{{$count}}</span>
                @if($count=='1')
                <span class="friendstext" style="margin-bottom:5px !important">friends have joined this chain of generosity.</span>
                @else
                <span class="friendstext" style="margin-bottom:5px !important">friends have joined this chain of generosity.</span>
                @endif

                <span class="donatetext">They invested in: </span>
                <div class="col-sm-12 buttonstext">
                    <button class="black" id="viewAll1" style="display:none">View All</button>
                    @foreach($org as $chain)
                    <?php $name = preg_split("/\s+/", $chain)?>
                    <button title="{{$chain}}" class="black" data-id="{{$chain}}">{{$chain}}</button>
                    @endforeach
                </div>
            </div>
            <div class="listitems">
                <ul class="listmids row d-flex justify-content-center ct">
                    <?php
                    $i = 1;
                    $j = 1;
                    ?>
                    @foreach($donor as $user)
                    <?php
                    $username = preg_split("/\s+/", $user);
                    if($i==1){
                        $color = 'green';
                        $image = 'greenstar.png';
                    }elseif($i==2){
                        $color = 'red';
                        $image = 'redstar.png';
                    }
                    if($j%3==0){
                        $i=0;
                        $color = 'yellow';
                        $image = 'yellowstar.png';
                    }
                    ?>
                    <li class="col-sm-1">
                        <a class="inner" title="{{$user}}">
                            <span class="starbox {{$color}}">
                                <img src="images/{{$image}}">
                            </span>
                            <span class="ratetext">{{$username['0']}}</span>
                        </a>
                    </li>
                    <?php
                    $i++;
                    $j++;
                    ?>
                    @endforeach
                </ul>
                <div class="col-sm-12 buttoncenter" id="hidemobile">
                    <a href="/share" class="startbtn" >Invite more givers</a>
                </div>
                <div class="col-sm-12 buttoncenter" style="margin: 10px auto;">
                    <a href="javascript:void(0)" type="button" style="width: 90%;z-index: 111;position: relative;" class="startbtn" style="width: 90%;" onclick="testWebShare()" id="share">Invite More Friends</a>
                </div>
                <div class="col-sm-12">
                    <p style="padding: 10px 10px;text-align: justify;font-size: 18px;font-weight: 400;">Venmo says, “61% of donors are most likely to hear about causes through word of mouth from their friends and family”</p>
                </div>
            </div>
        </section>

        @include('footer')

        <script defer>
            'use strict';
            $('#viewAll').on('click', function(){
                window.location.reload();
            });
            $('#viewAll1').on('click', function(){
                window.location.reload();
            });
            $('.black').on('click', function() {
                $('#viewAll').show();
                $('#viewAll1').show();
                $('button').removeClass('highlight');
                $(this).addClass('highlight');
            var org = $(this).attr('data-id');
            var chain = '{{$chain_id}}';
            $.ajax
                ({
                    type: "post",
                    url: "{{url('/getuser')}}",
                    // contentType: "application/json",
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: {org:org, chain:chain},
                    success: function(data)
                        {
                            var result = data.html;
                            $('.ct').html(result);
                            var count = data.count;
                            if(count=='1'){
                                var comment = 'friend has given';
                            }else {
                                var comment = 'friends have given';
                            }
                            $('.counts').text(count);
                            $('.friendstext').text(comment);
                        }
                });
            });

            async function testWebShare() {
            const title = 'MyGoodness Dialog';
            const text = "Hi, It’s {{ Auth::user()->name == 'User' ? 'I' : Auth::user()->name }}. I donated to something I care about today and think you should, too. Visit the link below to join my giving chain. " + "{{ url('chain-link') }}/{{ $chain_id }}";
            try {
                await navigator.share({
                    title,
                    text,
                });
                console.log('Successfully sent share');
            } catch (error) {
                console.log('Error sharing: ' + error);
            }
        }
        </script>

    </body>
</html>
