<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        DB::table('options')->insert([
           ['id'=> 1,'name' => 'logo'],
           ['id'=> 2,'name' => 'address'],
           ['id'=> 3,'name' => 'phone_1'],
           ['id'=> 4,'name' => 'phone_2'],
           ['id'=> 5,'name' => 'email_1'],
           ['id'=> 6,'name' => 'email_2'],
        ]);

        DB::table('couriers')->insert([
           ['system' => 'কুরিয়ার ঢাকার ভিতর', 'cost' => 50],
           ['system' => 'কুরিয়ার ঢাকার বাহির', 'cost' => 100],
           ['system' => 'অফিস থেকে সংগ্রহ', 'cost' => 0]
        ]);

        DB::table('districts')->insert([
            ['name' => 'Comilla', 'bn_name' => 'কুমিল্লা'],
            ['name' => 'Feni', 'bn_name' => 'ফেনী'],
            ['name' => 'Brahmanbaria', 'bn_name' => 'ব্রাহ্মণবাড়িয়া'],
            ['name' => 'Rangamati', 'bn_name' => 'রাঙ্গামাটি'],
            ['name' => 'Noakhali', 'bn_name' => 'নোয়াখালী'],
            ['name' => 'Chandpur', 'bn_name' => 'চাঁদপুর'],
            ['name' => 'Lakshmipur', 'bn_name' => 'লক্ষ্মীপুর'],
            ['name' => 'Chattogram', 'bn_name' => 'চট্টগ্রাম'],
            ['name' => 'Coxsbazar', 'bn_name' => 'কক্সবাজার'],
            ['name' => 'Khagrachhari', 'bn_name' => 'খাগড়াছড়ি'],
            ['name' => 'Bandarban', 'bn_name' => 'বান্দরবান'],
            ['name' => 'Sirajganj', 'bn_name' => 'সিরাজগঞ্জ'],
            ['name' => 'Pabna', 'bn_name' => 'পাবনা'],
            ['name' => 'Bogura', 'bn_name' => 'বগুড়া'],
            ['name' => 'Rajshahi', 'bn_name' => 'রাজশাহী'],
            ['name' => 'Natore', 'bn_name' => 'নাটোর'],
            ['name' => 'Joypurhat', 'bn_name' => 'জয়পুরহাট'],
            ['name' => 'Chapainawabganj', 'bn_name' => 'চাঁপাইনবাবগঞ্জ'],
            ['name' => 'Naogaon', 'bn_name' => 'নওগাঁ'],
            ['name' => 'Jashore', 'bn_name' => 'যশোর'],
            ['name' => 'Satkhira', 'bn_name' => 'সাতক্ষীরা'],
            ['name' => 'Meherpur', 'bn_name' => 'মেহেরপুর'],
            ['name' => 'Narail', 'bn_name' => 'নড়াইল'],
            ['name' => 'Chuadanga', 'bn_name' => 'চুয়াডাঙ্গা'],
            ['name' => 'Kushtia', 'bn_name' => 'কুষ্টিয়া'],
            ['name' => 'Magura', 'bn_name' => 'মাগুরা'],
            ['name' => 'Khulna', 'bn_name' => 'খুলনা'],
            ['name' => 'Bagerhat', 'bn_name' => 'বাগেরহাট'],
            ['name' => 'Jhenaidah', 'bn_name' => 'ঝিনাইদহ'],
            ['name' => 'Jhalakathi', 'bn_name' => 'ঝালকাঠি'],
            ['name' => 'Patuakhali', 'bn_name' => 'পটুয়াখালী'],
            ['name' => 'Pirojpur', 'bn_name' => 'পিরোজপুর'],
            ['name' => 'Barisal', 'bn_name' => 'বরিশাল'],
            ['name' => 'Bhola', 'bn_name' => 'ভোলা'],
            ['name' => 'Barguna', 'bn_name' => 'বরগুনা'],
            ['name' => 'Sylhet', 'bn_name' => 'সিলেট'],
            ['name' => 'Moulvibazar', 'bn_name' => 'মৌলভীবাজার'],
            ['name' => 'Habiganj', 'bn_name' => 'হবিগঞ্জ'],
            ['name' => 'Sunamganj', 'bn_name' => 'সুনামগঞ্জ'],
            ['name' => 'Narsingdi', 'bn_name' => 'নরসিংদী'],
            ['name' => 'Gazipur', 'bn_name' => 'গাজীপুর'],
            ['name' => 'Shariatpur', 'bn_name' => 'শরীয়তপুর'],
            ['name' => 'Narayanganj', 'bn_name' => 'নারায়ণগঞ্জ'],
            ['name' => 'Tangail', 'bn_name' => 'টাঙ্গাইল'],
            ['name' => 'Kishoreganj', 'bn_name' => 'কিশোরগঞ্জ'],
            ['name' => 'Manikganj', 'bn_name' => 'মানিকগঞ্জ'],
            ['name' => 'Dhaka', 'bn_name' => 'ঢাকা'],
            ['name' => 'Munshiganj', 'bn_name' => 'মুন্সিগঞ্জ'],
            ['name' => 'Rajbari', 'bn_name' => 'রাজবাড়ী'],
            ['name' => 'Madaripur', 'bn_name' => 'মাদারীপুর'],
            ['name' => 'Gopalganj', 'bn_name' => 'গোপালগঞ্জ'],
            ['name' => 'Faridpur', 'bn_name' => 'ফরিদপুর'],
            ['name' => 'Panchagarh', 'bn_name' => 'পঞ্চগড়'],
            ['name' => 'Dinajpur', 'bn_name' => 'দিনাজপুর'],
            ['name' => 'Lalmonirhat', 'bn_name' => 'লালমনিরহাট'],
            ['name' => 'Nilphamari', 'bn_name' => 'নীলফামারী'],
            ['name' => 'Gaibandha', 'bn_name' => 'গাইবান্ধা'],
            ['name' => 'Thakurgaon', 'bn_name' => 'ঠাকুরগাঁও'],
            ['name' => 'Rangpur', 'bn_name' => 'রংপুর'],
            ['name' => 'Kurigram', 'bn_name' => 'কুড়িগ্রাম'],
            ['name' => 'Sherpur', 'bn_name' => 'শেরপুর'],
            ['name' => 'Mymensingh', 'bn_name' => 'ময়মনসিংহ'],
            ['name' => 'Jamalpur', 'bn_name' => 'জামালপুর'],
            ['name' => 'Netrokona', 'bn_name' => 'নেত্রকোণা'],
        ]);
    }
}
