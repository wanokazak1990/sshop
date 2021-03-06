<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    protected $fillable = ['product_id','value_id'];

    protected $with = ['value'];

    public function value()
    {
    	return $this->hasOne(\App\Models\Value::class,'id','value_id')->withDefault()->with('parameter');
    }
}
