<?php
namespace App\Http\Controllers;

use App\Http\Requests\CreateUserRequest;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Support\Facades\Input;
use Auth;
use App\User;
use App\UserInfo;
use App\Account;
use App\Transaction;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\ChangePasswordRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Support\MessageBag;
use Request;
use DB;
use PDF;

class UsersController extends Controller
{
    use ThrottlesLogins;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('users.index');
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

    public function getUserInfo($id) 
    {
        $info = UserInfo::find($id);
        return view('users.editinfo')->with(['info'=> $info]);

    }
    public function editInfo(UserInfo $info)
    {
        $input = Input::all();
        $info->update($input);
        return redirect('show');
    }

    public function viewBalance()
    {
        $count = 1;
        $user = Auth::user();
        $accounts = $user->accounts;

        return view('users.balance')->with(['accounts' => $accounts, 'count' => $count]);
    }

    public function ajaxBalance($id) 
    {
        $account = Account::find($id);
        return response()->json(['data' => $account]);  
          
    }

    public function viewTransactions()
    {
        return view('users.transaction');
    }

    public function detailTransactions(Request $request)
    {
        if(Request::ajax()) {
            $id = Request::get('id');
            $fdate = Request::get('fdate');
            $tdate = Request::get('tdate');
            $transactions = DB::table('transactions')
                            ->where('account_id', $id)
                            ->whereBetween('time', [$fdate, $tdate])
                            ->orderBy('time', 'desc')->get();
                            
            return response()->json(['data' => $transactions]);
        }
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

    public function balancePDF() 
    {
        $user = Auth::user();
        $accounts = $user->accounts;
        $pdf = PDF::loadView('users.accountpdf', ['accounts' => $accounts]);
        return $pdf->download('accounts.pdf');
            
    }
      
}
