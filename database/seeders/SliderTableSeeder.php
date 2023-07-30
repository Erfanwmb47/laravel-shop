<?php

namespace Database\Seeders;

use App\Models\Gallery;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SliderTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('sliders')->insert([
            'title' => 'اسلایدر هدر سمت راست',
            'description' =>'فروش محصولات آرایشی بهداشتی با بهترین قیمت',
            'link' => '/',
            'flag' => 'home_header_right',
            'tag' => 'آرایشی',
            'status' => '1',
            'gallery_id' => Gallery::where('alt','home_header_right')->first()->id,
            'created_at'=>now(),
            'updated_at'=>now(),
        ]);
        DB::table('sliders')->insert([
            'title' => 'اسلایدر هدر سمت چپ',
            'description' =>'تخفیف همیشگی روی محصولات',
            'link' => '/',
            'flag' => 'home_header_left',
            'tag' => 'آرایشی',
            'status' => '1',
            'gallery_id' => Gallery::where('alt','home_header_left')->first()->id,
            'created_at'=>now(),
            'updated_at'=>now(),
        ]);
    }
}
