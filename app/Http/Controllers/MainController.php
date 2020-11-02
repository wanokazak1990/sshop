<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Banner;
use App\Models\Product;
use App\Models\Parameter;
use App\Services\BreadCrumbs\BreadCrumbs;

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

    public function show(Product $product, BreadCrumbs $breadCrumbs)
    {
    	$categoryChain = $product->category->getChainToParent($product->category_id)->reverse();
        $breadCrumbs = $breadCrumbs->set($categoryChain->pluck('name','slug'));
    	return view('front.product', compact('product','categoryChain','breadCrumbs'));
    }

    public function catalog(Request $request, Category $category, BreadCrumbs $breadCrumbs,$products='', $categories='',$parameters='')
    {
    	$breadCrumbs = $breadCrumbs->set($category->getChainToParent($category->id)->reverse()->pluck('name','slug'));
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
        $title = $category->name;
    	return view('front.catalog',compact('products','category','breadCrumbs','categories','parameters','title'));
    }

    public function search(Request $request, BreadCrumbs $breadCrumbs, $products = '', $categories = '', $parameters = '')
    {
        $title = 'Поиск';
        if($request->has('articule') && $request->articule!='')
        {
            $products = Product::where('articule','like','%'.$request->articule.'%')->paginate(12);
            $breadCrumbs = $breadCrumbs->set([route('view.search')=>'Поиск по номеру: '.$request->articule]);
        }
        return view('front.catalog',compact('products','breadCrumbs','title'));
    }
}
