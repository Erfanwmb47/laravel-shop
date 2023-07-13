<?php

namespace Database\Seeders;

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
        for($i=0;$i<11;$i++)
        {
            DB::table('brands')->insert([
                'name' => fake()->name(),
                'tag' => fake()->name(),
                'description' => fake()->text,
                'gallery_id' => '1',
                'created_at' => Jalalian::now(),
                'updated_at' => Jalalian::now()
            ]);
        }

    }
}
