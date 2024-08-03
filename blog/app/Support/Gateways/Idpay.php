<?php

namespace App\Support\Gateways;

use App\Models\Order;
use App\Models\Payment;
use App\Models\User;
use App\Support\Gateways\GatewayInterface;
use Evryn\LaravelToman\Facades\Toman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Idpay implements GatewayInterface
{

    private $merchantId;
    
    private $callBack;


    public function __construct() {

        $this->merchantId = "1344b5d4-0048-11e8-94db-005056a205be";
        $this->callBack = route('payment.verify', $this->getName());

    }

    public function pay(Payment $payment)
    {
        $user = Auth::user();
        return $this->redirectToBank($payment, $user);

    }

    private function redirectToBank(Payment $payment, $user)
    {
        $params = array(
        'order_id' => $payment->order_id,
        'amount' => $payment->amount,
        'name' => $user->name,
        // 'phone' => '09382198592',
        'mail' => $user->email,
        'desc' => ' VIP Purchase ',
        'callback' => "http://127.0.0.1:8000/payment/".$this->getName()."/callback",
        );

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://api.idpay.ir/v1.1/payment');
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($params));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        'Content-Type: application/json',
        'X-API-KEY: 6a7f99eb-7c20-4412-a972-6dfb7cd253a4',
        'X-SANDBOX: 1'
        ));

        $result = curl_exec($ch);
        curl_close($ch);
        $url = json_decode($result, true)['link'];
        
        return redirect($url);

    }

    public function verify(Request $request)
    {
        $callback_info = $this->getCallBackInfo($request);
        $response = $this->getVerificationParameters($callback_info);

        if (array_key_exists('status', $response)) {
            if ($response['status'] == 100) {
                return $this->transactionSuccessful($response);
            }
        }

        return $this->transactionFailed($response);

    }

    public function getVerificationParameters(Array $parameters)
    {


        $params = array(
            'id' => $parameters['id'],
            'order_id' => $parameters['order_id'],
          );
          
          $ch = curl_init();
          curl_setopt($ch, CURLOPT_URL, 'https://api.idpay.ir/v1.1/payment/verify');
          curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($params));
          curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
          curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json',
            'X-API-KEY: 6a7f99eb-7c20-4412-a972-6dfb7cd253a4',
            'X-SANDBOX: 1',
          ));
        
          $result = curl_exec($ch);
          curl_close($ch);
          $result_array = json_decode($result, true);
          
          return  $result_array;
    }

    private function getCallBackInfo(Request $request)
    {
        $parameters = [
        "status" => $request->status,
        "track_id" => $request->track_id,
        "id" => $request->id,
        "order_id" => $request->order_id,
        "amount" => $request->amount,
        "card_no" => $request->card_no,
        "hashed_card_no" => $request->hashed_card_no,
        "date" => $request->date,
        ];

        return $parameters;
    }

    public function transactionSuccessful(Array $data)
    {

        $payment = $this->setRefNum($data);
        $this->makeAdmin($payment);

        return redirect('/dashboard');

    }

    public function transactionFailed(Array $data)
    {
        dd("karim");
    }

    private function setRefNum($successfulResponse)
    {
        $order_id = $successfulResponse['order_id'];
        $ref_num = $successfulResponse['id'];

        $payment = Payment::where('order_id', $order_id)->first();
        $payment->ref_num = $ref_num;
        $payment->status = 1;
        $payment->save();

        return $payment;
    }

    private function makeAdmin(Payment $payment)
    {
        $order = Order::find($payment->order_id);
        $user = User::find($order->user_id);

        $user->roles()->sync(1);
        Auth::login($user);
    }

    public function getName(): string
    {
        return "idpay";
    }

}