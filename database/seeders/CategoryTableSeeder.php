<?php

namespace Database\Seeders;

use App\Models\Gallery;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Morilog\Jalali\Jalalian;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
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

    }
}
