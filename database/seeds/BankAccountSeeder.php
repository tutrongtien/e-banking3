<?php

use Illuminate\Database\Seeder;
use App\Bank;

class BankAccountSeeder extends Seeder
{
    public function getRandomNumber(){
        $count=0;
        $random_number = 0;
        while ( $count < 9 ) {
            $random_digit = mt_rand(0, 9);
            
            $random_number .= $random_digit;
            $count++;
        }

        return $random_number;
    }
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('banks')->insert([
        	['name' => 'VietcomBank'],
        	['name' => 'BIDV'],
        	['name' => 'VBSP'],
        	['name' => 'Vietinbank'],
        	['name' => 'VN-AGribank'],
        	['name' => 'ACB']
       	]);

        foreach (Bank::all() as $bank) {
            DB::table('banks_accounts')->insert([
                'bank_id' => $bank->id,
                'bank_number' => $this->getRandomNumber(),
                'name' => 'Nguyễn Văn A',
                'balance' => 20000000,
                'currency' => 'vnd'
            ]);
        }
       	
    }
}
