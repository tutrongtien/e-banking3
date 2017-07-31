<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Account;
use App\Bank;

class TransferController extends Controller
{
    public function internal_transfer()
    {
    	$user = Auth::user();
    	$accounts = $user->accounts;
    	return view('users.internal_transfer_money', ['accounts' => $accounts]);
    }

    public function external_transfer()
    {
    	return view('users.external_transfer_money', ['accounts' => Auth::user()->accounts, 'banks' => Bank::all()]);
    }

}
