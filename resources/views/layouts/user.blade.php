@extends('layouts.main')

@section('script')
	@yield('script_f')
@stop

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
	            <li class="list-group-item" ><a href="{{ url('show') }}">Thông Tin cá nhân</a>
	            </li>
	            <li class="list-group-item"><a href="{{ url('view/transactions') }}">Thông Tin giao dịch</a>
	            </li>
	            <li class="list-group-item"><a href="{{ url('view/balance') }}">Thông Tin tài khoản</a>
	            </li>
	            <li class="list-group-item"><a href="{{ url('password/change') }}">Đổi mật khẩu</a>
	            </li>
	            <li class="list-group-item {{ is_current_route('internal_transfer') }}"><a href="{{ url('internal_transfer') }}">Chuyển Tiền trong hệ thống</a>
	            </li>
	            <li class="list-group-item {{ is_current_route('external_transfer') }}"><a href="{{ url('external_transfer')}}">Chuyển Tiền ngoài hệ thống</a>
	            </li>
	        </ul>
	    </div>
	</div>

	<div class="col-md-8">
	    @yield('content')
	</div>
</div>

@stop