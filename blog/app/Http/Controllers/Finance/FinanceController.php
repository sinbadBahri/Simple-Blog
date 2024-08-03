<?php

namespace App\Http\Controllers\Finance;

use App\Http\Controllers\Controller;
use App\Support\Transaction;
use Illuminate\Http\Request;

class FinanceController extends Controller
{
    private $transaction;


    public function __construct(Transaction $transaction)
    {
    
        $this->transaction = $transaction;
    
    }

    public function pricingView()
    {
        return view(view:'finance.pricing');
    }

    public function checkoutForm(Request $request)
    {
        
        $amount = $request->amount;
    
        return view(view:'finance.checkout', data:compact(['amount']));
    
    }

    public function checkout(Request $request)
    {
        
        return $this->transaction->checkout();

    }

    public function verify()
    {
        

        //
    }
}
