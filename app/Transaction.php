<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Account;

class Transaction extends Model
{
    	protected $table = 'transactions';
        protected $fillable = [
            'place', 'detail', 'note', 'money', 'bank_id', 'bank_number', 'account_id', 'status'
        ];

        public function account()
        {
        	return $this->belongsTo('App\Account');
        }
}
