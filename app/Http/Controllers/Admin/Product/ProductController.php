<?php

namespace App\Http\Controllers\Admin\Product;

use App\Http\Controllers\Admin\AdminController;
use App\Http\Requests\Admin\Product\CreateProductRequest;
use App\Models\Attribute;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Gallery;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class ProductController extends AdminController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

//        $od=Product::search()->where('name','non')->get();
//        dd($od);
        Product::factory()->count(1)->create();

        return view('Admin.Products.Index',[
            'products'=>$this->PaginatePagez(Product::query(),$request,['name','nickName','price','UPC','description','abstract',],['user','name','email','username','phone']),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('Admin.Products.Create',[
            'categories' => Category::all(),
            'brands' => Brand::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateProductRequest $request)
    {//CreateProductRequest
       // dd(sizeof($request->imageNameProduct));

       // return 'ok';
//        dd($request);
      $product = Product::create([
           'name' =>$request->name,
           'nickName'=>$request->nickName,
           'price'=>$request->price,
           'UPC'=>$request->UPC,
           'volume' => implode(",",$request->volume),
           'weight' =>$request->weight,
           'quantity' =>$request->quantity,
           'maxOrder' =>$request->maxOrder ,
           'abstract'=>$request->abstract,
           'description' =>$request->description,
            'brand_id' =>$request->brand,
//           'gallery_id' =>$request->name,
           'user_id'=>auth()->user()->id,
       ]);
      //TODO fun
        $this->imageProduct($request,$product);
      $product->categories()->sync($request->categories);
        $this->attachAttributesToProducts($product,$request);
        Alert::toast( 'محصول مورد نظر با موفقیت افزوده شد','success');
        return redirect(route('products.index'));
    }

    private function imageProduct(Request $request,$product)
    {
       // dd($request,$request->file()['multiple']);
        $imageFileProduct=$request->file()['multiple'];
        $count=sizeof($request->file()['multiple']);
        $imageNameProduct=$request->imageNameProduct;
        $imageDefaultProduct=$request->defaultImage;
        $imageAltProduct=$request->imageAltProduct;
        for ($i=0;$i<$count;$i++){
            $object= explode("/",$imageFileProduct[$i]->getClientMimeType());
            $imagePath = $imageFileProduct[$i]->storeAs('public/Image/Product'.'/'.jdate(now())->getYear().'/'.jdate(now())->getMonth().'/'.jdate(now())->getDay(),$imageNameProduct[$i]. '.'. $object[1]);
            $gallery=Gallery::query()->create([
                'title' => $imageNameProduct[$i],
                'alt' =>$imageAltProduct[$i],
                'mime' => $object[1],
                'path' => $imagePath,
                'flag' => 'Products',
                'size' => $imageFileProduct[$i]->getSize()/1024
            ]);
            if($imageDefaultProduct ==
                $imageFileProduct[$i]->getClientOriginalName()){
                $product->update([
                    'gallery_id' => $gallery->id
                ]);
            }

            $product->galleries()->attach($gallery);
            //dd($imageDefaultProduct,$imageNameProduct[$i],$product,$gallery->id);


        }
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

        return view('Admin.Products.Edit',[
            'categories' => Category::all(),
            'brands' => Brand::all(),
            'product' => $product
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //TODO inja check beshe va inke time in DB test nashode
        //az DB ham estefade shode ke nabayad estefade mishod

        if ($product->price != $request->price)
        {
            DB::table('price_product')->insert([
                'product_id'=>$product->id,
                'before_price'=>$product->price,
                'after_price'=>$request->price,
            ]);
        }

        $product->update([
            'name' =>$request->name,
            'nickName'=>$request->nickName,
            'price'=>$request->price,
            'UPC'=>$request->UPC,
            'volume' => implode(",",$request->volume),
            'weight' =>$request->weight,
            'quantity' =>$request->quantity,
            'maxOrder' =>$request->maxOrder ,
            'abstract'=>$request->abstract,
            'brand_id'=> $request->brand,
            'description' =>$request->description,
//           'gallery_id' =>$request->name,
            'user_id'=>auth()->user()->id,
        ]);
        $product->categories()->sync($request->categories);
        $product->attributes()->detach();
        $this->attachAttributesToProducts($product,$request);
        Alert::toast( 'محصول مورد نظر با موفقیت ویرایش شد','success');
        return redirect(route('products.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->galleries()->detach();
        $product->delete();
        Alert::toast( 'محصول مورد نظر با موفقیت حذف شد','success');
        return back();
    }

    public function getValues(Request $request)
    {
        $data = $request->validate([
           'name' => 'required'
        ]);
        $attr = Attribute::where('name',$data['name'])->first();
        if(is_null($attr)) return response([]);
        return response(['data' => $attr->values->pluck('value')]);
    }

    protected function attachAttributesToProducts(Product $product,Request $validData)
    {
        $attributes = collect($validData['attributes']);
        $attributes->each(function ($item) use ($product){
            if(is_null($item['name']) || is_null($item['value'])){
                return;
            }

            $attr = Attribute::firstOrCreate(
                ['name' => $item['name']]
            );

            $attr_value = $attr->values()->firstOrCreate(
                ['value' => $item['value']]
            );

            $product->attributes()->attach($attr->id,['value_id' => $attr_value->id]);
        });
    }
}
