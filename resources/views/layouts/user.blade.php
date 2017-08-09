@extends('layouts.main')


@section('user')
<div class="content_info">
    <div class="paddings">
        <div class="container">                      
               <div class="row user-area">
	<div class="col-md-4">                               
	    <div class="item-team">
	        <h4>{{ Auth::user()->userInfo->name }}</h4>
	        <span class="country">Khách hàng</span>
	    </div>
	    <div class="panel panel-default">
	        <ul class="list-group">
	            <li class="list-group-item" ><a href="#">Thông Tin cá nhân</a>
	            </li>
	            <li class="list-group-item"><a href="#">Thông Tin giao dịch</a>
	            </li>
	            <li class="list-group-item"><a href="#">Thông Tin tài khoản</a>
	            </li>
	            <li class="list-group-item"><a href="#">Đổi mật khẩu</a>
	            </li>
	            <li class="list-group-item"><a href="#">Chuyển Tiền trong hệ thống</a>
	            </li>
	            <li class="list-group-item"><a href="#">Chuyển Tiền ngoài hệ thống</a>
	            </li>
	        </ul>
	    </div>
	</div>

	<div class="col-md-8">
	    @yield('content')
	</div>
</div>

@stop