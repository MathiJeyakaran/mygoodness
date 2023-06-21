<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <link rel="icon" href="images/favicon.png" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <meta name="csrf-token" content="{{ csrf_token() }}"/>
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
    </head>
    <body class="yellowbg">
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
                <div class="col-sm-12 grow">
                    <div class="col-sm-8 growtext">
                        <p class="growhead">Let goodness grow.</p>
                        <span class="smallgrowtext">
                            We all want to change the world...so let's do something about it. mygoodness helps generosity grow—one donation at a time. In three simple steps you'll inspire a chain reaction of donations to trusted charities
                            that you and your community care about most.
                        </span>
                    </div>
                    <div class="col-sm-4 growimage">
                        <span class="images">
                            <img src="images/Homeside.png" class="img-fluid" />
                        </span>
                    </div>
                </div>
                <div class="col-sm-12 threeboxs">
                    <div class="col-sm-4 boxesone">
                        <div class="padding">
                            <span class="iconnumber">1</span>
                            <p class="iconhead">Choose a nonprofit and give.</p>
                            <span class="iconsmalltext">
                                Find your favorite organization in our database and give a gift of $5—or more if you're feeling extra good today.
                            </span>
                        </div>
                    </div>
                    <div class="col-sm-4 boxesone">
                        <div class="padding">
                            <span class="iconnumber">2</span>
                            <p class="iconhead">Invite three friends to give too.</p>
                            <span class="iconsmalltext">
                                Friends keep the goodness going by giving to the charity you chose or giving to their own choice. Either way, generosity is sparked.
                            </span>
                        </div>
                    </div>
                    <div class="col-sm-4 boxesone">
                        <div class="padding">
                            <span class="iconnumber">3</span>
                            <p class="iconhead">Watch the goodness grow.</p>
                            <span class="iconsmalltext">
                                Then they'll invite three friends...who'll invite three friends, who'll invite three friends...get it? It's like a pyramid scheme for good.
                            </span>
                        </div>
                    </div>
                    <div class="col-sm-12 buttoncenter">
                        <a class="startbtn" id="verify" data-toggle="modal" data-target="#myModal">Start Giving</a>
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
                        <button type="button" class="close" data-dismiss="modal"><img src="images/back.png"></button>
                        <h4 class="modal-title">Login</h4>
                    </div>
                    <div class="modal-body">

                            <p class="simply">Please enter the one time password to verify your account </p>
                            <center>
                                <div class="col-sm-6">
                                    <form action="">

                                    @csrf
                                    <input type="hidden" id="phone" name="phone" value="{{$mobile}}" class="form-control" required />
                                    <input style="color:black" type="text" id="code" minlength="6" maxlength="6" name="code" class="form-control text-center" required /></br>
                                    <h6 class="error" style="color:red; display:none">Please Enter Valid OTP</h6>
                                    <h6 class="blank" style="color:red; display:none">Please Enter OTP</h6>
                                    <div class="col-sm-12 buttoncenter">
                                        <button type="button" id="login" class="startbtn">Submit</button>
                                    </div>
                                </form>
                                </div>
                            </center>

                        <form id="login-form" style="display:none" method="POST" action="{{ route('login') }}">
                        @csrf
                            <input type="text" id="email" name="email" value="" required/>
                            <input type="password" name="password" id="password" value="" required/>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <script>
            $( document ).ready(function() {
                $('#verify').click();

                $('#login').on('click', function() {
                    var phone = $('#phone').val();
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
            });
        </script>
    </body>
</html>
