<?php

namespace App\Http\Controllers\Admin\Brand;


use App\Http\Controllers\Admin\AdminController;
use App\Models\AdminLog;
use App\Models\Brand;
use App\Models\Country;
use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Morilog\Jalali\Jalalian;


class BrandController extends AdminController

{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)

    {

        Brand::factory()->count(1)->create();
        AdminLog::InsertLog(Auth::user(),'brand','seen');

        return view('Admin.brands.Index', [
            'brands' => $this->PaginatePagez(Brand::query(),$request,['name','tag','description'],['']),
            'countries' => Country::all(),
            'galleries' => Gallery::all()

        ]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin.Brands.Create',[
            'brands' => Brand::all(),
            'countries' => Country::all(),
              'galleries' => Gallery::all()

        ]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        if ($request->get('selectedImage') == 'uploadedImage')
        {        $object= explode("/",$request->file('image')->getClientMimeType());
            $imagePath = $request->file('image')->storeAs('public/Image/Brands',$request->get('title') . '.'. $object[1]);
            $h=Gallery::query()->create([
                'title' => $request->get('title'),
                'alt' =>$request->get('alt'),
                'mime' => $object[1],
                'path' => $imagePath,
                'flag' => 'Brands',
                'size' => $request->file('image')->getSize()/1024,
                'created_at' => Jalalian::now(),
                'updated_at' => Jalalian::now()

            ]);
            AdminLog::InsertLog(Auth::user(),'gallery','create',$h->id);
            $imagePath=$h->id;
        }
        else
        {
            $imagePath= $request->get('selectedImage');
        }
        $brand=Brand::query()->create([
            'name' => $request->get('name'),
            'gallery_id' =>$imagePath,
            'country_id' => $request->get('country'),
            'tag' => $request->get('tag'),
            'description' => $request->get('description'),
            'created_at' => Jalalian::now(),
            'updated_at' => Jalalian::now()
        ]);
        AdminLog::InsertLog(Auth::user(),'brand','create',$brand->id);
        return redirect(route('brands.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Brand $brand
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Brand $brand)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Brand $brand
     * @return \Illuminate\Http\Response
     */
    public function edit(Brand $brand)
    {

    }



    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Brand $brand
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Brand $brand)
    {
        if ($request->get('selectedImage') == 'uploadedImage')
        {        $object= explode("/",$request->file('image')->getClientMimeType());
            $imagePath = $request->file('image')->storeAs('public/Image/Brands',$request->get('title') . '.'. $object[1]);
            $h=Gallery::query()->create([
                'title' => $request->get('title'),
                'alt' =>$request->get('alt'),
                'mime' => $object[1],
                'path' => $imagePath,
                'flag' => 'Brands',
                'size' => $request->file('image')->getSize()/1024,
                'updated_at' => Jalalian::now()
            ]);
            $imagePath=$h->id;
            AdminLog::InsertLog(Auth::user(),'gallery','create',$h->id);
        }
        else
        {
            $imagePath= $request->get('selectedImage');

        }
        $brand->update([

            'name'=>$request->get('name'),
            'gallery_id'=> $imagePath,
            'description'=>$request->get('description'),
            'tag'=>$request->get('tag'),
            'country_id' => $request->get('country'),
            'updated_at' => Jalalian::now()
        ]);
        AdminLog::InsertLog(Auth::user(),'brand','update',$brand->id);
        return redirect(route('brands.index'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Brand $brand
     * @return \Illuminate\Http\Response
     */
    public function destroy(Brand $brand)
    {
        $brand->delete();
        AdminLog::InsertLog(Auth::user(),'brand','delete', $brand->id);
        return redirect(route('brands.index'));
    }

    public function multiDestroy(Request $request)
    {

        $data=$request->except('_token','_method','deleteAll');
        foreach($data as $key=>$value)
        {
            $brand=Brand::query()->where('name',$value)->delete();

            AdminLog::InsertLog(Auth::user(),'brand','delete', $key);
        }
        return redirect(route('brands.index'));
    }



}
