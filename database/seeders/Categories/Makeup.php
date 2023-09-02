<?php

use App\Models\Category;
use App\Models\Gallery;
use Illuminate\Support\Facades\DB;
use Morilog\Jalali\Jalalian;


$g1=Gallery::create([
    'title' => 'makeup',
    'alt' => 'makeup_icon',
    'size' => '0',
    'mime' => 'PNG',
    'flag' => 'categories',
    'path' => 'public/Image/Categories/makeup.png',
    'created_at' => now(),
    'updated_at' => now(),
]);

DB::table('categories')->insert([
    'name' => 'لوازم آرایش',
    'meta' => 'Makeup',
    'description' => 'محصولات آرایشی زنانه',
    'gallery_id' => $g1->id,
    'created_at' => Jalalian::now(),
    'updated_at' => Jalalian::now()
]);
DB::table('categories')->insert([
    'name' => 'لوازم آرایش صورت',
    'meta' => 'face makeup',
    'description' => 'لوازم آرایش و بهداشتی صورت ',
    'category_id' =>Category::whereMeta('makeup')->first()->id,
    'created_at' => Jalalian::now(),
    'updated_at' => Jalalian::now()
]);
DB::table('categories')->insert([
    'name' => 'لوازم آرایش ابرو',
    'meta' => 'eyebrow makeup',
    'description' => 'لوازم آرایش و بهداشتی ابرو ',
    'category_id' =>Category::whereMeta('makeup')->first()->id,
    'created_at' => Jalalian::now(),
    'updated_at' => Jalalian::now()
]);
DB::table('categories')->insert([
    'name' => 'لوازم آرایش چشم',
    'meta' => 'eye makeup',
    'description' => 'لوازم آرایش و بهداشتی چشم ',
    'category_id' =>Category::whereMeta('makeup')->first()->id,
    'created_at' => Jalalian::now(),
    'updated_at' => Jalalian::now()
]);
DB::table('categories')->insert([
    'name' => 'لوازم آرایش لب',
    'meta' => 'lips makeup',
    'description' => 'لوازم آرایش و بهداشتی لب ',
    'category_id' =>Category::whereMeta('makeup')->first()->id,
    'created_at' => Jalalian::now(),
    'updated_at' => Jalalian::now()
]);
DB::table('categories')->insert([
    'name' => 'لوازم آرایش بدن',
    'meta' => 'body makeup',
    'description' => 'لوازم آرایش و بهداشتی بدن ',
    'category_id' =>Category::whereMeta('makeup')->first()->id,
    'created_at' => Jalalian::now(),
    'updated_at' => Jalalian::now()
]);
DB::table('categories')->insert([
    'name' => 'لوازم آرایش ناخن',
    'meta' => 'nail makeup',
    'description' => 'لوازم آرایش و بهداشتی ناخن ',
    'category_id' =>Category::whereMeta('makeup')->first()->id,
    'created_at' => Jalalian::now(),
    'updated_at' => Jalalian::now()
]);

DB::table('categories')->insert([
    'name' => 'ابزار آرایش',
    'meta' => 'makeup tools',
    'description' => 'ابزار آرایش',
    'category_id' =>Category::whereMeta('makeup')->first()->id,
    'created_at' => Jalalian::now(),
    'updated_at' => Jalalian::now()
]);

        require __DIR__ . '/sub sub categories/Makeup.php';
