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
                <a href="/admin" class="logo">
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
                <div class="middleboxesfull">
                    <div class="accounthead">
                        <p class="col-sm-12 notifications">About Us</p>
                        <div class="editlink">
                            <a class="adminbtn" href="/admin">Home</a>
                        </div>
                    </div>
                    <div class="whitebgblog mt-5">
                        <div class="belowitems tablemidddd">
                            <table class="middletable">
                                <thead>
                                    <tr>
                                        <th style="width: 100px !important;"><b>Image</b></th>
                                        <th style="width: 20px !important;"><b>BannerText</b></th>
                                        <th style="width: 20px !important;"><b>BannerDesc</b></th>
                                        <th style="width: 20px !important;"><b>Heading</b></th>
                                        <th style="width: 15px !important;"><b>Text1</b></th>
                                        <th style="width: 15px !important;"><b>Text2</b></th>
                                        <th style="width: 15px !important;"><b>Action</b></th>
                                    </tr>
                                </thead>
                                <tbody> 
                                    @foreach($abouts as $about)                       
                                    <tr>
                                        <td style="width: 100px !important;"><img src="images/about/{{$about->image}}" alt="" width=100></td>
                                        <td style="width: 20px !important;">{{$about->bannerhead}}</td>
                                        <td class="bannerDesc" style=" display:none;">{{$about->bannerdesc}}</td>
                                        <td class="" style="width: 20px !important;">{{implode(' ', array_slice(explode(' ', $about->bannerdesc), 0, 20))}}...</td>
                                        <td style="width: 20px !important;">{{$about->heading}}</td>
                                        <td class="desc1" style="display:none;">{{$about->desc1}}</td>
                                        <td class="desc2" style="display:none;">{{$about->desc2}}</td>
                                        <td class="" style="width: 20px !important;">{{implode(' ', array_slice(explode(' ', $about->desc1), 0, 20))}}...</td>
                                        <td class="" style="width: 20px !important;">{{implode(' ', array_slice(explode(' ', $about->desc2), 0, 20))}}...</td>
                                        <td style="width: 15px !important;">
                                        <a class="btn btn-primary btn-rounded edit-service" href="#" data-toggle="modal" data-id="{{$about->id}}" data-target="#servicemodal">Edit</a>
                                        </td>
                                    </tr>  
                                    @endforeach                      
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div id="servicemodal" class="modal fade bd-example-modal-lg" role="dialog">
                        <div class="modal-dialog modal-lg">
                            <!-- Modal content-->
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal"><img src="images/back.png"></button>
                                    <h4 class="modal-title">Update Details!</h4>
                                </div>
                                <div class="modal-body">
                                    <form id="myForm" method="POST" action="{{url('/updateAbout')}}" enctype="multipart/form-data">
                                        @csrf                            
                                        <span class="forminput">
                                            <input style="color:black" maxlength="100" type="text" name="bannerhead" id="bannerhead" class="form-control" value="{{$about->bannerhead}}" placeholder="BannerText" />
                                            <p>Max 100 characters</p>
                                        </span>
                                        <span class="forminput">
                                            <textarea rows="2" cols="50" style="color:black" type="text" name="bannerdesc" id="bannerdesc" class="form-control" value="" placeholder="BannerDesc"></textarea>
                                        </span>
                                        <span class="forminput">
                                            <input style="color:black" maxlength="100" type="text" name="heading" id="heading" class="form-control" value="{{$about->heading}}" placeholder="Heading" />
                                            <p>Max 100 characters</p>
                                        </span>
                                        <span class="forminput">
                                            <textarea rows="4" cols="50"  style="color:black" type="text" name="desc1" id="desc1" class="form-control" value="" placeholder="Desc1"></textarea>
                                        </span>
                                        <span class="forminput">
                                            <textarea rows="4" cols="50"  style="color:black" type="text" name="desc2" id="desc2" class="form-control" value="" placeholder="Desc2"></textarea>
                                        </span>                            
                                        <span class="forminput">
                                            <input type="file"  style="line-height: 20px;" accept="image/png, image/gif, image/jpeg" name="image" id="image" class="form-control" />
                                        </span>
                                        <div class="col-sm-12 buttoncenter">
                                            <button type="submit" class="startbtn" onclick="return VerifyUploadSizeIsOK()">Update</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@include('footer')
<script>
    $( document ).ready(function() {
            var bannerDesc = $('.bannerDesc').text();
            var desc1 = $('.desc1').text();
            var desc2 = $('.desc2').text();
            $('#bannerdesc').val(bannerDesc);
            $('#desc1').val(desc1);
            $('#desc2').val(desc2);
        });
    setTimeout(function() {
        $('#alert').hide();

        }, 3000);

        function VerifyUploadSizeIsOK()
        {
            var UploadFieldID = "image";
            var MaxSizeInBytes = 2097152;
            var fld = document.getElementById(UploadFieldID);
            if( fld.files && fld.files.length == 1 && fld.files[0].size > MaxSizeInBytes )
            {
                alert("The file size must be no more than " + parseInt(MaxSizeInBytes/1024/1024) + "MB");
                return false;
            }
            return true;
        }
</script>
</body>
</html>
