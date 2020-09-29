<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class MainController extends Controller
{
    public function index()
    {
    	$categories = Category::where('parent_id',0)->get();
    	//dd($sections);
    	return view('front.main', compact('categories'));
    }
}
