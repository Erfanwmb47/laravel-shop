<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateCategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       //dd(auth()->user());

        return view('Admin.Categories.Index',[

            'categories'=> Category::all(),
            'categorySelected'=>'0'

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

            'categories' => Category::all()

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
        //dd($request);
        $imagePath = $request->file('image')->storeAs('public/Image/Categories',$request->file('image')->getClientOriginalName());
        Category::query()->create([
            'name' => $request->get('name'),
            'image' =>$imagePath,
            'meta' =>$request->get('meta'),
            'description' =>$request->get('description'),
            'category_id' =>$request->get('category_id')
        ]);
        return redirect(route('categories.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {

        return view('Admin.Categories.Index',[

            'categories'=> Category::all(),
            'categorySelected'=> $category->id

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
//        dd($category->);
        $imagePath = $request->file('image')->storeAs('public/Image/Categories',$request->file('image')->getClientOriginalName());
        $category->update([

            'name'=>$request->get('name'),
            'image'=>$imagePath,
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
