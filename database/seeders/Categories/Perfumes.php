<?php

use App\Models\Category;
use App\Models\Gallery;
use Illuminate\Support\Facades\DB;
use Morilog\Jalali\Jalalian;

$g10=Gallery::create([
    'title' => 'perfume',
    'alt' => 'perfume_icon',
    'size' => '0',
    'mime' => 'PNG',
    'flag' => 'categories',
    'path' => 'public/Image/Categories/perfume.png',
    'created_at' => now(),
    'updated_at' => now(),
]);
DB::table('categories')->insert([
    'name' => 'عطر و ادکلن',
    'meta' => 'Perfumes',
    'description' => 'عطر و ادکلن ',
    'gallery_id' => $g10->id,
    'created_at' => Jalalian::now(),
    'updated_at' => Jalalian::now()
]);

DB::table('categories')->insert([
    'name' => 'عطر جیبی',
    'meta' => 'Pocket perfume',
    'description' => 'عطر جیبی',
    'category_id' => Category::whereMeta('Perfumes')->first()->id,
    'created_at' => Jalalian::now(),
    'updated_at' => Jalalian::now()
]);
DB::table('categories')->insert([
    'name' => 'عطر زنانه',
    'meta' => 'Women perfume',
    'description' => 'عطر زنانه',
    'category_id' => Category::whereMeta('Perfumes')->first()->id,
    'created_at' => Jalalian::now(),
    'updated_at' => Jalalian::now()
]);
DB::table('categories')->insert([
    'name' => 'عطر مردانه',
    'meta' => 'Men perfume',
    'description' => 'عطر مردانه',
    'category_id' => Category::whereMeta('Perfumes')->first()->id,
    'created_at' => Jalalian::now(),
    'updated_at' => Jalalian::now()
]);
