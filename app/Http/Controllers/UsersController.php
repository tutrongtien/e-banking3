<?php
namespace App\Http\Controllers;

use App\Http\Requests\CreateUserRequest;
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
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    public function login() 
    {   
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
        //tim file json
        $string = file_get_contents("../app/file/City_district_VN/tinh_tp.json");   
        $json_file = json_decode($string, true);

        foreach($json_file as $json){
            if ($info->city == $json['code']){
                $info->city = $json['name'];
            }
        }
        //
        $string = file_get_contents("../app/file/City_district_VN/quan_huyen.json");   
        $json_file = json_decode($string, true);

        foreach($json_file as $json){
            if ($info->district == $json['code']){
                $info->district = $json['name'];
            }
        }

        return view('users.profile')->with(['user' => $user, 'info' => $info]);
    }

    public function viewBalance()
    {
        $count = 1;
        $user = Auth::id();
        $accounts = Account::where('user_id', $user)->paginate(5);
        foreach( $accounts as $account) {
            $account->balance = number_format($account->balance, 2);
        }
        return view('users.balance')->with(['accounts' => $accounts, 'count' => $count]);
    }

    public function ajaxBalance($id) 
    {
        $account = Account::find($id);
        $account->balance = number_format($account->balance, 2);
        return response()->json(['data' => $account]);  
          
    }

    public function balancePDF()
    {
        $user = Auth::user();
        $info = $user->userInfo;
        $accounts = $user->accounts;
        //dd($accounts);
        $pdf = PDF::loadView('users.balancepdf', ['user' => $user, 'info' => $info, 'accounts' => $accounts]);
        return $pdf->stream();

    }

    public function transactionsPDF() 
    {
        $id = Request::get('id');
        $fdate = Request::get('fdate');
        $tdate = Request::get('tdate');
        $transactions = Transaction::where('account_id', $id)
                        ->whereBetween('time', [ $fdate, $tdate ])
                        ->orderBy('time', 'desc')->get();
        $count = 1;
        $pdf = PDF::loadView('users.transactionspdf', [ 'transactions' => $transactions, 'count'  => $count ]);
        return $pdf->stream();

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
                            
            foreach ($transactions as $transaction) {
                $transaction->money = number_format($transaction->money);
                }             
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
        
}
