<?php

use App\Models\Category;
use App\Models\Gallery;
use Illuminate\Support\Facades\DB;
use Morilog\Jalali\Jalalian;

$g9=Gallery::create([
    'title' => 'table',
    'alt' => 'table_icon',
    'size' => '0',
    'mime' => 'PNG',
    'flag' => 'categories',
    'path' => 'public/Image/Categories/table.png',
    'created_at' => now(),
    'updated_at' => now(),
]);
DB::table('categories')->insert([
    'name' => 'سالنی',
    'meta' => 'Beauty salon',
    'description' => 'محصولات مورد استفاده در سالن های آرایشی',
    'gallery_id' => $g9->id,
    'created_at' => Jalalian::now(),
    'updated_at' => Jalalian::now()
]);

DB::table('categories')->insert([
    'name' => 'تجهیزات آرایشگاهی',
    'meta' => 'Beauty salon equipment',
    'description' => 'تجحیزات آرایشگاهی',
    'category_id' => Category::whereMeta('Beauty salon')->first()->id,
    'created_at' => Jalalian::now(),
    'updated_at' => Jalalian::now()
]);
DB::table('categories')->insert([
    'name' => 'اپیلاسیون',
    'meta' => 'waxing',
    'description' => 'اپیلاسیون',
    'category_id' => Category::whereMeta('Beauty salon')->first()->id,
    'created_at' => Jalalian::now(),
    'updated_at' => Jalalian::now()
]);
DB::table('categories')->insert([
    'name' => 'طراحی و کاشت ناخن',
    'meta' => 'Nail planting and design',
    'description' => 'طراحی و کاشت ناخن',
    'category_id' => Category::whereMeta('Beauty salon')->first()->id,
    'created_at' => Jalalian::now(),
    'updated_at' => Jalalian::now()
]);
DB::table('categories')->insert([
    'name' => 'اکستنشن',
    'meta' => 'extensions',
    'description' => 'اکستنشن',
    'category_id' => Category::whereMeta('Beauty salon')->first()->id,
    'created_at' => Jalalian::now(),
    'updated_at' => Jalalian::now()
]);
DB::table('categories')->insert([
    'name' => 'ابزار آرایش و پیرایش',
    'meta' => 'Makeup and hairdressing tools',
    'description' => 'ابزار آرایش و پیرایش',
    'category_id' => Category::whereMeta('Beauty salon')->first()->id,
    'created_at' => Jalalian::now(),
    'updated_at' => Jalalian::now()
]);

require __DIR__ . '/sub sub categories/Beauty salon.php';
