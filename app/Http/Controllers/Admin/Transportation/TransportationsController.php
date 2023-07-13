<?php

namespace App\Http\Controllers\Admin\Transportation;

use App\Http\Controllers\Admin\AdminController;
use App\Models\Gallery;
use App\Models\Transportation;
use Illuminate\Http\Request;

class TransportationsController extends AdminController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('Admin.Transportation.Index',[
            'transportations' => $this->PaginatePagez(Transportation::query(),$request,['name','title','description'],[''])
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
     * @param  \App\Models\Transportation  $transportation
     * @return \Illuminate\Http\Response
     */
    public function show(Transportation $transportation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Transportation  $transportation
     * @return \Illuminate\Http\Response
     */
    public function edit(Transportation $transportation)
    {
        return view('Admin.Transportation.Edit',[
            'transportation' => $transportation,
            'galleries' => Gallery::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Transportation  $transportation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Transportation $transportation)
    {
        $transportation->update($request->all());
        $transportation->update([
            'gallery_id' => $request->selectedImage
        ]);
        toast('حمل و نقل مورد نظر با موفقیت ویرایش شد','success');
        return  redirect(route('transportations.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Transportation  $transportation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Transportation $transportation)
    {
        $transportation->delete();
        toast('حمل و نقل مورد نظر با موفقیت حذف شد','success');
        return  redirect(route('transportations.index'));
    }
}
