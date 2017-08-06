<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Account;

class Transaction extends Model
{
    protected $fillable = ['time', 'place', 'detail', 'note', 'money', 'bank_id', 'bank_number', 'type', 'balance', 'status', 'account_id', 'code'];

    public function account()
    {
    	return $this->belongsTo('App\Account');
    }
}

