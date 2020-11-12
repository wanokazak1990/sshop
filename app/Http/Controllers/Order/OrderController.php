<?php

namespace App\Http\Controllers\Order;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Purchase;
use Auth;
use App\Services\Cart\Cart;
use App\Services\BreadCrumbs\BreadCrumbs;

class OrderController extends Controller
{
    public function store(Request $request, Cart $cart)
    {
    	$order = new Order();
    	$order->fill($request->input());
    	if(Auth::check())    	
    		$order->user_id = Auth::user()->id;    	
    	$order->save();
    	if(!empty($cart->products))
    		foreach ($cart->products as $key => $value) 
    		{
    			Purchase::create([
    				'order_id'=>$order->id,
    				'product_id'=>$value->getId(),
    				'count'=>$value->getCount(),
    				'price'=>$value->getPrice()
    			]);
    		}
        //сделать отправку письма на почтовый ящик
        //очистка корзины    
    	return redirect()->route('order.show',$order->id);
    }

    public function show(BreadCrumbs $breadCrumbs, $id)
    {        
    	$order = Order::with('purchases.product','status')->find($id);
    	if(Auth()->check())
            $breadCrumbs = $breadCrumbs->set(['/'=>'Главная', ''=>'Заказ №'.$order->id]);
        else
            $breadCrumbs = $breadCrumbs->set(['/'=>'Главная', ''=>'Заказ №'.$order->id]);
        return view('front.cart.order',compact('order','breadCrumbs'));
    }
}
