<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Twilio\Rest\Client;
use DB;
use App\Models\User;
use App\Models\Payment;

class Notify extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'notify:daily';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Respectively send a notification to everyone.';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $today = date('Y-m-d');
        $users = User::select('phone','name','notify')->where('notify_on', $today)->get();
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
                $message = 'Hi '.$name.', thanks for donating to Mygoodness and being the part of '.$chain.' chains, click the link below to see how the goodness is growing: '.url("growing");
                $client = new Client($twilio_sid, $twilio_token);
                $sms = $client->messages->create($phone, 
                    [
                        'from' => "+12134747974", // From a valid Twilio number, for US numbers
                        // 'from' => "+17087667868", // From a valid Twilio number, for Indian numbers
                        'body' => $message
                    ]
                );

                if($notify == 'weekly'){
                    $notify_on = date('Y-m-d', strtotime($today . " +7 days"));
                }
                if($notify == 'monthly'){
                    $notify_on = date('Y-m-d', strtotime($today . " +30 days"));
                }
                DB::table('users')->where('phone', $phone)->update(['notify_on' => $notify_on]);
            }
    }
}
