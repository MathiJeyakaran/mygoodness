<!-- donation-counter.blade.php -->
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <link rel="icon" href="{{ asset('images/favicon.png') }}" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link href="https://fonts.googleapis.com/css2?family=Karla:wght@300;400;500;600;700;800&amp;display=swap" rel="stylesheet" />
    <title>{{ config('app.name', 'mygoodness') }}</title>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <!--fonts-->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Barlow+Condensed:wght@300;400;500;600;700;800;900&family=Barlow:wght@100;200;300;400;500;600;700;800;900&family=Roboto+Slab:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet" />

    <link rel="stylesheet" type="text/css" href="https://site-assets.fontawesome.com/releases/v5.15.4/css/all.css" />
    <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.min.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('css/styles.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('css/responsive.css') }}" />
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/custom.js') }}"></script>
</head>
<body class="yellowbg">
    <header>
        <div class="container">
            <div class="col-sm-4 logohead">
                <a class="logo">

                    <img src="{{ asset('images/logo.png') }}" class="img-fluid" />
                </a>
            </div>
        </div>
    </header>
    <section class="middlebox">
        <div class="container">
            <div style="height:30px">
                <div id="alert" class="">
                    @if(Session::has('success'))
                    <div class="prohead" role="alert">
                        <p style="font-size:20px"><u>{{Session::get('success')}}</u></p>
                    </div>
                    @endif

                    @if ($errors->any())
                    <div class="prohead">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                </div>
            </div>
            <div class="col-sm-12 grow">
                <div class="col-sm-8 growtext">
                    
                    @if ($chainData)
                        <p class="growhead" style="margin-bottom: 3rem;">Oh look, <br> another do-gooder.</p>
                        <span class="smallgrowtext">
                            {Friend name} (or) Your friend donated today. Will you?
                        </span>
                    @else
                        <p class="growhead">Better, together.</p>
                        <span class="smallgrowtext">
                            It’s easy to invest in your community, you just need a little help from your friends. Start today by inspiring a chain reaction of donations to trusted organizations that you and your people care about most.
                        </span>
                    @endif


                </div>

            </div>
            <div class="col-sm-12 grow">
                <div class="col-sm-8 growtext">
                    <break>
                <div class="circle-container">
                        <div class="circle">{{ $totalUsers }}</div>

                    </div>
                    <p class="circle-text">
                        @if ($chainData)
                            other friends already gave. It's about time they invited you.
                        @else
                            other donors already gave.
                        @endif
                    </p>
                </div>
            </div>
                <div class="col-sm-4 growimage">
                <span class="images-left">
                        <img src="{{ asset('images/vector_48.png') }}" class="img-fluid" />

                    </span>
                <span class="images">

                        <img src="{{ asset('images/Homeside.png') }}" class="img-fluid" />
                    </span>
                </div>
            </div>
            <div class="col-sm-12 threeboxs">
                <div class="col-sm-12 boxesone">
                    <div class="padding">
                        <p class="iconhead">How it works!</p>

                        <span class="iconsmalltext">
                        <div class="circle-list-container">
                            <ol class="circle-list">
                                <li style="margin-bottom :10px;"><span class="circle-number">1</span><div class="teext1">
                                    {{-- {{ $chainData = '1234' }} --}}
                                    {{-- @if ($chainData)
                                        <b>Donate</b> to [Friend's] cause or a nonprofit you care about more.</div>
                                    @else --}}
                                        <b>Donate</b> to a cause you care about.</div>
                                    {{-- @endif --}}
                                </li>

                                <li style="margin-bottom :10px;"><span class="circle-number">2</span><div class="teext1">
                                    <b>Tell three friends</b> to donate somewhere too. Think of it like a pyramid scheme for good.</div>
                                </li>

                                <li style="margin-bottom :10px;"><span class="circle-number">3</span><div class="teext1"><b>Follow along </b>as your investment influences others to give too.</div></li>
                            </ol>

                        </div>

                        </span>
                        <div class="growstar">
                    <span class="images-star">
                        <img src="{{ asset('images/stars.png') }}" class="img-fluids" />
                    </span>
                </div>

                    </div>
                </div>

            </div>

                <div class="col-sm-12 buttoncenter">
                    <button class="startbtn" id="start" data-toggle="modal" data-target="">Start Giving</button>
                    <a data-toggle="modal" id="login_required" data-target="#myModal"></a>
                    <a href="/create" class="user_found" id="user_found"></a>

                </div>
                <span class="images-right">
                        <img src="{{ asset('images/vector_46.png') }}" class="img-fluid" />

                    </span>
                <div class="col-sm-12 grow">
                <div class="col-sm-8 growtext">
                    <p class="growhead" style="text-align: center;color: #18191F;font-family:'Barlow Condensed';font-weight: 600;line-height: 32px;letter-spacing: 0.01em;;font-size:24px;padding-top :-50px;padding-left:20px;">Who is mygoodness?</p>
                    <span class="smallgrowtext">
                        <p style="padding-left:20px;padding-right:11px;">We are a nonprofit on a mission to help weave generosity into every day.<br> <br>When we aren't busy making clay pots, keeping our kids from breaking clay pots, and working day jobs...our small but mighty team passionately builds tools for donors like you.</p>
                    <br><br>
                    </span>
                </div>


            </div>
            </div>
        </div>

    </section>



    @include('footer')
    <div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><img style="width: 7%;position: relative;top: 2px;left: -130px;" src="{{ asset('images/1250965.png') }}"></button>
                    <h4 class="modal-title">Simply sign in</h4>
                </div>
                <div class="modal-body">
                    <form id="myForm" method="POST" action="{{url('/verification')}}" enctype="multipart/form-data">
                        @csrf
                        <p class="simply">You have a phone, we just know it. </p>
                        <span class="forminput">
                            <input style="color:black" type="tel" name="phone" id="phone" minlength="10" maxlength="15" class="form-control" placeholder="mobile number" required />
                            <em class="ustext">US only</em>
                        </span>
                        <h6 class="error mt-2" style="color:red;">{{Session::get('success')}}</h6>
                        <div class="col-sm-12 buttoncenter">
                            <button type="submit" class="startbtn">Let’s go!</button>
                        </div>
                        <div class="text-center">
                            <p style="width: 250px;margin: 0 auto;"><i>mygoodness will work better on a mobile device</i></p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div id="login-modal" class="modal fade hide" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><img style="width: 7%;position: relative;top: 2px;left: -130px;" src="{{ asset('images/1250965.png') }}"></button>
                    <h4 class="modal-title">Login</h4>
                </div>
                <div class="modal-body">
                    {{-- <form action="">
                        @csrf --}}
                        <p class="simply">Please enter the one time password to verify your account </p>
                        <center>
                            <div class="col-sm-6">
                                <input type="hidden" id="login_phone" name="login_phone" value="{{$mobile}}" class="form-control" required />
                                <input style="color:black" type="text" id="code" minlength="6" maxlength="6" name="code" class="form-control text-center" required /></br>
                                <h6 class="error" style="color:red; display:none">Please Enter Valid OTP</h6>
                                <h6 class="blank" style="color:red; display:none">Please Enter OTP</h6>
                            </div>
                        </center>
                        <div class="col-sm-12 buttoncenter">
                            <button  type="submit" id="login" class="startbtn">Submit</button>
                        </div>
                    {{-- </form> --}}
                    <form id="login-form" style="display:none" method="POST" action="{{ route('login') }}">
                    @csrf
                        <input type="text" id="email" name="email" value="{{ $mobile }}" required/>
                        <input type="password" name="password" id="password" value="" required/>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            var mobile = '{{$mobile ?? ''}}'
            var user = '{{ Auth::user() ?? '' }}'
                if (!user) {
                    if (!mobile) {
                        $('#login_required').click();
                    } else {
                        $('#login-modal').modal('show');
                    }
                }

            $('#start').on('click', function() {
                $.ajax({
                    type: "get",
                    url: "{{url('/loginCheck')}}",
                    headers: {
                        // 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(data) {
                        if (data == 'login') {
                            $('#login_required').click();
                        }
                        if (data == 'found_user') {
                            window.location = $('#user_found').prop('href');
                        }
                    }
                });
            });


            $('#login').on('click', function() {
                    // var phone = '+17079687682';

                    var phone = $('#login_phone').val();
                    var code = $('#code').val();
                    if(code==""){
                        $('.blank').show();
                        $('.error').hide();
                    }
                    $.ajax
                    ({
                        type: "post",
                        url: "{{url('/verify')}}",
                        // contentType: "application/json",
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        data: {phone:phone,code:code},
                        success: function(data)
                            {
                                if (data == 'error') {
                                    $('.error').show();
                                    $('.blank').hide();
                                } else {
                                    // $('#email').val(data);
                                    // $('#password').val('mygoodness@123');
                                    // $('form').submit();
                                    window.location.href = data;
                                }
                            }
                    });
                });

            $('#myModal').on('hidden.bs.modal', function(e) {
                $('#myForm')[0].reset();
            })
        });
    </script>

    <!-- Quantcast Tag -->
    <script type=“text/javascript”>
        window._qevents = window._qevents || [];
        (function() {
                var elem = document.createElement('script');
                elem.src = (document.location.protocol == "https: "" ? "https : //secure" : "http://edge") + ".quantserve.com/quant.js";
                    elem.async = true; elem.type = "text / javascript";
                    var scpt = document.getElementsByTagName('script')[0]; scpt.parentNode.insertBefore(elem, scpt);
                })(); window._qevents.push({
                qacct: "p - 9 LdTXJuEdj5MD",
                uid: "aj.allenjoel@gmail.com"
            });
    </script>
    <noscript>
        <div style="display:none;">
            <img src="//pixel.quantserve.com/pixel/p-9LdTXJuEdj5MD.gif" border="0" height="1" width="1" alt="Quantcast" />
        </div>
    </noscript>
    <!-- End Quantcast tag -->
</body>

</body>
</html>
