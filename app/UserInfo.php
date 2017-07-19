<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
class UserInfo extends Model
{
    //
    protected $table = 'user_info';

    protected $fillable = ['user_id', 'identity_card', 'date_of_identity_card', 'name', 'date_of_birth', 'phone', 'address', 'city', 'district', 'ward','email', 'job'];

    public function user()
    {
    	return $this->hasOne('User');
    }
}
