<?php

use App\Models\Category;
use App\Models\Gallery;
use Illuminate\Support\Facades\DB;
use Morilog\Jalali\Jalalian;

$g3=Gallery::create([
    'title' => 'hair',
    'alt' => 'hair_icon',
    'size' => '0',
    'mime' => 'PNG',
    'flag' => 'categories',
    'path' => 'public/Image/Categories/hair.png',
    'created_at' => now(),
    'updated_at' => now(),
]);
DB::table('categories')->insert([
    'name' => 'محصولات مو',
    'meta' => 'Hair products',
    'description' => 'محصولات مراقبت و نگهداری مو ',
    'gallery_id' => $g3->id,
    'created_at' => Jalalian::now(),
    'updated_at' => Jalalian::now()
]);

DB::table('categories')->insert([
    'name' => 'بهداشت و مراقبت مو',
    'meta' => 'Hair care products',
    'description' => 'محصولات بهداشت و مراقبت مو',
    'category_id' => Category::whereMeta('Hair products')->first()->id,
    'created_at' => Jalalian::now(),
    'updated_at' => Jalalian::now()
]);
DB::table('categories')->insert([
    'name' => 'تجهیزات رنگ مو',
    'meta' => 'Hair color makeup products',
    'description' => 'محصولات تجهیزات رنگ مو',
    'category_id' => Category::whereMeta('Hair products')->first()->id,
    'created_at' => Jalalian::now(),
    'updated_at' => Jalalian::now()
]);
DB::table('categories')->insert([
    'name' => 'حالت دهنده مو',
    'meta' => 'Hair styling',
    'description' => 'محصولات حالت دهنده مو',
    'category_id' => Category::whereMeta('Hair products')->first()->id,
    'created_at' => Jalalian::now(),
    'updated_at' => Jalalian::now()
]);

//DB::table('categories')->insert([
//    'name' => ' حالت دهنده های برقی مو',
//    'meta' => 'Hair styler',
//    'description' => 'محصولات حالت دهنده های برقی مو',
//    'category_id' => Category::whereMeta('Hair products')->first()->id,
//    'created_at' => Jalalian::now(),
//    'updated_at' => Jalalian::now()
//]);
DB::table('categories')->insert([
    'name' => 'اکسسوری مو',
    'meta' => 'Hair appliances',
    'description' => 'محصولات اکسسوری مو',
    'category_id' => Category::whereMeta('Hair products')->first()->id,
    'created_at' => Jalalian::now(),
    'updated_at' => Jalalian::now()
]);

require __DIR__ . '/sub sub categories/Hair products.php';

