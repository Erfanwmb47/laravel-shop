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
        Schema::create('user_order_discounts', function (Blueprint $table) {
            $table->foreignId('user_id')->constrained();
            $table->foreignId('discount_id')->constrained();
            $table->foreignId('order_id')->constrained();
            $table->integer('count')->default('1');
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
        Schema::dropIfExists('user_order_discounts');
    }
};
