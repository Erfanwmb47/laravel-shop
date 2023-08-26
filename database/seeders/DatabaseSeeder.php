<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Database\Seeders\Setting\MetaKeySeeder;
use Database\Seeders\Setting\SettingSeeder;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        DB::unprepared(file_get_contents('database/files/country.sql'));
         DB::unprepared(file_get_contents('database/files/province.sql'));
        DB::unprepared(file_get_contents('database/files/counties.sql'));

        $this->call([
            SettingSeeder::class,
            MetaKeySeeder::class,
            countryGalleries::class,
            GalleryTableSeeder::class,
            UserTableSeeder::class,
            PermissionsRolesSeeder::class,
            CategoryTableSeeder::class,
            TransportationTableSeeder::class,
            PaymentGatewayTableSeeder::class,
            BrandTableSeeder::class,
            SliderTableSeeder::class,
            ProductTableSeeder::class,
            AttributeTableSeeder::class,
            AttributeValueTableSeeder::class
        ]);
    }
}
