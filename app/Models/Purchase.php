<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
	protected $table = 'order_products';
    protected $fillable = ['order_id','product_id', 'count', 'price'];

    public function product()
    {
    	return $this->hasOne(\App\Models\Product::class,'id','product_id');
    }

    public function getFormatPriceAttribute()
    {
    	return number_format($this->price,0,'',' ');
    }
}
