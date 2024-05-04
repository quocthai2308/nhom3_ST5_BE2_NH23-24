<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $table = 'transaction';


    protected $fillable = [
        'user_id', 'product_id', 'amount', 'payment_method', 'code_vnpay',
        'status', 'email', 'phone', 'order_content', 'shipping_address'
    ];
}
