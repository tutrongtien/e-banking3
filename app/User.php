<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;
use App\UserInfo;
use App\Account;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_name', 'email', 'password', 'status', 'confirmation_code'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

   protected $users = ['status' => 'boolean'];


    public function userInfo()
    {
        return $this->hasOne('App\UserInfo', 'user_id', 'id');
    }

    public function account()
    {
        return $this->hasMany('App\Account');
    }

    public function accounts()
    {
        return $this->hasMany('App\Account');
    }
}
