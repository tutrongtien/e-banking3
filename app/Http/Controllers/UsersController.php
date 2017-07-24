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
        $user_info= $user['id'];
        $info = UserInfo::where('user_id', $user_info)->first();
        //dd($info);
        return view('layouts.master')->with('info', $info);
    }

    public function login(Request $request) {
        if (!Auth::check() ) {
            return redirect('/');
        } else {
            
            return redirect('/profile');
        }
        
    }

    public function postLogin(Request $request)
    {
        $data = ['user_name' => $request->input('username'), 
                'password' => $request->input('password'),
                'status' => true ];

        $token_captcha = $request->input('g-recaptcha-response');
         
        $request->session()->put('user', $request->input('username'));
        
        if (strlen($token_captcha) > 0 && Auth::attempt($data, $remember = true) == true) {
            $user = Auth::user();
            return  redirect('/show');
        } else {
            return redirect('/login');
        }
            
    }

    public function profile(Request $request) 
    {
        $user = Auth::user();
        $user_info= $user['id'];
        $info = UserInfo::where('user_id', $user_info)->first();

        return view('users.profile')->with(['user' => $user, 'info' => $info] );
    }
  
    public function logout(Request $request)
    {
        $request->session()->forget('user');
        Auth::logout();
        
        return redirect('/');
    }
        
}
