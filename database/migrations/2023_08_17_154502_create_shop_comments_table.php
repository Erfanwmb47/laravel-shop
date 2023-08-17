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
            $table->text('text');
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
