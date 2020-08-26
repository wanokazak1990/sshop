<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Section;
use App\Http\Requests\Admin\Sections\AddSectionRequest;
use App\Http\ViewComposers\NavigationMenu;


class SectionController extends Controller
{
    private function getEditableColumns()
    {
        return ['name','img','parent_id','live','sort'];
    }

    public function index()
    {
    	$sections = Section::with('children')->where('parent_id',0)->get();
    	return view('admin.sections.index',compact('sections'));
    }

    public function create()
    {
        $parents = Section::where('parent_id',0)->get()->pluck('name','id');
        $form = [
            'route'=>'sections.store',
            'method' => 'POST'
        ];
    	return view('admin.sections.create', compact('parents','form'));
    }

    public function store(AddSectionRequest $request)
    {
        $section = Section::create($request->only($this->getEditableColumns()));
    	return redirect()->route('sections.index');
    }

    public function edit(Section $section)
    {
    	$parents = Section::where('parent_id',0)->get()->pluck('name','id');
        $form = [
            'route'=>['sections.update',$section],
            'method' => 'PATCH'
        ];
        return view('admin.sections.create', compact('parents','section','form'));
    }

    public function update(AddSectionRequest $request, Section $section)
    {
        $section->update($request->only($this->getEditableColumns()));
        return redirect()->route('sections.index');
    }

    public function destroy(Section $section)
    {
        $id = $section->id;
    	$section->delete();
        return response()->json(['id'=>$id]);
    }

    public function show(Section $section)
    {
    	echo "Section Show";
    }
}
