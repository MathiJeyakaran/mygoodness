<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Chain;
use App\Models\Payment;
use App\Models\User;
use App\Models\Removal;
use Auth;
use Twilio\Rest\Client;
use DB;
use Carbon\Carbon;
use Mail;

class AccountController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $donations = Payment::where('donor', $user->id)->whereNot('charity_ein', 'mygoodness')->get()->toArray();
        $notify = 'weekly';
        return view('users.account', compact('user', 'donations', 'notify'));
    }

    public function updateUser(Request $request)
    {
        $email = $request->email;
        $name = $request->name;
        $id = Auth::user()->id;
        $validated = $request->validate([
            'email' => 'max:255|unique:users,email,'.$id,
        ]);
        $user = User::find($id);
        if($name){
            $user->name = $request->name;
        }
        if($email){
            $user->email = $email;
        }
        $user->save();
        return redirect()->back()->with('success', 'Profile Updated Successfully');
    }

    public function updateNotify(Request $request)
    {
        $date = date('Y-m-d');
        $notify = $request->notify;
        if($notify == 'weekly'){
            $notify_on = date('Y-m-d', strtotime($date . " +7 days"));
        }
        if($notify == 'monthly'){
            $notify_on = date('Y-m-d', strtotime($date . " +30 days"));
        }
        if($notify == 'unsubscribe'){
            $notify_on = null;
        }
        $id = Auth::user()->id;
        $user = User::find($id);
        $user->notify = $notify;
        $user->notify_on = $notify_on;
        $user->save();
        return redirect()->back()->with('success', 'Notifications Updated Successfully');
    }

    public function notification(Request $request)
    {
        $today = date('Y-m-d');
        $users = User::select('id','phone','name','notify')->where('notify_on', $today)->get();
        $twilio_token = config('services.twilio.twilio_token'); //for US numbers
        $twilio_sid = config('services.twilio.twilio_sid'); //for US numbers
        // $twilio_token = '2a5e633d99a48ccd18eb7a2f55a2bb23'; //for Indian numbers
        // $twilio_sid = 'AC43282835884e5a538f50c0816a17cf1a'; //for Indian numbers
            foreach ($users as $user) {
                $id = $user->id;
                $chain = Payment::where('donor', $id)->whereNot('charity_ein', 'mygoodness')->get();
                $chain = count($chain);
                $phone = $user->phone;
                $name = $user->name;
                $notify = $user->notify;
                $message = 'Hi '.$name.', thanks for donating to Mygoodness and being the part of '.$chain.' chains, click the link below to see how the goodness is growing: '.url("my_account");
                $client = new Client($twilio_sid, $twilio_token);
                $sms = $client->messages->create($phone,
                    [
                        'from' => "+12134747974", // From a valid Twilio number, for US numbers
                        // 'from' => "+17087667868", // From a valid Twilio number, for Indian numbers
                        'body' => $message
                    ]
                );
                // dd($message);

                if($notify == 'weekly'){
                    $notify_on = date('Y-m-d', strtotime($today . " +7 days"));
                }
                if($notify == 'monthly'){
                    $notify_on = date('Y-m-d', strtotime($today . " +30 days"));
                }
                DB::table('users')->where('phone', $phone)->update(['notify_on' => $notify_on]);
            }
    }

    public function removeAccount(Request $request)
    {
        $name = $request->name;
        $email = $request->email;
        $phone = Auth::user()->phone;

        $check = Removal::where('phone', $phone)->get();
        $countCheck = count($check);
        if($countCheck > 0){
            return back()->with("success", "Request already generated for this account.");
        }
        $data = new Removal;
        $data->name = $name;
        $data->email = $email;
        $data->phone = $phone;
        $data->save();

        \Mail::send('email-template', array(
            'name' => $name,
            'email' => $email,
            'subject' => 'Remove Account From MyGoodness',

        ), function($message) use ($request){

            $message->from($request->email);
            $message->to('my.goodness.dev@gmail.com', 'Admin')->subject($request->get('subject'));

        });
        return back()->with("success", "Thanks! Your request will be processed shortly.");
    }

}
