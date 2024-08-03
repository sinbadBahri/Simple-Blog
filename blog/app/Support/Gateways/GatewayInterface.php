<?php

namespace App\Support\Gateways;

use App\Models\Payment;
use Illuminate\Http\Request;

interface GatewayInterface
{

    const TRANSACTION_SUCCESS = 'transaction.success';

    const TRANSACTION_FAILED = 'transaction.failed';
    

    public function pay(Payment $payment);

    public function verify(Request $request);

    public function getName(): string;
}