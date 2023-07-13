<?php

namespace App\Http\Controllers\Admin\Product\Gallery;

use App\Http\Controllers\Admin\AdminController;
use App\Models\Gallery;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class ProductGalleryController extends AdminController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Product $product)
    {
        return  view('Admin.Products.galleries.Edit',[
            'product' => $product,
            'galleries' => $product->galleries
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Gallery $gallery)
    {
        $ha=$gallery->path;
        $newadd=str_replace($gallery->title,$request->title,$gallery->path);
        $newadd=str_replace($gallery->flag,$request->flag,$newadd);

        Storage::move($gallery->path,$newadd);
        //Storage::move($gallery->path,str_replace($gallery->title,$request->title,$gallery->path));
        /*        dd($request);*/
        $gallery->update([
            'title' => $request->get('title'),
            'alt' =>$request->get('alt'),
            'flag' => $request->get('flag'),
            'path' => $newadd
        ]);
        Alert::toast( 'عکس با موفقیت ویرایش شد','success');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }

    public function addImage(Request $request,Product $product)
    {
        //dd($product);

        $request->validate([
            'image' => 'required|mimes:png,jpg,jpeg|max:2048'
        ]);
        $object= explode("/",$request->file('image')->getClientMimeType());
        $imagePath = $request->file('image')->storeAs('public/Image/Product/'.jdate(now())->getYear().'/'.jdate(now())->getMonth().'/'.jdate(now())->getDay(),$request->get('title') . '.'. $object[1]);
        $gallery= Gallery::query()->create([
            'title' => $request->get('title'),
            'alt' =>$request->get('alt'),
            'mime' => $object[1],
            'path' => $imagePath,
            'flag' => 'Product' ,
            'size' => $request->file('image')->getSize()/1024
        ]);
        $product->galleries()->attach($gallery);
        Alert::toast( 'عکس با موفقیت به محصول اضافه شد','success');
        return back();
    }

    public function deleteimage(Product $product,Gallery $gallery)
    {
       // dd($product->galley_id ,$gallery->id);
        if ($product->gallery_id == $gallery->id){
            $product->gallery_id=NULL;
            Alert::toast( 'محصول مورد نظر عکس پیش فرض ندارد','warning');
        }
        else{
            Alert::toast( 'عکس با موفقیت از محصول حذف شد','success');
        }
        $product->galleries()->detach($gallery);
        $gallery->delete();
        return back();
    }
    public function defaultImage(Product $product,Gallery $gallery)
    {
        $product->update([
           'gallery_id' => $gallery->id
        ]);
        Alert::toast( 'عکس با موفقیت پیش فرض محصول شد','success');
        return back();
    }
}
