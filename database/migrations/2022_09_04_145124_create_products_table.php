<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id()->autoIncrement()->unique();
            $table->string('name','32')->unique();
//            $table->string('slug','64')->unique();
            $table->string('nickName','64')->nullable();
            $table->integer('price')->unsigned()->nullable();
            $table->integer('UPC')->unique()->unsigned();
            $table->string('volume')->nullable();
            $table->integer('weight')->nullable()->unsigned();
            $table->integer('quantity')->nullable()->unsigned()->default(0);
            $table->integer('maxOrder')->nullable()->unsigned();
            $table->integer('offer')->nullable()->unsigned();
            $table->integer('sumRate',)->default(0)->unsigned();
            $table->integer('countRate',)->default(0)->unsigned();
            $table->string('abstract','256')->nullable();
            $table->text('description')->nullable();
            $table->string('meta','64')->nullable();
            $table->integer('sales')->nullable();//تعداد فروخته شده از هر جنس
            $table->enum('status',['active','deActive'])->default('active');
            $table->integer('view_count')->default(0)->unsigned()->nullable();
            $table->foreignId('gallery_id')->nullable()->constrained()->nullOnDelete();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('brand_id')->nullable()->constrained();
            $table->dateTime('created_at')->nullable();
            $table->dateTime('updated_at')->nullable();
        });
        Schema::create('gallery_product', function (Blueprint $table) {
            $table->foreignId('gallery_id')->constrained();
            $table->foreignId('product_id')->constrained();
            $table->boolean('default')->default(0);
            $table->dateTime('created_at')->nullable();
            $table->dateTime('updated_at')->nullable();
        });
        Schema::create('price_product',function (Blueprint $table){
           $table->foreignId('product_id')->constrained();
           $table->integer('before_price')->unsigned();
           $table->integer('after_price')->unsigned();
           $table->dateTime('created_at')->nullable();
           $table->dateTime('updated_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
        Schema::dropIfExists('gallery_product');
        Schema::dropIfExists('price_product');

    }
};
