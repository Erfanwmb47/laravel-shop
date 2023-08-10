<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Gallery;
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
//        require __DIR__ . '/Categories/Beauty salon.php';
//        require __DIR__ . '/Categories/Body health and care.php';
//        require __DIR__ . '/Categories/Hair products.php';
//        require __DIR__ . '/Categories/Makeup.php';
//        require __DIR__ . '/Categories/Mens products.php';
//        require __DIR__ . '/Categories/Mom and baby.php';
//        require __DIR__ . '/Categories/Perfumes.php';
//        require __DIR__ . '/Categories/Personal care.php';
//        require __DIR__ . '/Categories/Personal electrical appliances.php';
//        require __DIR__ . '/Categories/Skin products.php';
        $files = glob( __DIR__ . '/Categories/*.php');
        foreach ($files as $file) {
            require($file);
        }
    }
}
