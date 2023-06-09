<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <link rel="icon" href="{{URL::asset('images/favicon.png')}}"/>
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
        <link rel="stylesheet" type="text/css" href="{{URL::asset('css/bootstrap.min.css')}}" />
        <link rel="stylesheet" type="text/css" href="{{URL::asset('css/style.css')}}" />
        <link rel="stylesheet" type="text/css" href="{{URL::asset('css/responsive.css')}}" />
        <link rel="stylesheet" type="text/css" href="css/selectize.css" />
        <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/css/selectize.bootstrap3.min.css"/> -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/js/standalone/selectize.min.js" ></script>
        <script src="{{URL::asset('js/bootstrap.min.js')}}"></script>
        <script src="{{URL::asset('js/custom.js')}}"></script>
        <style>
            .selectize-contro{
                border-radius:36px !important;
                display:inline-block;
                overflow:hidden;
                background:#cccccc;
                border:1px solid #cccccc;
                }
        </style>
    </head>
    <body class="yellowbg white">
        <header>
            <div class="container">
                <div class="col-sm-4 logohead">
                    <a href="/create" class="logo">
                        <img src="{{URL::asset('images/logo.png')}}" class="img-fluid" />
                    </a>
                </div>
            </div>
        </header>
        <section class="middlebox">
            <div class="container">
                <div class="centerboxesform">
                    <div class="col-sm-9 pinkbox">
                        <div class="circleoxes">
                            <div class="cirlehead">
                                <p>Goodness awaits!</p>
                                <a class="homeicons" href="/">
                                    <img src="{{URL::asset('images/croxicon.png')}}" />
                                </a>
                                <span class="dektopimages mobile">
                                    <img src="{{URL::asset('images/payleftimage.png')}}">
                                </span>
                            </div>
                            <form method="POST" action="{{ url('donate') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="fulwidth margiboxed">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <input type="hidden" id="charity_ein" name="charity_ein" value="" required>
                                            <label>Find your Nonprofit:</label>
                                            <input type="text" id="search" list="org" onkeyup="getsearch()" name="org" class="form-control" placeholder="Start typing to find your NonProfit..." required />
                                        </div>
                                        <div class="form-group col-sm-12 ct">
                                            <!-- <select id="org" name="org" class="form-control ct" placeholder="Choose NonProfit" required>
                                                <option value="">Choose Your NonProfit</option>
                                            </select> -->
                                        </div>
                                    </div>

                                    <div class="col-sm-12 givebox">
                                        <div class="form-group row">
                                            <div class="containers col-4">
                                                <input type="radio" id="amount1" name="amount" value="5" />
                                                <label for="amount1">Give $5</label>
                                                <span id="check1" class="checkmark"></span>
                                            </div>
                                            <div class="containers col-4">
                                                <input type="radio" id="amount2" name="amount" value="10" checked />
                                                <label for="amount2">Give $10</label>
                                                <span id="check2" class="checkmark"></span>
                                            </div>
                                            <div class="containers col-4">
                                                <input type="radio" id="amount3" name="amount" value="20" />
                                                <label for="amount3">Give $20</label>
                                                <span id="check3" class="checkmark"></span>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="col-sm-12 likebox">
                                        <div class="form-group">
                                            <div class="checkboxx">
                                                <label class="containers">Add 2% Tip For mygoodness
                                                <input type="checkbox" name="tip" checked>
                                                <span class="checkmark"></span>
                                                </label>                                            
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <button type="submit" onclick="getorg()" class="startbtn">Donate with Paypal</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <span class="dektopimages">
                            <img src="{{URL::asset('images/payleftimage.png')}}">
                        </span>
                    </div>
                </div>
            </div>
        </section>
        
        @include('footer')
        
        <script>
            $(document).ready(function () {
                // $('select').selectize({
                //     sortField: 'text'
                // });
            });

            $('#check1').on('click', function() {
                $("#amount1").prop('checked', true);
                $("#amount2").prop('checked', false);
                $("#amount3").prop('checked', false);
            });
            $('#check2').on('click', function() {
                $("#amount2").prop('checked', true);
                $("#amount1").prop('checked', false);
                $("#amount3").prop('checked', false);
            });
            $('#check3').on('click', function() {
                $("#amount3").prop('checked', true);
                $("#amount2").prop('checked', false);
                $("#amount1").prop('checked', false);
            });

            function getsearch() {
                var org = $('#search').val();
                var len = org.length;
                if(len>=2){
                    $.ajax
                    ({
                        type: "post",
                        url: "{{url('/getsearch')}}",
                        // contentType: "application/json",
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        data: {org:org},
                        success: function(data)
                            {
                                var result = data;
                                $('.ct').html(result);
                            }
                    });
                }  
            }

            function getorg(){
                var ein = $('.orgoption').attr('data-id');
                $('#charity_ein').val(ein);
            }
        </script>
    </body>
</html>
