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
    <link rel="stylesheet" type="text/css" href="admins/css/style.css" />
    <link rel="stylesheet" type="text/css" href="css/responsive.css" />
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/custom.js"></script>
</head>
<body class="yellowbg">
    <header>
        <div class="container">
            <div class="col-sm-4 logohead">
                <a href="#" class="logo">
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
                        <span class="prohead">{{Auth::user()->name}}</span>
                        <a href="/profile"><i title="Edit Profile"data-toggle="modal" data-target="#myModal" class="far fa-edit"></i></a>
                    </div>
                    <div class="protexts">
                        <span class="emailtext">{{Auth::user()->email}}</span>
                    </div>
                    <div class="protexts">
                        <span class="emailtext">{{Auth::user()->phone}}</span>
                    </div>
                </div>
                <div class="middleboxesfull">
                    <div class="accounthead desktopview">
                            <p class="col-sm-12 notifications">Account Removal Requests</p>
                            <div class="editlink">
                                <a class="adminbtn" href="/editAbout">About Us</a>
                                <a class="adminbtn" href="/getBlogs">Blogs</a>
                            </div>
                    </div>
                    <div class="mobileview row">                        
                        <p class="col-sm-4 notifications">Account Removal<br> Requests</p>
                        <div class="accounthead col-sm-8">
                            <div class="editlink">
                                <a class=" adminMbtn" href="/editAbout">About Us</a>
                                <a class=" adminMbtn" href="/getBlogs">Blogs</a>
                            </div>
                        </div>
                    </div>
                    <div class="whitebgblog mt-5">
                        <div class="belowitems tablemidddd">
                            <table class="middletable">
                                <thead>
                                    <tr>
                                        <th style="width: 100px !important;"><b>Date</b></th>
                                        <th style="width: 20px !important;"><b>Username</b></th>
                                        <th style="width: 20px !important;"><b>Email</b></th>
                                        <th style="width: 20px !important;"><b>Phone</b></th>
                                        <th style="width: 15px !important;"><b>Action</b></th>
                                    </tr>
                                </thead>
                                <tbody> 
                                    @foreach($users as $user)                       
                                    <tr>
                                        <td style="width: 100px !important;">{{date('M-d-Y', strtotime($user->created_at))}}</td>
                                        <td style="width: 20px !important;">{{$user->name}}</td>
                                        <td style="width: 20px !important;">{{$user->email}}</td>
                                        <td style="width: 20px !important;">{{$user->phone}}</td>
                                        <td style="width: 15px !important;">
                                            <a onclick="return confirm('Are you sure you want to remove this account?');" href="/deleteAccount/{{$user->phone}}" style="color:white; background-color:indianred !important" class="delete-service btn btn-danger btn-rounded">Remove
                                            </a>
                                        </td>
                                    </tr>  
                                    @endforeach                      
                                </tbody>
                            </table>
                        </div>
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
</script>
</body>
</html>
