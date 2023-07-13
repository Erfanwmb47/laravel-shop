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
        Schema::create('comments', function (Blueprint $table) {
            $table->id()->autoIncrement()->unique();
            $table->bigInteger('comment_id')->default(0);
            $table->foreignid('user_id')->constrained()->onDelete('cascade');
            $table->bigInteger('commentable_id');
            $table->string('commentable_type');
            $table->text('text');
            $table->enum('approved',['allow','deny'])->default('deny');
            $table->integer('like')->unsigned()->default('0');
            $table->integer('disLike')->unsigned()->default('0');
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
        Schema::dropIfExists('comments');
    }
};
