<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Category;


class Product extends Model
{
    protected $fillable = ['articule','name','desc','price','img','category_id',];
    protected $with = ['category','properties'];

    public function getRouteKeyName() {
	    return 'slug';
	}

    public function category()
    {
    	return $this->belongsTo(Category::class,'category_id','id');
    }

    public function properties()
    {
        return $this->hasMany(\App\Models\Property::class,'product_id', 'id');
    }

    public function getFormatPriceAttribute()
    {
    	return number_format($this->price,0,'',' ');
    }
}
