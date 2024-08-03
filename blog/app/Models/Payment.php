<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $table = 'payments';
    protected $fillable = ['order_id', 'gateway', 'ref_num', 'amount', 'status'];
    protected $attributes = [
        'status' => 0,
    ];
    
    public function order() {
        return $this->belongsTo(related:Order::class);
    }
}
