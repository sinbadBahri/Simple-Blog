<?php

namespace App\Support\Gateways;

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
        'callback' => 'https://example.com/callback',
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
        //
    }

    public function getName(): string
    {
        return "idpay";
    }

}