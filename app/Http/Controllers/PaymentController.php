<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Payment;
use App\Models\Transaction;
use App\Models\User;
use Session;
use Illuminate\Support\Str;
class PaymentController extends Controller
{
    public function pay(Request $request)
    {
        try {
            $response = $this->gateway->purchase(array(
                'amount' => $request->amount,
                'currency' => 'USD',
                'returnUrl' => url('success'),
                'cancelUrl' => url('error')
            ))->send();

            if ($response->isRedirect()) {
                $response->redirect();
            } else {
                return $response->getMessage();
            }
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    public function success(Request $request)
    {
        $tx = $_GET['tx'];
        $token = 'LjfpML5OQNTWxPeczPczYfGKsUtBw_LSVNdFxAXiG-VVtDODEyzPafnDxO4';
        $ch = curl_init();
        $url = 'https://www.paypal.com/cgi-bin/webscr';
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query(array(
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
        $email = str_replace("%40", "@", $email[1]);

        $id = Auth::user()->id;
        $username = Auth::user()->name;
        if ($username == 'User') {
            User::where('id', '=', $id)->update(['name' => $name]);
        }
        $data = new Payment;
        $data->donor = Auth::user()->id;
        $data->transaction_id = $txn[1];
        $data->transaction_amount = $amount[1];
        $data->donation_amount = Session::get('amount');
        $data->chain = Session::get('chain');
        $data->charity_ein = Session::get('charity_ein');
        $data->nonprofit = Session::get('charity_name');
        $data->save();


        if (Session::get('donation')) {
            $data = new Payment;
            $data->donor = Auth::user()->id;
            $data->transaction_id = $txn[1];
            $data->transaction_amount = $amount[1];
            $data->donation_amount = Session::get('donation') - Session::get('amount');
            $data->chain = Session::get('chain') . '_' . 'mygoodness';
            $data->charity_ein = 'mygoodness';
            $data->nonprofit = 'mygoodness';
            $data->save();
        }
        return redirect('thankyou');
    }

    public function error()
    {
        return redirect('create');
    }

    public function notify(Request $request)
    {
        $transaction_id = $_POST;
        $data = new Transaction;
        $data->transaction_id = $transaction_id;
        $data->save();
    }

    public function checkout(Request $request)
    {
        $gateway = new \Braintree\Gateway([
            'environment' => 'sandbox',
            'merchantId' => '3jg8y93yryhx285y',
            'publicKey' => 'jbnntk4tvgzqcyd2',
            'privateKey' => 'd01e7060f4b9f583e7ba6ebdb0ef76d4'
        ]);

        $data = [
            'total' => $request->total,
            "donationAmount" => $request->donationAmount,
            "charityEin" => $request->charityEin,
            "charityName" => $request->charityName,
            "clientToken" => $gateway->clientToken()->generate(),
            "chain" => isset($request->chain) ? $request->chain : '' ,
        ];

        return view('braintree', compact('data'));
    }

    public function token(Request $request)
    {
        $gateway = new \Braintree\Gateway([
            'environment' => 'sandbox',
            'merchantId' => '3jg8y93yryhx285y',
            'publicKey' => 'jbnntk4tvgzqcyd2',
            'privateKey' => 'd01e7060f4b9f583e7ba6ebdb0ef76d4'
        ]);

        if ($request->input('payment_method_nonce') != null) {
            $customer = Auth::user();
            // dd($customer);

            $result = $gateway->customer()->create(
                [
                    'firstName' => $customer['name'],
                    'company' => $customer['company'] ?? "My Goodness",
                    'email' => $customer['email'],
                    'paymentMethodNonce' => $request->input('payment_method_nonce')
                ]
            );

            $cusid = $result->customer->id;
            $params = [
                "amount" => $request->totalAmount,
                "customerId" => $cusid,
                "merchantAccountId" => "MyGoodness",
                "options" => ["submitForSettlement" => true]
            ];
            $resultPay = $gateway->transaction()->sale($params);

            $data = new Payment;
            $data->donor = Auth::user()->id;
            $data->transaction_id = $resultPay->transaction->id;
            $data->transaction_amount = $request->totalAmount;
            $data->donation_amount = $request->donationAmount;
            $data->chain = Str::random(30);;
            $data->charity_ein = $request->charityEin;
            $data->nonprofit = $request->charityName;
            $data->save();

            return view('users.share', compact('data'));
        } else {
            $clientToken = $gateway->clientToken()->generate();
            return view('braintree', ['token' => $clientToken]);
        }
    }
}
