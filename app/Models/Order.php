<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
    	'user_id',
    	'status_id',
        'manager_id',
        'price',
        'firstname',
        'lastname',
        'email',
        'phone',
        'consent',
        'comment'    
    ];
    

    public function purchases()
    {
        return $this->hasMany(\App\Models\Purchase::class,'order_id','id');
    }

    public function status()
    {
        return $this->hasOne(\App\Models\Status::class,'id','status_id');
    }

    public function orderPrice()
    {
        $price = 0;
        if(isset($this->purchases))
            foreach ($this->purchases as $key => $item) 
            {
                $price+=($item->price*$item->count);
            }
        return $price;
    }

    public function formatOrderPrice()
    {
        return number_format($this->orderPrice(),0,'',' ');
    }
}
