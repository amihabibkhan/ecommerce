<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('title'); //
            $table->string('sub_title')->nullable(); //
            $table->integer('writer_id')->nullable(); //
            $table->integer('publication_id')->nullable(); //
            $table->string('isbn')->nullable(); //
            $table->string('edition')->nullable(); //
            $table->integer('total_page')->nullable(); //
            $table->integer('country_id')->nullable(); //
            $table->integer('language_id')->nullable(); //
            $table->string('main_image')->nullable(); //
            $table->string('thumbnail')->nullable(); //
            $table->integer('regular_price')->nullable(); //
            $table->integer('sale_price')->nullable(); //
            $table->text('description')->nullable(); //
            $table->integer('brand_id')->nullable(); //
            $table->string('model')->nullable(); //
            $table->string('video_url')->nullable(); //
            $table->integer('weight')->nullable(); //
            $table->integer('stock')->default(1); // 1 for available 0 for stock out
            $table->integer('status')->default(1); //
            $table->string('product_code')->nullable(); //
            $table->integer('type')->default(1); // book = 1, others = 2
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
        Schema::dropIfExists('products');
    }
}
