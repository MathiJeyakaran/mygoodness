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
                <a href="/create" class="logo">
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
                        <p class="col-sm-6 notifications">Blogs
                            <a class="linkedit" href="#" data-toggle="modal" data-target="#addmodal"><i class="far fa-plus"></i></a>
                        </p>
                        <div class="editlink">
                        <a class="adminbtn" href="/admin">Home</a>
                        </div>
                    </div>
                    <div class="whitebgblog mt-5">
                        <div class="belowitems tablemidddd">
                            <table class="middletable">
                                <thead>
                                    <tr>
                                        <th style="width: 5% !important;"><b>Sr no.</b></th>
                                        <th style="width: 10% !important;"><b>Image</b></th>
                                        <th style="width: 10% !important;"><b>Heading</b></th>
                                        <th style="width: 15% !important;"><b>Description</b></th>
                                        <th style="width: 10% !important;"><b>Action</b></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($blogs as $key => $blog)                       
                                    <tr>
                                        <td style="width: 5% !important;">{{ $key+1 }}.</td>
                                        <td style="width: 10% !important;" class="image_{{$blog->id}}"><img src="images/blogs/{{$blog->image}}" alt="" width=100></td>
                                        <td style="width: 10% !important;" class="head_{{$blog->id}}">{{$blog->heading}}</td>
                                        <td style="width: 15% !important;" class="desc_{{$blog->id}}">{{$blog->description}}</td>
                                        <td style="width: 10% !important;">
                                        <a class="btn btn-primary btn-rounded edit-service" href="#" data-toggle="modal" data-id="{{$blog->id}}" data-target="#servicemodal">Edit</a>
                                        <a onclick="return confirm('Are you sure you want to remove this blog?');" href="/deleteBlog/{{$blog->id}}" style="color:white; background-color:indianred !important" class="delete-service btn btn-danger btn-rounded">Remove
                                            </a>
                                        </td>
                                    </tr>  
                                    @endforeach                      
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div id="addmodal" class="modal fade bd-example-modal-lg" role="dialog">
                        <div class="modal-dialog modal-lg modal-dialog-centered">
                            <!-- Modal content-->
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal"><img src="images/back.png"></button>
                                    <h4 class="modal-title">Add Blog</h4>
                                </div>
                                <div class="modal-body">
                                    <form id="myForm" method="POST" action="{{url('/addBlog')}}" enctype="multipart/form-data">
                                        @csrf                         
                                        <span class="forminput">
                                            <input style="color:black" type="text" name="heading" class="form-control" placeholder="Heading" required/>
                                        </span>
                                        <span class="forminput">
                                            <input style="color:black" type="text" name="description" class="form-control" required placeholder="Description" />
                                        </span>                       
                                        <span class="forminput">
                                            <input type="file" accept="image/png, image/gif, image/jpeg" name="image" id="image" class="form-control"  style="line-height: 20px;" required/>
                                        </span>
                                        <h6 class="forminput">File Type : Image, Max Size : 2MB</h6>
                                        <div class="col-sm-12 buttoncenter">
                                            <button type="submit" class="startbtn" onclick="return VerifyUploadSizeIsOK()">Add</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="servicemodal" class="modal fade bd-example-modal-lg" role="dialog">
                        <div class="modal-dialog modal-lg modal-dialog-centered">
                            <!-- Modal content-->
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal"><img src="images/back.png"></button>
                                    <h4 class="modal-title">Update Details!</h4>
                                </div>
                                <div class="modal-body">
                                    <form id="myForm1" method="POST" action="{{url('/updateBlog')}}" enctype="multipart/form-data">
                                        @csrf   
                                        <input type="hidden" name="item_id" id="item_id" value="">                         
                                        <span class="forminput">
                                            <input style="color:black" type="text" name="heading" id="heading" class="form-control" value="" placeholder="Heading" required/>
                                        </span>
                                        <span class="forminput">
                                            <input style="color:black" type="text" name="description" id="description" class="form-control" value="" placeholder="Description" required/>
                                        </span>                       
                                        <span class="forminput">
                                            <input type="file" accept="image/png, image/gif, image/jpeg" name="image" id="imageupdate" class="form-control" style="line-height: 20px;" />
                                        </span>
                                        <h6 class="forminput">File Type : Image, Max Size : 2MB</h6>
                                        <div class="col-sm-12 buttoncenter">
                                            <button type="submit" class="startbtn" onclick="return updateUploadSizeIsOK()">Update</button>
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
            $('#addmodal').on('hidden.bs.modal', function (e) {
                $('#myForm')[0].reset();
            })
        });
    setTimeout(function() {
        $('#alert').hide();

        }, 3000);

        $('.edit-service').on('click', function() {
            var id = $(this).attr('data-id');
            var head = $('.head_' + id).text();
            var desc = $('.desc_' + id).text();
            $('#heading').val(head);
            $('#description').val(desc);
            $('#item_id').val(id);
        }); 

        function VerifyUploadSizeIsOK()
        {
            var UploadFieldID = "image";
            var MaxSizeInBytes = 2097152;
            // var MaxSizeInBytes = 2097152;
            var fld = document.getElementById(UploadFieldID);
            if( fld.files && fld.files.length == 1 && fld.files[0].size > MaxSizeInBytes )
            {
                alert("The file size must be no more than " + parseInt(MaxSizeInBytes/1024/1024) + "MB");
                return false;
            }
            return true;
        }

        function updateUploadSizeIsOK()
        {
            var UploadFieldID = "imageupdate";
            var MaxSizeInBytes = 2097152;
            // var MaxSizeInBytes = 2097152;
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
