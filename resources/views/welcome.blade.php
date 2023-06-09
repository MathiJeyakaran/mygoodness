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
    <link href="https://fonts.googleapis.com/css2?family=Barlow+Condensed:wght@300;400;500;600;700;800;900&family=Barlow:wght@100;200;300;400;500;600;700;800;900&family=Roboto+Slab:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet" />

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
                <a class="logo">
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
                    <button class="startbtn" id="start" data-toggle="modal" data-target="">Start Giving</button>
                    <a data-toggle="modal" id="login_required" data-target="#myModal"></a>
                    <a href="/create" class="user_found" id="user_found"></a>
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
                    <h4 class="modal-title">Welcome to mygoodness!</h4>
                </div>
                <div class="modal-body">
                    <form id="myForm" method="POST" action="{{url('/verification')}}" enctype="multipart/form-data">
                        @csrf
                        <p class="simply">Simply signin with your phone number</p>
                        <span class="forminput">
                            <input style="color:black" type="tel" name="phone" id="phone" minlength="10" maxlength="10" class="form-control" placeholder="Phone" required />
                            <em class="ustext">US only</em>
                        </span>
                        <h6 class="error mt-2" style="color:red;">{{Session::get('success')}}</h6>
                        <div class="col-sm-12 buttoncenter">
                            <button type="submit" class="startbtn">Let’s go!</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            if ('{{$nav}}' !== '{{url(' / ')}}') {
                if (!'{{Auth::user()}}') {
                    $('#login_required').click();
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

</html>