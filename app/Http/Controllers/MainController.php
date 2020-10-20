<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Banner;
use App\Models\Product;
use App\Models\Parameter;

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

    public function catalog(Request $request, Category $category, $products='', $categories='',$parameters='')
    {
    	$breadCrumbs = $category->getChainToParent($category->id)->reverse();
    	if($category->final)
        {
            $parameters = Parameter::where('category_id',$category->id)->get();

    		$query = Product::select('products.*')->leftJoin('properties','products.id','=','properties.product_id')->where('category_id',$category->id);

            $mas = [];
            foreach ($parameters as $key => $itemParam) 
            {
                if($request->has($itemParam->slug) && $request->get($itemParam->slug))
                {
                    $mas[] = $request->get($itemParam->slug);
                }
            }
            if($mas)
                $query->whereIn('properties.value_id',$mas)->havingRaw("COUNT(products.id) = ".count($mas));
            
            $products = $query->groupBy('products.id')->paginate(12);
            
        }
    	else
    		$categories = $category->children;
    	return view('front.catalog',compact('products','category','breadCrumbs','categories','parameters'));
    }
}
