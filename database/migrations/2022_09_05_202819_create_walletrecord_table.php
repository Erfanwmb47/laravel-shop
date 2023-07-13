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
        Schema::create('walletRecord', function (Blueprint $table) {
            $table->id()->autoIncrement()->unique();
            $table->binary('type');
            $table->binary('paymentStatus');
            $table->integer('trackingCode')->unique()->unsigned();
            $table->string('detail','64')->nullable();
            $table->foreignId('user_id');
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
        Schema::dropIfExists('walletrecord');
    }
};
