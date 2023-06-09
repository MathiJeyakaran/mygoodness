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
        </style>
    </head>
    <body class="yellowbg white">
        <header>
            <div class="container">
                <div class="col-sm-4 logohead">
                    <a href="/" class="logo">
                        <img src="images/logo.png" class="img-fluid" />
                    </a>
                </div>
            </div>
        </header>
        <section class="middlebox">
            <div class="container">
                <div class="growingcircle">
                    <div class="col-sm-9 growinghead">
                        <!-- <p class="donate">Goodness is growing!</p> -->
                        <p class="donate">Here’s the status!</p>
                        <span class="counts">{{$count}}</span>
                        @if($count=='1')
                        <span class="friendstext">friend has given</span>
                        @else
                        <span class="friendstext">friends have given</span>
                        @endif
                        <span class="donatetext">In this chain people have given to: </span>
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
                    <div class="mobileviewgrowiing">
                        <div class="grrencolorbox">
                            <p class="donate">Goodness is growing!</p>
                            <div class="showdesk">
                                <img src="images/growingmobile.png">
                            </div>
                        </div>
                        <span class="friendstext" style="font-weight:400 !important">Here's the status of the chain you participated in:</span>
                        <span class="counts">{{$count}}</span>
                        @if($count=='1')
                        <span class="friendstext" style="margin-bottom:5px !important">friend has given</span>
                        @else
                        <span class="friendstext" style="margin-bottom:5px !important">friends have given</span>
                        @endif
                        <div class="col-sm-12 buttoncenter">
                            <a href="/share" class="startbtn">Invite more givers</a>
                        </div>
                        <span class="donatetext">In this chain people have given to: </span>
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
                            <a href="/share" class="startbtn">Invite more givers</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        
        @include('footer')

        <script>
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
        </script>
        
    </body>
</html>
