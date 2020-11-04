<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LanguageCountry extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // language seeder
        DB::table('languages')->insert([
            'name' => 'বাংলা',
            'slug' => 'bangla'
        ]);
        // country seeder
        DB::table('countries')->insert([
            'name' => 'বাংলাদেশ',
            'slug' => 'bangladesh'
        ]);
    }
}
