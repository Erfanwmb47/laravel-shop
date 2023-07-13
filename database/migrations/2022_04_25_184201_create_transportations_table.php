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
        Schema::create('transportations', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->string('name','32')->unique();
            $table->string('eng_name','32')->unique();
            $table->foreignId('gallery_id')->nullable()->constrained()->nullOnDelete();
            $table->string('description','512')->nullable();
            $table->integer('factor_weight')->unsigned();
            $table->integer('factor_volume')->unsigned();
            $table->integer('const_distance')->unsigned();
            $table->integer('cost')->unsigned();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transportations');
    }
};
