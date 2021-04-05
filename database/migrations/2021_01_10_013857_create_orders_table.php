<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->nullable();
            $table->integer('district_id');
            $table->integer('courier_id'); // shipping method
            $table->string('name');
            $table->string('email');
            $table->string('phone');
            $table->string('emergency_phone')->nullable();
            $table->decimal('shipping_charge');
            $table->string('payment_method');
            $table->mediumText('full_address');
            $table->text('note')->nullable();
            $table->decimal('discount');
            $table->decimal('sub_total');
            $table->decimal('total');
            $table->string('discount_type')->nullable(); // offer or coupon or special sale
            $table->integer('status')->default(1); // 1 = pending, 2 = processing, 3 = cancelled, 4 = delivered
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
        Schema::dropIfExists('orders');
    }
}
