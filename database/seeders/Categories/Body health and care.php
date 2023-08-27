<?php

use App\Models\Category;
use App\Models\Gallery;
use Illuminate\Support\Facades\DB;
use Morilog\Jalali\Jalalian;

$g4=Gallery::create([
    'title' => 'care',
    'alt' => 'care_icon',
    'size' => '0',
    'mime' => 'PNG',
    'flag' => 'categories',
    'path' => 'public/Image/Categories/care.png',
    'created_at' => now(),
    'updated_at' => now(),
]);
DB::table('categories')->insert([
    'name' => 'مراقبت و بهداشت بدن',
    'meta' => 'Body health and care',
    'description' => 'محصولات مراقبتی و بهداشتی بدن',
    'gallery_id' => $g4->id,
    'created_at' => Jalalian::now(),
    'updated_at' => Jalalian::now()
]);
DB::table('categories')->insert([
    'name' => 'دئودرانت و ضد تعریق',
    'meta' => 'Deodorant and antiperspirant',
    'description' => 'محصولات دئودرانت و ضد تعریق',
    'category_id' => Category::whereMeta('Body health and care')->first()->id,
    'created_at' => Jalalian::now(),
    'updated_at' => Jalalian::now()
]);
DB::table('categories')->insert([
    'name' => 'مراقبت بدن',
    'meta' => 'Body care',
    'description' => 'محصولات مراقبت بدن',
    'category_id' => Category::whereMeta('Body health and care')->first()->id,
    'created_at' => Jalalian::now(),
    'updated_at' => Jalalian::now()
]);
DB::table('categories')->insert([
    'name' => 'بهداشتی بدن',
    'meta' => 'Body health',
    'description' => 'محصولات بهداشتی بدن',
    'category_id' => Category::whereMeta('Body health and care')->first()->id,
    'created_at' => Jalalian::now(),
    'updated_at' => Jalalian::now()
]);
DB::table('categories')->insert([
    'name' => 'اصلاح بدن',
    'meta' => 'Shaving products',
    'description' => 'محصولات اصلاح بدن',
    'category_id' => Category::whereMeta('Body health and care')->first()->id,
    'created_at' => Jalalian::now(),
    'updated_at' => Jalalian::now()
]);
DB::table('categories')->insert([
    'name' => 'استحمام',
    'meta' => 'Bath products',
    'description' => 'محصولات استحمام',
    'category_id' => Category::whereMeta('Body health and care')->first()->id,
    'created_at' => Jalalian::now(),
    'updated_at' => Jalalian::now()
]);

require __DIR__ . '/sub sub categories/Body health and care.php';
