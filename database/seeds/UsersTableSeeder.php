<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
    	User::create([
    		'id_login' = 2345,
    		'password' = bcrypc('123456'),
    		'status' = true,
    		]);

    	User::create([
    		'id_login' = 3456,
    		'password' = bcrypc('123456'),
    		'status' = false,
    		]);

    	User::create([
    		'id_login' = 4567,
    		'password' = bcrypc('123456'),
    		'status' = false,
    		]);


    }
}
