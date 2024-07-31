<?php

namespace App\Support;

use App\Models\Order;
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
        dd($order);

        
    }

    public function makeOrder()
    {
        
        $order = Order::create([
            'user_id' => Auth::user()->id,
            'order_code' => bin2hex(rand()),
            'amount' => $this->request->amount, 
        ]);

        return $order;
    } 
}
