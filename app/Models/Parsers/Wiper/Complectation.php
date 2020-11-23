<?php

namespace App\Models\Parsers\Wiper;

use Illuminate\Database\Eloquent\Model;

class Complectation extends Model
{
    protected $fillable = ['model_id','name'];

    public function model()
    {
    	return $this->hasOne(\App\Models\Parsers\Wiper\Car::class,'id','model_id');
    }
}
