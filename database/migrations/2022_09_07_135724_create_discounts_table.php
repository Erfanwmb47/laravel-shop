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
            $table->integer('percent')->nullable();
            $table->integer('price')->nullable();
            $table->integer('maxUse')->nullable();
            $table->integer('maxCost')->nullable();
            $table->dateTime('deadline')->nullable();
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
        Schema::dropIfExists('discounts');
    }
};
