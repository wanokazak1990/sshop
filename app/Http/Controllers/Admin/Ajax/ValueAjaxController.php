<?php

namespace App\Http\Controllers\Admin\Ajax;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Value;
class ValueAjaxController extends Controller
{
    public function destroy(Value $value)
    {
    	
    	$id = $value->id;
    	$value->delete();
    	return response()->json(['id'=>$id]);
    	
    }
}
