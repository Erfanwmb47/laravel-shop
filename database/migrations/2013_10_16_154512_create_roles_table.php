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
        Schema::create('roles', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->string('name')->unique();
            $table->integer('categories')->default('0');
            $table->integer('brands')->default('0');
            $table->integer('products')->default('0');
            $table->integer('users')->default('0');
            $table->integer('roles')->default('0');
            $table->integer('comments')->default('0');
            $table->integer('galleries')->default('0');
            $table->integer('status')->default('0');
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
        Schema::dropIfExists('roles');
    }
};
