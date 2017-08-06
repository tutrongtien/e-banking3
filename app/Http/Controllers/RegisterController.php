<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\RegisterFormRequest;
use App\User;
use App\UserInfo;
use App\Account;
use App\Mail\UserEMail;
use Mail;

class RegisterController extends Controller
{
	// lấy random number
	public function getRandomNumber($digits_needed)
	{
		$random_number = '';
		$count = 0;
		while ( $count < $digits_needed ) {
            $random_digit = mt_rand(0, 9);         
            $random_number .= $random_digit;
            $count++;
        }

        return $random_number;
	}

	// create account for user
	public function accountByUser(User $user)
    {
		$data = [
			'type' => 1,
			'bank_number' => $user->user_name,
			'balance' => 0,
			'currency' => 'vnd',
			'user_id' => $user->id
		];

		return Account::create($data);
	}

	// create register 
    public function store(RegisterFormRequest $request)
    {
    	// get all data
    	$info = $request->all();

    	$info['user_name'] = $this->getRandomNumber(10);
    	$random_password   = $this->getRandomNumber(8);
    	$info['password'] = bcrypt($random_password);
    	$info['confirmation_code'] = str_random(30);

        // insert database
        DB::beginTransaction();

        try {
            // insert user table
            $user = User::create($info);

            //insert user_info table
            $info['user_id'] = $user->id;
            UserInfo::create($info);

            //create account      
            $this->accountByUser($user);

            // send email for register user
            // $linkActive = 'http://localhost:8000/user/active/' . $user->confirmation_code;
            $linkActive = url('/user/active/' . $user->confirmation_code);
            Mail::to($user)->send(new UserEmail($user, $random_password, $linkActive));

            DB::commit();
            $success = true;
        } catch (\Exception $e) {
            $success = false;
            DB::rollback();
            return redirect('/');
        }

    	if ($success) {
            return redirect('/login');   
        }  	
    }

    public function confirm($confirmation_code)
    {
    	if( ! $confirmation_code)
        {
            return redirect('/');
        }

    	$user = User::whereConfirmationCode($confirmation_code)->first();

    	if ( ! $user)
        {
            return redirect('/');
        }

        $user->status = true;
        $user->confirmation_code = null;
        $user->save();

        return redirect('/login');
    }
}
