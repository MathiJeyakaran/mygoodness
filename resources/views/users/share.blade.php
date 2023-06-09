<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <link rel="icon" href="images/favicon.png">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css2?family=Karla:wght@300;400;500;600;700;800&amp;display=swap" rel="stylesheet">
    <title>{{ config('app.name', 'mygoodness') }}</title>
    <!--fonts-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Barlow+Condensed:wght@300;400;500;600;700;800;900&family=Barlow:wght@100;200;300;400;500;600;700;800;900&family=Roboto+Slab:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="https://site-assets.fontawesome.com/releases/v5.15.4/css/all.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/responsive.css">
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/custom.js"></script>
</head>
    <body class="yellowbg greenbg">
        <header>
            <div class="container">
                 <div class="col-sm-4 logohead">
                    <a href="/" class="logo">
                        <img src="images/logo.png" class="img-fluid">
                    </a>
                </div>
            </div>
        </header>
        <section class="middlebox">
            <div class="container">
                <div style="height:30px">
                    <div id="alert" class="">
                        <!-- @if(Session::has('success'))
                        <div class="prohead" role="alert">
                            <u><h6>{{Session::get('success')}}</h6></u>
                        </div>
                        @endif -->

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
                <div class="col-sm-10 mainheading">
                    <div class="mobileviews">
                        <div class="col-sm-4 lefticons">
                            <span class="images">
                                <img src="images/friendsleft.png" class="img-fluid">
                            </span>
                        </div>
                        <div class="col-sm-8 textformat">
                           <p class="donate">Let’s keep the goodness going.</p>
                            <span class="donatetext">You gave ${{Session::get('amount')}} to {{$charity}}. Start a chain reaction by asking 3 friends to give too. </span>
                        </div>
                    </div>
                    <div class="deskviews">
                        <p class="donate">Let’s keep the goodness going.</p>
                    <span class="donatetext">You gave ${{Session::get('amount')}} to {{$charity}}. Start a chain reaction by asking 3 friends to give too. </span>
                    </div>
                    <form method="POST" action="{{ url('invite') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="col-sm-8 formwhite">
                        <div class="paddingss">                            
                            <p class="linktext">Your friends will receive a message with a link:</p>
                            <div class="col-sm-12 form-group">
                                <input type="hidden" name="org" value="{{$org}}">
                                <!-- <input type="hidden" name="message" value="Let's do something good. {{Auth::user()->name}} donated to '{{$charity}}' with givemygoodness.org and thinks you should too. Give $5 and help spark a chain of generosity. Join us here: {{url('invites')}}?friend={{Auth::user()->name}}&&ein={{$org}}&&chain={{$chain_id}}" /> -->
                                <textarea class="form-control" name="message">Let's do something good. {{Auth::user()->name}} donated to "{{$charity}}" with givemygoodness.org and thinks you should too. Give $5 and help spark a chain of generosity. Join us here: {{url('invites')}}?friend={{$friend}}&&ein={{$org}}&&chain={{$chain_id}}                                    
                                </textarea>
                            </div>
                            <div class="col-sm-12 form-group">
                                <input style="color:black" class="form-control" type="tel" minlength="10" title="Please Enter Valid 10 digits Phone Number" placeholder="phone number" name="invitee_1" required />                                
                            </div>
                            <div class="col-sm-12 form-group">
                                <input style="color:black" class="form-control" type="tel" minlength="10" title="Please Enter Valid 10 digits Phone Number" placeholder="phone number" name="invitee_2" />
                            </div>
                            <div class="col-sm-12 form-group">
                                <input style="color:black" class="form-control" type="tel" minlength="10" title="Please Enter Valid 10 digits Phone Number" placeholder="phone number" name="invitee_3" />
                                <!-- <em class="ustext">US only</em> -->
                            </div>
                            <h6 class="error mt-2 text-center" style="color:red;">{{Session::get('success')}}</h6>
                            
                            <!-- <div class="addbtn">
                                <a href=""><i class="fas fa-plus-circle"></i></a>
                            </div> -->
                            <div class="bottomimagesshow">
                                <div class="col-sm-6 leftside">
                                    <span class="images">
                                        <img src="images/friendsleft.png" class="img-fluid">
                                    </span>
                                </div>
                                <div class="col-sm-6 rightside">
                                    <span class="images">
                                        <img src="images/friendsshare.png" class="img-fluid">
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12 likebox margin">
                            <div class="form-group">
                                <div class="checkboxx">
                                    <!-- <label class="containers">Send me weekly updates on my chain reaction via text
                                      <input type="checkbox" />
                                      <span class="checkmark"></span>
                                    </label> -->
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12 pt-2 pb-4 send">
                            <button type="submit" class="startbtn">Send</button>
                        </div>
                        <div class="col-sm-12 bottomimagesshowmobile">
                            <span class="images">
                                <img src="images/friendsshare.png" class="img-fluid">
                            </span>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </section>
        
        @include('footer')

        <script>
            setTimeout(function() {
                $('#alert').hide();

                }, 3000);
            $( document ).ready(function() {
                if('{{$org}}' == ""){
                    alert('Please make a donation before sharing');
                    window.location.href = "/create";
                }
            });
        </script>
        
    </body>
</html>
