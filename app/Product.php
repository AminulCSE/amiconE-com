<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'product_name', 'product_id', 'cat_id', 'description','image1','image2','image3','status',
    ];
}







