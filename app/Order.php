<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'order_id','user_id', 'product_id', 'total_price', 'qty', 'payment_status',
    ];
}






