<?php

namespace App\Support\Gateways;

use App\Models\Payment;
use Illuminate\Http\Request;

interface GatewayInterface
{   
    public function pay(Payment $payment);

    public function verify(Request $request);

    public function transactionSuccessful(Array $data);

    public function transactionFailed(Array $data);
    
    public function getName(): string;

}