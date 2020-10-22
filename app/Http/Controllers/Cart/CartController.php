<?php

namespace App\Http\Controllers\Cart;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\Cart\Cart;
use App\Models\Product;

class CartController extends Controller
{
    public function add(Cart $cart,Product $product)
    {
    	$cart->add($product);
    }

    public function delete(Cart $cart, Product $product)
    {
    	$cart->delete($product);
    }

    public function get(Cart $cart)
    {
    	return response()->json([
			'content'=> view('front.cart.cart',compact('cart'))->render()
		]);
    }

    public function clear()
    {

    }

    public function total(Cart $cart)
    {
    	return response()->json([
    		'total'=>$cart->totalPrice(),
    		'count'=>$cart->fullCount()
    	]);
    }
}
