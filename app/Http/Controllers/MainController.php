<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Banner;
use App\Models\Product;

class MainController extends Controller
{
    public function index()
    {
    	$banners = Banner::get();
    	$newProducts = Product::orderBy('created_at','desc')->limit(8)->get();
    	$hitProducts = $newProducts;
    	$saleProducts = $newProducts;
    	return view('front.main', compact('banners','newProducts','hitProducts','saleProducts'));
    }

    public function show(Product $product)
    {
    	$categoryChain = $product->category->getChainToParent($product->category_id)->reverse();
    	return view('front.product', compact('product','categoryChain'));
    }

    public function catalog(Category $category, $products='', $categories='')
    {
    	$breadCrumbs = $category->getChainToParent($category->id)->reverse();
    	if($category->final)
    		$products = Product::whereIn('category_id',$category->getChainToChild($category->id)->pluck('id'))->paginate(12);
    	else
    		$categories = $category->children;
    	return view('front.catalog',compact('products','category','breadCrumbs','categories'));
    }
}
