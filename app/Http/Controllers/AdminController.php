<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Removal;
use App\Models\User;
use App\Models\Payment;
use App\Models\Invitation;
use App\Models\Chain;
use App\Models\About;
use App\Models\Blog;
use \stdClass;

class AdminController extends Controller
{
    public function index()
    {
        $users = Removal::all();
        return view('admin.home', compact('users'));
    }

    public function deleteAccount($phone)
    {
        $user = User::where('phone', $phone)->select('id', 'uuid')->get()->toArray();
        $id = $user[0]['id'];
        $uuid = $user[0]['uuid'];
        $invitation = Invitation::where('invited_by', $phone)->delete();
        $chain = Chain::where('started_by', $uuid)->delete();
        $payment = Payment::where('donor', $id)->delete();
        $removeUser = User::where('phone', $phone)->delete(); 
        $removeRequest = Removal::where('phone', $phone)->delete(); 
        return redirect()->back()->with('success', 'Account Removed Successfully');
    }

    public function editAbout(Request $request)
    {
        $abouts = About::all();
        return view('admin.abouts', compact('abouts'));
    }

    public function updateAbout(Request $request)
    {
        $validated = $request->validate([
            'image' => 'mimes:jpeg,jpg,png|max:2048',
        ]);
        $id = About::pluck('id')->first();
        $data = About::find($id);
        $bannerhead = $request->bannerhead;
        $bannerdesc = $request->bannerdesc;
        $heading = $request->heading;
        $desc1 = $request->desc1;
        $desc2 = $request->desc2;
        $image = $request->image;
        if($bannerhead){
            $data->bannerhead = $bannerhead;
        }
        if($bannerdesc){
            $data->bannerdesc = $bannerdesc;
        }
        if($heading){
            $data->heading = $heading;
        }
        if($desc1){
            $data->desc1 = $desc1;
        }
        if($desc2){
            $data->desc2 = $desc2;
        }
        if($image){
            $imagename = time().'.'.$image->getClientOriginalExtension();
            $image->move('images/about',$imagename);
            $data->image = $imagename;
        }

        if($bannerhead == '' && $bannerdesc == '' && $heading == '' && $desc1 == '' && $desc2 == '' && $image == ''){
            return redirect()->back()->with('success', 'Please enter details to update.');
        }

        $data->save();
        return redirect()->back()->with('success', 'About Updated Successfully');
    }

    public function getBlogs(Request $request)
    {
        $blogs = Blog::select('*')->orderBy('created_at', 'desc')->get();
        return view('admin.blogs', compact('blogs'));
    }

    public function deleteBlog($id)
    {
        $blog = Blog::find($id);
        $images = Blog::where('id', $id)->pluck('image')->toArray();
        foreach($images as $image){
            if(file_exists("images/blogs/".$image)){
                unlink("images/blogs/".$image);
            } 
        } 
        $blog->delete();
        return redirect()->back()->with('success', 'Blog Removed Successfully');
    }

    public function updateBlog(Request $request)
    {
        $validated = $request->validate([
            'image' => 'mimes:jpeg,jpg,png|max:2048',
            'heading' => 'required',
            'description' => 'required',
        ]);
        $id = $request->item_id;
        $data = Blog::find($id);
        $heading = $request->heading;
        $description = $request->description;
        $image = $request->image;
        if($image){
            $imagename = time().'.'.$image->getClientOriginalExtension();
            $image->move('images/blogs',$imagename);
            $data->image = $imagename;
        }
        $data->heading = $heading;
        $data->description = $description;
        $data->save();
        return redirect()->back()->with('success', 'Blog Updated Successfully');
    }

    public function addBlog(Request $request)
    {
        $validated = $request->validate([
            'image' => 'required|mimes:jpeg,jpg,png|max:2048',
            'heading' => 'required',
            'description' => 'required',
        ]);
        $data = new Blog;
        $image = $request->image;
        $imagename = time().'.'.$image->getClientOriginalExtension();
        $image->move('images/blogs',$imagename);
        $data->image = $imagename;
        $data->heading = $request->heading;
        $data->description = $request->description;
        $data->save();
        return redirect()->back()->with('success', 'Blog Added Successfully');
    }

    public function profile()
    {
        return view('admin.profile');
    }

    public function UploadFiles(Request $request)
    {
        // Allowed extentions.
        $allowedExts = array("gif", "jpeg", "jpg", "png");

        // Get filename.
        $temp = explode(".", $_FILES["up_image"]["name"]);

        // Get extension.
        $extension = end($temp);

        // An image check is being done in the editor but it is best to
        // check that again on the server side.
        // Do not use $_FILES["file"]["type"] as it can be easily forged.
        $finfo = finfo_open(FILEINFO_MIME_TYPE);
        $mime = finfo_file($finfo, $_FILES["up_image"]["tmp_name"]);

        if ((($mime == "image/gif")
        || ($mime == "image/jpeg")
        || ($mime == "image/pjpeg")
        || ($mime == "image/x-png")
        || ($mime == "image/png"))
        && in_array($extension, $allowedExts)) {
            // Generate new random name.
            $name = sha1(microtime()) . "." . $extension;

            // Save file in the uploads folder.
            move_uploaded_file($_FILES["up_image"]["tmp_name"], getcwd() . "/images/blogs/" . $name);

            // Generate response.
            $response = new StdClass;
            $response->link = "/images/blogs/" . $name;
            echo stripslashes(json_encode($response));
        }
    }
}
