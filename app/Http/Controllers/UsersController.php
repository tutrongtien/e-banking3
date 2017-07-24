<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Http\Requests\CreateUserRequest;
use Auth;
use App\User;
use App\UserInfo;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $user = Auth::user();

        //dd($info);
        return view('layouts.master')->with('user', $user);
    }

    public function login(Request $request) {
       
            return redirect('/');
              
    }

    public function postLogin(CreateUserRequest $request)
    {
        $data = ['user_name' => $request->input('username'), 
                'password' => $request->input('password'),
                'status' => true ];

        $token_captcha = $request->input('g-recaptcha-response');
        
        if (strlen($token_captcha) > 0 && Auth::attempt($data, $remember = true) == true) {
            $user = Auth::user();
            return  redirect('/show');
        } else {
            return redirect('/login');
        }
            
    }

    public function profile() 
    {
        $user = Auth::user();
        $info = $user->userInfo;
        //dd($info);	
        
        return view('users.profile')->with(['user' => $user, 'info' => $info] );
    }
  
    public function logout(Request $request)
    {
        Auth::logout();
        return redirect('/');
    }
        
}
