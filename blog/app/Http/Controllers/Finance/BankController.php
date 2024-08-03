<?php

namespace App\Http\Controllers\Finance;

use App\Http\Controllers\Controller;
use App\Support\Transaction;
use Illuminate\Http\Request;

class BankController extends Controller
{
    private $transaction;


    public function __construct(Transaction $transaction)
    {
    
        $this->transaction = $transaction;
    
    }


    public function verify(Request $request, String $gateway)
    {
        
        return $this->transaction->verify();

    }
}
