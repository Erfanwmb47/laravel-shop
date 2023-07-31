<?php

namespace App\Http\Controllers\Admin\Slider;

use App\Http\Controllers\Admin\AdminController;
use App\Models\AdminLog;
use App\Models\Gallery;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Morilog\Jalali\Jalalian;

class SliderController extends AdminController

{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public  $flag=['home_header_left','home_header_right',
                   'home_main_top',
                   'home_offer_1','home_offer_2','home_offer_3','home_offer_4',
                   'home_sticky_bottom','home_sticky_top',
                   'home_main_bottom',
                   'home_footer'
        ];

    public function index()
    {

      //  dd(Slider::whereFlag('home_header_left')->whereStatus(1)->firstOrFail());
        return view('Admin.Sliders.Index',[
           'home_header_right_active'=>Slider::whereFlag('home_header_right')->whereStatus(1)->first(),
            'home_header_right'=>Slider::whereFlag('home_header_right')->get(),
           'home_header_left_active'=>Slider::whereFlag('home_header_left')->whereStatus(1)->first(),
            'home_header_left'=>Slider::whereFlag('home_header_left')->get(),
            'home_main_top_active'=>Slider::whereFlag('home_main_top')->whereStatus(1)->first(),
            'home_main_top'=>Slider::whereFlag('home_main_top')->get(),
            'home_offer_1_active'=>Slider::whereFlag('home_offer_1')->whereStatus(1)->first(),
            'home_offer_1'=>Slider::whereFlag('home_offer_1')->get(),
            'home_offer_2_active'=>Slider::whereFlag('home_offer_2')->whereStatus(1)->first(),
            'home_offer_2'=>Slider::whereFlag('home_offer_2')->get(),
            'home_offer_3_active'=>Slider::whereFlag('home_offer_3')->whereStatus(1)->first(),
            'home_offer_3'=>Slider::whereFlag('home_offer_3')->get(),
            'home_offer_4_active'=>Slider::whereFlag('home_offer_4')->whereStatus(1)->first(),
            'home_offer_4'=>Slider::whereFlag('home_offer_4')->get(),
            'home_sticky_top_active'=>Slider::whereFlag('home_sticky_top')->whereStatus(1)->first(),
            'home_sticky_top'=>Slider::whereFlag('home_sticky_top')->get(),
            'home_sticky_bottom_active'=>Slider::whereFlag('home_sticky_bottom')->whereStatus(1)->first(),
            'home_sticky_bottom'=>Slider::whereFlag('home_sticky_bottom')->get(),

        ]);

    }

    /**
     * Show the form for creating a new resource.
     *
     *
     */
    public function create()
    {
        $flag=json_encode($this->flag);
        return view('Admin.Sliders.Create',[
            'galleries' => Gallery::whereFlag('Sliders')->get(),
            'flag'=>$flag
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //TODO age flag jadid bod
//        dd($request);


        if ($request->get('selectedImage') == 'uploadedImage')
        {        $object= explode("/",$request->file('image')->getClientMimeType());
            $imagePath = $request->file('image')->storeAs('public/Image/Sliders',$request->get('title') . '.'. $object[1]);
            $h=Gallery::query()->create([
                'title' => $request->get('title'),
                'alt' =>$request->get('alt'),
                'mime' => $object[1],
                'path' => $imagePath,
                'flag' => 'Sliders',
                'size' => $request->file('image')->getSize()/1024,
                'created_at' => now(),
                'updated_at' => now()

            ]);
            AdminLog::InsertLog(Auth::user(),'gallery','create',$h->id);
            $imagePath=$h->id;
        }
        else
        {
            $imagePath= $request->get('selectedImage');
        }

        if (! in_array($request->get('flag'),$this->flag))
         array_push($this->flag,$request->flag);

            $brand=Slider::query()->create([
            'title' => $request->get('SliderTitle'),
            'gallery_id' =>$imagePath,
            'link'=>$request->get('link'),
            'offer'=>$request->get('offer'),
            'flag'=>$request->get('flag'),
            'status'=>0,
            'tag' => $request->get('tag'),
            'description' => $request->get('description'),
            'created_at' => now(),
            'updated_at' => now()
        ]);

        AdminLog::InsertLog(Auth::user(),'brand','create',$brand->id);
        return redirect(route('sliders.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function show(Slider $slider)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function edit(Slider $slider)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Slider $slider)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function destroy(Slider $slider)
    {

        $s1 = $slider;
        $slider->delete();
        if (!!$s1->status){
            Slider::whereFlag($s1->flag)->firstOrFail()->update([
               'status' => 1
            ]);
        }
        toast('اسلایدر مورد نظر حذف شد','success');
        return back();
    }

    public function select(Slider $slider)
    {
        Slider::query()->whereFlag($slider->flag)->update([
           'status' => 0
        ]);
        $slider->update([
           'status' => 1
        ]);

        return back();
    }
}
