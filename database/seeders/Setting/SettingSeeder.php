<?php

namespace Database\Seeders\Setting;

use App\Models\Gallery;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        DB::table('settings')->insert([//1
            'object'=>'{"Persian_name":"سینویا","English_name":"Seanovia"}'
        ]);
        DB::table('settings')->insert([//2
            'object'=>'{"title":"شماره تماس همراه","value":"+989309447576"}'
        ]);
        DB::table('settings')->insert([//3
            'object'=>'{"title":"شماره تماس ثابت","value":"+9892166068072"}'
        ]);
        DB::table('settings')->insert([//4
            'object'=>'{"title":"ایمیل مجموعه","value":"info@seanovia.com"}'
        ]);
        DB::table('settings')->insert([//5
            'object'=>'{"title":"آدرس فروشگاه","value":"جنت آباد مرکزی، خیابان مخبری، پلاک 324، واحد 3"}'
        ]);

       /* $faviconImage=optional(Gallery::whereTitle('Espandar_favicon')->first())->path;
        DB::table('settings')->insert([//3
            'object'=>'{"title":"آیکون مرورگر","value":"'.$faviconImage.'"}'
        ]);
        DB::table('settings')->insert([//4
            'object'=>'{"title":"آدرس","value":"تهران ، فرمانیه ، خیابان لواسانی غربی ، بین آقائی و آریا ، پلاک ۱۱۲ و ۱۱۴ ، ساختمان اسپندار ، طبقه ۲"}'
        ]);
        $logoImage=optional(Gallery::whereTitle('Espandar_logo')->first())->path;
        DB::table('settings')->insert([//5
            'object'=>'{"title":"لوگو سایت","value":"'.$logoImage.'"}'
        ]);
        DB::table('settings')->insert([//6
            'object'=>'{"title":"توضیحات صفحه اصلی کاربری","value":"سامانه فروش سیمان اسپندار برای فروش آنلاین سیمان طراحی و تدارک دیده شده است"}'
        ]);
        DB::table('settings')->insert([//7
            'object'=>'{"title":"ایمیل مجموعه","value":"خرید سیمان, خرید آنلاین سیمان, سامانه خرید سیمان, اسپندار, سیمان اسپندار"}'
        ]);*/

    }
}
