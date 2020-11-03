<?php

namespace App\Http\Controllers\Order;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use Auth;

class OrderController extends Controller
{
    public function store(Request $request)
    {
    	dump($request->input());
    	$order = new Order();
    	$order->fill($request->input());
    	//$order->user_id = $user = 
    	dump(auth()->user());
    	dump($order);
    }
}
