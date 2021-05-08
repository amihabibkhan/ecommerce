<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleAndOrderStatusesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            ['id'=> 1,'name' => 'Super-admin'],
            ['id'=> 2,'name' => 'Manager'],
            ['id'=> 3,'name' => 'General User'],
            ['id'=> 4,'name' => 'Editor'],
        ]);

        DB::table('order_statuses')->insert([
            ['id'=> 1,'title' => 'Pending'],
            ['id'=> 2,'title' => 'Processing'],
            ['id'=> 3,'title' => 'Cancel'],
            ['id'=> 4,'title' => 'Delivered'],
        ]);
    }
}
