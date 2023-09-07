<?php


use App\Models\Category;
use Illuminate\Support\Facades\DB;
use Morilog\Jalali\Jalalian;


// محصولات بدن آقایان
DB::table('categories')->insert([
    'name' => 'ژل بهداشتی آقایان',
    'meta' => 'Men health gel',
    'description' => 'ژل بهداشتی آقایان',
    'category_id' => Category::whereMeta('Men set')->first()->id,
    'created_at' => Jalalian::now(),
    'updated_at' => Jalalian::now()
]);DB::table('categories')->insert([
    'name' => 'شامپو بدن مردانه',
    'meta' => 'Body shampoo for men',
    'description' => 'شامپو بدن مردانه',
    'category_id' => Category::whereMeta('Men set')->first()->id,
    'created_at' => Jalalian::now(),
    'updated_at' => Jalalian::now()
]);DB::table('categories')->insert([
    'name' => 'دئودورانت مردانه',
    'meta' => 'Deodorant men',
    'description' => 'دئودورانت مردانه',
    'category_id' => Category::whereMeta('Men set')->first()->id,
    'created_at' => Jalalian::now(),
    'updated_at' => Jalalian::now()
]);

// محصولات پوست آقایان

DB::table('categories')->insert([
    'name' => 'کرم مرطوب کننده مردانه',
    'meta' => 'Moisturizing cream men',
    'description' => 'کرم مرطوب کننده مردانه',
    'category_id' => Category::whereMeta('Body skin health men')->first()->id,
    'created_at' => Jalalian::now(),
    'updated_at' => Jalalian::now()
]);

DB::table('categories')->insert([
    'name' => 'کرم دور چشم مردانه',
    'meta' => 'Eye circle cream men',
    'description' => 'کرم دور چشم مردانه',
    'category_id' => Category::whereMeta('Body skin health men')->first()->id,
    'created_at' => Jalalian::now(),
    'updated_at' => Jalalian::now()
]);DB::table('categories')->insert([
    'name' => 'شوینده و لوسیون مردانه',
    'meta' => 'Face washer men',
    'description' => 'شوینده و لوسیون مردانه',
    'category_id' => Category::whereMeta('Body skin health men')->first()->id,
    'created_at' => Jalalian::now(),
    'updated_at' => Jalalian::now()
]);DB::table('categories')->insert([
    'name' => 'ضدآفتاب مردانه',
    'meta' => 'Sunprotect men',
    'description' => 'ضدآفتاب مردانه',
    'category_id' => Category::whereMeta('Body skin health men')->first()->id,
    'created_at' => Jalalian::now(),
    'updated_at' => Jalalian::now()
]);

//محصولات مویی آقایان
DB::table('categories')->insert([
    'name' => 'رنگ موی مردانه',
    'meta' => 'Hair color men',
    'description' => 'رنگ موی مردانه',
    'category_id' => Category::whereMeta('Hair care men')->first()->id,
    'created_at' => Jalalian::now(),
    'updated_at' => Jalalian::now()
]);DB::table('categories')->insert([
    'name' => 'حالت دهنده موی آقایان',
    'meta' => 'Hair styling men',
    'description' => 'حالت دهنده موی آقایان',
    'category_id' => Category::whereMeta('Hair care men')->first()->id,
    'created_at' => Jalalian::now(),
    'updated_at' => Jalalian::now()
]);DB::table('categories')->insert([
    'name' => 'شامپو مردانه',
    'meta' => 'Shampoo men',
    'description' => 'شامپو مردانه',
    'category_id' => Category::whereMeta('Hair care men')->first()->id,
    'created_at' => Jalalian::now(),
    'updated_at' => Jalalian::now()
]);

//محصولات اصلاح آقایان

DB::table('categories')->insert([
    'name' => 'افتر شیو',
    'meta' => 'Aftershave',
    'description' => 'افتر شیو',
    'category_id' => Category::whereMeta('Shaving men')->first()->id,
    'created_at' => Jalalian::now(),
    'updated_at' => Jalalian::now()
]);DB::table('categories')->insert([
    'name' => 'ژل اصلاح',
    'meta' => 'Shaving gel',
    'description' => 'ژل اصلاح',
    'category_id' => Category::whereMeta('Shaving men')->first()->id,
    'created_at' => Jalalian::now(),
    'updated_at' => Jalalian::now()
]);DB::table('categories')->insert([
    'name' => 'فوم اصلاح',
    'meta' => 'Shaving foam',
    'description' => 'فوم اصلاح',
    'category_id' => Category::whereMeta('Shaving men')->first()->id,
    'created_at' => Jalalian::now(),
    'updated_at' => Jalalian::now()
]);DB::table('categories')->insert([
    'name' => 'تیغ اصلاح مردانه',
    'meta' => 'Shaving razor men',
    'description' => 'تیغ اصلاح مردانه',
    'category_id' => Category::whereMeta('Shaving men')->first()->id,
    'created_at' => Jalalian::now(),
    'updated_at' => Jalalian::now()
]);
