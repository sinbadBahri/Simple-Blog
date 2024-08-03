<?php

namespace App\Support\Gateways;

use App\Support\Gateways\GatewayInterface;
use Illuminate\Http\Request;

class Saman implements GatewayInterface
{
    public function pay($order)
    {
        //
    }

    public function verify(Request $request)
    {
        //
    }

    public function getName(): string
    {
        return "saman";
    }

}