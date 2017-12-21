<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BanksAccount extends Model
{
    protected $table = 'banks_accounts';
    protected $fillable = ['bank_id', 'bank_number', 'name', 'balance', 'currency'];
}
