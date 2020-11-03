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
}
