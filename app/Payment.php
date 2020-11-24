<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
   protected $fillable = [
        'user_id', 'bkash_number', 'payment_bkash_code', 'paid', 'status'
    ];
}



