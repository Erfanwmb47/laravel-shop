<?php


use App\Models\Category;
use Illuminate\Support\Facades\DB;
use Morilog\Jalali\Jalalian;

// بهداشت و مراقبت مو
DB::table('categories')->insert([
    'name' => 'شیر مو',
    'meta' => 'Hair milk',
    'description' => 'محصولات شیر مو',
    'category_id' => Category::whereMeta('Hair care products')->first()->id,
    'created_at' => Jalalian::now(),
    'updated_at' => Jalalian::now()
]);DB::table('categories')->insert([
    'name' => 'شامپو خشک',
    'meta' => 'Dry shampoo',
    'description' => 'محصولات شامپو خشک',
    'category_id' => Category::whereMeta('Hair care products')->first()->id,
    'created_at' => Jalalian::now(),
    'updated_at' => Jalalian::now()
]);DB::table('categories')->insert([
    'name' => 'اسپری دوفاز مو',
    'meta' => 'Two phase spray',
    'description' => 'محصولات اسپری دوفاز مو',
    'category_id' => Category::whereMeta('Hair care products')->first()->id,
    'created_at' => Jalalian::now(),
    'updated_at' => Jalalian::now()
]);DB::table('categories')->insert([
    'name' => 'تونیک مو',
    'meta' => 'Hair tonic',
    'description' => 'محصولات تونیک مو',
    'category_id' => Category::whereMeta('Hair care products')->first()->id,
    'created_at' => Jalalian::now(),
    'updated_at' => Jalalian::now()
]);DB::table('categories')->insert([
    'name' => 'تقویت مو',
    'meta' => 'Hair strengthening products',
    'description' => 'محصولات تقویت مو',
    'category_id' => Category::whereMeta('Hair care products')->first()->id,
    'created_at' => Jalalian::now(),
    'updated_at' => Jalalian::now()
]);DB::table('categories')->insert([
    'name' => 'کرم مو',
    'meta' => 'Hair cream',
    'description' => 'محصولات کرم مو',
    'category_id' => Category::whereMeta('Hair care products')->first()->id,
    'created_at' => Jalalian::now(),
    'updated_at' => Jalalian::now()
]);DB::table('categories')->insert([
    'name' => 'روغن مو',
    'meta' => 'Hair oils',
    'description' => 'محصولات روغن مو',
    'category_id' => Category::whereMeta('Hair care products')->first()->id,
    'created_at' => Jalalian::now(),
    'updated_at' => Jalalian::now()
]);DB::table('categories')->insert([
    'name' => 'سرم مو',
    'meta' => 'Hair serum',
    'description' => 'محصولات سرم مو',
    'category_id' => Category::whereMeta('Hair care products')->first()->id,
    'created_at' => Jalalian::now(),
    'updated_at' => Jalalian::now()
]);DB::table('categories')->insert([
    'name' => 'ماسک مو',
    'meta' => 'Hair mask',
    'description' => 'محصولات ماسک مو',
    'category_id' => Category::whereMeta('Hair care products')->first()->id,
    'created_at' => Jalalian::now(),
    'updated_at' => Jalalian::now()
]);DB::table('categories')->insert([
    'name' => 'نرم کننده مو',
    'meta' => 'Hair conditioner',
    'description' => 'محصولات نرم کننده مو',
    'category_id' => Category::whereMeta('Hair care products')->first()->id,
    'created_at' => Jalalian::now(),
    'updated_at' => Jalalian::now()
]);DB::table('categories')->insert([
    'name' => 'شامپو مو',
    'meta' => 'Hair shampoo',
    'description' => 'محصولات شامپو مو',
    'category_id' => Category::whereMeta('Hair care products')->first()->id,
    'created_at' => Jalalian::now(),
    'updated_at' => Jalalian::now()
]);


//تجهیزات رنگ مو
DB::table('categories')->insert([
    'name' => 'رنگ ابرو',
    'meta' => 'Eyebrow color',
    'description' => 'محصولات رنگ ابرو',
    'category_id' => Category::whereMeta('Hair color makeup products')->first()->id,
    'created_at' => Jalalian::now(),
    'updated_at' => Jalalian::now()
]);DB::table('categories')->insert([
    'name' => 'رنگساژ و شامپو رنگ',
    'meta' => 'Rangsazh',
    'description' => 'محصولات رنگساژ و شامپو رنگ',
    'category_id' => Category::whereMeta('Hair color makeup products')->first()->id,
    'created_at' => Jalalian::now(),
    'updated_at' => Jalalian::now()
]);DB::table('categories')->insert([
    'name' => 'پودر ، ریمل و کانسیلر مو',
    'meta' => 'Hair concealer',
    'description' => 'محصولات پودر ، ریمل و کانسیلر مو',
    'category_id' => Category::whereMeta('Hair color makeup products')->first()->id,
    'created_at' => Jalalian::now(),
    'updated_at' => Jalalian::now()
]);DB::table('categories')->insert([
    'name' => 'رنگ مو',
    'meta' => 'Hair color',
    'description' => 'محصولات رنگ مو',
    'category_id' => Category::whereMeta('Hair color makeup products')->first()->id,
    'created_at' => Jalalian::now(),
    'updated_at' => Jalalian::now()
]);DB::table('categories')->insert([
    'name' => 'کیت رنگ مو',
    'meta' => 'Hair color Kit',
    'description' => 'محصولات کیت رنگ مو',
    'category_id' => Category::whereMeta('Hair color makeup products')->first()->id,
    'created_at' => Jalalian::now(),
    'updated_at' => Jalalian::now()
]);DB::table('categories')->insert([
    'name' => 'دکلره',
    'meta' => 'Decolor',
    'description' => 'محصولات دکلره',
    'category_id' => Category::whereMeta('Hair color makeup products')->first()->id,
    'created_at' => Jalalian::now(),
    'updated_at' => Jalalian::now()
]);DB::table('categories')->insert([
    'name' => 'اکسیدان',
    'meta' => 'Oxidant',
    'description' => 'محصولات اکسیدان',
    'category_id' => Category::whereMeta('Hair color makeup products')->first()->id,
    'created_at' => Jalalian::now(),
    'updated_at' => Jalalian::now()
]);
DB::table('categories')->insert([
    'name' => 'واریاسیون',
    'meta' => 'variation',
    'description' => 'محصولات واریاسیون',
    'category_id' => Category::whereMeta('Hair color makeup products')->first()->id,
    'created_at' => Jalalian::now(),
    'updated_at' => Jalalian::now()
]);

// حالت دهنده مو
DB::table('categories')->insert([
    'name' => 'واکس مو',
    'meta' => 'Hair wax',
    'description' => 'محصولات واکس مو',
    'category_id' => Category::whereMeta('Hair styling')->first()->id,
    'created_at' => Jalalian::now(),
    'updated_at' => Jalalian::now()
]);DB::table('categories')->insert([
    'name' => 'چسب مو',
    'meta' => 'Hair glue',
    'description' => 'محصولات چسب مو',
    'category_id' => Category::whereMeta('Hair styling')->first()->id,
    'created_at' => Jalalian::now(),
    'updated_at' => Jalalian::now()
]);DB::table('categories')->insert([
    'name' => 'اسپری حجم دهنده',
    'meta' => 'Volumizing spray ',
    'description' => 'محصولات اسپری حجم دهنده',
    'category_id' => Category::whereMeta('Hair styling')->first()->id,
    'created_at' => Jalalian::now(),
    'updated_at' => Jalalian::now()
]);DB::table('categories')->insert([
    'name' => 'واکس مو رنگی',
    'meta' => 'Hair color wax',
    'description' => 'محصولات واکس مو رنگی',
    'category_id' => Category::whereMeta('Hair styling')->first()->id,
    'created_at' => Jalalian::now(),
    'updated_at' => Jalalian::now()
]);DB::table('categories')->insert([
    'name' => 'ژل مو',
    'meta' => 'Hair gel',
    'description' => 'محصولات ژل مو',
    'category_id' => Category::whereMeta('Hair styling')->first()->id,
    'created_at' => Jalalian::now(),
    'updated_at' => Jalalian::now()
]);DB::table('categories')->insert([
    'name' => 'اسپری مو',
    'meta' => 'Hair spray',
    'description' => 'محصولات اسپری مو',
    'category_id' => Category::whereMeta('Hair styling')->first()->id,
    'created_at' => Jalalian::now(),
    'updated_at' => Jalalian::now()
]);DB::table('categories')->insert([
    'name' => 'موس مو',
    'meta' => 'Hair mousse',
    'description' => 'محصولات موس مو',
    'category_id' => Category::whereMeta('Hair styling')->first()->id,
    'created_at' => Jalalian::now(),
    'updated_at' => Jalalian::now()
]);

//اکسسوری مو
DB::table('categories')->insert([
    'name' => 'عطر مو',
    'meta' => 'Hair perfume',
    'description' => 'محصولات عطر مو',
    'category_id' => Category::whereMeta('Hair appliances')->first()->id,
    'created_at' => Jalalian::now(),
    'updated_at' => Jalalian::now()
]);DB::table('categories')->insert([
    'name' => 'بالم مو',
    'meta' => 'Hair balm',
    'description' => 'محصولات بالم مو',
    'category_id' => Category::whereMeta('Hair appliances')->first()->id,
    'created_at' => Jalalian::now(),
    'updated_at' => Jalalian::now()
]);DB::table('categories')->insert([
    'name' => 'پروتز مو',
    'meta' => 'Hair prosthesis',
    'description' => 'محصولات پروتز مو',
    'category_id' => Category::whereMeta('Hair appliances')->first()->id,
    'created_at' => Jalalian::now(),
    'updated_at' => Jalalian::now()
]);
