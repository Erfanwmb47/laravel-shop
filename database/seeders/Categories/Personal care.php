<?php

use App\Models\Category;
use App\Models\Gallery;
use Illuminate\Support\Facades\DB;
use Morilog\Jalali\Jalalian;

$g6=Gallery::create([
    'title' => 'self-love',
    'alt' => 'self-love_icon',
    'size' => '0',
    'mime' => 'PNG',
    'flag' => 'categories',
    'path' => 'public/Image/Categories/self-love.png',
    'created_at' => now(),
    'updated_at' => now(),
]);
DB::table('categories')->insert([
    'name' => 'بهداشت شخصی',
    'meta' => 'Personal care',
    'description' => 'محصولات مراقبت و بهداشت شخصی',
    'gallery_id' => $g6->id,
    'created_at' => Jalalian::now(),
    'updated_at' => Jalalian::now()
]);
DB::table('categories')->insert([
    'name' => 'بهداشت دهان و دندان',
    'meta' => 'Oral care',
    'description' => 'محصولات بهداشت دهان و دندان',
    'category_id' => Category::whereMeta('Personal care')->first()->id,
    'created_at' => Jalalian::now(),
    'updated_at' => Jalalian::now()
]);
DB::table('categories')->insert([
    'name' => 'سلامت عمومی',
    'meta' => 'Health products',
    'description' => 'محصولات سلامت عمومی',
    'category_id' => Category::whereMeta('Personal care')->first()->id,
    'created_at' => Jalalian::now(),
    'updated_at' => Jalalian::now()
]);
DB::table('categories')->insert([
    'name' => 'بهداشت سالمندان',
    'meta' => 'Elderly care',
    'description' => 'محصولات بهداشت سالمندان',
    'category_id' => Category::whereMeta('Personal care')->first()->id,
    'created_at' => Jalalian::now(),
    'updated_at' => Jalalian::now()
]);
DB::table('categories')->insert([
    'name' => 'بهداشت زناشویی',
    'meta' => 'Marital care',
    'description' => 'محصولات بهداشت زناشویی',
    'category_id' => Category::whereMeta('Personal care')->first()->id,
    'created_at' => Jalalian::now(),
    'updated_at' => Jalalian::now()
]);
DB::table('categories')->insert([
    'name' => 'بهداشت بانوان',
    'meta' => 'Woman care',
    'description' => 'محصولات بهداشت بانوان',
    'category_id' => Category::whereMeta('Personal care')->first()->id,
    'created_at' => Jalalian::now(),
    'updated_at' => Jalalian::now()
]);
