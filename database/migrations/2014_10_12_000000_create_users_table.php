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
        Schema::create('users', function (Blueprint $table) {
            $table->id()->autoIncrement()->unique();
            $table->string('username','64')->unique()->nullable();
            $table->string('password')->nullable();
            $table->string('email')->unique()->nullable();
            $table->string('firstName','64')->nullable();
            $table->string('lastName','64')->nullable();
            $table->enum('two_factor_type',['off','SMS'])->default('off');
            $table->string('phone','11')->nullable();
            $table->dateTime('birthday')->nullable();
            $table->enum('sex',['man','woman'])->nullable();
            $table->boolean('is_staff')->default('0');
            $table->boolean('is_superuser')->default('0');
            $table->string('description','512')->nullable();
            $table->string('previousPassword')->nullable();
            $table->dateTime('email_verified_at')->nullable();
            $table->foreignId('gallery_id')->nullable()->default('1')->constrained();
            $table->integer('score')->unsigned()->default(0);
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
};
