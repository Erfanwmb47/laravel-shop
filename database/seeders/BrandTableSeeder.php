<?php

namespace Database\Seeders;

use App\Models\Gallery;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Morilog\Jalali\Jalalian;

class BrandTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $tmp=Gallery::create([
            'title' => 'bencer',
            'alt' => 'bencer_logo',
            'size' => '0',
            'mime' => 'PNG',
            'flag' => 'brands',
            'path' => 'public/Image/Brands/bencer.png',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('brands')->insert([
            'name' => 'بنسر',
            'tag' => 'bencer',
            'description' => 'محصولات بهداشت دهان و دندان بنسر',
            'gallery_id' => $tmp->id,
            'created_at' => Jalalian::now(),
            'updated_at' => Jalalian::now()
        ]);

        $tmp=Gallery::create([
            'title' => 'bitroy',
            'alt' => 'bitroy_logo',
            'size' => '0',
            'mime' => 'PNG',
            'flag' => 'brands',
            'path' => 'public/Image/Brands/bitroy.png',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('brands')->insert([
            'name' => 'بیتروی',
            'tag' => 'bitroy',
            'description' => 'محصولات مراقبتی پوست و مو بیتروی',
            'gallery_id' => $tmp->id,
            'created_at' => Jalalian::now(),
            'updated_at' => Jalalian::now()
        ]);

        $tmp=Gallery::create([
            'title' => 'dermalift',
            'alt' => 'dermalift_logo',
            'size' => '0',
            'mime' => 'PNG',
            'flag' => 'brands',
            'path' => 'public/Image/Brands/dermalift.png',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('brands')->insert([
            'name' => 'درمالیفت',
            'tag' => 'dermalift',
            'description' => 'محصولات مراقبتی پوست و مو بیتروی',
            'gallery_id' => $tmp->id,
            'created_at' => Jalalian::now(),
            'updated_at' => Jalalian::now()
        ]);
    }


}
