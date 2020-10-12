<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Parameter extends Model
{
	protected $table = 'parameters';
    protected $fillable = ['name','category_id'];
    protected $with = ['values'];

    public function category()
    {
    	return $this->belongsTo(\App\Models\Category::class,'category_id');
    }

    public function values()
    {
    	return $this->hasMany(\App\Models\Value::class,'parameter_id');
    }
}
