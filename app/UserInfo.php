<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class UserInfo extends Model
{
    protected $table = 'user_info';
    protected $fillable = ['name', 'date_of_birth', 'phone', 'address', 'city',
      					   'district', 'ward', 'email', 'job'];

    public function user()
    {
    	return $this->hasOne('User');
    } 

}
