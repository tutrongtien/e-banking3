<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Transaction;

class Account extends Model
{
	protected $table = 'accounts';
    protected $fillable = [
        'type', 'bank_number', 'balance', 'currency', 'user_id'
    ];

    public function user()
    {
    	return $this->belongsTo('App\User');
    }

    public function transactions() 
    {
    	return $this->hasMany('App\Transaction');
    }
}
