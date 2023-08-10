<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Morilog\Jalali\Jalalian;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('users')->insert([
            'username' => "Mstf76",
            'password' => '$2y$10$ViRZUMnn8HI.jkoAHZancuqYYzY3jaQbKwgfATXTlBXbWFKQI5fDm',
            'email' => 'mostafakhaligh@gmail.com',
            'sex' => 'woman',
            'two_factor_type' => 'off',
            'phone' => '09217341024',
            'firstName' => 'مصطفی',
            'lastName'=>'خلیق',
            'gallery_id' => '1',
            'is_staff'=> '0',
            'is_superuser' => '1',
            'score' => 1000,
            'email_verified_at' => now(),
            'created_at' => now(),
            'updated_at' => now()
            ]);
        DB::table('users')->insert([
            'username' => "erfanwmb",
            'password' => '$2y$10$ViRZUMnn8HI.jkoAHZancuqYYzY3jaQbKwgfATXTlBXbWFKQI5fDm',
            'email' => 'erfanwmb@gmail.com',
            'sex' => 'man',
            'two_factor_type' => 'off',
            'phone' => '09309447576',
            'firstName' => 'عرفان',
            'lastName'=>'قالی باف',
            'gallery_id' => '1',
            'is_staff'=> '0',
            'is_superuser' => '1',
            'score' => 1000,
            'email_verified_at' => now(),
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
