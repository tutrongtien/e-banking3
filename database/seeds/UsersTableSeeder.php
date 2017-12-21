<?php

use Illuminate\Database\Seeder;

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
		DB::table('users')->insert([
			['user_name' => '23456',
			 'email' => 'trieuvan@gmail.com',
			 'password' => bcrypt('123456'),
			 'status' => true
			],

			['user_name' => '23457',
			 'email' => 'vutanqn@gmail.com',
			 'password' => bcrypt('123456'),
			 'status' => true
			],

			['user_name' => '23458',
			 'email' => 'thach@gmail.com',
			 'password' => bcrypt('123456'),
			 'status' => false
			],
			]);	
	}
}
