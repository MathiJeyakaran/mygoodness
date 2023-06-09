<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;
use App\Models\Chain;
use App\Models\Payment;
use App\Models\User;
use Auth;


class DonationController extends Controller
{

    public function index()
    {
        $url = 'https://partners.every.org/v0.2/search/nonprofit?apiKey=ec7dc2865e3503f0b81a62a7a9642e75';

        // $ch = curl_init();
        // curl_setopt($ch, CURLOPT_URL, $url);
        // curl_setopt($ch, CURLOPT_POST, 0);
        // curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        // $response = curl_exec ($ch);
        // $err = curl_error($ch);  //if you need
        // curl_close ($ch);

        // $result = [];
        // $result[] = json_decode($response); 
        // $organisation = $result[0]->nonprofits;
        return view('users.donate');
        // return view('users.donateNew');
    }
    public function showDonationCounter(){
        $totalUsers = User::whereNotNull('phone')->distinct('phone')->count();
        
        return view('donation-counter', ['totalUsers' => $totalUsers]);
    }

    public function invited(Request $request)
    {
        $uid = $request->chain;
        $ein = $request->ein;
        $friend = $request->friend;
        $chains = Chain::select('chain_name')->where('chain_name', $uid)->get();        
        $chainCount = count($chains);
        $einCheck = Payment::select('charity_ein')->where('charity_ein', $ein)->get();        
        $einCount = count($einCheck);
        if($chainCount>0 && $einCount>0){
            $user = Chain::select('started_by')->where('chain_name', $uid)->get()->toArray();
            $user_id = $user[0]['started_by'];
            $userName = User::where('uuid', $user_id)->pluck('name')->toArray();
            $userName = $userName[0];
            Session::put('chain', $uid);
            $url = 'https://partners.every.org/v0.2/search/'.$ein.'?apiKey=ec7dc2865e3503f0b81a62a7a9642e75';

            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_POST, 0);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

            $response = curl_exec ($ch);
            $err = curl_error($ch);  //if you need
            curl_close ($ch);

            $result = [];
            $result[] = json_decode($response);  
            $organisation = $result[0]->nonprofits;
            $org = $organisation[0]->name;
            // // return view('users.chainDonate', compact('organisation', 'ein'));
            // return view('users.chainDonate', compact('ein'));
            return view('users.chainDonateTicked', compact('org', 'ein', 'userName', 'friend'));
        }else{
            return "Tempered URL please go back";
        }        
    }
    

    public function donate(Request $request)
    {
        $data = $request->validate([
            'org' => ['required', 'string'],
        ]);
        
        $org = $request->org; 
        $charity_name = $request->charity_name;
        // dd($org.'-'.$charity_name);
        $tip = $request->tip;
        $amount = $request->amount; 
        Session::put('amount', $amount);
        if($tip){
            $donation = $amount + 2/100*$amount;
            Session::put('donation', $donation);
        }else{
            $donation = $amount;
            Session::forget('donation');
        }
        Session::put('charity_ein', $org);
        Session::put('charity_name', $charity_name);
        $chain = Session::get('chain');        
        $uid = Auth::user()->uuid;
        if($chain){
        // if (str_contains($chain, $org)) {                 
            $chain_id = $chain;
        }else{
            // $chain_id = $org.'B'.substr($uid, -6);
            $chain_id = time().$uid;
            Session::put('chain', $chain_id);
            $chains = Chain::select('chain_name')->where('chain_name', $chain_id)->where('started_by', $uid)->get();
            $chainCount = count($chains);
            if($chainCount<1){
                $data = new Chain;
                $data->started_by = $uid;
                $data->chain_name = $chain_id;
                $data->save();
            }            
        }    
        if($donation == '5'){
            return redirect('https://www.paypal.com/donate/?hosted_button_id=VE6639QJV5488');
        }
        if($donation == '10'){
            return redirect('https://www.paypal.com/donate/?hosted_button_id=CLTDFETKVX7VC');
        }
        if($donation == '20'){
            return redirect('https://www.paypal.com/donate/?hosted_button_id=GH29U9ECHJ3TL');
        }
        if($donation == '5.1'){
            return redirect('https://www.paypal.com/donate/?hosted_button_id=84BTE5BEHAPMU');
        }
        if($donation == '10.2'){
            return redirect('https://www.paypal.com/donate/?hosted_button_id=E3DM3RKLB7C3Y');
        }
        if($donation == '20.4'){
            return redirect('https://www.paypal.com/donate/?hosted_button_id=HMU3UZXSR3DBC');
        }

        // return redirect('/success'); 
        // return redirect('https://www.sandbox.paypal.com/donate/?hosted_button_id=EUUPHBLUW3G2A');
        
    }

    public function thankyou(Request $request)
    {
        return view('users.thankyou');
    }


    public function getsearch(Request $request)
    {
        // function to get information of searched nonprofit organisation
        $org = $request->org;
        $org = urlencode($org);
        // if(!$org){
        //     $url = 'https://partners.every.org/v0.2/search/'.'-'.'?apiKey=ec7dc2865e3503f0b81a62a7a9642e75';
        // }else{
            $url = 'https://partners.every.org/v0.2/search/'.$org.'?apiKey=ec7dc2865e3503f0b81a62a7a9642e75&&take=20';
        // }
        
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $response = curl_exec ($ch);
        $err = curl_error($ch);  //if you need
        curl_close ($ch);

        $result = [];
        $result[] = json_decode($response); 
        $organisation = $result[0]->nonprofits; 
        
        $html = "";
        $html .= '<select class="form-control ct" id="org" name="org" placeholder="Start typing to find your NonProfit..." required >';
            foreach($organisation as $org){ 
                try {

                    // $html .= '<option class="orgoption" data-id="'.$org->ein.'">'.$org->name.'</option>';
                    $html .= '<option value="'.$org->ein.'">'.$org->name.'</option>';
                  
                  } catch (\Exception) {
                  
                    continue;
                  } 
                         
                }
        $html .= '</select>';

        return ($html);
    }
}
