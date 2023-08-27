<?php

use App\Models\Category;
use App\Models\Gallery;
use Illuminate\Support\Facades\DB;
use Morilog\Jalali\Jalalian;

$g8=Gallery::create([
    'title' => 'hair-dryer',
    'alt' => 'hair-dryer_icon',
    'size' => '0',
    'mime' => 'PNG',
    'flag' => 'categories',
    'path' => 'public/Image/Categories/hair-dryer.png',
    'created_at' => now(),
    'updated_at' => now(),
]);
DB::table('categories')->insert([
    'name' => 'لوازم شخصی برقی',
    'meta' => 'Personal electrical appliances',
    'description' => 'محصولات الکتریکی مراقبت شخصی',
    'gallery_id' => $g8->id,
    'created_at' => Jalalian::now(),
    'updated_at' => Jalalian::now()
]);
DB::table('categories')->insert([
    'name' => 'حالت دهنده های برقی',
    'meta' => 'Personal Hair styler',
    'description' => 'حالت دهنده های برقی',
    'category_id' => Category::whereMeta('Personal electrical appliances')->first()->id,
    'created_at' => Jalalian::now(),
    'updated_at' => Jalalian::now()
]);
DB::table('categories')->insert([
    'name' => 'اصلاح صورت و بدن',
    'meta' => 'Shaver body face',
    'description' => 'اصلاح صورت و بدن',
    'category_id' => Category::whereMeta('Personal electrical appliances')->first()->id,
    'created_at' => Jalalian::now(),
    'updated_at' => Jalalian::now()
]);
DB::table('categories')->insert([
    'name' => 'سایر لوازم شخصی برقی',
    'meta' => 'Other electrical personal care',
    'description' => 'سایر لوازم شخصی برقی',
    'category_id' => Category::whereMeta('Personal electrical appliances')->first()->id,
    'created_at' => Jalalian::now(),
    'updated_at' => Jalalian::now()
]);
