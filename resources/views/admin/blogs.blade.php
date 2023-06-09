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
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    <!-- froala editor -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/4.0.13/css/froala_editor.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/4.0.13/css/froala_editor.pkgd.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/4.0.13/css/froala_style.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/4.0.13/css/plugins.pkgd.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/4.0.13/css/plugins/files_manager.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/4.0.13/css/plugins/file.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/4.0.13/css/plugins/code_view.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/4.0.13/js/froala_editor.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/4.0.13/js/froala_editor.pkgd.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/4.0.13/js/plugins.pkgd.min.js"></script>
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/custom.js"></script>
    <script src="https://cdn.datatables.net/1.11.0/js/jquery.dataTables.min.js"></script>
	<script src="https://cdn.datatables.net/1.11.0/js/dataTables.bootstrap5.min.js"></script>
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
                        <p class="col-sm-6 notifications">
                            <a class="linkedit" href="#" data-toggle="modal" data-target="#addmodal">Blogs  <i class="far fa-plus"></i></a>
                        </p>
                        <div class="editlink">
                        <a class="adminbtn" href="/admin">Home</a>
                        </div>
                    </div>
                    <div class="whitebgblog mt-5">
                        <div class="belowitems tablemidddd">
                            <table class="middletable" id="services">
                                <thead>
                                    <tr>
                                        <th style="width: 5% !important;"><b>Sr no.</b></th>
                                        <th style="width: 10% !important;"><b>Image</b></th>
                                        <th style="width: 10% !important;"><b>Heading</b></th>
                                        <th style="width: 15% !important;"><b>Description</b></th>
                                        <th style="width: 10% !important;"><b>Action</b></th>
                                        <th style="display:none"><b>Details</b></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($blogs as $key => $blog)                       
                                    <tr>
                                        <td style="width: 5% !important;">{{ $key+1 }}.</td>
                                        <td style="width: 10% !important;" class="image_{{$blog->id}}"><img src="images/blogs/{{$blog->image}}" alt="" width=100 style="max-height: 150px;"></td>
                                        <td style="width: 10% !important;" class="head_{{$blog->id}}">{{$blog->heading}}</td>
                                        <td style="width: 15% !important;" class="desc1_{{$blog->id}}">{!!implode(' ', array_slice(explode(' ', $blog->description), 0, 20))!!}...</td>
                                        <td style="width: 10% !important;">
                                        <a class="btn btn-primary btn-rounded edit-service" href="#" data-toggle="modal" data-id="{{$blog->id}}" data-target="#servicemodal">Edit</a>
                                        <a onclick="return confirm('Are you sure you want to remove this blog?');" href="/deleteBlog/{{$blog->id}}" style="color:white; background-color:indianred !important" class="delete-service btn btn-danger btn-rounded">Remove
                                            </a>
                                        </td>
                                        <td style="width: 15% !important; display:none;" class="desc_{{$blog->id}}">{{$blog->description}}</td>
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
                                            <input style="color:black" maxlength="100" type="text" name="heading" class="form-control" placeholder="Heading" required/>
                                            <p>Max 100 characters</p>
                                        </span>
                                        <span class="forminput">
                                            <textarea id="desc" rows="4" cols="50" style="color:black" type="text" name="description" class="form-control" required placeholder="Description"></textarea>                    
                                        <p class="forminput">In description please paste copied content as plain text.</p>  
                                        </span> 
                                        <span class="forminput">
                                            <input type="file" accept="image/png, image/gif, image/jpeg" name="image" id="newimage" class="form-control"  style="line-height: 20px;" required/>
                                        </span>
                                        <h6 class="forminput">File Type : Image, Max Size : 2MB<br>Height: 400px, Width:600px</h6>
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
                                            <input style="color:black" type="text" maxlength="100" name="heading" id="heading" class="form-control" value="" placeholder="Heading" required/>
                                            <p>Max 100 characters</p>
                                        </span>
                                        <span class="forminput">
                                            <textarea rows="4" cols="50"  style="color:black" type="text" name="description" id="description" class="form-control" value="" placeholder="Description" required></textarea> 
                                        <p class="forminput">In description please paste copied content as plain text.</p> 
                                        </span>                     
                                        <span class="forminput">
                                            <input type="file" accept="image/png, image/gif, image/jpeg" name="image" id="imageupdate" class="form-control" style="line-height: 20px;" />
                                        </span>
                                        <h6 class="forminput">File Type : Image, Max Size : 2MB<br>Height: 400px, Width:600px</h6>
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
            new FroalaEditor('#desc',{                
                pastePlain: 'true',
                imageUploadURL: '/UploadFiles',  
                imageUploadMethod: 'POST',  
                imageUploadParam: 'up_image',
                imageUploadParams: {
                _token: "{{csrf_token()}}",
                froala: 'true',
                }
            });
            $('#services').DataTable();
            $('#addmodal').on('hidden.bs.modal', function (e) {
                $('#myForm')[0].reset();
            })
        });
        setTimeout(function() {
            $('#alert').hide();
        }, 3000);

        $('.linkedit').on('click', function(){
            $('#myForm')[0].reset();
        });

        $('.edit-service').on('click', function() {
            var id = $(this).attr('data-id');
            var head = $('.head_' + id).text();
            var desc = $('.desc_' + id).text();
            $('#heading').val(head);
            $('#description').val(desc);
            $(".fr-element").html(desc);
            // $('.fr-placeholder').hide();
            $('#item_id').val(id);            
            new FroalaEditor('#description',{
                pastePlain: 'true',
                imageUploadURL: '/UploadFiles',  
                imageUploadMethod: 'POST',  
                imageUploadParam: 'up_image',
                imageUploadParams: {
                _token: "{{csrf_token()}}",
                froala: 'true',
                }
            });
        }); 

        function VerifyUploadSizeIsOK()
        {
            var UploadFieldID = "newimage";
            var MaxSizeInBytes = 2097152;
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
            var fld = document.getElementById(UploadFieldID);
            if( fld.files && fld.files.length == 1 && fld.files[0].size > MaxSizeInBytes )
            {
                alert("The file size must be no more than " + parseInt(MaxSizeInBytes/1024/1024) + "MB");
                return false;
            }
            return true;
        }

        var _URL = window.URL || window.webkitURL;

        $("#newimage").change(function(e) {
            var file, img;
            if ((file = this.files[0])) {
                img = new Image();
                img.onload = function() {
                    if(this.width !== 600){
                        alert( "Width of image should be 600px");
                    }
                    if(this.height !== 400){
                        alert( "Height of image should be 400px");
                    }
                };
                img.onerror = function() {
                    alert( "not a valid file: " + file.type);
                };
                img.src = _URL.createObjectURL(file);
            }
        });
        $("#imageupdate").change(function(e) {
            var file, img;
            if ((file = this.files[0])) {
                img = new Image();
                img.onload = function() {
                    if(this.width !== 600){
                        alert( "Width of image should be 600px");
                    }
                    if(this.height !== 400){
                        alert( "Height of image should be 400px");
                    }
                };
                img.onerror = function() {
                    alert( "not a valid file: " + file.type);
                };
                img.src = _URL.createObjectURL(file);
            }
        });
</script>
</body>
</html>
