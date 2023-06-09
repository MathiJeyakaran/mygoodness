<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <link rel="icon" href="{{URL::asset('images/favicon.png')}}" />
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
    <link rel="stylesheet" type="text/css" href="account/css/style.css" />
    <link rel="stylesheet" type="text/css" href="css/responsive.css" />
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> -->
    <script src="js/bootstrap.min.js"></script>
    <script src="js/custom.js"></script>
</head>
<body class="mt-5" style="background:#F5F5F5">
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
            <div style="height:30px">
                <div id="alert" class="">
                    @if(Session::has('success'))
                    <div class="prohead" role="alert">
                        <u>{{Session::get('success')}}</u>
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
            <div class="myaccount">
                <div class="whitebg mb-2">
                    <div class="belowitems">
                        <center>
                        <p class="notifications mt-5 mb-5" style="font-size:48px; line-height: 48px;">{{$blog['heading']}}</p>
                        <!-- <p class="mt-3 mb-5" style="font-size:24px; font-weight:400">You gave $5 to Everytown for Gun Safety. Start a chain reaction by asking 3 friends to give too.</p>                         -->
                        </center>
                    </div>
                </div>
    <div class="middleboxesfull mt-2">
        <div class="row mt-2 col-text">
            <div class="col-12">
                <p>{!!$blog['description']!!}</p>
            </div>
        </div>        
    </div>
    <div class="desktopview col-sm-12">
        <div class="paddingBlog">
            <img src="images/blogs/{{$blog['image']}}" class="" style="height:400px; width: 600px;">
        </div>
    </div>
    <div class="mobileview">
        <div class="">
            <img src="images/blogs/{{$blog['image']}}" class="paddingBlog">
        </div>
    </div>
</div>
</div>
</section>
@include('footer')
<script>
</script>
</body>
</html>
