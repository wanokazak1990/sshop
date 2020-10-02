<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Banner;

class MainController extends Controller
{
    public function index()
    {
    	$categories = Category::isLive()->get();
    	$banners = Banner::get();
    	return view('front.main', compact('banners'));
    }
}
