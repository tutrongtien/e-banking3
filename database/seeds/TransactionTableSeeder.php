<?php

use Illuminate\Database\Seeder;
use App\Account;
class TransactionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $account = Account::where('bank_number', '2088899004')->first();
        $account1 = Account::where('bank_number', '2088899007')->first();
        $account2 = Account::where('bank_number', '2088899009')->first();
        $account3 = Account::where('bank_number', '2088899001')->first();

        DB::table('transactions')->insert([
        	[
        		'account_id' => $account->id,
        		'time' => '2017-08-09 00:00:00',
        		'place' => 'ECOMB',
        		'detail' => 'CT TK The',
        		'note' => 'Chuyen tien',
        		'money' => '1200000',
        		'bank_id' => '098766',
        		'bank_number' => '1234567890',
        		'type' => true,
        		'balance' => '120000000',
        		'status' => true,
        	],
        	[
        		'account_id' => $account->id,
        		'time' => '2017-10-09 00:00:00',
        		'place' => 'ECOMB',
        		'detail' => 'CT TK The',
        		'note' => 'Chuyen tien',
        		'money' => '1250000',
        		'bank_id' => '098766',
        		'bank_number' => '1234567890',
        		'type' => true,
        		'balance' => '120000000',
        		'status' => true,
        	],
        	[
        		'account_id' => $account->id,
        		'time' => '2017-12-09 00:00:00',
        		'place' => 'ECOMB',
        		'detail' => 'CT TK The',
        		'note' => 'Chuyen tien',
        		'money' => '20000000',
        		'bank_id' => '098766',
        		'bank_number' => '1232567890',
        		'type' => true,
        		'balance' => '120000000',
        		'status' => true,
        	],
        	[
        		'account_id' => $account1->id,
        		'time' => '2017-12-31 00:00:00',
        		'place' => 'ECOMB',
        		'detail' => 'CT TK The',
        		'note' => 'Chuyen tien',
        		'money' => '15000000',
        		'bank_id' => '098766',
        		'bank_number' => '1220567890',
        		'type' => true,
        		'balance' => '120000000',
        		'status' => true,
        	],
        	
        ]);
    }
}
