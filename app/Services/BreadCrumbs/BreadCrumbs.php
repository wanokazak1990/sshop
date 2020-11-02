<?php
namespace App\Services\BreadCrumbs;

Class BreadCrumbs
{
	private $name;
	private $link;

	public function __construct($name='',$link='')
	{
		$this->name = $name;
		$this->link = $link;
	}

	public function set($array = array())
	{
		$mas = collect();
		foreach ($array as $key => $value) {
			$mas->push(new BreadCrumbs($value,$key));
		}
		return $mas;
	}

	public function getName()
	{
		return $this->name;
	}

	public function getLink()
	{
		return $this->link;
	}
}