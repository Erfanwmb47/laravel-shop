<?php

use App\Models\Category;
use App\Models\Gallery;
use Illuminate\Support\Facades\DB;
use Morilog\Jalali\Jalalian;

$g5=Gallery::create([
    'title' => 'mother',
    'alt' => 'mother_icon',
    'size' => '0',
    'mime' => 'PNG',
    'flag' => 'categories',
    'path' => 'public/Image/Categories/mother.png',
    'created_at' => now(),
    'updated_at' => now(),
]);
DB::table('categories')->insert([
    'name' => 'مادر و کودک',
    'meta' => 'Mom and baby',
    'description' => 'محصولات بهداشتی و مراقبتی ویژه مادر و کودک',
    'gallery_id' => $g5->id,
    'created_at' => Jalalian::now(),
    'updated_at' => Jalalian::now()
]);
DB::table('categories')->insert([
    'name' => 'لوازم شخصی کودک',
    'meta' => 'Child accessories',
    'description' => 'محصولات و لوازم شخصی کودک',
    'category_id' => Category::whereMeta('Mom and baby')->first()->id,
    'created_at' => Jalalian::now(),
    'updated_at' => Jalalian::now()
]);
DB::table('categories')->insert([
    'name' => ' بهداشت مادرو کودک',
    'meta' => 'Maternal and child hygiene products',
    'description' => 'محصولات  بهداشت مادرو کودک',
    'category_id' => Category::whereMeta('Mom and baby')->first()->id,
    'created_at' => Jalalian::now(),
    'updated_at' => Jalalian::now()
]);
DB::table('categories')->insert([
    'name' => 'سایر لوازم کودک',
    'meta' => 'Child accessories',
    'description' => ' سایر محصولات و  لوازم کودک',
    'category_id' => Category::whereMeta('Mom and baby')->first()->id,
    'created_at' => Jalalian::now(),
    'updated_at' => Jalalian::now()
]);
