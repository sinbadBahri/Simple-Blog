<?php

namespace App\Support\Gateways;

use App\Support\Gateways\GatewayInterface;
use Illuminate\Http\Request;

class Zarrinpal implements GatewayInterface
{

    private $merchantId;
    
    private $callBack;


    public function __construct() {

        $this->merchantId = "1344b5d4-0048-11e8-94db-005056a205be";
    }

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
        return "zarrinpal";
    }

}