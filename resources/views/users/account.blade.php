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
                <form method="POST" action="{{ route('logout') }}" onsubmit="return confirm('You may logout !');">
                    <p class="accounthead">
                        @csrf
                        <a style="cursor:pointer" class="editlink"
                        onclick="event.preventDefault();
                        this.closest('form').submit();">Log out <i class="far fa-sign-out"></i></a>                    
                    </p>
                </form>
                <div class="profiletext">
                    <div class="protexts">
                        <span class="prohead">{{$user->name}}</span>
                        <i title="Edit Profile" style="cursor:pointer" data-toggle="modal" data-target="#myModal" class="far fa-edit"></i>
                    </div>
                    <div class="protexts">
                        <span class="emailtext">{{$user->email}}</span>
                    </div>
                    <div class="protexts">
                        <span class="emailtext">{{$user->phone}}</span>
                    </div>
                </div>
                <div id="myModal" class="modal fade" role="dialog">
                    <div class="modal-dialog">
                        <!-- Modal content-->
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal"><img src="images/back.png"></button>
                                <h4 class="modal-title">Update Profile!</h4>
                            </div>
                            <div class="modal-body">
                                <form id="myForm" method="POST" action="{{url('/updateUser')}}" enctype="multipart/form-data">
                                    @csrf
                                    <label class="simply">Name :
                                    <span class="forminput">
                                        <input type="text" name="name" id="name" minlength="3" maxlength="30" class="form-control" placeholder="{{$user->name}}" onkeydown="return /[a-zA-Z\s]/i.test(event.key)" />
                                    </span></label>
                                    <label class="simply">Email :
                                    <span class="forminput">
                                        <input type="email" name="email" id="email" class="form-control" pattern="[a-zA-Z0-9.-_]{1,}@[a-zA-Z.-]{2,}[.]{1}[a-zA-Z]{2,}" title="Please Enter Valid Email Like : example@mail.com" id="Email" placeholder="{{$user->email}}" />
                                    </span></label>
                                    <div class="col-sm-12 buttoncenter">
                                        <button type="submit" class="startbtn">Update</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="whitebg">
                    <p class="notifications">Notifications Frequency:</p>
                    <div class="belowitems">
                        <!-- <label class="frequency">Frequency:</label> -->
                        <center>
                            <form method="POST" action="{{url('/updateNotify')}}" enctype="multipart/form-data">
                                @csrf
                                <div class="col-sm-12 givebox widths">
                                    <div class="col-sm-4 paddingbox">
                                        <div class="checkboxx">
                                            <label class="containers">Weekly
                                            <input type="radio" id="notify_1" checked name="notify" value="weekly">
                                            <span class="checkmark"></span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-sm-4 paddingbox">
                                        <div class="checkboxx">
                                            <label class="containers">Monthly
                                            <input type="radio" id="notify_2" name="notify" value="monthly">
                                            <span class="checkmark"></span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-sm-4 paddingbox">
                                        <div class="checkboxx">
                                            <label style="width:237px" class="containers">Unsubscribe from updates
                                            <input type="radio" id="notify_3" name="notify" value="unsubscribe">
                                            <span class="checkmark"></span>
                                            </label>
                                        </div>
                                    </div>
                                </div> 
                                <div class="col-sm-12 centertext mt-5">
                                    <button type="submit" class="startbtn">Save</button>
                                </div> 
                            </form>
                        </center>
                    </div>
                </div>
        <!-- <div class="col-sm-12 centertext">
            <button type="submit" class="startbtn">Save</button>
        </div> -->
    <div class="middleboxesfull">
        <p class="col-sm-12 notifications">Transactions</p>
        <div class="whitebg">
            <div class="belowitems tablemidddd">
                <table class="middletable">
                    <thead>
                        <tr>
                            <th style="width: 216px !important;"><b>Date</b></th>
                            <th><b>Nonprofit</b></th>
                            <th style="width: 216px !important;"><b>Amount</b></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($donations as $donation)
                        <tr>
                            <td style="width: 216px !important; padding: 10px 5px !important;">{{date('d-m-y', strtotime($donation['created_at']))}}</td>
                            <td><a target=_blank href="/growing?chain={{$donation['chain']}}">{{$donation['nonprofit']}}</a></td>
                            <!-- <td>{{$donation['nonprofit']}}</td> -->
                            <td style="width: 216px !important;">${{$donation['donation_amount']}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="whitebg">
        <p class="notifications">Right to be forgotten</p>
        <div class="belowitems">
            <span class="bellowtexss">
                You have the right to be forgotten (RTBF). We will review your request in line with the specifications set out by the GDPR and action your request accordingly. Your request can take up to 28 calendar days to process and you have the option to cancel this request during this period.
            </span>
            <form method="POST" action="{{url('/removeAccount')}}" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="subject" value="Remove Account">
                <div class="fullwidths">
                    <div class="col-sm-6">
                        <label>Name <em class="red" id="Cname" style="display:none">*</em></label>
                        <input type="text" class="form-control" id="Rname" name="name" required>
                    </div>
                    <div class="col-sm-6">
                        <label>Email <em class="red" id="Cemail" style="display:none">*</em></label>
                        <input type="email" class="form-control" id="Remail" name="email" required>
                    </div>
                    <div class="col-sm-12 centertext submit">
                        <button type="submit" class="startbtn" onclick="checkValue()">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
</div>
</section>
@include('footer')
<script>
    setTimeout(function() {
        $('#alert').hide();

        }, 3000);
        $( document ).ready(function() {
            if('{{$notify}}' == 'weekly') {
                $("#notify_1").prop('checked', true);
            }
            if('{{$notify}}' == 'monthly') {
                $("#notify_2").prop('checked', true);
            }
            if('{{$notify}}' == 'unsubscribe') {
                $("#notify_3").prop('checked', true);
            }
        });

        function checkValue() {
            var name = $('#Rname').val();
            var email = $('#Remail').val();
            console.log(name);
            if(name == ""){
                $('#Cname').show();
            }
            if(email == ""){
                $('#Cemail').show();
            }
        }
</script>
</body>
</html>
