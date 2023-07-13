<?php

namespace Database\Seeders;

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
        DB::table('categories')->insert([
            'name' => 'صابون',
            'meta' => 'soap',
            'description' => fake()->text,
            'gallery_id' => '1',
            'created_at' => Jalalian::now(),
            'updated_at' => Jalalian::now()
        ]);
        DB::table('categories')->insert([
            'name' => 'مادر و کودک',
            'meta' => 'mom',
            'description' => fake()->text,
            'gallery_id' => '2',
            'created_at' => Jalalian::now(),
            'updated_at' => Jalalian::now()
        ]);
        DB::table('categories')->insert([
            'name' => 'ضدآفتاب',
            'meta' => 'sun',
            'description' => fake()->text,
            'gallery_id' => '3',
            'created_at' => Jalalian::now(),
            'updated_at' => Jalalian::now()
        ]);
        DB::table('categories')->insert([
            'name' => 'مراقبت از مو',
            'meta' => 'hair',
            'description' => fake()->text,
            'gallery_id' => '4',
            'created_at' => Jalalian::now(),
            'updated_at' => Jalalian::now()
        ]);
        DB::table('categories')->insert([
            'name' => 'دندان',
            'meta' => 'tooth',
            'description' => fake()->text,
            'gallery_id' => '5',
            'created_at' => Jalalian::now(),
            'updated_at' => Jalalian::now()
        ]);
        DB::table('categories')->insert([
            'name' => 'شامپو',
            'meta' => 'shampoo',
            'description' => fake()->text,
            'gallery_id' => '6',
            'created_at' => Jalalian::now(),
            'updated_at' => Jalalian::now()
        ]);

    }
}
