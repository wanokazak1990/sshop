<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Banner;
use App\Services\UploadImage;

class BannerController extends Controller
{
    private function getEditableColumns()
    {
        return ['title','description','link'];
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $banners = Banner::get();
        return view('admin.banners.index', compact('banners'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $form = [
            'route'=>'banners.store',
            'method' => 'POST',
            'files' => true
        ];
        return view('admin.banners.create',compact('form'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, UploadImage $image)
    {
        $banner = banner::create($request->only($this->getEditableColumns()));
        $fileName = $image->prepare($banner, $request->file('img'))
            ->resolution(1000,400)
            ->quality(80)
            ->saveSingle();
        $banner->update(['img'=>$fileName]);
        return redirect()->route('banners.index');
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
    public function edit(Banner $banner)
    {
        $form = [
            'route'=>['banners.update',$banner],
            'method' => 'PATCH',
            'files' => true
        ];
        return view('admin.banners.create', compact('banner','form'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, UploadImage $image,Banner $banner)
    {
        $banner->update($request->only($this->getEditableColumns()));
        $fileName = $image->prepare($banner, $request->file('img'))
            ->resolution(1000,400)
            ->quality(90)
            ->saveSingle();
        if($fileName)
            $banner->update(['img'=>$fileName]);
        
        return redirect()->route('banners.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(UploadImage $image, Banner $banner)
    {
        $id = $banner->id;
        $image->setModel($banner)->deleteFile();
        $banner->delete();
        return response()->json(['id'=>$id]);
    }
}
