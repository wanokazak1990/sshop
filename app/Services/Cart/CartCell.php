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
	private $slug = null;
	private $product = null;
	public function __construct(Product $product)
	{
		$this->id = $product->id;
		$this->name = $product->name;
		$this->count = 1;
		$this->price = $product->price;
		$this->img = $product->img;
		$this->slug = $product->slug;
		$this->product = $product;
	}
	public function getProduct()
	{
		if($this->product)
			return $this->product;
		$product = Product::find($this->id);
		$this->product = $product;
		return $this->product;
	}

	public function getSlug()
	{
		return $this->slug;
	}
	public function getImg()
	{
		return 'storage/products/'.$this->id.'/'.$this->img;
	}

	public function getName()
	{
		return $this->name;
	}

	public function getCount()
	{
		return $this->count;
	}

	public function getPrice()
	{
		return $this->price;
	}

	public function getId()
	{
		return $this->id;
	}

	public function append()
	{
		$this->count++;
	}

	public function take()
	{
		if($this->count>1)
			$this->count--;
		else
			$this->count = 0;
	}

	

	public function getTotal()
	{
		return $this->price * $this->count;
	}

	public function formatPrice()
	{
		return number_format($this->price,0,'',' ');
	}

	public function formatTotal()
	{
		return number_format($this->getTotal(),0,'',' ');
	}
}