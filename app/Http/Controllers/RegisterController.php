<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\RegisterFormRequest;
use App\User;
use App\UserInfo;

class RegisterController extends Controller
{
    public function store(RegisterFormRequest $request){
    	
    	dd($request->all());
    }
}
