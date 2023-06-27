<?php

namespace App\Http\Controllers;
use libphonenumber\PhoneNumberUtil;
use libphonenumber\PhoneNumberFormat;
use libphonenumber\PhoneNumberType;
use App\Providers\Routing\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\User;
use Twilio\Rest\Client;
use Carbon\Carbon;
use App\Models\About;
use App\Models\Blog;
use URL;
use Session;
use Redirect;
use Laravel\Fortify\Contracts\LoginResponse;
use App\Models\Payment;

class HomeController extends Controller
{

    public function index()
    {
        // $link_url = URL::previous();
        if(URL::previous() == 'http://146.190.32.194/verification'){
            $link = null;
            // Session::put('intended', $link);
        }elseif(URL::previous() == 'http://146.190.32.194'){
            $link = null;
            // Session::put('intended', $link);
        }else{
            $link = URL::previous();
            Session::put('intended', $link);
        }
        // Session::forget('intended');
        $nav = Session::get('intended');
        return view('welcome', compact('nav'));
    }

    public function loginCheck()
    {
        Session::forget('chain');
        Session::forget('charity_ein');
        if (Auth::user()) {
            return 'found_user';
        }
        return 'login';
    }

    public function verification(Request $request)
    {

        $payments = Payment::all();
        $data = $request->validate([
          'phone' => ['required', 'string'],
        ]);
        $phoneNumberUtil = PhoneNumberUtil::getInstance();
        $phoneNumber = null;
        try {
             $phoneDigits = preg_replace('/\D/', '', $data['phone']);
             $phoneNumber = $phoneNumberUtil->parse($phoneDigits, 'US');

            } catch (\libphonenumber\NumberParseException $e) {
    // Handle parsing errors
          return redirect()->back()->with('success', 'Kindly enter a valid phone number.');
        }
        if (!$phoneNumberUtil->isValidNumber($phoneNumber)) {
          // Handle invalid phone numbers
          return redirect()->back()->with('success', 'Kindly enter a valid phone number.');
        }
        $mobile = $phoneNumberUtil->format($phoneNumber, PhoneNumberFormat::E164);

        $token = config('services.twilio.twilio_token');
        $twilio_sid = config('services.twilio.twilio_sid');
        $twilio_verify_sid = config('services.twilio.twilio_verify');
        $twilio = new Client($twilio_sid, $token);

        try {
            $twilio->verify->v2->services($twilio_verify_sid)->verifications->create($mobile, "sms");
          } catch (\Exception) {
            return redirect()->back()->with('success', 'Kindly enter a valid phone number without any symbols.');
          }

        $checkUser = User::select('*')->where('phone', $mobile)->get(); // check if user/mobile number is already exist
        $count = count($checkUser);
        if($count){

            return view('donation-counter', [
                'totalUsers' => count($payments),
                'mobile' => $mobile,
                'chainData' => '',
                'userData' => '',
            ]);
        }else{
            $user = new User;
            $user->uuid = Str::uuid();
            $user->name = 'User';
            $user->email = $mobile.'@mail.com';
            $user->phone = $mobile;
            $user->password = Hash::make('mygoodness@123');
            $user->save();

            return view('donation-counter', [
                'totalUsers' => count($payments),
                'mobile' => $mobile,
                'chainData' => '',
                'userData' => '',
            ]);

        }
    }

    public function verify(Request $request) // to verfy the entered OTP
    {
        $data = $request->validate([
            'code' => ['required'],
            'phone' => ['required', 'string'],
        ]);

        $token = config('services.twilio.twilio_token');
        $twilio_sid = config('services.twilio.twilio_sid');
        $twilio_verify_sid = config('services.twilio.twilio_verify');
        $twilio = new Client($twilio_sid, $token);
        $verification = $twilio->verify->v2->services($twilio_verify_sid)
        ->verificationChecks
        ->create(['code' => $data['code'], 'to' => $data['phone']]);
        if (true) {
            $user = tap(User::where('phone', $data['phone']))->update(['isVerified' => true]);
            return $this->login($request);
        }
        return 'error';
    }

    public function login(Request $request)
    {
        $mobile = $request->phone;

        $user  = User::where([['phone','=',$mobile],['isVerified', true]])->first(); // authenticate user
        if($user){
            Auth::login($user);
            User::where('phone','=',$mobile)->update(['isVerified' => false]);
            // return $user->email;
            return '/redirect';
        }
        else{
            return redirect('/')->with('success','Error');
        }
    }

    public function redirect()
    {
        $url = Session::get('intended');
        Session::forget('intended');
        $user = Auth::user()->id;
        $usertype = Auth::user()->role;
        if($usertype == 'admin'){
            return redirect('/admin');
        }else{
            if($url){
                return redirect($url);
                // return $url;
            }else{
                return redirect('/create');
                // return '/create';
            }
        }
    }

    public function about(Request $request)
    {
        $abouts = About::all()->toArray();
        return view('about', compact('abouts'));
    }

    public function blog(Request $request)
    {
        $blogs = Blog::select('*')->orderBy('created_at', 'desc')->paginate(4);
        return view('blog', compact('blogs'));
    }

    public function blogview(Request $request)
    {
        $id = $request->id;
        $blog = Blog::find($id)->toArray();
        return view('blogview', compact('blog'));
    }

    public function privacy(Request $request)
    {
        return view('privacy');
    }

    public function terms_of_service(Request $request)
    {
        return view('terms_of_service');
    }

    public function form(Request $request)
    {
        return view('donate');
    }
}
