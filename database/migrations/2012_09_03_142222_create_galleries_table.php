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
        Schema::create('galleries', function (Blueprint $table) {
                $table->id()->autoIncrement()->unique();
                $table->string('title','64');
                $table->string('alt','64')->nullable();
                $table->integer('size')->nullable();
                $table->string('mime','64');
                $table->string('path','256')->unique();
                $table->string('flag','25');
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
        Schema::dropIfExists('galleries');
    }
};
