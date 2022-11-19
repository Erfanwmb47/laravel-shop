<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Country;
use App\Models\gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //dd('hi');
        $galleries = Gallery::paginate(10);
        return view('Admin.Galleries.Galleries',[
            'galleries' => $galleries
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


        $object= explode("/",$request->file('image')->getClientMimeType());
        //dd($object[1]);
       // $imagePath = $request->file('image')->storeAs('public/Image/Users',$request->file('image')->getClientOriginalName());
        //dd($request->get('flag'));
        $imagePath=0;
        //dd($request->get('flag'));
        switch ($request->get('flag')){

            case 'users' :
                $imagePath = $request->file('image')->storeAs('public/Image/Users',$request->get('title') . '.'. $object[1]);
                    break;
                case 'categories' :
                $imagePath = $request->file('image')->storeAs('public/Image/Categories',$request->get('title') . '.'. $object[1]);
                    break;
                case 'brands' :
                $imagePath = $request->file('image')->storeAs('public/Image/Brands',$request->get('title') . '.'. $object[1]);
                    break;
                case 'products' :
                $imagePath = $request->file('image')->storeAs('public/Image/Products',$request->get('title') . '.'. $object[1]);
                    break;
                case 'sliders' :
                $imagePath = $request->file('image')->storeAs('public/Image/Sliders',$request->get('title') . '.'. $object[1]);
                    break;
        }
        //dd($imagePath);


        Gallery::query()->create([
            'title' => $request->get('title'),
            'alt' =>$request->get('alt'),
            'mime' => $object[1],
            'path' => $imagePath,
            'flag' => $request->get('flag'),
            'size' => $request->file('image')->getSize()/1024

        ]);

        return redirect(route('galleries.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function show(gallery $gallery)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function edit(gallery $gallery)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, gallery $gallery)
    {

        Storage::move($gallery->path,str_replace($gallery->title,$request->title,$gallery->path));
        $gallery->update([
            'title' => $request->get('title'),
            'alt' =>$request->get('alt'),
            'flag' => $request->get('flag'),
            'path' => str_replace($gallery->title,$request->title,$gallery->path)
        ]);
        return redirect(route('galleries.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function destroy(gallery $gallery)
    {
        Storage::move($gallery->path,'public\trash\image\ '.$gallery->title. '.jpg');
        $gallery->delete();

        return redirect(route('galleries.index'));
    }

    public function indexpaginate(Request $request)
    {
        // dd($request->pagezz);
        $galleries = Gallery::paginate($request->pagez);
        return view('Admin.Galleries.Galleries', [
            'galleries' => $galleries,
        ]);
    }
}
