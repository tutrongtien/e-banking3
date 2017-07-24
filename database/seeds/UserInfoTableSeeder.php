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
			['identity_card' => '205545976',
			 'date_of_identity_card' => '2009-10-09',
			 'name' => 'Do Vu Tan',
			 'date_of_birth' => '1990-05-03',
			 'phone' => '0919797477',
			 'address' => '12 Nguyen Phan Vinh',
			 'city' => 'Da Nang',
			 'district' => 'Son Tra',
			 'ward' => 'Tho Quang',
			 'job' => 'NV Kinh Doanh',
			 'user_id' => '2',
			],
			['identity_card' => '205545977',
			 'date_of_identity_card' => '2012-10-09-',
			 'name' => 'Luu Diep Phi',
			 'date_of_birth' => '1996-05-03',
			 'phone' => '0919797488',
			 'address' => '12 Hai Phong',
			 'city' => 'Da Nang',
			 'district' => 'Hai Chau',
			 'ward' => 'Tho Quang',
			 'job' => 'Dien Vien',
			 'user_id' => '1',
			],
		]);

    }
}