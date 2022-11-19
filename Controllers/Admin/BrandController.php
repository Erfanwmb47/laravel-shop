<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Country;
use App\Models\Gallery;
use App\Models\User;
use App\Models\AdminLog;
use Faker\Factory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;




class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
//        $an= Brand::factory()->create();
//        Factory::create(Brand::class);
//        Brand::factory('10')->create();

       AdminLog::query()->create([
            'user_id'=> Auth::user()->id,
            'detail' => 'کاربر'.Auth::user()->username. 'از صفحه برند دیدن کرد'
        ]);

            $country = Country::all();
            $brands = Brand::paginate(10);

        return view('Admin.brands.Index', [
            'brands' => $brands,
           'countries' => $country,
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
            'countries' => Country::all()

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
/*        dd($request);*/
        $imagePath = $request->file('image')->storeAs('public/Image/Brands',$request->file('image')->getClientOriginalName());
        Brand::query()->create([
            'name' => $request->get('name'),
            // 'image' =>$imagePath,
            'country_id' => $request->get('country'),
            'tag' => $request->get('tag'),
            'description' => $request->get('description')
        ]);
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
        dd($request);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Brand $brand
     * @return \Illuminate\Http\Response
     */
    public function edit(Brand $brand)
    {
        //
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

        //dd($request);
        if ($request->get('selectedImage') == 'uploadedImage')
        {        $object= explode("/",$request->file('image')->getClientMimeType());
            $imagePath = $request->file('image')->storeAs('public/Image/Brands',$request->get('title') . '.'. $object[1]);
            $h=Gallery::query()->create([
                'title' => $request->get('title'),
                'alt' =>$request->get('alt'),
                'mime' => $object[1],
                'path' => $imagePath,
                'flag' => 'Brands',
                'size' => $request->file('image')->getSize()/1024

            ]);
            $imagePath=$h->id;
        }
        else
        {
            $imagePath= $request->get('selectedImage');

        }
/*        dd($request);*/
        $brand->update([

            'name'=>$request->get('name'),
            'gallery_id'=> $imagePath,
            'description'=>$request->get('description'),
            'tag'=>$request->get('tag'),
            'country_id' => $request->get('country'),
        ]);
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
        return redirect(route('brands.index'));
    }

    public function multiDestroy(Request $request)
    {

        $data=$request->except('_token','_method','deleteAll');
        foreach($data as $key=>$value)
        {
            Brand::query()->where('name',$value)->delete();
        }
        return redirect(route('brands.index'));
    }


    public function indexpaginate(Request $request)
    {
        // dd($request->pagezz);
        $country = Country::all();
        $brands = Brand::paginate($request->pagez);
        return view('Admin.brands.Index', [
            'brands' => $brands,
            'countries' => $country

        ]);
    }


}
