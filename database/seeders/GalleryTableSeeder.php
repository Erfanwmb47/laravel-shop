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
            'flag' => 'users',
            'size' => '1'
        ]);
        DB::table('galleries')->insert([
            'title' => 'woman_Avatar',
            'alt' =>'woman_Avatar',
            'mime' => 'JPEG',
            'path' => 'public/Image/Users/Avatar/default_woman_avatar01.png',
            'flag' => 'users',
            'size' => '1'
        ]);
        for($i = 1 ; $i<=10 ; $i++){
            DB::table('galleries')->insert([
                'title' => 'image'. $i,
                'alt' =>'alt'. $i,
                'mime' => 'JPEG',
                'path' => 'public/Image/Exa/' . $i .'.jpg',
                'flag' => 'Ext',
                'size' => '0'
            ]);
        }
    }
}
