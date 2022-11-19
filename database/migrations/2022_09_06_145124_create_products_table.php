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
            $table->string('nickName','64')->nullable();
            $table->integer('price')->unsigned()->nullable();
            $table->integer('isbn')->unique()->unsigned();
            $table->integer('volume')->nullable()->unsigned();
            $table->integer('weight')->nullable()->unsigned();
            $table->integer('quantity')->nullable()->unsigned();
            $table->integer('maxOrder')->nullable()->unsigned();
            $table->integer('offer')->nullable()->unsigned();
            $table->integer('averageRate',)->nullable()->unsigned();
            $table->string('abstract','256')->nullable();
            $table->string('description','512')->nullable();
            $table->string('property','128')->nullable();//ویژگی های اضافی
            $table->string('meta','64')->nullable();
            $table->integer('sales')->nullable();//تعداد فروخته شده از هر جنس
            $table->string('image','128')->nullable();
            $table->foreignId('category_id')->constrained();
            //$table->foreignId('category_id')->nullable()->constrained();
            $table->timestamps();


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
    }
};
