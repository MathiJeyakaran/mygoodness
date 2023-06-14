<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Payment;
use App\Models\Transaction;
use App\Models\User;
use Omnipay\Omnipay;
use Session;

class PaymentController extends Controller
{
    private $gateway;

    public function __construct() {
        $this->gateway = Omnipay::create('PayPal_Rest');
        $this->gateway->setClientId('AYHDPlnd7L8IMMmzml4lpV6HTmEDycMzwGzCQ6c99PD303RaDdJuQOKfHmtF_UYmzsx-qxD5Fbs-L4RD');
        $this->gateway->setSecret('EBWL3v5tAUx2OMisZB8x6dSBqVHnp0bKAMdKblmGUBfcdxphkQfw0aQ0ipenlSDDXF7fh3vh242l15yd');
        $this->gateway->setTestMode(true);
    }

    public function pay(Request $request)
    {
        // dd($request->all());
        try {

            $response = $this->gateway->purchase(array(
                'amount' => $request->amount,
                'currency' => 'USD',
                'returnUrl' => url('success'),
                'cancelUrl' => url('error')
            ))->send();

            if ($response->isRedirect()) {
                $response->redirect();
            }
            else{
                return $response->getMessage();
            }

        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    // public function success(Request $request)
    // {
    //     if ($request->input('paymentId') && $request->input('PayerID')) {
    //         $transaction = $this->gateway->completePurchase(array(
    //             'payer_id' => $request->input('PayerID'),
    //             'transactionReference' => $request->input('paymentId')
    //         ));

    //         $response = $transaction->send();

    //         if ($response->isSuccessful()) {

    //             $arr = $response->getData();
    //             dd($arr);

    //             $payment = new Payment();
    //             $payment->payment_id = $arr['id'];
    //             $payment->payer_id = $arr['payer']['payer_info']['payer_id'];
    //             $payment->payer_email = $arr['payer']['payer_info']['email'];
    //             $payment->amount = $arr['transactions'][0]['amount']['total'];
    //             $payment->currency = env('PAYPAL_CURRENCY');
    //             $payment->payment_status = $arr['state'];

    //             $payment->save();

    //             return "Payment is Successfull. Your Transaction Id is : " . $arr['id'];

    //         }
    //         else{
    //             return $response->getMessage();
    //         }
    //     }
    //     else{
    //         return 'Payment declined!!';
    //     }
    // }

    // public function error()
    // {
    //     return 'User declined the payment!';
    // }


    public function success(Request $request)
    {
        $tx = $_GET['tx'];
        // $token = 't81CNai4vCM443VL5bCDftAzPuKEqIq55aIPOF7EBs2KzVHwFdoNYYUY0MW';
        $token = 'LjfpML5OQNTWxPeczPczYfGKsUtBw_LSVNdFxAXiG-VVtDODEyzPafnDxO4';
        $ch = curl_init();
        // $url = 'https://www.sandbox.paypal.com/cgi-bin/webscr';
        $url = 'https://www.paypal.com/cgi-bin/webscr';
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query(array
            (
            'cmd' => '_notify-synch',
            'tx' => $tx,
            'at' => $token,
            )));

        // Execute request and get response and status code
        $response = curl_exec($ch);
        $status   = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        // Close connection
        curl_close($ch);
        $lines = explode("\n", $response);
        $email = explode("=", $lines[14]);
        $amount = explode("=", $lines[1]);
        $txn = explode("=", $lines[15]);
        $name = explode("=", $lines[8]);
        $name = $name[1];
        $email = str_replace("%40","@",$email[1]);

        $id = Auth::user()->id;
        $username = Auth::user()->name;
        if($username == 'User'){
            User::where('id','=',$id)->update(['name' => $name]);
        }
        // User::where('id','=',$id)->update(['email' => $email]);
        $data = new Payment;
        $data->donor = Auth::user()->id;
        $data->transaction_id = $txn[1];
        $data->transaction_amount = $amount[1];
        $data->donation_amount = Session::get('amount');
        $data->chain = Session::get('chain');
        $data->charity_ein = Session::get('charity_ein');
        $data->nonprofit = Session::get('charity_name');
        $data->save();


        if(Session::get('donation')){
            $data = new Payment;
            $data->donor = Auth::user()->id;
            $data->transaction_id = $txn[1];
            $data->transaction_amount = $amount[1];
            $data->donation_amount = Session::get('donation') - Session::get('amount');
            $data->chain = Session::get('chain').'_'.'mygoodness';
            $data->charity_ein = 'mygoodness';
            $data->nonprofit = 'mygoodness';
            $data->save();
        }
        return redirect('thankyou');
    }

    public function error()
    {
        // return view('users.declined');
        return redirect('create');
    }

    public function notify(Request $request)
    {
        $transaction_id = $_POST;
        // dd($transaction_id);
        $data = new Transaction;
        $data->transaction_id = $transaction_id;
        $data->save();
    }
}
