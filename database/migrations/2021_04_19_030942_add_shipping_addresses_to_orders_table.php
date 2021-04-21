<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddShippingAddressesToOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('orders', function (Blueprint $table) {

            $table->integer('shipping_district_id');
            $table->string('shipping_name');
            $table->string('shipping_email');
            $table->string('shipping_phone');
            $table->string('shipping_emergency_phone')->nullable();
            $table->mediumText('shipping_full_address');
            $table->text('shipping_note')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->dropColumn('shipping_district_id');
            $table->dropColumn('shipping_name');
            $table->dropColumn('shipping_email');
            $table->dropColumn('shipping_phone');
            $table->dropColumn('shipping_emergency_phone');
            $table->dropColumn('shipping_full_address');
            $table->dropColumn('shipping_note');
        });
    }
}
