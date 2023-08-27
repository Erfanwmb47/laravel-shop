<?php

use App\Models\Category;
use Illuminate\Support\Facades\DB;
use Morilog\Jalali\Jalalian;

DB::table('categories')->insert([
    'name' => 'بادی اسپلش',
    'meta' => 'Body splash',
    'description' => 'محصولات بادی اسپلش',
    'category_id' => Category::whereMeta('Deodorant and antiperspirant')->first()->id,
    'created_at' => Jalalian::now(),
    'updated_at' => Jalalian::now()
]);

DB::table('categories')->insert([
    'name' => 'رول ضدتعریق و مام',
    'meta' => 'Antiperspirant roll on',
    'description' => 'محصولات رول ضدتعریق و مام',
    'category_id' => Category::whereMeta('Deodorant and antiperspirant')->first()->id,
    'created_at' => Jalalian::now(),
    'updated_at' => Jalalian::now()
]);
DB::table('categories')->insert([
    'name' => 'بادی میست',
    'meta' => 'Body mist',
    'description' => 'محصولات بادی میست',
    'category_id' => Category::whereMeta('Deodorant and antiperspirant')->first()->id,
    'created_at' => Jalalian::now(),
    'updated_at' => Jalalian::now()
]);
DB::table('categories')->insert([
    'name' => 'اسپری ضد تعریق',
    'meta' => 'Body spray',
    'description' => 'محصولات اسپری ضد تعریق',
    'category_id' => Category::whereMeta('Deodorant and antiperspirant')->first()->id,
    'created_at' => Jalalian::now(),
    'updated_at' => Jalalian::now()
]);
DB::table('categories')->insert([
    'name' => 'استیک ضد تعریق',
    'meta' => 'Antiperspirant stick',
    'description' => 'محصولات استیک ضد تعریق',
    'category_id' => Category::whereMeta('Deodorant and antiperspirant')->first()->id,
    'created_at' => Jalalian::now(),
    'updated_at' => Jalalian::now()
]);

//لوارم استحمام

DB::table('categories')->insert([
    'name' => 'لیف و افنج حمام',
    'meta' => 'Bath sponge',
    'description' => 'محصولات لیف و افنج حمام',
    'category_id' => Category::whereMeta('Bath products')->first()->id,
    'created_at' => Jalalian::now(),
    'updated_at' => Jalalian::now()
]);
DB::table('categories')->insert([
    'name' => 'وان',
    'meta' => 'Bathtub products',
    'description' => 'محصولات وان',
    'category_id' => Category::whereMeta('Bath products')->first()->id,
    'created_at' => Jalalian::now(),
    'updated_at' => Jalalian::now()
]);

//مراقبت بدن
DB::table('categories')->insert([
    'name' => 'افترسان',
    'meta' => 'After sun',
    'description' => 'محصولات افترسان',
    'category_id' => Category::whereMeta('Body care')->first()->id,
    'created_at' => Jalalian::now(),
    'updated_at' => Jalalian::now()
]);

DB::table('categories')->insert([
    'name' => 'ماساژور',
    'meta' => 'Massager',
    'description' => 'محصولات ماساژور',
    'category_id' => Category::whereMeta('Body care')->first()->id,
    'created_at' => Jalalian::now(),
    'updated_at' => Jalalian::now()
]);

DB::table('categories')->insert([
    'name' => ' بدن',
    'meta' => 'Stretch marks repair cream',
    'description' => 'محصولات  بدن',
    'category_id' => Category::whereMeta('Body care')->first()->id,
    'created_at' => Jalalian::now(),
    'updated_at' => Jalalian::now()
]);
DB::table('categories')->insert([
    'name' => 'فرم دهنده بدن',
    'meta' => 'Body lifting cream',
    'description' => 'محصولات فرم دهنده بدن',
    'category_id' => Category::whereMeta('Body care')->first()->id,
    'created_at' => Jalalian::now(),
    'updated_at' => Jalalian::now()
]);

DB::table('categories')->insert([
    'name' => 'برنزه کننده بدن',
    'meta' => 'Tanning products',
    'description' => 'محصولات برنزه کننده بدن',
    'category_id' => Category::whereMeta('Body care')->first()->id,
    'created_at' => Jalalian::now(),
    'updated_at' => Jalalian::now()
]);
DB::table('categories')->insert([
    'name' => 'کرم دست',
    'meta' => 'Hand creams',
    'description' => 'محصولات کرم دست',
    'category_id' => Category::whereMeta('Body care')->first()->id,
    'created_at' => Jalalian::now(),
    'updated_at' => Jalalian::now()
]);

DB::table('categories')->insert([
    'name' => 'ضدآفتاب بدن',
    'meta' => 'Body sun protect',
    'description' => 'محصولات ضدآفتاب بدن',
    'category_id' => Category::whereMeta('Body care')->first()->id,
    'created_at' => Jalalian::now(),
    'updated_at' => Jalalian::now()
]);

DB::table('categories')->insert([
    'name' => 'روغن بدن',
    'meta' => 'Body oils',
    'description' => 'محصولات روغن بدن',
    'category_id' => Category::whereMeta('Body care')->first()->id,
    'created_at' => Jalalian::now(),
    'updated_at' => Jalalian::now()
]);

DB::table('categories')->insert([
    'name' => 'بادی باتر',
    'meta' => 'Body butters',
    'description' => 'محصولات بادی باتر',
    'category_id' => Category::whereMeta('Body care')->first()->id,
    'created_at' => Jalalian::now(),
    'updated_at' => Jalalian::now()
]);
DB::table('categories')->insert([
    'name' => 'بادی میلک',
    'meta' => 'Body milks',
    'description' => 'محصولات بادی میلک',
    'category_id' => Category::whereMeta('Body care')->first()->id,
    'created_at' => Jalalian::now(),
    'updated_at' => Jalalian::now()
]);
DB::table('categories')->insert([
    'name' => 'کرم پا',
    'meta' => 'Foot cream',
    'description' => 'محصولات کرم پا',
    'category_id' => Category::whereMeta('Body care')->first()->id,
    'created_at' => Jalalian::now(),
    'updated_at' => Jalalian::now()
]);

DB::table('categories')->insert([
    'name' => 'اسکراب بدن',
    'meta' => 'Body scrub',
    'description' => 'محصولات اسکراب بدن',
    'category_id' => Category::whereMeta('Body care')->first()->id,
    'created_at' => Jalalian::now(),
    'updated_at' => Jalalian::now()
]);
DB::table('categories')->insert([
    'name' => 'لوسیون بدن',
    'meta' => 'Body lotion',
    'description' => 'محصولات لوسیون بدن',
    'category_id' => Category::whereMeta('Body care')->first()->id,
    'created_at' => Jalalian::now(),
    'updated_at' => Jalalian::now()
]);

// بهداشت بدن
DB::table('categories')->insert([
    'name' => 'پن و صابون',
    'meta' => 'Soap',
    'description' => 'محصولات پن و صابون',
    'category_id' => Category::whereMeta('Body health')->first()->id,
    'created_at' => Jalalian::now(),
    'updated_at' => Jalalian::now()
]);
DB::table('categories')->insert([
    'name' => 'شامپو بدن',
    'meta' => 'Body shampoo',
    'description' => 'محصولات شامپو بدن',
    'category_id' => Category::whereMeta('Body health')->first()->id,
    'created_at' => Jalalian::now(),
    'updated_at' => Jalalian::now()
]);

//اصلاح بدن

DB::table('categories')->insert([
    'name' => 'مراقبت بعد از اصلاح',
    'meta' => 'After shaving products',
    'description' => 'محصولات مراقبت بعد از اصلاح',
    'category_id' => Category::whereMeta('Shaving products')->first()->id,
    'created_at' => Jalalian::now(),
    'updated_at' => Jalalian::now()
]);

DB::table('categories')->insert([
    'name' => 'وکس',
    'meta' => 'hair remover wax',
    'description' => 'محصولات وکس',
    'category_id' => Category::whereMeta('Shaving products')->first()->id,
    'created_at' => Jalalian::now(),
    'updated_at' => Jalalian::now()
]);

DB::table('categories')->insert([
    'name' => 'کرم موبر',
    'meta' => 'hair remover cream',
    'description' => 'محصولات کرم موبر',
    'category_id' => Category::whereMeta('Shaving products')->first()->id,
    'created_at' => Jalalian::now(),
    'updated_at' => Jalalian::now()
]);
DB::table('categories')->insert([
    'name' => 'تیغ اصلاح',
    'meta' => 'Shaving razor',
    'description' => 'محصولات تیغ اصلاح',
    'category_id' => Category::whereMeta('Shaving products')->first()->id,
    'created_at' => Jalalian::now(),
    'updated_at' => Jalalian::now()
]);
