<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Twilio\Rest\Client;
use App\Models\Chain;
use App\Models\Payment;
use App\Models\Invitation;
use Illuminate\Support\Facades\DB;
use Session;
use Auth;

class FriendController extends Controller
{
    public function index()
    {
        $friend = Auth::user()->name;
        $friend = explode(' ', trim($friend ))[0];
        // $charity = Session::get('charity_name');
        // $org = Session::get('charity_ein');
        // $chain_id = Session::get('chain');

        $charity = 'test charity';
        $org = '123456';
        $chain_id = '77788896';

        $uid = Auth::user()->uuid;
        // Session::forget('chain');
        return view('users.share', compact('org', 'uid', 'chain_id', 'charity', 'friend'));
    }

    public function invite(Request $request)
    {
        $id = Auth::user()->phone;
        $chain = Session::get('chain');
        $data = $request->validate([
            'invitee_1' => ['required', 'string', 'min:10'],
            // 'invitee_2' => ['string', 'min:10'],
            // 'invitee_3' => ['string', 'min:10'],
            'org' => ['required', 'string'],
            'message' => ['required', 'string'],
        ]);
        $ein = $request->org;
        $message = $request->message;
        $invitees[] = '+1'.$request->invitee_1; // change +1 to +91 for indian numbers
        if($request->invitee_2){
            $invitees[] = '+1'.$request->invitee_2; // change +1 to +91 for indian numbers
        }
        if($request->invitee_3){
            $invitees[] = '+1'.$request->invitee_3; // change +1 to +91 for indian numbers
        }
        // $invitees = [["phone"=>$invitee_1]];

        $twilio_token = config('services.twilio.twilio_token'); //for US numbers
        $twilio_sid = config('services.twilio.twilio_sid'); //for US numbers
        // $twilio_token = '2a5e633d99a48ccd18eb7a2f55a2bb23'; // for indian numbers
        // $twilio_sid = 'AC43282835884e5a538f50c0816a17cf1a'; // for indian numbers
        $client = new Client($twilio_sid, $twilio_token);
            foreach ($invitees as $invitee) {
                $user = $invitee;
                try {
                    $phone_number = $client->lookups->v1->phoneNumbers($user)->fetch(["countryCode" => "US"]);
                    $countryCode = $phone_number->countryCode;
                    if($countryCode != 'US'){
                        return redirect()->back()->with('success', 'Kindly enter valid phone number without any symbols.');
                    }
                  } catch (\Exception) {
                    return redirect()->back()->with('success', 'Kindly enter valid phone number without any symbols.');
                  }

            }
            foreach ($invitees as $invitee) {
                $user = $invitee;

                try {
                    $sms = $client->messages->create($user,
                    [
                        'from' => "+12134747974", // From a valid Twilio number, for US numbers
                        // 'from' => "+17087667868", // From a valid Twilio number, for indian numbers
                        'body' => $message
                    ]
                );
                  } catch (\Exception) {
                    return redirect()->back()->with('success', 'Kindly enter valid phone number without any symbols.');
                  }
            }

            $invitees = json_encode($invitees);
            $data = new Invitation;
            $data->invited_by = $id;
            $data->invitees = $invitees;
            $data->chain = $chain;
            $data->save();
        return redirect('/growing?chain='.$chain);
    }

    public function growing(Request $request)
    {
        $chain_id = $request->chain;
        $id = Auth::user()->id;
        $uid = Auth::user()->uuid;
        // $chains  = Payment::select('donor')->whereIn('chain', Payment::select('chain')->where('donor', $id)->whereNot('nonprofit', 'mygoodness'))->get()->toArray();
        $chains  = Payment::select('donor')->distinct('donor')->whereIn('chain', Payment::select('chain')->where('chain', $chain_id)->whereNot('nonprofit', 'mygoodness'))->get()->toArray();
        $org = [];
        // $donations = Payment::where('donor', $id)->whereNot('charity_ein', 'mygoodness')->select('charity_ein', 'nonprofit')->distinct('charity_ein')->get()->toArray();
        // foreach($donations as $donation){
        //     $org[] = $donation['nonprofit'];
        // // }
        $donations = Payment::where('chain', $chain_id)->whereNot('charity_ein', 'mygoodness')->select('charity_ein', 'nonprofit')->distinct('charity_ein')->get()->toArray();
        foreach($donations as $donation){
            $org[] = $donation['nonprofit'];
        }
        $donor = [];
        foreach ($chains as $chain) {
            $user_id = $chain['donor'];
            $users = User::select('name')->where('id', $user_id)->get()->toArray();
            foreach($users as $user){
                $donor[] = $user['name'];;
            }
        }
        $count = count($donor);
        return view('users.growing', compact('org', 'donor', 'count', 'chain_id'));
    }

    public function getuser(Request $request)
    {
        $id = Auth::user()->id;
        $org = $request->org;
        $chain = $request->chain;

        $uid = Auth::user()->uuid;
        // $chains  = Payment::select('donor')->whereIn('chain', Payment::select('chain')->where('donor', $id)->where('nonprofit', $org))->get()->toArray();
        $chains  = Payment::select('donor')->distinct('donor')->where('chain', $chain)->where('nonprofit', $org)->get()->toArray();
        $donor = [];
        foreach ($chains as $chain) {
            $user_id = $chain['donor'];
            $users = User::select('name')->where('id', $user_id)->get()->toArray();
            foreach($users as $user){
                $donor[] = $user['name'];;
            }
        }
        $count = count($donor);
        $html = "";
        // $html .= '<ul class="listmids d-flex justify-content-center">';
        $i = 1;
        $j = 1;
            foreach($donor as $user){
                $username = preg_split("/\s+/", $user);
                if($i==1){
                    $color = 'green';
                    $image = 'greenstar.png';
                }elseif($i==2){
                    $color = 'red';
                    $image = 'redstar.png';
                }
                if($j%3==0){
                    $i=0;
                    $color = 'yellow';
                    $image = 'yellowstar.png';
                }
                $html .= '<li class="col-sm-1">';
                $html .= '<a title="'.$user.'" class="inner">';
                $html .= '<span class="starbox '.$color.'">';
                $html .= '<img src="images/'.$image.'">';
                $html .= '</span>';
                $html .= '<span class="ratetext">'.$username['0'].'</span>';
                $html .= '</a>';
                $html .= '</li>';
                $i++;
                $j++;
            }
        // $html .= '</ul>';
        return (['count'=> $count,'html'=>$html]);
    }
}
