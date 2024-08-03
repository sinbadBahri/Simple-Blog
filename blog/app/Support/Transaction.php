<?php

namespace App\Support;

use App\Models\Order;
use App\Models\Payment;
use App\Support\Gateways\Saman;
use App\Support\Gateways\Zarrinpal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Transaction
{
    private $request;

    public function __construct(Request $request)
    {

        $this->request = $request;

    }


    public function checkout()
    {
        
        $order = $this->makeOrder();
        $payment = $this->makePayment($order);

        $this->gatewayFactory()->pay($order);

        
    }

    private function makeOrder()
    {
        
        $order = Order::create([
            'user_id' => Auth::user()->id,
            'order_code' => bin2hex(rand()),
            'amount' => $this->request->amount, 
        ]);

        return $order;
    
    } 

    private function makePayment(Order $order)
    {
        
        $payment = Payment::create([
            'order_id' => $order->id,
            'gateway' => "pasargad",
            'ref_num' => "ref_num",
            'amount' => $this->addTax($order),
        ]);

        dd($this->gatewayFactory());

        return $payment;
        
    }

    private function addTax(Order $order)
    {

        $amount = $order->amount;
        $amountPlusTax = 1.09 * $amount;

        return $amountPlusTax;

    }

    private function gatewayFactory()
    {

        $gateway = [
            'saman' => Saman::class,
            'zarrinpal' => Zarrinpal::class,
        ][$this->request->gateway];

        return resolve($gateway);

    }
}
