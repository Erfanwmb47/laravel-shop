<?php

namespace App\Http\Controllers\Stack;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Post;
use App\Http\Requests\SitemapRequest;
use App\Models\Category;
use App\Models\Sitemap;


class SitemapController extends Controller
{
    protected Post $postModel;
    protected Category $categoryModel;

/*    public function __construct()
    {
        $this->postModel = new Post;
        $this->categoryModel = new Category;
    }*/

    public function index()
    {
       // dd('hi');
        //return view('Admin.Categories.Create');
        return response()->view('sitemap.index')->header('Content-Type', 'text/xml');
    }

    public function static()
    {
        return response()->view('sitemap.static')->header('Content-Type', 'text/xml');

    }

    public function category(){

        return response()->view('sitemap.category',[
            'categories' => Category::all()
        ])->header('Content-Type', 'text/xml');

    }
}




