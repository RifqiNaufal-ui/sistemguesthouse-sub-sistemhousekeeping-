<?php

use Illuminate\Database\Seeder;
use App\User;

class UserSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
        	'name' => 'Admin',
    		'email' => 'admin@gmail.com',
    		'password' => bcrypt('12345678')
        ]);
    }	
}
