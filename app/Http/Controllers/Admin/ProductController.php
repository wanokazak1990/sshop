<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use App\Models\Category;
use App\Models\Parameter;
use App\Models\Property;

use App\Http\Controllers\Controller;

use App\Services\UploadImage;

use App\Http\Requests\Admin\Product\ProductRequest;

class ProductController extends Controller
{
    private function getEditableColumns()
    {
        return ['articule','name','desc','price','category_id'];
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::with('category')->get();

        return view('admin.products.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $form = [
            'route'=>'products.store',
            'method' => 'POST',
            'files' => true
        ];

        $categories = Category::where('final',1)->get();

        return view('admin.products.create',compact('form','categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request, UploadImage $image)
    {
        $product = Product::create($request->only($this->getEditableColumns()));
        
        if($request->has('values'))
        {
            Property::where('product_id',$product->id)->delete();
            foreach ($request->values as $key => $value) 
                if($value)
                    Property::create([
                        'product_id'=>$product->id,
                        'value_id'=>$value
                    ]);
        }

        $fileName = $image->prepare($product, $request->file('img'))
            ->setPathWithId()
            ->resolution(500,500)
            ->quality(80)
            ->saveSingle();
        $product->update(['img'=>$fileName]);
        return redirect()->route('products.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $form = [
            'route'=>['products.update',$product],
            'method' => 'PATCH',
            'files' => true
        ];
        $categories = Category::where('final',1)->get();
        $parameters = Parameter::where('category_id',$product->category_id)->get();
        return view('admin.products.create', compact('product','form','categories','parameters'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(ProductRequest $request, UploadImage $image, Product $product)
    {
        $product->update($request->only($this->getEditableColumns()));
        if($request->has('values'))
        {
            Property::where('product_id',$product->id)->delete();
            foreach ($request->values as $key => $value) 
                if($value)
                    Property::create([
                        'product_id'=>$product->id,
                        'value_id'=>$value
                    ]);
        }

        $fileName = $image->prepare($product, $request->file('img'))
            ->setPathWithId()
            ->resolution(500,500)
            ->quality(80)
            ->saveSingle();
        if($fileName)
            $product->update(['img'=>$fileName]);
        
        return redirect()->route('products.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(UploadImage $image,Product $product)
    {
        $id = $product->id;
        $image->setModel($product)->setPathWithId()->deleteDir();
        Property::where('product_id',$product->id)->delete();
        $product->delete();
        return response()->json(['id'=>$id]);
    }
}
