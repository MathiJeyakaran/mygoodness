<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <link rel="icon" href="{{URL::asset('images/favicon.png')}}" />
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
        <link rel="stylesheet" type="text/css" href="{{URL::asset('css/selectize.css')}}" />
        <link rel="stylesheet" type="text/css" href="https://site-assets.fontawesome.com/releases/v5.15.4/css/all.css" />
        <link rel="stylesheet" type="text/css" href="{{URL::asset('css/bootstrap.min.css')}}" />
        <link rel="stylesheet" type="text/css" href="{{URL::asset('css/style.css')}}" />
        <link rel="stylesheet" type="text/css" href="{{URL::asset('css/responsive.css')}}" />
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/js/standalone/selectize.min.js" ></script>
        
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
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
            .pick{
                color:grey !important;
                }
                /* .selectize-control.single .selectize-input:after {
                    content: ' ';
                    display: none;
                    position: absolute;
                    top: 50%;
                    right: 17px;
                    margin-top: -3px;
                    width: 0;
                    height: 0;
                    border-style: solid;
                    border-width: 5px 5px 0 5px;
                    border-color: #333333 transparent transparent transparent;
                } */
        </style>
    </head>
    <body class="yellowbg white">
        <header>
            <div class="container">
                <div class="col-sm-4 logohead">
                    <a href="/" class="logo">
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
                            <div class="cirlehead" style="margin-top: -10px;">
                                <p>Goodness awaits!</p>
                                <h5>Match {{$friend}}'s donation to keep the good going.</h5>
                                <a class="homeicons" href="/">
                                    <img src="{{URL::asset('images/croxicon.png')}}" />
                                </a>
                                <span class="dektopimages mobile">
                                    <img src="{{URL::asset('images/payleftimage.png')}}">
                                </span>
                            </div>
                            <form id="myForm" method="POST" action="{{ url('donate') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="fulwidth margiboxed">
                                    <div id="orgFix" class="col-sm-12 likebox mb-3 orgFix">
                                        <div class="form-group">
                                            <div class="checkboxx">
                                                <label class="containers mb-4"><span style="font-family: 'Barlow'; font-weight: 400; font-size: 24px; color: #000000;">Give to {{$userName}}'s {{$org}}</span>
                                                <input type="checkbox" id="fixOrg" checked>
                                                <span class="checkmark" id="tickedCheck"></span>
                                                </label>        
                                                <label id="pick" class="pick" style="font-family: 'Barlow'; font-weight: 400; font-size: 24px; color: #000000;">Or pick a different nonprofit:</label>                                    
                                            </div>
                                        </div>
                                    </div>
                                    <div id="searchOrg" class="col-sm-12">
                                        <div class="form-group">
                                            <!-- <label>Or pick a different nonprofit:</label> -->
                                            <input type="hidden" id="charity_name" name="charity_name" value="">
                                            <select class="form-control ct" id="org" name="org" placeholder="Start typing to find your nonprofit..." required>
                                                <option value="{{$ein}}">{{$org}}</option>
                                                
                                            </select>
                                            <h6 id="pEnter" class="pick">Press enter to search</h6>
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
                                                <label class="containers">Add 2% tip for mygoodness
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
                $('select').selectize({
                    sortField: 'text'
                });
                $('.selectize-control').prop("disabled", true);
                $('.item').addClass('pick');
                // $('#org-selectized').val('{{$org}}');
                // getsearch();

                $(document).on('keyup', '.selectize-input', function(e) {
                    var keyCode = e.keyCode || e.which;
                    if (keyCode === 13) { 
                        if($('#fixOrg').prop('checked') == true){
                         alert('Want to give to a different nonprofit? No problem! Just uncheck the box above first.');
                        } else {
                            e.preventDefault();
                            getsearch();
                        }                         
                    }
                    var key = e.keyCode || e.charCode;
                    if (key == 8 || key == 46) {
                        if($('#fixOrg').prop('checked') == true){
                            alert('Want to give to a different nonprofit? No problem! Just uncheck the box above first.');
                        } else {
                            $('.selectize-dropdown-content').remove();
                        }                         
                    }
                });

                $(document).on('change', '#fixOrg', function(e) {
                    if($('#fixOrg').prop('checked') == true){
                        // $('#org-selectized').val('{{$ein}}');
                        // getsearch();
                        // $('#pick').addClass('pick');
                        window.location.reload();
                    }else{
                        $('#pick').removeClass('pick');
                        $('.item').removeClass('pick');
                        $('#pEnter').removeClass('pick');
                    }
                });

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

            document.getElementById("myForm").onkeypress = function(e) {
                var key = e.charCode || e.keyCode || 0;     
                if (key == 13) {
                getorg();
                e.preventDefault();
                }
            } 

            function getorg(){
                var name = $('.item').text();
                $('#charity_name').val(name);
            }

            function getsearch() {
                var org = $('#org-selectized').val();
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
                                $('select').selectize({
                                    sortField: 'text',                                       
                                });
                                $('#org-selectized').click();
                            }
                    });
                } else {
                    alert('Please type atleast two characters');
                }  
            }
            
        </script>
    </body>
</html>
