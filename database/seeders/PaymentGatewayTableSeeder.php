<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PaymentGatewayTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('payment_gateways')->insert([
            'name' =>'درگاه بانک ملت',
            'description' => 'درگاه‌ پرداخت بانک ملت مورد تایید بانک مرکزی است و تمام اطلاعات پذیرنده و پرداخت‌کننده در آن به صورت رمزنگاری شده رد و بدل می‌شوند.',
            'gallery_id' =>'15'
        ]);
        DB::table('payment_gateways')->insert([
            'name' =>'درگاه بانک سامان',
            'description' => 'درگاه‌ پرداخت بانک سامان کیش مورد تایید بانک مرکزی است و تمام اطلاعات پذیرنده و پرداخت‌کننده در آن به صورت رمزنگاری شده رد و بدل می‌شوند.',
            'gallery_id' =>'16'
        ]);
        DB::table('payment_gateways')->insert([
            'name' =>'درگاه پی پینگ',
            'description' => 'پی پینگ به‌عنوان پرداخت یار رسمی بانک مرکزی ایران، با ارائه‌ی درگاه پرداخت به کسب و کارها، روزانه میزبان چندین هزار تراکنش در شبکه بانکی کشور است.',
            'gallery_id' =>'17'
        ]);


    }
}
