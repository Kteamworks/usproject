<?php

use Illuminate\Database\Seeder;
use App\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $password = \Hash::make('demo123');
        // $this->call(UsersTableSeeder::class);
		User::create(['id' => '1', 'email' => 'demo@demo.com', 'password' => $password, 'user_id' => 'demo','user_name'=>'demo','authorized'=>'YES','active' => '1','fname' => 'demo','phone' => '9998887788','city' => 'NYC']);
        
    }
}
