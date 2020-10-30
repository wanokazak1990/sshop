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

    public function get(Request $request,Cart $cart)
    {
    	if($request->isMethod('get'))
    		return view('front.cart.cart',compact('cart'))->render();
    	elseif($request->isMethod('post'))
    		return response()->json([
    			'content'=>view('front.cart.cartRow',compact('cart'))->render()
    		]);
    }

    public function clear(Request $request,Cart $cart,Product $product)
    {
    	$cart->clear($product->id);        
    }

    public function total(Cart $cart)
    {
    	return response()->json([
    		'total'=>$cart->formatTotal(),
    		'count'=>$cart->fullCount()
    	]);
    }
}
