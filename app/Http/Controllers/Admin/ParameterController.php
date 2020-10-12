<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Parameter;
use App\Models\Category;

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
        $parameters = Parameter::get();
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
        return redirect()->route('parameters.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
