<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <link rel="icon" href="images/favicon.png" />
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
                <div class="centerboxesform">
                    <div class="donatebox">
                        <div class="tickicon">
                            <i class="fal fa-check"></i>
                        </div>
                        <p class="donate">Donation confirmed!</p>
                        <span class="donatetext">You just completed one link in a chain of generosity. Next, your friends can keep the chain going by giving to the nonprofit you chose or to a different nonprofit of their choosing.</span>
                        <div class="buttons">
                            <a id="friebnds" href="/share" class="startbtn">Choose Friends</a>
                            <a id="next" href="/share" class="startbtn">Next</a>
                        </div>
                        <div class="bottomimages">
                        <div class="desktopview">
                            <span class="images">
                                <img src="images/donatebottom.png" class="img-fluid">
                            </span>
                        </div>
                        <div class="mobileview">
                            <span class="images">
                                <img src="images/mobilebottom.png" class="img-fluid">
                            </span>
                        </div>
                    </div>
                    </div>
                    
                </div>
            </div>
        </section>
        
        @include('footer')
        
    </body>
</html>
