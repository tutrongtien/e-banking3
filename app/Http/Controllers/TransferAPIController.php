<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;
use App\Transaction;
use App\Mail\TransferActiveEmail;
use App\Mail\TransactionInfoEmail;
use App\Mail\TransactionRecive;
use Mail;
use App\Account;
use App\User;
use App\UserInfo;
use App\Bank;
use App\BanksAccount;

class TransferAPIController extends Controller
{
	public function getBalanceOfAccount(Request $request)
	{
		$bank_number = $request['id'];
		$balance = Account::whereBankNumber($bank_number)->first()->balance;
		$balance = number_format($balance);
		return response($balance, 201);
	}

	public function getNameOfAccount(Request $request)
	{
		$id = $request['id'];
		$name = Account::whereBankNumber($id)->first() ;

		if ( ! $name ) {
			$name = 'Số tài khoản không tồn tại' ;
		} else {
			$name = $name->user->userInfo->name;
		}

		return response($name, 201);
	}

    public function getTransactionInfo(Request $request)
    {
    	// get data request
    	$info = $request->all();
		$info['time'] = \Carbon\Carbon::now();
		$info['place'] = 'Ebanking';
		$info['type'] = 1;
		$info['detail'] = 'Chuyển khoản';
	    $info['code'] = str_random(10);
	    $info['account_id'] = Account::whereBankNumber($info['account_id'])->first()->id;
	    $info['balance'] = Account::find($info['account_id'])->balance;

	    //internal transfer money
	    if ( ! isset($info['bank_name']) ) {
	    	$account = Account::whereBankNumber($info['bank_number'])->first();
		    if ( ! $account || ($info['balance'] < $info['money'] + 3300) || $info['money'] < 50000 ) {
		    	return response('null', 200);
		    }

		//external transfer money    
	    } else {
	    	$info['bank_id'] = Bank::whereName($info['bank_name'])->first()->id;
	    	if ( ! $info['bank_id'] || $info['balance'] < ($info['money'] + 11000) || $info['money'] < 100000 ) {	    		
		    	return response('null', 200);
		    }
	    }
	    
	    // insert database
        DB::beginTransaction();

        try {
            // insert transaction table and send email
            $transaction = Transaction::create($info);

            $user = User::find(Account::find($info['account_id'])->user_id);
		    Mail::to($user)->send(new TransferActiveEmail($info['code']));
           
            //
            DB::commit();
            $success = true;
        } catch (\Exception $e) {
        	//
            $success = false;
            DB::rollback();

            return response('null', 200);
        }

    	if ($success) {
    		//
			return response('', 200);
        }		
	}



	public function transaction(Request $request) 
	{
		//get code request
		$code = $request['code'];
		if($code == null) {
			return response('fail', 200);
		} else {
			$transaction = Transaction::whereCode($code)->first();

			//
			if (! $transaction) {
	            return response('false', 200);
	        }

	        //
	        DB::beginTransaction();

	        try {
	        	$account = Account::find($transaction['account_id']);

	        	// edit transactions tables
		        $transaction['status'] = true;
		        $transaction['code'] = null;
		        $transaction->save();

		        // internal transfer money:
	            if ($transaction['bank_id'] == null) {
	            	// change data of account and send email
			        $account['balance'] = $account['balance'] - $transaction['money'] - 3300 ;
			        $account->save();

			        $user = User::find($account['user_id']);
	                Mail::to($user)->send(new TransactionInfoEmail($transaction, $account));

	                // change data of account receive
			        $account_to_pre   = Account::whereBankNumber($transaction['bank_number'])->first();

			        $account_transaction  = Account::whereBankNumber($transaction['bank_number'])->first();
			        $account_transaction['balance'] = $account_transaction['balance'] + $transaction['money'];
			        $account_transaction->save();

			        // create transaction for account recevie
	            	$data = [
			            'time' =>\Carbon\Carbon::now(),
			            'place' => 'Ebanking',
			            'detail' => 'Nhận tiền',
			            'balance' => $account_to_pre->balance,
			            'note' => $transaction['note'],
			            'money' => $transaction['money'],
			            'bank_number' => $account['bank_number'],
			            'type' => 0,
			            'status' => 1,
			            'account_id' => $account_transaction['id'],
			            'code' => null,
			       		];

			        $transaction_to = Transaction::create($data);

			        //  send email for account receive
			        $user_to = $account_transaction->user;
			        Mail::to($user_to)->send(new TransactionRecive($transaction_to, $account_transaction, $account_to_pre)); 

			    // external transfer money   
	            } else {
	            	//change data account and send email
	             	$account['balance'] = $account['balance'] - $transaction['money'] - 11000 ;
			        $account->save();

			        $user = User::find($account['user_id']);
	                Mail::to($user)->send(new TransactionInfoEmail($transaction, $account));

	                // change data account recive
			        $account_transaction  = BanksAccount::whereBankNumber($transaction['bank_number'])->first();
			        $account_transaction['balance'] = $account_transaction['balance'] + $transaction['money'];
			        $account_transaction->save();
	            }

	            //
	        	DB::commit();
	        	$success = true;
	        } catch (\Exception $e){
	        	//
	        	$success = false;
	        	DB::rollback();

	        	return response('fail', 200);
	        }

	        if ($success) {
	        	//
	        	return response('success', 200);
	        }
		}
		
	}

	
}
