<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Http\Requests\Admin\Categories\AddCategoryRequest;
use App\Http\ViewComposers\NavigationMenu;
use App\Services\UploadImage;

class CategoryController extends Controller
{
    private function getEditableColumns()
    {
        return ['name','parent_id','live','sort'];
    }

    public function index()
    {
    	$categories = Category::with('children')->get();
    	return view('admin.categories.index',compact('categories'));
    }

    public function create()
    {
        $parents = Category::get()->pluck('name','id');
        $form = [
            'route'=>'categories.store',
            'method' => 'POST',
            'files' => true
        ];
    	return view('admin.categories.create', compact('parents','form'));
    }

    public function store(AddCategoryRequest $request, UploadImage $image)
    {
        $category = Category::create($request->only($this->getEditableColumns()));
        $fileName = $image->prepare($category, $request->file('img'))
            ->resolution(800)
            ->quality(80)
            ->saveSingle();
        $category->update(['img'=>$fileName]);
        
        return redirect()->route('categories.index');
    }

    public function edit(Category $category)
    {
    	$parents = Category::get()->pluck('name','id');
        $form = [
            'route'=>['categories.update',$category],
            'method' => 'PATCH',
            'files' => true
        ];
        return view('admin.categories.create', compact('parents','category','form'));
    }

    public function update(AddCategoryRequest $request,  UploadImage $image, Category $category)
    {

        $category->update($request->only($this->getEditableColumns()));
        $fileName = $image->prepare($category, $request->file('img'))
            ->resolution(800)
            ->quality(80)
            ->saveSingle();
        if($fileName)
            $category->update(['img'=>$fileName]);
        
        return redirect()->route('categories.index');
    }

    public function destroy(Category $category)
    {
        $id = $category->id;
    	$category->where('parent_id',$id)->delete();
        $category->delete();
        return response()->json(['id'=>$id]);
    }

    public function show(Category $category)
    {
    	$parents = Category::where('parent_id',0)->get()->pluck('name','id');
        return view('admin.categories.show', compact('parents','category'));
    }
}
