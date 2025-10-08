<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Customers;
use Faker\Factory as Faker;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker=Faker::create();
        for($i=1;$i<100;$i++){
            $customer=new Customers();
        $customer->name=$faker->name;
        $customer->email=$faker->email;
        $customer->gender="F";
        $customer->address=$faker->address;
        $customer->city=$faker->city;
        $customer->country=$faker->country;
        $customer->DOB=now();
        $customer->password=$faker->password;
        $customer->save();
        }
        
    }
}
