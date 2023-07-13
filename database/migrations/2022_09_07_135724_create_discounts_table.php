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
        Schema::create('discounts', function (Blueprint $table) {
            $table->id()->autoIncrement()->unique();
            $table->string('name')->unique();
            $table->string('code')->unique();
            $table->integer('percent')->nullable();
            $table->integer('price')->nullable();
            $table->integer('maxUse')->default('10')->nullable();
            $table->integer('maxUserUsage')->default('1')->nullable();
            $table->integer('maxCost')->default('1000')->nullable();
            $table->text('description')->nullable();
            $table->timestamp('expired_at')->nullable();
            $table->dateTime('created_at')->nullable();
            $table->dateTime('updated_at')->nullable();
        });
        Schema::create('discount_product', function (Blueprint $table) {
            $table->foreignId('discount_id')->constrained()->onDelete('cascade');
            $table->foreignId('product_id')->constrained()->onDelete('cascade');
            $table->primary(['discount_id','product_id']);
        });

        Schema::create('category_discount', function (Blueprint $table) {
            $table->foreignId('category_id')->constrained()->onDelete('cascade');
            $table->foreignId('discount_id')->constrained()->onDelete('cascade');
            $table->primary(['category_id','discount_id']);
        });

        Schema::create('discount_user', function (Blueprint $table) {
            $table->foreignId('discount_id')->constrained()->onDelete('cascade');
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->primary(['discount_id','user_id']);
        });
        Schema::create('discount_transportation', function (Blueprint $table) {
            $table->foreignId('discount_id')->constrained()->onDelete('cascade');
            $table->foreignId('transportation_id')->constrained()->onDelete('cascade');
            $table->primary(['discount_id','transportation_id']);
        });
        Schema::create('discount_order',function (Blueprint $table){
            $table->foreignId('discount_id')->constrained()->onDelete('cascade');
            $table->foreignId('order_id')->constrained()->onDelete('cascade');
            $table->primary(['discount_id','order_id']);

        });
        Schema::create('brand_discount',function (Blueprint $table){
            $table->foreignId('discount_id')->constrained()->onDelete('cascade');
            $table->foreignId('brand_id')->constrained()->onDelete('cascade');
            $table->primary(['discount_id','brand_id']);

        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */

    public function down()
    {
        Schema::dropIfExists('discount_order');
        Schema::dropIfExists('discount_product');
        Schema::dropIfExists('discount_transportation');
        Schema::dropIfExists('discount_user');
        Schema::dropIfExists('category_discount');
        Schema::dropIfExists('brand_discount');
        Schema::dropIfExists('discounts');
    }
};

