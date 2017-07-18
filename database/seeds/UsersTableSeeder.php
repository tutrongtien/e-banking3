<?php

use Illuminate\Database\Seeder;
use App\User;
use App\UserInfo;


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
       /*$user = UserInfo::create([
    		'id' => '2345',
    		]);
*/
    	User::create([
    		'user_id' => '1234',
    		'password' => bcrypt('123456'),
    		'status' => true,
    		'email' => 'vutan@gmail.com',
    		]);	    	    	    	    	
    	

    	User::create([
    		'user_id' => '2345',
    		'password' => bcrypt('123456'),
    		'status' => false,
    		'email' => 'luubi@gmail.com',
    		]);

    	User::create([
    		'user_id' => '3456',
    		'password' => bcrypt('123456'),
    		'status' => false,
    		'email' => 'quantruong@gmail.com',
    		]);


    }
}
