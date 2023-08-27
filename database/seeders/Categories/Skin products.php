<?php

use App\Models\Category;
use App\Models\Gallery;
use Illuminate\Support\Facades\DB;
use Morilog\Jalali\Jalalian;

$g2=Gallery::create([
    'title' => 'skincare',
    'alt' => 'skincare_icon',
    'size' => '0',
    'mime' => 'PNG',
    'flag' => 'categories',
    'path' => 'public/Image/Categories/skincare.png',
    'created_at' => now(),
    'updated_at' => now(),
]);
DB::table('categories')->insert([
    'name' => 'محصولات پوستی',
    'meta' => 'Skin products',
    'description' => 'محصولات مراقبت پوستی',
    'gallery_id' => $g2->id,
    'created_at' => Jalalian::now(),
    'updated_at' => Jalalian::now()
]);
DB::table('categories')->insert([
    'name' => 'مراقبت پوست',
    'meta' => 'Skin care',
    'description' => 'محصولات مراقبت پوستی',
    'category_id' => Category::whereMeta('Skin products')->first()->id,
    'created_at' => Jalalian::now(),
    'updated_at' => Jalalian::now()
]);
DB::table('categories')->insert([
    'name' => 'پاک کننده صورت',
    'meta' => 'Makeup remover',
    'description' => 'محصولات پاک کننده صورت',
    'category_id' => Category::whereMeta('Skin products')->first()->id,
    'created_at' => Jalalian::now(),
    'updated_at' => Jalalian::now()
]);
DB::table('categories')->insert([
    'name' => 'ابزار جانبی پوست',
    'meta' => 'Skin care tools',
    'description' => 'محصولات ابزار جانبی پوست',
    'category_id' => Category::whereMeta('Skin products')->first()->id,
    'created_at' => Jalalian::now(),
    'updated_at' => Jalalian::now()
]);
