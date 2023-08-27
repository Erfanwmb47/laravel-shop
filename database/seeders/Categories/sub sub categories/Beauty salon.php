<?php


use App\Models\Category;
use Illuminate\Support\Facades\DB;
use Morilog\Jalali\Jalalian;

DB::table('categories')->insert([
    'name' => 'صندلی پدیکور',
    'meta' => 'Pedicure chair',
    'description' => 'صندلی پدیکور',
    'category_id' => Category::whereMeta('Beauty salon equipment')->first()->id,
    'created_at' => Jalalian::now(),
    'updated_at' => Jalalian::now()
]);
DB::table('categories')->insert([
    'name' => 'میز مانیکور',
    'meta' => 'Manicure desk',
    'description' => 'میز مانیکور',
    'category_id' => Category::whereMeta('Beauty salon equipment')->first()->id,
    'created_at' => Jalalian::now(),
    'updated_at' => Jalalian::now()
]);
DB::table('categories')->insert([
    'name' => 'ترولی',
    'meta' => 'trolley',
    'description' => 'ترولی',
    'category_id' => Category::whereMeta('Beauty salon equipment')->first()->id,
    'created_at' => Jalalian::now(),
    'updated_at' => Jalalian::now()
]);
DB::table('categories')->insert([
    'name' => 'میز آرایشگاهی',
    'meta' => 'Hairdressing table',
    'description' => 'میز آرایشگاهی',
    'category_id' => Category::whereMeta('Beauty salon equipment')->first()->id,
    'created_at' => Jalalian::now(),
    'updated_at' => Jalalian::now()
]);
DB::table('categories')->insert([
    'name' => 'تخت آرایشگاهی',
    'meta' => 'Beauty salon bed',
    'description' => 'تخت آرایشگاهی',
    'category_id' => Category::whereMeta('Beauty salon equipment')->first()->id,
    'created_at' => Jalalian::now(),
    'updated_at' => Jalalian::now()
]);
DB::table('categories')->insert([
    'name' => 'سرشور',
    'meta' => 'Shampoo chair',
    'description' => 'سرشور',
    'category_id' => Category::whereMeta('Beauty salon equipment')->first()->id,
    'created_at' => Jalalian::now(),
    'updated_at' => Jalalian::now()
]);
DB::table('categories')->insert([
    'name' => 'صندلی آرایشگاهی',
    'meta' => 'Chair',
    'description' => 'صندلی آرایشگاهی',
    'category_id' => Category::whereMeta('Beauty salon equipment')->first()->id,
    'created_at' => Jalalian::now(),
    'updated_at' => Jalalian::now()
]);
DB::table('categories')->insert([
    'name' => 'استند سشوار',
    'meta' => 'Stands',
    'description' => 'استند سشوار',
    'category_id' => Category::whereMeta('Beauty salon equipment')->first()->id,
    'created_at' => Jalalian::now(),
    'updated_at' => Jalalian::now()
]);
DB::table('categories')->insert([
    'name' => 'کتاب آموزشی آرایشگری',
    'meta' => 'Learning book',
    'description' => 'کتاب آموزشی آرایشگری',
    'category_id' => Category::whereMeta('Beauty salon equipment')->first()->id,
    'created_at' => Jalalian::now(),
    'updated_at' => Jalalian::now()
]);
DB::table('categories')->insert([
    'name' => 'آینه آرایشگاهی',
    'meta' => 'Hairdressing mirror',
    'description' => 'آینه آرایشگاهی',
    'category_id' => Category::whereMeta('Beauty salon equipment')->first()->id,
    'created_at' => Jalalian::now(),
    'updated_at' => Jalalian::now()
]);

//اپیلاسیون
DB::table('categories')->insert([
    'name' => 'دستگاه اپیلاسیون',
    'meta' => 'Wax warmer',
    'description' => 'دستگاه اپیلاسیون',
    'category_id' => Category::whereMeta('waxing')->first()->id,
    'created_at' => Jalalian::now(),
    'updated_at' => Jalalian::now()
]);
DB::table('categories')->insert([
    'name' => 'ابزار اپیلاسیون',
    'meta' => 'Epilation  tool',
    'description' => 'ابزار اپیلاسیون',
    'category_id' => Category::whereMeta('waxing')->first()->id,
    'created_at' => Jalalian::now(),
    'updated_at' => Jalalian::now()
]);
DB::table('categories')->insert([
    'name' => 'موم اپیلاسیون',
    'meta' => 'Epilation wax',
    'description' => 'موم اپیلاسیون',
    'category_id' => Category::whereMeta('waxing')->first()->id,
    'created_at' => Jalalian::now(),
    'updated_at' => Jalalian::now()
]);
//کاشت و طراحی ناخن
DB::table('categories')->insert([
    'name' => 'لاک ناخن',
    'meta' => 'Nail gel',
    'description' => 'لاک ناخن',
    'category_id' => Category::whereMeta('Nail planting and design')->first()->id,
    'created_at' => Jalalian::now(),
    'updated_at' => Jalalian::now()
]);
DB::table('categories')->insert([
    'name' => 'دستگاه UV',
    'meta' => 'UV device',
    'description' => 'دستگاه UV',
    'category_id' => Category::whereMeta('Nail planting and design')->first()->id,
    'created_at' => Jalalian::now(),
    'updated_at' => Jalalian::now()
]);
DB::table('categories')->insert([
    'name' => 'سوهان و پولیش ناخن',
    'meta' => 'Nail pilica and pulish',
    'description' => 'سوهان و پولیش ناخن',
    'category_id' => Category::whereMeta('Nail planting and design')->first()->id,
    'created_at' => Jalalian::now(),
    'updated_at' => Jalalian::now()
]);

DB::table('categories')->insert([
    'name' => 'دیزاین ناخن',
    'meta' => 'Nail design',
    'description' => 'دیزاین ناخن',
    'category_id' => Category::whereMeta('Nail planting and design')->first()->id,
    'created_at' => Jalalian::now(),
    'updated_at' => Jalalian::now()
]);
DB::table('categories')->insert([
    'name' => 'پرایمر ناخن',
    'meta' => 'Nail primer',
    'description' => 'پرایمر ناخن',
    'category_id' => Category::whereMeta('Nail planting and design')->first()->id,
    'created_at' => Jalalian::now(),
    'updated_at' => Jalalian::now()
]);
DB::table('categories')->insert([
    'name' => 'تیپ (ناخن مصنوعی)',
    'meta' => 'Nail tip',
    'description' => 'تیپ (ناخن مصنوعی)',
    'category_id' => Category::whereMeta('Nail planting and design')->first()->id,
    'created_at' => Jalalian::now(),
    'updated_at' => Jalalian::now()
]);
DB::table('categories')->insert([
    'name' => 'تاپ کات ناخن',
    'meta' => 'Nail top cut',
    'description' => 'تاپ کات ناخن',
    'category_id' => Category::whereMeta('Nail planting and design')->first()->id,
    'created_at' => Jalalian::now(),
    'updated_at' => Jalalian::now()
]);

DB::table('categories')->insert([
    'name' => 'مواد کاشت ناخن',
    'meta' => 'Nail planting materials',
    'description' => 'مواد کاشت ناخن',
    'category_id' => Category::whereMeta('Nail planting and design')->first()->id,
    'created_at' => Jalalian::now(),
    'updated_at' => Jalalian::now()
]);
DB::table('categories')->insert([
    'name' => 'ابزار طراحی ناخن',
    'meta' => 'Nail design tools',
    'description' => 'ابزار طراحی ناخن',
    'category_id' => Category::whereMeta('Nail planting and design')->first()->id,
    'created_at' => Jalalian::now(),
    'updated_at' => Jalalian::now()
]);

//اکستنشن

DB::table('categories')->insert([
    'name' => 'اکستنشن مژه و ابرو',
    'meta' => 'Eyelash extensions',
    'description' => 'اکستنشن مژه و ابرو',
    'category_id' => Category::whereMeta('extensions')->first()->id,
    'created_at' => Jalalian::now(),
    'updated_at' => Jalalian::now()
]);

DB::table('categories')->insert([
    'name' => 'اکستنشن مو',
    'meta' => 'hair extensions',
    'description' => 'اکستنشن مو',
    'category_id' => Category::whereMeta('extensions')->first()->id,
    'created_at' => Jalalian::now(),
    'updated_at' => Jalalian::now()
]);
DB::table('categories')->insert([
    'name' => 'چسب اکستنشن مژه',
    'meta' => 'Glue extensions eyelashes',
    'description' => 'چسب اکستنشن مژه',
    'category_id' => Category::whereMeta('extensions')->first()->id,
    'created_at' => Jalalian::now(),
    'updated_at' => Jalalian::now()
]);

DB::table('categories')->insert([
    'name' => 'مژه مصنوعی',
    'meta' => 'lashes extensions ',
    'description' => 'مژه مصنوعی',
    'category_id' => Category::whereMeta('extensions')->first()->id,
    'created_at' => Jalalian::now(),
    'updated_at' => Jalalian::now()
]);

DB::table('categories')->insert([
    'name' => 'فرمژه',
    'meta' => 'Eyelash curler',
    'description' => 'فرمژه',
    'category_id' => Category::whereMeta('extensions')->first()->id,
    'created_at' => Jalalian::now(),
    'updated_at' => Jalalian::now()
]);
DB::table('categories')->insert([
    'name' => 'پد مژه',
    'meta' => 'Eyelashes pad',
    'description' => 'پد مژه',
    'category_id' => Category::whereMeta('extensions')->first()->id,
    'created_at' => Jalalian::now(),
    'updated_at' => Jalalian::now()
]);

DB::table('categories')->insert([
    'name' => 'ریموور مژه',
    'meta' => 'remover cleanser',
    'description' => 'ریموور مژه',
    'category_id' => Category::whereMeta('extensions')->first()->id,
    'created_at' => Jalalian::now(),
    'updated_at' => Jalalian::now()
]);
DB::table('categories')->insert([
    'name' => 'پنس کاشت مژه',
    'meta' => 'Pieces eyelash extensions',
    'description' => 'پنس کاشت مژه',
    'category_id' => Category::whereMeta('extensions')->first()->id,
    'created_at' => Jalalian::now(),
    'updated_at' => Jalalian::now()
]);

//ابزار آرایش و پیرایش

DB::table('categories')->insert([
    'name' => 'کلاه و پیشبند آرایشگاهی',
    'meta' => 'Professional hairdress hat and apron',
    'description' => 'کلاه و پیشبند آرایشگاهی',
    'category_id' => Category::whereMeta('Makeup and hairdressing tools')->first()->id,
    'created_at' => Jalalian::now(),
    'updated_at' => Jalalian::now()
]);

DB::table('categories')->insert([
    'name' => 'نخ و هدبند آرایشگاهی',
    'meta' => 'Facional threading tool',
    'description' => 'نخ و هدبند آرایشگاهی',
    'category_id' => Category::whereMeta('Makeup and hairdressing tools')->first()->id,
    'created_at' => Jalalian::now(),
    'updated_at' => Jalalian::now()
]);
DB::table('categories')->insert([
    'name' => 'فویل مش',
    'meta' => 'Hair colour foil',
    'description' => 'فویل مش',
    'category_id' => Category::whereMeta('Makeup and hairdressing tools')->first()->id,
    'created_at' => Jalalian::now(),
    'updated_at' => Jalalian::now()
]);

DB::table('categories')->insert([
    'name' => 'کاسه و فرچه رنگ مو',
    'meta' => 'Hair dying bowl and brush',
    'description' => 'کاسه و فرچه رنگ مو',
    'category_id' => Category::whereMeta('Makeup and hairdressing tools')->first()->id,
    'created_at' => Jalalian::now(),
    'updated_at' => Jalalian::now()
]);

DB::table('categories')->insert([
    'name' => 'سنجاق و کلیپس',
    'meta' => 'Hair pins and clips',
    'description' => 'سنجاق و کلیپس',
    'category_id' => Category::whereMeta('Makeup and hairdressing tools')->first()->id,
    'created_at' => Jalalian::now(),
    'updated_at' => Jalalian::now()
]);

DB::table('categories')->insert([
    'name' => 'بیگودی',
    'meta' => 'Hair curls tools',
    'description' => 'بیگودی',
    'category_id' => Category::whereMeta('Makeup and hairdressing tools')->first()->id,
    'created_at' => Jalalian::now(),
    'updated_at' => Jalalian::now()
]);

DB::table('categories')->insert([
    'name' => 'تیغ و قیچی آرایشگری',
    'meta' => 'Haircut scissors and blade',
    'description' => 'تیغ و قیچی آرایشگری',
    'category_id' => Category::whereMeta('Makeup and hairdressing tools')->first()->id,
    'created_at' => Jalalian::now(),
    'updated_at' => Jalalian::now()
]);
DB::table('categories')->insert([
    'name' => 'برس و شانه آرایشگاهی',
    'meta' => 'Professional hair brushes and combs',
    'description' => 'برس و شانه آرایشگاهی',
    'category_id' => Category::whereMeta('Makeup and hairdressing tools')->first()->id,
    'created_at' => Jalalian::now(),
    'updated_at' => Jalalian::now()
]);
