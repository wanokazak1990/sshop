<?php

namespace App\Models\Parsers\Wiper;

use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    protected $fillable = ['brand_id','model'];

    public function brand()
    {
    	return $this->hasOne(\App\Models\Parsers\Wiper\Brand::class,'id','brand_id');
    }

}
