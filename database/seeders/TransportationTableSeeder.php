<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TransportationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('transportations')->insert([
            'name' => 'پست',
            'eng_name' => 'post',
            'description' => 'ارسال با پست بین 3 تا 5 روز کاری اتفاق میفته',
            'factor_weight'=> '10',
            'factor_volume' => '25',
            'const_distance' => '10',
            'cost' => '20000',
            'gallery_id' => '13',
        ]);
        DB::table('transportations')->insert([
            'name' => 'اسنپ',
            'eng_name' => 'snap',
            'description' => 'اسنپ برای ارسال در شهر تهران هست و ساعت ارسال مرسوله به انتخاب مشتری می باشد.',
            'factor_weight'=> '45',
            'factor_volume' => '25',
            'const_distance' => '10',
            'cost' => '20000',
            'gallery_id' => '14',
        ]);
    }
}
