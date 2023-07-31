<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Controllers\Admin\AdminController;
use App\Http\Requests\CreateCategoryRequest;
use App\Models\AdminLog;
use App\Models\Category;
use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Morilog\Jalali\Jalalian;

class CategoryController extends AdminController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
           return view('Admin.Categories.Index', [
               'categories' => Category::all(),
               'categorySelected' => '0',
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
        return view('Admin.Categories.Create',[

            'categories' => Category::all(),
            'galleries' =>Gallery::whereFlag('Categories')->get()

        ]);


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateCategoryRequest $request)
    {

//        dd($request);
        if($request->category_id){
            $request->validate([
                'category_id' => 'exists:categories,id'
            ]);
        }
        //$imagePath = $request->file('image')->storeAs('public/Image/Categories',$request->file('image')->getClientOriginalName());
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
        Category::query()->create([
            'name' => $request->get('name'),
            'gallery_id' =>$imagePath,
            'meta' =>$request->get('meta'),
            'description' =>$request->get('description'),
            'category_id' =>$request->get('category_id')
        ]);
        return redirect(route('categories.index'));
    }

    /**
     * Display the  specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {

        return view('Admin.Categories.Index',[

            'categories'=> Category::all(),
            'categorySelected'=> $category->id,
            'galleries' => Gallery::all()

        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
//

        if ($request->get('selectedImage') == 'uploadedImage')
        {        $object= explode("/",$request->file('image')->getClientMimeType());
            $imagePath = $request->file('image')->storeAs('public/Image/Brands',$request->get('title') . '.'. $object[1]);
            $h=Gallery::query()->create([
                'title' => $request->get('title'),
                'alt' =>$request->get('alt'),
                'mime' => $object[1],
                'path' => $imagePath,
                'flag' => 'categories',
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
//        $imagePath = $request->file('image')->storeAs('public/Image/Categories',$request->file('image')->getClientOriginalName());
        $category->update([
            'name'=>$request->get('name'),
            'gallery_id'=>$imagePath,
            'description'=>$request->get('description'),
            'meta'=>$request->get('meta'),
        ]);
        $stacks=Category::all();

         if(!$category->category_id){
            //پدر بزرگ
            return redirect(route('categories.show',$category));

        }
         elseif ($category->category_id){
             $temp = $category->category_id; // اسم پدر
             foreach ($stacks as $stack){
                 if($stack->id == $temp){
                     if($stack->category_id) // نوه
                     {
                         return redirect(route('categories.show',$stack->category_id));
                     }
                     elseif (!$stack->category_id){
                         return redirect(route('categories.show',$stack));

                     }
                 }
             }
         }



    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request ,Category $category)
    {

//        dd($category->children()->count());
        if ($request->get('DeleteAll') == null) {
            if (!$category->parent) {
//            پدر
                Category::query()->where('category_id', $category->id)->update([
                    'category_id' => null
                ]);
                $category->delete();
                return redirect(route('categories.index'));
            } elseif ($category->children()->count() == 0) {
//            نوه

                $category->delete();
                return redirect(route('categories.show', $category->parent->category_id));
            } elseif ($category->parent && $category->children()) {
//            فرزند
                Category::query()->where('category_id', $category->id)->update([
                    'category_id' => $category->parent->id
                ]);
                $category->delete();
                return redirect(route('categories.show', $category->parent->id));
            }
        }
        else{
            if($category->children){
                foreach ($category->children as $children){
                    if ($children->children){
                        foreach ($children->children as $child){
                            $child->delete();
                        }
                    }
                    $children->delete();
                }
            }
            $category->delete();
            return redirect(route('categories.index'));
        }
    }

    public function subCategories(Category $category)
    {

        dd($category);
    }
}
