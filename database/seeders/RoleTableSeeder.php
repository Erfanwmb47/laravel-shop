<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            'name' => "admin",
            'per_name' => 'ادمین',
            'categories' => '15',
            'products' => '15',
            'users' => '15',
            'brands' => '15',
            'roles' => '15',
            'comments' =>'15',
            'galleries' =>'15',
            'status' => '1'

        ]);
        DB::table('roles')->insert([
            'name' => "user",
            'per_name' => 'کاربر عادی',
            'categories' => '0',
            'products' => '0',
            'users' => '0',
            'brands' => '0',
            'roles' => '0',
            'comments' => '0',
            'galleries' =>'0',
            'status' => '1'
        ]);
    }
}
