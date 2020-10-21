<?php
namespace App\Services\Cart;
use Session;
use App\Models\Product;

Class Cart
{

	public $products;

	public function __construct()
	{
		$this->init();
	}

	public function test()
	{
		echo "I`am working";
	}

	public function init()
	{
		$cart = Session::get('cart');
		$this->products = $cart;
	}

	public function add(Product $product)
	{

	}
}