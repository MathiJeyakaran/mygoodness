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
    <!-- <style>
        mark{
            background-color: #ffdd4b !important;
        }

        .nopadding {
            padding-right: 0px !important;
            padding-left: 0px !important;
        }
    </style> -->

    <link rel="stylesheet" type="text/css" href="https://site-assets.fontawesome.com/releases/v5.15.4/css/all.css" />
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="account/css/style.css" />
    <link rel="stylesheet" type="text/css" href="css/responsive.css" />
    <style>
        mark{
            background-color: #ffdd4b !important;
        }

        .nopadding {
            padding-right: 0px !important;
            padding-left: 0px !important;
        }
    </style>
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
                <div class="" style="margin-bottom:100px">
                    <div class="belowitems">
                        <p class="notifications mt-3 mb-4" style="font-size:48px; line-height:48px">Welcome to mygoodness!</p>
                    </div>
                </div>
                <div class="form-group">
                    <input style="background: url('https://static.thenounproject.com/png/101791-200.png') no-repeat left; background-size: 20px;padding-left: 25px;" type="search" id="myInput" onkeyup='blogsearch()' placeholder="Search" class="form-control mt-5">
                </div> 
                <div class="col-sm-12 nopadding threeboxs" id="blogs" style="min-height:700px;"> 
                    @foreach($blogs as $blog)
                    <a href="/blogview?id={{$blog->id}}&&view=mygoodnessblogs">
                        <div class="col-sm-6 nopadding boxesone mt-5">
                                <div class="paddingBlog desktopview">
                                    <img class="" src="images/blogs/{{$blog->image}}" alt="" style="height:300px; width: 540px;">
                                </div>
                                <div class="mobileview">
                                    <div class="">
                                        <img src="images/blogs/{{$blog['image']}}" class="paddingBlog">
                                    </div>
                                </div>
                            <p class="col-sm-12 notifications mt-5 head" style="font-size:48px">{{implode(' ', array_slice(explode(' ', $blog->heading), 0, 2))}}...</p>
                            <div class="col-12 blog-col mt-5">                         
                                <div id="paragraph" class="head blogtext">{!!implode(' ', array_slice(explode(' ', $blog->description), 0, 32))!!}...</div>
                            </div>
                        </div>
                    </a>
                    @endforeach
                </div>
            </div>
            <div class="d-flex justify-content-center">
                {{ $blogs->links('pagination::bootstrap-4') }}
            </div>
        </div>
    </section>
@include('footer')
<script>
    $(document).ready(function () {
        const search = document.getElementById('myInput');

        search.addEventListener('input', evt => {
            if(!evt.inputType && search.value === ''){
                blogsearch();
            }
        });
    });
    // function hideIcon(self) {
    //     // onfocus="hideIcon(this)"(copy this in input tag)
    //     self.style.backgroundImage = 'none';
    // }

    function blogsearch() {
        let input = document.getElementById('myInput').value
        input=input.toLowerCase();
        let x = document.getElementsByClassName('boxesone');        
        for (i = 0; i < x.length; i++) { 
            if (!x[i].innerHTML.toLowerCase().includes(input)) {
                x[i].style.display="none";
            }
            else {
                x[i].style.display="block";            
            }
        }
    }
</script>
</body>
</html>
