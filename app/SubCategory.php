<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SubCategory extends Model
{
	use SoftDeletes;
	protected $fillable = [
        'sub_cat_name', 'cat_id', 'status',
    ];
}
