<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Http\Requests\CreateUserRequest;
use Auth;
use App\User;
use App\UserInfo;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\ChangePasswordRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Support\MessageBag;


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
        return view('users.index')->with('user', $user);
    }

    public function login(Request $request) {
       
        return view('auth.login');
              
    }

    public function postLogin(CreateUserRequest $request)
    {
        $data = ['user_name' => $request->input('username'), 
                'password' => $request->input('password'),
                'status' => true,
        ];
        $token_captcha = $request->input('g-recaptcha-response');
        
        if (strlen($token_captcha) > 0 && Auth::attempt($data) == true) {
            return  redirect('/show');
        } else {
            return redirect('/login');
        }
            
    }

    public function profile() 
    {
        $user = Auth::user();
        $info = $user->userInfo;	
        return view('users.profile')->with(['user' => $user, 'info' => $info]);
    }
  
    public function logout(Request $request)
    {
        Auth::logout();
        return redirect('/');
    }


    public function changePassword()
    {
        $user = Auth::user();
        return view('auth.passwords.change')->with('user', $user);
    }

    public function updatePassword(ChangePasswordRequest $request )
    {   
        $user = Auth::user();
        $has_pass = $user->password;
        $current_pass = $request->input('password');

        if(!Hash::check($current_pass, $has_pass)) {
            $errors = new MessageBag(['password' => ['Mật khẩu cũ không chính xác']]);
            return back()->withErrors($errors)->withInput();
        }else {
            $new_pass = $request->input('password_new');
            $confirm_pass = $request->input('password_confirm');

            if($new_pass != $confirm_pass) {
                $errors = new MessageBag(['new_password' => ['Mật khẩu nhập lại không chính xác']]);
                return back()->withErrors($errors)->withInput();  
            }else {
                $has_pass = bcrypt($new_pass);
                $user->password = $has_pass;
                $user->save();
            }
        } 
        return redirect('show');    
    }
        
}
