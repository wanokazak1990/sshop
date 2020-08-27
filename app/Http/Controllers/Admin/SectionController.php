<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Section;
use App\Http\Requests\Admin\Sections\AddSectionRequest;
use App\Http\ViewComposers\NavigationMenu;
use App\Services\UploadImage;

class SectionController extends Controller
{
    private function getEditableColumns()
    {
        return ['name','parent_id','live','sort'];
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
            'method' => 'POST',
            'files' => true
        ];
    	return view('admin.sections.create', compact('parents','form'));
    }

    public function store(AddSectionRequest $request, UploadImage $image)
    {
        $section = Section::create($request->only($this->getEditableColumns()));
        $fileName = $image->prepare($section, $request->file('img'))
            ->resolution(800)
            ->quality(80)
            ->saveSingle();
        $section->update(['img'=>$fileName]);
        
        return redirect()->route('sections.index');
    }

    public function edit(Section $section)
    {
    	$parents = Section::where('parent_id',0)->get()->pluck('name','id');
        $form = [
            'route'=>['sections.update',$section],
            'method' => 'PATCH',
            'files' => true
        ];
        return view('admin.sections.create', compact('parents','section','form'));
    }

    public function update(AddSectionRequest $request,  UploadImage $image, Section $section)
    {

        $section->update($request->only($this->getEditableColumns()));
        $fileName = $image->prepare($section, $request->file('img'))
            ->resolution(800)
            ->quality(80)
            ->deleteFile($section->img)
            ->saveSingle();
        $section->update(['img'=>$fileName]);
        
        return redirect()->route('sections.index');
    }

    public function destroy(Section $section)
    {
        $id = $section->id;
    	$section->where('parent_id',$id)->delete();
        $section->delete();
        return response()->json(['id'=>$id]);
    }

    public function show(Section $section)
    {
    	$parents = Section::where('parent_id',0)->get()->pluck('name','id');
        return view('admin.sections.show', compact('parents','section'));
    }
}
