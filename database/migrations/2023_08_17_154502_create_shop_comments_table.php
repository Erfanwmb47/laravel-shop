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
        Schema::create('shop_comments', function (Blueprint $table) {
            $table->id()->autoIncrement()->unique();
            $table->foreignid('user_id')->constrained()->onDelete('cascade');
            $table->foreignid('product_id')->constrained()->onDelete('cascade');
            $table->bigInteger('like')->unsigned()->default(0);
            $table->bigInteger('dislike')->unsigned()->default(0);
            $table->unique(['product_id','user_id']);
            $table->text('title');
            $table->text('text');
            $table->tinyInteger('rate')->unsigned();
            $table->json('positive')->nullable();
            $table->json('negative')->nullable();
            $table->boolean('status')->default('0');
            $table->softDeletes();
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
        Schema::dropIfExists('shop_comments');
    }
};
