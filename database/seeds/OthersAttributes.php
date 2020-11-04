<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OthersAttributes extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // brand
        DB::table('brands')->insert([
           'name' => 'সাধারণ',
           'slug' => 'general',
        ]);

        // size
        DB::table('sizes')->insert([
           'size' => 'সাধারণ',
        ]);

        // size
        DB::table('colors')->insert([
           'color' => 'সাধারণ',
        ]);

        // size
        DB::table('tags')->insert([
           'title' => 'সাধারণ',
        ]);
    }
}
