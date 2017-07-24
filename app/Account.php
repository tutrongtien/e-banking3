<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    protected $fillable = [
        'type', 'bank_number', 'balance', 'currency', 'user_id'
    ];

    public function user()
    {
    	return $this->belongsTo('User');
    }
}
