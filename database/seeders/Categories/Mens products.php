<?php

use App\Models\Category;
use App\Models\Gallery;
use Illuminate\Support\Facades\DB;
use Morilog\Jalali\Jalalian;

$g7=Gallery::create([
    'title' => 'men',
    'alt' => 'men_icon',
    'size' => '0',
    'mime' => 'PNG',
    'flag' => 'categories',
    'path' => 'public/Image/Categories/men.png',
    'created_at' => now(),
    'updated_at' => now(),
]);
DB::table('categories')->insert([
    'name' => 'مردانه',
    'meta' => 'Mens products',
    'description' => 'محصولات مراقبت و بهداشت مردانه',
    'gallery_id' => $g7->id,
    'created_at' => Jalalian::now(),
    'updated_at' => Jalalian::now()
]);
DB::table('categories')->insert([
    'name' => 'محصولات بدن آقایان',
    'meta' => 'Men set',
    'description' => 'محصولات  بدن آقایان',
    'category_id' => Category::whereMeta('Mens products')->first()->id,
    'created_at' => Jalalian::now(),
    'updated_at' => Jalalian::now()
]);
DB::table('categories')->insert([
    'name' => 'محصولات پوست آقایان',
    'meta' => 'Body skin health men',
    'description' => 'محصولات  پوست آقایان',
    'category_id' => Category::whereMeta('Mens products')->first()->id,
    'created_at' => Jalalian::now(),
    'updated_at' => Jalalian::now()
]);
DB::table('categories')->insert([
    'name' => 'محصولات موی آقایان',
    'meta' => 'Hair care men',
    'description' => 'محصولات  موی آقایان',
    'category_id' => Category::whereMeta('Mens products')->first()->id,
    'created_at' => Jalalian::now(),
    'updated_at' => Jalalian::now()
]);
DB::table('categories')->insert([
    'name' => 'محصولات اصلاح آقایان',
    'meta' => 'Shaving men',
    'description' => 'محصولات اصلاح آقایان',
    'category_id' => Category::whereMeta('Mens products')->first()->id,
    'created_at' => Jalalian::now(),
    'updated_at' => Jalalian::now()
]);
