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
        Schema::create('addresses', function (Blueprint $table) {
            $table->id()->autoIncrement()->unique();
            $table->foreignId('county_id')->constrained();
            $table->foreignId('province_id')->constrained();
            $table->string('detail','128')->nullable();
            $table->integer('tel')->unsigned()->nullable();
            $table->integer('postalCode')->nullable()->unsigned();
            $table->string('map','128')->nullable();
            $table->foreignId('user_id')->constrained();
            $table->boolean('default')->default('0');
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
        Schema::dropIfExists('addresses');
    }
};
