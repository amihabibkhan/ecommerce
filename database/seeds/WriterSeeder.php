<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WriterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('writers')->insert([
            'name' => 'অজানা',
            'slug' => 'unknown'
        ]);
    }
}
