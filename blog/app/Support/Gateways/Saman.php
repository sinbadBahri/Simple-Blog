<?php

namespace App\Support\Gateways;

use App\Models\Payment;
use App\Support\Gateways\GatewayInterface;
use Illuminate\Http\Request;

class Saman implements GatewayInterface
{
    public function pay(Payment $payment)
    {
        //
    }

    public function verify(Request $request)
    {
        //
    }

    public function transactionSuccessful(Array $data)
    {
        //
    }

    public function transactionFailed(Array $data)
    {
        //
    }

    public function getName(): string
    {
        return "saman";
    }

}