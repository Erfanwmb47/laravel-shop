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
        Schema::create('comments', function (Blueprint $table) {
            $table->id()->autoIncrement()->unique();
            $table->foreignid('comment_id')->nullable()->constrained();
            $table->foreignid('user_id')->constrained();
            $table->foreignid('product_id')->constrained();
            //$table->foreign('product_id')->references('product_id')->on('products');
            $table->string('text');
            $table->string('status')->default('0');
            $table->integer('like')->unsigned()->default('0');
            $table->integer('disLike')->unsigned()->default('0');
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
        Schema::dropIfExists('comments');
    }
};
