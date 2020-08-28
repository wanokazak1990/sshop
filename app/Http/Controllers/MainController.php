<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Section;

class MainController extends Controller
{
    public function index()
    {
    	$sections = Section::where('parent_id',0)->get();
    	//dd($sections);
    	return view('front.main', compact('sections'));
    }
}
