<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GalleryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('galleries')->insert([
            'title' => 'man_Avatar',
            'alt' =>'man_Avatar',
            'mime' => 'JPEG',
            'path' => 'public/Image/Users/Avatar/default_man_avatar01.png',
            'flag' => 'Users',
            'size' => '1',
            'created_at'=>now(),
            'updated_at'=>now(),
        ]);
        DB::table('galleries')->insert([
            'title' => 'woman_Avatar',
            'alt' =>'woman_Avatar',
            'mime' => 'JPEG',
            'path' => 'public/Image/Users/Avatar/default_woman_avatar01.png',
            'flag' => 'Users',
            'size' => '1',
            'created_at'=>now(),
            'updated_at'=>now(),

        ]);
        for($i = 1 ; $i<=10 ; $i++){
            DB::table('galleries')->insert([
                'title' => 'image'. $i,
                'alt' =>'alt'. $i,
                'mime' => 'PNG',
                'path' => 'public/Image/Uncategorized/image' . $i .'.png',
                'flag' => 'Uncategorized',
                'size' => '0',
                'created_at'=>now(),
                'updated_at'=>now(),
            ]);

        }
        DB::table('galleries')->insert([
            'title' => 'post',
            'alt' =>'post_icon',
            'mime' => 'JPEG',
            'path' => 'public/Image/Transportation/post.jpg',
            'flag' => 'Transportations',
            'size' => '1',
            'created_at'=>now(),
            'updated_at'=>now(),
        ]);
        DB::table('galleries')->insert([
            'title' => 'snapp',
            'alt' =>'snapp_icon',
            'mime' => 'PNG',
            'path' => 'public/Image/Transportation/snapp.jpg',
            'flag' => 'Transportations',
            'size' => '1',
            'created_at'=>now(),
            'updated_at'=>now(),
        ]);
        DB::table('galleries')->insert([
            'title' => 'Gateway_bank_mellat',
            'alt' =>'mellat_icon',
            'mime' => 'JPEG',
            'path' => 'public/Image/PaymentGateways/mellat.png',
            'flag' => 'PaymentGateways',
            'size' => '1',
            'created_at'=>now(),
            'updated_at'=>now(),
        ]);
        DB::table('galleries')->insert([
            'title' => 'Gateway_bank_saman',
            'alt' =>'saman_icon',
            'mime' => 'PNG',
            'path' => 'public/Image/PaymentGateways/saman.png',
            'flag' => 'PaymentGateways',
            'size' => '1',
            'created_at'=>now(),
            'updated_at'=>now(),
        ]);
        DB::table('galleries')->insert([
            'title' => 'Gateway_bank_payping',
            'alt' =>'payping_icon',
            'mime' => 'PNG',
            'path' => 'public/Image/PaymentGateways/payping.png',
            'flag' => 'PaymentGateways',
            'size' => '1',
            'created_at'=>now(),
            'updated_at'=>now(),
        ]);
        DB::table('galleries')->insert([
            'title' => 'اسلایدر هدر سمت راست',
            'alt' =>'home_header_right',
            'mime' => 'jpeg',
            'path' => 'public/Image/Sliders/home_header_right.jpg',
            'flag' => 'Sliders',
            'size' => '1',
            'created_at'=>now(),
            'updated_at'=>now(),
        ]);
        DB::table('galleries')->insert([
            'title' => 'اسلایدر هدر سمت چپ',
            'alt' =>'home_header_left',
            'mime' => 'jpeg',
            'path' => 'public/Image/Sliders/home_header_left.jpg',
            'flag' => 'Sliders',
            'size' => '1',
            'created_at'=>now(),
            'updated_at'=>now(),
        ]);

    }
}
