<?php

namespace App\Http\Controllers\Admin\Ajax;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Parameter;
use App\Models\Value;
class CategoryAjaxController extends Controller
{
    public function parameters(Request $request)
    {
    	$parameters = Parameter::where('category_id',$request->id)->get();

    	return response()->json([
			'content'=> view('admin.products.parameters', compact('parameters'))->render()
		]);
    }
}
