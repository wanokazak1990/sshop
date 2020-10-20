<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Parameter;
use App\Models\Category;
use App\Models\Value;
use App\Models\Property;

class ParameterController extends Controller
{
    private function getEditableColumns()
    {
        return ['name','category_id'];
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $parameters = Parameter::with('category')->get();
        return view('admin.parameters.index',compact('parameters'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $form = [
            'route'=>'parameters.store',
            'method' => 'POST',
            'files' => true
        ];
        $categories = Category::where('final',1)->get()->pluck('name','id');
        return view('admin.parameters.create', compact('form','categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $parameter = Parameter::create($request->only($this->getEditableColumns()));
        if($request->value)
            foreach($request->value as $val)
                if($val)
                    Value::create([
                        'parameter_id'=>$parameter->id,
                        'value'=>$val
                    ]);
        return redirect()->route('parameters.edit',$parameter);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Parameter $parameter)
    {
        $form = [
            'route'=>['parameters.update',$parameter],
            'method' => 'PATCH',
            'files' => true
        ];
        $categories = Category::where('final',1)->get()->pluck('name','id');
        $values = $parameter->values;
        return view('admin.parameters.create', compact('form','categories', 'parameter'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Parameter $parameter)
    {
        $parameter->update($request->only($this->getEditableColumns()));
        //Value::where('parameter_id',$parameter->id)->delete();
        if($request->value)
            foreach($request->value as $key=>$val)
                if($val)
                    if($parameter->values->contains('id',$key))
                    {
                        $value = $parameter->values->where('id',$key)->first();
                        $value->value = $val;
                        $value->update();
                    }
                    else
                        Value::create([
                            'parameter_id'=>$parameter->id,
                            'value'=>$val
                        ]);
        return redirect()->route('parameters.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Parameter $parameter)
    {
        $values = Value::where('parameter_id',$parameter->id)->get();
        Property::whereIn('value_id',$values->pluck('id'))->delete();
        Value::where('parameter_id',$parameter->id)->delete();
        $parameter->delete();
    }
}
