<?php

use Illuminate\Database\Seeder;
use App\User;
use App\HospitalService;

class DatabaseSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        $password = \Hash::make('demo123');
        // $this->call(UsersTableSeeder::class);
        User::create(['id' => '1', 'email' => 'demo@demo.com', 'password' => $password, 'user_id' => 'demo', 'user_name' => 'demo', 'authorized' => 'YES', 'active' => '1', 'fname' => 'demo', 'phone' => '9998887788', 'city' => 'NYC']);
        HospitalService::create(['id' => '1', 'name' => 'Post surgery stay', 'description' => '', 'budget_cost' => '', 'units' => '2', 'tax_rates' => '', 'active' => '1']);
        HospitalService::create(['id' => '2', 'name' => 'X-Ray', 'description' => '', 'budget_cost' => '', 'units' => '2', 'tax_rates' => '', 'active' => '1']);
        HospitalService::create(['id' => '3', 'name' => 'Pharma', 'description' => '', 'budget_cost' => '', 'units' => '1', 'tax_rates' => '', 'active' => '1']);
        HospitalService::create(['id' => '4', 'name' => 'Surgical Room', 'description' => '', 'budget_cost' => '', 'units' => '1', 'tax_rates' => '', 'active' => '1']);
        HospitalService::create(['id' => '5', 'name' => 'Admitting Physician', 'description' => '', 'budget_cost' => '', 'units' => '1', 'tax_rates' => '', 'active' => '1']);
        HospitalService::create(['id' => '6', 'name' => 'Surgical Team', 'description' => '', 'budget_cost' => '', 'units' => '1', 'tax_rates' => '', 'active' => '1']);
        HospitalService::create(['id' => '7', 'name' => 'Home healthcare', 'description' => '', 'budget_cost' => '', 'units' => '1', 'tax_rates' => '', 'active' => '1']);
        HospitalService::create(['id' => '8', 'name' => 'Physical Rehab', 'description' => '', 'budget_cost' => '', 'units' => '1', 'tax_rates' => '', 'active' => '1']);
    }

}
