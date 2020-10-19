<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Value extends Model
{
    protected $fillable = ['parameter_id', 'value'];

    public function parameter()
    {
    	return $this->hasOne(\App\Models\Parameter::class,'id','parameter_id')->withDefault();
    }
}
