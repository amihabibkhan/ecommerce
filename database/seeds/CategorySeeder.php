<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // main category
        DB::table('main_categories')->insert([
           'title' => 'সাধারণ',
           'slug' => 'general',
        ]);
        // category
        DB::table('categories')->insert([
           'main_category_id' => '1',
           'title' => 'সাধারণ',
           'slug' => 'general',
        ]);
        // sub category
        DB::table('sub_categories')->insert([
           'category_id' => '1',
           'title' => 'সাধারণ',
           'slug' => 'general',
        ]);
    }
}
