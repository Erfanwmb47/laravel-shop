<?php

namespace Database\Seeders\Setting;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MetaKeySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('metakeys')->insert([//1
            'key'=>'shop_name',
            'setting_id'=>1
        ]);
        DB::table('metakeys')->insert([//2
            'key'=>'shop_phone',
            'setting_id'=>2
        ]);
        DB::table('metakeys')->insert([//3
            'key'=>'shop_tel',
            'setting_id'=>3
        ]);
        DB::table('metakeys')->insert([//4
            'key'=>'shop_email',
            'setting_id'=>4
        ]);
        DB::table('metakeys')->insert([//5
            'key'=>'shop_address',
            'setting_id'=>5
        ]);
       /* DB::table('metakeys')->insert([//3
            'key'=>'favicon',
            'setting_id'=>3
        ]);
        DB::table('metakeys')->insert([//4
            'key'=>'address',
            'setting_id'=>4
        ]);
        DB::table('metakeys')->insert([//5
            'key'=>'logo',
            'setting_id'=>5
        ]);
        DB::table('metakeys')->insert([//6
            'key'=>'description_index_client',
            'setting_id'=>6
        ]);
        DB::table('metakeys')->insert([//7
            'key'=>'key_words_index_client',
            'setting_id'=>7
        ]);*/

    }
}
