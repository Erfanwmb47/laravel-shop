<?php

namespace Database\Seeders;

use App\Models\Attribute;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AttributeValueTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('attribute_values')->insert([
            'attribute_id' => Attribute::whereName('رنگ')->first()->id,
            'value' => 'سبز',
        ]);
        DB::table('attribute_values')->insert([
            'attribute_id' => Attribute::whereName('رنگ')->first()->id,
            'value' => 'قرمز',
        ]);
        DB::table('attribute_values')->insert([
            'attribute_id' => Attribute::whereName('رنگ')->first()->id,
            'value' => 'آبی',
        ]);
        DB::table('attribute_values')->insert([
            'attribute_id' => Attribute::whereName('نوع پوست')->first()->id,
            'value' => 'خشک',
        ]);
        DB::table('attribute_values')->insert([
            'attribute_id' => Attribute::whereName('نوع پوست')->first()->id,
            'value' => 'معمولی',
        ]);
    }
}
