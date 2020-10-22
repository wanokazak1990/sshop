<?php
namespace App\Services\Cart;
use App\Models\Product;
Class CartCell
{
	private $id = null;
	private $name = null;
	private $price = null;
	private $count = null;
	private $img = null;

	public function __construct(Product $product)
	{
		$this->id = $product->id;
		$this->name = $product->name;
		$this->count = 1;
		$this->price = $product->price;
		$this->img = $product->img;
	}


	public function getImg()
	{
		return 'storage/products/'.$this->id.'/'.$this->img;
	}

	public function getName()
	{
		return $this->name;
	}

	public function append()
	{
		$this->count++;
	}

	public function delete()
	{
		if($this->count>1)
			$this->count--;
		$this->count = 0;
	}

	public function getCount()
	{
		return $this->count;
	}

	public function getTotal()
	{
		return $this->price * $this->count;
	}
}