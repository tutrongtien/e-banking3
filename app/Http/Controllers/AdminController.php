<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\AdminCreateUserRequest;
use App\Http\Requests\AdminEditUserRequest;
use Illuminate\Support\Facades\DB;
use App\Account;
use App\User;

class AdminController extends Controller
{
     // lấy random number
    public function getRandomNumber($digits_needed)
    {
        $random_number = '';
        $count = 0;
        while ( $count < $digits_needed ) {
            $random_digit = mt_rand(0, 9);         
            $random_number .= $random_digit;
            $count++;
        }

        return $random_number;
    }

    // create account for user
    public function accountByUser(User $user)
    {
        $data = [
            'type' => 1,
            'bank_number' => $user->user_name,
            'balance' => 0,
            'currency' => 'vnd',
            'user_id' => $user->id
        ];

        return Account::create($data);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.index', ['users' => User::OrderBy('id', 'DESC')->paginate(10)]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AdminCreateUserRequest $request)
    {
        $info = $request->all();
        $info['password'] = bcrypt($info['password']);
        $info['status'] = 1;
        $info['user_name'] = $this->getRandomNumber(10);

        
        // insert database
        DB::beginTransaction();

        try {
            //create user
            $user = User::create($info);

            //create account
            $this->accountByUser($user);

            DB::commit();
            $success = true;

        } catch (\Exception $e) {
            $success = false;
            DB::rollback();

            return redirect('/');
        }

        if ($success) {
            return redirect('admin/show/' . $user->id)->withSuccess('Đã thêm mới '. $user->user_name .' thành công');
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('admin/show', ['user' => $user]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {   
        return view('admin.edit', ['user' => $user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AdminEditUserRequest $request, User $user)
    {
        $info = $request->all();
        $info['is_admin'] = ( ! isset($request['is_admin']) ) ? 0 : 1;
        $info['password'] = ( $request['password'] == null ) ? $user->password : bcrypt($request['password']);

        $user->update($info); 

        return redirect('admin/show/'. $user->id)->withSuccess('Đã cập nhật '. $user->user_name .' thành công');
    }

    public function delete(User $user)
    {
        Account::whereUserId($user->id)->delete();
        $user->delete();
        return redirect('admin/index')->withSuccess('Đã Xóa '. $user->user_name .' thành công');
    }


    public function lockAndUnlockUser(User $user)
    {
        if ($user->active == 1) {
            $user->active = 0;
            $user->save();
             return back()->withSuccess('Tài khoản ' . $user->user_name . ' đã bị khóa');
        } else {
            $user->active = 1;
            $user->save();
             return back()->withSuccess('Tài khoản ' . $user->user_name . ' được mở khóa');
        }
    }

   

    

}
