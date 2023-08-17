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
        Schema::create('orders', function (Blueprint $table) {
            $table->id()->autoIncrement()->unique();
            $table->foreignId('user_id')->constrained()->onDelete('cascade ');
            $table->string('recipient_name','64');
            $table->string('recipient_phone','11');
           // $table->text('address');
            $table->bigInteger('cart_cost')->unsigned();
            $table->bigInteger('final_cost')->unsigned();
            $table->integer('amount')->unsigned();
            $table->enum('status',['unpaid','paid','preparation','posted','received','canceled']);
            $table->string('tracking_serial','24')->nullable();
            $table->integer('cardNumber')->nullable();
            $table->foreignId('transportation_id')->constrained();
            $table->bigInteger('paymentGateway_id')->unsigned();
            $table->foreign('paymentGateway_id')->references('id')->on('payment_gateways');
            $table->bigInteger('transportation_cost')->unsigned();
            $table->text('description')->nullable();
            $table->text('note')->nullable();
            $table->integer('score')->unsigned();
            $table->timestamps();
        });

        Schema::create('order_product', function (Blueprint $table) {
            $table->foreignId('order_id')->constrained()->onDelete('cascade');
            $table->foreignId('product_id')->constrained()->onDelete('cascade');
            $table->integer('quantity');
            $table->integer('priceWithDiscount')->nullable();
            $table->integer('price');
            $table->primary(['order_id','product_id']);
            $table->timestamps();
        });

        Schema::create('address_order', function (Blueprint $table){
            //TODO bara on delete here
            $table->foreignId('order_id')->unique()->constrained()->onDelete('cascade');
            $table->foreignId('province_id')->constrained()->onDelete('cascade');
            $table->foreignId('county_id')->constrained()->onDelete('cascade');
            $table->integer('postalCode')->nullable()->unsigned();
            $table->text('detail');
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
        Schema::dropIfExists('order_product');
        Schema::dropIfExists('orders');
    }
};
