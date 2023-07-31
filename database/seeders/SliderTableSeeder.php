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
        DB::table('sliders')->insert([
            'title' => 'اسلایدر بدنه بالا',
            'description' =>'کد تخفیفت رو از اینجا بردار',
            'link' => '/',
            'flag' => 'home_main_top',
            'tag' => 'تخفیف',
            'status' => '1',
            'gallery_id' => Gallery::where('alt','home_main_top')->first()->id,
            'created_at'=>now(),
            'updated_at'=>now(),
        ]);
        DB::table('sliders')->insert([
            'title' => 'اسلایدر آفر 1',
            'description' =>'کد تخفیفت رو از اینجا بردار',
            'link' => '/',
            'flag' => 'home_offer_1',
            'tag' => 'تخفیف',
            'status' => '1',
            'gallery_id' => Gallery::where('alt','home_offer_1')->first()->id,
            'created_at'=>now(),
            'updated_at'=>now(),
        ]);
        DB::table('sliders')->insert([
            'title' => 'اسلایدر آفر 2',
            'description' =>'کد تخفیفت رو از اینجا بردار',
            'link' => '/',
            'flag' => 'home_offer_2',
            'tag' => 'تخفیف',
            'status' => '1',
            'gallery_id' => Gallery::where('alt','home_offer_2')->first()->id,
            'created_at'=>now(),
            'updated_at'=>now(),
        ]);
        DB::table('sliders')->insert([
            'title' => 'اسلایدر آفر 3',
            'description' =>'کد تخفیفت رو از اینجا بردار',
            'link' => '/',
            'flag' => 'home_offer_3',
            'tag' => 'تخفیف',
            'status' => '1',
            'gallery_id' => Gallery::where('alt','home_offer_3')->first()->id,
            'created_at'=>now(),
            'updated_at'=>now(),
        ]);
        DB::table('sliders')->insert([
            'title' => 'اسلایدر آفر 4',
            'description' =>'کد تخفیفت رو از اینجا بردار',
            'link' => '/',
            'flag' => 'home_offer_4',
            'tag' => 'تخفیف',
            'status' => '1',
            'gallery_id' => Gallery::where('alt','home_offer_4')->first()->id,
            'created_at'=>now(),
            'updated_at'=>now(),
        ]);
        DB::table('sliders')->insert([
            'title' => 'اسلایدر چسبیده بدنه بالا',
            'description' =>'کد تخفیفت رو از اینجا بردار',
            'link' => '/',
            'flag' => 'home_sticky_top',
            'tag' => 'تخفیف',
            'status' => '1',
            'gallery_id' => Gallery::where('alt','home_sticky_top')->first()->id,
            'created_at'=>now(),
            'updated_at'=>now(),
        ]);
        DB::table('sliders')->insert([
            'title' => 'اسلایدر چسبیده بدنه پایین',
            'description' =>'کد تخفیفت رو از اینجا بردار',
            'link' => '/',
            'flag' => 'home_sticky_bottom',
            'tag' => 'تخفیف',
            'status' => '1',
            'gallery_id' => Gallery::where('alt','home_sticky_bottom')->first()->id,
            'created_at'=>now(),
            'updated_at'=>now(),
        ]);
    }
}
