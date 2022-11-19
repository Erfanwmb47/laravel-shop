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
            $table->string('username','64')->unique();
            $table->string('password');
            $table->string('email')->unique();
            $table->string('firstName','64')->nullable();
            $table->string('lastName','64')->nullable();
            $table->string('phone','11')->nullable();
            $table->dateTime('birthday')->nullable();
            $table->binary('sex')->nullable();
            $table->string('description','512')->nullable();
            $table->string('previousPassword')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->foreignId('role_id')->constrained();
            $table->foreignId('gallery_id')->nullOnDelete();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
};
