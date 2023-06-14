<!-- donation-counter.blade.php -->
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
    <link rel="stylesheet" type="text/css" href="css/styles.css" />
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
                    <p class="growhead">Better, together.</p>
                    <span class="smallgrowtext">
                        It’s easy to invest in your community, you just need a little help from your friends. Start today by inspiring a chain reaction of donations to trusted organizations that you and your people care about most.
                    </span>
                </div>

            </div>
            <div class="col-sm-12 grow">
                <div class="col-sm-8 growtext">
                    <break>
                <div class="circle-container">
                        <div class="circle">{{ $totalUsers }}</div>

                    </div>
                    <p class="circle-text">other donors already gave.</p>
                </div>
            </div>
                <div class="col-sm-4 growimage">
                <span class="images-left">
                        <img src="images/vector_48.png" class="img-fluid" />

                    </span>
                <span class="images">

                        <img src="images/Homeside.png" class="img-fluid" />
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
                                <li style="margin-bottom :10px;"><span class="circle-number">1</span><div class="teext1"><b>Donate</b> to a cause you care about.</div></li>

                                <li style="margin-bottom :10px;"><span class="circle-number">2</span><div class="teext1"><b>Tell three friends</b> to donate somewhere too. Think of it like a pyramid scheme for good.</div></li>

                                <li style="margin-bottom :10px;"><span class="circle-number">3</span><div class="teext1"><b>Follow along </b>as your investment influences others to give too.</div></li>
                            </ol>

                        </div>

                        </span>
                        <div class="growstar">
                    <span class="images-star">
                        <img src="images/stars.png" class="img-fluids" />
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
                        <img src="images/vector_46.png" class="img-fluid" />

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
                    <button type="button" class="close" data-dismiss="modal"><img src="images/back.png"></button>
                    <h4 class="modal-title">Welcome to mygoodness!</h4>
                </div>
                <div class="modal-body">
                    <form id="myForm" method="POST" action="{{url('/verification')}}" enctype="multipart/form-data">
                        @csrf
                        <p class="simply">Simply signin with your phone number</p>
                        <span class="forminput">
                            <input style="color:black" type="tel" name="phone" id="phone" minlength="10" maxlength="15" class="form-control" placeholder="Phone" required />
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

</body>
</html>
