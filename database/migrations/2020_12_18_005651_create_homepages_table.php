<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHomepagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('homepages', function (Blueprint $table) {
            $table->id();
            $table->string('type'); // category = 1, subcategory = 2, writer = 3, Weekly offer = 4
            $table->integer('category_id')->nullable(); // category or subcategory id
            $table->string('section_title'); // custom title for section
            $table->integer('order');
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
        Schema::dropIfExists('homepages');
    }
}
