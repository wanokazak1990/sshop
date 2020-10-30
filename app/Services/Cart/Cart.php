<?php
namespace App\Services\Cart;
use Session;
use App\Models\Product;
use App\Services\Cart\CartCell;

Class Cart
{

	public $products;

	public function __construct()
	{

		$this->products = collect();
		$this->init();
		
	}

	public function test()
	{
		echo "I`am working";
	}

	private function save()
	{
		Session::put('cart',$this->products);
	}

	public function init()
	{
		$cart = Session::get('cart');
		if($cart)
			$this->products = $cart;
	}

	public function add(Product $product)
	{

		if($this->products->has($product->id))
			$this->products->get($product->id)->append();
		
		else
			$this->products->put($product->id, new CartCell($product));

		$this->save();
	}	

	public function delete(Product $product)
	{
		$item = $this->products->has($product->id);
		if($item)
		{
			$this->products->get($product->id)->take();
			if($this->products->get($product->id)->getCount() == 0)
				$this->products->forget($product->id);
		}
		$this->save();
	}

	public function totalPrice()
	{
		$sum = 0;
		foreach($this->products as $product)
		{
			$sum += $product->getTotal();
		}
		return $sum;
	}

	public function fullCount()
	{
		$count = 0;
		foreach ($this->products as $product)
		{
			$count += $product->getCount();
		}
		return $count;
	}

	

	public function formatTotal()
	{
		return number_format($this->totalPrice(),0,'',' ');
	}

	public function clear($id)
	{
		$item = $this->products->has($id);
		if($item)
			$this->products->forget($id);
		$this->save();
	}

	public static function checkProduct($id)
	{
		$cart = new Cart();
		if($cart->products->has($id))
			return 1;
		return 0;
	}
}