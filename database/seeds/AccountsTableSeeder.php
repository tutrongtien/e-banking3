<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\User;
class AccountsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::where('user_name', '23456')->first();

        DB::table('accounts')->insert([
        	[
        		'user_id' => $user->id,
        		'type' => 'Noi Dia',
        		'bank_number' => '2088899009',
        		'balance' => '1500000000',
        		'currency' => 'VND',
        	],
        	[
        		'user_id' => $user->id,
        		'type' => 'Quoc Te',
        		'bank_number' => '2088899001',
        		'balance' => '200000000',
        		'currency' => 'VND',
        	],
        ]);
    }
}
