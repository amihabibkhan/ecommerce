<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCouponsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coupons', function (Blueprint $table) {
            $table->id();
            $table->string('offer_title');
            $table->string('coupon_code');
            $table->integer('discount_amount')->nullable(); // first will be checked the amount
            $table->integer('discount_percent')->nullable(); // if amount not given percentage will be applied
            $table->string('last_date');
            $table->integer('sub_category_id')->nullable();
            $table->integer('writer_id')->nullable();
            $table->integer('publication_id')->nullable();
            $table->integer('type')->default(1); // 1 for sub category, 2 for writer, 3 for pubs and 4 for all
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
        Schema::dropIfExists('coupons');
    }
}
