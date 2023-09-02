<?php

use App\Models\Category;
use Illuminate\Support\Facades\DB;
use Morilog\Jalali\Jalalian;

// لوازم آرایش صورت
DB::table('categories')->insert([
    'name' => 'کرم پودر',
    'meta' => 'Liquid foundation',
    'description' => 'کرم پودر ',
    'category_id' =>Category::whereMeta('face makeup')->first()->id,
    'created_at' => Jalalian::now(),
    'updated_at' => Jalalian::now()
]);
DB::table('categories')->insert([
    'name' => 'وسایل گریم',
    'meta' => 'Makeup specialized products',
    'description' => 'وسایل گریم ',
    'category_id' =>Category::whereMeta('face makeup')->first()->id,
    'created_at' => Jalalian::now(),
    'updated_at' => Jalalian::now()
]);
DB::table('categories')->insert([
    'name' => 'پنکیک آرایشی',
    'meta' => 'Compact powder',
    'description' => 'پنکیک آرایشی ',
    'category_id' =>Category::whereMeta('face makeup')->first()->id,
    'created_at' => Jalalian::now(),
    'updated_at' => Jalalian::now()
]);
DB::table('categories')->insert([
    'name' => 'رژگونه',
    'meta' => 'Blush',
    'description' => 'رژگونه ',
    'category_id' =>Category::whereMeta('face makeup')->first()->id,
    'created_at' => Jalalian::now(),
    'updated_at' => Jalalian::now()
]);
DB::table('categories')->insert([
    'name' => 'بی بی کرم و سی سی کرم',
    'meta' => 'Bb cc and dd cream',
    'description' => 'بی بی کرم و سی سی کرم ',
    'category_id' =>Category::whereMeta('face makeup')->first()->id,
    'created_at' => Jalalian::now(),
    'updated_at' => Jalalian::now()
]);
DB::table('categories')->insert([
    'name' => 'هایلایتر و لوازم کانتورینگ',
    'meta' => 'Contouring and highlight',
    'description' => 'هایلایتر و لوازم کانتورینگ ',
    'category_id' =>Category::whereMeta('face makeup')->first()->id,
    'created_at' => Jalalian::now(),
    'updated_at' => Jalalian::now()
]);
DB::table('categories')->insert([
    'name' => 'پرایمر',
    'meta' => 'Primer',
    'description' => 'پرایمر ',
    'category_id' =>Category::whereMeta('face makeup')->first()->id,
    'created_at' => Jalalian::now(),
    'updated_at' => Jalalian::now()
]);
DB::table('categories')->insert([
    'name' => 'فیکساتور آرایشی',
    'meta' => 'Fixator',
    'description' => 'فیکساتور آرایشی ',
    'category_id' =>Category::whereMeta('face makeup')->first()->id,
    'created_at' => Jalalian::now(),
    'updated_at' => Jalalian::now()
]);
DB::table('categories')->insert([
    'name' => 'برنزه کننده صورت',
    'meta' => 'Face bronzer',
    'description' => 'برنزه کننده صورت ',
    'category_id' =>Category::whereMeta('face makeup')->first()->id,
    'created_at' => Jalalian::now(),
    'updated_at' => Jalalian::now()
]);
DB::table('categories')->insert([
    'name' => 'کانسیلر',
    'meta' => 'Concealer',
    'description' => 'کانسیلر ',
    'category_id' =>Category::whereMeta('face makeup')->first()->id,
    'created_at' => Jalalian::now(),
    'updated_at' => Jalalian::now()
]);
DB::table('categories')->insert([
    'name' => 'کرم گریم',
    'meta' => 'Makeup cream',
    'description' => 'کرم گریم ',
    'category_id' =>Category::whereMeta('face makeup')->first()->id,
    'created_at' => Jalalian::now(),
    'updated_at' => Jalalian::now()
]);
DB::table('categories')->insert([
    'name' => 'موس صورت',
    'meta' => 'Facial mousse',
    'description' => 'موس صورت ',
    'category_id' =>Category::whereMeta('face makeup')->first()->id,
    'created_at' => Jalalian::now(),
    'updated_at' => Jalalian::now()
]);

// لوازم آرایش ابرو
DB::table('categories')->insert([
    'name' => 'قاب ابرو',
    'meta' => 'Cosmetics stencil',
    'description' => 'قاب ابرو',
    'category_id' =>Category::whereMeta('eyebrow makeup')->first()->id,
    'created_at' => Jalalian::now(),
    'updated_at' => Jalalian::now()
]);
DB::table('categories')->insert([
    'name' => 'مداد ابرو',
    'meta' => 'Eyebrow pencil',
    'description' => 'مداد ابرو',
    'category_id' =>Category::whereMeta('eyebrow makeup')->first()->id,
    'created_at' => Jalalian::now(),
    'updated_at' => Jalalian::now()
]);
DB::table('categories')->insert([
    'name' => 'سایه ابرو',
    'meta' => 'Eyebrow shadow',
    'description' => 'سایه ابرو',
    'category_id' =>Category::whereMeta('eyebrow makeup')->first()->id,
    'created_at' => Jalalian::now(),
    'updated_at' => Jalalian::now()
]);
DB::table('categories')->insert([
    'name' => 'ریمل ابرو',
    'meta' => 'Brow mascara',
    'description' => 'ریمل ابرو',
    'category_id' =>Category::whereMeta('eyebrow makeup')->first()->id,
    'created_at' => Jalalian::now(),
    'updated_at' => Jalalian::now()
]);

//لوازم آرایش  چشم
DB::table('categories')->insert([
    'name' => 'سایه چشم',
    'meta' => 'Eye shadow',
    'description' => 'سایه چشم',
    'category_id' =>Category::whereMeta('eye makeup')->first()->id,
    'created_at' => Jalalian::now(),
    'updated_at' => Jalalian::now()
]);
DB::table('categories')->insert([
    'name' => 'ریمل',
    'meta' => 'Mascara',
    'description' => 'ریمل',
    'category_id' =>Category::whereMeta('eye makeup')->first()->id,
    'created_at' => Jalalian::now(),
    'updated_at' => Jalalian::now()
]);
DB::table('categories')->insert([
    'name' => 'خط چشم',
    'meta' => 'Eye liner',
    'description' => 'خط چشم',
    'category_id' =>Category::whereMeta('eye makeup')->first()->id,
    'created_at' => Jalalian::now(),
    'updated_at' => Jalalian::now()
]);
DB::table('categories')->insert([
    'name' => 'مداد چشم',
    'meta' => 'Eye pencil',
    'description' => 'مداد چشم',
    'category_id' =>Category::whereMeta('eye makeup')->first()->id,
    'created_at' => Jalalian::now(),
    'updated_at' => Jalalian::now()
]);
DB::table('categories')->insert([
    'name' => 'پرایمر چشم',
    'meta' => 'Eye primer',
    'description' => 'پرایمر چشم',
    'category_id' =>Category::whereMeta('eye makeup')->first()->id,
    'created_at' => Jalalian::now(),
    'updated_at' => Jalalian::now()
]);
DB::table('categories')->insert([
    'name' => 'لنز رنگی',
    'meta' => 'Color contact lenses',
    'description' => 'لنز رنگی',
    'category_id' =>Category::whereMeta('eye makeup')->first()->id,
    'created_at' => Jalalian::now(),
    'updated_at' => Jalalian::now()
]);
DB::table('categories')->insert([
    'name' => 'تقویت کننده مژه و ابرو',
    'meta' => 'Eyebrow enhancer',
    'description' => 'تقویت کننده مژه و ابرو',
    'category_id' =>Category::whereMeta('eye makeup')->first()->id,
    'created_at' => Jalalian::now(),
    'updated_at' => Jalalian::now()
]);
//لوازم آرایش لب
DB::table('categories')->insert([
    'name' => 'تینت لب',
    'meta' => 'Lip tint',
    'description' => 'تینت لب',
    'category_id' =>Category::whereMeta('lips makeup')->first()->id,
    'created_at' => Jalalian::now(),
    'updated_at' => Jalalian::now()
]);
DB::table('categories')->insert([
    'name' => 'خط لب',
    'meta' => 'Lip pencil',
    'description' => 'خط لب',
    'category_id' =>Category::whereMeta('lips makeup')->first()->id,
    'created_at' => Jalalian::now(),
    'updated_at' => Jalalian::now()
]);
DB::table('categories')->insert([
    'name' => 'بالم لب',
    'meta' => 'Lip balm',
    'description' => 'بالم لب',
    'category_id' =>Category::whereMeta('lips makeup')->first()->id,
    'created_at' => Jalalian::now(),
    'updated_at' => Jalalian::now()
]);
DB::table('categories')->insert([
    'name' => 'رژ لب',
    'meta' => 'Lipstick',
    'description' => 'رژ لب',
    'category_id' =>Category::whereMeta('lips makeup')->first()->id,
    'created_at' => Jalalian::now(),
    'updated_at' => Jalalian::now()
]);

//لوازم آرایش بدن
DB::table('categories')->insert([
    'name' => 'برچسب تاتو',
    'meta' => 'Tattoos',
    'description' => 'برچسب تاتو',
    'category_id' =>Category::whereMeta('body makeup')->first()->id,
    'created_at' => Jalalian::now(),
    'updated_at' => Jalalian::now()
]);
DB::table('categories')->insert([
    'name' => 'حنای طراحی',
    'meta' => 'Decoration henna',
    'description' => 'حنای طراحی',
    'category_id' =>Category::whereMeta('body makeup')->first()->id,
    'created_at' => Jalalian::now(),
    'updated_at' => Jalalian::now()
]);

// ابزار آرایش ناخن
DB::table('categories')->insert([
    'name' => 'ناخن گیر',
    'meta' => 'Nail clipper',
    'description' => 'ناخن گیر',
    'category_id' =>Category::whereMeta('nail makeup')->first()->id,
    'created_at' => Jalalian::now(),
    'updated_at' => Jalalian::now()
]);

DB::table('categories')->insert([
    'name' => 'وسایل طراحی ناخن',
    'meta' => 'Nail stickers',
    'description' => 'وسایل طراحی ناخن',
    'category_id' =>Category::whereMeta('nail makeup')->first()->id,
    'created_at' => Jalalian::now(),
    'updated_at' => Jalalian::now()
]);

DB::table('categories')->insert([
    'name' => 'لاک ناخن',
    'meta' => 'Nailpolish',
    'description' => 'لاک ناخن',
    'category_id' =>Category::whereMeta('nail makeup')->first()->id,
    'created_at' => Jalalian::now(),
    'updated_at' => Jalalian::now()
]);

DB::table('categories')->insert([
    'name' => 'لاک پاک کن',
    'meta' => 'Nail polish remover',
    'description' => 'لاک پاک کن',
    'category_id' =>Category::whereMeta('nail makeup')->first()->id,
    'created_at' => Jalalian::now(),
    'updated_at' => Jalalian::now()
]);

DB::table('categories')->insert([
    'name' => 'محصولات مراقبت از ناخن',
    'meta' => 'Nail care',
    'description' => 'محصولات مراقبت از ناخن',
    'category_id' =>Category::whereMeta('nail makeup')->first()->id,
    'created_at' => Jalalian::now(),
    'updated_at' => Jalalian::now()
]);
DB::table('categories')->insert([
    'name' => 'ست پدیکور و مانیکور',
    'meta' => 'Manicure and pedicure',
    'description' => 'ست پدیکور و مانیکور',
    'category_id' =>Category::whereMeta('nail makeup')->first()->id,
    'created_at' => Jalalian::now(),
    'updated_at' => Jalalian::now()
]);

DB::table('categories')->insert([
    'name' => 'ناخن مصنوعی',
    'meta' => 'Nail extension',
    'description' => 'ناخن مصنوعی',
    'category_id' =>Category::whereMeta('nail makeup')->first()->id,
    'created_at' => Jalalian::now(),
    'updated_at' => Jalalian::now()
]);

DB::table('categories')->insert([
    'name' => 'چسب ناخن مصنوعی',
    'meta' => 'Nail glue',
    'description' => 'چسب ناخن مصنوعی',
    'category_id' =>Category::whereMeta('nail makeup')->first()->id,
    'created_at' => Jalalian::now(),
    'updated_at' => Jalalian::now()
]);

DB::table('categories')->insert([
    'name' => 'دستگاه لاک خشک کن بو وی',
    'meta' => 'UV',
    'description' => 'دستگاه لاک خشک کن بو وی',
    'category_id' =>Category::whereMeta('nail makeup')->first()->id,
    'created_at' => Jalalian::now(),
    'updated_at' => Jalalian::now()
]);
DB::table('categories')->insert([
    'name' => 'سوهان ناخن',
    'meta' => 'Nail file',
    'description' => 'سوهان ناخن',
    'category_id' =>Category::whereMeta('nail makeup')->first()->id,
    'created_at' => Jalalian::now(),
    'updated_at' => Jalalian::now()
]);

// ابزار آرایش
DB::table('categories')->insert([
    'name' => 'استند لوازم آرایش',
    'meta' => 'Organizing stand',
    'description' => 'استند لوازم آرایش',
    'category_id' =>Category::whereMeta('makeup tools')->first()->id,
    'created_at' => Jalalian::now(),
    'updated_at' => Jalalian::now()
]);

DB::table('categories')->insert([
    'name' => 'چسب مژه',
    'meta' => 'Eyelash glue',
    'description' => 'چسب مژه',
    'category_id' =>Category::whereMeta('makeup tools')->first()->id,
    'created_at' => Jalalian::now(),
    'updated_at' => Jalalian::now()
]);

DB::table('categories')->insert([
    'name' => 'کیف لوازم آرایش',
    'meta' => 'Makeup bag',
    'description' => 'کیف لوازم آرایش',
    'category_id' =>Category::whereMeta('makeup tools')->first()->id,
    'created_at' => Jalalian::now(),
    'updated_at' => Jalalian::now()
]);
DB::table('categories')->insert([
    'name' => 'براش آرایشی',
    'meta' => 'Makeup brush',
    'description' => 'براش آرایشی',
    'category_id' =>Category::whereMeta('makeup tools')->first()->id,
    'created_at' => Jalalian::now(),
    'updated_at' => Jalalian::now()
]);

DB::table('categories')->insert([
    'name' => 'پد آرایشی',
    'meta' => 'Makeup pad',
    'description' => 'پد آرایشی',
    'category_id' =>Category::whereMeta('makeup tools')->first()->id,
    'created_at' => Jalalian::now(),
    'updated_at' => Jalalian::now()
]);
DB::table('categories')->insert([
    'name' => 'آینه آرایشی',
    'meta' => 'Makeup mirror',
    'description' => 'آینه آرایشی',
    'category_id' =>Category::whereMeta('makeup tools')->first()->id,
    'created_at' => Jalalian::now(),
    'updated_at' => Jalalian::now()
]);

DB::table('categories')->insert([
    'name' => 'تراش آرایشی',
    'meta' => 'Cosmetic pencil sharpener',
    'description' => 'تراش آرایشی',
    'category_id' =>Category::whereMeta('makeup tools')->first()->id,
    'created_at' => Jalalian::now(),
    'updated_at' => Jalalian::now()
]);

DB::table('categories')->insert([
    'name' => 'تیغ ابرو و موچین',
    'meta' => 'Brow razor and tweezers',
    'description' => 'تیغ ابرو و موچین',
    'category_id' =>Category::whereMeta('makeup tools')->first()->id,
    'created_at' => Jalalian::now(),
    'updated_at' => Jalalian::now()
]);
DB::table('categories')->insert([
    'name' => 'قیچی ابرو',
    'meta' => 'Eyebrow scissors',
    'description' => 'قیچی ابرو',
    'category_id' =>Category::whereMeta('makeup tools')->first()->id,
    'created_at' => Jalalian::now(),
    'updated_at' => Jalalian::now()
]);

