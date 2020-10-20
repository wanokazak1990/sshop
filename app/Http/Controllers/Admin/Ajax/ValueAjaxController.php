<?php

namespace App\Http\Controllers\Admin\Ajax;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Value;
class ValueAjaxController extends Controller
{
    public function destroy(Request $request)
    {
    	$id = $value->id;
    	$value->destroy();
    	return response()->json(['id'=>$id]);
    }
}
