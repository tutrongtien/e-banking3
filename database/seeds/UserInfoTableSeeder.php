<?php

use Illuminate\Database\Seeder;

class UserInfoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('user_info')->insert([
        	[
        	'identity_card' => '1234456667',
        	'date_of_identity_card' => '2013-05-23',
        	'name' => 'Quang Yue',
        	'date_of_birth' => '1894-05-12',
        	'phone' => '092435462',
        	'address' => 'quang trung',
        	'city' => 'da nang',
        	'district' => 'Hoa Van',
        	'ward' => 'Hoa Tien',
        	'job' => 'Giao Vien'
        	],

        	[
        	'identity_card' => '12346643667',
        	'date_of_identity_card' => '2014-05-23',
        	'name' => 'Binh Yue',
        	'date_of_birth' => '1894-04-22',
        	'phone' => '09214545',
        	'address' => 'quang trung',
        	'city' => 'Ho Chi Minh',
        	'district' => 'Hoa Van',
        	'ward' => 'Hoa Tien',
        	'job' => 'Giao Vien'
        	],

        	['identity_card' => '1234456667',
        	'date_of_identity_card' => '2013-05-23',
        	'name' => 'Quang Tien',
        	'date_of_birth' => '1894-05-12',
        	'phone' => '092435462',
        	'address' => 'quang trung',
        	'city' => 'da nang',
        	'district' => 'Hoa Van',
        	'ward' => 'Hoa Tien',
        	'job' => 'Giao Vien'],
        	
        	]);
        
    }
}
