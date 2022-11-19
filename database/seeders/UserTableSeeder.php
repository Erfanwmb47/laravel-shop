<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

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
            'phone' => '09217341024',
            'firstName' => 'مصطفی',
            'lastName'=>'خلیق',
            'role_id' => '1',
            'gallery_id' => '1'
        ]);
        DB::table('users')->insert([
            'username' => "erfanwmb",
            'password' => '$2y$10$ViRZUMnn8HI.jkoAHZancuqYYzY3jaQbKwgfATXTlBXbWFKQI5fDm',
            'email' => 'erfanwmb@gmail.com',
            'phone' => '09309447576',
            'firstName' => 'عرفان',
            'lastName'=>'قالی باف',
            'role_id' => '1',
            'gallery_id' => '1'
        ]);
    }
}
