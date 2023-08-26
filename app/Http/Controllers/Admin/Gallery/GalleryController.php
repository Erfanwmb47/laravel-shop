<?php

namespace App\Http\Controllers\Admin\Gallery;

use App\Http\Controllers\Admin\AdminController;
use App\Models\gallery;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GalleryController extends AdminController

{
    public  $flag=['Brands','Categories','Users','Products','Sliders','Countries'];

    /**
     * Display a listing of the resource.
     *
     *
     */
    public function index(Request $request)
    {

       if (empty($request->query())){
           return view('Admin.Galleries.Index',[
               'galleries'=>$this->PaginatePagez(Gallery::query()->latest(),$request,['title','alt','mime','flag'],[]),
               'flag'=>$this->flag
           ]);
       }else{
           $query=$request->query()['flag'];
           return view('Admin.Galleries.Index',[
               'galleries'=>$this->PaginatePagez(Gallery::query()->whereIn('flag',$query)->latest(),$request,['title','alt','mime','flag'],[]),
               'flag'=>$this->flag
           ]);
       }

        //session()->forget('errors');
       // $request->session()->regenerate();

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

        $request->validate([
           'image' => 'required|mimes:png,jpg,jpeg|max:2048'
        ]);
      //dd($request->image);
        $object= explode("/",$request->file('image')->getClientMimeType());

        $imagePath=0;
        if (!!$request->get('flag')){
            $imagePath = $request->file('image')->storeAs('public/Image/'.$request->get('flag').'/'.jdate(now())->getYear().'/'.jdate(now())->getMonth().'/'.jdate(now())->getDay(),$request->get('title') . '.'. $object[1]);
        }
        else {
            $imagePath = $request->file('image')->storeAs('public/Image/Uncategorized/' . jdate(now())->getYear() . '/' . jdate(now())->getMonth() . '/' . jdate(now())->getDay(), $request->get('title') . '.' . $object[1]);
        }

        //dd($imagePath);
        Gallery::query()->create([
            'title' => $request->get('title'),
            'alt' =>$request->get('alt'),
            'mime' => $object[1],
            'path' => $imagePath,
            'flag' => !!$request->get('flag')?$request->get('flag') : 'uncategorized' ,
            'size' => $request->file('image')->getSize()/1024

        ]);

        //return redirect()->back()->withErrors($request->validate)->withInput();
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
        //dd($gallery->user()->gallery_id);
        Storage::move($gallery->path,'public\trash\image\ '.$gallery->flag.'/'.jdate(now())->getYear().'/'.jdate(now())->getMonth().'/'.jdate(now())->getDay().$gallery->title. '.jpg');
        if ($gallery->flag == 'users'){

         $user =  User::query()->select()->where('gallery_id',$gallery->id)->firstOrFail();

         if ($user->sex == 'woman'){
             $user->update([
                 'gallery_id' => 2
             ]);
         }
         else{
             $user->update([
                 'gallery_id' => 1
             ]);
         }
        }
        $gallery->delete();


        return redirect(route('galleries.index'));
    }



}
